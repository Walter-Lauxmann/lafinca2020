<?php

require_once RUTA_MODELO . "modelo-edificio.php";
$edificio = new Edificio();
$todos = $edificio->seleccionar();
$edificios = $edificio->seleccionar("tipo = 'Edificio'");
$pisos = $edificio->seleccionar("tipo = 'Piso'");
$locales = $edificio->seleccionar("tipo = 'Local'");
/*
switch($rol) {
  case 'Propietario':
    $datos = $edificio->seleccionar("idpropietario = $userid");
    break;
  default:
    $datos = $edificio->seleccionar();
}
*/

?>
<div class="profile-page">
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('./assets/img/city-profile.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>LA FINCA</h1>
            <h3>Gestión de Inmuebles.</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <div class="title">
          <div style="display:block;float:right;">
            <a href="./index.php?page=edificios&id=0&accion=nuevo" class="btn btn-primary btn-fab btn-round btn-lg">
              <i class="material-icons">add</i>
            </a>
          </div>
          <h2>Gestión de Edificios</h2>
        </div>
        <div class="card card-nav-tabs">
          <div class="card-header card-header-primary">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#todos" data-toggle="tab">
                      <i class="material-icons">apartment</i> Todos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#edificios" data-toggle="tab">
                      <i class="material-icons">apartment</i> Edificios
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#pisos" data-toggle="tab">
                      <i class="material-icons">meeting_room</i> Pisos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#locales" data-toggle="tab">
                      <i class="material-icons">store_mall_directory</i> Locales
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="tab-content text-center">
              <div class="tab-pane active" id="todos">
                <div class="row">
                  <?php
                  // echo $rol;
                  foreach ($todos as $t) { // foreach($todoslosdatos as $undato)
                  ?>
                    <div class="col-md-4">
                      <div class="card">
                        <img class="card-img-top" style="width:100%; height:250px;" src="./assets/img/edificios/<?php echo $t['imagen']; ?>" rel="nofollow" alt="<?php echo $t['calle'] . " " . $t['numero']; ?>">
                        <div class="card-header card-header-danger">
                          <h3 class="card-title"><?php echo $t['tipo']; ?></h3>
                          <h4 class="card-title"><?php echo $t['calle'] . " " . $t['numero'] . " " . $t['piso'] . " " . $t['departamento']; ?></h4>
                          <p class="category"><?php echo $t['cp'] . " " . $t['localidad']; ?></p>
                        </div>
                        <div class="card-body">
                          <p><?php echo $t['descripcion'] ?>.</p>
                          <p>
                            <h5>Precio de venta: <strong>$ <?php echo $t['precio_venta']; ?></strong></h5>
                            <h5>Precio de alquiler: <strong>$ <?php echo $t['precio_alquiler']; ?></strong></h5>
                          </p>
                        </div>
                        <div class="card-footer">
                          <a href="./index.php?page=edificios&id=<?php echo $t['id']; ?>&accion=modificar" class="btn btn-primary">
                            <i class="material-icons">create</i> Modificar
                          </a>
                          <a href="./index.php?page=edificio&id=<?php echo $t['id']; ?>&accion=eliminar" class="btn btn-danger">
                            <i class="material-icons">delete</i> Eliminar
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="edificios">
                <div class="row">
                  <?php
                  // echo $rol;
                  foreach ($edificios as $e) { // foreach($todoslosdatos as $undato)
                  ?>
                    <div class="col-md-4">
                      <div class="card">
                        <img class="card-img-top" style="width:100%; height:250px;" src="./assets/img/edificios/<?php echo $e['imagen']; ?>" rel="nofollow" alt="<?php echo $e['calle'] . " " . $e['numero']; ?>">
                        <div class="card-header card-header-danger">
                          <h3 class="card-title"><?php echo $e['tipo']; ?></h3>
                          <h4 class="card-title"><?php echo $e['calle'] . " " . $e['numero'] . " " . $e['piso'] . " " . $e['departamento']; ?></h4>
                          <p class="category"><?php echo $e['cp'] . " " . $e['localidad']; ?></p>
                        </div>
                        <div class="card-body">
                          <p><?php echo $e['descripcion'] ?>.</p>
                          <p>
                            <h5>Precio de venta: <strong>$ <?php echo $e['precio_venta']; ?></strong></h5>
                            <h5>Precio de alquiler: <strong>$ <?php echo $e['precio_alquiler']; ?></strong></h5>
                          </p>
                        </div>
                        <div class="card-footer">
                          <a href="./index.php?page=edificios&id=<?php echo $e['id']; ?>&accion=modificar" class="btn btn-primary">
                            <i class="material-icons">create</i> Modificar
                          </a>
                          <a href="./index.php?page=edificio&id=<?php echo $e['id']; ?>&accion=eliminar" class="btn btn-danger">
                            <i class="material-icons">delete</i> Eliminar
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="pisos">
                <div class="row">
                  <?php
                  // echo $rol;
                  foreach ($pisos as $p) { // foreach($todoslosdatos as $undato)
                  ?>
                    <div class="col-md-4">
                      <div class="card">
                        <img class="card-img-top" style="width:100%; height:250px;" src="./assets/img/edificios/<?php echo $p['imagen']; ?>" rel="nofollow" alt="<?php echo $p['calle'] . " " . $p['numero']; ?>">
                        <div class="card-header card-header-danger">
                          <h3 class="card-title"><?php echo $p['tipo']; ?></h3>
                          <h4 class="card-title"><?php echo $p['calle'] . " " . $p['numero'] . " " . $p['piso'] . " " . $p['departamento']; ?></h4>
                          <p class="category"><?php echo $p['cp'] . " " . $p['localidad']; ?></p>
                        </div>
                        <div class="card-body">
                          <p><?php echo $p['descripcion'] ?>.</p>
                          <p>
                            <h5>Precio de venta: <strong>$ <?php echo $p['precio_venta']; ?></strong></h5>
                            <h5>Precio de alquiler: <strong>$ <?php echo $p['precio_alquiler']; ?></strong></h5>
                          </p>
                        </div>
                        <div class="card-footer">
                          <a href="./index.php?page=edificios&id=<?php echo $p['id']; ?>&accion=modificar" class="btn btn-primary">
                            <i class="material-icons">create</i> Modificar
                          </a>
                          <a href="./index.php?page=edificio&id=<?php echo $p['id']; ?>&accion=eliminar" class="btn btn-danger">
                            <i class="material-icons">delete</i> Eliminar
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="locales">
                <div class="row">
                  <?php
                  // echo $rol;
                  foreach ($locales as $l) { // foreach($todoslosdatos as $undato)
                  ?>
                    <div class="col-md-4">
                      <div class="card">
                        <img class="card-img-top" style="width:100%; height:250px;" src="./assets/img/edificios/<?php echo $l['imagen']; ?>" rel="nofollow" alt="<?php echo $l['calle'] . " " . $l['numero']; ?>">
                        <div class="card-header card-header-danger">
                          <h3 class="card-title"><?php echo $l['tipo']; ?></h3>
                          <h4 class="card-title"><?php echo $l['calle'] . " " . $l['numero'] . " " . $l['piso'] . " " . $l['departamento']; ?></h4>
                          <p class="category"><?php echo $l['cp'] . " " . $l['localidad']; ?></p>
                        </div>
                        <div class="card-body">
                          <p><?php echo $l['descripcion'] ?>.</p>
                          <p>
                            <h5>Precio de venta: <strong>$ <?php echo $l['precio_venta']; ?></strong></h5>
                            <h5>Precio de alquiler: <strong>$ <?php echo $l['precio_alquiler']; ?></strong></h5>
                          </p>
                        </div>
                        <div class="card-footer">
                          <a href="./index.php?page=edificios&id=<?php echo $l['id']; ?>&accion=modificar" class="btn btn-primary">
                            <i class="material-icons">create</i> Modificar
                          </a>
                          <a href="./index.php?page=edificio&id=<?php echo $l['id']; ?>&accion=eliminar" class="btn btn-danger">
                            <i class="material-icons">delete</i> Eliminar
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>