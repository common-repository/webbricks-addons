<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Blog_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-blog-carousel-widget';
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
		return esc_html__( 'Blog Carousel', 'webbricks-addons' );
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
		return 'wb-icon eicon-posts-carousel';
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
		return [ 'blog', 'carousel', 'wb', 'post' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Blog Carousel Heading Layout
		$this->start_controls_section(
			'wb_blog_carousel_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Blog Carousel Heading Show
		$this->add_control(
			'wb_blog_carousel_heading_show',
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

		// Blog Carousel Sub Heading Box
		$this->start_controls_section(
			'wb_blog_carousel_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Sub Heading Show?
		$this->add_control(
			'wb_blog_carousel_subheading_show',
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
		
		// Blog Carousel Sub Heading
		$this->add_control(
		    'wb_blog_carousel_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('New Blogs', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_blog_carousel_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Blog Carousel Heading Box
		$this->start_controls_section(
			'wb_blog_carousel_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes'
				],
			]
		);
		
		// Blog Carousel Heading
		$this->add_control(
		    'wb_blog_carousel_heading',
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
			'wb_blog_carousel_heading_tag',
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

		// Blog Carousel Description
		$this->start_controls_section(
			'wb_blog_carousel_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Heading Description Show?
		$this->add_control(
			'wb_blog_carousel_desc_show',
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

		// Blog Carousel Heading Description
		$this->add_control(
		    'wb_blog_carousel_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_blog_carousel_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
	    $this->start_controls_section(
			'wb_blog_carousel_contents',
			[
				'label' => esc_html__('Query', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Blogs Number
		$this->add_control(
			'wb_blog_carousel_number',
			[
				'label' 		=> __('Number of Blogs', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);
 
		// Blog Order
		$this->add_control(
			'wb_blog_carousel_order',
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
 
		// Blog Orderby
		$this->add_control(
			'wb_blog_carousel_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'webbricks-addons'),
					'date' 			=> __('Date', 'webbricks-addons'),
					'title' 		=> __('Title', 'webbricks-addons'),
					'name' 			=> __('Name', 'webbricks-addons'),
					'modified' 		=> __('Modified', 'webbricks-addons'),
					'author' 		=> __('Author', 'webbricks-addons'),
					'rand' 			=> __('Random', 'webbricks-addons'),
					'ID' 			=> __('ID', 'webbricks-addons'),
					'comment_count' => __('Comment Count', 'webbricks-addons'),
					'menu_order' 	=> __('Menu Order', 'webbricks-addons'),
				],
			]
		);
 
		$args = array(
			'hide_empty' => false,
		);
		
		$categories = get_categories($args);

		if($categories) {
			foreach ( $categories as $key => $category ) {
				$options[$category->term_id] = $category->name;
			}
		}
 
		// Blog Categories
		$this->add_control(
			'wb_blog_carousel_include_categories',
			[
				'label' => __( 'Post Filter', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'wb_blog_carousel_option_section',
			[
				'label' => esc_html__('Meta Info', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'wb_blog_carousel_cat_visibility',
			[
				'label' 		=> __('Show Category', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'wb_blog_carousel_date_visibility',
			[
				'label' 		=> __('Show Date', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'wb_blog_carousel_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
		'wb_blog_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Number
		$this->add_control(
			'wb_blog_carousel_slide_number',
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

		// Blogs Carousel Arrows
		$this->add_control(
			'wb_blog_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Loops
		$this->add_control(
			'wb_blog_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Pause
		$this->add_control(
			'wb_blog_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay
		$this->add_control(
			'wb_blog_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay Speed
		$this->add_control(
			'wb_blog_carousel_autoplay_speed',
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

		// Blogs Carousel Animation Speed
		$this->add_control(
			'wb_blog_carousel_autoplay_animation',
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
			'wb_blog_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_blog_carousel_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();

		// Blog Carousel Heading Style
		$this->start_controls_section(
			'wb_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes',
					'wb_blog_carousel_subheading_show' => 'yes'
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wb_section_heading_separator_variation_style',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// Blog Carousel Section Heading Separator Style
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

		// Blog Carousel Bullet Color
		$this->add_control(
			'wb_service_section_sep_bg',
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

		// Blog Carousel Bullet Round
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
					'wb_section_heading_separator_variation' => 'custom', 
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wb_service_section_subheading_title_style',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Blog Carousel Sub Heading Color
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

		// Blog Carousel Sub Heading Typography
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

		// Blog Carousel Heading Options
		$this->start_controls_section(
			'wb_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes'
				],
			]
		);

		// Blog Carousel Heading Color
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

		// Blog Carousel Heading Typography
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

		// Blog Carousel Description Options
		$this->start_controls_section(
			'wb_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_blog_carousel_heading_show' => 'yes',
					'wb_blog_carousel_desc_show' => 'yes'
				],
			]
		);

		// Blog Carousel Description Color
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

		// Blog Carousel Description Typography
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

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'wb_blog_carousel_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'wb_blog_carousel_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'wb_blog_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Meta Color
		$this->add_control(
			'wb_blog_carousel_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-meta, .blog-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_carousel_meta_typography',
				'selector' => '{{WRAPPER}} .blog-meta, .blog-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'wb_blog_carousel_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-title .blog-post-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);
		
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_carousel_title_typography',
				'selector' => '{{WRAPPER}} .blog-title .blog-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wp_blog_carousel_title_tag',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_blog_carousel_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wb_blog_carousel_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_carousel_excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'wb_blog_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'wb_blog_image_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .blog-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'wb_blog_image_display',
			[
				'label' 		=> __('Display Size', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'webbricks-addons'),
					'contain' 		=> __('Contain', 'webbricks-addons'),
					'cover' 		=> __('Cover', 'webbricks-addons'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'wb_blog_carousel_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wb_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wb_blog_carousel_btn_color',
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

		// Blog Button Background
		$this->add_control(
			'wb_blog_carousel_btn_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wb_blog_carousel_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wb_blog_carousel_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wb_blog_carousel_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wb_blog_carousel_btn_border_hover_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Hover Background Color
		$this->add_control(
			'wb_blog_carousel_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

		// Blog Arrow Style
		$this->start_controls_section(
			'wb_blog_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_blog_carousel_arrow_style_tabs'
		);

		// Blog Arrow Normal Tab
		$this->start_controls_tab(
			'wb_blog_carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Arrow Color
		$this->add_control(
			'wb_blog_carousel_arrow_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'wb_blog_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Background Color
		$this->add_control(
			'wb_blog_carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Padding
		$this->add_control(
			'wb_blog_carousel_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Round
		$this->add_control(
			'wb_blog_carousel_arrow_round',
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

		// Blog Arrow Hover Tab
		$this->start_controls_tab(
			'wb_blog_carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Arrow Hover Icon Color
		$this->add_control(
			'wb_blog_carousel_arrow_hover_color',
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

		// Blog Arrow Border Color
		$this->add_control(
			'wb_blog_carousel_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Arrow Round
		$this->add_control(
			'wb_blog_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover:after' => 'background-color: {{VALUE}}',
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
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$wb_blog_carousel_heading_show = $settings['wb_blog_carousel_heading_show'];
		$wb_blog_carousel_heading_tag = $settings['wb_blog_carousel_heading_tag'];
		$wp_blog_carousel_title_tag = $settings['wp_blog_carousel_title_tag'];
		$wb_blog_carousel_number = $settings['wb_blog_carousel_number'];
		$wb_blog_carousel_order = $settings['wb_blog_carousel_order'];
		$wb_blog_carousel_orderby = $settings['wb_blog_carousel_orderby'];
		$wb_blog_carousel_include_categories = $settings['wb_blog_carousel_include_categories'];
		$wb_blog_carousel_cat_visibility = $settings['wb_blog_carousel_cat_visibility'];
		$wb_blog_carousel_date_visibility = $settings['wb_blog_carousel_date_visibility'];
		$wb_blog_carousel_excerpt_visibility = $settings['wb_blog_carousel_excerpt_visibility'];
		$wb_blog_carousel_slide_number = $settings['wb_blog_carousel_slide_number'];
		$wb_blog_carousel_arrows = $settings['wb_blog_carousel_arrows'];
		$wb_blog_carousel_loop = $settings['wb_blog_carousel_loop'];
		$wb_blog_carousel_pause = $settings['wb_blog_carousel_pause'];
		$wb_blog_carousel_autoplay = $settings['wb_blog_carousel_autoplay'];
		$wb_blog_carousel_autoplay_speed = $settings['wb_blog_carousel_autoplay_speed'];
		$wb_blog_carousel_autoplay_animation = $settings['wb_blog_carousel_autoplay_animation'];
		$wb_blog_image_display = $settings['wb_blog_image_display'];

		?>
			<style>
				.blog-img{
					background-size: <?php echo esc_attr($wb_blog_image_display); ?>
				}
			</style>
		<?php 

		$args = array(
			'posts_per_page' => $wb_blog_carousel_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $wb_blog_carousel_order,
			'orderby' => $wb_blog_carousel_orderby,
			'cat' => $wb_blog_carousel_include_categories,
			'ignore_sticky_posts' => 1,
		);

		$query = new \WP_Query($args);
		
       	?>
	    <?php if ($wb_blog_carousel_heading_show === 'yes') {	 
			$wb_blog_carousel_subheading_show = $settings['wb_blog_carousel_subheading_show'];
			$wb_blog_carousel_subheading = $settings['wb_blog_carousel_subheading'];
			$wb_section_heading_separator_variation = $settings['wb_section_heading_separator_variation'];
			$wb_blog_carousel_heading = $settings['wb_blog_carousel_heading'];
			$wb_blog_carousel_desc_show = $settings['wb_blog_carousel_desc_show'];
			$wb_blog_carousel_desc = $settings['wb_blog_carousel_desc'];
		?>		
		
			<div class="section-title service-title">
				<?php if($wb_blog_carousel_subheading_show == 'yes') {
					?>
						<span class="<?php echo esc_attr($wb_section_heading_separator_variation); ?> section-subheading"><?php echo esc_html($wb_blog_carousel_subheading);?></span>
					<?php 
				} ?>
				<<?php echo esc_attr($wb_blog_carousel_heading_tag); ?> class="section-heading"><?php echo esc_html($wb_blog_carousel_heading);?></<?php echo esc_attr($wb_blog_carousel_heading_tag); ?>>
				
				<?php if($wb_blog_carousel_desc_show == 'yes'){
					?>
						<p><?php echo wp_kses_post($wb_blog_carousel_desc);?></p>
					<?php 
				} ?>

			</div>
		<?php } ?>
		
	   	<div class="blog-carousel owl-carousel <?php echo $wb_blog_carousel_arrows === 'yes' ? 'carousel-top-arrows' : ''; ?> <?php echo $wb_blog_carousel_heading_show === 'yes' ? 'heading-top' : ''; ?>"
	   		blog-items="<?php echo esc_attr( $wb_blog_carousel_slide_number ); ?>" 
			blog-arrows= "<?php echo esc_attr( $wb_blog_carousel_arrows );?>" 
			blog-loops="<?php echo esc_attr( $wb_blog_carousel_loop ); ?>" 
			blog-pause="<?php echo esc_attr( $wb_blog_carousel_pause ); ?>" blog-autoplay="<?php echo esc_attr( $wb_blog_carousel_autoplay ); ?>" blog-autoplay-speed="<?php echo esc_attr( $wb_blog_carousel_autoplay_speed ); ?>" 
			blog-autoplay-animation="<?php echo esc_attr( $wb_blog_carousel_autoplay_animation ); ?>">
				<?php 
					if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); 					
				?>
					<div class="single-blog">
						<div class="blog-content">
							<div class="blog-meta">
								<?php
									if($wb_blog_carousel_cat_visibility == 'yes') {
										the_category(', ');
									}
									if($wb_blog_carousel_date_visibility == 'yes') {
										?>
											<a class="blog-date"  href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_attr(get_the_date('j M, y'));?></a>
										<?php 
									}
								?>
							</div>
							<div class="blog-title">
								<<?php echo esc_attr($wp_blog_carousel_title_tag);?> class="blog-post-title"><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></<?php echo esc_attr($wp_blog_carousel_title_tag);?>>
							</div>
							<?php
								if($wb_blog_carousel_excerpt_visibility == 'yes') {
									?>
										<div class="blog-excerpt">
											<?php echo esc_attr(substr(get_the_excerpt(), 0, 95));?>
										</div>
									<?php 
								}
							?>							
						</div>
						<div class="blog-img" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url());?>');">
							<a href="<?php echo esc_url(get_the_permalink());?>" class="icon-border">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.34245 16.4678L5.33331 16.3321C5.33331 15.8258 5.70951 15.4074 6.19762 15.3413L6.33331 15.3321L23.2613 15.3333L18.9664 11.0407C18.6113 10.6858 18.5788 10.1302 18.869 9.73859L18.9658 9.62646C19.3206 9.27126 19.8762 9.23872 20.2678 9.52912L20.3801 9.62579L26.3801 15.6209C26.7352 15.9757 26.7677 16.5313 26.4774 16.9229L26.3806 17.035L20.3806 23.0401C19.9902 23.4307 19.3572 23.431 18.9664 23.0407C18.6113 22.6858 18.5788 22.1302 18.869 21.7386L18.9658 21.6264L23.256 17.3333L6.33331 17.3321C5.82705 17.3321 5.40866 16.9559 5.34245 16.4678Z" fill="#111"/></svg>
							</a>
						</div>
					</div>
				<?php
					endwhile;
					endif; 
				?>	
	   		</div>
       <?php
	}
}