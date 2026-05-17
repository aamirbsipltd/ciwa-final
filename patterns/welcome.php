<?php
/**
 * Title: Welcome to CIWA
 * Slug: ciwa-final/welcome
 * Categories: ciwa-final
 * Description: Welcome split-section — fully editable canonical core blocks.
 * Keywords: welcome, intro, about
 * Viewport Width: 1280
 */
$collage = get_theme_file_uri( '/assets/img/welcome/collage.png' );
$tags = array( 'Equity', 'Excellence', 'Collaboration', 'Inclusiveness', 'Empowerment' );
ob_start();
?>
<div class="ciwa-welcome-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:0;min-height:520px">
	<div class="ciwa-welcome-text" style="background:#fde9f1;padding:64px 56px;display:flex;flex-direction:column;justify-content:center">
		<p class="ciwa-welcome-eyebrow" style="font-family:var(--wp--preset--font-family--display);color:#6a1753;font-size:1.5rem;margin:0 0 4px;letter-spacing:0.02em">WELCOME TO</p>
		<h2 class="ciwa-welcome-title" style="font-family:var(--wp--preset--font-family--display);color:#e22371;font-size:6rem;font-weight:400;line-height:1;margin:0 0 24px;letter-spacing:-0.03em">CIWA</h2>
		<p class="ciwa-welcome-body" style="color:#1a1a1a;font-size:0.95rem;line-height:1.6;margin:0 0 24px;max-width:520px">CIWA (Canadian Immigrant Women Association) supports immigrant and refugee women, girls and their families. We have more than 50 programs that can support you with settlement needs, language and employment training, family services and much more.</p>
		<div class="ciwa-welcome-tags" style="display:flex;flex-wrap:wrap;gap:8px;margin:0 0 28px">
		<?php foreach ( $tags as $t ) : ?>
			<span style="background:#fff5fb;color:#6a1753;border:1px solid #ecc4dd;border-radius:999px;padding:6px 14px;font-size:0.82rem;font-weight:500"><?php echo esc_html( $t ); ?></span>
		<?php endforeach; ?>
		</div>
		<a href="/who-we-are/" style="display:inline-block;align-self:flex-start;background:#f68b3c;color:#fff;padding:13px 24px;border-radius:10px;font-family:var(--wp--preset--font-family--display);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05em;text-decoration:none">LEARN MORE ABOUT CIWA &rsaquo;</a>
	</div>
	<div class="ciwa-welcome-photocol" style="background:#6a1753;display:flex;align-items:center;justify-content:center;overflow:hidden">
		<img src="<?php echo esc_url( $collage ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block" />
	</div>
</div>
<?php
$welcome_html = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-welcome"} -->
<div class="wp-block-group alignfull ciwa-welcome">

	<!-- wp:html -->
	<?php echo $welcome_html; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
