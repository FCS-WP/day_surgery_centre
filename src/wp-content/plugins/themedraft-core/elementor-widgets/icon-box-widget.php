<?php
namespace Elementor;

class ThemeDraft_Icon_Box_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_icon_box';
	}

	public function get_title() {
		return esc_html__( 'Icon Box', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-medicine';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'icon_box_option',
			[
				'label' => esc_html__( 'Icon Box', 'themedraft-core' ),
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

		$this->add_control(
		    'icon_boxes',
		    [
		        'label'       => __( 'Icon Box List', 'themedraft-core' ),
		        'type'        => Controls_Manager::REPEATER,
		        'fields'      => $repeater->get_controls(),
		        'default'     => [
		            [
		                'title' => 'Medicine Care',
		            ],
		        ],
		        'title_field' => '{{{ title }}}',
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_box_column',
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
				'default' => 'col-lg-2',
				'options' => [
					'col-lg-12' => __( '1 Column', 'themedraft-core' ),
					'col-lg-6'  => __( '2 Column', 'themedraft-core' ),
					'col-lg-4'  => __( '3 Column', 'themedraft-core' ),
					'col-lg-3'  => __( '4 Column', 'themedraft-core' ),
					'td-col-lg-5'  => __( '5 Column', 'themedraft-core' ),
					'col-lg-2'  => __( '6 Column', 'themedraft-core' ),
				],
			]
		);

		$this->add_control(
			'md_col',
			[
				'label'   => __( 'Columns On iPad', 'themedraft-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-2',
				'options' => [
					'col-md-12' => __( '1 Column', 'themedraft-core' ),
					'col-md-6'  => __( '2 Column', 'themedraft-core' ),
					'col-md-4'  => __( '3 Column', 'themedraft-core' ),
					'col-md-3'  => __( '4 Column', 'themedraft-core' ),
					'td-col-md-5'  => __( '5 Column', 'themedraft-core' ),
					'col-md-2'  => __( '6 Column', 'themedraft-core' ),
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

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'] . ' ' . $settings['sm_col'];
		?>

		<div class="td-icon-bpx-wrapper">
			<div class="row">
				<?php if ($settings['icon_boxes']) {
					foreach ($settings['icon_boxes'] as $icon_box) { ?>
						<div class="<?php echo $col;?>">
							<div class="td-icon-box">
								<div class="td-icon-box-icon td-primary-color">
									<?php if ($icon_box['type'] === 'image' && $icon_box['image']['id']) : ?>
										<img src="<?php echo $icon_box['image']['url']; ?>"
										     alt="<?php echo get_post_meta($icon_box['image']['id'], '_wp_attachment_image_alt', true); ?>">
									<?php elseif (!empty($icon_box['icon']) || !empty($icon_box['selected_icon'])) :
										themedraft_custom_icon_render($icon_box, 'icon', 'selected_icon');
									endif; ?>
								</div>

								<h6 class="td-icon-title">
									<?php echo nl2br($icon_box['title']);?>
								</h6>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Icon_Box_Widget );