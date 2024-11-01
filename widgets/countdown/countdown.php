<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Countdown extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve countdown widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	*/
	public function get_name() {
		return 'webbricks-countdown-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve countdown widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Countdown Timer', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve countdown widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-countdown';
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
		return [ 'wb', 'countdown', 'counter' ];
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
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'wb_countdown_section',
			[
				'label' => __( 'Countdown', 'webbricks-addons' ),
			]
		);

		// Countdown Due Date
		$this->add_control(
			'wb_countdown_due_date',
			[
				'label' => __( 'Due Date', 'webbricks-addons' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => gmdate('Y-m-d H:i', strtotime('+1 month')),
				'description' => sprintf(esc_html('Date set according to your timezone: %s.', 'webbricks-addons'), date_default_timezone_get()),
			]
		);

		// Countdown Show Days
		$this->add_control(
			'wb_countdown_show_days',
			[
				'label' => __( 'Days', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Hours
		$this->add_control(
			'wb_countdown_show_hours',
			[
				'label' => __( 'Hours', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Minutes
		$this->add_control(
			'wb_countdown_show_minutes',
			[
				'label' => __( 'Minutes', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Countdown Show Seconds
		$this->add_control(
			'wb_countdown_show_seconds',
			[
				'label' => __( 'Seconds', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'webbricks-addons' ),
				'label_off' => __( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section(); 
		
		// Countdown Expire Action
		$this->start_controls_section(
			'wb_countdown_expire_section',
			[
				'label' => __( 'Countdown Expire' , 'webbricks-addons' )
			]
		);

		// Countdown Expire Type
		$this->add_control(
			'wb_countdown_expire_show_type',
			[
				'label'			=> __('Expire Type', 'webbricks-addons'),
				'label_block'	=> false,
				'type'			=> Controls_Manager::SELECT,
                'description'   => __('Select whether you want to set a message or a redirect link after expire countdown', 'webbricks-addons'),
				'options'		=> [
					'message'		=> __('Message', 'webbricks-addons'),
					'redirect_link'		=> __('Redirect to Link', 'webbricks-addons')
				],
				'default' => 'message'
			]
		);

		// Countdown Expire Message
		$this->add_control(
			'wb_countdown_expire_message',
			[
				'label'			=> __('Expire Message', 'webbricks-addons'),
				'type'			=> Controls_Manager::TEXTAREA,
				'default'		=> __('Sorry you are late!','webbricks'),
				'condition'		=> [
					'wb_countdown_expire_show_type' => 'message'
				]
			]
		);

		// Countdown Redirect Link
		$this->add_control(
			'wb_countdown_expire_redirect_link',
			[
				'label'			=> __('Redirect On', 'webbricks-addons'),
				'type'			=> Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition'		=> [
					'wb_countdown_expire_show_type' => 'redirect_link'
				],
			]
		);
		
		$this->end_controls_section();
		
		// Countdown Label Text
		$this->start_controls_section(
			'wb_countdown_label_text_section',
			[
				'label' => __( 'Change Labels Text' , 'webbricks-addons' )
			]
		);

		// Countdowon Change Label Text
        $this->add_control(
			'wb_countdown_change_labels',
			[
				'label' => __( 'Change Labels', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'webbricks-addons' ),
				'label_off' => __( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		// Countdowon Change Label Days
		$this->add_control(
			'wb_countdown_label_days',
			[
				'label' => __( 'Days', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Days', 'webbricks-addons' ),
				'placeholder' => __( 'Days', 'webbricks-addons' ),
				'condition' => [
					'wb_countdown_change_labels' => 'yes',
					'wb_countdown_show_days' => 'yes',
				],
			]
		);

		// Countdowon Change Label Hours
		$this->add_control(
			'wb_countdown_label_hours',
			[
				'label' => __( 'Hours', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Hours', 'webbricks-addons' ),
				'placeholder' => __( 'Hours', 'webbricks-addons' ),
				'condition' => [
					'wb_countdown_change_labels' => 'yes',
					'wb_countdown_show_hours' => 'yes',
				],
			]
		);

		// Countdowon Change Label Minutes
		$this->add_control(
			'wb_countdown_label_minuts',
			[
				'label' => __( 'Minutes', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Minutes', 'webbricks-addons' ),
				'placeholder' => __( 'Minutes', 'webbricks-addons' ),
				'condition' => [
					'wb_countdown_change_labels' => 'yes',
					'wb_countdown_show_minutes' => 'yes',
				],
			]
		);

		// Countdowon Change Label Seconds
		$this->add_control(
			'wb_countdown_label_seconds',
			[
				'label' => __( 'Seconds', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Seconds', 'webbricks-addons' ),
				'placeholder' => __( 'Seconds', 'webbricks-addons' ),
				'condition' => [
					'wb_countdown_change_labels' => 'yes',
					'wb_countdown_show_seconds' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_countdown_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wb_countdown_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// Countdowon Layout Style
		$this->start_controls_section(   
			'wb_countdown_style_section',
			[
				'label' => __( 'Layout', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Box Spacing
		$this->add_responsive_control(
			'wb_countdown_box_spacing',
			[
				'label' => __( 'Box Gap', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .single-countdown:not(:first-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'body:not(.rtl) {{WRAPPER}} .single-countdown:not(:last-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
					'body.rtl {{WRAPPER}} .single-countdown:not(:first-of-type)' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 );',
					'body.rtl {{WRAPPER}} .single-countdown:not(:last-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
				],
			]
		);

		// Countdown Box Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_countdown_box_border',
	            'selector' => '{{WRAPPER}} .single-countdown',
			]
		);

		// Countdown Box Radius
		$this->add_control(
			'wb_countdown_box_border_radius',
			[
				'label' => __( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .single-countdown' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		// Countdown Digit
		$this->start_controls_section(
			'wb_countdown_digits_style_section',
			[
				'label' => __( 'Digits', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Digit Color
		$this->add_control(
			'wb_countdown_digits_color',
			[
				'label' => __( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-countdown-digits' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Countdown Digit Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_countdown_digits_typography',
				'selector' => '{{WRAPPER}} .single-countdown-digits',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);
		$this->end_controls_section();   
		
		// Countdown Label
		$this->start_controls_section(
			'wb_countdown_label_style_section',
			[
				'label' => __( 'Labels', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Label Color
		$this->add_control(
			'wb_countdown_label_color',
			[
				'label' => __( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-countdown-label' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Countdown Label Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_countdown_label_typography',
				'selector' => '{{WRAPPER}} .single-countdown-label',				
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]		
			]
		);

		// Countdown Label Border
		$this->add_control(
			'wb_countdown_label_border_color',
			[
				'label' => __( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-countdown-label' => 'border-color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();   
		
		// Countdown Message
		$this->start_controls_section(
			'wb_countdown_finish_message_style_section',
			[
				'label' => __( 'Message', 'webbricks-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Countdown Message Color
		$this->add_control(
			'wb_countdown_message_color',
			[
				'label' => __( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finished-message' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Countdown Message Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_countdown_message_typography',
				'selector' => '{{WRAPPER}} .finished-message',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
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
    $settings = $this->get_settings();
    $day = $settings['wb_countdown_show_days'];
    $hours = $settings['wb_countdown_show_hours'];
    $minute = $settings['wb_countdown_show_minutes'];
    $seconds = $settings['wb_countdown_show_seconds'];
    $show_type = $settings['wb_countdown_expire_show_type'];
    ?>
    <div class="countdown-timer-widget">
        <div id="countdown-timer-<?php echo esc_attr($this->get_id()); ?>" class="countdown-timer-init"></div>
        <div id="finished-message-<?php echo esc_attr($this->get_id()); ?>" class="finished-message"></div>
    </div>
    <script>
        jQuery(function ($) {
            $('#countdown-timer-<?php echo esc_attr($this->get_id()); ?>').countdowntimer({
                dateAndTime: "<?php echo esc_js(preg_replace('/-/', '/', $settings['wb_countdown_due_date'])); ?>",
                regexpMatchFormat: "([0-9]{1,3}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
                regexpReplaceWith: "<?php
                if ($day == "yes") {
                    ?><div class='single-countdown'><span class='single-countdown-digits'>$1</span><span class='single-countdown-label'><?php
                        echo esc_html($settings['wb_countdown_label_days']); ?></span></div><?php
                }
                if ($hours == "yes") {
                    ?><div class='single-countdown'><span class='single-countdown-digits'>$2</span><span class='single-countdown-label'><?php
                        echo esc_html($settings['wb_countdown_label_hours']); ?></span></div><?php
                }
                if ($minute == "yes") {
                    ?><div class='single-countdown'><span class='single-countdown-digits'>$3</span><span class='single-countdown-label'><?php
                        echo esc_html($settings['wb_countdown_label_minuts']); ?></span></div><?php
                }
                if ($seconds == "yes") {
                    ?><div class='single-countdown'><span class='single-countdown-digits'>$4</span><span class='single-countdown-label'><?php
                        echo esc_html($settings['wb_countdown_label_seconds']); ?></span></div><?php
                }
                ?>",
                <?php if ($show_type === "redirect_link"): ?>
                timeUp: function () {
                    <?php
                    $target = $settings['wb_countdown_expire_redirect_link']['is_external'] ? '_blank' : '_self';
                    if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode()): ?>
                    $("#finished-message-<?php echo esc_attr($this->get_id()); ?>").html("<?php echo esc_js(__('You cannot redirect URLs from Elementor Editor.', 'your-text-domain')); ?>");
                    <?php else: ?>
                    window.open("<?php echo esc_url($settings['wb_countdown_expire_redirect_link']['url']); ?>", "<?php echo esc_js($target); ?>");
                    <?php endif; ?>
                },
                <?php endif; ?>
                <?php if ($show_type === "message"): ?>
                timeUp: function () {
                    $("#finished-message-<?php echo esc_attr($this->get_id()); ?>").html("<span><?php echo esc_html($settings['wb_countdown_expire_message']); ?></span>");
                },
                <?php endif; ?>
            });
        });
    </script>
    <?php
}
}