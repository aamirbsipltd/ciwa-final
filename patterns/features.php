<?php
/**
 * Title: Features
 * Slug: ciwa-final/features
 * Categories: ciwa-final
 * Description: Three-column feature grid.
 * Keywords: features, grid, columns
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|6","right":"var:preset|spacing|6"}},"color":{"background":"var:preset|color|surface-1"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--surface-1)">

	<!-- wp:heading {"level":2,"textAlign":"center","style":{"typography":{"fontSize":"var:preset|font-size|2xl"}}} -->
	<h2 class="has-text-align-center"><?php esc_html_e( 'What you get', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|12"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--12)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"}}} -->
			<h3><?php esc_html_e( 'Token-first', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"text-muted"} -->
			<p class="has-text-muted-color has-text-color"><?php esc_html_e( 'Colors, type and spacing live in theme.json. Change them once and the whole site moves.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"}}} -->
			<h3><?php esc_html_e( 'Sections as patterns', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"text-muted"} -->
			<p class="has-text-muted-color has-text-color"><?php esc_html_e( 'Each Figma frame becomes a registered block pattern. Reused, never duplicated.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xl"}}} -->
			<h3><?php esc_html_e( 'Client-safe edits', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"text-muted"} -->
			<p class="has-text-muted-color has-text-color"><?php esc_html_e( 'The Site Editor edits copy and images; locked blocks keep the layout intact.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
