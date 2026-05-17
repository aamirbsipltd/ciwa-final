<?php
/**
 * Title: Our Impact
 * Slug: ciwa-final/stats
 * Categories: ciwa-final
 * Description: OUR IMPACT — left intro + Annual Reports CTA over rounded purple card, right 2x2 stat cards.
 * Keywords: stats, impact
 * Viewport Width: 1280
 */
$stats = array(
	array( 'col' => 'pink',   'val' => '31,644+',  'title' => 'Clients served',                       'body' => 'Women and families supported through CIWA programs this year.' ),
	array( 'col' => 'dark',   'val' => '50+',      'title' => 'Programs &amp; services',              'body' => 'Programs focused on employment, settlement, language, and wellbeing.' ),
	array( 'col' => 'orange', 'val' => '381,644+', 'title' => 'Total clients served since inception', 'body' => 'A legacy of community support and empowerment.' ),
	array( 'col' => 'coral',  'val' => '140+',     'title' => 'Community partnerships',               'body' => 'Collaborations with local organizations to expand impact.' ),
);
ob_start();
?>
<div class="ciwa-impact-grid">
	<div class="ciwa-impact-intro">
		<h3 class="ciwa-impact-h">OUR IMPACT</h3>
		<p class="ciwa-impact-copy"><?php echo esc_html( "For over 40 years, the Canadian Immigrant Women\xE2\x80\x99s Association has supported immigrant and refugee women through programs that promote independence, leadership, and community connection. Here\xE2\x80\x99s a snapshot of our impact this year." ); ?></p>
		<a href="#reports" class="ciwa-impact-cta">SEE OUR ANNUAL REPORTS &rsaquo;</a>
	</div>
	<div class="ciwa-stat-cards">
	<?php foreach ( $stats as $s ) : ?>
		<div class="ciwa-stat ciwa-stat-<?php echo esc_attr( $s['col'] ); ?>">
			<div class="ciwa-stat-val"><?php echo esc_html( $s['val'] ); ?></div>
			<div class="ciwa-stat-title"><?php echo $s['title']; ?></div>
			<div class="ciwa-stat-body"><?php echo esc_html( $s['body'] ); ?></div>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php
$grid = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-impact-wrap","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-impact-wrap has-surface-cream-background-color has-background">

	<!-- wp:html -->
	<?php echo $grid; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
