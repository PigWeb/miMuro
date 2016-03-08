<?php

session_start();
error_reporting(0);

if ($_SESSION!=NULL) {
	
	$idemi=$_SESSION['idusr'];

}else $idemi='13';

$idreceptor=$_POST['receptor'];
$mensaje=$_POST['mensaje'];

if ($mensaje==NULL) {
						$mensaje="mensaje vacio";
}else  $mensaje;

$con="CALL enviarmensajesprivados('$mensaje','$idemi','$idreceptor')";

require ("mysql.php");

if($consulta!='0'){
	echo "<script language='JavaScript'>";
	echo "alert('Mensaje Enviado!');";
	echo "document.location =('mensajes-privados.php');";
	echo "</script>";
	}
else{			
	echo "error en el envio";
	echo "<script language='JavaScript'>";
	echo "alert('El mensaje no pudo ser enviado. Intenta de nuevo mas tarde.');";
	echo "document.location =('mensajes-privados.php');";
	echo "</script>";
	}
	


mysqli_close($conexion); 
?>