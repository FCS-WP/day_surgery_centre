<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Doctio Admin Pages
 *
 */
if ( ! class_exists( 'Doctio_Admin' ) ) {

    class Doctio_Admin{
        private static $instance = null;

        public static function init() {
            if( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {

            add_action( 'init', array( $this, 'doctio_create_tgmpa_page' ), 1 );
            add_action( 'admin_menu', array( $this, 'doctio_create_admin_page' ), 1 );
            add_action( 'admin_enqueue_scripts', array( $this, 'doctio_admin_page_enqueue_scripts' ) );

            add_filter( 'ocdi/plugin_page_setup', array( $this, 'doctio_pt_ocdi_page_setup' ) );

        }

        public function doctio_create_admin_page() {
            add_menu_page( esc_html__( 'Doctio', 'doctio' ), esc_html__( 'Doctio', 'doctio' ), 'manage_options', 'doctio', array( $this, 'doctio_admin_page_dashboard' ), 'dashicons-screenoptions', 2 );
            add_submenu_page( 'doctio', esc_html__( 'Welcome', 'doctio' ), esc_html__( 'Welcome & Support', 'doctio' ), 'manage_options', 'doctio', array( $this, 'doctio_admin_page_dashboard' ) );
        }

        public function doctio_admin_page_dashboard() {
            require_once DOCTIO_INC_DIR .'admin/page-dashboard.php';
        }

        public function doctio_create_tgmpa_page() {
            require_once DOCTIO_INC_DIR .'admin/class-tgm-plugin-activation.php';
            require_once DOCTIO_INC_DIR .'admin/page-tgmpa.php';
        }

        public function doctio_admin_page_enqueue_scripts() {
            wp_enqueue_style( 'doctio-admin', get_theme_file_uri( 'inc/admin/assets/css/admin.css' ), array(), DOCTIO_VERSION, 'all' );
        }

        public function doctio_pt_ocdi_page_setup( $args ) {

            $args['parent_slug'] = 'doctio';
            $args['menu_slug']   = 'doctio-import-demo';
            $args['menu_title']  = esc_html__( 'Import Demo', 'doctio' );
            $args['capability']  = 'manage_options';

            return $args;

        }

    }

    Doctio_Admin::init();
}