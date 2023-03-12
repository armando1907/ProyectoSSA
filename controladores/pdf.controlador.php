<?php
	class ControladorPrueba{

		//Función para subir PDF
		static public function ctrPDF()
		{
			$ruta="";
			if(isset($_FILES['pdf']['tmp_name']))
			{
				//Crear directorio para guardar foto de perfil
				$directorio = "vistas/pdf/".$_SESSION['usuario'];
				$file = basename($_FILES['pdf']['name']);


				//VALIDA AL CREAR EL DIRECTORIO, SI YA FUE CREADO, DESPLIEGA UN MENSAJE EN EL HTML QUE YA EXISTE DICHO DIRECTORIO
				if(!is_dir($directorio)){

					@mkdir($directorio, 0755); 
				   }else{ 

					//echo "Ya existe ese directorio\n";

				   }

				//mkdir($directorio,0755); -------------->

				if($_FILES['pdf']['type']=="application/pdf")
				{

					if($_FILES['pdf']['size'] > 1000000)
					{
					
						echo '<script language="javascript">alert("No es posible subir archivos mayores a 1 MB");</script>'; 
						$respuesta = "error";
					}
					else
					{
						$ruta = $directorio."/".$file."";
						$subir = move_uploaded_file($_FILES['pdf']['tmp_name'],"$directorio/$file");
						$respuesta  = "yes";
						
					}

					// $aleatorio = mt_rand(100,999);
					// //$ruta = $directorio."/".$aleatorio.".pdf";

					// $ruta = $directorio."/".$file."";
					// $subir = move_uploaded_file($_FILES['pdf']['tmp_name'],"$directorio/$file");
				}

				
				
				$tabla = "pdf";
				$datos = array("ruta"=>$ruta,
											"usuario"=>$_SESSION['id'],
											"nomArc"=>$file,
											"correo"=>$_SESSION['usuario'],
											"nomIns"=> $_SESSION['nombre'],
											"apIns"=>$_SESSION['aPaterno'],
											"juris"=>$_SESSION['jurisdiccion'] );

											

				if($respuesta == "yes")
				{
					$respuesta  = ModeloPrueba::mdlPDF($tabla, $datos);
				}
				else
				{
					$respueta = "no";
				}
				
				
				if($respuesta=="ok")
				{
					echo"<script>
							Swal.fire({ 
								title: '¡Éxito!',
								text: 'Registro exitoso',
								icon: 'success',
								confirmButtonText:'Entendido'
								}).then((result)=>{
									if(result.value){
										window.location = 'pdf';
									}
								});
						</script>";
					
				}
				else
				{
					echo"<script>
							Swal.fire({ 
								title: '¡Error!',
								text: 'Algo salió mal',
								icon: 'error',
								confirmButtonText:'Entendido'
								});
						</script>";
				}
			}
		}



		static public function ctrMostrarPdf($item,$valor){
			$tabla="pdf";
			$respuesta = ModeloPrueba::mdlMostrarPdf($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrMostrarPdfAjax($item,$valor){
			$tabla="pdf";
			$respuesta = ModeloPrueba::mdlMostrarPdfAd($tabla,$item,$valor);
			return $respuesta;
		}


	
		//	Función para borrar fila

		static public function ctrBorrar()
		{
			if(isset($_GET['idPrueba'])){
				$tabla = "cursos_nombres";
				$datos = $_GET['idPrueba'];

					$respuesta = ModeloPrueba::mdlBorrar($tabla,$datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: '¡Éxito!',
								text: 'Fila eliminada',
								icon: 'success',
								confirmButtonText:'Entendido'
								}).then((result)=>{
									if(result.value){
										window.location = 'prueba';
									}
								})
						</script>";
					}
			}
		}

		//Esta función es para desplegar los datos de una tabla de la base de datos dentro de una DataTable
		static public function ctrMostrar($item,$valor){
			$tabla="cursos_nombres";
			$respuesta = ModeloPrueba::mdlMostrar($tabla,$item,$valor);
			return $respuesta;
		}

		//Esta función es para desplegar los datos de una tabla de la base de datos en un modal de edición o visualización
		static public function ctrMostrarAjax($item,$valor){
			$tabla="cursos_nombres";
			$respuesta = ModeloPrueba::mdlMostrarAjax($tabla,$item,$valor);
			return $respuesta;
		}
	
	}