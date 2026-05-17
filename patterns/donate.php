<?php
/**
 * Title: Donate — Full Page
 * Slug: ciwa-final/donate
 * Categories: ciwa-final
 * Description: Donate page — hero, Measurable Impact 3 stats, testimonial quote, Make Your Gift donation form, Partner CTA.
 * Keywords: donate, donation, giving
 * Viewport Width: 1280
 */
$hero  = get_theme_file_uri( '/assets/img/instagram' );
$voices = get_theme_file_uri( '/assets/img/voices' );

$stats = array(
	array( 'val' => '2,400+', 'col' => 'pink',   'title' => 'Skills Training',  'body' => 'Direct impact on employment readiness through technical and vocational programs.' ),
	array( 'val' => '1,100+', 'col' => 'orange', 'title' => 'Career Support',   'body' => 'Job placement assistance and one-on-one mentorship for lasting career growth.' ),
	array( 'val' => '8,500+', 'col' => 'coral',  'title' => 'Community Impact', 'body' => 'Women supported annually across 12 regions, creating stronger local economies.' ),
);
$gifts = array( '25', '50', '100', '250' );
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-donate-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-donate-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'INVEST IN HER POTENTIAL, TRANSFORM A COMMUNITY', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Your gift powers settlement, skills training, and mentorship — measurable change in the lives of women and families across Calgary.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#donate-form"><?php esc_html_e( 'DONATE NOW', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="#impact"><?php esc_html_e( 'SEE IMPACT', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/ig5.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- WHERE DONATIONS GO -->
<!-- wp:group {"align":"full","className":"ciwa-donate-impact","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-donate-impact has-background-background-color has-background" id="impact">
	<!-- wp:paragraph {"align":"center","className":"ciwa-donate-impact__eyebrow"} -->
	<p class="has-text-align-center ciwa-donate-impact__eyebrow"><?php esc_html_e( 'WHERE DONATIONS GO', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-donate-impact__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-donate-impact__h"><?php esc_html_e( 'MEASURABLE IMPACT,', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'REAL LIVES', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"ciwa-donate-impact__grid","layout":{"type":"grid","columnCount":3}} -->
	<div class="wp-block-group ciwa-donate-impact__grid">
	<?php foreach ( $stats as $s ) : ?>
		<!-- wp:group {"className":"ciwa-donate-stat ciwa-donate-stat--<?php echo esc_attr( $s['col'] ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-donate-stat ciwa-donate-stat--<?php echo esc_attr( $s['col'] ); ?>">
			<!-- wp:heading {"level":3,"className":"ciwa-donate-stat__val"} -->
			<h3 class="wp-block-heading ciwa-donate-stat__val"><?php echo esc_html( $s['val'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-donate-stat__title"} -->
			<p class="ciwa-donate-stat__title"><?php echo esc_html( $s['title'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"ciwa-donate-stat__body"} -->
			<p class="ciwa-donate-stat__body"><?php echo esc_html( $s['body'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- TESTIMONIAL -->
<!-- wp:group {"align":"full","className":"ciwa-donate-quote","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-donate-quote has-primary-background-color has-background">
	<!-- wp:paragraph {"align":"center","className":"ciwa-donate-quote__body"} -->
	<p class="has-text-align-center ciwa-donate-quote__body"><?php esc_html_e( '"When I donated $100, I didn\'t expect to receive a letter six months later from Amara — a young woman in Nairobi who\'d completed her coding bootcamp and landed her first job. That\'s when I knew every dollar counted."', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-donate-quote__author"} -->
	<p class="has-text-align-center ciwa-donate-quote__author"><?php esc_html_e( '— Sarah M., Monthly Donor since 2022', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- DONATION FORM -->
<!-- wp:group {"align":"full","className":"ciwa-donate-form-wrap","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-donate-form-wrap has-surface-cream-background-color has-background" id="donate-form">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-donate-form__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-donate-form__h"><?php esc_html_e( 'MAKE YOUR GIFT', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'TODAY', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-donate-form__sub"} -->
	<p class="has-text-align-center ciwa-donate-form__sub"><?php esc_html_e( 'Choose an amount that works for you. Every gift changes a life.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<div class="ciwa-donate-form">
		<div class="ciwa-donate-form__left">
			<div class="ciwa-donate-form__gifts">
				<?php foreach ( $gifts as $g ) : ?>
					<label class="ciwa-donate-form__gift"><input type="radio" name="gift" value="<?php echo esc_attr( $g ); ?>" /><span>$<?php echo esc_html( $g ); ?></span></label>
				<?php endforeach; ?>
			</div>
			<label class="ciwa-donate-form__custom">
				<span class="ciwa-donate-form__custom-symbol">$</span>
				<input type="number" name="custom_amount" placeholder="Custom amount" />
			</label>
			<label class="ciwa-donate-form__monthly">
				<input type="checkbox" name="monthly" /> Make this a monthly donation
			</label>
		</div>
		<form class="ciwa-partner-form ciwa-donate-form__right">
			<div class="ciwa-partner-form__row">
				<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">First Name:</span><input type="text" name="first_name" /></label>
			</div>
			<div class="ciwa-partner-form__row">
				<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Email:</span><input type="email" name="email" /></label>
			</div>
			<div class="ciwa-partner-form__row">
				<label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Message:</span><textarea name="message" rows="4"></textarea></label>
			</div>
			<div class="ciwa-partner-form__row ciwa-partner-form__row--actions">
				<button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'COMPLETE DONATION', 'ciwa-final' ); ?></button>
			</div>
		</form>
	</div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- PARTNER CTA -->
<!-- wp:group {"align":"full","className":"ciwa-donate-partner-cta","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-donate-partner-cta has-surface-pink-background-color has-background">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-donate-partner-cta__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-donate-partner-cta__h"><?php esc_html_e( 'READY TO PARTNER', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'WITH US?', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-donate-partner-cta__copy"} -->
	<p class="has-text-align-center ciwa-donate-partner-cta__copy"><?php esc_html_e( 'Organizations, corporations, and community leaders can collaborate to amplify our impact. Learn how your organization can make a difference.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"orange","textColor":"text-light"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="/partner-with-us/"><?php esc_html_e( 'PARTNER WITH US', 'ciwa-final' ); ?> &rsaquo;</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
