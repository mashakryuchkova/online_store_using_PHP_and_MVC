<?php

class genresModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add($data) {
        $sth = $this->db->prepare(
            "INSERT INTO Genres (name, code, parent_id, depth_level ) "
                . " VALUE (:name, :code, :parent_id, :depth_level );"
        );
        
        $sth->execute($data);
        
        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
    
    public function edit($data) {
        $sth = $this->db->prepare(
            " UPDATE Genres SET name = :name, code = :code, parent_id = :parent_id, depth_level = :depth_level "
                . " WHERE id = :id; "
        );
        
        $sth->execute($data);
        
        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}