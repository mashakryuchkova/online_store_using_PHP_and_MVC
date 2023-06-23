<?php

class orderitemsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $sth = $this->db->prepare("INSERT INTO Order_items (order_id, book_id, quantity, price) "
                . " VALUES (:order_id, :book_id, :quantity, :price) " );

        foreach ($data['books'] as $book) {
            $sth->execute([
                'order_id' => $data['order_id'],
                'book_id' => $book['id'],
                'quantity' => $book['quantity'],
                'price' => $book['price']
            ]);
        }

        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
}
