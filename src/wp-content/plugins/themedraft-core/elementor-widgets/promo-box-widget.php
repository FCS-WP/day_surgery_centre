<?php
namespace Elementor;

class ThemeDraft_Promo_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_promo_box';
	}

	public function get_title() {
		return esc_html__( 'Promo Box', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-megaphone';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'promo_box_options',
			[
				'label' => esc_html__( 'Promo Box', 'themedraft-core' ),
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
				'default'     => 'Experienced Doctors'
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
					'value'   => 'flaticon-doctor',
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
                'type'        => Controls_Manager::WYSIWYG,
                'default'     => 'Sed perspi ciatis unde omnis natustic error sit lorem volo ptate.',
                'label_block' => true,
            ]
        );

		$this->add_control(
			'promo_boxes',
			[
				'label'       => __( 'Promo List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Experienced Doctors',
						'desc' => 'Sed perspi ciatis unde omnis natustic error sit lorem volo ptate.',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

        $this->add_control(
            'icon_position',
            [
                'label'   => __( 'Icon Position', 'themedraft-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => __( 'Top', 'themedraft-core' ),
                    'left' => __( 'Left', 'themedraft-core' ),
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'promo_box_column',
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
				'default' => 'col-xl-3',
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
				'default' => 'col-lg-4',
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
				'default' => 'col-md-6',
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

		$this->end_controls_section();

        $this->start_controls_section(
            'promo_box_style',
            [
                'label' => esc_html__( 'Promo Box', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'       => esc_html__('Icon Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-promo-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .td-promo-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$col = $settings['xl_col'] . ' ' . $settings['lg_col'] . ' ' . $settings['md_col'];
		?>

		<div class="td-promo-box-wrapper td-icon-<?php echo $settings['icon_position'];?>">
			<div class="row">
				<?php if($settings['promo_boxes']){
					foreach ($settings['promo_boxes'] as $promo_box){ ?>
						<div class="<?php echo $col?>">
							<div class="td-single-promo-box">
								<div class="td-promo-icon td-primary-color">
									<?php if ( $promo_box['type'] === 'image' && $promo_box['image']['id'] ) : ?>
									<img src="<?php echo $promo_box['image']['url']; ?>"
									alt="<?php echo get_post_meta( $promo_box['image']['id'], '_wp_attachment_image_alt', true ); ?>">
									<?php elseif ( ! empty( $promo_box['icon'] ) || ! empty( $promo_box['selected_icon'] ) ) :
									themedraft_custom_icon_render( $promo_box, 'icon', 'selected_icon' );
									endif; ?>
								</div>

                                <h4 class="td-promo-title"><?php echo $promo_box['title'];?></h4>

                                <div class="td-promo-desc td-last-p-0">
	                                <?php echo $promo_box['desc'];?>
                                </div>
							</div>
						</div>
				<?php	}
				} ?>
			</div>
		</div>

		<?php

	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Promo_Box_Widget );