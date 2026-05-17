<?php
/**
 * Title: How Can We Help You Today
 * Slug: ciwa-final/how-help
 * Categories: ciwa-final
 * Description: 8 audience-routing cards in a horizontal carousel. Canonical Gutenberg blocks, all styling in style.css.
 * Keywords: help, slider, carousel
 * Viewport Width: 1280
 */
$cards = array(
	array( 'cls' => 'is-purple', 'title' => "I\xE2\x80\x99m New to Canada",   'body' => 'Find settlement services, guidance, and programs designed to help you build a new life in Canada.',           'cta' => 'Get Support' ),
	array( 'cls' => 'is-pink',   'title' => 'I Want to Support CIWA',         'body' => 'Help empower immigrant women by contributing to programs, resources, and community initiatives.',         'cta' => 'Support Now' ),
	array( 'cls' => 'is-orange', 'title' => 'I Want to Collaborate',          'body' => 'Partner with CIWA to create meaningful impact through community programs and shared initiatives.',    'cta' => 'Collaborate' ),
	array( 'cls' => 'is-coral',  'title' => 'I Want to Volunteer',            'body' => 'Join our volunteer network and make a difference by supporting women and families in your community.', 'cta' => 'Join as Volunteer' ),
	array( 'cls' => 'is-teal',   'title' => 'I Want to Work at CIWA',         'body' => 'Explore career opportunities and be part of a mission-driven organization empowering women.',          'cta' => 'View Jobs' ),
	array( 'cls' => 'is-olive',  'title' => 'I Want to Learn More',           'body' => 'Discover our programs, services, and the impact we create across communities in Canada.',             'cta' => 'Learn More' ),
	array( 'cls' => 'is-wine',   'title' => 'I Am a Youth',                   'body' => 'Access youth-focused programs, mentorship, and opportunities to grow and succeed.',                   'cta' => 'Explore Programs' ),
	array( 'cls' => 'is-orange', 'title' => 'I Am a Senior',                  'body' => 'Find support services, community programs, and resources designed for seniors.',                      'cta' => 'Get Support' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-how-help","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-how-help has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-help-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-help-h"><?php esc_html_e( 'HOW CAN WE HELP', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'YOU TODAY?', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-help-sub"} -->
	<p class="has-text-align-center ciwa-help-sub"><?php esc_html_e( 'Find the right program, support service, or opportunity to connect with CIWA.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"full","className":"ciwa-help-track"} -->
	<div class="wp-block-columns alignfull ciwa-help-track">
	<?php foreach ( $cards as $c ) : ?>
		<!-- wp:column {"className":"ciwa-help-card <?php echo esc_attr( $c['cls'] ); ?>"} -->
		<div class="wp-block-column ciwa-help-card <?php echo esc_attr( $c['cls'] ); ?>">
			<!-- wp:heading {"level":3,"className":"ciwa-help-card-title"} -->
			<h3 class="wp-block-heading ciwa-help-card-title"><?php echo esc_html( $c['title'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-help-card-body"} -->
			<p class="ciwa-help-card-body"><?php echo esc_html( $c['body'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-help-card-cta-wrap"} -->
			<div class="wp-block-buttons ciwa-help-card-cta-wrap">
				<!-- wp:button {"className":"ciwa-help-card-cta"} -->
				<div class="wp-block-button ciwa-help-card-cta"><a class="wp-block-button__link wp-element-button" href="#contact"><?php echo esc_html( $c['cta'] ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
