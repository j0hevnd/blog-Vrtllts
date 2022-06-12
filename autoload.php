<?php

function controllers_autoload($classname) {
    // printf($classname);
    // die();
    include 'controllers/'.$classname.'.php';
}

spl_autoload_register('controllers_autoload');
