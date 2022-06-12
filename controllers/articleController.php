<?php

class ArticleController {
    /**
     * vista de inicio de la pagina
     */
    public function index() {
        require_once 'views/layout/header_main.php';
        require_once 'views/article/article.php';
    }
}