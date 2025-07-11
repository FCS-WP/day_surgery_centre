<?php
//Service Option
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Service Options', 'doctio' ),
	'id'     => 'service_options',
	'icon'   => 'fa fa-th',
	'fields' => array(
		array(
			'id'      => 'service_default_layout',
			'type'    => 'select',
			'title'   => esc_html__('Service Layout', 'doctio'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'doctio'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'doctio'),
				'right-sidebar' => esc_html__('Right Sidebar', 'doctio'),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__('Select service layout.', 'doctio'),
		),

		array(
			'id'         => 'service_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default' => 'doctio-service-sidebar',
			'dependency' => array( 'service_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all services. You can override this settings on individual service.', 'doctio' ),
		),

		array(
			'id'    => 'service_url_slug',
			'type'  => 'text',
			'default' => 'service',
			'title' => esc_html__( 'URL Slug', 'doctio' ),
			'desc'  => esc_html__( 'Change service slug on URL. Don\'t forget to reset permalink after change this.', 'doctio' ),
		),

	)
) );