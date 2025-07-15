<?php
namespace Elementor;

class ThemeDraft_Service_Minimal_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_service_minimal';
	}

	public function get_title() {
		return esc_html__( 'Service Minimal', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-portfolio';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_minimal_options',
			[
				'label' => esc_html__( 'Services', 'themedraft-core' ),
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
				'default'     => 'Pediatric Dentistry'
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
			'details_link',
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
			'services',
			[
				'label'       => __( 'Service List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Pediatric Dentistry',
					],
				],
				'title_field' => '{{{ title }}}',
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
				'default' => 'col-xl-2',
				'options' => [
					'col-xl-12' => __( '1 Column', 'themedraft-core' ),
					'col-xl-6'  => __( '2 Column', 'themedraft-core' ),
					'col-xl-4'  => __( '3 Column', 'themedraft-core' ),
					'col-xl-3'  => __( '4 Column', 'themedraft-core' ),
					'col-xl-2'  => __( '6 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'lg_col',
			[
				'label'   => __( 'Columns On iPad Pro', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
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
				'default' => 'col-md-4',
				'options' => [
					'col-md-12' => __( '1 Column', 'themedraft-core' ),
					'col-md-6'  => __( '2 Column', 'themedraft-core' ),
					'col-md-4'  => __( '3 Column', 'themedraft-core' ),
					'col-md-3'  => __( '4 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'sm_col',
			[
				'label'   => __( 'Columns On Mobile', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-6',
				'options' => [
					'col-12' => __( '1 Column', 'themedraft-core' ),
					'col-6'  => __( '2 Column', 'themedraft-core' ),
				],
			]
		);

		$this->end_controls_section();


        // Start Service Style section
        $this->start_controls_section(
            'td_service_style_options',
            [
                'label' => esc_html__('Service Box', 'themedraft-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('td_service_style_tabs');

        //Default style tab start
        $this->start_controls_tab(
            'td_service_style_default',
            [
                'label' => esc_html__('Normal', 'themedraft-core'),
            ]
        );

        $this->add_control(
            'service_default_bg',
            [
                'label'     => esc_html__('Background Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-minimal-service-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'default_default_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'themedraft-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .td-service-two-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-service-two-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'default_default_text_color',
            [
                'label'       => esc_html__('Text Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-minimal-service-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();//Default style tab end

        //Hover style tab start
        $this->start_controls_tab(
            'td_service_style_hover',
            [
                'label' => esc_html__('Hover', 'themedraft-core'),
            ]
        );

		$this->add_control(
			'service_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-minimal-service-item:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'default_hover_icon_color',
			[
				'label'     => esc_html__('Icon Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .td-minimal-service-item:hover .td-service-two-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .td-minimal-service-item:hover .td-service-two-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'default_hover_text_color',
			[
				'label'       => esc_html__('Text Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-minimal-service-item:hover .td-minimal-service-title' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tabs();//Hover style tab end

		$this->add_responsive_control(
			'wrapper_padding',
			[
				'label'      => esc_html__( 'Container Padding', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .td-minimal-service-wrapper .container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();// End Button section

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'] . ' ' . $settings['sm_col'];
		?>

		<div class="td-minimal-service-wrapper">
			<div class="container">
				<div class="row">
					<?php
					if ( $settings['services'] ) {
						foreach ( $settings['services'] as $service ) {
							?>
							<div class="<?php echo $col;?>">
								<a href="<?php echo $service['details_link']['url'];?>" class="td-minimal-service-item">
									<div class="td-service-two-icon td-secondary-color">
										<?php if ( $service['type'] === 'image' && $service['image']['id'] ) : ?>
											<img src="<?php echo $service['image']['url']; ?>"
											     alt="<?php echo get_post_meta( $service['image']['id'], '_wp_attachment_image_alt', true ); ?>">
										<?php elseif ( ! empty( $service['icon'] ) || ! empty( $service['selected_icon'] ) ) :
											themedraft_custom_icon_render( $service, 'icon', 'selected_icon' );
										endif; ?>
									</div>

									<h6 class="td-minimal-service-title"><?php echo nl2br($service['title']);?></h6>
								</a>
							</div>
						<?php }
					}
					?>
				</div>
			</div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Minimal_Widget );