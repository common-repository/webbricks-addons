<?php
namespace WebbricksAddons\Elementor\Dashboard;

if (!defined('ABSPATH')) {
    exit;
}

use WebbricksAddons\Elementor\Webbricks_Addons_Manager;
use WebbricksAddons\Elementor\Plugin;

class Admin_Settings {

    private $save_dashboard_settings;
    private $get_dashboard_settings;

    public function __construct() {
        add_action('admin_menu', array($this, 'wbea_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('wp_ajax_wbea_ajax_save_elements_setting', array($this, 'wbea_save_setting_function'));
    }

    public function enqueue_admin_scripts($hook) {
        if (isset($hook) && $hook == 'toplevel_page_wbea-settings') {
            wp_enqueue_style('wbea-admin-css', WBEA_ADMIN_URL . 'assets/css/style.css', WBEA_PLUGIN_VERSION, 'all');
            wp_enqueue_script('wbea-admin-js', WBEA_ADMIN_URL . 'assets/js/script.js', array('jquery'), WBEA_PLUGIN_VERSION, true);
        }
    }

    public function wbea_admin_menu() {
        $title = __('Web Bricks', 'webbricks-addons');
        add_menu_page($title, $title, 'manage_options', 'wbea-settings', array($this, 'wbea_settings_page'), WBEA_ADMIN_URL . 'assets/img/wb-admin-logo.svg', 50);
    }

    public function wbea_settings_page() {
        $js_info = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('wbea_settings_nonce_action')
        );
        wp_localize_script('wbea-admin-js', 'wbea_js_settings', $js_info);

        $this->get_dashboard_settings = get_option('wbea_save_settings', Webbricks_Addons_Manager::$all_feature_settings);
        $wbea_new_settings = array_diff_key(Webbricks_Addons_Manager::$all_feature_settings, $this->get_dashboard_settings);

        if (!empty($wbea_new_settings)) {
            $wbea_updated_settings = array_merge($this->get_dashboard_settings, $wbea_new_settings);
            update_option('wbea_save_settings', $wbea_updated_settings);
        }

        $this->get_dashboard_settings = get_option('wbea_save_settings', Webbricks_Addons_Manager::$all_feature_settings);
        ?>
        <div class="wbea-elements-dashboard-wrapper">
            <form action="" method="POST" id="wbea-elements-settings" name="wbea-elements-settings">
                <?php wp_nonce_field('save_dashboard_settings_nonce_action'); ?>

                <div class="wbea-dashboard-header-wrapper">
                    <div class="wbea-dashboard-header-left">
                        <h4><svg width="168" height="164" viewBox="0 0 168 164" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_1499_72)">
                                <path d="M20.7116 30.9434H47.7167L35.3393 53.4476H7.20898L20.7116 30.9434Z" fill="#19A6B6"/>
                                <path d="M47.7172 30.9434L65.7206 61.3242L52.2181 80.4528L35.3398 53.4476L47.7172 30.9434Z" fill="#002D40"/>
                                <path d="M98.3515 35.4442L112.979 56.8233L70.2211 129.962L57.8438 107.458L98.3515 35.4442Z" fill="#002D40"/>
                                <path d="M118.606 33.1938H145.611L105.103 105.208H76.9727L118.606 33.1938Z" fill="#1BA4B6"/>
                                <path d="M145.611 33.1938L159.114 55.6981L117.481 127.712L105.104 105.208L145.611 33.1938Z" fill="#002D40"/>
                                <path d="M35.3393 101.832L7.20898 53.4476H35.3393L53.3428 81.578L35.3393 101.832Z" fill="#FF414D"/>
                                <path d="M43.2155 129.962H70.2206L57.8432 107.458H29.7129L43.2155 129.962Z" fill="#FF414D"/>
                                <path d="M90.4752 127.712H117.48L105.103 105.208H76.9727L90.4752 127.712Z" fill="#FF414D"/>
                                <path d="M71.3458 35.4442H98.351L57.8432 107.458H29.7129L71.3458 35.4442Z" fill="#1BA4B6"/>
                            </g>
                            <defs>
                                <filter x="0" y="0" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dx="4" dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1499_72"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1499_72" result="shape"/>
                                </filter>
                            </defs>
                            </svg>
                            <?php esc_html_e('Web Bricks Addons Settings', 'webbricks-addons'); ?>
                        </h4>
                    </div>
                    <div class="wbea-dashboard-header-right">
                        <button type="submit" class="wbea-btn wbea-save-setting">
                            <?php esc_html_e('Save Settings', 'webbricks-addons'); ?>
                        </button>
                    </div>
                </div>

                <div class="wbea-dashboard-tabs-box">
                    <ul class="wbea-dashboard-tabs">
                        <li class="wbea-tab-btn">
                            <a href="#home" class="active">
                            <svg width="64" height="28" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.1333 6.75194C29.2154 5.84 30.5849 5.33984 32 5.33984C33.4151 5.33984 34.7846 5.84 35.8667 6.75194L53.8667 21.9306C55.2187 23.0719 56 24.7493 56 26.5173V52.6586C56 53.8963 55.5083 55.0833 54.6332 55.9584C53.758 56.8336 52.571 57.3253 51.3333 57.3253H42C40.7623 57.3253 39.5753 56.8336 38.7002 55.9584C37.825 55.0833 37.3333 53.8963 37.3333 52.6586V37.9919C37.3333 37.8151 37.2631 37.6456 37.1381 37.5205C37.013 37.3955 36.8435 37.3253 36.6667 37.3253H27.3333C27.1565 37.3253 26.987 37.3955 26.8619 37.5205C26.7369 37.6456 26.6667 37.8151 26.6667 37.9919V52.6586C26.6667 53.8963 26.175 55.0833 25.2998 55.9584C24.4247 56.8336 23.2377 57.3253 22 57.3253H12.6667C12.0538 57.3253 11.447 57.2046 10.8808 56.97C10.3146 56.7355 9.80018 56.3918 9.36684 55.9584C8.9335 55.5251 8.58975 55.0107 8.35523 54.4445C8.12071 53.8783 8 53.2714 8 52.6586V26.5173C8 24.7493 8.78133 23.0719 10.1333 21.9306L28.1333 6.75194ZM33.288 9.8106C32.9274 9.50709 32.4713 9.34066 32 9.34066C31.5287 9.34066 31.0726 9.50709 30.712 9.8106L12.712 24.9866C12.4893 25.1741 12.3101 25.408 12.1871 25.6719C12.0642 25.9358 12.0003 26.2234 12 26.5146V52.6559C12 53.0239 12.2987 53.3226 12.6667 53.3226H22C22.1768 53.3226 22.3464 53.2524 22.4714 53.1273C22.5964 53.0023 22.6667 52.8328 22.6667 52.6559V37.9893C22.6667 35.4106 24.7573 33.3226 27.3333 33.3226H36.6667C39.2427 33.3226 41.3333 35.4106 41.3333 37.9893V52.6559C41.3333 53.0239 41.632 53.3226 42 53.3226H51.3333C51.5101 53.3226 51.6797 53.2524 51.8047 53.1273C51.9298 53.0023 52 52.8328 52 52.6559V26.5173C51.9997 26.2261 51.9358 25.9385 51.8129 25.6746C51.6899 25.4107 51.5107 25.1768 51.288 24.9893L33.288 9.8106Z" fill="#212121"/></svg>
                                <span><?php esc_html_e('Home', 'webbricks-addons'); ?></span>
                            </a>
                        </li>
                        <li class="wbea-tab-btn">
                            <a href="#widgets">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M48.6667 8C50.6116 8 52.4769 8.77262 53.8521 10.1479C55.2274 11.5232 56 13.3884 56 15.3333V48.6667C56 50.6116 55.2274 52.4769 53.8521 53.8521C52.4769 55.2274 50.6116 56 48.6667 56H15.3333C13.3884 56 11.5232 55.2274 10.1479 53.8521C8.77262 52.4769 8 50.6116 8 48.6667V15.3333C8 13.3884 8.77262 11.5232 10.1479 10.1479C11.5232 8.77262 13.3884 8 15.3333 8H48.6667ZM48.6667 12H15.3333C13.4933 12 12 13.4933 12 15.3333V48.6667C12 50.5067 13.4933 52 15.3333 52H48.6667C50.5067 52 52 50.5067 52 48.6667V15.3333C52 13.4933 50.5067 12 48.6667 12ZM26.0053 33.3333C28.5813 33.3333 30.672 35.424 30.672 38V43.3333C30.672 44.571 30.1803 45.758 29.3052 46.6332C28.43 47.5083 27.243 48 26.0053 48H20.672C19.4343 48 18.2473 47.5083 17.3722 46.6332C16.497 45.758 16.0053 44.571 16.0053 43.3333V38C16.0053 35.424 18.0933 33.3333 20.672 33.3333H26.0053ZM43.3307 33.3333C45.9093 33.3333 47.9973 35.424 47.9973 38V43.3333C47.9973 44.5705 47.506 45.7571 46.6314 46.6322C45.7568 47.5073 44.5705 47.9993 43.3333 48H38C36.7623 48 35.5753 47.5083 34.7002 46.6332C33.825 45.758 33.3333 44.571 33.3333 43.3333V38C33.3333 35.424 35.424 33.3333 38 33.3333H43.3307ZM26.0053 37.3333H20.672C20.4952 37.3333 20.3256 37.4036 20.2006 37.5286C20.0756 37.6536 20.0053 37.8232 20.0053 38V43.3333C20.0053 43.7013 20.304 44 20.672 44H26.0053C26.1821 44 26.3517 43.9298 26.4767 43.8047C26.6018 43.6797 26.672 43.5101 26.672 43.3333V38C26.672 37.8232 26.6018 37.6536 26.4767 37.5286C26.3517 37.4036 26.1821 37.3333 26.0053 37.3333ZM43.3307 37.3333H37.9973C37.8205 37.3333 37.651 37.4036 37.5259 37.5286C37.4009 37.6536 37.3307 37.8232 37.3307 38V43.3333C37.3307 43.7013 37.6293 44 37.9973 44H43.3307C43.5075 44 43.6771 43.9298 43.8021 43.8047C43.9271 43.6797 43.9973 43.5101 43.9973 43.3333V38C43.9973 37.8232 43.9271 37.6536 43.8021 37.5286C43.6771 37.4036 43.5075 37.3333 43.3307 37.3333ZM26.0027 16C28.5787 16 30.6693 18.0907 30.6693 20.6667V26C30.6693 27.2377 30.1777 28.4247 29.3025 29.2998C28.4273 30.175 27.2403 30.6667 26.0027 30.6667H20.6693C20.0563 30.667 19.4492 30.5466 18.8827 30.3122C18.3162 30.0778 17.8014 29.7341 17.3678 29.3008C16.9342 28.8674 16.5902 28.3528 16.3555 27.7865C16.1208 27.2201 16 26.6131 16 26V20.6667C16 18.0907 18.0907 16 20.6667 16H26H26.0027ZM43.328 16C45.9067 16 47.9947 18.0907 47.9947 20.6667V26C47.9947 27.2377 47.503 28.4247 46.6278 29.2998C45.7527 30.175 44.5657 30.6667 43.328 30.6667H37.9947C36.757 30.6667 35.57 30.175 34.6948 29.2998C33.8197 28.4247 33.328 27.2377 33.328 26V20.6667C33.328 18.0907 35.4187 16 37.9947 16H43.328ZM26.0027 20H20.6693C20.4925 20 20.323 20.0702 20.1979 20.1953C20.0729 20.3203 20.0027 20.4899 20.0027 20.6667V26C20.0027 26.368 20.3013 26.6667 20.6693 26.6667H26.0027C26.1795 26.6667 26.349 26.5964 26.4741 26.4714C26.5991 26.3464 26.6693 26.1768 26.6693 26V20.6667C26.6693 20.4899 26.5991 20.3203 26.4741 20.1953C26.349 20.0702 26.1795 20 26.0027 20ZM43.328 20H37.9947C37.8179 20 37.6483 20.0702 37.5233 20.1953C37.3982 20.3203 37.328 20.4899 37.328 20.6667V26C37.328 26.368 37.6267 26.6667 37.9947 26.6667H43.328C43.5048 26.6667 43.6744 26.5964 43.7994 26.4714C43.9244 26.3464 43.9947 26.1768 43.9947 26V20.6667C43.9947 20.4899 43.9244 20.3203 43.7994 20.1953C43.6744 20.0702 43.5048 20 43.328 20Z" fill="#212121"/></svg>
                                <span><?php esc_html_e('Widgets', 'webbricks-addons'); ?></span>
                            </a>
                        </li>
                        <li class="wbea-tab-btn">
                            <a href="#getpro">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.5093 21.3439L29.9999 21.3306H49.9999C52.2132 21.3304 54.3427 22.177 55.9517 23.6967C57.5607 25.2165 58.5273 27.2942 58.6533 29.5039L58.6666 29.9972V34.1572C57.4763 33.0149 56.1295 32.0479 54.6666 31.2852V29.9972C54.6666 28.7596 54.1749 27.5726 53.2997 26.6974C52.4246 25.8222 51.2376 25.3306 49.9999 25.3306H29.9999C28.8287 25.3306 27.7004 25.771 26.8389 26.5644C25.9773 27.3577 25.4456 28.446 25.3493 29.6132L25.3333 29.9972V49.9972C25.3334 51.1688 25.7741 52.2975 26.568 53.1591C27.362 54.0207 28.4509 54.5522 29.6186 54.6479L29.9999 54.6639H31.2853C32.0506 56.1306 33.0186 57.4772 34.1546 58.6639H29.9999C27.7862 58.664 25.6564 57.8171 24.0473 56.2968C22.4382 54.7765 21.4719 52.6981 21.3466 50.4879L21.3333 49.9999V29.9999C21.3331 27.7862 22.1801 25.6564 23.7004 24.0473C25.2207 22.4382 27.2991 21.4719 29.5093 21.3466V21.3439Z" fill="#212121"/><path d="M41.552 11.288L41.6907 11.76L43.5387 18.6614H39.3974L37.8294 12.7947C37.6709 12.2024 37.3973 11.6471 37.0242 11.1606C36.6511 10.6741 36.1857 10.2659 35.6548 9.95934C35.1238 9.65275 34.5377 9.45379 33.9298 9.37384C33.3219 9.29389 32.7042 9.3345 32.112 9.49337L12.7947 14.672C11.667 14.9744 10.6937 15.6885 10.0667 16.6734C9.43977 17.6583 9.20474 18.8424 9.40803 19.992L9.49337 20.3867L14.672 39.704C14.9149 40.6118 15.4262 41.425 16.139 42.0374C16.8517 42.6497 17.7327 43.0327 18.6667 43.136V47.152C16.9329 47.0487 15.2701 46.4271 13.8936 45.3678C12.5172 44.3085 11.4905 42.8602 10.9467 41.2107L10.808 40.7414L5.63203 21.4214C5.05871 19.2837 5.32493 17.0077 6.37611 15.06C7.42729 13.1124 9.18376 11.6407 11.2854 10.9467L11.76 10.808L31.0774 5.63203C33.215 5.05871 35.4911 5.32493 37.4387 6.37611C39.3864 7.42729 40.8581 9.18643 41.552 11.288ZM61.3334 46.6667C61.3334 42.7769 59.7881 39.0463 57.0376 36.2958C54.2871 33.5453 50.5565 32 46.6667 32C42.7769 32 39.0463 33.5453 36.2958 36.2958C33.5453 39.0463 32 42.7769 32 46.6667C32 50.5565 33.5453 54.2871 36.2958 57.0376C39.0463 59.7881 42.7769 61.3334 46.6667 61.3334C50.5565 61.3334 54.2871 59.7881 57.0376 57.0376C59.7881 54.2871 61.3334 50.5565 61.3334 46.6667ZM46.4267 37.352L46.6667 37.3334L46.9067 37.3547C47.1731 37.4034 47.4184 37.532 47.6099 37.7235C47.8014 37.915 47.93 38.1603 47.9787 38.4267L48 38.6667V45.3334L54.68 45.336L54.92 45.3574C55.1864 45.406 55.4317 45.5347 55.6232 45.7262C55.8147 45.9177 55.9434 46.163 55.992 46.4294L56.0134 46.6694L55.992 46.9094C55.9432 47.1761 55.8142 47.4217 55.6221 47.6132C55.4301 47.8048 55.1843 47.9332 54.9174 47.9814L54.6774 48.0027H48.0027V54.6774L47.9814 54.9174C47.9327 55.1838 47.8041 55.4291 47.6126 55.6206C47.4211 55.8121 47.1758 55.9407 46.9094 55.9894L46.6694 56.0107L46.4294 55.9894C46.163 55.9407 45.9177 55.8121 45.7262 55.6206C45.5347 55.4291 45.406 55.1838 45.3574 54.9174L45.336 54.6774V48H38.6614L38.4214 47.9787C38.155 47.93 37.9097 47.8014 37.7182 47.6099C37.5267 47.4184 37.398 47.1731 37.3494 46.9067L37.328 46.6667L37.3494 46.4267C37.398 46.1603 37.5267 45.915 37.7182 45.7235C37.9097 45.532 38.155 45.4034 38.4214 45.3547L38.6614 45.3334H45.3334V38.6667L45.3547 38.4267C45.4029 38.1598 45.5313 37.9139 45.7228 37.7219C45.9144 37.5299 46.1599 37.4009 46.4267 37.352Z" fill="#212121"/></svg>
                                <span><?php esc_html_e('Get Pro', 'webbricks-addons'); ?></span>
                            </a>
                        </li>
                        <li class="wbea-tab-btn">
                            <a href="#templates">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M47.336 8L47.8293 8.01333C49.9541 8.13431 51.9601 9.03286 53.4649 10.5377C54.9698 12.0426 55.8684 14.0486 55.9893 16.1733L56.0027 16.6667V47.3333L55.9893 47.824C55.864 50.0341 54.8977 52.1126 53.2886 53.6329C51.6795 55.1532 49.5497 56.0001 47.336 56H16.6667C14.453 56.0001 12.3231 55.1532 10.7141 53.6329C9.10498 52.1126 8.13866 50.0341 8.01333 47.824L8 47.3333V16.6667C7.99986 14.453 8.84681 12.3231 10.3671 10.7141C11.8874 9.10498 13.9659 8.13866 16.176 8.01333L16.6667 8H47.336ZM52 21.3333H12.0027L12 47.3333C12 48.5045 12.4405 49.6328 13.2338 50.4944C14.0272 51.3559 15.1155 51.8876 16.2827 51.984L16.6667 52H47.336L47.72 51.984C48.8183 51.8937 49.8491 51.4176 50.63 50.6401C51.4109 49.8626 51.8915 48.8338 51.9867 47.736L52.0027 47.3333L52 21.3333ZM27.3333 25.3333C27.8166 25.3334 28.2836 25.5084 28.6478 25.826C29.0121 26.1437 29.2489 26.5825 29.3147 27.0613L29.3333 27.3333V46C29.3333 46.4833 29.1583 46.9502 28.8406 47.3145C28.523 47.6787 28.0841 47.9156 27.6053 47.9813L27.3333 48H18C17.5167 48 17.0498 47.825 16.6855 47.5073C16.3213 47.1896 16.0844 46.7508 16.0187 46.272L16 46V27.3333C16 26.85 16.175 26.3831 16.4927 26.0189C16.8104 25.6546 17.2492 25.4177 17.728 25.352L18 25.3333H27.3333ZM25.3333 29.3333H20V44H25.3333V29.3333ZM43.3333 33.3413C43.8401 33.3415 44.3278 33.534 44.6981 33.8799C45.0684 34.2259 45.2935 34.6995 45.3281 35.205C45.3626 35.7106 45.204 36.2104 44.8842 36.6035C44.5644 36.9966 44.1073 37.2536 43.6053 37.3227L43.3333 37.3413H34.0107C33.5042 37.3405 33.0168 37.1475 32.6471 36.8014C32.2773 36.4552 32.0527 35.9817 32.0185 35.4763C31.9843 34.971 32.1431 34.4715 32.4629 34.0787C32.7827 33.6859 33.2396 33.429 33.7413 33.36L34.0107 33.3413H43.3333ZM46 25.3333C46.5067 25.3335 46.9945 25.526 47.3648 25.8719C47.735 26.2179 47.9602 26.6915 47.9947 27.197C48.0293 27.7026 47.8706 28.2024 47.5508 28.5955C47.2311 28.9886 46.774 29.2456 46.272 29.3147L46 29.3333H34.0107C33.5042 29.3325 33.0168 29.1395 32.6471 28.7934C32.2773 28.4472 32.0527 27.9737 32.0185 27.4683C31.9843 26.963 32.1431 26.4635 32.4629 26.0707C32.7827 25.6779 33.2396 25.421 33.7413 25.352L34.0107 25.3333H46Z" fill="#212121"/></svg>
                                <span><?php esc_html_e('Templates', 'webbricks-addons'); ?></span>
                            </a>
                        </li>
                        <li class="wbea-tab-btn">
                            <a href="#support">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M53.3334 43.3226C53.3334 42.5348 53.1782 41.7547 52.8766 41.0269C52.5751 40.2991 52.1331 39.6378 51.5759 39.0809C51.0187 38.5239 50.3573 38.0822 49.6293 37.781C48.9014 37.4798 48.1212 37.3249 47.3334 37.3252H16.6667C15.8787 37.3249 15.0983 37.4799 14.3702 37.7813C13.6421 38.0827 12.9805 38.5246 12.4233 39.0818C11.8661 39.639 11.4242 40.3006 11.1228 41.0287C10.8214 41.7568 10.6664 42.5372 10.6667 43.3252V44.8639C10.6667 47.2453 11.5174 49.5466 13.0614 51.3573C17.2401 56.2479 23.6027 58.6639 31.9894 58.6639C40.3787 58.6639 46.7441 56.2506 50.9281 51.3599C52.48 49.5482 53.3331 47.2414 53.3334 44.8559V43.3226ZM16.6641 41.3252H47.3334C48.4347 41.3252 49.3281 42.2186 49.3281 43.3252V44.8586C49.3285 46.2891 48.8178 47.6727 47.8881 48.7599C44.5361 52.6746 39.2907 54.6613 31.9867 54.6613C24.6854 54.6613 19.4427 52.6746 16.1014 48.7599C15.1738 47.6737 14.6642 46.2923 14.6641 44.8639V43.3226C14.6641 42.2213 15.5601 41.3252 16.6641 41.3252ZM45.3254 18.6719C45.3258 15.8638 44.4395 13.1273 42.793 10.8525C41.1465 8.57771 38.8239 6.88084 36.1562 6.00384C33.4886 5.12684 30.6121 5.11448 27.937 5.96851C25.2619 6.82255 22.9247 8.49938 21.2587 10.7599C21.0655 10.6987 20.8641 10.6672 20.6614 10.6666H14.0001C13.4696 10.6666 12.9609 10.8773 12.5859 11.2524C12.2108 11.6274 12.0001 12.1362 12.0001 12.6666V27.3279C11.9994 28.2914 12.1885 29.2456 12.5568 30.1359C12.925 31.0262 13.465 31.8353 14.1461 32.5168C14.8271 33.1983 15.6358 33.739 16.5258 34.1079C17.4159 34.4767 18.3699 34.6666 19.3334 34.6666H20.0001V34.6559H20.0267C20.4785 34.6566 20.9231 34.5423 21.3185 34.3237C21.7139 34.1051 22.0471 33.7895 22.2868 33.4065C22.5265 33.0235 22.6647 32.5858 22.6885 32.1346C22.7123 31.6835 22.6208 31.2337 22.4227 30.8276C22.2246 30.4216 21.9264 30.0726 21.5562 29.8137C21.1859 29.5548 20.7559 29.3944 20.3065 29.3476C19.8571 29.3008 19.4032 29.3692 18.9876 29.5463C18.572 29.7234 18.2083 30.0034 17.9307 30.3599C17.3533 30.092 16.8646 29.6644 16.5224 29.1276C16.1803 28.5907 15.999 27.9672 16.0001 27.3306V26.6666H17.9947C19.0081 26.6666 19.9494 26.3413 20.7147 25.7919C22.2571 28.2372 24.5525 30.1148 27.2549 31.142C29.9573 32.1692 32.9204 32.2901 35.6975 31.4867C38.4747 30.6832 40.9155 28.9989 42.652 26.6875C44.3886 24.3762 45.3269 21.563 45.3254 18.6719ZM18.6587 18.3893C18.6548 18.5777 18.6548 18.7662 18.6587 18.9546V21.9972C18.6587 22.1741 18.5885 22.3436 18.4635 22.4687C18.3385 22.5937 18.1689 22.6639 17.9921 22.6639H16.0001V14.6693H18.6614L18.6587 18.3893ZM22.6587 18.9093V18.4346C22.7212 15.9806 23.7479 13.65 25.5165 11.9476C27.2851 10.2452 29.6531 9.30812 32.1077 9.33934C34.5623 9.37055 36.9058 10.3675 38.6306 12.1143C40.3553 13.8612 41.3224 16.2171 41.3224 18.6719C41.3224 21.1267 40.3553 23.4827 38.6306 25.2295C36.9058 26.9763 34.5623 27.9733 32.1077 28.0045C29.6531 28.0357 27.2851 27.0986 25.5165 25.3963C23.7479 23.6939 22.7212 21.3633 22.6587 18.9093Z" fill="#212121"/></svg>
                                <span><?php esc_html_e('Support', 'webbricks-addons'); ?></span>
                            </a>
                        </li>
                    </ul>
                    <?php include_once WBEA_ADMIN . 'parts/home.php'; ?>
                    <?php include_once WBEA_ADMIN . 'parts/getpro.php'; ?>
                    <?php include_once WBEA_ADMIN . 'parts/support.php'; ?>
                    <?php include_once WBEA_ADMIN . 'parts/templates.php'; ?>
                    <?php include_once WBEA_ADMIN . 'parts/widgets.php'; ?>
                </div>
            </form> <!-- Form End -->
        </div>
        <?php
    }

    public function all_pro_feature_keys() {
        $widget_pro_keys = array_keys(Webbricks_Addons_Manager::widget_map_pro());
        $extension_pro_keys = array_keys(Webbricks_Addons_Manager::extensions_map_pro());
        return array_merge($widget_pro_keys, $extension_pro_keys);
    }

    public function wbea_save_setting_function() {
        check_ajax_referer('wbea_settings_nonce_action', 'security');

        if (isset($_POST['fields'])) {
            parse_str($_POST['fields'], $settings);
        } else {
            return;
        }

        $this->save_dashboard_settings = [];

        if (!Plugin::$is_pro_active) {
            foreach ($this->all_pro_feature_keys() as $value) {
                $settings[$value] = 'on';
            }
        }

        foreach (Webbricks_Addons_Manager::$all_feature_array as $value) {
            $this->save_dashboard_settings[$value] = array_key_exists($value, $settings) ? 1 : 0;
        }

        update_option('wbea_save_settings', $this->save_dashboard_settings);

        wp_die();
    }

}

new Admin_Settings();
