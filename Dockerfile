FROM wordpress:6.6.2-php8.2-apache

# Force prefork MPM. Some image tags ship with both mpm_event and mpm_prefork
# loaded — first via a2enmod symlinks, second via a hardcoded LoadModule in a
# conf file — so a2dismod alone won't fix it. Comment out any rogue
# LoadModule mpm_event/mpm_worker lines anywhere under /etc/apache2.
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true \
  && a2enmod mpm_prefork \
  && grep -rIl --include="*.conf" --include="*.load" -E "^LoadModule mpm_(event|worker)_module" /etc/apache2 2>/dev/null \
       | xargs -r sed -i -E "s|^LoadModule mpm_(event\|worker)_module|#LoadModule mpm_\1_module|g" \
  && echo "Active MPM modules:" && ls /etc/apache2/mods-enabled/ | grep -i mpm || true

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
  '# Default to apache2-foreground if no args, so Railway CMD overrides cannot' \
  '# strand the container.' \
  'if [ "$#" -eq 0 ]; then set -- apache2-foreground; fi' \
  'exec docker-entrypoint.sh "$@"' \
  > /usr/local/bin/ciwa-entry.sh \
  && chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
