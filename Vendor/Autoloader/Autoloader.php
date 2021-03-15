<?php
namespace Vendor\Autoloader;

/**
 * Class d'autoloader chargeant toutes les class des services
 */
class Autoloader{

    /**
     * require la class appelée
     *
     * @param string $class chemin de la class
     * @return void
     */
    public static function autoload($class){
        $class = str_replace('\\', '/', $class);
        require ROOT . '/' . $class . '.php';
    }
    
    /**
     * Récupère et passe le chemin de la class à appeler
     *
     * @return void
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    } 
}