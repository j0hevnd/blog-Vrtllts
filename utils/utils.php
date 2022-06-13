<?php

class Utils {

    /**
     * Utilidad para proteger las rutas de la aplicación
     * retorna true en caso de estar autenticado, 
     * en caso contrario retorna al index de la pag
     * @return true / location a index
     */
    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header('Location: '.BASE_URL);
        }
        return true;
    }
    
}

?>