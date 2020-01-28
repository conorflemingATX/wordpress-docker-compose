<?php
namespace Elementor;

defined('ABSPATH') || exit;

Class MetForm_Input_Textarea extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-textarea';
    }
    
	public function get_title() {
		return esc_html__( 'Textarea', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'textarea', 'long text', 'paragraph'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_content_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->input_setting_controls(['VALIDATION']);

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

        $this->input_label_controls(['VERTICAL_POSITION']);

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'mf_textarea_field_height',
			[
				'label' => esc_html__( 'Height', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 150,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-textarea' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);

        $this->input_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'placeholder_section',
			[
				'label' => esc_html__( 'Place Holder', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->input_place_holder_controls();

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
		
		$validation = [
			'min_length' => isset($mf_input_min_length) ? $mf_input_min_length : '',
			'max_length' => isset($mf_input_max_length) ? $mf_input_max_length : '',
			'validation_type' => isset($mf_input_validation_type) ? $mf_input_validation_type : '',
			'expression' => isset($mf_input_validation_expression) ? $mf_input_validation_expression : '',
			'warning_message' => isset($mf_input_validation_warning_message) ? $mf_input_validation_warning_message : '',
		];
		
		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		echo "<div class='mf-input-wrapper'>";
		
		if($mf_input_label_status == 'yes'){
			?>
			<label class="mf-input-label" for="mf-input-text-area-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
        ?>
		<textarea class="mf-input mf-textarea <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" id="mf-input-text-area-<?php echo esc_attr($this->get_id()); ?>"
			name="<?php echo esc_attr($mf_input_name); ?>" 
			placeholder="<?php echo esc_html($mf_input_placeholder); ?>" 
			data-validation = "<?php echo esc_attr(json_encode($validation)); ?>"
			<?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : '')?>
			<?php //echo esc_attr($mf_input_readonly_status); ?> 
			cols="30" rows="10"
		></textarea>
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}