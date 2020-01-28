<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Languages_Switch extends Widget_Base {

	public function get_name() {
		return 'sassico-languages-switch';
	}

	public function get_title() {
		return esc_html__( 'SASSICO languages switch', 'sassico' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

	public function get_categories() {
		return [ 'sassico-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'sassico_cta_content_section',
			[
				'label' => esc_html__( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'languages_switch_style',
			[
				'label' => esc_html__( 'Language switch style', 'sassico' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'sassico' ),
					'style2' => esc_html__( 'Style 2', 'sassico' ),
				],
			]
		);

		$this->add_control(
			'languages_switch_icon_for_style_one',
			[
				'label' => esc_html__( 'Icons', 'sassico' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-down',
                'condition' => [
                        'languages_switch_style' => 'style1'
                ]
			]
		);
		
		$this->add_responsive_control(
			'sassico_lng_switch_alignment',
			[
				'label' =>esc_html__( 'Alignment', 'sassico' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' =>esc_html__( 'Left', 'sassico' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' =>esc_html__( 'Center', 'sassico' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' =>esc_html__( 'Right', 'sassico' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors'=> [
					 '{{WRAPPER}} .sassico-language-switch' => 'text-align: {{VALUE}};',
					 '{{WRAPPER}} .language_switch_two' => 'text-align: {{VALUE}};',
				 ],
				'default' => 'left',
			]
		);

		$this->end_controls_section();

		// style

		$this->start_controls_section(
			'sassico_language_sytle',
			[
				'label' => __( 'Title', 'sassico' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        // style 1
		$this->add_control(
			'sassico_language_icon_sltyle',
			[
				'label' => __( 'Icon size', 'sassico' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 150,
						'step' => 1,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .sassico-language-switch li a span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'languages_switch_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'sassico_language_icon_sltyle_positon_top_bottom',
			[
				'label' => __( 'Top to bottom postion', 'sassico' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -150,
						'max' => 150,
						'step' => 1,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .sassico-language-switch li a span:last-child' => 'transform: translateY({{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'languages_switch_style' => 'style1'
				]
			]
		);

		$this->add_control(
			'sassico_language_list_icon_color',
			[
				'label' => esc_html__( 'Icon  color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#2e4eff',
				'selectors' => [
					'{{WRAPPER}} .sassico-language-switch li a span' => 'color: {{VALUE}}',
				],
				'condition' => [
					'languages_switch_style' => 'style1'
				]
			]
		);

		//  style 2
		$this->add_control(
			'sassico_language_list_item_color',
			[
				'label' => esc_html__( 'Item color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .language_switch_two li a' => 'color: {{VALUE}}',
				],
                'condition' => [
                        'languages_switch_style' => 'style2'
                ]
			]
		);

		$this->add_control(
			'sassico_language_list_Current_item_color',
			[
				'label' => esc_html__( 'Current Item color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .language_switch_two li' => 'color: {{VALUE}}',
				],
				'condition' => [
					'languages_switch_style' => 'style2'
				]
			]
		);

		$this->add_control(
			'sassico_language_list_Current_item__sep color',
			[
				'label' => esc_html__( 'Item separator color', 'sassico' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .language_switch_two li:not(:last-child):before' => 'color: {{VALUE}}',
				],
				'condition' => [
					'languages_switch_style' => 'style2'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sassico_language_list_Current_item_typography',
				'label' => esc_html__( 'Typography', 'sassico' ),
				'selector' => '{{WRAPPER}} .language_switch_two li, {{WRAPPER}} .language_switch_two li a',
				'condition' => [
					'languages_switch_style' => 'style2'
				]
			]
		);


		$this->end_controls_section();

	}

	protected function render( ) {
		$settings = $this->get_settings_for_display();

		extract($settings);

		if (class_exists('SitePress')):
			$languages = icl_get_languages('skip_missing=0&orderby=code');
			$flag_url = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];
			$lang_code = ICL_LANGUAGE_CODE;
		else:
			$flag_url = get_template_directory_uri() . '/assets/images/united-states.svg';
			$lang_code = 'en';
		endif;

        if($languages_switch_style == 'style1') {
		?>
        <ul class="sassico-language-switch">
            <li>
                <a href="#modal-popup-wpml" class="languageSwitcher-button xs-modal-popup">
                    <span class="xs-flag" style="background-image: url(<?php echo esc_url($flag_url);?>)"></span>
                    <span class="<?php echo esc_attr($languages_switch_icon_for_style_one); ?>"></span>
                </a>
            </li>
        </ul>

        <div class="zoom-anim-dialog mfp-hide modal-language" id="modal-popup-wpml">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="language-content">
                        <p><?php esc_html_e('Switch The Language','sassico');?></p>
						<?php if (class_exists('SitePress')): ?>
							<?php sassico_languages_list_popup(); ?>
						<?php else: ?>
                            <ul class="flag-lists flag-list-placeholder">
                                <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/flags/006-united-states.svg" alt="<?php esc_attr_e('English','sassico');?>"><span><?php esc_html_e('English','sassico');?></span></a></li>
                                <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/flags/002-canada.svg" alt="<?php esc_attr_e('English','sassico');?>"><span><?php esc_html_e('Canada','sassico');?></span></a></li>
                                <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/flags/003-vietnam.svg" alt="<?php esc_attr_e('Vietnamese','sassico');?>"><span><?php esc_html_e('Vietnamese','sassico');?></span></a></li>
                                <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/flags/004-france.svg" alt="<?php esc_attr_e('French','sassico');?>"><span><?php esc_html_e('French','sassico');?></span></a></li>
                                <li><a href="#"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/flags/005-germany.svg" alt="<?php esc_attr_e('German','sassico');?>"><span><?php esc_html_e('German','sassico');?></span></a></li>
                            </ul>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
        }
		if($languages_switch_style == 'style2') {
			if (class_exists('SitePress')){
				sassico_languages_list_wpml();
            }else{
			?>
            <ul class="language_switch_two placeholder_switch">
                <li><a href="">En</a></li>
                <li>De</li>
            </ul>
			<?php
		}}
	}

	protected function _content_template() { }
}