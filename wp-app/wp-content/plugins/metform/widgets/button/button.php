<?php
namespace Elementor;
defined( 'ABSPATH' ) || exit;

Class MetForm_Input_Button extends Widget_Base{

	use \MetForm\Traits\Button_Controls;
	use \MetForm\Traits\Conditional_Controls;

    public function get_name() {
		return 'mf-button';
    }
    
	public function get_title() {
		return esc_html__( 'Submit Button', 'metform' );
    }

	public function show_in_panel() {
        return 'metform-form' == get_post_type();
	}

	public function get_categories() {
		return [ 'metform' ];
	}

	public function get_keywords() {
        return ['metform', 'button', 'submit', 'submit button'];
    }
	
    protected function _register_controls() {

        $this->start_controls_section(
			'mf_btn_section_content',
			[
				'label' => esc_html__( 'Content', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->button_content_control();

		$this->end_controls_section();

		if(class_exists('\MetForm_Pro\Base\Package')){
			$this->input_conditional_control();
		}

        $this->start_controls_section(
			'mf_btn_hidden_input_content',
			[
				'label' => esc_html__( 'Hidden', 'metform' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->hidden_input_content_control();

		$this->end_controls_section();


        $this->start_controls_section(
			'mf_btn_section_style',
			[
				'label' =>esc_html__( 'Button', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->button_style_control();
        
		$this->end_controls_section();




        $this->start_controls_section(
			'mf_btn_border_style_tabs',
			[
				'label' =>esc_html__( 'Border', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->button_border_control();
        
		$this->end_controls_section();

        $this->start_controls_section(
			'mf_btn_box_shadow_style',
			[
				'label' =>esc_html__( 'Shadow', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->button_shadow_control();

		$this->end_controls_section();

        $this->start_controls_section(
			'mf_btn_iconw_style',
			[
				'label' =>esc_html__( 'Icon', 'metform' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['mf_btn_icon!' => '']
			]
        );
        
        $this->button_icon_control();

		$this->end_controls_section();

	}

    protected function render($instance = []){

        $settings = $this->get_settings_for_display();

        $btn_text = $settings['mf_btn_text'];
        $btn_class = ($settings['mf_btn_class'] != '') ? $settings['mf_btn_class'] : '';
        $btn_id = ($settings['mf_btn_id'] != '') ? 'id='.$settings['mf_btn_id'] : '';
		$icon_align = $settings['mf_btn_icon_align'];

		$class = (isset($settings['mf_conditional_logic_form_list']) ? 'mf-conditional-input' : '');
		
		$hidden_inputs = isset($settings['mf_hidden_input']) ? $settings['mf_hidden_input'] : '';

		if(!empty($hidden_inputs)){
			foreach($hidden_inputs as $input){
				$input = (object) $input;
				echo "<input type='hidden' class=".esc_attr($input->mf_hidden_input_class)." name=".esc_attr($input->mf_hidden_input_name)." value=".esc_attr($input->mf_hidden_input_value).">";
			}
		}

		?>
		<div class="mf-btn-wraper <?php echo esc_attr($class); ?>" data-mf-form-conditional-logic-requirement="<?php echo esc_attr(isset($settings['mf_conditional_logic_form_and_or_operators']) ? $settings['mf_conditional_logic_form_and_or_operators'] : ''); ?>">
			<?php if($icon_align == 'right'): ?>
				<button type="submit" class="metform-btn metform-submit-btn <?php echo esc_attr( $btn_class ); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php echo esc_html( $btn_text ); ?>
					<?php if($settings['mf_btn_icon']['value'] != ''): ?><?php Icons_Manager::render_icon( $settings['mf_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php endif; ?>
				</button>
				<?php elseif ($icon_align == 'left') : ?>
				<button type="submit" class="metform-btn metform-submit-btn <?php echo esc_attr( $btn_class); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php if($settings['mf_btn_icon']['value'] != ''): ?><?php Icons_Manager::render_icon( $settings['mf_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php endif; ?>
					<?php echo esc_html( $btn_text ); ?>
				</button>
				<?php else : ?>
				<button type="submit" class="metform-btn metform-submit-btn <?php echo esc_attr( $btn_class); ?>" <?php echo esc_attr($btn_id); ?>>
					<?php echo esc_html( $btn_text ); ?>
				</button>
			<?php endif; ?>
        </div>
        <?php
    }
    
}