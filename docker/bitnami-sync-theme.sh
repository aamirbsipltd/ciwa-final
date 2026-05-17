#!/bin/bash
# Bitnami post-init hook: sync baked-in theme to the live wp-content volume.
# Runs on every container start after WP bootstrap completes.
set -e

THEME_SRC=/opt/bitnami/wordpress/wp-content/themes/ciwa-final
THEME_DST=/bitnami/wordpress/wp-content/themes/ciwa-final

if [ ! -d "$THEME_SRC" ]; then
	echo "[ciwa] WARN: source theme not found at $THEME_SRC, skipping sync"
	exit 0
fi

if [ ! -d "$THEME_DST" ] || [ "$THEME_SRC/style.css" -nt "$THEME_DST/style.css" ]; then
	echo "[ciwa] syncing theme: $THEME_SRC -> $THEME_DST"
	mkdir -p "$THEME_DST"
	cp -R "$THEME_SRC/." "$THEME_DST/"
fi

# Activate the theme via wp-cli (idempotent — does nothing if already active).
if command -v wp >/dev/null 2>&1; then
	wp --allow-root --path=/bitnami/wordpress theme activate ciwa-final 2>&1 || \
		echo "[ciwa] wp-cli theme activate failed (likely DB not ready yet, will retry next boot)"
fi
