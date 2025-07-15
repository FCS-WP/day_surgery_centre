<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
 * Post Share
 */

require_once ('post-share.php');

/*
 * Hide Meta Box On Blog & WooCommerce page
 */

if ( ! function_exists( 'themedraft_hide_metabox' ) ) {
	function themedraft_hide_metabox() {

		global $post, $post_type;

		if( class_exists( 'WooCommerce' ) && is_object( $post ) && $post_type === 'page' ) {
			$exclude   = array();
			$exclude[] = get_option( 'woocommerce_shop_page_id' );
			$exclude[] = get_option( 'woocommerce_cart_page_id' );
			$exclude[] = get_option( 'woocommerce_checkout_page_id' );
			$exclude[] = get_option( 'woocommerce_myaccount_page_id' );
			$exclude[] = get_option( 'page_for_posts' );
			$exclude[] = get_option( 'wishlist_page_id' );
			if( in_array( $post->ID, $exclude ) ) {
				echo '<style type="text/css">';
				echo '#doctio_common_meta{ display: none !important; }';
				echo '</style>';
			}
		}else{
			if(is_object( $post ) && $post_type === 'page'){
				$exclude   = array();
				$exclude[] = get_option( 'page_for_posts' );
				if( in_array( $post->ID, $exclude ) ) {
					echo '<style type="text/css">';
					echo '#doctio_common_meta{ display: none !important; }';
					echo '</style>';
				}
			}
		}

		echo '<style type="text/css">';
		echo '
		.elementor-editor-active .edit-post-visual-editor .block-editor-writing-flow__click-redirect{min-height:5vh}
		';
		echo '</style>';

	}

	add_action( 'admin_head', 'themedraft_hide_metabox' );
}


// Team Member List
if(! function_exists('themedraft_team_member_list')){
	function themedraft_team_member_list() {
		$team_list = array();
		$team_query = new WP_Query(array(
			'post_type' =>  array('doctio_team'),
			'posts_per_page'    =>  -1,
		));
		while ($team_query->have_posts()) :
			$team_query->the_post();
			$team_list[get_the_id()]  = get_the_title();
		endwhile;
		wp_reset_postdata();
		return $team_list;
	}
}

// Change Team Title Placeholder
function themedraft_change_team_title_placeholder( $title ){
	$screen = get_current_screen();

	if  ( 'doctio_team' == $screen->post_type ) {
		$title = __('Member Name', 'themedraft-core');
	}

	return $title;
}

add_filter( 'enter_title_here', 'themedraft_change_team_title_placeholder' );

//Post Category
function themedraft_post_categories() {
	$terms = get_terms( array(
		'taxonomy'   => 'category',
		'hide_empty' => true,
	) );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$options[ $term->slug ] = $term->name;
		}
	}

	return $options;
}

//Post List
function themedraft_get_post_title_as_list( ) {
	$args = wp_parse_args( array(
		'post_type'   => 'post',
		'order'   => 'desc',
		'numberposts' => -1,
	) );

	$posts = get_posts( $args );

	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->ID ] = $post->post_title;
		}
	}

	return $post_options;
}
//Post Order By
function themedraft_post_orderby_options() {
	$orderby = array(
		'ID'            => __( 'Post ID', 'themedraft-core' ),
		'author'        => __( 'Post Author', 'themedraft-core' ),
		'title'         => __( 'Title', 'themedraft-core' ),
		'date'          => __( 'Date', 'themedraft-core' ),
		'modified'      => __( 'Last Modified Date', 'themedraft-core' ),
		'parent'        => __( 'Parent Id', 'themedraft-core' ),
		'rand'          => __( 'Random', 'themedraft-core' ),
		'comment_count' => __( 'Comment Count', 'themedraft-core' ),
		'menu_order'    => __( 'Menu Order', 'themedraft-core' )
	);

	return $orderby;
}

//Get Excerpt
function themedraft_get_excerpt( $post_id, $excerpt_length ) {
	$the_post = get_post( $post_id ); //Gets post ID

	$the_excerpt = null;
	if ( $the_post ) {
		$the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
	}

	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); //Strips tags and images
	$words       = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) :
		array_pop( $words );
		array_push( $words, '…' );
		$the_excerpt = implode( ' ', $words );
	endif;

	return $the_excerpt;
}

function themedraft_class_sorter( $string ) {
	$class_sorter = strtolower( $string );
	$class_sorter = str_replace( ' ', '-', $class_sorter );
	$class_sorter = str_replace( '&', 'and', $class_sorter );
	$class_sorter = str_replace( 'amp;', '', $class_sorter );
	$class_sorter = str_replace( '/', 'slash', $class_sorter );

	$class_sorter = str_replace( ',-', ' ', $class_sorter );
	$class_sorter = str_replace( '.', '-', $class_sorter );
	$class_sorter = str_replace( ',', ' ', $class_sorter );

	return $class_sorter;
}