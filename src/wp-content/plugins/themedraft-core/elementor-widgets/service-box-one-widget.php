<?php
namespace Elementor;

class ThemeDraft_Service_Box_One_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_service_box_one';
	}

	public function get_title() {
		return esc_html__( 'Service Box One', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-portfolio';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_box_one_setting',
			[
				'label' => esc_html__( 'Service Box', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'bg_image',
			[
				'label'       => __( 'Service Image', 'themedraft-core' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'themedraft-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Medical Care',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'themedraft-core' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => '<p>Best Medical & Health Care</p>',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'details_url',
			[
				'label'         => __( 'Details Url', 'themedraft-core' ),
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
			'services',
			[
				'label'       => __( 'Service List', 'themedraft-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Medical Care',
						'desc' => '<p>Best Medical & Health Care</p>',
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
			'service_column',
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
				'default' => 'col-xl-4',
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
				'default' => 'col-lg-6',
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

		<div class="td-service-one-item-wrapper">
			<div class="container">
				<div class="row">
					<?php if ($settings['services']) {
						foreach ($settings['services'] as $service) {
							$bg_image_src = $service['bg_image']['url'];
							$url      = $service['details_url']['url'];
							$target   = $service['details_url']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $service['details_url']['nofollow'] ? ' rel="nofollow"' : '';
							?>

							<div class="<?php echo $col;?>">
								<div class="td-service-one-item">
									<a class="td-service-one-image td-cover-bg" href="<?php echo esc_url($url);?>" style="background-image: url(<?php echo $bg_image_src;?>)" <?php echo $target . $nofollow;?>></a>

									<div class="service-one-content">
										<a href="<?php echo esc_url($url);?>" <?php echo $target . $nofollow;?> class="service-one-title"><?php echo $service['title'];?></a>
										<div class="service-one-description">
											<?php echo $service['desc'];?>
										</div>
										<div class="service-one-details-button">
											<a class="td-text-button" href="<?php echo esc_url($url);?>" <?php echo $target . $nofollow;?>><?php echo $settings['btn_text'];?> <i class="fas fa-angle-double-right"></i></a>
										</div>
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

Plugin::instance()->widgets_manager->register( new ThemeDraft_Service_Box_One_Widget );