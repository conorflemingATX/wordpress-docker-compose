<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Gallery_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-gallery-slider';
    }

    public function get_title() {
        return esc_html__( 'SASSICO Gallery Slider', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
       
        $this->start_controls_section(
			'gallery_slider_content',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'gallery_slider_image',
			[
				'label' => __( 'Add Images', 'sassico' ),
				'type' => Controls_Manager::GALLERY,
			]
        );
        
        $this->add_control(
			'xs_gallery_slider_loop_control',
			[
				'label' => __( 'Loop', 'sassico' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'sassico' ),
				'label_off' => __( 'Hide', 'sassico' ),
				'return_value' => 'true',
                'default' => 'false',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'gallery_slider_style_tab',
			[
				'label' => __( 'Style', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'gallery_slider_overlay_color',
			[
				'label' => __( 'Overlay Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs_gallery_item .xs_gallery_overlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'gallery_slider_icon_color',
			[
				'label' => __( 'Icon Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs_gallery_item .xs_popup_icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();
        extract($settings);
        if (!empty($settings['gallery_slider_image'])) {
        ?>
        <div class="container">
            <div class="xs-gallery-slider xs_fullwidth_wraper swiper-container" data-loop="<?php echo esc_attr($settings['xs_gallery_slider_loop_control']); ?>">
                <div class="swiper-wrapper">
                <?php foreach ($settings['gallery_slider_image'] as $values) { ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_url($values['url']); ?>" class="elementor-clickable xs_gallery_item">
                            <img src="<?php echo esc_url(sassico_resize($values['url'], '360', '350', true)); ?>" alt="sassico gallery image">
                            <div class="xs_gallery_overlay">
                                <i class="icon icon-plus-circle xs_popup_icon"></i>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                </div>
                <div class="xs-arrows xs-arrows-next"></div>
                <div class="xs-arrows xs-arrows-prev"></div>
            </div>
        </div>
        <?php
        }
    }

    protected function _content_template() { }
}