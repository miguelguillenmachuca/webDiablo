<header>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li <?php if(basename($_SERVER{'PHP_SELF'}) == "index.php"){?> class="active" <?php } ?>><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
          <li <?php if(basename($_SERVER{'PHP_SELF'}) == "crearGuia.php" || basename($_SERVER{'PHP_SELF'}) == "formularioCrearGuia.php"){?> class="active" <?php } ?>><a href="crearGuia.php">Crear guía</a></li>
          <li <?php if(basename($_SERVER{'PHP_SELF'}) == "listaGuias.php"){?> class="active" <?php } ?>><a href="listaGuias.php">Guías</a></li>
          <li <?php if(basename($_SERVER{'PHP_SELF'}) == "tutorial.php"){?> class="active" <?php } ?>><a href="tutorial.php">¿Cómo usar la página?</a></li>
        </ul>

        <?php
        // Compruebo si hay un usuario logeado
        if(!isset($_SESSION["usuario"]))
        {
          // Si no hay ningún usuario logeado, nuestro el formulario de login
          ?>

            <form id="formLogin" name="formLogin" action="" method="post" class="navbar-form navbar-right">
              <div class="form-group">
                <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
              </div>

              <!-- Incluyo un input hidden con la dirección de la página para redireccionar una vez se haga el login -->
              <input type="hidden" name="redirect" value="<?php echo basename($_SERVER{'PHP_SELF'}); ?>">

              <input type="submit" class="btn btn-default" id="enviarLogin" name="enviarLogin" value="Entrar">
            </form>
            <?php
            // Muestro también un formulario para crear un usuario
            ?>
            <form id="formRegistro" name="formRegistro" action="" method="post" class="navbar-form navbar-right">
              <!-- Incluyo un input hidden con la dirección de la página para redireccionar una vez se cree el usuario -->
              <input type="hidden" name="redirect" value="<?php echo basename($_SERVER{'PHP_SELF'}); ?>">
              <input type="submit" class="btn btn-default" id="enviarLogin" name="enviarLogin" value="Crear usuario">
            </form>

          <?php
        }
        else
        {
          // Si hay un usuario logeado, muestro un desplegable para administrar su cuenta
          ?>
          <div class="navbar-right dropdown">
            <div class="dropdown-toggle navbar-link" data-toggle="dropdown">
              <span ><strong>USUARIO</strong></span>
              <img class="img-thumbnail user-icon-navbar" src="img/usuarios/default_user_icon.png" alt="user">
              <span class="caret"></span>
            </div>
            <ul class="<dropdown-m></dropdown-m>enu">
              <li><a href="">Panel de cuenta</a></li>
              <li><a href="">Mis guías</a></li>
              <li><a href="">Mis guías favoritas</a></li>
              <li><a href="">Salir</a></li>
            </ul>
          </div>
          <?php
        }
        ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
