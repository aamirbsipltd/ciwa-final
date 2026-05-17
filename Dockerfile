FROM bitnami/wordpress:latest

# Bitnami's image:
#   - Single container (Apache + PHP-FPM + WP, but their own clean Apache build)
#   - Auto-installs WordPress from env vars (no install wizard)
#   - Listens on 8080 by default (Bitnami's port, can't be 80 without root bind)
#   - Persistent data: /bitnami/wordpress (Railway volume)
#   - WP install template: /opt/bitnami/wordpress (in-image)
#
# Required env vars on Railway (set in Variables tab):
#   WORDPRESS_DATABASE_HOST         = ${{MySQL.MYSQLHOST}}     (no underscore!)
#   WORDPRESS_DATABASE_PORT_NUMBER  = ${{MySQL.MYSQLPORT}}
#   WORDPRESS_DATABASE_USER         = ${{MySQL.MYSQLUSER}}
#   WORDPRESS_DATABASE_PASSWORD     = ${{MySQL.MYSQLPASSWORD}}
#   WORDPRESS_DATABASE_NAME         = ${{MySQL.MYSQLDATABASE}}
#   WORDPRESS_USERNAME              = ciwa-admin
#   WORDPRESS_PASSWORD              = (strong password)
#   WORDPRESS_EMAIL                 = aamir.farrukh@gmail.com
#   WORDPRESS_BLOG_NAME             = CIWA
#   WORDPRESS_SITE_URL              = https://<your-railway-app>.up.railway.app
#
# Railway Networking: set service domain target port to 8080.

# Run as root so Bitnami's setup scripts can chown the Railway-mounted volume.
USER root

# Bake the theme into bitnami's image themes directory. Bitnami copies the
# in-image wp-content to the persistent volume ONLY on first boot. Subsequent
# theme updates require the runtime sync script below.
COPY --chown=1001:1001 . /opt/bitnami/wordpress/wp-content/themes/ciwa-final/

# Install runtime sync script: runs every container start, syncs the
# in-image theme into the persistent volume, then exec's Bitnami's
# normal Apache start. This is what makes `git push` updates reach
# the live site instead of getting stuck on first-boot snapshot.
COPY docker/bitnami-runtime-sync.sh /opt/ciwa/runtime-sync.sh
RUN chmod +x /opt/ciwa/runtime-sync.sh

# Override Bitnami's default CMD (which was the apache start command) with
# our wrapper. Bitnami's ENTRYPOINT still runs first to do WP setup, then
# exec's CMD — i.e. our wrapper. Wrapper syncs theme then chains to run.sh.
CMD ["/opt/ciwa/runtime-sync.sh"]
