<?php
namespace MetForm\Templates;
defined( 'ABSPATH' ) || exit;

Class Base{
    use \MetForm\Traits\Singleton;

    public function get_templates(){
        return [
            1 => [
                'id' => 1,
                'title' => 'Simple Contact Form 1',
                'preview-thumb' => \MetForm\Plugin::instance()->plugin_url() . 'templates/1/preview-thumb.svg',
                'preview-large' => \MetForm\Plugin::instance()->plugin_url() . 'templates/1/preview-large.svg',
                'file' => \MetForm\Plugin::instance()->plugin_dir() . 'templates/1/content.json',
            ],
            2 => [
                'id' => 2,
                'title' => 'Simple Contact Form 2',
                'preview-thumb' => \MetForm\Plugin::instance()->plugin_url() . 'templates/2/preview-thumb.svg',
                'preview-large' => \MetForm\Plugin::instance()->plugin_url() . 'templates/2/preview-large.svg',
                'file' => \MetForm\Plugin::instance()->plugin_dir() . 'templates/2/content.json',
            ],
            3 => [
                'id' => 3,
                'title' => 'Booking form',
                'preview-thumb' => \MetForm\Plugin::instance()->plugin_url() . 'templates/3/preview-thumb.svg',
                'preview-large' => \MetForm\Plugin::instance()->plugin_url() . 'templates/3/preview-large.svg',
                'file' => \MetForm\Plugin::instance()->plugin_dir() . 'templates/3/content.json',
            ],
            4 => [
                'id' => 4,
                'title' => 'Job application form',
                'preview-thumb' => \MetForm\Plugin::instance()->plugin_url() . 'templates/4/preview-thumb.svg',
                'preview-large' => \MetForm\Plugin::instance()->plugin_url() . 'templates/4/preview-large.svg',
                'file' => \MetForm\Plugin::instance()->plugin_dir() . 'templates/4/content.json',
            ],
            5 => [
                'id' => 5,
                'title' => 'Support form',
                'preview-thumb' => \MetForm\Plugin::instance()->plugin_url() . 'templates/5/preview-thumb.svg',
                'preview-large' => \MetForm\Plugin::instance()->plugin_url() . 'templates/5/preview-large.svg',
                'file' => \MetForm\Plugin::instance()->plugin_dir() . 'templates/5/content.json',
            ],
        ];
    }

    public function get_template_contents($id){
        if(!array_key_exists($id, $this->get_templates()) || !file_exists($this->get_templates()[$id]['file'])){
            return null;
        }

        $content = file_get_contents($this->get_templates()[$id]['file']);
        $content = json_decode($content);
        
        return (!isset($content->content)) ? null : $content->content;
    }

}