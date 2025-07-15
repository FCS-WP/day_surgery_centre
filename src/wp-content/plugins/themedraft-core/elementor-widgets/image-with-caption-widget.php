<?php
namespace Elementor;

class ThemeDraft_Image_With_Caption_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_image_with_caption';
	}

	public function get_title() {
		return esc_html__( 'Image & Caption', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-image-gallery';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_and_text_options',
			[
				'label' => esc_html__( 'Image & Caption', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'image_one',
		    [
		        'label'       => __( 'Image One', 'themedraft-core' ),
		        'type'        => Controls_Manager::MEDIA,
		        'label_block' => true,
		        'default'     => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->add_control(
			'image_two',
			[
				'label'       => __( 'Image Two', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
		    'image_caption',
		    [
		        'label'       => __( 'Image Caption', 'themedraft-core' ),
		        'type'        => Controls_Manager::TEXTAREA,
		        'rows'        => 5,
		        'default'     => '<span>25</span> Years Of Experience in Medical Services',
		        'description' => esc_html__( 'Use <span></span> tag for big letter.', 'themedraft-core' ),
		    ]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'caption_img_style',
            [
                'label' => esc_html__( 'Image & Caption', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label'       => esc_html__('Image Align', 'themedraft-core'),
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
                    '{{WRAPPER}} .td-img-caption-wrapper' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="td-img-caption-wrapper td-secondary-font">
            <div class="td-caption-images">
                <div class="td-caption-img-one td-cover-bg" style="background-image: url(<?php echo $settings['image_one']['url'];?>)"></div>
                <div class="td-caption-img-two td-cover-bg" style="background-image: url(<?php echo $settings['image_two']['url'];?>)"></div>

                <div class="td-img-caption">
                    <?php echo $settings['image_caption'];?>
                </div>
            </div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Image_With_Caption_Widget );