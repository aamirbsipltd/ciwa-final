FROM wordpress:6.4-php8.1-apache

# Nuclear MPM fix: wipe ALL mpm symlinks, recreate only mpm_prefork.
# Some image variants ship with both mpm_event and mpm_prefork enabled
# (via different mechanisms), so a2dismod alone won't fix it.
RUN set -eux \
	&& rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf \
	&& ln -sf ../mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load \
	&& ln -sf ../mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf \
	&& (grep -rIl "^LoadModule mpm_" /etc/apache2 2>/dev/null | xargs -r sed -i 's|^LoadModule mpm_|#LoadModule mpm_|g' || true) \
	&& echo "=== final mpm state ===" \
	&& ls /etc/apache2/mods-enabled/ | grep -i mpm \
	&& apache2ctl -t 2>&1 || true

# Bake the theme into the image
COPY --chown=www-data:www-data . /usr/src/ciwa-final-theme/

# Install the real entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/ciwa-entry.sh
RUN chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
