<?php

require_once 'models/user.php';

class UserController {

    /**
     * Obtenemos la vista donde iniciaremos sesión
     */
    public function index() {
        include_once 'views/user/login.php';
    }
}