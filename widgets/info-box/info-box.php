<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Info_Box extends Widget_Base {

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
		return 'webbricks-info-box-widget';
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
		return esc_html__( 'Info Box', 'webbricks-addons' );
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
		return 'wb-icon eicon-icon-box';
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
		return [ 'info', 'box', 'wb'];
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
	       'wb_info_box_figure_contents',
		    [
		        'label' => esc_html__('Icon', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Info Box Icon
		$this->add_control(
		    'wb_info_box_icon',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-car-side',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_info_box_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);
		
		// Info Box Heading
		$this->add_control(
		    'wb_info_box_title',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Car Rental', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_info_box_title_tag',
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
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_info_box_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Info Box Description
		$this->add_control(
			'wb_info_box_desc',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_info_box_btn_contents',
			[
				'label' => esc_html__('Button', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Info Box Show Button
		$this->add_control(
			'wb_info_box_show_btn',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Info Box Button Title
		$this->add_control(
		    'wb_info_box_btn_title',
			[
			    'label' => esc_html__('Button Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('More', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_info_box_show_btn' => 'yes'
				],
			]
		);

		// Info Box Button Link
		$this->add_control(
		    'wb_info_box_btn_link',
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
					'wb_info_box_show_btn' => 'yes'
				]
			]
		);

		// Info Box Background
		$this->add_control(
			'wb_info_box_bg',
			[
				'label' => esc_html__( 'Background Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => WBEA_ASSETS_URL . 'img/info-partial.png',
				],
				'separator' => 'before',
			]
		);

		// Info Box Alignment
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_info_box_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	
			]
		);

		$this->add_control( 
			'wb_info_box_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Style tab section

		// Info Box Layout
		$this->start_controls_section(
			'wb_info_box_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Background
		$this->add_control(
			'wb_info_box_background',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Info Box Layout Round
		$this->add_control(
			'wb_info_box_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Info Box Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_price_border',
				'selector' => '{{WRAPPER}} .info-box',
			]
		);	

		// Info Box Padding
		$this->add_control(
			'wb_info_box_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Info Box Icon Style
		$this->start_controls_section(
			'wb_info_box_icon_style',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Icon Color
		$this->add_control(
			'wb_info_box_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Info Box Icon Size
		$this->add_control(
			'wb_info_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 43,
				],
				'selectors' => [
					'{{WRAPPER}} .info-box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Info Box Content Style
		$this->start_controls_section(
			'wb_info_box_title_style',
			[
				'label' => esc_html__( 'Contents', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Contents Background
		$this->add_control(
			'wb_info_box_contents_background',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-content' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Info Box Content Border Round
		$this->add_control(
			'wb_info_box_content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .info-box-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Info Box Content Padding
		$this->add_control(
			'wb_info_box_content_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .info-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Info Box Content Title Heading
		$this->add_control(
			'wb_info_box_title_head',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Info Box Content Title Color
		$this->add_control(
			'wb_info_box_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-content .info-box-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Info Box Content Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_title_typography',
				'selector' => '{{WRAPPER}} .info-box-content .info-box-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Info Box Content Descrption
		$this->add_control(
			'wb_info_box_desc_head',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Info Box Content Description Color
		$this->add_control(
			'wb_info_box_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Info Box Content Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_desc_typography',
				'selector' => '{{WRAPPER}} .info-box-content p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Info Box Button Style
		$this->start_controls_section(
			'wb_info_box_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_info_box_show_btn' => 'yes'
				]
			]
		);

		$this->start_controls_tabs(
			'wb_info_box_style_tabs'
		);

		// Info Box Button Normal Tab
		$this->start_controls_tab(
			'wb_info_box_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Info Box Button Color
		$this->add_control(
			'wb_info_box_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Info Box Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_btn_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		// Info Box Button Border Color
		$this->add_control(
			'wb_info_box_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Info Box Button Border Round
		$this->add_control(
			'wb_info_box_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Info Box Button Padding
		$this->add_control(
			'wb_info_box_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Info Box Hover Tab
		$this->start_controls_tab(
			'wb_button_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Info Box Button Hover Color
		$this->add_control(
			'wb_info_box_btn_hover_color',
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

		// Info Box Button Hover Background
		$this->add_control(
			'wb_info_box_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Info Box Button Hover Border
		$this->add_control(
			'wb_info_box_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
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
		$wb_info_box_icon = $settings['wb_info_box_icon']['value'];
		$wb_info_box_title = $settings['wb_info_box_title'];
		$wb_info_box_title_tag = $settings['wb_info_box_title_tag'];
		$wb_info_box_desc = $settings['wb_info_box_desc'];
		$wb_info_box_show_btn = $settings['wb_info_box_show_btn'];		
		$wb_info_box_bg = $settings['wb_info_box_bg']['url'];		
       ?>
		<!-- Info Box Start Here -->			
		<div class="info-box" style="background-image: url('<?php echo esc_url($wb_info_box_bg);?>');">
			<div class="info-box-icon">
				<i aria-hidden="true" class="<?php echo esc_attr($wb_info_box_icon); ?>"></i>
			</div>
			<div class="info-box-content">
				<<?php echo esc_attr($wb_info_box_title_tag);?> class="info-box-title"><?php echo esc_html($wb_info_box_title);?></<?php echo esc_attr($wb_info_box_title_tag);?>>
				<p><?php echo wp_kses_post($wb_info_box_desc);?></p>
				<?php
					if($wb_info_box_show_btn === 'yes') {
						$wb_info_box_btn_title = $settings['wb_info_box_btn_title'];
						$wb_info_box_btn_link = $settings['wb_info_box_btn_link']['url'];
						?>
						<a href="<?php echo esc_url($wb_info_box_btn_link);?>" class="btn-border"><?php echo esc_html($wb_info_box_btn_title);?><svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
				</svg></a>
					<?php
					}
				?>
			</div>
		</div>
		<!-- Info Box End Here -->	
       <?php
	}
}