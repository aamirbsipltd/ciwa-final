<?php
/**
 * Title: Wellness — Full Page
 * Slug: ciwa-final/wellness
 * Categories: ciwa-final
 * Description: Mental Health & Wellbeing program page (formerly Wellness Programs / language-training-2 slug).
 * Keywords: wellness, mental health, wellbeing
 * Viewport Width: 1280
 */
ciwa_render_program_page( array(
	'slug'           => 'wellness',
	'title'          => 'MENTAL HEALTH AND WELLBEING',
	'intro'          => 'Counselling, peer support, and group programs that help immigrant women navigate stress, isolation, and the emotional weight of starting over.',
	'hero_dir'       => 'voices',
	'hero_img'       => 'photo-2.png',
	'didyou_img'     => 'photo-1.png',
	'programs_label' => 'HEALTH & WELLBEING',
	'didyou'         => '"Thousands of women access support programs every year — confidential, multilingual, and free."',
	'programs'       => array(
		array( 'col' => 'purple', 'icon' => 'icon-5.svg', 'title' => 'Counselling & Emotional Support',  'body' => 'One-on-one counselling with trauma-informed staff in 37+ languages — confidential and free.' ),
		array( 'col' => 'pink',   'icon' => 'icon-1.svg', 'title' => 'Wellness Workshops',               'body' => 'Group workshops on stress, sleep, parenting, and managing the emotional load of resettlement.' ),
		array( 'col' => 'orange', 'icon' => 'icon-2.svg', 'title' => 'Peer Support Groups',              'body' => 'Facilitated peer support groups where women share lived experience and build belonging.' ),
		array( 'col' => 'coral',  'icon' => 'icon-3.svg', 'title' => 'Crisis & Referral',                'body' => 'Immediate-need triage and warm referrals to specialized mental health and family violence supports.' ),
	),
	'gain'           => array(
		array( 'col' => 'pink',   'body' => 'A safe, confidential space to be heard.' ),
		array( 'col' => 'orange', 'body' => 'Counselling and groups in 37+ languages.' ),
		array( 'col' => 'purple', 'body' => 'Childcare available while you attend.' ),
		array( 'col' => 'coral',  'body' => 'Connections to specialized supports when needed.' ),
	),
) );
