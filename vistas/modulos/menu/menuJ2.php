  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($_SESSION['foto']!=""){
            echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="Foto de perfil">';
          }else{
            echo '<img src="vistas/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Foto de perfil">';
          }
          ?>
        </div>
        <div class="info">
          <?php

            if($_SESSION['nombre']!=""){
              echo'<a href="inicio" class="d-block">'.$_SESSION['nombre'].'</a></div>';
            }else{
              echo'<a href="inicio" class="d-block">Nombre de usuario</a>
        </div>';
            }
          ?>
          
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">MENÚ</li>

          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <p> INSTRUCTORES</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                CURSOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cursos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cursos-catalogo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catálogo</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
            <a href="verpdfj2" class="nav-link">
              <p> <?php echo nl2br("CERTIFICADOS DE \n INSTRUCTORES"); ?></p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>