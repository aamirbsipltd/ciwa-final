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
<?php
$prog_colors = array(
	'purple' => '#6a1753',
	'pink'   => '#e22371',
	'orange' => '#f69538',
	'coral'  => '#ff6e6e',
	'olive'  => '#aaa835',
	'teal'   => '#5bbdad',
);
?>
<div class="ciwa-programs-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:24px;max-width:1320px;margin:0 auto">
<?php foreach ( $programs as $p ) : $bd = $prog_colors[ $p['col'] ] ?? '#6a1753'; ?>
	<div class="ciwa-program ciwa-program-<?php echo esc_attr( $p['col'] ); ?>" style="background:#fff;border:2px solid <?php echo esc_attr( $bd ); ?>;border-radius:14px;padding:32px 32px 28px">
		<div class="ciwa-program-head" style="display:flex;align-items:center;gap:18px;margin-bottom:14px">
			<img class="ciwa-program-icon" src="<?php echo esc_url( $p['icon'] ); ?>" alt="" style="width:54px;height:54px;flex-shrink:0" />
			<h3 class="ciwa-program-title" style="font-family:var(--wp--preset--font-family--display);font-size:1.65rem;font-weight:400;letter-spacing:-0.01em;color:#1a1a1a;margin:0;line-height:1.15;text-transform:uppercase"><?php echo $p['title']; ?></h3>
		</div>
		<p class="ciwa-program-copy" style="color:#1a1a1a;font-size:0.95rem;line-height:1.55;margin:0 0 16px"><?php echo esc_html( $p['body'] ); ?></p>
		<p class="ciwa-program-more" style="margin:0"><a href="#programs" style="color:<?php echo esc_attr( $bd ); ?>;font-weight:600;font-size:1rem;text-decoration:none">Learn More &rarr;</a></p>
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
