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

class Team_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-team-carousel-widget';
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
		return esc_html__( 'Team Carousel', 'webbricks-addons' );
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
		return 'wb-icon eicon-carousel';
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
		return [ 'wb', 'team', 'carousel' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Teams Section Heading Layout
		$this->start_controls_section(
			'wb_teams_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Teams Section Heading Show
		$this->add_control(
			'wb_teams_section_heading_show',
			[
				'label' => esc_html__( 'Show Section Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'wb_team_carousel_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'team-pattern-1' => __( 'Style 1', 'webbricks-addons' ),
					'team-pattern-2' => __( 'Style 2', 'webbricks-addons' ),
					'team-pattern-none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'team-pattern-1',
			]
		);

		$this->end_controls_section();

		// Teams Section Sub Heading Box
		$this->start_controls_section(
			'wb_teams_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Sub Heading Show?
		$this->add_control(
			'wb_teams_section_subheading_show',
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
		// Teams Sub Heading
		$this->add_control(
		    'wb_teams_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Teams', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Teams Section Heading Box
		$this->start_controls_section(
			'wb_teams_section_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes'
				],
			]
		);
		
		// Teams Section Heading
		$this->add_control(
		    'wb_teams_section_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Are Your One Door To Solve It All', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_teams_section_heading_tag',
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
			]
		);

		$this->end_controls_section();

		// Teams Section Description
		$this->start_controls_section(
			'wb_teams_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Teams Section Heading Description Show?
		$this->add_control(
			'wb_teams_section_desc_show',
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

		// Teams Section Heading Description
		$this->add_control(
		    'wb_teams_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wb_teams_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// start of the Content tab section

		$this->start_controls_section(
			'team_carousel_content',
			[
				'label' => esc_html__('Teams', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Team Carousel List
		$repeater = new Repeater();
 
		$repeater->add_control(
			'wb_team_carousel_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-1.webp',
				],
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'wb_team_carousel_bg',
			[
				'label' => esc_html__( 'Background Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
				],
				'separator' => 'before',
			]
		);
 
		$repeater->add_control(
			'wb_team_carousel_name',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		 );
 
		$repeater->add_control(
			'wb_team_carousel_designation',
			[
				'label' => esc_html__( 'Designtion', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$repeater->add_control(
            'wb_team_carousel_fb_url',
            [
                'label' => __( 'Facebook', 'webbricks-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'wb_team_carousel_tw_url',
            [
                'label' => __( 'Twitter', 'webbricks-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'wb_team_carousel_ln_url',
            [
                'label' => __( 'Linkedin', 'webbricks-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'wb_team_carousel_insta_url',
            [
                'label' => __( 'Instagram', 'webbricks-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://getwebbricks.com',
                ],
                'show_external' => true,
                'autocomplete' => false,
                'label_block' => true,
            ]
        );
 
		$this->add_control(
			'wb_team_carousels',
			[
				'label' => esc_html__( 'Teams List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
				[
					'wb_team_carousel_image' => [
						'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-1.webp',
					],
					'wb_team_carousel_bg' => [
						'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
					],
					'wb_team_carousel_name' => esc_html__( 'Novák Réka', 'webbricks-addons' ),
					'wb_team_carousel_designation' => esc_html__( 'Senior Developer', 'webbricks-addons'),
					'wb_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wb_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wb_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wb_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wb_team_carousel_image' => [
						'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-2.webp',
					],
					'wb_team_carousel_bg' => [
						'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
					],
					'wb_team_carousel_name' => esc_html__( 'Pintér Beatrix', 'webbricks-addons' ),
					'wb_team_carousel_designation' => esc_html__( 'Senior UX Designer', 'webbricks-addons'),
					'wb_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wb_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wb_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wb_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wb_team_carousel_image' => [
						'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-3.webp',
					],
					'wb_team_carousel_bg' => [
						'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
					],
					'wb_team_carousel_name' => esc_html__( 'Halász Emese', 'webbricks-addons' ),
					'wb_team_carousel_designation' => esc_html__( 'Inside Sales Head', 'webbricks-addons'),
					'wb_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wb_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wb_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wb_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wb_team_carousel_image' => [
						'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-4.webp',
					],
					'wb_team_carousel_bg' => [
						'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
					],
					'wb_team_carousel_name' => esc_html__( 'Szekeres Dalma', 'webbricks-addons' ),
					'wb_team_carousel_designation' => esc_html__( 'Admin Manager', 'webbricks-addons'),
					'wb_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wb_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wb_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wb_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				[
					'wb_team_carousel_image' => [
						'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-2.webp',
					],
					'wb_team_carousel_bg' => [
						'url' => WBEA_ASSETS_URL . 'img/team-preview.png',
					],
					'wb_team_carousel_name' => esc_html__( 'John Doe', 'webbricks-addons' ),
					'wb_team_carousel_designation' => esc_html__( 'SEO Expert', 'webbricks-addons'),
					'wb_team_carousel_fb_url' => 'https://www.facebook.com/webBricksWP',
					'wb_team_carousel_tw_url' => 'https://twitter.com/webbricks_',
					'wb_team_carousel_ln_url' => 'https://www.linkedin.com/company/web-bricks-wp/',
					'wb_team_carousel_insta_url' => 'https://www.instagram.com/webbricks_/',
				],
				],
				'title_field' => '{{{ wb_team_carousel_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_team_carousel_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		 );

		// Teams Carousel Number
		$this->add_control(
			'wb_team_carousel_number',
			[
				'label' 		=> __('Number of Teams', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Teams Carousel Arrows
		$this->add_control(
			'wb_team_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Loops
		$this->add_control(
			'wb_team_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Pause
		$this->add_control(
			'wb_team_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay
		$this->add_control(
			'wb_team_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Teams Carousel Autoplay Speed
		$this->add_control(
			'wb_team_carousel_autoplay_speed',
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

		// Teams Carousel Animation Speed
		$this->add_control(
			'wb_team_carousel_autoplay_animation',
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
			'wb_team_carousel_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_team_carousel_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();

		// Service Section Heading Style
		$this->start_controls_section(
			'wb_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes',
					'wb_teams_section_subheading_show' => 'yes'
				],
			]
		);

		$this->add_control(
			'wb_team_carousel_section_subheading_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);


		// Teams Section Heading Separator Style
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

		// Service Section Bullet Color
		$this->add_control(
			'wb_service_section_sep_bg',
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

		// Service Section Bullet Round
		$this->add_control(
			'wb_service_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_section_heading_separator_variation' => 'custom', 
				],
			]
		);
		

		// Service Section Sub Heading Color
		$this->add_control(
			'wb_service_section_subheading_color',
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

		// Service Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_service_section_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Heading Options
		$this->start_controls_section(
			'wb_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes'
				],
			]
		);

		// Service Section Heading Color
		$this->add_control(
			'wb_section_title_color',
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

		// Service Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_section_title_typography',
				'selector' => '{{WRAPPER}} .section-title .section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Description Options
		$this->start_controls_section(
			'wb_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_teams_section_heading_show' => 'yes',
					'wb_teams_section_desc_show' => 'yes'
				],
			]
		);

		// Service Section Description Color
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

		// Service Section Description Typography
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

		// Teams Layout
		$this->start_controls_section(
			'wb_team_carousel_layout_style',
			[
				'label' => esc_html__( 'Teams Card', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Background
		$this->add_control(
			'wb_team_background',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-bg' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffffff00',
			]
		);

		// Team Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_team_border',
				'selector' => '{{WRAPPER}} .team-content',
			]
		);	

		// Team Alignment
		$this->add_control(
			'wb_team_alignment',
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
					'{{WRAPPER}} .team-content' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();

		// Teams Box Style
		$this->start_controls_section(
			'wb_teams_box_style',
			[
				'label' => esc_html__( 'Teams Content', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Teams Box Icon Options
		$this->add_control(
			'wb_teams_box_icon_options',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Image Width
		$this->add_control(
			'wb_team_image_width',
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
					'{{WRAPPER}} .team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Height
		$this->add_control(
			'wb_team_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Border
		$this->add_control(
			'wb_team_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Teams Box Heading Options
		$this->add_control(
			'wb_teams_box_title_options',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Name Color
		$this->add_control(
			'wb_team_name_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-name' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Name Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_team_name_typography',
				'selector' => '{{WRAPPER}} .team-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Description Options
		$this->add_control(
			'wb_teams_box_desc_options',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Designation Color
		$this->add_control(
			'wb_team_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-desg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Designation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_team_desg_typography',
				'selector' => '{{WRAPPER}} .team-desg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Teams Box Social Options
		$this->add_control(
			'wb_teams_box_social_options',
			[
				'label' => esc_html__( 'Socials', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Team Social Color
		$this->add_control(
			'wb_team_social_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Team Social Hover Color
		$this->add_control(
			'wb_team_social_hover_color',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-social a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Teams Arrow Style
		$this->start_controls_section(
			'wb_teams_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_team_carousel_arrows' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wp_teams_arrow_style_tabs'
		);

		// Teams Arrow Normal Tab
		$this->start_controls_tab(
			'wp_teams_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Teams Arrow Color
		$this->add_control(
			'wb_teams_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Teams Arrow Border Color
		$this->add_control(
			'wb_teams_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Teams Arrow Border Radius
		$this->add_control(
			'wb_teams_arrow_border_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Teams Arrow Hover Tab
		$this->start_controls_tab(
			'wp_teams_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Teams Arrow Hover Icon Color
		$this->add_control(
			'wb_teams_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Teams Arrow Hover Border Color
		$this->add_control(
			'wb_teams_arrow_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Teams Arrow Round
		$this->add_control(
			'wb_teams_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-arrow-border:after' => 'background-color: {{VALUE}}',
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
			$wb_teams_section_heading_show = $settings['wb_teams_section_heading_show'];
			$wb_team_carousels = $settings['wb_team_carousels'];
			$wb_team_carousels_items = $settings['wb_team_carousel_number'];
			$wb_team_carousels_arrows = $settings['wb_team_carousel_arrows'];
			$wb_team_carousels_loops = $settings['wb_team_carousel_loop'];
			$wb_team_carousels_pause = $settings['wb_team_carousel_pause'];
			$wb_team_carousels_autoplay = $settings['wb_team_carousel_autoplay'];
			$wb_team_carousels_autoplay_speed = $settings['wb_team_carousel_autoplay_speed'];
			$wb_team_carousels_autoplay_animation = $settings['wb_team_carousel_autoplay_animation'];
			$wb_team_carousel_bg_pattern = $settings['wb_team_carousel_bg_pattern'];

			$team_pattern_url = '';
			switch ($wb_team_carousel_bg_pattern) {
				case 'team-pattern-1':
					$team_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/team-pattern-2.svg';
					break;
				case 'team-pattern-2':
					$team_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/team-pattern-1.svg';
					break;
				default:
					$team_pattern_url = 'http://localhost/webbricks-wp/wp-content/uploads/2024/03/pattern-2.svg';
					break;
			}
		
       	?>

		

<?php if(isset($wb_team_carousel_bg_pattern) && $wb_team_carousel_bg_pattern !== 'team-pattern-none' && isset($team_pattern_url)) { ?>
							<style>								
								.team-bg{
									background-image: url('<?php echo esc_url($team_pattern_url);?>');
								}
							</style>
							<?php } ?>

		<?php if ($wb_teams_section_heading_show === 'yes') {	 	
			$wb_teams_section_subheading_show = $settings['wb_teams_section_subheading_show'];
			$wb_teams_section_subheading = $settings['wb_teams_section_subheading'];
			$wb_section_heading_separator_variation = $settings['wb_section_heading_separator_variation'];
			$wb_teams_section_heading = $settings['wb_teams_section_heading'];
			$wb_teams_section_heading_tag = $settings['wb_teams_section_heading_tag'];
			$wb_teams_section_desc_show = $settings['wb_teams_section_desc_show'];
			$wb_teams_section_desc = $settings['wb_teams_section_desc'];
		?>			
			<div class="section-title service-title">
				<?php if($wb_teams_section_subheading_show == 'yes') {
					?>
						<span class="<?php echo esc_attr($wb_section_heading_separator_variation); ?> section-subheading"><?php echo esc_html($wb_teams_section_subheading);?></span>
					<?php 
				} ?>
				<<?php echo esc_attr($wb_teams_section_heading_tag); ?>  class="section-heading"><?php echo esc_html($wb_teams_section_heading);?></<?php echo esc_attr($wb_teams_section_heading_tag); ?>>
				
				<?php if($wb_teams_section_desc_show == 'yes'){
					?>
						<p><?php echo wp_kses_post($wb_teams_section_desc);?></p>
					<?php 
				} ?>

			</div>
		<?php } ?>
	   
	   <div class="team-carousel owl-carousel <?php echo $wb_team_carousels_arrows === 'yes' ? 'carousel-top-arrows' : ''; ?> <?php echo $wb_teams_section_heading_show === 'yes' ? 'heading-top' : ''; ?>" 
	   		team-items="<?php echo esc_attr( $wb_team_carousels_items ); ?>" 
			team-arrows= "<?php echo esc_attr( $wb_team_carousels_arrows );?>" 
			team-loops="<?php echo esc_attr( $wb_team_carousels_loops ); ?>" 
			team-pause="<?php echo esc_attr( $wb_team_carousels_pause ); ?>" team-autoplay="<?php echo esc_attr( $wb_team_carousels_autoplay ); ?>" team-autoplay-speed="<?php echo esc_attr( $wb_team_carousels_autoplay_speed ); ?>" 
			team-autoplay-animation="<?php echo esc_attr( $wb_team_carousels_autoplay_animation ); ?>">
			<?php 
				if($wb_team_carousels) {
					foreach($wb_team_carousels as $team){
						$team_image = $team['wb_team_carousel_image']['url'];
						$team_name = $team['wb_team_carousel_name'];
						$team_desgination = $team['wb_team_carousel_designation'];
						$wb_team_carousel_fb_url = $team['wb_team_carousel_fb_url']['url'];
						$wb_team_carousel_tw_url = $team['wb_team_carousel_tw_url']['url'];
						$wb_team_carousel_ln_url = $team['wb_team_carousel_ln_url']['url'];
						$wb_team_carousel_insta_url = $team['wb_team_carousel_insta_url']['url'];
						?>
							<div class="single-team">
								<img decoding="async" class="team-img" src="<?php echo esc_url($team_image); ?>" alt="<?php echo esc_attr($team_name) ;?>">
								<div class="team-bg">
								<div class="team-content">
									<h4 class="team-name"><?php echo esc_html($team_name) ;?></h4>
									<p class="team-desg"><?php echo esc_html($team_desgination) ;?></p>
										<div class="team-social">
											<?php 
												if($wb_team_carousel_fb_url) {
													?>
														<a href="<?php echo esc_url($wb_team_carousel_fb_url);?>"><i class="fa fa-facebook-square"></i></a>
													<?php
												}
											?>

											<?php 
												if($wb_team_carousel_tw_url) {
													?>
														<a href="<?php echo esc_url($wb_team_carousel_tw_url);?>"><i class="fa fa-twitter-square"></i></a>
													<?php
												}
											?>

											<?php 
												if($wb_team_carousel_ln_url) {
													?>
														<a href="<?php echo esc_url($wb_team_carousel_ln_url);?>"><i class="fa fa-linkedin-square"></i></a>
													<?php
												}
											?>

											<?php 
												if($wb_team_carousel_insta_url) {
													?>
														<a href="<?php echo esc_url($wb_team_carousel_insta_url);?>"><i class="fa fa-instagram"></i></a>
													<?php
												}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php 
					}
				}
			?>
	   </div>
       <?php
	}
}