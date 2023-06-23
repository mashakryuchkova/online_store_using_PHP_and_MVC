<?php

class Model {

    public function __construct() {
        $this->db = new Database;
    }

    public function getList($table, $order = "id asc", $select = "*", $filter = "1=1") {
        
        if (is_array($select)) {
            $select = implode(", ", $select);
        }
        
        $sth = $this->db->prepare(" SELECT " . $select . " FROM " . $table . " WHERE " . $filter . " ORDER BY " . $order);
        $sth->execute(array());

        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function delete($table, $attr, $value) {
        $sth = $this->db->prepare(" DELETE FROM " . $table . " WHERE " . $attr . " = " . $value);
        $sth->execute(array());

        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getByID($id, $table, $select = "*") {
        if (is_array($select)) {
            $select = implode(", ", $select);
        }
        $sth = $this->db->prepare(" SELECT " . $select . " FROM " . $table . " WHERE id = :id");
        $sth->execute(array(":id" => $id));
        
        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC)[0];
        } else {
            return false;
        }
    }
    
    public function search($q, $table, $attr, $select = "*", $logic = "OR") {
        if (is_array($select)) {
            $select = implode(", ", $select);
        }
        
        $where = array();
        foreach($attr as $at) {
            $where[] = " `$at` LIKE '%$q%' ";
        }
        
        $where = implode(" $logic ", $where);
        
        $sth = $this->db->prepare(" SELECT " . $select . " FROM " . $table . " WHERE $where ; ");
        $sth->execute();
        
        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
