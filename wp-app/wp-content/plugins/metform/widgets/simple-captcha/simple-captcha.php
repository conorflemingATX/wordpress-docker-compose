<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Simple_Captcha extends Widget_Base{

    public function get_name() {
		return 'mf-simple-captcha';
    }
    
	public function get_title() {
		return esc_html__( 'Simple Captcha', 'metform' );
    }

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'captcha', 'simple captcha'];
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
				'label' => esc_html__( 'Label Position', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Top', 'metform' ),
					'inline-block' => esc_html__( 'Left', 'metform' ),
				],
				'condition' => [
					'mf_input_label_status' => 'yes',
				],
                'selectors' => [
					'{{WRAPPER}} .mf-input-label' => 'display: {{VALUE}}',
				],
				'description' => esc_html__('Select label position. where you want to see it. top of the input or left of the input.', 'metform'),

			]
		);

		$this->add_control(
			'mf_input_input_captcha_display',
			[
				'label' => esc_html__( 'Input captcha display', 'metform' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Block', 'metform' ),
					'inline' => esc_html__( 'Inline', 'metform' ),
				],
				'description' => esc_html__('Select input and captcha display property.', 'metform'),

			]
		);

		$this->add_control(
			'mf_input_label',
			[
				'label' => esc_html__( 'Label : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_title(),
				'title' => esc_html__( 'Enter here label of input', 'metform' ),
				'condition' => [
					'mf_input_label_status' => 'yes',
				],
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
			'label_section',
			[
				'label' => esc_html__( 'Label', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'    => [
                    'mf_input_label_status' => 'yes',
                ],
			]
        );

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
					'{{WRAPPER}} .mf-input-wrapper div:not(.mf-captcha-input-wrapper) .mf-input' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .mf-input-wrapper > .iti' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .range-slider' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px)',
					'{{WRAPPER}} .mf-input-wrapper .flatpickr-calendar, {{WRAPPER}} .mf-input-wrapper .flatpickr-calendar.hasTime.noCalendar' => 'left: {{SIZE}}{{UNIT}} !important',
					'{{WRAPPER}} .mf-input-wrapper .select2-container' => 'width: calc(100% - {{SIZE}}{{UNIT}} - 7px) !important',
					'{{WRAPPER}} .mf-input-wrapper .mf-captcha-input-wrapper' => 'max-width: calc(100% - {{SIZE}}{{UNIT}} - 7px); display: inline-block; vertical-align: middle;',
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

		$this->end_controls_section();
		
		$this->start_controls_section(
			'captcha_section',
			[
				'label' => esc_html__( 'Refresh Captcha', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'mf_input_refresh_captcha_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mf_input_refresh_captcha_margin',
			[
				'label' => esc_html__( 'Margin', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mf_input_refresh_captcha_color',
			[
				'label' => __( 'Color', 'metform' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mf-refresh-captcha' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();


	}

	public function render_script($path){
		?>
		    <script>
				var path = "<?php echo $path; ?>";
				var refreshButton = document.querySelectorAll(".mf-refresh-captcha");
				if(refreshButton.length > 0){
					refreshButton.forEach(function(v, i){
						v.onclick = function() {
							this.previousSibling.src = path+'/generate-captcha.php?' + Date.now();
						}
					});
				}
			</script>
		<?php
	}

    protected function render($instance = []){
        $settings = $this->get_settings_for_display();
		extract($settings);

		echo "<div class='mf-input-wrapper'>";

		if($mf_input_label_status == 'yes'){
			?>
			<label class="mf-input-label" for="mf-input-captcha-<?php echo esc_attr($this->get_id()); ?>">
				<?php echo esc_html($mf_input_label); ?>
			</label>
			<?php
		}
		?>
		<div class="mf-captcha-input-wrapper <?php echo esc_attr('mf-captcha-'.$mf_input_input_captcha_display); ?>">
			<img src="<?php echo plugin_dir_url( __FILE__ ); ?>generate-captcha.php" alt="CAPTCHA" height="50px" class="mf-input mf-captcha-image"><i class="fas fa-redo mf-refresh-captcha"></i>
			<input type="text" name="mf-captcha-challenge" class="mf-input mf-captcha-input" id="mf-input-captcha-<?php echo esc_attr($this->get_id()); ?>" placeholder="<?php esc_html_e('Entry captcha from the picture', 'metform')?>">
		</div>
		
		<?php
		echo '</div>';

		$this->render_script(plugin_dir_url( __FILE__ ));
    }
    
}