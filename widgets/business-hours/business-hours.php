<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Business_Hours extends Widget_Base {

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
		return 'webbricks-business-hours-widget';
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
		return esc_html__( 'Business Hours', 'webbricks-addons' );
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
		return 'wb-icon eicon-clock-o';
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
		return [ 'wb', 'hours', 'opening', 'business' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// start of the Buesiness Hours Content tab section
	    $this->start_controls_section(
			'wb_business_hours_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Business Hours Heading?
		$this->add_control(
			'wb_business_hours_heading_show_btn',
			[
				'label' => esc_html__( 'Show Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Business Hours Heading
		$this->add_control(
			'wb_business_hours_heading',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Business Hours', 'webbricks-addons'),
				'condition' => [
					'wb_business_hours_heading_show_btn' => 'yes'
				],
			]
		);		

		// Business Hours Heading Html Tag
		$this->add_control(
			'wb_business_hours_heading_tag',
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
					'wb_business_hours_heading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Buesiness Hours Content tab section
		
	    // start of the Buesiness Hours Content tab section
	    $this->start_controls_section(
	       'wb_business_hours_contents',
		    [
		        'label' => esc_html__('Business Hours', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Business Hours
		$repeater = new Repeater();

		// Business Open / Close Select
		$repeater->add_control(
			'wb_business_open_close_select',
			[
				'label' => esc_html__( 'Open / Close', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Open', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Close', 'webbricks-addons' ),
				'return_value' => 'Open',
				'default' => 'Open',
				'separator' => 'before'
			]
		);

		// Business Hours Day
		$repeater->add_control(
			'wb_business_hours_day',
			[
				'label' => esc_html__( 'Day', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Monday', 'webbricks-addons' ),
			]
		);

		// Business Hours Duration
		$repeater->add_control(
			'wb_business_hours_duration',
			[
				'label' => esc_html__( 'Duration', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
				'condition' => [
					'wb_business_open_close_select' => 'Open'
				],
			]
		);

		// Business Hours Close Title
		$repeater->add_control(
			'wb_business_close_title',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Close', 'webbricks-addons' ),
				'condition' => [
					'wb_business_open_close_select!' => 'Open'
				],
			]
		);
		
		// Business Hours Repeater
		$this->add_control(
			'wb_business_hours_list',
			[
				'label' => esc_html__( 'Business Hours', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_business_hours_day }}}',
				'default' => [
					[
						'wb_business_open_close_select' => esc_html__( 'Open', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Monday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Open', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Tuesday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Open', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Wednesday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Open', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Thrusday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Open', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Friday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Close', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Saturday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					],
					[
						'wb_business_open_close_select' => esc_html__( 'Close', 'webbricks-addons' ),
						'wb_business_hours_day' => esc_html__( 'Sunday', 'webbricks-addons' ),
						'wb_business_hours_duration' => esc_html__( '09:00AM to 08:00PM', 'webbricks-addons' ),
					]
				]
			]
		); 
		
		$this->end_controls_section();
		// end of the Buesiness Hours Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_business_hours_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_business_hours_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Buesiness Hours Style tab section

		// Business Hours Heading
		$this->start_controls_section(
			'wb_business_hours_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_business_hours_heading_show_btn' => 'yes'
				],
			]
		);

		// Business Hours Heading Color
		$this->add_control(
			'wb_business_hours_section_title_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours .business-hours-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Business Hours Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_business_hours_section_title_typography',
				'selector' => '{{WRAPPER}} .business-hours .business-hours-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Business Hours Heading Margin
		$this->add_control(
			'wb_business_hours_section_title_margin',
			[
				'label' => esc_html__( 'Margin', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .business-hours .business-hours-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Business Hours Day
		$this->start_controls_section(
			'wb_business_hours_day_style',
			[
				'label' => esc_html__( 'Day', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Day Color
		$this->add_control(
			'wb_business_hours_day_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours-list li span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Business Hours Day Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_business_hours_day_typography',
				'selector' => '{{WRAPPER}} .business-hours-list li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Business Hours Day Border Color
		$this->add_control(
			'wb_business_hours_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours-list li span, .business-hours-list li' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Business Hours Title
		$this->start_controls_section(
			'wb_business_hours_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Title Color
		$this->add_control(
			'wb_business_hours_title_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours-list li p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Business Hours Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_business_hours_title_typography',
				'selector' => '{{WRAPPER}} .business-hours-list li p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Business Hours Duration
		$this->start_controls_section(
			'wb_business_hours_duration_style',
			[
				'label' => esc_html__( 'Duration', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Duration Color
		$this->add_control(
			'wb_business_hours_duration_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours-list li p span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Business Hours Duration Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_business_hours_duration_typography',
				'selector' => '{{WRAPPER}} .business-hours-list li p span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Business Hours Close
		$this->start_controls_section(
			'wb_business_hours_close_style',
			[
				'label' => esc_html__( 'Close', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Business Hours Close Color
		$this->add_control(
			'wb_business_hours_close_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .business-hours-list li.close span' => 'border-color: {{VALUE}} !important',
					'{{WRAPPER}} .business-hours-list li.close p' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .business-hours-list li.close' => 'border-color: {{VALUE}} !important'
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
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
		$wb_business_hours_heading_show_btn = $settings['wb_business_hours_heading_show_btn'];
		$wb_business_hours_list = $settings['wb_business_hours_list'];		
	?>
	
		<!-- Business Hours Start Here -->			
		<div class="business-hours">
			<?php if ($wb_business_hours_heading_show_btn == 'yes') : ?>
				<?php $wb_business_hours_heading = $settings['wb_business_hours_heading']; ?>
				<?php $wb_business_hours_heading_tag = $settings['wb_business_hours_heading_tag']; ?>
				<<?php echo esc_attr($wb_business_hours_heading_tag); ?> class="business-hours-heading"><?php echo esc_html($wb_business_hours_heading); ?></<?php echo esc_attr($wb_business_hours_heading_tag); ?>>
			<?php endif; ?>
	
			<?php if ($wb_business_hours_list) : ?>
				<ul class="business-hours-list">
					<?php foreach ($wb_business_hours_list as $list) : ?>
						<?php
						$business_open_close_select = $list['wb_business_open_close_select'];
						$business_day = $list['wb_business_hours_day'];
						$wb_business_close_title = $list['wb_business_close_title'];
						$business_duration = $list['wb_business_hours_duration'];
						?>								
						<li class="<?php echo esc_attr($business_open_close_select === 'Close' ? 'close' : ''); ?>">
							<span><?php echo esc_html($business_day); ?></span>
							<p>
								<span><?php echo esc_html($business_duration); ?></span>
								<?php if ($business_open_close_select === 'Open') : ?>
									<?php echo '&nbsp;' . esc_html($business_open_close_select); ?>
								<?php else : ?>
									<?php echo esc_html($wb_business_close_title); ?>
								<?php endif; ?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<!-- Business Hours End Here -->	
	<?php
	}	
}