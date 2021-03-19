<?php
namespace App\Models;

use Core\Model\Model;

/**
 * @method ReadAll() | Récupère tous les utilisateurs
 * @method ReadOne(int $id) | Retourne un utilisateur en fonction de son id
 * @method delete(int $id) | Supprime un utilisateur en fonction de son id
 * @method create($data) | Enregistre un utilisateur dans la BDD
 */
class UserModel extends Model{

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "kido_user";

    /**
     * Récupère un utilisateur en fonction de son email
     *
     * @param string $email
     * @return object
     */
    public function getUserByEmail(string $email):object
    {
        $statement = "SELECT * FROM kido_user WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }



    public function updateWithPassword($id, $data)
    {
        $statement = "UPDATE kido_user SET
                        name= :name,
                        surname= :surname,
                        email= :email,
                        password= :password,

                        WHERE id = $id";
        
        $this->db->postData($statement, $data);
    }
}