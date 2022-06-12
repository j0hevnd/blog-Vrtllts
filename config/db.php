<?php
class Database {

    /**
     * Genera la conexión a la base de datos
     * @return objeto de la base de datos (en caso de error retorna un error de conexión)
     */
    public static function connect () {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'virtual_blog';

        $db = new mysqli($host, $user, $pass, $database);
        $db->query("SET NAMES 'utf8'");
        
        if ($mysqli->connect_errno) {
            $error = "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return $error;
        }
 
        return $db;
    }
}
?>