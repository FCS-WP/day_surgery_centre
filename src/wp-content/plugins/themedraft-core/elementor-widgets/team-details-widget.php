<?php
namespace Elementor;
use WP_Query;
class ThemeDraft_Team_Member_Details_Widget extends Widget_Base {

	public function get_name() {

		return 'themedraft_team_details';
	}

	public function get_title() {
		return esc_html__( 'Team Member Details', 'themedraft-core' );
	}

	public function get_icon() {

		return 'flaticon-doctor-1';
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tab_content_settings',
			[
				'label' => esc_html__( 'Tabs', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'tab_image',
		    [
		        'label'       => __( 'Tab Image', 'themedraft-core' ),
		        'type'        => Controls_Manager::MEDIA,
		        'label_block' => true,
		        'default'     => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		    ]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'menu_text',
			[
				'label'       => esc_html__('Menu Text', 'themedraft-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Menu 1',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__('Title', 'themedraft-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Dr. Rongila Rongs',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label'       => esc_html__('Subtitle', 'themedraft-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Neurology Specialist',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content_text',
			[
				'label'   => esc_html__('Content Text', 'themedraft-core'),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p>It is a long established fact that is reader will be then distracted buy then thing and readable content off page when looking at that page layout. It is a long fact that on readable content of page. It is a long established fact that is reader will be the then distracted by the thing and readable content then page when looking at our and on established fact that page layout and more.<strong>It is a long established fact that a reader will be then distracted by the thing is and readable content of page when looking at that page layout. It is a long and established fact that a reader will be then distracted.</strong></p>',
			]
		);

		$repeater->add_control(
			'selected_member_profile',
			[
				'label'       => __( 'Select Member', 'themedraft-core' ),
				'type'        => Controls_Manager::SELECT,
				'show_label'  => true,
				'label_block' => false,
				'options'     => themedraft_team_member_list(),
				'description' => esc_html__( 'Select member to associate his/her social profile, skills and award image. Make sure social profile, skills and award images is already added on member single page.', 'themedraft-core' ),
			]
		);

		$repeater->add_control(
		    'enable_social',
		    [
		        'label'     => esc_html__( 'Enable Social', 'themedraft-core' ),
		        'type'      => Controls_Manager::SWITCHER,
		        'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
		        'label_off' => esc_html__( 'No', 'themedraft-core' ),
		        'default'   => 'yes',
		    ]
		);

		$repeater->add_control(
			'enable_skill',
			[
				'label'     => esc_html__( 'Enable Skill', 'themedraft-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
				'label_off' => esc_html__( 'No', 'themedraft-core' ),
				'default'   => 'yes',
			]
		);

		$repeater->add_control(
			'enable_award',
			[
				'label'     => esc_html__( 'Enable Award Image', 'themedraft-core' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'themedraft-core' ),
				'label_off' => esc_html__( 'No', 'themedraft-core' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'tab_items',
			[
				'label'       => esc_html__('Tab List', 'themedraft-core'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'menu_text'        => 'Menu 1',
						'title'        => 'Dr. Rongila Rongs',
						'subtitle'        => 'Neurology Specialist',
						'content_text' => '<p>It is a long established fact that is reader will be then distracted by the thing and readable content off page when looking at that page layout. It is a long fact that a readable content of page. It is a long established fact that is reader will be the then distracted by the thing and readable content then page when looking at our established fact that page layout.<strong>It is a long established fact that a reader will be then distracted by the thing is and readable content of page when looking at that page layout. It is a long and established fact that a reader will be then distracted.</strong></p>',
					],
				],
				'title_field' => '{{{ menu_text }}}',
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
				'description' => esc_html__('Which tab you want to open by default.', 'themedraft-core'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    'tab_wrapper_style_options',
		    [
		        'label' => esc_html__( 'Wrapper', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_control(
		    'tab_bg_color',
		    [
		        'label'       => esc_html__('Background Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .td-member-tab-container' => 'color: {{VALUE}};',
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
		            '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		    'btn_style',
		    [
		        'label' => esc_html__( 'Nav Button', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'tab_btn_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .td-tab-two-menu-text.td-secondary-font',
		    ]
		);

		$this->add_responsive_control(
		    'padding',
		    [
		        'label'      => esc_html__( 'Padding', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->start_controls_tabs('td_button_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
		    'td_btn_style_default',
		    [
		        'label' => esc_html__('Normal', 'themedraft-core'),
		    ]
		);

        $this->add_control(
            'nav_text_color',
            [
                'label'       => esc_html__('Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-member-tab-container .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();//Default style tab end

		//Hover style tab start
		$this->start_controls_tab(
		    'td_btn_style_hover',
		    [
		        'label' => esc_html__('Hover', 'themedraft-core'),
		    ]
		);

		$this->add_control(
			'nav_text_color_on_hover',
			[
				'label'       => esc_html__('Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .td-member-tab-container .nav-link:hover,{{WRAPPER}} .td-member-tab-container .nav-link.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'nav_bg_color_on_over',
			[
				'label'       => esc_html__('Background Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .nav-link:hover, {{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .nav-link.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();//Hover style tab end

		$this->end_controls_section();

		$this->start_controls_section(
		    'title_subtitle',
		    [
		        'label' => esc_html__( 'Title & Subtitle', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'tab_title_typo',
		        'label' => esc_html__( 'Title Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .td-tab-title',
		    ]
		);

		$this->add_control(
		    'tab_title_color',
		    [
		        'label'       => esc_html__('Title Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .td-tab-title' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'title_margin',
		    [
		        'label'      => esc_html__( 'Title Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .team-member-details-wrapper .td-member-tab-container .td-tab-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_subtitle_typo',
				'label' => esc_html__( 'Subtitle Typography', 'themedraft-core' ),
				'selector' => '{{WRAPPER}} .team-member-details-wrapper .td-tab-subtitle',
			]
		);

		$this->add_control(
			'tab_subtitle_color',
			[
				'label'       => esc_html__('Subtitle Color', 'themedraft-core'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .team-member-details-wrapper .td-tab-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Subtitle Margin', 'themedraft-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .team-member-details-wrapper .td-tab-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    'description_style_options',
		    [
		        'label' => esc_html__( 'Description', 'themedraft-core' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'description_typo',
		        'label' => esc_html__( 'Typography', 'themedraft-core' ),
		        'selector' => '{{WRAPPER}} .td-tab-content-text',
		    ]
		);

		$this->add_control(
		    'desc_color',
		    [
		        'label'       => esc_html__('Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .td-tab-content-text' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'desc_strong_color',
		    [
		        'label'       => esc_html__('Bold Text Color', 'themedraft-core'),
		        'type'        => Controls_Manager::COLOR,
		        'selectors'   => [
		            '{{WRAPPER}} .td-tab-content-text strong' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'description_margin',
		    [
		        'label'      => esc_html__( 'Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .td-tab-content-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();


		// Start Button section
		$this->start_controls_section(
		    'td_social_style_options',
		    [
		        'label' => esc_html__('Social Icon', 'themedraft-core'),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->start_controls_tabs('td_social_style_tabs');

		//Default style tab start
		$this->start_controls_tab(
		    'td_social_style_default',
		    [
		        'label' => esc_html__('Normal', 'themedraft-core'),
		    ]
		);

		$this->add_responsive_control(
		    'social_margin',
		    [
		        'label'      => esc_html__( 'Margin', 'themedraft-core' ),
		        'type'       => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%', 'em' ],
		        'selectors'  => [
		            '{{WRAPPER}} .team-member-details-wrapper .tab-social-icons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'social_default_bg',
		    [
		        'label'     => esc_html__('Background Color', 'themedraft-core'),
		        'type'      => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
			'social_default_color',
			[
				'label'     => esc_html__('Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_default_border_color',
			[
				'label'     => esc_html__('Border Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();//Default style tab end

		//Hover style tab start
		$this->start_controls_tab(
		    'td_social_style_hover',
		    [
		        'label' => esc_html__('Hover', 'themedraft-core'),
		    ]
		);

		$this->add_control(
			'social_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_hover_color',
			[
				'label'     => esc_html__('Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'social_hover_border_color',
			[
				'label'     => esc_html__('Border Color', 'themedraft-core'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-details-wrapper .tab-social-icons ul li a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();//Hover style tab end

		$this->end_controls_section();// End Button section

        $this->start_controls_section(
            'skill_style_option',
            [
                'label' => esc_html__( 'Skills', 'themedraft-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'skill_typo',
                'label' => esc_html__( 'Typography', 'themedraft-core' ),
                'selector' => '{{WRAPPER}} .skill-title,{{WRAPPER}} .skill-percent-count-wrap',
            ]
        );

        $this->add_control(
            'skill_text_color',
            [
                'label'       => esc_html__('Text Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .skill-title,{{WRAPPER}} .skill-percent-count-wrap' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'skill_color',
            [
                'label'       => esc_html__('Background Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .team-member-details-wrapper .td-skills-wrapper .skillbar' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'skill_fill_color',
            [
                'label'       => esc_html__('Fill Color', 'themedraft-core'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .td-skills-wrapper .count-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$td_tab_id = rand(10, 10000);

		$image_src = $settings['tab_image']['url'];
		$image_alt = get_post_meta( $settings['tab_image']['id'], '_wp_attachment_image_alt', true );
		?>

		<div class="team-member-details-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-md-12 my-auto td-pr-0">
						<div class="member-image-wrapper">
							<img src="<?php echo esc_url($image_src);?>" alt="<?php echo esc_attr($image_alt);?>">
						</div>
					</div>

					<div class="col-xl-7 col-lg-7 col-md-12 my-auto td-pl-0">
						<div class="td-member-details-tabs-wrapper">
                            <div class="td-member-tab-container">
                                <div class="nav nav-tabs" role=tablist>
                                    <?php
                                    if ($settings['tab_items']) {
                                        $menu_count = 0;
                                        foreach ($settings['tab_items'] as $tab_menu) {
                                            $menu_count++;
                                            ?>
                                            <button class="nav-link td-tab-two-menu-text td-secondary-font <?php if($menu_count == $settings['open_by_default']){ echo 'active';}?>" data-bs-toggle="tab" data-bs-target="#td-tab-number-<?php echo $td_tab_id.$menu_count?>" type="button" role="tab">
                                                <?php echo $tab_menu['menu_text'];?>
                                            </button>
                                        <?php }
                                    }
                                    ?>
                                </div>

                                <div class="tab-content">
                                    <?php
                                    if ($settings['tab_items']) {
                                        $content_count = 0;
                                        foreach ($settings['tab_items'] as $tab_content) {
                                            $content_count++;

	                                        $member_query = new WP_Query(
		                                        array(
			                                        'posts_per_page' => 1,
			                                        'post_type'      => 'doctio_team',
			                                        'p'              => $tab_content['selected_member_profile'],
		                                        )
	                                        );

	                                        while ( $member_query->have_posts() ) :
		                                        $member_query->the_post();
		                                        if ( get_post_meta( get_the_ID(), 'doctio_team_meta', true ) ) {
			                                        $team_meta = get_post_meta( get_the_ID(), 'doctio_team_meta', true );
		                                        } else {
			                                        $team_meta = array();
		                                        }

		                                        if ( array_key_exists( 'member_social_profile', $team_meta ) ) {
			                                        $member_social = $team_meta['member_social_profile'];
		                                        } else {
			                                        $member_social = array();
		                                        }

		                                        if ( array_key_exists( 'member_skills', $team_meta ) ) {
			                                        $member_skills = $team_meta['member_skills'];
		                                        } else {
			                                        $member_skills = array();
		                                        }

		                                        if ( array_key_exists( 'member_awards', $team_meta ) ) {
			                                        $award_image = explode( ',', $team_meta['member_awards'] );
		                                        } else {
			                                        $award_image = '';
		                                        }

                                            ?>
                                            <div class="td-tab-item tab-pane fade <?php if($content_count == $settings['open_by_default'] ){ echo 'active show';}?>" id="td-tab-number-<?php echo $td_tab_id.$content_count?>" role="tabpanel">
                                                <div class="td-tab-content-wrapper">
                                                    <div class="tab-description">
                                                        <h3 class="td-tab-title"><?php echo $tab_content['title'];?></h3>
                                                        <span class="td-tab-subtitle td-primary-color"><?php echo $tab_content['subtitle'];?></span>

                                                        <div class="td-tab-content-text"><?php echo $tab_content['content_text'];?></div>
                                                    </div>

		                                        <?php if(!empty($member_social) && $tab_content['selected_member_profile'] && $tab_content['enable_social'] ): ?>
                                                    <div class="tab-social-icons">
                                                        <ul class="td-list-style td-list-inline">
	                                                        <?php
	                                                        foreach ( $member_social as $social ) {
		                                                        $icon = $social['site_icon'];
		                                                        $url  = $social['site_url']; ?>
                                                                <li><a href="<?php echo esc_url($url); ?>" target="_blank"><i class="<?php echo $icon; ?>"></i></a></li>
		                                                        <?php
	                                                        }
	                                                        ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>

		                                        <?php if(!empty($member_skills) && $tab_content['selected_member_profile'] && $tab_content['enable_skill'] ): ?>
                                                    <div class="td-skills-wrapper">
                                                        <?php foreach ($member_skills as $skill) {
                                                            $skill_percent = $skill['skill_percent'];
                                                            $skill_title = $skill['skill_title'];
                                                            ?>
                                                            <div class="skillbar td-secondary-font">
                                                                <div class="skill-title"><?php echo $skill_title;?></div>
                                                                <div class="count-bar td-primary-bg"  style="width:<?php echo $skill_percent;?>%">
                                                                    <div class="skill-percent-count-wrap"><span class="skill-percent"><?php echo $skill_percent;?></span>%</div>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                <?php endif; ?>

		                                        <?php if(!empty($award_image) && $tab_content['selected_member_profile'] && $tab_content['enable_award'] ): ?>
                                                    <div class="td-tab-award">
                                                        <ul class="td-list-style td-list-inline">
	                                                        <?php foreach ( $award_image as $image_id ) : ?>
                                                                <li><img src="<?php echo wp_get_attachment_url( $image_id ); ?>" alt="<?php echo get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>"></li>
	                                                        <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
	                                        <?php endwhile;
	                                        wp_reset_query();
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Team_Member_Details_Widget );