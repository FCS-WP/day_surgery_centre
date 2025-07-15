<?php
namespace Elementor;

class ThemeDraft_Service_Box_Four_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_service_box_four';
	}

	public function get_title() {
		return esc_html__( 'Service Box Four', 'themedraft-core' );
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
            'details_url',
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
        $btn_text = $settings['btn_text'];
		?>

		<div class="td-service-four-wrapper">
			<div class="container">
				<div class="row">
                    <?php
                    if($settings['services']){
                        foreach ($settings['services'] as $service){ ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="service-style-two-wrapper">
                                    <div class="service-style-two-item">
                                        <div class="td-service-two-icon td-primary-color">
                                            <?php if ( $service['type'] === 'image' && $service['image']['id'] ) : ?>
                                                <img src="<?php echo $service['image']['url']; ?>"
                                                     alt="<?php echo get_post_meta( $service['image']['id'], '_wp_attachment_image_alt', true ); ?>">
                                            <?php elseif ( ! empty( $service['icon'] ) || ! empty( $service['selected_icon'] ) ) :
                                                themedraft_custom_icon_render( $service, 'icon', 'selected_icon' );
                                            endif; ?>
                                        </div>

                                        <a href="<?php echo $service['details_url']['url'];?>" class="service-two-title td-secondary-font"><?php echo $service['left_title'];?></a>

                                        <div class="service-two-desc">
                                            <?php echo $service['left_desc'];?>
                                        </div>

                                        <div class="service-two-details-btn">
                                            <a class="td-text-button" href="<?php echo $service['details_url']['url'];?>"><?php echo $btn_text;?> <i class="fas fa-angle-double-right"></i></a>
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

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Box_Four_Widget );