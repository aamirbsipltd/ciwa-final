FROM wordpress:php8.3-apache

# Force prefork MPM to avoid the "More than one MPM loaded" startup crash
# that some debian-base apache images ship with.
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true \
  && a2enmod mpm_prefork

# Bake the theme into the image
COPY --chown=www-data:www-data . /usr/src/ciwa-final-theme/

# On first boot, copy theme into the live wp-content dir (which is a volume).
# This runs every container start but only copies if the theme dir is missing
# or older — so repo updates land in the running site after a redeploy.
RUN printf '%s\n' \
  '#!/bin/bash' \
  'set -e' \
  'THEME_DST=/var/www/html/wp-content/themes/ciwa-final' \
  'if [ ! -d "$THEME_DST" ] || [ /usr/src/ciwa-final-theme/style.css -nt "$THEME_DST/style.css" ]; then' \
  '  echo "[ciwa] syncing theme into wp-content..."' \
  '  mkdir -p "$THEME_DST"' \
  '  cp -R /usr/src/ciwa-final-theme/. "$THEME_DST/"' \
  '  chown -R www-data:www-data "$THEME_DST"' \
  'fi' \
  'exec docker-entrypoint.sh "$@"' \
  > /usr/local/bin/ciwa-entry.sh \
  && chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
