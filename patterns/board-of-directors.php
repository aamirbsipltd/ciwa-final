<?php
/**
 * Title: Board of Directors — Full Page
 * Slug: ciwa-final/board-of-directors
 * Categories: ciwa-final
 * Description: Board of Directors page — hero + 12-member board grid + quote.
 * Keywords: board, directors, governance
 * Viewport Width: 1280
 */
$pages  = get_theme_file_uri( '/assets/img/pages' );
$voices = get_theme_file_uri( '/assets/img/voices' );

$board = array(
	array( 'name' => 'Jung Lee',           'role' => 'Board Chair' ),
	array( 'name' => 'Jennifer McFadyen',  'role' => 'Board Vice-Chair' ),
	array( 'name' => 'Tony DiMaio',        'role' => 'Treasurer' ),
	array( 'name' => 'Hajar Kacem',        'role' => 'Governance Committee Chair' ),
	array( 'name' => 'Teisha Iglesias',    'role' => 'HR Committee Chair' ),
	array( 'name' => 'Jeni Piepgrass',     'role' => 'Director' ),
	array( 'name' => 'Bernadette Charan',  'role' => 'Director' ),
	array( 'name' => 'KayLynn Litton',     'role' => 'Director' ),
	array( 'name' => 'Dani Grover',        'role' => 'Director' ),
	array( 'name' => 'Yewande Esan',       'role' => 'Director' ),
	array( 'name' => 'Alishah Janmohamed', 'role' => 'Director' ),
	array( 'name' => 'Raisa Chowdhury',    'role' => 'Director' ),
);

function ciwa_emit_board_card( $p, $voices ) {
	?>
	<!-- wp:group {"className":"ciwa-team-card ciwa-team-card--board","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-team-card ciwa-team-card--board">
		<!-- wp:image {"sizeSlug":"full","className":"ciwa-team-card__photo"} -->
		<figure class="wp-block-image size-full ciwa-team-card__photo"><img src="<?php echo esc_url( $voices . '/avatar.svg' ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":4,"className":"ciwa-team-card__name"} -->
		<h4 class="wp-block-heading ciwa-team-card__name"><?php echo esc_html( $p['name'] ); ?></h4>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"className":"ciwa-team-card__role"} -->
		<p class="ciwa-team-card__role"><?php echo esc_html( $p['role'] ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php
}
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-board-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-board-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'BOARD OF DIRECTORS', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'The CIWA Board of Directors brings together community, business, and governance leaders dedicated to advancing the mission of empowering immigrant women.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#board"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
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
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $pages . '/who-we-are.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- BOARD GRID -->
<!-- wp:group {"align":"full","className":"ciwa-team","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-team has-background-background-color has-background" id="board">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-team__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-team__h"><?php esc_html_e( 'BOARD OF', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'DIRECTORS', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-team__sub"} -->
	<p class="has-text-align-center ciwa-team__sub"><strong><?php esc_html_e( 'BOARD OF DIRECTORS 2023-2026', 'ciwa-final' ); ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-team__intro"} -->
	<p class="has-text-align-center ciwa-team__intro"><?php esc_html_e( 'The Board holds the Annual General Meeting of CIWA in June of each year. To contact the Board of Directors, please email board@ciwa-online.com.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"ciwa-team__grid","layout":{"type":"grid","columnCount":4}} -->
	<div class="wp-block-group ciwa-team__grid">
	<?php foreach ( $board as $p ) ciwa_emit_board_card( $p, $voices ); ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:quote {"className":"ciwa-team__quote","align":"center"} -->
	<blockquote class="wp-block-quote ciwa-team__quote has-text-align-center">
		<p><?php esc_html_e( '"CIWA demonstrates superior relationship building initiatives, such as this retreat, which is relevant today and engaging with members, staff, and the community."', 'ciwa-final' ); ?></p>
	</blockquote>
	<!-- /wp:quote -->

</div>
<!-- /wp:group -->
