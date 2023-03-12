<?php
	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/usuarios.controlador.php";
	require_once "controladores/cursos.controlador.php";
	require_once "controladores/alumnos.controlador.php";
	require_once "controladores/pdf.controlador.php";

	require_once "modelos/usuarios.modelo.php";
	require_once "modelos/cursos.modelo.php";
	require_once "modelos/alumnos.modelo.php";
	require_once "modelos/pdf.modelo.php";
	
	$plantilla = new ControladorPlantilla();
	$plantilla -> ctrPlantilla();

