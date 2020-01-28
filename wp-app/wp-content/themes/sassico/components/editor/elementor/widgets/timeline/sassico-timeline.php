<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Timeline_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-timeline';
    }


    public function get_title() {
        return esc_html__( 'SASSICO Timeline', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-time-line';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_timeline_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new Repeater();

		$repeater->add_control(
			'sassico_timeline_client_image',
			[
				'label' => __( 'Client Image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $repeater->add_control(
            'sassico_timeline_subtitle', [
                'label' => esc_html__('Subtitle', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Timeline #1', 'sassico'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'sassico_timeline_title', [
                'label' => esc_html__('Title', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Title', 'sassico'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
		$repeater->add_control(
            'sassico_timeline_review', [
				'label' => esc_html__('Review', 'sassico'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Review Text', 'sassico'),
				'dynamic' => [
					'active' => true,
				],
            ]
        );
        $repeater->add_control(
			'sassico_timeline_review_button_text',
			[
				'label' => __( 'Button Text', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'NEXT STEP', 'sassico' ),
				'placeholder' => __( 'Type your title here', 'sassico' ),
			]
		);

        $repeater->add_control(
			'sassico_timeline_review_website_link',
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

		$this->add_control(
			'sassico_timeline_list',
			[
				'label' => __( 'Timeline', 'sassico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'sassico_timeline_subtitle' => __( 'Step 01', 'sassico' ),
						'sassico_timeline_title' => __( 'Gather the information', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
					[
                        'sassico_timeline_subtitle' => __( 'Step 02', 'sassico' ),
                        'sassico_timeline_title' => __( 'Find Solution and Solve', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
					[
                        'sassico_timeline_subtitle' => __( 'Step 03', 'sassico' ),
                        'sassico_timeline_title' => __( 'Finally get the Result', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
				],
				'title_field' => '{{{ sassico_timeline_subtitle }}}',
			]
		);

        $this->end_controls_section();

        // timeline subtitle
        $this->start_controls_section(
            'sassico_timeline_subtitle_style_tab',
            [
                'label' => __( 'Subtitle', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sassico_timeline_subtitle_color',
                [
                    'label' => __( 'Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-subtitle' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sassico_timeline_subtitle_typography',
                    'label' => __( 'Typography', 'sassico' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .sassico-timeline-subtitle',
                ]
            );

        $this->end_controls_section();
        
        // timeline title
        $this->start_controls_section(
            'sassico_timeline_title_style_tab',
            [
                'label' => __( 'Title', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sassico_timeline_title_color',
                [
                    'label' => __( 'Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sassico_timeline_title_typography',
                    'label' => __( 'Typography', 'sassico' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .sassico-timeline-title',
                ]
            );

        $this->end_controls_section();
        
        // timeline exerpt
        $this->start_controls_section(
            'sassico_timeline_exerpt_style_tab',
            [
                'label' => __( 'Exerpt', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sassico_timeline_exerpt_color',
                [
                    'label' => __( 'Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-content > p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sassico_timeline_exerpt_typography',
                    'label' => __( 'Typography', 'sassico' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .sassico-timeline-content > p',
                ]
            );

        $this->end_controls_section();
        
        // timeline button
        $this->start_controls_section(
            'sassico_timeline_btn_style_tab',
            [
                'label' => __( 'Btn', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sassico_timeline_btn_color',
                [
                    'label' => __( 'Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sassico_timeline_btn_bg_color',
                [
                    'label' => __( 'Background Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'sassico_timeline_btn_border_color',
                [
                    'label' => __( 'Border Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sassico_timeline_btn_padding',
                [
                    'label' => __( 'Padding', 'sassico' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'sassico_timeline_btn_border_radius',
                [
                    'label' => __( 'Border radius', 'sassico' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'sassico_timeline_btn_typography',
                    'label' => __( 'Typography', 'sassico' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .btn',
                ]
            );

            $this->add_control(
                'sassico_timeline_btn_hover_title',
                [
                    'label' => __( 'Hover', 'sassico' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'sassico_timeline_btn_color_hover',
                [
                    'label' => __( 'Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'sassico_timeline_btn_border_color_hover',
                [
                    'label' => __( 'Border Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn:hover' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sassico_timeline_btn_bg_color_hover',
                [
                    'label' => __( 'Background Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

		$this->end_controls_section();
        // timeline button
        $this->start_controls_section(
            'sassico_timeline_bar_and_pin_style_tab',
            [
                'label' => __( 'Bar and pin', 'sassico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'sassico_timeline_bar_border_color',
                [
                    'label' => __( 'Border Color', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-bar' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'sassico_timeline_pin_title',
                [
                    'label' => __( 'Pin', 'sassico' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'sassico_timeline_pin_bg_color',
                [
                    'label' => __( 'Background color one', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-pin' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'sassico_timeline_pin_bg_color_2',
                [
                    'label' => __( 'Background color two', 'sassico' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sassico-timeline-pin:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        $timeline = [];
        extract($settings);
        $timeline = isset($sassico_timeline_list) ? $sassico_timeline_list : [];
        if (is_array($timeline) && !empty($timeline)) { ?>
            <div class="sassico-timeline-wraper">
                <div class="container">
                <?php foreach ($timeline as $timeline) { 
                
                    $rel = '';
                    switch ($timeline['sassico_timeline_review_website_link']['nofollow']) {
                        case 'on':
                            $rel="nofollow";
                            break;
                        default:
                            $rel = '';
                            break;
                    }

                    $target = '';
                    switch ($timeline['sassico_timeline_review_website_link']['is_external']) {
                        case 'on':
                            $target="_blank";
                            break;
                        default:
                            $target="_self";
                            break;
                    }
                    
                    ?>
               
                    <div class="row sassico-single-timeline sassico-timeline-bar">
                        <div class="col-lg-6">
                            <div class="sassico-timeline-content">
                            <?php if ($timeline['sassico_timeline_subtitle'] != '') { ?>
                                <h2 class="sassico-timeline-subtitle">
                                    <?php echo esc_html($timeline['sassico_timeline_subtitle'])?>
                                    <span class="sassico-timeline-pin"></span>
                                </h2>
                            <?php }; ?>

                            <?php if ($timeline['sassico_timeline_title'] != '') { ?>
                                <h3 class="sassico-timeline-title"><?php echo esc_html($timeline['sassico_timeline_title'])?></h3>
                            <?php }; ?>

                            <?php if ($timeline['sassico_timeline_review'] != '') { ?>
                                <p><?php echo esc_html($timeline['sassico_timeline_review'])?></p>
                            <?php }; ?>
                            
                            <?php if ($timeline['sassico_timeline_review_button_text'] != '') { ?>
                                <a href="<?php echo esc_url($timeline['sassico_timeline_review_website_link']['url'])?>" rel="<?php echo esc_attr($rel); ?>" target="<?php echo esc_attr($target); ?>" class="btn btn-outline-primary"><?php echo esc_html($timeline['sassico_timeline_review_button_text'], 'sassico')?> <i class="fa fa-angle-right"></i></a>
                            <?php };?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sassico-timeline-image">
                                <img src="<?php echo esc_url($timeline['sassico_timeline_client_image']['url'])?>" alt="<?php echo esc_html($timeline['sassico_timeline_subtitle'])?>">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        <?php 
        }
    }

    protected function _content_template() { }
}