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
        Utils::isAdmin();

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
            
            $email    = isset($_POST['email'])    ? trim($_POST['email']) : null;
            $password = isset($_POST['password']) ? trim($_POST['password']) : null;
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
            
            if ($email_validate && $password) {
                $user = new UserModel();
                
                $user->setEmail($email_validate);
                $user->setPassword($password);
                $user_login = $user->login();
                
                if ($user_login && is_object($user_login)) {
                    $_SESSION['admin'] = $user_login;
                    $result = array(
                        'login' => true,
                        'msg' => "Inicio de sesión correcto"
                    );
                } else {
                    $result = array(
                        'login' => false,
                        'msg' => "Datos de usuario no válidos"
                    );
                }
            } else {
                $result = array(
                    'login' => false,
                    'msg' => "Llena todos los campos correctamente"
                );
            }
        }
        
        echo json_encode($result);
    }
}