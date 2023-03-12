<?php
	class ControladorAlumnos{
	
		static public function ctrCrearAlumno(){
			if(isset($_POST['nuevoAlumno'])){

				$tabla = "alumnos"; 
				$datos = array("nombre"=>$_POST['nuevoAlumno'],
								"aPaterno"=>$_POST['aPaterno'],
								"aMaterno"=>$_POST['aMaterno'],
								"sexo"=>$_POST['sexo'],
								"nacimiento"=>$_POST['nacimiento'],
								"trabajo"=>$_POST['trabajo'],
								"tel"=>$_POST['tel'],
								"correo"=>$_POST['correo'],
								"estado"=>$_POST['estado'],
								"instructor"=>$_POST['instructor'],
								"codigo"=>$_POST['codigo']);

				$respuesta  = ModeloAlumnos::mdlIngresarAlumno($tabla, $datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'Registro correcto',
							icon: 'success',
							confirmButtonText:'Entendido'
							}).then((result)=>{
								if(result.value){
									window.location = 'alumnos';
								}
							});
					</script>";
				}
				else{
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
		
		static public function ctrActualizarAlumno(){
			if(isset($_POST['nombre_A'])){

				$tabla = "alumnos";

				$datos = array("nombre"=>$_POST['nombre_A'],
								"id_alumno"=>$_POST['id_alumno_A'],
								"aPaterno"=>$_POST['aPaterno_A'],
								"aMaterno"=>$_POST['aMaterno_A'],
								"sexo"=>$_POST['sexo_A'],
								"nacimiento"=>$_POST['nacimiento_A'],
								"trabajo"=>$_POST['trabajo_A'],
								//"escolaridad"=>$_POST['escolaridad_A'],
								"tel"=>$_POST['tel_A'],
								"correo"=>$_POST['correo_A'],
								"estado"=>$_POST['estado_A']);
								

				$respuesta  = ModeloAlumnos::mdlActualizarAlumno($tabla, $datos);

				if($respuesta=="ok"){ 
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'Proceso realizado correctamente',
							icon: 'success',
							confirmButtonText:'Confirmar'
							}).then((result)=>{
								if(result.value){
									window.location = 'alumnos';
								}
							})
					</script>";
				}
				else
				{
					echo"<script>
							Swal.fire({ 
								title: '¡Error!',
								text: 'Algo salió mal',
								icon: 'error',
								confirmButtonText:'Confirmar'
								})
						</script>";
				}
			}
		}
		static public function ctrEditarAlumno(){
			if(isset($_POST['calificado'])){

				$tabla = "alumnos";

				$datos = array("calificado"=>$_POST['calificado'],
								"vendajes"=>$_POST['vendajes'],
								"exploracion"=>$_POST['exploracion'],
								"signos"=>$_POST['signos'],
								"movi"=>$_POST['movi'],
								"adultos"=>$_POST['adultos'],
								"nino"=>$_POST['nino'],
								"bebe"=>$_POST['bebe'],
								"desob"=>$_POST['desob'],
								"id_alumno"=>$_POST['id_alumno'],
								"teorico"=>$_POST['teorico']);

				$respuesta  = ModeloAlumnos::mdlEditarAlumno($tabla, $datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'Proceso realizado correctamente',
							icon: 'success',
							confirmButtonText:'Confirmar'
							}).then((result)=>{
								if(result.value){
									window.location = 'alumnos';
								}
							})
					</script>";
				}
				else{
					echo"<script>
							Swal.fire({ 
								title: '¡Error!',
								text: 'Algo salió mal',
								icon: 'error',
								confirmButtonText:'Confirmar'
								})
						</script>";
				}
			}
		}

		static public function ctrBorrarAlumno(){
			if(isset($_GET['idalumno'])){
				$tabla = "alumnos";
				$datos = $_GET['idalumno'];

					$respuesta = ModeloAlumnos::mdlBorrarAlumno($tabla,$datos);
					if($respuesta=="ok"){
						echo"<script>
							Swal.fire({ 
								title: '¡Éxito!',
								text: 'El alumno ha sido eliminado correctamente',
								icon: 'success',
								confirmButtonText:'Entendido'
								}).then((result)=>{
									if(result.value){
										window.location = 'alumnos';
									}
								})
						</script>";
					}
			}
		}

		static public function ctrMostrarAlumnos($item,$valor){
			$tabla="alumnos";
			$respuesta = ModeloAlumnos::mdlMostrar($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrMostrarAjax($item,$valor){
			$tabla="alumnos";
			$respuesta = ModeloAlumnos::mdlMostrarAjax($tabla,$item,$valor);
			return $respuesta;
		}
		
		static public function ctrMostrarEvaluaciones($item,$item1, $valor){
			$tabla="cursos";
			$tabla2="alumnos";
			$respuesta = ModeloAlumnos::mdlMostrarEvaluaciones($tabla,$tabla2,$item, $valor);
			return $respuesta;
		}
		static public function ctrMostraracreditados($item,$item1, $valor){
			$tabla="cursos";
			$tabla2="alumnos";
			$respuesta = ModeloAlumnos::mdlMostraracreditados($tabla,$tabla2,$item, $valor);
			return $respuesta; 
		}

		// static public function ctrMostrarEvaluaciones($item,$item1, $valor){
		// 	$tabla="cursos";
		// 	$tabla2="alumnos";
		// 	$respuesta = ModeloAlumnos::mdlMostrarEvaluaciones($tabla,$tabla2,$item,$item1,$valor);
		// 	return $respuesta;
		// }


	}