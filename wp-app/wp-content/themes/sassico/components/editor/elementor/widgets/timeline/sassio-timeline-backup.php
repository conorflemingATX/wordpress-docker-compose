<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Sassico_Timeline_Widget extends Widget_Base {

    public function get_name() {
        return 'sassico-timeline';
    }


    public function get_title() {
        return esc_html__( 'SASSICO Timeline', 'sassico' );
    }

    public function get_icon() {
        return 'eicon-tab';
    }

    public function get_categories() {
        return ['sassico-elements'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'sassico_timeline_content_section',
			[
				'label' => __( 'Content', 'sassico' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new Repeater();

		$repeater->add_control(
			'sassico_timeline_client_image',
			[
				'label' => __( 'Client Image', 'sassico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $repeater->add_control(
            'sassico_timeline_subtitle', [
                'label' => esc_html__('Subtitle', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Timeline #1', 'sassico'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'sassico_timeline_title', [
                'label' => esc_html__('Title', 'sassico'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Title', 'sassico'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
		$repeater->add_control(
            'sassico_timeline_review', [
				'label' => esc_html__('Review', 'sassico'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Review Text', 'sassico'),
				'dynamic' => [
					'active' => true,
				],
            ]
        );
        $repeater->add_control(
			'sassico_timeline_review_button_text',
			[
				'label' => __( 'Button Text', 'sassico' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'NEXT STEP', 'sassico' ),
				'placeholder' => __( 'Type your title here', 'sassico' ),
			]
		);

        $repeater->add_control(
			'sassico_timeline_review_website_link',
			[
				'label' => __( 'Link', 'sassico' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'sassico' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'sassico_timeline_list',
			[
				'label' => __( 'Timeline', 'sassico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'sassico_timeline_subtitle' => __( 'Step 01', 'sassico' ),
						'sassico_timeline_title' => __( 'Gather the information', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
					[
                        'sassico_timeline_subtitle' => __( 'Step 02', 'sassico' ),
                        'sassico_timeline_title' => __( 'Find Solution and Solve', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
					[
                        'sassico_timeline_subtitle' => __( 'Step 03', 'sassico' ),
                        'sassico_timeline_title' => __( 'Finally get the Result', 'sassico' ),
						'sassico_timeline_review' => __( 'SaaS companies are clearly on the upswing, aided by the rapid were growth of the larger cloud computing market. Years ago, much of the Today, good luck launching its startup based on packaged software only. All the interest and energy not to mention this venture capital is going to on-demand software-as-a-service (SaaS), since it promises headache of client installs and updates.', 'sassico' ),
					],
				],
				'title_field' => '{{{ sassico_timeline_subtitle }}}',
			]
		);

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        $timeline = [];
        extract($settings);
        $timeline = isset($sassico_timeline_list) ? $sassico_timeline_list : [];
        if (is_array($timeline) && !empty($timeline)) { ?>
            <div class="sassico-timeline-wraper">
            <?php foreach ($timeline as $timeline) { ?>
                <div class="row sassico-single-timeline sassico-timeline-bar">
                    <div class="col-lg-6">
                        <div class="sassico-timeline-content">
                        <?php if ($timeline['sassico_timeline_subtitle'] != '') { ?>
                            <h2 class="sassico-timeline-subtitle">
                                <?php echo esc_thml($timeline['sassico_timeline_subtitle']); ?>
                                <span class="sassico-timeline-pin"></span>
                            </h2>
                        <?php }; ?>

                        <?php if ($timeline['sassico_timeline_title'] != '') { ?>
                            <h3 class="sassico-timeline-title"><?php echo esc_html__($timeline['sassico_timeline_title'], 'sassico')?></h3>
                        <?php }; ?>

                        <?php if ($timeline['sassico_timeline_review'] != '') { ?>
                            <p><?php echo esc_html__($timeline['sassico_timeline_review'], 'sassico')?></p>
                        <?php }; ?>
                        
                        <?php if ($timeline['sassico_timeline_review_button_text'] != '') { ?>
                            <a href="<?php echo esc_url($timeline['sassico_timeline_review_website_link']['url'])?>" 
                            <?php 
                            switch ($timeline['sassico_timeline_review_website_link']['nofollow']) {
                                case 'on': ?>
                                    rel="nofollow"
                                    <?php break;
                                default: ?>
                                    rel
                                    <?php break;
                            }
                            switch ($timeline['sassico_timeline_review_website_link']['is_external']) {
                                case 'on': ?>
                                    target="_blank"
                                    <?php break;
                                default: ?>
                                    target="_self"
                                    <?php break;
                            }?>
                            class="btn btn-outline-primary"><?php echo esc_html__($timeline['sassico_timeline_review_button_text'], 'sassico')?> <i class="fa fa-angle-right"></i></a>
                        <?php };?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sassico-timeline-image">
                            <img src="<?php echo esc_url($timeline['sassico_timeline_client_image']['url'])?>" alt="<?php echo esc_html__($timeline['sassico_timeline_subtitle'], 'sassico')?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        <?php 
        }
    }

    protected function _content_template() { }
}