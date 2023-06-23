<?php

include_once __DIR__ . '/../admin/controllers/booksController.php';

class favController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Избранное");
    }

    public function index() {
        if ($fav = $this->model->getList('Favorites')) {
            $this->view->arResult["FAVS"] = $fav;
        } else {
            $this->view->arResult["FAVS"] = array();
        }
        if ($carts = $this->model->getList('Carts')) {
            $this->view->arResult["CARTS"] = $carts;
        } else {
            $this->view->arResult["CARTS"] = array();
        }
        if ($book = $this->model->getList('Books')) {
            $this->view->arResult["ITEMS"] = $book;
        } else {
            $this->view->arResult["ITEMS"] = array();
        }
        parent::index();
    }

    public function add() {
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        
        $data = array(
            "user_id" => $user_id,
            "book_id" => $book_id);
        if ($this->model->isFavorite($user_id, $book_id)) {
            if ($this->model->del($data)) {
                echo json_encode(array("error" => "", "isFavorite" => false));
            } else {
                echo json_encode(array("error" => "Произошла ошибка"));
            }
        } else {   
            if ($id = $this->model->add($data)) {
                $data['id'] = $id;
                echo json_encode(array("error" => "", "isFavorite" => true));
            } else {
                echo json_encode(array("error" => "Произошла ошибка"));
            }
        }
    }

    public function del() {
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        $data = array("user_id" => $user_id,
            "book_id" => $book_id);
        if ($this->model->del($data)) {
            echo json_encode(array("error" => "", "isFavorite" => false));
        } else {
            echo json_encode(array("error" => "Произошла ошибка"));
        }
    }

    public function all_del() {
        $data = array(
            "user_id" => htmlspecialchars((int) $_POST["user_id"])
        );
        if ($data["user_id"] > 0) {
            if ($this->model->delete("Favorites", "user_id", $data["user_id"])) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        } else {
            echo json_encode(array('success' => false));
        }
    }
}
