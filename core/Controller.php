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
                require_once 'views/layouts/home.php';
            }
        }

        public function model($model){
            $path = 'models/'.$model.'.php';
            if(file_exists($path)){
                require_once $path;
                return new $model;
            }
        }
    }
?>