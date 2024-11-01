<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Products_Category extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-products-category-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve affiliate products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Prodcuts Category', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve affiliate products widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-products';
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
		return [ 'products', 'category', 'wb'];
	}

	public function get_grid_classes( $settings, $columns_field = 'wb_column_per_row' ) {
        
        $grid_classes = 'wb-grid-desktop-';
        $grid_classes .= $settings[$columns_field];
        // $grid_classes .= ' wb-grid-tablet-';
        // $grid_classes .= $settings[$columns_field . '_tablet'];
        // $grid_classes .= ' wb-grid-mobile-';
        // $grid_classes .= $settings[$columns_field . '_mobile'];

        return apply_filters( 'wb_grid_classes', $grid_classes, $settings, $columns_field );
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
	       'wb_product_categories_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Product Categories
		$this->add_control(
			'wb_product_categories',
			[
                'label' => esc_html__('Select Category', 'webbricks-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_all_product_categories(),
                'label_block' => true,
                'multiple' => true, // Set to true for multiple selections
            ]
		);

		// Show Product Category Count
		$this->add_control(
			'wb_product_categories_count',
			[
				'label' => esc_html__( 'Show Products Count', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Show Product Category Button
		$this->add_control(
			'wb_product_categories_btn_show',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
            'wb_column_per_row', 
            [
                'label'              => esc_html__( 'Columns per row', 'webbricks-addons' ),
                'type'               => Controls_Manager::SELECT,
                'default'            => '4',
                'tablet_default'     => '2',
                'mobile_default'     => '1',
                'options'            => [
                    '12' => '1',
                    '6' => '2',
                    '4' => '3',
                    '3' => '4',
                    '2' => '6',
                ],
                'frontend_available' => true,
            ] 
        );

		// Product Category Alignment
		$this->add_control(
			'wb_product_categories_alignment',
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .product-category-content' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_products_category_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_products_category_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_product_categories_layouts_section',
			[
				'label' => esc_html__( 'Layouts', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Border Radius
		$this->add_control(
			'wb_product_categories_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Product Category Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_product_categories_border',
				'selector' => '{{WRAPPER}} .product-category',
			]
		);	

		// Product Category Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wb_product_categories_bg',
				'types' => [ 'gradient'],
				'selector' => '{{WRAPPER}} .product-category::before',
			]
		);	

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'wb_product_category_image',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Product Category Image Width
		$this->add_control(
			'wb_product_image_width',
			[
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-category img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Product Category Image Height
		$this->add_control(
			'wb_product_image_height',
			[
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-category img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_product_categories_heading_section',
			[
				'label' => esc_html__( 'Category Name', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Product Category Sub Heading Color
		$this->add_control(
			'wb_product_categories_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .product-category-content .product-category-title a' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_product_categories_heading_typography',
				'selector' => '{{WRAPPER}} .product-category-content .product-category-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_product_carousel_title_tag',
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

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_title_section',
			[
				'label' => esc_html__( 'Count', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Category Title Color
		$this->add_control(
			'wb_product_categories_count_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .product-category-content span' => 'color: {{VALUE}}',
				],
			]
		);

		// Product Category Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_product_categories_count_typography',
				'selector' => '{{WRAPPER}} .product-category-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_product_categories_btn_section',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_product_categories_btn_style_tab'
		);

		// Product Category Button Normal Tab
		$this->start_controls_tab(
			'wb_product_categories_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Product Category Button Color
		$this->add_control(
			'wb_product_categories_btn_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon svg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Border Color
		$this->add_control(
			'wb_product_categories_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		// Product Category Button Hover Tab
		$this->start_controls_tab(
			'wb_product_categories_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Product Category Button Hover Color
		$this->add_control(
			'wb_product_categories_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon svg:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover Border Color
		$this->add_control(
			'wb_product_categories_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Product Category Button Hover BG Color
		$this->add_control(
			'wb_product_categories_btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category-icon:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
	 * 
	 */	 

	 /**
     * Get all product categories for the select field options
     */
    private function get_all_product_categories() {
        $product_categories = get_terms('product_cat');
        $options = [];

        if ($product_categories && !is_wp_error($product_categories)) {
            foreach ($product_categories as $category) {
                $options[$category->term_id] = $category->name;
            }
        }
        return $options;
    }

	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$wb_product_categories = $settings['wb_product_categories'];
		$wb_product_categories_count = $settings['wb_product_categories_count'];
		$wb_product_categories_btn_show = $settings['wb_product_categories_btn_show'];
		$wb_product_carousel_title_tag = $settings['wb_product_carousel_title_tag'];
	?>

	<div class="wb-grid-row">
		<?php
		// $selected_category_ids
		$selected_category_ids = $wb_product_categories;
		// Loop through each selected category ID
			if($selected_category_ids) {
				foreach ($selected_category_ids as $selected_category_id) {
				// Get the category object by ID
				$category = get_term($selected_category_id, 'product_cat');
				// Check if the category object exists and is not an error
				if ($category && !is_wp_error($category)) {			
					// Display category image if available
					$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
					$image = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
						?>
						<div class="<?php echo esc_attr($this->get_grid_classes( $settings )); ?> wb-grid-tablet-6 wb-grid-mobile-12">
							<div class="product-category">
								<?php 
									if($image) {
										?>
											<img src="<?php echo esc_attr($image[0]);?>" alt="<?php echo esc_html($category->name);?>">	
									<?php
									} else {
										?>
											<svg class="fallback-svg" viewBox="0 0 370 300" preserveAspectRatio="none">
											<rect width="370" height="300" style="fill:#f2f2f2;"></rect>
										</svg>
									<?php 
									}
								?>
								<?php 
									if($wb_product_categories_btn_show === 'yes') {
										?>
										<div class="product-category-icon">
											<a href="<?php echo esc_url(get_term_link($category));?>">
												<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M9.33337 9.33329V6.66663C9.33337 4.45749 11.1242 2.66663 13.3334 2.66663C14.3579 2.66663 15.2923 3.05177 16 3.68516C16.7078 3.05176 17.6423 2.66663 18.6667 2.66663C20.8759 2.66663 22.6667 4.45749 22.6667 6.66663V9.33329H24.6667C25.7712 9.33329 26.6667 10.2287 26.6667 11.3333V24.6733C26.6667 27.2469 24.5803 29.3333 22.0067 29.3333H10.6667C7.72119 29.3333 5.33337 26.9454 5.33337 24V11.3333C5.33337 10.2287 6.2288 9.33329 7.33337 9.33329H9.33337ZM18.18 27.3333C17.6547 26.579 17.3467 25.6621 17.3467 24.6733V11.3333H7.33337V24C7.33337 25.8409 8.82576 27.3333 10.6667 27.3333H18.18ZM15.3334 9.33329V6.66663C15.3334 5.56205 14.4379 4.66663 13.3334 4.66663C12.2288 4.66663 11.3334 5.56205 11.3334 6.66663V9.33329H15.3334ZM17.3334 9.33329H20.6667V6.66663C20.6667 5.56205 19.7712 4.66663 18.6667 4.66663C18.0467 4.66663 17.4927 4.94871 17.1259 5.39153C17.2604 5.792 17.3334 6.2208 17.3334 6.66663V9.33329ZM19.3467 24.6733C19.3467 26.1424 20.5376 27.3333 22.0067 27.3333C23.4758 27.3333 24.6667 26.1424 24.6667 24.6733V11.3333H19.3467V24.6733Z" fill="currentColor"/>
												</svg> 
											</a>
										
								</div>
									
								<?php }
								?>
								<div class="product-category-content">
									<<?php echo esc_attr($wb_product_carousel_title_tag);?> class="product-category-title">
										<a href="<?php echo esc_url(get_term_link($category));?>"><?php echo esc_html($category->name);?></a>
									</<?php echo esc_attr($wb_product_carousel_title_tag);?>>
									<?php 
										if($wb_product_categories_count === 'yes') {
											?>
												<span><?php echo esc_html($category->count);?> <?php echo esc_html(' Products', 'webbricks-addons');?></span>
											<?php
										}
									?>
								</div>
							</div>
						</div>
						<?php 
					}
				}
			} else {
				echo esc_html('No Products Categories Found!', 'webbricks-addons');
			}
		?>
	</div>				
		<!-- Product Category Programme Here -->
       <?php
	}
}