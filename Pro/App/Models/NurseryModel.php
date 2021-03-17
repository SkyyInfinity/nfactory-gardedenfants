<?php
namespace App\Models;

use Core\Model\Model;

class NurseryModel extends Model {

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "kido_pro_creche";

    public function getNurseryByEmail(string $email):object
    {
        $statement = "SELECT * FROM $this->table WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }

}