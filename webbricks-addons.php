<?php
/*
 * Plugin Name: Web Bricks Addons
 * Plugin URI: https://getwebbricks.com/about-us
 * Description: Web Bricks is a powerful tool with 25+ free add-ons that makes it easy for anyone to create stunning and professional-looking websites, regardless of skill level.
 * Version: 1.1.1
 * Author: Web Bricks
 * Author URI: https://getwebbricks.com
 * Elementor tested up to: 3.22.3
 * Elementor Pro tested up to: 3.22.1
 * Text Domain: webbricks-addons
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Plugin constants
define('WBEA_PBNAME', plugin_basename(__FILE__));
define('WBEA_PATH', plugin_dir_path(__FILE__));
define('WBEA_ADMIN', WBEA_PATH . 'admin/');
define('WBEA_ADMIN_URL', plugins_url('/', __FILE__) . 'admin/');
define('WBEA_ELEMENTS', WBEA_PATH . 'widgets/');
define('WBEA_URL', plugins_url('/', __FILE__));
define('WBEA_ASSETS_URL', WBEA_URL . 'assets/');
define('WBEA_PLUGIN_VERSION', '1.0.1');
define('WBEA_MINIMUM_ELEMENTOR_VERSION', '2.0.0');
define('WBEA_MINIMUM_PHP_VERSION', '7.0');

// Initiate plugin Plugin class
function wbea_init_plugin() {
    if (!did_action('elementor/loaded')) {
        add_action('admin_notices', 'wbea_admin_notice_missing_elementor');
        return;
    }

    if (!version_compare(ELEMENTOR_VERSION, WBEA_MINIMUM_ELEMENTOR_VERSION, '>=')) {
        add_action('admin_notices', 'wbea_admin_notice_minimum_elementor_version');
        return;
    }

    if (version_compare(PHP_VERSION, WBEA_MINIMUM_PHP_VERSION, '<')) {
        add_action('admin_notices', 'wbea_admin_notice_minimum_php_version');
        return;
    }

    require_once WBEA_PATH . 'plugin.php';
    \WebbricksAddons\Elementor\Plugin::instance();
}
add_action('plugins_loaded', 'wbea_init_plugin');

// Admin notices
function wbea_admin_notice_missing_elementor() {
    $message = sprintf(
        /* translators: 1: Plugin name, 2: Required plugin name, 3: Additional information */
        '%1$s requires %2$s to be installed and activated. %3$s',
        '<strong>' . __('Webbricks Addons Elementor', 'webbricks-addons') . '</strong>',
        '<strong>' . __('Elementor', 'webbricks-addons') . '</strong>',
        '<a href="' . admin_url('plugin-install.php?s=Elementor&tab=search&type=term') . '">' . __('Please click here to install/activate Elementor', 'webbricks-addons') . '</a>'
    );

    printf('<div class="notice notice-warning is-dismissible"><p style="padding: 5px 0">%s</p></div>', $message);
}

function wbea_admin_notice_minimum_elementor_version() {
    /* translators: 1: Plugin name, 2: Required plugin name, 3: Required version */
    $translatable_message = __(
        '"%1$s" requires "%2$s" version %3$s or greater.',
        'webbricks-addons'
    );

    $message = sprintf(
        $translatable_message,
        '<strong>' . __('Webbricks Addons Elementor', 'webbricks-addons') . '</strong>',
        '<strong>' . __('Elementor', 'webbricks-addons') . '</strong>',
        WBEA_MINIMUM_ELEMENTOR_VERSION
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message);
}

function wbea_admin_notice_minimum_php_version() {
    /* translators: 1: Plugin name, 2: Required plugin name, 3: Required version */
    $message_format = __(
        '"%1$s" requires "%2$s" version %3$s or greater.',
        'webbricks-addons'
    );

    $message = sprintf(
        $message_format,
        '<strong>' . __('Webbricks Addons Elementor', 'webbricks-addons') . '</strong>',
        '<strong>' . __('PHP', 'webbricks-addons') . '</strong>',
        WBEA_MINIMUM_PHP_VERSION
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%s</p></div>', wp_kses_post($message));
}

// Plugin action links
function wbea_do_update_redirect_custom_links($links) {
    $settings_link = '<a href="' . esc_url(admin_url('admin.php?page=wbea-settings')) . '">' . __('Settings', 'webbricks-addons') . '</a>';

    $links = array(
        'deactivate' => $links['deactivate'],
        'settings' => $settings_link,
    );

    return $links;
}
add_filter('plugin_action_links_' . WBEA_PBNAME, 'wbea_do_update_redirect_custom_links');

// Plugin Redirect Option Added by register_activation_hook
function wbea_plugin_redirect_option() {
    add_option('wbea_do_update_redirect', true);
}
register_activation_hook(__FILE__, 'wbea_plugin_redirect_option');
