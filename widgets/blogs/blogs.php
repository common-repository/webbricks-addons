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

class Blogs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-blogs-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blogs', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the blog widget belongs to.
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
		return [ 'wb', 'blog', 'post' ];
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
	       'wb_blog_contents',
		    [
		        'label' => esc_html__('Query', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Blog Number
		$this->add_control(
			'wb_blog_number',
			[
				'label' 		=> __('Number of Posts', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Blog Column
		$this->add_control( 
            'wb_column_per_row', 
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

		// Blog Order
		$this->add_control(
			'wb_blog_order',
			[
				'label' 		=> __('Order', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'webbricks-addons'),
					'DESC' 		=> __('DESCENDING', 'webbricks-addons'),
					'ASC' 		=> __('ASCENDING', 'webbricks-addons'),
				],
			]
		);

		// Blog Orderby
		$this->add_control(
			'wb_blog_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'webbricks-addons'),
					'date' 			=> __('Date', 'webbricks-addons'),
					'title' 		=> __('Title', 'webbricks-addons'),
					'name' 			=> __('Name', 'webbricks-addons'),
					'modified' 		=> __('Modified', 'webbricks-addons'),
					'author' 		=> __('Author', 'webbricks-addons'),
					'rand' 			=> __('Random', 'webbricks-addons'),
					'ID' 			=> __('ID', 'webbricks-addons'),
					'comment_count' => __('Comment Count', 'webbricks-addons'),
					'menu_order' 	=> __('Menu Order', 'webbricks-addons'),
				],
			]
		);

		$args = array(
			'hide_empty' => false,
		);
		
		$categories = get_categories($args);

		if($categories) {
			foreach ( $categories as $key => $category ) {
				$options[$category->term_id] = $category->name;
			}
		}

		// Blog Categories
		$this->add_control(
			'wb_blog_include_categories',
			[
				'label' => __( 'Category', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'wb_blog_option_section',
			 [
				'label' => esc_html__('Meta Info', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'wb_blog_cat_visibility',
			[
				'label' 		=> __('Show Category', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'wb_blog_date_visibility',
			[
				'label' 		=> __('Show Date', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'wb_blog_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_blog_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_blog_pro_message_notice', 
			[
            'type'      => Controls_Manager::RAW_HTML,
            'raw'       => '<div style="text-align:center;line-height:1.6;"><p style="margin-bottom:10px">Web Bricks Premium is coming soon with more widgets, features, and customization options.</p></div>'] 
		);
		$this->end_controls_section();
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'wb_blog_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'wb_blog_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'wb_blog_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Meta Color
		$this->add_control(
			'wb_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-meta, .blog-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blogmeta_typography',
				'selector' => '{{WRAPPER}} .blog-meta, .blog-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'wb_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-title .blog-post-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_title_typography',
				'selector' => '{{WRAPPER}} .blog-title .blog-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wp_blog_title_tag',
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
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_blog_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wb_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'wb_blog_image_width',
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
					'{{WRAPPER}} .blog-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'wb_blog_image_image_height',
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
					'{{WRAPPER}} .blog-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'wb_blog_image_display',
			[
				'label' 		=> __('Display Size', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'webbricks-addons'),
					'contain' 		=> __('Contain', 'webbricks-addons'),
					'cover' 		=> __('Cover', 'webbricks-addons'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'wb_blog_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wb_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wb_blog_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Background Color
		$this->add_control(
			'wb_blog_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wb_blog_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Border Radius
		$this->add_control(
			'wb_blog_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wb_blog_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wb_blog_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Hover Background Color
		$this->add_control(
			'wb_blog_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Blog Button Hover Border Color
		$this->add_control(
			'wb_blog_btn_bg_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover' => 'border-color: {{VALUE}}',
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
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$wp_blog_title_tag = $settings['wp_blog_title_tag'];
		$wb_blog_number = $settings['wb_blog_number'];
		$wb_blog_order = $settings['wb_blog_order'];
		$wb_blog_orderby = $settings['wb_blog_orderby'];
		$wb_blog_include_categories = $settings['wb_blog_include_categories'];
		$wb_blog_cat_visibility = $settings['wb_blog_cat_visibility'];
		$wb_blog_date_visibility = $settings['wb_blog_date_visibility'];
		$wb_blog_excerpt_visibility = $settings['wb_blog_excerpt_visibility'];
		$wb_blog_image_display = $settings['wb_blog_image_display'];

		?>
			<style>
				.blog-img{
					background-size: <?php echo esc_attr($wb_blog_image_display); ?>
				}
			</style>
		<?php 

		$args = array(
			'posts_per_page' => $wb_blog_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $wb_blog_order,
			'orderby' => $wb_blog_orderby,
			'cat' => $wb_blog_include_categories,
			'ignore_sticky_posts' => 1,
		);
		$query = new \WP_Query($args);
		
        ?>
		<!-- Blog Start Here -->
		<section class="blog">
			<div class="wb-grid-row">
				<?php 
					if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); 					
				?>
				<div class="<?php echo esc_attr($this->get_grid_classes( $settings )); ?> wb-grid-tablet-6 wb-grid-mobile-12">
					<div class="single-blog">
						<div class="blog-content">
							<div class="blog-meta">
								<?php
									if($wb_blog_cat_visibility == 'yes') {
										the_category(', ');
									}
									if($wb_blog_date_visibility == 'yes') {
										?>
											<a class="blog-date" href="<?php echo esc_url(get_the_permalink());?>"><?php echo get_the_date('j M, y');?></a>
										<?php 
									}
								?>
							</div>
							<div class="blog-title">
								<<?php echo esc_attr($wp_blog_title_tag);?> class="blog-post-title"><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></<?php echo esc_attr($wp_blog_title_tag);?>>
							</div>
							<?php
								if($wb_blog_excerpt_visibility == 'yes') {
									?>
										<div class="blog-excerpt">
											<?php echo esc_attr(substr(get_the_excerpt(), 0, 95));?>
										</div>
									<?php 
								}
							?>							
						</div>
						<div class="blog-img" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url());?>');">
							<a href="<?php echo esc_url(get_the_permalink());?>" class="icon-border">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.34245 16.4678L5.33331 16.3321C5.33331 15.8258 5.70951 15.4074 6.19762 15.3413L6.33331 15.3321L23.2613 15.3333L18.9664 11.0407C18.6113 10.6858 18.5788 10.1302 18.869 9.73859L18.9658 9.62646C19.3206 9.27126 19.8762 9.23872 20.2678 9.52912L20.3801 9.62579L26.3801 15.6209C26.7352 15.9757 26.7677 16.5313 26.4774 16.9229L26.3806 17.035L20.3806 23.0401C19.9902 23.4307 19.3572 23.431 18.9664 23.0407C18.6113 22.6858 18.5788 22.1302 18.869 21.7386L18.9658 21.6264L23.256 17.3333L6.33331 17.3321C5.82705 17.3321 5.40866 16.9559 5.34245 16.4678Z" fill="#111"/></svg>
							</a>
						</div>
					</div>
				</div>
				<?php
					endwhile;
					endif; 
				?>			
			</div>
		</section>			
		<!-- Blog End Here -->
       <?php
	}
}