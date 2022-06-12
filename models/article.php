<?php

class ArticleModel {
    private $id;            
    private $title;        
    private $emailUser; 
    private $picture;        
    private $content;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
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


}
