<?php
namespace Elementor;

class ThemeDraft_Service_Details_Slider_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_service_details_slider';
	}

	public function get_title() {
		return esc_html__( 'Service Details Slider', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_details_slider_options',
			[
				'label' => esc_html__( 'Images', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slide_images',
			[
				'label'   => __('Slider Images', 'themedraft-core'),
				'type'    => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    'slider_option',
		    [
		        'label' => esc_html__( 'Slider', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_CONTENT,
		    ]
		);

		$this->add_responsive_control(
		    'main_slider_height',
		    [
		        'label' => esc_html__( 'Slider Height', 'themedraft-core' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'range' => [
		            'px' => [
		                'min' => 200,
		                'max' => 1000,
		            ],
		        ],
		        'devices' => [ 'desktop', 'tablet', 'mobile' ],

		        'selectors' => [
		            '{{WRAPPER}} .td-service-details-main-slider-item.slick-slide' => 'height: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
			'desktop_count',
			[
				'label'   => __( 'Nav Column On Desktop', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
					4  => __( '4 Column', 'themedraft-core' ),
					5  => __( '5 Column', 'themedraft-core' ),
					6  => __( '6 Column', 'themedraft-core' ),
					7  => __( '7 Column', 'themedraft-core' ),
					8  => __( '8 Column', 'themedraft-core' ),
					9  => __( '9 Column', 'themedraft-core' ),
					10 => __( '10 Column', 'themedraft-core' ),
					11 => __( '11 Column', 'themedraft-core' ),
					12 => __( '12 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'tab_count',
			[
				'label'   => __( 'Nav Column On Tablet', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
					4  => __( '4 Column', 'themedraft-core' ),
					5  => __( '5 Column', 'themedraft-core' ),
					6  => __( '6 Column', 'themedraft-core' ),
					7  => __( '7 Column', 'themedraft-core' ),
					8  => __( '8 Column', 'themedraft-core' ),
					9  => __( '9 Column', 'themedraft-core' ),
					10 => __( '10 Column', 'themedraft-core' ),
					11 => __( '11 Column', 'themedraft-core' ),
					12 => __( '12 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'mobile_count',
			[
				'label'   => __( 'Nav Column On Mobile', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1  => __( '1 Column', 'themedraft-core' ),
					2  => __( '2 Column', 'themedraft-core' ),
					3  => __( '3 Column', 'themedraft-core' ),
					4  => __( '4 Column', 'themedraft-core' ),
					5  => __( '5 Column', 'themedraft-core' ),
					6  => __( '6 Column', 'themedraft-core' ),
				],
			]
		);

		$this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="td-service-details-content">
			<div class="td-service-info-slider-wrapper">
				<div class="row">
					<div class="col-12">
						<div class="td-service-details-main-slider">
							<?php
							if ($settings['slide_images']) {
								foreach ( $settings['slide_images'] as $image ) { ?>
                                    <div class="td-service-details-main-slider-item td-cover-bg" style="background-image: url(<?php echo esc_url($image['url']); ?>)"></div>
									<?php
								}
							}
							?>
						</div>

						<div class="td-service-details-slider-nav">
							<?php
							if ($settings['slide_images']) {
								foreach ( $settings['slide_images'] as $image ) {
									$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', true );
									$image_title = get_the_title( $image['id']);
									?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image_alt);?>" title="<?php echo esc_attr($image_title);?>">
									<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

        <script>
            (function ($) {
                'use strict';
                $(document).ready(function () {
                    $(".td-service-details-main-slider").slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 4000, //interval
                        speed: 1500, // slide speed
                        dots: false,
                        arrows: false,
                        infinite: true,
                        fade: true,
                        pauseOnHover: false,
                        centerMode: false,
                        asNavFor: '.td-service-details-slider-nav'
                    });

                    $(".td-service-details-slider-nav").slick({
                        slidesToShow:  <?php echo json_encode( $settings['desktop_count'] )?>,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 4000, //interval
                        speed: 1500, // slide speed
                        dots: false,
                        arrows: false,
                        infinite: true,
                        pauseOnHover: false,
                        centerMode: true,
                        centerPadding: '0px',
                        asNavFor: '.td-service-details-main-slider',
                        focusOnSelect: true,
                        responsive: [
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
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Details_Slider_Widget );