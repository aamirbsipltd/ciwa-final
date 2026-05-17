<?php
/**
 * Title: Who We Are — Full Page
 * Slug: ciwa-final/who-we-are
 * Categories: ciwa-final
 * Description: About / Who We Are page — hero, intro, history timeline, vision/mission/values, quick facts, land acknowledgement.
 * Keywords: about, who we are, history, vision, mission
 * Viewport Width: 1280
 */
$hero = get_theme_file_uri( '/assets/img/welcome' );

$history = array(
	array( 'year' => '1980s', 'text' => 'Founding & Anchoring Beginnings — Established 1982 as a registered charity supporting newly arrived immigrant women and their families in Calgary.' ),
	array( 'year' => '1990s', 'text' => 'Building Roots & Foundations — First language and settlement programs scaled across Calgary partner sites.' ),
	array( 'year' => '2000s', 'text' => 'CIWA Program Expansion & Recognition — Employment, family, and child-care services added; major literacy and impact awards received.' ),
	array( 'year' => '2010s', 'text' => 'Growing Impact in the Community — Citywide partnerships and youth-focused programming launch. Awards from United Way, KPMG, Calgary Learns, and others.' ),
	array( 'year' => '2020s', 'text' => 'Expansion & National Voice — Reaching newcomers across Alberta with virtual programming, and a national voice on immigration policy.' ),
	array( 'year' => '2025', 'text' => 'A Renewed Chapter — New leadership, expanded board, and a renewed strategic plan for the next decade.' ),
);

$facts = array(
	array( 'col' => 'pink',   'body' => 'We offer over 50 programs and services for immigrant women and their families.' ),
	array( 'col' => 'orange', 'body' => 'We host programs and services in over 90 community locations.' ),
	array( 'col' => 'purple', 'body' => 'Clients fleeing family violence have access to emergency housing support.' ),
	array( 'col' => 'coral',  'body' => 'Childcare support is available for all clients attending CIWA services (including community locations).' ),
	array( 'col' => 'pink',   'body' => 'Certified interpreters and translators offer services in 37 languages.' ),
	array( 'col' => 'orange', 'body' => 'Over 230 businesses and employers collaborate with us to support access to employment.' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-wwa-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-wwa-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'WHO WE ARE', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Canadian Immigrant Women\'s Association — a non-profit organization established in 1982 as a registered charity, supporting immigrant and refugee women across Calgary.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#history"><?php esc_html_e( 'OUR HISTORY', 'ciwa-final' ); ?> &rsaquo;</a></div>
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
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/collage.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- WHO WE ARE INTRO -->
<!-- wp:group {"align":"full","className":"ciwa-wwa-intro","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-wwa-intro has-background-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-wwa-intro__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-wwa-intro__h"><?php esc_html_e( 'WHO WE', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'ARE', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-wwa-intro__body"} -->
	<p class="has-text-align-center ciwa-wwa-intro__body"><?php esc_html_e( 'Canadian Immigrant Women\'s Association (CIWA) is a non-profit organization established in 1982 as a registered charity. CIWA is a culturally diverse settlement agency that recognizes the strengths and contributions of immigrant women. We offer programs and services that use a holistic approach to support clients in the areas of settlement and integration, literacy and language training, employment, family, wellbeing, and resilience.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- HISTORY -->
<!-- wp:group {"align":"full","className":"ciwa-wwa-history","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-wwa-history has-surface-cream-background-color has-background" id="history">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-wwa-history__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-wwa-history__h"><?php esc_html_e( 'HISTORY', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"className":"ciwa-wwa-history__list","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-wwa-history__list">
	<?php foreach ( $history as $h ) : ?>
		<!-- wp:group {"className":"ciwa-wwa-history__item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-wwa-history__item">
			<!-- wp:heading {"level":3,"className":"ciwa-wwa-history__year"} -->
			<h3 class="wp-block-heading ciwa-wwa-history__year"><?php echo esc_html( $h['year'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-wwa-history__text"} -->
			<p class="ciwa-wwa-history__text"><?php echo esc_html( $h['text'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- VISION / MISSION / VALUES -->
<!-- wp:group {"align":"full","className":"ciwa-vmv","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-vmv has-background-background-color has-background">
	<!-- wp:group {"className":"ciwa-vmv__grid","layout":{"type":"grid","columnCount":3}} -->
	<div class="wp-block-group ciwa-vmv__grid">
		<!-- wp:group {"className":"ciwa-vmv-card ciwa-vmv-card--purple","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-vmv-card ciwa-vmv-card--purple">
			<!-- wp:heading {"level":3,"className":"ciwa-vmv-card__h"} -->
			<h3 class="wp-block-heading ciwa-vmv-card__h"><?php esc_html_e( 'Vision', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-vmv-card__body"} -->
			<p class="ciwa-vmv-card__body"><?php esc_html_e( 'National leader in transitioning immigrant women to success in Canada.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:group {"className":"ciwa-vmv-card ciwa-vmv-card--orange","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-vmv-card ciwa-vmv-card--orange">
			<!-- wp:heading {"level":3,"className":"ciwa-vmv-card__h"} -->
			<h3 class="wp-block-heading ciwa-vmv-card__h"><?php esc_html_e( 'Mission', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-vmv-card__body"} -->
			<p class="ciwa-vmv-card__body"><?php esc_html_e( 'Empower immigrant women. Enrich Canadian society.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:group {"className":"ciwa-vmv-card ciwa-vmv-card--pink","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-vmv-card ciwa-vmv-card--pink">
			<!-- wp:heading {"level":3,"className":"ciwa-vmv-card__h"} -->
			<h3 class="wp-block-heading ciwa-vmv-card__h"><?php esc_html_e( 'Values', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-vmv-card__body"} -->
			<p class="ciwa-vmv-card__body"><?php esc_html_e( 'Equity. Excellence. Collaboration. Inclusiveness. Empowerment.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- QUICK FACTS -->
<!-- wp:group {"align":"full","className":"ciwa-wwa-facts","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-wwa-facts has-surface-cream-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-wwa-facts__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-wwa-facts__h"><?php esc_html_e( 'QUICK', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'FACTS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"className":"ciwa-wwa-facts__grid","layout":{"type":"grid","columnCount":3}} -->
	<div class="wp-block-group ciwa-wwa-facts__grid">
	<?php foreach ( $facts as $f ) : ?>
		<!-- wp:group {"className":"ciwa-wwa-fact ciwa-wwa-fact--<?php echo esc_attr( $f['col'] ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-wwa-fact ciwa-wwa-fact--<?php echo esc_attr( $f['col'] ); ?>">
			<!-- wp:paragraph {"className":"ciwa-wwa-fact__body"} -->
			<p class="ciwa-wwa-fact__body"><?php echo esc_html( $f['body'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- LAND ACKNOWLEDGEMENT -->
<!-- wp:group {"align":"full","className":"ciwa-wwa-land","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-wwa-land has-primary-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-wwa-land__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-wwa-land__h"><?php esc_html_e( 'LAND', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'ACKNOWLEDGEMENT', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-wwa-land__body"} -->
	<p class="has-text-align-center ciwa-wwa-land__body"><?php esc_html_e( 'As an immigrant-serving organization, we acknowledge that we work on the traditional lands of the Treaty 7 Nations: the Blackfoot Confederacy (Siksika, Piikani, Kainai), the Tsuut\'ina Nation, and the Stoney Nakoda Nations (Chiniki, Bearspaw, Goodstoney).', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-wwa-land__body"} -->
	<p class="has-text-align-center ciwa-wwa-land__body"><?php esc_html_e( 'We honour the diverse histories, languages, and cultures of the Indigenous peoples who have lived on this land for generations. As settlers, we recognize the ongoing impact of colonization and commit to learning, listening, and walking alongside Indigenous communities.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
