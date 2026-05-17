<?php
/**
 * Title: How Can We Help You Today
 * Slug: ciwa-final/how-help
 * Categories: ciwa-final
 * Description: 8 audience-routing cards in a horizontal carousel.
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
ob_start();
?>
<div class="ciwa-help-slider">
	<div class="ciwa-help-track">
	<?php foreach ( $cards as $c ) : ?>
		<div class="ciwa-help-card <?php echo esc_attr( $c['cls'] ); ?>">
			<h3 class="ciwa-help-card-title"><?php echo esc_html( $c['title'] ); ?></h3>
			<p class="ciwa-help-card-body"><?php echo esc_html( $c['body'] ); ?></p>
			<p class="ciwa-help-card-cta-wrap"><a class="ciwa-help-card-cta" href="#contact"><?php echo esc_html( $c['cta'] ); ?> &rsaquo;</a></p>
		</div>
	<?php endforeach; ?>
	</div>
	<a class="ciwa-help-arrow ciwa-help-arrow-prev" href="#prev" aria-label="Previous"><span aria-hidden="true">&#10094;</span></a>
	<a class="ciwa-help-arrow ciwa-help-arrow-next" href="#next" aria-label="Next"><span aria-hidden="true">&#10095;</span></a>
</div>
<div class="ciwa-help-dots" aria-hidden="true">
	<span class="is-on"></span><span></span><span></span><span></span><span></span>
</div>
<?php
$slider = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-how-help","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-how-help has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-help-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-help-h"><?php esc_html_e( 'HOW CAN WE HELP', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'YOU TODAY?', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-help-sub"} -->
	<p class="has-text-align-center ciwa-help-sub"><?php esc_html_e( 'Find the right program, support service, or opportunity to connect with CIWA.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<?php echo $slider; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
