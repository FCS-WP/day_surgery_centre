<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	CSF::createWidget( 'themedraft_download_button_wp_widget', array(
		'title'       => esc_html__( 'ThemeDraft : Download Button', 'themedraft-core' ),
		'classname'   => 'td_download_button_widget',
		'description' => esc_html__( 'ThemeDraft download button widget.', 'themedraft-core' ),
		'fields'      => array(

			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => esc_html__( 'Title', 'themedraft-core' ),
			),

			array(
				'id'    => 'download_btn_one_text',
				'type'  => 'text',
				'title' => esc_html__( 'Button One Text', 'themedraft-core' ),
				'default' => 'Download PDF',
			),

			array(
				'id'    => 'download_btn_one_url',
				'type'  => 'text',
				'title' => esc_html__( 'Button One Url', 'themedraft-core' ),
				'default' => '#',
			),

			array(
				'id'    => 'download_btn_one_icon',
				'type'  => 'icon',
				'title' => esc_html__( 'Download Button One Icon', 'themedraft-core' ),
				'default' => 'far fa-file-pdf',
			),

			array(
				'id'    => 'download_btn_two_text',
				'type'  => 'text',
				'title' => esc_html__( 'Button Two Text', 'themedraft-core' ),
				'default' => 'download brochure',
			),

			array(
				'id'    => 'download_btn_two_url',
				'type'  => 'text',
				'title' => esc_html__( 'Button Two Url', 'themedraft-core' ),
				'default' => '#',
			),

			array(
				'id'    => 'download_btn_two_icon',
				'type'  => 'icon',
				'title' => esc_html__( 'Download Button Two Icon', 'themedraft-core' ),
				'default' => 'far fa-file-pdf',
			),
		)
	) );

	//
	// Front-end display of widget
	// Attention: This function named considering above widget base id.
	//
	if ( ! function_exists( 'themedraft_download_button_wp_widget' ) ) {
		function themedraft_download_button_wp_widget( $args, $instance ) {

			$btn_one_text = $instance['download_btn_one_text'];
			$btn_one_url = $instance['download_btn_one_url'];
			$btn_one_icon = $instance['download_btn_one_icon'];

			$btn_two_text = $instance['download_btn_two_text'];
			$btn_two_url = $instance['download_btn_two_url'];
			$btn_two_icon = $instance['download_btn_two_icon'];

			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} ?>

			<div class="td-download-button-widget-wrapper">
				<a download href="<?php echo $btn_one_url;?>" class="td-button td-download-btn-one"><?php echo $btn_one_text;?> <i class="<?php echo $btn_one_icon?>"></i></a>
				<?php if($btn_two_text) { ?>
					<a download href="<?php echo $btn_two_url;?>" class="td-button td-download-btn-two"><?php echo $btn_two_text;?> <i class="<?php echo $btn_two_icon?>"></i></a>
				<?php }?>
			</div>

			<?php
			echo $args['after_widget'];
		}
	}
}