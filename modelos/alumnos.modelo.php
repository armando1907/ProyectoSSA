<?php
	require_once "conexion.php";
	class ModeloAlumnos{
 
		static public function mdlIngresarAlumno($tabla,$datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre,aPaterno,aMaterno,sexo,nacimiento,trabajo,tel,correo,
			estado,instructor,codigo) VALUES (:nombre,:aPaterno,:aMaterno,:sexo,:nacimiento,:trabajo,:tel,:correo,:estado,:instructor,:codigo)");

			foreach($datos["nombre"] as $key => $value){

				$stmt -> bindParam(":nombre",strtoupper($value),PDO::PARAM_STR);
				$stmt -> bindParam(":aPaterno",strtoupper($datos['aPaterno'][$key]),PDO::PARAM_STR);
				$stmt -> bindParam(":aMaterno",strtoupper($datos['aMaterno'][$key]),PDO::PARAM_STR);
				$stmt -> bindParam(":sexo",$datos['sexo'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":nacimiento",$datos['nacimiento'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":trabajo",$datos['trabajo'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":tel",$datos['tel'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":correo",$datos['correo'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":estado",$datos['estado'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":instructor",$datos['instructor'][$key],PDO::PARAM_STR);
				$stmt -> bindParam(":codigo",$datos['codigo'][$key],PDO::PARAM_STR);

				if(!$stmt->execute()){
					return "error";
				}
			}

			return "ok";

			$stmt ->close();
			$stmt = null;
		}
		static public function mdlActualizarAlumno($tabla,$datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,aPaterno=:aPaterno,
			 aMaterno=:aMaterno,sexo=:sexo,nacimiento=:nacimiento,edad=:edad,trabajo=:trabajo, 
			 /*escolaridad=:escolaridad,*/tel=:tel,correo=:correo,estado=:estado WHERE id_alumno = :id_alumno;");

			$stmt -> bindParam(":id_alumno",$datos['id_alumno'],PDO::PARAM_STR);
			$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			$stmt -> bindParam(":aPaterno",$datos['aPaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":aMaterno",$datos['aMaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":sexo",$datos['sexo'],PDO::PARAM_STR);
			$stmt -> bindParam(":nacimiento",$datos['nacimiento'],PDO::PARAM_STR); 
			$stmt -> bindParam(":edad",$datos['edad'],PDO::PARAM_STR);
			$stmt -> bindParam(":trabajo",$datos['trabajo'],PDO::PARAM_STR);
			//$stmt -> bindParam(":escolaridad",$datos['escolaridad'],PDO::PARAM_STR);
			$stmt -> bindParam(":tel",$datos['tel'],PDO::PARAM_STR);
			$stmt -> bindParam(":correo",$datos['correo'],PDO::PARAM_STR);
			$stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
			
			

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlEditarAlumno($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET vendajes=:vendajes,exploracion=:exploracion,
			signos=:signos,movi=:movi,adultos=:adultos,nino=:nino,bebe=:bebe,desob=:desob,teorico=:teorico,calificado=:calificado WHERE id_alumno=:id_alumno");
			
			$stmt -> bindParam(":id_alumno",$datos['id_alumno'],PDO::PARAM_STR);
			$stmt -> bindParam(":vendajes",$datos['vendajes'],PDO::PARAM_STR);
			$stmt -> bindParam(":exploracion",$datos['exploracion'],PDO::PARAM_STR);
			$stmt -> bindParam(":signos",$datos['signos'],PDO::PARAM_STR);
			$stmt -> bindParam(":movi",$datos['movi'],PDO::PARAM_STR);
			$stmt -> bindParam(":adultos",$datos['adultos'],PDO::PARAM_STR);
			$stmt -> bindParam(":nino",$datos['nino'],PDO::PARAM_STR);
			$stmt -> bindParam(":bebe",$datos['bebe'],PDO::PARAM_STR);
			$stmt -> bindParam(":desob",$datos['desob'],PDO::PARAM_STR);
			$stmt -> bindParam(":teorico",$datos['teorico'],PDO::PARAM_STR);
			$stmt -> bindParam(":calificado",$datos['calificado'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlBorrarAlumno($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_alumno = :id_alumno");
			$stmt -> bindParam(":id_alumno",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}

		static public function mdlMostrarAjax($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor'" );
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

		static public function mdlMostrar($tabla,$item,$valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor'");
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

		static public function mdlMostrarEvaluaciones($tabla,$tabla2,$item, $valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla2 INNER JOIN $tabla ON $tabla2.codigo = $tabla.id WHERE $tabla2.$item='$valor' ");
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

		static public function mdlMostraracreditados($tabla,$tabla2,$item, $valor){

			if($valor!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE $tabla2.$item='$valor' && calificado=1; ");
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

		


		// static public function mdlMostrarEvaluaciones($tabla,$tabla2,$item, $item1, $valor){

		// 	if($valor!=null){
		// 		$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla2 INNER JOIN $tabla ON $tabla2.codigo = $tabla.id WHERE $tabla2.$item='$valor' AND $item1 = '00016'");
		// 		$stmt -> execute();
		// 		return $stmt->fetchAll();
		// 	}else{
		// 		$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
		// 		$stmt -> execute();
		// 		return $stmt->fetchAll();
		// 	}
			
		// 	$stmt ->close();
		// 	$stmt=null;

		// }
	}