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
     * @param int $idChild L'id de l'enfant ($_GET['id'])
     * @return object
     */
    public function getChildByParent(int $idParent, int $idChild):object {
        $statement = "SELECT kido_child.id, kido_child.name, kido_child.age FROM kido_child 
                      INNER JOIN kido_user 
                      ON kido_child.id_parent = kido_user.id 
                      WHERE kido_child.id = $idChild AND kido_user.id = $idParent";

        return $this->db->getData($statement, true);
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

    public function addChild($data) {
        $statement = "INSERT INTO $this->table (name,age)VALUES (:name,:age)";
        $this->db->postData($statement, $data);
    }
    public function addChild_disease($data) {
        $statement = "INSERT INTO kido_child_caract(id_child, title, type) 
        VALUES (:data['id'] :data['disease'], 'disease')";
        $this->db->postData($statement, $data);
    }
    
    public function addChild_allergy($data) {  

    }

    public function getlastInsertId() {
        return $this->db->lastInsertId();
    }
}