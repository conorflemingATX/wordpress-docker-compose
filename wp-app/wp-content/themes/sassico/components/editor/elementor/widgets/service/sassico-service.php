<?php

namespace Elementor;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;
if ( ! defined( 'ABSPATH' ) ) exit;


class Sassico_service_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-service';
    }


    public function get_title() {
        return esc_html__( 'SASSICO Service', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-settings';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'sassico_service_query',
            [
                'label' => esc_html__( 'Query', 'sassico' ),
            ]
        );

        $this->add_control(
            'sassico_service_style',
            [
                'label' => esc_html__('Choose Style', 'sassico'),
                'type' => ElementsKit_Controls_Manager::IMAGECHOOSE,
                'default' => 'sassico_service_border_box',
                'options' => [
                    'sassico_service_border_box' => [
                        'title' => esc_html__( 'Border Box', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/service/service-img-1.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/service/service-img-1.png',
                        'width' => '100%',
                    ],
                    'sassico_service_shadow_box' => [
                        'title' => esc_html__( 'Shadow Icon Box', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/service/service-img-2.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/service/service-img-2.png',
                        'width' => '100%',
                    ],
                    'sassico_service_with_fat_shadow' => [
                        'title' => esc_html__( 'Fat Shadow Style', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/service/service-img-3.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/service/service-img-3.png',
                        'width' => '100%',
                    ],
                    'sassico_service_hr_style' => [
                        'title' => esc_html__( 'HR Services', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/service/service-img-4.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/service/service-img-4.png',
                        'width' => '100%',
                    ],
                ],
            ]
        );

        $this->add_control(
			'xs_slider_loop_control',
			[
				'label' => __( 'Loop', 'sassico' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'sassico' ),
				'label_off' => __( 'Hide', 'sassico' ),
				'return_value' => 'true',
                'default' => 'false',
                'condition' => [
                    'sassico_service_style' => 'sassico_service_with_fat_shadow'
                ]
			]
		);

        $this->add_control(
            'sassico_service_posts_num',
            [
                'label'     => esc_html__( 'Posts Count', 'sassico' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 100,
                'default'   => 6,
            ]
        );

        $this->add_control('sassico_service_cat',
            [
                'label'     => esc_html__( 'Category', 'sassico' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => true,
                'default'   => '',
                'options'   => $this->getCategories(),

            ]
        );

        $this->add_control(
            'sassico_service_offset',
            [
                'label'     => esc_html__( 'Offset', 'sassico' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'max'       => 20,
                'default'   => 0,
            ]
        );

        $this->add_control(
            'sassico_service_posts_order_by',
            [
                'label'   => esc_html__( 'Order by', 'sassico' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'date'          => esc_html__( 'Date', 'sassico' ),
                    'title'         => esc_html__( 'Title', 'sassico' ),
                    'author'        => esc_html__( 'Author', 'sassico' ),
                    'modified'      => esc_html__( 'Modified', 'sassico' ),
                    'comment_count' => esc_html__( 'Comments', 'sassico' ),
                    'menu_order' => esc_html__( 'menu_order', 'sassico' ),
                ],
                'default' => 'date',
            ]
        );

        $this->add_control(
            'sassico_service_posts_sort',
            [
                'label'   => esc_html__( 'Order', 'sassico' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'sassico' ),
                    'DESC' => esc_html__( 'DESC', 'sassico' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();
        

        // sassico_service_border_box
        $this->start_controls_section(
			'sassico_service_border_box_posts_style_tab',
			[
				'label' => __( 'Content', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_service_border_box_posts_text_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-title' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_text_color_2',
			[
				'label' => __( 'Color on hover', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-hover-content-inner .sassico-service-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-hr-style:hover .sassico-service-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'sassico_service_style!' => 'sassico_service_with_fat_shadow'
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_service_border_box_posts_text_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-service-title',
			]
		);

        $this->add_control(
			'sassico_service_posts_border_box__title',
			[
				'label' => __( 'Description', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_description_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-hover-content-inner p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-content-with-fat-shadow > p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-hr-style > p' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_description_color_featured',
			[
				'label' => __( 'Featured / Hover Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-slide-active .sassico-service-content-with-fat-shadow > p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-featured .sassico-service-hr-style > p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-hr-style:hover > p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'sassico_service_style' => ['sassico_service_with_fat_shadow', 'sassico_service_hr_style']
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_service_border_box_posts_description_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-service-hover-content-inner p, {{WRAPPER}} .sassico-service-content-with-fat-shadow > p, {{WRAPPER}} .sassico-service-hr-style > p',
			]
        );

        $this->add_control(
			'sassico_service_posts_border_box__button',
			[
				'label' => __( 'Button', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
			[
            'name' => 'sassico_service__box_posts_button_typography',
            'label' => __( 'Typography', 'sassico' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sassico-service-footer .btn.btn-link',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'sassico_service_button_style_tab',
			[
				'label' => __( 'Button', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sassico_service_style' => 'sassico_service_hr_style'
                ]
			]
		);

		$this->add_responsive_control(
			'sassico_service_border_box_posts_button_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-view-more-btn' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_button_icon_color',
			[
				'label' => __( 'Icon Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-view-more-btn > i' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_button_border_color',
			[
				'label' => __( 'Border Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-view-more-btn > i' => 'border-color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
			[
            'name' => 'sassico_service_border_box_posts_button_typography',
            'label' => __( 'Typography', 'sassico' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sassico-view-more-btn',
            ]
        );

        $this->add_responsive_control(
            'sassico_service_border_box_posts_button_icon_color_hover',
            [
                'label' => __( 'Color Hover / Featured', 'sassico' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sassico-service-hr-style:hover .sassico-view-more-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sassico-service-featured .sassico-service-hr-style .sassico-view-more-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'sassico_service_border_box_posts_button_border_color_hover',
            [
                'label' => __( 'Border Color Hover / Featured', 'sassico' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sassico-service-hr-style:hover .sassico-view-more-btn > i' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .sassico-service-featured .sassico-service-hr-style .sassico-view-more-btn > i' => 'border-color: {{VALUE}}',
                ],
            ]
        );

		$this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_service_border_box_posts_container_style_tab',
			[
				'label' => __( 'Container', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sassico_service_style' => 'sassico_service_border_box'
                ]
			]
		);

		$this->add_responsive_control(
			'sassico_service_border_box_posts_border_color',
			[
				'label' => __( 'Border color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-group > .sassico-service-border' => 'border-color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_overlay_color',
			[
				'label' => __( 'Overlay background color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-hover-content-outer::before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_service__box_posts_style_tab',
			[
				'label' => __( 'Container', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sassico_service_style!' => ['sassico_service_border_box', 'sassico_service_with_fat_shadow']
                ]
			]
		);
        
        $this->add_responsive_control(
            'sassico_service_border_box_posts_bg_color',
            [
                'label' => __( 'Background color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sassico-service-content-with-icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .sassico-service-hr-style' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
			'sassico_service_border_box_posts_bg_color_featured',
			[
				'label' => __( 'Featured background color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-service-content-with-icon.sassico-service-featured' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .sassico-service-featured .sassico-service-hr-style' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'sassico_service_style' => ['sassico_service_shadow_box', 'sassico_service_hr_style']
                ]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'sassico' ),
                'selector' => '{{WRAPPER}} .sassico-service-featured .sassico-service-hr-style, {{WRAPPER}} .sassico-service-hr-style:hover',
                'condition' => [
                    'sassico_service_style' => ['sassico_service_hr_style']
                ]
			]
		);

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);

        
        $query = array(
            'post_type'      => 'sassico-service',
            'post_status'    => 'publish',
            'posts_per_page' => $sassico_service_posts_num,
            'offset'         => $sassico_service_offset,
            'order'          => $sassico_service_posts_sort,
            'orderby'        => $sassico_service_posts_order_by,
        );

        if($sassico_service_cat != '' && !empty($sassico_service_cat)){
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'sassico-service',
                    'terms' => $sassico_service_cat,
                    'field' => 'id',
                )
            );
        }


        $service = new \WP_Query($query);

         //  Single page link the_permalink();
 
        ?>
        <?php 
            $sassico_service_class = ($sassico_service_style == 'sassico_service_border_box') ? 'sassico-service-group no-gutters' : null ;
            if($service->have_posts()) {
        ?>
            <div class="container">
                <div class="row <?php echo esc_attr($sassico_service_class); ?>">
                    
                    <?php if ($sassico_service_style == 'sassico_service_with_fat_shadow') { ?>
                    <div class="col-lg-12">
                        <div class="swiper-container sassico-service-slider" data-loop="<?php echo esc_attr($xs_slider_loop_control); ?>">
                            <div class="swiper-wrapper">
                    <?php }; ?>

                    <?php while ($service->have_posts()){ $service->the_post(); 
                    $service_bg_image_holder = '';
                    if (defined( 'FW' )) {
                        $service_bg_image_holder = fw_get_db_post_option(get_the_ID(), 'sassico_service_hover_image_picker');
                    }
                    $service_bg_image = '';
                    if($service_bg_image_holder) {
                        $service_bg_image = $service_bg_image_holder['url'];
                    }
                        include SASSICO_SHORTCODE_DIR_WIDGETS.'/service/style/'.$sassico_service_style.'.php';
                    }; ?>

                    <?php if ($sassico_service_style == 'sassico_service_with_fat_shadow') { ?>
                            </div>
                            <div class="xs-arrows xs-arrows-next"></div>
                            <div class="xs-arrows xs-arrows-prev"></div>
                        </div>
                    </div>
                    <?php }; ?>

                </div>
            </div>
            <?php }; ?>
        <?php

    }

    protected function _content_template() { }

    public function getCategories(){
        $terms = get_terms( array(
            'taxonomy'    => 'sassico-service',
            'hide_empty'  => false,
            'posts_per_page' => -1,
        ) );


        $cat_list = [];
        if(is_array($terms) && '' != $terms) :
            foreach($terms as $post) {

                $cat_list[$post->term_id]  = [$post->name];
            }
        endif;
        return $cat_list;
    }
}
