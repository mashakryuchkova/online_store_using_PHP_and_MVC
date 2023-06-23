<?php
use Libs\User as User;

class regController extends Controller {
    public function __construct($prefix) {
        parent::__construct($prefix);
    }
    
    public function registration() {
        $name = htmlspecialchars($_POST['name'] ?? "");
        $login = htmlspecialchars($_POST['login'] ?? "");
        $phone = htmlspecialchars($_POST['phone'] ?? "");
        $email = htmlspecialchars($_POST['email'] ?? "");
        $password = htmlspecialchars($_POST['password'] ?? "");
        $password_confirm = htmlspecialchars($_POST['password_confirm'] ?? "");
        sleep(2);
        if ($password == $password_confirm) {
            if ($this->model->loginExist($login) || $this->model->emailExist($email)) {
                echo json_encode(array("error" => "Логин или e-mail уже существует"));
                die;
            }
            
            $data = array("name" => $name,
                          "login" => $login,
                          "email" => $email,
                          "phone" => $phone,
                          "password" => md5($password),
                          "role_id" => 2,
            );
            if ($id = $this->model->registration($data)) {
                $data['id'] = $id;
                User::login($data);
                
                $cart_data = array (
                    "user_id" => $id,
                );

                $cart_id = $this->model->createCart($cart_data);
                
                if ($cart_id) {
                    $_SESSION['cart_id'] = $cart_id;
                }
                
                echo json_encode(array("error" => ""));
            } else {
                echo json_encode(array("error" => "Произошла ошибка"));
            }
        } else {
            echo json_encode(array("error" => "Пароли не совпадают"));
        }
    }
    
    public function login() {
        $data["LOGIN"] = htmlspecialchars($_POST['login']);
        $data["PASSWORD"] = htmlspecialchars($_POST['password']);
        sleep(1);
        if ($this->model->loginExist($data["LOGIN"])) {
            if ($user = $this->model->authorization($data)) {
                User::login($user);
                echo json_encode(array("error" => ""));
            } else {
                echo json_encode(array("error" => "Неверный логин или пароль"));
            }
        } else {
            echo json_encode(array("error" => "Неверный логин или пароль"));
        }
    }
    
    public function logout() {
        User::logout();
        header('Location:'.MAIN_PREFIX.'/');
    }
}
