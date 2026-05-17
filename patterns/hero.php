<?php
/**
 * Title: Hero
 * Slug: ciwa-final/hero
 * Categories: ciwa-final, featured
 * Description: Hero — cover with photo bg + gradient overlay + canonical heading/paragraph/buttons. Pixel-aligned to Figma node 1:4292.
 * Keywords: hero, banner, landing
 * Block Types: core/post-content
 * Viewport Width: 1280
 */
$hero_img = get_theme_file_uri( '/assets/img/hero/figma-hero.png' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $hero_img ); ?>","dimRatio":100,"customGradient":"linear-gradient(95deg,#fafaf0 0%,#fafaf0 55%,rgba(250,250,240,0) 92%)","focalPoint":{"x":0.7,"y":0.5},"minHeight":720,"contentPosition":"center left","isDark":false,"align":"full","className":"ciwa-hero"} -->
<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-center-left ciwa-hero" style="min-height:720px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(95deg,#fafaf0 0%,#fafaf0 55%,rgba(250,250,240,0) 92%)"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $hero_img ); ?>" style="object-position:70% 50%" data-object-fit="cover" data-object-position="70% 50%"/>
	<div class="wp-block-cover__inner-container">

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
</div>
<!-- /wp:cover -->
