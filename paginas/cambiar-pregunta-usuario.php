<?php 						
session_start();
error_reporting(0);

$pregactual = $_POST["pass-actual"];
$pregnueva1 = $_POST["pass-nueva-1"];
$pregnueva2 = $_POST["pass-nueva-2"];
$idusuario = $_SESSION["idusr"];
$email = $_SESSION["mail"];

$con="CALL conusr('$email')";
require("mysql.php");
$f=mysqli_fetch_array($consulta);
$pregBD=$f['pelicula'];

echo $iguales = password_verify($pregactual,$pregBD);

if($iguales == true){

	if($pregnueva1 == $pregnueva2) {
		
		$pregNueva = password_hash($pregnueva1, PASSWORD_BCRYPT);

		$con="UPDATE `mensajes`.`usuario` SET `pelicula`='$pregNueva' WHERE `idusuario`= $idusuario;"; 
		require ("mysql.php");
	
		if($consulta!='0'){
			echo "<script language='JavaScript'>";
			echo "alert('Respuesta actualizada');";
			echo "document.location =('home.php');";
			echo "</script>";
		} else {
			exit();
			echo "<script language='JavaScript'>";
			echo "alert('No se pudo actualizar la Respuesta');";
			echo "document.location =('home.php');";
			echo "</script>";
		}

	} else {
		echo "<script language='JavaScript'>";
		echo "alert('La respuestas no son iguales');";
		echo "document.location =('home.php');";
		echo "</script>";
	}

} else{
	echo "prueba";
	echo "<script language='JavaScript'>";
	echo "alert('La contraseña actual no es misma');";
	echo "document.location =('home.php');";
	echo "</script>";
}