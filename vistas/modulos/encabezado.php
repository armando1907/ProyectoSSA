<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Inicio</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-filter"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php 
          if($_SESSION['nombre']!=""){
            echo ' <span class="dropdown-item dropdown-header">'.$_SESSION["nombre"].'</span>';
          }else{
            echo '<span class="dropdown-item dropdown-header">Usuario</span>';  
          }
         
        echo '<div class="dropdown-divider"></div>
        <a class="dropdown-item btnEditarUsuario" idUsuario="'.$_SESSION["id"].'" data-toggle="modal" data-target="#modalEditarUsuario" class="dropdown-item">
          <i class="fas fa-edit"></i> Editar perfil
        </a>'; ?>
        <a href="salir" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i> Cerrar sesión
          <span class="float-right text-muted text-sm">Activa</span>
        </a>
        
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Modal editar usuario -->

  <div class="modal fade" id="modalEditarUsuario" role="dialog">
    <div class="modal-dialog modal-lg">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel"><b>EDITAR PERFIL</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>INFORMACIÓN PERSONAL:</label>
              <div class="input-group">
                <input type="hidden" name="editarPerfil" id="editarPerfil" class="form-control input-lg">
                <input type="text" name="editarNombre" id="editarNombre" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" required>
                <input type="text" name="aPaterno" id="aPaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" required>
                <input type="text" name="aMaterno" id="aMaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="email" name="editarUsuario" id="editarUsuario" class="form-control input-lg" style="text-transform:uppercase" placeholder="Correo electrónico" required readonly>
                <input type="password" name="editarPassword" class="form-control input-lg" placeholder="CONTRASEÑA">
                <input type="hidden" name="passwordActual" id="passwordActual">
                <input type="tel" name="tel" id="tel" class="form-control input-lg" placeholder="Número telefónico" pattern="[0-9]{10}" required>
              </div>
            </div>

            <div class="form-group">
              <label>DOMICILIO:</label>
              <div class="input-group">
                <input type="text" name="calle" id="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required>
                <input type="number" name="numExt" id="numExt" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número exterior" required>
                <input type="text" name="numInt" id="numInt" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número interior">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <input type="text" name="colonia" id="colonia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Colonia" required>
                <input type="number" name="cp" id="cp" class="form-control input-lg" style="text-transform:uppercase" placeholder="Código postal" required>
                <select class="form-control input-lg" name="municipio" id="municipio" required>
                  <option value="" disabled selected hidden>MUNICIPIO</option>
                  <option value="TIJUANA">TIJUANA</option>
                  <option value="ROSARITO">ROSARITO</option>
                  <option value="MEXICALI">MEXICALI</option>
                  <option value="TECATE">TECATE</option>
                  <option value="ENSENADA">ENSENADA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="panel"><b>FOTO DE PERFIL:</b></div>
                <input type="file" name="editarFoto" id="" class="nuevaFoto center-block">
                <br><br>
                <img src="vistas/img/user.png" class="thumbnail center-block previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">GUARDAR</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
            </div>
          </div>
        </div>                  
        <?php
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarPerfil();
          ?>
      </form>
    </div>
  </div>


