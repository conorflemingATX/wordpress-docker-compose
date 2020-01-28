<?php

namespace Elementor;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Working_Process_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-working-process';
    }

    public function get_title() {
        return esc_html__( 'SASSICO Working Process', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-checkbox';
    }

    public function get_categories() {
        return [ 'sassico-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_working_process_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
            'sassico_working_process_style',
            [
                'label' => esc_html__('Choose Style', 'sassico'),
                'type' => ElementsKit_Controls_Manager::IMAGECHOOSE,
                'default' => 'working_process_with_gradient',
                'options' => [
                    'working_process_with_gradient' => [
                        'title' => esc_html__( 'With Gradient', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/working_process/working_process_1.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/working_process/working_process_1.png',
                        'width' => '100%',
                    ],
                    'working_process_with_out_gradient' => [
                        'title' => esc_html__( 'With Out Gradient', 'sassico' ),
                        'imagelarge' => SASSICO_IMG . '/imagechoose/working_process/working_process_2.png',
                        'imagesmall' => SASSICO_IMG . '/imagechoose/working_process/working_process_2.png',
                        'width' => '100%',
                    ],
                ],
            ]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'sassico_working_process_image',
			[
				'label' => __( 'Choose Image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'sassico_working_process_title', [
				'label' => __( 'Title', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'sassico' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'sassico_working_process_bg_color',
			[
				'label' => __( 'Color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00d280',
				'selectors' => [
					'{{WRAPPER}}' => '--sassico-working-process-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sassico_working_process_lists',
			[
				'label' => __( 'Working Process', 'sassico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'sassico_working_process_title' => __( 'Research Project', 'sassico' ),
					],
					[
						'sassico_working_process_title' => __( 'Find Ideas', 'sassico' ),
					],
					[
						'sassico_working_process_title' => __( 'Start Optimize', 'sassico' ),
					],
					[
						'sassico_working_process_title' => __( 'Reach Target', 'sassico' ),
					],
				],
				'title_field' => '{{{ sassico_working_process_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'sassico_working_process_step_number_style_tab',
			[
				'label' => __( 'Step Number', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_working_process_step_number_typo',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-working-step-text',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'sassico_working_process_step_number_background',
				'label' => __( 'Background', 'sassico' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .sassico-working-step::before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'sassico_working_process_step_title_style_tab',
			[
				'label' => __( 'Step Title', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_working_process_step_title_typo',
				'label' => __( 'Typography', 'sassico' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .sassico-wokring-process-title',
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);

        if (is_array($settings['sassico_working_process_lists'])) {
			$i = 0; ?>
		<div class="container">
			<div class="row sassico-single-working-steps">
			<?php foreach ($settings['sassico_working_process_lists'] as $sassico_working_process_list) {	
				$i++;
				$working_process_color = '#00d280';
				if ($sassico_working_process_list['sassico_working_process_bg_color'] !== '') {
					$working_process_color = $sassico_working_process_list['sassico_working_process_bg_color'];
				}
				include SASSICO_SHORTCODE_DIR_WIDGETS.'/working-process/style/'.$sassico_working_process_style.'.php';
				} 
			?>
			</div> 
		</div> 
		<?php
		}
    }

    protected function _content_template() { }
}