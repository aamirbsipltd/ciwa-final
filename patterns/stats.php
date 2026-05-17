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
<?php
$stat_colors = array(
	'pink'   => '#e22371',
	'dark'   => '#1a1a1a',
	'orange' => '#f69538',
	'coral'  => '#ff6e6e',
);
?>
<div class="ciwa-impact-grid" style="display:grid;grid-template-columns:38% 60%;gap:2%;max-width:1320px;margin:0 auto;padding:80px 32px">
	<div class="ciwa-impact-intro" style="background:#6a1753;color:#fff;padding:48px 40px;border-radius:14px">
		<h3 class="ciwa-impact-h" style="font-family:var(--wp--preset--font-family--display);font-size:3rem;font-weight:400;color:#fff;margin:0 0 20px;letter-spacing:-0.02em">OUR IMPACT</h3>
		<p class="ciwa-impact-copy" style="color:#fff;font-size:1rem;line-height:1.55;margin:0 0 28px"><?php echo esc_html( "For over 40 years, the Canadian Immigrant Women\xE2\x80\x99s Association has supported immigrant and refugee women through programs that promote independence, leadership, and community connection. Here\xE2\x80\x99s a snapshot of our impact this year." ); ?></p>
		<a href="#reports" class="ciwa-impact-cta" style="display:inline-flex;align-items:center;gap:8px;background:#f68b3c;color:#fff;padding:14px 24px;border-radius:14px;font-family:var(--wp--preset--font-family--display);font-size:0.9rem;text-decoration:none;text-transform:uppercase;letter-spacing:0.04em">SEE OUR ANNUAL REPORTS &rsaquo;</a>
	</div>
	<div class="ciwa-stat-cards" style="display:grid;grid-template-columns:1fr 1fr;gap:18px">
	<?php foreach ( $stats as $s ) : $col = $stat_colors[ $s['col'] ] ?? '#1a1a1a'; ?>
		<div class="ciwa-stat ciwa-stat-<?php echo esc_attr( $s['col'] ); ?>" style="background:#fff;border:1.5px solid <?php echo esc_attr( $col ); ?>;border-radius:14px;padding:28px 24px">
			<div class="ciwa-stat-val" style="font-family:var(--wp--preset--font-family--display);font-size:2.5rem;font-weight:400;color:<?php echo esc_attr( $col ); ?>;line-height:1;margin-bottom:10px"><?php echo esc_html( $s['val'] ); ?></div>
			<div class="ciwa-stat-title" style="font-weight:600;color:#1a1a1a;font-size:1rem;margin-bottom:8px"><?php echo $s['title']; ?></div>
			<div class="ciwa-stat-body" style="color:#5b5b66;font-size:0.9rem;line-height:1.5"><?php echo esc_html( $s['body'] ); ?></div>
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
