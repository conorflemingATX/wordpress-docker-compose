<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Multi_Select extends Widget_Base{

    use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-multi-select';
    }
    
	public function get_title() {
		return esc_html__( 'Multi Select', 'metform' );
    }

    public function show_in_panel() {
        return 'metform-form' == get_post_type();
    }
    
    public function get_categories() {
		return [ 'metform' ];
    }
    
	public function get_keywords() {
        return ['metform', 'input', 'select', 'multi select', 'dropdown', 'multiple dropdown'];
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

        $input_fields = new Repeater();

        $input_fields->add_control(
            'mf_input_option_text', [
                'label' => esc_html__( 'Input Field Text', 'metform' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Input Text' , 'metform' ),
                'label_block' => true,
                'description' => esc_html__('Select list text that will be show to user.', 'metform'),
            ]
        );
        $input_fields->add_control(
            'mf_input_option_value', [
                'label' => esc_html__( 'Input Field Value', 'metform' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Input Value' , 'metform' ),
                'label_block' => true,
                'description' => esc_html__('Select list value that will be store/mail to desired person.', 'metform'),
            ]
        );

        $input_fields->add_control(
            'mf_input_option_status', [
                'label' => esc_html__( 'Status', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
					'' => esc_html__( 'Enable', 'metform' ),
					'disabled'  => esc_html__( 'Disable', 'metform' ),
                ],
                'description' => esc_html__('Want to make a option? which user can see the option but can\'t select it. make it disable.', 'metform'),
            ]
        );

        $input_fields->add_control(
            'mf_input_option_selected', [
                'label' => esc_html__( 'Select it default ? ', 'metform' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
					'selected' => esc_html__( 'Yes', 'metform' ),
					''  => esc_html__( 'No', 'metform' ),
                ],
                'description' => esc_html__('Make this option default selected', 'metform'),
            ]
        );

        $this->add_control(
            'mf_input_list',
            [
                'label' => esc_html__( 'Multi Select List', 'metform' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $input_fields->get_controls(),
                'title_field' => '{{{ mf_input_option_text }}}',
                'default' => [
                    [
                        'mf_input_option_text' => 'Item 1',
                        'mf_input_option_value' => 'value-1',
                        'mf_input_option_status' => '',
                    ],
                    [
                        'mf_input_option_text' => 'Item 2',
                        'mf_input_option_value' => 'value-2',
                        'mf_input_option_status' => '',
                    ],
                    [
                        'mf_input_option_text' => 'Item 3',
                        'mf_input_option_value' => 'value-3',
                        'mf_input_option_status' => '',
                    ],
                ],
                'description' => esc_html__('You can add/edit here your selector options.', 'metform'),
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
            <label class="mf-input-label" for="mf-input-multi-select-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
                <span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
            </label>
			<?php
		}
        ?>
        <select class="mf-input mf-input-multiselect <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>" id="mf-input-multi-select-<?php echo esc_attr($this->get_id()); ?>" 
            name="<?php echo esc_attr($mf_input_name); ?>[]" 
            <?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : '');?>
            multiple="multiple"
        >
            <?php
            foreach($mf_input_list as $value){
                ?>
                <option value="<?php echo esc_attr($value['mf_input_option_value']); ?>"
                <?php echo esc_attr($value['mf_input_option_status']); ?>
                <?php echo esc_attr($value['mf_input_option_selected']); ?>
                >
                    <?php echo esc_html($value['mf_input_option_text']); ?>
                </option>
                <?php
            }
            ?>
        </select>

		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}