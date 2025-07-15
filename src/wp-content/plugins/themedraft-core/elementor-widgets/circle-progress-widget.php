<?php
namespace Elementor;

class ThemeDraft_Circle_Progress_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_circle_progress';
	}

	public function get_title() {
		return esc_html__( 'Circle Progress', 'themedraft-core' );
	}

	public function get_icon() {

		return 'fas fa-circle-notch';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	public function get_script_depends() {
		return ['circle-progress','counterup'];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'circle_progress_options',
			[
				'label' => esc_html__( 'Circle Progress', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'mission_title',
			[
				'label'       => __('Title', 'themedraft-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Health & Medical Services',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'number',
			[
				'label'       => esc_html__('Percentage Number', 'themedraft-core'),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'max'         => 100,
				'step'        => 1,
				'default'     => 90,
			]
		);

		$repeater->add_control(
			'unit',
			[
				'label'       => __('Unit', 'themedraft-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => '%',
			]
		);

		$repeater->add_control(
			'background_color',
			[
				'label'       => esc_html__('Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'default'   => '#eff1f2'
			]
		);

		$repeater->add_control(
			'fill_color',
			[
				'label'       => esc_html__('Fill Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'default'   => '#e12354'
			]
		);

		$this->add_control(
			'progress_bars',
			[
				'label'       => __('Circle List', 'themedraft-core'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'mission_title'        => 'Health & Medical Services',
						'number'        => 90,
						'unit'        => '%',
					],
				],
				'title_field' => '{{{ mission_title }}}',
			]
		);

		$this->add_control(
			'xl_col',
			[
				'label'   => __( 'Columns On Desktop', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'td-col-xl-5',
				'options' => [
					'col-xl-12' => __( '1 Column', 'themedraft-core' ),
					'col-xl-6'  => __( '2 Column', 'themedraft-core' ),
					'col-xl-4'  => __( '3 Column', 'themedraft-core' ),
					'col-xl-3'  => __( '4 Column', 'themedraft-core' ),
					'td-col-xl-5'  => __( '5 Column', 'themedraft-core' ),
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
				'default' => 'col-md-3',
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
				'label'   => __( 'Columns On iPad', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-12',
				'options' => [
					'col-12' => __( '1 Column', 'themedraft-core' ),
					'col-6'  => __( '2 Column', 'themedraft-core' ),
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'circle_style',
			[
				'label' => esc_html__( 'Circle Style', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'       => esc_html__('Text Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-circle-progress-title,{{WRAPPER}} .td-single-circle-progress .td-count-number-unit' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
            'item_margin',
            [
                'label'      => esc_html__( 'Item Margin', 'themedraft-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .td-single-circle-progress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$count_id = rand(100, 10000);
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'] . ' ' . $settings['sm_col'];
		?>

		<div class="td-circle-progress-wrapper" id="circle-wrapper-id-<?php echo $count_id;?>">
            <div class="row">
                <?php
                if ($settings['progress_bars']) {
                    $bar_number = 0;
                    foreach ($settings['progress_bars'] as $bar) {
                        $bar_number++;
                        if($bar['number'] == 100){
                            $output_number = 1;
                        }else if($bar['number'] < 10){
                            $output_number = '.0'.$bar['number'];
                        }else{
                            $output_number = '.'.$bar['number'];
                        }
                        ?>

                        <div class="<?php echo $col;?>">
                            <div class="td-single-circle-progress">
                                <div class="td-circle-progress-item">
                                    <div class="td-circle-progress-box">
                                        <div id="bar-<?php echo $count_id.$bar_number;?>"></div>
                                        <div class="td-count-number-unit">
                                            <span class="td-count-number"><?php echo $bar['number'];?></span>
                                            <span><?php echo $bar['unit'];?></span>
                                        </div>
                                    </div>
                                    <p class="td-secondary-font">
                                        <span class="td-circle-progress-title"><?php echo $bar['mission_title'];?></span>
                                    </p>
                                </div>

                                <script>
                                    (function ($) {
                                        "use strict";
                                        jQuery(document).ready(function ($) {
                                            $('#bar-<?php echo $count_id.$bar_number;?>').circleProgress({
                                                value: "<?php echo $output_number;?>",
                                                size: 120,
                                                lineCap: "round",
                                                emptyFill: "<?php echo $bar['background_color'];?>",
                                                thickness: "7",
                                                fill: { color: "<?php echo $bar['fill_color'];?>"}

                                            });
                                        });
                                    }(jQuery));
                                </script>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            </div>

			<script>
                (function ($) {
                    "use strict";
                    jQuery(document).ready(function($){
                        $("#circle-wrapper-id-<?php echo $count_id;?> .td-count-number").counterUp({
                            delay: 10,
                            time: 2000
                        });
                    });
                }(jQuery));
			</script>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Circle_Progress_Widget );