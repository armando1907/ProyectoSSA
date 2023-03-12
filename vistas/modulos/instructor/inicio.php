<style type="text/css">
   
   .hyperspan
{
    position:absolute;
    width:100%;
    height:100%;
    left:0;
    top:0;
    z-index:1;
}

/* .add{
  border:0;
  padding:1rem;
  border-radius: 100%;
} */

</style>
 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
        
      </div><!-- /.container-fluid -->
      <div class="container-fluid card border-secondary mb-3" style="max-width: 60rem; text-align:center;">
        <div class="card-header"><h2>¡Bienvenido!</h2></div>
          <div class="card-body text-secondary">
            <div class="container">
            <div class="row">
                <div class="card-text col-sm border-right">
                <?php
              echo '<img src="'.$_SESSION['foto'].'" class="img-thumbnail" width="150px">';
                ?>
                </div>
                <div class="card-text col-sm-8">
                <div class="row ">
                  <div class="col-sm-12"><?php echo '<h4><b>Nombre del Instructor:</b> '.$_SESSION['nombre'].' '.$_SESSION['aPaterno'].' </h4>'?></div>
                </div>
                <div class="row ">
                  <div class="col-sm-12"><?php echo '<h4><b>Código del Instructor:</b> '.'IPR-'."RSSA-"."".$_SESSION['id'].' </h4>'?></div>
                </div>

                <div class="row ">
                  
                  <div class="col-sm-12" style ="text-align: right;">  <?php 
                      echo '<br> <a target="_blank" href="/visualizacion.php"><button class="btn btn-light" type="button"><i class="fas fa-external-link-alt"></i>Generar Credencial</button></a>' ?>  </div>
                </div>

                </div>
              </div>
            </div>
              
        </div>
</div>
      
    </div>
    
    <!-- /.content-header -->
    <div class="col-sm-12 " style= "text-align:right">
            <button class="btn text-light btn-lg" data-toggle="modal" data-target="#modalAgregarUsuario" style="background:#C29B61">Agregar curso</i></button><br><br>
          </div>
  
    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
                <p>Cursos validados</p>
                <a href="cursos"> 
        <span class="hyperspan"></span>
    </a> 
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php   
                    $item='instructor';
                    $valor = $_SESSION['id'];
                    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor); 
                    $count = count($cursos);
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Cursos registrados</p>
                <a href="cursos"> 
        <span class="hyperspan"></span>
    </a> 
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php   
                    $item='instructor';
                    $valor = $_SESSION['id'];
                    $cursos = ControladorCursos::ctrMostrarInstitucionales($item, $valor); 
                    $count = count($cursos);
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Servicio comunitario</p>
                <a href="cursosint"> 
        <span class="hyperspan"></span>
    </a> 
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box alert-primary">
              <div class="inner">
                <?php   
                    $item='instructor';
                    $valor = $_SESSION['id'];
                    $cursos = ControladorCursos::ctrMostrarPrivados($item, $valor); 
                    $count = count($cursos);
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Cursos Privados</p>
                <a href="cursospriv"> 
        <span class="hyperspan"></span>
    </a> 
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
            </div>
          </div>
           <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box alert-secondary">
              <div class="inner">
                <?php   
                    $item='instructor';
                    $valor = $_SESSION['id'];
                    $cursos = ControladorCursos::ctrMostrarAC($item, $valor); 
                    $count = count($cursos);
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Cursos Asociacion Civil</p>
                <a href="cursosac"> 
        <span class="hyperspan"></span>
</a> 
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php   
                    $item='instructor';
                    $item1='codigo';
                    $valor = $_SESSION["id"];
                    $usuarios = ControladorAlumnos::ctrMostraracreditados($item,$item1, $valor);
                    $count = count($usuarios);
                    
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Personas capacitadas</p>
                <a href="acreditados"> 
                  <span class="hyperspan"></span> </a> 
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>


     <!-- Modal nuevo curso -->
     <div class="modal fade" id="modalAgregarUsuario" role="dialog">
      <div class="modal-dialog modal-lg">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>REGISTRAR CURSO</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <?php
                  $usuario = $_SESSION["id"];
                  $jurisdiccion = $_SESSION["jurisdiccion"];
                  echo '<input type="number" name="instructor" value="'.$usuario.'" hidden>
                        <input type="text" name="jurisdiccion" value="'.$jurisdiccion.'" hidden>';
                ?>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <select classs="form-control input-lg" name="nuevoCurso" required>
                    <option value="">CURSO</option>
                      <?php
                        $item=null;
                        $valor=null;
                        $cursos = ControladorCursos::ctrMostrarNombreCursos($item, $valor);
                      foreach ($cursos as $key):?>
                      <option><?=$key["nombre"]?></option>
                      <?php endforeach ?>
                  </select>
                  <select class="form-control input-lg" name="sector">
                    <option value="" disabled selected hidden>SECTOR</option>
                    <option value="SECTOR PÚBLICO">SECTOR PÚBLICO</option>
                    <option value="SECTOR PRIVADO">SECTOR PRIVADO</option>
                    <option value="ASOCIACIÓN CIVIL">ASOCIACIÓN CIVIL</option>
                    <option value="ASOCIACIÓN INSTITUCIONAL">ASOCIACIÓN INSTITUCIONAL</option>
                  </select>
                  <input type="text" name="dependencia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Dependencia" required>
                </div>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE INICIO:</b></div>
                <input type="date" name="inicio" class="form-control" required>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE CONCLUSIÓN:</b></div>
                <input type="date" name="conclusion" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="number" name="alumnos" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número de alumnos" min="1" max="15" required>
              </div>
              <div class="form-group">
                <label>LUGAR DE IMPARTICIÓN:</label>
                <div class="input-group">
                  <input type="text" name="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required>
                  <input type="number" name="numExt" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número exterior" required>
                  <input type="text" name="numInt" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número interior">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="colonia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Colonia" required>
                  <input type="number" name="cp" class="form-control input-lg" style="text-transform:uppercase" placeholder="Código postal" required>
                  <select class="form-control input-lg" name="municipio" required>
                    <option value="" disabled selected hidden>MUNICIPIO</option>
                    <option value="TIJUANA">TIJUANA</option>
                    <option value="ROSARITO">ROSARITO</option>
                    <option value="MEXICALI">MEXICALI</option>
                    <option value="TECATE">TECATE</option>
                    <option value="ENSENADA">ENSENADA</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">GUARDAR</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
            </div>
            <?php
              $crearCurso = new ControladorCursos();
              $crearCurso -> ctrCrearCurso();
            ?>
          </div>
        </form>
      </div>
    </div>
                      </div>
<!--    termino-->
     
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->