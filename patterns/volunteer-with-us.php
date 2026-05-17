<?php
/**
 * Title: Volunteer With Us — Full Page
 * Slug: ciwa-final/volunteer-with-us
 * Categories: ciwa-final
 * Description: Volunteer With Us page — hero + 5 opportunity cards + 6 volunteer spotlights + FAQ + Contact form.
 * Keywords: volunteer, opportunity, get involved
 * Viewport Width: 1280
 */
$hero   = get_theme_file_uri( '/assets/img/contact' );
$voices = get_theme_file_uri( '/assets/img/voices' );

$opps = array(
	array( 'title' => 'English as a Second Language (ESL) Tutor',                 'body' => 'As an immigrant-serving organization, we understand that women in newcomer communities thrive when language skills are met head-on. Become a volunteer ESL tutor and help build conversational and workplace English skills with women in the Twoboo / Yan-Backlot Contemporary / Diafia / Sundance / Mostpark, Castlefield 1+ Sondom, and the Sandy-Buford / Cherok / Manyam Casteltarn-on-Sea.' ),
	array( 'title' => 'Childcare Team Volunteer',                                 'body' => 'Volunteer in this fun on-site role: the workshop opportunity to assist in the care of children from 6 months — 8 years old. Activities will include caring for mothers attending ESL programs, parenting groups, parents and group families and more.' ),
	array( 'title' => 'Group Leader / Facilitator: Mental Health and Addictions Support', 'body' => 'Run group facilitator roles responsible for delivering shared moments, monthly chemistry workshops, and Joinhour-Wins enrollment to the participants. Group quarter support groups community presentations to consumers across women / family communities.' ),
	array( 'title' => 'Summer Camp Volunteer',                                    'body' => 'Volunteers for our various summer-camps roles develop leadership skills while supporting youth in dynamic and out-of-classroom settings. Volunteers contribute to the planning and project execution of a 6-week summer camp and field-trip programming that engages 200+ children, ages 6–13.' ),
	array( 'title' => 'Youth Career Exploration Mentor',                          'body' => 'Volunteer mentors will make a difference in the lives of CIWA youth by supplying through guidance — the experience, support, and inputs from career mentors using a flexible, personal commitment. Various focuses of mentoring intersperson and a casino-narrative skills of the work-shop and being-skipped by their members.' ),
);

$spotlights = array(
	array( 'name' => 'Bernadette Charan',  'role' => 'Director' ),
	array( 'name' => 'KayLynn Litton',     'role' => 'Director' ),
	array( 'name' => 'Dani Grover',        'role' => 'Director' ),
	array( 'name' => 'Yewande Esan',       'role' => 'Director' ),
	array( 'name' => 'Alishah Janmohamed', 'role' => 'Director' ),
	array( 'name' => 'Raisa Chowdhury',    'role' => 'Director' ),
);

$faqs = array(
	array( 'q' => 'What is CIWA and who do you support?',         'a' => 'CIWA is a nonprofit organization that supports immigrant women, girls, and their families through a wide range of settlement, language, employment, and community programs.' ),
	array( 'q' => 'How can I access CIWA services?',              'a' => 'Contact our intake line or visit any CIWA location — our team will help match you with the right program.' ),
	array( 'q' => 'What services does CIWA offer?',               'a' => 'Settlement, language training, employment skills, family services, wellbeing programs, and childcare.' ),
	array( 'q' => 'Do you provide job or employment support?',    'a' => 'Yes — our Employment Skills & Training program offers job-readiness training, placements, and ongoing career support.' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-volunteer-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-volunteer-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'VOLUNTEER WITH US', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Be a force for community. Volunteer alongside immigrant women across settlement, employment, childcare, and youth programs.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#opportunities"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="#volunteer-contact"><?php esc_html_e( 'GET INVOLVED', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/group.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- INTRO + OPPORTUNITIES -->
<!-- wp:group {"align":"full","className":"ciwa-volunteer","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-volunteer has-background-background-color has-background" id="opportunities">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-volunteer__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-volunteer__h"><?php esc_html_e( 'VOLUNTEER WITH', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'US', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-volunteer__intro"} -->
	<p class="has-text-align-center ciwa-volunteer__intro"><?php esc_html_e( 'CIWA volunteers play a critical role in the success of programs and services for immigrant women and their families. Whether you bring an hour a week or a whole season, your time changes lives.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":3,"className":"ciwa-volunteer__sub"} -->
	<h3 class="wp-block-heading has-text-align-center ciwa-volunteer__sub"><?php esc_html_e( 'OPPORTUNITIES', 'ciwa-final' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"ciwa-volunteer__opps","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-volunteer__opps">
	<?php foreach ( $opps as $o ) : ?>
		<!-- wp:group {"className":"ciwa-volunteer-opp","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-volunteer-opp">
			<!-- wp:heading {"level":3,"className":"ciwa-volunteer-opp__title"} -->
			<h3 class="wp-block-heading ciwa-volunteer-opp__title"><?php echo esc_html( $o['title'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-volunteer-opp__body"} -->
			<p class="ciwa-volunteer-opp__body"><?php echo esc_html( $o['body'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-volunteer-opp__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-volunteer-opp__cta-wrap">
				<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"ciwa-volunteer-opp__cta"} -->
				<div class="wp-block-button ciwa-volunteer-opp__cta"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#volunteer-contact"><?php esc_html_e( 'READ MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- VOLUNTEER SPOTLIGHTS -->
<!-- wp:group {"align":"full","className":"ciwa-volunteer-spotlight","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-volunteer-spotlight has-surface-cream-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-team__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-team__h"><?php esc_html_e( 'VOLUNTEER', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'SPOTLIGHTS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"className":"ciwa-team__grid","layout":{"type":"grid","columnCount":3}} -->
	<div class="wp-block-group ciwa-team__grid">
	<?php foreach ( $spotlights as $p ) : ?>
		<!-- wp:group {"className":"ciwa-team-card ciwa-team-card--board","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-team-card ciwa-team-card--board">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-team-card__photo"} -->
			<figure class="wp-block-image size-full ciwa-team-card__photo"><img src="<?php echo esc_url( $voices . '/avatar.svg' ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":4,"className":"ciwa-team-card__name"} -->
			<h4 class="wp-block-heading ciwa-team-card__name"><?php echo esc_html( $p['name'] ); ?></h4>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-team-card__role"} -->
			<p class="ciwa-team-card__role"><?php echo esc_html( $p['role'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#all"><?php esc_html_e( 'VIEW ALL VOLUNTEERS', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
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
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#opportunities"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-outline"} -->
		<div class="wp-block-button is-outline"><a class="wp-block-button__link wp-element-button" href="#volunteer-contact"><?php esc_html_e( 'CONTACT US', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- CONTACT -->
<!-- wp:group {"align":"full","className":"ciwa-partner-contact","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-contact has-surface-pink-background-color has-background" id="volunteer-contact">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-partner-contact__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-partner-contact__h"><?php esc_html_e( 'CONTACT', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'US', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-partner-contact__sub"} -->
	<p class="has-text-align-center ciwa-partner-contact__sub"><?php esc_html_e( 'Explore volunteer opportunities today!', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:html -->
	<form class="ciwa-partner-form" action="#" method="post">
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">First Name:</span><input type="text" name="first_name" /></label>
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">Email Address:</span><input type="email" name="email" /></label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Organization:</span><input type="text" name="organization" /></label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Volunteer Interest:</span><input type="text" name="interest" /></label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Message:</span><textarea name="message" rows="5"></textarea></label>
		</div>
		<div class="ciwa-partner-form__row ciwa-partner-form__row--actions">
			<button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SEND MESSAGE', 'ciwa-final' ); ?> &rsaquo;</button>
		</div>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
