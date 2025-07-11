<?php
// Create header Settings section
CSF::createSection( $doctio_theme_option, array(
	'title' => esc_html__( 'Header Settings', 'doctio' ),
	'id'    => 'header_options',
	'icon'  => 'fa fa-header',
) );


CSF::createSection( $doctio_theme_option, array(
	'parent' => 'header_options',
	'title'  => esc_html__( 'Header Options', 'doctio' ),
	'icon'   => 'fa fa-credit-card',
	'fields' => array(
		array(
			'id'       => 'site_default_header',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Header Style', 'doctio' ),
			'options'  => array(
				'header-style-one' => get_theme_file_uri( 'assets/images/header-one.png' ),
				'header-style-two' => get_theme_file_uri( 'assets/images/header-two.png' ),
			),
			'default'  => 'header-style-one',
			'subtitle' => esc_html__( 'Select site default header style. You can override this settings on individual page / Posts.', 'doctio' ),
		),

		array(
			'id'       => 'sticky_header',
			'type'     => 'switcher',
			'title'    => esc_html__('Enable Sticky Header', 'doctio'),
			'default'  => true,
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Enable / Disable sticky header.', 'doctio'),
		),

		array(
			'id'       => 'header_cart',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Header Cart', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable / Disable header cart.', 'doctio' ),
			'dependency' => array( 'site_default_header', 'any', 'header-style-two,header-style-three,header-style-four', 'all' ),
		),

		array(
			'id'       => 'header_search',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Header Search', 'doctio' ),
			'default'  => true,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable / Disable header search.', 'doctio' ),
			'dependency' => array( 'site_default_header', 'any', 'header-style-two,header-style-three,header-style-four', 'all' ),

		),


		array(
			'id'           => 'header_default_logo',
			'type'         => 'media',
			'title'        => esc_html__( 'Header Logo', 'doctio' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'doctio' ),
			'desc'         => esc_html__( 'Upload logo image', 'doctio' ),

		),

		array(
			'id'            => 'logo_image_size',
			'type'          => 'dimensions',
			'title'         => esc_html__( 'Logo Image Size', 'doctio' ),
			'output'        => '.site-branding img',
			'width'         => true,
			'height'        => true,
			'desc'          => esc_html__( 'Select logo image size.', 'doctio' ),
		),
	)
) );

CSF::createSection( $doctio_theme_option, array(
	'parent' => 'header_options',
	'title'  => esc_html__( 'Header Top & Button', 'doctio' ),
	'icon'   => 'fas fa-info-circle',
	'fields' => array(

		array(
			'type'       => 'notice',
			'style'      => 'info',
			'content'    => esc_html__( 'Header Top & Information not available with selected header style', 'doctio' ),
			'dependency' => array( 'site_default_header', 'any', 'header-style-one,header-style-four', 'all' ),
		),

		array(
			'id'         => 'enable_header_top',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Enable Header Top', 'doctio' ),
			'default'    => true,
			'text_on'    => esc_html__( 'Yes', 'doctio' ),
			'text_off'   => esc_html__( 'No', 'doctio' ),
			'desc'       => esc_html__( 'Enable / Disable header top info.', 'doctio' ),
			'dependency' => array( 'site_default_header', 'any', 'header-style-two', 'all' ),
		),

		array(
			'id'           => 'header_top_info_text',
			'type'         => 'group',
			'title'        => esc_html__( 'Top Left Info Text', 'doctio' ),
			'subtitle'     => esc_html__( 'Add / edit header top info text from here.', 'doctio' ),
			'desc'         => esc_html__( 'Click "Add Info" button to add new Information.', 'doctio' ),
			'button_title' => esc_html__( 'Add Info', 'doctio' ),
			'fields'       => array(
				array(
					'id'            => 'info_text',
					'type'          => 'wp_editor',
					'media_buttons' => false,
					'height'        => '80px',
					'title'         => esc_html__( 'Info Text', 'doctio' ),
					'desc'          => esc_html__( 'Type top left text here.', 'doctio' ),
				),

				array(
					'id'    => 'top_info_icon',
					'type'  => 'icon',
					'title' => esc_html__( 'Info Icon', 'doctio' ),
					'desc'  => esc_html__( 'Select icon', 'doctio' ),
				),
			),

			'default'      => array(
				array(
					'info_text' => wp_kses( __( '<strong>Working Hour:</strong> 08.00am - 09.00pm', 'doctio' ), doctio_allow_html() ),
					'top_info_icon' => 'far fa-clock',
				),

				array(
					'info_text' => wp_kses( __( '<strong>Email:</strong> <a href="mailto:info@themedraft.net">info@themedraft.net</a>', 'doctio' ), doctio_allow_html() ),
					'top_info_icon' => 'far fa-envelope',
				),
			),

			'dependency' => array(
				'site_default_header|enable_header_top',
				'any|==',
				'header-style-two,header-style-three|true',
				'all|all'
			),
		),

		array(
			'id'           => 'header_top_socials',
			'type'         => 'group',
			'title'        => esc_html__( 'Top Social Icons', 'doctio' ),
			'subtitle'     => esc_html__( 'Add / edit top social icons from here.', 'doctio' ),
			'desc'         => esc_html__( 'Click "Add Social Icon" button to add new icons.', 'doctio' ),
			'button_title' => esc_html__( 'Add Social Icon', 'doctio' ),
			'fields'       => array(

				array(
					'id'    => 'icon',
					'type'  => 'icon',
					'title' => esc_html__( 'Site Icon', 'doctio' ),
					'desc'  => esc_html__( 'Select icon', 'doctio' ),
				),

				array(
					'id'    => 'profile_url',
					'type'  => 'text',
					'title' => esc_html__( 'Profile Link', 'doctio' ),
					'desc'  => esc_html__( 'Type social profile link here.', 'doctio' ),
				),
			),

			'default' => array(
				array(
					'icon'        => 'fab fa-facebook-f',
					'profile_url' => '#',
				),

				array(
					'icon'        => 'fab fa-twitter',
					'profile_url' => '#',
				),

				array(
					'icon'        => 'fab fa-linkedin-in',
					'profile_url' => '#',
				),

				array(
					'icon'        => 'fab fa-instagram',
					'profile_url' => '#',
				),
			),

			'dependency' => array(
				'site_default_header|enable_header_top',
				'any|==',
				'header-style-two,header-style-three|true',
				'all|all'
			),
		),


		array(
			'id'            => 'top_hotline_number',
			'type'          => 'wp_editor',
			'media_buttons' => false,
			'height'        => '80px',
			'title'         => esc_html__( 'Hotline Number', 'doctio' ),
			'desc'          => esc_html__( 'Type top hotline number here.', 'doctio' ),
			'default' => wp_kses( __( '<strong>Hotline:</strong> <a href="tel:12345678">+0123 (456) 789</a>', 'doctio' ), doctio_allow_html() ),
			'dependency' => array(
				'site_default_header|enable_header_top',
				'any|==',
				'header-style-two,header-style-three|true',
				'all|all'
			),
		),

		array(
			'id'     => 'header_cta_btn',
			'type'   => 'fieldset',
			'title'  => esc_html__( 'CTA Button', 'doctio' ),
			'fields' => array(

				array(
					'id'    => 'cta_btn_text',
					'type'  => 'text',
					'title' => esc_html__( 'Button Text', 'doctio' ),
					'default' => esc_html__( 'Contact Us', 'doctio' ),
				),

				array(
					'id'    => 'cta_btn_url',
					'type'  => 'text',
					'title' => esc_html__( 'Button Url', 'doctio' ),
					'default' => '#',
				),
			),

			'dependency' => array(
				'site_default_header',
				'any',
				'header-style-two,header-style-three,header-style-four',
				'all|all'
			),
		),
	)
) );