<?php
/**
 * Title: Employment Skills & Training — Full Page
 * Slug: ciwa-final/employment-skills-training
 * Categories: ciwa-final
 * Description: Employment Skills & Training program page.
 * Keywords: employment, skills, training, jobs
 * Viewport Width: 1280
 */
ciwa_render_program_page( array(
	'slug'           => 'employment',
	'title'          => 'EMPLOYMENT SKILLS & TRAINING',
	'intro'          => 'Job-readiness training, sector-specific certifications, and one-on-one career coaching that turns Canadian work experience into long-term careers.',
	'hero_dir'       => 'instagram',
	'hero_img'       => 'ig2.png',
	'didyou_img'     => 'ig3.png',
	'programs_label' => 'SKILLS & TRAINING',
	'didyou'         => '"71% of participants find employment within 6 months of completing a CIWA training program."',
	'programs'       => array(
		array( 'col' => 'purple', 'icon' => 'icon-1.svg', 'title' => 'Job-Readiness Programs',           'body' => 'Resume, interview, and Canadian workplace culture training — 4-week intake every month.' ),
		array( 'col' => 'pink',   'icon' => 'icon-2.svg', 'title' => 'Career Counselling',               'body' => 'One-on-one career counsellors who match skills, credentials, and goals to real Canadian opportunities.' ),
		array( 'col' => 'orange', 'icon' => 'icon-3.svg', 'title' => 'Employment Skills Training',       'body' => 'Hands-on certifications: customer service, hospitality, security, food service, accounting, and IT.' ),
		array( 'col' => 'coral',  'icon' => 'icon-4.svg', 'title' => 'Career-Building Coaching',         'body' => 'After-placement coaching and employer-side advocacy to make sure first jobs become careers.' ),
	),
	'gain'           => array(
		array( 'col' => 'pink',   'body' => 'Job placement support with 230+ partner employers.' ),
		array( 'col' => 'orange', 'body' => 'Free certifications in 7+ sectors.' ),
		array( 'col' => 'purple', 'body' => 'Childcare while you train — included.' ),
		array( 'col' => 'coral',  'body' => 'Up to 90 days of post-placement mentorship.' ),
	),
) );
