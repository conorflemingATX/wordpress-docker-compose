<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: sassico_section_{section name}
 */
$options = [
	'sassico_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'sassico' ),
		'options'			 => Sassico_Theme_Includes::_customizer_options(),
		'wp-customizer-args' => [
			'priority' => 1,
		],
	],
];
