<?php
get_header();

if ( get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
	$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
} else {
	$common_meta = array();
}

if ( array_key_exists( 'layout_meta', $common_meta ) && $common_meta['layout_meta'] != 'default' ) {
	$team_layout = $common_meta['layout_meta'];
} else {
	$team_layout = doctio_option( 'team_default_layout', 'full-width' );
}

if ( array_key_exists( 'sidebar_meta', $common_meta ) && $common_meta['sidebar_meta'] != '0' ) {
	$selected_sidebar = $common_meta['sidebar_meta'];
} else {
	$selected_sidebar = doctio_option( 'team_default_sidebar', 'doctio-team-sidebar' );
}

if ( $team_layout == 'left-sidebar' && is_active_sidebar( $selected_sidebar ) || $team_layout == 'right-sidebar' && is_active_sidebar( $selected_sidebar ) ) {
	$team_column_class = 'col-lg-8';
} else {
	$team_column_class = 'col-lg-12';
}

if ( array_key_exists( 'enable_banner', $common_meta ) ) {
	$team_banner = $common_meta['enable_banner'];
} else {
	$team_banner = true;
}

if ( array_key_exists( 'hide_banner_title_meta', $common_meta ) && $common_meta['hide_banner_title_meta'] != 'default' ) {
	$hide_team_title = $common_meta['hide_banner_title_meta'];
} else {
	$hide_team_title = doctio_option( 'hide_banner_title', 'no' );
}

if ( array_key_exists( 'custom_title', $common_meta ) ) {
	$custom_title = $common_meta['custom_title'];
} else {
	$custom_title = '';
}


if ( array_key_exists( 'hide_banner_breadcrumb_meta', $common_meta ) && $common_meta['hide_banner_breadcrumb_meta'] != 'default' ) {
	$hide_team_breadcrumb = $common_meta['hide_banner_breadcrumb_meta'];
} else {
	$hide_team_breadcrumb = doctio_option( 'hide_banner_breadcrumb', 'no' );
}

if ( array_key_exists( 'banner_text_align_meta', $common_meta ) && $common_meta['banner_text_align_meta'] != 'default' ) {
	$banner_text_align = $common_meta['banner_text_align_meta'];
} else {
	$banner_text_align = doctio_option( 'banner_default_text_align', 'center' );
}

?>

<?php if($team_banner == true) : ?>
    <div class="banner-area team-banner">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="banner-content text-<?php echo esc_attr( $banner_text_align ); ?>">
						<?php if($hide_team_title !== 'yes') : ?>
                            <h2 class="banner-title">
								<?php
								if ( ! empty( $custom_title ) ) {
									echo esc_html( $custom_title );
								} else {
									the_title();
								}
								?>
                            </h2>
						<?php endif;?>

						<?php if ( function_exists( 'bcn_display' ) && $hide_team_breadcrumb !== 'yes') :?>
                            <div class="breadcrumb-container td-secondary-font">
								<?php bcn_display();?>
                            </div>
						<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    <div id="primary" class="content-area layout-<?php echo esc_attr( $team_layout ); ?>">
        <div class="container">
            <div class="row">
				<?php if ( $team_layout == 'left-sidebar' && is_active_sidebar( $selected_sidebar ) ) : ?>
                    <div class="col-lg-4 widget-style-2 order-lg-0 order-last">
						<?php get_sidebar(); ?>
                    </div>
				<?php endif ?>

                <div class="<?php echo esc_attr( $team_column_class ); ?>">
					<?php
					while ( have_posts() ) :
						the_post();

						the_content();
					endwhile; // End of the loop.
					?>
                </div>

				<?php if ( $team_layout == 'right-sidebar' && is_active_sidebar( $selected_sidebar ) ) : ?>
                    <div class="col-lg-4 widget-style-2 order-lg-0 order-last">
						<?php get_sidebar(); ?>
                    </div>
				<?php endif ?>
            </div>
        </div>
    </div><!-- #primary -->
<?php
get_footer();