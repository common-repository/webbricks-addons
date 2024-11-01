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

class Creative_Buttons extends Widget_Base {

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
		return 'webbricks-creative-buttons-widget';
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
		return esc_html__( 'Creative Buttons', 'webbricks-addons' );
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
		return 'wb-icon eicon-button';
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
		return [ 'button', 'duel', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
	    // start of the Creative Buttons Content tab section
	    $this->start_controls_section(
	       'wb_creative_buttons_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Creative Buttons Style
		$this->add_control(
			'wb_creative_buttons_style',
			[
				'label' => esc_html__( 'Style', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'webbricks-addons' ),
					'style-2' => esc_html__( 'Style 2', 'webbricks-addons' ),
				],
			]
		);

		// Creative Buttons Number
		$this->add_control(
			'wb_creative_buttons_number',
			[
				'label' => esc_html__( 'Number of Buttons', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => esc_html__( 'Single Button', 'webbricks-addons' ),
					'2' => esc_html__( 'Dual Button', 'webbricks-addons' ),
				],
			]
		);

		// Creative Buttons Alignment
		$this->add_control(
			'wb_info_box_alignment',
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
					'{{WRAPPER}} .creative-buttons' => 'justify-content: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Creative Buttons Content tab section

		// start of the Creative Buttons Content tab section
	    $this->start_controls_section(
			'wb_creative_button1',
			[
				'label' => esc_html__('Button 1', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
		
			]
		 );

		// Creative Button 1 Title
		$this->add_control(
		    'wb_creative_button1_title',
			[
			    'label' => esc_html__('Button 1 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('See Services', 'webbricks-addons')
			]
		);

		// Creative Button 1 Link
		$this->add_control(
		    'wb_creative_button1_link',
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
		 
		 $this->end_controls_section();
		 // end of the Creative Buttons Content tab section

		 // start of the Creative Buttons Content tab section
		 $this->start_controls_section(
			'wb_creative_button2',
			[
				'label' => esc_html__('Button 2', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_creative_buttons_number' => '2',
				]			
			]
		 );

		// Creative Button 2 Title
		$this->add_control(
		    'wb_creative_button2_title',
			[
			    'label' => esc_html__('Button 2 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact Us', 'webbricks-addons')
			]
		);

		// Creative Button 2 Link
		$this->add_control(
		    'wb_creative_button2_link',
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
		 // end of the Creative Buttons Content tab section

		 // start of the Content tab section
		$this->start_controls_section(
			'wb_creative_buttons_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		 );

		 $this->add_control( 
			'wb_creative_buttons_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Creative Buttons Style tab section

		$this->start_controls_section(
			'creative_button1_style',
			[
				'label' => esc_html__( 'Button 1', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_creative_btn1_style_tab'
		);

		// Creative Button 1 Normal Tab
		$this->start_controls_tab(
			'wb_creative_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Creative Button 1 Color
		$this->add_control(
			'wb_creative_btn1_color',
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

		// Creative Button 1 Background
		$this->add_control(
			'wb_creative_btn1_bg',
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

		// Creative Button 1 Border Color
		$this->add_control(
			'wb_creative_btn1_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-right-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Creative Button 1 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_creative_btn1_typography',
				'selector' => '{{WRAPPER}} .btn-bg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Creative Button 1 Border Radius
		$this->add_control(
			'wb_creative_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Creative Button 1 Padding
		$this->add_control(
			'wb_creative_btn1_padding',
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

		// Creative Button 1 Hover Tab
		$this->start_controls_tab(
			'wb_creative_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Creative Button 1 Hover Color
		$this->add_control(
			'wb_creative_btn1_hover_color',
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

		// Creative Button 1 Hover Background
		$this->add_control(
			'wb_creative_btn1_hover_bg',
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

		// Creative Button 1 Hover Border
		$this->add_control(
			'wb_creative_btn1_hover_border',
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

		$this->end_controls_section();	


		$this->start_controls_section(
			'creative_button2_style',
			[
				'label' => esc_html__( 'Button 2', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_creative_btn2_style_tab'
		);

		// Creative Button 2 Normal Tab
		$this->start_controls_tab(
			'wb_creative_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Creative Button 2 Color
		$this->add_control(
			'wb_creative_btn2_color',
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

		// Creative Button 2 Border
		$this->add_control(
			'wb_creative_btn2_border',
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

		// Creative Button 2 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_creative_btn2_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Creative Button 2 Border Radius
		$this->add_control(
			'wb_creative_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Creative Button 2 Padding
		$this->add_control(
			'wb_creative_btn2_padding',
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

		// Creative Button 2 Hover Tab
		$this->start_controls_tab(
			'wb_creative_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Creative Button 2 Hover Color
		$this->add_control(
			'wb_creative_btn2_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
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

		// Creative Button 2 Hover Background
		$this->add_control(
			'wb_creative_btn2_hover_bg',
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

		// Creative Button 2 Hover Border
		$this->add_control(
			'wb_creative_btn2_hover_border',
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
		$wb_creative_buttons_style = $settings['wb_creative_buttons_style'];
		$wb_creative_button1_title = $settings['wb_creative_button1_title'];
		$wb_creative_button1_link = $settings['wb_creative_button1_link']['url'];
		$wb_creative_button2_title = $settings['wb_creative_button2_title'];
		$wb_creative_button2_link = $settings['wb_creative_button2_link']['url'];
		
        ?>
		<!-- Creative Buttons Start Here -->			
		<div class="creative-buttons <?php echo esc_attr($wb_creative_buttons_style); ?>">
			<?php 
				if($wb_creative_button1_link) {
					?>
						<a href="<?php echo esc_url($wb_creative_button1_link); ?>" class="btn-bg"><?php echo esc_html($wb_creative_button1_title); ?>
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="var(--e-global-color-accent)"></path></svg>
						</a>
					<?php 
				} 
			?>

			<?php 
				if($wb_creative_button2_link) {
					?>
						<a href="<?php echo esc_url($wb_creative_button2_link); ?>" class="btn-border"><?php echo esc_html($wb_creative_button2_title); ?>
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="var(--e-global-color-accent)"></path></svg>
						</a>
					<?php 
				} 
			?>
		</div>
		<!-- Creative Buttons End Here -->
        <?php
	}
}