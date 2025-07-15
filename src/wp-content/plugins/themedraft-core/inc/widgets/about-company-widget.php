<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	CSF::createWidget( 'themedraft_about_company_widget', array(
		'title'       => esc_html__('ThemeDraft : About Company Widget ', 'themedraft-core'),
		'classname'   => 'widget_themedraft_about_company_widget',
		'description' => esc_html__('ThemeDraft about company widget.', 'themedraft-core'),
		'fields'      => array(

			array(
				'id'      => 'title',
				'type'    => 'text',
				'title'   => esc_html__('Title' , 'themedraft-core'),
			),

			array(
				'id'            => 'description',
				'type'          => 'wp_editor',
				'default'          => 'It is a long established fact that the read will been distracted by there readable an important content.',
				'media_buttons' => false,
				'height'        => '100px',
				'title'         => esc_html__('Description', 'themedraft-core'),
			),

			array(
				'id'      => 'find_us_title',
				'type'    => 'text',
				'default'    => 'Find Us On:',
				'title'   => esc_html__('Title' , 'themedraft-core'),
			),

			array(
				'id'           => 'social_icon_list',
				'type'         => 'group',
				'title'        => esc_html__('Social Profiles', 'themedraft-core'),
				'button_title' => esc_html__('Add New Profile', 'themedraft-core'),
				'fields'       => array(

					array(
						'id'      => 'site_name',
						'type'    => 'text',
						'title'   => esc_html__('Social Site Name' , 'themedraft-core'),
					),

					array(
						'id'    => 'icon',
						'type'  => 'icon',
						'title' => esc_html__('Icon', 'themedraft-core'),
						'desc'  => esc_html__('Select icon', 'themedraft-core'),
					),

					array(
						'id'      => 'profile_url',
						'type'    => 'text',
						'title'   => esc_html__('Social Profile URL' , 'themedraft-core'),
					),

				),
				'default'      => array(
					array(
						'site_name' => 'Facebook',
						'icon' => 'fab fa-facebook-f',
						'profile_url' => '#',
					),
				),
			),
		)
	) );

	//
	// Front-end display of widget
	// Attention: This function named considering above widget base id.
	//
	if( ! function_exists( 'themedraft_about_company_widget' ) ) {
		function themedraft_about_company_widget( $args, $instance ) {

			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} ?>

			<?php if($instance['description']) : ?>
                <div class="widget-about-description">
					<?php echo nl2br(($instance['description']));?>
                </div>
			<?php endif; ?>

            <div class="find-us-on"><?php echo ($instance['find_us_title']);?></div>

			<?php if ($instance['social_icon_list']) :?>
                <ul class="widget-social-icons footer-social-icon td-list-inline">
					<?php foreach ($instance['social_icon_list'] as $social){ ?>
                        <li><a href="<?php echo esc_url($social['profile_url']);?>" target="_blank"><i class="<?php echo esc_attr($social['icon']);?>"></i></a></li>
					<?php } ?>
                </ul>
			<?php endif; ?>

			<?php
			echo $args['after_widget'];
		}
	}
}