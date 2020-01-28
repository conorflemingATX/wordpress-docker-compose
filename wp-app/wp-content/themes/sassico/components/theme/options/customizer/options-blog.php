<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title'		 => esc_html__( 'Blog settings', 'sassico' ),

        'options'	 => [
            'blog_sidebar' =>[
                'type'  => 'select',
                              
                'label' => esc_html__('Sidebar', 'sassico'),
                'desc'  => esc_html__('Description', 'sassico'),
                'help'  => esc_html__('Help tip', 'sassico'),
                'choices' => array(
                    '1' => esc_html__('No sidebar','sassico'),
                    '2' => esc_html__('Left Sidebar', 'sassico'),
                    '3' => esc_html__('Right Sidebar', 'sassico'),
                 
                 ),
              
                'no-validate' => false,
            ],   

            'blog_author' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog author', 'sassico' ),
                'desc'			 => esc_html__( 'Do you want to show blog author?', 'sassico' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'sassico' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'sassico' ),
                ],
           ],
            'blog_related_post' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog related post', 'sassico' ),
                'desc'			 => esc_html__( 'Do you want to show single blog related post?', 'sassico' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'sassico' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'sassico' ),
                ],
           ],

           'blog_related_post_number' => [
            'label'	 => esc_html__( 'Related post count', 'sassico' ),
            'type'	 => 'text',
            'value'	 => 3,
           ],
        ],
            
        ]
    ];