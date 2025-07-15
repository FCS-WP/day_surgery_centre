<?php
namespace Elementor;

class ThemeDraft_Button_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_button_widget';
	}

	public function get_title() {
		return esc_html__( 'Button', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-call-to-action';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_one_option',
			[
				'label' => esc_html__( 'Button One', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_one_text',
			[
				'label'       => __( 'Text', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Click Here'
			]
		);

		$this->add_control(
			'btn_one_url',
			[
				'label'         => __( 'URL', 'themedraft-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'themedraft-core' ),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_one_style_options',
			[
				'label' => esc_html__( 'Button One', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('td_btn_one_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
			'td_btn_one_style_default',
			[
				'label' => esc_html__('Normal', 'themedraft-core'),
			]
		);

		$this->add_control(
			'btn_one_default_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-one' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_one_default_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-one' => 'color: {{VALUE}};',
					'{{WRAPPER}} .themedraft-button.themedraft-button-one i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();//Default style tab end

		//Hover style tab start
		$this->start_controls_tab(
			'td_btn_one_style_hover',
			[
				'label' => esc_html__('Hover', 'themedraft-core'),
			]
		);

		$this->add_control(
			'btn_one_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-one:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_one_hover_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.themedraft-button.themedraft-button-one:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} a.themedraft-button.themedraft-button-one:hover i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();//Hover style tab end
		$this->end_controls_section();


		// Button two

		$this->start_controls_section(
			'button_two_option',
			[
				'label' => esc_html__( 'Button Two', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'btn_two_type',
            [
                'label'   => __( 'Button Type', 'themedraft-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => __( 'Normal', 'themedraft-core' ),
                    'td-call-button' => __( 'Call Button', 'themedraft-core' ),
                ],
            ]
        );

		$this->add_control(
			'btn_two_text',
			[
				'label'       => __( 'Text', 'themedraft-core' ),
				'default' => 'Click Here',
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'btn_two_url',
			[
				'label'         => __( 'URL', 'themedraft-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'themedraft-core' ),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_two_style_options',
			[
				'label' => esc_html__( 'Button Two', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_two_text!' => '',
				],
			]
		);

		$this->start_controls_tabs('td_btn_two_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
			'td_btn_two_style_default',
			[
				'label' => esc_html__('Normal', 'themedraft-core'),
			]
		);

		$this->add_control(
			'btn_two_default_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-two' => 'background-color: {{VALUE}};border-color:{{VALUE}}',
				],
                'condition' => [
                    'btn_two_type' => 'normal',
                ],
			]
		);

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-call-button i' => 'color: {{VALUE}};',
                ],
                'condition' => [
	                'btn_two_type' => 'td-call-button',
                ],
            ]
        );

		$this->add_control(
			'btn_two_default_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.themedraft-button.themedraft-button-two,{{WRAPPER}} .td-call-button' => 'color: {{VALUE}};',
					'{{WRAPPER}} a.themedraft-button.themedraft-button-two i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();//Default style tab end

		//Hover style tab start
		$this->start_controls_tab(
			'td_btn_two_style_hover',
			[
				'label' => esc_html__('Hover', 'themedraft-core'),
			]
		);

		$this->add_control(
			'btn_two_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-two:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],
				'condition' => [
					'btn_two_type' => 'normal',
				],
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label'       => esc_html__('Icon Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-call-button:hover i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_two_type' => 'td-call-button',
				],
			]
		);

		$this->add_control(
			'btn_two_hover_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.themedraft-button.themedraft-button-two:hover,{{WRAPPER}} .td-call-button:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} a.themedraft-button.themedraft-button-two:hover i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();//Hover style tab end

		$this->add_responsive_control(
			'btn_two_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors'  => [
					'{{WRAPPER}} .themedraft-button.themedraft-button-two' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .td-call-button' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Wrapper
		$this->start_controls_section(
			'wrapper_options',
			[
				'label' => esc_html__( 'Wrapper', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label'       => esc_html__('Alignment', 'themedraft-core'),
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
					'{{WRAPPER}} .themedraft-button-wrapper' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .themedraft-button-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();

		$btn_one_text = $settings['btn_one_text'];
		$btn_one_url   = $settings['btn_one_url']['url'];
		$btn_one_target   = $settings['btn_one_url']['is_external'] ? ' target="_blank"' : '';
		$btn_one_nofollow = $settings['btn_one_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>

		<div class="themedraft-button-wrapper td-button-el-widget">
			<a href="<?php echo esc_url($btn_one_url);?>" class="themedraft-button td-button themedraft-button-one" <?php echo $btn_one_target . $btn_one_nofollow?>><?php echo esc_html($btn_one_text);?>
                <i class="fas fa-plus"></i>
            </a>

			<?php if($settings['btn_two_text']) :
				$btn_two_text = $settings['btn_two_text'];
				$btn_two_url   = $settings['btn_two_url']['url'];
				$btn_two_target   = $settings['btn_two_url']['is_external'] ? ' target="_blank"' : '';
				$btn_two_nofollow = $settings['btn_two_url']['nofollow'] ? ' rel="nofollow"' : '';
				?>

                <?php if($settings['btn_two_type'] == 'normal') : ?>
				<a href="<?php echo esc_url($btn_two_url);?>" class="themedraft-button td-button themedraft-button-two" <?php echo $btn_two_target . $btn_two_nofollow?>><?php echo esc_html($btn_two_text);?>
                    <i class="fas fa-plus"></i>
                </a>
                <?php else: ?>

                <a class="td-call-button" href="<?php echo esc_url($btn_two_url);?>">
                    <i class="flaticon-phone-call"></i>
                    <span class="td-call-button-text"><?php echo esc_html($btn_two_text);?></span>
                </a>
                <?php endif; ?>
			<?php endif; ?>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Button_Widget );