<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
//die('cpt found');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'SassicoCustomPost\Sassico_CustomPost' ) ) {
    //project 
   $project = new SassicoCustomPost\Sassico_CustomPost( 'sassico' );
   
	$project->xs_init( 'sassico-service', 'Service', 'Service', array( 'menu_icon' => 'dashicons-grid-view',
		'supports'	 => array( 'title','editor','excerpt','thumbnail'),
		'rewrite'	 => array( 'slug' => 'sassico-service' ),
		'exclude_from_search' => true,
	
	));
      
	$project_tax = new  SassicoCustomPost\Sassico_Taxonomies('sassico');
   $project_tax->xs_init('sassico-service', 'Service Category', 'Service Categories', 'sassico-service');

}

if (class_exists('ElementsKit')) {
	add_action('elementskit/template/before_header', function(){
		echo '<div class="xs_page_wrapper">';
	});
	
	add_action('elementskit/template/after_footer', function(){
		echo '</div>';
	});
}