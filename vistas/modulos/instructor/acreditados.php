 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Evaluaciones</h1>
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
          <th scope="col">ID Alumno</th>
          <th scope="col">Nombre</th>
          <th scope="col">Estado</th>
          <th scope="col">Curso</th>
          <th scope="col">Certificación</th>
          <th scope="col">Opciones</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $item='instructor';
          $item1='codigo';
          $valor = $_SESSION["id"];
          $cursos = ControladorAlumnos::ctrMostrarEvaluaciones($item,$item1, $valor);
          foreach ($cursos as $key => $value) {
            if($value['calificado']==1){
            echo'<tr>
          <th scope="row">'.$value['id_alumno'].'</th>
          <td>'.$value['nombre'].' '.$value['aPaterno'].' '.$value['aMaterno'].'</td>';
    
          if($value['calificado']=="0"){
            echo'<td><button class="btn btn-danger btn-xs disabled="true">Sin calificar</button></td>';
          }else{
            echo'<td><button class="btn btn-success btn-xs disabled="true">Calificado</button></td>';
          }
          echo'<td>'.$value['curso'].'</td>';
          if($value['calificado']=="0"){
            echo'<td><button class="btn btn-warning btn-xs btnEditarAlumno" idAlumno="'.$value["id_alumno"].'" data-toggle="modal" data-target="#modalEvaluar"><i class="fas fa-pencil-alt"></i></button></td>';
          }elseif($value['vendajes']+$value['exploracion']+$value['signos']+$value['movi']+$value['adultos']+$value['nino']+$value['bebe']+$value['desob']+$value['teorico']*2>=800){
            echo'<td>
                    <a href="assets/pdf.php?nombre='.$value['nombre'].' '.$value['aPaterno'].' '.$value['aMaterno'].'&amp;codigo='.$value["codigo"].'
                    &amp;conclusion='.$value["conclusion"].'&amp;curso='.$value['curso'].'&amp;instructor='.$_SESSION['nombre'].' '.$_SESSION['aPaterno'].' '.$_SESSION['aMaterno'].'" target="_blank">
                    <button id="pdf" name="pdf" class="btn btn-primary btn-s"><i class="fas fa-file-pdf"></i></button></a>
                  </td>';
          }
          else{
            echo'<td>REPROBADO</td>';
          }
          echo'<th><button class="btn btn-secondary btn-xs btnVerAlumno" idAlumno="'.$value["id_alumno"].'" data-toggle="modal" data-target="#modalVerAlumno"><i class="fas fa-user"></i></button>
          
              <button class="btn btn-danger btn-xs btnEliminarAlumno" idAlumno="'.$value["id_alumno"].'"><i class="fa fa-times-circle"></i></button></td></th>
              ';
              
          
          }}
        ?>
      </tbody>
</table>
  <!-- Modal Ver alumno -->
  <div class="modal fade" id="modalVerAlumno" role="dialog">
        <div class="modal-dialog modal-lg">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>INFORMACIÓN DEL ALUMNO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
              <div class="panel"><b>DATOS DEL ALUMNO:</b></div>
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="codigo" id="codigo" required>

                      <?php
                        $item=null;
                        $valor = null;
                        $estados = ControladorCursos::ctrMostrarCursos($item, $valor);
                        foreach ($estados as $key):
                      ?>
                      <option><?=$key["id"]?></option>
                      <?php endforeach ?>
                    </select>

                    <input type="text" readonly name="nombre" id="nombre_" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" >
                    <input type="text" readonly name="a_Paterno" id="a_Paterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" >
                    <input type="text" readonly name="aMaterno" id="a_Materno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" >
                  </div>
                </div>
                          
                <div class="form-group">
                  <div class="input-group">
                    <input class="form-control input-lg" name="se_xo" id="se_xo" readonly>
                    
                      
                    <input type="number" name="edad_" id="edad_" class="form-control input-lg" style="text-transform:uppercase" placeholder="Edad" readonly>
                  </div>
                </div>

                <div class="panel"><b>FECHA DE NACIMIENTO:</b></div>
                <div class="form-group">
                  <div class="input-group">
                      <input type="date" name="nacimiento" id="nacimiento_" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="panel"><b>LUGAR DE TRABAJO:</b></div>
                <div class="input-group">
                  <input type="text" name="trabajo" id="trabajo_" class="form-control input-lg" style="text-transform:uppercase" placeholder="Lugar de trabajo" readonly>
                  <input class="form-control input-lg" name="escolaridad" id="escolaridad_" readonly>
                    
                </div>
                
                <br>
                <div class="panel"><b>INFORMACIÓN DE CONTACTO Y ESTADO:</b></div>
                <div class="input-group">
                <input type="tel" name="tel" id="tel_" class="form-control input-lg" placeholder="Número telefónico" pattern="[0-9]{10}" readonly>
                <input type="email" name="correo" id="correo_" class="form-control input-lg" placeholder="CORREO ELECTRÓNICO" readonly>
                <input class="form-control input-lg" name="estado_" id="estado_" readonly>
                   
                </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
              </div>
              <?php
                
              ?>
            </div>
          </form>
        </div>
      </div>

 <!-- Modal VE Reditar alumno -->
      <div class="modal fade" id="modalVerAlumno" role="dialog">
        <div class="modal-dialog modal-lg">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>VER ALUMNO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="codigo" id="codigo" required>

                      <?php
                        $item=null;
                        $valor = null;
                        $estados = ControladorCursos::ctrMostrarCursos($item, $valor);
                        foreach ($estados as $key):
                      ?>
                      <option><?=$key["id"]?></option>
                      <?php endforeach ?>
                    </select>

                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" required>
                    <input type="text" name="aPaterno" id="aPaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" required>
                    <input type="text" name="aMaterno" id="aMaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="sexo" id="sexo" required>
                      <option value="" disabled selected hidden>SEXO</option>
                      <option value="FEMENINO">FEMENINO</option>
                      <option value="MASCULINO">MASCULINO</option>
                    </select>
                    <input type="number" name="edad" id="edad" class="form-control input-lg" style="text-transform:uppercase" placeholder="Edad" required>
                  </div>
                </div>

                <div class="panel"><b>FECHA DE NACIMIENTO:</b></div>
                <div class="form-group">
                  <div class="input-group">
                      <input type="date" name="nacimiento" id="nacimiento" class="form-control" required>
                    </div>
                  </div>
    
                <div class="input-group">
                  <input type="text" name="trabajo" id="trabajo" class="form-control input-lg" style="text-transform:uppercase" placeholder="Lugar de trabajo" required>
                  <select class="form-control input-lg" name="escolaridad" id="escolaridad" required>
                    <option value="" disabled selected hidden>ESCOLARIDAD</option>
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="PREPARATORIA">PREPARATORIA</option>
                    <option value="UNIVERSIDAD">UNIVERSIDAD</option>
                  </select>
                </div>
                <br>
                <div class="input-group">
                <input type="tel" name="tel" id="tel" class="form-control input-lg" placeholder="Número telefónico" pattern="[0-9]{10}" required>
                  <input type="email" name="correo" id="correo" class="form-control input-lg" placeholder="CORREO ELECTRÓNICO" required>
                  <select class="form-control input-lg" name="estado" id="estado" required>
                    <option value="" disabled selected hidden>SELECCIONE</option>
                    <option value="CERTIFICACIÓN">CERTIFICACIÓN</option>
                    <option value="RECERTIFICACIÓN">RECERTIFICACIÓN</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">GUARDAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
              </div>
              <?php
                
              ?>
            </div>
          </form>
        </div>
      </div>

<!-- Modal evaluar alumno -->

<div class="modal fade" id="modalEvaluar" role="dialog">
  <div class="modal-dialog modal-md">

    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel"><b>EVALUACIÓN</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>ADULTOS: </label>
                <input type="hidden" name="id_alumno" id="id_alumno">
                <input type="hidden" name="calificado" id="calificado" value="1">
                <input type="number" name="adultos" id="adultos" min="0" max="100">
              </div>
             <div class="col-md-4 mb-3">
                <label>VENDAJE: </label>
                <input type="number" name="vendajes" id="vendajes" min="0" max="100">
              </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>NIÑO: </label>
                <input type="number" name="nino" id="nino" min="0" max="100">
            </div>
            <div class="col-md-4 mb-3">
              <label>BEBÉ: </label>
              <input type="number" name="bebe" id="bebe" min="0" max="100">
             </div>
          </div>
          
          <div class="form-row">

            <label>EXPLORACIÓN FÍSICA: </label>
            <div class="col-md-2 mb-3">
              <input type="number" name="exploracion" id="exploracion" min="0" max="100">
            </div>
          <label>SIGNOS VITALES: </label>
          <div class="col-md-2 mb-3">
              <input type="number" name="signos" id="signos" min="0" max="100">
          </div>
          <label>MOVILIZACIÓN/INMOVILIZACIÓN: </label>
          <div class="col-md-2 mb-3">
            <input type="number" name="movi" id="movi" min="0" max="100">
          </div>
          <label>DESOBSTRUCCION VÍA AÉREA: </label>
          <div class="col-md-2 mb-3">
            <input type="number" name="desob" id="desob" min="0" max="100">
          </div>
        </div>
        
        <div class="form-row">
          <label>EXÁMEN TEÓRICO: </label>
          <div class="col-md-2 mb-3">
            <input type="number" name="teorico" id="teorico" min="0" max="100">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </div>
                
      <?php
        $editarAlumno = new ControladorAlumnos();
        $editarAlumno -> ctrEditarAlumno();
      ?>
    </form>
  </div>
</div>

</section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
