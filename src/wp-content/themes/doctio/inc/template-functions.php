<?php
/**
 * @package Doctio
 */

//Get theme options
if ( ! function_exists( 'doctio_option' ) ) {
	function doctio_option( $option = '', $default = null ) {
		$defaults = doctio_default_theme_options();
		$options  = get_option( 'doctio_theme_options' );
		$default  = ( ! isset( $default ) && isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : $default;

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
function doctio_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'doctio-woo-active';
	}else{
		$classes[] = 'doctio-woo-deactivate';
	}

	//Check Elementor Page Builder Used or not
	$elementor_used = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);

	if(is_archive() || is_search()){
		$classes[]        = !!$elementor_used ? 'page-builder-not-used' : 'page-builder-not-used';
	}else{
		$classes[]        = !!$elementor_used ? 'page-builder-used' : 'page-builder-not-used';
	}

	return $classes;
}
add_filter( 'body_class', 'doctio_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function doctio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'doctio_pingback_header' );


/**
 * Words limit
 */
function doctio_words_limit($text, $limit) {
	$words = explode(' ', $text, ($limit + 1));

	if (count($words) > $limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}


/**
 * Get excluded sidebar list
 */
if( ! function_exists( 'doctio_sidebars' ) ) {
	function doctio_sidebars() {
		$default = esc_html__('Default', 'doctio');
		$options = array($default);
		// set ids of the registered sidebars for exclude
		$exclude = array( 'doctio-footer-widget' );

		global $wp_registered_sidebars;

		if( ! empty( $wp_registered_sidebars ) ) {
			foreach( $wp_registered_sidebars as $sidebar ) {
				if( ! in_array( $sidebar['id'], $exclude ) ) {
					$options[$sidebar['id']] = $sidebar['name'];
				}
			}
		}

		return $options;
	}
}


/**
 * Iframe embed
 */

function doctio_iframe_embed( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'doctio_iframe_embed', 10, 2 );

/**
 * Allow Html
 */
if ( !function_exists( 'doctio_allow_html' ) ) {
	function doctio_allow_html(){
		return array(
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'title'  => array(),
				'rel'    => array(),
			),
			'strong' => array(),
			'small'  => array(),
			'span'   => array(
			        'style' => array(),
            ),
			'p'      => array(),
			'br'     => array(),
			'img'    => array(
				'src'    => array(),
				'title'  => array(),
				'alt'    => array(),
				'width'  => array(),
				'height' => array(),
				'class'  => array(),
			),
			'h1'     => array(),
			'h2'     => array(),
			'h3'     => array(),
			'h4'     => array(),
			'h5'     => array(),
			'h6'     => array(),
		);
    }
}

/**
 * Next - Prev Post Link
 */
if ( !function_exists( 'doctio_next_prev_post_link' ) ) {
	function doctio_next_prev_post_link(){ ?>

		<div class="row single-blog-next-prev">

			<?php
			$prev_post = get_previous_post();

			if(!empty( get_previous_post_link())){
				$prev_thumbnail = get_the_post_thumbnail($prev_post->ID, array(85,85) );
				if(!empty($prev_thumbnail)){
					$prev_thumb_class ='have-thumb';
				}else{
					$prev_thumb_class = 'no-thumb';
				}
			}

			$next_post = get_next_post();

			if(!empty( get_next_post_link())){
				$next_thumbnail = get_the_post_thumbnail($next_post->ID, array(85,85) );
				if(!empty($next_thumbnail)){
					$next_thumb_class ='have-thumb';
				}else{
					$next_thumb_class = 'no-thumb';
				}
			}
			?>

			<div class="col-6 prev-post-nav-wrap <?php echo esc_attr($prev_thumb_class);?>">
				<div class="post-nav-container">

					<?php if ( !empty( get_previous_post_link())){ ?>
						<?php
						previous_post_link('%link',"<div class='blog-next-prev-img post-prev-img'><i class='fas fa-arrow-left'></i>$prev_thumbnail</div>");
						?>

						<?php  ?>
					<?php } ?>
				</div>
			</div>


			<?php if ( !empty( get_next_post_link())){ ?>
				<div class=" col-6 next-post-nav-wrap <?php echo esc_attr($next_thumb_class);?>">
					<div class="post-nav-container">
						<?php
						next_post_link('%link',"<div class='blog-next-prev-img post-next-img'><i class='fas fa-arrow-right'></i>$next_thumbnail</div>");
						?>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php
	}
}


/**
 * Check if a post is a custom post type.
 *
 * @param mixed $post Post object or ID
 *
 * @return boolean
 */
function doctio_custom_post_types( $post = null ) {
	$custom_post_list = get_post_types( array( '_builtin' => false ) );

	// there are no custom post types
	if ( empty ( $custom_post_list ) ) {
		return false;
	}

	$custom_types     = array_keys( $custom_post_list );
	$current_post_type = get_post_type( $post );

	// could not detect current type
	if ( ! $current_post_type ) {
		return false;
	}

	return in_array( $current_post_type, $custom_types );
}


/**
 * Add span tag in archive list count number
 */
function doctio_add_span_archive_count($links) {
	$links = str_replace('</a>&nbsp;(', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'doctio_add_span_archive_count');


/**
 * Add span tag in category list count number
 */

function doctio_add_span_category_count($links) {
	$links = str_replace('</a> (', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('wp_list_categories', 'doctio_add_span_category_count');

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'doctio_posted_on' ) ) :

	function doctio_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'doctio' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-check"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'doctio_posted_by' ) ) :

	function doctio_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'doctio' ),
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline"><i class="far fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the tags.
 */
if ( ! function_exists( 'doctio_post_tags' ) ) :

	function doctio_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'doctio'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links"><span class="tag-title">' .esc_html__('Tags:','doctio').'</span>' .esc_html__(' %1$s', 'doctio') . '</span>', $tags_list); // WPCS: XSS OK.


			}

		}
	}
endif;

/**
 * Prints HTML with meta information for the categories.
 */

if ( ! function_exists( 'doctio_post_categories' ) ) :

	function doctio_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'doctio'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'doctio') . '</span>', $categories_list); // WPCS: XSS OK.
			}

		}
	}
endif;

/**
 * Prints post's first category
 */

if ( ! function_exists( 'doctio_post_first_category' ) ) :

	function doctio_post_first_category(){

		$post_category_list = get_the_terms(get_the_ID(), 'category');

		$post_first_category = $post_category_list[0];
		if ( ! empty( $post_first_category->slug )) {
			echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
		}

	}
endif;

/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'doctio_comment_count' ) ) :

	function doctio_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
			echo '<span class="comments-link"><i class="far fa-comments"></i>';
			comments_popup_link('', ''.esc_html__('1', 'doctio').' <span class="comment-count-text">'.esc_html__('Comment', 'doctio').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'doctio').'</span>');
			echo '</span>';
		}
	}
endif;