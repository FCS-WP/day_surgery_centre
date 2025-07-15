<?php
use Elementor\Repeater;
use Elementor\Core\Breakpoints\Manager;
use Elementor\Controls_Manager;

/**
 *
 * Multiple images backend controls.
 *
 */
function themedraft_section_image_controls( $widget ) {

	$widget->start_controls_section( 'td_multiple_section_images', array(
		'label' => __( 'TD Section Images', 'themedraft-core' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	) );

	$repeater = new Repeater();

	$repeater->add_responsive_control( 'image', [
		'label'     => __('Image', 'themedraft-core'),
		'type'      => Controls_Manager::MEDIA,
		'selectors' => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-image: url("{{URL}}");'
		],
	] );

	$repeater->add_responsive_control( 'position', [
		'label'     => 'Position',
		'type'      => Controls_Manager::SELECT,
		'options'   => [
			''              => __('Default', 'themedraft-core'),
			'center center' => __('Center Center', 'themedraft-core'),
			'center left'   => __('Center Left', 'themedraft-core'),
			'center right'  => __('Center Right', 'themedraft-core'),
			'top center'    => __('Top Center', 'themedraft-core'),
			'top left'      => __('Top Left', 'themedraft-core'),
			'top right'     => __('Top Right', 'themedraft-core'),
			'bottom center' => __('Bottom Center', 'themedraft-core'),
			'bottom left'   => __('Bottom Left', 'themedraft-core'),
			'bottom right'  => __('Bottom Right', 'themedraft-core'),
			'initial'       => __('Custom', 'themedraft-core'),
		],
		'selectors' => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{VALUE}};'
		],
	] );

	$repeater->add_responsive_control( 'xpos', [
		'label'          => __('X Position','themedraft-core'),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => [ 'px', 'em', '%', 'vw' ],
		'default'        => [
			'unit' => 'px',
			'size' => 0,
		],
		'tablet_default' => [
			'unit' => 'px',
			'size' => 0,
		],
		'mobile_default' => [
			'unit' => 'px',
			'size' => 0,
		],
		'range'          => [
			'px' => [
				'min' => - 2000,
				'max' => 2000,
			],
			'em' => [
				'min' => - 100,
				'max' => 100,
			],
			'%'  => [
				'min' => - 100,
				'max' => 100,
			],
			'vw' => [
				'min' => - 100,
				'max' => 100,
			],
		],
		'selectors'      => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos.SIZE}}{{ypos.UNIT}}',
		],
		'condition'      => [
			'position' => [ 'initial' ],
		],
		'required'       => true,
		'device_args'    => [
			Manager::BREAKPOINT_KEY_TABLET => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos_tablet.SIZE}}{{ypos_tablet.UNIT}}',
				],
				'condition' => [
					'position_tablet' => [ 'initial' ],
				],
			],
			Manager::BREAKPOINT_KEY_MOBILE => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos_mobile.SIZE}}{{ypos_mobile.UNIT}}',
				],
				'condition' => [
					'position_mobile' => [ 'initial' ],
				],
			],
		],
	] );

	$repeater->add_responsive_control( 'ypos', [
		'label'          => __('Y Position','themedraft-core'),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => [ 'px', 'em', '%', 'vh' ],
		'default'        => [
			'unit' => 'px',
			'size' => 0,
		],
		'tablet_default' => [
			'unit' => 'px',
			'size' => 0,
		],
		'mobile_default' => [
			'unit' => 'px',
			'size' => 0,
		],
		'range'          => [
			'px' => [
				'min' => - 800,
				'max' => 800,
			],
			'em' => [
				'min' => - 100,
				'max' => 100,
			],
			'%'  => [
				'min' => - 100,
				'max' => 100,
			],
			'vh' => [
				'min' => - 100,
				'max' => 100,
			],
		],
		'selectors'      => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos.SIZE}}{{xpos.UNIT}} {{SIZE}}{{UNIT}}',
		],
		'condition'      => [
			'position' => [ 'initial' ],
		],
		'required'       => true,
		'device_args'    => [
			Manager::BREAKPOINT_KEY_TABLET => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos_tablet.SIZE}}{{xpos_tablet.UNIT}} {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'position_tablet' => [ 'initial' ],
				],
			],
			Manager::BREAKPOINT_KEY_MOBILE => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos_mobile.SIZE}}{{xpos_mobile.UNIT}} {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'position_mobile' => [ 'initial' ],
				],
			],
		],
	] );


	/*$repeater->add_control( 'attachment', [
		'label'     => 'Attachment',
		'type'      => Controls_Manager::SELECT,
		'options'   => [
			''       => _x( 'Default', 'Background Control', 'themedraft-core' ),
			'scroll' => _x( 'Scroll', 'Background Control', 'themedraft-core' ),
			'fixed'  => _x( 'Fixed', 'Background Control', 'themedraft-core' ),
		],
		'selectors' => [
			'(desktop+){{WRAPPER}} {{CURRENT_ITEM}}' => 'background-attachment: {{VALUE}};',
		],
	] );

	$repeater->add_responsive_control( 'repeat', [
		'label'     => 'Repeat',
		'type'      => Controls_Manager::SELECT,
		'options'   => [
			''          => __('Default','themedraft-core'),
			'no-repeat' => __('No-repeat','themedraft-core'),
			'repeat'    => __('Repeat','themedraft-core'),
			'repeat-x'  => __('Repeat-x','themedraft-core'),
			'repeat-y'  => __('Repeat-y','themedraft-core'),
		],
		'default' => 'no-repeat',
		'selectors' => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-repeat: {{VALUE}};',
		],
	] );*/

	$repeater->add_responsive_control( 'size', [
		'label'     => 'Size',
		'type'      => Controls_Manager::SELECT,
		'default'   => '',
		'options'   => [
			''        => __('Default','themedraft-core'),
			'auto'    => __('Auto','themedraft-core'),
			'cover'   => __('Cover','themedraft-core'),
			'contain' => __('Contain','themedraft-core'),
			'initial' => __('Custom','themedraft-core'),
		],
		'selectors' => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{VALUE}};',
		],
	] );

	$repeater->add_responsive_control( 'bg_width', [
		'label'       => __('Width','themedraft-core'),
		'type'        => Controls_Manager::SLIDER,
		'size_units'  => [ 'px', 'em', '%', 'vw' ],
		'range'       => [
			'px' => [
				'min' => 0,
				'max' => 1000,
			],
			'%'  => [
				'min' => 0,
				'max' => 100,
			],
			'vw' => [
				'min' => 0,
				'max' => 100,
			],
		],
		'default'     => [
			'size' => 100,
			'unit' => '%',
		],
		'required'    => true,
		'selectors'   => [
			'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',

		],
		'condition'   => [
			'size' => [ 'initial' ],
		],
		'device_args' => [
			Manager::BREAKPOINT_KEY_TABLET => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',
				],
				'condition' => [
					'size_tablet' => [ 'initial' ],
				],
			],
			Manager::BREAKPOINT_KEY_MOBILE => [
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',
				],
				'condition' => [
					'size_mobile' => [ 'initial' ],
				],
			],
		],
	] );

	$widget->add_control( 'td_section_images', [
		'label'         => __('Images','themedraft-core'),
		'type'          => Controls_Manager::REPEATER,
		'fields'        => $repeater->get_controls(),
		'render_type'   => 'template',
		'prevent_empty' => false,
	] );

	$widget->end_controls_section();

}

add_action( 'elementor/element/section/section_typo/after_section_end', 'themedraft_section_image_controls', 100 );

/**
 *
 * Multiple background frontend render
 *
 */
function themedraft_before_render_section_images( $widget ) {

	$settings = $widget->get_settings_for_display();

	if ( ! empty( $settings['td_section_images'] ) ) {

		$widget->add_render_attribute( '_wrapper', 'data-td-section-image', 'yes' );

		foreach ( $settings['td_section_images'] as $index => $item ) {
			echo '<div class="td-section-image td-section-image-' . $widget->get_id() . ' elementor-repeater-item-' . esc_attr( $item['_id'] ) . '"></div>';
		}

	}

}

add_action( 'elementor/frontend/section/before_render', 'themedraft_before_render_section_images' );

/**
 *
 * Section Image frontend js
 *
 */
function themedraft_frontend_enqueue_scripts() {
	wp_enqueue_script( 'td-frontend', plugins_url( 'frontend.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
}

add_action( 'elementor/frontend/after_enqueue_scripts', 'themedraft_frontend_enqueue_scripts' );