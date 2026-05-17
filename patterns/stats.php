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
	array( 'val' => '31,644+',  'col' => '#e22371', 'title' => 'Clients served',                       'body' => 'Women and families supported through CIWA programs this year.' ),
	array( 'val' => '50+',      'col' => '#1a1a1a', 'title' => 'Programs &amp; services',              'body' => 'Programs focused on employment, settlement, language, and wellbeing.' ),
	array( 'val' => '381,644+', 'col' => '#f69538', 'title' => 'Total clients served since inception', 'body' => 'A legacy of community support and empowerment.' ),
	array( 'val' => '140+',     'col' => '#ff6e6e', 'title' => 'Community partnerships',               'body' => 'Collaborations with local organizations to expand impact.' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-impact-wrap","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-impact-wrap has-surface-cream-background-color has-background" style="padding:80px 32px">

	<!-- wp:columns {"align":"wide","verticalAlignment":"top","className":"ciwa-impact-grid"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top ciwa-impact-grid">

		<!-- wp:column {"verticalAlignment":"top","width":"38%","className":"ciwa-impact-intro"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-impact-intro" style="flex-basis:38%;background:#6a1753;color:#fff;padding:48px 40px;border-radius:14px">
			<h2 class="wp-block-heading" style="font-family:var(--wp--preset--font-family--display);font-size:3rem;font-weight:400;color:#fff;margin:0 0 20px;letter-spacing:-0.02em">OUR IMPACT</h2>
			<p style="color:#fff;font-size:1rem;line-height:1.55;margin:0 0 28px"><?php echo esc_html__( "For over 40 years, the Canadian Immigrant Women\xE2\x80\x99s Association has supported immigrant and refugee women through programs that promote independence, leadership, and community connection. Here\xE2\x80\x99s a snapshot of our impact this year.", 'ciwa-final' ); ?></p>
			<a href="#reports" style="display:inline-flex;align-items:center;gap:8px;background:#f68b3c;color:#fff;padding:14px 24px;border-radius:14px;font-family:var(--wp--preset--font-family--display);font-size:0.9rem;text-decoration:none;text-transform:uppercase;letter-spacing:0.04em">SEE OUR ANNUAL REPORTS &rsaquo;</a>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top","width":"60%","className":"ciwa-stat-cards"} -->
		<div class="wp-block-column is-vertically-aligned-top ciwa-stat-cards" style="flex-basis:60%">
			<div style="display:grid;grid-template-columns:1fr 1fr;gap:18px">
				<?php foreach ( $stats as $s ) : ?>
				<div style="background:#fff;border:1.5px solid <?php echo esc_attr( $s['col'] ); ?>;border-radius:14px;padding:28px 24px">
					<div style="font-family:var(--wp--preset--font-family--display);font-size:2.5rem;font-weight:400;color:<?php echo esc_attr( $s['col'] ); ?>;line-height:1;margin-bottom:10px"><?php echo esc_html( $s['val'] ); ?></div>
					<div style="font-weight:600;color:#1a1a1a;font-size:1rem;margin-bottom:8px"><?php echo $s['title']; ?></div>
					<div style="color:#5b5b66;font-size:0.9rem;line-height:1.5"><?php echo esc_html( $s['body'] ); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
