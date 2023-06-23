<?php

class favModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $sth = $this->db->prepare("INSERT INTO Favorites (user_id, book_id)"
                . " VALUES (:user_id, :book_id)");
        $sth->execute($data);
        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function del($data) {
        $sth = $this->db->prepare("DELETE FROM Favorites "
                . " WHERE user_id = :user_id AND book_id = :book_id");
        $sth->execute($data);
        return $sth->rowCount() > 0;
    }

    public function isFavorite($user_id, $book_id) {
        $sth = $this->db->prepare("SELECT COUNT(*) FROM Favorites "
                . " WHERE user_id = :user_id AND book_id = :book_id");
        $sth->execute(array(
            "user_id" => $user_id, "book_id" => $book_id
        ));
        return $sth->fetchColumn() > 0;
    }
}
