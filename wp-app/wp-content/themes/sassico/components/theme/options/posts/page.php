<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Page settings', 'sassico' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'sassico' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'sassico' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( 'Banner image', 'sassico' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'sassico' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'sassico' ),
				'type'	 => 'upload'
           ),
            'sub_header_menu'	 => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => esc_html__('Display sub header menu?', 'sassico'),
                'desc'  => esc_html__('Display sub menu', 'sassico'),
                'help'  => esc_html__('A menu will be displayed under Banner', 'sassico'),
                'left-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'sassico'),
                ),
                'right-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('No', 'sassico'),
                ),
            )
        ),
	),
);
