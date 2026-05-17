<?php
/**
 * Title: Voices From Our Community
 * Slug: ciwa-final/testimonials
 * Categories: ciwa-final
 * Description: Voices testimonials — fully editable canonical blocks.
 * Keywords: testimonials, voices, stories
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/voices' );
$voices = array(
	array( 'photo' => $uri . '/photo-1.png', 'quote' => 'Moving to a new country was overwhelming, but CIWA made it easier for my family. Their support gave us stability and a sense of belonging.',                            'author' => 'Emily Johnson',  'role' => 'Program Participant' ),
	array( 'photo' => $uri . '/photo-2.png', 'quote' => 'The employment program helped me secure my first job in Canada. The guidance and encouragement I received made a huge difference in my journey.', 'author' => 'JESSICA BROWN', 'role' => 'Program Participant' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-voices","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-voices has-primary-background-color has-background">

	<!-- wp:columns {"align":"wide","className":"ciwa-voices-grid"} -->
	<div class="wp-block-columns alignwide ciwa-voices-grid">

		<!-- wp:column {"className":"ciwa-voices-intro"} -->
		<div class="wp-block-column ciwa-voices-intro">
			<!-- wp:heading {"level":2,"textColor":"text-light","className":"ciwa-voices-h"} -->
			<h2 class="wp-block-heading ciwa-voices-h has-text-light-color has-text-color"><?php esc_html_e( 'Voices From Our Community', 'ciwa-final' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"text-light","className":"ciwa-voices-sub"} -->
			<p class="ciwa-voices-sub has-text-light-color has-text-color"><?php esc_html_e( 'Real stories from women whose lives have been impacted through our programs and support services.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#stories"><?php esc_html_e( 'Read more stories', 'ciwa-final' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

	<?php foreach ( $voices as $v ) : ?>
		<!-- wp:column {"className":"ciwa-voice"} -->
		<div class="wp-block-column ciwa-voice">
			<!-- wp:image {"className":"ciwa-voice-photo"} -->
			<figure class="wp-block-image ciwa-voice-photo"><img src="<?php echo esc_url( $v['photo'] ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"align":"center","className":"ciwa-voice-quote"} -->
			<p class="has-text-align-center ciwa-voice-quote"><?php echo esc_html( $v['quote'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":4,"textAlign":"center","className":"ciwa-voice-author"} -->
			<h4 class="wp-block-heading has-text-align-center ciwa-voice-author"><?php echo esc_html( $v['author'] ); ?></h4>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","className":"ciwa-voice-role"} -->
			<p class="has-text-align-center ciwa-voice-role"><?php echo esc_html( $v['role'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
