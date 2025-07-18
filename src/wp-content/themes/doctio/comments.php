<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doctio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">



	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
        <div class="comment-title-and-comment-list">
            <h2 class="comments-title">
				<?php
				$doctio_comment_count = get_comments_number();
				if ( '1' === $doctio_comment_count ) {
					printf(
					/* translators: 1: title. */
						esc_html__( '1 Comment', 'doctio' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s Comments', '%1$s Comments', $doctio_comment_count, 'comments title', 'doctio' ) ),
						number_format_i18n( $doctio_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
            </h2><!-- .comments-title -->

			<?php the_comments_navigation(); ?>

            <ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 100,
					'format' => 'html5',
					'reply_text'        => esc_html__( 'Reply', 'doctio' ),
				) );
				?>
            </ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'doctio' ); ?></p>

			<?php
			endif; ?>
        </div>
	<?php
	endif; // Check for have_comments().
	?>


	<?php comment_form();?>

</div><!-- #comments -->