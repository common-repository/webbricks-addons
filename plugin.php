<?php
/**
 * Plugin Main Class
 * 
 * @package Webbricks Addons
 */

namespace WebbricksAddons\Elementor;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Webbricks Addons for Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Plugin {
    const CATEGORY_SLUG = 'webbricks-addons';

    private static $_instance = null;
    public static $is_pro_active;

    public static function instance() {
        return is_null(self::$_instance) ? self::$_instance = new self() : self::$_instance;
    }

    public function __construct() {
        do_action('exad/before_init');
        self::$is_pro_active = apply_filters('exad/pro_activated', false);
        $this->includes();
        $this->register_hooks();
    }

    public function register_hooks() {
        add_action('init', [$this, 'i18n']);
        add_action('elementor/elements/categories_registered', [$this, 'register_category']);
    }

    public function includes() {
        include_once trailingslashit(WBEA_PATH) . 'includes/addons-class.php';
        include_once trailingslashit(WBEA_PATH) . 'includes/assets-class.php';
        if (is_admin()) {
            include_once trailingslashit(WBEA_PATH) . 'admin/main.php';
        }
    }

    public function i18n() {
        // Load the translation files for the 'webbricks-addons' text domain.
        // Translators: This is a placeholder for dynamic content.
        load_plugin_textdomain('webbricks-addons');
    }

    public function register_category($elements_manager) {
        $elements_manager->add_category(
            'webbricks-addons',
            [
                'title' => __('Web Bricks Addons', 'webbricks-addons'),
            ]
        );
    }

    public function is_elementor_activated($plugin_path = 'elementor/elementor.php') {
        $installed_plugins_list = get_plugins();
        return isset($installed_plugins_list[$plugin_path]);
    }
}
