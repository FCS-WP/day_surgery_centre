<?php

// Create banner options
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Banner Options', 'doctio' ),
	'id'     => 'banner_default_options',
	'icon'   => 'fa fa-flag-o',
	'fields' => array(

		array(
			'id'                    => 'banner_default_background',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background', 'doctio' ),
			'background_gradient'   => false,
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => false,
			'background_position'   => false,
			'background_repeat'     => false,
			'output'                => '.banner-area',
			'desc'                  => esc_html__( 'Select banner background color and image. You can change this settings on individual page / post.', 'doctio' ),
		),

		array(
			'id'      => 'banner_default_text_align',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Text Align', 'doctio' ),
			'options' => array(
				'start'   => esc_html__( 'Left', 'doctio' ),
				'center' => esc_html__( 'Center', 'doctio' ),
				'end'  => esc_html__( 'Right', 'doctio' ),
			),
			'default' => 'center',
			'desc'    => esc_html__( 'Select banner text align. You can change this settings on individual page / post.', 'doctio' ),
		),

		array(
			'id'      => 'hide_banner_title',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Hide Banner Title', 'doctio' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'doctio' ),
				'no'  => esc_html__( 'No', 'doctio' ),
			),
			'default' => 'no',
			'desc'    => esc_html__( 'Hide banner title. You can change this settings on individual page / post.', 'doctio' ),
		),

		array(
			'id'      => 'hide_banner_breadcrumb',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Hide Banner Breadcrumb', 'doctio' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'doctio' ),
				'no'  => esc_html__( 'No', 'doctio' ),
			),
			'default' => 'no',
			'desc'    => esc_html__( 'Hide banner breadcrumb. You can change this settings on individual page / post.', 'doctio' ),
		),

		array(
			'id'            => 'banner_default_height',
			'type'          => 'dimensions',
			'title'         => esc_html__( 'Banner Height', 'doctio' ),
			'output'        => '.banner-area,.header-style-two .banner-area',
			'width'         => false,
			'height'        => true,
			'desc'          => esc_html__( 'Select banner height. You can change this settings on individual page / post.', 'doctio' ),
		),
	)
) );