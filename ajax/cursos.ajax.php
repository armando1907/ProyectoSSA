<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";

class AjaxCursos{

	//EDITAR CURSO

	public $idCurso;

	public function ajaxEditarCurso(){ 

			$item = "id";
			$valor = $this->idCurso;
			$respuesta = ControladorCursos::ctrMostrarAjax($item, $valor);
			echo json_encode($respuesta);
	}
}

//EDITAR CURSO

if(isset($_POST["idCurso"])){
	$editar = new AjaxCursos();
	$editar -> idCurso = $_POST["idCurso"];
	$editar -> ajaxEditarCurso();

}



