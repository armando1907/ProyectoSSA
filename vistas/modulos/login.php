<div class="login-box">
  <div class="shadow mb-3 bg-white rounded">
    <img src="vistas/img/logos.png" alt="logo" width="360" height="116">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicio de sesión</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="ingUsuario" placeholder="Correo electrónico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="ingPassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <div class="col text-center">
            <br>
            <a href="#" data-toggle="modal" data-target="#modalAgregarUsuario">Crear cuenta</a>
          </div>

          <!-- /.col -->
        </div>

        <?php
          $login = new ControladorUsuarios();
          $login ->ctrIngreso();
        ?>
      </form>

      <!-- Modal nuevo usuario -->

          <div class="modal fade" id="modalAgregarUsuario" role="dialog">
            <div class="modal-dialog modal-lg">

              <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>REGISTRO</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>INFORMACIÓN PERSONAL:</label>
                      <div class="input-group">
                        <input type="hidden" name="nuevoPerfil" class="form-control input-lg" value="INSTRUCTOR">
                        <input type="text" name="nuevoNombre" class="form-control input-lg" style="text-transform:uppercase" placeholder="Nombre(s)" required>
                        <input type="text" name="aPaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido paterno" required>
                        <input type="text" name="aMaterno" class="form-control input-lg" style="text-transform:uppercase" placeholder="Apellido materno" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="email" name="nuevoUsuario" id="usuario" class="form-control input-lg" style="text-transform:uppercase" placeholder="Correo electrónico" required>
                        <input type="password" name="nuevoPassword" class="form-control input-lg" placeholder="CONTRASEÑA" required>
                        <input type="tel" name="tel" class="form-control input-lg" placeholder="Número telefónico" pattern="[0-9]{10}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <select class="form-control input-lg" name="sexo" required>
                          <option value="" disabled selected hidden>SEXO</option>
                          <option value="FEMENINO">FEMENINO</option>
                          <option value="MASCULINO">MASCULINO</option>
                        </select>
                        <input type="text" name="curp" class="form-control input-lg" style="text-transform:uppercase" placeholder="CURP" required>
                        <select class="form-control input-lg" name="escolaridad" required>
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

                    <div class="form-group">
                      <label> INFORMACIÓN RELEVANTE:</label>
                      <div class="input-group">
                        <select class="form-control input-lg" name="jurisdiccion" required>
                            <option value="" disabled selected hidden>JURISDICCIÓN</option>
                            <option value="J1">J1</option>
                            <option value="J2">J2</option>
                            <option value="J3">J3</option>
                            <option value="J4">J4</option>
                          </select>
                          <input type="text" name="institucion" class="form-control input-lg" style="text-transform:uppercase" placeholder="Empresa/Instituto" required>
                          <input type="number" name="experiencia" class="form-control input-lg" style="text-transform:uppercase" placeholder="Años de experiencia como instructor" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="panel"><b>FECHA DE ADIESTRAMIENTO COMO INSTRUCTOR:</b></div>
                        <input type="date" name="adiestramiento" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <div class="panel"><b>FOTO DE PERFIL:</b></div>
                        <input type="file" name="nuevaFoto" class="nuevaFoto center-block" required>
                        <br><br>
                        <img src="vistas/img/user.png" class="thumbnail center-block previsualizar" width="100px">
                        <br><br>
                        
                        
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">GUARDAR</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                    </div>
                  </div>
                </div>                  
                <?php
                    $crearusuario = new ControladorUsuarios();
                    $crearusuario -> ctrCrearUsuario();
                  ?>
              </form>
            </div>
          </div>
        
    </div>
  </div>
</div>

