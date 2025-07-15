<?php
namespace Elementor;

class ThemeDraft_Video_Popup_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_video_popup';
	}

	public function get_title() {
		return esc_html__( 'Video Popup', 'themedraft-core' );
	}

	public function get_icon() {

		return 'eicon-youtube';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'video_popup_options',
			[
				'label' => esc_html__( 'Video Popup', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'video_image',
		    [
		        'label'       => __( 'Image', 'themedraft-core' ),
		        'type'        => Controls_Manager::MEDIA,
		        'label_block' => true,
		        'default'     => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$this->add_control(
		    'video_url',
		    [
		        'label'       => __( 'Video URL', 'themedraft-core' ),
		        'label_block'       => true,
		        'type'        => Controls_Manager::TEXT,
		        'default'     => 'https://vimeo.com/100902001',
		    ]
		);

        $this->add_control(
            'enable_overlay',
            [
                'label'     => esc_html__( 'Enable Overlay', 'themedraft-core' ),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
                'label_off' => esc_html__( 'No', 'themedraft-core' ),
                'default'   => 'yes',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
		    'video_popup_style',
		    [
		        'label' => esc_html__( 'Video Popup', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'video_height',
		    [
		        'label' => esc_html__( 'Height', 'themedraft-core' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		            ],
		        ],
		        'devices' => [ 'desktop', 'tablet', 'mobile' ],

		        'selectors' => [
		            '{{WRAPPER}} .td-video-image' => 'height: {{SIZE}}px;',
		        ],
		    ]
		);


		$this->add_responsive_control(
			'btn_size',
			[
				'label' => esc_html__( 'Button Size', 'themedraft-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .td-video-button:before,{{WRAPPER}} .td-video-button:after' => 'height: {{SIZE}}px;width: {{SIZE}}px;',
				],
			]
		);

        $this->add_control(
            'btn_bg_color',
            [
                'label'       => esc_html__('Button Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-video-button:before,{{WRAPPER}} .td-video-button:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'btn_color',
			[
				'label'       => esc_html__('Button Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-video-button i' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'overlay_color',
            [
                'label'       => esc_html__('Overlay Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-video-overlay' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'enable_overlay' => 'yes',
                ],
            ]
        );

		$this->add_responsive_control(
		    'wrapper_margin',
		    [
		        'label'      => esc_html__( 'Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .td-img-with-video' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="td-img-with-video">
            <?php if($settings['enable_overlay'] == 'yes') :?>
            <div class="td-video-overlay"></div>
            <?php endif; ?>
			<div class="td-video-image td-cover-bg" style="background-image: url(<?php echo $settings['video_image']['url'];?>);">
				<a href="<?php echo $settings['video_url'];?>" class="td-video-button mfp-iframe">
					<i class="fas fa-play"></i>
				</a>
			</div>
		</div>

        <script>
            jQuery(document).ready(function ($) {
                $(".td-video-button").magnificPopup({
                    type: 'video',
                });
            });
        </script>

		<?php

	}

	//Template
	protected function content_template() { ?>
        <div class="td-img-with-video">
            <# if ( settings.enable_overlay == 'yes' ) { #>
            <div class="td-video-overlay"></div>
            <# } #>
            <div class="td-video-image td-cover-bg" style="background-image: url({{{settings.video_image.url}}});">
                <a href="{{{settings.video_url}}}" class="td-video-button mfp-iframe">
                    <i class="fas fa-play"></i>
                </a>
            </div>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                $(".td-video-button").magnificPopup({
                    type: 'video',
                });
            });
        </script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Video_Popup_Widget );