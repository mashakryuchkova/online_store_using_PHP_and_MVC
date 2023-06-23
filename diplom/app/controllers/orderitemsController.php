<?php

class orderitemsController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
    }

    public function index() {
        if ($order_items = $this->model->getList('Order_items')) {
            $this->view->arResult["ORDER_ITEMS"] = $order_items;
        } else {
            $this->view->arResult["ORDER_ITEMS"] = array();
        }
        parent::index();
    }

    public function add() {
        $data = array(
            "order_id" => htmlspecialchars((int) $_POST["order_id"]),
            "books" => json_decode($_POST["books"], true)
        );
        
        if ($data["order_id"] > 0) {
            $this->model->add($data);
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }
}
