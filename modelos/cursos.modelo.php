<?php
	require_once "conexion.php";
	class ModeloCursos{

		static public function mdlIngresarCurso($tabla,$datos){

			$stmt = conexion::conectar()->prepare
			("INSERT INTO $tabla (curso,sector,dependencia,inicio,conclusion,calle,numExt,numInt,colonia,cp,municipio,jurisdiccion,alumnos,instructor) 
			VALUES (:curso,:sector,:dependencia,:inicio,:conclusion,:calle,:numExt,:numInt,:colonia,:cp,:municipio,:jurisdiccion,:alumnos,:instructor)");

			$stmt -> bindParam(":curso",$datos['curso'],PDO::PARAM_STR);
			$stmt -> bindParam(":sector",$datos['sector'],PDO::PARAM_STR);
			$stmt -> bindParam(":dependencia",$datos['dependencia'],PDO::PARAM_STR);
			$stmt -> bindParam(":inicio",$datos['inicio'],PDO::PARAM_STR);
			$stmt -> bindParam(":conclusion",$datos['conclusion'],PDO::PARAM_STR);
			$stmt -> bindParam(":calle",$datos['calle'],PDO::PARAM_STR);
			$stmt -> bindParam(":numExt",$datos['numExt'],PDO::PARAM_STR);
			$stmt -> bindParam(":numInt",$datos['numInt'],PDO::PARAM_STR);
			$stmt -> bindParam(":colonia",$datos['colonia'],PDO::PARAM_STR);
			$stmt -> bindParam(":cp",$datos['cp'],PDO::PARAM_STR);
			$stmt -> bindParam(":municipio",$datos['municipio'],PDO::PARAM_STR);
			$stmt -> bindParam(":jurisdiccion",$datos['jurisdiccion'],PDO::PARAM_STR);
			$stmt -> bindParam(":alumnos",$datos['alumnos'],PDO::PARAM_STR);
			$stmt -> bindParam(":instructor",$datos['instructor'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlEditarCurso($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET curso=:curso,sector=:sector,dependencia=:dependencia,inicio=:inicio,conclusion=:conclusion,calle=:calle,
			numExt=:numExt,numInt=:numInt,colonia=:colonia,cp=:cp,municipio=:municipio,jurisdiccion=:jurisdiccion,alumnos=:alumnos,instructor=:instructor WHERE id=:id");
			
			$stmt -> bindParam(":id",$datos['id'],PDO::PARAM_STR);
			$stmt -> bindParam(":curso",$datos['curso'],PDO::PARAM_STR);
			$stmt -> bindParam(":sector",$datos['sector'],PDO::PARAM_STR);
			$stmt -> bindParam(":dependencia",$datos['dependencia'],PDO::PARAM_STR);
			$stmt -> bindParam(":inicio",$datos['inicio'],PDO::PARAM_STR);
			$stmt -> bindParam(":conclusion",$datos['conclusion'],PDO::PARAM_STR);
			$stmt -> bindParam(":calle",$datos['calle'],PDO::PARAM_STR);
			$stmt -> bindParam(":numExt",$datos['numExt'],PDO::PARAM_STR);
			$stmt -> bindParam(":numInt",$datos['numInt'],PDO::PARAM_STR);
			$stmt -> bindParam(":colonia",$datos['colonia'],PDO::PARAM_STR);
			$stmt -> bindParam(":cp",$datos['cp'],PDO::PARAM_STR);
			$stmt -> bindParam(":municipio",$datos['municipio'],PDO::PARAM_STR);
			$stmt -> bindParam(":jurisdiccion",$datos['jurisdiccion'],PDO::PARAM_STR);
			$stmt -> bindParam(":alumnos",$datos['alumnos'],PDO::PARAM_STR);
			$stmt -> bindParam(":instructor",$datos['instructor'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlIngresarNombreCurso($tabla,$datos){

			$stmt = conexion::conectar()->prepare
			("INSERT INTO $tabla (nombre) 
			VALUES (:nombre)");

			$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}
		
		
		static public function mdlMostrar($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor' ");
				$stmt -> execute();
				return $stmt->fetchAll();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}
		
		static public function mdlMostrarInstitucionales($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor' AND  $tabla.sector = 'SECTOR PÚBLICO'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE sector = 'SECTOR PÚBLICO'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}

		static public function mdlMostrarInstitucionalesAdm($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tabla.sector = 'SECTOR PÚBLICO'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE sector = 'SECTOR PÚBLICO' ");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}
		
		static public function mdlMostrarPrivados($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor' AND sector = 'SECTOR PRIVADO'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE sector = 'SECTOR PRIVADO'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}

		static public function mdlMostrarAsCivil($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor' AND sector = 'ASOCIACIÓN CIVIL'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE sector = 'ASOCIACIÓN CIVIL'");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}
		
		
		static public function mdlMostrarAjax($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor'");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
			}else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;

		}
	}