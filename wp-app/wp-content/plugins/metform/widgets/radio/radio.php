<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Radio extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-radio';
    }
    
	public function get_title() {
		return esc_html__( 'Radio', 'metform' );
	}
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	
	public function get_keywords() {
        return ['metform', 'input', 'radio', 'check'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

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
					'{{WRAPPER}} .mf-radio-label' => 'display: {{VALUE}}; vertical-align: top',
					'{{WRAPPER}} .mf-radio' => 'display: inline-block',
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
				'label' => esc_html__( 'Input Label : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_title(),
				'title' => esc_html__( 'Enter here label of input', 'metform' ),
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);

		$this->add_control(
			'mf_input_name',
			[
				'label' => esc_html__( 'Name', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_name(),
				'title' => esc_html__( 'Enter here name of the input', 'metform' ),
				'description' => esc_html__('Name is must required. Enter name without space or any special character. use only underscore/ hyphen (_/-) for multiple word.', 'metform'),
			]
		);

		$this->add_control(
			'mf_input_display_option',
			[
				'label' => esc_html__( 'Option Display : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'inline-block'  => esc_html__( 'Horizontal', 'metform' ),
					'block' => esc_html__( 'Vertical', 'metform' ),
                ],
                'default' => 'inline-block',
                'selectors' => [
                    '{{WRAPPER}} .mf-radio-option' => 'display: {{VALUE}};',
				],
				'description' => esc_html__('Radio option display style.', 'metform'),
			]
        );

        $this->add_control(
			'mf_input_option_text_position',
			[
				'label' => esc_html__( 'Option Text Position : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'after'  => esc_html__( 'After Radio', 'metform' ),
					'before' => esc_html__( 'Before Radio', 'metform' ),
                ],
				'default' => 'after',
				'description' => esc_html__('Where do you want to label?', 'metform'),
			]
        );

        $input_fields = new Repeater();

        $input_fields->add_control(
            'mf_input_option_text', [
                'label' => esc_html__( 'Radio Option Text', 'metform' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Option Text' , 'metform' ),
				'label_block' => true,
				'description' => esc_html__('Select option text that will be show to user.', 'metform'),
            ]
        );
        $input_fields->add_control(
            'mf_input_option_value', [
                'label' => esc_html__( 'Option Value', 'metform' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Option Value' , 'metform' ),
				'label_block' => true,
				'description' => esc_html__('Select option value that will be store/mail to desired person.', 'metform'),
            ]
        );
        $input_fields->add_control(
            'mf_input_option_status', [
                'label' => esc_html__( 'Option Status', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
					''  => esc_html__( 'Active', 'metform' ),
					'disabled' => esc_html__( 'Disable', 'metform' ),
                ],
                'default' => '',
				'label_block' => true,
				'description' => esc_html__('Want to make a option? which user can see the option but can\'t select it. make it disable.', 'metform'),
            ]
        );

        $this->add_control(
            'mf_input_list',
            [
                'label' => esc_html__( 'Radio Options', 'metform' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $input_fields->get_controls(),
                'default' => [
					[
						'mf_input_option_text' => 'Option 1',
						'mf_input_option_value' => 'value-1',
						'mf_input_option_status' => '',
					],
					[
						'mf_input_option_text' => 'Option 2',
						'mf_input_option_value' => 'value-2',
						'mf_input_option_status' => '',
					],
					[
						'mf_input_option_text' => 'Option 3',
						'mf_input_option_value' => 'value-3',
						'mf_input_option_status' => '',
					],
                ],
				'title_field' => '{{{ mf_input_option_text }}}',
				'description' => esc_html__('You can add/edit here your selector options.', 'metform'),
            ]
		);
		
		$this->add_control(
			'mf_input_help_text',
			[
				'label' => esc_html__( 'Help Text : ', 'metform' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'placeholder' => esc_html__( 'Type your help text here', 'metform' ),
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_setting_controls();

		$this->end_controls_section();

		if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}

        $this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__( 'Input Label', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'    => [
                    'mf_input_label_status' => 'yes',
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
					'{{WRAPPER}} .mf-radio-label' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .mf-radio-label',
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
					'{{WRAPPER}} .mf-radio-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .mf-radio-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_input_label_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-radio-label',
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
		);

		$this->add_control(
			'mf_input_required_indicator_color',
			[
				'label' => esc_html__( 'Required indicator color:', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .mf-input-label .mf-input-required-indicator, {{WRAPPER}} .mf-input-wrapper.mf-field-error .mf-radio-option,  {{WRAPPER}} .mf-input-wrapper .error' => 'color: {{VALUE}}',
				],
				// 'condition'    => [
                //     'mf_input_required' => 'yes',
                // ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'radio_option_section',
            [
                'label' => esc_html__('Radio', 'metform'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
			'mf_input_option_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'mf_input_option_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mf_input_option_color',
			[
				'label' => esc_html__( 'Text Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option' => 'color: {{VALUE}}',
				],
				'default' => '#000000',
			]
		);

		$this->start_controls_tabs('mf_input_option_icon_color_control');

		$this->start_controls_tab(
			'mf_input_option_icon_color_tabnormal',
			[
				'label' =>esc_html__( 'Normal', 'metform' ),
			]
		);

		$this->add_control(
			'mf_input_option_icon_color',
			[
				'label' => esc_html__( 'Radio Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option input[type="radio"] + span:before' => 'color: {{VALUE}}'
				],
				'default' => '#747474',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'mf_input_option_icon_color_tabchecked',
			[
				'label' =>esc_html__( 'Checked', 'metform' ),
			]
		);

		$this->add_control(
			'mf_input_option_icon_color_checked',
			[
				'label' => esc_html__( 'Radio Color', 'metform' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option input[type="radio"]:checked + span:before' => 'color: {{VALUE}}'
				],
				'default' => '#4285F4',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'mf_input_option_icon_horizontal_position',
			[
				'label' => esc_html__( 'Horizontal position of icon', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option input[type="radio"] + span:before' => 'top: {{SIZE}}{{UNIT}}',
				]
			]
		);


		$this->add_responsive_control(
			'mf_input_option_space_between',
			[
				'label' => esc_html__( 'Add space after radio', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
				'selectors' => [
					'{{WRAPPER}} .mf-radio-option input[type="radio"] + span:before' => 'width: {{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_typgraphy',
				'label' => esc_html__( 'Typography for icon', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'exclude' => [ 'font_family', 'text_transform', 'font_style', 'text_decoration', 'letter_spacing' ],
				'selector' => '{{WRAPPER}} .mf-radio, {{WRAPPER}} .mf-radio-option input[type="radio"] + span:before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_input_typgraphy_text',
				'label' => esc_html__( 'Typography for text', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-radio, {{WRAPPER}} .mf-radio-option input[type="radio"] + span',
			]
        );

		$this->end_controls_section();
		

		$this->start_controls_section(
			'mf_input_help_text_section',
			[
				'label' => esc_html__( 'Help Text', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'mf_input_help_text!' => ''
				]
			]
		);
		
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

		$this->end_controls_section();

        
	}

    protected function render($instance = []){
		$settings = $this->get_settings_for_display();
        extract($settings);

		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		echo "<div class='mf-input-wrapper'>";
		
		if($mf_input_label_status == 'yes'){
			?>
			<label class="mf-radio-label mf-input-label" for="mf-input-radio-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
		?>
		<div class="mf-radio" id="mf-input-radio-<?php echo esc_attr($this->get_id()); ?>">
            <?php
            foreach($mf_input_list as $option){
                ?>
                <div class="mf-radio-option <?php echo esc_attr($option['mf_input_option_status']); ?>">
					<label><?php echo esc_html(($mf_input_option_text_position == 'before') ? $option['mf_input_option_text']:''); ?>
						<input type="radio" class="mf-input mf-radio-input <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" name="<?php echo esc_attr($mf_input_name); ?>" 
						value="<?php echo esc_attr($option['mf_input_option_value']); ?>" 
						<?php echo esc_attr($option['mf_input_option_status']); ?>
						<?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : '')?>
						>
						<span><?php echo esc_html(($mf_input_option_text_position == 'after') ? $option['mf_input_option_text']:''); ?></span>
					</label>
                </div>
                <?php
            }
            ?>
        </div>
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}