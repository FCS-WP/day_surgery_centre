<?php

// Create blog page options
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Blog Page', 'doctio' ),
	'id'     => 'blog_page_options',
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array(

		array(
			'id'      => 'blog_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Blog Layout', 'doctio' ),
			'options' => array(
				'full-width'    => esc_html__( 'Full Width', 'doctio' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'doctio' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'doctio' ),
				'grid'          => esc_html__( 'Grid Full', 'doctio' ),
				'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'doctio' ),
				'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'doctio' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select blog page layout.', 'doctio' ),
		),

		array(
			'id'       => 'blog_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Blog Banner', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable or disable blog page banner.', 'doctio' ),
		),

		array(
			'id'                    => 'blog_banner_background_options',
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
			'dependency'            => array( 'blog_banner', '==', true ),
			'output'                => '.banner-area.blog-banner',
			'desc'                  => esc_html__( 'If you want different banner background settings for blog page then select blog page banner background Options from here.', 'doctio' ),
		),

		array(
			'id'       => 'enable_blog_banner_title',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Banner Title', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Hide / Show blog banner title.', 'doctio' ),
			'dependency' => array( 'blog_banner', '==', true ),
		),

		array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => esc_html__( 'Banner Title', 'doctio' ),
			'desc'       => esc_html__( 'Type blog banner title here.', 'doctio' ),
			'dependency' => array( 'blog_banner|enable_blog_banner_title', '==|==', 'true|true' ),
		),

		array(
			'id'       => 'enable_blog_banner_breadcrumb',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Banner Breadcrumb', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Hide / Show blog banner title.', 'doctio' ),
			'dependency' => array( 'blog_banner', '==', true ),
		),

		array(
			'id'       => 'post_author',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Show Author Name', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Hide / Show post author name.', 'doctio' ),
		),

		array(
			'id'       => 'post_date',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Show Post Date', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Hide / Show post date.', 'doctio' ),
		),

		array(
			'id'         => 'cmnt_number',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Show Comment Number', 'doctio' ),
			'default'    => true,
			'text_on'    => esc_html__( 'Yes', 'doctio' ),
			'text_off'   => esc_html__( 'No', 'doctio' ),
			'desc'       => esc_html__( 'Hide / Show post comment number.', 'doctio' ),
			'dependency' => array( 'blog_layout', 'any', 'full-width,right-sidebar,left-sidebar' ),
		),

		array(
			'id'         => 'show_category',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Show Category Name', 'doctio' ),
			'default'    => true,
			'text_on'    => esc_html__( 'Yes', 'doctio' ),
			'text_off'   => esc_html__( 'No', 'doctio' ),
			'desc'       => esc_html__( 'Hide / Show post category name.', 'doctio' ),
			'dependency' => array( 'blog_layout', 'any', 'full-width,right-sidebar,left-sidebar' ),
		),

		array(
			'id'       => 'read_more_button',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Show Read More Button', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Hide / Show post read more button.', 'doctio' ),
		),

		array(
			'id'         => 'blog_read_more_text',
			'type'       => 'text',
			'title'      => esc_html__( 'Read More Button Text', 'doctio' ),
			'desc'       => esc_html__( 'Type blog read more button here.', 'doctio' ),
			'dependency' => array( 'read_more_button', '==', true ),
		),
	)
) );