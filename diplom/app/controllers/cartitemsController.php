<?php

use Libs\App;

include_once __DIR__ . '/../admin/controllers/booksController.php';
include_once __DIR__ . '/cartsController.php';

class cartitemsController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Корзина");
    }

    public function index() {
        if ($carts = $this->model->getList('Carts')) {
            $this->view->arResult["CARTS"] = $carts;
        } else {
            $this->view->arResult["CARTS"] = array();
        }
        if ($orders = $this->model->getList('Orders')) {
            $this->view->arResult["ORDERS"] = $orders;
        } else {
            $this->view->arResult["ORDERS"] = array();
        }
        if ($cart_items = $this->model->getList('Cart_items')) {
            $this->view->arResult["CART_ITEMS"] = $cart_items;
        } else {
            $this->view->arResult["CART_ITEMS"] = array();
        }
        if ($book = $this->model->getList('Books')) {
            $this->view->arResult["ITEMS"] = $book;
        } else {
            $this->view->arResult["ITEMS"] = array();
        }
        parent::index();
    }

    public function add() {
        $data = array(
            'cart_id' => htmlspecialchars($_POST["cart_id"]),
            'book_id' => htmlspecialchars($_POST["book_id"]),
            'quantity' => $_POST["quantity"],
        );
        
        if ($id = $this->model->add($data)) {
            $order_data = array (
                "user_id" => Libs\User::getID(),
                "completed" => 0,
            );

            $order_data = $this->model->createOrder($order_data);
                
            if ($order_id) {
                $_SESSION['$order_data'] = $order_data;
            }
            echo json_encode(array("error" => false));
        } else {
            echo json_encode(array("error" => true));
        }
    }
    
    public function del() {
        $data = array(
            "id" => htmlspecialchars((int) $_POST["id"])
        );
        if ($data["id"] > 0) {
            if ($this->model->delete("Cart_items", "id", $data["id"])) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        }
    }

    public function all_del() {
        $data = array(
            "cart_id" => htmlspecialchars((int) $_POST["cart_id"])
        );
        if ($data["cart_id"] > 0) {
            if ($this->model->delete("Cart_items", "cart_id", $data["cart_id"])) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        } else {
            echo json_encode(array('success' => false));
        }
    }
}
