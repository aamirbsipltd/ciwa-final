<?php
/**
 * Title: Programs & Services
 * Slug: ciwa-final/programs
 * Categories: ciwa-final
 * Description: 2x3 grid — horizontal cards (icon left, title right, body below, Learn More).
 * Keywords: programs, services
 * Viewport Width: 1280
 */
$uri = get_theme_file_uri( '/assets/img/programs' );
$programs = array(
	array( 'icon' => $uri . '/icon-1.svg', 'col' => 'purple', 'title' => 'SETTLEMENT SUPPORT',           'body' => 'Starting a new life in Canada can feel overwhelming. Our settlement services provide guidance, resources, and community connections to help newcomers adjust with confidence.' ),
	array( 'icon' => $uri . '/icon-2.svg', 'col' => 'pink',   'title' => 'EMPLOYMENT SKILLS &amp; TRAINING', 'body' => 'Build the skills you need to succeed in the Canadian workforce. Our employment programs help women gain job-ready skills, confidence, and career opportunities.' ),
	array( 'icon' => $uri . '/icon-3.svg', 'col' => 'orange', 'title' => 'FAMILY SERVICES',              'body' => 'Support for families is essential to building strong communities. Our programs help women and families navigate childcare, parenting, and everyday life in Canada.' ),
	array( 'icon' => $uri . '/icon-4.svg', 'col' => 'coral',  'title' => 'LANGUAGE TRAINING',            'body' => 'Improve your English communication skills while receiving childcare support. Our programs help women strengthen language, reading, writing, and conversation skills.' ),
	array( 'icon' => $uri . '/icon-5.svg', 'col' => 'olive',  'title' => 'WELLBEING AND RESILIENCY',     'body' => "Adjusting to a life in a new country can take time and effort for parents and families. At CIWA, we provide services to support parents and families\xE2\x80\x99 transition to life in Canada." ),
	array( 'icon' => $uri . '/icon-6.svg', 'col' => 'teal',   'title' => 'SMILES CHILDCARE CENTRE',      'body' => 'Our social enterprise childcare centre in Downtown Calgary where your child feels safe, supported, and happy.' ),
);
ob_start();
?>
<div class="ciwa-programs-grid">
<?php foreach ( $programs as $p ) : ?>
	<div class="ciwa-program ciwa-program-<?php echo esc_attr( $p['col'] ); ?>">
		<div class="ciwa-program-head">
			<img class="ciwa-program-icon" src="<?php echo esc_url( $p['icon'] ); ?>" alt="" />
			<h3 class="ciwa-program-title"><?php echo $p['title']; ?></h3>
		</div>
		<p class="ciwa-program-copy"><?php echo esc_html( $p['body'] ); ?></p>
		<p class="ciwa-program-more"><a href="#programs">Learn More &rarr;</a></p>
	</div>
<?php endforeach; ?>
</div>
<?php
$grid = ob_get_clean();
?>
<!-- wp:group {"align":"full","className":"ciwa-programs","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-programs has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-programs-h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-programs-h"><?php esc_html_e( 'PROGRAMS &amp; SERVICES', 'ciwa-final' ); ?><br><mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'THAT EMPOWER WOMEN', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-programs-sub"} -->
	<p class="has-text-align-center ciwa-programs-sub"><?php esc_html_e( 'CIWA offers a wide range of programs designed to help immigrant and refugee women build confidence, develop skills, and thrive in Canada.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<?php echo $grid; ?>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
