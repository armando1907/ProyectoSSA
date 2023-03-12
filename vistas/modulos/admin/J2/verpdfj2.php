

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php
    $pdf = new ControladorPrueba();
    $pdf ->ctrPDF();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Certificados de instructores registrados</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->



<section class="content">

    <table id="example" class="table table-striped tabladatatable dt-responsive" style="width:100%">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo Electrónico</th>
          <th scope="col">Certificación del instructor</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        $item = 'juris';
        $valor = 'J2';
        $prueba = ControladorPrueba::ctrMostrarPdf($item, $valor);
        foreach ($prueba as $key => $value) {
          echo '<tr>
            <th scope="row">'.'IPR-'."RSSA-"."".$value['usuario'].' </th>
            <td>'.$value['nomIns'].' '.$value['apIns'].'</td>
            <td>'.$value['correo'].'</td>
            <td><a href="'.$value['nombre'].'" target="_blank"> <button id="verPdf" name="VerPdf" class="btn btn-primary btn-s"><i class="fas fa-file-pdf"></i></button></a></td>

            </tr>';
        }
        ?>

      </tbody>
    </table>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->