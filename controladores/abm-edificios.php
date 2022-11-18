<?php
require_once RUTA_MODELO.'modelo-edificio.php'; // Requerimos el modelo de Edificios
$edificio = new Edificio();                     // Creamos un nuevo objeto $edificio
if(isset($_GET['accion'])){                     // Si está seteado $_GET['accion']
    $accion = $_GET['accion'];                  // Creamos la variable $accion
    if($accion == 'eliminar'){                  // Si $accion es igual a 'eliminar'
        if(isset($_GET['id'])){                 // Si está seteado $_GET['id']
            $edificio->id = $_GET['id'];        // el id del $edificio es igual a $_GET['id']
        } 
    } else {                                    // sino
        if (                                            // si
            isset($_FILES) &&                           // está seteado $_FILES Y
            isset($_FILES['foto']) &&                   // está seteado $_FILES['foto'] Y
            !empty($_FILES['foto']['name'] &&           // NO está vacío $_FILES['foto']['name'] Y
            !empty($_FILES['foto']['tmp_name']))        // NO está vacío $_FILES['foto']['tmp_name']
            ) {
            //Hemos recibido el fichero
            //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {                // si está subido el archivo $_FILES['foto']['tmp_name'])
                $nombre = $_FILES['foto']['tmp_name'];                          // Guardamos el nombre temporal en $nombre
                $destino = './assets/img/edificios/'.$_FILES['foto']['name'];   // Guardamos la ruta en $destino
            } else {                                                            // sino
                $mensaje = "Error: El fichero encontrado no fue procesado por la subida correctamente";
            }            
            
            if (move_uploaded_file($nombre, $destino)) {        // Si podemos mover el archivo
                $mensaje = "Fichero subido correctamente a: ".$destino;
                $edificio->imagen = $_FILES['foto']['name'];    // Guardamos en el atributo "imagen" el nombre del archivo
            } else {                                            // sino
                $mensaje = "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
                unlink(ini_get('upload_tmp_dir').$_FILES['foto']['tmp_name']);  // Eliminamos el archivo temporal subido
            }            
        } else {
            $edificio->imagen = $_POST['imagen'];
        }
        $edificio->id = $_POST['id'];           // cargamos en los atributos del $edificio los datos del formulario
        $edificio->tipo = $_POST['tipo'];
        $edificio->calle = $_POST['calle'];
        $edificio->numero = $_POST['numero'];
        $edificio->piso = $_POST['piso'];
        $edificio->departamento = $_POST['departamento'];
        $edificio->cp = $_POST['cp'];
        $edificio->localidad = $_POST['localidad'];
        $edificio->descripcion = $_POST['descripcion'];
        $edificio->precio_venta = $_POST['precio_venta'];
        $edificio->precio_alquiler = $_POST['precio_alquiler'];
        $edificio->idInquilino = 1;
        $edificio->idPropietario = 2;
    }

    switch($accion){                              // Según la $accion
        case 'nuevo':                             // En caso que sea 'nuevo'
            $edificio->insertar();                // Insertamos el edificio
            $mensaje = "Nuevo edificio agregado!";// Creamos un mensaje
            break;
        case 'modificar':                         // En caso que sea 'modificar'
            $edificio->modificar($edificio->id);  // Modificamos el edificio
            $mensaje = "Edificio modificado!";
            break;
        case 'eliminar':                          // En caso que sea 'eliminar'
            $edificio->eliminar($edificio->id);   // Eliminamos el edificio
            $mensaje = "Edificio eliminado!";
            break;
    }
}
?>