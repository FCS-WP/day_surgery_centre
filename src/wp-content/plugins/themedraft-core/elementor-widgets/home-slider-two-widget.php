<?php
namespace Elementor;
use ThemeDraft_Gradient_Color;
class ThemeDraft_Home_Slider_Two_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_home_slider_two';
	}

	public function get_title() {
		return esc_html__( 'Home Slider Two', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		//Content tab start
		$this->start_controls_section(
			'slider_content',
			[
				'label' => esc_html__( 'Add Slides', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
		    'bg_text',
		    [
		        'label'       => __( 'Background Text', 'themedraft-core' ),
		        'label_block'       => true,
		        'type'        => Controls_Manager::TEXT,
		        'default'     => 'Medical'
		    ]
		);

		$repeater->add_control(
            'slide_subtitle',
            [
                'label'       => __( 'Subtitle', 'themedraft-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => 'Welcome to dental Care',
            ]
        );

		$repeater->add_control(
			'slide_title',
			[
				'label' => esc_html__( 'Title', 'themedraft-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => '<h2>Medical & Dental Care Solutions.</h2>',
				'description' => __( 'Use Heading ( H1 - H6 ) for title text.' , 'themedraft-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_content_text',
			[
				'label' => esc_html__( 'Description Text', 'themedraft-core' ),
				'label_block' => true,
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'We’ve 25 Years of experience in Medical Services',
			]
		);

		$repeater->add_control(
			'slide_image',
			[
				'label' => __( 'Slide Image', 'themedraft-core' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'btn1_text',
			[
				'label' => __( 'Button One Text', 'themedraft-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'label_block' => true,
				'default' => 'Our Services',
				'placeholder' => __( 'Type button text here.', 'themedraft-core' ),
			]
		);

		$repeater->add_control(
			'btn1_url',
			[
				'label' => __( 'Button One URL', 'themedraft-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'themedraft-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		//Button 2 Text

		$repeater->add_control(
            'btn_2_type',
            [
                'label'   => __( 'Button Two Type', 'themedraft-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => __( 'Normal', 'themedraft-core' ),
                    'video'  => __( 'Video', 'themedraft-core' ),
                ],
                'separator' => 'before',
            ]
        );

		$repeater->add_control(
			'btn2_text',
			[
				'label' => __( 'Button Two Text', 'themedraft-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type button text here.', 'themedraft-core' ),
                'condition' => [
                    'btn_2_type' => 'normal',
                ],
			]
		);

		//Button 2 Url
		$repeater->add_control(
			'btn2_url',
			[
				'label' => __( 'Button Two URL', 'themedraft-core' ),
				'type' => Controls_Manager::URL,
				'separator' => 'before',
				'placeholder' => __( 'https://your-link.com', 'themedraft-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$this->add_control(
			'slide_items',
			[
				'label' => __( 'Slide List', 'themedraft-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'bg_text' => 'Medical',
						'slide_subtitle' => 'Welcome to dental Care',
						'slide_title' => '<h2>Medical & Dental Care Solutions.</h2>',
						'slide_content_text' => 'We’ve 25 Years of experience in Medical Services.',
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->end_controls_section();

		//Start slider  options control
		$this->start_controls_section(
			'home_slider_options',
			[
				'label' => __( 'Slider Options', 'themedraft-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __( 'Slider Height (px)', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 1200,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .td-home-slider-area .td-single-slide-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_width',
			[
				'label' => __( 'Content Column Width (%)', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .td-slider-content-column' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
				],
			]
		);

        $this->add_responsive_control(
            'content_wrapper_margin',
            [
                'label'      => esc_html__( 'Content Margin', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .td-slider-content-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'slider_bg_color',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-home-slider-two .td-single-slide-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dot_image',
            [
                'label'       => __( 'Bottom Dot Image', 'themedraft-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->add_responsive_control(
			'slide_image_width',
			[
				'label' => __( 'Slide Image Width (%)', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .td-slider-right-image' => 'width: {{SIZE}}%;',
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'themedraft-core' ),
				'type' => Controls_Manager::SWITCHER,
				'show_label' => true,
				'label_block' => false,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'autoplay_interval',
			[
				'label' => __( 'Autoplay Interval', 'themedraft-core' ),
				'type' => Controls_Manager::SELECT,
				'show_label' => true,
				'label_block' => false,
				'options' => [
					'2000'  => __( '2 seconds', 'themedraft-core' ),
					'3000'  => __( '3 seconds', 'themedraft-core' ),
					'4000'  => __( '4 seconds', 'themedraft-core' ),
					'5000'  => __( '5 seconds', 'themedraft-core' ),
					'6000'  => __( '6 seconds', 'themedraft-core' ),
					'7000'  => __( '7 seconds', 'themedraft-core' ),
					'8000'  => __( '8 seconds', 'themedraft-core' ),
					'9000'  => __( '9 seconds', 'themedraft-core' ),
					'10000'  => __( '10 seconds', 'themedraft-core' ),
				],
				'default' => '6000',
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrow',
			[
				'label' => __( 'Navigation Arrow On Hover', 'themedraft-core' ),
				'type' => Controls_Manager::SWITCHER,
				'show_label' => true,
				'label_block' => false,
				'default' => 'no',
			]
		);

		$this->add_control(
			'nav_dots',
			[
				'label' => __( 'Navigation Dots', 'themedraft-core' ),
				'type' => Controls_Manager::SWITCHER,
				'show_label' => true,
				'label_block' => false,
				'default' => 'no',
			]
		);

		$this->add_control(
			'slider_animation',
			[
				'label' => __( 'Animation', 'themedraft-core' ),
				'type' => Controls_Manager::SWITCHER,
				'show_label' => true,
				'label_block' => false,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
		//Slider  options control end

        $this->start_controls_section(
            'bg_text_options',
            [
                'label' => esc_html__( 'Background Text Option', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			Themedraft_Gradient_Color::get_type(),
			[
				'name' => 'bg_text_color_type',
				'selector' => '{{WRAPPER}} .slider-bg-text',
			]
		);

        $this->end_controls_section();

		// Subtitle Style
		$this->start_controls_section(
			'subtitle_style_options',
			[
				'label' => esc_html__( 'Subtitle', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_title_typo',
				'label' => __( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .slide-subtitle',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-home-slider-two .slide-subtitle' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .slide-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// Title Style
		$this->start_controls_section(
			'title_style_options',
			[
				'label' => esc_html__( 'Title', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'themedraft-core' ),
				'selector' => '
                    {{WRAPPER}} .td-slide-title h1,
                    {{WRAPPER}} .td-slide-title h2,
                    {{WRAPPER}} .td-slide-title h3,
                    {{WRAPPER}} .td-slide-title h4,
                    {{WRAPPER}} .td-slide-title h5,
                    {{WRAPPER}} .td-slide-title h6
                ',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-home-slider-two .td-slide-title h1,{{WRAPPER}} .td-home-slider-two .td-slide-title h2,{{WRAPPER}} .td-home-slider-two .td-slide-title h3,
                    {{WRAPPER}} .td-home-slider-two .td-slide-title h4,{{WRAPPER}} .td-home-slider-two .td-slide-title h5,{{WRAPPER}} .td-home-slider-two .td-slide-title h6,
                    {{WRAPPER}} .td-home-slider-two .td-slide-title strong' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .td-slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// Description Style
		$this->start_controls_section(
			'description_style_options',
			[
				'label' => esc_html__( 'Description Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typo',
				'label' => __( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-slider-content-text',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'       => esc_html__('Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-home-slider-two .td-slider-content-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .td-slider-content-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// Start One Button section
		$this->start_controls_section(
			'button_one_style_options',
			[
				'label' => esc_html__('Button One Style', 'themedraft-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_one_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one',
		    ]
		);

		$this->start_controls_tabs('td_button_one_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
			'td_btn_one_style_default',
			[
				'label' => esc_html__('Normal', 'themedraft-core'),
			]
		);

		$this->add_control(
			'button_one_default_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_one_default_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one i:after' => 'background-color: {{VALUE}};',
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
			'button_one_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_one_hover_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-one:hover i:after' => 'background-color: {{VALUE}};',
                ],
			]
		);

		$this->end_controls_tabs();//Hover style tab end

		$this->end_controls_section();// End Button section

		// Start Two Button section
		$this->start_controls_section(
			'button_two_style_options',
			[
				'label' => esc_html__('Button Two Style', 'themedraft-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_two_typo',
				'label' => esc_html__( 'Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two',
			]
		);

		$this->start_controls_tabs('td_button_two_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
			'td_btn_two_style_default',
			[
				'label' => esc_html__('Normal', 'themedraft-core'),
			]
		);

		$this->add_control(
			'button_two_default_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .td-home-slider-wrapper .td-video-button:before,{{WRAPPER}} .td-home-slider-wrapper .td-video-button:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_two_default_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two,{{WRAPPER}} .slider-button-wrapper .td-video-button i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two i:after' => 'background-color: {{VALUE}};',
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
			'button_two_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .td-home-slider-wrapper .td-video-button:hover:before,{{WRAPPER}} .td-home-slider-wrapper .td-video-button:hover:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_two_hover_text_color',
			[
				'label'     => esc_html__('Text Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two:hover,{{WRAPPER}} .slider-button-wrapper .td-video-button:hover i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .slider-button-wrapper .td-button.td-slider-btn-two:hover i:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();//Hover style tab end

		$this->end_controls_section();// End Button section


		$this->start_controls_section(
			'slider_dot_style',
			[
				'label' => esc_html__( 'Slider Dot And Arrow', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'nav_arrow',
							'operator' => '==',
							'value' => [
								'yes',
							],
						],
						[
							'name' => 'nav_dots',
							'operator' => '==',
							'value' => [
								'yes',
							],
						],
					],
				],
			]
		);

		$this->add_control(
			'dot_color',
			[
				'label'       => esc_html__('Dot Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-dots button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
				],
			]
		);

		$this->add_control(
			'active_dot_color',
			[
				'label'       => esc_html__('Active Dot Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-dots .slick-active button,
					{{WRAPPER}} .td-home-slider-area .slick-dots button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_bg',
			[
				'label'       => esc_html__('Arrow Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-arrow' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_color',
			[
				'label'       => esc_html__('Arrow Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-arrow' => 'color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_hover_bg',
			[
				'label'       => esc_html__('Arrow Background Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-arrow:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_hover_color',
			[
				'label'       => esc_html__('Arrow Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-home-slider-area .slick-arrow:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	//Render In HTML
	protected function render() {
		$settings = $this->get_settings_for_display();
		$sliderId = rand(10, 1000);

		?>
        <div class="td-home-slider-area td-home-slider-two">
            <div id="td-home-slider-<?php echo esc_attr($sliderId);?>" class="td-home-slider-wrapper">

				<?php
				if($settings['slide_items']){
					foreach($settings['slide_items'] as $slider){
						$image_src = $slider['slide_image']['url'];
						$image_alt = get_post_meta( $slider['slide_image']['id'], '_wp_attachment_image_alt', true );
						$image_title = get_the_title( $slider['slide_image']['id']);
                        ?>

                        <div class="td-single-slide-item">
                            <div class="td-slider-bottom-dot-image" data-animation="fadeInUp"  data-delay="2.5s">
                                <img src="<?php echo $settings['dot_image']['url'];?>" alt="slider-dot-image">
                            </div>
                            <div class="td-table">
                                <div class="td-table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="td-slider-content-column col-xl-6 col-lg-8 col-md-11">
                                                <div class="td-slider-content-wrapper">
                                                    <div class="td-slider-content">
                                                        <?php if($slider['bg_text']) :?>
                                                        <div class="slider-bg-text td-secondary-font" data-animation="fadeInUp" data-delay=".5s">
		                                                    <?php echo $slider['bg_text'];?>
                                                        </div>
                                                        <?php endif; ?>

                                                        <div class="slide-subtitle" data-animation="fadeInUp" data-delay=".5s">
                                                            <?php echo $slider['slide_subtitle'];?>
                                                        </div>

                                                        <div class="td-slide-title" data-animation="fadeInUp" data-delay=".9s">
															<?php echo $slider['slide_title'];?>
                                                        </div>
                                                        <div class="td-slider-content-text" data-animation="fadeInUp"  data-delay="1.75s">
															<?php echo wpautop($slider['slide_content_text']); ?>
                                                        </div>


                                                        <div class="slider-button-wrapper">

															<?php if(!empty($slider['btn1_text'])) :
																$target = $slider['btn1_url']['is_external'] ? ' target="_blank"' : '';
																$nofollow = $slider['btn1_url']['nofollow'] ? ' rel="nofollow"' : '';
																?>
                                                                <a data-animation="fadeInUp"  data-delay="2.5s" href="<?php echo esc_url($slider['btn1_url']['url'])?>" class="td-button td-slider-btn-one" <?php echo  $target . $nofollow?>><?php echo esc_html($slider['btn1_text']) ?><i class="fas fa-plus"></i></a>
															<?php endif;?>

                                                            <?php if($slider['btn_2_type'] == 'normal'){
                                                                if(!empty($slider['btn2_text'])) :
                                                                    $target2 = $slider['btn2_url']['is_external'] ? ' target="_blank"' : '';
                                                                    $nofollow2 = $slider['btn2_url']['nofollow'] ? ' rel="nofollow"' : '';
                                                                    ?>
                                                                    <a data-animation="fadeInUp"  data-delay="2.75s" href="<?php echo esc_url($slider['btn2_url']['url'])?>" class="td-button td-slider-btn-two" <?php echo  $target2 . $nofollow2?>><?php echo esc_html($slider['btn2_text']) ?><i class="fas fa-plus"></i></a>
                                                                <?php endif;
                                                            }else{ ?>
                                                                <a data-animation="fadeInUp"  data-delay="2.75s"  href="<?php echo $slider['btn2_url']['url'];?>" class="td-video-button mfp-iframe">
                                                                    <i class="fas fa-play"></i>
                                                                </a>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="td-slider-right-image" data-animation="fadeInRight"  data-delay="2.5s">
                                <img src="<?php echo $image_src;?>" alt="<?php echo $image_alt;?>" title="<?php echo $image_title;?>">
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
        </div>


		<?php if($settings['slide_items'] && count($settings['slide_items']) > 1 ) :?>

            <script>
                (function ($) {
                    "use strict";
                    //Documnet Ready Function
                    $( document ).ready(function() {
                        // slider - active
                        function homeSlider() {
                            var SliderActive = $('#td-home-slider-<?php echo esc_js($sliderId)?>');

                            SliderActive.slick({
                                slidesToShow: 1,
                                autoplay: <?php echo json_encode($settings['autoplay'] == 'yes' ? true : false); ?>,
                                autoplaySpeed: <?php echo json_encode($settings['autoplay_interval'])?>,
                                speed: 1000, // slide speed
                                dots: <?php echo json_encode($settings['nav_dots'] == 'yes' ? true : false); ?>,
                                fade: true,
                                draggable: true,
                                pauseOnHover: false,
                                arrows: <?php echo json_encode($settings['nav_arrow'] == 'yes' ? true : false); ?>,
                                prevArrow: '<i class="slick-arrow slick-prev flaticon-long-left-arrow"></i>',
                                nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
                                responsive: [
                                    {
                                        breakpoint: 992,
                                        settings: {
                                            //768-991
                                            arrows:false
                                        }
                                    },
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            // 0 -767
                                            dots:<?php echo json_encode($settings['nav_dots'] == 'yes' ? true : false); ?>,
                                            arrows:false
                                        }
                                    }
                                ]
                            });

							<?php if($settings['slider_animation'] === 'yes') :?>
                            function doAnimations(elements) {
                                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                                elements.each(function () {
                                    var $this = $(this);
                                    var $animationDelay = $this.data('delay');
                                    var $animationType = 'animated ' + $this.data('animation');
                                    $this.css({
                                        'animation-delay': $animationDelay,
                                        '-webkit-animation-delay': $animationDelay
                                    });
                                    $this.addClass($animationType).one(animationEndEvents, function () {
                                        $this.removeClass($animationType);
                                    });
                                });
                            }

                            SliderActive.on('init', function (e, slick) {
                                var $firstAnimatingElements = $('.td-single-slide-item:first-child').find('[data-animation]');
                                doAnimations($firstAnimatingElements);
                            });

                            SliderActive.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
                                var $animatingElements = $('.td-single-slide-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                                doAnimations($animatingElements);
                            });
							<?php endif;?>
                        }
                        homeSlider();

                    });
                })(jQuery);
            </script>

		<?php endif; ?>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Home_Slider_Two_Widget );