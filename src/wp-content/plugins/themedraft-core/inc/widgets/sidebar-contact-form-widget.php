<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) && class_exists( 'WPCF7_ContactForm' )) {
	 function themedraft_cf7_form_list( ) {

		if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
			return array();
		}

		$forms = \WPCF7_ContactForm::find( array(
			'orderby' => 'title',
			'order'   => 'ASC',
		) );

		if ( empty( $forms ) ) {
			return array();
		}

		$result = array();

		foreach ( $forms as $item ) {
			$key            = sprintf( '%1$s::%2$s', $item->id(), $item->title() );
			$result[ $key ] = $item->title();
		}

		return $result;
	}

	CSF::createWidget( 'themedraft_contact_form_wp_widget', array(
		'title'       => esc_html__( 'ThemeDraft : Contact Form Widget', 'themedraft-core' ),
		'classname'   => 'themedraft_contact_form_widget',
		'description' => esc_html__( 'ThemeDraft sidebar contact form widget', 'themedraft-core' ),
		'fields'      => array(

			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => esc_html__( 'Title', 'themedraft-core' ),
				'default' => 'Appointment',
			),

			array(
				'id'    => 'subtitle',
				'type'  => 'text',
				'title' => esc_html__( 'Subtitle', 'themedraft-core' ),
				'default' => 'Make an',
			),

			array(
				'id'          => 'selected_cf7_form',
				'type'        => 'select',
				'title'       => esc_html__( 'Contact form', 'themedraft-core' ),
				'placeholder' => esc_html__( 'Select contact form', 'themedraft-core' ),
				'options'     => 'themedraft_cf7_form_list',
			),
		)
	) );

	//
	// Front-end display of widget
	// Attention: This function named considering above widget base id.
	//
	if ( ! function_exists( 'themedraft_contact_form_wp_widget' ) ) {
		function themedraft_contact_form_wp_widget( $args, $instance ) {
			echo $args['before_widget'];

			if ( ! empty( $instance['subtitle'] ) ) {
				echo '<span class="sidebar-contact-subtitle">'.$instance['subtitle'].'</span>';
			}

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			if(!empty($instance['selected_cf7_form'])){
				?>
                <div class="contact-widget-form td-contact-form-container">
                    <div class="form-icon"><i class="flaticon-nurse"></i></div>
                    <div class="themedraft-contact-form-container">
						<?php echo do_shortcode( '[contact-form-7 id="' . $instance['selected_cf7_form'] . '" ]' );?>
                    </div>
                </div>
                <?php
			}
			echo $args['after_widget'];
		}
	}
}