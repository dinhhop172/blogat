<?php 
    session_start();
    // require_once "configs/loadConfig.php"; 
    require_once "core/autoload.php"; 
    require_once 'core/Controller.php';
    require_once 'core/Database.php';
    require_once "configs/configController.php";
        // checkController('controller', 'index');
        
    $controller = isset($_GET['c']) ? $_GET['c'] : $_GET['c'] = 'home';
    $action = isset($_GET['a']) ? $_GET['a'] : $_GET['a'] = 'index';
    
    if (isset($controller) && isset($action)) {
        if (in_array($controller, $arrayController)) {
            $controller = ucfirst($controller) . 'Controller';
            // $object = new $controller();
            // $object->$action();
            if(method_exists($controller, $action)){
                call_user_func([new $controller(), $action]);
            }else {
                echo 'method not found!!!';
            }
        } else {
            echo '404 not found in array!!!';
        }
    }
?>