<?php

namespace Elementor;

class ThemeDraft_Testimonial_Slider_Two_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_testimonial_slider_two';
	}

	public function get_title() {
		return esc_html__( 'Testimonials Two', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_settings',
			[
				'label' => esc_html__( 'Testimonials', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Name', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Md Nadim Khan',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'designation',
			[
				'label'       => esc_html__( 'Designation', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Web Developer',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'themedraft-core' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p>Lorem ipsum is a dolor and sitae amet conscte of and the volu ptat labor iosam and then null on the ofen delenitie reiciendis.</p>',
			]
		);


		$repeater->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'testimonials',
			[
				'label'       => esc_html__( 'Testimonials List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'name'        => 'Md Nadim Khan',
						'designation' => 'Web Developer',
						'description' => '<p>Lorem ipsum is a dolor and sitae amet conscte of and the volu ptat labor iosam and then null on the ofen delenitie reiciendis.</p>',
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		// Slider Options
		$this->start_controls_section(
			'slider_options',
			[
				'label' => esc_html__( 'Slider Options', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'       => esc_html__( 'Autoplay', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'autoplay_interval',
			[
				'label'       => esc_html__( 'Autoplay Interval', 'themedraft-core' ),
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
				'label'       => esc_html__( 'Loop', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'desktop_column',
			[
				'label'       => esc_html__( 'Column On Desktop', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => [
					1 => __( '1 Column', 'themedraft-core' ),
					2 => __( '2 Column', 'themedraft-core' ),
					3 => __( '3 Column', 'themedraft-core' ),
					4 => __( '4 Column', 'themedraft-core' ),
				],
				'default'     => 3,
			]
		);

		$this->add_control(
			'ipad_pro_column',
			[
				'label'       => esc_html__( 'Column On iPad Pro', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => [
					1 => __( '1 Column', 'themedraft-core' ),
					2 => __( '2 Column', 'themedraft-core' ),
					3 => __( '3 Column', 'themedraft-core' ),
					4 => __( '4 Column', 'themedraft-core' ),
				],
				'default'     => 2,
			]
		);

		$this->add_control(
			'tab_column',
			[
				'label'       => __( 'Column On Tablet', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => [
					1 => __( '1 Column', 'themedraft-core' ),
					2 => __( '2 Column', 'themedraft-core' ),
					3 => __( '3 Column', 'themedraft-core' ),
					4 => __( '4 Column', 'themedraft-core' ),
				],
				'default'     => 2,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_style_options',
			[
				'label' => esc_html__( 'Testimonials', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'name_color',
			[
				'label'       => esc_html__('Name Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-testimonial-one-author-name' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'designation_color',
            [
                'label'       => esc_html__('Designation Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-testimonial-one-author-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quote_color',
            [
                'label'       => esc_html__('Quote Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-testimonial-quote' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .td-testimonial-one-slider-wrapper.td-testimonial-layout-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$testimonial_id = rand(10, 10000);
		?>

		<div class="td-testimonial-one-slider-wrapper td-testimonial-layout-two">
            <div id ="td-testimonial-<?php echo esc_js($testimonial_id);?>" class="row td-testimonial-one-slider">
                <?php
                if ( $settings['testimonials'] ) {
                foreach ( $settings['testimonials'] as $testimonial ) {
                $name        = $testimonial['name'];
                $designation = $testimonial['designation'];
                $description = $testimonial['description'];

                $image_src   = $testimonial['image']['url'];
                ?>


                <div class="col-12">
                    <div class="td-testimonial-one-item-wrapper">
                        <div class="td-testimonial-one-item">
                            <div class="td-testimonial-one-author-image td-cover-bg" style="background-image: url(<?php echo esc_url( $image_src ); ?>)"></div>

                            <div class="td-testimonial-one-desc">
                                <?php echo wp_kses_post( $description); ?>
                            </div>

                            <div class="td-testimonial-one-author-name-designation">
                                <div class="td-testimonial-quote td-primary-color"><i class="flaticon-quotation"></i></div>
                                <h4 class="td-testimonial-one-author-name"><?php echo esc_html( $name ); ?></h4>
                                <span class="td-testimonial-one-author-designation"><?php echo esc_html( $designation ); ?></span>
                            </div>

                        </div>
                    </div>
                </div>

                <?php }
                }
                ?>
            </div>


		</div>


		<script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    $("#td-testimonial-<?php echo esc_js($testimonial_id);?>").slick({
                        slidesToShow: <?php echo json_encode( $settings['desktop_column'] )?>,
                        autoplay: <?php echo json_encode( $settings['autoplay'] == 'yes' ? true : false ); ?>,
                        autoplaySpeed: <?php echo json_encode( $settings['autoplay_interval'] )?>, //interval
                        speed: 1500, // slide speed
                        dots: false,
                        arrows: false,
                        prevArrow: '<i class="slick-arrow slick-prev flaticon-long-left-arrow"></i>',
                        nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
                        infinite:  <?php echo json_encode( $settings['infinity_loop'] == 'yes' ? true : false ); ?>,
                        pauseOnHover: false,
                        vertical: true,
                        verticalSwiping: true,
                        responsive: [
                            {
                                breakpoint: 1025,
                                settings: {
                                    slidesToShow: <?php echo json_encode( $settings['ipad_pro_column'] )?>, // 992-1024
                                    arrows: false,
                                    vertical: false,
                                    verticalSwiping: false,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: <?php echo json_encode( $settings['tab_column'] )?>, //768-991
                                    arrows: false,
                                    vertical: false,
                                    verticalSwiping: false,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1, // 0 -767
                                    arrows: false,
                                    vertical: false,
                                    verticalSwiping: false,
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

Plugin::instance()->widgets_manager->register( new ThemeDraft_Testimonial_Slider_Two_Widget );