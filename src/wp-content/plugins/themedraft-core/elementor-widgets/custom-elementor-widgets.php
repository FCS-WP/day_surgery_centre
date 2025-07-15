<?php
use Elementor\Controls_Manager; /* Only If You Use Gradient Color Control */

if (!defined('ABSPATH')) exit;

require_once ('controls/icons.php');
require_once( 'controls/elementor-section-image/elementor-section-images.php' );
require_once ('controls/gradient-color.php');

class ThemeDraft_Elementor_Scripts {

	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'themedraft_core_register_scripts' ) );
	}

	public function themedraft_core_register_scripts() {
		wp_register_script( 'counterup', plugins_url( '/', __FILE__ ) . 'assets/js/counterup.min.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'circle-progress', plugins_url( '/', __FILE__ ) . 'assets/js/circle-progress.min.js', array( 'jquery' ), '1.0', false );
	}
}

new ThemeDraft_Elementor_Scripts();

class ThemeDraft_Elementor_Custom_Widget {

	private static $instance = null;

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function themedraft_add_elementor_custom_widgets() {
		require_once('accordion-widget.php');
		require_once('brand-image-slider-widget.php');
		require_once('button-widget.php');
		require_once('circle-progress-widget.php');
		require_once('contact-details-box-widget.php');
		require_once('contact-form-7.php');
		require_once('contact-form-7-layout-two.php');
		require_once('counter-up-widget.php');
		require_once('cta-one-widget.php');
		require_once('doctio-text-widget.php');
		require_once('home-slider-widget.php');
		require_once('home-slider-two-widget.php');
		require_once('icon-box-widget.php');
		require_once('icon-box-slider-widget.php');
		require_once('image-with-caption-widget.php');
		require_once('masonry-gallery-widget.php');
		require_once('pricing-table-widget.php');
		require_once('promo-box-widget.php');
		require_once('recent-posts-widget.php');
		require_once('section-title-widget.php');
		require_once('service-box-one-widget.php');
		require_once('service-box-two-widget.php');
		require_once('service-box-three-widget.php');
		require_once('service-box-four-widget.php');
		require_once('service-minimal-widget.php');
		require_once('service-with-center-image-widget.php');
		require_once('service-details-slider.php');
		require_once('team-member-one-widget.php');
		require_once('team-member-two-widget.php');
		require_once('team-details-widget.php');
		require_once('testimonial-slider-one-widget.php');
		require_once('testimonial-slider-two-widget.php');
		require_once('testimonial-slider-three-widget.php');
		require_once('title-with-text-widget.php');
		require_once('two-image-with-circle-button-widget.php');
		require_once('three-image-with-circle-button-widget.php');
		require_once('video-popup-widget.php');
		require_once('why-choose-us-widget.php');
	}

	/* Only If You Use Gradient Color Control */
	public function themedraft_register_gradient_controls( Controls_Manager $controls_Manager ) {
		$foreground = 'ThemeDraft_Gradient_Color';

		$controls_Manager->add_group_control( $foreground::get_type(), new $foreground() );
	}
	/* Only If You Use Gradient Color Control */

	public function init() {
		add_action('elementor/widgets/register', array($this, 'themedraft_add_elementor_custom_widgets'));

		/* Only If You Use Gradient Color Control */
		add_action( 'elementor/controls/register', [ $this, 'themedraft_register_gradient_controls' ] );
	}
}

ThemeDraft_Elementor_Custom_Widget::get_instance()->init();


// Add New Category In Elementor Widget

function themedraft_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'themedraft_elements',
		[
			'title' => __( 'ThemeDraft Elements', 'themedraft-core' ),
		]
	);

}

add_action('elementor/elements/categories_registered', 'themedraft_elementor_widget_categories');