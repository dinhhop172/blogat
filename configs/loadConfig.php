<?php 

function checkController($controller='', $action=''){
    $arrayController = [
        'user',
        'category'
    ];
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $_GET['controller'] = 'user';
    $action = isset($_GET['action']) ? $_GET['action'] : $_GET['action'] = 'index';
    
    if (isset($controller) && isset($action)) {
        if (in_array($controller, $arrayController)) {
            $controller = ucfirst($controller) . 'Controller';
            $object = new $controller();
            $object->$action();
        } else {
            echo '404 not found!!!';
        }
    }
}
?>