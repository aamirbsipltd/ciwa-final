<?php
/**
 * Title: Events Page — Full Page
 * Slug: ciwa-final/events-page
 * Categories: ciwa-final
 * Description: Events page — hero + filter pills + 6 event cards in vertical list.
 * Keywords: events, training, calendar
 * Viewport Width: 1280
 */
$hero   = get_theme_file_uri( '/assets/img/events' );
$events_img = get_theme_file_uri( '/assets/img/events' );
$ig     = get_theme_file_uri( '/assets/img/instagram' );
$news   = get_theme_file_uri( '/assets/img/news' );

$items = array(
	array( 'img' => $events_img . '/e1.png', 'date' => 'Feb 9, 2026', 'title' => 'Hospitality Training for Immigrant Women', 'body' => 'Hands-on hospitality training with practitioners — front of house, food service, and event support — open to women enrolled in CIWA programs.' ),
	array( 'img' => $events_img . '/e2.png', 'date' => 'Apr 13, 2026', 'title' => 'Customer Service Training', 'body' => 'Customer Service certification: master service workflows, conflict de-escalation, and CRM tools. Open to all CIWA participants.' ),
	array( 'img' => $events_img . '/e3.png', 'date' => 'May 7, 2026', 'title' => 'Bridging the Gap for Foreign Trained Accountants', 'body' => 'Full-time 8-week intensive bridging program for designated immigrant accountants — CPA prep, Canadian workplace integration, employer mentorship.' ),
	array( 'img' => $ig . '/ig2.png',        'date' => 'Apr 20, 2026', 'title' => 'Office Skills Training for STEM Professionals', 'body' => 'Office skills training and professional Canadian workplace English for women with STEM backgrounds re-entering the workforce.' ),
	array( 'img' => $ig . '/ig5.png',        'date' => 'Apr 20, 2026', 'title' => 'Culinary Skills Training', 'body' => 'Free intensive culinary training for women interested in the food-service industry — kitchen safety, station prep, customer service.' ),
	array( 'img' => $news . '/n1.png',       'date' => 'Apr 27, 2026', 'title' => 'Security Guard Training', 'body' => 'Alberta Security Guard licensing prep, on-the-job training placement, and CPR / First Aid certification included.' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-events-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-events-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'EVENTS', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Workshops, training, and gatherings — open to CIWA participants and community members.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#upcoming"><?php esc_html_e( 'SEE UPCOMING', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="/volunteer-with-us/"><?php esc_html_e( 'GET INVOLVED', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/e3.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- EVENTS LIST -->
<!-- wp:group {"align":"full","className":"ciwa-events-page","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-events-page has-background-background-color has-background" id="upcoming">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-events-page__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-events-page__h"><?php esc_html_e( 'UPCOMING EVENTS', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-events-page__filters"} -->
	<div class="wp-block-buttons ciwa-events-page__filters">
		<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"is-active"} -->
		<div class="wp-block-button is-active"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#"><?php esc_html_e( 'All', 'ciwa-final' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-ghost"} -->
		<div class="wp-block-button is-ghost"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Upcoming', 'ciwa-final' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:group {"className":"ciwa-events-page__list","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-events-page__list">
	<?php foreach ( $items as $e ) : ?>
		<!-- wp:columns {"verticalAlignment":"center","className":"ciwa-event-card"} -->
		<div class="wp-block-columns are-vertically-aligned-center ciwa-event-card">
			<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-event-card__img"} -->
				<figure class="wp-block-image size-full ciwa-event-card__img"><img src="<?php echo esc_url( $e['img'] ); ?>" alt=""/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">
				<!-- wp:paragraph {"className":"ciwa-event-card__date"} -->
				<p class="ciwa-event-card__date"><?php echo esc_html( $e['date'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"className":"ciwa-event-card__title"} -->
				<h3 class="wp-block-heading ciwa-event-card__title"><?php echo esc_html( $e['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-event-card__body"} -->
				<p class="ciwa-event-card__body"><?php echo esc_html( $e['body'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-event-card__more"} -->
				<p class="ciwa-event-card__more"><a href="#register"><?php esc_html_e( 'Read More', 'ciwa-final' ); ?> &rsaquo;</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-events-page__viewall"} -->
	<div class="wp-block-buttons ciwa-events-page__viewall">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#"><?php esc_html_e( 'VIEW ALL EVENTS', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
