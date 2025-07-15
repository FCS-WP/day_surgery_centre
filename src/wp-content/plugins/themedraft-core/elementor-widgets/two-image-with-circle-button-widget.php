<?php
namespace Elementor;

class ThemeDraft_Two_Image_With_Circle_Button_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_two_iwcb';
	}

	public function get_title() {
		return esc_html__( 'Two Image & Button', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-image-gallery';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'two_iwcb_options',
			[
				'label' => esc_html__( 'Two Image & Button', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'img_one',
            [
                'label'       => __( 'Image One', 'themedraft-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'description' => __( 'Use 535 by 605 pixels image for better user experience', 'themedraft-core' ),
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
				'description' => __( 'Use 375 by 335 pixels png image for better user experience', 'themedraft-core' ),
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

        // Start Button section
        $this->start_controls_section(
            'td_button_style_options',
            [
                'label' => esc_html__('Button Style', 'themedraft-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('td_button_style_tabs');

        //Default style tab start
        $this->start_controls_tab(
            'td_btn_style_default',
            [
                'label' => esc_html__('Normal', 'themedraft-core'),
            ]
        );

		$this->add_control(
			'btn_text_color',
			[
				'label'       => esc_html__('Button Text Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-two-image-with-circle-btn.td-tiwcb-wrapper svg' => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'btn_bg_color',
			[
				'label'       => esc_html__('Button Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-two-image-with-circle-btn .td-two-image-wrapper .circle-button-wrapper' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .td-two-image-with-circle-btn.td-tiwcb-wrapper .circle-button-wrapper i' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tab();//Default style tab end

        //Hover style tab start
        $this->start_controls_tab(
            'td_btn_style_hover',
            [
                'label' => esc_html__('Hover', 'themedraft-core'),
            ]
        );

		$this->add_control(
			'btn_hover_text_color',
			[
				'label'       => esc_html__('Button Text Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-two-image-with-circle-btn.td-tiwcb-wrapper:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'btn_hover_bg_color',
			[
				'label'       => esc_html__('Button Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-two-image-with-circle-btn .td-two-image-wrapper .circle-button-wrapper:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .td-two-image-with-circle-btn.td-tiwcb-wrapper .circle-button-wrapper:hover i' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tabs();//Hover style tab end

        $this->end_controls_section();// End Button section




























	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();

        $img_one_src = $settings['img_one']['url'];
		$image_one_alt = get_post_meta( $settings['img_one']['id'], '_wp_attachment_image_alt', true );
		$image_one_title = get_the_title( $settings['img_one']['id']);

		$img_two_src = $settings['img_two']['url'];
		$image_two_alt = get_post_meta( $settings['img_two']['id'], '_wp_attachment_image_alt', true );
		$image_two_title = get_the_title( $settings['img_two']['id']);
		?>

        <div class="td-tiwcb-wrapper td-two-image-with-circle-btn">

            <div class="td-two-image-wrapper">
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

                <img class="td-image-one" src="<?php echo $img_one_src;?>" alt="<?php echo $image_one_alt?>" title="<?php echo $image_one_title ?>">
                <img class="td-image-two" src="<?php echo $img_two_src;?>" alt="<?php echo $image_two_alt?>" title="<?php echo $image_two_title ?>">
            </div>
        </div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Two_Image_With_Circle_Button_Widget );