<?php

class booksModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $sth = $this->db->prepare(
                " INSERT INTO Books ( author, name, code, genres_id, pages, year_publishing, publishing_house, price, hit, stock, front_img, back_img, description ) "
                . " VALUE ( :author, :name, :code, :genres_id, :pages, :year_publishing, :publishing_house, :price, :hit, :stock, :front_img, :back_img, :description ) ; "
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
                "UPDATE Books SET author = :author, name = :name, code = :code, genres_id = :genres_id, pages = :pages, year_publishing = :year_publishing, publishing_house = :publishing_house, price = :price, hit = :hit, stock = :stock, front_img = :front_img, back_img = :back_img, description = :description WHERE id = :id;"
        );

        if (!empty($_FILES["front_img"]["tmp_name"])) {
            $frontImgName = $_FILES["front_img"]["name"];
            $frontImgPath = "<?= MAIN_PREFIX ?>" . "/../../upload/" . $frontImgName;
            move_uploaded_file($_FILES["front_img"]["tmp_name"], $frontImgPath);
            $data["front_img"] = $frontImgName;
        } else {
            $data["front_img"] = null;
        }

        if (!empty($_FILES["back_img"]["tmp_name"])) {
            $backImgName = $_FILES["back_img"]["name"];
            $backImgPath = "<?= MAIN_PREFIX ?>" . "/../../upload/" . $backImgName;
            move_uploaded_file($_FILES["back_img"]["tmp_name"], $backImgPath);
            $data["back_img"] = $backImgName;
        } else {
            $data["back_img"] = null;
        }

        $sth->bindParam(':author', $data['author']);
        $sth->bindParam(':name', $data['name']);
        $sth->bindParam(':code', $data['code']);
        $sth->bindParam(':genres_id', $data['genres_id']);
        $sth->bindParam(':pages', $data['pages']);
        $sth->bindParam(':year_publishing', $data['year_publishing']);
        $sth->bindParam(':publishing_house', $data['publishing_house']);
        $sth->bindParam(':price', $data['price']);
        $sth->bindParam(':hit', $data['hit']);
        $sth->bindParam(':stock', $data['stock']);
        $sth->bindParam(':front_img', $data['front_img']);
        $sth->bindParam(':back_img', $data['back_img']);
        $sth->bindParam(':description', $data['description']);
        $sth->bindParam(':id', $data['id']);

        $sth->execute();

        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
