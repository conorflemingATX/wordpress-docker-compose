<?php
namespace Elementor;
use \MetForm\Controls\Controls_Manager as MetForm_Controls_Manager;

defined( 'ABSPATH' ) || exit;

class Widget_Met_Form extends Widget_Base {

	public function get_name() {
		return 'metform';
    }
    
	public function get_title() {
		return esc_html__( 'MetForm', 'metform' );
	}

	public function show_in_panel() {
        return 'metform-form' != get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'form'];
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
            'important_note',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => 'See this video tutorial how to use metform. <a href="https://youtu.be/8R4-Q14cu-w" target="_blank">Click here</a>',
            ]
        );
		$this->add_control(
			'mf_form_id',
			[
				'label' => esc_html__( 'Select Form: ', 'metform' ),
				'type' => MetForm_Controls_Manager::FORMPICKER,
				'default' => '',
				'description' => esc_html__( 'Click on the "red" edit icon to edit form content.', 'metform' )
			]
		);

		$this->end_controls_section();
        
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings_for_display();
		$nav = !isset($settings['mf_form_multistep_display_nav']) ? '' : ' mf-form-multistep-nav-'.$settings['mf_form_multistep_display_nav'];
		$direction = !isset($settings['mf_form_multistep_slide_direction']) ? '' : ' mf_slide_direction_'. $settings['mf_form_multistep_slide_direction'];

		echo '<div class=" ' . $direction .' '. (!isset($settings['mf_form_multistep_status']) ? '' : $settings['mf_form_multistep_status']) . $nav .'">';
			// echo (!isset($settings['mf_form_multistep_status']) ? '' : $settings['mf_form_multistep_status']); // test//
			echo \MetForm\Controls\Form_Picker_Utils::parse($settings['mf_form_id'], $this->get_id());
		echo '</div>';
	}
}

