<?php
/**
 * Title: Welcome to CIWA
 * Slug: ciwa-final/welcome
 * Categories: ciwa-final
 * Description: Welcome split — pink left (text + tag pills + CTA) + purple right (photo). 100% canonical blocks.
 * Keywords: welcome, intro, about
 * Viewport Width: 1280
 */
$collage = get_theme_file_uri( '/assets/img/welcome/collage.png' );
$tags = array( 'Equity', 'Excellence', 'Collaboration', 'Inclusiveness', 'Empowerment' );
?>
<!-- wp:group {"align":"full","className":"ciwa-welcome","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignfull ciwa-welcome">

	<!-- wp:columns {"align":"full","verticalAlignment":"stretch","className":"ciwa-welcome-cols"} -->
	<div class="wp-block-columns alignfull are-vertically-aligned-stretch ciwa-welcome-cols">

		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"ciwa-welcome-text"} -->
		<div class="wp-block-column is-vertically-aligned-stretch ciwa-welcome-text" style="flex-basis:50%">

			<!-- wp:paragraph {"className":"ciwa-welcome-eyebrow"} -->
			<p class="ciwa-welcome-eyebrow"><?php esc_html_e( 'WELCOME TO', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"className":"ciwa-welcome-title"} -->
			<h2 class="wp-block-heading ciwa-welcome-title"><?php esc_html_e( 'CIWA', 'ciwa-final' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ciwa-welcome-body"} -->
			<p class="ciwa-welcome-body"><?php esc_html_e( 'CIWA (Canadian Immigrant Women Association) supports immigrant and refugee women, girls and their families. We have more than 50 programs that can support you with settlement needs, language and employment training, family services and much more.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"ciwa-welcome-tags"} -->
			<div class="wp-block-buttons ciwa-welcome-tags">
			<?php foreach ( $tags as $t ) : ?>
				<!-- wp:button {"className":"ciwa-welcome-tag"} -->
				<div class="wp-block-button ciwa-welcome-tag"><a class="wp-block-button__link wp-element-button" href="#about"><?php echo esc_html( $t ); ?></a></div>
				<!-- /wp:button -->
			<?php endforeach; ?>
			</div>
			<!-- /wp:buttons -->

			<!-- wp:buttons {"className":"ciwa-welcome-cta-wrap"} -->
			<div class="wp-block-buttons ciwa-welcome-cta-wrap">
				<!-- wp:button {"className":"ciwa-welcome-cta"} -->
				<div class="wp-block-button ciwa-welcome-cta"><a class="wp-block-button__link wp-element-button" href="/who-we-are/"><?php esc_html_e( 'LEARN MORE ABOUT CIWA', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"ciwa-welcome-photocol"} -->
		<div class="wp-block-column is-vertically-aligned-stretch ciwa-welcome-photocol" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-welcome-photo"} -->
			<figure class="wp-block-image size-full ciwa-welcome-photo"><img src="<?php echo esc_url( $collage ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
