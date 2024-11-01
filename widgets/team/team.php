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

class Team extends Widget_Base {

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
		return 'webbricks-team-widget';
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
		return esc_html__( 'Team Grid', 'webbricks-addons' );
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
		return 'wb-icon eicon-person';
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
		return [ 'team', 'memeber', 'wb'];
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
	       'wb_team_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );

		// Team Image
		$this->add_control(
			'wb_team_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/team-1.webp',
				],
				'separator' => 'before',
			]
		);

		// Team Name
		$this->add_control(
			'wb_team_name',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Name Tag
		$this->add_control(
			'wb_team_name_tag',
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

		// Team Designation
		$this->add_control(
			'wb_team_designation',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_team_socials_contents',
			[
				'label' => esc_html__('Socials', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
			]
		 );

		// Team Socials Show?
		$this->add_control(
			'wb_team_social_show',
			[
				'label' => esc_html__( 'Show Socials', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Team Socials
		$repeater = new Repeater();

		$repeater->add_control(
			'wb_team_social_name',
			[
				'label' => esc_html__( 'Social Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Name', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Social Icon
		$repeater->add_control(
			'wb_team_social_icon',
			[
				'label' => esc_html__( 'Team Social Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-square',
					'library' => 'solid',
				],
			]
		);

		// Team Social Link
		$repeater->add_control(
			'wb_team_social_link', [
				'label' => esc_html__( 'Team Social Links', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://www.facebook.com/webBricksWP/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
			]
		);

		// Team Socials
		$this->add_control(
			'wb_team_socials',
			[
				'label' => esc_html__( 'Team Socials List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_team_social_name' => esc_html__( 'Twitter', 'webbricks-addons' ),
						'wb_team_social_link' => 'https://twitter.com/',
						'wb_team_social_icon' => [
							'value' => 'fab fa-twitter-square',
						],
					],
					[
						'wb_team_social_name' => esc_html__( 'Instagram', 'webbricks-addons' ),
						'wb_team_social_link' => 'https://www.instagram.com//',
						'wb_team_social_icon' => [
							'value' => 'fab fa-instagram',
						],
					],
					[
						'wb_team_social_name' => esc_html__( 'Linekdin', 'webbricks-addons' ),
						'wb_team_social_link' => 'https://www.linkedin.com/company/web-bricks-wp',
						'wb_team_social_icon' => [
							'value' => 'fab fa-linkedin',
						],
					]
				],
				'title_field' => '{{{ wb_team_social_name }}}',
				'separator' => 'before',
				'condition' => [
					'wb_team_social_show' => 'yes'
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_team_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_team_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();

		// Team Layout Style
		$this->start_controls_section(
			'wb_team_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_team_bg_pattern',
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
					'{{WRAPPER}} .team' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();	

		// Team Image Style
		$this->start_controls_section(
			'wb_team_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
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

		$this->end_controls_section();	

		// Team Name Style
		$this->start_controls_section(
			'wb_team_name_style',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'default' => Global_Colors::COLOR_TEXT,
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
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();		

		// Team Designation Style
		$this->start_controls_section(
			'wb_team_desg_style',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'default' => Global_Colors::COLOR_TEXT,
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

		$this->end_controls_section();

		// Team Social
		$this->start_controls_section(
			'wb_team_social_section',
			[
				'label' => esc_html__( 'Social', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_team_social_show' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wb_team_social_icon_style_tabs'
		);

		// Team Social Normal Tab
		$this->start_controls_tab(
			'wb_team_social_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Team Social Icon Color
		$this->add_control(
			'wb_social_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Social Icon Size
		$this->add_control(
			'wb_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Team Social Hover Tab
		$this->start_controls_tab(
			'wb_team_social_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Team Social Icon Hover Color
		$this->add_control(
			'wb_social_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-social a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End of Style tab section

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
		$wb_team_image = $settings['wb_team_image']['url'];
		$wb_team_name = $settings['wb_team_name'];
		$wb_team_name_tag = $settings['wb_team_name_tag'];
		$wb_team_designation = $settings['wb_team_designation'];
		$wb_team_social_show = $settings['wb_team_social_show'];
		$wb_team_socials = $settings['wb_team_socials'];
		$wb_team_bg_pattern = $settings['wb_team_bg_pattern'];

		$team_pattern_url = '';
		switch ($wb_team_bg_pattern) {
			case 'team-pattern-1':
				$team_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/team-pattern-1.svg';
				break;
			case 'team-pattern-2':
				$team_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/team-pattern-2.svg';
				break;
			default:
				$team_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/team-pattern-1.svg';
				break;
		}
		
       ?>

		<?php if(isset($wb_team_bg_pattern) && $wb_team_bg_pattern !== 'team-pattern-none' && isset($team_pattern_url)) { ?>
		<style>
			.team-bg{
				background-image: url('<?php echo esc_url($team_pattern_url);?>');
			}			
		</style>
		<?php } ?>

	   <div class="team">
			<img class="team-img" src="<?php echo esc_url($wb_team_image);?>" alt="<?php echo esc_attr($wb_team_name);?>">
			<div class="team-bg">
				<div class="team-content">
					<<?php echo esc_attr($wb_team_name_tag); ?> class="team-name"><?php echo esc_html($wb_team_name);?></<?php echo esc_attr($wb_team_name_tag); ?>>
					<p class="team-desg"><?php echo esc_html($wb_team_designation);?></p>

					<?php 
						if($wb_team_social_show == 'yes') {
							?>
								<div class="team-social">
									<?php
										foreach($wb_team_socials as $social) {
											$social_link = $social['wb_team_social_link']['url'];
											$social_icon = $social['wb_team_social_icon']['value'];
									?>
										<a href="<?php echo esc_url($social_link);?>"><i class="<?php echo esc_attr($social_icon);?>"></i></a>
									<?php
										}
									?>
								</div>
							<?php
						}
					?>					
				</div>
			</div>
	   </div>
       <?php
	}
}