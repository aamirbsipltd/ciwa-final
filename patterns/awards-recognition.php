<?php
/**
 * Title: Awards & Recognition — Full Page
 * Slug: ciwa-final/awards-recognition
 * Categories: ciwa-final
 * Description: Awards & Recognition page — hero, intro, chronological list of awards.
 * Keywords: awards, recognition, accolades
 * Viewport Width: 1280
 */
$hero = get_theme_file_uri( '/assets/img/welcome' );

$awards = array(
	array( 'year' => '2025', 'text' => 'Outstanding Nonprofit Agency Award at the South Asian Inspiration Awards' ),
	array( 'year' => '2025', 'text' => 'Inclusive Organization Award by Immigrant Champions of Canada (ICC), September 2025' ),
	array( 'year' => '2025', 'text' => 'Canada Life Literacy Innovation Award (LIA) presented by ABC Life Literacy Canada, September 2025' ),
	array( 'year' => '2025', 'text' => 'Ivor Carvalho Award presented by the Canadian Association of Professional Immigration Consultants (CAPIC), May 2025' ),
	array( 'year' => '2024', 'text' => 'Appreciation Award presented by MD International, December 2024' ),
	array( 'year' => '2024', 'text' => 'Alberta Immigrant Impact Award in the category of Newcomer Champion Award presented to Paula Calderon, October 2024' ),
	array( 'year' => '2023', 'text' => 'United Way Calgary Bhayana Awards presented to Azita Afsharnejat (One on One Counselling for Immigrant Women Program) by Bhayana Family' ),
	array( 'year' => '2023', 'text' => 'Because Mothers Matter Awards presented to Luz Buritica (HIPPY Program Coordinator), by The Mothers Matter Centre, May 2023' ),
	array( 'year' => '2021', 'text' => 'Girls at Bat All-Star Coach Award presented to Layla Al-Yasiri (Youth Program Volunteer), by Jays Care Foundation, November 2021' ),
	array( 'year' => '2021', 'text' => 'Girls at Bat All-Star Athlete Award presented to Elizabeth Olufowobi (Youth Program Client), by Jays Care Foundation, November 2021' ),
	array( 'year' => '2021', 'text' => 'Girls at Bat Community Excellence Award presented to Youth Program, by Jays Care Foundation, November 2021' ),
	array( 'year' => '2021', 'text' => 'Girls at Bat Community Spirit Award presented to Youth Program, by Jays Care Foundation, November 2021' ),
	array( 'year' => '2021', 'text' => 'Celebrating the Work in the Field presented to Jenny Krabbe, by Calgary Learns, July 2021' ),
	array( 'year' => '2021', 'text' => 'Because Mothers Matter Awards presented to HIPPY Mom Nusrat Awan, by Mothers Matter Centre in May 2021' ),
	array( 'year' => '2020', 'text' => "Canada's Most Powerful CEOs presented to Beba Svigir, by KPMG in December 2020" ),
	array( 'year' => '2019', 'text' => 'Arab Women of Excellence Award in the category of Community Service presented to Noha Elhakim, Settlement Counsellor in June 2019' ),
	array( 'year' => '2018', 'text' => 'Making a Difference for Women Award presented to Beba Svigir, CEO, by Soroptimist International of Calgary in April 2018' ),
	array( 'year' => '2018', 'text' => 'Leaders in Diversity Award presented to CIWA by the Federation of Asian Canadian Lawyers Western ("FACL Western") in March 2018' ),
	array( 'year' => '2018', 'text' => 'Leadership in Family Violence Prevention Award — Individual award presented to Bela Gupta, Counsellor, by Alberta Government in March 2018' ),
	array( 'year' => '2018', 'text' => 'Merit Award — Community Service Category presented to Jade Duong, Board Director, by Alberta Justice and Solicitor General in March 2018' ),
	array( 'year' => '2017', 'text' => '"She Who Dares" award presented to Fiona Fairley, Career Counsellor, by YWCA Calgary in November 2017' ),
	array( 'year' => '2017', 'text' => "Women in Law Leadership Award (WILL award) — Leadership in the Community category presented to Sarah King D'Souza Q.C., Past Board Chair" ),
	array( 'year' => '2017', 'text' => 'Innovation Award presented to CIWA by The Great-West Life, London Life and Canada Life Literacy in September 2017' ),
	array( 'year' => '2017', 'text' => '"150 Ways in 150 Days" non-profit organization of choice for the month presented to CIWA by Clark Builders Community Foundation (CBCF), August 2017' ),
	array( 'year' => '2017', 'text' => '"You Rock" Award presented to CIWA by Calgary Youth Justice Society in May 2017' ),
	array( 'year' => '2017', 'text' => 'Appreciation Award presented to CIWA by the Welcome Centre in April 2017' ),
	array( 'year' => '2016', 'text' => 'Obsidian Awards — Immigrant Community Service and Philanthropist Business & Professional Women (BPW) Award' ),
	array( 'year' => '2016', 'text' => 'Life of Learning Award (LOLA) in the category of Learning Champion presented to CIWA in April 2016' ),
	array( 'year' => '2016', 'text' => "United Way's Divisional Recognition Award presented to CIWA, by United Way of Calgary in February 2016" ),
	array( 'year' => '2015', 'text' => "Aspen's HOPE Award for Agency Collaboration presented to CIWA in November 2015" ),
	array( 'year' => '2014', 'text' => 'Council of the Federation Literacy Award for the province of Alberta presented to CIWA in November 2014' ),
	array( 'year' => '2014', 'text' => 'Heart of Calgary Award presented to Amal Umar, Board Chair, in April 2014' ),
	array( 'year' => '2013', 'text' => 'Calgary Herald Christmas Fund presented to CIWA in 2013' ),
	array( 'year' => '2013', 'text' => 'Community Partner of the Year Award presented to CIWA, by Goodwill Greatness Awards in September 2013' ),
	array( 'year' => '2013', 'text' => "Great-West Life, London Life and Canada Life Literacy Innovation Award presented to CIWA's Low Literacy Modular Employment Program in 2013" ),
	array( 'year' => '2010', 'text' => 'Literacy Alberta Award of Excellence in the Student Category presented to Zomkey Zomkey, Pebbles in the Sand participant in 2010' ),
	array( 'year' => '2010', "text" => "Canada's Citizenship Award presented to Shokoofeh Moussavi, Settlement and Integration Department Manager, in 2010" ),
	array( 'year' => '2010', 'text' => "ConocoPhillips' Youth of Distinction Volunteerism Award presented to Jennifer Bhatla, Youth Program participant, in May 2010" ),
	array( 'year' => '2010', 'text' => 'Life of Learning Award presented to Linda Faulkner, Pebbles in the Sand Facilitator, by Calgary Learns in 2010' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-awards-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-awards-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'AWARDS & RECOGNITION', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Decades of recognition for CIWA\'s impact on immigrant women and their families across Calgary and Canada.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#awards"><?php esc_html_e( 'SEE AWARDS', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="/who-we-are/"><?php esc_html_e( 'ABOUT CIWA', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/collage.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- INTRO + AWARDS LIST -->
<!-- wp:group {"align":"full","className":"ciwa-awards","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-awards has-background-background-color has-background" id="awards">
	<!-- wp:paragraph {"align":"center","className":"ciwa-awards__intro"} -->
	<p class="has-text-align-center ciwa-awards__intro"><?php esc_html_e( 'Over the years, CIWA has been honoured to receive recognition for our commitment to immigrant women and their families by the community. Below is a chronological list of awards and accolades received by CIWA staff, volunteers, and programs.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"ciwa-awards__list","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-awards__list">
	<?php $current_year = null; foreach ( $awards as $a ) : if ( $a['year'] !== $current_year ) : $current_year = $a['year']; ?>
		<!-- wp:heading {"level":3,"className":"ciwa-awards__year"} -->
		<h3 class="wp-block-heading ciwa-awards__year"><?php echo esc_html( $current_year ); ?></h3>
		<!-- /wp:heading -->
	<?php endif; ?>
		<!-- wp:paragraph {"className":"ciwa-awards__item"} -->
		<p class="ciwa-awards__item"><?php echo esc_html( $a['text'] ); ?></p>
		<!-- /wp:paragraph -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
