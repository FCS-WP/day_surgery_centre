<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doctio
 */

if ( is_page() || is_singular( 'post' ) || doctio_custom_post_types() && get_post_meta( $post->ID, 'doctio_common_meta', true ) ) {
	$common_meta = get_post_meta( $post->ID, 'doctio_common_meta', true );
} else {
	$common_meta = array();
}

if ( is_array( $common_meta ) && array_key_exists( 'footer_style_meta', $common_meta ) && $common_meta['footer_style_meta'] != 'default' ) {
	$footer_style = $common_meta['footer_style_meta'];
} else {
	$footer_style = doctio_option('site_default_footer', 'footer-style-one');
}

$go_to_top = doctio_option('go_to_top_button', false);
?>

</div><!-- #content -->

<footer class="site-footer td-cover-bg <?php echo esc_attr($footer_style);?>">
	<?php if($footer_style == 'footer-style-two'){
		get_template_part( 'template-parts/footer/footer-top');
	}?>

	<?php get_template_part( 'template-parts/footer/footer-widgets'); ?>

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom-wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="site-info-left">
                                    <?php
                                    $footer_info_left_text = doctio_option('footer_info_left_text');
                                    echo wp_kses($footer_info_left_text, doctio_allow_html());
                                    ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="site-copyright-text">
                                    <?php
                                    $copyright_text = doctio_option('copyright_text');

                                    echo wp_kses($copyright_text, doctio_allow_html());
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

		<?php if($go_to_top == true) :
            $go_top_icon = doctio_option('go_top_icon');
            ?>
            <div class="scroll-to-top td-primary-bg"><i class="<?php echo esc_attr($go_top_icon);?>"></i></div>
		<?php endif;?>
    </div>
</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>