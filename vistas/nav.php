<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="./index.php">
        LA FINCA
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">
            <i class="material-icons">account_box</i> Nosotros
          </a>
        </li>
        <?php
        switch ($rol) {
          case "Propietario":
            // Menú propietario 
        ?>
            <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="material-icons">apartment</i> Inmuebles
              </a>
              <div class="dropdown-menu dropdown-with-icons">
                <a href="./index.php?page=edificios" class="dropdown-item">
                  <i class="material-icons">apartment</i> Edificios
                </a>
                <a href="./index.php?page=pisos" class="dropdown-item">
                  <i class="material-icons">meeting_room</i> Pisos
                </a>
                <a href="./index.php?page=locales" class="dropdown-item">
                  <i class="material-icons">store_mall_directory</i> Locales
                </a>
              </div>
            </li>
        <?php
            break;
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/" target="_blank" data-original-title="Seguinos en Twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/" target="_blank" data-original-title="Me gusta en Facebook">
            <i class="fa fa-facebook-square"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/" target="_blank" data-original-title="Seguinos en Instagram">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
        <li class="dropdown nav-item">
          <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
            <i class="material-icons">account_circle</i> <?php echo $_SESSION['nombre']; ?>
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a class="dropdown-item" href="./controladores/logout.php">
              <i class="material-icons">arrow_forward_ios</i> Salir
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>