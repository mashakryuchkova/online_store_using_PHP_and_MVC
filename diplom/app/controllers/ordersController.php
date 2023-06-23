<?php

class ordersController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $orders = $this->model->getList('Orders');
        $this->view->orders = $orders;
    }

    public function index() {
        if ($orders = $this->model->getList('Orders')) {
            $this->view->arResult["ORDERS"] = $orders;
        } else {
            $this->view->arResult["ORDERS"] = array();
        }
        parent::index();
    }
    
    public function completed() {
        $order_id = $_POST['order_id'];
        
        $success = $this->model->completed($order_id);
        
        if ($success) {
            echo json_encode(array("error" => false));
        } else {
            echo json_encode(array("error" => true));
        }
    }
}
