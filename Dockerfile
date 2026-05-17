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
