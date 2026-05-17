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
