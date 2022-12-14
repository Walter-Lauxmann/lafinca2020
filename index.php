<!--
 =========================================================
 * Material Kit - v2.0.6
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-kit
 * Copyright 2019 Creative Tim (http://www.creative-tim.com)
   Licensed under MIT (https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md)


 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. 
-->

<?php
session_start(); // Iniciamos el array $_SESSION en el servidor
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
}
if (isset($_SESSION['rol'])) {
  $rol = $_SESSION['rol'];
}
if (isset($_SESSION['id'])) {
  $userid = $_SESSION['id'];
}
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
require_once './config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    La Finca
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <?php
  if (!isset($usuario)) {                 // Si NO est?? seteado $usuario
    include_once RUTA_VISTA . "login.php";  // Inclu??r login.php
  } else {                              // sino
    include_once RUTA_VISTA . "nav.php";    // Inclu??r nav.php
    if (isset($page)) {
      switch ($page) {
        case 'edificios':
          if (!isset($id)) {
            include_once RUTA_VISTA . "edificios/gestion-edificios.php";
          } else {
            include_once RUTA_VISTA . "edificios/form-edificio.php";
          }
          break;
        case 'edificio':
          include_once RUTA_VISTA . "edificios/edificio.php";
          break;
        default:
          include_once RUTA_VISTA . "gestion-inmuebles.php";
          break;
      }
    } else {
      include_once RUTA_VISTA . "gestion-inmuebles.php";
    }
  }
  include_once RUTA_VISTA . "footer.php";
  ?>

  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>