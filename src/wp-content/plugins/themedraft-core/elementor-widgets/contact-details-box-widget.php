<?php
namespace Elementor;

class ThemeDraft_Contact_Details_Box_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_contact_details_box';
	}

	public function get_title() {
		return esc_html__( 'Contact Details', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-mail';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'contact_details_options',
			[
				'label' => esc_html__( 'Contact Details Box', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Call Now',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'details_text',
			[
				'label'       => __( 'Details', 'themedraft-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => '<ul>
                                        <li><a href="tel:1234567890">+410 123 456 789</a></li>
                                        <li><a href="tel:1234567890">+410 987 654 321</a></li>
                                    </ul>',
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
						'icon'  => 'far fa-smile',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'themedraft-core' ),
						'icon'  => 'fa fa-image',
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
					'value'   => 'flaticon-telephone-1',
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

		$this->add_control(
			'contacts',
			[
				'label'       => __( 'Contact List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Call Now',
						'details_text' => '<ul>
                                        <li><a href="tel:1234567890">+410 123 456 789</a></li>
                                        <li><a href="tel:1234567890">+410 987 654 321</a></li>
                                    </ul>',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

        // Start Style section
        $this->start_controls_section(
            'contact_box_style_options',
            [
                'label' => esc_html__('Contact Details Box', 'themedraft-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('contact_box_style_tabs');

        //Default style tab start
        $this->start_controls_tab(
            'td_box_style_default',
            [
                'label' => esc_html__('Normal', 'themedraft-core'),
            ]
        );

		$this->add_control(
			'box_bg_color',
			[
				'label'       => esc_html__('Box Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-contact-details-box' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'icon_bg_color',
            [
                'label'       => esc_html__('Icon Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-contact-details-box-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-contact-details-box-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-contact-details-box-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();//Default style tab end

        //Hover style tab start
        $this->start_controls_tab(
            'td_box_style_hover',
            [
                'label' => esc_html__('Hover', 'themedraft-core'),
            ]
        );

		$this->add_control(
		    'box_hover_bg_color',
		    [
		        'label'       => esc_html__('Box Background Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .td-contact-details-box:hover' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
			'hover_icon_bg_color',
			[
				'label'       => esc_html__('Icon Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-contact-details-box:hover .td-contact-details-box-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label'       => esc_html__('Icon Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-contact-details-box:hover .td-contact-details-box-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .td-contact-details-box:hover .td-contact-details-box-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tabs();//Hover style tab end

        $this->end_controls_section();// End Button section

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="contact-details container">
            <div class="row">
                <?php if ( $settings['contacts'] ) {
                    foreach ( $settings['contacts'] as $contact ) { ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="td-contact-details-box td-transition">
                                <div class="td-contact-details-box-icon  td-transition td-primary-color">
                                    <?php if ( $contact['type'] === 'image' ) :
                                        if ( $contact['image']['url'] || $contact['image']['id'] ) :
                                            ?>

                                            <img src="<?php echo $contact['image']['url']; ?>"
                                                 alt="<?php echo get_post_meta( $contact['image']['id'], '_wp_attachment_image_alt', true ); ?>">

                                        <?php endif;
                                    elseif ( ! empty( $contact['icon'] ) || ! empty( $contact['selected_icon'] ) ) : ?>

                                        <?php themedraft_custom_icon_render( $contact, 'icon', 'selected_icon' ); ?>

                                    <?php endif; ?>
                                </div>
                                <h4 class="td-contact-box-title td-transition"><?php echo $contact['title']; ?></h4>

                                <?php echo $contact['details_text']; ?>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Contact_Details_Box_Widget );