<?php

namespace Vendor\Database;

class Config{

    /**
     * Config class instanciation
     *
     * @var Config|Null
     */
    private static $_instance = null;

    /**
     * Settings for Database connection
     *
     * @var array
     */
    public $settings = array();
  
    /**
     * Constructeur de la class
     *
     * @param string $file File path DbConfig.php
     */
    private function __construct($file){
      $this->settings = require $file;
    }
    
    /**
     * Method creating the unique Config instanciation if it doesn't exist
     *
     * @param string $file File path DbConfig.php
     * @return Config
     */
    public static function getInstance($file){
      if(is_null(self::$_instance)){
        self::$_instance = new Config($file);
      }
      return self::$_instance;
    }
    
    /**
     * Get the parameter value
     *
     * @param string $key
     * @return string
     */
    public function get($key){
      return $this->settings[$key];
    }
  }