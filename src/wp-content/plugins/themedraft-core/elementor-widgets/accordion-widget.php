<?php
namespace Elementor;

class ThemeDraft_Accordion_Widget extends Widget_Base{

	public function get_name(){

		return "themeDraft_accordion";
	}
	public function get_title(){
		return esc_html__("Accordion","themedraft-core");
	}
	public function get_icon() {

		return "eicon-accordion";
	}
	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	protected function register_controls(){
		$this->start_controls_section(
			'accordion_content_options',
			[
				'label' => esc_html__( 'Accordion', 'themedraft-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'accordion_title',
			[
				'label'       => esc_html__( 'Accordion Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default' => 'Accordion Title Here',
				'placeholder' => esc_html__( 'Type Accordion Title Here', 'themedraft-core' ),
			]
		);

		$repeater->add_control(
			'accordion_content', [
				'label' => esc_html__( 'Accordion Content', 'themedraft-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'We will give you a complete account of the system and expound is theen teachings of the great explorer of the truth the master builder of human happiness no because it is pleasure.',
				'label_block' => true,
			]
		);

		$this->add_control(
			'accordion_list',
			[
				'label' => __( 'Accordion Lists', 'themedraft-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => 'Accordion Title Here',
						'accordion_content' => 'We will give you a complete account of the system and expound is theen teachings of the great explorer of the truth the master builder of human happiness no because it is pleasure.',
					],
				],
				'title_field' => '{{{ accordion_title }}}',
			]
		);

		$this->add_control(
			'open_by_default',
			[
				'label'       => esc_html__('Open By Default', 'themedraft-core'),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'max'         => 1000,
				'step'        => 1,
				'default'     => 1,
				'separator'     => 'before',
				'description' => esc_html__('Which accordion you want to open by default.', 'themedraft-core'),
			]
		);

		$this->add_control(
			'show_accordion_number',
			[
				'label'     => esc_html__( 'Show Number', 'themedraft-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
				'label_off' => esc_html__( 'No', 'themedraft-core' ),
				'default'   => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'accordion_style',
			[
				'label' => esc_html__( 'Accordion', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Title Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .td-accordion-wrapper .accordion-button',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'       => esc_html__('Title Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-accordion-wrapper .accordion-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label'       => esc_html__('Title Active Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-accordion-wrapper .accordion-button:hover,
					{{WRAPPER}} .td-accordion-wrapper .accordion-button:not(.collapsed)' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'title_background',
            [
                'label'       => esc_html__('Title Background', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-accordion-wrapper .accordion-button.collapsed' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'title_hover_background',
			[
				'label'       => esc_html__('Title Hover Background', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-accordion-wrapper .accordion-button:hover, {{WRAPPER}} .td-accordion-wrapper .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'       => esc_html__('Border Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-accordion-wrapper .accordion-button, {{WRAPPER}} .td-accordion-wrapper .accordion-body' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'       => esc_html__('Description Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-accordion-wrapper .accordion-body' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .td-accordion-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
	}

	//Render In HTML
	protected function render() {
		$settings = $this->get_settings_for_display();
		$id = rand(100, 100000);
		?>
        <div class="td-accordion-wrapper td-accordion-wrapper-<?php echo $id;?>">
            <div class="accordion" id="td-accordion-<?php echo $id;?>">

				<?php
				if($settings['accordion_list']){
					$i = 0;
					foreach($settings['accordion_list'] as $accordionItem){
						$i++;

						if ($i < 10){
							$numb = '0' . $i;
						}else{
							$numb =  $i;
						}

						if($i == $settings['open_by_default']){
							$show = 'show';
							$open = 'true';
							$collapsed = '';
						}else{
							$show = '';
							$open = 'false';
							$collapsed = 'collapsed';
						}

						?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php echo $collapsed;?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i.$id;?>" aria-expanded="<?php echo $open;?>" aria-controls="collapse-<?php echo $i.$id;?>">
									<?php
									if($settings['show_accordion_number'] == 'yes'){
										echo $numb .'. ' .$accordionItem['accordion_title'];
									}else{
										echo $accordionItem['accordion_title'];
									}
									?>
                                </button>
                            </h2>

                            <div id="collapse-<?php echo $i.$id;?>" class="accordion-collapse collapse <?php echo $show ?>" data-bs-parent="#td-accordion-<?php echo $id;?>">
                                <div class="accordion-body">
									<?php echo wp_kses_post( $accordionItem['accordion_content']) ?>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
        </div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register( new ThemeDraft_Accordion_Widget );