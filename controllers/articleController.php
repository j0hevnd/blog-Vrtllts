<?php

require_once 'models/article.php';

class ArticleController {
    /**
     * vista de inicio de la pagina
     */
    public function index() {
        $article = new ArticleModel();
        $articles = $article->getAllArticles();

        if(isset($_GET['edit'])) {
            Utils::isAdmin();
            $edit = $_GET['edit'];
            $article_edit = $article->getOneArticle($edit)['result'];
        }

        require_once 'views/layout/header_main.php';
        require_once 'views/article/article.php';

    }
    
    public function addArticle() {
        Utils::isAdmin();
        if (isset($_POST)){
            $result = true;

            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : null;
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($title && $email_validate && $content) {

                $article = new ArticleModel();
                
                $article->setTitle($_POST['title']);
                $article->setEmailUser($_POST['email']);
                $article->setContent($_POST['content']);


                // Validamos si nos han enviado la imagén
                if (isset($_FILES['image']) && $_FILES['image']['name']) {
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
                } else {
                    $result = false;
                }
                
                if ($result) {
                    // Validamos si lo que se quiere es editar el articulo
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $article->setId($id);
                        
                        $update= $article->editArticle();
                    } else {
                        $article = $article->addArticle();
                    }
                }

            } else {
                $result = array (
                    'addArticle' => false,
                    'msg_error' => "Llena todos los campos correctamente"
                );
            }

            echo json_encode($result);
        }
        
        return header('Location: '.BASE_URL);
    }

    public function deleteArticle() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $article = new ArticleModel();
            $article->setId($id);
            $delete = $article->deleteArticle();

            if ($delete) {
                $result = array(
                    'delete' => $delete,
                    'msg_delete' => 'Artículo eliminado éxitosamente'
                );
            } else {
                $result = array(
                    'delete' => $delete,
                    'msg_delete' => 'Ha ocurrido un error'
                );
            }
        }

        echo json_encode($result);
    }

}