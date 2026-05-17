<?php
/**
 * Title: Follow Journey on Instagram
 * Slug: ciwa-final/instagram
 * Categories: ciwa-final
 * Description: IG strip — fully editable canonical blocks.
 * Keywords: instagram, social
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/instagram' );
?>
<!-- wp:group {"align":"full","className":"ciwa-ig","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-ig has-surface-cream-background-color has-background">

	<!-- wp:paragraph {"align":"center","textColor":"pink","className":"ciwa-ig-eyebrow"} -->
	<p class="has-text-align-center ciwa-ig-eyebrow has-pink-color has-text-color"><?php esc_html_e( 'FOLLOW US ON Instagram', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"textAlign":"center","textColor":"primary","className":"ciwa-ig-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-ig-h has-primary-color has-text-color"><?php esc_html_e( 'Follow Journey on Our Instagram', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","className":"ciwa-ig-grid"} -->
	<div class="wp-block-columns alignwide ciwa-ig-grid">
		<!-- wp:column {"className":"ciwa-ig-tile ciwa-ig-tile-lead"} -->
		<div class="wp-block-column ciwa-ig-tile ciwa-ig-tile-lead">
			<!-- wp:image --><figure class="wp-block-image"><img src="<?php echo esc_url( $uri . '/ig1.png' ); ?>" alt=""/></figure><!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"ciwa-ig-tile"} -->
		<div class="wp-block-column ciwa-ig-tile">
			<!-- wp:image --><figure class="wp-block-image"><img src="<?php echo esc_url( $uri . '/ig2.png' ); ?>" alt=""/></figure><!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"ciwa-ig-tile"} -->
		<div class="wp-block-column ciwa-ig-tile">
			<!-- wp:image --><figure class="wp-block-image"><img src="<?php echo esc_url( $uri . '/ig3.png' ); ?>" alt=""/></figure><!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"ciwa-ig-tile"} -->
		<div class="wp-block-column ciwa-ig-tile">
			<!-- wp:image --><figure class="wp-block-image"><img src="<?php echo esc_url( $uri . '/ig4.png' ); ?>" alt=""/></figure><!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"ciwa-ig-tile"} -->
		<div class="wp-block-column ciwa-ig-tile">
			<!-- wp:image --><figure class="wp-block-image"><img src="<?php echo esc_url( $uri . '/ig5.png' ); ?>" alt=""/></figure><!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="https://instagram.com/"><?php esc_html_e( 'VIEW ALL', 'ciwa-final' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
