<?php
/**
 * Title: Get In Touch
 * Slug: ciwa-final/contact
 * Categories: ciwa-final
 * Description: Contact form left + photo with 40+ badge right.
 * Keywords: contact, form, get in touch
 * Viewport Width: 1280
 */
$photo = get_theme_file_uri( '/assets/img/contact/group.png' );
?>
<!-- wp:group {"align":"full","className":"ciwa-contact","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-contact has-surface-pink-background-color has-background">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","className":"ciwa-contact-grid"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center ciwa-contact-grid">

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"ciwa-contact-form"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-contact-form" style="flex-basis:50%">

			<!-- wp:heading {"level":2,"className":"ciwa-contact-h"} -->
			<h2 class="wp-block-heading ciwa-contact-h"><?php esc_html_e( 'GET IN', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'TOUCH', 'ciwa-final' ); ?></mark></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"ciwa-contact-intro"} -->
			<p class="ciwa-contact-intro"><?php echo esc_html__( "Thank you for contacting us. We are ready to assist you. Please fill out the on-line form below and click \xE2\x80\x9Csubmit.\xE2\x80\x9D Our staff will contact you to find out how we can help.", 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<form class="ciwa-form" method="post" action="#">
				<div class="ciwa-form-row">
					<input class="ciwa-input" type="text" name="first_name" placeholder="First Name Here" required />
					<input class="ciwa-input" type="text" name="last_name"  placeholder="Last Name Here"  required />
				</div>
				<div class="ciwa-form-row">
					<input class="ciwa-input" type="tel"   name="phone" placeholder="Phone Number Here" />
					<input class="ciwa-input" type="email" name="email" placeholder="Type Your Email Here" required />
				</div>
				<input class="ciwa-input" type="text" name="language" placeholder="Language Spoken" />
				<fieldset class="ciwa-form-group">
					<legend>How would you like us to contact you?</legend>
					<label><input type="radio" name="contact_method" value="phone" /> Phone Call</label>
					<label><input type="radio" name="contact_method" value="email" /> Email</label>
					<label><input type="radio" name="contact_method" value="both" /> Both</label>
				</fieldset>
			</form>
			<!-- /wp:html -->

			<!-- wp:paragraph {"className":"ciwa-contact-media"} -->
			<p class="ciwa-contact-media">For all Media Inquiries: <a href="mailto:media@ciwa.org">media@ciwa.org</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"ciwa-contact-submit-wrap"} -->
			<div class="wp-block-buttons ciwa-contact-submit-wrap">
				<!-- wp:button {"className":"ciwa-contact-submit"} -->
				<div class="wp-block-button ciwa-contact-submit"><a class="wp-block-button__link wp-element-button" href="#submit"><?php esc_html_e( 'SUBMIT NOW', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"ciwa-contact-photocol"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-contact-photocol" style="flex-basis:50%">

			<!-- wp:group {"className":"ciwa-contact-photo-wrap","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-contact-photo-wrap">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-contact-photo"} -->
				<figure class="wp-block-image size-full ciwa-contact-photo"><img src="<?php echo esc_url( $photo ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:group {"className":"ciwa-contact-badge","layout":{"type":"constrained"}} -->
				<div class="wp-block-group ciwa-contact-badge">
					<!-- wp:heading {"level":3,"className":"ciwa-contact-badge-num"} -->
					<h3 class="wp-block-heading ciwa-contact-badge-num">40+</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"className":"ciwa-contact-badge-label"} -->
					<p class="ciwa-contact-badge-label">Years in Action</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
