<?php
// Create Footer section

CSF::createSection( $doctio_theme_option, array(
	'id'    => 'footer_options',
	'title'  => esc_html__( 'Footer Options', 'doctio' ),
	'icon'   => 'fa fa-wordpress',
	'fields' => array(

		array(
			'id'       => 'site_default_footer',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Style', 'doctio' ),
			'options'  => array(
				'footer-style-one' => get_theme_file_uri( 'assets/images/footer-1.jpg' ),
				'footer-style-two' => get_theme_file_uri( 'assets/images/footer-2.jpg' ),
			),
			'default'  => 'footer-style-one',
			'subtitle' => esc_html__( 'Select site default footer style. You can override this settings on individual page / Posts.', 'doctio' ),
		),

		array(
			'id'                    => 'footer_bg_image',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Footer Background', 'doctio' ),
			'background_gradient'   => false,
			'background_origin'     => false,
			'background_clip'       => false,
			'background_blend-mode' => false,
			'background_attachment' => false,
			'background_size'       => true,
			'background_position'   => true,
			'background_repeat'     => true,
			'output'                => '.site-footer',
			'desc'                  => esc_html__( 'Select footer background color and image.', 'doctio' ),
		),

		array(
			'id'     => 'footer_top_options',
			'type'   => 'fieldset',
			'title'  => esc_html__( 'Footer Top', 'doctio' ),
			'fields' => array(
				array(
					'id'           => 'footer_logo',
					'type'         => 'media',
					'title'        => esc_html__( 'Footer Logo', 'doctio' ),
					'library'      => 'image',
					'url'          => false,
					'button_title' => esc_html__( 'Upload Logo', 'doctio' ),
					'desc'         => esc_html__( 'Upload footer logo image', 'doctio' ),
				),

				array(
					'id'    => 'subscribe_form_title',
					'type'  => 'text',
					'title' => esc_html__( 'Subscribe Form Title', 'doctio' ),
					'default' => esc_html__( 'Subscribe:', 'doctio' ),
				),

				array(
					'id'    => 'mailchimp_shortcode',
					'type'  => 'text',
					'title' => esc_html__( 'Mailchimp Shortcode', 'doctio' ),
					'desc'  => esc_html__( 'Paste mailchimp shortcode here.', 'doctio' ),
				),

				array(
					'id'            => 'top_right_text',
					'type'          => 'wp_editor',
					'title'         => esc_html__( 'Footer Top Right Text', 'doctio' ),
					'desc'          => esc_html__( 'Type footer top right text here.', 'doctio' ),
					'tinymce'       => true,
					'quicktags'     => true,
					'media_buttons' => false,
					'height'        => '100px',
					'default'        => wp_kses( __( '<strong>5M+</strong>Satisfied Clients', 'doctio' ), doctio_allow_html() ),
				),

			),

			'dependency' => array(
				'site_default_footer',
				'any',
				'footer-style-two',
				'all'
			),
		),

		array(
			'id'      => 'footer_widget_column',
			'type'    => 'select',
			'title'   => esc_html__( 'Widget Column', 'doctio' ),
			'desc'    => esc_html__( 'Select widget area column number.', 'doctio' ),
			'options' => array(
				'col-lg-12' => esc_html__( '1 Column', 'doctio' ),
				'col-lg-6'  => esc_html__( '2 Column', 'doctio' ),
				'col-lg-4'  => esc_html__( '3 Column', 'doctio' ),
				'col-lg-3'  => esc_html__( '4 Column', 'doctio' ),
			),
			'default' => 'col-lg-3',
		),



		array(
			'id'            => 'footer_info_left_text',
			'type'          => 'wp_editor',
			'title'         => esc_html__( 'Footer Info Left Text', 'doctio' ),
			'desc'          => esc_html__( 'Type footer info left text here.', 'doctio' ),
			'tinymce'       => true,
			'quicktags'     => true,
			'media_buttons' => false,
			'height'        => '100px',
		),

		array(
			'id'            => 'copyright_text',
			'type'          => 'wp_editor',
			'title'         => esc_html__( 'Copyright Text', 'doctio' ),
			'desc'          => esc_html__( 'Type site copyright text here.', 'doctio' ),
			'tinymce'       => true,
			'quicktags'     => true,
			'media_buttons' => false,
			'height'        => '100px',
		),

		array(
			'id'       => 'go_to_top_button',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Go Top Button', 'doctio' ),
			'default'  => false,
			'text_on'  => esc_html__( 'Yes', 'doctio' ),
			'text_off' => esc_html__( 'No', 'doctio' ),
			'desc'     => esc_html__( 'Enable or disable go to top button.', 'doctio' ),
		),

		array(
			'id'    => 'go_top_icon',
			'type'  => 'icon',
			'title' => esc_html__( 'Go Top Icon', 'doctio' ),
			'desc'  => esc_html__( 'Select icon', 'doctio' ),
			'default'  => 'flaticon-up-2',
			'dependency' => array(
				'go_to_top_button',
				'==',
				'true',
				'all'
			),
		),
	)
) );