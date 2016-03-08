<?php  
//iniciamos la sesión
session_start();
error_reporting (0);
//antes de hacer los cálculos, compruebo que el usuario está logueado  
if ($_SESSION['activo'] != 1) {    
                                echo "<script language='JavaScript'>";
                                echo "alert('Recuerde que puede registrarse para un mejor uso de la pagina');";
                                echo "</script>";}
else{
      $fechaGuardada = $_SESSION["ultimoAcceso"];  
      $ahora = time();  
      if ($fechaGuardada!=0) {
                $tiempo_transcurrido= $ahora-$fechaGuardada;  
      } else $tiempo_transcurrido=0;
      if($tiempo_transcurrido >= 300) {  
     //si pasaron 10 minutos o más  
      session_destroy(); // destruyo la sesión  
      echo "<script language='JavaScript'>";
      echo "alert('Sesion finalizada debido a inactividad. Vuelva a iniciar sesion');";
      echo 'document.location=("../index.php");';
      echo "</script>";//envío al usuario a la pag. de autenticación  
      //sino, actualizo la fecha de la sesión  
      }else {  
      $_SESSION["ultimoAcceso"] = $ahora;  
            }  
    }  
    ?>


