<?php

class ErrorController {
    /**
     * Vista en caso no exista la pagina buscada
     */
    public function index() {
        include 'views/error404/error404.php';
        // exit();
    }
}