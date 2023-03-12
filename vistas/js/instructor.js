$(".nuevaFoto").change(function() {
    var imagen = this.files[0];
    console.log("imagen", imagen["type"])
    //Validar el tamaño de la imagen
    //VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})
///////////////////////////
$(".FotoC").change(function() {
    var imagen2 = this.files[0];
    console.log("imagen2", imagen2["type"])
    var datosImagen2 = new FileReader;
    datosImagen2.readAsDataURL(imagen2);
    $(datosImagen2).on("load", function(event) {
        var rutaImagen2 = event.target.result;
        $(".previsualizar1").attr("src", rutaImagen2);
    })
})
//////////////////////////
//EDITAR USUARIO
$(".btnEditarUsuario").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    console.log("idUsuario", idUsuario);
    datos.append("idUsuario", idUsuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idUsuario", "Respuesta");
            $("#editarNombre").val(respuesta['nombre']);
            $("#aPaterno").val(respuesta['aPaterno']);
            $("#aMaterno").val(respuesta['aMaterno']);
            $("#sexo").val(respuesta['sexo']);
            $("#tel").val(respuesta['tel']);
            $("#curp").val(respuesta['curp']);
            $("#escolaridad").val(respuesta['escolaridad']);
            $("#institucion").val(respuesta['institucion']);
            $("#calle").val(respuesta['calle']);
            $("#colonia").val(respuesta['colonia']);
            $("#municipio").val(respuesta['municipio']);
            $("#cp").val(respuesta['cp']);
            $("#numExt").val(respuesta['numExt']);
            $("#numInt").val(respuesta['numInt']);
            $("#experiencia").val(respuesta['experiencia']);
            $("#jurisdiccion").val(respuesta['jurisdiccion']);
            $("#adiestramiento").val(respuesta['adiestramiento']);
            $("#editarUsuario").val(respuesta['usuario']);
            $("#passwordActual").val(respuesta['password']);
            $("#editarPerfil").html(respuesta['perfil']);
            $("#editarPerfil").val(respuesta['perfil']);
            $("#fotoActual").val(respuesta['foto']);
            if (respuesta['foto'] != "") {
                $(".previsualizar").attr("src", respuesta['foto']);
            }
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})
//ACTUALIZAR PERFIL
$(".btnActualizarPerfil").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    console.log("idUsuario", idUsuario);
    datos.append("idUsuario", idUsuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idUsuario", "Respuesta");
            $("#editarJurisdiccion").val(respuesta['jurisdiccion']);
            $("#editarTel").val(respuesta['tel']);
            $("#fotoActual").val(respuesta['foto']);
            if (respuesta['foto'] != "") {
                $(".previsualizar").attr("src", respuesta['foto']);
            }
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})
//ACTIVAR USUARIO
$(".btnActivar").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");
    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {}
    })
    if (estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Inactivo');
        $(this).attr('estadoUsuario', 1);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activo');
        $(this).attr('estadoUsuario', 0);
    }
})

//VALIDAR USUARIO UNICO
$("#nuevoUsuario").change(function() {
    $(".alert").remove();
    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("Respuesta", respuesta);
            if (respuesta != "false") {
                console.log("Respuesta2", respuesta);
                $("#nuevoUsuario").parent().after("<div class='alert alert-warning'>Este nombre de usuario ya existe</div>");
                $("#nuevoUsuario").val("");
            }
        }
    })
})
//ELIMINAR USUARIO
$(".btnEliminarUsuario").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");
    Swal.fire({
        title: '¿Seguro?',
        text: "Si no es así, puedes presionar cancelar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#09B232',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=usuarios&idusuario=" + idUsuario + "&usuario=" + usuario + "&fotousuario=" + fotoUsuario;
        }
    })
})
/*$(".nuevaFoto").change(function(){
    var imagen = this.files[0];
    console.log("imagen",imagen["type"]);

//Validar el tamaño de la imagen

//VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

       Swal.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

  }else if(imagen["size"] > 2000000){

      $(".nuevaFoto").val("");

       Swal.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

  }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

          var rutaImagen = event.target.result;

          $(".previsualizar").attr("src", rutaImagen);

      })

  }
})*/