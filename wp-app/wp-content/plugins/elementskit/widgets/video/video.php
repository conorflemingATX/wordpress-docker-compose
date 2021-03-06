<?php
namespace Elementor;

use \ElementsKit\Elementskit_Widget_Video_Handler as Handler;
use \ElementsKit\Modules\Controls\Controls_Manager as ElementsKit_Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Elementskit_Widget_Video extends Widget_Base {
	public $base;

    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
		$this->add_script_depends('magnific-popup');
	}

	public function get_name() {
        return Handler::get_name();
    }

    public function get_title() {
        return Handler::get_title();
    }

    public function get_icon() {
        return Handler::get_icon();
    }

    public function get_categories() {
        return Handler::get_categories();
    }

	protected function _register_controls() {

		$this->start_controls_section(
			'ekit_video_popup_content_section',
			[
				'label' => esc_html__( 'Video', 'elementskit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ekit_video_popup_button_style',
			[
				'label' => esc_html__( 'Button Style', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'text'  => esc_html__( 'Text', 'elementskit' ),
					'icon' => esc_html__( 'Icon', 'elementskit' ),
					'both' => esc_html__( 'Both', 'elementskit' ),
				],
			]
		);

		 $this->add_control(
            'ekit_video_popup_button_title',
            [
                'label' =>esc_html__( 'Button Title', 'elementskit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' =>esc_html__( 'Play Video', 'elementskit' ),
				'default' =>esc_html__( 'Play Video', 'elementskit' ),
				'condition' => [
					'ekit_video_popup_button_style' => ['text', 'both']
				],
				'dynamic' => [
					'active' => true,
				],
            ]
		 );

		 $this->add_control(
            'ekit_video_popup_button_icons__switch',
            [
                'label' => esc_html__('Add icon? ', 'elementskit'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'condition' => [
					'ekit_video_popup_button_style' 		=> ['icon', 'both'],
				]
            ]
		);

		 $this->add_control(
            'ekit_video_popup_button_icons',
            [
                'label' =>esc_html__( 'Button Icon', 'elementskit' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'ekit_video_popup_button_icon',
                'default' => [
                    'value' => 'icon icon-play',
                    'library' => 'ekiticons',
                ],
				'label_block' => true,
				'condition' => [
					'ekit_video_popup_button_style' 		=> ['icon', 'both'],
					'ekit_video_popup_button_icons__switch'	=> 'yes'
				]
            ]
		 );
		 $this->add_control(
			'ekit_video_popup_icon_align',
			[
				'label' =>esc_html__( 'Icon Position', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'before' =>esc_html__( 'Before', 'elementskit' ),
					'after' =>esc_html__( 'After', 'elementskit' ),
				],
				'condition' => [
					'ekit_video_popup_button_style' => 'both',
					'ekit_video_popup_button_icons__switch'	=> 'yes'
				]
			]
		);

		 $this->add_control(
            'ekit_video_popup_video_glow',
            [
                'label' =>esc_html__( 'Active Glow', 'elementskit' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => 'yes',
				'default' => 'yes',
            ]
		 );


		 $this->add_control(
            'ekit_video_popup_video_type',
            [
                'label'     => esc_html__( 'Video Type', 'elementskit' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'youtube',
                'options'   => [
                      'youtube'=> esc_html__( 'youtube', 'elementskit' ),
                      'vimeo'=> esc_html__( 'vimeo', 'elementskit' ),
                ]
            ]
        );

		$this->add_control(
			'ekit_video_popup_url',
			[
				'label' => esc_html__( 'URL to embed', 'elementskit' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html( 'https://www.youtube.com/watch?v=1MTkZPys7mU' ),
				'default' => esc_html('https://www.youtube.com/watch?v=1MTkZPys7mU'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		//video option
		$this->add_control(
			'ekit_video_popup_start_time',
			[
				'label' => esc_html__( 'Start Time', 'elementskit' ),
				'type' => Controls_Manager::NUMBER,
				'input_type' => 'number',
				'placeholder' =>  '',
				'default' => '0',
				'condition' => ['ekit_video_popup_video_type' => 'youtube' ]
			]
		);

		$this->add_control(
			'ekit_video_popup_end_time',
			[
				'label' => esc_html__( 'End TIme', 'elementskit' ),
				'type' => Controls_Manager::NUMBER,
				'input_type' => 'number',
				'placeholder' => '',
				'default' => '',
				'condition' => ['ekit_video_popup_video_type' => 'youtube']
			]
		);
		$this->add_control(
			'ekit_video_popup_auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'ekit_video_popup_video_mute',
			[
				'label' => esc_html__( 'Mute', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
			]
		);

		$this->add_control(
			'ekit_video_popup_video_loop',
			[
				'label' => esc_html__( 'Loop', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
			]
		);

		$this->add_control(
			'ekit_video_popup_video_player_control',
			[
				'label' => esc_html__( 'Player Control', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
			]
		);

	   $this->add_control(
			'ekit_video_popup_video_intro_title',
			[
				'label' => esc_html__( 'Intro Title', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' =>esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
				'condition' => ['ekit_video_popup_video_type' => 'vimeo']
			]
		);

		$this->add_control(
			'ekit_video_popup_video_intro_portrait',
			[
				'label' => esc_html__( 'Intro Portrait', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
				'condition' => ['ekit_video_popup_video_type' => 'vimeo']
			]
		);

        $this->add_control(
			'ekit_video_popup_video_intro_byline',
			[
				'label' => esc_html__( 'Intro Byline', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementskit' ),
				'label_off' => esc_html__( 'No', 'elementskit' ),
				'return_value' => '1',
				'default' => 'no',
				'condition' => ['ekit_video_popup_video_type' => 'vimeo']
			]
		);
		//video option

        $this->end_controls_section();

        $this->start_controls_section(
			'ekit_video_popup_style_section',
			[
				'label' => esc_html__( 'Style', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_title_align', [
				'label'			 =>esc_html__( 'Alignment', 'elementskit' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 =>esc_html__( 'Left', 'elementskit' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 =>esc_html__( 'Center', 'elementskit' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 =>esc_html__( 'Right', 'elementskit' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 =>esc_html__( 'Justified', 'elementskit' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'center',
                'selectors' => [
                    '{{WRAPPER}} .video-content' => 'text-align: {{VALUE}};',
				],
			]
		);

	 //

	 //


		$this->end_controls_section();




		$this->start_controls_section(
			'ekit_video_popup_section_style',
			[
				'label' =>esc_html__( 'Button Style', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_text_padding',
			[
				'label' =>esc_html__( 'Padding', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ekit_video_popup_btn_typography',
				'label' =>esc_html__( 'Typography', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit-video-popup-btn',
			]
		);


		$this->add_control(
			'ekit_video_popup_btn_use_height_and_width',
			[
				'label' => esc_html__( 'Use height width', 'elementskit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'elementskit' ),
				'label_off' => esc_html__( 'Hide', 'elementskit' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_btn_width',
			[
				'label' => esc_html__( 'Width', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_video_popup_btn_use_height_and_width' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_btn_height',
			[
				'label' => esc_html__( 'Height', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_video_popup_btn_use_height_and_width' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_btn_line_height',
			[
				'label' => esc_html__( 'Line height', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 45,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_video_popup_btn_use_height_and_width' => 'yes'
				]
			]
		);

		$this->add_control(
			'ekit_video_popup_btn_glow_color',
			[
				'label' => esc_html__( 'Glow Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn.glow-btn::before' => 'color: {{VALUE}}',
				],
				'default' => '#255cff',
				'condition' => [
					'ekit_video_popup_video_glow' => 'yes'
				]
			]
		);


		$this->start_controls_tabs( 'ekit_video_popup_button_style_tabs' );

		$this->start_controls_tab(
			'ekit_video_popup_button_normal',
			[
				'label' =>esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_video_popup_btn_text_color',
			[
				'label' =>esc_html__( 'Text Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
				'name'     => 'ekit_video_popup_btn_bg_color',
				'default' => '',
				'selector' => '{{WRAPPER}} .ekit-video-popup-btn',
            )
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_video_popup_btn_tab_button_hover',
			[
				'label' =>esc_html__( 'Hover', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_video_popup_btn_hover_color',
			[
				'label' =>esc_html__( 'Text Color', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    array(
			    'name'     => 'ekit_video_popup_btn_bg_hover_color',
			    'default' => '',
			    'selector' => '{{WRAPPER}} .ekit-video-popup-btn:hover',
		    )
	    );

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();




        $this->start_controls_section(
			'ekit_video_popup_border_style',
			[
				'label' =>esc_html__( 'Border Style', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ekit_video_popup_btn_border_style',
			[
				'label' => esc_html_x( 'Border Type', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'elementskit' ),
					'solid' => esc_html_x( 'Solid', 'Border Control', 'elementskit' ),
					'double' => esc_html_x( 'Double', 'Border Control', 'elementskit' ),
					'dotted' => esc_html_x( 'Dotted', 'Border Control', 'elementskit' ),
					'dashed' => esc_html_x( 'Dashed', 'Border Control', 'elementskit' ),
					'groove' => esc_html_x( 'Groove', 'Border Control', 'elementskit' ),
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'border-style: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'ekit_video_popup_btn_border_dimensions',
			[
				'label' => esc_html_x( 'Width', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'ekit_video_popup__button_border_style' );
		$this->start_controls_tab(
			'ekit_video_popup__button_border_normal',
			[
				'label' =>esc_html__( 'Normal', 'elementskit' ),
			]
		);

		$this->add_control(
			'ekit_video_popup_btn_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'ekit_video_popup_btn_tab_button_border_hover',
			[
				'label' =>esc_html__( 'Hover', 'elementskit' ),
			]
		);
		$this->add_control(
			'ekit_video_popup_btn_hover_border_color',
			[
				'label' => esc_html_x( 'Color', 'Border Control', 'elementskit' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'ekit_video_popup_btn_border_radius',
			[
				'label' =>esc_html__( 'Border Radius', 'elementskit' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '' ,
					'left' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn, {{WRAPPER}} .ekit-video-popup-btn:before' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'ekit_video_popup_box_shadow_style',
			[
				'label' =>esc_html__( 'Shadow Style', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ekit_video_popup_btn_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'elementskit' ),
				'selector' => '{{WRAPPER}} .ekit-video-popup-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'ekit_video_popup_btn_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .ekit-video-popup-btn',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ekit_video_popup_icon_style',
			[
				'label' => esc_html__( 'Icon', 'elementskit' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'ekit_video_popup_button_icons__switch'	=> 'yes',
					'ekit_video_popup_button_style' => ['both']
				]
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_icon_padding_right',
			[
				'label' => esc_html__( 'Padding Right', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn > i' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_video_popup_button_style' => 'both',
					'ekit_video_popup_icon_align' => 'before'
				]
			]
		);

		$this->add_responsive_control(
			'ekit_video_popup_icon_padding_left',
			[
				'label' => esc_html__( 'Padding Left', 'elementskit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .ekit-video-popup-btn > i' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'ekit_video_popup_button_style' => 'both',
					'ekit_video_popup_icon_align' => 'after'
				]
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Video Icon
	 */
	private function video_icon() {
		$settings = $this->get_settings_for_display();

		// new icon
		$migrated = isset( $settings['__fa4_migrated']['ekit_video_popup_button_icons'] );
		// Check if its a new widget without previously selected icon using the old Icon control
		$is_new = empty( $settings['ekit_video_popup_button_icon'] );
		if ( $is_new || $migrated ) {
			// new icon
			return '<i class="'. esc_attr($settings['ekit_video_popup_button_icons']['value']) .'" aria-hidden="true"></i>';
		} else {
			return '<i class="'. esc_attr($settings['ekit_video_popup_button_icon']) .'" aria-hidden="true"></i>';
		}
	}

	protected function render( ) {
        echo '<div class="ekit-wid-con" >';
            $this->render_raw();
        echo '</div>';
	}

    protected function render_raw( ) {
		$settings = $this->get_settings_for_display();
		extract($settings);

		 $ekit_video_popup_url = $ekit_video_popup_url."?autoplay={$ekit_video_popup_auto_play}&loop={$ekit_video_popup_video_loop}&controls={$ekit_video_popup_video_player_control}&mute={$ekit_video_popup_video_mute}&start={$ekit_video_popup_start_time}&end={$ekit_video_popup_end_time}&version=3";
		?>
			<div class="video-content">
                <a href="<?php echo esc_url($ekit_video_popup_url); ?>" class="ekit-video-popup ekit-video-popup-btn <?php echo esc_attr($ekit_video_popup_button_style == 'icon' ? 'ekit_icon_button': '') ?> <?php echo esc_attr($ekit_video_popup_video_glow=="yes"?"glow-btn":''); ?>">
					<?php if($ekit_video_popup_button_style == 'text'): ?>
						<span><?php echo esc_html($ekit_video_popup_button_title); ?></span>
					<?php endif; ?>
					<?php if($ekit_video_popup_button_style == 'icon' && $ekit_video_popup_button_icons != ''): ?>
						<?php echo $this->video_icon(); ?>
					<?php endif; ?>
					<?php if($ekit_video_popup_button_style == 'both'): ?>
						<?php if($ekit_video_popup_icon_align == 'before' && $ekit_video_popup_button_icons != '') : ?>
						<?php echo $this->video_icon(); ?>
						<?php endif; ?>
						<span><?php echo esc_html($ekit_video_popup_button_title); ?></span>
						<?php if($ekit_video_popup_icon_align == 'after' && $ekit_video_popup_button_icons != '') : ?>
						<?php echo $this->video_icon(); ?>
						<?php endif; ?>
					<?php endif; ?>
                </a>
            </div>
		<?php


	}

	protected function _content_template() {}

}