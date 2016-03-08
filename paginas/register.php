<?php
header('Content-Type:text/html; charset=UTF-8');
session_start();
error_reporting(0);

$errores = array();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$mail=$_POST['mail'];
$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];

if (!empty($_POST))
  {
    if(isset($nombre) && isset($apellido))
	   {
	     if(empty($nombre)){
		     $errores[] = "Debe escribir un nombre";
			 
			 }
			 else{
			     if(!preg_match('/^[a-zA-Z]+$/', $nombre){
				      $errores[] = "El nombre solo puede contener letras"
				      }
			     }
				 
		 if	(empty($apellido)){
		      $errores[] = "Debe escribir un apellido"
		      }
             else{
			      if(!preg_match('/^[a-zA-Z]+$/', $nombre){
				      $errores[] = "El nombre solo puede contener letras"
				      }
				  }			  
		  }
		  if (isset($mail) && isset ($p1)) {
		        if(empty($mail)){
		              $errores[] = "Debe escribir un mail";
		                  else{		 
		              if(!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $mail){
			             $errores[] = "Debe escribir un mail correcto";
				   
			               }
		               }
		           }
				   
				if (empty($p1)){
				    $errores[] = "Debe escribir una contraseña";
				       else{
					       if(strlen($p1) < 10){
						       $errores[] = "La contraseña debe tener mas de 10 caracteres"
						       }
					       }
					
					}   
				if($p1 != $p2){
				   $errores [] = "La contraseñas deben ser iguales"
				   }	
					
		     }
		  
   }




$pelicula = $_POST['pelicula'];
$passhash = password_hash($p1, PASSWORD_BCRYPT);
$pelicula_hash = password_hash($pelicula, PASSWORD_BCRYPT);
$con="CALL usuario_alta('$nombre','$apellido','$mail','$passhash','$pelicula_hash')";
require ("mysql.php");
if($consulta!='0'){
					echo "<script language='JavaScript'>";
					echo "alert('Usuario registrado. Pendiente de alta.');";
            		echo "document.location =('../index.php');";
            		echo "</script>";
}				else{
					echo "error en el envio";
					echo "<script language='JavaScript'>";
					echo "alert('El usuario no se pudo registrar. Intente de nuevo mas tarde');";
            		echo "document.location =('../index.php');";
            		echo "</script>";
}

?>