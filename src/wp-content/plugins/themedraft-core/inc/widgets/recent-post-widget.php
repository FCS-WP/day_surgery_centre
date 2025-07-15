<?php

/**
 * ThemeDraft Recent Post Widgets
 */
class ThemeDraft_Recent_Posts_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'themedraft-recent-posts', esc_html__( 'ThemeDraft : Recent Posts', 'themedraft-core' ), array(
			'description' => esc_html__( 'ThemeDraft recent posts widget', 'themedraft-core' ),
		) );
	}

	public function widget( $args, $instance ) {
		?>
		<?php echo wp_kses_post( $args['before_widget'] ); ?>
		<?php if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<ul class="td-recent-post-widget">
			<?php
			$title_word_count = ! empty( $instance['title_word_count'] ) ? $instance['title_word_count'] : 6;
			$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 2;
			$category   = $instance['category'];


			if ( ! empty( $category ) ) {
				$resent_post = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => $post_count,
					'ignore_sticky_posts' => true,
					'tax_query'           => array(
						array(
							'taxonomy' => 'category',
							'terms'    => $category
						)
					)
				) );
			} else {
				$resent_post = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => $post_count,
					'ignore_sticky_posts' => true
				) );
			}
			while ( $resent_post->have_posts() ) : $resent_post->the_post();
				?>

				<li <?php if ( has_post_thumbnail() ) {echo 'class= "li-have-thumbnail"';} ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<img src="<?php the_post_thumbnail_url( 'thumbnail' ) ?>"
						     alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
					<?php endif; ?>

					<div class="td-recent-post-title-and-date">
						<h6><a class="td-recent-post-widget-title"
						       href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_trim_words(get_the_title(), $title_word_count,' ...'); ?></a>
						</h6>

						<div class="td-recent-widget-date"><?php if(function_exists('doctio_posted_on')){doctio_posted_on();} ?></div>
					</div>
				</li>
			<?php endwhile; wp_reset_postdata();?>
		</ul>
		<?php echo wp_kses_post( $args['after_widget'] ); ?>
		<?php
	}


	public function form( $instance ) {
		$title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$title_word_count      = ! empty( $instance['title_word_count'] ) ? $instance['title_word_count'] : 6;
		$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 2;
		$category   = ! empty( $instance['category'] ) ? $instance['category'] : array();

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title :', 'themedraft-core' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_word_count' ) ); ?>"><?php echo esc_html__( 'Title Word Count :', 'themedraft-core' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_word_count' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title_word_count' ) ); ?>" type="number" min="1"
			       value="<?php echo esc_attr( $title_word_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php echo esc_html__( 'Post Count:', 'themedraft-core' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" type="number" min="-1"
			       value="<?php echo esc_attr( $post_count ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo esc_html__('Category:', 'themedraft-core');?>
				<select class='widefat' id="<?php echo $this->get_field_id( 'category' ); ?>"
				        name="<?php echo $this->get_field_name( 'category' ); ?>" type="text">

					<option value=''><?php echo esc_html__( 'All Category', 'themedraft-core' ); ?></option>
					<?php
					$terms = get_terms( array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
					) );

					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) { ?>
							<option value='<?php echo $term->term_id ?>'<?php echo ( $category == $term->term_id ) ? 'selected' : ''; ?>>
								<?php echo $term->name ?>
							</option>
							<?php
						}
					}
					?>
				</select>
			</label>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = $old_instance;

		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['title_word_count']         = ( ! empty( $new_instance['title_word_count'] ) ) ? sanitize_text_field( $new_instance['title_word_count'] ) : 10;

		$instance['post_count']      = ( ! empty( $new_instance['post_count'] ) ) ? sanitize_text_field( $new_instance['post_count'] ) : 4;

		$instance['category']         = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';

		return $instance;
	}
}

function themedraft_recent_posts() {
	register_widget( 'ThemeDraft_Recent_Posts_Widget' );
}


add_action( 'widgets_init', 'themedraft_recent_posts' );