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
          <th scope="col">Acciones</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $item='instructor';
          $item1='codigo';
          $valor = $_SESSION["id"];
          $cursos = ControladorAlumnos::ctrMostrarEvaluaciones($item,$item1, $valor);
          foreach ($cursos as $key => $value) {
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
          echo'</tr>';
          }
        ?>
      </tbody>
</table>

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
