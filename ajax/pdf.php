<?php

require_once "../controladores/pdf.controlador.php";
require_once "../modelos/pdf.modelo.php";

class AjaxPrueba
{
	//Visualizar	
	public $idPrueba;

	public function ajaxVisualizar()
	{
		$item = "id";
		$valor = $this->idPrueba;
		$respuesta = ControladorPrueba::ctrMostrarAjax($item, $valor);
		echo json_encode($respuesta);
	}
}

//Visualizar
if(isset($_POST["idPrueba"]))
{
	$editar = new AjaxPrueba();
	$editar -> idPrueba = $_POST["idPrueba"];
	$editar -> ajaxVisualizar();
}