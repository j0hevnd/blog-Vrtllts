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
            // funcionalidad para recaptcha
            require_once "utils/recaptchalib.php";   
            $secret = "6LcLyG4gAAAAAFF89il9ho3gG6e2lCvV-QwbB62w";
            $response = null;
            // Verificamos la clave secreta
            $reCaptcha = new ReCaptcha($secret);
            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                    $_SERVER["REMOTE_ADDR"],
                    $_POST["g-recaptcha-response"]
                );
            }

            if ($response != null && $response->success) {
                // Añade aquí el código que desees en el caso de que la validación sea correcta

                // Valida los datos que nos llegan por post
                if ($article = Utils::validateInputs($_POST)) {

                    // Validamos si nos han enviado la imagén
                    if (isset($_FILES['image']) && $_FILES['image']['name']) {
                        Utils::validateImage($article, $_FILES);
                    }

                    // obtenemos el id de la url
                    $url = explode('/', $_GET['url']);
                    $id = (int) end($url);
                    if(isset($id)) {                    
                        $article->setId($id);
                        // edita la entrada
                        $result = $article->editArticle();
                    }
                    
                    if ($result) {
                        $result = array (
                            'editEntry' => $result,
                            'msg' => "Actualizado éxitosamente"
                        );
                    } else {
                        $result = array (
                            'editEntry' => $result,
                            'msg' => "Error al actualizar"
                        );
                    }

                } else {
                    $result = array (
                        'editEntry' => $article,
                        'msg' => "Llena todos los campos correctamente"
                    );
                }

            } else {
                // Añade aquí el código que desees en el caso de que la validación no sea correcta o muestra
                $result = array (
                    'editEntry' => $response,
                    'msg' => "No válido"
                );
            }

            echo json_encode($result);
        } // POST
    } // editArticle

    public function addArticle() {
        if (isset($_POST)){
            // funcionalidad para recaptcha
            require_once "utils/recaptchalib.php";   
            $secret = "6LcLyG4gAAAAAFF89il9ho3gG6e2lCvV-QwbB62w";
            $response = null;
            // Verificamos la clave secreta
            $reCaptcha = new ReCaptcha($secret);
            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
                );
            }
            
            if ($response != null && $response->success) {
                // Añade aquí el código que desees en el caso de que la validación sea correcta
                
                // valida los campos que nos llegan por POST
                $class_result = Utils::validateInputs($_POST);

                // Validamos si nos han enviado la imagén
                if (isset($_FILES['image']) && $_FILES['image']['name']) {
                    $result = Utils::validateImage($class_result['class'], $_FILES);
                }

                // guardamos la entrada en la db, en caso contrario retorna false
                if ($result) {
                    $result = $class_result['class']->addArticle();
                }            

                if (!$result) {
                    $result = array (
                        'article' => $result,
                        'msg' => "Llena todos los campos correctamente"
                    );
                } else {
                    // devuelve el objeto creado para ser manupulado en el JS
                    $result = array (
                        'article' => $result,
                        'msg' => "Agregado éxitosamente"
                    );
                }

            } else {
               // Añade aquí el código que desees en el caso de que la validación no sea correcta o muestra
                $result = array (
                    'article' => $response,
                    'msg' => "No válido"
                );
            }

            echo json_encode($result);

        } // POST        
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