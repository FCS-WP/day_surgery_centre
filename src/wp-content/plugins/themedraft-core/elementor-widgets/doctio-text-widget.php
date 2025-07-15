<?php
namespace Elementor;

class ThemeDraft_Text_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_text';
	}

	public function get_title() {
		return esc_html__( 'Doctio Text', 'themedraft-core' );
	}

	public function get_icon() {
		return 'eicon-text';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'td_text_options',
			[
				'label' => esc_html__( 'ThemeDraft Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'td_text',
		    [
			    'label'       => __( 'Text', 'themedraft-core' ),
		        'type'        => Controls_Manager::WYSIWYG,
			    'default'     => 'Sed ut pers piciatis unde omnis iste natus error sit volu ptatem accus antium one dolor emque laudan tium, totam rem aperiam, eaque ipsa quae ab illo invetore off veritatis et quasi <a href="#">and visit our service page</a> architecto beatae vitae dicta suntpli. Nemoe ipsam volup and tate quia voluptas sit aspernatur aut odit aut fugit, sedon quia cquuntur magni dolores eos qui ratione.',
		        'label_block' => true,
		    ]
		);

        $this->add_control(
            'text_button',
            [
                'label'       => __( 'Button Text', 'themedraft-core' ),
                'label_block'       => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'text_btn_url',
            [
                'label'         => __( 'Button URL', 'themedraft-core' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
		    'td_text_style_option',
		    [
		        'label' => esc_html__( 'ThemeDraft Text', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'td_text_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} div.td-text-wrapper',
		    ]
		);

		$this->add_control(
		    'td_text_color',
		    [
		        'label'       => esc_html__('Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} div.td-text-wrapper' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'td_text_a_color',
		    [
		        'label'       => esc_html__('Link Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} div.td-text-wrapper a' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
			'td_text_a_hover_color',
			[
				'label'       => esc_html__('Link Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} div.td-text-wrapper a:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'list_icon_color',
            [
                'label'       => esc_html__('List Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} div.td-text-wrapper ul li:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_btn_color',
            [
                'label'       => esc_html__('Text Button Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} div.td-text-wrapper div.td-text-btn-wrapper a.td-text-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'text_button!' => '',
                ],
            ]
        );

		$this->add_control(
			'text_btn_hover_color',
			[
				'label'       => esc_html__('Text Button Hover Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} div.td-text-wrapper div.td-text-btn-wrapper a.td-text-button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'text_button!' => '',
				],
			]
		);

		$this->add_responsive_control(
		    'text_align',
		    [
		        'label'       => esc_html__('Text Align', 'themedraft-core'),
		        'type'        => Controls_Manager::CHOOSE,
		        'label_block' => false,

		        'options' => [
		            'left' => [
		                'title' => __('Left', 'themedraft-core'),
		                'icon'  => 'eicon-text-align-left',
		            ],

		            'center' => [
		                'title' => __('Center', 'themedraft-core'),
		                'icon'  => 'eicon-text-align-center',
		            ],

		            'right' => [
		                'title' => __('Right', 'themedraft-core'),
		                'icon'  => 'eicon-text-align-right',
		            ],
		        ],

		        'devices' => ['desktop', 'tablet', 'mobile'],

		        'selectors' => [
		            '{{WRAPPER}} div.td-text-wrapper' => 'text-align: {{VALUE}};',
		        ],

		    ]
		);

        $this->add_responsive_control(
            'wrapper_margin',
            [
                'label'      => esc_html__( 'Wrapper Margin', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} div.td-text-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control(
			'list_margin',
			[
				'label'      => esc_html__( 'List Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} div.td-text-wrapper ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
        $target   = $settings['text_btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['text_btn_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>

		<div class="td-text-wrapper">
			<?php echo $settings['td_text'];?>

            <?php if($settings['text_button']) : ?>

            <div class="td-text-btn-wrapper">
                <a class="td-text-button" href="<?php echo $settings['text_btn_url']['url'];?>" <?php echo $target . $nofollow?>><?php echo $settings['text_button'];?> <i class="fas fa-angle-double-right"></i></a>
            </div>
            <?php endif; ?>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Text_Widget );