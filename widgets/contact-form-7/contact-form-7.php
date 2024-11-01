<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Contact_Form_7 extends Widget_Base {

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
		return 'webbricks-contact-form-7-widget';
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
		return esc_html__( 'Contact Form 7', 'webbricks-addons' );
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
		return 'wb-icon eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'webbricks-addons' ];
	}

	public function is_cf7_activated() {
        return class_exists( 'WPCF7' );
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
		return [ 'contact', 'form', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		if ( ! function_exists( 'wb_get_contact_form7' ) ) {
			function wb_get_contact_form7(){		  
			$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);		  
			$formlist=[];			  
				if( $post = get_posts($args)){
					foreach ( $post as $posts ) {
						(int)$formlist[$posts->ID] = $posts->post_title;
					}
				}
			else{
				(int)$formlist['0'] = esc_html__('No contact Form 7 found', 'webbricks-addons');
			}
			return $formlist;
			}		  
		}
		
	    // CF7 Settings 
        $this->start_controls_section(
            'wb_cf7_content_settings',
            [
                'label'     => $this->is_cf7_activated() ? esc_html__( 'Settings', 'webbricks-addons' ) : esc_html__( 'Missing Notice', 'webbricks-addons' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

		// CF7 Check Install
        if ( ! $this->is_cf7_activated() ) {
            $this->add_control(
                'wb_cf7_missing_notice',
                [
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => sprintf(
						// Translators: Notification message for missing plugin.
						__( 'Hello, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'webbricks-addons' ),
						'<a href="'.esc_url( admin_url( 'plugin-install.php?s=Contact+Form+7&tab=search&type=term' ) )
						.'" target="_blank" rel="noopener">Contact Form 7</a>'
					),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

			// CF7 Install Message
            $this->add_control(
                'wb_cf7_install',
                [
                    'type'  => Controls_Manager::RAW_HTML,
                    'raw'   => '<a href="' . esc_url( admin_url( 'plugin-install.php?s=Contact+Form+7&tab=search&type=term' ) ).'" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
			return;
        }

		// CF7 Select Form
		$this->add_control(
			'wb_cf7',
			[
				'label' => esc_html__( 'Select Contact Form', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => false,
				'options' => wb_get_contact_form7(),
			]
		);

		$this->end_controls_section();
		// end of the Contact Form tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_cf7_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_cf7_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();		

		// start of the Contact Form Style tab section
		$this->start_controls_section(
			'wb_cf7_label_style',
			[
				'label' => __( 'Label', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// CF7 Label Align
		$this->add_responsive_control(
			'wb_cf7_label_align',
			[
				'label' => __( 'Alignment', 'webbricks-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form label' => 'text-align: {{VALUE}};',
				],
			]
		);

		// CF7 Label Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __('Typography', 'webbricks-addons'),
				'name' => 'wb_cf7_label_typography',
				'selector' => '{{WRAPPER}} .wpcf7-form label, {{WRAPPER}} .wpcf7-form input::placeholder, {{WRAPPER}} .wpcf7-form textarea::placeholder',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// CF7 Label Color
		$this->add_control(
			'wb_cf7_label_color',
			[
				'label' => __( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);	

		// CF7 Label Placeholer Color
		$this->add_control(
			'wb_cf7_label_placeholder_color',
			[
				'label' => __( 'Placeholder Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form ::placeholder' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// CF7 Label Spacing
		$this->add_control(
			'wb_cf7_label_space',
			[
				'label' => __( 'Spacing', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpcf7 input[type="text"], 
					{{WRAPPER}} .wpcf7 input[type="email"], 
					{{WRAPPER}} .wpcf7 textarea, 
					{{WRAPPER}} .wpcf7 input[type="date"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		// CF7 Form Style
		$this->start_controls_section(
			'wb_cf7_form_style',
			[
				'label' => __( 'Form Style', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// CF7 Border Color
		$this->add_control(
			'cf_7_border_color',
			[
				'label' => __( 'Input Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wb-cf7 .wpcf7 input[type="text"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="email"], 
					{{WRAPPER}} .wpcf7 input[type="date"],
					{{WRAPPER}} .wpcf7 input[type="tel"],
					{{WRAPPER}} .wpcf7 input[type="url"],
					{{WRAPPER}} .wpcf7 input[type="number"],
					{{WRAPPER}} .wpcf7-form-control.wpcf7-select,
					{{WRAPPER}} .wb-cf7 .wpcf7 textarea' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		// CF7 Input Background
		$this->add_control(
			'cf7_form_bg',
			[
				'label' => __( 'Input Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wb-cf7 .wpcf7 input[type="text"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="email"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="date"],
					{{WRAPPER}} .wpcf7 input[type="tel"],
					{{WRAPPER}} .wpcf7 input[type="url"],
					{{WRAPPER}} .wpcf7 input[type="number"],
					{{WRAPPER}} .wpcf7-form-control.wpcf7-select,
					{{WRAPPER}} .wb-cf7 .wpcf7 textarea' => 'background: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);

		// CF7 Input Focus
		$this->add_control(
			'cf7_form_focus',
			[
				'label' => __( 'Input Focus', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7 input:focus, {{WRAPPER}} .wpcf7 textarea:focus' => 'border-color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// CF7 Input Border Radius
		$this->add_control(
			'cf7_form_radius',
			[
				'label' => __( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wb-cf7 .wpcf7 input[type="text"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="email"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="date"],
					{{WRAPPER}} .wb-cf7 .wpcf7 textarea, 
					{{WRAPPER}} .wpcf7 input[type="tel"],
					{{WRAPPER}} .wpcf7 input[type="url"],
					{{WRAPPER}} .wpcf7 input[type="number"],
					{{WRAPPER}} .wpcf7-form-control.wpcf7-select,
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="submit"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'=>'after'
			]
		);

		// CF7 Input & Textarea Widtg
		$this->add_responsive_control(
			'cf7_input_width',
			[
				'label' => __( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px', 'em' ],
				'range' => [
				'px' => [
					'min' => 10,
					'max' => 1200,
				],
				'em' => [
					'min' => 1,
					'max' => 80,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .wb-cf7 .wpcf7 input[type="text"], 
				{{WRAPPER}} .wb-cf7 .wpcf7 input[type="email"],
				{{WRAPPER}} .wb-cf7 .wpcf7 input[type="date"],
				{{WRAPPER}} .wpcf7 input[type="tel"],
				{{WRAPPER}} .wpcf7 input[type="url"],
				{{WRAPPER}} .wpcf7 input[type="number"],
				{{WRAPPER}} .wb-cf7 .wpcf7 textarea, 
				{{WRAPPER}} .wb-cf7 .wpcf7-form, 
				{{WRAPPER}} .wpcf7-form label' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);  

		// CF7 Input Height
		$this->add_responsive_control(
				'cf7_input_height',
				[
					'label' => __( 'Input Height', 'webbricks-addons' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em' ],
					'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
					],
					'em' => [
						'min' => 1,
						'max' => 40,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wb-cf7 .wpcf7 input[type="text"], 
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="date"],
					{{WRAPPER}} .wpcf7 input[type="tel"],
					{{WRAPPER}} .wpcf7 input[type="url"],
					{{WRAPPER}} .wpcf7 input[type="number"],
					{{WRAPPER}} .wb-cf7 .wpcf7 input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		// CF7 Textarea Height
		$this->add_responsive_control(
			'cf7_textarea_height',
			[
				'label' => __( 'Textarea Height', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
				'px' => [
					'min' => 30,
					'max' => 300,
					],
					'em' => [
						'min' => 1,
						'max' => 40,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 125,
				],
				'selectors' => [
					'{{WRAPPER}} .wb-cf7 .wpcf7 textarea' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
			
		$this->end_controls_section();
		
		// CF7 Button Style
		$this->start_controls_section(
			'wb_cf7_button_style',
			[
				'label' => __( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs( 'wb_cf7_tabs_button_style' );

		$this->start_controls_tab(
			'wb_cf7_btn_normal',
			[
				'label' => __( 'Normal', 'webbricks-addons' ),
			]
		);

		// CF7 Button Color
		$this->add_control(
			'wb_cf7_button_color',
			[
				'label' => __( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);
		
		// CF7 Button Background
		$this->add_control(
			'wb_cf7_button_bg',
			[
				'label' => __( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'background: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// CF7 Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __('Typography', 'webbricks-addons'),
				'name' => 'wb_cf7_button_typography',
				'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// CF7 Button Border Radius
		$this->add_control(
			'wb_cf7_button_radius',
			[
				'label' => __( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
				
			]
		);

		// CF7 Button Padding
		$this->add_control(
			'wb_cf7_button_padding',
			[
				'label' => __( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);

		// CF7 Button Margin
		$this->add_control(
			'wb_cf7_button_margin',
			[
				'label' => __( 'Margin', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
	
		// CF7 Button Border
		$this->add_control(
			'wb_cf7_button_border',
			[
				'label' => __( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'border:1px solid {{VALUE}};',
				],
				'separator'=>'after'
			]
		);
			
		// CF7 Button Padding
		$this->add_responsive_control(
			'wb_cf7_button_width',
			[
				'label' => __( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%','px', 'em',  ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1200,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);  
		$this->end_controls_tab();

		// CF7 Button Hover
		$this->start_controls_tab(
			'wb_cf7_btn_hover',
			[
				'label' => __( 'Hover', 'webbricks-addons' ),
			]
		);

		// CF7 Button Hover Color
		$this->add_control(
			'wb_cf7_button_hover_color',
			[
				'label' => __( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner:hover' => 'color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// CF7 Button Hover Border
		$this->add_control(
			'wb_cf7_button_hover_border',
			[
				'label' => __( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner:hover' => 'border-color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// CF7 Button Hover Background
		$this->add_control(
			'wb_cf7_button_hover_bg',
			[
				'label' => __( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit.has-spinner:hover' => 'background-color: {{VALUE}} !important;',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);
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
		
		if(!empty($settings['wb_cf7'])){
			echo'<div class="elementor-shortcode wb-cf7 wb-cf7-'.esc_attr($settings['wb_cf7']).'">';
				echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['wb_cf7']).'"]');    
			echo '</div>';  
		}
	}
}