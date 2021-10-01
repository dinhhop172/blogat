<?php 
    
    class Controller {
        public function view($file, $data=[])
        {
            $path = 'views/'.$file.'.php';
            if(file_exists($path)){
                ob_start();
                require_once "$path";
                $content = ob_get_clean();
                require_once 'views/layouts/main.php';
            }
        }

        public function viewHome($file, $data=[])
        {
            $path = 'views/'.$file.'.php';
            if(file_exists($path)){
                ob_start();
                require_once "$path";
                $content = ob_get_clean();
                require_once 'views/layouts/home.php';
            }
        }
        public function viewAdmin($file, $data=[])
        {
            $path = 'views/'.$file.'.php';
            if(file_exists($path)){
                ob_start();
                require_once "$path";
                $content = ob_get_clean();
                require_once 'views/layouts/admin.php';
            }
        }
        public function viewLogin($file, $data=[])
        {
            $path = 'views/'.$file.'.php';
            if(file_exists($path)){
                require_once "$path";
            }
        }

        public function model($model){
            $path = 'models/'.$model.'.php';
            if(file_exists($path)){
                require_once $path;
                return new $model;
            }
        }

        public function check_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function showMessage($type, $message){
            return "
                    <div class='alert alert-".$type." alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong class='text-center'>".$message."</strong>
                    </div>
                    ";
        }


    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    }
?>