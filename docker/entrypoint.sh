#!/bin/bash
set -e

THEME_SRC=/usr/src/ciwa-final-theme
THEME_DST=/var/www/html/wp-content/themes/ciwa-final

# Sync theme on every boot — Railway mounts a persistent volume at
# /var/www/html, so we copy from the image into the volume each start.
if [ ! -d "$THEME_DST" ] || [ "$THEME_SRC/style.css" -nt "$THEME_DST/style.css" ]; then
	echo "[ciwa] syncing theme into wp-content..."
	mkdir -p "$THEME_DST"
	cp -R "$THEME_SRC/." "$THEME_DST/"
	chown -R www-data:www-data "$THEME_DST"
fi

# Default to apache2-foreground if invoked with no args, so a Railway-injected
# empty CMD can't strand the container.
if [ "$#" -eq 0 ]; then
	set -- apache2-foreground
fi

exec docker-entrypoint.sh "$@"
