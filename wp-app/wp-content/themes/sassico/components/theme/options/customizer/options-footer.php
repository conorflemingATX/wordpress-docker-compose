<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$footer_settings = sassico_option('theme_header_default_settings');
$footer_id = '';
$footer_builder_enable = sassico_option('header_builder_enable');
if($footer_builder_enable=='yes'){
    $footer_id =   $footer_settings['yes']['sassico_header_builder_select'];
}

$options =[
    'footer_settings' => [
        'title'		 => esc_html__( 'Footer settings', 'sassico' ),

        'options'	 => [
            'footer_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Footer builder Enable', 'sassico' ),
                'desc'			   => '' ,
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'sassico'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__('No', 'sassico'),
                ],
            ],

            'theme_footer_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'footer_builder_enable',

                'choices' => array(
                    'yes' => array(
                        'sassico_footer_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'sassico_header_builder_select', 'data-foo' => 'sassico_header_builder_select' ),
                            'label' => __('Footer style', 'sassico'),

                            'choices' => sassico_ekit_footers(),

                            'no-validate' => false,
                        ),
                        'edit_footer' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => __('edit', 'sassico'),
                            'html'  => '<h3 class="header_builder_edit"><a class="sassico_header_builder_edit_link" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$footer_id ). '>'. esc_html('Edit content here.'). '</a><h3>' ,
                        ),
                    ),



                    'no' => array(

                    )
                )
            ),
            'xs_footer_bg_color' => [
                'label'	 => esc_html__( 'Background color', 'sassico'),
                'type'	 => 'color-picker',
                'value'  => '#f2f2f2',
                'desc'	 => esc_html__( 'You can change the  background color with rgba color or solid color', 'sassico'),
            ],
            'xs_footer_text_color' => [
                'label'	 => esc_html__( 'Text color', 'sassico'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'sassico'),
            ],
            'xs_footer_link_color' => [
                'label'	 => esc_html__( 'Link color', 'sassico'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'sassico'),
            ],
            'xs_footer_widget_title_color' => [
                'label'	 => esc_html__( 'Widget Title color', 'sassico'),
                'type'	 => 'color-picker',
                'value'  => '#142355',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'sassico'),
            ],
            'footer_bg_color' => [
                'label'	 => esc_html__( 'Copyright Background color', 'sassico'),
                'type'	 => 'color-picker',
                'value'  => '#142355',
                'desc'	 => esc_html__( 'You can change the copyright background color with rgba color or solid color', 'sassico'),
            ],
            'footer_copyright_color' => [
                'label'	 => esc_html__( 'Footer Copyright color', 'sassico'),
                'type'	 => 'color-picker',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'sassico'),
            ],
            'footer_social_links' => [
                'type'  => 'addable-popup',
                'template' => '{{- title }}',
                'popup-title' => null,
                'label' => esc_html__( 'Social links', 'sassico' ),
                'desc'  => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-4.7 icons.', 'sassico' ),
                'add-button-text' => esc_html__( 'Add new', 'sassico' ),
                'popup-options' => [
                    'title' => [ 
                        'type' => 'text',
                        'label'=> esc_html__( 'Title', 'sassico' ),
                    ],
                    'icon_class' => [ 
                        'type' => 'new-icon',
                        'label'=> esc_html__( 'Social icon', 'sassico' ),
                    ],
                    'url' => [ 
                        'type' => 'text',
                        'label'=> esc_html__( 'Social link', 'sassico' ),
                    ],
                ],
                'value' => [
                   
                ],
            ],
            'footer_copyright'	 => [
                'type'	 => 'textarea',
                'value'  =>  esc_html__('&copy; 2019, Sassico. All rights reserved','sassico'),
                'label'	 => esc_html__( 'Copyright text', 'sassico' ),
                'desc'	 => esc_html__( 'This text will be shown at the footer of all pages.', 'sassico' ),
            ],

            'footer_padding_top' => [
                'label'	        => esc_html__( 'Footer Padding Top', 'sassico' ),
                'desc'	        => esc_html__( 'Use Footer Padding Top', 'sassico' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
            'footer_padding_bottom' => [
                'label'	        => esc_html__( 'Footer Padding Bottom', 'sassico' ),
                'desc'	        => esc_html__( 'Use Footer Padding Bottom', 'sassico' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
             'back_to_top'				 => [
                'type'			 => 'switch',
                'value'			 => 'hello',
                'label'			 => esc_html__( 'Back to top', 'sassico'),
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'sassico'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'sassico'),
                ],
            ],
            
        ],
            
        ]
    ];