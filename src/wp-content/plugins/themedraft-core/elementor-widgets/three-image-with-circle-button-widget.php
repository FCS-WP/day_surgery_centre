<?php
namespace Elementor;

class ThemeDraft_Three_Image_With_Circle_Button_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_tiwcb';
	}

	public function get_title() {
		return esc_html__( 'Three Image & Button', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-image-gallery';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'tiwcb_options',
			[
				'label' => esc_html__( 'Three Image & Button', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'img_one',
            [
                'label'       => __( 'Image One', 'themedraft-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'description' => __( 'Use 335 by 285 pixels image for better user experience', 'themedraft-core' ),
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->add_control(
			'img_two',
			[
				'label'       => __( 'Image Two', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'description' => __( 'Use 400 by 290 pixels image for better user experience', 'themedraft-core' ),
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'img_three',
			[
				'label'       => __( 'Image Three', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'description' => __( 'Use 335 by 285 pixels image for better user experience', 'themedraft-core' ),
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'themedraft-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => 'Medical and dental care provider company since 2022',
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label'         => __( 'Button URL', 'themedraft-core' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'themedraft-core' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'tiwcb_style_options',
            [
                'label' => esc_html__( 'Three Image & Button', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'wrapper_height',
            [
                'label' => esc_html__( 'Wrapper Height', 'themedraft-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 1500,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],

                'selectors' => [
                    '{{WRAPPER}} .td-tiwcb-wrapper' => 'height: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label'       => esc_html__('Button Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .circle-button-wrapper' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'btn_border_color',
			[
				'label'       => esc_html__('Button Border Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-tiwcb-wrapper svg,{{WRAPPER}} .circle-button-wrapper i' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label'       => esc_html__('Button Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .circle-button-wrapper:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_border_color_on_hover',
			[
				'label'       => esc_html__('Button Border Color On Hover', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-tiwcb-wrapper:hover svg,{{WRAPPER}} .circle-button-wrapper:hover i' => 'border-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();

        $img_one_src = $settings['img_one']['url'];
		$img_two_src = $settings['img_two']['url'];
		$img_three_src = $settings['img_three']['url'];
		?>

        <div class="td-tiwcb-wrapper">



            <div class="td-tiwcb-first-image td-cover-bg" style="background-image: url(<?php echo $img_one_src;?>)"></div>

            <div class="td-tiwcb-second-image td-cover-bg" style="background-image: url(<?php echo $img_two_src;?>)"></div>

            <div class="td-tiwcb-third-image td-cover-bg" style="background-image: url(<?php echo $img_three_src;?>)">
	            <?php if($settings['btn_text']) :
		            $btn_url      = $settings['btn_url']['url'];
		            $target   = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
		            $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
		            ?>
                    <a href="<?php echo $btn_url?>" class="circle-button-wrapper td-secondary-font" <?php echo $target . $nofollow;?>>
                        <i class="flaticon-right-arrow-1"></i>
                        <svg viewBox="0 0 100 100">
                            <defs>
                                <path id="td-circle-button" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"/>
                            </defs>
                            <text>
                                <textPath xlink:href="#td-circle-button">
						            <?php echo $settings['btn_text'];?>
                                </textPath>
                            </text>
                        </svg>
                    </a>
	            <?php endif; ?>
            </div>
        </div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Three_Image_With_Circle_Button_Widget );