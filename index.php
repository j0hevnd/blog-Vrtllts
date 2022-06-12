<?php
// controlador frontal
$basename = explode('.', basename($_SERVER['PHP_SELF']))[0];

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/params.php';

session_start();
require_once 'views/layout/doctype.php';

function showError404() {
    $err = new ErrorController();
    $err->index();
}
// showError404();

// comprobamos que exista el controlador
if(isset($_GET['controller'])) {
    $controller = $_GET['controller'].'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller = CONTROLLER_DEFAULT;
} else {
    showError404();
    exit(); 
}

// comprobamos que el controlador
if(class_exists($controller)) {
    $controller = new $controller();
    
    // comprobamos si la acción es un método de la clase 
    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }  elseif (!isset($_GET['action'])) {
        $action_default = ACTION_DEFAULT;
        $controller->$action_default();
    } else {
        showError404();
    }
    
} else {
    showError404();
}

require_once 'views/layout/footer.php';