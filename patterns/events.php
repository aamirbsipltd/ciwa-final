<?php
/**
 * Title: Upcoming Events
 * Slug: ciwa-final/events
 * Categories: ciwa-final
 * Description: 3 event cards with pink date badge. Canonical Gutenberg blocks.
 * Keywords: events, upcoming
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/events' );
$events = array(
	array( 'photo' => $uri . '/e1.png', 'day' => '15', 'meta' => 'August 11 - October 31, 2026', 'title' => 'Customer Service Training Open for Registration',         'body' => 'Build real-world culinary and customer service skills in a supportive, hands-on environment. Learn food preparation, kitchen safety, hygiene standards.' ),
	array( 'photo' => $uri . '/e2.png', 'day' => '17', 'meta' => 'August 11 - October 31, 2026', 'title' => 'Culinary &amp; Customer Service Training Now Enrolling', 'body' => 'Step into the kitchen with confidence. Master cooking basics, food safety, and customer interaction skills that prepare you for real job opportunities in the food industry.' ),
	array( 'photo' => $uri . '/e3.png', 'day' => '17', 'meta' => 'August 11 - October 31, 2026', 'title' => 'Free Culinary Training Program Limited Spots Available',  'body' => "Empowering women through hands-on culinary training\xE2\x80\x94covering kitchen operations, hygiene, and customer service to build confidence and career-ready skills." ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-events","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-events has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"left","level":2,"className":"ciwa-events-h"} -->
	<h2 class="wp-block-heading has-text-align-left ciwa-events-h"><?php esc_html_e( 'UPCOMING', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'EVENTS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"ciwa-event-grid","layout":{"type":"grid","columnCount":3}} -->
	<div class="wp-block-group alignwide ciwa-event-grid">
	<?php foreach ( $events as $e ) : ?>
		<!-- wp:group {"className":"ciwa-event","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-event">

			<!-- wp:group {"className":"ciwa-event-photo-wrap","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-event-photo-wrap">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-event-photo"} -->
				<figure class="wp-block-image size-full ciwa-event-photo"><img src="<?php echo esc_url( $e['photo'] ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:paragraph {"className":"ciwa-event-day"} -->
				<p class="ciwa-event-day"><?php echo esc_html( $e['day'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"ciwa-event-meta"} -->
			<p class="ciwa-event-meta">&#128197; <?php echo esc_html( $e['meta'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"className":"ciwa-event-title"} -->
			<h3 class="wp-block-heading ciwa-event-title"><?php echo $e['title']; ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ciwa-event-copy"} -->
			<p class="ciwa-event-copy"><?php echo esc_html( $e['body'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"ciwa-event-more"} -->
			<p class="ciwa-event-more"><a href="#events">Read More &rarr;</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
