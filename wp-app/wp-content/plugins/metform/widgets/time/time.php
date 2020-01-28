<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Time extends Widget_Base{
	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-time';
    }
    
	public function get_title() {
		return esc_html__( 'Time', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'time', 'clock'];
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

		$this->input_setting_controls();

		$this->add_control(
			'mf_input_time_24h',
			[
				'label' => esc_html__( 'Use time 24H', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'metform' ),
				'label_off' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'no',
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

        $this->input_controls();

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
			<label class="mf-input-label" for="mf-input-time-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
        ?>
		<input type="time" class="mf-input mf-input-time <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" id="mf-input-time-<?php echo esc_attr($this->get_id()); ?>" 
			name="<?php echo esc_attr($mf_input_name); ?>"
			placeholder="<?php echo esc_html($mf_input_placeholder); ?>"
			<?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : '')?>
			<?php echo esc_attr(($mf_input_time_24h === 'yes') ? 'data-mftime24h=yes' : '')?>
			<?php //echo esc_attr($mf_input_readonly_status); ?>
		>
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }

}