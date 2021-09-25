<?php

class HomeController extends Controller {
    public $security;
    public $homeModel;

    public function __construct()
    {
        $this->security = $this->model('SecurityModel');
        $this->homeModel = $this->model('HomeModel');
        
    }

    public function index()
    {
        // $data = $this->userModel->index();
        return $this->viewHome('home/index');
    }

    public function login(){
        return $this->viewLogin('login/index');
    }

    public function sublogin(){
        if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $email = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
            $pass = isset($_POST['password']) ? $this->check_input($_POST['password']) : '';

            $loggedUser = $this->security->validateLogin($email);
            if($loggedUser != null){
                // $name = $loggedUser['name'];
                // echo '<pre>';print_r($loggedUser);return;
                if(password_verify($pass, $loggedUser['password'])){
                    if(!empty($_POST['rem'])){
                        setcookie('email', $email, time() + 86400, "/");
                        setcookie('password', $pass, time() + 86400, "/");
                    }else{
                        setcookie('email', "", time() + 86400, "/");
                        setcookie('password', "", time() + 86400, "/");
                    }
                    if($loggedUser['role'] == 'user'){
                        $_SESSION['user'] = $loggedUser;
                        return header("Location: ?c=home");
                    }else{
                        $_SESSION['admin'] = $loggedUser;
                        return header("Location: ?c=admin&a=dashboard");
                    }
                }else{
                    $_SESSION['err-pass'] = "<script>alert('Mật khẩu hoặc email không chính xác');</script>";
                    return header("Location: ?a=login");
                }
            }else{
                $_SESSION['err-email'] = "<script>alert('Mật khẩu hoặc email không chính xác');</script>";
                return header("Location: ?a=login");
            }

        }else{
            $_SESSION['login-null'] = "<script>alert('Vui lòng nhập đủ dữ liệu');</script>";
            return header("Location: ?a=login");
            // $this->viewLogin('login/index', $_POST);
        }
    }

    public function register()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'register_sub'){
            $data['name'] = isset($_POST['name']) ? $this->check_input($_POST['name']) : '';
            $data['email'] = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
            $data['password'] = isset($_POST['password']) ? password_hash($this->check_input($_POST['password']), PASSWORD_DEFAULT) : '';
            // $_POST['password'] = 
            // var_dump($this->security->user_exist($data['email']));
            // echo '<pre>';print_r($this->security->user_exist($_POST['email']));
            if($this->security->user_exist($data['email']) != null){
                echo $this->showMessage('warning', 'Email đã tồn tại!!');
            }else{
                if($this->homeModel->register($data)){
                    // return $this->homeModel->register($_POST);
                    echo 'register';
                    $_SESSION['user'] = $_POST;
                }else{
                    echo $this->showMessage('danger', 'Vui lòng thử lại sau!!');
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return header("Location: ?a=login");
    }
}

?>