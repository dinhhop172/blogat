<?php 

class TagController extends Controller{

    private $tagModel;
    private $security;

    public function __construct()
    {
        SecurityModel::verifyUser();
        $this->tagModel = $this->model('TagModel');
        $this->security = $this->model('SecurityModel');
    }

    public function index(){
        $data = $this->tagModel->index();
        return $this->viewAdmin('admin/pages/tags/index', $data);
    }

    public function show()
    {
        return $this->viewAdmin('admin/pages/tags/show');
    }

    public function store()
    {
        if(!empty($_POST['name'])){
            $data['name'] = $this->check_input($_POST['name']);
            var_dump($this->tagModel->store('hi')->rowCount());
            // if($this->tagModel->store($data['name'])){
            //     echo 'success';
            //     var_dump();
            // }else{
            //     echo $this->showMessage('danger', 'Vui lòng thử lại sau!!');
            // }
        }else{
            echo $this->showMessage('warning', 'Thiếu thông tin!!');
        }
      
    }
}

?>