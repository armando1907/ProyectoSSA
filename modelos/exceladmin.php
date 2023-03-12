<?php 
require_once 'conexion.php';

	$nombre ='Reporte'.'_'.date('d-m-Y').'.xls';
	

            
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel;charset=iso-8859-15"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:attachment; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");


	echo utf8_decode("<table border='0'> 
						<tr > 
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>CÓDIGO DEL CURSO</td> 
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>SEDE DEL CURSO</td> 
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>SECTOR</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>FECHA DEL CURSO</td>
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>MUNICIPIO</td>
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;'>JURISDICCION</td>
                        <td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>ID DEL ALUMNO</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>NOMBRE COMPLETO DEL PARTICIPANTE</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>EDAD</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>GÉNERO</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>TELÉFONO</td>
						<td style='font-weight:bold; border:1px solid #eee;background: #3b81ff;color:white;padding:10px;'>CORREO</td>
						
						
						</tr>");

                
				$reporte=conexion::consultas('alumnos','cursos','usuarios'); 


				function calculaedad($fecha_nacimiento){
					$nacimiento = new DateTime($fecha_nacimiento);
					$ahora = new DateTime(date("Y-m-d"));
					$diferencia = $ahora->diff($nacimiento);
					return $diferencia->format("%y");
				  }

				foreach ($reporte as $value) 
				{
						
							echo utf8_decode("<tr>
							<td style='border:1px solid #eee;'>".$value["codigo"]."</td>	
							<td style='border:1px solid #eee;'>".$value["dependencia"]."</td>
							<td style='border:1px solid #eee;'>".$value["sector"]."</td>
							<td style='border:1px solid #eee;'>".$value["inicio"].' - '.$value["conclusion"]."</td>
							<td style='border:1px solid #eee;'>".$value["municipio"]."</td>
							<td style='border:1px solid #eee;'>".$value["jurisdiccion"]."</td>
							<td style='border:1px solid #eee;'>".$value["id_alumno"]."</td>
							<td style='border:1px solid #eee;'>".strtoupper($value["nombre"]).' '.strtoupper($value["aPaterno"]).' '.strtoupper($value["aMaterno"])."</td>
							<td style='border:1px solid #eee;'>".calculaedad($value["nacimiento"])."</td>
							<td style='border:1px solid #eee;'>".$value["sexo"]."</td>      
							<td style='border:1px solid #eee;'>".$value["tel"]."</td>
							<td style='border:1px solid #eee;'>".$value["correo"]."</td>
							</tr>");
						
						
				}


			echo "</table>";


			 ?>