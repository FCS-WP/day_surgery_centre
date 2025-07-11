<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package doctio
 */


if ( is_page() || is_singular( 'post' ) || doctio_custom_post_types() && get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
	$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
} else {
	$common_meta = array();
}

if ( is_array( $common_meta ) && array_key_exists( 'sidebar_meta', $common_meta ) && $common_meta['sidebar_meta'] != '0' ) {
	$selected_sidebar = $common_meta['sidebar_meta'];
} else if ( is_singular( 'post' ) ) {
	$selected_sidebar = doctio_option( 'single_post_default_sidebar', 'doctio-sidebar' );
} else if ( is_singular( 'page' ) ) {
	$selected_sidebar = doctio_option( 'page_default_sidebar', 'doctio-sidebar' );
}else if (is_singular('doctio_service')) {
	$selected_sidebar = doctio_option('service_default_sidebar', 'doctio-service-sidebar');
}else if (is_singular('doctio_team')) {
	$selected_sidebar = doctio_option('team_default_sidebar', 'doctio-team-sidebar');
}else if (function_exists('is_shop') && is_shop()) {
	$selected_sidebar = doctio_option('shop_default_sidebar', 'doctio-shop-sidebar');
} else if (is_singular('product') || function_exists('is_product_category') && is_product_category()) {
	$selected_sidebar = doctio_option('product_default_sidebar', 'doctio-shop-sidebar');
}else {
	$selected_sidebar = 'doctio-sidebar';
}

?>

<aside class="sidebar-widget-area">
	<?php
	if ( is_active_sidebar( $selected_sidebar ) ) {
		dynamic_sidebar( $selected_sidebar );
	}
	?>
</aside>
