<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Contact_Info extends Widget_Base {

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
		return 'webbricks-contact-info-widget';
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
		return esc_html__( 'Contact Info', 'webbricks-addons' );
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
		return 'wb-icon eicon-kit-details';
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
		return [ 'wb', 'contact', 'info', 'list' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
	    // start of the Contact Info Content tab section
	    $this->start_controls_section(
	       'wb_contact_info_heading_contents',
		    [
		        'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
		    ]
	    );

		// Contact Infos Show Heading?
		$this->add_control(
			'wb_contact_info_show_heading',
			[
				'label' => esc_html__( 'Show Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Contact Info Heading
		$this->add_control(
			'wb_contact_info_heading',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact', 'webbricks-addons'),
				'condition' => [
					'wb_contact_info_show_heading' => 'yes'
				],
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_contact_info_heading_tag',
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
				'condition' => [
					'wb_contact_info_show_heading' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Contact Info tab section

		// start of the Contact Info Content tab section
	    $this->start_controls_section(
			'wb_contact_info_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);

		// Contact Infos Show Description?
		$this->add_control(
			'wb_contact_info_show_desc',
			[
				'label' => esc_html__( 'Show Description', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Contact Info Description
		$this->add_control(
			'wb_contact_info_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'condition' => [
					'wb_contact_info_show_desc' => 'yes'
				],
			]
		);		
		
		$this->end_controls_section();
		// end of the Contact Info tab section

		// start of the Contact Info Content tab section
	    $this->start_controls_section(
			'wb_contact_info_lists',
			[
				'label' => esc_html__('Infos', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Contact Infos Show Button?
		$this->add_control(
			'wb_contact_infos_show_btn',
			[
				'label' => esc_html__( 'Show Infos', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Contact Info Lists
		$repeater = new Repeater();

		$repeater->add_control(
			'wb_contact_info_list_icon',
			[
				'label' => esc_html__( 'Contact Info Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-map-marker-alt',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'wb_contact_info_list_name',
			[
				'label' => esc_html__( 'Contact Info Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '8502 Preston Rd. Inglewood, Maine 98380', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->add_control(
			'wb_contact_info_list',
			[
				'label' => esc_html__( 'Contact Info List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_contact_info_list_icon' => [
							'value' => 'fas fa-map-marker-alt',
						],
						'wb_contact_info_list_name' => esc_html__( '8502 Preston Rd. Inglewood, Maine 98380', 'webbricks-addons' ),
					],					
					[
						'wb_contact_info_list_icon' => [
							'value' => 'far fa-envelope',
						],
						'wb_contact_info_list_name' => esc_html__( 'connect@getwebbricks.com', 'webbricks-addons' ),
					],
					[
						'wb_contact_info_list_icon' => [
							'value' => 'fas fa-phone-alt',
						],
						'wb_contact_info_list_name' => esc_html__( '(671) 555-0110', 'webbricks-addons' ),
					]
				],
				'title_field' => '{{{ wb_contact_info_list_name }}}',
				'separator' => 'before',
				'condition' => [
					'wb_contact_infos_show_btn' => 'yes'
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Contact Info tab section

		// start of the Contact Info Content tab section
	    $this->start_controls_section(
			'wb_contact_info_socials',
			[
				'label' => esc_html__('Socials', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// Socials Show Button?
		$this->add_control(
			'wb_contact_info_socials_show_btn',
			[
				'label' => esc_html__( 'Show Socials', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'wb_contact_social_heading',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Follow Us', 'webbricks-addons'),
				'condition' => [
					'wb_contact_info_socials_show_btn' => 'yes'
				],
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_contact_social_heading_tag',
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
				'condition' => [
					'wb_contact_info_socials_show_btn' => 'yes'
				],
			]
		);
		 
		// Contact Socials List
		$repeater = new Repeater();

		$repeater->add_control(
			'wb_contact_info_socials_list_icon',
			[
				'label' => esc_html__( 'Contact Social Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-square',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'wb_contact_info_socials_list_name',
			[
				'label' => esc_html__( 'Contact Social Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$repeater->add_control(
		    'wb_contact_info_socials_list_link',
			[
			    'label' => esc_html__( 'Contact Social Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		

		$repeater->add_control(
			'wb_contact_info_socials_list_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->add_control(
			'wb_contact_info_socials_list',
			[
				'label' => esc_html__( 'Contact Socials List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_contact_info_socials_list_icon' => [
							'value' => 'fab fa-youtube',
						],
						'wb_contact_info_socials_list_name' => esc_html__( '@web-bricks', 'webbricks-addons' ),
					],					
					[
						'wb_contact_info_socials_list_icon' => [
							'value' => 'fab fa-twitter',
						],
						'wb_contact_info_socials_list_name' => esc_html__( '@webbricks_', 'webbricks-addons' ),
					],
					[
						'wb_contact_info_socials_list_icon' => [
							'value' => 'fab fa-linkedin-in',
						],
						'wb_contact_info_socials_list_name' => esc_html__( '/company/web-bricks-wp', 'webbricks-addons' ),
					],
					[
						'wb_contact_info_socials_list_icon' => [
							'value' => 'fab fa-facebook-f',
						],
						'wb_contact_info_socials_list_name' => esc_html__( '@webBricksWP', 'webbricks-addons' ),
					]
				],
				'title_field' => '{{{ wb_contact_info_socials_list_name }}}',
				'separator' => 'before',
				'condition' => [
					'wb_contact_info_socials_show_btn' => 'yes'
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Contact Info tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_contact_info_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_contact_info_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Contact Info Style tab section

		// Contact Info Heading Section
		$this->start_controls_section(
			'wb_contact_info_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_contact_info_show_heading' => 'yes'
				],
			]
		);

		// Contact Info Border Color
		$this->add_control(
			'wb_contact_info_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Contact Info Heading Color
		$this->add_control(
			'wb_contact_info_heading_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .contact-info-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Contact Info Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_contact_info_heading_typography',
				'selector' => '{{WRAPPER}} .contact-info .contact-info-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Contact Info Heading Margin
		$this->add_control(
			'wb_contact_info_heading_margin',
			[
				'label' => esc_html__( 'Margin', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .contact-info .contact-info-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Contact Info Description Section
		$this->start_controls_section(
			'wb_contact_info_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_contact_info_show_desc' => 'yes'
				],
			]
		);

		// Contact Info Description Color
		$this->add_control(
			'wb_contact_info_desc_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info > p, {{WRAPPER}} .contact-info ul li, {{WRAPPER}} .contact-info ol li' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Contact Info Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_contact_info_desc_typography',
				'selector' => '{{WRAPPER}} .contact-info > p, {{WRAPPER}} .contact-info ul li, {{WRAPPER}} .contact-info ol li',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Contact Info Lists Section
		$this->start_controls_section(
			'wb_contact_info_lists_style',
			[
				'label' => esc_html__( 'Infos', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_contact_infos_show_btn' => 'yes'
				],
			]
		);

		// Contact Info Lists Icon
		$this->add_control(
			'wb_contact_info_lists_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Info Lists Icon Color
		$this->add_control(
			'wb_contact_info_lists_icon_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-info-list i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Contact Info Lists Heading Options
		$this->add_control(
			'wb_contact_info_lists_heading_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Info Lists Heading Color
		$this->add_control(
			'wb_contact_info_lists_heading_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-info-list p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Contact Info Lists Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_contact_info_lists_heading_typography',
				'selector' => '{{WRAPPER}} .single-contact-info-list p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Contact Info Social Lists
		$this->start_controls_section(
			'wb_contact_info_socials_style',
			[
				'label' => esc_html__( 'Socials', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_contact_info_socials_show_btn' => 'yes'
				],
			]
		);

		// Contact Info Social Lists Heading Options
		$this->add_control(
			'wb_contact_info_social_lists_heading_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Info Social Lists Heading Color
		$this->add_control(
			'wb_contact_info_social_lists_heading_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info-follows .contact-info-socials-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Contact Info Social Lists Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_contact_info_social_lists_heading_typography',
				'selector' => '{{WRAPPER}} .contact-info-follows .contact-info-socials-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Contact Info Social Lists Icon Options
		$this->add_control(
			'wb_contact_info_social_lists_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Info Social Lists Icon Color
		$this->add_control(
			'wb_contact_info_icon_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-info-follows i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Contact Info Social Lists Heading Options
		$this->add_control(
			'wb_contact_info_social_lists_icon_heading_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Info Social Lists Icon Color
		$this->add_control(
			'wb_contact_info_socials_icon_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-contact-info-follows a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Contact Info Socials Lists Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_contact_info_socials_icon_typography',
				'selector' => '{{WRAPPER}} .single-contact-info-follows a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

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
		// Get widget settings for display.
		$settings = $this->get_settings_for_display();		
		$wb_contact_info_show_heading = $settings['wb_contact_info_show_heading'];
		$wb_contact_info_heading = $settings['wb_contact_info_heading'];
		$wb_contact_info_heading_tag = $settings['wb_contact_info_heading_tag'];
		$wb_contact_info_show_desc = $settings['wb_contact_info_show_desc'];
		$wb_contact_info_desc = $settings['wb_contact_info_desc'];
		$wb_contact_info_list = $settings['wb_contact_info_list'];
		$wb_contact_social_heading = $settings['wb_contact_social_heading'];
		$wb_contact_social_heading_tag = $settings['wb_contact_social_heading_tag'];
		$wb_contact_info_socials_list = $settings['wb_contact_info_socials_list'];
		$wb_contact_infos_show_btn = $settings['wb_contact_infos_show_btn'];
		$wb_contact_info_socials_show_btn = $settings['wb_contact_info_socials_show_btn'];
	?>
	
		<!-- Contact Info Start Here -->			
		<div class="contact-info">
			<?php 
				if($wb_contact_info_show_heading == 'yes') {
					?>
						<<?php echo esc_attr($wb_contact_info_heading_tag); ?> class="contact-info-heading"><?php echo esc_html($wb_contact_info_heading); ?></<?php echo esc_attr($wb_contact_info_heading_tag); ?>>
					<?php
				}
			?>

			<?php 
				if($wb_contact_info_show_desc == 'yes') {
					?>
						<p><?php echo wp_kses_post($wb_contact_info_desc); ?></p>
					<?php
				}
			?>
	
			<?php if ($wb_contact_infos_show_btn == 'yes' && !empty($wb_contact_info_list)) : ?>
				<div class="contact-info-list">
					<?php foreach ($wb_contact_info_list as $info_list) : ?>
						<?php
						$wb_contact_info_list_icon = $info_list['wb_contact_info_list_icon']['value'];
						$wb_contact_info_list_name = $info_list['wb_contact_info_list_name'];
						?>
						<div class="single-contact-info-list">
							<i aria-hidden="true" class="<?php echo esc_attr($wb_contact_info_list_icon); ?>"></i>
							<p><?php echo esc_html($wb_contact_info_list_name); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
	
			<?php if ($wb_contact_info_socials_show_btn == 'yes' && !empty($wb_contact_info_socials_list)) : ?>
				<div class="contact-info-follows">
					<<?php echo esc_attr($wb_contact_social_heading_tag); ?> class="contact-info-socials-heading"><?php echo esc_html($wb_contact_social_heading); ?></<?php echo esc_attr($wb_contact_social_heading_tag); ?>>
					<?php foreach ($wb_contact_info_socials_list as $social_list) : ?>
						<?php
						$wb_contact_info_socials_list_icon = $social_list['wb_contact_info_socials_list_icon']['value'];
						$wb_contact_info_socials_list_name = $social_list['wb_contact_info_socials_list_name'];
						$wb_contact_info_socials_list_link = $social_list['wb_contact_info_socials_list_link'];
						$wb_contact_info_socials_list_icon_color = $social_list['wb_contact_info_socials_list_icon_color'];
						?>
						<div class="single-contact-info-follows">
							<i aria-hidden="true" class="<?php echo esc_attr($wb_contact_info_socials_list_icon); ?>" style="color: <?php echo esc_attr($wb_contact_info_socials_list_icon_color); ?>"></i>
							<a href="<?php echo esc_url($wb_contact_info_socials_list_link['url']); ?>"><?php echo esc_html($wb_contact_info_socials_list_name); ?></a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- Contact Info End Here -->
	
	<?php
	}
	
}