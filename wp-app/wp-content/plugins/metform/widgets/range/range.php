<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Range extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-range';
    }
    
	public function get_title() {
		return esc_html__( 'Range Slider', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	
	public function get_keywords() {
        return ['metform', 'input', 'slider', 'range'];
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
			'mf_input_min_length_range',
			[
				'label' => esc_html__( 'Min Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
			]
		);
		$this->add_control(
			'mf_input_max_length_range',
			[
				'label' => esc_html__( 'Max Length', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'step' => 1,
			]
		);
		
		$this->add_control(
			'mf_input_range_default_value',
			[
				'label' => esc_html__( 'Default Value', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'description'	=> esc_html__('For range use comma ,')
			]
		);

		$this->add_control(
			'mf_input_steps_control',
			[
				'label' => esc_html__( 'steps', 'metform' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
			]
		);

		$this->add_control(
			'mf_input_range_control',
			[
				'label' => __( 'Input as range : ', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'true' => __( 'Yes', 'metform' ),
				'false' => __( 'No', 'metform' ),
				'return_value' => 'true',
				'default' => 'false',
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

        $this->input_controls(['NO_BACKGROUND','NO_BORDER']);

		$this->end_controls_section();

		$this->start_controls_section(
			'mf_range_input_counter',
			[
				'label' => esc_html__( 'Counter', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'mf_range_input_counter_width',
			[
				'label' => esc_html__( 'Width', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 36	,
                ],
				'selectors' => [
					'{{WRAPPER}} .asRange .asRange-pointer .asRange-tip' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'mf_range_input_counter_height',
			[
				'label' => esc_html__( 'Height', 'metform' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
				'selectors' => [
					'{{WRAPPER}} .asRange .asRange-pointer .asRange-tip' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
				]
			]
		);


		$this->add_control(
            'mf_range_input_counter_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'metform' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .asRange .asRange-pointer .asRange-tip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
			<label class="mf-input-label" for="mf-input-range-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
		?>
		
		<div class="range-slider">

		<?php
			$default_value = '';
			if(!empty($mf_input_range_default_value)){
				if(is_numeric($mf_input_range_default_value)){
					$default_value = $mf_input_range_default_value;
				} elseif (is_string($mf_input_range_default_value)) {
	
					$split_text = explode(',', $mf_input_range_default_value);


					if(is_numeric(trim($split_text[0])) && is_numeric(trim($split_text[1]))){
						$default_value = trim($split_text[0]) . ',' . trim($split_text[1]);
					}
					
				}
			}

			
			// if(($default_value == $mf_input_min_length_range) && ($default_value == $mf_input_max_length_range)){
			// 	$default_value = $mf_input_min_length_range + 1;
			// } elseif ($default_value >= $mf_input_max_length_range) {
			// 	$default_value = $mf_input_max_length_range;
			// }  elseif ($default_value <= $mf_input_min_length_range) {
			// 	$default_value = $mf_input_min_length_range - 1;
			// }
		?>

			<input class="mf-input mf-rs-range <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" id="mf-input-range-<?php echo esc_attr($this->get_id()); ?>" 
				name="<?php echo esc_attr($mf_input_name); ?>" 
				<?php //echo esc_attr(($mf_input_required === 'yes') ? 'required' : '')?>
				<?php //echo esc_attr($mf_input_readonly_status); ?>
				value="<?php echo esc_attr($default_value); ?>"
				min="<?php echo esc_attr(($mf_input_min_length_range != '') ? $mf_input_min_length_range : 1); ?>"
				max="<?php echo esc_attr(($mf_input_max_length_range != '') ? $mf_input_max_length_range : 100); ?>"
				step="<?php echo esc_attr($mf_input_steps_control);?>"
				range="<?php echo $mf_input_range_control;?>"
			>
			
		</div>


		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}