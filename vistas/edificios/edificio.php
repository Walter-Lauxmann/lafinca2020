<?php
require_once RUTA_CONTROLADOR.'abm-edificios.php';
?>
<div class="profile-page">
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('./assets/img/city-profile.jpg');">
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="./assets/img/edificios/<?php echo $edificio->imagen; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $edificio->calle.' '.$edificio->numero; ?></h3>
                <h4><?php echo $edificio->cp.' '.$edificio->localidad; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p><?php echo $edificio->descripcion; ?>.</p>
        </div>
        <div class="alert alert-success">
          <div class="container">
            <div class="alert-icon">
              <i class="material-icons">check</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Datos guardados:</b> <?php echo $mensaje ?>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
              <div class="profile-tabs">
                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#comedor" role="tab" data-toggle="tab">
                      <i class="material-icons">restaurant</i> Comedor
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#dormitorio" role="tab" data-toggle="tab">
                      <i class="material-icons">local_hotel</i> Dormitorio
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#banio" role="tab" data-toggle="tab">
                      <i class="material-icons">streetview</i> Baño
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="comedor">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="./assets/img/edificios/comedor1.jpg" class="rounded">
                  <img src="./assets/img/edificios/comedor2.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="./assets/img/edificios/comedor3.jpg" class="rounded">
                  <img src="./assets/img/edificios/comedor4.jpg" class="rounded">
                </div>
              </div>
            </div>
            <div class="tab-pane text-center gallery" id="dormitorio">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="./assets/img/edificios/dormitorio1.jpg" class="rounded">
                  <img src="./assets/img/edificios/dormitorio2.jpg" class="rounded">
                  <img src="./assets/img/edificios/dormitorio3.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="./assets/img/edificios/dormitorio4.jpg" class="rounded">
                  <img src="./assets/img/edificios/dormitorio5.jpg" class="rounded">
                </div>
              </div>
            </div>
            <div class="tab-pane text-center gallery" id="banio">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="./assets/img/edificios/banio1.jpg" class="rounded">
                  <img src="./assets/img/edificios/banio3.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="./assets/img/edificios/banio4.jpeg" class="rounded">
                  <img src="./assets/img/edificios/banio5.jpg" class="rounded">
                  <img src="./assets/img/edificios/banio2.webp" class="rounded">
                </div>
              </div>
            </div>
          </div>
          
        <a class="btn btn-primary" href="./index.php?page=edificios">
          <i class="material-icons">arrow_back</i> Volver
        </a>
      </div>
    </div>
  </div>
</div>