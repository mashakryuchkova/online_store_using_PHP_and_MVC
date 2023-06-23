<?php

class ordersModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function completed($order_id) {
        $sth = $this->db->prepare(" UPDATE Orders SET completed = 1"
                . " WHERE id = :order_id " );
        $sth->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $success = $sth->execute();

        return $success;
    }
}
