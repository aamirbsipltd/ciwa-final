<?php
/**
 * Title: How Can We Help You Today
 * Slug: ciwa-final/how-help
 * Categories: ciwa-final
 * Description: 3-visible slider with pink halo arrows + pagination dots.
 * Keywords: help, slider, carousel
 * Viewport Width: 1280
 */
$cards = array(
	array( 'cls' => 'is-purple', 'title' => "I\xE2\x80\x99M NEW TO CANADA",  'body' => 'Find settlement services, guidance, and programs designed to help you build a new life in Canada.',           'cta' => 'GET SUPPORT' ),
	array( 'cls' => 'is-pink',   'title' => 'I WANT TO SUPPORT CIWA',         'body' => 'Help empower immigrant women by contributing to programs, resources, and community initiatives.',         'cta' => 'SUPPORT NOW' ),
	array( 'cls' => 'is-orange', 'title' => 'I WANT TO COLLABORATE',          'body' => 'Partner with CIWA to create meaningful impact through community programs and shared initiatives.',    'cta' => 'COLLABORATE' ),
	array( 'cls' => 'is-coral',  'title' => 'I WANT TO VOLUNTEER',            'body' => 'Join our volunteer network and make a difference by supporting women and families in your community.', 'cta' => 'JOIN AS VOLUNTEER' ),
	array( 'cls' => 'is-teal',   'title' => 'I WANT TO WORK AT CIWA',         'body' => 'Explore career opportunities and be part of a mission-driven organization empowering women.',          'cta' => 'VIEW JOBS' ),
	array( 'cls' => 'is-olive',  'title' => 'I WANT TO LEARN MORE',           'body' => 'Discover our programs, services, and the impact we create across communities in Canada.',             'cta' => 'LEARN MORE' ),
	array( 'cls' => 'is-wine',   'title' => 'I AM A YOUTH',                   'body' => 'Access youth-focused programs, mentorship, and opportunities to grow and succeed.',                   'cta' => 'EXPLORE PROGRAMS' ),
	array( 'cls' => 'is-orange', 'title' => 'I AM A SENIOR',                  'body' => 'Find support services, community programs, and resources designed for seniors.',                      'cta' => 'GET SUPPORT' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-how-help","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-how-help has-surface-cream-background-color has-background">

	<!-- wp:heading {"level":2,"textAlign":"center","className":"ciwa-help-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-help-h" style="color:#1a1a1a"><?php esc_html_e( 'HOW CAN WE HELP', 'ciwa-final' ); ?> <span style="color:#ff6e6e"><?php esc_html_e( 'YOU TODAY?', 'ciwa-final' ); ?></span></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-help-sub"} -->
	<p class="has-text-align-center ciwa-help-sub"><?php esc_html_e( 'Find the right program, support service, or opportunity to connect with CIWA.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","className":"ciwa-help-slider","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide ciwa-help-slider">

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

		<!-- wp:html -->
		<a class="ciwa-help-arrow ciwa-help-arrow-prev" href="#prev" aria-label="Previous" style="position:absolute;top:50%;left:12px;transform:translateY(-50%);width:56px;height:56px;border-radius:50%;background:#e22371;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.4rem;font-family:Arial,sans-serif;line-height:1;box-shadow:0 0 0 7px rgba(226,35,113,0.18);z-index:5"><span aria-hidden="true">&#10094;</span></a>
		<a class="ciwa-help-arrow ciwa-help-arrow-next" href="#next" aria-label="Next" style="position:absolute;top:50%;right:12px;transform:translateY(-50%);width:56px;height:56px;border-radius:50%;background:#e22371;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.4rem;font-family:Arial,sans-serif;line-height:1;box-shadow:0 0 0 7px rgba(226,35,113,0.18);z-index:5"><span aria-hidden="true">&#10095;</span></a>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<div class="ciwa-help-dots" aria-hidden="true" style="display:flex;justify-content:center;gap:10px;margin-top:36px">
		<span style="width:10px;height:10px;border-radius:50%;background:#e22371;display:inline-block"></span>
		<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
		<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
		<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
		<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
