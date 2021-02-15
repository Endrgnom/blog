<?php


namespace App;

use Core\CoreModel;

class ArticalModel extends CoreModel
{
    public function getSingleArticleById($id)
    {
        $result = array();
        $sql = "SELECT * FROM " . $this->table . " WHERE  id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }
}