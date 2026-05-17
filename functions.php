<?php
/**
 * Ciwa Final — theme functions.
 *
 * Tokens live in theme.json; sections live as block patterns in /patterns;
 * templates live as block markup in /templates and /parts.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ciwa_final_setup' ) ) {
	function ciwa_final_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		// Load the theme's frontend stylesheet INSIDE the Gutenberg editor iframe
		// so blocks render with the same .ciwa-* styling the visitor sees.
		// Fonts are now loaded via theme.json fontFamilies[].fontFace (self-hosted
		// woff2 in /assets/fonts/), which WP injects into both editor and frontend
		// — so we no longer need the Google Fonts URL here (and add_editor_style
		// does not reliably inject absolute URLs as <link> tags into the iframe).
		add_editor_style( 'style.css' );

		register_block_pattern_category(
			'ciwa-final',
			array( 'label' => __( 'CIWA', 'ciwa-final' ) )
		);
	}
}
add_action( 'after_setup_theme', 'ciwa_final_setup' );

function ciwa_final_enqueue_assets() {
	// Fonts come from theme.json fontFace declarations (self-hosted woff2);
	// WP auto-enqueues those on both frontend + editor. No separate handle needed.
	wp_enqueue_style(
		'ciwa-final-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ciwa_final_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'ciwa_final_enqueue_assets' );

// Auto-seed 19 WP Pages from Figma text inventories on theme activation.
require_once get_template_directory() . '/includes/seed-pages.php';

// Shared "program page" template used by all 5 program-detail pages
// (settlement-supports / employment-skills-training / family-parenting-supports
// /  language-training / wellness). Each pattern file calls this helper
// with its own $config.
require_once get_template_directory() . '/includes/program-page.php';

/**
 * Pages converted to hand-built patterns. For each entry, the seeded
 * WP Page's content is force-replaced with a pattern reference whenever
 * the theme Version bumps — so the page always renders the latest
 * pattern, not the v0.x heuristic auto-content.
 */
function ciwa_final_pattern_pages() {
	return array(
		'partner-with-us'        => 'ciwa-final/partner-with-us',
		'useful-links'           => 'ciwa-final/useful-links',
		'annual-reports'         => 'ciwa-final/annual-reports',
		'contact'                => 'ciwa-final/contact-page',
		'leadership-governance'  => 'ciwa-final/leadership-governance',
		'board-of-directors'     => 'ciwa-final/board-of-directors',
		'news'                   => 'ciwa-final/news-page',
		'donate'                 => 'ciwa-final/donate',
		'become-a-member'        => 'ciwa-final/become-a-member',
		'events'                 => 'ciwa-final/events-page',
		'newsletter'             => 'ciwa-final/newsletter',
		'volunteer-with-us'      => 'ciwa-final/volunteer-with-us',
		'awards-recognition'     => 'ciwa-final/awards-recognition',
		'who-we-are'             => 'ciwa-final/who-we-are',
		'settlement-supports'    => 'ciwa-final/settlement-supports',
		'employment-skills-training' => 'ciwa-final/employment-skills-training',
		'family-parenting-supports'  => 'ciwa-final/family-parenting-supports',
		'language-training'      => 'ciwa-final/language-training',
		'language-training-2'    => 'ciwa-final/wellness',
	);
}
function ciwa_final_maybe_migrate_pattern_pages() {
	$current = wp_get_theme()->get( 'Version' );
	$stored  = get_option( 'ciwa_final_pattern_pages_version', '0' );
	if ( version_compare( $stored, $current, '>=' ) ) {
		return;
	}
	foreach ( ciwa_final_pattern_pages() as $slug => $pattern_slug ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $page ) {
			continue;
		}
		$new_content = sprintf( '<!-- wp:pattern {"slug":"%s"} /-->', esc_attr( $pattern_slug ) );
		if ( $page->post_content !== $new_content ) {
			wp_update_post( array(
				'ID'           => $page->ID,
				'post_content' => $new_content,
			) );
		}
	}
	update_option( 'ciwa_final_pattern_pages_version', $current );
}
add_action( 'init', 'ciwa_final_maybe_migrate_pattern_pages' );
