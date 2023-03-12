<?php 
	require_once "conexion.php"; 
	class ModeloUsuarios{

        
		static public function mdlIngresarUsuario($tabla,$datos){

			$stmt = conexion::conectar()->prepare
			("INSERT INTO $tabla (nombre,usuario,password,perfil,foto,aPaterno,aMaterno,sexo,tel,curp,escolaridad,institucion,calle,colonia,municipio,cp,numExt,numInt,experiencia,jurisdiccion,adiestramiento) 
			VALUES (:nombre,:usuario,:password,:perfil,:foto,:aPaterno,:aMaterno,:sexo,:tel,:curp,:escolaridad,:institucion,:calle,:colonia,:municipio,:cp,:numExt,:numInt,:experiencia,:jurisdiccion,:adiestramiento)");

			$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			$stmt -> bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
			$stmt -> bindParam(":password",$datos['password'],PDO::PARAM_STR); 
			$stmt -> bindParam(":perfil",$datos['perfil'],PDO::PARAM_STR);
			$stmt -> bindParam(":foto",$datos['ruta'],PDO::PARAM_STR);
			$stmt -> bindParam(":aPaterno",$datos['aPaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":aMaterno",$datos['aMaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":sexo",$datos['sexo'],PDO::PARAM_STR);
			$stmt -> bindParam(":tel",$datos['tel'],PDO::PARAM_STR);
			$stmt -> bindParam(":curp",$datos['curp'],PDO::PARAM_STR);
			$stmt -> bindParam(":escolaridad",$datos['escolaridad'],PDO::PARAM_STR);
			$stmt -> bindParam(":institucion",$datos['institucion'],PDO::PARAM_STR);
			$stmt -> bindParam(":calle",$datos['calle'],PDO::PARAM_STR);
			$stmt -> bindParam(":colonia",$datos['colonia'],PDO::PARAM_STR);
			$stmt -> bindParam(":municipio",$datos['municipio'],PDO::PARAM_STR);
			$stmt -> bindParam(":cp",$datos['cp'],PDO::PARAM_STR);
			$stmt -> bindParam(":numExt",$datos['numExt'],PDO::PARAM_STR);
			$stmt -> bindParam(":numInt",$datos['numInt'],PDO::PARAM_STR);
			$stmt -> bindParam(":experiencia",$datos['experiencia'],PDO::PARAM_STR);
			$stmt -> bindParam(":jurisdiccion",$datos['jurisdiccion'],PDO::PARAM_STR);
			$stmt -> bindParam(":adiestramiento",$datos['adiestramiento'],PDO::PARAM_STR);
		

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}
		static public function mdlEditarUsuario($tabla,$datos){
			
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,password=:password,perfil=:perfil,foto=:foto,aPaterno=:aPaterno,
			aMaterno=:aMaterno,tel=:tel,calle=:calle,colonia=:colonia,municipio=:municipio,cp=:cp,numExt=:numExt,numInt=:numInt WHERE usuario=:usuario");
			
			$stmt -> bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			$stmt -> bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
			$stmt -> bindParam(":password",$datos['password'],PDO::PARAM_STR);
			$stmt -> bindParam(":perfil",$datos['perfil'],PDO::PARAM_STR);
			$stmt -> bindParam(":foto",$datos['ruta'],PDO::PARAM_STR);
			$stmt -> bindParam(":aPaterno",$datos['aPaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":aMaterno",$datos['aMaterno'],PDO::PARAM_STR);
			$stmt -> bindParam(":tel",$datos['tel'],PDO::PARAM_STR);
			$stmt -> bindParam(":calle",$datos['calle'],PDO::PARAM_STR);
			$stmt -> bindParam(":colonia",$datos['colonia'],PDO::PARAM_STR);
			$stmt -> bindParam(":municipio",$datos['municipio'],PDO::PARAM_STR);
			$stmt -> bindParam(":cp",$datos['cp'],PDO::PARAM_STR);
			$stmt -> bindParam(":numExt",$datos['numExt'],PDO::PARAM_STR);
			$stmt -> bindParam(":numInt",$datos['numInt'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlMostrarUsuarios($tabla,$item,$valor){
			if($item!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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

		static public function mdlMostrarUsuariosJ($tabla,$item,$valor){

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
		
		static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;

		}

		static public function mdlBorrarUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
			$stmt -> bindParam(":id",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
		static public function mdlMostrar($tabla,$item,$valor){
			if($item!=null){
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item >= :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
			}
			else{
				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			
			$stmt ->close();
			$stmt=null;
		}

		static public function mdlMo($tabla,$item,$valor){
			$stmt = conexion::conectar()->prepare("SELECT alumnos.id_alumno,alumnos.nombre, alumnos.aPaterno, alumnos.aMaterno, alumnos.estado, alumnos.calificado, alumnos.codigo,alumnos.signos,alumnos.vendajes,alumnos.exploracion,alumnos.movi,alumnos.adultos,alumnos.nino,alumnos.bebe,alumnos.desob,alumnos.teorico,usuarios.nombre as nombre_Instructor,usuarios.aPaterno as paternoI,usuarios.aMaterno as maternoI,usuarios.usuario, usuarios.jurisdiccion, cursos.curso, cursos.conclusion FROM `alumnos` 
			INNER JOIN usuarios ON usuarios.id = alumnos.instructor 
			INNER JOIN cursos on cursos.id=alumnos.codigo
			WHERE calificado=1;");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt ->close();
			$stmt=null;  }
			
		//J1
		static public function mdlMostrar1($tabla,$item,$valor){
			
			$stmt = conexion::conectar()->prepare("SELECT alumnos.id_alumno,alumnos.nombre, alumnos.aPaterno, alumnos.aMaterno, alumnos.estado, alumnos.calificado, alumnos.codigo,alumnos.signos,alumnos.vendajes,alumnos.exploracion,alumnos.movi,alumnos.adultos,alumnos.nino,alumnos.bebe,alumnos.desob,alumnos.teorico,usuarios.nombre as nombre_Instructor,usuarios.aPaterno as paternoI,usuarios.aMaterno as maternoI,usuarios.usuario, usuarios.jurisdiccion, cursos.curso, cursos.conclusion FROM `alumnos` 
			INNER JOIN usuarios ON usuarios.id = alumnos.instructor 
			INNER JOIN cursos on cursos.id=alumnos.codigo
			WHERE usuarios.jurisdiccion='J1' && calificado=1;");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt ->close();
			$stmt=null;  
		}
			//J2
		static public function mdlMostrar2($tabla,$item,$valor){
			
			$stmt = conexion::conectar()->prepare("SELECT alumnos.id_alumno,alumnos.nombre, alumnos.aPaterno, alumnos.aMaterno, alumnos.estado, alumnos.calificado, alumnos.codigo,alumnos.signos,alumnos.vendajes,alumnos.exploracion,alumnos.movi,alumnos.adultos,alumnos.nino,alumnos.bebe,alumnos.desob,alumnos.teorico,usuarios.nombre as nombre_Instructor,usuarios.aPaterno as paternoI,usuarios.aMaterno as maternoI,usuarios.usuario, usuarios.jurisdiccion, cursos.curso, cursos.conclusion FROM `alumnos` 
			INNER JOIN usuarios ON usuarios.id = alumnos.instructor 
			INNER JOIN cursos on cursos.id=alumnos.codigo
			WHERE usuarios.jurisdiccion='J2' && calificado=1;");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt ->close();
			$stmt=null;  
		}

		//J3
		static public function mdlMostrar3($tabla,$item,$valor){
			
			$stmt = conexion::conectar()->prepare("SELECT alumnos.id_alumno,alumnos.nombre, alumnos.aPaterno, alumnos.aMaterno, alumnos.estado, alumnos.calificado, alumnos.codigo,alumnos.signos,alumnos.vendajes,alumnos.exploracion,alumnos.movi,alumnos.adultos,alumnos.nino,alumnos.bebe,alumnos.desob,alumnos.teorico,usuarios.nombre as nombre_Instructor,usuarios.aPaterno as paternoI,usuarios.aMaterno as maternoI,usuarios.usuario, usuarios.jurisdiccion, cursos.curso, cursos.conclusion FROM `alumnos` 
			INNER JOIN usuarios ON usuarios.id = alumnos.instructor 
			INNER JOIN cursos on cursos.id=alumnos.codigo
			WHERE usuarios.jurisdiccion='J3' && calificado=1;");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt ->close();
			$stmt=null;  
		}

		//J4
		static public function mdlMostrar4($tabla,$item,$valor){
			
			$stmt = conexion::conectar()->prepare("SELECT alumnos.id_alumno,alumnos.nombre, alumnos.aPaterno, alumnos.aMaterno, alumnos.estado, alumnos.calificado, alumnos.codigo,alumnos.signos,alumnos.vendajes,alumnos.exploracion,alumnos.movi,alumnos.adultos,alumnos.nino,alumnos.bebe,alumnos.desob,alumnos.teorico,usuarios.nombre as nombre_Instructor,usuarios.aPaterno as paternoI,usuarios.aMaterno as maternoI,usuarios.usuario, usuarios.jurisdiccion, cursos.curso, cursos.conclusion FROM `alumnos` 
			INNER JOIN usuarios ON usuarios.id = alumnos.instructor 
			INNER JOIN cursos on cursos.id=alumnos.codigo
			WHERE usuarios.jurisdiccion='J4' && calificado=1;");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt ->close();
			$stmt=null;  
		}

		
		
	}