<? namespace Libs;

class App {
    
    public static $headerCSS = array();
    public static $headerJS = array();
    public static $prefix;
    
    public function __construct($prefix = '/') {
        
        self::$prefix = $prefix;
        
        $get_url = isset($_GET['url']) ? htmlspecialchars($_GET['url']) : false;
        if ($get_url) {
            $url = explode("/", rtrim($get_url, "/"));
        } else {
            $url[] = "index";
        }
        $file_controller = __DIR__ . '/..' . $prefix . 'controllers/' . $url[0] . 'Controller.php';

        if (file_exists($file_controller)) {

            require_once $file_controller;
            $class_name = $url[0] . "Controller";

            if (class_exists($class_name)) {
                $controller = new $class_name($prefix);
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        if (isset($url[2])) {
                            $controller->{$url[1]}($url[2]);
                        } else {
                            $controller->{$url[1]}();
                        }
                    } else {
                        self::showError('Error! Method does not exists!');
                    }
                } else {
                    $controller->index();
                }
            } else {
                self::showError('Error! Controller Class does not exists!');
            }
        } else {
            self::showError('Error! Controller does not exists!');
        }
    }

    static function showError($error) {
        echo $error;
    }
    
    public static function finish($buffer) {
        $css_links = '';
        $js_src = '';
        foreach (self::$headerCSS as $css) {
            $css_links .= "<link rel='stylesheet' href='$css'/> \n";
        }
        foreach (self::$headerJS as $js) {
            $js_src .= "<script src='$js'></script> \n";
        }
        $buffer = str_replace(array("<--#ADD_CSS_PATHS#-->", "<--#ADD_JS_PATHS#-->"), array($css_links, $js_src), $buffer);
        echo $buffer;
    }
}
