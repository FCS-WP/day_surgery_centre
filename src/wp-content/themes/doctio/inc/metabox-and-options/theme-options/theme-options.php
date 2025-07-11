<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

// Remove CSF welcome page
add_filter( 'csf_welcome_page', '__return_false' );

/*
 *  Create theme options
 */

$doctio_theme_option = 'doctio_theme_options';

CSF::createOptions($doctio_theme_option, array(
	'framework_title' => wp_kses(
		sprintf(__("Doctio Options <small>V %s</small>", 'doctio'), $doctio_theme_data->get('Version')),
		array('small' => array())
	),
	'menu_title'      => esc_html__('Theme Options', 'doctio'),
	'menu_slug'       => 'doctio-options',
	'menu_type'       => 'submenu',
	'menu_parent'     => 'doctio',
	'class'           => 'doctio-theme-option-wrapper',
	'footer_credit'      => wp_kses(
		__( 'Developed by: <a target="_blank" href="https://themedraft.net">ThemeDraft</a>', 'doctio' ),
		array(
			'a'      => array(
				'href'   => array(),
				'target' => array()
			),
		)
	),
	'async_webfont' => false,
	'defaults'        => doctio_default_theme_options(),
));

/*
 * General options
 */
require_once 'general-options.php';

/*
 * Typography options
 */
require_once 'typography-options.php';

/*
 * Header options
 */
require_once 'header-options.php';

/*
 * Banner options
 */
require_once 'banner-options.php';


/*
 * Page options
 */
require_once 'page-options.php';

/*
 * blog Page options
 */
require_once 'blog-page-options.php';

/*
 * Post options
 */
require_once 'single-post-options.php';


/*
 * Service options
 */
require_once 'service-options.php';

/*
 * Team options
 */
require_once 'team-options.php';

/*
 * WooCommerce Options
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once 'woocommerce-options/woocommerce-options.php';
}

/*
 * Search Page options
 */
require_once 'search-page-options.php';

/*
 * Error 404 Page options
 */
require_once 'error-page-options.php';

/*
 * Footer options
 */
require_once 'footer-options.php';



// Custom Css section
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Custom Css', 'doctio' ),
	'id'     => 'custom_css_options',
	'icon'   => 'fa fa-css3',
	'fields' => array(

		array(
			'id'       => 'doctio_custom_css',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'Custom Css', 'doctio' ),
			'settings' => array(
				'theme'  => 'mbo',
				'mode'   => 'css',
			),
			'sanitize' => false,
		),
	)
) );


/*
 * Backup options
 */
CSF::createSection($doctio_theme_option, array(
	'title'  => esc_html__('Backup', 'doctio'),
	'id'     => 'backup_options',
	'icon'   => 'fa fa-window-restore',
	'fields' => array(
		array(
			'type' => 'backup',
		),
	)
));