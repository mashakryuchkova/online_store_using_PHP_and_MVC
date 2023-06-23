<?php
include_once __DIR__ . '/../admin/controllers/genresController.php';

class catalogController extends Controller {

    private static $instance;

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Категории");
    }

    public function index() {
        if ($genres = $this->model->getList('Genres')) {
            $this->view->arResult["GENRES"] = $this->getTreeForArray($genres);
        } else {
            $this->view->arResult["GENRES"] = array();
        }
        if ($books = $this->model->getList('Books')) {
            $this->view->arResult["ITEMS"] = $books;
        } else {
            $this->view->arResult["ITEMS"] = array();
        }
        if ($carts = $this->model->getList('Carts')) {
            $this->view->arResult["CARTS"] = $carts;
        } else {
            $this->view->arResult["CARTS"] = array();
        }
        parent::index();
    }

    public function getList() {
        $rootGenres = $this->model->getList('Genres', "id ASC", "*");
        $genresTree = $this->buildGenresTree($rootGenres);
        return $genresTree;
    }
    
    public function getProductsByGenre() {
        $selectedGenre = isset($_GET['genre']) ? $_GET['genre'] : null;
        if ($selectedGenre) {
            $products = $this->model->getProductsByGenre($selectedGenre);
            return $products;
        } else {
            return array();
        }
    }

    public static function getInstance($prefix) {
        $instance = null;
        if (!empty(self::$instance) && self::$instance instanceof genresController) {
            $instance = self::instance;
        } else {
            $instance = new genresController($prefix);
        }
        return $instance;
    }
    
    public function search($q = "", $table = "Books", $attr = array("author", "name")) {
        
        if (isset($_GET["q"]) && strlen($_GET["q"]) > 2) {
            $q = htmlspecialchars($_GET["q"]);
            if ($books = parent::search($q, $table, $attr)) {
                $this->view->arResult["ITEMS"] = $books;
            } else {
                $this->view->arResult["ITEMS"] = array();
            }
            if ($genres = $this->model->getList('Genres')) {
                $this->view->arResult["GENRES"] = $this->getTreeForArray($genres);
            } else {
                $this->view->arResult["GENRES"] = array();
            }
            if ($carts = $this->model->getList('Carts')) {
                $this->view->arResult["CARTS"] = $carts;
            } else {
                $this->view->arResult["CARTS"] = array();
            }
            $this->view->render(strtolower(get_class($this)), "get_list");
        }
    }
}
