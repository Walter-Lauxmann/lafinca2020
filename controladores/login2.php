<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lafinca2020/config.php';
require_once RUTA_MODELO.'modelo-usuarios.php';

if($_POST["usuario"] !='' && $_POST["password"] !=''){
    $usuario = new Usuario();
    $u = $_POST["usuario"];
    $p = $_POST["password"];
    $datos = $usuario->seleccionar("usuario = '$u' AND password = '$p'");
    if(is_array($datos)) {
        if(count($datos) > 0) {
            session_start();
			$_SESSION['nombre'] = $datos[0]['nombre'];       // Asignamos el nombre a la sesión
			$_SESSION['usuario'] = $datos[0]['usuario'];     // Asignamos el usuario a la sesión
            $_SESSION['rol'] = $datos[0]['rol'];             // Asignamos el rol a la sesión
            $_SESSION['id'] = $datos[0]['id'];
			header('location:../index.php');                  // Volvemos a cargar la index
        } else {
        ?>
			<script type="text/javascript">
				alert('El usuario o la contrtaseña son incorrectos');// Alerta
				history.back();                                      // Volvemos a la página anterior
			</script>
		<?php
        }
    }
} else {
?>
    <script type="text/javascript">
        alert('El usuario o la contrtaseña están vacíos');// Alerta
        history.back();                                   // Volvemos a la página anterior
    </script>
<?php
}

?>