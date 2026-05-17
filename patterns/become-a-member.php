<?php
/**
 * Title: Become a Member — Full Page
 * Slug: ciwa-final/become-a-member
 * Categories: ciwa-final
 * Description: Become a Member page — hero, membership tier cards, donation add-on, get-start form + CIWA resources side panel.
 * Keywords: member, membership, join
 * Viewport Width: 1280
 */
$hero = get_theme_file_uri( '/assets/img/instagram' );

$tiers = array(
	array( 'title' => 'Individual Voting Status (New Membership)',     'price' => '10', 'expiry' => 'No expiration', 'body' => 'Purchase a new membership for individual voting status. Please specify number of years.' ),
	array( 'title' => 'Individual Voting Status (Renewal)',            'price' => '10', 'expiry' => 'No expiration', 'body' => 'Renew your individual voting membership for one or more additional years.' ),
	array( 'title' => 'Organizational Membership (New)',               'price' => '50', 'expiry' => 'No expiration', 'body' => 'Purchase a new organizational membership. Eligible for non-profits and community groups.' ),
	array( 'title' => 'Lifetime Membership',                           'price' => '100','expiry' => 'No expiration', 'body' => 'Become a lifetime member of CIWA and support our work for years to come.' ),
);
?>

<!-- HERO -->
<!-- wp:group {"align":"full","className":"ciwa-page-hero ciwa-member-hero","backgroundColor":"surface-pink","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-page-hero ciwa-member-hero has-surface-pink-background-color has-background">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"ciwa-page-hero__title"} -->
			<h1 class="wp-block-heading ciwa-page-hero__title"><?php esc_html_e( 'BECOME A MEMBER', 'ciwa-final' ); ?></h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"ciwa-page-hero__copy"} -->
			<p class="ciwa-page-hero__copy"><?php esc_html_e( 'Join a community of women and allies advancing settlement, employment, and belonging across Calgary.', 'ciwa-final' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-page-hero__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-page-hero__cta-wrap">
				<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-page-hero__cta"} -->
				<div class="wp-block-button ciwa-page-hero__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="#tiers"><?php esc_html_e( 'JOIN NOW', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"ciwa-page-hero__cta is-outline"} -->
				<div class="wp-block-button ciwa-page-hero__cta is-outline"><a class="wp-block-button__link wp-element-button" href="/volunteer-with-us/"><?php esc_html_e( 'GET INVOLVED', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","className":"ciwa-page-hero__img"} -->
			<figure class="wp-block-image size-full ciwa-page-hero__img"><img src="<?php echo esc_url( $hero . '/ig4.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- TIERS -->
<!-- wp:group {"align":"full","className":"ciwa-member","backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-member has-background-background-color has-background" id="tiers">

	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-member__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-member__h"><?php esc_html_e( 'BECOME A', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'MEMBER', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-member__intro"} -->
	<p class="has-text-align-center ciwa-member__intro"><?php esc_html_e( 'CIWA memberships expire on March 31 annually. If you purchased your membership between January 1 and March 31 of the same year, your membership will be valid until March 31 of the following year.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-member__bylaws"} -->
	<p class="has-text-align-center ciwa-member__bylaws"><a href="#bylaws"><?php esc_html_e( 'Click to download required document: Memberships Bylaws', 'ciwa-final' ); ?> &rsaquo;</a></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"ciwa-member__tiers","layout":{"type":"constrained"}} -->
	<div class="wp-block-group ciwa-member__tiers">
	<?php foreach ( $tiers as $t ) : ?>
		<!-- wp:group {"className":"ciwa-member-tier","layout":{"type":"constrained"}} -->
		<div class="wp-block-group ciwa-member-tier">
			<!-- wp:group {"className":"ciwa-member-tier__head","layout":{"type":"flex"}} -->
			<div class="wp-block-group ciwa-member-tier__head">
				<!-- wp:heading {"level":3,"className":"ciwa-member-tier__title"} -->
				<h3 class="wp-block-heading ciwa-member-tier__title"><?php echo esc_html( $t['title'] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-member-tier__price"} -->
				<p class="ciwa-member-tier__price">$<?php echo esc_html( $t['price'] ); ?> <span><?php echo esc_html( $t['expiry'] ); ?></span></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"ciwa-member-tier__body"} -->
			<p class="ciwa-member-tier__body"><?php echo esc_html( $t['body'] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"ciwa-member-tier__cta-wrap"} -->
			<div class="wp-block-buttons ciwa-member-tier__cta-wrap">
				<!-- wp:button {"backgroundColor":"primary","textColor":"text-light","className":"ciwa-member-tier__cta"} -->
				<div class="wp-block-button ciwa-member-tier__cta"><a class="wp-block-button__link has-text-light-color has-primary-background-color has-text-color has-background wp-element-button" href="#join"><?php esc_html_e( 'SELECT', 'ciwa-final' ); ?> &rsaquo;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center","className":"ciwa-member__zeffy"} -->
	<p class="has-text-align-center ciwa-member__zeffy"><?php esc_html_e( 'Did you know? We fundraise with Zeffy to ensure 100% of your donation goes to our mission!', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- GET STARTED form + side panel -->
<!-- wp:group {"align":"full","className":"ciwa-member-start","backgroundColor":"surface-cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-member-start has-surface-cream-background-color has-background" id="join">
	<!-- wp:heading {"textAlign":"center","level":2,"className":"ciwa-member-start__h"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-member-start__h"><?php esc_html_e( 'GET START', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'NOW', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","className":"ciwa-member-start__sub"} -->
	<p class="has-text-align-center ciwa-member-start__sub"><?php esc_html_e( 'CIWA memberships expire on March 31 annually. If you purchased your membership between January 1 and March 31 of the same year, your membership will be valid until March 31 of the following year.', 'ciwa-final' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","className":"ciwa-member-start__row"} -->
	<div class="wp-block-columns alignwide ciwa-member-start__row">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<form class="ciwa-partner-form">
				<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">First Name:</span><input type="text" name="first_name" /></label></div>
				<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Email:</span><input type="email" name="email" /></label></div>
				<div class="ciwa-partner-form__row"><label class="ciwa-partner-form__field ciwa-partner-form__field--full"><span class="ciwa-partner-form__label">Phone:</span><input type="tel" name="phone" /></label></div>
				<div class="ciwa-partner-form__row ciwa-partner-form__row--actions"><button type="submit" class="ciwa-partner-form__submit"><?php esc_html_e( 'SUBMIT', 'ciwa-final' ); ?> &rsaquo;</button></div>
			</form>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"ciwa-member-resources","backgroundColor":"primary","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ciwa-member-resources has-primary-background-color has-background">
				<!-- wp:heading {"level":3,"className":"ciwa-member-resources__h"} -->
				<h3 class="wp-block-heading ciwa-member-resources__h"><?php esc_html_e( 'CIWA RESOURCES', 'ciwa-final' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"ciwa-member-resources__body"} -->
				<p class="ciwa-member-resources__body"><?php esc_html_e( 'Join CIWA\'s free platform for employers, "Diverse Workforce," to connect with skilled and qualified immigrant women ready for employment.', 'ciwa-final' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons {"className":"ciwa-member-resources__cta-wrap"} -->
				<div class="wp-block-buttons ciwa-member-resources__cta-wrap">
					<!-- wp:button {"backgroundColor":"orange","textColor":"text-light","className":"ciwa-member-resources__cta"} -->
					<div class="wp-block-button ciwa-member-resources__cta"><a class="wp-block-button__link has-text-light-color has-orange-background-color has-text-color has-background wp-element-button" href="/partner-with-us/"><?php esc_html_e( 'LEARN MORE', 'ciwa-final' ); ?> &rsaquo;</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
