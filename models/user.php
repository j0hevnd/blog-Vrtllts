<?php

class UserModel {
    private $id;
    private $username;
    private $email;
    private $password;
    private $conn; // será el objeto base de datos del proteyecto

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUsername($username){
        $this->username = $this->conn->real_escape_string($username);
    }

    public function setEmail($email){
        $email_validate = $this->conn->real_escape_string($email);
        $this->email = $email_validate;
    }

    public function setPassword($password){
        $this->password = $this->conn->real_escape_string($password);
    }

    /**
     * valida las credenciales de usuario al iniciar sesión
     * @return object_user
     */
    public function login() {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // SQL
        $sql = "SELECT * FROM administradores WHERE email='$email';";
        $login = $this->conn->query($sql);
        if($login && $login->num_rows == 1) {
            $user = $login->fetch_object();
            $validate = password_verify($password, $user->password);
            
            if ($validate) {
                $result = $user;
            }
        }
        $this->conn->close();
        return $result;
    }
    
    /**
     * implementa la creación de un usuario,
     * Descomentar para crear al usuario administrador
     */

    public function createUserAdmin() {
        try {
            $exist = false;
            $email_admin = 'admin@admin.com';
            $pass = 'admin12345';
            $msg = '';

            $sql = "SELECT email FROM administradores WHERE email='$email_admin';";
            $query = $this->conn->query($sql);
            while ($email = $query->fetch_object()) {
                if ($email->email === $email_admin){
                    $exist = true;
                    $msg_err = "Ya existe el usuario";
                    return;
                }
            }

            if (!$exist) {
                $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
                $sql_admin = "INSERT INTO administradores VALUES (NULL, '$email_admin', 'admin', '$password');";
                $this->conn->query($sql_admin);
                echo "Administrador creado. -" . ' email: '.$email_admin.',  Contraseña: '.$pass ;
            }

        } catch (Exception $e) {
            // $this->conn->error
            $msg_err =  "Error al agregar ". $e->getMessage();
        }
    }

}
