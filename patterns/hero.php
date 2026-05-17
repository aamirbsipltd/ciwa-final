<?php
/**
 * Title: Hero
 * Slug: ciwa-final/hero
 * Categories: ciwa-final, featured
 * Description: Hero — Title-case heading left, full-width photo bg, gradient overlay. Pixel-aligned to Figma node 1:4292.
 * Keywords: hero, banner, landing
 * Block Types: core/post-content
 * Viewport Width: 1280
 */
$hero_img = get_theme_file_uri( '/assets/img/hero/figma-hero.png' );
ob_start();
?>
<section class="ciwa-hero-section" style="position:relative;width:100%;min-height:720px;overflow:hidden;background:#fafaf0">
	<img src="<?php echo esc_url( $hero_img ); ?>" alt="" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;display:block" />
	<div style="position:absolute;inset:0;background:linear-gradient(99deg, rgba(250,250,240,1) 21%, rgba(250,250,240,0) 69%)"></div>
	<div class="ciwa-hero-content" style="position:relative;max-width:1660px;margin:0 auto;padding:140px 130px 140px;display:flex;align-items:center;min-height:720px">
		<div class="ciwa-hero-text" style="max-width:871px;width:100%">
			<h1 class="ciwa-hero-title" style="font-family:var(--wp--preset--font-family--display);color:#e22371;font-size:54px;font-weight:400;line-height:1.2;letter-spacing:-0.005em;margin:0 0 41px"><?php esc_html_e( 'Empower Immigrant Women Enrich Canadian Society', 'ciwa-final' ); ?></h1>
			<p class="ciwa-hero-sub" style="font-family:var(--wp--preset--font-family--sans);color:#111;font-size:20px;line-height:1.6;margin:0 0 38px;max-width:678px"><?php echo esc_html__( "The Canadian Immigrant Women\xE2\x80\x99s Association supports immigrant women and their families since 1982", 'ciwa-final' ); ?></p>
			<div class="ciwa-hero-ctas" style="display:flex;gap:29px;flex-wrap:wrap">
				<a class="ciwa-hero-cta-orange" href="#contact" style="background:#f68b3c;color:#fff;font-family:var(--wp--preset--font-family--display);font-size:20px;padding:20px 32px;border-radius:14px 14px 0 14px;text-decoration:none;display:inline-flex;align-items:center;gap:10px"><?php esc_html_e( 'Get Support', 'ciwa-final' ); ?> &rsaquo;</a>
				<a class="ciwa-hero-cta-purple" href="#donate" style="background:#6a1753;color:#fff;font-family:var(--wp--preset--font-family--display);font-size:20px;padding:20px 32px;border-radius:14px 14px 0 14px;text-decoration:none;display:inline-flex;align-items:center;gap:10px"><?php esc_html_e( 'Donate Now', 'ciwa-final' ); ?> &rsaquo;</a>
			</div>
		</div>
	</div>
	<div class="ciwa-hero-stripes" style="position:absolute;bottom:0;left:0;right:0;display:flex;flex-direction:column">
		<div style="height:20px;background:#e22371"></div>
		<div style="height:16px;background:rgba(226,35,113,0.3)"></div>
	</div>
</section>
<?php
$hero_html = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-hero">

	<!-- wp:html -->
	<?php echo $hero_html; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
