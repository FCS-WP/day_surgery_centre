<?php

function doctio_install_required_plugins() {

	$plugins = array(

		array(
			'name'     => esc_html__('Breadcrumb NavXT', 'doctio'),
			'slug'     => 'breadcrumb-navxt',
			'version'  => '7.4.1',
			'required' => false,
		),

		array(
			'name'     => esc_html__('Contact Form 7', 'doctio'),
			'slug'     => 'contact-form-7',
			'version'  => '6.0.6',
			'required' => false
		),

		array(
			'name'     => esc_html__('Elementor Page Builder', 'doctio'),
			'slug'     => 'elementor',
			'version'  => '3.28.3',
			'required' => true,
		),

		array(
			'name'     => esc_html__('MC4WP: Mailchimp for WordPress', 'doctio'),
			'slug'     => 'mailchimp-for-wp',
			'version'  => '4.10.2',
			'required' => false,
		),

		array(
			'name'     => esc_html__('One Click Demo Import', 'doctio'),
			'slug'     => 'one-click-demo-import',
			'version'  => '3.3.0',
			'required' => false,
		),


		array(
			'name'     => esc_html__('ThemeDraft Core', 'doctio'),
			'slug'     => 'themedraft-core',
			'source'   => get_template_directory(). '/inc/plugins/themedraft-core.zip',
			'version'  => '1.0.8',
			'required' => true
		),

		array(
			'name'     => esc_html__('TI WooCommerce Wishlist', 'doctio'),
			'slug'     => 'ti-woocommerce-wishlist',
			'version'  => '2.9.2',
			'required' => false,
		),

		array(
			'name'     => esc_html__('WooCommerce', 'doctio'),
			'slug'     => 'woocommerce',
			'version'  => '9.8.1',
			'required' => false,
		),

		array(
			'name'     => esc_html__('YITH WooCommerce Quick View', 'doctio'),
			'slug'     => 'yith-woocommerce-quick-view',
			'version'  => '2.4.0',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'doctio',
		'parent_slug'  => 'doctio',
		'menu'         => 'doctio-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'is_automatic' => false,
		'dismiss_msg'  => '',
		'message'      => '',
		'default_path' => '',
	);

	tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'doctio_install_required_plugins');