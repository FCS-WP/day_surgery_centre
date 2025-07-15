<?php
namespace Elementor;

class ThemeDraft_Icon_Box_Slider_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_icon_box_slider';
	}

	public function get_title() {
		return esc_html__( 'Icon Box Slider', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-tooth-5';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'icon_box_slider_option',
			[
				'label' => esc_html__( 'Icon Box', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'themedraft-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => 'Medicine Care'
            ]
        );

		$repeater->add_control(
            'subtitle',
            [
                'label'       => __( 'Subtitle', 'themedraft-core' ),
                'label_block'       => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Dental Implant'
            ]
        );

		$repeater->add_control(
			'type',
			[
				'label'       => esc_html__( 'Icon Type', 'themedraft-core' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'icon'  => [
						'title' => esc_html__( 'Icon', 'themedraft-core' ),
						'icon'  => 'fa fa-smile',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'themedraft-core' ),
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
				'label'            => esc_html__( 'Select Icon', 'themedraft-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default'          => [
					'value'   => 'flaticon-tooth-2',
					'library' => 'themedraft-doctio-icon',
				],
				'condition'        => [
					'type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'themedraft-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'type' => 'image'
				],
				'dynamic'   => [
					'active' => true,
				]
			]
		);

		$this->add_control(
		    'icon_boxes',
		    [
		        'label'       => __( 'Icon Box Slide List', 'themedraft-core' ),
		        'type'        => Controls_Manager::REPEATER,
		        'fields'      => $repeater->get_controls(),
		        'default'     => [
		            [
		                'title' => 'Dental Implant',
		                'subtitle' => 'Dental Care',
		            ],
		        ],
		        'title_field' => '{{{ title }}}',
		    ]
		);

		$this->end_controls_section();

		//Slider Options
		$this->start_controls_section(
			'brand_slider_options',
			[
				'label' => __( 'Slider Options', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'       => __( 'Autoplay', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'no',
			]
		);

		$this->add_control(
			'autoplay_interval',
			[
				'label'       => __( 'Autoplay Interval', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => [
					'2000'  => __( '2 seconds', 'themedraft-core' ),
					'3000'  => __( '3 seconds', 'themedraft-core' ),
					'4000'  => __( '4 seconds', 'themedraft-core' ),
					'5000'  => __( '5 seconds', 'themedraft-core' ),
					'6000'  => __( '6 seconds', 'themedraft-core' ),
					'7000'  => __( '7 seconds', 'themedraft-core' ),
					'8000'  => __( '8 seconds', 'themedraft-core' ),
					'9000'  => __( '9 seconds', 'themedraft-core' ),
					'10000' => __( '10 seconds', 'themedraft-core' ),
				],
				'default'     => '4000',
				'condition'   => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'infinity_loop',
			[
				'label'       => __( 'Loop', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'desktop_count',
			[
				'label'   => __( 'Desktop Column', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 4,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
					4  => __( '4 Column', 'themedraft-core' ),
					5  => __( '5 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'ipad_pro_count',
			[
				'label'   => __( 'Tablet Column', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
					4  => __( '4 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'tab_count',
			[
				'label'   => __( 'Tablet Column', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 2,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'mobile_count',
			[
				'label'   => __( 'Mobile Column', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 1,
				'options' => [
					1 => __( '1 Column', 'themedraft-core' ),
					2 => __( '2 Column', 'themedraft-core' ),
				],
			]
		);

		$this->end_controls_section();


        // Start Style section
        $this->start_controls_section(
            'td_box_style_options',
            [
                'label' => esc_html__('Box Style', 'themedraft-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('td_box_style_tabs');

        //Default style tab start
        $this->start_controls_tab(
            'td_box_style_default',
            [
                'label' => esc_html__('Normal', 'themedraft-core'),
            ]
        );

        $this->add_control(
            'icon_default_bg',
            [
                'label'     => esc_html__('Icon Background Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-icon-slider-box-icon:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_default_color',
            [
                'label'     => esc_html__('Icon Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-icon-slider-box-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-icon-slider-box-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();//Default style tab end

        //Hover style tab start
        $this->start_controls_tab(
            'td_box_style_hover',
            [
                'label' => esc_html__('Hover', 'themedraft-core'),
            ]
        );

        $this->add_control(
            'icon_hover_bg',
            [
                'label'     => esc_html__('Icon Background Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-icon-slide-content-wrapper:hover .td-icon-slider-box-icon:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label'     => esc_html__('Icon Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-icon-slide-content-wrapper:hover .td-icon-slider-box-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-icon-slide-content-wrapper:hover .td-icon-slider-box-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tabs();//Hover style tab end

        $this->end_controls_section();// End Button section

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$slider_id = rand(100, 1000);
		?>


		<div class="td-icon-box-slider-wrapper">
			<div class="row">
                <div class="col-12">
                    <div id="td-icon-box-slider-<?php echo $slider_id;?>" class="td-icon-box-slider">
                        <?php if ($settings['icon_boxes']) {
                            foreach ($settings['icon_boxes'] as $icon_box) { ?>
                                <div class="td-icon-slider-item text-center">
                                    <div class="td-icon-slide-content-wrapper">
                                        <div class="td-icon-slider-box-icon">
		                                    <?php if ($icon_box['type'] === 'image' && $icon_box['image']['id']) : ?>
                                                <img src="<?php echo $icon_box['image']['url']; ?>"
                                                     alt="<?php echo get_post_meta($icon_box['image']['id'], '_wp_attachment_image_alt', true); ?>">
		                                    <?php elseif (!empty($icon_box['icon']) || !empty($icon_box['selected_icon'])) :
			                                    themedraft_custom_icon_render($icon_box, 'icon', 'selected_icon');
		                                    endif; ?>
                                        </div>

                                        <div class="td-icon-box-content-wrapper">
                                            <span class="td-icon-subtitle">
                                                <?php echo nl2br($icon_box['subtitle']);?>
                                            </span>

                                            <h6 class="td-icon-slider-title">
			                                    <?php echo nl2br($icon_box['title']);?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
			</div>

            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function () {
                        $("#td-icon-box-slider-<?php echo $slider_id;?>").slick({
                            slidesToShow: <?php echo json_encode( $settings['desktop_count'] )?>,
                            autoplay: <?php echo json_encode( $settings['autoplay'] == 'yes' ? true : false ); ?>,
                            autoplaySpeed: <?php echo json_encode( $settings['autoplay_interval'] )?>, //interval
                            speed: 1500, // slide speed
                            dots: false,
                            arrows: false,
                            prevArrow: '<i class="slick-arrow slick-prev eicon-chevron-left"></i>',
                            nextArrow: '<i class="slick-arrow slick-next eicon-chevron-right"></i>',
                            infinite: <?php echo json_encode( $settings['infinity_loop'] == 'yes' ? true : false ); ?>,
                            pauseOnHover: false,
                            centerMode: false,
                            responsive: [
                                {
                                    breakpoint: 1025,
                                    settings: {
                                        slidesToShow: <?php echo json_encode( $settings['ipad_pro_count'] )?>, // 992-1024
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: <?php echo json_encode( $settings['tab_count'] )?>, //768-991
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: <?php echo json_encode( $settings['mobile_count'] )?>, // 0 -767
                                    }
                                }
                            ]
                        });
                    });
                })(jQuery);
            </script>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Icon_Box_Slider_Widget );