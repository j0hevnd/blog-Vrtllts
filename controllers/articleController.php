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
           
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
            $recaptcha_secret = '6LfJIm8gAAAAAHPl2QgdLO271OonQyC23rchId6f'; 
            $recaptcha_response = $_POST['recaptcha_response']; 
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
            $recaptcha = json_decode($recaptcha); 
            if(isset($recaptcha->score) && $recaptcha->score >= 0.7){
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

            }else{
                // Añade aquí el código que desees en el caso de que la validación no sea correcta
                $result = array (
                    'editEntry' => NULL,
                    'msg' => "No válido, fallo en el captcha"
                );  
            }

            echo json_encode($result);
        } // POST
    } // editArticle


    public function addArticle() {
        if (isset($_POST)){

            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
            $recaptcha_secret = '6LfJIm8gAAAAAHPl2QgdLO271OonQyC23rchId6f'; 
            $recaptcha_response = $_POST['recaptcha_response']; 
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
            $recaptcha = json_decode($recaptcha); 
            if(isset($recaptcha->score) && $recaptcha->score >= 0.7){
                // Añade aquí el código que desees en el caso de que la validación sea correcta
                $result = false;
                // valida los campos que nos llegan por POST
                $class_result = Utils::validateInputs($_POST);

                // Validamos si nos han enviado la imagén
                if (isset($_FILES['image']) && $_FILES['image']['name']) {
                    $result = Utils::validateImage($class_result, $_FILES);
                }

                // guardamos la entrada en la db, en caso contrario retorna false
                if ($result) {
                    $result = $class_result->addArticle();
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

                    if (isset($_SESSION['admin'])) {
                        $result['sesion'] = true;
                    } else {
                        $result['sesion'] = false;
                    }
                }

            }else{
                // Añade aquí el código que desees en el caso de que la validación no sea correcta
                $result = array (
                    'article' => NULL,
                    'msg' => "No válido, fallo en el captcha"
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