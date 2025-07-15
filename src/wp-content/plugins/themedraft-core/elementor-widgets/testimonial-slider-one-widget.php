<?php

namespace Elementor;

class ThemeDraft_Testimonial_Slider_One_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_testimonial_slider_one';
	}

	public function get_title() {
		return esc_html__( 'Testimonials One', 'themedraft-core' );
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
			'top_image',
			[
				'label'       => esc_html__( 'Top Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'themedraft-core' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p>Lorem ipsum is a dolor sitae amet consctet of and the mor voluptata laboriosam and then null on the ofen delenitiets and reiciendis as voliuptibu and the laboriosam on andru nulla and the ideleniti and many lore other important often quotes by our doctio doctors team members.</p>',
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
						'description' => '<p>Lorem ipsum is a dolor sitae amet consctet of and the voluptata laboriosam and then null on the ofen delenitie reiciendis as voliuptibu and the laboriosam on and nulla ideleniti and many lore other important quotes.</p>',
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
			'nav_arrow',
			[
				'label'       => esc_html__( 'Navigation Arrow', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'nav_dots',
			[
				'label'       => esc_html__( 'Navigation Dots', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'no',
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
				'default'     => 2,
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
				'default'     => 1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_style_options',
			[
				'label' => esc_html__( 'Colors', 'themedraft-core' ),
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

		$this->add_control(
			'nav_arrow_bg',
			[
				'label'       => esc_html__('Nav Arrow Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-testimonial-one-slider-wrapper .slick-arrow' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrow_hover_bg',
			[
				'label'       => esc_html__('Nav Arrow Hover Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-testimonial-one-slider-wrapper .slick-arrow:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_dots_bg',
			[
				'label'       => esc_html__('Nav Dots Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-testimonial-one-slider-wrapper .slick-dots button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_dots_hover_bg',
			[
				'label'       => esc_html__('Nav Dots Hover Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-testimonial-one-slider-wrapper .slick-dots button:hover,{{WRAPPER}} .td-testimonial-one-slider-wrapper .slick-dots .slick-active button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
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

		<div class="td-testimonial-one-slider-wrapper">
            <div id ="td-testimonial-<?php echo esc_js($testimonial_id);?>" class="row td-testimonial-one-slider">
                <?php
                if ( $settings['testimonials'] ) {
                foreach ( $settings['testimonials'] as $testimonial ) {
                $name        = $testimonial['name'];
                $designation = $testimonial['designation'];
                $description = $testimonial['description'];

                $top_image_src   = $testimonial['top_image']['url'];
                $top_image_alt   = get_post_meta( $testimonial['top_image']['id'], '_wp_attachment_image_alt', true );
                $top_image_title = get_the_title( $testimonial['top_image']['id'] );

                $image_src   = $testimonial['image']['url'];
                ?>


                <div class="col-12">
                    <div class="td-testimonial-one-item">
                        <div class="td-testimonial-one-author-image td-cover-bg" style="background-image: url(<?php echo esc_url( $image_src ); ?>)"></div>

                        <div class="td-testimonial-one-top-image">
                            <img src="<?php echo esc_url( $top_image_src ); ?>" alt="<?php echo esc_attr( $top_image_alt ); ?>" title="<?php echo esc_attr( $top_image_title );?>">
                        </div>

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
                        dots: <?php echo json_encode( $settings['nav_dots'] == 'yes' ? true : false ); ?>,
                        arrows: <?php echo json_encode( $settings['nav_arrow'] == 'yes' ? true : false ); ?>,
                        prevArrow: '<i class="slick-arrow slick-prev flaticon-long-left-arrow"></i>',
                        nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
                        infinite:  <?php echo json_encode( $settings['infinity_loop'] == 'yes' ? true : false ); ?>,
                        pauseOnHover: false,
                        centerMode: false,
                        responsive: [
                            {
                                breakpoint: 1025,
                                settings: {
                                    slidesToShow: <?php echo json_encode( $settings['ipad_pro_column'] )?>, // 992-1024
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: <?php echo json_encode( $settings['tab_column'] )?>, //768-991
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1, // 0 -767
                                    arrows: false,
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

Plugin::instance()->widgets_manager->register( new ThemeDraft_Testimonial_Slider_One_Widget );