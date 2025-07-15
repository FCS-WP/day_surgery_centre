<?php
/*
Plugin Name: ThemeDraft Core
Author: ThemeDraft
Author URI: https://themedraft.net/
Version: 1.0.8
Description: This plugin is required for Doctio WordPress theme
Text Domain: themedraft-core
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'THEMEDRAFT_CORE_VERSION', '1.0.8' );

define( 'THEMEDRAFT_CORE', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) .'/');

define( 'THEMEDRAFT_CORE_ASSETS', trailingslashit( THEMEDRAFT_CORE . 'elementor-widgets/assets' ) );
/*
 * Translate direction
 */
add_action( 'init', function () {
	load_plugin_textdomain( 'themedraft-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
} );


/*
 * ThemeDraft core functions
 */
require_once('inc/themedraft-core-functions.php' );

/*
 *  Add CSF
 */

require_once('inc/library/codestar-framework/codestar-framework.php' );

/*
 * Register Custom Widget
 */
if (class_exists( 'CSF' )){
	require_once('inc/widgets/custom-wp-widgets.php' );
}

//Register Custom Elementor Widget
if(defined( 'ELEMENTOR_PATH' )){
	define( 'THEMEDRAFT_CORE_ELEMENTOR_ASSETS', trailingslashit( THEMEDRAFT_CORE . 'elementor-widgets/assets' ) );
	require_once('elementor-widgets/custom-elementor-widgets.php' );
}

//Register Custom Posts
require_once('inc/register-custom-posts.php' );
