<?php
require_once RUTA_RAIZ.'/config.php';
/* 
	   Creamos una variable $link donde guardaremos la conexión,
	   si no se pudiera conectar, mostrara un mensaje de error 
*/
$link = mysqli_connect("localhost","root", "", "lafinca2020") or die ("Error ".mysql_error($link));
// Establecemos el conjunto de caracteres en UTF8
mysqli_set_charset($link,'utf8');
	
/* Clase principal */
class Conexion{ 
    // Definimos la propiedad _db
    protected $_db; 
    // Creamos el constructor con la conexión a la Base de Datos
    public function __construct(){ 
        $this->_db = new mysqli("localhost", "root", "", "lafinca2020"); 
        // Si se produce un error de conexión, muestra un mensaje de error
        if ( $this->_db->connect_errno ){ 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        } 
        // Establecemos el conjunto de caracteres utf8
        $this->_db->set_charset('utf8');
        $this->_db->query("SET NAMES 'utf8'"); 
    } 
} 
/* Fin de la clase principal */
?>