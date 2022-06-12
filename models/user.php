<?php

class UserModel {
    private $id;
    private $username;
    private $email;
    private $password;
    private $conn; // será el objeto base de datos del proteyecto

    public function __contruct() {
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

}
