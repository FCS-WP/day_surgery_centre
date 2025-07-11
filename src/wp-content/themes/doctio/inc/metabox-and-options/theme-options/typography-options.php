<?php
// Create typography section
CSF::createSection( $doctio_theme_option, array(
	'title'  => esc_html__( 'Typography', 'doctio' ),
	'id'     => 'typography_options',
	'icon'   => 'fa fa-text-width',
	'fields' => array(

		array(
			'id'             => 'body_typo',
			'type'           => 'typography',
			'title'          => esc_html__( 'Body Font', 'doctio' ),
			'desc'           => esc_html__( 'Select body typography.', 'doctio' ),
			'output'         => 'body',
			'text_align'     => false,
			'text_transform' => false,
			'color'          => false,
			'extra_styles'   => true,
			'default'        => array(
				'font-family'  => 'Rubik',
				'type'         => 'google',
				'unit'         => 'px',
				'font-weight'  => '400',
				'extra-styles' => array( '500','600','700'),
			),

		),

		array(
			'id'             => 'heading_typo',
			'type'           => 'typography',
			'title'          => esc_html__( 'Heading Font', 'doctio' ),
			'desc'           => esc_html__( 'Select heading typography.', 'doctio' ),
			'output'         => 'h1,h2,h3,h4,h5,h6,.td-secondary-font, .widget.widget_rss ul li a, blockquote cite,
.woocommerce ul.cart_list li a:not(.remove), .woocommerce ul.product_list_widget li a:not(.remove),
.woocommerce .widget_shopping_cart .total strong, .woocommerce.widget_shopping_cart .total strong,
.comment-reply-title, .woocommerce-review__author',
			'text_align'     => false,
			'text_transform' => false,
			'color'          => false,
			'extra_styles'   => true,
			'default'        => array(
				'font-family'  => 'Poppins',
				'type'         => 'google',
				'unit'         => 'px',
				'font-weight'  => '700',
				'extra-styles' => array( '500','600' ),
			),
		),
	),
) );