<?php
/**
 * Title: Useful Links — Full Page
 * Slug: ciwa-final/useful-links
 * Categories: ciwa-final
 * Description: Resources / Useful Links page — hero, intro, 2-column link list, view-all CTA.
 * Keywords: resources, links, useful
 * Viewport Width: 1280
 */
$pages = get_theme_file_uri( '/assets/img/pages' );
$links = array(
	array( 'Alberta Association of Immigrant Serving Agencies',  '#' ),
	array( 'Alberta Association of Services for Children and Families', '#' ),
	array( 'Alberta Employment and Immigration',                '#' ),
	array( 'Alberta Human Rights and Citizenship Commission',   '#' ),
	array( 'Alberta Network of Immigrant Women',                '#' ),
	array( 'Alberta Labour',                                    '#' ),
	array( 'Calgary and Area Child and Family Services Authority', '#' ),
	array( 'Calgary Board of Education',                        '#' ),
	array( 'Calgary Catholic Immigration Society',              '#' ),
	array( 'Centre for Newcomers',                              '#' ),
	array( 'Calgary Catholic School District',                  '#' ),
	array( 'Canadian Council for Refugees',                     '#' ),
	array( 'Calgary Immigrant Educational Society',             '#' ),
	array( 'Calgary Legal Guidance',                            '#' ),
	array( 'Calgary Multicultural Centre',                      '#' ),
	array( 'Canadian Immigrant Magazine',                       '#' ),
	array( 'Changing Together: A Centre for Immigrant Women',   '#' ),
);
$mid = (int) ceil( count( $links ) / 2 );
$left  = array_slice( $links, 0, $mid );
$right = array_slice( $links, $mid );
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-useful-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-useful-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'RESOURCES', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'A curated collection of trusted resources, programs, and services to help immigrant women and families build a strong life in Calgary.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#resources"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
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
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $pages . '/settlement-supports.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- BODY: Important Resources and Links -->
<!-- wp:group {"align":"full","className":"ciwa-useful","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-useful has-background-background-color has-background" id="resources">
	<!-- wp:heading {"level":2,"className":"ciwa-useful__h"} -->
	<h2 class="wp-block-heading ciwa-useful__h"><?php esc_html_e( 'IMPORTANT RESOURCES AND LINKS', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"ciwa-useful__intro"} -->
	<p class="ciwa-useful__intro"><?php esc_html_e( 'The ALIS website is a government of Alberta resource that covers everything from finding accommodations and work, setting up a bank account, to obtaining a health care card. There are also answers to questions about childcare, education, transportation, the legal system, recreation and more. Welcome to Alberta also has important phone numbers and websites to available resources.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","className":"ciwa-useful__grid"} -->
	<div class="wp-block-columns alignwide ciwa-useful__grid">

		<!-- wp:column {"className":"ciwa-useful__col"} -->
		<div class="wp-block-column ciwa-useful__col">
			<!-- wp:list {"className":"ciwa-useful__list"} -->
			<ul class="wp-block-list ciwa-useful__list">
			<?php foreach ( $left as $row ) : list( $label, $href ) = $row; ?>
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $label ); ?> &rsaquo;</a></li>
				<!-- /wp:list-item -->
			<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"ciwa-useful__col"} -->
		<div class="wp-block-column ciwa-useful__col">
			<!-- wp:list {"className":"ciwa-useful__list"} -->
			<ul class="wp-block-list ciwa-useful__list">
			<?php foreach ( $right as $row ) : list( $label, $href ) = $row; ?>
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $label ); ?> &rsaquo;</a></li>
				<!-- /wp:list-item -->
			<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-useful__viewall"} -->
	<div class="wp-block-buttons ciwa-useful__viewall">
		<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"ciwa-useful__viewall-cta"} -->
		<div class="wp-block-button ciwa-useful__viewall-cta"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#resources"><?php esc_html_e( 'VIEW ALL IMPORTANT RESOURCES AND LINKS', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
