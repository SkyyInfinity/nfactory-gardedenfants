<?php
namespace App\Models;

use Core\Model\Model;

class NounouDashboardModel extends Model {

    public function getAllSkills($id)
    {
        $statement = "SELECT * FROM kido_pro_caract_nounou WHERE id_user_nounou = '$id'";
        return $this->db->getData($statement, false);
    }
    public function getAdresse($id){
        $statement = "SELECT * FROM kido_pro_locate WHERE id_user = '$id' ORDER BY id DESC";
        return $this->db->getData($statement, true);
    }

    public function getUserInfo($id)
    {
        $statement = "SELECT * FROM kido_pro_user_nounou WHERE id = '$id'";
        return $this->db->getData($statement, true);
    }

}