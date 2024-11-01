<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Testimonial_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-testimonial-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Carousel', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-testimonial-carousel';
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
		return [ 'wb', 'reviews', 'testimonials', 'carousel' ];
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
	       'testimonial_content',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Testimonial
		$repeater = new Repeater();

		$repeater->add_control(
			'wb_testimonial_image',
			[
				'label' => esc_html__( 'Client Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/client-1.webp',
				]
			]
		);

		// Testimonial Client Name
		$repeater->add_control(
			'wb_testimonial_name',
			[
				'label' => esc_html__( 'Client Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Esther Howard', 'webbricks-addons' ),
				'label_block' => true
			]
		);

		// Testimonial Client Designation
		$repeater->add_control(
			'wb_testimonial_desg',
			[
				'label' => esc_html__( 'Client Designation', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Businessman', 'webbricks-addons' ),
				'label_block' => true
			]
		);

		// Testimonial Client Speech
		$repeater->add_control(
			'wb_testimonial_speech',
			[
				'label' => esc_html__( 'Client Speech', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'webbricks-addons' ),
			]
		);

		// Testimonial Client Star
		$repeater->add_control(
			'wb_testimonial_rating',
			[
				'label' => esc_html__( 'Rating (Fraction)', 'webbricks-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
				'min' => 0,
				'max' => 5,
				'step' => 0.1,
			]
		);

		// Testimonial List
		$this->add_control(
			'wb_testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_testimonial_name }}}',
				'separator' => 'before',
				'default' => [
					[
						'wb_testimonial_image' => [
							'default' => [
								'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/client-1.webp',
							]
						],
						'wb_testimonial_name' => esc_html__( 'Esther Howard', 'webbricks-addons' ),
						'wb_testimonial_desg' => esc_html__( 'Businessman', 'webbricks-addons' ),
						'wb_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'webbricks-addons' ),
						'wb_testimonial_rating' => esc_html__('5', 'webbricks-addons')
					],
					[
						'wb_testimonial_image' => [
							'default' => [
								'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/client-2.webp',
							]
						],
						'wb_testimonial_name' => esc_html__( 'Maria Sauks', 'webbricks-addons' ),
						'wb_testimonial_desg' => esc_html__( 'Web Developer', 'webbricks-addons' ),
						'wb_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'webbricks-addons' ),
						'wb_testimonial_rating' => esc_html__('5', 'webbricks-addons')
					],
					[
						'wb_testimonial_image' => [
							'default' => [
								'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/client-3.webp',
							]
						],
						'wb_testimonial_name' => esc_html__( 'Sarah Heinsed', 'webbricks-addons' ),
						'wb_testimonial_desg' => esc_html__( 'Blogger', 'webbricks-addons' ),
						'wb_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'webbricks-addons' ),
						'wb_testimonial_rating' => esc_html__('5', 'webbricks-addons')
					],
					[
						'wb_testimonial_image' => [
							'default' => [
								'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/client-4.webp',
							]
						],
						'wb_testimonial_name' => esc_html__( 'Mithc Hodge', 'webbricks-addons' ),
						'wb_testimonial_desg' => esc_html__( 'Photographer', 'webbricks-addons' ),
						'wb_testimonial_speech' => esc_html__( 'Its impressed me on multiple levels. Thank you for making it painless, pleasant and most of all hassle free! Id be lost without It.', 'webbricks-addons' ),
						'wb_testimonial_rating' => esc_html__('5', 'webbricks-addons')
					]
				]
			]
		);
		
		$this->end_controls_section();

		 // start of the Content tab section
		 $this->start_controls_section(
			'wb_testimonials_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		 );

		 // Dots
		$this->add_control(
			'wb_testimonials_dots',
			[
				'label' => esc_html__( 'Dots', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Loops
		$this->add_control(
			'wb_testimonials_loops',
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
			'wb_testimonials_autoplay',
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
			'wb_testimonials_pause',
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
			'wb_testimonials_autoplay_speed',
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
			'wb_testimonials_autoplay_animation',
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
			'wb_testimonials_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_testimonials_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// Testimonial Image
		$this->start_controls_section(
			'wb_testimonial_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_testimonial_image_border',
				'selector' => '{{WRAPPER}} .single-testimonial img',
			]
		);	

		// Testimonial Image Round
		$this->add_control(
			'wb_testimonial_image_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .single-testimonial img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Testimonial Image Width
		$this->add_control(
			'wb_testimonial_image_width',
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
					'{{WRAPPER}} .single-testimonial img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Name
		$this->start_controls_section(
			'testimonial_name_style',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Name Color
		$this->add_control(
			'wb_testimonial_name_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-top .author-name' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Testimonial Client Name Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .author-top .author-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_testimonial_name_tag',
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
				'default' => 'h4',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Designation
		$this->start_controls_section(
			'wb_testimonial_desg_style',
			[
				'label' => esc_html__( 'Desingnation', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Designation Color
		$this->add_control(
			'wb_testimonial_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-top .author-name span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testimonial Client Designation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_testimonial_desg_typography',
				'selector' => '{{WRAPPER}} .author-top .author-name span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Speech Style
		$this->start_controls_section(
			'wb_testimonial_speech_style',
			[
				'label' => esc_html__( 'Speech', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Speech Color
		$this->add_control(
			'wb_testimonial_speech_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Testimonial Client Speech Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_testimonial_speech_typography',
				'selector' => '{{WRAPPER}} .author-content p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Testimonial Ratings
		$this->start_controls_section(
			'wb_testimonial_ratings_style',
			[
				'label' => esc_html__( 'Ratings', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Client Rating Star Color
		$this->add_control(
			'wb_testimonial_rating_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-rating p i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Testimonial Client Rating Title Color
		$this->add_control(
			'wb_testimonial_rating_color',
			[
				'label' => esc_html__( 'Rating Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-rating span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testimonial Client Rating Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_testimonial_rating_typography',
				'selector' => '{{WRAPPER}} .author-rating span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Testimonial Dots
		$this->start_controls_section(
			'wb_testimonial_dots_style',
			[
				'label' => esc_html__( 'Dots', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Testimonial Dots Color
		$this->add_control(
			'wb_testimonial_dots_color',
			[
				'label' => esc_html__( 'Inactive Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials .owl-dots button' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Testimonial Dots Active Color
		$this->add_control(
			'wb_testimonial_dots_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials .owl-dots button.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Testimonial Arrows
		$this->start_controls_section(
			'wb_testimonial_arrows_style',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_testimonials_arrows_style_tabs'
		);

		// Testtimonial Button Normal Tab
		$this->start_controls_tab(
			'wb_testimonials_arrows_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Testtimonial Button Normal Icon Color
		$this->add_control(
			'wb_testimonials_arrows_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Normal Border Color
		$this->add_control(
			'wb_testimonials_arrows_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Testtimonial Button Normal Border Round
		$this->add_control(
			'wb_testimonials_arrows_border_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Testtimonial Link Hover Tab
		$this->start_controls_tab(
			'wb_testimonials_arrows_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Testtimonial Button Hover Color
		$this->add_control(
			'wb_testimonials_arrows_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Hover Border Color
		$this->add_control(
			'wb_testimonials_arrows_hover_icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Testtimonial Button Hover Background
		$this->add_control(
			'wb_testimonials_arrows_hover_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-arrow:after' => 'background-color: {{VALUE}}',
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
    $wb_testimonials = $settings['wb_testimonials'];
    $wb_testimonials_dots = $settings['wb_testimonials_dots'];
    $wb_testimonials_loops = $settings['wb_testimonials_loops'];
    $wb_testimonials_autoplay = $settings['wb_testimonials_autoplay'];
    $wb_testimonials_pause = $settings['wb_testimonials_pause'];
	$wb_testimonials_autoplay_speed = $settings['wb_testimonials_autoplay_speed'];
	$wb_testimonials_autoplay_animation = $settings['wb_testimonials_autoplay_animation'];		
   ?>
    <!-- Testimonials Start Here -->
    <div class="testimonials owl-carousel" testimonial-dots="<?php echo esc_attr( $wb_testimonials_dots ); ?>" testimonial-loops= "<?php echo esc_attr( $wb_testimonials_loops ); ?>" testimonial-autoplay="<?php echo esc_attr( $wb_testimonials_autoplay ); ?>" testimonial-pause="<?php echo esc_attr( $wb_testimonials_pause ); ?>" testimonial-animation="<?php echo esc_attr( $wb_testimonials_autoplay_animation ); ?>" testimonial-speed="<?php echo esc_attr( $wb_testimonials_autoplay_speed ); ?>">
        <?php
            if($wb_testimonials) {
                foreach($wb_testimonials as $testimonial) {
                    ?>
                        <div class="single-testimonial">
                            <img src="<?php echo esc_url($testimonial['wb_testimonial_image']['url']);?>" alt="">
                            <div class="author-info">
                                <div class="author-top">
									<?php 
										$wb_testimonial_name_tag = $settings['wb_testimonial_name_tag'];
									?>
                                    <<?php echo esc_attr($wb_testimonial_name_tag); ?> class="author-name"><?php echo esc_html($testimonial['wb_testimonial_name']);?> <span><?php echo esc_html($testimonial['wb_testimonial_desg']);?></span></<?php echo esc_attr($wb_testimonial_name_tag); ?>>
                                    <div class="author-rating">
                                        <p>
                                            <?php
                                                $rating = $testimonial['wb_testimonial_rating'];
                                                $full_stars = floor($rating);
                                                $half_star = $rating - $full_stars;
                                                
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $full_stars) {
                                                        echo '<i aria-hidden="true" class="fas fa-star"></i>';
                                                    } elseif ($i == ceil($rating) && $half_star > 0) {
                                                        echo '<i aria-hidden="true" class="fas fa-star-half-alt"></i>';
                                                    } else {
                                                        echo '<i aria-hidden="true" class="far fa-star"></i>';
                                                    }
                                                }
                                                
                                                echo '<span>' . esc_html($rating) . ' / 5</span>';
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="author-content">
                                    <p><?php echo wp_kses_post($testimonial['wb_testimonial_speech']);?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
    <!-- Testimonials End Here -->
    <?php
	}
}