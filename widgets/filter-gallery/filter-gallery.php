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

class Filter_Gallery extends Widget_Base {

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
		return 'webbricks-filter-gallery-widget';
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
		return esc_html__( 'Filter Gallery', 'webbricks-addons' );
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
		return 'wb-icon eicon-gallery-masonry';
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
		return [ 'filter', 'gallery', 'wb'];
	}

	public function get_grid_classes($settings, $columns_field = 'wb_filter_gallery_column') {        
		$grid_classes = 'wb-grid-desktop-';
		$grid_classes .= $settings[$columns_field];
		// $grid_classes .= ' wb-grid-tablet-';
		// $grid_classes .= $settings[$columns_field . '_tablet'];
	
		// // Check if mobile size is set, otherwise use a default value
		// if (isset($settings[$columns_field . '_mobile'])) {
		// 	$grid_classes .= ' wb-grid-mobile-';
		// 	$grid_classes .= $settings[$columns_field . '_mobile'];
		// } else {
		// 	// Set default size for mobile to 12 columns
		// 	$grid_classes .= ' wb-grid-mobile-12';
		// }
	
		return apply_filters('wb_grid_classes', $grid_classes, $settings, $columns_field);
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
			'wb_filter_gallery_cat_contents',
			[
				'label' => esc_html__('Gallery Controls', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Filter Gallery Show Button?
		$this->add_control(
			'wb_filter_gallery_menu_show',
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
		 
		// Filter Gallery Category
		$repeater = new Repeater();
 
		$repeater->add_control(
			'wb_filter_gallery_cat_name',
			[
				'label' => esc_html__( 'Category Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Landscape', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->add_control(
			'wb_filter_gallery_cats',
			[
				'label' => esc_html__( 'Category Lists', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Landscape', 'webbricks-addons'),
					],					
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Cars', 'webbricks-addons'),
					],					
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Mountain', 'webbricks-addons'),
					],
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Sea Beach', 'webbricks-addons'),
					],
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Parks', 'webbricks-addons'),
					],
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Road Trips', 'webbricks-addons'),
					],
					[
						'wb_filter_gallery_cat_name' => esc_html__( 'Stars', 'webbricks-addons'),
					]
				],
				'title_field' => '{{{ wb_filter_gallery_cat_name }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
	    // start of the Content tab section
		$this->start_controls_section(
			'services_content',
			[
				'label' => esc_html__('Filter Gallery', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);
		 
		// Filter Gallerys
		$repeater = new Repeater();
 
		$repeater->add_control(
			'wb_filter_gallery_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-1.webp',
				],
				'separator' => 'before',
			]
		);
 
		$repeater->add_control(
			'wb_filter_gallery_cat',
			[
				'label' => esc_html__( 'Category', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'label_block' => true,
				'description' => __('Use the gallery control name from Gallery Controls. Separate multiple items with comma (e.g. <strong>Gallery Item, Gallery Item 2</strong>)', 'webbricks-addons'),
			]
		);

		$this->add_control(
			'wb_filter_gallerys',
			[
				'label' => esc_html__( 'Filter Gallerys List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_filter_gallery_image' => [
							'url' =>'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-1.webp',
						],
						'wb_filter_gallery_cat' => 'landscape, stars, parks',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-2.webp',
						],
						'wb_filter_gallery_cat' => 'cars',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-3.webp',
						],
						'wb_filter_gallery_cat' => 'mountain, parks',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-4.webp',
						],
						'wb_filter_gallery_cat' => 'seabeach, landscape, cars',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-5.webp',
						],
						'wb_filter_gallery_cat' => 'parks',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-6.webp',
						],
						'wb_filter_gallery_cat' => 'roadtrips, landscape, mountain',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-7.webp',
						],
						'wb_filter_gallery_cat' => 'stars',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-8.webp',
						],
						'wb_filter_gallery_cat' => 'stars, cars, parks',
					],
					[
						'wb_filter_gallery_image' => [
							'url' => 'https://getwebbricks.com/wp-content/uploads/2024/01/Gallery-9.webp',
						],
						'wb_filter_gallery_cat' => 'roadtrips, cars, parks',
					]
				],
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wb_filter_gallery_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Affiliate Products Column
		$this->add_control( 
            'wb_filter_gallery_column', 
            [
                'label'              => esc_html__( 'Columns', 'webbricks-addons' ),
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
		$this->end_controls_section();

		// Filter Gallery Controls Style
		$this->start_controls_section(
			'wb_filter_gallery_controls_style',
			[
				'label' => esc_html__( 'Controls', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// Filter Gallery Title Color
		$this->add_control(
			'wb_filter_gallery_controls_title_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .filter-gallery-menu button' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Active Color
		$this->add_control(
			'wb_filter_gallery_controls_title_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .filter-gallery-menu button.active' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Active Border Color
		$this->add_control(
			'wb_filter_gallery_controls_title_active_border',
			[
				'label' => esc_html__( 'Active Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .filter-gallery-menu button.active::before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Border Color
		$this->add_control(
			'wb_filter_gallery_controls_title_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .filter-gallery-menu' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Filter Gallery Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_filter_gallery_controls_typography',
				'selector' => '{{WRAPPER}} .filter-gallery-menu button',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Filter Gallery Controls Images
		$this->start_controls_section(
			'wb_filter_gallery_controls_images',
			[
				'label' => esc_html__( 'Images', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// Filter Gallery Image Width
		$this->add_control(
			'wb_filter_gallery_image_width',
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
					'{{WRAPPER}} .single-filter-gallery img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Filter Gallery Image Height
		$this->add_control(
			'wb_filter_gallery_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-filter-gallery img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Filter Gallery Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_filter_gallery_image_border',
				'selector' => '{{WRAPPER}} .single-filter-gallery img',
			]
		);	

		// Filter Gallery Image Round
		$this->add_control(
			'wb_filter_gallery_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .single-filter-gallery img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$settings = $this->get_settings_for_display();
		$wb_filter_gallery_cats = $settings['wb_filter_gallery_cats'];
		$wb_filter_gallerys = $settings['wb_filter_gallerys'];
		$wb_filter_gallery_menu_show = $settings['wb_filter_gallery_menu_show'];
		?>
		
		<?php if ($wb_filter_gallery_menu_show == 'yes') : ?>
			<!-- Filter Gallery Start Here -->
			<div class="filter-gallery">
				<div class="grid grid-active">
					<div class="col-12">
						<div class="filter-gallery-menu">
							<button class="active" data-filter="*"><?php esc_html_e('ALL', 'webbricks-addons'); ?></button>
							<?php
							$unique_categories = [];
							if ($wb_filter_gallery_cats) {
								foreach ($wb_filter_gallery_cats as $cat) {
									$cat_title = $cat['wb_filter_gallery_cat_name'];
									$processed_cat = strtolower(str_replace(' ', '', $cat_title));
									
									// Check if category has been added to the menu
									if (!in_array($processed_cat, $unique_categories)) {
										$unique_categories[] = $processed_cat;
										?>
										<button data-filter=".<?php echo esc_attr($processed_cat); ?>" class="">
											<?php echo esc_attr(ucwords($cat_title)); ?>
										</button>
										<?php
									}
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	
		<div class="wb-grid-row grid-active">
			<?php
			if ($wb_filter_gallerys) {
				foreach ($wb_filter_gallerys as $image) {
					$filter_image = $image['wb_filter_gallery_image']['url'];
					$categories = explode(',', $image['wb_filter_gallery_cat']);
					?>
					<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?>  wb-grid-tablet-6 wb-grid-mobile-12 grid-item
					<?php
					foreach ($categories as $cat) {
						$processed_cat = strtolower(str_replace([' ', ',', ' '], '', $cat));
						echo esc_attr($processed_cat) . ' ';
					}
					?>">
						<div class=" single-filter-gallery">
							<img src="<?php echo esc_url($filter_image); ?>">
							<div class="image-overlay">
								<a href="<?php echo esc_url($filter_image); ?>" class="elementor-lightbox">  
									<img src="<?php echo esc_url( WBEA_ASSETS_URL . 'img/icon-zoom.svg' ); ?>" alt="Image Description">
								</a>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
		<!-- Filter Gallery End Here -->
	<?php
	}	
}
	