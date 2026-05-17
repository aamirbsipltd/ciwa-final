FROM bitnami/wordpress:latest

# Bitnami's image:
#   - Single container (Apache + PHP-FPM + WP, but their own clean Apache build)
#   - Auto-installs WordPress from env vars (no install wizard)
#   - Listens on 8080/8443 (non-root by design — can't bind 80 without privilege)
#   - Persistent data: /bitnami/wordpress (volume)
#   - WP install at: /opt/bitnami/wordpress (in-image)
#
# Required env vars on Railway (set in Variables tab):
#   WORDPRESS_DATABASE_HOST         = ${{MySQL.MYSQL_HOST}}
#   WORDPRESS_DATABASE_PORT_NUMBER  = ${{MySQL.MYSQL_PORT}}
#   WORDPRESS_DATABASE_USER         = ${{MySQL.MYSQL_USER}}
#   WORDPRESS_DATABASE_PASSWORD     = ${{MySQL.MYSQL_PASSWORD}}
#   WORDPRESS_DATABASE_NAME         = ${{MySQL.MYSQL_DATABASE}}
#   WORDPRESS_USERNAME              = ciwa-admin
#   WORDPRESS_PASSWORD              = (strong password)
#   WORDPRESS_EMAIL                 = aamir.farrukh@gmail.com
#   WORDPRESS_BLOG_NAME             = CIWA
#
# Railway Networking: set service port to 8080 (Bitnami's default), NOT 80.

USER root

# Bake the theme into bitnami's wp-content. On first boot Bitnami copies
# wp-content into the /bitnami/wordpress persistent volume.
COPY --chown=1001:1001 . /opt/bitnami/wordpress/wp-content/themes/ciwa-final/

# Sync the theme on every boot, so `git push` redeploys update the theme
# in the live volume (not just baked into the image).
COPY docker/bitnami-sync-theme.sh /opt/bitnami/scripts/wordpress/post-init.d/00-ciwa-sync-theme.sh
RUN chmod +x /opt/bitnami/scripts/wordpress/post-init.d/00-ciwa-sync-theme.sh

# Run as root so Bitnami's setup scripts can chown the Railway-mounted volume.
# Railway volumes are root-owned at mount time; Bitnami's default user 1001
# cannot write wp-config.php into them. Bitnami's entrypoint internally drops
# privileges to 1001 after permission fixes.
USER root
