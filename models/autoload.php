<?php

class Autoload {
    
    public function __construct(){}
    
    public static function autoLoad( $class_name = null ) {
        if( class_exists($class_name) )
            return true;
        
        $class_name = explode("_",$class_name);
        $class_name = end($class_name);
        
        try{
            include $class_name . '.class.php';
        }catch(Exception $e){
            echo $e->getMessage();
        }
         
    }
    
    public function includeClassPath( $dirs = null ) {

        if( empty( $dirs ) ) {}

        $include_path = get_include_path();

        $include_path .= PATH_SEPARATOR . $dirs;
       
        set_include_path( $include_path );

    }

    public function initializeAutoload() {
        $dir = dirname(dirname( __FILE__ ));
        $this->includeClassPath( $dir );
    }

    public static function sleep(){
        spl_autoload_unregister('Autoload::autoLoad');
    }

    public static function wakeUp(){
        spl_autoload_register( 'Autoload::autoLoad' );
    }
    
}