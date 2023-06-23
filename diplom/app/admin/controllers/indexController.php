<? class indexController extends Controller {
    
    public function __construct($prefix) {
        parent::__construct($prefix);
        $this->view->setTitle("ЛК");
    }

    public function index() {
        $this->view->arResult["USERS_COUNT"] = $this->model->getUsersCount();
        $this->view->arResult["ORDERS_COUNT"] = $this->model->getOrdersCount();
        
        parent::index();
    }
}
