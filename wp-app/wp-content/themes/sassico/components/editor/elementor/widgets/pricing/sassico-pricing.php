<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Pricing_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-pricing';
    }


    public function get_title() {
        return esc_html__( 'SASSICO Pricing', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-price-table';
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
			'sassico_pricing__image',
			[
				'label' => __( 'Pricing image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $this->add_control(
            'sassico_pricing_plan_name', [
                'label' => esc_html__('Plan name', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Starter Pack', 'sassico'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        
        $this->add_control(
            'sassico_pricing_price', [
                'label' => esc_html__('Price', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('29', 'sassico'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        
        $this->add_control(
            'sassico_pricing_price_currency', [
                'label' => esc_html__('Currency', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$', 'sassico'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'sassico_pricing_list_title', [
				'label' => __( 'Title', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'sassico' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'sassico_pricing_list',
			[
				'label' => __( 'Repeater List', 'sassico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'sassico_pricing_list_title' => __( '50+ Pro Widgets', 'sassico' ),
					],
					[
						'sassico_pricing_list_title' => __( '300+ Pro Templates', 'sassico' ),
					],
					[
						'sassico_pricing_list_title' => __( 'Theme Builder', 'sassico' ),
					],
				],
				'title_field' => '{{{ sassico_pricing_list_title }}}',
			]
        );
        
        $this->add_control(
			'sassico_pricing_button_text',
			[
				'label' => __( 'Button Text', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Get Started Now', 'sassico' ),
				'placeholder' => __( 'Type your title here', 'sassico' ),
			]
		);

        $this->add_control(
			'sassico_pricing_website_link',
			[
				'label' => __( 'Link', 'sassico' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'sassico' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $this->end_controls_section();

        // contaciner
        $this->start_controls_section(
			'sassico_pricing_container_style_tab',
			[
				'label' => __( 'Container', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_pricing_container_bg_color',
			[
				'label' => __( 'Background Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-content-body' => 'background-color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sassico_pricing_container_box_shadow',
				'label' => __( 'Box Shadow', 'sassico' ),
				'selector' => '{{WRAPPER}} .sassico-content-body',
			]
        );
        
        $this->add_control(
			'sassico_pricing_container_border_radius',
			[
                'label' => __( 'Border Radius', 'sassico' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .sassico-pricing-filter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .sassico-content-body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                ]
        );

        // pricing filter
        $this->add_control(
			'sassico_pricing_container__filter_header',
			[
				'label' => __( 'Filter', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
            'sassico_pricing_container_filter_bg_color',
            [
                'label' => __( 'Background Color', 'sassico' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sassico-pricing-filter' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sassico_pricing_container_filter_box_shadow_normal',
                'label' => __( 'Box Shadow', 'sassico' ),
                'selector' => '{{WRAPPER}} .sassico-pricing-filter',
            ]
        );
        
        $this->add_control(
			'sassico_pricing_container__hover_header',
			[
				'label' => __( 'Hover', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        // hover
        $this->add_responsive_control(
        'sassico_pricing_container_bg_color_hover',
            [
            'label' => __( 'Background Color', 'sassico' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sassico-single-pricing:hover .sassico-content-body' => 'background-color: {{VALUE}}',
            ],
            ]
        );
        
        // filter
        $this->add_responsive_control(
        'sassico_pricing_container__filter_bg_color_hover',
            [
            'label' => __( 'Filter Background Color', 'sassico' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sassico-single-pricing:hover .sassico-pricing-filter' => 'background-color: {{VALUE}}',
            ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sassico_pricing_container_filter_box_shadow_hover',
                'label' => __( 'Box Shadow', 'sassico' ),
                'selector' => '{{WRAPPER}} .sassico-single-pricing:hover .sassico-pricing-filter',
            ]
        );
        
		$this->end_controls_section();
        
        // title
        $this->start_controls_section(
			'sassico_pricing_title_style_tab',
			[
				'label' => __( 'Title', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_pricing_title_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saasico-pricing-plan-title' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_pricing_title_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saasico-pricing-plan-title',
			]
		);

		$this->end_controls_section();
        
           
        // pricing price
        $this->start_controls_section(
			'sassico_pricing_price_style_tab',
			[
				'label' => __( 'Price', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_pricing_price_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-pricing-price' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_responsive_control(
			'sassico_pricing_price_color_hover',
			[
				'label' => __( 'Color Hover', 'sassico' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .sassico-single-pricing:hover .sassico-pricing-price' => 'color: {{VALUE}}',
				],
                ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
			[
                'name' => 'sassico_pricing_price_typography',
				'label' => __( 'Typography', 'sassico' ),
                'separetor' => 'before',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-pricing-price',
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_pricing_price_typography_sub',
				'label' => __( 'Currency Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-pricing-price > sub',
			]
		);

        $this->end_controls_section();
        
        // list
        $this->start_controls_section(
			'sassico_pricing_list_style_tab',
			[
				'label' => __( 'List', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_pricing_list_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-pricing-plan > li' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_pricing_list_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-pricing-plan > li',
			]
		);

		$this->end_controls_section();
        
        // button
        $this->start_controls_section(
			'sassico_pricing_button_style_tab',
			[
				'label' => __( 'Button', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_pricing_button_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-link' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_responsive_control(
			'sassico_pricing_button_hover_color',
			[
				'label' => __( 'Color Hover', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-single-pricing:hover .btn.btn-link' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_pricing_button_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .btn.btn-link',
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);
        $pricing_lists = [];
		$pricing_lists = isset($sassico_pricing_list) ? $sassico_pricing_list : [];
		$rel = '';
        switch ($settings['sassico_pricing_website_link']['nofollow']) {
            case 'on':
                $rel="nofollow";
                break;
            default:
                $rel = '';
                break;
        }

        $target = '';
        switch ($settings['sassico_pricing_website_link']['is_external']) {
            case 'on':
                $target="_blank";
                break;
            default:
                $target="_self";
                break;
        }
        ?>
            <div class="sassico-single-pricing">
                <div class="sassico-content-body">
                    <div class="sassico-pricing-header">
                        <?php if ($settings['sassico_pricing__image']['url'] != '') { ?>
                        <img src="<?php echo esc_url($settings['sassico_pricing__image']['url'])?>" class="sassico-pricing-image" alt="sassico pricing icon">
                        <?php }; ?>

                        <?php if ($settings['sassico_pricing_plan_name'] != '') { ?>
                        <h2 class="saasico-pricing-plan-title"><?php echo esc_html($settings['sassico_pricing_plan_name'])?></h2>
                        <?php }; ?>

                        <?php if ($settings['sassico_pricing_price'] != '') { ?>
                        <h3 class="sassico-pricing-price">
                            <?php if ($settings['sassico_pricing_price_currency'] != '') { ?>
                                <sub><?php echo esc_html($settings['sassico_pricing_price_currency'])?></sub><?php }; ?><?php echo esc_html($settings['sassico_pricing_price'])?>
                        </h3>
                        <?php }; ?>

                        <hr>
                    </div>
                    <ul class="sassico-pricing-plan">
                        <?php foreach ($pricing_lists as $pricing_list) { ?>
                        <li><?php echo esc_html($pricing_list['sassico_pricing_list_title']); ?></li>
                        <?php }; ?>
                    </ul>
                </div>            
                <?php if ($settings['sassico_pricing_button_text'] != '') { ?>
                    <div class="sassico-pricing-footer">
                        <a href="<?php echo esc_url($settings['sassico_pricing_website_link']['url'])?>" rel="<?php echo esc_attr($rel); ?>" target="<?php echo esc_attr($target); ?>" class="btn btn-link"><?php echo esc_html($settings['sassico_pricing_button_text'])?> <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                <?php };?>
                <div class="sassico-pricing-filter"></div>
            </div>
        <?php
        
    }

    protected function _content_template() { }
}