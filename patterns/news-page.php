<?php
/**
 * Title: News Page — Full Page
 * Slug: ciwa-final/news-page
 * Categories: ciwa-final
 * Description: Standalone News page — hero + 6 news article cards in 3x2 grid.
 * Keywords: news, stories, articles
 * Viewport Width: 1280
 */
$hero   = get_theme_file_uri( '/assets/img/events' );
$news   = get_theme_file_uri( '/assets/img/news' );
$events = get_theme_file_uri( '/assets/img/events' );
$ig     = get_theme_file_uri( '/assets/img/instagram' );

$articles = array(
	array( 'img' => $events . '/e1.png', 'title' => "Ron Ghitter CM Scholarship Fund Recipients 2025", 'date' => 'Dec 16, 2025', 'body' => "We are proud to celebrate 18 outstanding women who have been selected as this year's Ron Ghitter CM Scholarship Fund recipients. Each recipient will receive a $2,500 scholarship to support their education and career goals." ),
	array( 'img' => $news . '/n1.png',   'title' => "CIWA is Turning a New Leaf",                       'date' => 'Dec 16, 2025', 'body' => "Today we announce a major new chapter for CIWA — new programs, expanded reach, and a renewed commitment to immigrant women across Calgary and beyond." ),
	array( 'img' => $ig . '/ig1.png',    'title' => "Roli's Story",                                     'date' => 'Dec 16, 2025', 'body' => "Roli arrived in Calgary with two children and no English. Two years later she runs her own catering business — here's how the CIWA settlement and employment programs helped her get there." ),
	array( 'img' => $ig . '/ig4.png',    'title' => "Volunteers Spend an Hour Daily",                   'date' => 'Dec 16, 2025', 'body' => "Our 140+ volunteers spend an average of one hour every day supporting newcomers — driving the small interactions that compound into lasting impact." ),
	array( 'img' => $events . '/e3.png', 'title' => "Cecilia's Story",                                  'date' => 'Dec 16, 2025', 'body' => "Cecilia joined CIWA's bridge-to-work program in 2023. Today she's leading a team at a Calgary biotech firm — and mentoring the next cohort of CIWA participants." ),
	array( 'img' => $news . '/n2.png',   'title' => "Ron Ghitter CM Scholarship Fund Recipients 2025",  'date' => 'Dec 16, 2025', 'body' => "Read the full list of this year's Ron Ghitter CM Scholarship recipients and the inspiring journeys behind each award." ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-news-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-news-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'NEWS', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Stories, milestones, and updates from CIWA and the immigrant women we work alongside.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#news"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="/volunteer-with-us/"><?php esc_html_e( 'GET INVOLVED', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/e1.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- LATEST NEWS GRID -->
<!-- wp:group {"align":"full","className":"ciwa-news-page","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-news-page has-background-background-color has-background" id="news">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-news-page__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-news-page__h"><?php esc_html_e( 'LATEST', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'NEWS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"ciwa-news-page__grid","layout":{"type":"grid","columnCount":2}} -->
	<div class="wp-block-group ciwa-news-page__grid">
	<?php foreach ( $articles as $a ) : ?>
		<!-- wp:group {"className":"ciwa-news-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-news-card">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-news-card__img"} -->
			<figure class="wp-block-image size-full ciwa-news-card__img"><img src="<?php echo esc_url( $a['img'] ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:group {"className":"ciwa-news-card__body","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-news-card__body">
				<!-- wp:heading {"level":3,"className":"ciwa-news-card__title"} -->
				<h3 class="wp-block-heading ciwa-news-card__title"><?php echo esc_html( $a['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-news-card__date"} -->
				<p class="ciwa-news-card__date"><?php echo esc_html( $a['date'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-news-card__excerpt"} -->
				<p class="ciwa-news-card__excerpt"><?php echo esc_html( $a['body'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-news-card__more"} -->
				<p class="ciwa-news-card__more"><a href="#article"><?php esc_html_e( 'Read More', 'ciwa-final' ); ?> &rsaquo;</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
