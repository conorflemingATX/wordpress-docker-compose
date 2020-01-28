<?php

/**
 * theme's main functions and globally usable variables, contants etc
 * added: v1.0 
 * textdomain: sassico, class: SASSICO, var: $sassico_, constants: SASSICO_, function: sassico_
 */

// shorthand contants
// ------------------------------------------------------------------------
define('SASSICO_THEME', 'Sassico WordPress Theme');
define('SASSICO_VERSION', '1.1');
define('SASSICO_MINWP_VERSION', '4.3');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('SASSICO_THEME_URI', get_template_directory_uri());
define('SASSICO_IMG', SASSICO_THEME_URI . '/assets/images');
define('SASSICO_CSS', SASSICO_THEME_URI . '/assets/css');
define('SASSICO_JS', SASSICO_THEME_URI . '/assets/js');



// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('SASSICO_THEME_DIR', get_template_directory());
define('SASSICO_IMG_DIR', SASSICO_THEME_DIR . '/assets/images');
define('SASSICO_CSS_DIR', SASSICO_THEME_DIR . '/assets/css');
define('SASSICO_JS_DIR', SASSICO_THEME_DIR . '/assets/js');

define('SASSICO_CORE', SASSICO_THEME_DIR . '/core');
define('SASSICO_COMPONENTS', SASSICO_THEME_DIR . '/components');
define('SASSICO_EDITOR', SASSICO_COMPONENTS . '/editor');
define('SASSICO_EDITOR_ELEMENTOR', SASSICO_EDITOR . '/elementor');
define('SASSICO_EDITOR_GUTENBERG', SASSICO_EDITOR . '/gutenberg');
define('SASSICO_SHORTCODE_DIR_STYLE', SASSICO_EDITOR_ELEMENTOR . '/widgets/style');
define('SASSICO_SHORTCODE_DIR_WIDGETS', SASSICO_EDITOR_ELEMENTOR . '/widgets');
define('SASSICO_INSTALLATION', SASSICO_CORE . '/installation-fragments');
define('SASSICO_REMOTE_CONTENT', esc_url('http://wp.xpeedstudio.com/demo-content/sassico'));


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function sassico_setup() {

    // make the theme available for translation
    $lang_dir = SASSICO_THEME_DIR . '/languages';
    load_theme_textdomain('sassico', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);
    add_image_size( 'sassico-small', 350, 250, ['center', 'center'] );
    add_image_size( 'sassico-case-study-box', 320, 200, ['center', 'center'] );

 
 
    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'sassico'),
            'footermenu' => esc_html__('Footer Menu', 'sassico'),
            'submenu' => esc_html__('Sub Header Menu', 'sassico'),
        ]
    );
    //  woocomemrce support

	if (  class_exists( 'WooCommerce', false ) ) {
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    /*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'sassico_setup');


add_action('enqueue_block_editor_assets', 'sassico_action_enqueue_block_editor_assets' );
function sassico_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'sassico-fonts', sassico_google_fonts_url(['Poppins:300,400,500,600,700&display=swap', 'Roboto:300,400,500,700']), null, SASSICO_VERSION );
    wp_enqueue_style( 'sassico-gutenberg-editor-font-awesome-styles', SASSICO_CSS . '/font-awesome.css', null, SASSICO_VERSION );
    wp_enqueue_style( 'sassico-gutenberg-editor-customizer-styles', SASSICO_CSS . '/gutenberg-editor-custom.css', null, SASSICO_VERSION );
    wp_enqueue_style( 'sassico-gutenberg-editor-styles', SASSICO_CSS . '/gutenberg-custom.css', null, SASSICO_VERSION );
    wp_enqueue_style( 'sassico-gutenberg-blog-styles', SASSICO_CSS . '/blog.css', null, SASSICO_VERSION );
}

// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function sassico_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', 'sassico_framework_customizations_path');

function sassico_remove_fw_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}
add_action( 'admin_menu', 'sassico_remove_fw_settings', 999 );


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( SASSICO_CORE . '/init.php');
require_once( SASSICO_COMPONENTS . '/editor/elementor/elementor.php');

add_filter('elementskit/license/hide_banner', function(){
    return true;
});