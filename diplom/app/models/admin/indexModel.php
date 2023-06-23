<?php

class indexModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function getUsersCount() {
        $sql = "SELECT COUNT(*) AS count FROM Users";
        $result = $this->db->query($sql);
        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row["count"];
        } else {
            return false;
        }
    }
    
    function getOrdersCount() {
        $sql = "SELECT COUNT(*) AS count FROM Orders"
                . " WHERE completed = 1";
        $result = $this->db->query($sql);
        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row["count"];
        } else {
            return false;
        }
    }
}
