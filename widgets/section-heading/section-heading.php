<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Section_Heading extends Widget_Base {

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
		return 'webbricks-section-heading-widget';
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
		return esc_html__( 'Section Heading', 'webbricks-addons' );
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
		return 'wb-icon eicon-archive-title';
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
		return [ 'heading', 'title', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
	    // start of the Section Heading Content tab section
	    $this->start_controls_section(
	       'wb_section_subheading_contents',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Section Sub Heading Show?
		$this->add_control(
			'wb_section_subheading_show_btn',
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
		
		// Section Sub Heading
		$this->add_control(
		    'wb_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('This is a Subheading', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_section_subheading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Section Heading Content tab section
	    $this->start_controls_section(
			'wb_section_heading_contents',
			[
			'label' => esc_html__('Heading', 'webbricks-addons'),
			'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);
		
		// Section Heading
		$this->add_control(
		    'wb_section_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('This is the main heading', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Tag
		$this->add_control(
			'wb_section_heading_tag',
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

		// start of the Section Description Content tab section
	    $this->start_controls_section(
			'wb_section_desc_contents',
			 [
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			 ]
		 );

		// Section Description Show?
		$this->add_control(
			'wb_section_desc_show_btn',
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

		// Section Description
		$this->add_control(
		    'wb_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_section_desc_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Section Button Content tab section
	    $this->start_controls_section(
			'wb_section_btn_contents',
			 [
				'label' => esc_html__('Button', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			 ]
		 );

		// Section Heading Show Button?
		$this->add_control(
			'wb_section_heading_show_btn',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'no', 
				'separator' => 'before'
			]
		);

		// Section Heading Button Title
		$this->add_control(
		    'wb_section_heading_btn_title',
			[
			    'label' => esc_html__('Button Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Click To Read More', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_section_heading_show_btn' => 'yes'
				],
			]
		);

		// Section Heading Button Link
		$this->add_control(
		    'wb_section_heading_btn_link',
			[
			    'label' => esc_html__( 'Button Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'condition' => [
					'wb_section_heading_show_btn' => 'yes'
				]
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_section_heading_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		// Section Pro Message
		$this->add_control( 
			'wb_section_heading_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Style tab section

		// Section Heading Alignment
		$this->start_controls_section(
			'wb_section_heading_layout',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Section Heading Alignment
		$this->add_responsive_control(
			'wb_section_heading_alignment',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);

		$this->end_controls_section();

		// Section Heading Separator
		$this->start_controls_section(
			'wb_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_section_subheading_show_btn' => 'yes'
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wb_section_subheading_bullet_style',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// Section Heading Separator Style
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

		// Section Heading Separator Round
		$this->add_control(
			'wb_section_heading_separator_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span.section-subheading:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_section_heading_separator_variation' => 'custom', 
				],
			]
		);

		// Section Heading Separator Color
		$this->add_control(
			'wb_section_heading_separator_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span.section-subheading:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'condition' => [
					'wb_section_heading_separator_variation!' => 'none',
				],
			]
		);
	
		// Heading Control
		$this->add_control(
			'wb_section_subheading_heading_style',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Section Sub Heading Color
		$this->add_control(
			'wb_section_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span.section-subheading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span.section-subheading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Section Heading Style
		$this->start_controls_section(
			'wb_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Section Heading Color
		$this->add_control(
			'wb_section_heading_color',
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

		// Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_heading_typography',
				'selector' => '{{WRAPPER}} .section-title .section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Section Description Style
		$this->start_controls_section(
			'wb_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_section_desc_show_btn' => 'yes'
				],
			]
		);

		// Section Description Color
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

		// Section Description Typography
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

		// Section Heading Button Style
		$this->start_controls_section(
			'wb_section_heading_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_section_heading_show_btn' => 'yes'
				]
			]
		);

		$this->start_controls_tabs(
			'wb_section_heading_btn_style_tabs'
		);

		// Section Heading Button Normal Tab
		$this->start_controls_tab(
			'wb_section_heading_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Section Heading Button Color
		$this->add_control(
			'wb_section_heading_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Section Heading Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_heading_btn_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Button Border Color
		$this->add_control(
			'wb_section_heading_btn_border_color',
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

		// Section Heading Button Border Radius
		$this->add_control(
			'wb_section_heading_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Section Heading Button Padding
		$this->add_control(
			'wb_section_heading_btn_padding',
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

		// Section Heading Button Hover Tab
		$this->start_controls_tab(
			'wb_section_heading_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Section Heading Button Hover Color
		$this->add_control(
			'wb_section_heading_btn_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Section Heading Button Hover Background
		$this->add_control(
			'wb_section_heading_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Section Heading Button Hover Border
		$this->add_control(
			'wb_section_heading_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
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
 * Render heading widget output on the frontend.
 *
 * Generates the final HTML output.
 *
 * @since 1.0.0
 * @access protected
 */
protected function render() {
    // Get input from the widget settings.
    $settings = $this->get_settings_for_display();

    // Extract settings or provide defaults.
    $wb_section_subheading_show_btn = isset($settings['wb_section_subheading_show_btn']) ? $settings['wb_section_subheading_show_btn'] : '';
    $wb_section_heading = isset($settings['wb_section_heading']) ? $settings['wb_section_heading'] : '';
    $wb_section_heading_tag = $settings['wb_section_heading_tag'];
    $wb_section_desc_show_btn = isset($settings['wb_section_desc_show_btn']) ? $settings['wb_section_desc_show_btn'] : '';
    $wb_section_heading_show_btn = isset($settings['wb_section_heading_show_btn']) ? $settings['wb_section_heading_show_btn'] : '';

    ?>
    <!-- Section Title Start Here -->
    <div class="section-title">
        <?php if ($wb_section_subheading_show_btn === 'yes') :
            $wb_section_subheading = isset($settings['wb_section_subheading']) ? $settings['wb_section_subheading'] : '';
            $wb_section_heading_separator_variation = isset($settings['wb_section_heading_separator_variation']) ? $settings['wb_section_heading_separator_variation'] : '';
            ?>
            <span class="<?php echo esc_attr($wb_section_heading_separator_variation); ?>  section-subheading"><?php echo esc_html($wb_section_subheading); ?></span>
        <?php endif; ?>

        <<?php echo esc_attr($wb_section_heading_tag);?> class="section-heading"><?php echo esc_html($wb_section_heading); ?></<?php echo esc_attr($wb_section_heading_tag);?>>

        <?php if ($wb_section_desc_show_btn === 'yes') :
            $wb_section_desc = isset($settings['wb_section_desc']) ? $settings['wb_section_desc'] : '';
            ?>
            <p><?php echo wp_kses_post($wb_section_desc); ?></p>
        <?php endif; ?>

        <?php if ($wb_section_heading_show_btn === 'yes') :
            $wb_section_heading_btn_title = isset($settings['wb_section_heading_btn_title']) ? $settings['wb_section_heading_btn_title'] : '';
            $wb_section_heading_btn_link = isset($settings['wb_section_heading_btn_link']['url']) ? $settings['wb_section_heading_btn_link']['url'] : '';
            ?>
            <a href="<?php echo esc_url($wb_section_heading_btn_link); ?>" class="btn-border" target="_blank"><?php echo esc_html($wb_section_heading_btn_title); ?>
				<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
				</svg>
            </a>
        <?php endif; ?>
    </div>
    <!-- Section Title End Here -->
    <?php
	}
}