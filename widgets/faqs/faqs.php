<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Faqs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve faq widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-faq-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve faq widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'FAQs', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve faq widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-accordion';
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
		return [ 'faq', 'wb'];
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
	       'faq_content',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );
		
		// FAQ
		$repeater = new Repeater();

		// FAQ Title
		$repeater->add_control(
			'wb_faq_title',
			[
				'label' => esc_html__( 'FAQ Question', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Where can I find your warranty policy?', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// FAQ Content
		$repeater->add_control(
			'wb_faq_content',
			[
				'label' => esc_html__( 'FAQ Answer', 'webbricks-addons' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' ),
			]
		);

		// FAQ Lists
		$this->add_control(
			'wb_faq_list',
			[
				'label' => esc_html__( 'FAQ Lists', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_faq_title }}}',
				'separator' => 'before',
				'default' => [
					[
						'wb_faq_title' => esc_html__( 'Where can I find your warranty policy?', 'webbricks-addons' ),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wb_faq_title' => esc_html__( 'Where can I change or cancel my order?', 'webbricks-addons'),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wb_faq_title' => esc_html__( 'Are there any return exclusions?', 'webbricks-addons'),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wb_faq_title' => esc_html__( 'How soon will my order ship?', 'webbricks-addons'),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wb_faq_title' => esc_html__( 'What are the returns and exchange requirements?', 'webbricks-addons'),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wb_faq_title' => esc_html__( 'When will I be charged for my order?', 'webbricks-addons'),
						'wb_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					]
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_faq_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_faq_pro_message_notice', 
				[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'
			] 
		);
		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_options',
			[
				'label' => esc_html__( 'Layouts', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Border Color
		$this->add_control(
			'wb_faq_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .faq' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_title_options',
			[
				'label' => esc_html__( 'FAQ Question', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Title Color
		$this->add_control(
			'wb_faq_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li span' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Color
		$this->add_control(
			'wb_faq_title_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li' => 'border-color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Active Color
		$this->add_control(
			'wb_faq_title_border_active_color',
			[
				'label' => esc_html__( 'Border Active', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li span.active' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_faq_title_typography',
				'selector' => '{{WRAPPER}} .faq li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_desc_options',
			[
				'label' => esc_html__( 'FAQ Answer', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Description Color
		$this->add_control(
			'wb_faq_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li, {{WRAPPER}} .faq li p, {{WRAPPER}} .faq li ul, {{WRAPPER}} .faq li ol' => 'color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_faq_desc_typography',
				'selector' => '{{WRAPPER}} .faq li, {{WRAPPER}} .faq li p, {{WRAPPER}} .faq li ul, {{WRAPPER}} .faq li ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Icon Color
		$this->add_control(
			'wb_faq_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq span:after' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Icon Active Color
		$this->add_control(
			'wb_faq_icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} span.active::after' => 'color: {{VALUE}}',
				],
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
		$wb_faq_list = $settings['wb_faq_list'];		
        ?>

	    <?php
			if($wb_faq_list){
		?>
		<ul class="faq">
			<?php
			if($wb_faq_list){
				foreach($wb_faq_list as $list) {
					?>
						<li>
							<span><?php echo esc_html($list['wb_faq_title']); ?></span>
							<p><?php echo esc_html($list['wb_faq_content']); ?></p>
						</li>
					<?php
				}
			}
			?>
		</ul>
		<?php
		}
	}
}