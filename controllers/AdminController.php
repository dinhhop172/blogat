<?php

class AdminController extends Controller {

    private $adminModel;
    private $security;

    public function __construct()
    {
        SecurityModel::verifyUser();
        $this->adminModel = $this->model('AdminModel');
        $this->security = $this->model('SecurityModel');
    }

    public function dashboard()
    {
        return $this->viewAdmin('admin/index');
    }

    public function index()
    {
        $data = $this->adminModel->index();
        return $this->viewAdmin('admin/pages/show', $data);
    }
    public function data(){
        $data = $this->adminModel->index();
        echo json_encode($data);
    }
    
    public function store()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'addmm' && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role']) ){
            $data['name'] = isset($_POST['name']) ? $this->check_input($_POST['name']) : '';
            $data['email'] = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
            $data['password'] = isset($_POST['password']) ? password_hash($this->check_input($_POST['password']), PASSWORD_DEFAULT) : '';
            $data['role'] = isset($_POST['role']) ? $this->check_input($_POST['role']):'';

            if($this->security->user_exist($data['email']) != null){
                echo $this->showMessage('warning', 'Email đã tồn tại!!');
            }else{
                if($this->adminModel->store($data)){
                    echo 'success';
                }else{
                    echo $this->showMessage('danger', 'Vui lòng thử lại sau!!');
                }
            }
        }else{
            echo $this->showMessage('warning', 'Thiếu thông tin!!');
        }
    }
    
    public function edit(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = $this->adminModel->find($id);
        return $this->viewAdmin('admin/pages/edit', $data);
    }

    public function update(){
        $data['id'] = isset($_GET['id']) ? $this->check_input($_GET['id']) : '';
        if(isset($_POST['update_mm']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role']) && isset($_GET['id']) ){
            $data['name'] = isset($_POST['name']) ? $this->check_input($_POST['name']) : '';
            $data['email'] = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
            $data['password'] = isset($_POST['password']) ? password_hash($this->check_input($_POST['password']), PASSWORD_DEFAULT) : '';
            $data['role'] = isset($_POST['role']) ? $this->check_input($_POST['role']):'';
            if($this->adminModel->update($data)){
                return header("Location: ?c=admin");
            }else{
                $_SESSION['err_update_mm'] = "Vui lòng thử lại sau!!";
                return header("Location: ?c=admin&a=edit&id=$data[id]");
            }
        }else{
            $_SESSION['err_update_mm'] = "Vui lòng nhập đủ dữ liệu!!";
            return header("Location: ?c=admin&a=edit&id=$data[id]");
        }
        
    }

    public function destroy(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($this->adminModel->delete($id)){
            return header("Location: ?c=admin");
        }
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        return header("Location: ?a=login");
    }
}

?>