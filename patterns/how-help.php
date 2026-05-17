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
<?php
$bg_map = array(
	'is-purple' => '#6a1753',
	'is-pink'   => '#e22371',
	'is-orange' => '#f68b3c',
	'is-coral'  => '#ff6e6e',
	'is-teal'   => '#5bbdad',
	'is-olive'  => '#aaa835',
	'is-wine'   => '#661b53',
);
?>
<div class="ciwa-help-slider" style="position:relative;max-width:1500px;margin:0 auto;padding:0 80px">
	<div class="ciwa-help-track" style="display:flex;flex-direction:row;flex-wrap:nowrap;gap:24px;overflow-x:auto;overflow-y:hidden;padding:12px 4px;scroll-snap-type:x mandatory">
	<?php foreach ( $cards as $c ) : $bg = $bg_map[ $c['cls'] ] ?? '#6a1753'; ?>
		<div class="ciwa-help-card <?php echo esc_attr( $c['cls'] ); ?>" style="flex:0 0 calc((100% - 48px) / 3);min-width:320px;background:<?php echo esc_attr( $bg ); ?>;color:#fff;padding:44px 36px 36px;border-radius:20px 20px 0 20px;box-sizing:border-box;display:flex;flex-direction:column;min-height:360px;scroll-snap-align:start">
			<h3 class="ciwa-help-card-title" style="color:#fff;font-family:var(--wp--preset--font-family--display);font-size:1.65rem;font-weight:400;line-height:1.15;letter-spacing:-0.01em;margin:0 0 14px"><?php echo esc_html( $c['title'] ); ?></h3>
			<p class="ciwa-help-card-body" style="color:#fff;font-size:0.95rem;line-height:1.55;margin:0 0 auto"><?php echo esc_html( $c['body'] ); ?></p>
			<p class="ciwa-help-card-cta-wrap" style="margin:24px 0 0"><a class="ciwa-help-card-cta" href="#contact" style="display:inline-block;background:#fff;color:<?php echo esc_attr( $bg ); ?>;font-family:var(--wp--preset--font-family--display);font-size:0.85rem;border-radius:999px;padding:11px 22px;text-transform:uppercase;letter-spacing:0.06em;text-decoration:none"><?php echo esc_html( $c['cta'] ); ?> &rsaquo;</a></p>
		</div>
	<?php endforeach; ?>
	</div>
	<a class="ciwa-help-arrow ciwa-help-arrow-prev" href="#prev" aria-label="Previous" style="position:absolute;top:50%;left:12px;transform:translateY(-50%);width:56px;height:56px;border-radius:50%;background:#e22371;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.4rem;line-height:1;box-shadow:0 0 0 7px rgba(226,35,113,0.18);z-index:5"><span aria-hidden="true">&#10094;</span></a>
	<a class="ciwa-help-arrow ciwa-help-arrow-next" href="#next" aria-label="Next" style="position:absolute;top:50%;right:12px;transform:translateY(-50%);width:56px;height:56px;border-radius:50%;background:#e22371;color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:1.4rem;line-height:1;box-shadow:0 0 0 7px rgba(226,35,113,0.18);z-index:5"><span aria-hidden="true">&#10095;</span></a>
</div>
<div class="ciwa-help-dots" aria-hidden="true" style="display:flex;justify-content:center;gap:10px;margin-top:36px">
	<span class="is-on" style="width:10px;height:10px;border-radius:50%;background:#e22371;display:inline-block"></span>
	<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
	<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
	<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
	<span style="width:10px;height:10px;border-radius:50%;background:rgba(0,0,0,0.15);display:inline-block"></span>
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
