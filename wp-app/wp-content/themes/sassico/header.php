<?php
/**
* The header template for the theme
*/
?>
   <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

   <head>
       <meta charset="<?php bloginfo( 'charset' ); ?>">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <?php wp_head(); ?>
   </head>

<body <?php body_class(); ?> >

<?php
$header_builder_enable = sassico_option('header_builder_enable', 'no');
$header_settings = sassico_option('theme_header_default_settings');

if($header_builder_enable=='yes' && class_exists('ElementsKit')){
  if(class_exists('\ElementsKit\Utils::render_elementor_content')){
     echo \ElementsKit\Utils::render_elementor_content($header_settings['yes']['sassico_header_builder_select']);
  }else{
     $elementor = \Elementor\Plugin::instance();
     echo \ElementsKit\Utils::render($elementor->frontend->get_builder_content_for_display( $header_settings['yes']['sassico_header_builder_select'] ));
  }
}else{
  get_template_part( 'template-parts/headers/header', 'content' );
}


