<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Cursos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Registrar curso</button>
      </div>
    </div>
    <br>
      
    <table class="table table-striped tabladatatable dt-responsive">
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Curso</th>
          <th scope="col">Inicio</th>
          <th scope="col">Conclusión</th>
          <th scope="col">Alumnos</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $item='instructor';
          $valor = $_SESSION["id"];
          $cursos = ControladorCursos::ctrMostrarAC($item, $valor);
          foreach ($cursos as $key => $value) {
            echo'<tr>
            <th scope="row">'.$value['id'].'</th>
            <td>'.$value['curso'].'</td>
            <td>'.$value['inicio'].'</td>
            <td>'.$value['conclusion'].'</td>
            <td>'.$value['alumnos'].'</td>
            <td>  
              <button class="btn btn-warning btn-xs btnEditarCurso" idCurso="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fas fa-pencil-alt"></i></button>
              <button class="btn btn-danger btn-xs btnEliminarCurso" idCurso="'.$value["id"].'"><i class="fa fa-times-circle"></i></button>

              <button class="btn btn-primary btn-xs btnShow" idCurso="'.$value["id"].'" data-toggle="modal" data-target="#modalShow"> <i class="fa fa-eye"></i></button>


              

            </td>
            </tr>';
            }
        ?>
      </tbody>
    </table>

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

    <!-- Modal editar curso -->
    <div class="modal fade" id="modalEditarCurso" role="dialog">
      <div class="modal-dialog modal-lg">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>EDITAR CURSO</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group">
                  <select classs="form-control input-lg" name="editarCurso" id="curso" required>
                    <option value="">CURSO</option>
                      <?php 
                      $estados = ControladorCursos::ctrMostrarNombreCursos($item, $valor);
                      foreach ($estados as $key):?>
                      <option><?=$key["nombre"]?></option>
                      <?php endforeach ?>
                  </select>
                  <select class="form-control input-lg" name="sector" id="sector">
                    <option value="" disabled selected hidden>SECTOR</option>
                    <option value="SECTOR PÚBLICO">SECTOR PÚBLICO</option>
                    <option value="SECTOR PRIVADO">SECTOR PRIVADO</option>
                    <option value="ASOCIACIÓN CIVIL">ASOCIACIÓN CIVIL</option>
                    <option value="ASOCIACIÓN INSTITUCIONAL">ASOCIACIÓN INSTITUCIONAL</option>
                  </select>
                  <input type="text" name="dependencia" id="dependencia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Dependencia" required>
                </div>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE INICIO:</b></div>
                <input type="date" name="inicio" id="inicio" class="form-control" required>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE CONCLUSIÓN:</b></div>
                <input type="date" name="conclusion" id="conclusion" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="number" name="alumnos" id="alumnos" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número de alumnos" min="1" max="15" required>
              </div>
              <div class="form-group">
                <label>LUGAR DE IMPARTICIÓN:</label>
                <div class="input-group">
                  <!-- <?php echo'<input type="text" name="calle" id="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="'.$value["calle"].'" required >
                  <input type="number" name="numExt" id="numExt" class="form-control input-lg" style="text-transform:uppercase" placeholder="'.$value["numExt"].'" required>
                  <input type="text" name="numInt" id="numInt" class="form-control input-lg" style="text-transform:uppercase" placeholder="'.$value["numInt"].'">     '
                  ?> -->
                  
                  <input type="text" name="calle" id="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required >
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
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">GUARDAR</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
            </div>
            <?php
              $editarCurso = new ControladorCursos();
              $editarCurso -> ctrEditarCurso();
            ?>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal VER CURSO  -->

    <div class="modal fade" id="modalShow" role="dialog">
      <div class="modal-dialog modal-lg">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>EDITAR CURSO</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group">
                  <select classs="form-control input-lg" name="editarCurso" id="curso" required>
                    <option value="">CURSO</option>
                      <?php 
                      $estados = ControladorCursos::ctrMostrarNombreCursos($item, $valor);
                      foreach ($estados as $key):?>
                      <option><?=$key["nombre"]?></option>
                      <?php endforeach ?>
                  </select>
                  <select class="form-control input-lg" name="sector" id="sector">
                    <option value="" disabled selected hidden>SECTOR</option>
                    <option value="SECTOR PÚBLICO">SECTOR PÚBLICO</option>
                    <option value="SECTOR PRIVADO">SECTOR PRIVADO</option>
                    <option value="ASOCIACIÓN CIVIL">ASOCIACIÓN CIVIL</option>
                    <option value="ASOCIACIÓN INSTITUCIONAL">ASOCIACIÓN INSTITUCIONAL</option>
                  </select>
                  <input type="text" name="dependencia" id="dependencia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Dependencia" required>
                </div>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE INICIO:</b></div>
                <input type="date" name="inicio" id="inicio" class="form-control" required>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE CONCLUSIÓN:</b></div>
                <input type="date" name="conclusion" id="conclusion" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="number" name="alumnos" id="alumnos" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número de alumnos" min="1" max="15" required>
              </div>
              <div class="form-group">
                <label>LUGAR DE IMPARTICIÓN:</label>
                <div class="input-group">
                  
                  <input type="text" name="calle" id="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required >
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
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">GUARDAR</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
            </div>
            <?php
              $editarCurso = new ControladorCursos();
              $editarCurso -> ctrEditarCurso();
            ?>
          </div>
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