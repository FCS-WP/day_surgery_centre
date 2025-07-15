<?php

namespace Elementor;

use WP_Query;

class ThemeDraft_Recent_Post_Widget extends Widget_Base {

	public function get_name() {

		return "themedraft_recent_post";
	}

	public function get_title() {
		return __( "Recent Posts", "themedraft-core" );
	}

	public function get_icon() {

		return "eicon-post-excerpt";
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {
		//Content tab start
		$this->start_controls_section(
			'recent_post_settings',
			[
				'label' => __( 'Post Settings', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_count',
			[
				'label'   => __( 'Number Of Post To Show', 'themedraft-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => - 1,
				'max'     => '',
				'step'    => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'category',
			[
				'label'       => __( 'Categories', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'options'     => themedraft_post_categories(),
			]
		);

		$this->add_control(
			'exclude_post',
			[
				'label'       => __( 'Exclude Posts', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'description' => __( 'Select post id.', 'themedraft-core' ),
				'options'     => themedraft_get_post_title_as_list(),
			]
		);


		$this->add_control(
			'post_offset',
			[
				'label'   => __( 'Post Offset', 'themedraft-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => '',
				'step'    => 1,
				'default' => 0,
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label'   => __( 'Order By', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => themedraft_post_orderby_options(),
				'default' => 'date',

			]
		);

		$this->add_control(
			'post_order',
			[
				'label'   => __( 'Order', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'asc'  => 'Ascending',
					'desc' => 'Descending'
				],
				'default' => 'desc',

			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Read More',
			]
		);

		$this->add_control(
		    'enable_slider',
		    [
		        'label'     => esc_html__( 'Enable Slider', 'themedraft-core' ),
		        'type'      => Controls_Manager::SWITCHER,
		        'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
		        'label_off' => esc_html__( 'No', 'themedraft-core' ),
		        'default'   => 'no',
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'recent_post_layout_settings',
			[
				'label' => __( 'Post Layout', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'desktop_col',
			[
				'label'   => __( 'Columns On Desktop', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-4',
				'options' => [
					'col-xl-12' => __( '1 Column', 'themedraft-core' ),
					'col-xl-6'  => __( '2 Column', 'themedraft-core' ),
					'col-xl-4'  => __( '3 Column', 'themedraft-core' ),
					'col-xl-3'  => __( '4 Column', 'themedraft-core' ),
				],
                'condition' => [
                    'enable_slider!' => 'yes',
                ],
			]
		);

		$this->add_control(
			'iPad_pro_col',
			[
				'label'   => __( 'Columns On iPad Pro', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-6',
				'options' => [
					'col-lg-12' => __( '1 Column', 'themedraft-core' ),
					'col-lg-6'  => __( '2 Column', 'themedraft-core' ),
					'col-lg-4'  => __( '3 Column', 'themedraft-core' ),
					'col-lg-3'  => __( '4 Column', 'themedraft-core' ),
				],
				'condition' => [
					'enable_slider!' => 'yes',
				],
			]
		);

		$this->add_control(
			'tab_col',
			[
				'label'   => __( 'Columns On Tablet', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-6',
				'options' => [
					'col-md-12' => __( '1 Column', 'themedraft-core' ),
					'col-md-6'  => __( '2 Column', 'themedraft-core' ),
					'col-md-4'  => __( '3 Column', 'themedraft-core' ),
					'col-md-3'  => __( '4 Column', 'themedraft-core' ),
				],
				'condition' => [
					'enable_slider!' => 'yes',
				],
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
				'condition' => [
					'enable_slider' => 'yes',
				],
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
				'condition' => [
					'enable_slider' => 'yes',
				],
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
				'condition' => [
					'enable_slider' => 'yes',
				],
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
				'condition' => [
					'enable_slider' => 'yes',
				],
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
					'enable_slider' => 'yes',
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrow',
			[
				'label'       => esc_html__( 'Navigation Arrow', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'no',
				'condition'   => [
					'enable_slider' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'   => __( 'Excerpt', 'themedraft-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => __( 'Excerpt Length', 'themedraft-core' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => '',
				'step'      => 1,
				'default'   => 13,
				'condition' => [
					'show_excerpt' => 'yes',
				]
			]
		);

		$this->add_control(
			'title_word',
			[
				'label'   => __( 'Title Word Count', 'themedraft-core' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => '',
				'step'    => 1,
				'default' => 7,
			]
		);

		$this->add_control(
			'show_rm_button',
			[
				'label'   => __( 'Read More Button', 'themedraft-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label'   => __( 'Show Date', 'themedraft-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_author_name',
			[
				'label'   => __( 'Show Author Name', 'themedraft-core' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'post_styles',
			[
				'label' => esc_html__( 'Post Style', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'thumbnail_height',
			[
				'label' => __( 'Thumbnail Height', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .td-recent-post-thumbnail' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-post-meta li a:hover, {{WRAPPER}} .td-post-meta li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'read_more_hover_color',
            [
                'label'       => esc_html__('Read More Hover Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-text-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();
	}


	//Render In HTML
	protected function render() {
		$settings = $this->get_settings_for_display();
		if($settings['enable_slider'] == 'yes'){
			$column = 'col-12';
        }else{
			$column = $settings['desktop_col'] . ' ' . $settings['iPad_pro_col'] . ' ' . $settings['tab_col'];
        }

		$slider_id = rand(10, 10000);
		?>

        <div class="td-recent-post-el-widget">
            <div class="container">
                <div id="td-post-slider-<?php echo $slider_id;?>" class="row td-all-posts-wrapper">
                    <?php
                    if ( ! empty( $settings['category'] ) ) {
                        $post_query = new WP_Query( array(
                            'post_type'           => 'post',
                            'posts_per_page'      => $settings['post_count'],
                            'ignore_sticky_posts' => 1,
                            'offset'              => $settings['post_offset'],
                            'orderby'             => $settings['post_orderby'],
                            'order'               => $settings['post_order'],
                            'post__not_in'        => $settings['exclude_post'],
                            'tax_query'           => array(
                                array(
                                    'taxonomy' => 'category',
                                    'terms'    => $settings['category'],
                                    'field'    => 'slug',
                                )
                            )
                        ) );
                    } else {

                        $post_query = new WP_Query(
                            array(
                                'posts_per_page'      => $settings['post_count'],
                                'post_type'           => 'post',
                                'ignore_sticky_posts' => 1,
                                'offset'              => $settings['post_offset'],
                                'orderby'             => $settings['post_orderby'],
                                'order'               => $settings['post_order'],
                                'post__not_in'        => $settings['exclude_post'],
                            )
                        );
                    }
                    while ( $post_query->have_posts() ) : $post_query->the_post();
                        ?>

                        <div class="<?php echo $column;?>">
                            <div class="td-single-post-item">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <a href="<?php echo esc_url( get_the_permalink() );?>" class="td-recent-post-thumbnail td-cover-bg" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ) ?>)"></a>

                                    <div class="td-recent-post-content">
                                        <div class="td-post-meta post-meta">
                                            <ul class="td-list-style td-list-inline">
			                                    <?php if($settings['show_author_name'] == 'yes') : ?>
                                                    <li><?php doctio_posted_by(); ?></li>
			                                    <?php endif;?>

                                                <?php if($settings['show_date'] == 'yes') : ?>
                                                    <li><?php doctio_posted_on(); ?></li>
			                                    <?php endif;?>
                                            </ul>
                                        </div>

                                        <div class="td-recent-post-title">
                                            <a href="<?php echo esc_url( get_the_permalink() );?>">
                                                <h4 class="post-title"><?php echo wp_trim_words(get_the_title(), $settings['title_word'], ' ...');?></h4>
                                            </a>
                                        </div>

                                        <?php if ( $settings['show_excerpt'] === 'yes' ) : ?>
                                            <div class="td-post-excerpt">
                                                <p><?php echo themedraft_get_excerpt( get_the_ID(), $settings['excerpt_length'] ); ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( $settings['show_rm_button'] == 'yes' ): ?>
                                            <div class="td-post-read-more">
                                                <a class="td-text-button" href="<?php echo esc_url( get_the_permalink() ) ?>">
                                                    <?php echo esc_html__( $settings['button_text'] ); ?> <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </article><!-- #post-<?php the_ID(); ?> -->
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <?php if($settings['enable_slider'] == 'yes') : ?>
            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function () {
                        $("#td-post-slider-<?php echo $slider_id;?>").slick({
                            slidesToShow: <?php echo json_encode( $settings['desktop_column'] )?>,
                            autoplay: <?php echo json_encode( $settings['autoplay'] == 'yes' ? true : false ); ?>,
                            autoplaySpeed: <?php echo json_encode( $settings['autoplay_interval'] )?>, //interval
                            speed: 1500, // slide speed
                            dots: false,
                            arrows: <?php echo json_encode( $settings['nav_arrow'] == 'yes' ? true : false ); ?>,
                            prevArrow: '<i class="slick-arrow slick-prev flaticon-long-left-arrow"></i>',
                            nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
                            infinite:  true,
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
            <?php endif; ?>
        </div>
		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Recent_Post_Widget );