<?php 						
session_start();
error_reporting(0);

echo $passActual = $_POST["pass-actual"];
echo $passNueva1 = $_POST["pass-nueva-1"];
echo $passNueva2 = $_POST["pass-nueva-2"];
echo $idusuario = $_SESSION["idusr"];
echo $email = $_SESSION["mail"];

$con="CALL conusr('$email')";
require("mysql.php");
$f=mysqli_fetch_array($consulta);
$passBD=$f['password'];

echo $iguales = password_verify($passActual,$passBD);

if($iguales == true){

	if($passNueva1 == $passNueva2) {
		
		$passNueva = password_hash($passNueva1, PASSWORD_BCRYPT);

		echo $con="UPDATE `mensajes`.`usuario` SET `password`='$passNueva' WHERE `idusuario`= $idusuario;"; 
		require ("mysql.php");
	
		if($consulta!='0'){
			echo "<script language='JavaScript'>";
			echo "alert('Contraseña actualizada');";
			echo "document.location =('home.php');";
			echo "</script>";
		} else {
			exit();
			echo "<script language='JavaScript'>";
			echo "alert('No se pudo actualizar la contraseña');";
			echo "document.location =('home.php');";
			echo "</script>";
		}

	} else {
		echo "<script language='JavaScript'>";
		echo "alert('La contraseñas no son iguales');";
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