<?php
/**
 * Title: Follow Journey on Instagram
 * Slug: ciwa-final/instagram
 * Categories: ciwa-final
 * Description: IG strip — fully editable canonical blocks.
 * Keywords: instagram, social
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/instagram' );
$tiles = array( 'ig1.png', 'ig2.png', 'ig3.png', 'ig4.png', 'ig5.png' );
ob_start();
?>
<div class="ciwa-ig-grid" style="display:grid;grid-template-columns:repeat(5,1fr);gap:14px;max-width:1320px;margin:0 auto">
<?php foreach ( $tiles as $t ) : ?>
	<img src="<?php echo esc_url( $uri . '/' . $t ); ?>" alt="" style="width:100%;height:340px;object-fit:cover;display:block;border-radius:10px" />
<?php endforeach; ?>
</div>
<div class="ciwa-ig-cta-wrap" style="display:flex;justify-content:center;gap:14px;margin-top:32px;flex-wrap:wrap">
	<a href="https://instagram.com/" style="background:#f68b3c;color:#fff;padding:13px 26px;border-radius:8px;font-family:var(--wp--preset--font-family--display);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;text-decoration:none">VIEW ALL &rsaquo;</a>
	<a href="https://instagram.com/" style="background:transparent;color:#f68b3c;border:2px solid #f68b3c;padding:11px 24px;border-radius:8px;font-family:var(--wp--preset--font-family--display);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;text-decoration:none">FOLLOW US ON INSTAGRAM</a>
</div>
<?php
$ig_html = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-ig","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-ig has-surface-cream-background-color has-background">

	<!-- wp:paragraph {"align":"center","textColor":"pink","className":"ciwa-ig-eyebrow"} -->
	<p class="has-text-align-center ciwa-ig-eyebrow has-pink-color has-text-color"><?php esc_html_e( 'FOLLOW US ON Instagram', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"textAlign":"center","textColor":"primary","className":"ciwa-ig-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-ig-h has-primary-color has-text-color"><?php esc_html_e( 'FOLLOW OUR JOURNEY ON', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'INSTAGRAM', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<?php echo $ig_html; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
