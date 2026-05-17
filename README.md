# Ciwa Final

A WordPress block theme scaffolded by **Pitch Found**.

## Run locally

No PHP, no MySQL — `wp-now` boots WordPress in PHP-WASM with SQLite and mounts this directory as the active theme.

```bash
npm install
npm run dev
```

A browser tab opens at `http://localhost:8881` with WordPress already running this theme. Stop it with `Ctrl+C`.

## What's inside

```
.
├── style.css          # theme header metadata
├── theme.json         # design tokens (color / type / spacing)
├── functions.php      # pattern category + asset enqueue
├── index.php          # silence-is-golden fallback
├── templates/         # full-page block templates (FSE)
│   ├── index.html     # blog listing
│   ├── front-page.html
│   └── page.html
├── parts/             # reusable template parts
│   ├── header.html
│   └── footer.html
└── patterns/          # block patterns = Figma "sections"
    ├── hero.php
    ├── features.php
    └── cta.php
```

## The Pitch Found mapping

| Figma | WordPress block theme |
|---|---|
| Variables (colors, type, spacing) | `theme.json` palettes |
| Primitive (Button, Card) | Core block + style variation |
| Section / frame | Block pattern in `patterns/` |
| Page | HTML template in `templates/` |
| Auto Layout | `core/group` + `core/columns` with `flex` layout |

Read `RULES-WP.md` at the repo root for the full conversion contract.

## Converting Figma frames

For each frame the design references:

1. Pull design context via the Figma MCP (`get_design_context`, `get_screenshot`).
2. Add any new tokens to `theme.json`.
3. Build the section as a block pattern under `patterns/<slug>.php`.
4. Reference the pattern from the relevant template (e.g. `front-page.html`).

## Editable content

By default the Site Editor (Appearance → Editor in `/wp-admin`) lets the client edit any block. If you need the "can't break the layout" guarantee:

- Lock blocks via `{"lock":{"move":true,"remove":true}}` in the block markup.
- For text/image-only edits, consider an ACF plugin layer (see `RULES-WP.md`).

## Deploy

This theme is portable — zip the directory and upload to any WordPress host, or push to a managed host (WP Engine, Kinsta, Pressable) via Git. The `wp-now` runtime is for local dev only.
