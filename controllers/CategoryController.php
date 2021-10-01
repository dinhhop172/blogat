<?php 

class CategoryController extends Controller{

    private $cateModel;
    private $security;

    public function __construct()
    {
        SecurityModel::verifyUser();
        $this->cateModel = $this->model('CategoryModel');
        $this->security = $this->model('SecurityModel');
    }

    public function index(){
        $data = $this->cateModel->index();
        return $this->viewAdmin('admin/pages/categories/show', $data);
    }


    public function store()
    {
        if($this->security->writer()){
            if(isset($_POST['action']) && $_POST['action'] == 'adddm' && !empty($_POST['name'])){
                $data['name'] = $this->check_input($_POST['name']);
                $data['slug'] = $this->slugify($data['name']);
                $data['user_id'] = $_SESSION['admin']['id'];
                if($this->cateModel->store($data)){
                    echo 'success';
                    $_SESSION['author'] = "<script>alert('Thêm thành công')</script>";
                }else{
                    echo $this->showMessage('danger', 'Vui lòng thử lại sau!!');
                }
            }else{
                echo $this->showMessage('warning', 'Thiếu thông tin!!');
            }
        }else{
            echo $this->showMessage('warning', 'Bạn không có quyền!!');
        }
    }

    public function edit(){
        if($this->security->editor()){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if(!isset($id) || empty($id)){
                return $this->viewAdmin('admin/404');
            }
            $data = $this->cateModel->find($id);
            return $this->viewAdmin('admin/pages/categories/edit', $data);
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=category');
        }
    }

    public function update(){
        if($this->security->editor()){
            $data['id'] = isset($_GET['id']) ? $this->check_input($_GET['id']) : '';
            if(isset($_POST['updatecate']) && !empty($_POST['name'])){
                $data['name'] = $this->check_input($_POST['name']);
                $data['slug'] = $this->slugify($data['name']);
                $data['user_id'] = $_SESSION['admin']['id'];
                if($this->cateModel->update($data)){
                    $_SESSION['author'] = "<script>alert('Cập nhật thành công')</script>";
                    return header("Location: ?c=category");
                }else{
                    $_SESSION['err_update_cate'] = "Vui lòng thử lại sau!!";
                    return header("Location: ?c=category&a=edit&id=$data[id]");
                }
            }else{
                $_SESSION['err_update_cate'] = "Không được để trống!!";
                return header("Location: ?c=category&a=edit&id=$data[id]");
            }
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=category');
        }
    }

    public function destroy()
    {
        if($this->security->admin()){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if($this->cateModel->delete($id)){
                $_SESSION['author'] = "<script>alert('Xóa thành công')</script>";
                return header("Location: ?c=category");
            }
        }else{
            $_SESSION['author'] = "<script>alert('Bạn không có quyền')</script>";
            return header('location:?c=category');
        }
    }
}

?>
