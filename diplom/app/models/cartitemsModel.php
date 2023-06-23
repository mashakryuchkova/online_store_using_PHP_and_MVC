<?php

class cartitemsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $sth = $this->db->prepare("INSERT Cart_items (cart_id, book_id, quantity) "
                . "VALUES (:cart_id, :book_id, :quantity) ");
        $sth->execute($data);

        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function createOrder($data) {
        $sth = $this->db->prepare("SELECT * FROM Orders WHERE user_id = :user_id AND completed = 0");
        $sth->execute(array(
            ':user_id' => $data['user_id']));
        if ($sth->rowCount() > 0) {
            return false;
        } else {
            $data['status'] = 'ожидает обработку';
            $sth = $this->db->prepare("INSERT INTO Orders (user_id, completed, status) VALUES (:user_id, :completed, :status)");
            $sth->execute($data);
            if ($sth->rowCount() > 0) {
                return $this->db->lastInsertId();
            } else {
                return false;
            }
        }
    }
}
