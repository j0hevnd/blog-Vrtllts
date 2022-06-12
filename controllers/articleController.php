<?php

require_once 'models/article.php';

class ArticleController {
    /**
     * vista de inicio de la pagina
     */
    public function index() {
        $article = new ArticleModel();
        $articles = $article->getAllArticles();

        require_once 'views/layout/header_main.php';
        require_once 'views/article/article.php';

    }
    
    public function addArticle() {
        
        if (isset($_POST)){
            $article = new ArticleModel();
            
            $article->setTitle($_POST['title']);
            $article->setEmailUser($_POST['email']);
            $article->setContent($_POST['content']);


            // Validamos si nos han enviado la imagén
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){

                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }

                    $article->setPicture($filename);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                }
            }
            
            $article = $article->addArticle();
        }
        return header('Location: '.BASE_URL);   
    }

}