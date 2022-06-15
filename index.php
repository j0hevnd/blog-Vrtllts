<?php
// controlador frontal

if (isset($_GET['url'])){
    $basename_url = explode('/', $_GET['url']);
}

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/params.php';
require_once 'utils/utils.php';

session_start();

if (empty($basename_url) || !in_array('api', $basename_url)) {
    require_once 'views/layout/doctype.php';
}

function showError404() {
    $err = new ErrorController();
    $err->index();
}
// showError404();

if (!empty($basename_url)) {
    if (in_array('api', $basename_url)) {
        $get_controller = isset($basename_url[1]) ? $basename_url[1] : null;;
        $get_action = isset($basename_url[2]) ? $basename_url[2] : null;
    } else {
        $get_controller = isset($basename_url[0]) ? $basename_url[0] : null;
        $get_action = isset($basename_url[1]) ? $basename_url[1] : null;
    }
}
// var_dump($basename_url);


// comprobamos que exista el controlador
if(isset($get_controller)) {
    $controller = $get_controller.'Controller';
} elseif (!isset($get_controller) && !isset($get_action)) {
    $controller = CONTROLLER_DEFAULT;
} else {
    showError404();
    exit(); 
}

// comprobamos que el controlador sea del tipo de una que tengamos
if(class_exists($controller)) {
    $controller = new $controller();
    
    // comprobamos si la acción es un método de la clase 
    if(isset($get_action) && method_exists($controller, $get_action)){
        $action = $get_action;
        $controller->$action();
    }  elseif (!isset($get_action)) {
        $action_default = ACTION_DEFAULT;
        $controller->$action_default();
    } else {
        showError404();
    }
    
} else {
    showError404();
}

if (empty($basename_url) || !in_array('api', $basename_url)) {
    require_once 'views/layout/footer.php';
}
