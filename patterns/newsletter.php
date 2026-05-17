<?php
/**
 * Title: Newsletter — Full Page
 * Slug: ciwa-final/newsletter
 * Categories: ciwa-final
 * Description: Newsletter page — hero + subscribe form + 8 newsletter issue cards + 4 toolkit cards.
 * Keywords: newsletter, grapevine, toolkit, resources
 * Viewport Width: 1280
 */
$hero = get_theme_file_uri( '/assets/img/welcome' );

$issues = array_fill( 0, 8, array(
	'title' => 'CIWA GRAPEVINE',
	'date'  => 'July 2025',
	'body'  => 'Updates on programs, upcoming events, employer partnerships, and member stories from across CIWA.',
) );

$toolkits = array(
	array( 'title' => 'WORKPLACE ESSENTIAL SKILLS TOOLKIT: NUMERACY AND WORKING WITH OTHERS FOR LOW SKILLED LEARNERS', 'body' => 'This toolkit is designed to support low-skilled learners, their service providers and employers. Sections range from foundational essential skills needed in the workplace (basic math, money concepts, time and measurement, schedules and dates, addition/subtraction, fractions, multiplication, division, percentages) to working with others using a wide variety of contexts and activities.' ),
	array( 'title' => 'SUPPORTING THE ECONOMIC SECURITY OF UNPAID CAREGIVERS PROJECT RESOURCE GUIDE',                  'body' => 'Supporting the Economic Security of unpaid Caregivers Project Resource Guide is intended for unemployed and underemployed women in Canada who are unpaid caregivers, individuals and partners who advocate for them, employers, immigrant-serving agencies, and other community partners working to support unpaid caregivers and help them succeed.' ),
	array( 'title' => 'PASSPORT TO CANADA: ENGLISH LANGUAGE, LITERACY AND LIFE SKILLS PREPARATION FOR REFUGEES',         'body' => 'Passport to Canada English Language, Literacy and Life Skills Preparation for Refugees uses an asset-based approach to literacy and learning that is informed by current research and integrates strategies for using the L1, contextualization of language activities, and the role of culture in language learning.' ),
	array( 'title' => 'WORKPLACE ESSENTIAL SKILLS TOOLKIT: DIGITAL TECHNOLOGY FOR LOW SKILLED LEARNERS',                 'body' => 'This toolkit is designed to support low-skilled learners and their service providers. The digital technology curriculum covers learning core word processing, file management, computer skills, internet skills, troubleshooting, and online job applications.' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-newsletter-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-newsletter-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'NEWSLETTER', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Subscribe to the CIWA Grapevine — quarterly updates on programs, events, employers, and stories from our community.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#subscribe"><?php esc_html_e( 'SUBSCRIBE', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="#archive"><?php esc_html_e( 'VIEW ARCHIVE', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/collage.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- SUBSCRIBE -->
<!-- wp:group {"align":"full","className":"ciwa-newsletter-sub","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-newsletter-sub has-background-background-color has-background" id="subscribe">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-newsletter-sub__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-newsletter-sub__h"><?php esc_html_e( 'SUBSCRIBE TO OUR NEWSLETTER', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:html -->
	<form class="ciwa-newsletter-form" action="#" method="post">
		<div class="ciwa-newsletter-form__row">
			<label><span class="ciwa-partner-form__label">First Name</span><input type="text" name="first_name" /></label>
			<label><span class="ciwa-partner-form__label">Email Address</span><input type="email" name="email" required /></label>
		</div>
		<button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SUBSCRIBE TO NEWSLETTER', 'ciwa-final' ); ?> &rsaquo;</button>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- ISSUE ARCHIVE -->
<!-- wp:group {"align":"full","className":"ciwa-newsletter-archive","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-newsletter-archive has-surface-cream-background-color has-background" id="archive">
	<!-- wp:group {"className":"ciwa-newsletter-archive__grid","layout":{"type":"grid","columnCount":4}} -->
	<div class="wp-block-group ciwa-newsletter-archive__grid">
	<?php foreach ( $issues as $i => $iss ) : $col = $i % 3 === 0 ? 'pink' : ($i % 3 === 1 ? 'orange' : 'coral'); ?>
		<!-- wp:group {"className":"ciwa-newsletter-issue ciwa-newsletter-issue--<?php echo esc_attr( $col ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-newsletter-issue ciwa-newsletter-issue--<?php echo esc_attr( $col ); ?>">
			<!-- wp:heading {"level":4,"className":"ciwa-newsletter-issue__title"} -->
			<h4 class="wp-block-heading ciwa-newsletter-issue__title"><?php echo esc_html( $iss['title'] ); ?></h4>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-newsletter-issue__date"} -->
			<p class="ciwa-newsletter-issue__date"><?php echo esc_html( $iss['date'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"ciwa-newsletter-issue__body"} -->
			<p class="ciwa-newsletter-issue__body"><?php echo esc_html( $iss['body'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"ciwa-newsletter-issue__more"} -->
			<p class="ciwa-newsletter-issue__more"><a href="#issue"><?php esc_html_e( 'View Newsletter', 'ciwa-final' ); ?> &rsaquo;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- TOOLKITS -->
<!-- wp:group {"align":"full","className":"ciwa-newsletter-toolkits","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-newsletter-toolkits has-background-background-color has-background">
	<!-- wp:paragraph {"align":"center","className":"ciwa-newsletter-toolkits__eyebrow"} -->
	<p class="has-text-align-center ciwa-newsletter-toolkits__eyebrow"><?php esc_html_e( 'In order to view the publications below, please contact CIWA at hr@ciwa-online.com — we are happy to send a publication upon request.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:group {"className":"ciwa-newsletter-toolkits__list","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-newsletter-toolkits__list">
	<?php foreach ( $toolkits as $t ) : ?>
		<!-- wp:group {"className":"ciwa-toolkit-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-toolkit-card">
			<!-- wp:heading {"level":3,"className":"ciwa-toolkit-card__title"} -->
			<h3 class="wp-block-heading ciwa-toolkit-card__title"><?php echo esc_html( $t['title'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-toolkit-card__body"} -->
			<p class="ciwa-toolkit-card__body"><?php echo esc_html( $t['body'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-newsletter-toolkits__viewall"} -->
	<div class="wp-block-buttons ciwa-newsletter-toolkits__viewall">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#all"><?php esc_html_e( 'VIEW ALL', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
