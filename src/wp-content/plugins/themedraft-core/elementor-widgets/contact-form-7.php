<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class ThemeDraft_ContactForm7_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_contact_form_seven';
	}

	public function get_title() {
		return __( 'Contact Form7', 'themedraft-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}
	public function get_categories() {
		return array( 'themedraft_elements' );
	}

	protected function register_controls() {


		$this->start_controls_section(
			'contact_form_accordion',
			[
				'label' => __( 'Contact Form', 'themedraft-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'form_subtitle',
			[
				'label'       => __( 'Subtitle', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Make An',
			]
		);

		$this->add_control(
			'form_title',
			[
				'label'       => esc_html__( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => '<h2>Appointment</h2>',
				'label_block' => true,
				'description' => __( 'Use H1 - H6 for title.', 'themedraft-core' ),
			]
		);

		$this->add_control(
			'wpcf7_form_list',
			[
				'label' => __( 'Select Contact Form', 'themedraft-core' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'options' => $this->themedraft_contact_form(),
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

        $this->add_control(
            'wrapper_bg_color',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-contact-form-container' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .td-cf7-contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .td-contact-form-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'themedraft_contact_field_style',
			[
				'label' => __( 'Field Style', 'themedraft-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'field_bg_color',
			[
				'label'       => esc_html__('Field Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .themedraft-contact-form-container select' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container textarea' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'field_border_color',
			[
				'label'       => esc_html__('Field Border Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .themedraft-contact-form-container select' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container textarea' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'field_border_color_on_focus',
			[
				'label'       => esc_html__('Field Border Color On Focus', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .themedraft-contact-form-container select:focus' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input:focus' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container textarea:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'field_text_color',
			[
				'label'       => esc_html__('Field Text Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .themedraft-contact-form-container ::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container :-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container select' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container textarea' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container .select-arrow:before' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'textarea_height',
			[
				'label' => __( 'Textarea Height', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container textarea' => 'height: {{SIZE}}px;',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'themedraft_contact_submit_style',
			[
				'label' => __( 'Submit Button', 'themedraft-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Normal & hover option start
		$this->start_controls_tabs('td_btn_styles');

		//Normal style start
		$this->start_controls_tab(
			'btn_normal_style',
			[
				'label' => esc_html__('Normal', 'themedraft-core'),
			]
		);

		$this->add_control(
			'normal_txt_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"] i:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"] i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'normal_border_color',
			[
				'label'     => esc_html__('Border Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'normal_bg_color',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		//Normal style end

		//Hover style start
		$this->start_controls_tab(
			'btn_hover_style',
			[
				'label' => esc_html__('Hover', 'themedraft-core'),
			]
		);

		$this->add_control(
			'hover_txt_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]:hover i:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]:hover i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label'     => esc_html__('Border Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]:hover' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hover_bg_color',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-contact-form-container input[type="submit"]:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-contact-form-container button[type="submit"]:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		//Hover style end
		$this->end_controls_tabs();
		//Normal & hover option end

		$this->end_controls_section();

	}

	protected function themedraft_contact_form( ) {

		if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
			return array();
		}

		$forms = \WPCF7_ContactForm::find( array(
			'orderby' => 'title',
			'order'   => 'ASC',
		) );

		if ( empty( $forms ) ) {
			return array();
		}

		$result = array();

		foreach ( $forms as $item ) {
			$key            = sprintf( '%1$s::%2$s', $item->id(), $item->title() );
			$result[ $key ] = $item->title();
		}

		return $result;
	}


	protected function render()  {
		$settings = $this->get_settings();
		$subtitle       = $settings['form_subtitle'];
		$title       = $settings['form_title'];
		?>
            <div class="td-cf7-contact-form td-secondary-font">
                <div class="td-contact-form-container">
                    <div class="form-icon"><i class="flaticon-nurse"></i></div>
                    <div class="td-form-subtitle-title">
                        <div class="td-form-subtitle"><?php echo $subtitle;?></div>
                        <div class="td-form-title"><?php echo $title;?></div>
                    </div>
                    <?php if ( ! empty( $settings['wpcf7_form_list'] ) ) {?>
                    <div class="themedraft-contact-form-container">
                        <?php echo do_shortcode( '[contact-form-7 id="' . $settings['wpcf7_form_list'] . '" ]' );?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_ContactForm7_Widget );