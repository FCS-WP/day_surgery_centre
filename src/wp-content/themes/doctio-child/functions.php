<?php
add_action('wp_enqueue_scripts', 'doctio_child_scripts');

function doctio_child_scripts()
{

    $parent_style = 'doctio-style';

    // lets remove the traces of existing stylesheet declaration on the parent theme
    wp_dequeue_style($parent_style);
    wp_deregister_style($parent_style);

    // let's override the parent style to point to the correct file
    wp_enqueue_style($parent_style, get_parent_theme_file_uri('style.css'));

    // now let's include child theme's stylesheet after parent's
    wp_enqueue_style(
        'child-style',
        get_theme_file_uri('style.css'),
        array($parent_style),
        filemtime(get_theme_file_path('style.css'))
    );
}


/*
 * Define Variables
 */
if (!defined('THEME_DIR'))
    define('THEME_DIR', get_template_directory());
if (!defined('THEME_URL'))
    define('THEME_URL', get_template_directory_uri());


/*
 * Include framework files
 */
foreach (glob(THEME_DIR . '-child' . "/includes/*.php") as $file_name) {
    require_once($file_name);
}
