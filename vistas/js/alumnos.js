//EDITAR ALUMNO

$(".btnEditarAlumno").click(function(){
    var idAlumno = $(this).attr("idAlumno");
    var datos = new FormData();
    console.log("idAlumno",idAlumno);
    datos.append("idAlumno", idAlumno);
    $.ajax({
        url:"ajax/alumnos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
        console.log("idAlumno","Respuesta");
         $("#vendajes").val(respuesta['vendajes']);
         $("#exploracion").val(respuesta['exploracion']);
         $("#signos").val(respuesta['signos']);
         $("#movi").val(respuesta['movi']);
         $("#adultos").val(respuesta['adultos']);
         $("#nino").val(respuesta['nino']);
         $("#bebe").val(respuesta['bebe']);
         $("#desob").val(respuesta['desob']);
         $("#teorico").val(respuesta['teorico']);
         $("#id_alumno").val(respuesta['id_alumno']);
          },     
        error : function(respuesta) {
            console.log("Error",respuesta);
          }
  
      });
    })
  
  //ELIMINAR USUARIO
  
  $(".btnEliminarAlumno").click(function(){
  
    var idAlumno = $(this).attr("idAlumno");
  
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
       window.location = "index.php?ruta=alumnos&idalumno="+idAlumno;
    }
    })
    })