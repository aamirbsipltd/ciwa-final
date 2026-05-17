<?php
/**
 * Title: Our Latest News
 * Slug: ciwa-final/news
 * Categories: ciwa-final
 * Description: News cards — fully editable canonical blocks.
 * Keywords: news, articles
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/news' );
$posts = array(
	array( 'photo' => $uri . '/n1.png', 'title' => 'Overqualified and Underrepresented: The Economic Reality for Black Women in Canada', 'body' => 'Exploring the challenges highly qualified immigrant women face in the workforce and the systemic barriers that affect career opportunities.' ),
	array( 'photo' => $uri . '/n2.png', 'title' => "It\xE2\x80\x99s Not Survivors Who Need to Change, But the Systems Around Them",     'body' => 'A deeper look at how communities and institutions must evolve to better support survivors of gender-based and economic abuse.' ),
);
ob_start();
?>
<div class="ciwa-news-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:32px;max-width:1320px;margin:0 auto">
<?php foreach ( $posts as $p ) : ?>
	<div class="ciwa-news-card">
		<img src="<?php echo esc_url( $p['photo'] ); ?>" alt="" style="width:100%;height:280px;object-fit:cover;display:block;border-radius:12px;margin-bottom:18px" />
		<h3 class="ciwa-news-title" style="font-family:var(--wp--preset--font-family--display);color:#e22371;font-size:1.5rem;font-weight:400;line-height:1.25;margin:0 0 12px;letter-spacing:-0.01em;text-transform:none"><?php echo esc_html( $p['title'] ); ?></h3>
		<p class="ciwa-news-body" style="color:#5b5b66;font-size:0.95rem;line-height:1.55;margin:0 0 14px"><?php echo esc_html( $p['body'] ); ?></p>
		<p class="ciwa-news-link" style="margin:0"><a href="#news" style="color:#f68b3c;font-weight:600;text-decoration:none;font-size:0.95rem">Read More &rsaquo;</a></p>
	</div>
<?php endforeach; ?>
</div>
<?php
$news_html = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-news","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-news">

	<!-- wp:heading {"level":2,"textAlign":"center","textColor":"primary","className":"ciwa-news-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-news-h has-primary-color has-text-color"><?php esc_html_e( 'OUR LATEST', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'NEWS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"text-muted"} -->
	<p class="has-text-align-center has-text-muted-color has-text-color"><?php esc_html_e( 'Stay informed with the latest updates, stories, and insights from our programs, community initiatives, and advocacy work.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<?php echo $news_html; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
