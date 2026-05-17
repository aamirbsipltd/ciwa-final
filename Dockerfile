FROM wordpress:6.3.2-php8.0-apache

# No MPM fiddling. Trust the upstream image's default Apache config.
# If MPM problems persist with a vanilla install, we'll switch to a
# non-Apache base entirely (bitnami/wordpress on nginx).

# Bake the theme into the image (NOT into /var/www/html, which is a volume).
COPY --chown=www-data:www-data . /usr/src/ciwa-final-theme/

# Real entrypoint script (copies theme into the live wp-content on each boot).
COPY docker/entrypoint.sh /usr/local/bin/ciwa-entry.sh
RUN chmod +x /usr/local/bin/ciwa-entry.sh

ENTRYPOINT ["/usr/local/bin/ciwa-entry.sh"]
CMD ["apache2-foreground"]
