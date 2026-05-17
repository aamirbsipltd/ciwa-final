# Pitch Found — Figma → WordPress block theme rules

This file is the WordPress counterpart to `RULES.md`. It's the contract between **the block-theme structure** and **the person (or process) translating a Figma design into a WordPress block theme**.

When you start converting a Figma frame to a block theme, keep this file open and apply each rule.

---

## 1. Read the design via the Figma MCP — never guess from the URL

For every frame the user references:

1. Pull structured data with the Figma MCP server (`get_design_context`, `get_screenshot`, `get_metadata`).
2. Do not infer layout from the URL slug, file name, or prior context.
3. If MCP returns nothing or is rate-limited, stop and report — never fabricate.

## 2. Tokens come from `theme.json` — never hardcode

- Before generating any pattern or template, read `theme.json` (the `settings.color.palette`, `settings.typography.fontSizes`, `settings.spacing.spacingSizes`).
- If a Figma variable already maps to a preset slug (`primary`, `surface-1`, `text-muted`), use that slug.
- If a Figma variable does **not** yet exist, add it to `theme.json` first, then reference it. Never inline a raw hex.
- Reference tokens in block markup using the `var:preset|<group>|<slug>` syntax (e.g. `var:preset|color|primary`, `var:preset|spacing|6`, `var:preset|font-size|2xl`).
- For inline `style="…"` fall-throughs, use the CSS custom property form: `var(--wp--preset--color--primary)`.

## 3. Reuse core blocks — never invent a custom block when a core block fits

The Pitch Found WP theme is built on core blocks (`core/group`, `core/columns`, `core/heading`, `core/paragraph`, `core/buttons`, `core/image`, `core/cover`, `core/navigation`). Map Figma elements to them:

| Figma | Core block |
|---|---|
| Frame (Auto Layout) | `core/group` with `layout.type` `flex` or `constrained` |
| Stack of columns | `core/columns` + `core/column` |
| Text (heading) | `core/heading` with `level` 1–6 |
| Text (body) | `core/paragraph` |
| Button | `core/button` (inside `core/buttons`) |
| Image | `core/image` (or `core/cover` if it's a background) |
| Navigation bar | `core/navigation` |
| Icon | `core/image` (SVG) — or inline SVG in a pattern PHP file |

Custom blocks are reserved for genuinely novel UI (interactive widgets, dynamic data). Static visual sections become **patterns**, not custom blocks.

## 4. File placement

| What you're generating | Where it goes |
|---|---|
| New design token | `theme.json` (add to `settings.color.palette` / `typography.fontSizes` / `spacing.spacingSizes`) |
| Page section (hero, pricing, feature grid) | `patterns/<slug>.php` |
| Reusable bar (header, footer) | `parts/<slug>.html` |
| Full page template | `templates/<slug>.html` |
| Raster Figma asset | `assets/img/<group>/<name>.png` — reference with `<?php echo esc_url( get_theme_file_uri( '/assets/img/...' ) ); ?>` |
| Vector Figma asset | inline SVG inside the pattern PHP file |
| PHP-only helper code | `functions.php` (keep it thin) |

Slug names: kebab-case, derived from the Figma frame name. `"Pricing / Tier / Pro"` → `pricing-tier-pro.php`. Pattern slug header inside the PHP file uses the namespaced form `<theme-slug>/pricing-tier-pro`.

## 5. Auto Layout → block layout mapping

Figma Auto Layout has a direct block-theme equivalent. Use this table — do not invent inline CSS.

| Figma | Block markup |
|---|---|
| Auto Layout (horizontal) | `core/group` with `"layout":{"type":"flex","flexWrap":"nowrap"}` |
| Auto Layout (vertical) | `core/group` with default constrained layout (vertical stacking) |
| Auto Layout (wrap) | `core/group` with `"layout":{"type":"flex","flexWrap":"wrap"}` |
| Gap | `style.spacing.blockGap` referencing `var:preset|spacing|<slug>` |
| Padding | `style.spacing.padding.{top,right,bottom,left}` |
| Align top/center/bottom | `verticalAlignment: top \| center \| bottom` |
| Justify start/center/end/space-between | `justifyContent: left \| center \| right \| space-between` |
| Constraints: stretch | `align: full` on the block |
| Absolute position | avoid — restructure with grid / columns instead |

**Default to flex layout via `core/group`.** Reach for `core/columns` only when Figma shows ≥2 explicit columns that should reflow to a stack on mobile.

## 6. Responsive

Figma frames are typically desktop-only. Generate sensible mobile and tablet adaptations automatically:

- Block themes get a lot of responsive behaviour for free (columns stack at `--wp--style--global--wide-size` breakpoints, fluid font sizes via `theme.json` `fluid: true`).
- Use **fluid font sizes** (already enabled in the scaffold) so headings shrink on mobile without per-breakpoint overrides.
- For unavoidable per-breakpoint tweaks, add CSS to `style.css` or a `style.css`-loaded asset and target classes you assign via the block's `className` attribute. Do **not** ship desktop-only padding values.

## 7. Text content

- **Preserve Figma's exact copy verbatim.** Do not paraphrase or "improve."
- Wrap user-facing strings in `<?php esc_html_e( '…', 'theme-slug' ); ?>` (or `esc_html__()` if you need the return value) so the theme stays translation-ready.
- If text appears templated (`{userName}`, `Lorem ipsum`), turn it into a block attribute or a `block.json` default that the client edits in the Site Editor.

## 8. Images and icons

- For **raster** Figma assets: export via MCP, save to `assets/img/<group>/<name>.png`, reference via `get_theme_file_uri()` inside a pattern, OR upload to the media library and reference by attachment ID when the client should be able to swap it.
- For **vector** icons: inline as SVG inside the pattern PHP. Do not link to external icon CDNs.
- If a Figma icon obviously matches a Dashicon (the WP-native icon set) or a common SVG library, prefer the existing icon over a one-off SVG.

## 9. Naming

- Pattern PHP filenames: `kebab-case.php`
- Pattern slugs (namespaced): `<theme-slug>/<pattern-slug>`
- Template / part filenames: `kebab-case.html`
- PHP function names: `<theme_slug>_<function_name>` (snake_case, prefixed to avoid collisions)
- Block `className` attributes: `kebab-case`
- `theme.json` slugs: `kebab-case`

## 10. Output discipline

Generate complete, working files. No partial snippets, no `// ...rest of pattern`, no placeholders. If a pattern is too long, split it into multiple smaller patterns and compose them in the template HTML via `<!-- wp:pattern {"slug":"…"} /-->`.

Every PHP file must:

- Start with `<?php` (or `<!--` for `.html` template files).
- Pass `php -l` syntax check.
- Escape user-facing strings with `esc_html_e` / `esc_attr` / `esc_url`.
- Use single quotes for plain PHP strings; double quotes only when interpolation is needed.

---

## Workflow

When given a Figma URL:

1. **Pull design context** via MCP on the selected node (`get_design_context`, `get_screenshot`, `get_metadata`, `get_variable_defs`).
2. **Read** `theme.json` and the existing `patterns/` directory to see what tokens and patterns already exist.
3. **Plan** the breakdown out loud (1–3 sentences): which existing patterns can I reuse? what new tokens are needed? what new pattern(s) does this become?
4. **Add new tokens** to `theme.json` if any — either by hand or by running `pitch-found figma-tokens <export.json> --write` if the design system has a Tokens Studio export.
5. **Add new patterns** to `patterns/<slug>.php` if any — scaffold each with `pitch-found add-pattern <slug>` so the header comment block is correct.
6. **Compose** them into the relevant template HTML (e.g. `templates/front-page.html`) via `<!-- wp:pattern {"slug":"<theme-slug>/<pattern-slug>"} /-->`.
7. **Stop and confirm** before wiring into navigation / menus.

### Pipeline helpers

The Pitch Found CLI provides two automation points:

| Command | What it does |
|---|---|
| `pitch-found add-pattern <slug>` | Creates `patterns/<slug>.php` with the right `Title:` / `Slug:` / `Categories:` header. Run from inside the theme directory; auto-detects the theme slug from `style.css`. |
| `pitch-found figma-tokens <input.json> [--write]` | Reads a Tokens Studio / W3C design-tokens JSON export, classifies leaf tokens by type, and emits a `settings` snippet for `theme.json` (or merges it in with `--write`). |

These commands automate the mechanical parts. The judgment parts — which section is one pattern vs. two, which copy is editable, what responsive behavior to keep — remain with the person (or agent) following this file.

---

## Anti-patterns

- ❌ Hardcoding hex colors, px values, or font sizes
- ❌ Inline `style="…"` where `var:preset|…|…` tokens would work
- ❌ Generating a new custom block when a core block + style variation would do
- ❌ Wrapping everything in `position: absolute` to match Figma pixels
- ❌ Inventing copy
- ❌ Skipping the mobile layout
- ❌ Outputting unescaped user-facing strings
- ❌ Modifying `wp-content/plugins/` — themes own the design, plugins own the behaviour

---

## Editable content

By default the **Site Editor** (Appearance → Editor in `/wp-admin`) lets the client edit any block. For tighter "can't break the layout" guarantees:

- **Lock blocks** in pattern markup so they can't be moved or removed:
  ```html
  <!-- wp:group {"lock":{"move":true,"remove":true}} -->
  ```
- **Lock the inner blocks** of a layout container via `templateLock` (`"templateLock":"all"` on a parent block).
- **Use ACF** (Advanced Custom Fields) for structured editing — field groups bound to pages or theme options, rendered by the pattern PHP via `the_field()` / `get_field()`. This is the closest WP equivalent to the schema-driven `/admin` on the Next.js side.

Anything that should stay fixed (footer disclaimers, legal copy) should remain hardcoded in the pattern PHP (no block, no ACF binding) — clients can't edit what isn't editable.
