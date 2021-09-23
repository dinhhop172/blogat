<?php
$autoloadController = function ($className) {
    $path = 'controllers/' . $className . '.php';
    if (file_exists($path)) {
        include_once "$path";
    }
};

$autoloadModel = function ($className) {
    $path = 'models/' . $className . '.php';
    if (file_exists($path)) {
        include_once "$path";
    }
};

// $autoloadConfig = function ($className) {
//     $path = 'configs/' . $className . '.php';
//     if (file_exists($path)) {
//         include_once "$path";
//     }
// };

spl_autoload_register($autoloadController);
spl_autoload_register($autoloadModel);
// spl_autoload_register($autoloadConfig);
