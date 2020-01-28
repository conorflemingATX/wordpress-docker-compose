<?php
namespace MetForm\Core\Forms;
defined( 'ABSPATH' ) || exit;

Class Api extends \MetForm\Base\Api{

    public function config(){
        $this->prefix = 'forms';
        $this->param  = "/(?P<id>\w+)";
    }

    public function post_update(){
        $form_id = $this->request['id'];

        $form_setting = $this->request->get_params();

        return Action::instance()->store($form_id, $form_setting);
    }

    public function get_get(){
        $form_id = $this->request['id'];

        return Action::instance()->get_all_data($form_id);
    }

    public function get_builder(){
        $form_id = $this->request['id'];
        return Builder::instance()->get_editor($form_id);
    }

    public function get_builder_form_id(){
        $title = $this->request['title'];
        $template_id = $this->request['id'];
        return Builder::instance()->create_form($title, $template_id);
    }

    public function get_templates(){
        $form_id = $this->request['id'];
		$args = array(
			'post_type'   => Base::instance()->form->get_name(),
            'post_status' => 'publish',
            'posts_per_page'    => -1
		);
		   
		$forms = get_posts( $args );
        
		foreach($forms as $form){
            echo '<option value="'.$form->ID.'" '.selected($form_id, $form->ID, false).'>'.$form->post_title.'</option>';
        }
        
        exit();
    }

    public function post_views(){
        $form_id = $this->request['id'];
        return Action::instance()->count_views($form_id);
    }

}