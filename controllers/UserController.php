<?php

class UserController extends Controller {

    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    public function index()
    {
        $data = $this->userModel->index();
        return $this->view('users/index', $data);
    }

    public function create(){
        return $this->view('users/create');
    }

    public function store(){
        // if(isset($_POST)){
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role']) && isset($_POST['user_add'])) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // echo '<pre>';print_r($_POST);
                // return $this->userModel->store($_POST);
                // header('location: ?controller=user');
                if($this->userModel->store($_POST)){
                    return header('location: ?c=user');
                }

                // echo $this->userModel->store($_POST) ? header('location: ?controller=user') : 'Error en el registro';
            }else{
                // echo "<script>alert('ko')</script>";
                $_SESSION['error_user_create'] = "<script>alert('Vui lòng nhập đủ dữ liệu');</script>";
                return $this->view('users/create', $_POST);
                // header('location: ?controller=user&a=create');
            }
        // }else{
            // echo "<script>alert('ko)</script>";
            // return;
        // }
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = $this->userModel->find($id);
        return $this->view('users/edit', $data);
    }

    public function update()
    {
        $_POST['id'] = isset($_GET['id']) ? $_GET['id'] : '';
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['role']) && isset($_POST['update_user'])) {
            if($this->userModel->update($_POST)){
                return header("Location: ?c=user");
            }
        }else{
            $_SESSION['error_user_update'] = "<script>alert('Vui lòng nhập đủ dữ liệu');</script>";
            return header("Location: ?c=user&a=edit&id=$_POST[id]");
        }
    }

    public function destroy()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($this->userModel->delete($id)){
            return header("Location: ?c=user");
        }
    }
}

?>