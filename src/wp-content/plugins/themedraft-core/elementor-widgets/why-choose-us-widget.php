<?php
namespace Elementor;

class ThemeDraft_Why_Choose_Us_Widget extends Widget_Base {

	public function get_name() {
		return 'themedraft_why_choose_us';
	}

	public function get_title() {
		return esc_html__( 'Why Choose Us', 'themedraft-core' );
	}

	public function get_icon() {
		return 'flaticon-question-mark-1';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'why_choose_us_option',
			[
				'label' => esc_html__( 'Why Choose Us', 'themedraft-core' ),
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
				'default'     => 'Patient Care'
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
			'desc',
			[
				'label'       => __( 'Description', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => 'Sit consectetur adipiscin elit sed do eiusmod tempor lorem ipsum health care theme and many more.',
			]
		);

		$repeater->add_control(
			'details',
			[
				'label'         => __( 'Details URL', 'themedraft-core' ),
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
			'choose_boxes',
			[
				'label'       => __( 'Choose Us Box List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Patient Care',
						'desc' => 'Sit consectetur adipiscin elit sed do eiusmod tempor lorem ipsum health care theme and many more.',
					],
				],
				'title_field' => '{{{ title }}}',
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
			'choose_box__column',
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

		<div class="td-choose-us-wrapper">
			<div class="container">
				<div class="row">
					<?php if ( $settings['choose_boxes'] ) {
						foreach ( $settings['choose_boxes'] as $choose_box ) { ?>
                            <div class="<?php echo $col;?>">
                                <div class="td-single-choose-box">
                                    <div class="td-choose-box-icon td-primary-color">
                                        <?php if ( $choose_box['type'] === 'image' && $choose_box['image']['id'] ) : ?>
                                        <img src="<?php echo $choose_box['image']['url']; ?>"
                                        alt="<?php echo get_post_meta( $choose_box['image']['id'], '_wp_attachment_image_alt', true ); ?>">
                                        <?php elseif ( ! empty( $choose_box['icon'] ) || ! empty( $choose_box['selected_icon'] ) ) :
                                        themedraft_custom_icon_render( $choose_box, 'icon', 'selected_icon' );
                                        endif; ?>
                                    </div>

                                    <div>
                                        <a href="<?php echo $choose_box['details']['url'];?>" class="td-choose-box-link td-secondary-font">
		                                    <?php echo $choose_box['title'];?>
                                        </a>
                                    </div>

                                    <div class="td-choose-box-desc">
	                                    <?php echo $choose_box['desc'];?>
                                    </div>

                                    <div class="service-two-details-btn">
                                        <a class="td-text-button" href="<?php echo $choose_box['details']['url'];?>"><?php echo $settings['btn_text'];?> <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
						<?php }
					} ?>
				</div>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Why_Choose_Us_Widget );