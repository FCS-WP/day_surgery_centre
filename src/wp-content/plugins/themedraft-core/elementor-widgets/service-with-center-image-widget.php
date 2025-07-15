<?php
namespace Elementor;

class ThemeDraft_Service_With_Center_Image_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_service_with_center_image';
	}

	public function get_title() {
		return esc_html__( 'Service & Image', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-portfolio';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'swci_left_options',
			[
				'label' => esc_html__( 'Left Services', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'left_title',
			[
				'label'       => __( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => 'Medicine Care'
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
					'value'   => 'flaticon-medicine',
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

		$repeater->add_control(
            'left_desc',
            [
                'label'       => __( 'Description', 'themedraft-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
            ]
        );

		$repeater->add_control(
            'left_url',
            [
                'label'         => __( 'URL', 'themedraft-core' ),
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

		$this->add_control(
			'left_services',
			[
				'label'       => __( 'Service List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'left_title' => 'Medicine Care',
						'left_desc' => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
						'left_read_more' => 'Read More',
					],
				],
				'title_field' => '{{{ left_title }}}',
			]
		);

        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'themedraft-core' ),
                'label_block'       => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Read More',
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'center_image_option',
            [
                'label' => esc_html__( 'Center Image', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'center_image',
            [
                'label'       => __( 'Center Image', 'themedraft-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'description' => __('Use 600x705 image for better user experience','themedraft-core' ),
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'swci_right_options',
			[
				'label' => esc_html__( 'Right Services', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'right_title',
			[
				'label'       => __( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => 'Medicine Care'
			]
		);

		$repeater->add_control(
			'right_type',
			[
				'label'       => esc_html__( 'Icon Type', 'themedraft-core' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'right_icon'  => [
						'title' => esc_html__( 'Icon', 'themedraft-core' ),
						'icon'  => 'fa fa-smile',
					],
					'right_image' => [
						'title' => esc_html__( 'Image', 'themedraft-core' ),
						'icon'  => 'far fa-image',
					],
				],
				'default'     => 'right_icon',
				'toggle'      => false,
			]
		);

		$repeater->add_control(
			'right_selected_icon',
			[
				'label'            => esc_html__( 'Select Icon', 'themedraft-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default'          => [
					'value'   => 'flaticon-medicine',
					'library' => 'themedraft-doctio-icon',
				],
				'condition'        => [
					'right_type' => 'right_icon'
				]
			]
		);

		$repeater->add_control(
			'right_image_icon',
			[
				'label'     => esc_html__( 'Image', 'themedraft-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'right_type' => 'right_image'
				],
				'dynamic'   => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'right_desc',
			[
				'label'       => __( 'Description', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
			]
		);

		$repeater->add_control(
			'right_url',
			[
				'label'         => __( 'URL', 'themedraft-core' ),
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

		$this->add_control(
			'right_services',
			[
				'label'       => __( 'Right List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'right_title' => 'Medicine Care',
						'right_desc' => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
					],
				],
				'title_field' => '{{{ right_title }}}',
			]
		);
		$this->end_controls_section();


        $this->start_controls_section(
            'swci_style_option',
            [
                'label' => esc_html__( 'Style', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-service-two-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-service-two-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label'       => esc_html__('Read More Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-text-button' => 'color: {{VALUE}};',
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

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
        $img_src = $settings['center_image']['url'];
		$image_alt = get_post_meta( $settings['center_image']['id'], '_wp_attachment_image_alt', true );
		$image_title = get_the_title( $settings['center_image']['id']);
        $btn_text = $settings['btn_text'];

		?>

		<div class="td-service-and-center-image-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-12">
						<div class="service-image-left-side">
                            <div class="row">
                                <?php
                                if($settings['left_services']){
                                    foreach ($settings['left_services'] as $left_service){ ?>
                                        <div class="col-xl-12 col-lg-6 col-md-6">
                                            <div class="service-style-two-wrapper">
                                                <div class="service-style-two-item">
                                                    <div class="td-service-two-icon td-primary-color">
	                                                    <?php if ( $left_service['type'] === 'image' && $left_service['image']['id'] ) : ?>
                                                            <img src="<?php echo $left_service['image']['url']; ?>"
                                                                 alt="<?php echo get_post_meta( $left_service['image']['id'], '_wp_attachment_image_alt', true ); ?>">
	                                                    <?php elseif ( ! empty( $left_service['icon'] ) || ! empty( $left_service['selected_icon'] ) ) :
		                                                    themedraft_custom_icon_render( $left_service, 'icon', 'selected_icon' );
	                                                    endif; ?>
                                                    </div>

                                                    <a href="<?php echo $left_service['left_url']['url'];?>" class="service-two-title td-secondary-font"><?php echo $left_service['left_title'];?></a>

                                                    <div class="service-two-desc">
	                                                    <?php echo $left_service['left_desc'];?>
                                                    </div>

                                                    <div class="service-two-details-btn">
                                                        <a class="td-text-button" href="<?php echo $left_service['left_url']['url'];?>"><?php echo $btn_text;?> <i class="fas fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php    }
                                }
                                ?>
                            </div>
						</div>
					</div>

					<div class="col-xl-4 td-service-image-col">
						<div class="td-service-image-wrapper">
                            <div class="td-service-image">
                                <img src="<?php echo $img_src;?>" alt="<?php echo $image_alt?>" title="<?php echo $image_title;?>">
						    </div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-12">
						<div class="service-image-right-side">
                            <div class="row">
	                            <?php
	                            if($settings['right_services']){
		                            foreach ($settings['right_services'] as $right_service){ ?>
                                        <div class="col-xl-12 col-lg-6 col-md-6">
                                            <div class="service-style-two-wrapper">
                                                <div class="service-style-two-item">
                                                    <div class="td-service-two-icon td-primary-color">
							                            <?php if ( $right_service['right_type'] === 'right_image' && $right_service['right_image_icon']['id'] ) : ?>
                                                            <img src="<?php echo $right_service['right_image_icon']['url']; ?>"
                                                                 alt="<?php echo get_post_meta( $left_service['right_image_icon']['id'], '_wp_attachment_image_alt', true ); ?>">
							                            <?php elseif ( ! empty( $right_service['right_icon'] ) || ! empty( $right_service['right_selected_icon'] ) ) :
								                            themedraft_custom_icon_render( $right_service, 'right_icon', 'right_selected_icon' );
							                            endif; ?>
                                                    </div>

                                                    <a href="<?php echo $right_service['right_url']['url'];?>" class="service-two-title td-secondary-font"><?php echo $right_service['right_title'];?></a>

                                                    <div class="service-two-desc">
							                            <?php echo $right_service['right_desc'];?>
                                                    </div>

                                                    <div class="service-two-details-btn">
                                                        <a class="td-text-button" href="<?php echo $right_service['right_url']['url'];?>"><?php echo $btn_text;?> <i class="fas fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
		                            <?php    }
	                            }
	                            ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_With_Center_Image_Widget );