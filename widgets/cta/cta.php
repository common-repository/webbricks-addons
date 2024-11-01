<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class CTA extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-cta-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CTA', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-call-to-action';
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
		return [ 'cta', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Start of the CTA Content Tab Section
	   	$this->start_controls_section(
	       'cta_content',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// CTA Title
		$this->add_control(
		    'wb_cta_title',
			[
			    'label' => esc_html__('CAT Content', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Let’s Talk Some Business', 'webbricks-addons'),
			]
		);

		// CTA Separator Style
		$this->add_control(
			'wb_cta_title_tag',
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
		
		// CTA URL
		$this->add_control(
			'wb_cta_url',
			[
				'label' => esc_html__( 'CTA Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		// End of the CTA Content Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_cta_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_cta_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// CTA Layout
		$this->start_controls_section(
			'wb_cta_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Separator Style
		$this->add_control(
			'wb_cta_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'cta-pattern-1' => __( 'Light', 'webbricks-addons' ),
					'cta-pattern-2' => __( 'Dark', 'webbricks-addons' ),
					'cta-pattern-none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'cta-pattern-1',
			]
		);

		// CTA Background Color
		$this->add_control(
			'wb_cta_background_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// CTA Border Radius
		$this->add_control(
			'wb_cta_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// CTA Padding
		$this->add_control(
			'wb_cta_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// CTA Title Style
		$this->start_controls_section(
			'wb_cta_title_style',
			[
				'label' => esc_html__( 'CTA Content', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Title Color
		$this->add_control(
			'wb_cta_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta .cta-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// CTA Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_cta_title_typography',
				'selector' => '{{WRAPPER}} .cta .cta-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// CTA Arrow Color
		$this->add_control(
			'wb_cta_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta a svg path' => 'fill: {{VALUE}}',
				],
				'default' => '#fff',
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
        $settings = $this->get_settings_for_display();

        // Get control values
        $wb_cta_title = $settings['wb_cta_title'];
        $wb_cta_title_tag = $settings['wb_cta_title_tag'];
        $wb_cta_url = $settings['wb_cta_url']['url'];
        $wb_cta_bg_pattern = $settings['wb_cta_bg_pattern'];

        // Generate URL based on selected pattern
        $cta_pattern_url = '';
        switch ($wb_cta_bg_pattern) {
            case 'cta-pattern-1':
                $cta_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/CTA-1.svg';
                break;
            case 'cta-pattern-2':
                $cta_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/CTA-2.svg';
                break;
            default:
                $cta_pattern_url = 'https://cdn.getwebbricks.com/wp-content/uploads/2024/03/CTA-1.svg';
                break;
        }
        ?>

		<?php if(isset($wb_cta_bg_pattern) && $wb_cta_bg_pattern !== 'cta-pattern-none' && isset($cta_pattern_url)) { ?>
        <style>
            .cta {
                background-image: url('<?php echo esc_url($cta_pattern_url); ?>');
            }
        </style>
		<?php } ?>

        <!-- CTA Start Here -->
        <div class="cta">
            <<?php echo esc_attr($wb_cta_title_tag); ?> class="cta-title"><?php echo esc_html($wb_cta_title);?></<?php echo esc_attr($wb_cta_title_tag); ?>>
            <a href="<?php echo esc_url($wb_cta_url);?>">
                <svg width="112" height="71" viewBox="0 0 112 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M109.812 40.0312L81.8125 68.0312C79.1875 70.875 74.5938 70.875 71.9688 68.0312C69.125 65.4062 69.125 60.8125 71.9688 58.1875L87.9375 42H7C3.0625 42 0 38.9375 0 35C0 30.8438 3.0625 28 7 28H87.9375L71.9688 12.0312C69.125 9.40625 69.125 4.8125 71.9688 2.1875C74.5938 -0.65625 79.1875 -0.65625 81.8125 2.1875L109.812 30.1875C112.656 32.8125 112.656 37.4062 109.812 40.0312Z" fill="white"/>
                </svg>
            </a>
        </div>
        <!-- CTA End Here -->

    <?php
    }
}