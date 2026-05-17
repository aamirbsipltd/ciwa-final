<?php
/**
 * Title: Annual Reports — Full Page
 * Slug: ciwa-final/annual-reports
 * Categories: ciwa-final
 * Description: Annual Reports page — hero, Transparency & Accountability intro, 3 report cards with highlights, explore-all CTA.
 * Keywords: annual reports, transparency, accountability
 * Viewport Width: 1280
 */
$hero  = get_theme_file_uri( '/assets/img/events' );
$reports = array(
	array( 'year' => '2025', 'tagline' => 'A year of growth, resilience, and community impact.', 'highlights' => array( '10,000+ women supported', 'Expanded employment programs', 'New community partnerships' ) ),
	array( 'year' => '2024', 'tagline' => 'A year of growth, resilience, and community impact.', 'highlights' => array( '10,000+ women supported', 'Expanded employment programs', 'New community partnerships' ) ),
	array( 'year' => '2023', 'tagline' => 'A year of growth, resilience, and community impact.', 'highlights' => array( '10,000+ women supported', 'Expanded employment programs', 'New community partnerships' ) ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-reports-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-reports-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'ANNUAL REPORTS', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Explore our annual reports to see how we are creating impact, empowering communities, and driving meaningful change.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#reports"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
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
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/e2.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- BODY: Annual Reports intro + Transparency & Accountability -->
<!-- wp:group {"align":"full","className":"ciwa-reports","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-reports has-background-background-color has-background" id="reports">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-reports__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-reports__h"><?php esc_html_e( 'ANNUAL', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'REPORTS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-reports__sub"} -->
	<p class="has-text-align-center ciwa-reports__sub"><?php esc_html_e( 'Explore our annual reports to see how we are creating impact, empowering communities, and driving meaningful change.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":3,"className":"ciwa-reports__transparency-h"} -->
	<h3 class="wp-block-heading has-text-align-center ciwa-reports__transparency-h"><?php esc_html_e( 'TRANSPARENCY & ACCOUNTABILITY', 'ciwa-final' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-reports__transparency-body"} -->
	<p class="has-text-align-center ciwa-reports__transparency-body"><?php esc_html_e( 'Our annual reports provide a comprehensive overview of our programs, impact, and financial performance. We are committed to transparency and sharing how we use resources to support women and families.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- 3 report cards -->
	<!-- wp:columns {"align":"wide","className":"ciwa-reports__grid"} -->
	<div class="wp-block-columns alignwide ciwa-reports__grid">
	<?php foreach ( $reports as $r ) : ?>
		<!-- wp:column {"className":"ciwa-reports-col"} -->
		<div class="wp-block-column ciwa-reports-col">
			<!-- wp:group {"className":"ciwa-report-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-report-card">
				<!-- wp:heading {"level":3,"className":"ciwa-report-card__year"} -->
				<h3 class="wp-block-heading ciwa-report-card__year"><?php echo esc_html( $r['year'] . ' ANNUAL REPORT' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-report-card__tagline"} -->
				<p class="ciwa-report-card__tagline"><?php echo esc_html( $r['tagline'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":4,"className":"ciwa-report-card__highlights-h"} -->
				<h4 class="wp-block-heading ciwa-report-card__highlights-h"><?php esc_html_e( 'Highlights:', 'ciwa-final' ); ?></h4>
				<!-- /wp:heading -->
				<!-- wp:list {"className":"ciwa-report-card__highlights"} -->
				<ul class="wp-block-list ciwa-report-card__highlights">
				<?php foreach ( $r['highlights'] as $h ) : ?>
					<!-- wp:list-item -->
					<li><?php echo esc_html( $h ); ?></li>
					<!-- /wp:list-item -->
				<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->
				<!-- wp:buttons {"className":"ciwa-report-card__cta-wrap"} -->
				<div class="wp-block-buttons ciwa-report-card__cta-wrap">
					<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"ciwa-report-card__cta"} -->
					<div class="wp-block-button ciwa-report-card__cta"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#report"><?php esc_html_e( 'View Report', 'ciwa-final' ); ?></a></div>
					<!-- /wp:button -->
					<!-- wp:button {"className":"ciwa-report-card__cta is-outline"} -->
					<div class="wp-block-button ciwa-report-card__cta is-outline"><a class="wp-block-button__link wp-element-button" href="#download"><?php esc_html_e( 'Download PDF', 'ciwa-final' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-reports__viewall"} -->
	<div class="wp-block-buttons ciwa-reports__viewall">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-reports__viewall-cta"} -->
		<div class="wp-block-button ciwa-reports__viewall-cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#all"><?php esc_html_e( 'EXPLORE ALL ANNUAL REPORTS', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
