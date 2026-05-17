<?php
/**
 * Title: Find Us on the Map
 * Slug: ciwa-final/map
 * Categories: ciwa-final
 * Description: Map section with heading + Figma map image (canonical core blocks).
 * Keywords: map, location
 * Viewport Width: 1280
 */
$map_img = get_theme_file_uri( '/assets/img/map/map.png' );
?>
<!-- wp:group {"align":"full","className":"ciwa-map","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ciwa-map">

	<!-- wp:heading {"level":2,"textAlign":"center","className":"ciwa-map-h","textColor":"primary"} -->
	<h2 class="wp-block-heading has-text-align-center ciwa-map-h has-primary-color has-text-color"><?php esc_html_e( 'FIND US ON', 'ciwa-final' ); ?> <mark style="background-color:rgba(0, 0, 0, 0);color:#ff6e6e" class="has-inline-color"><?php esc_html_e( 'THE MAP', 'ciwa-final' ); ?></mark></h2>
	<!-- /wp:heading -->

	<!-- wp:image {"align":"wide","className":"ciwa-map-image"} -->
	<figure class="wp-block-image alignwide ciwa-map-image"><img src="<?php echo esc_url( $map_img ); ?>" alt="Find CIWA on the map"/></figure>
	<!-- /wp:image -->

</div>
<!-- /wp:group -->
