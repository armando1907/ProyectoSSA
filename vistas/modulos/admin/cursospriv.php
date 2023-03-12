 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cursos registrados</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <table class="table table-striped tabladatatable dt-responsive">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Curso</th>
            <th scope="col">Inicio</th>
            <th scope="col">Conclusión</th>
            <th scope="col">Instructor</th>
            <th scope="col">Dependencia</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody> 
          <?php
             $item=null;
             $valor = null;
            $usuarios = ControladorCursos::ctrMostrarCursos($item, $valor);
            foreach ($usuarios as $key => $value) {

              if($value['sector']=='SECTOR PRIVADO'){
              echo'<tr>
            <th scope="row">'.$value['id'].'</th>
            <td>'.$value['curso'].'</td>
            <td>'.$value['inicio'].'</td>
            <td>'.$value['conclusion'].'</td>
            <td>'.$value['instructor'].'</td>
            <td>'.$value['dependencia'].'</td>
            <td>  
              <button class="btn btn-danger btn-xs btnEliminarCurso" idCurso="'.$value["id"].'"><i class="fa fa-times-circle"></i></button>
            </td>
            </tr>';
             }
            }
          ?>
        
        </tbody>
      </table>

      <!-- Modal nuevo nombre curso -->
      <div class="modal fade" id="modalAgregarUsuario" role="dialog">
        <div class="modal-dialog modal-sm">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NUEVO CURSO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="nuevoNombreCurso" class="form-control input-lg" placeholder="Ingresar curso nuevo" required>
                  </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <?php
              $crearNombreCurso = new ControladorCursos();
              $crearNombreCurso -> ctrCrearNombreCurso();
              ?>
          </form>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $borrarCurso = new ControladorCursos();
    $borrarCurso -> ctrBorrarCurso();
  ?>




