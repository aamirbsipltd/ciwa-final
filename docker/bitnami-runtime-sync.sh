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
