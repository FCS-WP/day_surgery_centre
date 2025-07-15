<?php
namespace Elementor;

class ThemeDraft_Service_Box_Three_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_service_box_three';
	}

	public function get_title() {
		return esc_html__( 'Service Box Three', 'themedraft-core' );
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
				'default'     => 'Medicine Care'
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
			'desc',
			[
				'label'       => __( 'Description', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
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
						'title' => 'Medicine Care',
						'desc' => 'Sit consectetur adipiscin elit sed do eiusmod tempor',
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
				'default' => 'col-xl-4',
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

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$btn_text = $settings['btn_text'];
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'];
		?>

        <div class="td-service-box-three-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if($settings['services']){
                        foreach ($settings['services'] as $service){
                            $service_img_src = $service['service_image']['url'];
                            ?>
                            <div class="<?php echo $col;?>">
                                <div class="service-style-two-wrapper">
                                    <div class="td-service-image td-cover-bg" style="background-image: url(<?php echo $service_img_src;?>)"></div>

                                    <div class="service-style-two-item">
                                        <div class="td-service-two-icon td-primary-color">
                                            <?php if ( $service['type'] === 'image' && $service['image']['id'] ) : ?>
                                                <img src="<?php echo $service['image']['url']; ?>"
                                                     alt="<?php echo get_post_meta( $service['image']['id'], '_wp_attachment_image_alt', true ); ?>">
                                            <?php elseif ( ! empty( $service['icon'] ) || ! empty( $service['selected_icon'] ) ) :
                                                themedraft_custom_icon_render( $service, 'icon', 'selected_icon' );
                                            endif; ?>
                                        </div>

                                        <a href="<?php echo $service['details_link']['url'];?>" class="service-two-title td-secondary-font"><?php echo $service['title'];?></a>

                                        <div class="service-two-desc">
                                            <?php echo $service['desc'];?>
                                        </div>

                                        <div class="service-two-details-btn">
                                            <a class="td-text-button" href="<?php echo $service['details_link']['url'];?>"><?php echo $btn_text;?> <i class="fas fa-angle-double-right"></i></a>
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

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Box_Three_Widget );