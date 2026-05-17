<?php
/**
 * CIWA — auto-seed WordPress Pages on theme activation.
 *
 * Each Figma page becomes a real WP Page (post type `page`) so the
 * customer can edit it via wp-admin → Pages → [Name] → Edit in the
 * Gutenberg block editor.
 *
 * Source of truth for each page's verbatim text: seed-data/<slug>.json
 * (extracted from the Figma metadata at conversion time).
 *
 * The seed runs once on theme activation. After that, all edits the
 * customer makes in wp-admin persist normally — we never overwrite an
 * existing page's content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Strings that appear in every Figma page (nav chrome, footer chrome).
 * Filtered out of the per-page body content so we don't duplicate them.
 */
function ciwa_final_chrome_strings() {
	return array(
		'Centre Closure Notice: Our office will be closed on Monday, July 1st for Canada Day. Programs will resume Tuesday.',
		'Home', 'About CIWA', 'Programs and Services', 'News and Events', 'Resources', 'Contact',
		'CIWA COMPASS', 'Search Here', 'EN', 'En',
		'Get Support', 'Donate Now', 'Contact Us', 'Events', 'Donate',
		'Quick Links', 'Contact Info', 'follow Us',
		'Our Newsletter', 'Subscribe to our newsletter', 'Type your Email Here',
		"Canadian Immigrant Women\xE2\x80\x99s Association",
		'Charitable Registration # 118823657 RR0001',
		"#200, 138\xE2\x80\x934th Avenue SE, Calgary AB T2G 4Z6",
		'welcome@ciwa.org', '403-263-4414',
		'About Us', 'Portfolio', 'Testimonials', 'Careers', 'Volunteer', 'Contact & Locations', 'land acknowledgement',
		'Privacy Policy | Accessibility | Sitemap',
		"\xC2\xA9 2024 Canadian Immigrant Women\xE2\x80\x99s Association | All Rights Reserved.",
		'EQUITY', 'EXCELLENCE', 'COLLABORATION', 'INCLUSIVENESS', 'EMPOWERMENT',
		'read more', 'Read More', 'READ MORE', 'view all', 'view all news', 'view all events', 'view all newsletter', 'view all upcoming events',
	);
}

/**
 * Heuristic block-markup builder.
 * Strings shorter than 28 chars with no lowercase letters → H2.
 * Strings shorter than 60 chars title-cased → H3.
 * Long strings → paragraph.
 * Skips duplicates and chrome strings.
 */
function ciwa_final_build_page_content( $title, $items ) {
	$chrome = array_flip( ciwa_final_chrome_strings() );
	$seen = array();
	$blocks = array();

	// Hero: page title in display font over surface-pink.
	$blocks[] = sprintf(
		'<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|8","right":"var:preset|spacing|8"}},"color":{"background":"var:preset|color|surface-pink"}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--surface-pink);padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--8)">
<!-- wp:heading {"level":1,"textAlign":"center","style":{"typography":{"fontFamily":"var:preset|font-family|display","fontSize":"var:preset|font-size|5xl","fontWeight":"400","textTransform":"uppercase","letterSpacing":"-0.02em"},"color":{"text":"var:preset|color|primary"}}} -->
<h1 class="has-text-align-center has-primary-color has-text-color" style="color:var(--wp--preset--color--primary);font-family:var(--wp--preset--font-family--display);font-size:var(--wp--preset--font-size--5xl);font-weight:400;letter-spacing:-0.02em;text-transform:uppercase">%s</h1>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->',
		esc_html( $title )
	);

	// Body: walk text items in document order, dropping chrome and dupes.
	$blocks[] = '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|24","left":"var:preset|spacing|8","right":"var:preset|spacing|8"}}},"layout":{"type":"constrained","contentSize":"880px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--8)">';

	foreach ( $items as $item ) {
		$text = isset( $item['text'] ) ? trim( $item['text'] ) : '';
		if ( '' === $text ) { continue; }
		if ( isset( $chrome[ $text ] ) ) { continue; }
		if ( isset( $seen[ $text ] ) ) { continue; }
		$seen[ $text ] = true;

		$len = mb_strlen( $text );

		// Short, all-uppercase → H2 section heading.
		if ( $len <= 28 && $text === mb_strtoupper( $text ) && preg_match( '/[A-Z]/', $text ) ) {
			$blocks[] = sprintf(
				'<!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|display","fontWeight":"400","letterSpacing":"-0.02em"},"color":{"text":"var:preset|color|primary"}}} -->
<h2 class="has-primary-color has-text-color" style="color:var(--wp--preset--color--primary);font-family:var(--wp--preset--font-family--display);font-weight:400;letter-spacing:-0.02em">%s</h2>
<!-- /wp:heading -->',
				esc_html( $text )
			);
		}
		// Short, title-cased → H3 sub-heading.
		elseif ( $len <= 60 && preg_match( '/^[A-Z]/', $text ) ) {
			$blocks[] = sprintf(
				'<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var:preset|font-family|display","fontWeight":"400"},"color":{"text":"var:preset|color|primary"}}} -->
<h3 class="has-primary-color has-text-color" style="color:var(--wp--preset--color--primary);font-family:var(--wp--preset--font-family--display);font-weight:400">%s</h3>
<!-- /wp:heading -->',
				esc_html( $text )
			);
		}
		// Otherwise paragraph.
		else {
			$blocks[] = sprintf(
				'<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|lg","lineHeight":"1.65"}}} -->
<p style="font-size:var(--wp--preset--font-size--lg);line-height:1.65">%s</p>
<!-- /wp:paragraph -->',
				esc_html( $text )
			);
		}
	}

	$blocks[] = '</div>
<!-- /wp:group -->';

	return implode( "\n\n", $blocks );
}

/**
 * The 19 inner pages + Home, with their human titles and seed-data slugs.
 * Order roughly follows the nav menu groups.
 */
function ciwa_final_page_definitions() {
	return array(
		'home'                       => 'Home',
		'who-we-are'                 => 'Who We Are',
		'leadership-governance'      => 'Leadership and Governance',
		'board-of-directors'         => 'Board of Directors',
		'awards-recognition'         => 'Awards and Recognition',
		'annual-reports'             => 'Annual Reports',
		'settlement-supports'        => 'Settlement Supports',
		'employment-skills-training' => 'Employment Skills and Training',
		'family-parenting-supports'  => 'Family and Parenting Supports',
		'language-training'          => 'Language Training',
		'language-training-2'        => 'Wellness Programs',
		'partner-with-us'            => 'Partner With Us',
		'donate'                     => 'Donate',
		'volunteer-with-us'          => 'Volunteer With Us',
		'become-a-member'            => 'Become a Member',
		'news'                       => 'News',
		'events'                     => 'Events',
		'newsletter'                 => 'Newsletter',
		'useful-links'               => 'Useful Links',
		'contact'                    => 'Contact',
	);
}

/**
 * Special Home content — uses our hand-built front-page patterns so it
 * matches the pixel-1:1 Home we already built.
 */
function ciwa_final_home_content() {
	return implode( "\n\n", array(
		'<!-- wp:pattern {"slug":"ciwa-final/hero"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/how-help"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/welcome"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/programs"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/events"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/stats"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/testimonials"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/news"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/instagram"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/contact"} /-->',
		'<!-- wp:pattern {"slug":"ciwa-final/map"} /-->',
	) );
}

/**
 * Seed the pages once. Runs on theme activation.
 * Idempotent: skips any page whose slug already exists, so customer edits
 * are never overwritten.
 */
function ciwa_final_seed_pages() {
	$seed_dir = get_template_directory() . '/seed-data';
	$definitions = ciwa_final_page_definitions();
	$home_id = 0;

	foreach ( $definitions as $slug => $title ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing ) {
			if ( 'home' === $slug ) { $home_id = (int) $existing->ID; }
			continue;
		}

		if ( 'home' === $slug ) {
			$content = ciwa_final_home_content();
		} else {
			$json_path = $seed_dir . '/' . $slug . '.json';
			if ( ! file_exists( $json_path ) ) { continue; }
			$items = json_decode( file_get_contents( $json_path ), true );
			if ( ! is_array( $items ) ) { continue; }
			$content = ciwa_final_build_page_content( $title, $items );
		}

		$post_id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_content' => $content,
			'post_author'  => 1,
		) );

		if ( 'home' === $slug && $post_id && ! is_wp_error( $post_id ) ) {
			$home_id = (int) $post_id;
		}
	}

	// Set Home as static front page.
	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	// Enable pretty permalinks so /who-we-are/ etc. resolve to the WP Page.
	if ( '' === get_option( 'permalink_structure' ) || '/%postname%/' !== get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
		global $wp_rewrite;
		if ( $wp_rewrite ) {
			$wp_rewrite->set_permalink_structure( '/%postname%/' );
			flush_rewrite_rules( true );
		}
	}

	// Build the primary nav menu so the header links to real WP URLs.
	ciwa_final_seed_primary_menu( $definitions );
}
add_action( 'after_switch_theme', 'ciwa_final_seed_pages' );

/**
 * Build a "Primary" nav menu and assign it to the `primary` location.
 * Items map to the WP Pages we just seeded.
 */
function ciwa_final_seed_primary_menu( $definitions ) {
	$menu_name = 'Primary';
	$menu = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = (int) $menu->term_id;
		// Reset items so we re-seed cleanly.
		$existing_items = wp_get_nav_menu_items( $menu_id );
		if ( $existing_items ) {
			foreach ( $existing_items as $item ) {
				wp_delete_post( $item->ID, true );
			}
		}
	}

	// Top-level nav matching the Figma site:
	// Home, About CIWA, Programs & Services, News & Events, Resources, Contact
	$nav = array(
		array( 'title' => 'Home',                'slug' => 'home',                 'children' => array() ),
		array( 'title' => 'About CIWA',          'slug' => 'who-we-are',           'children' => array(
			array( 'title' => 'Who We Are',                  'slug' => 'who-we-are' ),
			array( 'title' => 'Leadership and Governance',     'slug' => 'leadership-governance' ),
			array( 'title' => 'Board of Directors',          'slug' => 'board-of-directors' ),
			array( 'title' => 'Awards and Recognition',        'slug' => 'awards-recognition' ),
			array( 'title' => 'Annual Reports',              'slug' => 'annual-reports' ),
			array( 'title' => 'Partner With Us',             'slug' => 'partner-with-us' ),
			array( 'title' => 'Become a Member',             'slug' => 'become-a-member' ),
		) ),
		array( 'title' => 'Programs and Services', 'slug' => 'settlement-supports',  'children' => array(
			array( 'title' => 'Settlement Supports',         'slug' => 'settlement-supports' ),
			array( 'title' => 'Employment Skills and Training','slug' => 'employment-skills-training' ),
			array( 'title' => 'Family and Parenting Supports', 'slug' => 'family-parenting-supports' ),
			array( 'title' => 'Language Training',           'slug' => 'language-training' ),
			array( 'title' => 'Wellness Programs',           'slug' => 'language-training-2' ),
		) ),
		array( 'title' => 'News and Events',       'slug' => 'news',                 'children' => array(
			array( 'title' => 'News',                        'slug' => 'news' ),
			array( 'title' => 'Events',                      'slug' => 'events' ),
		) ),
		array( 'title' => 'Resources',           'slug' => 'newsletter',           'children' => array(
			array( 'title' => 'Newsletter',                  'slug' => 'newsletter' ),
			array( 'title' => 'Useful Links',                'slug' => 'useful-links' ),
		) ),
		array( 'title' => 'Get Involved',        'slug' => 'volunteer-with-us',    'children' => array(
			array( 'title' => 'Volunteer With Us',           'slug' => 'volunteer-with-us' ),
			array( 'title' => 'Donate',                      'slug' => 'donate' ),
		) ),
		array( 'title' => 'Contact',             'slug' => 'contact',              'children' => array() ),
	);

	foreach ( $nav as $top ) {
		$page = get_page_by_path( $top['slug'], OBJECT, 'page' );
		if ( ! $page ) { continue; }
		$parent_id = wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'     => $top['title'],
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $page->ID,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
		) );
		foreach ( $top['children'] as $child ) {
			$child_page = get_page_by_path( $child['slug'], OBJECT, 'page' );
			if ( ! $child_page ) { continue; }
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'     => $child['title'],
				'menu-item-parent-id' => $parent_id,
				'menu-item-object'    => 'page',
				'menu-item-object-id' => $child_page->ID,
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
			) );
		}
	}

	// Register the menu location so the navigation block can target it.
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

register_nav_menus( array( 'primary' => 'Primary' ) );
