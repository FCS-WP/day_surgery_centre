<?php

$doctio_team_meta = 'doctio_team_meta';

// Create a metabox
CSF::createMetabox( $doctio_team_meta, array(
	'title'     => esc_html__( 'Member Profiles Options', 'doctio' ),
	'post_type' => 'doctio_team',
	'data_type' => 'serialize',
) );


CSF::createSection( $doctio_team_meta, array(
	'fields' => array(
		array(
			'id'           => 'member_social_profile',
			'type'         => 'group',
			'title'        => esc_html__( 'Member Social', 'doctio' ),
			'desc'         => esc_html__( 'Add member social profile icons here.', 'doctio' ),
			'button_title' => esc_html__( 'Add Social Profile', 'doctio' ),
			'fields'       => array(
				array(
					'id'    => 'site_name',
					'type'  => 'text',
					'title' => esc_html__( 'Site Name', 'doctio' ),
					'desc'  => esc_html__( 'Type social site name here.', 'doctio' ),
				),

				array(
					'id'    => 'site_icon',
					'type'  => 'icon',
					'title' => esc_html__( 'Icon', 'doctio' ),
					'desc'  => esc_html__( 'Select icon', 'doctio' ),
				),

				array(
					'id'    => 'site_url',
					'type'  => 'text',
					'title' => esc_html__( 'Profile Link', 'doctio' ),
					'desc'  => esc_html__( 'Type social site url here.', 'doctio' ),
				),
			),

			'default' => array(
				array(
					'site_name' => esc_html__( 'Facebook', 'doctio' ),
					'site_icon' => 'fab fa-facebook-f',
					'site_url'  => '#',
				),

				array(
					'site_name' => esc_html__( 'Twitter', 'doctio' ),
					'site_icon' => 'fab fa-twitter',
					'site_url'  => '#',
				),

				array(
					'site_name' => esc_html__( 'LinkedIn', 'doctio' ),
					'site_icon' => 'fab fa-linkedin-in',
					'site_url'  => '#',
				),

				array(
					'site_name' => esc_html__( 'Pinterest', 'doctio' ),
					'site_icon' => 'fab fa-pinterest-p',
					'site_url'  => '#',
				),
			),
		),

		array(
			'id'           => 'member_skills',
			'type'         => 'group',
			'title'        => esc_html__( 'Member Skills', 'doctio' ),
			'desc'         => esc_html__( 'Add member skills here.', 'doctio' ),
			'button_title' => esc_html__( 'Add Skill', 'doctio' ),
			'fields'       => array(
				array(
					'id'    => 'skill_title',
					'type'  => 'text',
					'title' => esc_html__( 'Title', 'doctio' ),
					'desc'  => esc_html__( 'Skill title here.', 'doctio' ),
				),

				array(
					'id'    => 'skill_percent',
					'type'  => 'text',
					'title' => esc_html__( 'Percent', 'doctio' ),
					'desc'  => esc_html__( 'Skill percent here.', 'doctio' ),
				),
			),

			'default' => array(
				array(
					'skill_title' => esc_html__( 'Successful Surgery', 'doctio' ),
					'skill_percent'  => '99',
				),

				array(
					'skill_title' => esc_html__( 'Patients Satisfaction', 'doctio' ),
					'skill_percent'  => '85',
				),
			),
		),

		array(
			'id'          => 'member_awards',
			'type'        => 'gallery',
			'title' => esc_html__('Award Images', 'doctio' ),
			'add_title'   => esc_html__('Upload Award Images', 'doctio'),
			'edit_title'  => esc_html__('Edit Award Images', 'doctio'),
			'clear_title' => esc_html__('Remove Award Images', 'doctio'),
			'desc'    => esc_html__( 'Upload Award images from here', 'doctio' ),
		),
	)
) );