<?php
namespace MetForm\Core\Entries;

defined( 'ABSPATH' ) || exit;

Class Hooks {
    use \MetForm\Traits\Singleton;

    public function __construct(){
        
        add_filter( 'manage_metform-entry_posts_columns', [ $this, 'set_columns' ] );
        add_action( 'manage_metform-entry_posts_custom_column', [ $this, 'render_column' ], 10, 2 );
        add_filter( 'parse_query', [ $this, 'query_filter' ] );
        add_filter( 'wp_mail_from_name', [$this, 'wp_mail_from'] );
        
    }

    public function set_columns( $columns ) {

		$date_column = $columns['date'];

    unset( $columns['date'] );
    
    $columns['form_name'] = esc_html__( 'Form Name', 'metform' );

		$columns['date']      = esc_html( $date_column );
		

    return $columns;
    
    }
    
    public function render_column( $column, $post_id ) {
		switch ( $column ) {
      case 'form_name':
        $form_id = get_post_meta($post_id, 'metform_entries__form_id', true);
        $form_name = get_post((int)$form_id);
        $post_title = (isset($form_name->post_title) ? $form_name->post_title : '');
        
        global $wp;
        $current_url = add_query_arg( $wp->query_string."&form_id=".$form_id, '', home_url( $wp->request ) );

        echo "<a data-metform-form-id=".esc_attr($form_id)." class='mf-entry-filter' href=".esc_url($current_url).">".esc_html($post_title)."</a>";
			break;
		  }
    }

    public function  query_filter($query) {
      global $pagenow;
      $current_page = isset( $_GET['post_type'] ) ? sanitize_key($_GET['post_type']) : '';

      if ( 
          is_admin() 
          && 'metform-entry' == $current_page 
          && 'edit.php' == $pagenow   
          && $query->query_vars['post_type'] == 'metform-entry'
          && isset( $_GET['form_id'] ) 
          && $_GET['form_id'] != 'all'
      ){
          $form_id = sanitize_key($_GET['form_id']);
          $query->query_vars['meta_key'] = 'metform_entries__form_id';
          $query->query_vars['meta_value'] = $form_id;
          $query->query_vars['meta_compare'] = '=';
      }
  }

  public function wp_mail_from($name) {
    return get_bloginfo('name');
  }

}