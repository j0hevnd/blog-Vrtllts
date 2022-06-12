<?php

require_once 'models/user.php';

class UserController {

    /**
     * Obtenemos la vista donde iniciaremos sesión
     */
    public function index() {
        include_once 'views/user/login.php';
    }

    /**
     * Elimina la sesión de usuario
     */
    public function logout() {
        $result = false;

        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('Location: '.BASE_URL.'user/index');
    }

    /**
     * Identificamos el usuario. En caso de éxito iniciamos sesión
     */
    public function login() {
        $result = false;
    
        if(isset($_POST)) {
            $user = new UserModel();
            
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user_login = $user->login();
            
            if ( $user_login && is_object($user_login) ) {
                $_SESSION['admin'] = $user_login;
                $result = true;
            }
        }
    
        header('Location: '.BASE_URL);
    }
}