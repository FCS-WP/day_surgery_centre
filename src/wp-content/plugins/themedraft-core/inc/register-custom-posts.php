<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function themedraft_register_custom_posts() {
	// service
	if(function_exists('doctio_option')){
		$service_slug = doctio_option('service_url_slug');
	}else{
		$service_slug = 'service';
	}

	register_post_type( 'doctio_service',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Services', 'themedraft-core' ),
				'singular_name'         => esc_html__( 'Service', 'themedraft-core' ),
				'add_new_item'          => esc_html__( 'Add New Service', 'themedraft-core' ),
				'all_items'             => esc_html__( 'All Services', 'themedraft-core' ),
				'add_new'               => esc_html__( 'Add New', 'themedraft-core' ),
				'edit_item'             => esc_html__( 'Edit Service', 'themedraft-core' ),
				'featured_image'        => esc_html__( 'Service Image', 'themedraft-core' ),
				'set_featured_image'    => esc_html__( 'Set Service Image', 'themedraft-core' ),
				'remove_featured_image' => esc_html__( 'Remove Service Image', 'themedraft-core' ),
				'use_featured_image'    => esc_html__( 'Use as services image', 'themedraft-core' ),
			),
			'rewrite'      => array(
				'slug'       => $service_slug,
				'with_front' => true,
			),
			'hierarchical' => true,
			'public'       => true,
			'menu_icon'    => 'dashicons-schedule',
			'show_in_rest'    => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'doctio_service_cat',
		'doctio_service',
		array(
			'hierarchical'      => true,
			'label'             => esc_html__( 'Service Categories', 'themedraft-core' ),
			'query_var'         => true,
			'show_admin_column' => true,
			'show_in_rest'    => true,
			'rewrite'           => array(
				'slug'       => ''.$service_slug.'-category',
				'with_front' => true,
			)
		)
	);

	register_taxonomy(
		'doctio_service_tag',
		'doctio_service',
		array(
			'hierarchical'      => false,
			'label'             => esc_html__( 'Service Tags', 'themedraft-core' ),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'    => true,
			'rewrite'           => array(
				'slug'       => ''.$service_slug.'-tag',
				'with_front' => true,
			),
		)
	);


	//Team Members
	if(function_exists('doctio_option')){
		$team_slug = doctio_option('team_url_slug');
	}else{
		$team_slug = 'team';
	}

	register_post_type('doctio_team',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Team Members', 'themedraft-core'),
				'singular_name'         => esc_html__('Team Member', 'themedraft-core'),
				'add_new_item'          => esc_html__('Add New Member', 'themedraft-core'),
				'all_items'             => esc_html__('All Members', 'themedraft-core'),
				'add_new'               => esc_html__('Add New', 'themedraft-core'),
				'edit_item'             => esc_html__('Edit Member', 'themedraft-core'),
				'featured_image'        => esc_html__('Member Image', 'themedraft-core'),
				'set_featured_image'    => esc_html__('Set member image', 'themedraft-core'),
				'remove_featured_image' => esc_html__('Remove member image', 'themedraft-core'),
				'use_featured_image'    => esc_html__('Use as member image', 'themedraft-core'),
			),
			'rewrite'      => array(
				'slug'       => $team_slug,
				'with_front' => true,
			),
			'hierarchical' => true,
			'public'       => true,
			'menu_icon'    => 'dashicons-businessman',
			'show_in_rest'    => true,
			'supports'     => array('title', 'editor', 'thumbnail', 'page-attributes'),
		)
	);

	register_taxonomy(
		'doctio_team_cat',
		'doctio_team',
		array(
			'hierarchical'      => true,
			'label'             => esc_html__('Team Categories', 'themedraft-core'),
			'query_var'         => true,
			'show_admin_column' => true,
			'show_in_rest'    => true,
			'rewrite'           => array(
				'slug'       => ''.$team_slug.'-category',
				'with_front' => true,
			)
		)
	);

	register_taxonomy(
		'doctio_team_tag',
		'doctio_team',
		array(
			'hierarchical'          => false,
			'label'                 => esc_html__( 'Team Tags', 'themedraft-core' ),
			'show_ui'               => true,
			'show_admin_column'          => true,
			'query_var'             => true,
			'show_in_rest'    => true,
			'rewrite'               => array(
				'slug'       => ''.$team_slug.'-tag',
				'with_front' => true,
			),
		)
	);
}

add_action( 'init', 'themedraft_register_custom_posts' );