<?php
//Team Options
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Team Options', 'doctio' ),
	'id'     => 'team_options',
	'icon'   => 'fa fa-users',
	'fields' => array(

		array(
			'id'      => 'team_default_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Team Layout', 'doctio' ),
			'options' => array(
				'full-width'    => esc_html__( 'Full Width', 'doctio' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'doctio' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'doctio' ),
			),
			'default' => 'full-width',
			'desc'    => esc_html__( 'Select team layout.', 'doctio' ),
		),

		array(
			'id'         => 'team_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default'    => 'doctio-team-sidebar',
			'dependency' => array( 'team_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all team members. You can override this settings on individual team member.', 'doctio' ),
		),

		array(
			'id'    => 'team_url_slug',
			'type'  => 'text',
			'default' => 'team',
			'title' => esc_html__( 'URL Slug', 'doctio' ),
			'desc'  => esc_html__( 'Change team slug on URL. Don\'t forget to reset permalink after change this.', 'doctio' ),
		),

	)
) );