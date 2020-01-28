<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Recaptcha extends Widget_Base{
    
    // public function __construct( $data = [], $args = null ) {
	// 	parent::__construct( $data, $args );
	// 	$this->add_script_depends('recaptcha-v2');
	// }

    public function get_name() {
		return 'mf-recaptcha';
    }
    
	public function get_title() {
		return esc_html__( 'reCAPTCHA', 'metform' );
    }

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'captcha', 'recaptcha', 'google'];
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
			'mf_recaptcha_notice_info',
			[
				'label' => esc_html__( 'reCAPTCHA configure: ', 'metform-pro' ),
				'type' => Controls_Manager::RAW_HTML,
				'raw' => \MetForm\Utils\Util::kses( 'Turn on recaptcha from form setting.<br>Then you have to must configure recaptcha site and secret key from MetForm -> Settings <a target="__blank" href="'.get_dashboard_url().'admin.php?page=metform-menu-settings'.'">from here.</a><br><a target="__blank" href="https://help.wpmet.com/docs/form-settings/#2-recaptcha-integration">See Documentation.</a>', 'metform-pro' ),
				'content_classes' => 'mf-input-map-api-notice',
			]
		);

		$this->add_control(
			'mf_recaptcha_class_name',
			[
				'label' => esc_html__( 'Add Extra Class Name : ', 'metform' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

	}

    protected function render($instance = []){
        $settings = $this->get_settings_for_display();
		extract($settings);

		$recaptcha_setting = \MetForm\Core\Admin\Base::instance()->get_settings_option();

		$mf_recaptcha_type = ((isset($recaptcha_setting['mf_recaptcha_version']) && ($recaptcha_setting['mf_recaptcha_version'] != '')) ? $recaptcha_setting['mf_recaptcha_version'] : 'recaptcha-v2');

		echo "<div class='mf-input-wrapper'>";

		if($mf_recaptcha_type == 'recaptcha-v2') {
			?>
			<div id="recaptcha_site_key" class="recaptcha_site_key <?php echo esc_attr($mf_recaptcha_class_name); ?>"></div>
			<?php
			if(('metform-form' == get_post_type() || 'page' == get_post_type()) && \Elementor\Plugin::$instance->editor->is_edit_mode()){
				echo "<div class='attr-alert attr-alert-warning'>".esc_html__('reCAPTCHA V2 will be shown on preview.', 'metform')."</div>";
			}
			wp_enqueue_script('recaptcha-v2');
		}

		if($mf_recaptcha_type == 'recaptcha-v3'){
			?>
			<div id="recaptcha_site_key_v3" class="recaptcha_site_key_v3 <?php echo esc_attr($mf_recaptcha_class_name); ?>">
				<input type="hidden" class="g-recaptcha-response-v3" name="g-recaptcha-response-v3">
			</div>
			<?php
			if(('metform-form' == get_post_type() || 'page' == get_post_type()) && \Elementor\Plugin::$instance->editor->is_edit_mode()){
				echo "<div class='attr-alert attr-alert-warning'>".esc_html__('reCAPTCHA V3 will be shown on preview.', 'metform')."</div>";
			}
			wp_enqueue_script('recaptcha-v3');
		}
		echo '</div>';

    }
    
}