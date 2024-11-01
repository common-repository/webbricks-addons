<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class About extends Widget_Base {

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
		return 'webbricks-about-widget';
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
		return esc_html__( 'About Us', 'webbricks-addons' );
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
		return 'wb-icon eicon-single-post';
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
		return [ 'wb', 'about' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Start of the Content Tab Section
	   	$this->start_controls_section(
	       'wb_about_subheading_contents',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
		    ]
	    );

		// About Sub Heading Show?
		$this->add_control(
			'wb_about_subheading_show_btn',
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
		
		// About Sub Heading
		$this->add_control(
			'wb_about_subheading',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('About Us', 'webbricks-addons'),
				'condition' => [
					'wb_about_subheading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wb_about_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Heading
		$this->add_control(
			'wb_about_title',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('100+ Businesses Trust Us For Last Decade', 'webbricks-addons'),
			]
		);		

		// Section Heading Separator Style
		$this->add_control(
			'wb_about_title_tag',
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
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'wb_about_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Description
		$this->add_control(
			'wb_about_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'wb_about_images_contents',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );

		// About Featured Image
		$this->add_control(
			'wb_about_featured_img',
			[
				'label' => esc_html__( 'Choose Featured Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/about.webp',
				]
			]
		);
		 
		// About Secondary Image
		$this->add_control(
			'wb_about_bg_img',
			[
				'label' => esc_html__( 'Background Pattern', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => WBEA_ASSETS_URL . 'img/about-bg.png',
				]
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_about_counters',
			[
				'label' => esc_html__('Counters', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// About Counter Show?
		$this->add_control(
			'wb_about_counter_show_btn',
			[
				'label' => esc_html__( 'Show Counter', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		 
		// About Counters
		$repeater = new Repeater();

		// About Counter Number
		$repeater->add_control(
			'wb_about_counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'webbricks-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( '100', 'webbricks-addons' ),
			]
		);

		// About Counter Number Suffix
		$repeater->add_control(
			'wb_about_counter_suffix',
			[
				'label' => esc_html__( 'Counter Suffix', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'webbricks-addons' ),
			]
		);

		// About Counter Title
		$repeater->add_control(
			'wb_about_counter_title',
			[
				'label' => esc_html__( 'Counter Title', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Counter Visiting', 'webbricks-addons' ),
			]
		);

		// About Counter Repeater
		$this->add_control(
			'wb_about_counter',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_about_counter_title }}}',
				'default' => [
					[
						'wb_about_counter_number' => esc_html__( '100', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Countries Visiting', 'webbricks-addons' ),
					],
					[
						'wb_about_counter_number' => esc_html__( '50', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Hotels & Resorts', 'webbricks-addons' ),
					],
					[
						'wb_about_counter_number' => esc_html__( '10', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Branches All Over', 'webbricks-addons' ),
					]
				],
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				],
			]
		); 

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Suggestion:Three counter looks fit properly. You can add more if needed.', 'webbricks-addons' ),
				'type' => Controls_Manager::RAW_HTML,
				'content_classes' => 'notice-style',
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Content Tab Section

		// Start of the Buttons Tab Section
		$this->start_controls_section(
		'wb_about_buttons',
			[
				'label' => esc_html__('Buttons', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		 
		// About Button 1 Title
		$this->add_control(
		    'wb_about_btn1_title',
			[
			    'label' => esc_html__('Button 1 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact Us', 'webbricks-addons')
			]
		);

		// About Button 1 Link
		$this->add_control(
		    'wb_about_btn1_link',
			[
			    'label' => esc_html__( 'Button 1 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		
		
		// About Button 2 Title
		$this->add_control(
		    'wb_about_btn2_title',
			[
			    'label' => esc_html__('Button 2 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Know More', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// About Button 2 Link
		$this->add_control(
		    'wb_about_btn2_link',
			[
			    'label' => esc_html__( 'Button 2 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Buttons Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_about_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_about_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'wb_about_subheading_style_section',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_about_subheading_show_btn' => 'yes'
				],
			]
		);	

		$this->add_control(
			'wb_about_subheading_sep_head',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// About Content Sub Heading Separator Style
		$this->add_control(
			'wb_about_subheading_sep_variotion',
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

		// About Content Sub Heading Separator Round
		$this->add_control(
			'wb_about_subheading_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_about_subheading_sep_variotion' => 'custom', 
				],
			]
		);

		// About Content Sub Heading Separator Color
		$this->add_control(
			'wb_about_subheading_sep_color',
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

		$this->add_control(
			'wb_about_subheading_head',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Content Sub Heading Color
		$this->add_control(
			'wb_about_subheading_color',
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

		// About Content Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_heading_style_section',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Title Color
		$this->add_control(
			'wb_about_title_color',
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

		// About Content Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_title_typography',
				'selector' => '{{WRAPPER}} .section-title .section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_desc_style_section',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Description Color
		$this->add_control(
			'wb_about_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-desc, {{WRAPPER}} .about-desc p, {{WRAPPER}} .about-desc ul, {{WRAPPER}} .about-desc ol' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Content Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_desc_typography',
				'selector' => '{{WRAPPER}} .about-desc, {{WRAPPER}} .about-desc p, {{WRAPPER}} .about-desc ul, {{WRAPPER}} .about-desc ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// Start of the Style Tab Section
		$this->start_controls_section(
			'wb_about_style_images',
			[
				'label' => esc_html__( 'Images', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Featured Image Heading
		$this->add_control(
			'wb_about_featured_heading',
			[
				'label' => esc_html__( 'Featured', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Featured Image Width
		$this->add_control(
			'wb_about_featured_image_width',
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
					'{{WRAPPER}} .about-img img:first-child' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Featured Image Height
		$this->add_control(
			'wb_about_featured_image_height',
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
					'{{WRAPPER}} .about-img img:first-child' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Heading
		$this->add_control(
			'wb_about_sep_heading',
			[
				'label' => esc_html__( 'Pattern', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Separator Image Width
		$this->add_control(
			'wb_about_sep_image_width',
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
					'{{WRAPPER}} .about-img img:last-child' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Height
		$this->add_control(
			'wb_about_sep_image_height',
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
					'{{WRAPPER}} .about-img img:last-child' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_counters_style',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				]
			]
		);

		// About Counter Number Options
		$this->add_control(
			'wb_about_counter_number_options',
			[
				'label' => esc_html__( 'Number', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Counter Number Color
		$this->add_control(
			'wb_about_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter div, .single-about-counter span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Number Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_number_typography',
				'selector' => '{{WRAPPER}} .single-about-counter div, .single-about-counter span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Counter Title Options
		$this->add_control(
			'wb_about_counter_title_options',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Title Color
		$this->add_control(
			'wb_about_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter .about-counter-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_title_typography',
				'selector' => '{{WRAPPER}} .single-about-counter .about-counter-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_about_counter_title_tag',
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
				],
				'default' => 'p',
			]
		);

		// About Counter Separator Options
		$this->add_control(
			'wb_about_counter_sep_options',
			[
				'label' => esc_html__( 'Separator', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Separator Color
		$this->add_control(
			'wb_about_counter_sep_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Button 1 Options
		$this->add_control(
			'wb_about_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn1_style_tab'
		);

		// About Button 1 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 1 Color
		$this->add_control(
			'wb_about_btn1_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Background
		$this->add_control(
			'wb_about_btn1_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Button 1 Border
		$this->add_control(
			'wb_about_btn1_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn1_typography',
				'selector' => '{{WRAPPER}} .btn-bg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 1 Border Radius
		$this->add_control(
			'wb_about_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 1 Padding
		$this->add_control(
			'wb_about_btn1_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// About Button 1 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 1 Hover Color
		$this->add_control(
			'wb_about_btn1_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-bg:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		// About Button 2 Options
		$this->add_control(
			'wb_about_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn2_style_tab'
		);

		// About Button 2 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 2 Color
		$this->add_control(
			'wb_about_btn2_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Button 2 Border
		$this->add_control(
			'wb_about_btn2_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Button 2 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn2_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 2 Border Radius
		$this->add_control(
			'wb_about_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 2 Padding
		$this->add_control(
			'wb_about_btn2_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// About Button 2 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 2 Hover Background
		$this->add_control(
			'wb_about_btn2_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
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
		// Get widget settings
		$settings = $this->get_settings_for_display();
		
		// Extract settings variables
		$wb_about_subheading_show_btn = $settings['wb_about_subheading_show_btn'];
		$wb_about_title = $settings['wb_about_title'];
		$wb_about_title_tag = $settings['wb_about_title_tag'];
		$wb_about_desc = $settings['wb_about_desc'];
		$wb_about_featured_img = $settings['wb_about_featured_img']['url'];
		$wb_about_bg_img = $settings['wb_about_bg_img']['url'];
		$wb_about_counter = $settings['wb_about_counter'];
		$wb_about_counter_title_tag = $settings['wb_about_counter_title_tag'];
		$wb_about_btn1_title = $settings['wb_about_btn1_title'];
		$wb_about_btn1_link = $settings['wb_about_btn1_link']['url'];
		$wb_about_btn2_title = $settings['wb_about_btn2_title'];
		$wb_about_btn2_link = $settings['wb_about_btn2_link']['url'];
	
		// Render HTML
		?>
		<!-- About Start Here -->
		<section class="about">
			<div class="wb-grid-row align-end">
				<div class="wb-grid-desktop-6 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="section-title">
						<?php if ($wb_about_subheading_show_btn === 'yes') : ?>
							<?php
							$wb_about_subheading_sep_variotion = $settings['wb_about_subheading_sep_variotion'];
							$wb_about_subheading = $settings['wb_about_subheading'];
							?>
							<span class="<?php echo esc_attr($wb_about_subheading_sep_variotion); ?> section-subheading"><?php echo esc_html($wb_about_subheading); ?></span>
						<?php endif; ?>
						<<?php echo esc_attr($wb_about_title_tag); ?> class="section-heading"><?php echo esc_html($wb_about_title); ?></<?php echo esc_attr($wb_about_title_tag); ?>>
					</div> <!-- section-heading end here -->
					<div class="about-img">
						<img src="<?php echo esc_url($wb_about_featured_img); ?>" alt="<?php echo esc_attr($wb_about_title); ?>">
						<img src="<?php echo esc_url($wb_about_bg_img); ?>" alt="<?php echo esc_attr($wb_about_title); ?>">
					</div>
				</div>
				<div class="wb-grid-desktop-6 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="about-desc">
						<p><?php echo wp_kses_post($wb_about_desc, 'post'); ?></p>
					</div>
					<div class="about-counter">
						<?php if ($wb_about_counter) :
							foreach ($wb_about_counter as $counter) :
								$counter_number = $counter['wb_about_counter_number'];
								$counter_suffix = $counter['wb_about_counter_suffix'];
								$counter_title = $counter['wb_about_counter_title'];
								?>
								<div class="single-about-counter">
									<div><span class="about-counter-js"><?php echo esc_attr($counter_number); ?></span> <?php echo esc_html($counter_suffix); ?></div>
									<<?php echo esc_attr($wb_about_counter_title_tag); ?> class="about-counter-title"><?php echo esc_html($counter_title); ?></<?php echo esc_attr($wb_about_counter_title_tag); ?>>
								</div>
						<?php endforeach;
						endif; ?>
					</div>
					<div class="about-btn">
						<?php if ($wb_about_btn1_link) : ?>
							<a href="<?php echo esc_url($wb_about_btn1_link); ?>" class="btn-bg" target="_blank"><?php echo esc_html($wb_about_btn1_title); ?>
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php endif; ?>
	
						<?php if ($wb_about_btn2_link) : ?>
							<a href="<?php echo esc_url($wb_about_btn2_link); ?>" class="btn-border" target="_blank"><?php echo esc_html($wb_about_btn2_title); ?>
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<!-- About End Here -->
		<?php
	}	
}