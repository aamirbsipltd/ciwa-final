#!/bin/bash
# THIS SCRIPT IS NOT WIRED UP — kept only as documentation of an earlier
# attempt to wrap Bitnami's entrypoint.
#
# The current setup:
#   - Theme files reach the live volume via Railway's preDeployCommand
#     (set on the service via the GraphQL serviceInstanceUpdate mutation):
#       rm -rf /bitnami/wordpress/wp-content/themes/ciwa-final && \
#       cp -R /opt/bitnami/wordpress/wp-content/themes/ciwa-final \
#             /bitnami/wordpress/wp-content/themes/
#   - Bitnami volume persistence excludes themes via WORDPRESS_DATA_TO_PERSIST=
#     "wp-config.php wp-content/uploads wp-content/plugins"
#   - Theme activation is handled out-of-band by scripts/activate-theme.mjs
#     (logs into wp-admin over HTTP and hits the activate URL).
#
# Don't add new logic here — wire it into the Dockerfile CMD or Railway
# preDeployCommand instead. This file remains in the repo only so the
# Dockerfile reference doesn't break for anyone tracing history.
exit 0
