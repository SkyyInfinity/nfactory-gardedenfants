<?php
namespace App\Models;

use Core\Model\Model;

class ChildModel extends Model {

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "kido_child";

    /**
     * Récupère tous les enfants à partir de l'id du parent
     *
     * @param int $idParent L'id du parent (user actuellement connecter)
     * @return array
     */
    public function getChildsByParent(int $idParent):array {
        $statement = "SELECT kido_child.id, kido_child.name, kido_child.age FROM kido_child 
                      INNER JOIN kido_user 
                      ON kido_child.id_parent = kido_user.id 
                      WHERE kido_child.id_parent = '$idParent'";

        return $this->db->getData($statement, false);
    }

    /**
     * Récupère un enfant à partir de l'id du parent
     *
     * @param int $idParent L'id du parent (user actuellement connecter)
     * @return object
     */
    public function getChildByParent(int $idParent, int $idChild):object {
        $statement = "SELECT kido_child.id, kido_child.name, kido_child.age FROM kido_child 
                      INNER JOIN kido_user 
                      ON kido_child.id_parent = kido_user.id 
                      WHERE kido_child.id_parent = '$idParent' 
                      AND
                      WHERE kido_child.id = $idChild";

        return $this->db->getData($statement, false);
    }

    /**
     * Modifie un enfant à partir de son id
     *
     * @param int $id l'id de l'enfant
     * @return object
     */
    public function updateWithId($id, $data) {
        $statement = "UPDATE $this->table SET
                        id_parent = :id_parent,
                        name= :name,
                        age= :age,
                        WHERE id = $id";

        $this->db->postData($statement, $data);
    }
}