<?php

namespace Elementor;
use ThemeDraft_Gradient_Color;
class ThemeDraft_Section_Title_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_section_title';
	}

	public function get_title() {
		return esc_html__( 'Section Title', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'section_title_options',
			[
				'label' => esc_html__( 'Section Title', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_bg_text',
			[
				'label'       => __( 'Background Text', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Services',
			]
		);

        $this->add_control(
            'subtitle',
            [
                'label'       => __( 'Subtitle', 'themedraft-core' ),
                'label_block'       => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Our Services',
            ]
        );

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => '<h2>Service we provide</h2>',
				'label_block' => true,
				'description' => __( 'Use H1 - H6 for title.', 'themedraft-core' ),
			]
		);

		$this->add_control(
			'bottom_line_image',
			[
				'label'       => __( 'Bottom Line Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => THEMEDRAFT_CORE_ASSETS . 'images/line.png',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'title_bg_text_options',
			[
				'label' => esc_html__( 'Background Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,

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

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label'     => esc_html__( 'Subtitle', 'themedraft-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'label'    => esc_html__( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-section-subtitle',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Color', 'themedraft-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-section-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .td-section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label'     => esc_html__( 'Title', 'themedraft-core' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-section-title h1, {{WRAPPER}} .td-section-title h2, {{WRAPPER}} .td-section-title h3, {{WRAPPER}} .td-section-title h4, {{WRAPPER}} .td-section-title h5, {{WRAPPER}} .td-section-title h6',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'themedraft-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-section-title h1, {{WRAPPER}} .td-section-title h2, {{WRAPPER}} .td-section-title h3, {{WRAPPER}} .td-section-title h4, {{WRAPPER}} .td-section-title h5, {{WRAPPER}} .td-section-title h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} {{WRAPPER}} .td-section-title h1, {{WRAPPER}} .td-section-title h2, {{WRAPPER}} .td-section-title h3, {{WRAPPER}} .td-section-title h4, {{WRAPPER}} .td-section-title h5, {{WRAPPER}} .td-section-title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wrapper_style',
			[
				'label' => esc_html__( 'Wrapper', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_width',
			[
				'label'      => esc_html__( 'Width (%)', 'themedraft-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices'    => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'  => [
					'{{WRAPPER}} .td-section-title-content' => 'width: {{SIZE}}%;',
				],
			]
		);

		$this->add_responsive_control(
			'wrapper_text_align',
			[
				'label'       => esc_html__( 'Text Align', 'themedraft-core' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,

				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'themedraft-core' ),
						'icon'  => 'eicon-text-align-left',
					],

					'center' => [
						'title' => esc_html__( 'Center', 'themedraft-core' ),
						'icon'  => 'eicon-text-align-center',
					],

					'right' => [
						'title' => esc_html__( 'Right', 'themedraft-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],

				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .td-section-title-wrapper' => 'text-align: {{VALUE}};',
				],

			]
		);

		$this->add_responsive_control(
			'wrapper_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .td-section-title-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();

		$allowed_html = array(
			'h1'   => array(),
			'h2'   => array(),
			'h3'   => array(),
			'h4'   => array(),
			'h5'   => array(),
			'h6'   => array(),
			'span' => array( 'style' => array(), ),
		);
		$bg_text       = $settings['title_bg_text'];
		$subtitle       = $settings['subtitle'];
		$title       = $settings['title'];

		?>

		<div class="td-section-title-wrapper">
            <div class="td-section-title-content td-secondary-font">
                <?php if ( $bg_text ) : ?>
                    <div class="td-section-title-bg-text">
                        <?php echo $bg_text; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $subtitle ) : ?>
                    <div class="td-section-subtitle td-primary-color">
                        <?php echo $subtitle; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $title ) : ?>
                    <div class="td-section-title">
                        <?php echo wp_kses( $title, $allowed_html ); ?>
                    </div>
                    <?php if($settings['bottom_line_image']['url']) : ?>
                    <div class="title-bottom-line" style="background-image: url(<?php echo $settings['bottom_line_image']['url'];?>)"></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Section_Title_Widget );