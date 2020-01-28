<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_CTA_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-call-to-action';
    }

    public function get_title() {
        return esc_html__( 'SASSICO Call To Action', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_cta_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'sassico_cta_background_image',
			[
				'label' => __( 'Background Image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $this->add_control(
			'sassico_cta_widget_title',
			[
				'label' => __( 'Title', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Already interested! Do you have any project to working with?', 'sassico' ),
				'placeholder' => __( 'Type your title here', 'sassico' ),
			]
		);
        
        $this->add_control(
			'sassico_cta_widget_button_title',
			[
				'label' => __( 'Button title', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'GET STARTED', 'sassico' ),
				'placeholder' => __( 'Type your title here', 'sassico' ),
			]
		);
        $this->add_control(
			'sassico_cta_widget_button_link',
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
        

        // title
        $this->start_controls_section(
			'sassico_cta_widget_title_style_tab',
			[
				'label' => __( 'Title', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_cta_widget_title_color',
			[
				'label' => __( 'Title Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-call-to-action-title' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_cta_widget_title_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-call-to-action-title',
			]
		);

		$this->end_controls_section();
        
        // button
        $this->start_controls_section(
			'sassico_cta_widget_button_style_tab',
			[
				'label' => __( 'Button', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_cta_widget_button_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'sassico_cta_widget_button_bg_color_',
			[
				'label' => __( 'Background Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->add_responsive_control(
			'sassico_cta_widget_button_border_color',
			[
				'label' => __( 'Border Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn' => 'border-color: {{VALUE}}',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_cta_widget_button_typography',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .btn',
			]
        );
        
        $this->add_control(
			'sassico_cta_widget_button_hover_heading',
			[
				'label' => __( 'Hover', 'sassico' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_responsive_control(
			'sassico_cta_widget_button_color_hover',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_responsive_control(
			'sassico_cta_widget_button_bg_color_hover',
			[
				'label' => __( 'Background Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->add_responsive_control(
			'sassico_cta_widget_button_border_color_hover',
			[
				'label' => __( 'Border Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);

        $rel = '';
        switch ($settings['sassico_cta_widget_button_link']['nofollow']) {
            case 'on':
                $rel="nofollow";
                break;
            default:
                $rel = '';
                break;
        }

        $target = '';
        switch ($settings['sassico_cta_widget_button_link']['is_external']) {
            case 'on':
                $target="_blank";
                break;
            default:
                $target="_self";
                break;
        }
        ?>
            <div class="sassico-call-to-action-wraper" style="background-image: url(<?php echo esc_url($settings['sassico_cta_background_image']['url'])?>)">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mx-auto text-center">
							<div class="call-to-action-content">
								<?php if ($settings['sassico_cta_widget_title'] != '') { ?>
								<h2 class="sassico-call-to-action-title"><?php echo esc_html($settings['sassico_cta_widget_title'])?></h2>
								<?php }; ?>
								<?php if ($settings['sassico_cta_widget_button_title'] != '') { ?>
								<a href="<?php echo esc_url($settings['sassico_cta_widget_button_link']['url'])?>" rel="<?php echo esc_attr($rel); ?>" target="<?php echo esc_attr($target); ?>" class="btn btn-outline-light"><?php echo esc_html($settings['sassico_cta_widget_button_title'])?> <i class="fa fa-angle-right"></i></a>
								<?php }; ?>
							</div>
						</div>
					</div>
					<div class="sassico-filter-shadow" style="background-image: url(<?php echo esc_url($settings['sassico_cta_background_image']['url'])?>)"></div>
				</div>
            </div>
        <?php
        
    }

    protected function _content_template() { }
}