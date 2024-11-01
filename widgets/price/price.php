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

class Price extends Widget_Base {

	/**
	 * Get widget name.   
	 *
	 * Retrieve price widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-price-widget';
	}

	/**
	 * Get widget heading.
	 *
	 * Retrieve price widget heading.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget heading.
	 */
	public function get_title() {
		return esc_html__( 'Price', 'webbricks-addons' );
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
		return 'wb-icon eicon-price-table';
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
		return [ 'price', 'table', 'wb'];
	}

	/**
	 * Get widget style.
	 *
	 * Retrieve the list of categories the about widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget style.
	*/
	public function get_style_depends() {
        return ['wb-price'];
    }

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// start of the Title tab section
	   	$this->start_controls_section(
	       'wb_price_title_content',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
		    ]
	    );
		
		// Price Heading
		$this->add_control(
		    'wb_price_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Golden', 'webbricks-addons'),
			]
		);

		// Price Ribbon Show?
		$this->add_control(
			'wb_price_show_ribbon',
			[
				'label' => esc_html__( 'Show Ribbon', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before'
			]
		);
		
		// Price Ribbon Text
		$this->add_control(
		    'wb_price_ribbon_text',
			[
				'label' => esc_html__('Featured', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Featured', 'webbricks-addons' ),
				'condition' => [
					'wb_price_show_ribbon' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Features tab section
		$this->start_controls_section(
			'wb_price_features_content',
			[
				'label' => esc_html__('Features', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Price Feature
		$repeater = new Repeater();

		// Price Feature Name
		$repeater->add_control(
			'wb_price_feature_name',
			[
				'label' => esc_html__( 'Feature Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type feature name', 'webbricks-addons' ),
			]
		);

		// Price Repeater
		$repeater->add_control(
			'wb_price_feature_icon',
			[
				'label' => esc_html__( 'Feature Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-check-circle',
				],
			]
		);

		// Price Icon Color
		$repeater->add_control(
			'wb_price_feature_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Feature List
		$this->add_control(
			'wb_price_feature',
			[
				'label' => esc_html__( 'Price Feature', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_price_feature_name }}}',
				'separator' => 'before',
				'default' => [
					[
						'wb_price_feature_name' => esc_html__( 'Two Person', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-check-circle',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'Two Nights', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-check-circle',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'One Location', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-check-circle',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'Free Breakfast ', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-check-circle',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'Airport Pick Up', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-window-close',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'Dinner Buffet', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-window-close',
						],
					],
					[
						'wb_price_feature_name' => esc_html__( 'Outdoor Activities', 'webbricks-addons' ),
						'wb_price_feature_icon' => [
							'value' => 'far fa-window-close',
						],
					]
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_price_content',
			[
				'label' => esc_html__('Price', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Price Amount
		$this->add_control(
		    'wb_price_amount',
			[
			    'label' => esc_html__('Amount', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('$220', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Purchase Link Show?
		$this->add_control(
			'wb_price_link_show',
			[
				'label' => esc_html__( 'Show Link', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Purchase Link
		$this->add_control(
		    'wb_price_link',
			[
			    'label' => esc_html__( 'Price Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'condition' => [
					'wb_price_link_show' => 'yes'
				],
			]
		);

		// Price Price Alignment
		$this->add_control(
			'wb_price_alignment',
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
					'{{WRAPPER}} .price-btn span' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'wb_price_link_show!' => 'yes'
				],
			],
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_price_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'price-pattern-1' => __( 'Style 1', 'webbricks-addons' ),
					'price-pattern-2' => __( 'Style 2', 'webbricks-addons' ),
					'price-pattern-3' => __( 'Style 3', 'webbricks-addons' ),
					'price-pattern-none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'price-pattern-1',
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_price_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_price_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// Price Layout Style
		$this->start_controls_section(
			'wb_price_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_price_border',
				'selector' => '{{WRAPPER}} .price',
			]
		);	

		// Price Border Radius
		$this->add_control(
			'wb_price_border_style',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	

		// Price Heading
		$this->start_controls_section(
			'wb_price_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Heading Color
		$this->add_control(
			'wb_price_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-heading h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_price_heading_typography',
				'selector' => '{{WRAPPER}} .price-heading h4',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_price_heading_tag',
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
				'default' => 'default',
			]
		);

		// Price Separator Color
		$this->add_control(
			'wb_price_sep_color',
			[
				'label' => esc_html__( 'Separator Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-heading h4:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_section();	

		// Price Ribbon
		$this->start_controls_section(
			'wb_price_ribbon_style',
			[
				'label' => esc_html__( 'Ribbon', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_price_show_ribbon' => 'yes'
				],
			]
		);

		// Price Ribbon Color
		$this->add_control(
			'wb_price_ribbon_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-heading span' => 'color: {{VALUE}}',
				],
				'global' => '#fff'
			]
		);

		// Price Ribbon Background
		$this->add_control(
			'wb_price_ribbon_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-heading span' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Ribbon Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_price_ribbon_typography',
				'selector' => '{{WRAPPER}} .price-heading span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();	

		// Price Feature
		$this->start_controls_section(
			'wb_price_feature_style',
			[
				'label' => esc_html__( 'Features', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Feature Color
		$this->add_control(
			'wb_price_feature_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-feature span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Price Feature Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_price_feature_typography',
				'selector' => '{{WRAPPER}} .price-feature span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Price Feature Border Color
		$this->add_control(
			'wb_price_feature_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-feature span' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Feature Padding
		$this->add_control(
			'wb_price_feature_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .price-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Price Feature Alignment
		$this->add_control(
			'wb_price_feature_alignment',
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
					'{{WRAPPER}} .price-feature' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();	

		// Price Amount
		$this->start_controls_section(
			'wb_price_bottom_style',
			[
				'label' => esc_html__( 'Price', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Price Amount Color
		$this->add_control(
			'wb_price_amount_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_price_amount_typography',
				'selector' => '{{WRAPPER}} .price-btn span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Price Bottom Background
		$this->add_control(
			'wb_price_bottom_background',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn' => 'background-color: {{VALUE}}',
				],
				'default' => 'rgba(0,0,0,0)',
			]
		);

		// Price Purchase Link
		$this->add_control(
			'wb_price_bottom_link',
			[
				'label' => esc_html__( 'Price Link', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'wb_price_link_show' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wb_price_link_style_tabs',
			[
				'condition' => [
					'wb_price_link_show' => 'yes'
				]
			]
		);
		

		// Price Button Normal Tab
		$this->start_controls_tab(
			'wb_price_link_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Price Button Normal Icon Color
		$this->add_control(
			'wb_price_link_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn a svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Price Button Normal Border Color
		$this->add_control(
			'wb_price_link_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn a' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Button Normal Border Radius
		$this->add_control(
			'wb_price_link_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .price-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Price Link Hover Tab
		$this->start_controls_tab(
			'wb_price_link_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Price Button Hover Icon Color
		$this->add_control(
			'wb_price_link_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn a:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Price Button Hover Border
		$this->add_control(
			'wb_price_link_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn a:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Price Button Hover Background
		$this->add_control(
			'wb_price_link_hover_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-btn a:after' => 'background-color: {{VALUE}}',
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
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();		
		$wb_price_heading = $settings['wb_price_heading'];
		$wb_price_show_ribbon = $settings['wb_price_show_ribbon'];
		$wb_price_ribbon_text = $settings['wb_price_ribbon_text'];
		$wb_price_feature = $settings['wb_price_feature'];
		$wb_price_amount = $settings['wb_price_amount'];
		$wb_price_link_show = $settings['wb_price_link_show'];
		$wb_price_bg_pattern = $settings['wb_price_bg_pattern'];

		$price_pattern_url = '';
		switch ($wb_price_bg_pattern) {
			case 'price-pattern-1':
				$price_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/price-pattern.svg';
				break;
			case 'price-pattern-2':
				$price_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/price-pattern-2.svg';
				break;
			case 'price-pattern-3':
				$price_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/price-pattern-b.svg';
				break;
			default:
				$price_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/price-pattern.svg';
				break;
		}
		
       ?>
		<!-- Price Start Here -->
		<div class="price">
			<div class="price-heading">
				<h4><?php echo esc_html($wb_price_heading);?></h4>
				<?php if($wb_price_show_ribbon == 'yes') {
					?>
						<span><?php echo esc_attr($wb_price_ribbon_text);?></span>
					<?php
				} ?>
				
			</div>
			<div class="price-feature">
				<?php
				if($wb_price_feature) {
					foreach($wb_price_feature as $feature) {
						$feature_icon_color = $feature['wb_price_feature_icon_color'];
						$feature_icon = $feature['wb_price_feature_icon']['value'];
						$feature_name = $feature['wb_price_feature_name'];
				?>
					<span><i style="color: <?php echo esc_attr($feature_icon_color);?>" class="<?php echo esc_attr($feature_icon);?>"></i> <?php echo esc_html($feature_name);?></span>
				<?php
					}
				}
				?>
			</div>

			<?php if(isset($wb_price_bg_pattern) && $wb_price_bg_pattern !== 'price-pattern-none' && isset($price_pattern_url)) { ?>
			<style>
				.price-btn{
					background-image: url('<?php echo esc_url($price_pattern_url); ?>');
				}
			</style>
			<?php } ?>

			<div class="price-btn">
				<span><?php echo esc_html($wb_price_amount);?></span>
				<?php 
					if($wb_price_link_show == 'yes') {
						$wb_price_link = $settings['wb_price_link']['url'];
						?>
							<a href="<?php echo esc_url($wb_price_link);?>" target="_blank">
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php 
					}
				?>
				
			</div>
		</div>			
		<!-- Price End Here -->
       <?php
	}
}