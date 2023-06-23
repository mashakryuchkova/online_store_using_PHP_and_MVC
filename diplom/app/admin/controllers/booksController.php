<? include_once 'genresController.php';

class booksController extends Controller {

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle('Товары');

        $genres = $this->getTreeForArray($this->model->getList('Genres'));
        $this->view->genres = $genres;
    }

    public function index() {
        if ($books = $this->model->getList('Books')) {
            $this->view->arResult["ITEMS"] = $books;
        } else {
            $this->view->arResult["ITEMS"] = array();
        }
        parent::index();
    }

    public function add() {
        $data = array();
        $error = array();

        if (count($_POST) > 0) {
            foreach ($_POST as $key => $response_data) {
                $data[htmlspecialchars($key)] = htmlspecialchars($response_data);
            }
        }
        if (strlen($data["book_name"]) < 2) {
            $error["name"] = "short";
        }

        if (strlen($data["book_code"]) < 2) {
            $error["code"] = "short";
        }

        if (isset($_FILES["book_front_img"]) && $_FILES["book_front_img"]["size"] > 0) {
            $data["front_img"] = \Libs\Files::uploadFile($_FILES["book_front_img"], get_class($this));
        }

        if (isset($_FILES["book_back_img"]) && $_FILES["book_back_img"]["size"] > 0) {
            $data["back_img"] = \Libs\Files::uploadFile($_FILES["book_back_img"], get_class($this));
        }

        if (count($error) == 0) {
            $addData = array(
                "author" => $data["book_author"] ?? "",
                "name" => $data["book_name"] ?? "",
                "code" => $data["book_code"] ?? "",
                "genres_id" => $data["parent_genre"] ?? "",
                "pages" => (int) $data["book_pages"] ?? "",
                "year_publishing" => (int) $data["book_year_publishing"] ?? "",
                "publishing_house" => $data["book_publishing_house"] ?? "",
                "price" => (int) $data["book_price"] ?? "",
                "hit" => $data["book_hit"] ?? "0",
                "stock" => $data["book_stock"] ?? "0",
                "front_img" => $data["front_img"] ?? "",
                "back_img" => $data["back_img"] ?? "",
                "description" => $data["book_description"] ?? "",
            );
            if ($id = $this->model->add($addData)) {
                echo json_encode(array("error" => false));
            } else {
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("errors" => $error));
        }
    }

    public function del() {
        $data = array(
            "id" => htmlspecialchars((int) $_POST["id"])
        );

        if ($data["id"] > 0) {
            if ($this->model->delete("Books", "id", $data["id"])) {
                echo json_encode(array('success' => "true"));
            } else {
                echo json_encode(array('success' => "false"));
            }
        }
    }

    public function getEditFormById($id) {
        $data = $this->model->getByID($id, 'Books');
        $this->view->book = $data;

        $books = $this->model->getList('Books');
        $this->view->all_books = $books;

        $this->view->render(strtolower(get_class($this)), "edit_form");
    }

    public function edit() {
        $data = array(
            'id' => htmlspecialchars($_POST["id"]),
            'author' => htmlspecialchars($_POST["book_author"]),
            'name' => htmlspecialchars($_POST["book_name"]),
            'code' => htmlspecialchars($_POST["book_code"]),
            'genres_id' => is_null($_POST["parent_genre"]) ? 0 : htmlspecialchars($_POST["parent_genre"]),
            'pages' => is_null($_POST["book_pages"]) ? 0 : htmlspecialchars($_POST["book_pages"]),
            'year_publishing' => htmlspecialchars($_POST["book_year_publishing"]),
            'publishing_house' => htmlspecialchars($_POST["book_publishing_house"]),
            'price' => is_null($_POST["book_price"]) ? 0 : htmlspecialchars($_POST["book_price"]),
            'hit' => isset($_POST['book_hit']) ? "1" : "0",
            'stock' => isset($_POST['book_stock']) ? "1" : "0",
            'front_img' => empty($_FILES["front_img"]) ? null : ($_FILES["front_img"]),
            'back_img' => empty($_FILES["back_img"]) ? null : ($_FILES["back_img"]),
            'description' => htmlspecialchars($_POST["book_description"])
        );
        var_dump($_POST);
        if (strlen($data['name']) >= 2 && strlen($data['code']) >= 2 && $data['id'] > 0) {
            if ($this->model->edit($data)) {
                echo json_encode(array("error" => false));
            } else {
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("error" => true));
        }
    }
    
    public function search($q = "", $table = "Books", $attr = array("author", "name", "code")) {
        if (isset($_GET["q"]) && strlen($_GET["q"]) > 2) {
            $q = htmlspecialchars($_GET["q"]);
            if ($books = parent::search($q, $table, $attr)) {
                $this->view->arResult["ITEMS"] = $books;
            } else {
                $this->view->arResult["ITEMS"] = array();
            }
            $this->view->render(strtolower(get_class($this)), "get_list");
        }
    }
}
