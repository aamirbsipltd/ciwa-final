<?php
/**
 * Title: Settlement Supports — Full Page
 * Slug: ciwa-final/settlement-supports
 * Categories: ciwa-final
 * Description: Settlement Supports program page.
 * Keywords: settlement, supports
 * Viewport Width: 1280
 */
ciwa_render_program_page( array(
	'slug'           => 'settlement',
	'title'          => 'SETTLEMENT SUPPORTS',
	'intro'          => 'Help new arrivals find footing fast — housing, ID, schools, healthcare, language access, and a guided path through the first months in Canada.',
	'hero_dir'       => 'welcome',
	'hero_img'       => 'collage.png',
	'didyou_img'     => 'collage.png',
	'programs_label' => 'SETTLEMENT SUPPORT',
	'didyou'         => '"Thousands of immigrant women navigate their first year in Canada with the help of a CIWA settlement counsellor."',
	'programs'       => array(
		array( 'col' => 'purple', 'icon' => 'icon-1.svg', 'title' => 'Settlement and Referral',           'body' => 'One-on-one orientation, document help (SIN, AHC, ID), and warm referrals to housing, banking, schools, and healthcare partners.' ),
		array( 'col' => 'pink',   'icon' => 'icon-2.svg', 'title' => 'Case Management Support',          'body' => 'Personalized case plan, regular check-ins, and coordinated handoffs across CIWA programs for women with complex settlement needs.' ),
		array( 'col' => 'orange', 'icon' => 'icon-3.svg', 'title' => 'Community Connections',            'body' => 'Group sessions, peer mentors, and partner events that build social belonging beyond the formal services.' ),
		array( 'col' => 'coral',  'icon' => 'icon-4.svg', 'title' => 'Youth Support',                    'body' => 'School advocacy, after-school mentorship, and identity-building groups for immigrant youth and teens.' ),
	),
	'gain'           => array(
		array( 'col' => 'pink',   'body' => 'A clear first-90-days plan to get oriented in Calgary.' ),
		array( 'col' => 'orange', 'body' => 'Trusted referrals across 230+ employer and community partners.' ),
		array( 'col' => 'purple', 'body' => 'Bilingual support in 37+ languages from certified staff.' ),
		array( 'col' => 'coral',  'body' => 'Childcare and family support while you attend services.' ),
	),
) );
