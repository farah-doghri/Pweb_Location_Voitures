<?php
/*** configuration *****/
ini_set('display_errors','on');
error_reporting(E_ALL);

class MyAutoload{
    public static function start(){

        spl_autoload_register(array(__CLASS__, 'autoload'));

        //Utilisation pour routeur
        $root = $_SERVER['DOCUMENT_ROOT'];
        //Utilisation pour URL
        $host = $_SERVER['HTTP_HOST'];

        //URL
        define('HOST', 'http://'.$host.'/ProjetPweb'.'/');
        //Emplacement sur le disque dur
        define('ROOT', $root.'/ProjetPweb'.'/');

        //constantes
        define('CONTROLLER', ROOT.'controller/');
        define('MODEL', ROOT.'model/');
        define('VIEW', ROOT.'view/');
        define('CLASSES', ROOT.'classes/');

        define('ASSETS', HOST.'assets/');
        define('IMAGES', HOST.'images/');
    }

    public static function autoload($class)
    {    
        if(file_exists(MODEL.$class.'.php')){
            include_once(MODEL.$class.'.php');
        }
        else if (file_exists(CLASSES.$class.'.php')) {
            include_once(CLASSES.$class.'.php');
        } 
        else if (file_exists(CONTROLLER.$class.'.php')){
            include_once(CONTROLLER.$class.'.php');
        };
    }
}


?>