<?php

function controllers_autoload($classname) {
    // printf($classname);
    // die();
    if (file_exists('controllers/'.$classname.'.php')) {
        include 'controllers/'.$classname.'.php';
    }
        include 'controllers/errorController.php';
}

spl_autoload_register('controllers_autoload');
