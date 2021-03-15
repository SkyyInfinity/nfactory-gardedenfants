<?php

namespace Vendor\Model;

use Vendor\App;
use Vendor\Database\Database;

class Model extends Database{

    /**
     * Model's name
     *
     * @var string
     */
    protected $model;

    /**
     * Path to reach the class
     *
     * @var string
     */
    protected $classPath;

    /**
     * PDO connection
     *
     * @var \PDO
     */
    protected $db;

    /**
     * Get className for autoloading Model
     */
    public function __construct()
    {
        if(is_null($this->model)){
            $class = explode('\\', get_class($this));
            $className = end($class);
            $this->model = ucfirst(str_replace('Model', '', $className));
            $this->classPath = '\App\Entity\\' . $this->model;
        }
        parent::__construct();
    }

    /**
     * Create ORDER BY request
     *
     * @param array $order
     * @return string
     */
    protected function createOrder ($order)
    {
        $orderList = ' ORDER BY ';
        foreach ($order as $criteria => $value) {
            $orderList .= $criteria . ' "' . $value . '", ';
        }
        return substr($orderList, 0, -2);
    }

    /**
     * Create WHERE request
     *
     * @param array $order
     * @return string
     */
    protected function createWhere ($andWhere)
    {
        $whereList = ' WHERE ';
        foreach ($andWhere as $criteria => $value) {
            $whereList .= $criteria . ' = "' . $value . '" AND ';
        }
        return substr($whereList, 0, -4);
    }

    /**
     * Query informations in Database
     *
     * @param string $request
     * @param boolean $one
     * @return class
     */
    protected function query($request, $className = null, $one = false)
    {
        $query = $this->pdo->query($request);

        if(is_null($className)){
            $query->setFetchMode(\PDO::FETCH_OBJ);
        } else {
            $query->setFetchMode(\PDO::FETCH_CLASS, $className);
        }

        if ($one) {
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }

    /**
     * Insert informations in Database
     *
     * @param string $statement
     * @param array $data
     */
    public function insert ($statement, $data = [])
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);
    }

    /**
     * Delete informations in Database
     * or create Tables
     *
     * @param string $statement
     */
    public function exec ($statement)
    {
        return $this->pdo->exec($statement);
    }
}