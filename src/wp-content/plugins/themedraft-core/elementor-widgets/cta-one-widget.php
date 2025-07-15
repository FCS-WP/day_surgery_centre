<?php
namespace Elementor;

class ThemeDraft_CTA_One_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_cta_one';
	}

	public function get_title() {
		return esc_html__( 'CTA One', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-action';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'cta_options',
			[
				'label' => esc_html__( 'CTA Text', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'cta_text',
            [
                'label'       => __( 'CTA Text', 'themedraft-core' ),
                'type'        => Controls_Manager::WYSIWYG,
                'default'     => '<strong>Ready to get our medical care?</strong> We’re always wait for serve you, <a href="#">Make an Appointment.</a>',
                'label_block' => true,
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'cta_style_option',
            [
                'label' => esc_html__( 'Cta Text', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-cta-one-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'text_color',
            [
                'label'       => esc_html__('Text Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-cta-one-wrapper,{{WRAPPER}} .td-cta-one-wrapper a,{{WRAPPER}} .cta-one-text a:hover,{{WRAPPER}} .cta-one-text strong' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .td-cta-one-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="td-cta-one-wrapper td-primary-bg td-secondary-font">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="cta-one-text text-center">
							<?php echo $settings['cta_text'];?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_CTA_One_Widget );