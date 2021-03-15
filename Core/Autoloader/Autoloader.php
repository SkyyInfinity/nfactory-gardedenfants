<?php
namespace Core\Autoloader;

class Autoloader{


    public static function autoload($class)
    {
        $class = str_replace('\\', '/', $class);
        require ROOT."$class.php";
    }

    public static function register()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
}