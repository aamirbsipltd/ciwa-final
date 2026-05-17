<?php
/**
 * Title: Leadership & Governance — Full Page
 * Slug: ciwa-final/leadership-governance
 * Categories: ciwa-final
 * Description: Leadership & Governance page — hero + 12-person staff grid.
 * Keywords: leadership, governance, staff, team
 * Viewport Width: 1280
 */
$hero   = get_theme_file_uri( '/assets/img/welcome' );
$voices = get_theme_file_uri( '/assets/img/voices' );

// 12 leaders in 3 rows × 4 cols. Initials are placeholder avatars.
$team = array(
	array( 'name' => 'Paula Calderon',    'role' => 'Chief Executive Officer',                          'email' => 'ceo@ciwa.org' ),
	array( 'name' => 'Biraj Patel',       'role' => 'Chief Financial Officer',                          'email' => 'cfo@ciwa.org' ),
	array( 'name' => 'Eva Szasz-Redmond', 'role' => 'Chief Operating Officer',                          'email' => 'coo@ciwa.org' ),
	array( 'name' => 'Nurishah Dharamsi', 'role' => 'Director of Communications & Partnerships',         'email' => 'media@ciwa.org' ),
	array( 'name' => 'Leanna Kielau',     'role' => 'Director People & Culture',                        'email' => 'dhra@ciwa.org' ),
	array( 'name' => 'Penny Bates',       'role' => 'Director of SMILES Childcare Centre',              'email' => 'info@smileschildcarecentre.ca' ),
	array( 'name' => 'Veronica Aliu',     'role' => 'Family Services Department Manager',               'email' => 'familyservices@ciwa.org' ),
	array( 'name' => 'Gurpreet Kaur',     'role' => 'Language Training and Childcare Department Manager', 'email' => 'language@ciwa.org' ),
	array( 'name' => 'Kemi Awodein',      'role' => 'Settlement and Integration Department Manager',     'email' => 'settlement@ciwa.org' ),
	array( 'name' => 'Sarah Williams',    'role' => 'Employment Department Manager',                    'email' => 'employment@ciwa.org' ),
	array( 'name' => 'Priya Sharma',      'role' => 'Wellbeing & Resiliency Manager',                   'email' => 'wellbeing@ciwa.org' ),
	array( 'name' => 'Amina Okonkwo',     'role' => 'Programs & Partnerships Coordinator',              'email' => 'programs@ciwa.org' ),
);

function ciwa_emit_team_card( $p, $voices ) {
	$initials = '';
	foreach ( preg_split( '/\s+/', $p['name'] ) as $w ) {
		if ( $w !== '' ) $initials .= mb_substr( $w, 0, 1 );
	}
	?>
	<!-- wp:group {"className":"ciwa-team-card","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-team-card">
		<!-- wp:image {"sizeSlug":"full","className":"ciwa-team-card__photo"} -->
		<figure class="wp-block-image size-full ciwa-team-card__photo"><img src="<?php echo esc_url( $voices . '/avatar.svg' ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":4,"className":"ciwa-team-card__name"} -->
		<h4 class="wp-block-heading ciwa-team-card__name"><?php echo esc_html( $p['name'] ); ?></h4>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"className":"ciwa-team-card__role"} -->
		<p class="ciwa-team-card__role"><?php echo esc_html( $p['role'] ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"ciwa-team-card__email"} -->
		<p class="ciwa-team-card__email"><a href="mailto:<?php echo esc_attr( $p['email'] ); ?>"><?php echo esc_html( $p['email'] ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php
}
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-leadership-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-leadership-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'LEADERSHIP & GOVERNANCE', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Meet the leadership team driving CIWA\'s programs, partnerships, and community impact.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#team"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
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

<!-- TEAM GRID -->
<!-- wp:group {"align":"full","className":"ciwa-team","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-team has-background-background-color has-background" id="team">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-team__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-team__h"><?php esc_html_e( 'LEADERSHIP &', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'GOVERNANCE', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-team__intro"} -->
	<p class="has-text-align-center ciwa-team__intro"><?php esc_html_e( "CIWA's leadership team brings deep expertise across settlement, employment, family services, language training, and operations — guiding programs that empower thousands of immigrant women each year.", 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"ciwa-team__grid","layout":{"type":"grid","columnCount":4}} -->
	<div class="wp-block-group ciwa-team__grid">
	<?php foreach ( $team as $p ) ciwa_emit_team_card( $p, $voices ); ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
