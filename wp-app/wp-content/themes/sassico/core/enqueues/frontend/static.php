<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// 3rd party css
	wp_enqueue_style( 'fonts', sassico_google_fonts_url(['Poppins:300,400,500,600,700&display=swap', 'Roboto:300,400,500,700']), null,  SASSICO_VERSION );
	wp_enqueue_style( 'bootstrap',  SASSICO_CSS . '/bootstrap.min.css', null,  SASSICO_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome',  SASSICO_CSS . '/font-awesome.css', null,  SASSICO_VERSION );
	wp_enqueue_style( 'sassico-iconfont',  SASSICO_CSS . '/icon-font.css', null,  SASSICO_VERSION );

	// theme css
	wp_enqueue_style( 'sassico-blog',  SASSICO_CSS . '/blog.css', null,  SASSICO_VERSION );
	wp_enqueue_style( 'sassico-gutenberg-custom',  SASSICO_CSS . '/gutenberg-custom.css', null,  SASSICO_VERSION );
	wp_enqueue_style( 'sassicon-woocommerce',  SASSICO_CSS . '/sassicon-woocommerce.css', null,  SASSICO_VERSION );
	wp_enqueue_style( 'sassico-master',  SASSICO_CSS . '/master.css', null,  SASSICO_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

	// 3rd party scripts
	wp_enqueue_script( 'bootstrap',  SASSICO_JS . '/bootstrap.min.js', array( 'jquery' ),  SASSICO_VERSION, true );
	wp_enqueue_script( 'Popper',  SASSICO_JS . '/Popper.js', array( 'jquery' ),  SASSICO_VERSION, true );

	// 3rd party scripts
	wp_enqueue_script( 'jquery-magnific-popup',  SASSICO_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  SASSICO_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'lazyload',  SASSICO_JS . '/lazyload.js', array( 'jquery' ),  SASSICO_VERSION, true );

	wp_enqueue_script( 'wow',  SASSICO_JS . '/wow.min.js', array( 'jquery' ),  SASSICO_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'sassico-script',  SASSICO_JS . '/script.js', array( 'jquery' ),  SASSICO_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}