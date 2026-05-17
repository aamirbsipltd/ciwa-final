<?php
/**
 * Title: Contact Page — Full Page
 * Slug: ciwa-final/contact-page
 * Categories: ciwa-final
 * Description: Standalone Contact page — hero, Contact Form with all fields + radio + newsletter opt-in, map.
 * Keywords: contact, form, support
 * Viewport Width: 1280
 */
$hero = get_theme_file_uri( '/assets/img/contact' );
$map  = get_theme_file_uri( '/assets/img/map' );
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-contact-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-contact-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'CONTACT', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Get in touch — our team is ready to help newcomers, partners, and supporters connect with the right CIWA program or service.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#contact-form"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
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
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/group.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- CONTACT FORM -->
<!-- wp:group {"align":"full","className":"ciwa-contact-form-wrap","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-contact-form-wrap has-background-background-color has-background" id="contact-form">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-contact-form__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-contact-form__h"><?php esc_html_e( 'CONTACT FORM', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-contact-form__sub"} -->
	<p class="has-text-align-center ciwa-contact-form__sub"><?php esc_html_e( 'Thank you for contacting us. We are ready to assist you. Please fill out the online form below and click "submit." Our staff will contact you to find out how we can help.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<form class="ciwa-partner-form" action="#" method="post">
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">First Name:</span><input type="text" name="first_name" /></label>
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">Last Name:</span><input type="text" name="last_name" /></label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">Email Address:</span><input type="email" name="email" /></label>
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">Phone:</span><input type="tel" name="phone" /></label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field"><span class="ciwa-partner-form__label">Language Spoken:</span><input type="text" name="language" /></label>
			<div class="ciwa-partner-form__field">
				<span class="ciwa-partner-form__label">How would you like us to contact you? *</span>
				<div class="ciwa-radio-row">
					<label><input type="radio" name="contact_pref" value="email" /> Email</label>
					<label><input type="radio" name="contact_pref" value="phone" /> Phone</label>
				</div>
			</div>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">How can we help you? *</span><textarea name="message" rows="5"></textarea></label>
		</div>
		<div class="ciwa-partner-form__row">
			<div class="ciwa-partner-form__field ciwa-partner-form__field--full">
				<span class="ciwa-partner-form__label">Would you like to receive updates on upcoming events by subscribing to CIWA's Newsletter?</span>
				<div class="ciwa-radio-row">
					<label><input type="radio" name="newsletter" value="yes" /> Yes</label>
					<label><input type="radio" name="newsletter" value="no" /> No</label>
				</div>
			</div>
		</div>
		<div class="ciwa-partner-form__row ciwa-partner-form__row--actions">
			<button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SUBMIT', 'ciwa-final' ); ?> &rsaquo;</button>
		</div>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- MAP -->
<!-- wp:group {"align":"full","className":"ciwa-contact-map","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-contact-map">
	<!-- wp:image {"sizeSlug":"full","className":"ciwa-contact-map__img"} -->
	<figure class="wp-block-image size-full ciwa-contact-map__img"><img src="<?php echo esc_url( $map . '/map.png' ); ?>" alt="Calgary office location map"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->
