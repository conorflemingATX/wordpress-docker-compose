<?php
namespace MetForm\Base;

Class Shortcode {

    use \MetForm\Traits\Singleton;

    public function __construct(){
        add_shortcode( 'metform', [$this,'render_shortcode'] );
    }
    
    public function render_shortcode( $atts ) {
        $attributes = shortcode_atts( array(
           'form_id' => 'test',
        ), $atts );
        return '<div class="mf-form-shortcode">'. \MetForm\Utils\Util::render_form_content($attributes['form_id'], $attributes['form_id']) .'</div>';
    }

}