<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Rating extends Widget_Base{

    use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-rating';
    }
    
	public function get_title() {
		return esc_html__( 'Rating', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
    }
    
	public function get_keywords() {
        return ['metform', 'input', 'rating', 'feedback', 'rate'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_content_controls(['NO_PLACEHOLDER']);

        $this->end_controls_section();

        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->input_setting_controls();
        
        $this->add_control(
            'mf_input_rating_number',
            [
                'label' => esc_html__( 'Number of rating star : ', 'metform' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 10,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->end_controls_section();

        if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}
		
        $this->start_controls_section(
			'label_section',
			[
				'label' => esc_html__( 'Label', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
        );

		$this->input_label_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'mf_input_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--default .select2-search--dropdown .select2-search__field, {{WRAPPER}} .mf-input-wrapper ul.select2-results__options .select2-results__option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-input-wrapper .range-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .mf-input-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .select2-container--open .select2-dropdown--below' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mf-input-wrapper .select2-container .select2-selection--multiple .select2-selection__rendered, {{WRAPPER}} .mf-input-wrapper .range-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
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
                    '{{WRAPPER}} .mf-input-rating .star .mf-star' => 'color: {{VALUE}}',
                ],
                'default' => '#CCCCCC',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_input_border',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-rating .star',
            ]
        );

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
                    '{{WRAPPER}} .mf-input-rating .star.hover i.mf-star' => 'color: {{VALUE}}',
                ],
                'default' => '#ffdb72',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_input_border_hover',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-rating .star.hover',
            ]
        );


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
                    '{{WRAPPER}} .mf-input-rating .star.selected i.mf-star' => 'color: {{VALUE}}',
                ],
                'default' => '#ffdb72',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mf_input_border_focus',
                'label' => esc_html__( 'Border', 'metform' ),
                'selector' => '{{WRAPPER}} .mf-input-rating .star.selected',
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mf_input_typgraphy',
                'label' => esc_html__( 'Typography', 'metform' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} ..mf-input-rating .star',
            ]
        );
		
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
					'{{WRAPPER}} .mf-input-rating' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition'    => [
                    'mf_input_border_border!' => '',
                ],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mf_input_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'metform' ),
				'selector' => '{{WRAPPER}} .mf-input-rating',
			]
		);

        $this->end_controls_section();
		
        $this->start_controls_section(
			'help_text_section',
			[
				'label' => esc_html__( 'Help Text', 'metform' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
					'mf_input_help_text!' => ''
				]
			]
		);
		
		$this->input_help_text_controls();

        $this->end_controls_section();

        
	}

    protected function render($instance = []){
		$settings = $this->get_settings_for_display();
		extract($settings);
		
		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		echo "<div class='mf-input-wrapper'>";

		if($mf_input_label_status == 'yes'){
			?>
			<label class="mf-input-label" for="mf-input-rating"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
        ?>
        <ul class=" mf-input-rating">
            <?php for($i = 1; $i <= $mf_input_rating_number; $i++ ):?>
                <li class="star-li star  <?php if($i == 1){echo 'selected';}?>" data-value="<?php echo esc_attr($i);?>">
                <i class="mf-star dashicons-before dashicons-star-filled"></i>
                </li>
                <?php endfor;?>
        </ul>

        <input type="hidden" class="mf-input mf-input-hidden <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" id="mf-input-<?php echo esc_attr($this->get_id()); ?>"
          name="<?php echo esc_attr($mf_input_name); ?>" value="1"
          <?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : '')?>
        />
        
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}