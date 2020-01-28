<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class sassico_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){
        add_action('elementskit/loaded', [$this, 'init']);
    }


	public function init(){

        add_action('elementor/init', array($this, 'sassico_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'sassico_elementor_init' ), 11 );
        add_action('elementor/widgets/widgets_registered', array($this, 'sassico_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
       wp_enqueue_script( 'sassico-main-elementor', SASSICO_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), SASSICO_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */


    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function sassico_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'sassico-elements',
            [
                'title' =>esc_html__( 'Sassico', 'sassico' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */ 

    public function sassico_icon_pack( $controls_manager ) {

        require_once SASSICO_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'SASSICO_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }
 
    public function sassico_shortcode_elements($widgets_manager){

        // require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/sassico-case-study.php';
        // $widgets_manager->register_widget_type(new Elementor\Sassico_Case_Study_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/testimonial/sassico-testimonial.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_Testimonial_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/timeline/sassico-timeline.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_Timeline_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/pricing/sassico-pricing.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_Pricing_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/service/sassico-service.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_service_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/call-to-action/call-to-action.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_CTA_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/working-process/working-process.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_Working_Process_Widget());

        require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/blog/blog.php';
        $widgets_manager->register_widget_type(new Elementor\Sassico_Blog_Widget());

	    require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/languages-switch/languages-switch.php';
	    $widgets_manager->register_widget_type(new Elementor\Sassico_Languages_Switch());

	    require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/back-to-top/back-to-top.php';
	    $widgets_manager->register_widget_type(new Elementor\Sassico_Back_To_Top_Widget());

	    require_once SASSICO_EDITOR_ELEMENTOR.'/widgets/gallery-slider/gallery-slider.php';
	    $widgets_manager->register_widget_type(new Elementor\Sassico_Gallery_Slider_Widget());
    }
    
	public static function sassico_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new sassico_Shortcode();
        }
        return self::$_instance;
    }

}
sassico_Shortcode::sassico_get_instance();