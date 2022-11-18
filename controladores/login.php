<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/lafinca2020/config.php';
	require_once RUTA_MODELO."conexion.php";   // Requerimos el archivo de conexion
    $usuario = $_POST["usuario"];    // Guardamos en $usuario lo que venga del formulario
    $password = $_POST["password"];  // Guardamos en $password lo que venga del formulario    
    if($usuario !='' && $password !=''){  // Si $usuario Y $password no están vacíos
        // SELECCIONAR todo DESDE usuarios DONDE usuario = $usuario Y password = $password
		$consulta= "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$password."'";
		$ejecuta= mysqli_query($link,$consulta); // Ejecutamos la consulta
		if(mysqli_num_rows($ejecuta) == 0){ // Si la cantidad de filas de la consulta es == a cero
		?>
			<script type="text/javascript">
				alert('El usuario o la contrtaseña son incorrectos');// Alerta
				history.back();                                      // Volvemos a la página anterior
			</script>
		<?php
		} else {                                              // sino
			$resultado = mysqli_fetch_array($ejecuta);        // Guardamos el resultado como array
			session_start();
			$_SESSION['nombre'] = $resultado['nombre'];       // Asignamos el nombre a la sesión
			$_SESSION['usuario'] = $resultado['usuario'];     // Asignamos el usuario a la sesión
			$_SESSION['rol'] = $resultado['rol'];             // Asignamos el rol a la sesión			
			header('location:../index.php');                  // Volvemos a cargar la index
		}
	} else {                                                  // sino
	?>
		<script type="text/javascript">
			alert('El usuario o la contrtaseña están vacíos');// Alerta
			history.back();                                   // Volvemos a la página anterior
		</script>
	<?php
	}
?>