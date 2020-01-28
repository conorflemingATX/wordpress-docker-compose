<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'style_settings' => [
            'title'		 => esc_html__( 'Style settings', 'sassico' ),
            'options'	 => [
                'style_body_bg' => [
                    'label'	        => esc_html__( 'Body background', 'sassico' ),
                    'desc'	           => esc_html__( 'Site\'s main background color.', 'sassico' ),
                    'type'	           => 'color-picker',
                    'value' => '#FFFFFF',
                 ],

                'style_primary' => [
                    'label'	        => esc_html__( 'Primary color', 'sassico' ),
                    'desc'	           => esc_html__( 'Site\'s main color.', 'sassico' ),
                    'type'	           => 'color-picker',
                    'value' => '#042ff8',
                ],

                'secondary_color' => [
                    'label'	        => esc_html__( 'Secondary color', 'sassico' ),
                    'desc'	           => esc_html__( 'Secondary color.', 'sassico' ),
                    'type'	           => 'color-picker',
                    'value' => '#f3bc3f',
                ],
                
                'title_color' => [
                    'label'	        => esc_html__( 'Title color', 'sassico' ),
                    'desc'	        => esc_html__( 'Blog title color.', 'sassico' ),
                    'type'	        => 'color-picker',
                    'value' => '#1a1a1a'
                ],

                'body_font'    => array(
                    'type' => 'typography-v2',
                    'label' => esc_html__('Body Font', 'sassico'),
                    'desc'  => esc_html__('Choose the typography for the title', 'sassico'),
                    'value' => array(
                        'family' => 'Roboto',
                        'size'  => '16',
                        'font-weight' => '400',
                        'line-height' => '26'
                    ),
                    'components' => array(
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => true,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ),
                ),
                
                'heading_font_one'	 => [
                    'type'		 => 'typography-v2',
                    'value'		 => [
                        'family'		 => 'Poppins',
                        'size'  => '72',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H1', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],

                'heading_font_two'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Poppins',
                        'size'        => '60',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H2 Fonts', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],

                'heading_font_three'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Poppins',
                        'size'        => '48',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H3 Fonts', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],            
                'heading_font_four'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Poppins',
                        'size'        => '36',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H4 Fonts', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],            
                'heading_font_five'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Poppins',
                        'size'        => '30',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H5 Fonts', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],            
                'heading_font_six'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Poppins',
                        'size'        => '24',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H6 Fonts', 'sassico' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'sassico' ),
                ],            
            ],
        ],
    ];