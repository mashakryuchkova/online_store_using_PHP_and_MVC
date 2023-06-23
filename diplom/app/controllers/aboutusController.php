<?php

include_once __DIR__ . '/../admin/controllers/genresController.php';

class aboutusController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("О нас | Book Store");
    }
}
