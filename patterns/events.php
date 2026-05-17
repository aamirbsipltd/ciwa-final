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
ob_start();
?>
<div class="ciwa-event-grid" style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:24px;max-width:1320px;margin:0 auto">
<?php foreach ( $events as $e ) : ?>
	<div class="ciwa-event" style="background:#fff;border-radius:14px;overflow:hidden">
		<div class="ciwa-event-photo" style="position:relative">
			<img src="<?php echo esc_url( $e['photo'] ); ?>" alt="" style="width:100%;height:200px;object-fit:cover;display:block" />
			<span class="ciwa-event-day" style="position:absolute;top:14px;right:14px;width:48px;height:48px;border-radius:50%;background:#e22371;color:#fff;display:grid;place-items:center;font-family:var(--wp--preset--font-family--display);font-size:1.2rem"><?php echo esc_html( $e['day'] ); ?></span>
		</div>
		<div class="ciwa-event-body" style="padding:24px">
			<p class="ciwa-event-meta" style="color:#1a1a1a;font-size:0.85rem;margin:0 0 8px"><span class="ciwa-event-meta-ico" style="color:#e22371;margin-right:6px">&#128197;</span><?php echo esc_html( $e['meta'] ); ?></p>
			<h3 class="ciwa-event-title" style="font-family:var(--wp--preset--font-family--display);font-size:1.05rem;font-weight:400;color:#1a1a1a;margin:0 0 12px;line-height:1.25;text-transform:uppercase"><?php echo $e['title']; ?></h3>
			<p class="ciwa-event-copy" style="color:#5b5b66;font-size:0.9rem;line-height:1.5;margin:0 0 14px"><?php echo esc_html( $e['body'] ); ?></p>
			<p class="ciwa-event-more" style="margin:0"><a href="#events" style="color:#e22371;font-weight:600;font-size:0.95rem;text-decoration:none">Read More &rarr;</a></p>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php
$grid = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-events","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-events has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"left","level":2,"className":"ciwa-events-h"} -->
	<h2 class="wp-block-heading has-text-align-left ciwa-events-h"><?php esc_html_e( 'UPCOMING', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'EVENTS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<?php echo $grid; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
