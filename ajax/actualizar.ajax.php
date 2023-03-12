<?php

require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";

class AjaxaAlumnos{

	//EDITAR ALUMNO

	public $idAlumno;

	public function ajaxActAlumno(){

		$item = "id_alumno";
		$valor = $this->idAlumno;
		$respuesta = ControladorAlumnos::ctrMostrarAjax($item, $valor);
		echo json_encode($respuesta); 

	}

}

//EDITAR ALUMNO

if(isset($_POST["idAlumno"])){
	$editar = new AjaxaAlumnos();
	$editar -> idAlumno = $_POST["idAlumno"];
	$editar -> ajaxActAlumno();
 
}


