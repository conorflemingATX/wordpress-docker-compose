<?php
namespace MetForm\Core\Entries;
defined( 'ABSPATH' ) || exit;

Class Api extends \MetForm\Base\Api{

    public function config(){
        $this->prefix = 'entries';
        $this->param  = "/(?P<id>\w+)";
    }

    public function post_insert(){
        
        $id = $this->request['id'];
        
        $form_data = $this->request->get_params();

        $file_data = $this->request->get_file_params();

        return Action::instance()->submit($id, $form_data, $file_data);

    }

    public function get_export(){

        $id = $this->request['id'];

        return Export::instance()->export_data($id);
        
    }

    public function get_paypal(){
        $args = [
            'method' => (isset($this->request['action']) ? $this->request['action']: ''),
            'action' => (isset($this->request['id']) ? $this->request['id']: ''),
            'entry_id' => (isset($this->request['entry_id']) ? $this->request['entry_id']: ''),
        ];
        if(class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')){
            return \MetForm_Pro\Core\Integrations\Payment\Paypal::instance()->init($args);
        }
        return 'Pro needed';

    }

    public function get_stripe(){
        $args = [
            'method' => (isset($this->request['action']) ? $this->request['action']: ''),
            'action' => (isset($this->request['id']) ? $this->request['id']: ''),
            'entry_id' => (isset($this->request['entry_id']) ? $this->request['entry_id']: ''),
            'token' => (isset($this->request['token']) ? $this->request['token']: ''),
        ];
        if(class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')){
           return \MetForm_Pro\Core\Integrations\Payment\Stripe::instance()->init($args);
        }
        return 'Pro needed';

    }

    public function get_views(){
        return $this->request->get_params();
    }
    
    
}

