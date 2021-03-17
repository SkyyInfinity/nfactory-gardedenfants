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

}