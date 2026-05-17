<?php
/**
 * Title: Our Latest News
 * Slug: ciwa-final/news
 * Categories: ciwa-final
 * Description: News section — 2 news cards. Canonical Gutenberg blocks.
 * Keywords: news, articles
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/news' );
$posts = array(
	array( 'photo' => $uri . '/n1.png', 'title' => 'Overqualified and Underrepresented: The Economic Reality for Black Women in Canada', 'body' => 'Exploring the challenges highly qualified immigrant women face in the workforce and the systemic barriers that affect career opportunities.' ),
	array( 'photo' => $uri . '/n2.png', 'title' => "It\xE2\x80\x99s Not Survivors Who Need to Change, But the Systems Around Them",     'body' => 'A deeper look at how communities and institutions must evolve to better support survivors of gender-based and economic abuse.' ),
);
?>
<!-- wp:group {"align":"full","className":"ciwa-news","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-news">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-news-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-news-h"><?php esc_html_e( 'OUR LATEST', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'NEWS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-news-sub"} -->
	<p class="has-text-align-center ciwa-news-sub"><?php esc_html_e( 'Stay informed with the latest updates, stories, and insights from our programs, community initiatives, and advocacy work.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","className":"ciwa-news-grid"} -->
	<div class="wp-block-columns alignwide ciwa-news-grid">
	<?php foreach ( $posts as $p ) : ?>
		<!-- wp:column {"className":"ciwa-news-card"} -->
		<div class="wp-block-column ciwa-news-card">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-news-photo"} -->
			<figure class="wp-block-image size-full ciwa-news-photo"><img src="<?php echo esc_url( $p['photo'] ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"className":"ciwa-news-title"} -->
			<h3 class="wp-block-heading ciwa-news-title"><?php echo esc_html( $p['title'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-news-body"} -->
			<p class="ciwa-news-body"><?php echo esc_html( $p['body'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"ciwa-news-link"} -->
			<p class="ciwa-news-link"><a href="#news"><?php esc_html_e( 'Read More', 'ciwa-final' ); ?> &rsaquo;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
