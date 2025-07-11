<?php
$doctio_common_meta = 'doctio_common_meta';

// Create a metabox
CSF::createMetabox( $doctio_common_meta, array(
	'title'     => esc_html__( 'Settings', 'doctio' ),
	'post_type' => array( 'page', 'post', 'doctio_service', 'doctio_team', 'doctio_portfolio', 'product' ),
	'data_type' => 'serialize',
) );

// Create layout section
CSF::createSection( $doctio_common_meta, array(
	'title'  => esc_html__( 'Layout Settings ', 'doctio' ),
	'icon'   => 'fa fa-calculator',
	'fields' => array(

		array(
			'id'      => 'layout_meta',
			'type'    => 'select',
			'title'   => esc_html__( 'Layout', 'doctio' ),
			'options' => array(
				'default'       => esc_html__( 'Default', 'doctio' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'doctio' ),
				'full-width'    => esc_html__( 'Full Width', 'doctio' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'doctio' ),
			),
			'default' => 'default',
			'desc'    => esc_html__( 'Select layout', 'doctio' ),
		),

		array(
			'id'         => 'sidebar_meta',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'dependency' => array( 'layout_meta', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select sidebar you want to show with this page.', 'doctio' ),
		),
	)
) );

// Create layout section
CSF::createSection( $doctio_common_meta, array(
	'title'  => esc_html__( 'Header Settings ', 'doctio' ),
	'icon'   => 'fa fa-header',
	'fields' => array(

		array(
			'id'      => 'header_meta',
			'type'    => 'select',
			'title'   => esc_html__( 'Header Style', 'doctio' ),
			'options' => array(
				'default'          => esc_html__( 'Default', 'doctio' ),
				'header-style-one' => esc_html__( 'Header Style One', 'doctio' ),
				'header-style-two' => esc_html__( 'Header Style Two', 'doctio' ),
			),
			'default' => 'default',
			'desc'    => esc_html__( 'Select header style', 'doctio' ),
		),

		array(
			'id'           => 'header_logo_meta',
			'type'         => 'media',
			'title'        => esc_html__( 'Header Logo', 'doctio' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'doctio' ),
			'desc'         => esc_html__( 'Upload logo image', 'doctio' ),

		),

		array(
			'id'          => 'main_menu_meta',
			'type'        => 'select',
			'title'       => esc_html__( 'Header Menu', 'doctio' ),
			'options'     => 'menus',
			'placeholder' => esc_html__( 'Default', 'doctio' ),
			'desc'        => esc_html__( 'You can select a different menu for this page from here.', 'doctio' ),
		),
	)
) );

// Create a section
CSF::createSection( $doctio_common_meta, array(
	'title'  => esc_html__( 'Banner Settings', 'doctio' ),
	'icon'   => 'fa fa-flag-o',
	'fields' => array(
		array(
			'id'       => 'enable_banner',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Banner', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable or disable banner.', 'doctio' ),
		),

		array(
			'id'                    => 'banner_background_meta',
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
			'dependency'            => array( 'enable_banner', '==', true ),
			'output'                => '.banner-area.post-banner,.banner-area.page-banner,.banner-area.service-banner,.banner-area.team-banner,.banner-area.portfolio-banner',
			'desc'                  => esc_html__( 'Select banner background color and image', 'doctio' ),
		),

		array(
			'id'         => 'hide_banner_title_meta',
			'type'       => 'button_set',
			'title'      => esc_html__( 'Hide Title', 'doctio' ),
			'options'    => array(
				'default' => esc_html__( 'Default', 'doctio' ),
				'yes'     => esc_html__( 'Yes', 'doctio' ),
				'no'      => esc_html__( 'No', 'doctio' ),
			),
			'default'    => 'default',
			'desc'       => esc_html__( 'Hide or show banner title.', 'doctio' ),
			'dependency' => array( 'enable_banner', '==', true ),
		),

		array(
			'id'         => 'custom_title',
			'type'       => 'text',
			'title'      => esc_html__( 'Banner Custom Title', 'doctio' ),
			'dependency' => array( 'enable_banner|hide_banner_title_meta', '==|!=', 'true|yes' ),
			'desc'       => esc_html__( 'If you want to use custom title write title here.If you don\'t, leave it empty.', 'doctio' )
		),


		array(
			'id'         => 'hide_banner_breadcrumb_meta',
			'type'       => 'button_set',
			'title'      => esc_html__( 'Hide Breadcrumb', 'doctio' ),
			'options'    => array(
				'default' => esc_html__( 'Default', 'doctio' ),
				'yes'     => esc_html__( 'Yes', 'doctio' ),
				'no'      => esc_html__( 'No', 'doctio' ),
			),
			'default'    => 'default',
			'desc'       => esc_html__( 'Hide or show banner breadcrumb.', 'doctio' ),
			'dependency' => array( 'enable_banner', '==', true ),
		),

		array(
			'id'         => 'banner_text_align_meta',
			'type'       => 'button_set',
			'title'      => esc_html__( 'Banner Text Align', 'doctio' ),
			'options'    => array(
				'default' => esc_html__( 'Default', 'doctio' ),
				'start'    => esc_html__( 'Left', 'doctio' ),
				'center'  => esc_html__( 'Center', 'doctio' ),
				'end'   => esc_html__( 'Right', 'doctio' ),
			),
			'default'    => 'default',
			'dependency' => array( 'enable_banner', '==', true ),
			'desc'       => esc_html__( 'Select page banner text align.', 'doctio' ),
		),

		array(
			'id'         => 'banner_height_meta',
			'type'       => 'dimensions',
			'title'      => esc_html__( 'Banner Height', 'doctio' ),
			'output'     => '.banner-area.post-banner,.banner-area.page-banner,.banner-area.service-banner,.banner-area.team-banner,.banner-area.portfolio-banner',
			'width'      => false,
			'height'     => true,
			'desc'       => esc_html__( 'Select banner height.', 'doctio' ),
			'dependency' => array( 'enable_banner', '==', true ),
		),
	)
) );

// Create Footer section
CSF::createSection( $doctio_common_meta, array(
	'title'  => esc_html__( 'Footer Settings ', 'doctio' ),
	'icon'   => 'fa fa-wordpress',
	'fields' => array(

		array(
			'id'      => 'footer_style_meta',
			'type'    => 'select',
			'title'   => esc_html__( 'Select Footer Style', 'doctio' ),
			'options' => array(
				'default'       => esc_html__( 'Default', 'doctio' ),
				'footer-style-one'  => esc_html__( 'Footer Style One', 'doctio' ),
				'footer-style-two'    => esc_html__( 'Footer Style Two', 'doctio' ),
			),
			'default' => 'default',
			'desc'    => esc_html__( 'Select Footer Style', 'doctio' ),
		),
	),
) );