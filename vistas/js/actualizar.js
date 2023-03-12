//actualizar l0s alumnos
$(".btnActAlumno").click(function() {
    var idAlumno = $(this).attr("idAlumno");
    var datos = new FormData();
    console.log("idAlumno", idAlumno);
    datos.append("idAlumno", idAlumno);
    $.ajax({
        url: "ajax/actualizar.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idAlumno", "Respuesta");
            $("#id_alumno_A").val(respuesta['id_alumno']);
            $("#nombre_A").val(respuesta['nombre']);
            $("#aPaterno_A").val(respuesta['aPaterno']);
            $("#aMaterno_A").val(respuesta['aMaterno']);
            $("#sexo_A").val(respuesta['sexo']);
            $("#edad_A").val(respuesta['edad']);
            $("#nacimiento_A").val(respuesta['nacimiento']);
            $("#trabajo_A").val(respuesta['trabajo']);
            $("#escolaridad_A").val(respuesta['escolaridad']);
            $("#tel_A").val(respuesta['tel']);
            $("#correo_A").val(respuesta['correo']);
            $("#estado_A").val(respuesta['estado']);



        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})