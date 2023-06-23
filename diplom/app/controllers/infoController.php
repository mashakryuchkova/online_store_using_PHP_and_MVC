<?php

include_once __DIR__ . '/../admin/controllers/genresController.php';

class infoController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Главная страница");
    }

    public function index() {
        if ($carts = $this->model->getList('Carts')) {
            $this->view->arResult["CARTS"] = $carts;
        } else {
            $this->view->arResult["CARTS"] = array();
        }
        if ($books = $this->model->getList('Books')) {
            $this->view->arResult["ITEMS"] = $books;
        } else {
            $this->view->arResult["ITEMS"] = array();
        }
        if ($genres = $this->model->getList('Genres')) {
            $this->view->arResult["GENRES"] = $genres;
        } else {
            $this->view->arResult["GENRES"] = array();
        }
        parent::index();
    }
}
