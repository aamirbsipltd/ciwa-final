<?php
/**
 * Title: Programs & Services
 * Slug: ciwa-final/programs
 * Categories: ciwa-final
 * Description: Programs & Services — 2 columns × 3 stacked cards per column. Each card is a canonical wp:group with icon, heading, body, link.
 * Keywords: programs, services
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/programs' );
$programs = array(
	array( 'icon' => $uri . '/icon-1.svg', 'col' => 'purple', 'title' => 'SETTLEMENT SUPPORT',              'body' => 'Starting a new life in Canada can feel overwhelming. Our settlement services provide guidance, resources, and community connections to help newcomers adjust with confidence.' ),
	array( 'icon' => $uri . '/icon-2.svg', 'col' => 'pink',   'title' => 'EMPLOYMENT SKILLS &amp; TRAINING','body' => 'Build the skills you need to succeed in the Canadian workforce. Our employment programs help women gain job-ready skills, confidence, and career opportunities.' ),
	array( 'icon' => $uri . '/icon-3.svg', 'col' => 'orange', 'title' => 'FAMILY SERVICES',                 'body' => 'Support for families is essential to building strong communities. Our programs help women and families navigate childcare, parenting, and everyday life in Canada.' ),
	array( 'icon' => $uri . '/icon-4.svg', 'col' => 'coral',  'title' => 'LANGUAGE TRAINING',               'body' => 'Improve your English communication skills while receiving childcare support. Our programs help women strengthen language, reading, writing, and conversation skills.' ),
	array( 'icon' => $uri . '/icon-5.svg', 'col' => 'olive',  'title' => 'WELLBEING AND RESILIENCY',        'body' => "Adjusting to a life in a new country can take time and effort for parents and families. At CIWA, we provide services to support parents and families\xE2\x80\x99 transition to life in Canada." ),
	array( 'icon' => $uri . '/icon-6.svg', 'col' => 'teal',   'title' => 'SMILES CHILDCARE CENTRE',         'body' => 'Our social enterprise childcare centre in Downtown Calgary where your child feels safe, supported, and happy.' ),
);
$col_left  = array_slice( $programs, 0, 3 );
$col_right = array_slice( $programs, 3, 3 );

/**
 * Emit one card. The card is a canonical wp:group with className
 * "ciwa-program-card ciwa-program-card--<variant>".
 *
 * Markup inside (vertical stack):
 *   wp:image            (icon, 54px)
 *   wp:heading h3       (title in display font)
 *   wp:paragraph        (body in sans)
 *   wp:paragraph + <a>  (Learn More → link, bottom of card)
 */
function ciwa_emit_program_card( $p ) {
	$col   = esc_attr( $p['col'] );
	$icon  = esc_url( $p['icon'] );
	$body  = esc_html( $p['body'] );
	$title = $p['title']; // intentionally not escaped — manifest values include &amp; entities.
	?>
		<!-- wp:group {"className":"ciwa-program-card ciwa-program-card--<?php echo $col; ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-program-card ciwa-program-card--<?php echo $col; ?>">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-program-card__icon"} -->
			<figure class="wp-block-image size-full ciwa-program-card__icon"><img src="<?php echo $icon; ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"className":"ciwa-program-card__title"} -->
			<h3 class="wp-block-heading ciwa-program-card__title"><?php echo $title; ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-program-card__copy"} -->
			<p class="ciwa-program-card__copy"><?php echo $body; ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"ciwa-program-card__more"} -->
			<p class="ciwa-program-card__more"><a href="#programs">Learn More &rarr;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php
}
?>
<!-- wp:group {"align":"full","className":"ciwa-programs","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-programs has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-programs-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-programs-h"><?php esc_html_e( 'PROGRAMS &amp; SERVICES', 'ciwa-final' ); ?><br><mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'THAT EMPOWER WOMEN', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-programs-sub"} -->
	<p class="has-text-align-center ciwa-programs-sub"><?php esc_html_e( 'CIWA offers a wide range of programs designed to help immigrant and refugee women build confidence, develop skills, and thrive in Canada.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","className":"ciwa-programs-grid"} -->
	<div class="wp-block-columns alignwide ciwa-programs-grid">

		<!-- wp:column {"className":"ciwa-programs-col"} -->
		<div class="wp-block-column ciwa-programs-col">
		<?php foreach ( $col_left as $p ) ciwa_emit_program_card( $p ); ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"ciwa-programs-col"} -->
		<div class="wp-block-column ciwa-programs-col">
		<?php foreach ( $col_right as $p ) ciwa_emit_program_card( $p ); ?>
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
