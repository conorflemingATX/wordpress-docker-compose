<?php 

class Sassico_Modules{

    static function module_url(){
        return plugin_dir_url( __FILE__ );
    }

    public function run(){
        // die('foo');

        add_action('elementskit/loaded', function(){
            include 'custom-css/init.php';
            
            if(\ElementsKit::PACKAGE_TYPE != 'pro'){
                $this->include_files();
                $this->load_classes();
                add_action( 'wp_enqueue_scripts', [$this, 'scripts'] );
            }
        });

    }

    public function scripts(){
        wp_enqueue_script( 'chart-kit-js', self::module_url() . 'elements/chart/assets/js/chart.js', array( 'jquery' ), false, true );
    }

    public function load_classes(){
        new ElementsKit\Modules\Parallax\Init();
        new ElementsKit\Modules\Sticky_Content\Init();
    }

    public function include_files(){
        
        include 'parallax/init.php';
        include 'sticky-content/init.php';



        include 'elements/hotspot/hotspot.php';
        include 'elements/chart/chart.php';
    }

    public static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {

            // Fire the class instance
            self::$instance = new self();
            self::$instance;
        }

        return self::$instance;
    }
    
}

Sassico_Modules::instance()->run();