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
        $id_art = $this->conn->real_escape_string($id);
        $this->id = (int) $id_art;
    }

    public function setTitle($title){
        $this->title=$this->conn->real_escape_string($title);
    }

    public function setEmailUser($emailUser){
        $this->emailUser=$this->conn->real_escape_string($emailUser);
    }

    public function setPicture($picture){
        $this->picture=$picture;
    }
    
    public function setContent($content){
        $this->content=$this->conn->real_escape_string($content);
    }


    public function getOneArticle($id) {
        $result = array();
        $sql = "SELECT * FROM articulos WHERE id=$id;";

        try {
            $add = $this->conn->query($sql);
            $result = $add->fetch_object();
        } catch (Exception $e) {
            $result = array(
                'result' => false,
                'error' => 'Error: '. $e->getMessage(),
            ); 
        }

        $this->conn->close();
        return $result;
    }


    /**
     * Obtener todos los articulos
     */
    public function getAllArticles() {
        $result = array();
        $sql = "SELECT * FROM articulos WHERE state = 1 ORDER BY id DESC;";

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

        // $this->conn->close();
        return $result;
    }


    /**
     * Agrega nuevos articulos a la tabla conn, retorna un 
     * json_encode con el resultado, de éxito o error
     */
    public function addArticle() {
        $result = array();
        $sql = "INSERT INTO articulos(titulo, email_usuario, imagen, contenido, fecha) VALUES ";
        $sql .= "('{$this->getTitle()}', '{$this->getEmailUser()}', '{$this->getPicture()}', ";
        $sql .= "'{$this->getContent()}', CURDATE());";

        try {
            $add = $this->conn->query($sql);

            // Obtenemos el elemento ingresado
            $last_id = "SELECT MAX(id) AS id FROM articulos;";
            $last_id = $this->conn->query($last_id);
            $last_id = (int) $last_id->fetch_object()->id; // obtenemos su id y lo convertimos a int
            $sql_return = $this->getOneArticle($last_id); // obtenemos el ingreso recien hecho a la db

            $result = $sql_return;
        } catch (Exception $e) {
            $result = false;
            $error ='Error: '. $e->getMessage();
        }

        return $result;
    }
    

    public function editArticle() {
        $result = array();

        // obtener la imagen gudardada en la db en caso que no nos envien imagen para actualizar
        if (null === $this->getPicture()) {
            $sql_up = "SELECT imagen FROM articulos WHERE id={$this->getId()};";
            $image_sql = $this->conn->query($sql_up);
            $image_sql = $image_sql->fetch_object()->imagen;
        } else {
            $image_sql = $this->getPicture();
        }

        // actualizar articulo
        $sql = "UPDATE articulos SET titulo='{$this->getTitle()}', email_usuario='{$this->getEmailUser()}', "; 
        $sql .= "imagen='$image_sql', contenido='{$this->getContent()}', fecha=CURDATE() ";
        $sql .= "WHERE id = {$this->getId()};";

        try {
            $this->conn->query($sql);

            // obtener articulo actualizado
            $result  = $this->getOneArticle($this->getId());
        } catch (Exception $e) {
            $result = array(
                'result' => false,
                'error' => 'Error: '. $e->getMessage(),
            ); 
        }

        return $result;
    }


    public function deleteArticle() {
        $result = array();
        // $sql = "DELETE FROM articulos WHERE id = '{$this->id}';";
        $sql_delete = "UPDATE articulos SET state=0 WHERE id = '{$this->id}';";
        try {
            $delete = $this->conn->query($sql_delete);
            $result = $delete;
        } catch (Exception $e) {
            $result = false;
            $error = 'Error: '. $e->getMessage();
        }
        $this->conn->close();
        return $result;
    }

}
