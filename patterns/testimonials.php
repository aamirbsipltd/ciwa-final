<?php
/**
 * Title: Voices From Our Community
 * Slug: ciwa-final/testimonials
 * Categories: ciwa-final
 * Description: Voices testimonials — fully editable canonical blocks.
 * Keywords: testimonials, voices, stories
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/voices' );
$voices = array(
	array( 'photo' => $uri . '/photo-1.png', 'quote' => 'Moving to a new country was overwhelming, but CIWA made it easier for my family. Their support gave us stability and a sense of belonging.',                            'author' => 'Emily Johnson',  'role' => 'Program Participant' ),
	array( 'photo' => $uri . '/photo-2.png', 'quote' => 'The employment program helped me secure my first job in Canada. The guidance and encouragement I received made a huge difference in my journey.', 'author' => 'Jessica Brown', 'role' => 'Program Participant' ),
);
ob_start();
?>
<div class="ciwa-voices-grid" style="display:grid;grid-template-columns:340px 1fr 1fr;gap:24px;max-width:1320px;margin:0 auto;align-items:start">
	<div class="ciwa-voices-intro" style="color:#fff;padding-top:8px">
		<h2 class="ciwa-voices-h" style="font-family:var(--wp--preset--font-family--display);font-size:3rem;font-weight:400;color:#fff;line-height:1.1;margin:0 0 18px"><?php esc_html_e( 'VOICES FROM', 'ciwa-final' ); ?> <span style="color:#ff6e6e;display:block"><?php esc_html_e( 'OUR COMMUNITY', 'ciwa-final' ); ?></span></h2>
		<p class="ciwa-voices-sub" style="color:#fff;font-size:0.95rem;line-height:1.55;margin:0 0 24px;opacity:0.95"><?php esc_html_e( 'Real stories from women whose lives have been impacted through our programs and support services.', 'ciwa-final' ); ?></p>
		<a href="#stories" style="display:inline-block;background:#f68b3c;color:#fff;padding:12px 22px;border-radius:8px;font-family:var(--wp--preset--font-family--display);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.04em;text-decoration:none">READ MORE STORIES &rsaquo;</a>
	</div>
<?php foreach ( $voices as $v ) : ?>
	<div class="ciwa-voice" style="background:#fff;border-radius:14px;overflow:hidden;position:relative">
		<div style="position:relative">
			<img src="<?php echo esc_url( $v['photo'] ); ?>" alt="" style="width:100%;height:220px;object-fit:cover;display:block" />
			<span style="position:absolute;bottom:-22px;right:18px;width:48px;height:48px;border-radius:50%;background:#f68b3c;color:#fff;display:grid;place-items:center;font-size:1.5rem;line-height:1;box-shadow:0 6px 20px rgba(0,0,0,0.2)">&#8220;</span>
		</div>
		<div style="padding:32px 22px 22px">
			<p class="ciwa-voice-quote" style="color:#1a1a1a;font-size:0.92rem;line-height:1.55;margin:0 0 18px;font-style:italic"><?php echo esc_html( $v['quote'] ); ?></p>
			<h4 class="ciwa-voice-author" style="font-family:var(--wp--preset--font-family--display);font-size:1.05rem;font-weight:400;color:#e22371;margin:0;text-transform:uppercase;letter-spacing:0.03em"><?php echo esc_html( $v['author'] ); ?></h4>
			<p class="ciwa-voice-role" style="color:#5b5b66;font-size:0.85rem;margin:4px 0 0"><?php echo esc_html( $v['role'] ); ?></p>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php
$voices_html = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-voices","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-voices has-primary-background-color has-background">

	<!-- wp:html -->
	<?php echo $voices_html; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
