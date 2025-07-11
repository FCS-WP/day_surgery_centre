<?php

//Register widget area
function doctio_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'doctio'),
		'id'            => 'doctio-sidebar',
		'description'   => esc_html__('Add widgets here.', 'doctio'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));


	register_sidebar(array(
		'name'          => esc_html__('Service Sidebar', 'doctio'),
		'id'            => 'doctio-service-sidebar',
		'description'   => esc_html__('Add service widgets here.', 'doctio'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));


	register_sidebar(array(
		'name'          => esc_html__('Team Sidebar', 'doctio'),
		'id'            => 'doctio-team-sidebar',
		'description'   => esc_html__('Add team widgets here.', 'doctio'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	$footer_widget_column = doctio_option('footer_widget_column', 'col-lg-3');
	register_sidebar(array(
		'name'          => esc_html__('Footer Widget', 'doctio'),
		'id'            => 'doctio-footer-widget',
		'description'   => esc_html__('Add footer widgets here.', 'doctio'),
		'before_widget' => '<div id="%1$s" class="widget '.esc_attr($footer_widget_column).' col-md-6 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	/**
	 * Load Shop Sidebar.
	 */
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(array(
			'name'          => esc_html__('Shop Sidebar', 'doctio'),
			'id'            => 'doctio-shop-sidebar',
			'description'   => esc_html__('Add shop widgets here.', 'doctio'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}
}

add_action('widgets_init', 'doctio_widgets_init');