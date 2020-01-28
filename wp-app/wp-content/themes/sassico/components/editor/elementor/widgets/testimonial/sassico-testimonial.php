<?php

namespace Elementor;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-testimonial';
    }


    public function get_title() {
        return esc_html__( 'SASSICO Testimonial', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_testimonial_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
            'sassico_testimonial_style',
            [
                'label' => esc_html__('Choose Style', 'sassico'),
                'type' => ElementsKit_Controls_Manager::IMAGECHOOSE,
                'default' => 'sassico_testimonial_style_one',
                'options' => [
                    'sassico_testimonial_style_one' => [
                        'title' => esc_html__( 'Style One', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-1.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-1.png',
                        'width' => '100%',
                    ],
                    'sassico_testimonial_style_two' => [
                        'title' => esc_html__( 'Style Two', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-2.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-2.png',
                        'width' => '100%',
                    ],
                    'sassico_testimonial_style_three' => [
                        'title' => esc_html__( 'Sync Slider', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-3.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-3.png',
                        'width' => '100%',
                    ],
                    'sassico_testimonial_style_four' => [
                        'title' => esc_html__( 'Slider With Client Logo', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-4.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/testimonial/testimonial-4.png',
                        'width' => '100%',
                    ],
                ],
            ]
        );
		$this->add_control(
            'sassico_testimonial_quote_image_style', [
                'label'       => esc_html__( 'Icon Type', 'sassico' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'none' => [
                        'title' => esc_html__( 'None', 'sassico' ),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon' => [
                        'title' => esc_html__( 'Icon', 'sassico' ),
                        'icon'  => 'fa fa-paint-brush',
                    ],
                    'image' => [
                        'title' => esc_html__( 'Image', 'sassico' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
				'default'       => 'image',
				'condition' => [
					'sassico_testimonial_style!' => 'sassico_testimonial_style_four'
				]
            ]
        );

        $this->add_control(
            'sassico_testimonial_quote_icon',
            [
                'label' => esc_html__( 'Icon', 'sassico' ),
                'type' => Controls_Manager::ICON,
                'default' => 'icon icon-review',
                'label_block' => true,
                'condition' => [
					'sassico_testimonial_quote_image_style' => 'icon',
					'sassico_testimonial_style!' => 'sassico_testimonial_style_four'
                ]
            ]
        );

        $this->add_control(
            'sassico_testimonial_quote_image',
            [
                'label' => esc_html__( 'Image', 'sassico' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
					'sassico_testimonial_quote_image_style' => 'image',
					'sassico_testimonial_style!' => 'sassico_testimonial_style_four'
                ]
            ]
		);
        
        $repeater = new Repeater();

		$repeater->add_control(
			'sassico_testimonial_client_image',
			[
				'label' => __( 'Client Image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$repeater->add_control(
			'sassico_testimonial_client_logo',
			[
				'label' => __( 'Client Logo', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$repeater->add_control(
            'sassico_testimonial_rating', [
				'label' => esc_html__('Testimonial Rating', 'sassico'),
				'type' => Controls_Manager::SELECT,
				'default' => '5',
				'options'   => [
					'5'     => esc_html__( '5', 'sassico' ),
					'4'     => esc_html__( '4', 'sassico' ),
					'3'     => esc_html__( '3', 'sassico' ),
					'2'     => esc_html__( '2', 'sassico' ),
					'1'     => esc_html__( '1', 'sassico' ),
				],
				'label_block' => true,
            ]
        );

		$repeater->add_control(
            'sassico_testimonial_review', [
				'label' => esc_html__('Testimonial Review', 'sassico'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Review Text', 'sassico'),
				'dynamic' => [
					'active' => true,
				],
            ]
        );
        $repeater->add_control(
            'sassico_testimonial_client_name', [
                'label' => esc_html__('Client Name', 'sassico'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
            ]
        );
        $repeater->add_control(
            'sassico_testimonial_designation', [
                'label' => esc_html__('Designation', 'sassico'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Designation', 'sassico'),
				'dynamic' => [
					'active' => true,
				],
            ]
        );
		$this->add_control(
			'sassico_testimonial_list',
			[
				'label' => __( 'Testimonial', 'sassico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'sassico_testimonial_client_name' => __( 'Ethan J.Cooper', 'sassico' ),
						'sassico_testimonial_designation' => __( 'Managing Partner, supercheapcar.com', 'sassico' ),
						'sassico_testimonial_review' => __( 'it’s easy for marketers to brag about how great their product or service is. Writing compelling copy, shooting enticing photos, or even producing glamorous videos are all tactics', 'sassico' ),
					],
					[
                        'sassico_testimonial_client_name' => __( 'Jane Doe', 'sassico' ),
                        'sassico_testimonial_designation' => __( 'Managing Partner, supercheapcar.com', 'sassico' ),
						'sassico_testimonial_review' => __( 'it’s easy for marketers to brag about how great their product or service is. Writing compelling copy, shooting enticing photos, or even producing glamorous videos are all tactics', 'sassico' ),
					],
				],
				'title_field' => '{{{ sassico_testimonial_client_name }}}',
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_testimonial_style_tab_rating',
			[
				'label' => __( 'Rating', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_rating_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-stars > li' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_testimonial_style_rating_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-stars > li',
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_testimonial_style_tab_description',
			[
				'label' => __( 'Description', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_description_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-testimonial-content > p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sassico-sync-slider-content > p' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_testimonial_style_description_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-testimonial-content > p, {{WRAPPER}} .sassico-sync-slider-content > p',
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_testimonial_style_tab_client_name',
			[
				'label' => __( 'Cleint Name', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_client_name_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-client-name' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_testimonial_style_client_name_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-client-name',
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'sassico_testimonial_style_tab_client_designation',
			[
				'label' => __( 'Cleint Designation', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_client_designation_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-client-designation' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_testimonial_style_client_designation_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-client-designation',
			]
        );
        
        $this->end_controls_section();
		
		$this->start_controls_section(
			'sassico_testimonial_style_tab_quote',
			[
				'label' => __( 'Quote Icon', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
                    'sassico_testimonial_quote_image_style' => 'icon',
                ]
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_quote_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-testimonial-icon' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_testimonial_style_quote_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-testimonial-icon',
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'sassico_testimonial_style_tab_navigation',
			[
				'label' => __( 'Navigation', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_navigation_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-nav-button' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_testimonial_style_navigation_border_color',
			[
				'label' => __( 'Border Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-nav-button' => 'border-color: {{VALUE}}',
				],
			]
        );
        
        $this->add_control(
			'sassico_testimonial_style_tab_navigation_hover',
			[
				'label' => __( 'Hover', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_responsive_control(
			'sassico_testimonial_style_navigation_hover_color',
			[
				'label' => __( 'Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-nav-button:hover' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_testimonial_style_navigation_border_hover_color',
			[
				'label' => __( 'Border Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-nav-button:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'sassico_testimonial_style_two_dot_color_tab',
			[
				'label' => __( 'Dots Color', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_two_dot_color_one',
			[
				'label' => __( 'Color One', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00d280',
				'condition' => [
					'sassico_testimonial_style' => 'sassico_testimonial_style_two'
				]
			]
		);

		$this->add_responsive_control(
			'sassico_testimonial_style_two_dot_color_two',
			[
				'label' => __( 'Color Two', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#99edcc',
				'condition' => [
					'sassico_testimonial_style' => 'sassico_testimonial_style_two'
				]
			]
		);

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        $testimonials = [];
        extract($settings);
        $testimonials = isset($sassico_testimonial_list) ? $sassico_testimonial_list : [];
		include SASSICO_SHORTCODE_DIR_WIDGETS.'/testimonial/style/'.$sassico_testimonial_style.'.php';
    }

    protected function _content_template() { }
}