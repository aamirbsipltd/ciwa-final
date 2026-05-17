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

		register_block_pattern_category(
			'ciwa-final',
			array( 'label' => __( 'CIWA', 'ciwa-final' ) )
		);
	}
}
add_action( 'after_setup_theme', 'ciwa_final_setup' );

function ciwa_final_enqueue_assets() {
	wp_enqueue_style(
		'ciwa-final-fonts',
		'https://fonts.googleapis.com/css2?family=Aboreto&family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'ciwa-final-style',
		get_stylesheet_uri(),
		array( 'ciwa-final-fonts' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ciwa_final_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'ciwa_final_enqueue_assets' );

// Auto-seed 19 WP Pages from Figma text inventories on theme activation.
require_once get_template_directory() . '/includes/seed-pages.php';
