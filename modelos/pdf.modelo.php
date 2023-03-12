<?php
	require_once "conexion.php";
	class ModeloPrueba{

		static public function mdlPDF($tabla, $datos)
		{
			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre,usuario,nomArc,correo,nomIns,apIns,juris) VALUES(:nombre,:usuario,:nomArc,:correo,:nomIns,:apIns,:juris)");

			$stmt -> bindParam(":nombre",$datos['ruta'],PDO::PARAM_STR);
			$stmt -> bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
			$stmt -> bindParam(":nomArc",$datos['nomArc'],PDO::PARAM_STR);

			$stmt -> bindParam(":correo",$datos['correo'],PDO::PARAM_STR);
			$stmt -> bindParam(":nomIns",$datos['nomIns'],PDO::PARAM_STR);
			$stmt -> bindParam(":apIns",$datos['apIns'],PDO::PARAM_STR);
			$stmt -> bindParam(":juris",$datos['juris'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlMostrarPdf($tabla,$item,$valor){

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

		static public function mdlMostrarPdfAd($tabla,$item,$valor){

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



		static public function mdlBorrar($tabla,$datos)
		{
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

		//Esta función es para desplegar los datos de una tabla de la base de datos dentro de una DataTable
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

		//Esta función es para desplegar los datos de una tabla de la base de datos en un modal de edición o visualización
		static public function mdlMostrarAjax($tabla,$item,$valor)
		{
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