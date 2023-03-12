<!-- Content Wrapper. Contains page content -->
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
 </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid card border-secondary mb-3" style="max-width: 60rem; text-align:center;">
       <div class="card-header">
         <h2>¡Bienvenido!</h2>
       </div>
       <div class="card-body text-secondary">
         <div class="container">
           <div class="row">
             <div class="card-text col-sm border-right">
               <?php
                echo '<img src="' . $_SESSION['foto'] . '" class="img-thumbnail" width="150px">';
                ?>
             </div>
             <div class="card-text col-sm-8">
               <div class="row ">
                 <div class="col-sm-12">
                   <?php echo '<h4><b>Nombre del Administrador:</b> ' . $_SESSION['nombre'] . ' ' . $_SESSION['aPaterno'] . ' </h4>' ?>
                 </div>
               </div>
               <div class="row ">
                 <div class="col-sm-12">
                   <?php echo '<h4><b>Código del Administrador:</b> ' . 'IPR-' . "RSSA-" . "" . $_SESSION['id'] . ' </h4>' ?>
                 </div>
               </div>
               <div class="row ">
                 <div class="col-sm-12"><?php echo '<h4><b>Administrador:</b> Jurisdicción 4</h4>' ?>
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>
    <!-- Main content -->
    <section class="content">
    <form action=modelos/excel.php method="post">
   <input type="hidden" name="J1" id="" value="J4">
    <input type="submit"  class="btn  text-white" style="background: #FF7987 " value="Generar Reporte"><a style="color:white;"></a></button><br><br>
     
   </form>
     <div class="row">
       <div class="col-lg-4 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
           <div class="inner">
             <?php
              $item='jurisdiccion';
              $valor = 'J4';
              $usuarios = ControladorUsuarios::ctrMostrarUsuariosJ($item, $valor);
              $count = count($usuarios);
              echo '<h3>' . $count . '</h3>' ?>
             <p>Instructores</p>
             <a href="usuarios">
               <span class="hyperspan"></span>
             </a>
           </div>
           <div class="icon">
             <i class="ion ion-person"></i>
           </div>
         </div>
       </div>
       <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php   
                    $item='jurisdiccion';
                    $valor = 'J4';
                    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor); 
                    $count = count($cursos);
                    echo'<h3>'.$count.'</h3>' ?>
                <p>Total de Cursos Registrados</p>
                <a href="cursos"> 
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
         <div class="small-box bg-success">
           <div class="inner">
             <?php
              $item='jurisdiccion';
              $valor = 'J4';
              $cursos = ControladorCursos::ctrMostrarInstitucionales($item, $valor);
              $count = count($cursos);
              echo '<h3>' . $count . '</h3>' ?>
             <p>Cursos Publicos</p>
             <a href="cursosins">
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
              $item='jurisdiccion';
              $valor = 'J4';
              $cursos = ControladorCursos::ctrMostrarPrivados($item, $valor);
              $count = count($cursos);
              echo '<h3>' . $count . '</h3>' ?>

             <p>Cursos privados</p>
             <a href="cursospriv">
               <span class="hyperspan"></span>
             </a>
           </div>
           <div class="icon">
             <i class="ion ion-person-add"></i>
           </div>
         </div>
       </div>
       <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box alert-secondary">
              <div class="inner">
                <?php   
                    $item='jurisdiccion';
                    $valor = 'J4';
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
       <div class="col-lg-4 col-6">
         <!-- small box -->
         <div class="small-box bg-danger">
           <div class="inner">
             <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorUsuarios::ctrM4($item, $valor);
              $count = count($usuarios);
              echo '<h3>' . $count . '</h3>' ?>
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

   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->