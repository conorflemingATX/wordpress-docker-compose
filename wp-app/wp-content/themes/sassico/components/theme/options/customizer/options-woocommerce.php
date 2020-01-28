<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */
if(!class_exists( 'WooCommerce' )) return;

$options = [
	'sassico_woocommerce_setting' => [
		'title' => esc_html__('WooCommerce', 'sassico'),

		'options' => [
			'sassico_shop_banner_setting' => [
				'type'        => 'popup',
				'label'       => esc_html__('Shop banner settings', 'sassico'),
				'popup-title' => esc_html__('Shop banner settings', 'sassico'),
				'button'      => esc_html__('Edit Shop Banner Button', 'sassico'),
				'size'        => 'medium', // small, medium, large
				'popup-options' => [
					'sassico_shop_page_show_banner' => [
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Show banner?', 'sassico' ),
						'desc'          => esc_html__('Show or hide the banner', 'sassico'),
						'value'         => 'yes',
						'left-choice'	 => [
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'sassico' ),
						],
						'right-choice'	 => [
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'sassico' ),
						],
					],

					'sassico_shop_banner_image'	 =>array(
						'label'			 => esc_html__( 'Banner image', 'sassico' ),
						'type'			 => 'upload',
						'images_only'	 => true,
						'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),

					),

				],
			],

			'sassico_single_product_blog_banner_setting' => [
				'type'         => 'popup',
				'label'        => esc_html__('Single Product banner settings', 'sassico'),
				'popup-title'  => esc_html__('Single Product banner settings', 'sassico'),
				'button'       => esc_html__('Edit Single Product Banner Button', 'sassico'),
				'size'         => 'medium', // small, medium, large
				'popup-options' => [
					'sassico_single_product_show_banner' => [
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Show banner?', 'sassico' ),
						'desc'          => esc_html__('Show or hide the banner', 'sassico'),
						'value'         => 'yes',
						'left-choice'	 => [
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'sassico' ),
						],
						'right-choice'	 => [
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'sassico' ),
						],
					],
					'sassico_single_product_banner_blog_image'	 =>[
						'type'  => 'upload',
						'label' => esc_html__('Image', 'sassico'),
						'desc'  => esc_html__('Banner blog image', 'sassico'),
						'images_only' => true,
						'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
					],

				],
			],

			'sassico_woo_shop_page_setting' => [
				'type'         => 'radio',
				'value' => 'fluid',
				'label' => __('Shop Page Layout', '{blo}'),
				'desc'  => __('Select shop page layout style', '{blo}'),
				'choices' => [ // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
					'fluid' => __('Fluid', '{domain}'),
					'lidebar' => __('Left Sidebar', '{blo}'),
					'rsidbar' => __('Right Sidebar', '{blo}'),
				],
				// Display choices inline instead of list
				'inline' => true,
			],
		],
	],
];