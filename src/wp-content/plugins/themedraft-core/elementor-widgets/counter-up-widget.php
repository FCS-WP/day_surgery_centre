<?php
namespace Elementor;
use ThemeDraft_Gradient_Color;
class ThemeDraft_Counter_Up_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_counter_up';
	}

	public function get_title() {
		return esc_html__( 'Counter Up', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	public function get_script_depends() {
		return ['counterup'];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'counter_up_options',
			[
				'label' => esc_html__( 'Counter Up', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_bg_text',
			[
				'label'       => __( 'Background Text', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Statistics',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'count_title',
			[
				'label'       => __( 'Count Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Counter Title',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'count_number',
			[
				'label'       => __( 'Count Number', 'themedraft-core' ),
				'label_block'       => false,
				'type'        => Controls_Manager::TEXT,
				'default'     => '100',
			]
		);

		$repeater->add_control(
			'count_unit',
			[
				'label'   => 'Counter Unit',
				'type'    => Controls_Manager::TEXT,
				'default' => '+',
			]
		);

		$repeater->add_control(
			'type',
			[
				'label'       => __( 'Icon Type', 'themedraft-core' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'icon'  => [
						'title' => __( 'Icon', 'themedraft-core' ),
						'icon'  => 'fa fa-smile',
					],
					'image' => [
						'title' => __( 'Image', 'themedraft-core' ),
						'icon'  => 'far fa-image',
					],
				],
				'default'     => 'icon',
				'toggle'      => false,
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label'       => __( 'Select Hover Icon', 'themedraft-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default'          => [
					'value'   => 'flaticon-doctor-1',
					'library' => 'themedraft-doctio',
				],
				'condition' => [
					'type' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'     => __( 'Image', 'themedraft-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'type' => 'image',
				],
			]
		);

		$this->add_control(
			'count_boxes',
			[
				'label'       => __('Count Box List', 'themedraft-core'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'count_title'        => 'Counter Title',
						'count_unit' => '+',
						'count_number' => '100',
					],
				],
				'title_field' => '{{{ count_title }}}',
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'count_box_column',
			[
				'label' => esc_html__( 'Column', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'xl_col',
			[
				'label'   => __( 'Columns On Desktop', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
				'options' => [
					'col-xl-12' => __( '1 Column', 'themedraft-core' ),
					'col-xl-6'  => __( '2 Column', 'themedraft-core' ),
					'col-xl-4'  => __( '3 Column', 'themedraft-core' ),
					'col-xl-3'  => __( '4 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'lg_col',
			[
				'label'   => __( 'Columns On iPad Pro', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
				'options' => [
					'col-lg-12' => __( '1 Column', 'themedraft-core' ),
					'col-lg-6'  => __( '2 Column', 'themedraft-core' ),
					'col-lg-4'  => __( '3 Column', 'themedraft-core' ),
					'col-lg-3'  => __( '4 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'md_col',
			[
				'label'   => __( 'Columns On iPad', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-4',
				'options' => [
					'col-md-12' => __( '1 Column', 'themedraft-core' ),
					'col-md-6'  => __( '2 Column', 'themedraft-core' ),
					'col-md-4'  => __( '3 Column', 'themedraft-core' ),
					'col-md-3'  => __( '4 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'sm_col',
			[
				'label'   => __( 'Columns On  Mobile', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-6',
				'options' => [
					'col-12' => __( '1 Column', 'themedraft-core' ),
					'col-6'  => __( '2 Column', 'themedraft-core' ),
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section_bg_text_options',
			[
				'label' => esc_html__( 'Background Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'section_bg_text!' => '',
                ],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bg_text_typo',
				'label' => esc_html__( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-section-title-bg-text',
			]
		);

		$this->add_group_control(
			Themedraft_Gradient_Color::get_type(),
			[
				'name' => 'bg_text_color_type',
				'selector' => '{{WRAPPER}} .td-section-title-bg-text',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'bg_text_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .td-section-title-bg-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'z_index',
			[
				'label' => esc_html__( 'Z-Index', 'themedraft-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => '',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'counter_up_option',
            [
                'label' => esc_html__( 'Counter Up', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_unit_color',
            [
                'label'       => esc_html__('Number & Unit Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-count-number-and-unit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'       => esc_html__('Title Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-count-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-count-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-count-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'counter_up_wrapper',
            [
                'label' => esc_html__( 'Wrapper', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'box_text_align',
			[
				'label'       => esc_html__('Box Align', 'themedraft-core'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,

				'options' => [
					'left' => [
						'title' => __('Left', 'themedraft-core'),
						'icon'  => 'eicon-text-align-left',
					],

					'center' => [
						'title' => __('Center', 'themedraft-core'),
						'icon'  => 'eicon-text-align-center',
					],

					'right' => [
						'title' => __('Right', 'themedraft-core'),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'devices' => ['desktop', 'tablet', 'mobile'],

				'selectors' => [
					'{{WRAPPER}} .td-counter-box,{{WRAPPER}} .td-section-title-bg-text' => 'text-align: {{VALUE}};',
				],

			]
		);

		$this->add_responsive_control(
			'wrapper_margin',
			[
				'label'      => esc_html__( 'Wrapper Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .counter-up-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->add_responsive_control(
            'wrapper_padding',
            [
                'label'      => esc_html__( 'Wrapper Padding', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .counter-up-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'wrapper_bg',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .counter-up-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$count_id = rand(100, 100000);
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'] . ' ' . $settings['sm_col'];
		?>
        <div class="counter-up-wrapper td-counter-box-<?php echo esc_attr($count_id);?>">
            <?php if($settings['section_bg_text']) : ?>
            <div class="td-section-title-bg-text td-secondary-font" <?php if($settings['z_index'] > 0){echo 'style="z-index:'.$settings['z_index'].';"';} ?>><?php echo $settings['section_bg_text'];?></div>
            <?php endif; ?>

            <div class="row">
                <?php if ( $settings['count_boxes'] ) {
                    foreach ( $settings['count_boxes'] as $count_box ) {
                        ?>
                        <div class="<?php echo $col;?>">
                            <div class="td-counter-box">
                                <div class="td-counter-content">
                                    <div class="td-count-icon">
                                        <?php if ( $count_box['type'] === 'image' && $count_box['image']['id'] ) : ?>
                                        <img src="<?php echo $count_box['image']['url']; ?>"
                                        alt="<?php echo get_post_meta( $count_box['image']['id'], '_wp_attachment_image_alt', true ); ?>">
                                        <?php elseif ( ! empty( $count_box['icon'] ) || ! empty( $count_box['selected_icon'] ) ) :
                                        themedraft_custom_icon_render( $count_box, 'icon', 'selected_icon' );
                                        endif; ?>
                                    </div>

                                    <div class="td-count-number-and-unit td-secondary-font">
                                        <span class="td-count-number"><?php echo esc_html( $count_box['count_number'] ) ?></span><?php echo esc_html( $count_box['count_unit'] ) ?>
                                    </div>

                                    <div class="td-count-title"><?php echo esc_html( $count_box['count_title'] ) ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>

        </div>

        <script>
            (function ($) {
                "use strict";
                /*====  Document Ready Function =====*/
                jQuery(document).ready(function($){
                    $(".td-counter-box-<?php echo esc_attr($count_id);?> .td-count-number").counterUp({
                        delay: 10,
                        time: 2000
                    });
                });
            }(jQuery));
        </script>
		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Counter_Up_Widget );