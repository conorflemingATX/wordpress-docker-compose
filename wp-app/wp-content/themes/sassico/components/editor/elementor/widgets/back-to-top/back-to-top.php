<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Back_To_Top_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-back-to-top';
    }

    public function get_title() {
        return esc_html__( 'SASSICO Back To Top', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-collapse';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_back_to_top_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sassico_back_to_top_style',
			[
				'label' => __( 'Border Style', 'sassico' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrow_only',
				'options' => [
					'arrow_only'  => __( 'Arrow Only', 'sassico' ),
					'arrow_with_text' => __( 'Arrow With Text', 'sassico' ),
				],
			]
        );
        
        $this->add_control(
			'sassico_back_to_top_icon',
			[
				'label' => __( 'Icon', 'sassico' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon icon-arrow-up',
					'library' => 'solid',
				],
			]
        );
        
        $this->add_control(
			'sassico_back_to_top_title',
			[
				'label' => __( 'Title', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'GO TOP', 'sassico' ),
                'placeholder' => __( 'Type your title here', 'sassico' ),
                'condition' => [
                    'sassico_back_to_top_style' => 'arrow_with_text'
                ]
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'sassico_back_to_top_style_section',
			[
				'label' => __( 'Style', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sassico_back_to_top_size',
			[
				'label' => __( 'Font Size', 'sassico' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .sassico-back-to-top > img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sassico-back-to-top > svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sassico-back-to-top' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'sassico_back_to_top_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sassico-back-to-top' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sassico-back-to-top svg path' => 'fill: {{VALUE}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'sassico_back_to_top_stroke',
			[
				'label' => __( 'Stroke Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .sassico-back-to-top svg path' => 'stroke: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);
        ?>
            <div class="sassico-back-to-top-wraper <?php echo esc_attr($settings['sassico_back_to_top_style']); ?>">
                <p class="sassico-back-to-top">
                    <?php if ($settings['sassico_back_to_top_style'] == 'arrow_only') { 
                        if (is_array($settings['sassico_back_to_top_icon']['value'])) { 
                    ?>
                        <img src="<?php echo esc_attr($settings['sassico_back_to_top_icon']['value']['url']); ?>" alt="back to top image">
                        <?php } else { ?>
                        <i class="<?php echo esc_attr($settings['sassico_back_to_top_icon']['value']); ?>"></i>
                        <?php }
                    } else {
                        if (is_array($settings['sassico_back_to_top_icon']['value'])) { ?>
                            <img src="<?php echo esc_attr($settings['sassico_back_to_top_icon']['value']['url']); ?>" alt="back to top image">
                            <?php } else { ?>
                            <i class="<?php echo esc_attr($settings['sassico_back_to_top_icon']['value']); ?>"></i>
                        <?php } ?>
                        <span class="sassico-back-to-top-text"><?php echo esc_html($settings['sassico_back_to_top_title']); ?></span>
                    <?php
                    }
                    ?>
                </p>
            </div>
        <?php
        
    }

    protected function _content_template() { }
}