<?php
/**
 * Title: Welcome to CIWA
 * Slug: ciwa-final/welcome
 * Categories: ciwa-final
 * Description: Welcome split-section — fully editable canonical core blocks.
 * Keywords: welcome, intro, about
 * Viewport Width: 1280
 */
$collage = get_theme_file_uri( '/assets/img/welcome/collage.png' );
?>
<!-- wp:group {"align":"full","className":"ciwa-welcome"} -->
<div class="wp-block-group alignfull ciwa-welcome">

	<!-- wp:columns {"align":"full","verticalAlignment":"center","className":"ciwa-welcome-cols"} -->
	<div class="wp-block-columns alignfull are-vertically-aligned-center ciwa-welcome-cols">

		<!-- wp:column {"verticalAlignment":"center","className":"ciwa-welcome-text"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-welcome-text">

			<!-- wp:paragraph {"className":"ciwa-welcome-eyebrow","textColor":"primary"} -->
			<p class="ciwa-welcome-eyebrow has-primary-color has-text-color"><?php esc_html_e( 'WELCOME TO', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"className":"ciwa-welcome-title","textColor":"pink"} -->
			<h2 class="wp-block-heading ciwa-welcome-title has-pink-color has-text-color"><?php esc_html_e( 'CIWA', 'ciwa-final' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ciwa-welcome-body"} -->
			<p class="ciwa-welcome-body"><?php esc_html_e( 'CIWA (Canadian Immigrant Women Association) supports immigrant and refugee women, girls and their families. We have more than 50 programs that can support you with settlement needs, language and employment training, family services and much more.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"ciwa-welcome-tags"} -->
			<div class="wp-block-buttons ciwa-welcome-tags">
				<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Equity', 'ciwa-final' ); ?></a></div><!-- /wp:button -->
				<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Excellence', 'ciwa-final' ); ?></a></div><!-- /wp:button -->
				<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Collaboration', 'ciwa-final' ); ?></a></div><!-- /wp:button -->
				<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Inclusiveness', 'ciwa-final' ); ?></a></div><!-- /wp:button -->
				<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Empowerment', 'ciwa-final' ); ?></a></div><!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:buttons {"className":"ciwa-welcome-cta-wrap"} -->
			<div class="wp-block-buttons ciwa-welcome-cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-welcome-cta"} -->
				<div class="wp-block-button ciwa-welcome-cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="/who-we-are/"><?php esc_html_e( 'LEARN MORE ABOUT CIWA', 'ciwa-final' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"ciwa-welcome-photocol"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-welcome-photocol">
			<!-- wp:image {"className":"ciwa-welcome-photo"} -->
			<figure class="wp-block-image ciwa-welcome-photo"><img src="<?php echo esc_url( $collage ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
