<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doctio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	if (is_page() || is_singular( 'post' ) || doctio_custom_post_types() && get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
		$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
	} else {
		$common_meta = array();
	}

	if ( is_array( $common_meta ) && array_key_exists( 'header_meta', $common_meta ) && $common_meta['header_meta'] != 'default' ) {
		$selected_header = $common_meta['header_meta'];
	} else {
		$selected_header = doctio_option( 'site_default_header', 'header-style-one' );
	}

	$preloader    = doctio_option( 'enable_preloader', true );
	$header_search = doctio_option('header_search', true);

	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site <?php echo esc_attr( $selected_header);?>">

	<?php if($preloader == true) {
		$preloader_image = doctio_option('preloader_image'); ?>
        <div class="preloader-wrapper">
            <div class="preloader bounce-active">
                <?php if(!empty($preloader_image['url'])) : ?>
                    <img src="<?php echo esc_url($preloader_image['url']); ?>" alt="<?php echo esc_attr($preloader_image['alt']); ?>">
                <?php else : ?>
                    <img src="<?php echo get_theme_file_uri('assets/images/preloader.png');?>" alt="<?php bloginfo( 'name' ); ?>">
                <?php endif; ?>
            </div>
        </div>
		<?php
	}?>

    <div class="mobile-menu-container">
        <div class="mobile-menu-close"></div>
        <div id="mobile-menu-wrap"></div>
    </div>

	<?php if( $header_search == true): ?>
    <div class="header-search-wrapper">
        <div class="search-close"></div>
        <div class="td-table">
            <div class="td-table-cell">
				<?php get_search_form() ?>
            </div>
        </div>
    </div>
	<?php endif; ?>

    <header class="header-area site-header">
		<?php get_template_part( 'template-parts/header/' . $selected_header . '' ); ?>
    </header>

    <div id="content" class="site-content">
        