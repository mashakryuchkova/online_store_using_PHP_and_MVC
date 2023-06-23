<?php

include_once __DIR__ . '/../admin/controllers/booksController.php';

class cartsController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $carts = $this->model->getList('Carts');
        $this->view->carts = $carts;
    }

    public function index() {
        if ($users = $this->model->getList('Users')) {
            $this->view->arResult["USERS"] = $users;
        } else {
            $this->view->arResult["USERS"] = array();
        }
        if ($carts = $this->model->getList('Carts')) {
            $this->view->arResult["CARTS"] = $carts;
        } else {
            $this->view->arResult["CARTS"] = array();
        }
        parent::index();
    }

    public function add() {
        $data = array(
            'user_id' => htmlspecialchars($_POST["user_id"])
        );

        if ($id = $this->model->add($data)) {
            echo json_encode(array("error" => false));
        } else {
            echo json_encode(array("error" => true));
        }
    }
}
