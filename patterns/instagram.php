<?php
/**
 * Title: Follow Journey on Instagram
 * Slug: ciwa-final/instagram
 * Categories: ciwa-final
 * Description: IG section — eyebrow + heading + 5-tile grid + 2 CTAs. Canonical blocks.
 * Keywords: instagram, social
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/instagram' );
$tiles = array( 'ig1.png', 'ig2.png', 'ig3.png', 'ig4.png', 'ig5.png' );
?>
<!-- wp:group {"align":"full","className":"ciwa-ig","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-ig has-surface-cream-background-color has-background">

	<!-- wp:paragraph {"align":"center","className":"ciwa-ig-eyebrow"} -->
	<p class="has-text-align-center ciwa-ig-eyebrow"><?php esc_html_e( 'FOLLOW US ON INSTAGRAM', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-ig-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-ig-h"><?php esc_html_e( 'FOLLOW OUR JOURNEY ON', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'INSTAGRAM', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"ciwa-ig-grid","layout":{"type":"grid","columnCount":5}} -->
	<div class="wp-block-group alignwide ciwa-ig-grid">
	<?php foreach ( $tiles as $t ) : ?>
		<!-- wp:image {"sizeSlug":"full","className":"ciwa-ig-tile"} -->
		<figure class="wp-block-image size-full ciwa-ig-tile"><img src="<?php echo esc_url( $uri . '/' . $t ); ?>" alt=""/></figure>
		<!-- /wp:image -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-ig-cta-wrap"} -->
	<div class="wp-block-buttons ciwa-ig-cta-wrap">
		<!-- wp:button {"className":"ciwa-ig-cta ciwa-ig-cta-fill"} -->
		<div class="wp-block-button ciwa-ig-cta ciwa-ig-cta-fill"><a class="wp-block-button__link wp-element-button" href="https://instagram.com/"><?php esc_html_e( 'VIEW ALL', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"ciwa-ig-cta ciwa-ig-cta-outline"} -->
		<div class="wp-block-button ciwa-ig-cta ciwa-ig-cta-outline"><a class="wp-block-button__link wp-element-button" href="https://instagram.com/"><?php esc_html_e( 'FOLLOW US ON INSTAGRAM', 'ciwa-final' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
