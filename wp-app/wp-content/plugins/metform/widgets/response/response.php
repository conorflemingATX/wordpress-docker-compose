<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Response extends Widget_Base{

    public function get_name() {
		return 'mf-response';
    }
    
	public function get_title() {
		return esc_html__( 'Response Message', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'response', 'success', 'submission', 'message'];
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
			'mf_response_class_name',
			[
				'label' => esc_html__( 'Add Extra Class Name : ', 'plugin-domain' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mf_response_padding',
			[
				'label' => esc_html__( 'Padding', 'metform' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .metform-msg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mf_response_typography',
				'label' => esc_html__( 'Typography', 'metform' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .metform-msg',
			]
		);

		$this->end_controls_section();

	}

    protected function render($instance = []){
		$settings = $this->get_settings_for_display();
		extract($settings);
        
        ?>
		<div class="attr-row">
			<div class="metform-msg attr-alert attr-alert-success <?php echo esc_attr($mf_response_class_name); ?>"><?php	
				if('metform-form' == get_post_type()){
					echo esc_html__('A message will show here, after submission.', 'metform');
				}
			?></div>
		</div>
        <?php
    }
    
}