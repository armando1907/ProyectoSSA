//BOTON VER CURSO
$(".btnShow").click(function() {
    var idCurso = $(this).attr("idCurso");
    var datos = new FormData();
    console.log("idCurso", idCurso);
    datos.append("idCurso", idCurso);
    $.ajax({
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idCurso", "Respuesta");

            $("#curso_V").val(respuesta['curso']);
            $("#sector_V").val(respuesta['sector']);
            $("#dependencia_V").val(respuesta['dependencia']);
            $("#inicio_V").val(respuesta['inicio']);
            $("#conclusion_V").val(respuesta['conclusion']);
            $("#calle_V").val(respuesta['calle']);
            $("#numExt_V").val(respuesta['numExt']);
            $("#numInt_V").val(respuesta['numInt']);
            $("#colonia_V").val(respuesta['colonia']);
            $("#cp_V").val(respuesta['cp']);
            $("#municipio_V").val(respuesta['municipio']);
            $("#jurisdiccion_V").val(respuesta['jurisdiccion']);
            $("#alumnos_V").val(respuesta['alumnos']);
            $("#instructor_V").val(respuesta['instructor']);

        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }

    });
})

//ELIMINAR CURSO

$(".btnEliminarCurso").click(function() {

    var idCurso = $(this).attr("idCurso");

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
            window.location = "index.php?ruta=cursos&idcurso=" + idCurso;
        }
    })
})

//ELIMINAR NOMBRE CURSO

$(".btnEliminarNombreCurso").click(function() {

    var idCurso = $(this).attr("idCurso");

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
            window.location = "index.php?ruta=cursos-catalogo&idcurso=" + idCurso;
        }
    })
})

//EDITAR CURSO

$(".btnEditarCurso").click(function() {
    var idCurso = $(this).attr("idCurso");
    var datos = new FormData();
    console.log("idCurso", idCurso);
    datos.append("idCurso", idCurso);
    $.ajax({
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("idCurso", "Respuesta");

            $("#curso_E").val(respuesta['curso']);
            $("#sector_E").val(respuesta['sector']);
            $("#dependencia_E").val(respuesta['dependencia']);
            $("#inicio_E").val(respuesta['inicio']);
            $("#conclusion_E").val(respuesta['conclusion']);
            $("#calle_E").val(respuesta['calle']);
            $("#numExt_E").val(respuesta['numExt']);
            $("#numInt_E").val(respuesta['numInt']);
            $("#colonia_E").val(respuesta['colonia']);
            $("#cp_E").val(respuesta['cp']);
            $("#municipio_E").val(respuesta['municipio']);
            $("#jurisdiccion_E").val(respuesta['jurisdiccion']);
            $("#alumnos_E").val(respuesta['alumnos']);
            $("#instructor_E").val(respuesta['instructor']);
            $("#idCurso").val(respuesta['id']);

        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }

    });
})








// //VER/EDITAR CURSO
// $(".btnEditarCurso").click(function() {
//     var idCurso = $(this).attr("idCurso");
//     var datos = new FormData();
//     console.log("idCurso", idCurso);
//     datos.append("idCurso", idCurso);
//     $.ajax({
//         url: "ajax/cursos.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         success: function(respuesta) {
//             console.log("idCurso", "Respuesta");

//             $("#curso").val(respuesta['curso']);
//             $("#sector").val(respuesta['sector']);
//             $("#dependencia").val(respuesta['dependencia']);
//             $("#inicio").val(respuesta['inicio']);
//             $("#conclusion").val(respuesta['conclusion']);
//             $("#calle").val(respuesta['calle']);
//             $("#numExt").val(respuesta['numExt']);
//             $("#numInt").val(respuesta['numInt']);
//             $("#colonia").val(respuesta['colonia']);
//             $("#cp").val(respuesta['cp']);
//             $("#municipio").val(respuesta['municipio']);
//             $("#jurisdiccion").val(respuesta['jurisdiccion']);
//             $("#alumnos").val(respuesta['alumnos']);
//             $("#instructor").val(respuesta['instructor']);

//         },
//         error: function(respuesta) {
//             console.log("Error", respuesta);
//         }

//     });
// })