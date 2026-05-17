<?php
/**
 * Title: Call to action
 * Slug: ciwa-final/cta
 * Categories: ciwa-final
 * Description: Final CTA strip.
 * Keywords: cta, conversion, footer
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|6","right":"var:preset|spacing|6"}},"color":{"background":"var:preset|color|primary","text":"var:preset|color|primary-fg"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-text-color has-background" style="color:var(--wp--preset--color--primary-fg);background-color:var(--wp--preset--color--primary)">

	<!-- wp:heading {"level":2,"textAlign":"center","style":{"typography":{"fontSize":"var:preset|font-size|3xl"},"color":{"text":"var:preset|color|primary-fg"}}} -->
	<h2 class="has-text-align-center has-text-color" style="color:var(--wp--preset--color--primary-fg)"><?php esc_html_e( 'Ship the site this week.', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|8"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--8)">

		<!-- wp:button {"backgroundColor":"primary-fg","textColor":"primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-primary-fg-background-color has-text-color has-background wp-element-button" href="#"><?php esc_html_e( 'Start building', 'ciwa-final' ); ?></a></div>
		<!-- /wp:button -->

	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
