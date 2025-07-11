<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

function doctio_inline_style() {

	wp_enqueue_style('doctio-inline-style', get_theme_file_uri('assets/css/inline-style.css'), array(), DOCTIO_VERSION, 'all');

	$doctio_inline_css = '
        .elementor-inner {margin-left: -10px;margin-right: -10px;}.elementor-inner .elementor-section-wrap > section:first-of-type .elementor-editor-element-settings {display: block !important;}.elementor-inner .elementor-section-wrap > section:first-of-type .elementor-editor-element-settings li {display: inline-block !important;}.elementor-editor-active .elementor-editor-element-setting{height: 25px;line-height: 25px;text-align: center;}.elementor-section.elementor-section-boxed>.elementor-container {max-width: 1320px !important;}.elementor-section-stretched.elementor-section-boxed .elementor-row{padding-left: 5px;padding-right: 5px;}.elementor-section-stretched.elementor-section-boxed .elementor-container.elementor-column-gap-extended {margin-left: auto;margin-right: auto;}.elementor-section-wrap > section:first-of-type .elementor-editor-element-settings {
    display: inline-flex !important;}  
    ';

	$logo_image_size = doctio_option('logo_image_size');
	if(!empty($logo_image_size['width'])){
		$doctio_inline_css .='
			.site-branding img {
			    max-width: inherit;
			}
		';
	}

	$custom_css = doctio_option('doctio_custom_css');

	$doctio_inline_css .= ''.$custom_css.'';

	wp_add_inline_style('doctio-inline-style', $doctio_inline_css);
}

add_action('wp_enqueue_scripts', 'doctio_inline_style');