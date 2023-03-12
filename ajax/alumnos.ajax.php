<?php

require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";

class AjaxAlumnos{

	//EDITAR ALUMNO

	public $idAlumno;

	public function ajaxEditarAlumno(){

		$item = "id_alumno"; 
		$valor = $this->idAlumno;
		$respuesta = ControladorAlumnos::ctrMostrarAjax($item, $valor);
		echo json_encode($respuesta);

	}

}

//EDITAR ALUMNO

if(isset($_POST["idAlumno"])){
	$editar = new AjaxAlumnos();
	$editar -> idAlumno = $_POST["idAlumno"];
	$editar -> ajaxEditarAlumno();

}


