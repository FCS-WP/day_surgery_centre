<?php
namespace Elementor;
use WP_Query;
class ThemeDraft_Team_Member_Two_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_team_member_two';
	}

	public function get_title() {
		return esc_html__( 'Team Member Two', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-doctor-1';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		//Content tab start
		$this->start_controls_section(
			'team_one_options',
			[
				'label' => esc_html__( 'Team Members', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'team_layout',
            [
                'label'   => __( 'Layout', 'themedraft-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'td-team-layout-one',
                'options' => [
                    'td-team-layout-one' => __( 'Layout One', 'themedraft-core' ),
                    'td-team-layout-two' => __( 'Layout Two', 'themedraft-core' ),
                ],
            ]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'member_name',
			[
				'label'       => __( 'Member Name', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Md Nadim Khan',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Medicine Specialist',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'       => __( 'Member Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],

				'description' => esc_html__( 'Use 270x270 pixel Image for better user experience.', 'themedraft-core' ),
			]
		);

		$repeater->add_control(
			'selected_member_profile',
			[
				'label'       => __( 'Social Profile & <br> Details Link', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => themedraft_team_member_list(),
				'description' => esc_html__( 'Select member name to associate his/her details page link.', 'themedraft-core' ),
			]
		);

		$this->add_control(
			'members',
			[
				'label'       => __( 'Member List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'member_name' => 'Md Nadim Khan',
						'designation' => 'Medicine Specialist',
					],
				],
				'title_field' => '{{{ member_name }}}',
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
			'team_member_column',
			[
				'label' => esc_html__( 'Column', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'xl_col',
			[
				'label'   => __( 'Columns On Desktop', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
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
			'lg_col',
			[
				'label'   => __( 'Columns On iPad Pro', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-4',
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
			'md_col',
			[
				'label'   => __( 'Columns On iPad', 'themedraft-core' ),
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
			'desktop_count',
			[
				'label'       => __( 'Column On Desktop', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => [
					1 => __( '1 Column', 'themedraft-core' ),
					2 => __( '2 Column', 'themedraft-core' ),
					3 => __( '3 Column', 'themedraft-core' ),
					4 => __( '4 Column', 'themedraft-core' ),
				],
				'default'     => 4,
				'condition' => [
					'enable_slider' => 'yes',
				],
			]
		);

		$this->add_control(
			'ipad_pro_count',
			[
				'label'       => __( 'Column On iPad Pro', 'themedraft-core' ),
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
			'tab_count',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_options',
			[
				'label' => esc_html__( 'Slider Options', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'enable_slider' => 'yes',
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'       => __( 'Autoplay', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'yes',
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
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrow',
			[
				'label'       => __( 'Navigation Arrow', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'no',
			]
		);

		$this->add_control(
			'nav_dots',
			[
				'label'       => __( 'Navigation Dots', 'themedraft-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'show_label'  => true,
				'label_block' => false,
				'default'     => 'no',
			]
		);

		$this->end_controls_section();





        $this->start_controls_section(
            'td_team_style_options',
            [
                'label' => esc_html__('Team Member Style', 'themedraft-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'       => esc_html__('Name Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-member-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label'       => esc_html__('Designation Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-member-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label'      => esc_html__( 'Container Padding', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .td-team-two-wrapper .container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('td_team_style_tabs');

        //Default style tab start
        $this->start_controls_tab(
            'td_style_default',
            [
                'label' => esc_html__('Normal', 'themedraft-core'),
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label'       => esc_html__('Button Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-member-btn-text' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label'       => esc_html__('Social Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-team-member-social li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_button_bg',
            [
                'label'       => esc_html__('Nav Arrow Background', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .slick-arrow' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'nav_arrow' => 'yes',
                ],
            ]
        );

		$this->add_control(
			'nav_dot_bg',
			[
				'label'       => esc_html__('Nav Dot Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .slick-dots button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
				],
			]
		);

        $this->end_controls_tab();

        //Hover style tab start
        $this->start_controls_tab(
            'td_style_hover',
            [
                'label' => esc_html__('Hover', 'themedraft-core'),
            ]
        );

		$this->add_control(
			'button_hover_bg_color',
			[
				'label'       => esc_html__('Button Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-member-btn-text:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_icon_hover_color',
			[
				'label'       => esc_html__('Social Icon Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-team-member-social li a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'nav_hover_button_bg',
			[
				'label'       => esc_html__('Nav Arrow Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .slick-arrow:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_hover_dot_bg',
			[
				'label'       => esc_html__('Nav Dot Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .slick-dots button:hover,{{WRAPPER}} .slick-dots .slick-active button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'nav_dots' => 'yes',
				],
			]
		);


        $this->end_controls_tabs();

        $this->end_controls_section();


	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$slider_id = rand(100, 1000);

		if($settings['enable_slider'] == 'yes'){
			$col = 'col-12';
		}else{
			$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'];
		}
		?>

        <div class="td-team-one-wrapper td-team-two-wrapper <?php echo $settings['team_layout'];?>">
            <div class="container">
                <div id="team-one-wrapper-<?php echo $slider_id;?>" class="row">
					<?php
					if ( $settings['members'] ) {
						foreach ( $settings['members'] as $member ) {
							$image_src = $member['image']['url'];
							$image_alt = get_post_meta( $member['image']['id'], '_wp_attachment_image_alt', true );
							$image_title = get_the_title($member['image']['id']);
							$name = $member['member_name'];
							$designation = $member['designation'];

							$member_query = new WP_Query(
								array(
									'posts_per_page' => 1,
									'post_type'      => 'doctio_team',
									'p'              => $member['selected_member_profile'],
								)
							);

							while ( $member_query->have_posts() ) :
								$member_query->the_post();

								if ( get_post_meta( get_the_ID(), 'doctio_team_meta', true ) ) {
									$team_meta = get_post_meta( get_the_ID(), 'doctio_team_meta', true );
								} else {
									$team_meta = array();
								}

								if ( array_key_exists( 'member_social_profile', $team_meta ) ) {
									$member_social = $team_meta['member_social_profile'];
								} else {
									$member_social = array();
								}
								?>

                                <div class="<?php echo $col;?>">
                                    <div class="td-single-team-member">
                                        <div class="member-image-wrapper">
											<?php if($member['selected_member_profile']) : ?>
                                            <a class="td-member-details-url" href="<?php the_permalink(); ?>">
                                                <div class="td-member-btn-text td-team-two-plus-button"><i class="flaticon-plus-1"></i></div>
                                            <?php endif; ?>
                                                <div class="member-image">
                                                    <img src="<?php echo $image_src;?>" alt="<?php echo $image_alt;?>" title="<?php echo $image_title;?>">
                                                </div>
                                            <?php if($member['selected_member_profile']) : ?>
                                            </a>
										    <?php endif; ?>
                                        </div>

                                        <div class="td-member-content">
											<?php if($member['selected_member_profile']) : ?>
                                            <a href="<?php the_permalink(); ?>">
												<?php endif; ?>
                                                <h3 class="td-member-name"><?php echo $name;?></h3>
												<?php if($member['selected_member_profile']) : ?>
                                            </a>
										    <?php endif; ?>
                                            <span class="td-member-designation td-secondary-font"><?php echo $designation;?></span>
                                        </div>

	                                    <?php if($member['selected_member_profile']) : ?>
                                            <div class="td-team-member-social">
                                                <ul class="td-list-style td-list-inline">
                                                    <?php
                                                    foreach ( $member_social as $social ) {
                                                        $icon = $social['site_icon'];
                                                        $url  = $social['site_url']; ?>
                                                        <li>
                                                            <a target="_blank" href="<?php echo esc_url($url); ?>">
                                                                <i class="<?php echo $icon; ?>"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
	                                    <?php endif; ?>
                                    </div>
                                </div>
							<?php
							endwhile;
							wp_reset_query();
						}
					}
					?>
                </div>
            </div>
        </div>

		<?php if($settings['enable_slider'] == 'yes') : ?>
            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function () {
                        $("#team-one-wrapper-<?php echo $slider_id;?>").slick({
                            slidesToShow: <?php echo json_encode( $settings['desktop_count'] )?>,
                            autoplay: <?php echo json_encode( $settings['autoplay'] == 'yes' ? true : false ); ?>,
                            autoplaySpeed: <?php echo json_encode( $settings['autoplay_interval'] )?>, //interval
                            speed: 1500, // slide speed
                            dots: <?php echo json_encode( $settings['nav_dots'] == 'yes' ? true : false ); ?>,
                            arrows: <?php echo json_encode( $settings['nav_arrow'] == 'yes' ? true : false ); ?>,
                            prevArrow: '<i class="slick-arrow slick-prev flaticon-long-left-arrow"></i>',
                            nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
                            infinite:  true,
                            pauseOnHover: false,
                            centerMode: false,
                            rows: 1,
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
		<?php endif;?>












		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Team_Member_Two_Widget );