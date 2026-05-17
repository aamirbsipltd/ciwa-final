<?php
/**
 * Title: Voices From Our Community
 * Slug: ciwa-final/testimonials
 * Categories: ciwa-final
 * Description: Voices — full-bleed purple section with 33% intro column + 66% column holding two testimonial cards.
 * Keywords: testimonials, voices, stories
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/voices' );
$voices = array(
	array( 'photo' => $uri . '/photo-1.png', 'quote' => 'Moving to a new country was overwhelming, but CIWA made it easier for my family. Their support gave us stability and a sense of belonging.',                            'author' => 'Emily Johnson', 'role' => 'Program Participant' ),
	array( 'photo' => $uri . '/photo-2.png', 'quote' => 'The employment program helped me secure my first job in Canada. The guidance and encouragement I received made a huge difference in my journey.', 'author' => 'Jessica Brown', 'role' => 'Program Participant' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-voices","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-voices has-primary-background-color has-background">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","className":"ciwa-voices-row"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top ciwa-voices-row">

		<!-- wp:column {"verticalAlignment":"top","width":"33%","className":"ciwa-voices-intro"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-voices-intro" style="flex-basis:33%">
			<!-- wp:paragraph {"className":"ciwa-voices-eyebrow"} -->
			<p class="ciwa-voices-eyebrow"><?php esc_html_e( 'TESTIMONIALS', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":2,"className":"ciwa-voices-h"} -->
			<h2 class="wp-block-heading ciwa-voices-h"><?php esc_html_e( 'VOICES FROM', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'OUR COMMUNITY', 'ciwa-final' ); ?></mark></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-voices-sub"} -->
			<p class="ciwa-voices-sub"><?php esc_html_e( 'Real stories from women whose lives have been impacted through our programs and support services.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-voices-cta-wrap"} -->
			<div class="wp-block-buttons ciwa-voices-cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-voices-cta"} -->
				<div class="wp-block-button ciwa-voices-cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#stories"><?php esc_html_e( 'READ MORE STORIES', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"66%","className":"ciwa-voices-cards"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-voices-cards" style="flex-basis:66%">

			<!-- wp:columns {"verticalAlignment":"top","className":"ciwa-voices-cards-row"} -->
			<div class="wp-block-columns are-vertically-aligned-top ciwa-voices-cards-row">

			<?php foreach ( $voices as $v ) : ?>
				<!-- wp:column {"verticalAlignment":"top","className":"ciwa-voices-card-col"} -->
				<div class="wp-block-column is-vertically-aligned-top ciwa-voices-card-col">

					<!-- wp:group {"className":"ciwa-testimonial-card","layout":{"type":"constrained"}} -->
					<div class="wp-block-group ciwa-testimonial-card">
						<!-- wp:image {"sizeSlug":"full","className":"ciwa-testimonial-card__photo"} -->
						<figure class="wp-block-image size-full ciwa-testimonial-card__photo"><img src="<?php echo esc_url( $v['photo'] ); ?>" alt=""/></figure>
						<!-- /wp:image -->
						<!-- wp:paragraph {"className":"ciwa-testimonial-card__quote"} -->
						<p class="ciwa-testimonial-card__quote"><?php echo esc_html( $v['quote'] ); ?></p>
						<!-- /wp:paragraph -->
						<!-- wp:heading {"level":4,"className":"ciwa-testimonial-card__author"} -->
						<h4 class="wp-block-heading ciwa-testimonial-card__author"><?php echo esc_html( $v['author'] ); ?></h4>
						<!-- /wp:heading -->
						<!-- wp:paragraph {"className":"ciwa-testimonial-card__role"} -->
						<p class="ciwa-testimonial-card__role"><?php echo esc_html( $v['role'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->
			<?php endforeach; ?>

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
