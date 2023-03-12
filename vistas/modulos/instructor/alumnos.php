<script type="text/javascript"> 

function add_row()
{
  $rowno = $("#employee_table tr").length;
  $rowno = $rowno+1;

  $id = document.getElementById('instructor').value;

  $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='number' name='instructor[]' id='instructor"+$rowno+"' value='"+$id+"' hidden><input type='number' name='codigo[]' id='codigo"+$rowno+"' class='form-control' required></td><td><input type='text' name='nuevoAlumno[]' id='nuevoAlumno' style='text-transform:uppercase' pattern= ^[a-zA-Z]+$ class='form-control'  required></td><td><input type='text' name='aPaterno[]' id='aPaterno' pattern= ^[a-zA-Z]+$ class='form-control' style='text-transform:uppercase' required></td><td><input type='text' name='aMaterno[]' id='aMaterno'  pattern= ^[a-zA-Z]+$ class='form-control' style='text-transform:uppercase' required></td><td><select class='form-control' name='sexo[]' id='sexo' required><option value='' disabled selected hidden></option><option value='FEMENINO'>FEMENINO</option><option value='MASCULINO'>MASCULINO</option></select></td><td><input type='date' name='nacimiento[]' id='nacimiento' class='form-control' required></td><td><input type='text' name='trabajo[]' id='trabajo' class='form-control' style='text-transform:uppercase' required></td><td><input type='tel' name='tel[]' id-'tel' class='form-control' pattern='[0-9]{10}' required></td><td><input type='email' name='correo[]' id='correo' class='form-control' required></td><td><select class='form-control' name='estado[]' id='estado' required><option value='' disabled selected hidden>SELECCIONE</option><option value='CERTIFICACIÓN'>CERTIFICACIÓN</option><option value='RECERTIFICACIÓN'>RECERTIFICACIÓN</option></select></td><td><button class='btn btn-danger' onclick=delete_row('row"+$rowno+"')>Borrar</button></td></tr>");

  $('#codigo').change(function() {
    for (let step = 1; step <= $rowno; step++) {
      $('#codigo'+step).val($(this).val());
    }
  });
}

function delete_row(rowno)
{
  $('#'+rowno).remove();
}

</script>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ALUMNOS</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- <input type="text" placeholder="Nombre" name = "nombre">
    <select name="curso">
      <option value="">Curso</option>
      <?php
                        $item=null;
                        $valor=null;
                        $cursos = ControladorCursos::ctrMostrarNombreCursos($item, $valor);
                      foreach ($cursos as $key):?>
                      <option><?=$key["nombre"]?></option>
                      <?php endforeach ?>
    </select>

    <button name = "buscar" type= "submit" >Buscar
     -->

    </button>

    <section class="content">
    <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarAlumno">Registrar alumno</button>
        </div>
      </div>
      <br>

     <table class="table table-striped tabladatatable dt-responsive">
      <thead>
        <tr>
          <th scope="col">ID Alumno</th>
          <th scope="col">Nombre</th>
          <th scope="col">Estado</th>
          <th scope="col">Evaluación</th>
          <th scope="col">Curso</th>
          <th scope="col">Código</th>
          <th scope="col">Calificación</th>
          <th scope="col">Editar</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $item='instructor';
          $item1= 'codigo';
          $valor = $_SESSION["id"];
          
          $cursos = ControladorAlumnos::ctrMostrarEvaluaciones($item,$item1, $valor);
          foreach ($cursos as $key => $value) {
            echo'<tr>
          <th scope="row">'.$value['id_alumno'].'</th>
          <td>'.$value['nombre'].' '.$value['aPaterno'].' '.$value['aMaterno'].'</td>';

           echo' <td>'.$value['estado'].'</td>';
          if($value['calificado']=="0"){
            echo'<td><button class="btn btn-danger btn-xs disabled="true">Sin calificar</button></td>';
          }else{
            echo'<td><button class="btn btn-success btn-xs disabled="true">Calificado</button></td>';
          }
          echo'<td>'.$value['curso'].'</td>';


          echo'<td>'.$value["codigo"].'<button class="btn btn-primary btn-xs btnShow" idCurso="'.$value["codigo"].'" data-toggle="modal" data-target="#modalShow"> <i class="fa fa-eye"></i></button>';

          if($value['calificado']=="0"){
            echo'<td><button class="btn btn-warning btn-xs btnEditarAlumno" idAlumno="'.$value["id_alumno"].'" data-toggle="modal" data-target="#modalEvaluar"><i class="fas fa-pencil-alt"></i></button></td>';
          }elseif($value['vendajes']+$value['exploracion']+$value['signos']+$value['movi']+$value['adultos']+$value['nino']+$value['bebe']+$value['desob']+$value['teorico']*2>=800){
            echo'<td>
                    <a href="assets/pdf.php?nombre='.strtoupper($value['nombre']).' '.strtoupper($value['aPaterno']).' '.strtoupper($value['aMaterno']).'&amp;codigo='.$value["codigo"].'
                    &amp;conclusion='.$value["conclusion"].'&amp;curso='.$value['curso'].'&amp;instructor='.$_SESSION['nombre'].' '.$_SESSION['aPaterno'].' '.$_SESSION['aMaterno'].'" target="_blank">
                    <button id="pdf" name="pdf" class="btn btn-primary btn-s"><i class="fas fa-file-pdf"></i></button></a>
                  </td>';
          }
          else{
            echo'<td>REPROBADO</td>';
          }
          echo'<th><button class="btn btn-secondary btn-xs btnVerAlumno" idAlumno="'.$value["id_alumno"].'" data-toggle="modal" data-target="#modalVerAlumno"><i class="fas fa-user-edit"></i></button>
          <button class="btn btn-warning btn-xs btnActAlumno" idAlumno="'.$value["id_alumno"].'" data-toggle="modal" data-target="#modalEditarAlumno"><i class="fas fa-pencil-alt"></i></button>
              <button class="btn btn-danger btn-xs btnEliminarAlumno" idAlumno="'.$value["id_alumno"].'"><i class="fa fa-times-circle"></i></button></td></th>
              ';
              
          
          echo'</tr>';
          }

         
        ?>
      </tbody>
</table>
<!-- Modal nuevo registro de alumno -->
      <div class="modal fade" id="modalRegistrarAlumno" role="dialog">
          <div class="modal-dialog modal-xl">

            <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel"><b>REGISTRAR ALUMNO</b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
     
                <div class="modal-body">

                  <button type="button" class="btn btn-primary" onclick="add_row();">Añadir</button>
                  <br><br>
          
                  <table id="employee_table" align="center">
                    <thead>
                      <tr>
                        <th scope="col">CLASE</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">A. PATERNO</th>
                        <th scope="col">A. MATERNO</th>
                        <th scope="col">SEXO</th>
                        <th scope="col">NACIMIENTO</th>
                        <th scope="col">LUGAR DE TRABAJO</th>
                        <th scope="col">TELEFONO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">ESTADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="row1">
                        <td>
                          <?php $instructor = $_SESSION["id"]; echo '<input type="number" name="instructor[]" id="instructor" value="'.$instructor.'" hidden>';?>
                          <select class="form-control" name="codigo[]" id="codigo" required>
                            <option value="" selected hidden></option>
                              <?php
                                  $item='instructor';
                                  $valor = $_SESSION['id'];
                                  $estados = ControladorCursos::ctrMostrarCursos($item, $valor);
                                  foreach ($estados as $key):
                              ?>
                            <option><?=$key["id"]?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" name="nuevoAlumno[]" class="form-control" style="text-transform:uppercase" required>
                        </td>
                        <td>
                          <input type="text" name="aPaterno[]" class="form-control" style="text-transform:uppercase"  required>  
                        </td>
                        <td>
                          <input type="text" name="aMaterno[]" class="form-control" style="text-transform:uppercase"  required>
                        </td>
                        <td>
                          <select class="form-control" name="sexo[]" required>
                            <option value="" disabled selected hidden></option>
                            <option value="FEMENINO">FEMENINO</option>
                            <option value="MASCULINO">MASCULINO</option>
                          </select>
                        </td>
                        <td>
                          <input type="date" name="nacimiento[]" class="form-control" required>
                        </td>
                        <td>
                          <input type="text" name="trabajo[]" class="form-control" style="text-transform:uppercase" required>
                        </td>
                        <td>
                          <input type="tel" name="tel[]" class="form-control" pattern="[0-9]{10}" required>
                        </td>
                        <td>
                          <input type="email" name="correo[]" class="form-control" required>
                        </td>
                        <td>
                          <select class="form-control input-lg" name="estado[]" required>
                            <option value="" disabled selected hidden>SELECCIONE</option>
                            <option value="CERTIFICACIÓN">CERTIFICACIÓN</option>
                            <option value="RECERTIFICACIÓN">RECERTIFICACIÓN</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>   

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

              </div>                  
              <?php
                $registrarAlumno = new ControladorAlumnos();
                $registrarAlumno -> ctrCrearAlumno();
              ?>
            </form>

          </div>
        </div>


        <!-- Modal editar alumno -->
 <div class="modal fade" id="modalEditarAlumno" role="dialog">
        <div class="modal-dialog modal-lg">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>EDITAR ALUMNO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <!-- <select class="form-control input-lg" name="codigo" id="codigo" required>

                      <?php
                        $item=null;
                        $valor = null;
                        $estados = ControladorCursos::ctrMostrarCursos($item, $valor);
                        foreach ($estados as $key):
                      ?>
                      <option><?=$key["id"]?></option>
                      <?php endforeach ?>
                    </select> -->
                    <input type="hidden" name="id_alumno_A" id="id_alumno_A" readonly>
                    <input type="text" name="nombre_A" id="nombre_A" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" required>
                    <input type="text" name="aPaterno_A" id="aPaterno_A" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" required>
                    <input type="text" name="aMaterno_A" id="aMaterno_A" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="sexo_A" id="sexo_A" required>
                      <option value="" disabled selected hidden>SEXO</option>
                      <option value="FEMENINO">FEMENINO</option>
                      <option value="MASCULINO">MASCULINO</option>
                    </select>
                    <input type="number" name="edad_A" id="edad_A" class="form-control input-lg" style="text-transform:uppercase" placeholder="Edad" required>
                  </div>
                </div>

                <div class="panel"><b>FECHA DE NACIMIENTO:</b></div>
                <div class="form-group">
                  <div class="input-group">
                      <input type="date" name="nacimiento_A" id="nacimiento_A" class="form-control" required>
                    </div>
                  </div>
    
                <div class="input-group">
                  <input type="text" name="trabajo_A" id="trabajo_A" class="form-control input-lg" style="text-transform:uppercase" placeholder="Lugar de trabajo" required>
                  <select class="form-control input-lg" name="escolaridad_A" id="escolaridad_A" >
                    <option value="" disabled selected hidden>ESCOLARIDAD</option>
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="PREPARATORIA">PREPARATORIA</option>
                    <option value="UNIVERSIDAD">UNIVERSIDAD</option>
                  </select>
                </div>
                <br>
                <div class="input-group">
                  <input type="tel" name="tel_A" id="tel_A" class="form-control input-lg" placeholder="NÚMERO TELEFÓNICO" pattern="[0-9]{10}" required>
                  <input type="email" name="correo_A" id="correo_A" class="form-control input-lg" placeholder="CORREO ELECTRÓNICO" required>
                  <select class="form-control input-lg" name="estado_A" id="estado_A" required>
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
                $actualizarAlumno = new ControladorAlumnos();
                $actualizarAlumno -> ctrActualizarAlumno();
              ?>
            </div>
          </form>
        </div>
      </div>

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

      <!-- Modal información curso -->
<!-- Modal VER CURSO LISTO --> 
<div class="modal fade" id="modalShow" role="dialog">
      <div class="modal-dialog modal-lg">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>VER CURSO</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group">
                  <input classs="form-control input-lg" name="editarCurso_V" id="curso_V"  readonly>
                    
                  <input readonly class="form-control input-lg" name="sector" id="sector_V">
                   
                  <input type="text" name="dependencia" id="dependencia_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Dependencia" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE INICIO:</b></div>
                <input type="date" name="inicio" id="inicio_V" class="form-control" required readonly> 
              </div>
              <div class="form-group">
                <div class="panel"><b>FECHA DE CONCLUSIÓN:</b></div>
                <input type="date" name="conclusion" id="conclusion_V" class="form-control" required readonly>
              </div>
              <div class="form-group">
              <div class="panel"><b>NUMERO DE PARTICIPANTES:</b></div>
                <input type="number" name="alumnos" id="alumnos_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número de alumnos" min="1" max="15"  readonly required>
              </div>
              <div class="form-group">
                <label>LUGAR DE IMPARTICIÓN:</label>
                <div class="input-group">
                  
                  <input type="text" name="calle" id="calle_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required readonly>
                  <input type="number" name="numExt" id="numExt_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número exterior" required readonly>
                  <input type="text" name="numInt" id="numInt_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Número interior" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="colonia" id="colonia_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Colonia"  readonly required>
                  <input type="number" name="cp" id="cp_V" class="form-control input-lg" style="text-transform:uppercase" placeholder="Código postal" readonly required>
                  <select class="form-control input-lg" name="municipio" id="municipio_V" required readonly>
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

        <div class="container px-1">
    <table class="table">
    <thead class="thead-light">
      <tr>
        <th>Actividad</th>
        <th>Calificación</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>ADULTOS</td>
        <td>
                <input type="hidden" name="id_alumno" id="id_alumno" readonly>
                <input type="hidden" name="calificado" id="calificado" value="1">
                <input type="number" name="adultos" id="adultos" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)">
        </td>
        
      </tr>
      <tr>
        <td>VENDAJES</td>
        <td>
        <input type="number" name="vendajes" id="vendajes" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)">
        </td>
        
      </tr>
      <tr>
        <td>NIÑO</td>
        <td><input type="number" name="nino" id="nino" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>BEBÉ</td>
        <td><input type="number" name="bebe" id="bebe" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>EXPLORACIÓN FISICA</td>
        <td><input type="number" name="exploracion" id="exploracion" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>SIGNOS VITALES</td>
        <td><input type="number" name="signos" id="signos" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>MOVILIZACIÓN/INMOVILIZACIÓN</td>
        <td><input type="number" name="movi" id="movi" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>DESOBSTRUCCION VÍA AÉREA</td>
        <td><input type="number" name="desob" id="desob" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
      <tr>
        <td>EXÁMEN TEÓRICO</td>
        <td><input type="number" name="teorico" id="teorico" min="0" max="100" maxlength="3" oninput="maxLengthCheck(this)"></td>
        
      </tr>
    </tbody>
  </table>
      </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </div>
                
      <?php
        $editarAlumno = new ControladorAlumnos();
        $editarAlumno -> ctrEditarAlumno();
         $borrarAlumno = new ControladorAlumnos();
    $borrarAlumno -> ctrBorrarAlumno();
      ?>
      
    </form>

    

   
  </div>
</div>



</section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->


  <!-- SCRIPT PARA LIMITAR LA CANTIDAD DE DIGITOS EN INPUTS DE EVALUACIÓN -->
  <script>
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
