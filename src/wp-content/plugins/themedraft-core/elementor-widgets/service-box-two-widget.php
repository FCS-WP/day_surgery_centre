<?php
namespace Elementor;

class ThemeDraft_Service_Box_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_service_box_two';
	}

	public function get_title() {
		return esc_html__( 'Service Box Two', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-portfolio';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_two_options',
			[
				'label' => esc_html__( 'Service Box', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Neuro Surgery',
				'label_block' => true,
			]
		);

		$repeater->add_control(
		    'subtitle',
		    [
		        'label'       => __( 'Subtitle', 'themedraft-core' ),
		        'label_block'       => true,
		        'type'        => Controls_Manager::TEXT,
		        'default'     => 'Neurology',
		    ]
		);

		$repeater->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'themedraft-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => '<p>Best Medical & Health Care</p>',
				'label_block' => true,
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
					'value'   => 'flaticon-neurology',
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
			'service_image',
			[
				'label'       => __( 'Service Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'details_url',
			[
				'label'         => __( 'Details Url', 'themedraft-core' ),
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
			'services',
			[
				'label'       => __( 'Service List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Neuro Surgery',
						'subtitle' => 'Neurology',
						'desc' => '<p>Best Medical & Health Care</p>',
					],
				],
				'title_field' => '{{{ title }}}',
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
			'service_column',
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
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'service_two_style_option',
            [
                'label' => esc_html__( 'Service Box', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label'       => esc_html__('Icon Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-service-item-two-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'icon_color',
			[
				'label'       => esc_html__('Icon Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-service-item-two-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .td-service-item-two-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => esc_html__( 'Icon Box Shadow', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-service-item-two-icon',
			]
		);

        $this->add_control(
            'subtitle_color',
            [
                'label'       => esc_html__('Subtitle Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-service-two-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label'       => esc_html__('Read More Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-service-two-item .td-text-button' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'read_more_hover_color',
			[
				'label'       => esc_html__('Read More Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-service-two-item .td-text-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
            'thumbnail_height',
            [
                'label' => esc_html__( 'Thumbnail Height', 'themedraft-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],

                'selectors' => [
                    '{{WRAPPER}} .td-service-two-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'wrapper_padding',
            [
                'label'      => esc_html__( 'Wrapper Padding', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .service-two-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'];
		?>

		<div class="service-two-wrapper">
			<div class="row">
				<?php if($settings['services']){
					foreach ($settings['services'] as $service){
						$url      = $service['details_url']['url'];
						$target   = $service['details_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $service['details_url']['nofollow'] ? ' rel="nofollow"' : '';
                        ?>
						<div class="<?php echo $col;?>">
							<div class="td-service-two-item">
								<a href="<?php echo esc_url($url);?>" class="td-service-image-and-icon-wrapper" <?php echo $target . $nofollow;?>>
									<div class="td-service-two-image td-cover-bg" style="background-image: url(<?php echo $service['service_image']['url'];?>)">
                                        <div class="td-service-item-two-icon">
                                            <?php if ( $service['type'] === 'image' && $service['image']['id'] ) : ?>
                                            <img src="<?php echo $service['image']['url']; ?>"
                                            alt="<?php echo get_post_meta( $service['image']['id'], '_wp_attachment_image_alt', true ); ?>">
                                            <?php elseif ( ! empty( $service['icon'] ) || ! empty( $service['selected_icon'] ) ) :
                                            themedraft_custom_icon_render( $service, 'icon', 'selected_icon' );
                                            endif; ?>
                                        </div>
                                    </div>
								</a>

                                <div class="td-service-two-content">
                                    <span class="td-service-two-subtitle td-secondary-color"><?php echo $service['subtitle'];?></span>
                                    <h4 class="td-service-two-title"><?php echo $service['title'];?></h4>
                                    <div class="td-service-two-desc td-last-p-0">
                                        <?php echo $service['desc'];?>
                                    </div>
                                    <div class="service-two-details-btn">
                                        <a class="td-text-button" href="<?php echo esc_url($url);?>" <?php echo $target . $nofollow;?>><?php echo $settings['btn_text'];?> <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>


							</div>
						</div>
				<?php	}
				} ?>
			</div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Box_Two_Widget );