<?php
/**
 * Title: Partner With Us — Full Page
 * Slug: ciwa-final/partner-with-us
 * Categories: ciwa-final
 * Description: Full Partner With Us page — hero, Why Partner 3-card grid, FOR BUSINESS / FOR COMMUNITY PARTNERS tab nav, 2×2 partnership cards, work-experience banner with pill tags, 2-up sponsor/talent cards, Business Spotlight CTA, Contact Us form.
 * Keywords: partner, partnership, business, sponsor
 * Viewport Width: 1280
 */
$pages = get_theme_file_uri( '/assets/img/pages' );
$icons = get_theme_file_uri( '/assets/img/programs' );

$why_cards = array(
	array( 'icon' => $icons . '/icon-1.svg', 'col' => 'purple', 'title' => 'Support Thousands',     'body' => 'You actively support thousands of immigrant women in building successful lives and contribute to community wellbeing.' ),
	array( 'icon' => $icons . '/icon-2.svg', 'col' => 'orange', 'title' => 'Diversity & Inclusion', 'body' => "You demonstrate your organization's commitment to diversity and inclusion while addressing critical workforce gaps." ),
	array( 'icon' => $icons . '/icon-3.svg', 'col' => 'pink',   'title' => 'Skilled Professionals', 'body' => 'You gain access to a wide pool of skilled professionals ready to contribute meaningfully to your business.' ),
);

$business_cards = array(
	array( 'col' => 'purple', 'title' => 'Networking with Newcomers',         'body1' => 'Participate in networking events to meet immigrant women entering the Canadian workforce.', 'body2' => 'Help newcomers navigate resumes, interviews, and job applications.' ),
	array( 'col' => 'pink',   'title' => 'Host a Work Placement or Practicum', 'body1' => 'Provide work placements for immigrant women enrolled in CIWA programs.',                     'body2' => 'Offer practical Canadian work experience, helping participants overcome employment barriers.' ),
	array( 'col' => 'purple', 'title' => 'Hire Graduates',                    'body1' => 'Employ qualified CIWA alumnae trained in childcare, customer service, office administration, and more.', 'body2' => 'Support economic security for immigrant women and their families.' ),
	array( 'col' => 'pink',   'title' => 'Refer Job Seekers',                 'body1' => "Direct immigrant women not yet job-ready to CIWA's bridge-to-work programs.",                'body2' => 'Free training in retail, food service, security, hospitality, and interpretation.' ),
);

$work_tags = array( 'Accounting', 'Office administration', 'Management', 'Sales and Marketing', 'IT', 'Childcare', 'Retail' );
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<!-- wp:group {"align":"full","className":"ciwa-partner-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-hero has-surface-pink-background-color has-background">

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","className":"ciwa-partner-hero-row"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center ciwa-partner-hero-row">

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"ciwa-partner-hero-text"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-partner-hero-text" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-partner-hero__title"} -->
			<h1 class="wp-block-heading ciwa-partner-hero__title"><?php esc_html_e( 'PARTNER WITH US', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-partner-hero__copy"} -->
			<p class="ciwa-partner-hero__copy"><?php esc_html_e( 'Join us in empowering immigrant and refugee women in Calgary. Together we open doors to employment, community, and lasting impact.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-partner-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-partner-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-partner-hero__cta"} -->
				<div class="wp-block-button ciwa-partner-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#partner-contact"><?php esc_html_e( 'JOIN NOW', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"ciwa-partner-hero-photo"} -->
		<div class="wp-block-column is-vertically-aligned-center ciwa-partner-hero-photo" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-partner-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-partner-hero__img"><img src="<?php echo esc_url( $pages . '/who-we-are.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- ============================================================
     WHY PARTNER WITH US?
     ============================================================ -->
<!-- wp:group {"align":"full","className":"ciwa-partner-why","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-why has-surface-cream-background-color has-background">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-partner-why__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-partner-why__h"><?php esc_html_e( 'WHY PARTNER', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'WITH US?', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-partner-why__sub"} -->
	<p class="has-text-align-center ciwa-partner-why__sub"><?php esc_html_e( "CIWA offers diverse partnership opportunities tailored to your organization's goals and values. Discover how you can make a meaningful impact.", 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","className":"ciwa-partner-why__grid"} -->
	<div class="wp-block-columns alignwide ciwa-partner-why__grid">
	<?php foreach ( $why_cards as $c ) : ?>
		<!-- wp:column {"className":"ciwa-partner-why-col"} -->
		<div class="wp-block-column ciwa-partner-why-col">
			<!-- wp:group {"className":"ciwa-partner-why-card ciwa-partner-why-card--<?php echo esc_attr( $c['col'] ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-partner-why-card ciwa-partner-why-card--<?php echo esc_attr( $c['col'] ); ?>">
				<!-- wp:image {"sizeSlug":"full","className":"ciwa-partner-why-card__icon"} -->
				<figure class="wp-block-image size-full ciwa-partner-why-card__icon"><img src="<?php echo esc_url( $c['icon'] ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"className":"ciwa-partner-why-card__title"} -->
				<h3 class="wp-block-heading ciwa-partner-why-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-partner-why-card__body"} -->
				<p class="ciwa-partner-why-card__body"><?php echo esc_html( $c['body'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- ============================================================
     TAB NAV: FOR BUSINESS / FOR COMMUNITY PARTNERS (static — first
     tab visually active; tab content is the FOR BUSINESS block below)
     ============================================================ -->
<!-- wp:group {"align":"full","className":"ciwa-partner-tabs","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-tabs has-background-background-color has-background">

	<!-- wp:columns {"align":"wide","className":"ciwa-partner-tabs__nav"} -->
	<div class="wp-block-columns alignwide ciwa-partner-tabs__nav">
		<!-- wp:column {"className":"ciwa-partner-tab is-active"} -->
		<div class="wp-block-column ciwa-partner-tab is-active">
			<!-- wp:heading {"level":3,"textAlign":"center","className":"ciwa-partner-tab__label"} -->
			<h3 class="wp-block-heading has-text-align-center ciwa-partner-tab__label"><?php esc_html_e( 'FOR BUSINESS', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"ciwa-partner-tab"} -->
		<div class="wp-block-column ciwa-partner-tab">
			<!-- wp:heading {"level":3,"textAlign":"center","className":"ciwa-partner-tab__label"} -->
			<h3 class="wp-block-heading has-text-align-center ciwa-partner-tab__label"><?php esc_html_e( 'FOR COMMUNITY PARTNERS', 'ciwa-final' ); ?></h3>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-partner-tabs__intro"} -->
	<p class="has-text-align-center ciwa-partner-tabs__intro"><?php esc_html_e( 'CIWA works with over 150 business partners each and every year, making a significant impact by volunteering time, knowledge, space, or offering employment to newcomers in Calgary.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- ===== 2×2 partnership cards ===== -->
	<!-- wp:columns {"align":"wide","className":"ciwa-partner-cards-grid"} -->
	<div class="wp-block-columns alignwide ciwa-partner-cards-grid">

		<!-- wp:column {"className":"ciwa-partner-cards-col"} -->
		<div class="wp-block-column ciwa-partner-cards-col">
		<?php foreach ( array_slice( $business_cards, 0, 2 ) as $c ) : ?>
			<!-- wp:group {"className":"ciwa-partner-card ciwa-partner-card--<?php echo esc_attr( $c['col'] ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-partner-card ciwa-partner-card--<?php echo esc_attr( $c['col'] ); ?>">
				<!-- wp:heading {"level":3,"className":"ciwa-partner-card__title"} -->
				<h3 class="wp-block-heading ciwa-partner-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php echo esc_html( $c['body1'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php echo esc_html( $c['body2'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"ciwa-partner-cards-col"} -->
		<div class="wp-block-column ciwa-partner-cards-col">
		<?php foreach ( array_slice( $business_cards, 2, 2 ) as $c ) : ?>
			<!-- wp:group {"className":"ciwa-partner-card ciwa-partner-card--<?php echo esc_attr( $c['col'] ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-partner-card ciwa-partner-card--<?php echo esc_attr( $c['col'] ); ?>">
				<!-- wp:heading {"level":3,"className":"ciwa-partner-card__title"} -->
				<h3 class="wp-block-heading ciwa-partner-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php echo esc_html( $c['body1'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php echo esc_html( $c['body2'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- ===== HOST A WORK EXPERIENCE banner ===== -->
	<!-- wp:group {"align":"wide","className":"ciwa-partner-work","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide ciwa-partner-work">
		<!-- wp:heading {"level":3,"className":"ciwa-partner-work__title"} -->
		<h3 class="wp-block-heading ciwa-partner-work__title"><?php esc_html_e( 'Host a Work Experience', 'ciwa-final' ); ?></h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"className":"ciwa-partner-work__body"} -->
		<p class="ciwa-partner-work__body"><?php esc_html_e( 'CIWA works with employers to host work placements for employment-ready immigrant women. Employers benefit from a motivated workforce, while participants gain practical Canadian work experience that opens doors to long-term careers.', 'ciwa-final' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:group {"className":"ciwa-partner-work__tags","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group ciwa-partner-work__tags">
		<?php foreach ( $work_tags as $tag ) : ?>
			<!-- wp:paragraph {"className":"ciwa-partner-work__tag"} -->
			<p class="ciwa-partner-work__tag"><?php echo esc_html( $tag ); ?></p>
			<!-- /wp:paragraph -->
		<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- ===== 2-up: Sponsor + Diverse Talent ===== -->
	<!-- wp:columns {"align":"wide","className":"ciwa-partner-twoup"} -->
	<div class="wp-block-columns alignwide ciwa-partner-twoup">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"ciwa-partner-card ciwa-partner-card--orange","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-partner-card ciwa-partner-card--orange">
				<!-- wp:heading {"level":3,"className":"ciwa-partner-card__title"} -->
				<h3 class="wp-block-heading ciwa-partner-card__title"><?php esc_html_e( 'Be a Corporate or Community Sponsor', 'ciwa-final' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php esc_html_e( "Amplify CIWA's impact by sponsoring initiatives that break barriers for immigrant women.", 'ciwa-final' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php esc_html_e( 'Host space for events or provide in-kind services to support programs.', 'ciwa-final' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"ciwa-partner-card ciwa-partner-card--purple","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-partner-card ciwa-partner-card--purple">
				<!-- wp:heading {"level":3,"className":"ciwa-partner-card__title"} -->
				<h3 class="wp-block-heading ciwa-partner-card__title"><?php esc_html_e( 'Access Diverse Talent', 'ciwa-final' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-partner-card__body"} -->
				<p class="ciwa-partner-card__body"><?php esc_html_e( 'Join CIWA\'s free platform for employers, "Diverse Workforce," to connect with qualified immigrant women across sectors.', 'ciwa-final' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- ============================================================
     BUSINESS SPOTLIGHT — full-bleed purple CTA banner
     ============================================================ -->
<!-- wp:group {"align":"full","className":"ciwa-partner-spotlight","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-spotlight has-primary-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-partner-spotlight__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-partner-spotlight__h"><?php esc_html_e( 'BUSINESS SPOTLIGHT', 'ciwa-final' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-partner-spotlight__copy"} -->
	<p class="has-text-align-center ciwa-partner-spotlight__copy"><?php esc_html_e( 'See how our business partners are making a difference.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"ciwa-partner-spotlight__cta-wrap"} -->
	<div class="wp-block-buttons ciwa-partner-spotlight__cta-wrap">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-partner-spotlight__cta"} -->
		<div class="wp-block-button ciwa-partner-spotlight__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#partners"><?php esc_html_e( 'VIEW BUSINESS PARTNERS', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- ============================================================
     CONTACT US — heading + intro (canonical blocks) +
     form fields (wp:html island, no canonical equivalent for inputs)
     ============================================================ -->
<!-- wp:group {"align":"full","className":"ciwa-partner-contact","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-partner-contact has-background-background-color has-background" id="partner-contact">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-partner-contact__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-partner-contact__h"><?php esc_html_e( 'CONTACT', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'US', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-partner-contact__sub"} -->
	<p class="has-text-align-center ciwa-partner-contact__sub"><?php esc_html_e( 'Explore partnership opportunities today!', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<form class="ciwa-partner-form" action="#" method="post">
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field">
				<span class="ciwa-partner-form__label"><?php esc_html_e( 'First Name:', 'ciwa-final' ); ?></span>
				<input type="text" name="first_name" />
			</label>
			<label class="ciwa-partner-form__field">
				<span class="ciwa-partner-form__label"><?php esc_html_e( 'Email Address:', 'ciwa-final' ); ?></span>
				<input type="email" name="email" />
			</label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full">
				<span class="ciwa-partner-form__label"><?php esc_html_e( 'Organization:', 'ciwa-final' ); ?></span>
				<input type="text" name="organization" />
			</label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full">
				<span class="ciwa-partner-form__label"><?php esc_html_e( 'Partnership Type:', 'ciwa-final' ); ?></span>
				<select name="partnership_type">
					<option value=""><?php esc_html_e( 'Select…', 'ciwa-final' ); ?></option>
					<option value="business"><?php esc_html_e( 'Business', 'ciwa-final' ); ?></option>
					<option value="community"><?php esc_html_e( 'Community Partner', 'ciwa-final' ); ?></option>
					<option value="sponsor"><?php esc_html_e( 'Sponsor', 'ciwa-final' ); ?></option>
				</select>
			</label>
		</div>
		<div class="ciwa-partner-form__row">
			<label class="ciwa-partner-form__field ciwa-partner-form__field--full">
				<span class="ciwa-partner-form__label"><?php esc_html_e( 'Message:', 'ciwa-final' ); ?></span>
				<textarea name="message" rows="6"></textarea>
			</label>
		</div>
		<div class="ciwa-partner-form__row ciwa-partner-form__row--actions">
			<button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SEND MESSAGE', 'ciwa-final' ); ?> &rsaquo;</button>
		</div>
	</form>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
