<?php
//Search Options

CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Search Page', 'doctio' ),
	'id'     => 'search_page_options',
	'icon'   => 'fa fa-search',
	'fields' => array(

		array(
			'id'      => 'search_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Search Layout', 'doctio' ),
			'options' => array(
				'full-width'    => esc_html__( 'Full Width', 'doctio' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'doctio' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'doctio' ),
				'grid'          => esc_html__( 'Grid Full', 'doctio' ),
				'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'doctio' ),
				'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'doctio' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select search page layout.', 'doctio' ),
		),

		array(
			'id'       => 'search_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Search Banner', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable or disable search page banner.', 'doctio' ),
		),

		array(
			'id'                    => 'search_banner_background_options',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background', 'doctio' ),
			'background_gradient'   => true,
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'dependency'            => array( 'search_banner', '==', true ),
			'output'                => '.banner-area.search-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for search page then select search page banner background options from here.', 'doctio' ),
		),

		array(
			'id'    => 'search_placeholder',
			'type'  => 'text',
			'title' => esc_html__( 'Search Field Placeholder', 'doctio' ),
			'desc'  => esc_html__( 'Type search placeholder here.', 'doctio' ),
		),
	)
) );