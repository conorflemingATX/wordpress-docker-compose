<?php

function binder_clips_script_enqueue() {
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/binder-clips.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( "customjs", get_template_directory_uri(). "/js/binder-clip.js", array(), '1.0.0', true );
}

add_action( "wp_enqueue_scripts", "binder_clips_script_enqueue");

function binder_clips_setup() {
    add_theme_support( "menus" );

    register_nav_menu( "primary", "Primary Header Navigation" );
    register_nav_menu( "secondary", "Primary Footer Navigation" );
}

add_action( "init", "binder_clips_setup" );
