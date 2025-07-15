<?php
namespace Elementor;

class ThemeDraft_Title_With_Text_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_title_with_text';
	}

	public function get_title() {
		return esc_html__( 'Title With Text', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'title_with_text_options',
			[
				'label' => esc_html__( 'Title With Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'title',
		    [
		        'label'       => __( 'Title', 'themedraft-core' ),
		        'type'        => Controls_Manager::TEXTAREA,
		        'rows'        => 5,
		        'default'     => 'Neurology Care Department',
		    ]
		);

		$this->add_control(
		    'title_tag',
		    [
		        'label'   => __( 'Title Tag', 'themedraft-core' ),
		        'type'    => Controls_Manager::SELECT,
		        'default' => 'h2',
		        'options' => [
		            'h1' => __( 'H1', 'themedraft-core' ),
		            'h2' => __( 'H2', 'themedraft-core' ),
		            'h3' => __( 'H3', 'themedraft-core' ),
		            'h4' => __( 'H4', 'themedraft-core' ),
		            'h5' => __( 'H5', 'themedraft-core' ),
		            'h6' => __( 'H6', 'themedraft-core' ),
		        ],
                'condition' => [
                    'title!' => '',
                ],
		    ]
		);

		$this->add_control(
		    'desc',
		    [
		        'label'       => __( 'Description', 'themedraft-core' ),
		        'type'        => Controls_Manager::WYSIWYG,
		        'default'     => 'Description text here',
		        'label_block' => true,
		    ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
		    'title_with_text_title_style',
		    [
		        'label' => esc_html__( 'Title', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		        'condition' => [
			        'title!' => '',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .td-title-with-text-wrapper .title',
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label'       => esc_html__('Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .td-title-with-text-wrapper .title' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'title_margin',
		    [
		        'label'      => esc_html__( 'Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .td-title-with-text-wrapper .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    'description_style',
		    [
		        'label' => esc_html__( 'Description', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'desc_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .td-title-with-text-wrapper .desc',
		    ]
		);

		$this->add_control(
		    'desc_color',
		    [
		        'label'       => esc_html__('Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}}  .td-title-with-text-wrapper .desc' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'desc_margin',
		    [
		        'label'      => esc_html__( 'Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}}  .td-title-with-text-wrapper .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    'wrapper_style',
		    [
		        'label' => esc_html__( 'Wrapper', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'wrapper_margin',
		    [
		        'label'      => esc_html__( 'Wrapper Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .td-title-with-text-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		            '{{WRAPPER}} .td-title-with-text-wrapper' => 'text-align: {{VALUE}};',
		        ],

		    ]
		);

		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title_tag = $settings['title_tag'];
		?>

		<div class="td-title-with-text-wrapper">
        <?php if (!empty($settings['title'])) :?>
			<<?php echo $title_tag;?> class="title"><?php echo $settings['title'];?></<?php echo $title_tag;?>>
            <?php endif; ?>
            <div class="desc">
                <?php echo $settings['desc'];?>
            </div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Title_With_Text_Widget );