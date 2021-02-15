<?php


namespace Core;


class CoreModel

{
    public $table;
    public $db;
    public $out;
    public  function  __construct($table)
    {
        $user = DB_USER;
        $pass = DB_PASSWORD;
        $host = DB_HOST;
        $db = DB_DATABASE;
        $this->db = new \PDO("mysql:dbname=$db;host=$host",$user,$pass);
        $this->db->exec("SET NAMES 'utf8'");
        $this->table = $table;
    }

    public  function  all(){
        $sql =  'SELECT * FROM '.$this->table;

        $stat = $this->db->prepare($sql);
        $stat->execute();
        while (($row = $stat->fetch(\PDO::FETCH_ASSOC))){
            $this->out[] = $row;
        }
        return $this->out;
    }

    public function getById($id)
    {
        $result = array();
        $sql =  'SELECT * FROM '.$this->table. ' WHERE id =:id ';
        $stmt= $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(empty($result))
        {
            return false;
        }
        else {
            return $result;
        }
    }
    public  function count(){
        $sql = ' SELECT count(*) AS c FROM '.$this->table;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(\PDO::FETCH_OBJ);
        return $count->c;
    }

}