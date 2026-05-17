<?php
/**
 * Title: Hero
 * Slug: ciwa-final/hero
 * Categories: ciwa-final, featured
 * Description: Hero — canonical wp:group with theme-driven photo bg + gradient overlay + heading/paragraph/buttons. Pixel-aligned to Figma node 1:4292.
 * Keywords: hero, banner, landing
 * Block Types: core/post-content
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"align":"full","className":"ciwa-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-hero">

	<!-- wp:heading {"level":1,"className":"ciwa-hero-title"} -->
	<h1 class="wp-block-heading ciwa-hero-title"><?php esc_html_e( 'Empower Immigrant Women Enrich Canadian Society', 'ciwa-final' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"ciwa-hero-sub"} -->
	<p class="ciwa-hero-sub"><?php echo esc_html__( "The Canadian Immigrant Women\xE2\x80\x99s Association supports immigrant women and their families since 1982", 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"className":"ciwa-hero-ctas"} -->
	<div class="wp-block-buttons ciwa-hero-ctas">
		<!-- wp:button {"className":"ciwa-hero-cta-orange"} -->
		<div class="wp-block-button ciwa-hero-cta-orange"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Get Support', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"ciwa-hero-cta-purple"} -->
		<div class="wp-block-button ciwa-hero-cta-purple"><a class="wp-block-button__link wp-element-button" href="#donate"><?php esc_html_e( 'Donate Now', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
