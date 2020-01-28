
   <?php
      $footer_builder_enable = sassico_option('footer_builder_enable', 'no');
      $footer_settings = sassico_option('theme_footer_default_settings');

      if($footer_builder_enable=='yes' && class_exists('ElementsKit')){
            if(class_exists('\ElementsKit\Utils::render_elementor_content')){
                  echo \ElementsKit\Utils::render_elementor_content($footer_settings['yes']['sassico_footer_builder_select']);
            }else{
                  $elementor = \Elementor\Plugin::instance();
                  echo \ElementsKit\Utils::render($elementor->frontend->get_builder_content_for_display( $footer_settings['yes']['sassico_footer_builder_select'] ));
            }
      }else{
            get_template_part( 'template-parts/footer/footer', 'content' );
      }
      
      wp_footer();

      ?>

   </body>
</html>