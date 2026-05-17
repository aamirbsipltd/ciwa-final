<?php
/**
 * Title: Family & Parenting Supports — Full Page
 * Slug: ciwa-final/family-parenting-supports
 * Categories: ciwa-final
 * Description: Family & Parenting Supports program page.
 * Keywords: family, parenting, children, supports
 * Viewport Width: 1280
 */
ciwa_render_program_page( array(
	'slug'           => 'family',
	'title'          => 'FAMILY & PARENTING SUPPORTS',
	'intro'          => 'Parenting, family violence support, and child-development programs that strengthen immigrant families across every life stage.',
	'hero_dir'       => 'voices',
	'hero_img'       => 'photo-1.png',
	'didyou_img'     => 'photo-2.png',
	'programs_label' => 'FAMILY & PARENTING SUPPORT',
	'didyou'         => '"Thousands of families supported every year — across more than 90 community locations in Calgary."',
	'programs'       => array(
		array( 'col' => 'purple', 'icon' => 'icon-3.svg', 'title' => 'Parenting Education',              'body' => 'Group workshops on Canadian parenting norms, child development, communication, and balancing two cultures at home.' ),
		array( 'col' => 'pink',   'icon' => 'icon-2.svg', 'title' => 'Child & Youth Programs',           'body' => 'Homework clubs, summer camps, and identity-building groups for newcomer children ages 6–18.' ),
		array( 'col' => 'orange', 'icon' => 'icon-4.svg', 'title' => 'Family Counselling',               'body' => 'Confidential family counselling — couples, parents, and individuals — in 37+ languages.' ),
		array( 'col' => 'coral',  'icon' => 'icon-6.svg', 'title' => 'Childcare On Site',                'body' => 'Drop-in childcare available while you attend CIWA programs, language classes, or counselling.' ),
	),
	'gain'           => array(
		array( 'col' => 'pink',   'body' => 'A safe space to navigate parenting in a new culture.' ),
		array( 'col' => 'orange', 'body' => 'Confidential, multilingual counselling support.' ),
		array( 'col' => 'purple', 'body' => 'On-site childcare while you attend services.' ),
		array( 'col' => 'coral',  'body' => 'Programs for the whole family across age groups.' ),
	),
) );
