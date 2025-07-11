<?php
// Create WooCommerce options section
CSF::createSection($doctio_theme_option, array(
	'title' => esc_html__('WooCommerce', 'doctio'),
	'id'    => 'td_woo_options',
	'icon'  => 'fa fa-shopping-cart',
));

CSF::createSection($doctio_theme_option, array(
	'parent' => 'td_woo_options',
	'title'  => esc_html__('Shop Page', 'doctio'),
	'icon'   => 'fa fa-shopping-bag',
	'fields' => array(

		array(
			'id'      => 'shop_page_layout',
			'type'    => 'select',
			'title'   => esc_html__('Shop Layout', 'doctio'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'doctio'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'doctio'),
				'right-sidebar' => esc_html__('Right Sidebar', 'doctio'),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__('Select shop page layout.', 'doctio'),
		),

		array(
			'id'         => 'shop_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default' => 'doctio-shop-sidebar',
			'dependency' => array( 'shop_page_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select shop page sidebar.', 'doctio' ),
		),

		array(
			'id'         => 'shop_custom_title',
			'type'       => 'text',
			'title'      => esc_html__('Shop Title', 'doctio'),
			'default' => esc_html__('Shop', 'doctio'),
			'desc'       => esc_html__('Shop page banner title here.', 'doctio')
		),

		array(
			'id'    => 'product_per_page',
			'type'  => 'text',
			'title' => esc_html__( 'Product Per Page', 'doctio' ),
			'default' => 9,
			'desc'  => esc_html__( 'Type how many product you want to show per page. Number only.', 'doctio' ),
		),

		array(
			'id'    => 'product_column',
			'type'  => 'text',
			'title' => esc_html__( 'Product Column Per Row', 'doctio' ),
			'default' => 3,
			'desc'  => esc_html__( 'How many product you want to show per row. Number only.', 'doctio' ),
		),

		array(
			'id'       => 'product_quick_view',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Quick View Icon', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Enable or disable product quick view icon.', 'doctio'),
		),

		array(
			'id'       => 'product_wish_list',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Wish list Icon', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Enable or disable product wish list icon.', 'doctio'),
		),
	)
));

CSF::createSection($doctio_theme_option, array(
	'parent' => 'td_woo_options',
	'title'  => esc_html__('Single Product', 'doctio'),
	'icon'   => 'fa fa-product-hunt',
	'fields' => array(

		array(
			'id'      => 'product_page_layout',
			'type'    => 'select',
			'title'   => esc_html__('Product Layout', 'doctio'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'doctio'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'doctio'),
				'right-sidebar' => esc_html__('Right Sidebar', 'doctio'),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__('Select product layout.', 'doctio'),
		),

		array(
			'id'         => 'product_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default' => 'doctio-shop-sidebar',
			'dependency' => array( 'product_page_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select product sidebar.', 'doctio' ),
		),

		array(
			'id'         => 'product_banner_title',
			'type'       => 'text',
			'title'      => esc_html__('Product Banner Title', 'doctio'),
			'default' => esc_html__('Shop', 'doctio'),
			'desc'       => esc_html__('If not empty, this title will show for all single product\'s banner title. Make this field empty to show product default title. You can overwrite it on the individual product page.', 'doctio')
		),

		array(
			'id'       => 'product_sku',
			'type'     => 'switcher',
			'title'    => esc_html__('Show SKU', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Show / Hide product SKU.', 'doctio'),
		),

		array(
			'id'       => 'product_cat',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Category', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Show / Hide product category.', 'doctio'),
		),

		array(
			'id'       => 'product_tag',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Tags', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Show / Hide product tags.', 'doctio'),
		),

		array(
			'id'       => 'show_related_products',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Related Products', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Show / Hide related products.', 'doctio'),
		),

		array(
			'id'    => 'related_products_column',
			'type'  => 'text',
			'title' => esc_html__( 'Related Products Column', 'doctio' ),
			'default' => 3,
			'desc'  => esc_html__( 'How many product you want to show per row. Number only.', 'doctio' ),
			'dependency'            => array('show_related_products', '==', true),
		),
	)
));