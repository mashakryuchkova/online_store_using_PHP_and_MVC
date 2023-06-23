<?php

class lkController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Личный кабинет");
    }

    public function index() {
        if ($users = $this->model->getList('Users')) {
            $this->view->arResult["USERS"] = $users;
        } else {
            $this->view->arResult["USERS"] = array();
        }
        if ($order_items = $this->model->getList('Order_items')) {
            $this->view->arResult["ORDER_ITEMS"] = $order_items;
        } else {
            $this->view->arResult["ORDER_ITEMS"] = array();
        }
        if ($orders = $this->model->getList('Orders')) {
            $this->view->arResult["ORDERS"] = $orders;
        } else {
            $this->view->arResult["ORDERS"] = array();
        }
        if ($book = $this->model->getList('Books')) {
            $this->view->arResult["BOOKS"] = $book;
        } else {
            $this->view->arResult["BOOKS"] = array();
        }
        parent::index();
    }

    public function getEditById($id) {
        $data = $this->model->getByID($id, 'Users');
        $this->view->user = $data;

        $this->view->render(strtolower(get_class($this)), "edit_form");
    }

    public function edit() {
        $data = array(
            'id' => htmlspecialchars($_POST["id"]),
            'name' => htmlspecialchars($_POST["user_name"]),
            'login' => htmlspecialchars($_POST["user_login"]),
            'phone' => htmlspecialchars($_POST["user_phone"]),
            'email' => is_null($_POST["user_email"]) ? 0 : htmlspecialchars($_POST["user_email"]),
        );

        if ($this->model->edit($data)) {
            echo json_encode(array("error" => true));
            header("Location: /kryuchkova/diplom/lk/");
            exit;
        } else {
            echo json_encode(array("error" => false));
        }
    }
}
