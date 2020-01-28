<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Date extends Widget_Base{
	use \MetForm\Traits\Common_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-date';
    }
    
	public function get_title() {
		return esc_html__( 'Date', 'metform' );
	}

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'input', 'date', 'calendar'];
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
			'mf_input_min_date',
			[
				'label' => esc_html__( 'Set minimum date : ', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],
			]
		);

		$this->add_control(
			'mf_input_max_date',
			[
				'label' => esc_html__( 'Set maximum date : ', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'mf_input_disable_date',
			[
				'label' => esc_html__( 'Disable date : ', 'metform' ),
				'type' => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'enableTime' => false,
				],
			]
		);

		$this->add_control(
			'mf_input_disable_date_list',
			[
				'label' => __( 'Disable date  List', 'plugin-domain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ mf_input_disable_date }}}',
			]
		);


		$this->add_control(
			'mf_input_range_date',
			[
				'label' => esc_html__( 'Range date input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'metform' ),
				'label_off' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'mf_input_year_select',
			[
				'label' => esc_html__( 'Year input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_month_select',
			[
				'label' => esc_html__( 'Month input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_date_select',
			[
				'label' => esc_html__( 'Date input ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'no' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_date_format_all',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-d-Y',
				'options' => [
					'Y-m-d'  => esc_html__( 'YYYY-MM-DD', 'metform' ),
					'd-m-Y'  => esc_html__( 'DD-MM-YYYY', 'metform' ),
					'm-d-Y'  => esc_html__( 'MM-DD-YYYY', 'metform' ),
					'Y.m.d'  => esc_html__( 'YYYY.MM.DD', 'metform' ),
					'd.m.Y'  => esc_html__( 'DD.MM.YYYY', 'metform' ),
					'm.d.Y'  => esc_html__( 'MM.DD.YYYY', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_format_dm',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-d',
				'options' => [
					'm-d'  => esc_html__( 'MM-DD', 'metform' ),
					'd-m'  => esc_html__( 'DD-MM', 'metform' ),
					'm.d'  => esc_html__( 'MM.DD', 'metform' ),
					'd.m'  => esc_html__( 'DD.MM', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '!=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_format_ym',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'm-Y',
				'options' => [
					'm-Y'  => esc_html__( 'MM-YY', 'metform' ),
					'Y-m'  => esc_html__( 'YY-MM', 'metform' ),
					'm.Y'  => esc_html__( 'MM.YY', 'metform' ),
					'Y.m'  => esc_html__( 'YY.MM', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '!=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_format_yd',
			[
				'label' => esc_html__( 'Date format : ', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'd-Y',
				'options' => [
					'd-Y'  => esc_html__( 'DD-YY', 'metform' ),
					'Y-d'  => esc_html__( 'YY-DD', 'metform' ),
					'd.Y'  => esc_html__( 'DD.YY', 'metform' ),
					'Y.d'  => esc_html__( 'YY.DD', 'metform' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'mf_input_date_select',
							'operator' => '=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_month_select',
							'operator' => '!=',
							'value' => 'yes',
						],
						[
							'name'  => 'mf_input_year_select',
							'operator' => '=',
							'value' => 'yes',
						],
					]
				],
			]
		);

		$this->add_control(
			'mf_input_date_with_time',
			[
				'label' => esc_html__( 'Want to input time with it ?', 'metform' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'metform' ),
				'' => esc_html__( 'No', 'metform' ),
				'return_value' => 'yes',
				'default' => '',
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
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_date_calender_typography',
				'label' => esc_html__( 'Calendar Typography', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mf-input-wrapper .flatpickr-calendar',
				'exclude' => [ 'font_size', 'text_decoration', 'line_height', 'letter_spacing' ],
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

		if(is_array($mf_input_disable_date_list)){
			$disable_dates = [];
			foreach($mf_input_disable_date_list as $key => $value){
				$disable_dates[] = $value['mf_input_disable_date'];
			}
		}

		$date_format = (isset($mf_input_date_format_all) ? $mf_input_date_format_all : 
							(isset($mf_input_date_format_dm) ? $mf_input_date_format_dm :
								(isset($mf_input_date_format_yd) ? $mf_input_date_format_yd :
									(isset($mf_input_date_format_ym) ? $mf_input_date_format_ym :
										(($mf_input_year_select == 'yes') ? 'Y' :
											(($mf_input_month_select == 'yes') ? 'm' :
												(($mf_input_date_select == 'yes') ? 'd' : 'd-m-Y')))))));

		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');

		echo "<div class='mf-input-wrapper'>";
												
		if($mf_input_label_status == 'yes'){
			?>
			<label class="mf-input-label" for="mf-input-date-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '')?></span>
			</label>
			<?php
		}
        ?>
		<input type="text" class="mf-input mf-date-input <?php echo ((isset($mf_input_validation_type) && $mf_input_validation_type !='none') || isset($mf_input_required) && $mf_input_required === 'yes')  ? 'mf-input-do-validate' : ''; ?> <?php echo $class; ?>"
			placeholder="<?php echo esc_html($mf_input_placeholder); ?>"
			data-mfMinDate = "<?php echo esc_attr($mf_input_min_date); ?>"
			data-mfMaxDate= "<?php echo esc_attr($mf_input_max_date); ?>"
			data-mfRangeDate = "<?php echo esc_attr($mf_input_range_date); ?>"
			data-mfDateFormat="<?php echo esc_attr($date_format); ?>"
			data-mfEnableTime="<?php echo esc_attr($mf_input_date_with_time); ?>"
			data-mfDisableDates="<?php echo esc_attr(json_encode(isset($disable_dates) ? $disable_dates : '')); ?>"
			<?php echo esc_attr(($mf_input_required === 'yes') ? 'required' : ''); ?>
			<?php //echo esc_attr($mf_input_readonly_status); ?>
		>
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }

}