<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Products_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-products-carousel-widget';
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
		return esc_html__( 'Products Carousel', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-carousel-loop';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
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
		return [ 'products', 'carousel', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Products Carousel Section Heading Layout
		$this->start_controls_section(
			'wb_products_carousel_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Products Carousel Section Heading Show
		$this->add_control(
			'wb_products_carousel_section_heading_show',
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

		// Products Carousel Section Sub Heading Box
		$this->start_controls_section(
			'wb_products_carousel_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Products Carousel Section Sub Heading Show?
		$this->add_control(
			'wb_products_carousel_section_subheading_show',
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
		// Products Carousel Sub Heading
		$this->add_control(
		    'wb_products_carousel_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Products Carousel', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_products_carousel_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Section Heading Box
		$this->start_controls_section(
			'wb_products_carousel_section_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes'
				],
			]
		);
		
		// Products Carousel Section Heading
		$this->add_control(
		    'wb_products_carousel_section_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Are Your One Door To Solve It All', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_products_carousel_section_heading_tag',
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

		// Products Carousel Section Description
		$this->start_controls_section(
			'wb_products_carousel_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Products Carousel Section Heading Description Show?
		$this->add_control(
			'wb_products_carousel_section_desc_show',
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

		// Products Carousel Section Heading Description
		$this->add_control(
		    'wb_products_carousel_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => __('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_products_carousel_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_products_carousel_content',
			[
				'label' => esc_html__('Products Carousel', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		 // Products Number
		$this->add_responsive_control(
			'wb_products_carousel_number',
			[
				'label' 		=> __('Number of Products', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Products Category
		$this->add_control(
			'wb_products_carousel_category',
			[
				'label' => __('Product Category', 'webbricks-addons'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_product_categories(),
				'multiple' => true,
			]
		);

		// Products Order
		$this->add_control(
			'wb_products_carousel_order',
			[
				'label' 		=> __('Order', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'webbricks-addons'),
					'DESC' 		=> __('DESCENDING', 'webbricks-addons'),
					'ASC' 		=> __('ASCENDING', 'webbricks-addons'),
				],
			]
		);

		// Products Orderby
		$this->add_control(
			'wb_products_carousel_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					''               => __('Default', 'webbricks-addons'),
					'date'           => __('Date', 'webbricks-addons'),
					'title'          => __('Title', 'webbricks-addons'),
					'name'           => __('Name', 'webbricks-addons'),
					'rand'           => __('Random', 'webbricks-addons'),
					'comment_count'  => __('Comment Count', 'webbricks-addons'),
					'menu_order'     => __('Menu Order', 'webbricks-addons'),
					'best_selling'   => __('Best Selling', 'webbricks-addons'),
					'on_sale'        => __('On Sale', 'webbricks-addons'),
					'latest_products' => __('Latest Products', 'webbricks-addons'),
				],
			]
		);
		 
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_products_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'wb_products_carousel_slide_number',
			[
                'label'     => esc_html__( 'No. of items per slide', 'webbricks-addons' ),
                'type'      => Controls_Manager::SELECT,
                'options' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
				'default' => '3',
                'frontend_available' => true,
            ]
		);

		// Arrows
		$this->add_control(
			'wb_products_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Loops
		$this->add_control(
			'wb_products_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay
		$this->add_control(
			'wb_products_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Pause
		$this->add_control(
			'wb_products_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Autoplay Speed
		$this->add_control(
			'wb_products_carousel_autoplay_speed',
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

		// Animation Speed
		$this->add_control(
			'wb_products_carousel_autoplay_animation',
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
			'wb_products_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_products_carousel_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();

		// Service Section Heading Style
		$this->start_controls_section(
			'wb_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes',
					'wb_products_carousel_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'wb_products_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Section Heading Separator Style
		$this->add_control(
			'wb_section_heading_separator_variation',
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

		// Service Section Bullet Color
		$this->add_control(
			'wb_product_carousel_sep_bg',
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

		// Service Section Bullet Round
		$this->add_control(
			'wb_service_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_product_carousel_sep_bg' => 'custom', 
				],
			]
		);

		$this->add_control(
			'wb_pproducts_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Service Section Sub Heading Color
		$this->add_control(
			'wb_service_section_subheading_color',
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

		// Service Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_service_section_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Heading Options
		$this->start_controls_section(
			'wb_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes'
				],
			]
		);

		// Service Section Heading Color
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

		// Service Section Heading Typography
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

		// Service Section Description Options
		$this->start_controls_section(
			'wb_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_products_carousel_section_heading_show' => 'yes',
					'wb_products_carousel_section_desc_show' => 'yes'
				],
			]
		);

		// Service Section Description Color
		$this->add_control(
			'wb_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Service Section Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Products Carousel Layout
		$this->start_controls_section(
			'wb_products_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Background
		$this->add_control(
			'wb_products_carousel_layout_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Products Carousel Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_products_carousel_layout_border',
				'selector' => '{{WRAPPER}} .single-product',
			]
		);	

		// Products Carousel Padding
		$this->add_control(
			'wb_product_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Carousel Border Radius
		$this->add_control(
			'wb_products_carousel_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'wb_products_image',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Products Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_product_border',
				'selector' => '{{WRAPPER}} .single-product img',
			]
		);	

		// Products Image Border
		$this->add_control(
			'wb_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => '12',
					'right' => '12',
					'bottom' => '12',
					'left' => '12',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-product img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'wb_products_image_width',
			[
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-product img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Products Image Height
		$this->add_control(
			'wb_products_image_height',
			[
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-product img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Products Carousel Title
		$this->start_controls_section(
			'wb_products_carousel_title_style',
			[
				'label' => esc_html__( 'Product Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Title Color
		$this->add_control(
			'wp_products_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product h4 a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_title_typography',
				'selector' => '{{WRAPPER}} .single-product h4 a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Products Carousel Meta
		$this->start_controls_section(
			'wb_products_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Carousel Meta Price
		$this->add_control(
			'wb_products_carousel_meta_price_style',
			[
				'label' => esc_html__( 'Price', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Price Color
		$this->add_control(
			'wp_products_carousel_meta_price_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-bottom p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Price Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_meta_typography',
				'selector' => '{{WRAPPER}} .price-bottom p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Sale
		$this->add_control(
			'wb_products_carousel_meta_sale_style',
			[
				'label' => esc_html__( 'Sale', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Carousel Meta Sale Color
		$this->add_control(
			'wp_products_carousel_meta_price_sale_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Products Carousel Meta Sale Background
		$this->add_control(
			'wp_products_carousel_meta_sale_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Meta Sale Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_products_carousel_meta_sale_typography',
				'selector' => '{{WRAPPER}} .single-product span.sale',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
 
		// Products Carousel Meta Sale Border Radius
		$this->add_control(
			'wb_products_carousel_meta_sale_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'default' => [
					'top' => '0',
					'right' => '12',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Carousel Button
		$this->start_controls_section(
			'wb_products_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_products_carousel_btn_style_tab'
		);

		// Products Carousel Button Normal Tab
		$this->start_controls_tab(
			'wp_products_carousel_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Products Carousel Button Color
		$this->add_control(
			'wp_products_carousel_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Button Border
		$this->add_control(
			'wp_products_carousel_btn_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Carousel Button Background
		$this->add_control(
			'wp_products_carousel_btn_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->end_controls_tab();

		// Products Carousel Button Hover Tab
		$this->start_controls_tab(
			'wp_products_carousel_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'wp_products_carousel_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Products Carousel Button Hover Background
		$this->add_control(
			'wp_products_carousel_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Products Carousel Arrow Style
		$this->start_controls_section(
			'wb_products_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_service_arrow_style_tabs'
		);

		// Products Carousel Arrow Normal Tab
		$this->start_controls_tab(
			'wp_service_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Products Carousel Arrow Color
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

		// Products Carousel Arrow Border Color
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

		// Product Carousel Arrow Background Color
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

		// Product Carousel Arrow Padding
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

		// Product Carousel Arrow Round
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

		// Products Carousel Arrow Hover Tab
		$this->start_controls_tab(
			'wp_service_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Products Carousel Arrow Hover Icon Color
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
			'wb_product_carousel_arrow_hover_border_color',
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

		// Products Carousel Arrow Round
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


	 
	// Helper function to get product categories
	private function get_product_categories() {
		// Retrieve product categories
		$categories = get_terms(array('taxonomy' => 'product_cat'));
	
		// Initialize options array
		$options = array();
	
		// Check if categories were retrieved successfully
		if (!empty($categories) && !is_wp_error($categories)) {
			// Loop through categories
			foreach ($categories as $category) {
				// Check if category is an object and has required properties
				if (is_object($category) && isset($category->term_id) && isset($category->name)) {
					// Assign category ID as key and category name as value in options array
					$options[$category->term_id] = $category->name;
				} else {
					// Output warning if category is not as expected
					error_log('Invalid category data: ' . print_r($category, true));
				}
			}
		} else {
			// Output warning if categories couldn't be retrieved
			error_log('Unable to retrieve product categories');
		}
	
		// Return options array
		return $options;
	}
	

	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();		
		$wb_products_carousel_section_heading_show = $settings['wb_products_carousel_section_heading_show'];
		$wb_products_carousel_number = $settings['wb_products_carousel_number'];
		$wb_products_carousel_order = $settings['wb_products_carousel_order'];
		$wb_products_carousel_orderby = $settings['wb_products_carousel_orderby'];
		$wb_products_carousel_slide_number = $settings['wb_products_carousel_slide_number'];
		$wb_products_carousel_loop = $settings['wb_products_carousel_loop'];
		$wb_products_carousel_autoplay = $settings['wb_products_carousel_autoplay'];
		$wb_products_carousel_arrows = $settings['wb_products_carousel_arrows'];
		$wb_products_carousel_pause = $settings['wb_products_carousel_pause'];
		$wb_products_carousel_autoplay_speed = $settings['wb_products_carousel_autoplay_speed'];
		$wb_products_carousel_autoplay_animation = $settings['wb_products_carousel_autoplay_animation'];		
		
       ?>

		<?php if ($wb_products_carousel_section_heading_show === 'yes') {	 
			$wb_products_carousel_section_subheading_show = $settings['wb_products_carousel_section_subheading_show'];
			$wb_products_carousel_section_subheading = $settings['wb_products_carousel_section_subheading'];
			$wb_section_heading_separator_variation = $settings['wb_section_heading_separator_variation'];
			$wb_products_carousel_section_heading = $settings['wb_products_carousel_section_heading'];
			$wb_products_carousel_section_heading_tag = $settings['wb_products_carousel_section_heading_tag'];
			$wb_products_carousel_section_desc_show = $settings['wb_products_carousel_section_desc_show'];
			$wb_products_carousel_section_desc = $settings['wb_products_carousel_section_desc'];
		?>			
			<div class="section-title service-title">
				<?php if($wb_products_carousel_section_subheading_show == 'yes') {
					?>
						<span class="<?php echo esc_attr($wb_section_heading_separator_variation); ?> section-subheading"><?php echo esc_html($wb_products_carousel_section_subheading);?></span>
					<?php 
				} ?>
				<<?php echo esc_attr($wb_products_carousel_section_heading_tag); ?>  class="section-heading"><?php echo esc_html($wb_products_carousel_section_heading);?></<?php echo esc_attr($wb_products_carousel_section_heading_tag); ?>>
				
				<?php if($wb_products_carousel_section_desc_show == 'yes'){
					?>
						<p><?php echo wp_kses_post($wb_products_carousel_section_desc);?></p>
					<?php 
				} ?>

			</div>
		<?php } ?>

		<div class="products-carousel owl-carousel <?php echo $wb_products_carousel_arrows === 'yes' ? 'carousel-top-arrows' : ''; ?> <?php echo $wb_products_carousel_section_heading_show === 'yes' ? 'heading-top' : ''; ?>"  products-scroll="<?php echo esc_attr( $wb_products_carousel_slide_number ); ?>" products-loop= "<?php echo esc_attr( $wb_products_carousel_loop ); ?>" products-autoplay="<?php echo esc_attr( $wb_products_carousel_autoplay ); ?>" products-pause="<?php echo esc_attr( $wb_products_carousel_pause ); ?>" products-arrows="<?php echo esc_attr( $wb_products_carousel_arrows ); ?>" products-animation="<?php echo esc_attr( $wb_products_carousel_autoplay_animation ); ?>" products-speed="<?php echo esc_attr( $wb_products_carousel_autoplay_speed ); ?>">
			<?php
				$args = array(
					'posts_per_page' => $wb_products_carousel_number,
					'post_type' => 'product',
					'order' => $wb_products_carousel_order,
					'orderby' => $wb_products_carousel_orderby,
				);

				// Fetch product categories using the helper function
				$product_categories = $this->get_product_categories();

				// Modify the category filter section to use the fetched categories
				$selected_categories = $settings['wb_products_carousel_category'];
				if (!empty($selected_categories)) {
					$args['tax_query'] = array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'id',
							'terms'    => $selected_categories,
							'operator' => 'IN',
						),
					);
				}
			
				
				if ($wb_products_carousel_orderby === 'best_selling') {
					$args['meta_key'] = 'total_sales';
					$args['orderby']  = 'meta_value_num';
				} elseif ($wb_products_carousel_orderby === 'on_sale') {
					$args['meta_query'] = array(
						array(
							'key'     => '_sale_price',
							'value'   => '',
							'compare' => '!=',
						),
					);
				} elseif ($wb_products_carousel_orderby === 'latest_products') {
					$args['orderby'] = 'date';
				}

				$query = new \WP_Query($args);
				if(class_exists( 'woocommerce' )) {
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post();
						$product = wc_get_product(get_the_ID());
						$sale = get_post_meta( get_the_ID(), '_sale_price', true)
					?>
						<div class="single-product">
							<?php 
								if($sale) {
							?>
								<span class="sale"><?php echo esc_html('Sale', 'webbricks-addons') ?></span>
							<?php
								}
							?>
							<img src="<?php echo esc_url(get_the_post_thumbnail_url());?>" alt="<?php esc_attr(the_title());?></a>">
							<h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
							<div class="price-bottom">
								<p><?php echo esc_attr(get_woocommerce_currency_symbol());?> 
									<?php echo esc_attr(get_post_meta( get_the_ID(), '_regular_price', true));?></p>
								<a href="<?php echo esc_url($product->add_to_cart_url());?>" class="icon-border"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.875 3.1875C1.875 3.03832 1.93426 2.89524 2.03975 2.78975C2.14524 2.68426 2.28832 2.625 2.4375 2.625H2.856C3.5685 2.625 3.996 3.10425 4.23975 3.54975C4.4025 3.84675 4.52025 4.191 4.6125 4.503C4.63745 4.50103 4.66247 4.50003 4.6875 4.5H14.061C14.6835 4.5 15.1335 5.0955 14.9625 5.69475L13.5915 10.5015C13.4686 10.9326 13.2085 11.312 12.8507 11.5821C12.4929 11.8522 12.0568 11.9984 11.6085 11.9985H7.1475C6.69562 11.9985 6.25624 11.8501 5.89689 11.5762C5.53755 11.3022 5.27812 10.9178 5.1585 10.482L4.5885 8.403L3.6435 5.217L3.64275 5.211C3.52575 4.78575 3.41625 4.3875 3.25275 4.0905C3.096 3.80175 2.97 3.75 2.85675 3.75H2.4375C2.28832 3.75 2.14524 3.69074 2.03975 3.58525C1.93426 3.47976 1.875 3.33668 1.875 3.1875ZM5.67975 8.13L6.243 10.1843C6.3555 10.5908 6.72525 10.8735 7.1475 10.8735H11.6085C11.8123 10.8735 12.0105 10.8071 12.1732 10.6844C12.3358 10.5616 12.4541 10.3892 12.51 10.1932L13.8127 5.625H4.93875L5.66925 8.09025L5.67975 8.13ZM8.25 14.25C8.25 14.6478 8.09196 15.0294 7.81066 15.3107C7.52936 15.592 7.14782 15.75 6.75 15.75C6.35218 15.75 5.97064 15.592 5.68934 15.3107C5.40804 15.0294 5.25 14.6478 5.25 14.25C5.25 13.8522 5.40804 13.4706 5.68934 13.1893C5.97064 12.908 6.35218 12.75 6.75 12.75C7.14782 12.75 7.52936 12.908 7.81066 13.1893C8.09196 13.4706 8.25 13.8522 8.25 14.25ZM7.125 14.25C7.125 14.1505 7.08549 14.0552 7.01517 13.9848C6.94484 13.9145 6.84946 13.875 6.75 13.875C6.65054 13.875 6.55516 13.9145 6.48483 13.9848C6.41451 14.0552 6.375 14.1505 6.375 14.25C6.375 14.3495 6.41451 14.4448 6.48483 14.5152C6.55516 14.5855 6.65054 14.625 6.75 14.625C6.84946 14.625 6.94484 14.5855 7.01517 14.5152C7.08549 14.4448 7.125 14.3495 7.125 14.25ZM13.5 14.25C13.5 14.6478 13.342 15.0294 13.0607 15.3107C12.7794 15.592 12.3978 15.75 12 15.75C11.6022 15.75 11.2206 15.592 10.9393 15.3107C10.658 15.0294 10.5 14.6478 10.5 14.25C10.5 13.8522 10.658 13.4706 10.9393 13.1893C11.2206 12.908 11.6022 12.75 12 12.75C12.3978 12.75 12.7794 12.908 13.0607 13.1893C13.342 13.4706 13.5 13.8522 13.5 14.25ZM12.375 14.25C12.375 14.1505 12.3355 14.0552 12.2652 13.9848C12.1948 13.9145 12.0995 13.875 12 13.875C11.9005 13.875 11.8052 13.9145 11.7348 13.9848C11.6645 14.0552 11.625 14.1505 11.625 14.25C11.625 14.3495 11.6645 14.4448 11.7348 14.5152C11.8052 14.5855 11.9005 14.625 12 14.625C12.0995 14.625 12.1948 14.5855 12.2652 14.5152C12.3355 14.4448 12.375 14.3495 12.375 14.25Z" fill="var(--e-global-color-primary)"/></svg></a>
							</div>
						</div>
					<?php endwhile;	} 
				}
				else {
					?>
						<div class="col-12">
							<p><?php echo wp_kses_post( 'No products found on WooCommerce.', 'webbricks-addons' );?></p>
						</div>
					<?php 
				}
				wp_reset_postdata();
			?>
	   </div>
       <?php
	}
}