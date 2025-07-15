<?php
namespace Elementor;

class ThemeDraft_Pricing_Table_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_pricing_table';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-pricing';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'pricing_options',
			[
				'label' => esc_html__( 'Pricing Options', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'title',
		    [
		        'label'       => __( 'Title', 'themedraft-core' ),
		        'label_block'       => true,
		        'type'        => Controls_Manager::TEXT,
		        'default'     => 'Regular Plan',
		    ]
		);

		$this->add_control(
			'save_amount_text',
			[
				'label'       => __( 'Save Amount Text', 'themedraft-core' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Save 20%',
			]
		);

		$this->add_control(
			'currency',
			[
				'label'       => __( 'Currency', 'themedraft-core' ),
				'label_block'       => false,
				'type'        => Controls_Manager::TEXT,
				'default'     => '$',
			]
		);

		$this->add_control(
			'price',
			[
				'label'       => __( 'Price', 'themedraft-core' ),
				'label_block'       => false,
				'type'        => Controls_Manager::TEXT,
				'default'     => '23.5',
			]
		);

		$this->add_control(
			'time_duration',
			[
				'label'       => __( 'Duration', 'themedraft-core' ),
				'label_block'       => false,
				'type'        => Controls_Manager::TEXT,
				'default'     => '/Month',
			]
		);

        $this->add_control(
            'desc',
            [
                'label'       => __( 'Description', 'themedraft-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => 'Sed ut persp iciatis unde omnis natus and volu ptatem accustium dolorem.',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'themedraft-core' ),
                'label_block'       => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Choose Plan',
            ]
        );

		$this->add_control(
			'button_link',
			[
				'label'         => __( 'Button Link', 'themedraft-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'themedraft-core' ),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'features_list_settings',
			[
				'label' => esc_html__( 'Pricing Features', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'text',
			[
				'label'       => __( 'Text', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'List Item Text', 'themedraft-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label'            => __( 'Icon', 'themedraft-core' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default'          => [
					'value'   => 'far fa-check-circle',
					'library' => 'regular',
				],
			]
		);

		$repeater->add_control(
			'item_link',
			[
				'label'         => __( 'Link', 'themedraft-core' ),
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

		$repeater->add_control(
            'item_hidden',
            [
                'label'     => esc_html__( 'Item Hidden', 'themedraft-core' ),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
                'label_off' => esc_html__( 'No', 'themedraft-core' ),
                'default'   => 'no',
            ]
        );

		$this->add_control(
			'list_items',
			[
				'label'       => __( 'List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'text' => __( 'List Item Text', 'themedraft-core' ),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
            'pricing_style',
            [
                'label' => esc_html__( 'Pricing Table', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'save_amount_bg',
            [
                'label'       => esc_html__('Save Amount Background', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-save-amount' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label'       => esc_html__('Button Background', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-pricing-button .td-button' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'btn_hover_bg_color',
			[
				'label'       => esc_html__('Button Hover Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-pricing-button .td-button:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
		?>

		<div class="td-pricing-table-wrapper">
			<div class="td-price-top-part td-secondary-font">
				<span class="pricing-title"><?php echo $settings['title'];?></span>
				<?php if($settings['save_amount_text']) : ?>
				<span class="td-save-amount"><?php echo $settings['save_amount_text'];?></span>
				<?php endif; ?>

				<div class="td-price-wrapper">
					<span class="td-currency"><?php echo $settings['currency'];?></span>
					<span class="td-price"><?php echo $settings['price'];?></span>
					<span class="td-subscription-period"><?php echo $settings['time_duration'];?></span>
				</div>
			</div>

			<div class="td-price-desc td-last-p-0">
                <?php echo $settings['desc'];?>
			</div>

			<div class="td-pricing-button">
				<a class="td-button" href="<?php echo $settings['button_link']['url']; ?>" <?php echo $target . $nofollow; ?>><?php echo $settings['btn_text'];?> <i class="fas fa-plus"></i></a>
			</div>

			<div class="td-pricing-features td-secondary-font">
				<ul class="td-list-style">
					<?php
					if ( $settings['list_items'] ) {
						foreach ( $settings['list_items'] as $list_item ) { ?>
                            <li <?php if($list_item['item_hidden'] == 'yes'){ echo 'class="td-hidden"';} ?>>
                                    <span class="td-pricing-list-icon">
                                        <?php ThemeDraft_Custom_Icon_Render( $list_item, 'icon', 'selected_icon' ); ?>
                                    </span>

								<?php if ( ! empty( $list_item['item_link']['url'] ) ) :
								$target = $list_item['item_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $list_item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
								?>
                                <a href="<?php echo $list_item['item_link']['url']; ?>" <?php echo $target . $nofollow; ?>>
									<?php endif;
									?>
									<?php echo $list_item['text']; ?>
									<?php if ( ! empty( $list_item['item_link']['url'] ) ) : ?>
                                </a>
							<?php endif;
							?>
                            </li>
							<?php
						}
					}
					?>
				</ul>
			</div>

		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Pricing_Table_Widget );