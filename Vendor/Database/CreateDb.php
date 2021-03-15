<?php

namespace Vendor\Database;

use Vendor\Database\Database;

class CreateDb extends Database
{
    /**
     * Create Tables in Database
     * Réfléchir à ce fichier doit-on générer les execs ou créer la method qu'on appel à chaque fois
     * Le mieux est de créer ce fichier et de le glisser dans install.
     */
    public function __construct($table)
    {
        $this->pdo->exec("CREATE TABLE test(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT)");
    }
}