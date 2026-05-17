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
# hands off to Bitnami's normal Apache start command.
set -e

THEME_SLUG=ciwa-final
SRC=/opt/bitnami/wordpress/wp-content/themes/${THEME_SLUG}
DST=/bitnami/wordpress/wp-content/themes/${THEME_SLUG}

if [ -d "$SRC" ]; then
	echo "[ciwa] runtime sync: $SRC -> $DST"
	mkdir -p "$DST"
	# Use cp -R with /. suffix to copy contents (not the directory itself).
	# We don't --delete because we don't want to wipe user-uploaded media
	# inside the theme dir (none expected, but defensive).
	cp -R "$SRC/." "$DST/"
	# Bitnami runs Apache as user 1 (daemon) after dropping privs, but the
	# wp-content tree is typically owned by daemon or root depending on
	# config. Just make sure files are world-readable.
	chmod -R u+rwX,go+rX "$DST" 2>/dev/null || true
	echo "[ciwa] theme sync complete"
else
	echo "[ciwa] WARN: source theme not found at $SRC — skipping sync"
fi

# Auto-activate the theme via wp-cli (idempotent — no-op if already active).
# Bitnami's image ships with wp-cli at /opt/bitnami/wp-cli/bin/wp.
WP_CLI=""
for candidate in /opt/bitnami/wp-cli/bin/wp /opt/bitnami/php/bin/wp $(command -v wp 2>/dev/null); do
	if [ -x "$candidate" ]; then WP_CLI="$candidate"; break; fi
done
if [ -n "$WP_CLI" ]; then
	echo "[ciwa] activating theme via $WP_CLI"
	"$WP_CLI" --allow-root --path=/bitnami/wordpress theme activate "$THEME_SLUG" 2>&1 || \
		echo "[ciwa] theme activate failed (likely already active or DB not ready)"
fi

# Hand off to Bitnami's Apache start command (the original CMD).
exec /opt/bitnami/scripts/wordpress/run.sh
