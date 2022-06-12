<?php

class ArticleModel {
    private $id;            
    private $title;        
    private $emailUser; 
    private $picture;        
    private $content;
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getEmailUser(){
        return $this->emailUser;
    }

    public function getPicture(){
        return $this->picture;
    }
    
    public function getContent(){
        return $this->content;
    }
    
    public function setId($id){
        $this->id=$id;
    }

    public function setTitle($title){
        $this->title=$title;
    }

    public function setEmailUser($emailUser){
        $this->emailUser=$emailUser;
    }

    public function setPicture($picture){
        $this->picture=$picture;
    }
    
    public function setContent($content){
        $this->content=$content;
    }

    /**
     * Agrega nuevos articulos a la tabla conn, retorna un 
     * json_encode con el resultado, de éxito o error
     */
    public function addArticle() {
        $result = array();
        $sql = "INSERT INTO articulos VALUES(NULL, '{$this->getTitle()}', '{$this->getEmailUser()}', ".
         "'{$this->getPicture()}', '{$this->getContent()}', CURDATE());";

        try {
            $add = $this->conn->query($sql);
            $result = array(
                'result' => $add
            );
        } catch (Exception $e) {
            $result = array(
                'result' => false,
                'error' => 'Error: '. $e->getMessage(),
            ); 
        }

        $this->conn->close();
        return json_encode($result);
    }
}
