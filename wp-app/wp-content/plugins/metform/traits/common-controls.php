<?php
namespace MetForm\Traits;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Scheme_Typography;
use \Elementor\Scheme_Color;
use \Elementor\Repeater;

defined( 'ABSPATH' ) || exit;

/*
* This is a global widget control trait. 
* There are some different fucntions for different control section. 
* For registering any widget just use this trait and call control section function which you want to use.
*/

trait Common_Controls{

    protected function input_content_controls($param = []){
		$this->add_control(
			'mf_input_label_status',
			[
				'label' => esc_html__( 'Show Label', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'on' => esc_html__( 'Show', 'metform' ),
				'off' => esc_html__( 'Hide', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'description' => esc_html__('for adding label on input turn it on. Don\'t want to use label? turn it off.', 'metform'),
			]
		);

        $this->add_control(
			'mf_input_label_display_property',
			[
				'label' => esc_html__( 'Position', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Top', 'metform' ),
					'inline-block' => esc_html__( 'Left', 'metform' ),
                ],
                'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'display: {{VALUE}}',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
				],
				'description' => esc_html__('Select label position. where you want to see it. top of the input or left of the input.', 'metform'),

			]
		);

		$this->add_control(
			'mf_input_label',
			[
				'label' => esc_html__( 'Label : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_title(),
				'title' => esc_html__( 'Enter here label of input', 'metform' ),
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		
		if(in_array('NO_NAME', $param)){
			$this->add_control(
				'mf_input_name',
				[
					'label' => esc_html__( 'Name : ', 'metform' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => $this->get_name(),
				]
			);
		}
		
		if(!in_array('NO_NAME', $param)){
			$this->add_control(
				'mf_input_name',
				[
					'label' => esc_html__( 'Name', 'metform' ),
					'type' => Controls_Manager::TEXT,
					'default' => $this->get_name(),
					'title' => esc_html__( 'Enter here name of the input', 'metform' ),
					'description' => esc_html__('Name is must required. Enter name without space or any special character. use only underscore/ hyphen (_/-) for multiple word. Name must be different.', 'metform'),
				]
			);
		}
		
		if( !in_array('NO_PLACEHOLDER', $param) ){
			$this->add_control(
				'mf_input_placeholder',
				[
					'label' => esc_html__( 'Place holder', 'metform' ),
					'type' => Controls_Manager::TEXT,
					'default' => $this->get_title(),
					'title' => esc_html__( 'Enter here place holder', 'metform' ),
					]
				);
			}
			
		$this->add_control(
			'mf_input_help_text',
			[
				'label' => esc_html__( 'Help Text : ', 'metform' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'placeholder' => esc_html__( 'Type your help text here', 'metform' ),
			]
		);

	}

	protected function input_setting_controls($param = []){

		if(!in_array('NO_REQUIRED',$param)){
			$this->add_control(
				'mf_input_required',
				[
					'label' => esc_html__( 'Required ?', 'metform' ),
					'type' => Controls_Manager::SWITCHER,
					'yes' => esc_html__( 'Yes', 'metform' ),
					'no' => esc_html__( 'No', 'metform' ),
					'return_value' => 'yes',
					'default' => 'no',
					'description' => esc_html__('Is this field is required for submit the form?. Make it "Yes".', 'metform'),
				]
			);
		}

		if( in_array('VALIDATION', $param ) ){
			$this->add_control(
				'mf_input_validation_type',
				[
					'label' => esc_html__( 'Validation type', 'metform' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'none' => esc_html__( 'None', 'metform' ),
						'by_character_length'  => esc_html__( 'By character length', 'metform' ),
						'by_word_length'  => esc_html__( 'By Word length', 'metform' ),
						'by_expresssion_based' => esc_html__( 'By expression based', 'metform' ),
					],
				]
			);	
		}

		$this->add_control(
			'mf_input_min_length',
			[
				'label' => esc_html__( 'Min Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'condition' => [
					'mf_input_validation_type' => ['by_character_length', 'by_word_length']
				],
			]
		);
		$this->add_control(
			'mf_input_max_length',
			[
				'label' => esc_html__( 'Max Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
				'condition' => [
					'mf_input_validation_type' => ['by_character_length', 'by_word_length']
				],
			]
		);

		if( class_exists('\MetForm_Pro\Base\Package') ){
			$this->add_control(
				'mf_input_validation_expression',
				[
					'label' => esc_html__( 'Expression for validate ', 'metform' ),
					'type' => Controls_Manager::TEXTAREA,
					'rows' => 2,
					'placeholder' => esc_html__( 'Ex: [a-zA-Z]+ ', 'metform' ),
					'condition' => [
						'mf_input_validation_type' => 'by_expresssion_based'
					],
				]
			);	
		}

		$this->add_control(
			'mf_input_validation_warning_message',
			[
				'label' => esc_html__( 'Warning message', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Warning message', 'metform' ),
				'default' => esc_html__( 'Something went wrong.', 'metform' ),
				'condition' => [
					'mf_input_validation_type!' => 'none',
				],
			]
		);

		// $this->add_control(
		// 	'mf_input_readonly_status',
		// 	[
		// 		'label' => esc_html__( 'Read Only', 'metform' ),
		// 		'type' => Controls_Manager::SWITCHER,
		// 		'readonly' => esc_html__( 'On', 'metform' ),
		// 		'' => esc_html__( 'Off', 'metform' ),
		// 		'return_value' => 'readonly',
		// 		'default' => '',
		// 		'description' => esc_html__('Want to make readonly input field? User will be unable to input here. Just user can see it.', 'metform'),
		// 	]
		// );

	}

	protected function input_general_control(){

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_input_label_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-input-wrapper',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mf_input_label_border',
				'label' => esc_html__( 'Border', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-input-wrapper',
			]
		);
		$this->add_responsive_control(
            'mf_input_label_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'metform' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px','%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mf-input-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_border_border!' => '',
                ],
            ]
		);
		
	}
	
    protected function input_label_controls($param = []){
		$this->add_control(
			'mf_input_label_width',
			[
				'label' => esc_html__( 'Width', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => '%',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .mf-input' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .mf-input-wrapper > .iti' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .range-slider' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .mf-input-wrapper .flatpickr-calendar, {{WRAPPER}} .mf-input-wrapper .flatpickr-calendar.hasTime.noCalendar' => 'left: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}} .mf-input-wrapper .select2-container' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px) !important',
				],
				'condition'    => [
                    'mf_input_label_display_property' => 'inline-block',
                ],
			]
		);

		$this->add_control(
			'mf_input_label_color',
			[
                'label' => esc_html__( 'Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'color: {{VALUE}}',
				],
				'default' => '#000000',
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_label_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-input-label',
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_responsive_control(
			'mf_input_label_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);
		$this->add_responsive_control(
			'mf_input_label_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);

		$this->add_control(
			'mf_input_required_indicator_color',
			[
				'label' => esc_html__( 'Required indicator color : ', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .mf-input-label .mf-input-required-indicator, {{WRAPPER}} .mf-input-wrapper .error,{{WRAPPER}} .mf-field-error .mf-input-calculation-total, {{WRAPPER}} .mf-field-error .mf-input-rating .star .mf-star' => 'color: {{VALUE}}',
					'{{WRAPPER}} .mf-input-wrapper.mf-field-error .mf-input, {{WRAPPER}} .mf-input-wrapper.mf-field-error .select2-container .select2-selection--multiple .select2-selection__rendered'	=> 'border-color: {{VALUE}}',

					'{{WRAPPER}} .mf-input-wrapper.mf-field-error .metform-btn' => 'background-color: {{VALUE}}',

					'{{WRAPPER}} .mf-input-wrapper.mf-field-error .mf-input-switch .mf-input-control-label::before' => 'border: 1px solid  {{VALUE}}'
				],
				// 'condition'    => [
                //     'mf_input_required' => 'yes',
                // ],
			]
		);
		
    }

	protected function input_controls($param = []){

		$this->add_responsive_control(
			'mf_input_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-input-wrapper .range-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
					'{{WRAPPER}} .mf-input-calculation-total' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'mf_input_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--open .select2-dropdown--below' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-input-wrapper .range-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-calculation-total' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		if(!in_array('ONLY_BOX_SHADOW', $param)){

			$this->start_controls_tabs( 'mf_input_tabs_style' );

			$this->start_controls_tab(
				'mf_input_tabnormal',
				[
					'label' =>esc_html__( 'Normal', 'metform' ),
				]
			);
	
			$this->add_control(
				'mf_input_color',
				[
					'label' => esc_html__( 'Input Color', 'metform' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .mf-input, {{WRAPPER}} {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-dial-code' 				=> 'color: {{VALUE}}',
						'{{WRAPPER}} .irs--round .irs-bar, {{WRAPPER}} .irs--round .irs-from, {{WRAPPER}} .irs--round .irs-to, {{WRAPPER}} .irs--round .irs-single'		=> 'background-color: {{VALUE}}',
						'{{WRAPPER}} .irs--round .irs-handle'	=> 'border-color: {{VALUE}}',
						'{{WRAPPER}} .irs--round .irs-from:before, {{WRAPPER}} .irs--round .irs-to:before, {{WRAPPER}} .irs--round .irs-single:before'	=> 'border-top-color: {{VALUE}}',
	
						'{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered,{{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-dropdown, {{WRAPPER}} .mf-input-wrapper .select2-container--default ul.select2-results__options .select2-results__option[aria-selected=true], {{WRAPPER}} span.select2-dropdown input, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice, {{WRAPPER}} .select2-container--default .select2-selection--multiple .select2-selection__choice__remove'	=> 'color: {{VALUE}}',
	
	
						'{{WRAPPER}} .mf-input-wrapper .asRange .asRange-pointer:before, {{WRAPPER}} .mf-input-wrapper .asRange .asRange-pointer .asRange-tip:before, {{WRAPPER}} .mf-input-wrapper .asRange .asRange-selected' 				=> 'background-color: {{VALUE}}',
						'{{WRAPPER}}  .mf-input-wrapper .asRange .asRange-pointer .asRange-tip'	=> 'background-color: {{VALUE}}; border-color: {{VALUE}}',
						'{{WRAPPER}} .mf-input-file-upload-label, {{WRAPPER}} .mf-input-calculation-total' => 'color: {{VALUE}};',
						'{{WRAPPER}} .mf-input-file-upload-label svg path'	=> 'stroke: {{VALUE}}; fill: {{VALUE}};',
					],
					'default' => '#000000',
				]
			);
	
			if(!in_array('NO_BACKGROUND', $param)){
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'mf_input_background',
						'label' => esc_html__( 'Background', 'metform' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .mf-input, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option, {{WRAPPER}} span.select2-dropdown, {{WRAPPER}} span.select2-dropdown input, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice, {{WRAPPER}} .select2-container--default .select2-selection--multiple .select2-selection__choice__remove, {{WRAPPER}} .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total',
					]
				);
			}
	
			if(!in_array('NO_BORDER', $param)){
				
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'mf_input_border',
						'label' => esc_html__( 'Border', 'metform' ),
						'selector' => '{{WRAPPER}} .mf-input, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .select2-container--default .select2-results>.select2-results__options, {{WRAPPER}} .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total',
					]
				);
			}
	
	
			$this->end_controls_tab();
	
			$this->start_controls_tab(
				'mf_input_tabhover',
				[
					'label' =>esc_html__( 'Hover', 'metform' ),
				]
			);
	
			$this->add_control(
				'mf_input_color_hover',
				[
					'label' => esc_html__( 'Input Color', 'metform' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .mf-input:hover, {{WRAPPER}} .mf-input-wrapper:hover .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-wrapper:hover .iti--separate-dial-code .iti__selected-dial-code' => 'color: {{VALUE}}',
						'{{WRAPPER}} .irs--round .irs-handle:hover'	=> 'border-color: {{VALUE}}',
	
						'{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered:hover,{{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:hover, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-dropdown:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default ul.select2-results__options .select2-results__option[aria-selected=true]:hover, {{WRAPPER}} span.select2-dropdown input:hover, {{WRAPPER}} span.select2-dropdown:hover, {{WRAPPER}} span.select2-dropdown input:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:hover .select2-selection__choice__remove,{{WRAPPER}} .mf-file-upload-container:hover .mf-input-file-upload-label, {{WRAPPER}} .mf-file-upload-container:hover .mf-image-label, {{WRAPPER}} .mf-input-calculation-total:hover'	=> 'color: {{VALUE}}',

						'{{WRAPPER}} .mf-file-upload-container:hover .mf-input-file-upload-label svg path' => 'stroke:{{VALUE}}; fill: {{VALUE}}',
	
						'{{WRAPPER}} .mf-input-wrapper .asRange .asRange-pointer:hover:before' => 'background-color: {{VALUE}}'
					],
					'default' => '#000000',
				]
			);
	
			if(!in_array('NO_BACKGROUND', $param)){
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'mf_input_background_hover',
						'label' => esc_html__( 'Background', 'metform' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .mf-input:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single:hover, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:hover, {{WRAPPER}} span.select2-dropdown:hover, {{WRAPPER}} span.select2-dropdown input:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:hover .select2-selection__choice__remove, {{WRAPPER}} .mf-file-upload-container:hover .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper:hover .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total:hover',
					]
				);
			}
	
			if(!in_array('NO_BORDER', $param)){
				
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'mf_input_border_hover',
						'label' => esc_html__( 'Border', 'metform' ),
						'selector' => '{{WRAPPER}} .mf-input:hover, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single:hover, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field:hover, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:hover, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered:hover, {{WRAPPER}} .mf-file-upload-container:hover .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper:hover .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total:hover',
					]
				);
			}
	
	
	
			$this->end_controls_tab();
	
			$this->start_controls_tab(
				'mf_input_tabfocus',
				[
					'label' =>esc_html__( 'Focus', 'metform' ),
				]
			);
	
			$this->add_control(
				'mf_input_color_focus',
				[
					'label' => esc_html__( 'Input Color', 'metform' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .mf-input:focus, {{WRAPPER}} .mf-input-wrapper:focus .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-wrapper:focus .iti--separate-dial-code .iti__selected-dial-code' => 'color: {{VALUE}}',
						'{{WRAPPER}} .irs--round .irs-handle:focus'	=> 'border-color: {{VALUE}}',
	
						'{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered:focus,{{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:focus, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-dropdown:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default ul.select2-results__options .select2-results__option[aria-selected=true]:focus, {{WRAPPER}} span.select2-dropdown input:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:focus .select2-selection__choice__remove, {{WRAPPER}} .mf-file-upload-container:focus .mf-input-file-upload-label, {{WRAPPER}} .mf-file-upload-container:focus .mf-image-label, {{WRAPPER}} .mf-input-calculation-total:focus'	=> 'color: {{VALUE}};',

						'{{WRAPPER}} .mf-file-upload-container:focus .mf-input-file-upload-label svg path'	=> 'stroke: {{VALUE}}; fill: {{VALUE}};',
	
						'{{WRAPPER}} .mf-input-wrapper .asRange .asRange-pointer:focus:before' => 'background-color: {{VALUE}}'
					],
					'default' => '#000000',
				]
			);
	
			if(!in_array('NO_BACKGROUND', $param)){
		
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'mf_input_background_focus',
						'label' => esc_html__( 'Background', 'metform' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .mf-input:focus,  {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single:focus, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:focus, {{WRAPPER}} span.select2-dropdown:focus, {{WRAPPER}} span.select2-dropdown input:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--multiple .select2-selection__choice:focus .select2-selection__choice__remove, {{WRAPPER}} .mf-file-upload-container:focus .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper:focus .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total:focus',
					]
				);
	
			}
	
			if(!in_array('NO_BORDER', $param)){
	
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'mf_input_border_focus',
						'label' => esc_html__( 'Border', 'metform' ),
						'selector' => '{{WRAPPER}} .mf-input:focus, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single:focus, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field:focus, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option:focus, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered:focus, {{WRAPPER}} .mf-file-upload-container:focus .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper:focus .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total:focus',
					]
				);
			}
	
	
			$this->end_controls_tab();
	
			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'mf_input_typgraphy',
					'label' => esc_html__( 'Typography', 'metform' ),
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .mf-input, {{WRAPPER}} .irs--round .irs-single, {{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered,{{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-dropdown, {{WRAPPER}} .mf-input-wrapper .select2-container--default ul.select2-results__options .select2-results__option[aria-selected=true], {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .asRange .asRange-pointer .asRange-tip, {{WRAPPER}} .mf-file-upload-container .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total',
				]
			);

		}
		
		$this->add_responsive_control(
			'mf_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px','%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-file-upload-container .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total'  => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_input_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-input, {{WRAPPER}} .irs--round .irs-line, {{WRAPPER}} .select2-container, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-dropdown, {{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-input-switch label.mf-input-control-label:before, {{WRAPPER}} .mf-input-wrapper .asRange, {{WRAPPER}} .asRange .asRange-pointer:before, {{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .mf-file-upload-container .mf-input-file-upload-label, {{WRAPPER}} .mf-input-wrapper .iti--separate-dial-code .iti__selected-flag, {{WRAPPER}} .mf-input-calculation-total',
			]
		);
		
	}

	protected function input_place_holder_controls(){

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_place_holder_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .text, {{WRAPPER}} .mf-input::placeholder',
			]
		);

        $this->add_control(
			'mf_input_placeholder_color',
			[
				'label' => esc_html__( 'Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
                    '{{WRAPPER}} .mf-input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mf-input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mf-input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .mf-input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-moz-placeholder' => 'color: {{VALUE}};',

					'{{WRAPPER}} .mf-input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mf-input::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mf-input:-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .mf-input:-moz-placeholder' => 'color: {{VALUE}};',
				],
				'default' => '#c9c1c1',
			]
		);
	}

	protected function input_help_text_controls(){

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_help_text_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-input-help',
			]
		);

		$this->add_control(
			'mf_input_help_text_color',
			[
				'label' => esc_html__( 'Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-input-help' => 'color: {{VALUE}}',
				],
				'default' => '#939393',
			]
		);

		$this->add_responsive_control(
			'mf_input_help_text_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input-help' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}


}