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
    
    public function find() {
        Utils::isAdmin();
        $url = explode('/', $_GET['url']);
        $id = (int) end($url);
        if(isset($id)) {
            $article = new ArticleModel();
            $response = $article->getOneArticle($id);
        } else {
            $response = array(
                'msg' => "Error al obtener los datos"
            );
        }

        echo json_encode($response);
    }

    public function edit() {
        Utils::isAdmin();
        if(isset($_POST)) {
            $result = false;

            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : null;
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($title && $email_validate && $content) {
                $result = true;
                $article = new ArticleModel();
                
                $article->setTitle($title);
                $article->setEmailUser($email_validate);
                $article->setContent($content);
                
                
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
                }

                
                // obtenemos el id de la url
                $url = explode('/', $_GET['url']);
                $id = (int) end($url);
                if(isset($id)) {                    
                    $article->setId($id);
                    $result = $article->editArticle();
                } else {
                    $result = false;
                }

                if (!$result) {
                    $result = array (
                        'editEntry' => $result,
                        'msg' => "Llena todos los campos correctamente"
                    );
                } else {
                    $result = array (
                        'editEntry' => $result,
                        'msg' => "Actualizado éxitosamente"
                    );
                }

            } // validates

            echo json_encode($result);
        } // POST
    } // editArticle

    public function addArticle() {
        if (isset($_POST)){
            $result = false;

            $title = isset($_POST['title']) ? trim($_POST['title']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $content = isset($_POST['content']) ? trim($_POST['content']) : null;
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($title && $email_validate && $content) {
                $result = true;
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
                    $result = $article->addArticle();
                }

            }

            if (!$result) {
                $result = array (
                    'article' => $result,
                    'msg' => "Llena todos los campos correctamente"
                );
            } else {
                $result = array (
                    'article' => $result,
                    'msg' => "Agregado éxitosamente"
                );
            }
            
            echo json_encode($result);

        } // POST        
        // return header('Location: '.BASE_URL);
    }

    public function deleteArticle() {
        Utils::isAdmin();
        $result = [];
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