

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
        <h1 class="m-0 text-dark">PDF</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <form  method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="col-md-10 mb-3">
                <input type="file" name="pdf" size="50" />
            </div>
        </div>
        <div class="input-group">
            <div class="col-md-10 mb-3">
                <input class="btn btn-primary" type="submit" value="SUBIR" />
            </div>
        </div>

    </form>

<table id="example" class="table table-striped tabladatatable dt-responsive" style="width:100%">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Archivo</th>
          
          
        </tr>
      </thead>
      <tbody>
        <?php
        $item = 'usuario';
        $valor = $_SESSION['id'];
        $prueba = ControladorPrueba::ctrMostrarPdf($item, $valor);
        foreach ($prueba as $key => $value) {

            if(!isset($value['nombre']) || ($value['nombre']) == false)
            {
                           
            }
            else
            {

            
          echo '<tr>
            <th scope="row">'.$value['id'].' </th>
            <td><a href="'.$value['nombre'].'" target="_blank"> <button id="verPdf" name="VerPdf" class="btn btn-primary btn-s"><i class="fas fa-file-pdf"></i></button></a></td>
            
            

            </tr>';
            }
        }
        ?>

      </tbody>
    </table>




 




</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->