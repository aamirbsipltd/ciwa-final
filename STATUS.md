# CIWA Project — Pipeline Status Report

_Generated: 2026-05-17. Live URL: https://ciwa-final-production.up.railway.app_

## 1. Architecture summary

- **Figma → WP path is manual + assisted by Figma MCP**. Section node IDs are extracted from `mcp__plugin_figma_figma__get_metadata` and `get_design_context` calls; values (colors, font sizes, padding px, border-radii) are read off the returned React+Tailwind reference code, then hand-translated into WP block-pattern PHP files and CSS. No Figma REST API direct integration, no plugin, no automated codegen — the MCP returns design context, I translate it.
- **There is no intermediate representation (no JSON manifest / AST)**. The pattern PHP files are the "source"; they emit canonical Gutenberg block markup (`<!-- wp:heading … -->` etc.) at request time. Each pattern is registered automatically by WP's `register_block_pattern` from PHP files under `/patterns/` because the file headers declare `Slug:` and `Categories:`.
- **Block strategy: 100% WP core blocks** (`wp:group`, `wp:columns`, `wp:column`, `wp:heading`, `wp:paragraph`, `wp:image`, `wp:buttons`, `wp:button`, `wp:cover`, `wp:html` for forms only). **No custom blocks, no ACF, no `@wordpress/scripts`.** Each block carries a `className="ciwa-*"` and all visual styling is in `style.css`.
- **`theme.json` is hand-written**, not derived from Figma Variables. Colors / typography scale / spacing scale are manually pasted in. There is no token-import step.
- **Build toolchain: none for the theme itself.** No webpack/Vite/SCSS — `style.css` is hand-written CSS shipped as-is. `package.json` only declares `@wp-now/wp-now` as a devDependency for optional local development. There is no `build/` or `dist/` output to ship.

## 2. Deployment state

**Image family: Bitnami WordPress (switched from `wordpress:php8.x-apache` after MPM crashloop).** Single container running Apache + PHP-FPM + WP. Listens on port **8080** (Bitnami runs as UID 1001, can't bind 80). Railway domain `ciwa-final-production.up.railway.app` routes 443→8080.

### `/Dockerfile` (full)

```dockerfile
FROM bitnami/wordpress:latest

# Bitnami's image:
#   - Single container (Apache + PHP-FPM + WP)
#   - Auto-installs WordPress from env vars (no install wizard)
#   - Listens on 8080 (non-root design — port 80 not bindable)
#   - Persistent data: /bitnami/wordpress (Railway volume)
#   - WP install template: /opt/bitnami/wordpress (in-image)
#
# Required env vars on Railway (Variables tab):
#   WORDPRESS_DATABASE_HOST         = ${{MySQL.MYSQLHOST}}      (no underscore!)
#   WORDPRESS_DATABASE_PORT_NUMBER  = ${{MySQL.MYSQLPORT}}
#   WORDPRESS_DATABASE_USER         = ${{MySQL.MYSQLUSER}}
#   WORDPRESS_DATABASE_PASSWORD     = ${{MySQL.MYSQLPASSWORD}}
#   WORDPRESS_DATABASE_NAME         = ${{MySQL.MYSQLDATABASE}}
#   WORDPRESS_USERNAME              = ciwa-admin
#   WORDPRESS_PASSWORD              = (strong password)
#   WORDPRESS_EMAIL                 = aamir.farrukh@gmail.com
#   WORDPRESS_BLOG_NAME             = CIWA
#   WORDPRESS_SITE_URL              = https://<railway>.up.railway.app
#
# Theme updates on redeploy:
#   Bitnami only copies wp-content -> volume on FIRST boot. To force the
#   updated theme into the volume on every redeploy, set Railway's
#   preDeployCommand to:
#       cp -R /opt/bitnami/wordpress/wp-content/themes/ciwa-final/. \
#             /bitnami/wordpress/wp-content/themes/ciwa-final/
#   This runs in a fresh container BEFORE Apache starts each deploy.

# Run as root so Bitnami's setup can chown the Railway-mounted volume.
USER root

# Bake the theme into bitnami's wp-content template.
COPY --chown=1001:1001 . /opt/bitnami/wordpress/wp-content/themes/ciwa-final/
```

**Note:** The Dockerfile no longer overrides CMD. Theme sync now happens via:

1. **Railway `preDeployCommand`** (set via GraphQL `serviceInstanceUpdate`, the `railway` CLI doesn't expose it):

   ```
   rm -rf /bitnami/wordpress/wp-content/themes/ciwa-final && \
   cp -R /opt/bitnami/wordpress/wp-content/themes/ciwa-final /bitnami/wordpress/wp-content/themes/
   ```

2. **Bitnami `WORDPRESS_DATA_TO_PERSIST`** env var set to `wp-config.php wp-content/uploads wp-content/plugins` — themes are excluded from the persistent volume so every container boot pulls the latest theme from the image.

### `/docker/bitnami-runtime-sync.sh` (full — currently NOT wired up; left in repo as fallback)

```bash
#!/bin/bash
# Bitnami WP runs setup.sh during its entrypoint, which populates
# /bitnami/wordpress (persistent volume) from /opt/bitnami/wordpress
# only when the volume is empty (first boot). On every subsequent
# redeploy, the volume already has WP installed and Bitnami SKIPS
# the copy — so a `git push` that updates theme files in the image
# would never reach the live site.
#
# This wrapper script runs AFTER Bitnami's setup.sh has populated
# /bitnami/wordpress, and FORCEFULLY syncs the latest theme files
# from the image into the volume on every container start. It then
# hands off to Bitnami's normal Apache start command (whose path
# varies across Bitnami image versions, so we discover it).
set -e

THEME_SLUG=ciwa-final
SRC=/opt/bitnami/wordpress/wp-content/themes/${THEME_SLUG}
DST=/bitnami/wordpress/wp-content/themes/${THEME_SLUG}

if [ -d "$SRC" ]; then
	echo "[ciwa] runtime sync: $SRC -> $DST"
	mkdir -p "$DST"
	cp -R "$SRC/." "$DST/"
	chmod -R u+rwX,go+rX "$DST" 2>/dev/null || true
	echo "[ciwa] theme sync complete"
else
	echo "[ciwa] WARN: source theme not found at $SRC — skipping sync"
fi

# Activate the theme via wp-cli. Bitnami's WP install root has shifted
# across versions — try both common locations.
WP_PATH=""
for p in /bitnami/wordpress /opt/bitnami/wordpress; do
	if [ -f "$p/wp-config.php" ] || [ -f "$p/wp-load.php" ]; then WP_PATH="$p"; break; fi
done
if [ -n "$WP_PATH" ]; then
	WP_CLI=""
	for candidate in /opt/bitnami/wp-cli/bin/wp /opt/bitnami/php/bin/wp $(command -v wp 2>/dev/null); do
		if [ -x "$candidate" ]; then WP_CLI="$candidate"; break; fi
	done
	if [ -n "$WP_CLI" ]; then
		echo "[ciwa] activating theme via $WP_CLI --path=$WP_PATH"
		"$WP_CLI" --allow-root --path="$WP_PATH" theme activate "$THEME_SLUG" 2>&1 || \
			echo "[ciwa] theme activate failed (likely already active)"
	fi
else
	echo "[ciwa] WP install path not found — skipping wp-cli activation"
fi

# Hand off to Bitnami's actual run script. The path varies between
# image generations (sometimes wordpress/, sometimes apache/, sometimes
# apache-modphp/), so discover the right one.
RUN_CMD=""
for candidate in \
	/opt/bitnami/scripts/wordpress/run.sh \
	/opt/bitnami/scripts/apache/run.sh \
	/opt/bitnami/scripts/apache-modphp/run.sh \
	/opt/bitnami/scripts/php-fpm/run.sh; do
	if [ -x "$candidate" ]; then
		echo "[ciwa] chaining to $candidate"
		RUN_CMD="$candidate"; break
	fi
done

if [ -n "$RUN_CMD" ]; then
	exec "$RUN_CMD"
else
	# Last-resort: just start apache directly if it's installed.
	echo "[ciwa] FATAL: no Bitnami run script found, trying apache2-foreground"
	exec /opt/bitnami/apache/bin/httpd -f /opt/bitnami/apache/conf/httpd.conf -DFOREGROUND
fi
```

### `wp-config.php`

**Not in the repo.** Bitnami generates it at runtime at `/bitnami/wordpress/wp-config.php` inside the container using the `WORDPRESS_DATABASE_*` env vars (`MYSQL.MYSQLHOST` etc.). I do not have shell access inside the container to dump it (`railway run` executes locally with env injected, not in-container; the sandbox blocks `railway variable list` for credentials).

Confirmed via `railway run` (env vars resolve correctly):

- `WORDPRESS_SITE_URL=https://ciwa-final-production.up.railway.app` — set as a Railway service env var
- `WORDPRESS_BLOG_NAME=CIWA`
- `WORDPRESS_DATABASE_HOST=mysql.railway.internal`

**`WP_HOME` and `WP_SITEURL` are not explicitly set in wp-config.php.** Bitnami's auto-generated wp-config.php uses `WORDPRESS_SITE_URL` env var to populate the `siteurl` option on first install, but does NOT define the `WP_HOME` / `WP_SITEURL` constants. So URLs are stored in the `wp_options` table (mutable in wp-admin) and derived from the request host. The Railway domain is fixed per service so this works, but if the domain changes the DB needs an update.

## 3. CSS enqueue diagnostics

### `/functions.php` (full)

```php
<?php
/**
 * Ciwa Final — theme functions.
 *
 * Tokens live in theme.json; sections live as block patterns in /patterns;
 * templates live as block markup in /templates and /parts.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ciwa_final_setup' ) ) {
	function ciwa_final_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		// Load the theme's frontend stylesheet INSIDE the Gutenberg editor iframe
		// so blocks render with the same .ciwa-* styling the visitor sees.
		// Without this, the editor shows unstyled / default-Gutenberg-styled blocks.
		add_editor_style( array(
			'https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins:wght@300;400;500;600;700&display=swap',
			'style.css',
		) );

		register_block_pattern_category(
			'ciwa-final',
			array( 'label' => __( 'CIWA', 'ciwa-final' ) )
		);
	}
}
add_action( 'after_setup_theme', 'ciwa_final_setup' );

function ciwa_final_enqueue_assets() {
	wp_enqueue_style(
		'ciwa-final-fonts',
		'https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'ciwa-final-style',
		get_stylesheet_uri(),
		array( 'ciwa-final-fonts' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ciwa_final_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'ciwa_final_enqueue_assets' );

// Auto-seed 19 WP Pages from Figma text inventories on theme activation.
require_once get_template_directory() . '/includes/seed-pages.php';
```

### Custom Gutenberg block (block.json / edit.js / save.js / style.scss)

**There are none.** Project uses 100% WP core blocks composed into PHP **block patterns** under `/patterns/`. Block patterns are PHP files that emit Gutenberg block markup at registration; they do not have `block.json`, `edit.js`, or `save.js`. The patterns are auto-registered by WP from file headers.

For one representative pattern (`/patterns/hero.php`) — the closest analog to a "block" in this codebase:

```php
<?php
/**
 * Title: Hero
 * Slug: ciwa-final/hero
 * Categories: ciwa-final, featured
 * Description: Hero — cover with photo bg + gradient overlay + canonical heading/paragraph/buttons. Pixel-aligned to Figma node 1:4292.
 * Keywords: hero, banner, landing
 * Block Types: core/post-content
 * Viewport Width: 1280
 */
$hero_img = get_theme_file_uri( '/assets/img/hero/figma-hero.png' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $hero_img ); ?>","dimRatio":0,"focalPoint":{"x":0.7,"y":0.5},"minHeight":720,"contentPosition":"center left","isDark":false,"align":"full","className":"ciwa-hero"} -->
<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-center-left ciwa-hero" style="min-height:720px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $hero_img ); ?>" style="object-position:70% 50%" data-object-fit="cover" data-object-position="70% 50%"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:heading {"level":1,"className":"ciwa-hero-title"} -->
		<h1 class="wp-block-heading ciwa-hero-title"><?php esc_html_e( 'Empower Immigrant Women Enrich Canadian Society', 'ciwa-final' ); ?></h1>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"className":"ciwa-hero-sub"} -->
		<p class="ciwa-hero-sub"><?php echo esc_html__( "The Canadian Immigrant Women\xE2\x80\x99s Association supports immigrant women and their families since 1982", 'ciwa-final' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:buttons {"className":"ciwa-hero-ctas"} -->
		<div class="wp-block-buttons ciwa-hero-ctas">
			<!-- wp:button {"className":"ciwa-hero-cta-orange"} -->
			<div class="wp-block-button ciwa-hero-cta-orange"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Get Support', 'ciwa-final' ); ?> &rsaquo;</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"ciwa-hero-cta-purple"} -->
			<div class="wp-block-button ciwa-hero-cta-purple"><a class="wp-block-button__link wp-element-button" href="#donate"><?php esc_html_e( 'Donate Now', 'ciwa-final' ); ?> &rsaquo;</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
</div>
<!-- /wp:cover -->
```

The matching CSS rules for this pattern live in `/style.css` (1742 lines total), keyed by `.ciwa-hero`, `.ciwa-hero-title`, `.ciwa-hero-sub`, `.ciwa-hero-cta-orange`, `.ciwa-hero-cta-purple`, `.wp-block-cover.ciwa-hero`, etc.

### Build output included in theme sync?

**There is no build output.** The Dockerfile `COPY --chown=1001:1001 . /opt/bitnami/wordpress/wp-content/themes/ciwa-final/` copies the **raw repo** (minus `.dockerignore` exclusions: `node_modules`, `package.json`, `package-lock.json`, `.git`, `.gitignore`, `README.md`, `RULES.md`, `*.zip`, `.DS_Store`). `style.css` ships hand-written. No transpile, no minify.

### Stylesheets requested on the live home page (`curl` of `/`)

```
LINK https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins:wght@300;400;500;600;700&display=swap
LINK https://ciwa-final-production.up.railway.app/wp-content/themes/ciwa-final/style.css?ver=0.8.0
```

Status codes (`curl -I`):

| URL | Status |
|---|---|
| `…/style.css?ver=0.8.0` | **200** (81 695 bytes) |
| `https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins…` | **200** |
| `…/assets/img/logo/logo.png` | **200** |
| `…/assets/img/hero/figma-hero.png` | **200** |
| `…/assets/img/welcome/collage.png` | **200** |

**No 404s on the frontend.** All assets are served. That means the user's complaint about "CSS not rendering" is not a 404 — it's something else:

- **Inside the editor iframe**, my `add_editor_style()` includes a Google Fonts URL. The editor iframe is sandboxed with a restrictive CSP that **may block the external font CSS** even though `add_editor_style` injects the `<link>` — Chrome's iframe console would report `Refused to load the stylesheet … because it violates the Content Security Policy`. I have not verified this directly because I cannot read the editor iframe's network log from outside.
- Plus WP's default editor iframe applies its own min-width / responsive scaling that may collapse columns at 700-900px effective width even when the host browser viewport is 1920px.

Beyond the two `<link>` tags, ~20 **inline `<style>` blocks** are injected by WP core for individual block styles (`wp-block-cover-inline-css`, `wp-block-columns-inline-css`, `global-styles-inline-css` from theme.json, etc.). Those load fine.

## 4. `theme.json` (full)

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 3,
  "settings": {
    "appearanceTools": true,
    "layout": { "contentSize": "880px", "wideSize": "1280px" },
    "useRootPaddingAwareAlignments": true,
    "color": {
      "defaultPalette": false,
      "defaultGradients": false,
      "custom": true,
      "customDuotone": false,
      "palette": [
        { "slug": "background",   "name": "Background",    "color": "#ffffff" },
        { "slug": "surface-pink", "name": "Surface pink",  "color": "#fde9f1" },
        { "slug": "surface-cream","name": "Surface cream", "color": "#fff5ec" },
        { "slug": "surface-1",    "name": "Surface 1",     "color": "#f6f6f8" },
        { "slug": "text",         "name": "Text",          "color": "#1a1a1a" },
        { "slug": "text-muted",   "name": "Text muted",    "color": "#5b5b66" },
        { "slug": "text-light",   "name": "Text light",    "color": "#ffffff" },
        { "slug": "border",       "name": "Border",        "color": "#e6dce4" },
        { "slug": "primary",      "name": "Primary",       "color": "#6a1753" },
        { "slug": "primary-fg",   "name": "Primary fg",    "color": "#ffffff" },
        { "slug": "primary-deep", "name": "Primary deep",  "color": "#4b0e3a" },
        { "slug": "pink",         "name": "Pink",          "color": "#e22371" },
        { "slug": "pink-soft",    "name": "Pink soft",     "color": "#f9c3d5" },
        { "slug": "orange",       "name": "Orange",        "color": "#f68b3c" },
        { "slug": "orange-deep",  "name": "Orange deep",   "color": "#e07a2c" }
      ]
    },
    "typography": {
      "defaultFontSizes": false,
      "fluid": true,
      "fontFamilies": [
        { "slug": "display", "name": "Aboreto", "fontFamily": "Aboreto, 'Cormorant Garamond', Georgia, serif" },
        { "slug": "sans",    "name": "Poppins", "fontFamily": "Poppins, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif" },
        { "slug": "mono",    "name": "Mono",    "fontFamily": "ui-monospace, SFMono-Regular, Menlo, Consolas, monospace" }
      ],
      "fontSizes": [
        { "slug": "xs",   "name": "XS",    "size": "0.8125rem" },
        { "slug": "sm",   "name": "Small", "size": "0.9375rem" },
        { "slug": "base", "name": "Base",  "size": "1.125rem", "fluid": { "min": "1rem",     "max": "1.125rem" } },
        { "slug": "lg",   "name": "Large", "size": "1.375rem", "fluid": { "min": "1.125rem", "max": "1.375rem" } },
        { "slug": "xl",   "name": "XL",    "size": "1.75rem",  "fluid": { "min": "1.375rem", "max": "1.75rem"  } },
        { "slug": "2xl",  "name": "2XL",   "size": "2.25rem",  "fluid": { "min": "1.75rem",  "max": "2.25rem"  } },
        { "slug": "3xl",  "name": "3XL",   "size": "2.625rem", "fluid": { "min": "2rem",     "max": "2.625rem" } },
        { "slug": "4xl",  "name": "4XL",   "size": "3.25rem",  "fluid": { "min": "2.25rem",  "max": "3.25rem"  } },
        { "slug": "5xl",  "name": "5XL",   "size": "4rem",     "fluid": { "min": "2.5rem",   "max": "4rem"     } }
      ]
    },
    "spacing": {
      "defaultSpacingSizes": false,
      "units": ["px", "rem", "%", "vw", "vh"],
      "spacingSizes": [
        { "slug": "1",  "name": "1",  "size": "0.25rem" },
        { "slug": "2",  "name": "2",  "size": "0.5rem"  },
        { "slug": "3",  "name": "3",  "size": "0.75rem" },
        { "slug": "4",  "name": "4",  "size": "1rem"    },
        { "slug": "5",  "name": "5",  "size": "1.25rem" },
        { "slug": "6",  "name": "6",  "size": "1.5rem"  },
        { "slug": "8",  "name": "8",  "size": "2rem"    },
        { "slug": "10", "name": "10", "size": "2.5rem"  },
        { "slug": "12", "name": "12", "size": "3rem"    },
        { "slug": "16", "name": "16", "size": "4rem"    },
        { "slug": "20", "name": "20", "size": "5rem"    },
        { "slug": "24", "name": "24", "size": "6rem"    },
        { "slug": "32", "name": "32", "size": "8rem"    }
      ]
    },
    "border": { "color": true, "radius": true, "style": true, "width": true }
  },
  "styles": {
    "color": {
      "background": "var(--wp--preset--color--background)",
      "text": "var(--wp--preset--color--text)"
    },
    "typography": {
      "fontFamily": "var(--wp--preset--font-family--sans)",
      "fontSize": "var(--wp--preset--font-size--base)",
      "lineHeight": "1.55"
    },
    "spacing": {
      "padding": { "top": "0", "right": "var(--wp--preset--spacing--6)", "bottom": "0", "left": "var(--wp--preset--spacing--6)" }
    },
    "elements": {
      "heading": {
        "typography": { "fontFamily": "var(--wp--preset--font-family--display)", "fontWeight": "400", "lineHeight": "1.2", "letterSpacing": "-0.01em" },
        "color": { "text": "var(--wp--preset--color--primary)" }
      },
      "h1": { "typography": { "fontSize": "var(--wp--preset--font-size--5xl)", "fontWeight": "400" } },
      "h2": { "typography": { "fontSize": "var(--wp--preset--font-size--4xl)", "fontWeight": "400" } },
      "h3": { "typography": { "fontSize": "var(--wp--preset--font-size--2xl)" } },
      "h4": { "typography": { "fontSize": "var(--wp--preset--font-size--xl)"  } },
      "link": {
        "color": { "text": "var(--wp--preset--color--primary)" },
        ":hover": { "typography": { "textDecoration": "underline" } }
      },
      "button": {
        "color": { "background": "var(--wp--preset--color--orange)", "text": "var(--wp--preset--color--text-light)" },
        "border": { "radius": "14px" },
        "spacing": { "padding": { "top": "var(--wp--preset--spacing--4)", "bottom": "var(--wp--preset--spacing--4)", "left": "var(--wp--preset--spacing--8)", "right": "var(--wp--preset--spacing--8)" } },
        "typography": { "fontFamily": "var(--wp--preset--font-family--display)", "fontWeight": "400", "fontSize": "var(--wp--preset--font-size--base)" }
      }
    }
  },
  "templateParts": [
    { "name": "header", "title": "Header", "area": "header" },
    { "name": "footer", "title": "Footer", "area": "footer" }
  ],
  "customTemplates": [
    { "name": "page", "title": "Page", "postTypes": ["page"] }
  ]
}
```

### What's mapped from Figma → theme.json vs missing

**Mapped (hand-pasted):**

- Color palette: 15 named colors covering Figma's surface / text / primary / accent tokens.
- Typography font families: Aboreto + Poppins fallback stacks.
- Font size scale: xs → 5xl, fluid-responsive.
- Spacing scale: 13 step-sizes (0.25rem → 8rem).

**Missing (Figma has them, theme.json doesn't):**

- **Figma Variables not actually imported.** Every value above is hand-typed from looking at Figma renders or `get_design_context` output. There is no `figma-tokens` script run that wrote theme.json. The pitch-found CLI has a `figma-tokens` command (in `c:\Users\aamir\pitch-found\bin\cli.mjs`) but it outputs only theme.json fragments and was not run for this project.
- **Gradients** — the Figma hero has a 99°-angle cream→transparent gradient; theme.json has `defaultGradients: false` and no custom gradient presets. Hero gradient is hand-coded in style.css.
- **Per-block style variations** — no `blocks: { core/button: { variations: { ... } } }` defined. All button color variants (orange CTA, purple CTA, white pill, outline) are CSS classes in style.css, not theme.json variations.
- **Font face loading** — `fontFamilies` declares names + fallback strings but **no `fontFace` entries pointing at `.woff2` files**. Aboreto and Poppins are loaded via the external Google Fonts URL, which works on the frontend but is fragile in the editor iframe (CSP / cross-origin).
- **Shadow tokens** — Figma defines drop-shadows on cards / arrows / badges; no `shadow` presets in theme.json.

## 5. What works vs what's broken

### Renders correctly on the live frontend (verified via screenshots)

- **Header**: pink notice bar, cream row with CIWA logo + search + 3 CTAs, purple navbar with proper-case items (Home, About CIWA, Get Involve, Programs & Services, News & Events, CIWA Compass, Contact), EN globe.
- **How Help carousel**: 3 colored cards (purple/pink/orange) visible side-by-side + 4th coral peeking, pink halo arrows, pagination dots.
- **Programs section**: 2×3 grid of cards with colored borders + icons, headings, body, "Learn More" links.
- **Events section**: 3 horizontal cards with photo + pink circular date badge + meta + title + body + Read More.
- **OUR IMPACT**: purple intro card with heading + body + orange CTA, plus 2×2 stat cards with colored borders + numbers.
- **Instagram**: 5-tile grid + dual CTA (filled orange + orange-outline).
- **Map**: image with map.
- **Frontend stylesheet** is served as `style.css?ver=0.8.0` (HTTP 200), with version-bump cache-busting on each push.

### Known broken / stubbed / unimplemented

- **Hero (frontend)**: solid-cream gradient overlay over the left half is not visibly hiding the photo behind the heading. Heading text overlaps the woman's face. The `wp-block-cover__background` span has my `linear-gradient` + `opacity: 1` rule with multiple `!important` selectors, but visual output suggests either Bitnami volume cache is serving older CSS to some users OR WP-core's own `has-background-dim-0` rule is paint-order-winning. **Not yet diagnosed.**
- **Gutenberg editor view** (user's screenshot): both hero buttons render orange (purple CTA color rule not applying inside the iframe), cover element is much shorter than 720px, fonts look serif (Aboreto fallback Cormorant Garamond — Google Fonts CSS not effectively loaded into the iframe). User describes it as "smudged, stretched, CSS not rendering."
- **Voices section heading** at narrow widths (editor's iframe is ~700-900px effective): "OUR / COMMUNITY" stacks awkwardly because the intro column is `width:30%`, leaving ~210px for an `<h2>` that wants to fit "VOICES FROM OUR COMMUNITY" on two lines.
- **Welcome section** in some renders shows the pink+text-only on its own and the purple+photo column wrapping below (mobile-like stacking) even on desktop viewports — `wp:columns` with explicit `flex-basis:50%` should hold but is intermittent.
- **Figma Variables not auto-imported**. All tokens are hand-pasted into theme.json. There is no token-sync script wired up.
- **No visual-regression API** in the pipeline. Pixel deltas are diagnosed by me eyeballing cropped screenshots — no Percy / Argos / Chromatic / Loki integration.
- **No custom Gutenberg block** anywhere in the project despite the report's question implying one might exist. All sections are PHP block patterns emitting core-block markup.
- **wp-cli activation step** in `bitnami-runtime-sync.sh` is dead code (not wired into the container's CMD). Theme activation is currently handled by HTTP login + clicking the activate URL via `scripts/activate-theme.mjs`.

### Figma source of truth

- File: `https://www.figma.com/design/MYdtSFIun4e9CBUD4YthOQ/CIWA-Updated-Pages--Copy-`
- File key: **`MYdtSFIun4e9CBUD4YthOQ`**
- Home page frame node id: **`1:4229`** (1920 × 12642 px)
- Hero sub-frame node id: **`1:4292`** (used for the hero's `get_design_context` call)
