<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly. ?>

<div class="wrap td-wrap">

    <div class="td-admin-page-header">

        <div class="td-admin-page-header-text">
            <h1><?php esc_html_e('Welcome to Doctio!', 'doctio'); ?></h1>
            <p><?php esc_html_e('Doctio is a medical health WordPress theme', 'doctio'); ?></p>
        </div>

        <div class="td-admin-page-header-logo">
            <img src="<?php echo get_theme_file_uri('inc/admin/assets/images/admin-logo.png'); ?>"/>
            <strong>V-<?php echo wp_get_theme()->get('Version'); ?></strong>
        </div>
    </div>

    <div class="td-admin-boxes">

        <div class="td-admin-box">

            <div class="td-admin-box-header">
                <h2><?php esc_html_e('Theme Documentation', 'doctio'); ?></h2>
            </div>

            <div class="td-admin-box-inside">
                <p><?php esc_html_e('You can find everything about theme settings. See our online documentation.', 'doctio'); ?></p>
                <a href="https://docs.themedraft.net/wp/doctio/" target="_blank"
                   class="button"><?php esc_html_e('Go to Documentation', 'doctio'); ?></a>
            </div>

        </div>

        <div class="td-admin-box">

            <div class="td-admin-box-header">
                <h2><?php esc_html_e('Theme Support', 'doctio'); ?></h2>
            </div>

            <div class="td-admin-box-inside">
                <p><?php esc_html_e('Do you need help? Feel free to ask any question.', 'doctio'); ?></p>
                <a href="https://themeforest.net/item/doctio-medical-health-wordpress-theme/38283662/support" target="_blank"
                   class="button"><?php esc_html_e('Contact Support', 'doctio'); ?></a>
            </div>
        </div>

    </div>

</div>