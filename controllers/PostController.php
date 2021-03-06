<?php 
    class PostController extends Controller{

        private $postModel; 
        private $cateModel; 
        private $tagModel; 
        private $postagModel; 
        private $security;
        
        public function __construct()
        {
            SecurityModel::verifyUser();
            $this->postModel = $this->model('PostModel');
            $this->cateModel = $this->model('CategoryModel');
            $this->tagModel = $this->model('TagModel');
            $this->postagModel = $this->model('PostagModel');
            $this->security = $this->model('SecurityModel');
        }

        public function index(){
            $data['posts'] = $this->postModel->index();
            $data['cates'] = $this->cateModel->index();
            return $this->viewAdmin('admin/pages/posts/show', $data);
        }

        public function upload(){
            $imageFolder = "assets/uploads/";

            reset($_FILES);
            $temp = current($_FILES);
            if (is_uploaded_file($temp['tmp_name'])) {

                $image_name_origin = basename($temp["name"]);
                $imageFileType = strtolower(pathinfo($image_name_origin, PATHINFO_EXTENSION));
                $filetowrite = $imageFolder . date('Y-m-d-H-i-s') . '.' . $imageFileType;
                $allowed_extension = array("jpg", "gif", "png", "jpeg");
                if (in_array($imageFileType, $allowed_extension)) {
                    move_uploaded_file($temp['tmp_name'], $filetowrite);
                }
                echo json_encode(array('location' => $filetowrite));
            }else {
                echo $temp["name"] . ("is not uploaded via HTTP POST");
            }
        }

        public function addImage(){
            $imageFolder = "assets/uploads/";
            reset($_FILES);
            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : null;
                $image_name_origin = basename($_FILES["img"]["name"]);
                $imageFileType = strtolower(pathinfo($image_name_origin, PATHINFO_EXTENSION));
                $filetowrite = $imageFolder . date('Y-m-d-H-i-s') . '.' . $imageFileType;
                $allowed_extension = array("jpg", "gif", "png", "jpeg");
                if (in_array($imageFileType, $allowed_extension)) {
                    move_uploaded_file($_FILES['img']['tmp_name'], $filetowrite);
                    return true;
                    // echo '<pre>';print_r($_FILES);
                }else {
                    echo $this->showMessage('warning', $_FILES['img']["name"] . ' is unauthorized');
                    return false;
                }
            }else{
                echo $this->showMessage('warning', $_FILES['img']["name"] . ' is not uploaded via HTTP POST');
                return false;
            }
        }

        public function store(){
            
                if($this->security->writer()){
                    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category_id']) &&!empty($_POST['tags'])){
                        if(!empty($_FILES['img']['name'])){
                            try {
                                // $this->postModel->conn->beginTransaction();
                                $imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]), PATHINFO_EXTENSION));
                                $imgName = date('Y-m-d-H-i-s') . '.' . $imageFileType;
                                
                                $data['cat_id'] = $_POST['category_id'];
                                $data['user_id'] = $_SESSION['admin']['id'];
                                $data['title'] = $_POST['title'];
                                $data['img'] = $imgName;
                                $data['slug'] = $this->slugify($_POST['title']);
                                $data['content'] = $_POST['content'];
                                
                                
                                if($this->addImage()){
                                    if($this->postModel->store($data)){
                                        
                                        $_SESSION['author'] = "<script>alert('Th??m th??nh c??ng')</script>";
                                        // echo '<pre>';print_r($data);
                                        $post = $this->postModel->conn->lastInsertId();
                                        $tag = $_POST['tags'];
                                        foreach($tag as $itemTag){
                                            // if($this->tagModel->checkNameExist($itemTag)){
                                                // $this->tagModel->deleteWithName($itemTag);
                                                $this->tagModel->store($itemTag);
                                                $je = $this->tagModel->selectIdByName($itemTag);
                                                $this->postagModel->store($post, (int)$je['id']);
                                                
                                            // }
                                            // else{
                                                // $this->tagModel->deleteWithName($itemTag);
                                                // $this->tagModel->store($itemTag);
                                                // $je = $this->tagModel->selectByName($itemTag);
                                                // $this->postagModel->store($post, (int)$je['id']);
                                                // var_dump($je);
                                            // }

                                            // $tagId[] = $this->tagModel->store($itemTag)->rowCount();
                                        }
                                        // $tagIdCount = count($tagId);
                                        // $post_tags['post_id'] = $post;
                                        // $post_tags['tag_id'] = $this->tagModel->countId($tagIdCount);

                                        // foreach($post_tags['tag_id'] as $postag){
                                        //     $this->postagModel->store($post_tags['post_id'], $postag);
                                        // }
                                        echo 'success';
                                        
                                    }else{
                                        echo $this->showMessage('danger', 'Vui l??ng th??? l???i sau!!');
                                    }
                                }
                                // $this->postModel->conn->commit();
                                
                            } catch (Exception $e) {
                                // $this->postModel->conn->rollback();
                                die('err: '. $e->getMessage());
                            }
                        }else{
                            echo $this->showMessage('warning', 'Thi???u th??ng tin anhr!!');
                        }
                    }else{
                        echo $this->showMessage('warning', 'Thi???u th??ng tin!!');
                    }
                }else{
                    echo $this->showMessage('warning', 'B???n kh??ng c?? quy???n!!');
                }
            
        }

        public function asd(){
            // if(isset($_FILES['img']['name'])){
                echo '<pre>';print_r($_POST);
                echo '<pre>';print_r($_FILES);
            // }else{
                // var_dump('not ok');
            // }
        }

        public function edit()
        {
            if($this->security->editor()){
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                if(!isset($id) || empty($id)){
                    return $this->viewAdmin('admin/404');
                }
                $data['post'] = $this->postModel->find($id);
                $data['cate'] = $this->cateModel->index();
                return $this->viewAdmin('admin/pages/posts/edit', $data);
            }else{
                $_SESSION['author'] = "<script>alert('B???n kh??ng c?? quy???n')</script>";
                return header('location:?c=post');
            }
        }

        public function update()
        {
            if($this->security->editor()){
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    $id = $_GET['id'];
                    $post = $this->postModel->find($id);

                    if(isset($_POST['updatepost']) && !empty($_POST['cat_id']) && !empty($_POST['title']) && !empty($_POST['content'])){
                        // echo '<pre>';print_r($_POST);
                        $data['cat_id'] = $_POST['cat_id'];
                        $data['user_id'] = $_SESSION['admin']['id'];
                        $data['title'] = $_POST['title'];
                        $data['slug'] = $this->slugify($_POST['title']);
                        $data['content'] = $_POST['content'];
                        $data['status'] = $_POST['status'];
                        $data['id'] = $id;
                        // $data['seda'] = 'ok';
                        if(!empty($_FILES['img']['name'])){
                            $imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]), PATHINFO_EXTENSION));
                            $imgName = date('Y-m-d-H-i-s') . '.' . $imageFileType;
                            $data['img'] = $imgName;
                            if($this->addImage()){
                                
                                if($this->postModel->update($data)){
                                    $this->addImage();
                                    $_SESSION['author'] = "<script>alert('C???p nh???t th??nh c??ng')</script>";
                                    return header('location:?c=post');
                                }else{
                                    echo $this->showMessage('danger', 'Vui l??ng th??? l???i sau1!!');
                                }
                            }
                            // echo '<pre>';print_r($data);
                        }else{
                            $data['img'] = $post['img'];
                            
                            if($this->postModel->update($data)){
                                $this->addImage();
                                $_SESSION['author'] = "<script>alert('C???p nh???t th??nh c??ng')</script>";
                                return header('location:?c=post');
                            }else{
                                echo $this->showMessage('danger', 'Vui l??ng th??? l???i sau2!!');
                            }
                        }
                    }else{
                        $_SESSION['err_update_post'] = $this->showMessage('warning', 'Thi???u th??ng tin!!');
                        header("location:?c=post&a=edit&id=$id");
                        // echo $this->showMessage('danger', 'Vui l??ng th??? l???i sau3!!');
                    }
                }
            }else{
                $_SESSION['author'] = "<script>alert('B???n kh??ng c?? quy???n')</script>";
                return header('location:?c=post');
            }
        }


        public function destroy(){
            if($this->security->admin()){
                if(!empty($_GET['id'])){
                    $id = $_GET['id'];
                    if($this->postModel->delete($id)){
                        $_SESSION['author'] = "<script>alert('X??a th??nh c??ng')</script>";
                        return header('location:?c=post');
                    }
                }
            }else{
                $_SESSION['author'] = "<script>alert('B???n kh??ng c?? quy???n')</script>";
                return header('location:?c=post');
            }
        }

    }
?>