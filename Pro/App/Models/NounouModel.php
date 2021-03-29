<?php
namespace App\Models;

use Core\Model\Model;

class NounouModel extends Model {

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "kido_pro_user_nounou";

    public function getNounouByEmail(string $email)//:object
    {
        $statement = "SELECT * FROM $this->table WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }

    public function createCustom(array $data, $table)
    {
        // On récupère les informations d'un formulaire
        // Ces informations sont dans le $_POST avec le name des input
        
        $statement = "INSERT INTO $table (";
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

    public function getAllCrenauxOfNounou(string $id)//:object
    {
        $statement = "SELECT * FROM kido_pro_planning_nounou WHERE id_user_nounou = '$id'";
        return $this->db->getData($statement, false);
    }

}