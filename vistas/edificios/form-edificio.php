<?php
require_once RUTA_MODELO.'modelo-edificio.php';
$edificio = new Edificio();
$edificio->imagen = 'city-profile-crop.jpg';
if(isset($_GET['accion'])){
  $accion = $_GET['accion'];
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  if($id > 0){
    $datos = $edificio->seleccionar("id = $id");
    $edificio->tipo = $datos[0]['tipo'];
    $edificio->calle = $datos[0]['calle'];
    $edificio->numero = $datos[0]['numero'];
    $edificio->piso = $datos[0]['piso'];
    $edificio->departamento = $datos[0]['departamento'];
    $edificio->cp = $datos[0]['cp'];
    $edificio->localidad = $datos[0]['localidad'];
    $edificio->descripcion = $datos[0]['descripcion'];
    $edificio->precio_venta = $datos[0]['precio_venta'];
    $edificio->precio_alquiler = $datos[0]['precio_alquiler'];
    $edificio->imagen = $datos[0]['imagen'];
    $edificio->idPropietario = $datos[0]['idPropietario'];
    $edificio->idInquilino = $datos[0]['idInquilino'];
  }  
}
?>
<div class="profile-page">
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('./assets/img/city-profile.jpg');">
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <form method="post" action="./index.php?page=edificio&accion=<?php echo $accion; ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-9 ml-auto mr-auto">
              <div class="profile">
                <div class="avatar">                  
                  <img src="./assets/img/edificios/<?php echo $edificio->imagen; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </div>
                <div class="name row" style="margin-top: 0;">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo">
                          <option <?php if($edificio->tipo == 'Edificio'){echo 'selected';}; ?>>Edificio</option>
                          <option <?php if($edificio->tipo == 'Piso'){echo 'selected';}; ?>>Piso</option>
                          <option <?php if($edificio->tipo == 'Local'){echo 'selected';}; ?>>Local</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo" value="<?php echo $edificio->tipo; ?>"> -->
                      </div>
                      <div class="form-group col-md-3">
                        <label for="direccion">Calle</label>
                        <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese la calle" value="<?php echo $edificio->calle; ?>">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="numero">Número</label>
                        <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $edificio->numero; ?>">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="piso">Piso</label>
                        <input type="text" class="form-control" id="piso" name="piso" value="<?php echo $edificio->piso; ?>">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $edificio->departamento; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="cp">Código Postal</label>
                        <input type="number" class="form-control" id="cp" name="cp" placeholder="Ingrese el Código Postal" value="<?php echo $edificio->cp; ?>">
                      </div>
                      <div class="form-group col-md-8">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Ingrese la Localidad" value="<?php echo $edificio->localidad; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="precio_venta">Precio de Venta</label>
                        <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingrese el precio de venta" value="<?php echo $edificio->precio_venta; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="precio_alquiler">Precio de alquiler</label>
                        <input type="number" class="form-control" id="precio_alquiler" name="precio_alquiler" placeholder="Ingrese el precio de alquiler" value="<?php echo $edificio->precio_alquiler; ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="description text-center col-md-12">
                        <div class="form-group">
                          <label for="descripcion">Descripción</label>
                          <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba la Descripción aquí"><?php echo $edificio->descripcion; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="imagen" value="<?php echo $edificio->imagen; ?>">
                        <button type="submit" class="btn btn-success btn-round">
                          <i class="material-icons">check</i> Guardar
                        </button>
                        <a href="./index.php?page=edificios" class="btn btn-primary btn-round">
                          <i class="material-icons">arrow_back</i> Volver
                        </a>
                      </div>
                    </div>
                  </div>
                  <div 
                    class="col-md-4" 
                    style="background-image: url('./assets/img/edificios/<?php echo $edificio->imagen; ?>'); 
                           background-position:center center; 
                           height:200px;">
                    <div class="form-group">
                      <label for="imagen" style="display: block; float: right;">
                        <span class="btn btn-primary btn-fab btn-round">
                          <i class="material-icons">add_a_photo</i>
                        </span>
                      </label>
                      <input type="file" class="form-control-file" id="imagen" name="foto" />
                    </div>
                  </div>
                </div>
                
              </div>
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
        </form>
      </div>
    </div>
  </div>
</div>