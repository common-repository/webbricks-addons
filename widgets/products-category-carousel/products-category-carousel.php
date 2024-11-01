<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Products_Category_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve about widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	*/
	public function get_name() {
		return 'webbricks-products-category-carousel-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve about widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Products Category Carousel', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve about widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-nested-carousel';
	}	

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the about widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'webbricks-addons' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'category', 'products', 'carousel', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// start of the Content tab section
		$this->start_controls_section(
			'wb_product_categories_carousel_contents',
			[
				'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Product Categories
		$this->add_control(
			'wb_product_categories_carousel',
			[
				'label' => esc_html__('Select Category', 'webbricks-addons'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_all_product_categories(),
				'label_block' => true,
				'multiple' => true, // Set to true for multiple selections
			]
		);
 
		 // Show Product Category Count
		 $this->add_control(
			'wb_product_categories_carousel_count',
			[
				'label' => esc_html__( 'Show Products Count', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
 
		 // Show Product Category Button
		 $this->add_control(
			'wb_product_categories_carousel_btn_show',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
 
		// Product Category Alignment
		$this->add_control(
			'wb_product_categories_carousel_alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'webbricks-addons' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .product-category-content' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Products Category Carousel Content tab section

		// Product Category Section Heading Layout
		$this->start_controls_section(
			'wb_product_category_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Product Category Section Heading Show
		$this->add_control(
			'wb_product_category_product_category_show',
			[
				'label' => esc_html__( 'Show Section Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		// Product Category Section Sub Heading Box
		$this->start_controls_section(
			'wb_product_category_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes'
				],
			]
		);

		// Product Category Section Sub Heading Show?
		$this->add_control(
			'wb_product_category_section_subheading_show',
			[
				'label' => esc_html__( 'Show Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		// Product Category Sub Heading
		$this->add_control(
		    'wb_product_category_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Online Shop', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_product_category_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Product Category Section Heading Box
		$this->start_controls_section(
			'wb_product_category_product_category_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes'
				],
			]
		);
		
		// Product Category Section Heading
		$this->add_control(
		    'wb_product_category_product_category',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Have A Great Collection', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_product_category_product_heading_tag',
			[
				'label' => __( 'Html Tag', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'webbricks-addons' ),
					'h2' => __( 'H2', 'webbricks-addons' ),
					'h3' => __( 'H3', 'webbricks-addons' ),
					'h4' => __( 'H4', 'webbricks-addons' ),
					'h5' => __( 'H5', 'webbricks-addons' ),
					'h6' => __( 'H6', 'webbricks-addons' ),
					'p' => __( 'P', 'webbricks-addons' ),
					'span' => __( 'Span', 'webbricks-addons' ),
					'div' => __( 'Div', 'webbricks-addons' ),
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		// Product Category Section Description
		$this->start_controls_section(
			'wb_product_category_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes'
				],
			]
		);

		// Product Category Section Heading Description Show?
		$this->add_control(
			'wb_product_category_section_desc_show',
			[
				'label' => esc_html__( 'Show Description', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Product Category Section Heading Description
		$this->add_control(
		    'wb_product_category_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => __('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_product_category_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_product_category_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Product Category Carousel Number
		$this->add_control(
			'wb_product_category_carousel_number',
			[
				'label' 		=> __('Number of Product Category', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Product Category Carousel Arrows
		$this->add_control(
			'wb_product_category_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Loops
		$this->add_control(
			'wb_product_category_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Pause
		$this->add_control(
			'wb_product_category_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Autoplay
		$this->add_control(
			'wb_product_category_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Product Category Carousel Autoplay Speed
		$this->add_control(
			'wb_product_category_carousel_autoplay_speed',
			[
				'label' => esc_html__( 'Speed', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		// Product Category Carousel Animation Speed
		$this->add_control(
			'wb_product_category_carousel_autoplay_animation',
			[
				'label' => esc_html__( 'Timeout', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_products_category_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_products_category_carousel_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// Product Category Section Heading Style
		$this->start_controls_section(
			'wb_product_category_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes',
					'wb_product_category_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'wb_product_category_separator_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Product Category Section Heading Separator Style
		$this->add_control(
			'wb_product_category_separator_variation',
			[
				'label' => __( 'Style', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'webbricks-addons' ),
					'round' => __( 'Round', 'webbricks-addons' ),
					'square' => __( 'Square', 'webbricks-addons' ),
					'circle' => __( 'Circle', 'webbricks-addons' ),
					'custom' => __( 'Custom', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'default',
			]
		);

		// Product Category Section Bullet Color
		$this->add_control(
			'wb_product_category_section_sep_bg',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Product Category Section Bullet Round
		$this->add_control(
			'wb_product_category_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_product_category_separator_variation' => 'custom', 
				],
			]
		);

		$this->add_control(
			'wb_product_category_section_subheading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Product Category Section Sub Heading Color
		$this->add_control(
			'wb_product_category_section_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_product_category_section_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Product Category Section Heading Options
		$this->start_controls_section(
			'wb_product_category_product_category_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes'
				],
			]
		);

		// Product Category Section Heading Color
		$this->add_control(
			'wb_section_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title .section-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Product Category Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_title_typography',
				'selector' => '{{WRAPPER}} .section-title .section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Product Category Section Description Options
		$this->start_controls_section(
			'wb_product_category_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_product_category_product_category_show' => 'yes',
					'wb_product_category_section_desc_show' => 'yes'
				],
			]
		);

		// Product Category Section Description Color
		$this->add_control(
			'wb_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Section Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_product_categories_carousel_layouts_section',
			[
				'label' => esc_html__( 'Layouts', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Border Radius
		$this->add_control(
			'wb_product_categories_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Category Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_product_categories_carousel_border',
				'selector' => '{{WRAPPER}} .product-category',
			]
		);	

		// Product Category Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wb_product_categories_bg',
				'types' => [ 'gradient'],
				'selector' => '{{WRAPPER}} .product-category::before',
			]
		);	

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_product_category_carousel_title_section',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Title Color
		$this->add_control(
			'wb_product_category_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .product-category-content h4 a' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_product_category_carousel_title_typography',
				'selector' => '{{WRAPPER}} .product-category-content h4 a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_title_section',
			[
				'label' => esc_html__( 'Count', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_product_categories_carousel_count' => 'yes'
				],
			]
		);

		// Product Category Title Color
		$this->add_control(
			'wb_product_categories_count_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .product-category-content span' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_product_categories_count_typography',
				'selector' => '{{WRAPPER}} .product-category-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// Product Category Carousel Box Button Style
		$this->start_controls_section(
			'wb_product_category_carousel_btn_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_product_categories_carousel_btn_show' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wb_product_category_carousel_btn_style_tabs'
		);

		// Product Category Carousel Box Button Normal Tab
		$this->start_controls_tab(
			'wb_product_category_carousel_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Product Category Button Color
		$this->add_control(
			'wb_product_categories_btn_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon svg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Border Color
		$this->add_control(
			'wb_product_categories_carousel_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tab();

		// Product Category Carousel Box Button Hover Tab
		$this->start_controls_tab(
			'wb_product_category_carousel_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Product Category Button Hover Color
		$this->add_control(
			'wb_product_categories_carousel_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon svg:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover Border Color
		$this->add_control(
			'wb_product_categories_carousel_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover BG Color
		$this->add_control(
			'wb_product_categories_carousel_btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Product Category Arrow Style
		$this->start_controls_section(
			'wb_products_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_product_category_arrow_style_tabs'
		);

		// Product Category Arrow Normal Tab
		$this->start_controls_tab(
			'wb_product_category_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Product Category Arrow Color
		$this->add_control(
			'wb_products_carousel_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Arrow Border Color
		$this->add_control(
			'wb_products_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Background Color
		$this->add_control(
			'wb_products_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Product Category Padding
		$this->add_control(
			'wb_products_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Category Round
		$this->add_control(
			'wb_products_carousel_arrow_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Product Category Arrow Hover Tab
		$this->start_controls_tab(
			'wb_product_category_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Product Category Arrow Hover Icon Color
		$this->add_control(
			'wb_products_carousel_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Arrow Border Color
		$this->add_control(
			'wb_products_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Arrow Round
		$this->add_control(
			'wb_products_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */

	/**
     * Get all product categories for the select field options
     */
    private function get_all_product_categories() {
        $product_categories = get_terms('product_cat');
        $options = [];

        if ($product_categories && !is_wp_error($product_categories)) {
            foreach ($product_categories as $category) {
                $options[$category->term_id] = $category->name;
            }
        }
        return $options;
    }

	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();		
		$wb_product_category_product_category_show = $settings['wb_product_category_product_category_show'];
		$wb_product_categories_carousel = $settings['wb_product_categories_carousel'];
		$wb_product_categories_carousel_count = $settings['wb_product_categories_carousel_count'];
		$wb_product_categories_carousel_btn_show = $settings['wb_product_categories_carousel_btn_show'];
		$wb_product_category_carousel_items = $settings['wb_product_category_carousel_number'];
		$wb_product_category_carousel_arrows = $settings['wb_product_category_carousel_arrows'];
		$wb_product_category_carousel_loops = $settings['wb_product_category_carousel_loop'];
		$wb_product_category_carousel_pause = $settings['wb_product_category_carousel_pause'];
		$wb_product_category_carousel_autoplay = $settings['wb_product_category_carousel_autoplay'];
		$wb_product_category_carousel_autoplay_speed = $settings['wb_product_category_carousel_autoplay_speed'];
		$wb_product_category_carousel_autoplay_animation = $settings['wb_product_category_carousel_autoplay_animation'];
		
       ?>

		<?php if ($wb_product_category_product_category_show === 'yes') {	 
			$wb_product_category_section_subheading_show = $settings['wb_product_category_section_subheading_show'];
			$wb_product_category_section_subheading = $settings['wb_product_category_section_subheading'];
			$wb_product_category_separator_variation = $settings['wb_product_category_separator_variation'];
			$wb_product_category_product_category = $settings['wb_product_category_product_category'];
			$wb_product_category_product_heading_tag = $settings['wb_product_category_product_heading_tag'];
			$wb_product_category_section_desc_show = $settings['wb_product_category_section_desc_show'];
			$wb_product_category_section_desc = $settings['wb_product_category_section_desc'];
		?>			
			<div class="section-title service-title">
				<?php if($wb_product_category_section_subheading_show == 'yes') {
					?>
						<span class="<?php echo esc_attr($wb_product_category_separator_variation); ?> section-subheading"><?php echo esc_html($wb_product_category_section_subheading);?></span>
					<?php 
				} ?>
				<<?php echo esc_attr($wb_product_category_product_heading_tag); ?>  class="section-heading"><?php echo esc_html($wb_product_category_product_category);?></<?php echo esc_attr($wb_product_category_product_heading_tag); ?>>
				
				<?php if($wb_product_category_section_desc_show == 'yes'){
					?>
						<p><?php echo wp_kses_post($wb_product_category_section_desc);?></p>
					<?php 
				} ?>

			</div>
		<?php } ?>
	   
		<div class="product-category-carousel owl-carousel <?php echo $wb_product_category_carousel_arrows === 'yes' ? 'carousel-top-arrows' : ''; ?> <?php echo $wb_product_category_product_category_show === 'yes' ? 'heading-top' : ''; ?>" product-category-carousel-items="<?php echo esc_attr( $wb_product_category_carousel_items ); ?>" product-category-carousel-arrows= "<?php echo esc_attr( $wb_product_category_carousel_arrows );?>" 
			product-category-carousel-loops="<?php echo esc_attr( $wb_product_category_carousel_loops ); ?>" 
			product-category-carousel-pause="<?php echo esc_attr( $wb_product_category_carousel_pause ); ?>" product-category-carousel-autoplay="<?php echo esc_attr( $wb_product_category_carousel_autoplay ); ?>" product-category-carousel-autoplay-speed="<?php echo esc_attr( $wb_product_category_carousel_autoplay_speed ); ?>" 
			product-category-carousel-autoplay-animation="<?php echo esc_attr( $wb_product_category_carousel_autoplay_animation ); ?>">
			<?php
			// $selected_category_ids
			$selected_category_ids = $wb_product_categories_carousel;
			// Loop through each selected category ID
				if($selected_category_ids) {
					foreach ($selected_category_ids as $selected_category_id) {
					// Get the category object by ID
					$category = get_term($selected_category_id, 'product_cat');
					// Check if the category object exists and is not an error
					if ($category && !is_wp_error($category)) {			
						// Display category image if available
						$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
						$image = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
							?>
								<div class="product-category">
									<?php 
										if($image) {
											?>
												<img src="<?php echo esc_attr($image[0]);?>" alt="<?php echo esc_html($category->name);?>">	
										<?php
										} else {
											?>
												<svg class="fallback-svg" viewBox="0 0 370 300" preserveAspectRatio="none">
												<rect width="370" height="300" style="fill:#f2f2f2;"></rect>
											</svg>
										<?php 
										}
									?>
										<?php 
											if($wb_product_categories_carousel_btn_show === 'yes') {
												?>
											<div class="product-category-icon">
												<a href="<?php echo esc_url(get_term_link($category));?>">
													<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M9.33337 9.33329V6.66663C9.33337 4.45749 11.1242 2.66663 13.3334 2.66663C14.3579 2.66663 15.2923 3.05177 16 3.68516C16.7078 3.05176 17.6423 2.66663 18.6667 2.66663C20.8759 2.66663 22.6667 4.45749 22.6667 6.66663V9.33329H24.6667C25.7712 9.33329 26.6667 10.2287 26.6667 11.3333V24.6733C26.6667 27.2469 24.5803 29.3333 22.0067 29.3333H10.6667C7.72119 29.3333 5.33337 26.9454 5.33337 24V11.3333C5.33337 10.2287 6.2288 9.33329 7.33337 9.33329H9.33337ZM18.18 27.3333C17.6547 26.579 17.3467 25.6621 17.3467 24.6733V11.3333H7.33337V24C7.33337 25.8409 8.82576 27.3333 10.6667 27.3333H18.18ZM15.3334 9.33329V6.66663C15.3334 5.56205 14.4379 4.66663 13.3334 4.66663C12.2288 4.66663 11.3334 5.56205 11.3334 6.66663V9.33329H15.3334ZM17.3334 9.33329H20.6667V6.66663C20.6667 5.56205 19.7712 4.66663 18.6667 4.66663C18.0467 4.66663 17.4927 4.94871 17.1259 5.39153C17.2604 5.792 17.3334 6.2208 17.3334 6.66663V9.33329ZM19.3467 24.6733C19.3467 26.1424 20.5376 27.3333 22.0067 27.3333C23.4758 27.3333 24.6667 26.1424 24.6667 24.6733V11.3333H19.3467V24.6733Z" fill="currentColor"/>
													</svg> 
												</a>
											
									</div>
										
									<?php }
									?>
									<div class="product-category-content">
										<h4>
											<a href="<?php echo esc_url(get_term_link($category));?>"><?php echo esc_html($category->name);?></a>
										</h4>
										<?php 
											if($wb_product_categories_carousel_count === 'yes') {
												?>
													<span><?php echo esc_html($category->count);?> <?php echo esc_html(' Products', 'webbricks-addons');?></span>
												<?php
											}
										?>
									</div>
								</div>
							<?php 
						}
					}
				}
			?>
		</div>			
		<!-- Product Category Programme Here -->
       <?php
	}
}