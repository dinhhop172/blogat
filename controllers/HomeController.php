<?php

class HomeController extends Controller {
    private $security;
    private $homeModel;
    private $cates;
    private $posts;
    private $post_reviews;
    private $admin;


    public function __construct()
    {
        $this->security = $this->model('SecurityModel');
        $this->homeModel = $this->model('HomeModel');
        $this->cates = $this->model('CategoryModel');
        $this->posts = $this->model('PostModel');
        $this->admin = $this->model('AdminModel');
        $this->post_reviews = $this->model('PostReviewModel');
        
    }

    public function index()
    {
        $data['cates'] = $this->cates->index();
        $data['cate'] = $this->homeModel->cates();
        $data['posts'] = $this->homeModel->index();
        $data['admin'] = $this->posts->index();
        $data['popular'] = $this->homeModel->popular();
        // $data['hasmay'] = $this->posts->showByCate($data['cates']['id']);
        
        // foreach($data['cates'] as $cate){
        //     // $this->viewHome('home/index', $data['cate'] = $cate);
        //     $data['posts'] = $this->posts->showByCate($cate['id']);
        //     if($data['posts'] !== null){
        //         foreach($data['posts'] as $post){
        //             return $this->viewHome('home/index', $data = [$cate,$post]);
        //         }
        //     }
        // }
        return $this->viewHome('home/index', $data);
    }

    public function find()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $data['postbycate'] = $this->homeModel->finPostByCate($id);
            $data['catename'] = $this->homeModel->getNameCate($id);
            $data['cates'] = $this->cates->index();
            $data['popular'] = $this->homeModel->popular();
            return $this->viewHome('home/pages/postbycate', $data);
        }
    }

    public function single()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $data['cates'] = $this->cates->index();
            $data['getpost'] = $this->homeModel->getPost($id);
            $data['popular'] = $this->homeModel->popular();
            return $this->viewHome('home/pages/singlepage', $data);
        }
    }


    public static function checkCatHasManyPost()
    {
        // $data['cathaspost'] = $this->posts->showByCate();
        // return $this->viewHome('home/index', $data['cathaspost']);
    }

    public function search()
    {
        if(isset($_POST['search'])){
            $q = $_POST['search'];
            $data['search'] = $this->homeModel->searchPost($q);
            $data['cates'] = $this->cates->index();
            $data['popular'] = $this->homeModel->popular();
            return $this->viewHome('home/pages/search', $data);
        }else{
            echo '<h1>Not found</h1>';
        }
    }

    // public function popular()
    // {
    //     $data['popular'] = $this->homeModel->popular();
    //     return $this->viewHome('home/index', $data);
    // }

    public function login(){
        return $this->viewLogin('login/index');
    }

    public function sublogin(){
        if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $email = isset($_POST['email']) ? $this->check_input($_POST['email']) : '';
            $pass = isset($_POST['password']) ? $this->check_input($_POST['password']) : '';

            $loggedUser = $this->security->validateLogin($email);
            if($loggedUser != null){
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

    public function review()
    {
        if(isset($_POST['rating_data']) && !empty($_POST['name']) && !empty($_POST['review'])){
            $data['name'] = $_POST['name'];
            $data['post_id'] = $_GET['id'];
            $data['rating'] = $_POST['rating_data'];
            $data['review'] = $_POST['review'];
            $data['created_at'] = time();
            if($this->post_reviews->store($data)){
                echo 'success';
            }
        }
    }

    public function test()
    {
        $post_id = $_GET['id'];
        if($this->post_reviews->index($post_id)){
            echo '<pre>';print_r($this->post_reviews->index($post_id));
        }
    }

    public function loadrating()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'load_rating'){
            // echo '<pre>';print_r($_GET);exit;
            $post_id = $_GET['id'];
            $average_rating = 0;
            $total_review = 0;
            $five = 0;
            $four = 0;
            $three = 0;
            $two = 0;
            $one = 0;
            $total_user_rating = 0;
            $review_content = array();

            $data = $this->post_reviews->index($post_id);
            foreach($data as $item){
                $review_content[] = [
                    'name' => $item['name'],
                    'rating' => $item['rating'],
                    'review' => $item['review'],
                    'created_at' => date('l jS, F Y h:i:s A', $item['created_at']),
                ];
                if($item["rating"] == '5'){
                    $five++;
                }
                if($item["rating"] == '4'){
                    $four++;
                }
                if($item["rating"] == '3'){
                    $three++;
                }
                if($item["rating"] == '2'){
                    $two++;
                }
                if($item["rating"] == '1'){
                    $one++;
                }
                $total_review++;
                $total_user_rating += $item["rating"];
            }
            $average_rating = $total_user_rating / $total_review;

            $output = [
                'average_rating'=>number_format($average_rating, 1),
                'total_review'=>$total_review,
                'five'=>$five,
                'four'=>$four,
                'three'=>$three,
                'two'=>$two,
                'one'=>$one,
                'review_data'=>$review_content
            ];
            echo json_encode($output);
            // echo '<pre>';print_r($review_content);
        }else{
            echo json_encode('not');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return header("Location: ?a=login");
    }
}

?>