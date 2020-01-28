<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */




wp_enqueue_style( 'sassico-admin',  SASSICO_CSS . '/xs-admin.css', null,  SASSICO_VERSION );
wp_enqueue_script('sassico-customize', SASSICO_JS . '/sassico-customize.js', array('jquery'), SASSICO_VERSION, true);

wp_localize_script( 'sassico-customize', 'admin_url_object',array( 'admin_url' => admin_url( 'post.php?action=elementor&post=' ) ) );
