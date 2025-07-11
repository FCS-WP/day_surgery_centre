<?php

// Create Page Options
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Page Options', 'doctio' ),
	'id'     => 'page_options',
	'icon'   => 'fa fa-file-text-o',
	'fields' => array(
		array(
			'id'      => 'page_default_layout',
			'type'    => 'select',
			'title'   => esc_html__('Page Layout', 'doctio'),
			'options' => array(
				'full-width'  => esc_html__('Full Width', 'doctio'),
				'left-sidebar'  => esc_html__('Left Sidebar', 'doctio'),
				'right-sidebar' => esc_html__('Right Sidebar', 'doctio'),
			),
			'default' => 'full-width',
			'desc'    => esc_html__('Select page layout.', 'doctio'),
		),

		array(
			'id'         => 'page_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default' => 'doctio-sidebar',
			'dependency' => array( 'page_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all pages. You can override this settings on individual page.', 'doctio' ),
		),
	)
) );