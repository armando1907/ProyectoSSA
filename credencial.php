<?php session_start();?>
<?php

require_once 'conexion.php';


?>

<!DOCTYPE HTML>
<html lang="es">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <title>Credencial instructor</title>
  
  

    <style type="text/css">
            img {
                max-width: 640px;
                max-height: 480px;
                margin: 1px;
                
                }
            .cat {
                    height: 100px;
                    width: 100px;
                }

            div.container{
                
                text-align:center;
                background:#F5F5F5;
                /* border:1px;        */
                padding-top:1px ;
                margin: 0px;
                /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
                column-count:4;
                
                border: 1px solid black;  width: 50%;

                
                
            }
            .containerh{
                text-align:center;
            }
            .es{
               
 -webkit-transition: all 0.5s ease-out;
 -moz-transition: all 0.5s ease;
 -ms-transition: all 0.5s ease;
            }
            

            hr.linea {
                    border: 0.1px solid black;
                    
                    padding: 0;
                    margin: 2px auto 0 auto;
                    background-color: #998a42;
                    
                }
                hr.linea2{ border: 0.1px solid black;
                    
                    padding: 0;
                    margin: 4px auto 0 auto;
                    background-color: #661429;
                    
                }
                
                )
                body{
                    background:#F4F6F9;
                    margin :0;
                }

                img.imagenini{
                    width: 150px;
                    height: 30px;
                    padding: 0;
                    margin: 1px;
                }

                h4{
                    padding: 0px;
                    font-size: 10px;
                    margin: 2px;
                    
                }

                h5{
                    font-size: 10px;
                    margin: 2px;
                    padding: 0px;
                    
                }
                p{
                    font-size: 10px;
                    margin: 2px;
                    padding: 1px;
                    

                }
                

            .shadow{
                background-color: #f4f5f4; 
                color: inherit;
                }
            .ti{
                
                padding: 0;
                margin: 4px auto 0 auto;
                background-color: #998a42;
                height: 700px;

            }            
                
    </style>
</head>

<body class="fondo">
<div class="container shadow " id="image ">
    <!-- <hr class= "linea" style="width:50%; height:5%;" value="Intructor"> -->
    <h1 class= "ti">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUCTOR&nbsp;&nbsp; &nbsp;&nbsp;  </h1>
    <!-- <img class="imagenini" src="vistas/img/logos.png" alt=""> -->
    
    <br><br><h5>PRIMER RESPONDIENTE </h5>
    <h5><b>EN PRIMEROS AUXILIOS</b></h5><br>
                    
    <?php 

    echo '<img id="im1"src="'.$_SESSION['foto'].'" class="img-thumbnail cat" style="width=15px"><br>';

    echo '<h5>Instructor: '.$_SESSION['nombre'].' '.$_SESSION['aPaterno'].' </h5>'; 

    echo '<h5><b>Código:</b> '.'IPR-'."RSSA-"."".$_SESSION['id'].' </h5>';
    
$hoy=date('d-m-Y');
$exp=date('d-m-Y', strtotime(date('d-m-Y', strtotime($hoy))." + 365 day"));

    
    ?>
             
            <h5>Estado: Activo</h5>
            <?php echo'<h5><b>Fecha de vencimiento: 31/12/2023</b></h5>';?>
            <br>
            <hr class= "linea2" style="width:25%; height:5%;">   
            <!--Encaso de querer cambiar el diseño de credecial parte trasera descomentar el sigiente codigo-->
            <!-- <hr class= "linea" style="width:50%; height:5%;">
            
            <p>Instituto De Servicios De Salud Publica</p>
            <p class="es">Del Estado De Baja California</p>
            <br>
            <br>
            <br>
            <img class="imgcorazon" src="vistas/img/logoc.png" style="width: 50%;">
            <br>
            <br>
            <br>
            <br> 
                         
            <p class="es">Jefe de la jurisdiccion de salud</p>
            <hr class= "linea2" style="width:50%; height:5%;">  -->
            <!-- lo siguiente es una imagen de la parte trasera de la credencial. encaso de cambio eliminar la siguiente linea y descomentar la parte de arriba -->
            <img class="es" src="vistas/img/Imagen1.png" style="width:68.97mm; height:89.10mm;">

 </div>


       

         

                


</body>

</html>