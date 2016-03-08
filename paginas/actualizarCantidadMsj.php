<?php 						
session_start();
error_reporting(0);

//valida que el texto ingresado sea un valor numerico
if(is_numeric($_POST['opcionUno'])){
	$opcion1= (INT)$_POST['opcionUno'];

	$idMensaje= 1;	
	//valida que el numero ingresado sea mayor a la opcion maxima predefinida en la base de datos

	if($opcion1>30){
		//
		$con= "UPDATE `define_max_mensaje` SET `opcion`= $opcion1 WHERE `id`= $idMensaje";


		require("mysql.php");

			if ($consulta!='0') {
				  echo "<script language='JavaScript'>";
			      echo "alert('Se actuaizo opcion maxima de mensajes .');";
			      echo "document.location =('admin.php');";
				  echo "</script>";
			} else{
				  echo "<script language='JavaScript'>";
			      echo "alert('Ocurrio un error al tratar de cambiar el limite de mensajes . Intente nuevamente mas tarde');";
			      echo "document.location =('admin.php');";
				  echo "</script>";}
	}}
else{	
	  echo "<script language='JavaScript'>";
      echo "alert('Debe ingresar un valor mayor a 30');";
      echo "document.location =('admin.php');";
	  echo "</script>";}
	
?>