<?php
namespace Core\Model;

use Core\Database\Database;

class Model{

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table;

    /**
     * Connexion à la BDD
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Enregistre une ligne dans la BDD
     *
     * @param array $data
     */
    public function create(array $data)
    {
        // On récupère les informations d'un formulaire
        // Ces informations sont dans le $_POST avec le name des input
        
        $statement = "INSERT INTO $this->table (";
        $values = "VALUES (";
        foreach ($data as $key => $value) {
            $statement .= $key .",";
            $values .= "'". $value ."',";
        }
        $statement = substr($statement,0,-1) . ") ";
        $values = substr($values, 0, -1) . ")";

        $statement .= $values;
        $this->db->postData($statement);

    }

    /**
     * Récupère l'ensemble des informations d'une table dans la BDD
     *
     * @return array
     */
    public function readAll():array
    {

       return $this->db->getData("SELECT * FROM $this->table");
        
    }

    /**
     * Récupère une ligne d'une table dans la BDD
     *
     * @param integer $id
     * @return object
     */
    public function readOne(int $id):object
    {

        return $this->db->getData("SELECT * FROM $this->table WHERE id = $id", true);
    }

    /**
     * Supprime une ligne d'une table dans la BDD
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $statement = "DELETE FROM $this->table WHERE id = $id";
        $this->db->postData($statement);
    }
}