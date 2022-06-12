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
        $this->username=$username;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setPassword($password){
        $this->password=$password;
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
            var_dump($validate);
            if ($validate) {
                $result = $user;
            }
        }
        $this->conn->close();
        return $result;
    }
    
    /**
     * implementa la creación de un usuario,  FUNCION DE UN ÚNICO USO
     * Descomentar para crear al usuario administrador
     */

    // public function createUserAdmin() {
    //     $password = password_hash('admin12345', PASSWORD_BCRYPT, ['cost' => 4]);
    //     try {
    //         $sql = "INSERT INTO administradores VALUES (NULL, 'admin@admin.com', 'admin', '$password');";
    //         $rtur = $this->conn->query($sql);
    //         echo "agregado exitosamente!!";
    //     } catch (Exception $e) {
    //         // $this->conn->error
    //         $error =  "Error al agregar ". $e->getMessage();
    //     }
    // }

}
