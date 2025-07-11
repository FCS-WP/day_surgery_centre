<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Doctio
 */


/* After Setup Theme */

function doctio_woocommerce_setup() {
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'doctio_woocommerce_setup');


/**
 * Add CSS class to the body tag.
 */
function doctio_woocommerce_active_body_class($classes) {
	$classes[] = 'woocommerce-active';

	if( isset( $_COOKIE["td-shop-view"] ) && $_COOKIE["td-shop-view"] == 'list' ) {
		$classes[] = 'td-product-list-view';
	} else {
		$classes[] = 'td-product-grid-view';
	}

	return $classes;
}

add_filter('body_class', 'doctio_woocommerce_active_body_class');


/*
 * Remove Before Content
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);



/*
 * Before Content New Markup
 */
if (!function_exists('doctio_woocommerce_wrapper_before')) {

	function doctio_woocommerce_wrapper_before() {
		?>
		<?php
		if(is_shop()){
			$product_banner = true;
			$hide_product_title = doctio_option( 'hide_banner_title', 'no' );
			$hide_product_breadcrumb = doctio_option( 'hide_banner_breadcrumb', 'no' );
			$banner_text_align = doctio_option( 'banner_default_text_align', 'left' );
		}else{
			global $post;

			if ( get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
				$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
			} else {
				$common_meta = array();
			}

			if ( array_key_exists( 'enable_banner', $common_meta ) ) {
				$product_banner = $common_meta['enable_banner'];
			} else {
				$product_banner = true;
			}

			if ( array_key_exists( 'hide_banner_title_meta', $common_meta ) && $common_meta['hide_banner_title_meta'] != 'default' ) {
				$hide_product_title = $common_meta['hide_banner_title_meta'];
			} else {
				$hide_product_title = doctio_option( 'hide_banner_title', 'no' );
			}

			if ( array_key_exists( 'custom_title', $common_meta ) ) {
				$custom_title = $common_meta['custom_title'];
			} else {
				$custom_title = '';
			}

			if ( array_key_exists( 'hide_banner_breadcrumb_meta', $common_meta ) && $common_meta['hide_banner_breadcrumb_meta'] != 'default' ) {
				$hide_product_breadcrumb = $common_meta['hide_banner_breadcrumb_meta'];
			} else {
				$hide_product_breadcrumb = doctio_option( 'hide_banner_breadcrumb', 'no' );
			}

			if ( array_key_exists( 'banner_text_align_meta', $common_meta ) && $common_meta['banner_text_align_meta'] != 'default' ) {
				$banner_text_align = $common_meta['banner_text_align_meta'];
			} else {
				$banner_text_align = doctio_option( 'banner_default_text_align', 'left' );
			}
		}

		?>

		<?php if($product_banner == true) : ?>
            <div class="banner-area page-banner td-woo-banner td-secondary-font">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12 my-auto">
                            <div class="banner-content text-<?php echo esc_attr( $banner_text_align ); ?>">

								<?php if($hide_product_title !== 'yes') : ?>
                                    <h2 class="banner-title">
										<?php
										if ( is_singular( 'product' ) ) {

											if ( ! empty( $custom_title ) ) {
												echo esc_html( $custom_title );
											} else {
												$product_banner_title = doctio_option('product_banner_title', 'Shop');
												if(! empty( $product_banner_title )){
													echo esc_html( $product_banner_title );
												}else{
													the_title();
												}
											}
										} else {
											$shop_custom_title = doctio_option('shop_custom_title');
											if (is_shop()){
												if(!empty($shop_custom_title)){
													echo esc_html($shop_custom_title);
												}else{
													woocommerce_page_title();
												}
											}else{
												woocommerce_page_title();
											}
										}
										?>
                                    </h2>
								<?php endif;?>

								<?php if (function_exists('bcn_display') && $hide_product_breadcrumb !== 'yes') : ?>
                                    <div class="breadcrumb-container">
										<?php bcn_display(); ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif; ?>


		<?php
		if (is_shop()) {
			$shop_class = 'td-shop-page';
			$layout           = doctio_option('shop_page_layout', 'right-sidebar');
			$selected_sidebar = doctio_option( 'shop_default_sidebar', 'doctio-shop-sidebar' );

		} else {
			$shop_class = '';
			if ( array_key_exists( 'layout_meta', $common_meta ) && $common_meta['layout_meta'] != 'default' ) {
				$layout = $common_meta['layout_meta'];
			} else {
				$layout = doctio_option( 'product_page_layout', 'right-sidebar' );
			}

			if ( array_key_exists( 'sidebar_meta', $common_meta ) && $common_meta['sidebar_meta'] != '0' ) {
				$selected_sidebar = $common_meta['sidebar_meta'];
			} else {
				$selected_sidebar = doctio_option( 'product_default_sidebar', 'doctio-shop-sidebar' );
			}

		}

		if ($layout == 'left-sidebar' && is_active_sidebar($selected_sidebar) || $layout == 'right-sidebar' && is_active_sidebar($selected_sidebar)) {
			$page_column_class = 'col-xl-9 col-lg-12';
		} else {
			$page_column_class = 'col-xl-12 col-lg-12';
		}

		?>

        <div id="primary" class="content-area <?php echo esc_attr($shop_class); ?> td-woo-content layout-<?php echo esc_attr($layout); ?>">
        <div class="container">
        <div class="row">
		<?php if ($layout == 'left-sidebar' && is_active_sidebar($selected_sidebar)) : ?>
            <div class="col-xl-3 col-lg-12 td-shop-sidebar">
				<?php get_sidebar(); ?>
            </div>
		<?php endif ?>

        <div class="<?php echo esc_attr($page_column_class); ?>">
		<?php
	}
}

/*
 * Add before content New Markup
 */

add_action('woocommerce_before_main_content', 'doctio_woocommerce_wrapper_before');




/**
 * After After Content New Markup
 */

if (!function_exists('doctio_woocommerce_wrapper_after')) {
	function doctio_woocommerce_wrapper_after() {
		?>
        </div><!-- #Column -->

		<?php
		global $post;
		if ( get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
			$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
		} else {
			$common_meta = array();
		}

		if (is_shop()) {
			$layout           = doctio_option('shop_page_layout', 'full-width');
			$selected_sidebar = doctio_option( 'shop_default_sidebar', 'doctio-shop-sidebar' );
		} else {
			if ( array_key_exists( 'layout_meta', $common_meta ) && $common_meta['layout_meta'] != 'default' ) {
				$layout = $common_meta['layout_meta'];
			} else {
				$layout = doctio_option( 'product_page_layout', 'right-sidebar' );
			}

			if ( array_key_exists( 'sidebar_meta', $common_meta ) && $common_meta['sidebar_meta'] != '0' ) {
				$selected_sidebar = $common_meta['sidebar_meta'];
			} else {
				$selected_sidebar = doctio_option( 'product_default_sidebar', 'doctio-shop-sidebar' );
			}
		}
		?>

		<?php if ($layout == 'right-sidebar' && is_active_sidebar($selected_sidebar)) : ?>
            <div class="col-xl-3 col-lg-12 td-shop-sidebar">
				<?php get_sidebar(); ?>
            </div>
		<?php endif ?>
        </div><!-- #Row -->
        </div><!-- #Container -->
        </div><!-- #primary -->
		<?php
	}
}

/*
 * Add after content
 */
add_action('woocommerce_after_main_content', 'doctio_woocommerce_wrapper_after');




/**
 * Hide Page Title.
 */
function doctio_woocommerce_hide_page_title() {
	return false;
}

add_filter('woocommerce_show_page_title', 'doctio_woocommerce_hide_page_title');


/**
 *  New Before Shop Loop Markup
 */

function doctio_woocommerce_shop_topbar() { ?>
    <div class="td-woo-shop-topbar">
        <div class="row">
            <div class="col-lg-8 col-md-8 switcher-and-result">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div id="td-shop-view-mode">
                            <ul class="td-ul-style td-list-inline">
                                <li class="td-shop-grid"><i class="fas fa-th-large"></i></li>
                                <li class="td-shop-list"><i class="fas fa-list-ul"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="td-woo-result-count-wrapper">
							<?php woocommerce_result_count(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="td-woo-sort-list">
					<?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>
        </div>
    </div>

	<?php
}

/*
 * Add New before Shop Loop
 */
add_action('woocommerce_before_shop_loop', 'doctio_woocommerce_shop_topbar', 20);

/**
 * Products per page.
 */
function doctio_woocommerce_products_per_page() {
	$product_per_page = doctio_option('product_per_page', 9);
	return $product_per_page;
}

add_filter('loop_shop_per_page', 'doctio_woocommerce_products_per_page');


/**
 * Product per column.
 */
function doctio_woocommerce_loop_columns() {
	$product_column = doctio_option('product_column', 3);
	return $product_column;
}

add_filter('loop_shop_columns', 'doctio_woocommerce_loop_columns');

/**
 * Before Product columns wrapper before.
 *
 * woocommerce_before_shop_loop
 */
if (!function_exists('doctio_woocommerce_product_columns_wrapper')) {

	function doctio_woocommerce_product_columns_wrapper() {
		$columns = doctio_woocommerce_loop_columns();
		echo '<div class="columns-' . absint($columns) . '">';
	}
}
add_action('woocommerce_before_shop_loop', 'doctio_woocommerce_product_columns_wrapper', 40);

/**
 * Before Product columns wrapper after.
 *
 * woocommerce_after_shop_loop
 */
if (!function_exists('doctio_woocommerce_product_columns_wrapper_close')) {

	function doctio_woocommerce_product_columns_wrapper_close() {
		echo '</div>';

	}
}
add_action('woocommerce_after_shop_loop', 'doctio_woocommerce_product_columns_wrapper_close', 40);


/**
 * Related Products Args.
 */
function doctio_woocommerce_related_products_args($args) {
	$defaults = array(
		'posts_per_page' => 100,
		'columns'        => 1,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}

add_filter('woocommerce_output_related_products_args', 'doctio_woocommerce_related_products_args');





/**
 * Product gallery thumnbail columns.
 */
function doctio_woocommerce_thumbnail_columns() {
	return 4;
}

add_filter('woocommerce_product_thumbnails_columns', 'doctio_woocommerce_thumbnail_columns');


/**
 * Header Mini Cart
 */

function doctio_header_cart_count_number( $fragments ) {
	global $woocommerce;
	ob_start();?>
    <span class="cart-product-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.cart-product-count'] = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'doctio_header_cart_count_number' );

/**
 * Use excerpt when description doesn't exist
 */

if (!function_exists('woocommerce_template_single_excerpt')) {
	function woocommerce_template_single_excerpt() {
		global $post;
		if (!$post->post_excerpt) {
			return false;
		}

		echo '<div class="short-description">';
		if (!$post->post_excerpt) {
			echo wp_trim_words(get_the_excerpt() , '30', '...' );
		} else {
			wc_get_template('single-product/short-description.php');
		}
		echo '</div>';
	}
}

/**
 * Add Short Description on shop page product
 */

function doctio_woocommerce_shop_add_description() {
	if (is_shop() || is_product_category() || is_product_tag()) {
		global $post;
		echo '<div class="td-product-excerpt"><div class="td-short-description">';
		echo wp_trim_words(get_the_excerpt() , '30', '...' );
		echo '</div></div>';
	}
}


/**
 * Replace Text Onslae
 */

add_filter( 'woocommerce_sale_flash', 'doctio_add_percentage_to_sale_badge', 20, 3 );
function doctio_add_percentage_to_sale_badge( $html, $post, $product ) {

	if( $product->is_type('variable')){
		$percentages = array();

		// Get all variation prices
		$prices = $product->get_variation_prices();

		// Loop through variation prices
		foreach( $prices['price'] as $key => $price ){
			// Only on sale variations
			if( $prices['regular_price'][$key] !== $price ){
				// Calculate and set in the array the percentage for each variation on sale
				$percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
			}
		}
		// We keep the highest value
		$percentage = max($percentages) . '%';

	} elseif( $product->is_type('grouped') ){
		$percentages = array();

		// Get all variation prices
		$children_ids = $product->get_children();

		// Loop through variation prices
		foreach( $children_ids as $child_id ){
			$child_product = wc_get_product($child_id);

			$regular_price = (float) $child_product->get_regular_price();
			$sale_price    = (float) $child_product->get_sale_price();

			if ( $sale_price != 0 || ! empty($sale_price) ) {
				// Calculate and set in the array the percentage for each child on sale
				$percentages[] = round(100 - ($sale_price / $regular_price * 100));
			}
		}
		// We keep the highest value
		$percentage = max($percentages) . '%';

	} else {
		$regular_price = (float) $product->get_regular_price();
		$sale_price    = (float) $product->get_sale_price();

		if ( $sale_price != 0 || ! empty($sale_price) ) {
			$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
		} else {
			return $html;
		}
	}
	return '<span class="onsale">' . esc_html__( 'Sale', 'doctio' ) . ' ' . $percentage . '</span>';
}

/**
 * Product Loop
 */
add_filter( 'woocommerce_after_shop_loop_item', 'doctio_woo_product' );
function doctio_woo_product() {
	global $product;
	$quick_view = doctio_option('product_quick_view', true);
	$wish_list = doctio_option('product_wish_list', true);
	?>

    <div class="td-product-thumb-image">
		<?php woocommerce_show_product_sale_flash();?>
		<?php woocommerce_template_loop_product_thumbnail();?>

        <div class="td-product-thumb-buttons-wrapper">
            <div class="td-product-thumb-overlay"></div>
            <div class="td-product-thumb-buttons">

                <ul class="td-list-style td-list-inline">
                    <li class="td-shop-page-add-to-cart"><?php woocommerce_template_loop_add_to_cart();?></li>
					<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && $quick_view == true): ?>
                        <li class="td-quick-view"><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="flaticon-search-1"></i></a></li>
					<?php endif; ?>
					<?php if ( function_exists( 'tinvwl_shortcode_addtowishlist' ) && $wish_list == true): ?>
                        <li><?php echo do_shortcode('[ti_wishlists_addtowishlist]');?></li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="td-product-info-wrapper">
        <h3 class="woocommerce-product-title">
            <a href="<?php the_permalink();?>" ><?php the_title();?></a>
        </h3>

		<?php woocommerce_template_single_rating();?>

		<?php woocommerce_template_loop_price();?>

		<?php doctio_woocommerce_shop_add_description();?>


    </div>
    <div class="clear"></div>
	<?php
}



/*
 * Pagination
 */

function doctio_woocommerce_pagination($args) {
	$args['prev_text'] = '<i class="flaticon-long-right-arrow"></i>';
	$args['next_text'] = '<i class="flaticon-long-right-arrow"></i>';
	return $args;
}

add_filter('woocommerce_pagination_args', 'doctio_woocommerce_pagination');


/*
 * Break points
 */

function doctio_woocommerce_smallscreen_breakpoint(){
	return '767px';
}

add_filter( 'woocommerce_style_smallscreen_breakpoint', 'doctio_woocommerce_smallscreen_breakpoint' );




/*
 * Remove Default Product Meta
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

$show_sku = doctio_option('product_sku', true);

if($show_sku == true){
	add_action( 'woocommerce_single_product_summary', 'doctio_show_sku_single_product', 40 );

	function doctio_show_sku_single_product() {
		global $product;
		?>
        <div class="product_meta">
			<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
                <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'doctio' ); ?> <span class="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'doctio' ); ?></span></span>
			<?php endif; ?>
        </div>
		<?php
	}
}

$show_cat = doctio_option('product_cat', true);

if($show_cat == true){
	add_action( 'woocommerce_single_product_summary', 'doctio_show_cats_single_product', 40 );

	function doctio_show_cats_single_product() {
		global $product;
		?>
        <div class="product_meta">
			<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'doctio' ) . ' ', '</span>' ); ?>
        </div>
		<?php
	}
}

$show_tag = doctio_option('product_tag', true);

if($show_tag == true){
	add_action( 'woocommerce_single_product_summary', 'doctio_show_tags_single_product', 40 );

	function doctio_show_tags_single_product() {
		global $product;
		?>
        <div class="product_meta">
			<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'doctio' ) . ' ', '</span>' ); ?>
        </div>
		<?php
	}
}

/*
 * Related Products
 */

$show_related_products = doctio_option('show_related_products', true);

if($show_related_products == false){
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

// YITH Quickview
if ( function_exists( 'YITH_WCQV_Frontend' ) ) {
	remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
	remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
}


/* Custom Quantity Value */

add_action( 'woocommerce_after_quantity_input_field', 'doctio_display_quantity_plus' );
function doctio_display_quantity_plus() {
	echo '<button type="button" class="plus">+</button>';
}

add_action( 'woocommerce_before_quantity_input_field', 'doctio_display_quantity_minus' );
function doctio_display_quantity_minus() {
	echo '<button type="button" class="minus">-</button>';
}

add_filter( 'woocommerce_quantity_input_args', 'custom_quantity', 10, 2 );
function custom_quantity( $args, $product ) {
    if(! is_cart()){
        $args['input_value'] = 0;
    }
    return $args;
}

//Trigger update quantity script

add_action( 'wp_footer', 'doctio_add_cart_quantity_plus_minus' );

function doctio_add_cart_quantity_plus_minus() {

	if(function_exists('yith_get_wrapper_class')){
		if ( ! is_product() && ! is_cart() &&  ! yith_get_wrapper_class()) return;
	}else{
		if ( ! is_product() && ! is_cart()) return;
	}

	wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
      }); 
   " );
}