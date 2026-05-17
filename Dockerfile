FROM wordpress:6.4-php8.1-apache

# Apache MPM cleanup.
# Some Apache images ship with rogue `LoadModule mpm_event_module` lines
# hardcoded into conf-enabled/ or apache2.conf, *in addition to* the standard
# mods-enabled/ symlink mechanism. That collision causes
# "AH00534: More than one MPM loaded".
#
# Fix: scrub LoadModule mpm_ lines from EVERYWHERE EXCEPT mods-available/,
# then re-enable prefork via the standard a2enmod mechanism. Leaving
# mods-available/ alone is critical — a2enmod creates symlinks pointing at
# files in mods-available/, so if we'd commented out LoadModule there too
# we'd end up with no MPM loaded at all.
RUN set -eux \
	&& for f in $(grep -rIl "^LoadModule mpm_" /etc/apache2 2>/dev/null | grep -v "/mods-available/"); do \
		echo "scrubbing rogue LoadModule mpm_ in: $f"; \
		sed -i "s|^LoadModule mpm_|#LoadModule mpm_|g" "$f"; \
	done || true \
	&& a2dismod mpm_event mpm_worker 2>/dev/null || true \
	&& a2enmod mpm_prefork \
	&& echo "=== mods-enabled mpm ===" \
	&& ls /etc/apache2/mods-enabled/ | grep mpm || true \
	&& echo "=== apache config test ===" \
	&& apache2ctl -t 2>&1 || true

# Bake the theme into the image
COPY --chown=www-data:www-data . /usr/src/ciwa-final-theme/

# Install the real entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/ciwa-entry.sh
RUN chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
