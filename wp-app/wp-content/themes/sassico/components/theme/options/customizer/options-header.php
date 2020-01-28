<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */

$header_settings = sassico_option('theme_header_default_settings');
$header_id = '';
$header_builder_enable = sassico_option('header_builder_enable');
if($header_builder_enable=='yes'){
    $header_id =   $header_settings['yes']['sassico_header_builder_select'];
}

$options =[
    'header_settings' => [
        'title'		 => esc_html__( 'Header settings', 'sassico' ),

        'options'	 => [
            'header_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Header builder Enable', 'sassico' ),
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

            'theme_header_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'header_builder_enable',

                'choices' => array(
                    'yes' => array(
                        'sassico_header_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'sassico_header_builder_select', 'data-foo' => 'sassico_header_builder_select' ),
                            'label' => __('Header style', 'sassico'),

                            'choices' => sassico_ekit_headers(),

                            'no-validate' => false,
                        ),
                        'edit_header' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => __('edit', 'sassico'),
                            'html'  => '<h3 class="header_builder_edit"><a class="sassico_header_builder_edit_link" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$header_id ). '>'. esc_html('Edit content here.'). '</a><h3>' ,
                        ),
                    ),



                    'no' => array(

                    )
                )
            ),
             'header_nav_sticky' => [
               'type'			   => 'switch',
               'label'			   => esc_html__( 'Sticky header', 'sassico' ),
               'desc'			   => esc_html__('Do you want to enable sticky nav?', 'sassico' ),
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



             'header_top_info_show' => [
               'type'			    => 'switch',
               'label'			 => esc_html__( 'Show Topbar', 'sassico' ),
               'desc'			    => esc_html__( 'Do you want to show topbar?', 'sassico' ),
               'value'          => 'no',
               'left-choice'	 => [
                   'value'	 => 'yes',
                   'label'	 => esc_html__('Yes', 'sassico'),
               ],

               'right-choice'	 => [
                   'value'	 => 'no',
                   'label'	 => esc_html__('No', 'sassico'),
                  ],
               ],

               'header_contact_mail' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact mail', 'sassico' ),
                  'desc'			    => esc_html__( 'Give mail.', 'sassico' ),
                  'value'            => esc_html__('contact@domain.com','sassico'),
               ],

               'header_contact_address' => [
                  'type'			    => 'text',
                  'label'		    	 => esc_html__( 'Contact address title', 'sassico' ),
                  'desc'			    => esc_html__( 'Give office address.', 'sassico' ),
                  'value'            => esc_html__('105 Roosevelt Street CA','sassico'),
               ],

               'header_Contact_number' => [
                  'type'			    => 'text',
                  'label'		    	 => esc_html__( 'Contact number title', 'sassico' ),
                  'desc'			    => esc_html__( 'Give Contact Number for header  style 3.', 'sassico' ),
                  'value'            => esc_html__('+1 212-554-1515','sassico'),
               ],
               'header_nav_search_section' => [
                  'type'			 => 'switch',
                  'label'		    => esc_html__( 'Search button show', 'sassico' ),
                  'desc'			 => esc_html__( 'Do you want to show search button in header ?', 'sassico' ),
                  'value'         => 'no',
                  'left-choice'	 => [
                     'value'     => 'yes',
                     'label'	   => esc_html__( 'Yes', 'sassico' ),
                  ],
                  'right-choice'	 => [
                     'value'	 => 'no',
                     'label'	 => esc_html__( 'No', 'sassico' ),
                  ],
                ],


                'header_quota_button' => array(
                  'type'         => 'multi-picker',
                  'label'        => false,
                  'desc'         => false,
                  'picker'       => array(
                      'style' => array(
                          'type'			 => 'switch',
                          'label'		 => esc_html__( 'Show CTA button ', 'sassico' ),
                          'value'       => 'no',
                          'left-choice'	 => [
                             'value'   	     => 'yes',
                             'label'	        => esc_html__( 'Yes', 'sassico' ),
                          ],
                          'right-choice'	 => [
                             'value'	 => 'no',
                             'label'	 => esc_html__( 'No', 'sassico' ),
                          ],

                      )
                  ),
                  'choices'      => array(
                       'yes' => array(
                        'header_quota_text' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote text', 'sassico' ),
                           'desc'			    => esc_html__( 'Navigation quote text.', 'sassico' ),
                           'value'            => esc_html__('Get a quote','sassico'),
                        ],
                       'header_quota_url' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote link', 'sassico' ),
                           'desc'			    => esc_html__( 'Navigation quote link.', 'sassico' ),
                           'value'            => esc_html__('#','sassico'),
                        ],
                       ),



                  ),
                  'show_borders' => false,
              ),




        ], //Options end
    ]
];