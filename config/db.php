<?php
class Database {

    /**
     * Genera la conexión a la base de datos
     * retorna un objeto de conexión de la base de datos (en caso de error retorna un error de conexion)
     * @return mysqli_object
     */
    public static function connect () {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'virtual_blog';

        $mysqli = new mysqli($host, $user, $pass, $database);
        $mysqli->query("SET NAMES 'utf8'");
        
        if ($mysqli->connect_errno) {
            $error = "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return $error;
        }
 
        return $mysqli;
    }
}
?>