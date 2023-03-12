///NUEVO METODO
$(".btnVerAlumno").click(function() {
    var idAlumno = $(this).attr("idAlumno");
    var datos = new FormData();
    console.log("idAlumno", idAlumno);
    datos.append("idAlumno", idAlumno);
    $.ajax({
        url: "ajax/ver.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idAlumno", "Respuesta");
            $("#nombre_").val(respuesta['nombre']);
            $("#a_Paterno").val(respuesta['aPaterno']);
            $("#a_Materno").val(respuesta['aMaterno']);
            $("#se_xo").val(respuesta['sexo']);
            $("#edad_").val(respuesta['edad']);
            $("#nacimiento_").val(respuesta['nacimiento']);
            $("#trabajo_").val(respuesta['trabajo']);
            $("#escolaridad_").val(respuesta['escolaridad']);
            $("#tel_").val(respuesta['tel']);
            $("#correo_").val(respuesta['correo']);
            $("#estado_").val(respuesta['estado']);


        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})






//EDITAR ALUMNO
$(".btnEditarAlumno").click(function() {
        var idAlumno = $(this).attr("idAlumno");
        var datos = new FormData();
        console.log("idAlumno", idAlumno);
        datos.append("idAlumno", idAlumno);
        $.ajax({
            url: "ajax/alumnos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                console.log("idAlumno", "Respuesta");
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
            error: function(respuesta) {
                console.log("Error", respuesta);
            }
        });
    })
    //ELIMINAR USUARIO
$(".btnEliminarAlumno").click(function() {
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
                window.location = "index.php?ruta=alumnos&idalumno=" + idAlumno;
            }
        })
    })
    //     // editar alumno
    // $(".btnEditar").click(function() {
    //     var idAlumno = $(this).attr("idAlumno");
    //     var datos = new FormData();
    //     console.log("idAlumno", idAlumno);
    //     datos.append("idAlumno", idAlumno);
    //     $.ajax({
    //         url: "ajax/alumnos.ajax.php",
    //         method: "POST",
    //         data: datos,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         dataType: "json",
    //         success: function(respuesta) {
    //             console.log("idAlumno", "Respuesta");
    //             $("#vendajes").val(respuesta['vendajes']);
    //             $("#exploracion").val(respuesta['exploracion']);
    //             $("#signos").val(respuesta['signos']);
    //             $("#movi").val(respuesta['movi']);
    //             $("#adultos").val(respuesta['adultos']);
    //             $("#nino").val(respuesta['nino']);
    //             $("#bebe").val(respuesta['bebe']);
    //             $("#desob").val(respuesta['desob']);
    //             $("#teorico").val(respuesta['teorico']);
    //             $("#id_alumno").val(respuesta['id_alumno']);
    //         },
    //         error: function(respuesta) {
    //             console.log("Error", respuesta);
    //         }
    //     });})