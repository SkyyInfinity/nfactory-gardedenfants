<?php

namespace Vendor\Entity;

class Entity{

    /**
     * Load the corresponding entity
     *
     * @var Class
     */
    private $entity;

    public function __construct($data, $class)
    {
        $this->entity = '\App\Entity\\' . ucfirst($class).'()';
        $this->entity = new $this->entity;

        if(!empty($data)){
            $this->hydrate($data);
        }
    }

    private function hydrate($data)
    {
        foreach($data as $key => $value){
            $this->method = 'set'. ucfirst($key);
            $this->entity->$this->method($value);
        }
    }
}