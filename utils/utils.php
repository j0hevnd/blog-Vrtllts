<?php

class Utils {

    /**
     * Utilidad para proteger las rutas de la aplicación
     * retorna true en caso de estar autenticado, 
     * en caso contrario retorna al index de la pag
     * @return true / location a index
     */
    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header('Location: '.BASE_URL);
        }
        return true;
    }

    /**
     * validar que las imagenes sean correctas
     * @return bool
     */
    public static function validateImage($class, $files) {
        $file = $files['image'];
        $filename = $file['name'];
        $mimetype = $file['type'];
        
        if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){
            
            if(!is_dir('uploads/images')){
                mkdir('uploads/images', 0777, true);
            }
            
            $class->setPicture($filename);
            move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
            return true;
        }
        return false;
    }

    /**
     * validar los campos enviados
     * @return objeto o false
     */
    public static function validateInputs($post) {
        $title = isset($post['title']) ? trim($post['title']) : null;
        $email = isset($post['email']) ? trim($post['email']) : null;
        $content = isset($post['content']) ? trim($post['content']) : null;
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($title && $email_validate && $content) {
            $article = new ArticleModel();
            
            $article->setTitle($title);
            $article->setEmailUser($email_validate);
            $article->setContent($content);
            return $article;
        }

        return false;
    }
}

?>