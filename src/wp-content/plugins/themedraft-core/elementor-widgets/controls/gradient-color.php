<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

class ThemeDraft_Gradient_Color extends Group_Control_Base {

	protected static $fields;

	public static function get_type() {
		return 'foreground';
	}

	public function init_fields() {
		$fields = [];

		$fields['color_type'] = [
			'label'       => __( 'Color Type', 'themedraft-core' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => false,
			'render_type' => 'ui',
			'options'     => [
				'classic'  => [
					'title' => __( 'Classic', 'themedraft-core' ),
					'icon'  => 'eicon-paint-brush',
				],
				'gradient' => [
					'title' => __( 'Gradient', 'themedraft-core' ),
					'icon'  => 'eicon-barcode',
				],
			],
			'default'     => 'gradient'
		];

		$fields['color'] = [
			'label'     => __( 'Color', 'themedraft-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#dddddd',
			'title'     => __( 'Text Color', 'themedraft-core' ),
			'selectors' => [
				'{{SELECTOR}}' => 'color: {{VALUE}}; fill: {{VALUE}};',
			],
			'condition' => [
				'color_type' => [ 'classic', 'gradient' ],
			],
		];

		$fields['color_stop'] = [
			'label'       => __( 'Location', 'themedraft-core' ),
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => [ '%' ],
			'default'     => [
				'unit' => '%',
				'size' => 0,
			],
			'render_type' => 'ui',
			'condition'   => [
				'color_type' => [ 'gradient' ],
			],
			'of_type'     => 'gradient',
		];

		$fields['color_b'] = [
			'label'       => __( 'Second Color', 'themedraft-core' ),
			'type'        => Controls_Manager::COLOR,
			'default'     => '#ffffff',
			'render_type' => 'ui',
			'condition'   => [
				'color_type' => [ 'gradient' ],
			],
			'of_type'     => 'gradient',
		];

		$fields['color_b_stop'] = [
			'label'       => __( 'Location', 'themedraft-core' ),
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => [ '%' ],
			'default'     => [
				'unit' => '%',
				'size' => 75, //100 default
			],
			'render_type' => 'ui',
			'condition'   => [
				'color_type' => [ 'gradient' ],
			],
			'of_type'     => 'gradient',
		];

		$fields['gradient_type'] = [
			'label'       => __( 'Type', 'themedraft-core' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => [
				'linear' => __( 'Linear', 'themedraft-core' ),
				'radial' => __( 'Radial', 'themedraft-core' ),
			],
			'default'     => 'linear',
			'render_type' => 'ui',
			'condition'   => [
				'color_type' => [ 'gradient' ],
			],
			'of_type'     => 'gradient',
		];

		$fields['gradient_angle'] = [
			'label'      => __( 'Angle', 'themedraft-core' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'deg' ],
			'default'    => [
				'unit' => 'deg',
				'size' => 180, //90 default
			],
			'range'      => [
				'deg' => [
					'step' => 10,
				],
			],
			'selectors'  => [
				'{{SELECTOR}}' => '-webkit-background-clip: text; -webkit-text-fill-color: transparent; background-color: transparent; background-image: linear-gradient({{SIZE}}{{UNIT}}, {{color.VALUE}} {{color_stop.SIZE}}{{color_stop.UNIT}}, {{color_b.VALUE}} {{color_b_stop.SIZE}}{{color_b_stop.UNIT}})',
			],
			'condition'  => [
				'color_type'    => [ 'gradient' ],
				'gradient_type' => 'linear',
			],
			'of_type'    => 'gradient',
		];

		$fields['gradient_position'] = [
			'label'     => __( 'Position', 'themedraft-core' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => [
				'center center' => __( 'Center Center', 'themedraft-core' ),
				'center left'   => __( 'Center Left', 'themedraft-core' ),
				'center right'  => __( 'Center Right', 'themedraft-core' ),
				'top center'    => __( 'Top Center', 'themedraft-core' ),
				'top left'      => __( 'Top Left', 'themedraft-core' ),
				'top right'     => __( 'Top Right', 'themedraft-core' ),
				'bottom center' => __( 'Bottom Center', 'themedraft-core' ),
				'bottom left'   => __( 'Bottom Left', 'themedraft-core' ),
				'bottom right'  => __( 'Bottom Right', 'themedraft-core' ),
			],
			'default'   => 'center center',
			'selectors' => [
				'{{SELECTOR}}' => '-webkit-background-clip: text; -webkit-text-fill-color: transparent; background-color: transparent; background-image: radial-gradient(at {{VALUE}}, {{color.VALUE}} {{color_stop.SIZE}}{{color_stop.UNIT}}, {{color_b.VALUE}} {{color_b_stop.SIZE}}{{color_b_stop.UNIT}})',
			],
			'condition' => [
				'color_type'    => [ 'gradient' ],
				'gradient_type' => 'radial',
			],
			'of_type'   => 'gradient',
		];

		return $fields;
	}

	protected function get_child_default_args() {
		return [
			'types' => [ 'classic', 'gradient' ],
		];
	}

	protected function filter_fields() {
		$fields = parent::filter_fields();

		$args = $this->get_args();

		foreach ( $fields as $field ) {
			if ( isset( $field['of_type'] ) && ! in_array( $field['of_type'], $args['types'] ) ) {
				unset( $field );
			}
		}

		return $fields;
	}

	protected function get_default_options() {
		return [
			'popover' => false,
		];
	}
}