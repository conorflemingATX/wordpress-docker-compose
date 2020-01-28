<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Summary extends Widget_Base{

	use \MetForm\Traits\Common_Controls;
    use \MetForm\Traits\Conditional_Controls;
    
    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
        $this->add_script_depends('metform-summary');
    }

    public function get_name() {
		return 'mf-summary';
    }
    
	public function get_title() {
		return esc_html__( 'Summary', 'metform' );
	}
	
	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}
	    
	public function get_keywords() {
        return ['metform', 'input', 'summary', 'preview'];
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

		$this->input_label_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'input_section',
			[
				'label' => esc_html__( 'Input', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        //$this->input_controls();

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
			<label class="mf-input-label" for="mf-input-text-<?php echo esc_attr($this->get_id()); ?>"><?php echo esc_html($mf_input_label); ?>
				<span class="mf-input-required-indicator"><?php echo esc_html(($mf_input_required === 'yes') ? '*' : '');?></span>
			</label>
			<?php
		}
        ?>
		<div class="mf-input mf-input-summary metform-entry-data container">
            <table class='mf-entry-data' cellpadding="5" cellspacing="0">
				<tbody>

				</tbody>
            </table>
        </div>
		<?php
		if($mf_input_help_text != ''){
			echo "<span class='mf-input-help'>".esc_html($mf_input_help_text)."</span>";
		}
		echo "</div>";
    }
    
}