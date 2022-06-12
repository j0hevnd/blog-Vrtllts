<?php

class ErrorController {
    /**
     * Vista en caso no exista la pagina buscada
     */
    public function index() {
        echo "La pagina que buscas no existe!!";
        // exit();
    }
}