<?php
/**
 * Title: Get In Touch
 * Slug: ciwa-final/contact
 * Categories: ciwa-final
 * Description: Contact form left + group photo right (canonical core blocks, explicit 50/50 split).
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
			<!-- wp:heading {"level":2,"textColor":"primary","className":"ciwa-contact-h"} -->
			<h2 class="wp-block-heading ciwa-contact-h has-primary-color has-text-color"><?php esc_html_e( 'Get In Touch', 'ciwa-final' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"text-muted"} -->
			<p class="has-text-muted-color has-text-color"><?php echo esc_html__( "Thank you for contacting us. We are ready to assist you. Please fill out the on-line form below and click \xE2\x80\x9Csubmit.\xE2\x80\x9D Our staff will contact you to find out how we can help.", 'ciwa-final' ); ?></p>
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
				<p class="ciwa-form-meta">For all Media Inquiries: <a href="mailto:media@ciwa.org">media@ciwa.org</a></p>
				<button class="ciwa-submit" type="submit">SUBMIT NOW &rsaquo;</button>
			</form>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"ciwa-contact-photocol"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-contact-photocol" style="flex-basis:50%">
			<!-- wp:image {"className":"ciwa-contact-photo"} -->
			<figure class="wp-block-image ciwa-contact-photo"><img src="<?php echo esc_url( $photo ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
