<?php

	class conexion{
		static public function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=crumbcco_bd","crumbcco_admin","a),C,5)mrTwc");
			$link ->exec("set names utf8");
			return $link;
		}

		static public function consultas($tabla,$tabla2,$tabla3,$where='', $select= '*'){

			
			$stmt =Conexion::conectar()->prepare(" SELECT $tabla.id_alumno,$tabla.codigo,$tabla.sexo,$tabla.correo,$tabla.nombre,$tabla.aPaterno,$tabla.aMaterno,$tabla.tel,$tabla.tel,$tabla.correo,$tabla.nacimiento,$tabla2.dependencia,$tabla2.inicio,$tabla2.conclusion,$tabla2.municipio,$tabla2.sector,$tabla3.jurisdiccion FROM $tabla,$tabla2,$tabla3 WHERE ($tabla.codigo=$tabla2.id AND $tabla2.instructor=$tabla3.id)  $where ");

			$stmt -> execute();

			return $stmt -> fetchAll();


			$stmt -> close();
			
			$stmt = null;
		
	}

	

	}

	