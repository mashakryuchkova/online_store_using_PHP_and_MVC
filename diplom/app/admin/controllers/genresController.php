<? class genresController extends Controller {

    private static $instance;

    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("Жанры");
    }

    public function index() {
        if ($genres = $this->model->getList('Genres')) {
            $this->view->arResult["GENRES"] = $this->getTreeForArray($genres);
        } else {
            $this->view->arResult["GENRES"] = array();
        }
        parent::index();
    }

    public function add() {
        $data = array(
            'name' => htmlspecialchars($_POST["genre_name"]),
            'code' => htmlspecialchars($_POST["genre_code"]),
            'parent_id' => htmlspecialchars($_POST["parent_genre"]) == 0 ? null : htmlspecialchars($_POST["parent_genre"]),
            'depth_level' => is_null($_POST["depth_level"]) ? 0 : htmlspecialchars($_POST["depth_level"]),
        );

        if (strlen($data['name']) >= 2 && strlen($data['code']) >= 2) {
            if ($id = $this->model->add($data)) {
                echo json_encode(array("error" => false));
            } else {
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("error" => true));
        }
    }

    public function del() {
        $data = array(
            "id" => htmlspecialchars((int) $_POST["id"])
        );

        if ($data["id"] > 0) {
            if ($this->model->delete("Genres", "id", $data["id"])) {
                echo json_encode(array('success' => "true"));
            } else {
                echo json_encode(array('success' => "false"));
            }
        }
    }

    public function getEditFormById($id) {
        $data = $this->model->getByID($id, 'Genres');
        $this->view->genre = $data;
        $genres = $this->model->getList('Genres');
        $this->view->all_genres = $this->getTreeForArray($genres);

        $this->view->render(strtolower(get_class($this)), "edit_form");
    }
    
    public function edit() {
        $data = array(
            'id' => htmlspecialchars($_POST["id"]),
            'name' => htmlspecialchars($_POST["genre_name"]),
            'code' => htmlspecialchars($_POST["genre_code"]),
            'parent_id' => htmlspecialchars($_POST["parent_genre"]) == 0 ? null : htmlspecialchars($_POST["parent_genre"]),
            'depth_level' => is_null($_POST["depth_level"]) ? 0 : htmlspecialchars($_POST["depth_level"]),
        );

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

    public static function getInstance() {
        $instance = null;
        if (!empty(self::$instance) && self::$instance instanceof genresController) {
            $instance = self::instance;
        } else {
            $instance = new genresController();
        }
        return $instance;
    }

    public function search($q = "", $table = "Genres", $attr = array("name", "code")) {
        if (isset($_GET["q"])) {
            $q = htmlspecialchars($_GET["q"]);
            if ($genres = parent::search($q, $table, $attr)) {
                $dp = array();
                foreach ($genres as $s) {
                    $dp[] = $s["depth_level"];
                }
                $dp = min($dp);
                if ($dp > 0) {
                    foreach ($genres as $k => $s) {
                        if ($s["depth_level"] = $dp) {
                            $genres[$k]["parent_id"] = 0;
                        }

                        $genres[$k]["depth_level"] = $s["depth_level"] - $dp;
                    }
                }
                $this->view->arResult["GENRES"] = $this->getTreeForArray($genres);
            } else {
                $this->view->arResult["GENRES"] = array();
            }
            $this->view->render(strtolower(get_class($this)), "get_list");
        }
    }
}
