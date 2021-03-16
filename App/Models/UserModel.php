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
    protected $table = "user";

    /**
     * Récupère un utilisateur en fonction de son email
     *
     * @param string $email
     * @return object
     */
    public function getUserByEmail(string $email):object
    {
        $statement = "SELECT * FROM user WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }

    /**
     * Retourne les 3 auteurs les plus actifs
     *
     * @return array
     */
    public function getBest3():array
    {
        $statement = "SELECT user.id, user.pseudo, COUNT(article.user_id) as nbArticle 
                        FROM user
                        INNER JOIN article ON user.id = article.user_id
                        GROUP BY article.user_id
                        ORDER BY nbArticle DESC
                        LIMIT 3
                        ";
        
        return $this->db->getData($statement);
    }

    public function updateWithoutPassword($id, $data)
    {
        $statement = "UPDATE user SET
                        email= :email,
                        pseudo = :pseudo
                        WHERE id = $id";
        
        $this->db->postData($statement, $data);
    }

    public function updateWithPassword($id, $data)
    {
        $statement = "UPDATE user SET
                        email= :email,
                        password= :password,
                        pseudo = :pseudo
                        WHERE id = $id";
        
        $this->db->postData($statement, $data);
    }
}