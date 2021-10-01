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
        return $this->viewAdmin('admin/pages/members/show', $data);
    }
    public function data(){
        $data = $this->adminModel->index();
        echo json_encode($data);
    }
    
    public function store()
    {
        if($this->security->admin()){
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
                        $_SESSION['author'] = "<script>alert('Thêm thành công')</script>";
                    }else{
                        echo $this->showMessage('danger', 'Vui lòng thử lại sau!!');
                    }
                }
            }else{
                echo $this->showMessage('warning', 'Thiếu thông tin!!');
            }
        }else{
            echo $this->showMessage('warning', 'Bạn không có quyền!!');
        }
    }
    
    public function edit(){
        if($this->security->admin()){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if(!isset($id) || empty($id)){
                return $this->viewAdmin('admin/404');
            }
            $data = $this->adminModel->find($id);
            return $this->viewAdmin('admin/pages/members/edit', $data);
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=admin');
        }
    }

    public function update(){
        if($this->security->admin()){
            $data['id'] = isset($_GET['id']) ? $this->check_input($_GET['id']) : '';
            if(isset($_POST['update_mm']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role']) && isset($_GET['id']) ){
                $data['name'] = isset($_POST['name']) ? $this->check_input($_POST['name']) : '';
                $data['email'] = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
                $data['password'] = isset($_POST['password']) ? password_hash($this->check_input($_POST['password']), PASSWORD_DEFAULT) : '';
                $data['role'] = isset($_POST['role']) ? $this->check_input($_POST['role']):'';
                if($this->adminModel->update($data)){
                    $_SESSION['author'] = "<script>alert('Cập nhật thành công')</script>";
                    return header("Location: ?c=admin");
                }else{
                    $_SESSION['err_update_mm'] = "Vui lòng thử lại sau!!";
                    return header("Location: ?c=admin&a=edit&id=$data[id]");
                }
            }else{
                $_SESSION['err_update_mm'] = "Vui lòng nhập đủ dữ liệu!!";
                return header("Location: ?c=admin&a=edit&id=$data[id]");
            }
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=admin');
        }
    }

    public function destroy(){
        if($this->security->admin()){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if($this->adminModel->delete($id)){
                $_SESSION['author'] = "<script>alert('Xóa thành công')</script>";
                return header("Location: ?c=admin");
            }
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=admin');
        }
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        return header("Location: ?a=login");
    }
}

?>