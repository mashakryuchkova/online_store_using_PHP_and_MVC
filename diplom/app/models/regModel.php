<?php

class regModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function registration($data) {
        $sth = $this->db->prepare("INSERT Users (name, login, email, phone, password, role_id) "
                . "VALUES (:name, :login, :email, :phone, :password, :role_id) ");
        $sth->execute($data);
        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
    
    public function createCart($data) {
        $sth = $this->db->prepare("INSERT INTO Carts (user_id) "
                . "VALUES (:user_id) ");
        $sth->execute($data);
        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
    
    public function loginExist($login) {
        $sth = $this->db->prepare("SELECT id FROM Users WHERE login = :login");
        $sth->execute(array(":login" => $login));
        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function emailExist($email) {
        $sth = $this->db->prepare("SELECT id FROM Users WHERE email = :email");
        $sth->execute(array(":email" => $email));
        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function authorization($data) {
        $sth = $this->db->prepare("SELECT id, name, role_id, login FROM Users"
                . " WHERE login = :login AND password = :password");
        $sth->execute(array(":login" => $data["LOGIN"],
            ":password" => md5($data["PASSWORD"])));
        if ($res = $sth->fetch(PDO::FETCH_ASSOC)) {
            return $res;
        } else {
            return false;
        }
    }   
}
