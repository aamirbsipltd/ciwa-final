<?php
/**
 * Title: Upcoming Events
 * Slug: ciwa-final/events
 * Categories: ciwa-final
 * Description: 3 event cards with pink date-circle badge on photo top-right.
 * Keywords: events, upcoming
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/events' );
$events = array(
	array( 'photo' => $uri . '/e1.png', 'day' => '15', 'meta' => 'August 11 - October 31, 2026', 'title' => 'CUSTOMER SERVICE TRAINING OPEN FOR REGISTRATION',         'body' => 'Build real-world culinary and customer service skills in a supportive, hands-on environment. Learn food preparation, kitchen safety, hygiene standards.' ),
	array( 'photo' => $uri . '/e2.png', 'day' => '17', 'meta' => 'August 11 - October 31, 2026', 'title' => 'CULINARY &amp; CUSTOMER SERVICE TRAINING NOW ENROLLING', 'body' => 'Step into the kitchen with confidence. Master cooking basics, food safety, and customer interaction skills that prepare you for real job opportunities in the food industry.' ),
	array( 'photo' => $uri . '/e3.png', 'day' => '17', 'meta' => 'August 11 - October 31, 2026', 'title' => 'FREE CULINARY TRAINING PROGRAM LIMITED SPOTS AVAILABLE', 'body' => "Empowering women through hands-on culinary training\xE2\x80\x94covering kitchen operations, hygiene, and customer service to build confidence and career-ready skills." ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-events","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-events has-surface-cream-background-color has-background">

	<!-- wp:heading {"level":2,"textAlign":"left","className":"ciwa-events-h"} -->
	<h2 class="wp-block-heading has-text-align-left ciwa-events-h" style="color:#1a1a1a"><?php esc_html_e( 'UPCOMING', 'ciwa-final' ); ?> <span style="color:#ff6e6e"><?php esc_html_e( 'EVENTS', 'ciwa-final' ); ?></span></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","className":"ciwa-event-grid"} -->
	<div class="wp-block-columns alignwide ciwa-event-grid">
	<?php foreach ( $events as $e ) : ?>
		<!-- wp:column {"className":"ciwa-event"} -->
		<div class="wp-block-column ciwa-event" style="background:#fff;border-radius:14px;overflow:hidden;padding:0">
			<div style="position:relative">
				<img src="<?php echo esc_url( $e['photo'] ); ?>" alt="" style="width:100%;height:200px;object-fit:cover;display:block" />
				<span style="position:absolute;top:14px;right:14px;width:48px;height:48px;border-radius:50%;background:#e22371;color:#fff;display:grid;place-items:center;font-family:var(--wp--preset--font-family--display);font-size:1.2rem;font-weight:400"><?php echo esc_html( $e['day'] ); ?></span>
			</div>
			<div style="padding:24px 24px 24px">
				<p style="color:#1a1a1a;font-size:0.85rem;margin:0 0 8px"><span style="color:#e22371;margin-right:6px">&#128197;</span><?php echo esc_html( $e['meta'] ); ?></p>
				<h3 class="wp-block-heading ciwa-event-title" style="font-family:var(--wp--preset--font-family--display);font-size:1.05rem;font-weight:400;color:#1a1a1a;margin:0 0 12px;line-height:1.25;text-transform:uppercase"><?php echo $e['title']; ?></h3>
				<p style="color:#5b5b66;font-size:0.9rem;line-height:1.5;margin:0 0 14px"><?php echo esc_html( $e['body'] ); ?></p>
				<p style="margin:0"><a href="#events" style="color:#e22371;font-weight:600;font-size:0.95rem"><?php esc_html_e( 'Read More', 'ciwa-final' ); ?> &rarr;</a></p>
			</div>
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
