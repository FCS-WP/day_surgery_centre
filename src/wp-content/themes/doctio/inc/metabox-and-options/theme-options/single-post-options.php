<?php
//Single Post

CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Single Post / Post Details', 'doctio' ),
	'id'     => 'single_post_options',
	'icon'   => 'fa fa-pencil',
	'fields' => array(

		array(
			'id'      => 'single_post_default_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Layout', 'doctio' ),
			'options' => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'doctio' ),
				'full-width'    => esc_html__( 'Full Width', 'doctio' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'doctio' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select single post layout', 'doctio' ),
		),


		array(
			'id'         => 'single_post_default_sidebar',
			'type'       => 'select',
			'title'      => esc_html__( 'Sidebar', 'doctio' ),
			'options'    => 'doctio_sidebars',
			'default' => 'doctio-sidebar',
			'dependency' => array( 'single_post_default_layout', '!=', 'full-width' ),
			'desc'       => esc_html__( 'Select default sidebar for all posts. You can override this settings on individual post.', 'doctio' ),
		),

		array(
			'id'      => 'hide_single_post_banner_title',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Hide Post Banner Title', 'doctio' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'doctio' ),
				'no'  => esc_html__( 'No', 'doctio' ),
			),
			'default' => 'no',
			'desc'    => esc_html__( 'Hide banner title. You can change this settings on individual post.', 'doctio' ),
		),

		array(
			'id'       => 'show_post_default_title',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Title On Banner?', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Show post title on single post banner area.', 'doctio'),
			'default'  => true,
			'dependency' => array( 'hide_single_post_banner_title', '==', 'no' ),
		),

		array(
			'id'         => 'post_banner_title',
			'type'       => 'text',
			'title'      => esc_html__('Banner Default Title', 'doctio'),
			'desc'       => esc_html__('Default banner title for all post.', 'doctio'),
			'dependency' => array( 'show_post_default_title|hide_single_post_banner_title', '==|==', 'false|no' ),
		),

		array(
			'id'      => 'hide_single_post_breadcrumb',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Hide Post Breadcrumb', 'doctio' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'doctio' ),
				'no'  => esc_html__( 'No', 'doctio' ),
			),
			'default' => 'yes',
			'desc'    => esc_html__( 'Show / Hide Post breadcrumb. You can change this settings on individual post.', 'doctio' ),
		),

		array(
			'id'       => 'single_post_author',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Author Name', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show author name on post details page.', 'doctio'),
			'default'  => true
		),

		array(
			'id'       => 'single_post_date',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Date', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show date on post details page.', 'doctio'),
			'default'  => true
		),

		array(
			'id'       => 'single_post_cmnt',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Comments Number', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show comments number on post details page.', 'doctio'),
			'default'  => true,
		),

		array(
			'id'       => 'single_post_cat',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Categories', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show categories on post details page.', 'doctio'),
			'default'  => true
		),

		array(
			'id'       => 'single_post_tag',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Tags', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show tags on post details page.', 'doctio'),
			'default'  => true
		),

		array(
			'id'       => 'post_share',
			'type'     => 'switcher',
			'title'    => esc_html__('Post Share icons', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show social share icons on post details page.', 'doctio'),
			'default'  => true
		),

		array(
			'id'       => 'prev_next_post',
			'type'     => 'switcher',
			'title'    => esc_html__('Previous / Next Post Thumbnail', 'doctio'),
			'text_on'  => esc_html__('Yes', 'doctio'),
			'text_off' => esc_html__('No', 'doctio'),
			'desc'     => esc_html__('Hide or show previous / next Post thumbnail on post details page.', 'doctio'),
			'default'  => true
		),
	)
) );