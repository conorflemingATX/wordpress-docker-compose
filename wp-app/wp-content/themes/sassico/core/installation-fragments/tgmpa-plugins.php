<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function sassico_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Unyson', 'sassico' ),
			'slug'		 => 'unyson',
			'required'	 => true,
		), 
		array(
			'name'		 => esc_html__( 'Elementor', 'sassico' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Elementskit', 'sassico' ),
			'slug'		 => 'elementskit',
			'required'	 => true,
			'version'	 => '1.0',
            'source'	 =>  esc_url(SASSICO_REMOTE_CONTENT . '/plugins/elementskit.zip')
		),
        array(
            'name'		 => esc_html__( 'Elementskit Lite', 'sassico' ),
            'slug'		 => 'elementskit-lite',
            'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Metform', 'sassico' ),
			'slug'		 => 'metform',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Wp Social - Login, Share, Counter', 'sassico' ),
			'slug'		 => 'wp-social',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Sassico Essentials', 'sassico' ),
			'slug'		 => 'sassico-essential',
			'required'	 => true,
			'version'	 => '1.0',
            'source'	 =>  esc_url(SASSICO_REMOTE_CONTENT . '/plugins/sassico-essential.zip')
		),
	);


	$config = array(
		'id'			 => 'sassico', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'sassico-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'sassico_register_required_plugins' );