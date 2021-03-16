<?php

namespace Vendor\Database;

use Vendor\Database\Config;

class Database{

    /**
     * Database Name
     *
     * @var string
     */
    private $dbName;

    /**
     * Database Host
     *
     * @var string
     */
    private $dbHost;

    /**
     * Database Port
     *
     * @var string
     */
    private $dbPort;

    /**
     * Database User
     *
     * @var string
     */
    private $dbUser;

    /**
     * Database Password
     *
     * @var string
     */
    private $dbPassword;

    /**
     * Database connexion
     *
     * @var PDO
     */
    protected $pdo;
  
    /**
     * Initialization of the pdo connection
     */
    public function __construct(){

        if(is_null($this->pdo)){
        
            $this->getConfig();
            $this->pdo = new \PDO('mysql:host=' . $this->dbHost . ':' . $this->dbPort . 
                                ';dbname=' . $this->dbName,
                                $this->dbUser,
                                $this->dbPassword);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * Save params of DbConfig for a Database connection
     */
    private function getConfig(){
        $config = Config::getInstance(ROOT . "/Config/DbConfig.php");
        $this->dbName = $config->get('dbName');
        $this->dbHost = $config->get('dbHost');
        $this->dbPort = $config->get('dbPort');
        $this->dbUser = $config->get('dbUser');
        $this->dbPassword = $config->get('dbPassword');
    }
}