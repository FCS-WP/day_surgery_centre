<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	CSF::createWidget( 'themedraft_gallery_widget', array(
		'title'       => esc_html__( 'ThemeDraft : Gallery Widget ', 'themedraft-core' ),
		'classname'   => 'themedraft_gallery_widget',
		'description' => esc_html__( 'ThemeDraft photo gallery widget.', 'themedraft-core' ),
		'fields'      => array(

			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => esc_html__( 'Title', 'themedraft-core' ),
			),

			array(
				'id'    => 'gallery_items',
				'type'  => 'gallery',
				'title' => esc_html__( 'Gallery', 'themedraft-core' ),
			),

			array(
				'id'       => 'lightbox_slider',
				'type'     => 'switcher',
				'title'    => esc_html__( 'Enable Lightbox Slider', 'themedraft-core' ),
				'default'  => true,
				'text_on'  => esc_html__( 'Yes', 'themedraft-core' ),
				'text_off' => esc_html__( 'No', 'themedraft-core' ),
			),

		)
	) );

	//
	// Front-end display of widget
	// Attention: This function named considering above widget base id.
	//
	if ( ! function_exists( 'themedraft_gallery_widget' ) ) {
		function themedraft_gallery_widget( $args, $instance ) {

			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			$image_id = explode( ',', $instance['gallery_items'] ); ?>
            <div class="tdraft-gallery-photo-wrapper">

				<?php
				foreach ( $image_id as $gallery_item ) { ?>
                    <a class="td-gallery-photo-url <?php if ( $instance['lightbox_slider'] == true ) {
						echo 'td-popup-image';
					} ?>" href="<?php echo wp_get_attachment_url( $gallery_item ); ?>">
                        <div class="td-gallery-photo-item"
                             style="background-image: url(<?php echo wp_get_attachment_url( $gallery_item ); ?>)">
                            <div class="td-gallery-photo-overlay td-transition">
                                <div class="td-gallery-photo-plus">+</div>
                            </div>
                        </div>
                    </a>
					<?php
				}
				?>
            </div>

			<?php
			echo $args['after_widget'];
		}
	}
}
