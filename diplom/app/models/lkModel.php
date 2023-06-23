<?php

class lkModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function edit($data) {
        $sth = $this->db->prepare(
                " UPDATE Users SET name = :name, login = :login, phone = :phone, email = :email "
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
