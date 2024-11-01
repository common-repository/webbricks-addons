<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Counter extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-counter-widget';
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
		return esc_html__( 'Counter', 'webbricks-addons' );
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
		return 'wb-icon eicon-counter';
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
		return [ 'counter', 'number', 'wb'];
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
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'wb_counter_contents',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );

		// Counter Icon
		$this->add_control(
			'wb_counter_icon',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-globe-africa',
					'library' => 'fa-solid',
				]
			]
		);

		// Counter Number
		$this->add_control(
			'wb_counter_number',
			[
				'label' => esc_html__( 'Number', 'webbricks-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100
			]
		);

		// Counter Number Suffix
		$this->add_control(
			'wb_counter_number_suffix',
			[
				'label' => esc_html__( 'Number Suffix', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => ' +',
				'placeholder' => esc_html__( 'Plus', 'webbricks-addons' ),
			]
		);
		
		// Counter Tite
		$this->add_control(
		    'wb_counter_title',
			[
			    'label' => esc_html__('Title', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Visiting Country', 'webbricks-addons'),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_counter_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_counter_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Background
		$this->add_control(
			'wb_counter_background',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Counter Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_counter_border',
				'selector' => '{{WRAPPER}} .counter-box',
			]
		);

		// Counter Border Radius
		$this->add_control(
			'wb_counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Counter Padding
		$this->add_control(
			'wb_counter_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_icon_style',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Icon Color
		$this->add_control(
			'wb_counter_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-number i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Icon Size
		$this->add_control(
			'wb_counter_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .counter-number i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_number_style',
			[
				'label' => esc_html__( 'Number', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Number Color
		$this->add_control(
			'wb_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content p span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Number Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_counter_number_typography',
				'selector' => '{{WRAPPER}} .counter-content p span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Counter Number Suffix Color
		$this->add_control(
			'wb_counter_number_suffix_color',
			[
				'label' => esc_html__( 'Suffix Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Title Color
		$this->add_control(
			'wb_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content .counter-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Counter Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_counter_title_typography',
				'selector' => '{{WRAPPER}} .counter-content .counter-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_counter_title_tag',
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
				'default' => 'p',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

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
		$wb_counter_icon = $settings['wb_counter_icon'];
		$wb_counter_number = $settings['wb_counter_number'];
		$wb_counter_number_suffix = $settings['wb_counter_number_suffix'];
		$wb_counter_title = $settings['wb_counter_title'];
		$wb_counter_title_tag = $settings['wb_counter_title_tag'];
		
       ?>
		<!-- Counter Start Here -->			
		<div class="counter-box">
			<div class="counter-number">					
				<i class="<?php echo esc_attr($wb_counter_icon['value']);?>"></i>
			</div>
			<div class="counter-content">
				<p><span class="counter"><?php echo wp_kses_post($wb_counter_number);?></span><?php echo esc_html($wb_counter_number_suffix);?></p>
				<<?php echo esc_attr($wb_counter_title_tag);?> class="counter-title"><?php echo esc_html($wb_counter_title);?></<?php echo esc_attr($wb_counter_title_tag);?>>
			</div>
		</div>			
		<!-- Counter End Here -->
       <?php
	}
}