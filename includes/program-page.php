<?php
/**
 * Shared "program detail page" renderer.
 *
 * Used by all 5 program pages (settlement-supports, employment-skills-training,
 * family-parenting-supports, language-training, wellness) which share an
 * identical visual structure:
 *
 *  1. Pink hero  : title + body + 2 CTAs left, photo right
 *  2. PROGRAMS UNDER X    : 2x2 grid of 4 program-detail cards (icon + title + body)
 *  3. WHAT YOU GAIN       : 4 colored benefit cards (icon + body)
 *  4. DID YOU KNOW?       : stat banner with photo + headline + body
 *  5. UPCOMING EVENTS     : 3 event cards in a row
 *  6. FREQUENTLY ASKED    : 4-question accordion
 *  7. GET START NOW       : contact form + CIWA RESOURCES purple side panel
 *
 * Each per-page pattern (.php in /patterns/) just builds a $config array
 * and calls ciwa_render_program_page($config).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ciwa_render_program_page( $c ) {
	$hero_uri   = get_theme_file_uri( '/assets/img/' . ( $c['hero_dir'] ?? 'instagram' ) );
	$icons      = get_theme_file_uri( '/assets/img/programs' );
	$events_uri = get_theme_file_uri( '/assets/img/events' );
	$news_uri   = get_theme_file_uri( '/assets/img/news' );
	$ig_uri     = get_theme_file_uri( '/assets/img/instagram' );

	$default_events = array(
		array( 'img' => $events_uri . '/e1.png', 'date' => 'Feb 9, 2026',  'title' => 'Foundations Workshop',           'body' => 'Open intake session for new participants. Drop in or pre-register.' ),
		array( 'img' => $events_uri . '/e2.png', 'date' => 'Apr 13, 2026', 'title' => 'Skills Boost Series',            'body' => 'Six-week practical training with mentors and employer partners.' ),
		array( 'img' => $events_uri . '/e3.png', 'date' => 'May 7, 2026',  'title' => 'Community Showcase',             'body' => 'Celebrate participant achievements and meet our partner network.' ),
	);
	$default_faqs = array(
		array( 'q' => 'What is CIWA and who do you support?',         'a' => 'CIWA is a nonprofit organization that supports immigrant women, girls, and their families through a wide range of settlement, language, employment, and community programs.' ),
		array( 'q' => 'How can I access CIWA services?',              'a' => 'Contact our intake line or visit any CIWA location — our team will help match you with the right program.' ),
		array( 'q' => 'What services does CIWA offer?',               'a' => 'Settlement, language training, employment skills, family services, wellbeing programs, and childcare.' ),
		array( 'q' => 'Do you provide job or employment support?',    'a' => 'Yes — our Employment Skills & Training program offers job-readiness training, placements, and ongoing career support.' ),
	);

	$events = $c['events'] ?? $default_events;
	$faqs   = $c['faqs']   ?? $default_faqs;
	$hero_img = $hero_uri . '/' . ( $c['hero_img'] ?? 'ig1.png' );
	$slug = $c['slug'] ?? 'program';

	?>

	<!-- HERO -->
	<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-prog-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-page-hero ciwa-prog-hero has-surface-pink-background-color has-background">
		<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
				<h1 class="wp-block-heading ciwa-page-hero__title"><?php echo esc_html( $c['title'] ); ?></h1>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
				<p class="ciwa-page-hero__copy"><?php echo esc_html( $c['intro'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
				<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
					<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
					<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#programs"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
					<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="#<?php echo esc_attr( $slug ); ?>-contact"><?php esc_html_e( 'GET INVOLVED', 'ciwa-final' ); ?> &rsaquo;</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
				<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero_img ); ?>" alt=""/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- PROGRAMS UNDER X -->
	<!-- wp:group {"align":"full","className":"ciwa-prog","backgroundColor":"background","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-prog has-background-background-color has-background" id="programs">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-prog__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-prog__h"><?php esc_html_e( 'PROGRAMS UNDER', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php echo esc_html( $c['programs_label'] ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:group {"className":"ciwa-prog__grid","layout":{"type":"grid","columnCount":2}} -->
		<div class="wp-block-group ciwa-prog__grid">
		<?php foreach ( $c['programs'] as $p ) : $col = $p['col'] ?? 'purple'; ?>
			<!-- wp:group {"className":"ciwa-prog-card ciwa-prog-card--<?php echo esc_attr( $col ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-prog-card ciwa-prog-card--<?php echo esc_attr( $col ); ?>">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-prog-card__icon"} -->
				<figure class="wp-block-image size-full ciwa-prog-card__icon"><img src="<?php echo esc_url( $icons . '/' . ( $p['icon'] ?? 'icon-1.svg' ) ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"className":"ciwa-prog-card__title"} -->
				<h3 class="wp-block-heading ciwa-prog-card__title"><?php echo esc_html( $p['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-prog-card__body"} -->
				<p class="ciwa-prog-card__body"><?php echo esc_html( $p['body'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- WHAT YOU GAIN -->
	<!-- wp:group {"align":"full","className":"ciwa-gain","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-gain has-surface-cream-background-color has-background">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-gain__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-gain__h"><?php esc_html_e( 'WHAT YOU', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'GAIN', 'ciwa-final' ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:group {"className":"ciwa-gain__grid","layout":{"type":"grid","columnCount":4}} -->
		<div class="wp-block-group ciwa-gain__grid">
		<?php foreach ( $c['gain'] as $g ) : $col = $g['col'] ?? 'pink'; ?>
			<!-- wp:group {"className":"ciwa-gain-card ciwa-gain-card--<?php echo esc_attr( $col ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-gain-card ciwa-gain-card--<?php echo esc_attr( $col ); ?>">
				<!-- wp:paragraph {"className":"ciwa-gain-card__body"} -->
				<p class="ciwa-gain-card__body"><?php echo esc_html( $g['body'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-gain__cta-wrap"} -->
		<div class="wp-block-buttons ciwa-gain__cta-wrap">
			<!-- wp:button {"backgroundColor":"primary","textColor":"text-light"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#<?php echo esc_attr( $slug ); ?>-contact"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- DID YOU KNOW? -->
	<!-- wp:group {"align":"full","className":"ciwa-didyou","backgroundColor":"background","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-didyou has-background-background-color has-background">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-didyou__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-didyou__h"><?php esc_html_e( 'DID YOU', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'KNOW?', 'ciwa-final' ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","className":"ciwa-didyou__copy"} -->
		<p class="has-text-align-center ciwa-didyou__copy"><?php echo esc_html( $c['didyou'] ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:image {"align":"center","sizeSlug":"large","className":"ciwa-didyou__img"} -->
		<figure class="wp-block-image aligncenter size-large ciwa-didyou__img"><img src="<?php echo esc_url( $hero_uri . '/' . ( $c['didyou_img'] ?? 'ig2.png' ) ); ?>" alt=""/></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->

	<!-- UPCOMING EVENTS -->
	<!-- wp:group {"align":"full","className":"ciwa-prog-events","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-prog-events has-surface-cream-background-color has-background">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-prog-events__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-prog-events__h"><?php esc_html_e( 'UPCOMING', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'EVENTS', 'ciwa-final' ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:group {"className":"ciwa-prog-events__grid","layout":{"type":"grid","columnCount":3}} -->
		<div class="wp-block-group ciwa-prog-events__grid">
		<?php foreach ( $events as $e ) : ?>
			<!-- wp:group {"className":"ciwa-prog-event","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-prog-event">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-prog-event__img"} -->
				<figure class="wp-block-image size-full ciwa-prog-event__img"><img src="<?php echo esc_url( $e['img'] ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:paragraph {"className":"ciwa-prog-event__date"} -->
				<p class="ciwa-prog-event__date"><?php echo esc_html( $e['date'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"className":"ciwa-prog-event__title"} -->
				<h3 class="wp-block-heading ciwa-prog-event__title"><?php echo esc_html( $e['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-prog-event__body"} -->
				<p class="ciwa-prog-event__body"><?php echo esc_html( $e['body'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- FAQ -->
	<!-- wp:group {"align":"full","className":"ciwa-faq","backgroundColor":"background","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-faq has-background-background-color has-background">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-faq__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-faq__h"><?php esc_html_e( 'FREQUENTLY ASKED', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'QUESTIONS', 'ciwa-final' ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:html -->
		<div class="ciwa-faq__list">
		<?php foreach ( $faqs as $i => $f ) : ?>
			<details class="ciwa-faq__item"<?php echo $i === 0 ? ' open' : ''; ?>>
				<summary class="ciwa-faq__q"><?php echo esc_html( $f['q'] ); ?></summary>
				<p class="ciwa-faq__a"><?php echo esc_html( $f['a'] ); ?></p>
			</details>
		<?php endforeach; ?>
		</div>
		<!-- /wp:html -->
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-faq__cta-wrap"} -->
		<div class="wp-block-buttons ciwa-faq__cta-wrap">
			<!-- wp:button {"backgroundColor":"primary","textColor":"text-light"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#programs"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"is-outline"} -->
			<div class="wp-block-button is-outline"><a class="wp-block-button__link wp-element-button" href="#<?php echo esc_attr( $slug ); ?>-contact"><?php esc_html_e( 'CONTACT US', 'ciwa-final' ); ?> &rsaquo;</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- GET START NOW form + CIWA RESOURCES side panel -->
	<!-- wp:group {"align":"full","className":"ciwa-member-start","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull ciwa-member-start has-surface-cream-background-color has-background" id="<?php echo esc_attr( $slug ); ?>-contact">
		<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-member-start__h"} -->
		<h2 class="wp-block-heading has-text-align-center ciwa-member-start__h"><?php esc_html_e( 'GET START', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'NOW', 'ciwa-final' ); ?></mark></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","className":"ciwa-member-start__sub"} -->
		<p class="has-text-align-center ciwa-member-start__sub"><?php esc_html_e( 'Ready to take the next step? Reach out — we\'ll connect you with the right program coordinator.', 'ciwa-final' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:columns {"align":"wide","className":"ciwa-member-start__row"} -->
		<div class="wp-block-columns alignwide ciwa-member-start__row">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:html -->
				<form class="ciwa-partner-form">
					<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">First Name:</span><input type="text" name="first_name" /></label></div>
					<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Email:</span><input type="email" name="email" /></label></div>
					<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Phone:</span><input type="tel" name="phone" /></label></div>
					<div class="ciwa-partner-form__row ciwa-partner-form__row--actions"><button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SUBMIT', 'ciwa-final' ); ?> &rsaquo;</button></div>
				</form>
				<!-- /wp:html -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"ciwa-member-resources","backgroundColor":"primary","layout":{"type":"constrained"}} -->
				<div class="wp-block-group ciwa-member-resources has-primary-background-color has-background">
					<!-- wp:heading {"level":3,"className":"ciwa-member-resources__h"} -->
					<h3 class="wp-block-heading ciwa-member-resources__h"><?php esc_html_e( 'CIWA RESOURCES', 'ciwa-final' ); ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"className":"ciwa-member-resources__body"} -->
					<p class="ciwa-member-resources__body"><?php esc_html_e( 'Join CIWA\'s free platform "Diverse Workforce" to connect with employers across Calgary and to discover programs that match your goals.', 'ciwa-final' ); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:buttons {"className":"ciwa-member-resources__cta-wrap"} -->
					<div class="wp-block-buttons ciwa-member-resources__cta-wrap">
						<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-member-resources__cta"} -->
						<div class="wp-block-button ciwa-member-resources__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="/partner-with-us/"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	<?php
}
