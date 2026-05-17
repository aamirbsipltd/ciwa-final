<?php
/**
 * Title: Our Impact
 * Slug: ciwa-final/stats
 * Categories: ciwa-final
 * Description: Purple intro card + 2x2 stat cards. Canonical Gutenberg blocks.
 * Keywords: stats, impact
 * Viewport Width: 1280
 */
$stats = array(
	array( 'col' => 'pink',   'val' => '31,644+',  'title' => 'Clients served',                       'body' => 'Women and families supported through CIWA programs this year.' ),
	array( 'col' => 'dark',   'val' => '50+',      'title' => 'Programs &amp; services',              'body' => 'Programs focused on employment, settlement, language, and wellbeing.' ),
	array( 'col' => 'orange', 'val' => '381,644+', 'title' => 'Total clients served since inception', 'body' => 'A legacy of community support and empowerment.' ),
	array( 'col' => 'coral',  'val' => '140+',     'title' => 'Community partnerships',               'body' => 'Collaborations with local organizations to expand impact.' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-impact-wrap","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-impact-wrap has-surface-cream-background-color has-background">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","className":"ciwa-impact-grid"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top ciwa-impact-grid">

		<!-- wp:column {"verticalAlignment":"top","width":"38%","className":"ciwa-impact-intro"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-impact-intro" style="flex-basis:38%">
			<!-- wp:heading {"level":2,"className":"ciwa-impact-h"} -->
			<h2 class="wp-block-heading ciwa-impact-h"><?php esc_html_e( 'OUR IMPACT', 'ciwa-final' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-impact-copy"} -->
			<p class="ciwa-impact-copy"><?php echo esc_html( "For over 40 years, the Canadian Immigrant Women\xE2\x80\x99s Association has supported immigrant and refugee women through programs that promote independence, leadership, and community connection. Here\xE2\x80\x99s a snapshot of our impact this year." ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-impact-cta-wrap"} -->
			<div class="wp-block-buttons ciwa-impact-cta-wrap">
				<!-- wp:button {"className":"ciwa-impact-cta"} -->
				<div class="wp-block-button ciwa-impact-cta"><a class="wp-block-button__link wp-element-button" href="#reports"><?php esc_html_e( 'SEE OUR ANNUAL REPORTS', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"60%","className":"ciwa-stat-cards"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-stat-cards" style="flex-basis:60%">
			<!-- wp:group {"className":"ciwa-stat-cards-grid","layout":{"type":"grid","columnCount":2}} -->
			<div class="wp-block-group ciwa-stat-cards-grid">
			<?php foreach ( $stats as $s ) : ?>
				<!-- wp:group {"className":"ciwa-stat ciwa-stat-<?php echo esc_attr( $s['col'] ); ?>","layout":{"type":"constrained"}} -->
				<div class="wp-block-group ciwa-stat ciwa-stat-<?php echo esc_attr( $s['col'] ); ?>">
					<!-- wp:heading {"level":3,"className":"ciwa-stat-val"} -->
					<h3 class="wp-block-heading ciwa-stat-val"><?php echo esc_html( $s['val'] ); ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"className":"ciwa-stat-title"} -->
					<p class="ciwa-stat-title"><?php echo $s['title']; ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"ciwa-stat-body"} -->
					<p class="ciwa-stat-body"><?php echo esc_html( $s['body'] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
