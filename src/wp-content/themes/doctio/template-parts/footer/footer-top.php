<?php
$footer_top = doctio_option('footer_top_options');
$footer_logo = $footer_top['footer_logo'];
$mailchimp_title = $footer_top['subscribe_form_title'];
$mailchimp_shortcode = $footer_top['mailchimp_shortcode'];
$top_right_text = $footer_top['top_right_text'];
?>
<div class="td-footer-top-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="td-footer-top-container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-0">
                            <div class="site-branding">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr( get_post_meta( $footer_logo['id'], '_wp_attachment_image_alt', true )); ?>">
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-8">
                            <div class="td-footer-subscribe">
                                <div class="td-subscribe-title td-secondary-font">
                                    <?php echo esc_html($mailchimp_title);?>
                                </div>
								<?php echo do_shortcode($mailchimp_shortcode)?>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 text-md-end">
                            <div class="footer-top-right-text">
	                            <?php echo wp_kses($top_right_text, doctio_allow_html());?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Subscribe End -->
