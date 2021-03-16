<?php

namespace Vendor\Model;

use Vendor\Model\Model;

class Query extends Model
{

    /**
     * Find one|null result from Database
     *
     * @param int $id
     * @return object|null
     */
    public function find ($id)
    {
        return $this->query('SELECT * FROM ' . $this->model . ' WHERE id= ' . $id,
                                $this->classPath,
                                true
                                );
    }

    /**
     * Find many|null results from Database
     *
     * @param array $order
     * @return array|null
     */
    public function findAll($order = ['id' => 'ASC'])
    {
        return $this->query('SELECT * FROM ' . $this->model . ' ' . 
                                $this->createOrder($order),
                                null,
                                false
                                );                      
    }

    /**
     * Find one|null result from Database
     *
     * @param array $criteria
     * @param string $order
     * @return object|null
     */
    public function findOneBy ($criteria)
    {
        return $this->query('SELECT * FROM ' . $this->model . 
                                $this->createWhere($criteria),
                                $this->classPath,
                                true
                                );
    }

    /**
     * Find many|null result from Database
     *
     * @param array $criteria
     * @return object|null
     */
    public function findBy ($criteria, $order = ['id' => 'ASC'])
    {
        return $this->query('SELECT * FROM ' . $this->model . 
                                $this->createWhere($criteria) . ' ' .
                                $this->createOrder($order),
                                null,
                                false
                                );
    }
}