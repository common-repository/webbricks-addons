<?php
namespace WebbricksAddons\Elementor;

if (!defined('ABSPATH')) {
    exit;
}

class Webbricks_Assets_Manager {

    const PLUGIN_VERSION = '1.0.0';
    private $this_uri;

    /**
     * Initialize the assets manager
     */
    public static function init() {
        $instance = new self();
        $instance->this_uri = plugin_dir_url(__FILE__);
    
        // Enqueue editor styles directly when initializing
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_editor_styles']);
    
        add_action('elementor/frontend/after_register_scripts', [__CLASS__, 'register_style_scripts'], 20);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
        add_action('elementor/editor/before_enqueue_scripts', [__CLASS__, 'enqueue_editor_styles']);
    }

    /**
     * Enqueue Plugin Styles and Scripts
     */
    public static function register_style_scripts() {
        $assets_url = WBEA_ASSETS_URL;
    
        wp_enqueue_style('admin-icon', $assets_url . 'css/admin.css', array(), self::PLUGIN_VERSION);
        wp_enqueue_style('custom-grid', $assets_url . 'css/custom-grid.css', array(), self::PLUGIN_VERSION); 
        wp_enqueue_style('owl-carousel-wb', $assets_url . 'css/owl-carousel-min.css', array(), self::PLUGIN_VERSION);
        wp_enqueue_style('magnific-wb', $assets_url . 'css/magnific-popup.css', array(), self::PLUGIN_VERSION);
        wp_enqueue_style('style-main', $assets_url . 'css/style.css', array(), self::PLUGIN_VERSION);
        wp_enqueue_style('responsive', $assets_url . 'css/responsive.css', array(), self::PLUGIN_VERSION);   
    }

    /**
     * Enqueue Frontend Scripts
     */
    public static function enqueue_scripts() {
        $assets_url = WBEA_ASSETS_URL;

        wp_enqueue_script('owl-carousel-wb', $assets_url . 'js/owl.carousel.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('isotope-wb', $assets_url . 'js/isotope.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('imageloaded-wb', $assets_url . 'js/imageloaded.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('counterup-wb', $assets_url . 'js/counterup.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('countdown-wb', $assets_url . 'js/countdown.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('waypoint-wb', $assets_url . 'js/waypoints.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('magnific-wb', $assets_url . 'js/magnific-popup.min.js', array('jquery'), self::PLUGIN_VERSION, true);
        wp_enqueue_script('wb-main', $assets_url . 'js/main.js', array('jquery'), self::PLUGIN_VERSION, true);
    }

     /* Enqueue Editor Styles  */
     public static function enqueue_editor_styles() {
        $assets_url = WBEA_ASSETS_URL;

        // Enqueue your custom widget style for the editor
        wp_enqueue_style('custom-widget-style', $assets_url . 'css/custom-widget-style.css', array(), self::PLUGIN_VERSION);
    }
}

Webbricks_Assets_Manager::init();
