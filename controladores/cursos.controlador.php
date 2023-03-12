<?php
	class ControladorCursos{

		static public function ctrCrearCurso(){
			if(isset($_POST['nuevoCurso'])){

				$tabla = "cursos";
				$datos = array("curso"=>$_POST['nuevoCurso'],
								"sector"=>$_POST['sector'],
								"dependencia"=>strtoupper($_POST['dependencia']),
								"inicio"=>$_POST['inicio'],
								"conclusion"=>$_POST['conclusion'],
								"calle"=>strtoupper($_POST['calle']),
								"numExt"=>$_POST['numExt'],
								"numInt"=>$_POST['numInt'],
								"colonia"=>strtoupper($_POST['colonia']),
								"cp"=>$_POST['cp'],
								"municipio"=>$_POST['municipio'],
								"jurisdiccion"=>$_POST['jurisdiccion'],
								"instructor"=>$_POST['instructor'],
								"alumnos"=>$_POST['alumnos']);

				$respuesta  = ModeloCursos::mdlIngresarCurso($tabla, $datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'Registro correcto',
							icon: 'success',
							confirmButtonText:'Entendido'
							}).then((result)=>{
								if(result.value){
									window.location = 'cursos';
								}
							});
						</script>";
				}else{
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

		static public function ctrEditarCurso(){
			if(isset($_POST['editarCurso'])){

				$tabla = "cursos";

				$datos = array("curso"=>$_POST['editarCurso'],
								"sector"=>$_POST['sector'],
								"dependencia"=>$_POST['dependencia'],
								"inicio"=>$_POST['inicio'],
								"conclusion"=>$_POST['conclusion'],
								"calle"=>$_POST['calle'],
								"numExt"=>$_POST['numExt'],
								"numInt"=>$_POST['numInt'],
								"colonia"=>$_POST['colonia'],
								"cp"=>$_POST['cp'],
								"municipio"=>$_POST['municipio'],
								"jurisdiccion"=>$_POST['jurisdiccion'],
								"alumnos"=>$_POST['alumnos'],
								"id"=>$_POST['idCurso'],
								"instructor"=>$_POST['instructor']);

				$respuesta  = ModeloCursos::mdlEditarCurso($tabla, $datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'El curso ha sido editado correctamente',
							icon: 'success',
							confirmButtonText:'Confirmar'
							}).then((result)=>{
								if(result.value){
									window.location = 'cursos';
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

		static public function ctrCrearNombreCurso(){
			if(isset($_POST['nuevoNombreCurso'])){

				$tabla = "cursos_nombres";
				$datos = array("nombre"=>$_POST['nuevoNombreCurso']);

				$respuesta  = ModeloCursos::mdlIngresarNombreCurso($tabla, $datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'Registro correcto',
							icon: 'success',
							confirmButtonText:'Entendido'
							}).then((result)=>{
								if(result.value){
									window.location = 'cursos-catalogo';
								}
							});
					</script>";
				}else{
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

		static public function ctrBorrarCurso(){
			if(isset($_GET['idcurso'])){
				$tabla = "cursos";
				$datos = $_GET['idcurso'];

				$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'El curso ha sido eliminado correctamente',
							icon: 'success',
							confirmButtonText:'Entendido'
							}).then((result)=>{
								if(result.value){
									window.location = 'cursos';
								}
							})
					</script>";
				}
			}
		}

		static public function ctrBorrarNombreCurso(){
			if(isset($_GET['idcurso'])){
				$tabla = "cursos_nombres";
				$datos = $_GET['idcurso'];

				$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);

				if($respuesta=="ok"){
					echo"<script>
						Swal.fire({ 
							title: '¡Éxito!',
							text: 'El curso ha sido eliminado correctamente',
							icon: 'success',
							confirmButtonText:'Entendido'
							}).then((result)=>{
								if(result.value){
									window.location = 'cursos-catalogo';
								}
							})
					</script>";
				}	
			}
		}

		static public function ctrMostrarCursos($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrar($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrMostrarNombreCursos($item,$valor){
			$tabla="cursos_nombres";
			$respuesta = ModeloCursos::mdlMostrar($tabla,$item,$valor);
			return $respuesta;
		}
		
		static public function ctrMostrarInstitucionales($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarInstitucionales($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrMostrarInstitucionalesAdm($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarInstitucionalesAdm($tabla,$item,$valor);
			return $respuesta;
		}
		
		static public function ctrMostrarPrivados($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarPrivados($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrMostrarAC($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarAsCivil($tabla,$item,$valor);
			return $respuesta;
		}
		
	    static public function ctrMostrarAjax($item,$valor){
			$tabla="cursos";
			$respuesta = ModeloCursos::mdlMostrarAjax($tabla,$item,$valor);
			return $respuesta;
		}
	}


	