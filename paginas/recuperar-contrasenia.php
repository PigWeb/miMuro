<?php
header('Content-Type: text/html;charset=UTF-8');
session_start();
error_reporting(0);

$email = $_POST["mail"];
$pelicula = $_POST["pelicula"];

$con="CALL conusr('$email')";
require("mysql.php");

$f=mysqli_fetch_array($consulta);

$pelicula_usuario = $f['pelicula'];
$_SESSION['idusuario'] = $f['idusuario'];

if($f!=NULL && $pelicula_usuario != '') {

	$iguales = password_verify($pelicula, $pelicula_usuario);

	if ($iguales == true) {

		echo "<script language='JavaScript'>";
		echo "alert('Respuesta correcta');";
		echo "document.location =('pantalla-ingresar-nueva-contrasenia.php');";
		echo "</script>";
	} else {
		echo "nosoniguales";
	}	

} else{
	echo "error en el envio";
	echo "<script language='JavaScript'>";
	echo "alert('Respuesta incorrecta');";
	echo "document.location =('../index.php');";
	echo "</script>";
}


?>