<?php
namespace WebbricksAddons\Elementor;

if (!defined('ABSPATH')) {
    exit;
}

use WebbricksAddons\Elementor\Plugin;

class Webbricks_Addons_Manager
{

    public $extensions_data = [];

    public static $all_feature_array;
    public static $all_feature_settings;
    public static $is_activated_feature;
    public static $default_widgets = [];
    public static $default_extensions = [];

    public static function init()
    {
        self::widget_manager();
        self::activated_features();
        add_action('elementor/widgets/register', [__CLASS__, 'initiate_widgets']);
    }

    public static function widget_manager()
    {
        self::$default_widgets = Plugin::$is_pro_active ?
            apply_filters('wbea_add_pro_widgets', self::widget_map_free()) :
            array_merge(self::widget_map_free(), self::widget_map_pro());
    }

    public static function initiate_widgets()
    {
        foreach (self::$default_widgets as $key => $widget) {
            if (isset(self::$is_activated_feature[$key]) && self::$is_activated_feature[$key]) {
                self::include_widget($key, $widget);
            }
        }
    }

    private static function include_widget($key, $widget)
    {
        $widget_file = WBEA_ELEMENTS . $key . '/' . $key . '.php';
        if (file_exists($widget_file)) {
            require_once $widget_file;
        }

        if (class_exists($widget['class'])) {
            \Elementor\Plugin::instance()->widgets_manager->register(new $widget['class']);
        }
    }

    public static function activated_features()
    {
        self::$all_feature_array = array_merge(array_keys(self::$default_widgets), array_keys(self::$default_extensions));
        self::$all_feature_settings  = array_fill_keys(self::$all_feature_array, true);
        self::$is_activated_feature = get_option('wbea_save_settings', self::$all_feature_settings);
    }

    public static function widget_map_free() {

        return [
            'section-heading'  => [
                'title'  => __( 'Section Heading', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Section_Heading',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'hero'  => [
                'title'  => __( 'Hero', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\hero',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'about'  => [
                'title'  => __( 'About', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\About',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'services'  => [
                'title'  => __( 'Services', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Services',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'brand'  => [
                'title'  => __( 'Brand', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Brand',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'counter'  => [
                'title'  => __( 'Counter', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Counter',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'blogs'  => [
                'title'  => __( 'Blogs', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Blogs',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'faqs'  => [
                'title'  => __( 'FAQs', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Faqs',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'team'  => [
                'title'  => __( 'Team', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Team',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'price'  => [
                'title'  => __( 'Price', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Price',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'affiliate-products'  => [
                'title'  => __( 'Affiliate Products', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Affiliate_Products',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'testimonials'  => [
                'title'  => __( 'Testimonials Carousel', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Testimonial_Carousel',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'cta'  => [
                'title'  => __( 'CTA', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\CTA',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'info-box'  => [
                'title'  => __( 'Info Box', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Info_Box',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'slider'  => [
                'title'  => __( 'Slider', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Slider',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'team-carousel'  => [
                'title'  => __( 'Team Carousel', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Team_Carousel',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'blog-carousel'  => [
                'title'  => __( 'Blog Carousel', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Blog_Carousel',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'filter-gallery'  => [
                'title'  => __( 'Filter Gallery', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Filter_Gallery',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'products'  => [
                'title'  => __( 'Products', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Products',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'products-carousel'  => [
                'title'  => __( 'Products Carousel', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Products_Carousel',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'products-category'  => [
                'title'  => __( 'Products Category', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Products_Category',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'products-category-carousel'  => [
                'title'  => __( 'Products Category Carousel', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Products_Category_Carousel',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'creative-buttons'  => [
                'title'  => __( 'Creative Buttons', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Creative_Buttons',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'contact-form-7'  => [
                'title'  => __( 'Contact Form 7', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Contact_Form_7',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'contact-info'  => [
                'title'  => __( 'Contact Info', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Contact_Info',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'business-hours'  => [
                'title'  => __( 'Business Hours', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Business_Hours',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ],
            'countdown'  => [
                'title'  => __( 'Countdown Timer', 'webbricks-addons' ),
                'class'  => '\WebbricksAddons\Elements\Countdown',
                'demo_link' => '#',
                'tags'   => 'free',
                'is_pro' => false
            ]               
        ];

    }

    public static function widget_map_pro()
    {
        return [];
    }

    public static function extensions_map_free()
    {
        return [
            // ... free extensions ...
        ];
    }

    public static function extensions_map_pro()
    {
        return [];
    }
}

Webbricks_Addons_Manager::init();
