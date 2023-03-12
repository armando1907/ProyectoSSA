 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Instructores</h1>
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
            <th scope="col">Nombre</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col">Foto</th>
            <th scope="col">Estado</th>
            <th scope="col">Jurisdicción</th>
            <th scope="col">Último inicio de sesión</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $item=null;
            $valor = null;
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            foreach ($usuarios as $key => $value) {
              echo'<tr>
            <th scope="row">'.'IPR-'."RSSA-"."".$value['id'].'</th>
            <td>'.$value['nombre'].' '.$value['aPaterno'].' '.$value['aMaterno'].'</td>
            <td>'.$value['usuario'].'</td>';
            if($value["foto"]!=""){
              echo '<td><img src="'.$value['foto'].'" class="img-thumbnail" width="55px"></td>';
            }else{
              echo '<td><img src="vistas/img/user.png" class="img-thumbnail" width="55px"></td>';
            }
            if($value['estado']!="1"){
              echo'<td><button class="btn btn-danger btnprueba btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Inactivo</button></td>';
            }else{
              echo'<td><button class="btn btn-success btnprueba btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activo</button></td>';
            }
            echo'
            <td>'.$value['jurisdiccion'].'</td>
            <td>'.$value['ultimo_login'].'</td>
            <td>  
                <button class="btn btn-warning btn-xs btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-xs btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times-circle"></i></button>
            </td>

          </tr>';
            }
          ?>
       
        </tbody>
      </table>


      <!-- Modal editar usuario -->

      <div class="modal fade" id="modalEditarUsuario" role="dialog">
        <div class="modal-dialog modal-lg">

          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><b>EDICIÓN</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>INFORMACIÓN PERSONAL:</label>
                  <div class="input-group">
                    <input type="hidden" name="editarPerfil" id="editarPerfil" class="form-control input-lg">
                    <input type="text" name="editarNombre" id="editarNombre" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" required>
                    <input type="text" name="aPaterno" id="aPaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" required>
                    <input type="text" name="aMaterno" id="aMaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" name="editarUsuario" id="editarUsuario" class="form-control input-lg" style="text-transform:uppercase" placeholder="Correo electrónico" required readonly>
                    <input type="password" name="editarPassword" class="form-control input-lg" placeholder="CONTRASEÑA">
                    <input type="hidden" name="passwordActual" id="passwordActual">
                    <input type="tel" name="tel" id="tel" class="form-control input-lg" placeholder="Número telefónico" pattern="[0-9]{10}" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control input-lg" name="sexo" id="sexo" required>
                      <option value="" disabled selected hidden>SEXO</option>
                      <option value="FEMENINO">FEMENINO</option>
                      <option value="MASCULINO">MASCULINO</option>
                    </select>
                    <input type="text" name="curp" id="curp" class="form-control input-lg" style="text-transform:uppercase" placeholder="CURP" required>
                    <select class="form-control input-lg" name="escolaridad" id="escolaridad" required>
                      <option value="" disabled selected hidden>ESCOLARIDAD</option>
                      <option value="PRIMARIA">PRIMARIA</option>
                      <option value="SECUNDARIA">SECUNDARIA</option>
                      <option value="PREPARATORIA">PREPARATORIA</option>
                      <option value="UNIVERSIDAD">UNIVERSIDAD</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>DOMICILIO:</label>
                  <div class="input-group">
                    <input type="text" name="calle" id="calle" class="form-control input-lg" style="text-transform:uppercase" placeholder="Calle" required>
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

                <div class="form-group">
                  <label> INFORMACIÓN RELEVANTE:</label>
                  <div class="input-group">
                    <select class="form-control input-lg" name="jurisdiccion" id="jurisdiccion" required>
                        <option value="" disabled selected hidden>JURISDICCIÓN</option>
                        <option value="J1">J1</option>
                        <option value="J2">J2</option>
                        <option value="J3">J3</option>
                        <option value="J4">J4</option>
                      </select>
                      <input type="text" name="institucion" id="institucion" class="form-control input-lg" style="text-transform:uppercase" placeholder="Empresa/Instituto" required>
                      <input type="number" name="experiencia" id="experiencia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Años de experiencia como instructor" required>
                  </div>
                </div>
                <div class="form-group">
                    <div class="panel"><b>FECHA DE ADIESTRAMIENTO COMO INSTRUCTOR:</b></div>
                    <input type="date" name="adiestramiento" id="adiestramiento" class="form-control" required>
                </div>
                <div class="form-group">
                  <div class="panel"><b>FOTO DE PERFIL:</b></div>
                    <input type="file" name="editarFoto" id="" class="nuevaFoto center-block">
                    <br><br>
                    <img src="vistas/img/user.png" class="thumbnail center-block previsualizar" width="100px">
                    <input type="hidden" name="fotoActual" id="fotoActual">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">GUARDAR</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                </div>
              </div>
            </div>                  
            <?php
                $editarusuario = new ControladorUsuarios();
                $editarusuario -> ctrEditarUsuario();
              ?>
          </form>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
?>