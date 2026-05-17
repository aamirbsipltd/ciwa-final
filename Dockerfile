FROM wordpress:6.9-php8.3-apache

# Bake the theme into the image
COPY --chown=www-data:www-data . /usr/src/ciwa-final-theme/

# On first boot, copy theme into the live wp-content dir (which is a volume).
# This runs every container start but only copies if the theme dir is missing
# or older — so repo updates land in the running site after a redeploy.
RUN echo '#!/bin/bash\n\
set -e\n\
THEME_DST=/var/www/html/wp-content/themes/ciwa-final\n\
if [ ! -d "$THEME_DST" ] || [ /usr/src/ciwa-final-theme/style.css -nt "$THEME_DST/style.css" ]; then\n\
  echo "[ciwa] syncing theme into wp-content..."\n\
  mkdir -p "$THEME_DST"\n\
  cp -R /usr/src/ciwa-final-theme/. "$THEME_DST/"\n\
  chown -R www-data:www-data "$THEME_DST"\n\
fi\n\
exec docker-entrypoint.sh "$@"' > /usr/local/bin/ciwa-entry.sh \
  && chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
