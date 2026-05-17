<?php
/**
 * Title: Hero
 * Slug: ciwa-final/hero
 * Categories: ciwa-final, featured
 * Description: Hero — EMPOWER headline left, photo right (full-bleed). Canonical core blocks.
 * Keywords: hero, banner, landing
 * Block Types: core/post-content
 * Viewport Width: 1280
 */
$hero_img = get_theme_file_uri( '/assets/img/hero/figma-hero.png' );
?>
<!-- wp:group {"align":"full","className":"ciwa-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-hero">

	<!-- wp:columns {"align":"full","verticalAlignment":"center","className":"ciwa-hero-cols"} -->
	<div class="wp-block-columns alignfull are-vertically-aligned-center ciwa-hero-cols">

		<!-- wp:column {"verticalAlignment":"center","className":"ciwa-hero-text"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-hero-text">

			<!-- wp:heading {"level":1,"textColor":"pink","className":"ciwa-hero-title"} -->
			<h1 class="wp-block-heading ciwa-hero-title has-pink-color has-text-color"><?php esc_html_e( 'EMPOWER IMMIGRANT WOMEN ENRICH CANADIAN SOCIETY', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ciwa-hero-sub"} -->
			<p class="ciwa-hero-sub"><?php echo esc_html__( "The Canadian Immigrant Women\xE2\x80\x99s Association supports immigrant women and their families since 1982", 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"ciwa-hero-ctas"} -->
			<div class="wp-block-buttons ciwa-hero-ctas">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-hero-cta-orange"} -->
				<div class="wp-block-button ciwa-hero-cta-orange"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#contact"><?php esc_html_e( 'GET SUPPORT', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"ciwa-hero-cta-purple"} -->
				<div class="wp-block-button ciwa-hero-cta-purple"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#donate"><?php esc_html_e( 'DONATE NOW', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"ciwa-hero-photocol"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-hero-photocol">
			<!-- wp:image {"className":"ciwa-hero-photo"} -->
			<figure class="wp-block-image ciwa-hero-photo"><img src="<?php echo esc_url( $hero_img ); ?>" alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
