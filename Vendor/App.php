<?php

namespace Vendor;

use Vendor\Database\Database;

/**
 * General class
 */
class App{

    /**
     * Database connection
     *
     * @var \PDO
     */
    private $db_instance = null;

    private static $_instance;

    /**
     * Load autoloader & session
     */
    public static function load(){
        session_start();
        require 'Autoloader/Autoloader.php';
        Autoloader\Autoloader::register();
    }

    /**
     * Load self class
     *
     * @return object
     */
    public static function getInstance(){
        if (is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * Load model corresponding to controller's method
     *
     * @param string $name
     * @return object
     */
    public static function getModel($name)
    {
        $className = '\\App\\Model\\' . ucfirst($name) . 'Table';
        return new $className();
    }

    /**
     * Load the Database class
     *
     * @return object
     */
    public function getDb(){
        if (is_null($this->db_instance)){
            $this->db_instance = new Database();
        }

        return $this->db_instance;
    }
}