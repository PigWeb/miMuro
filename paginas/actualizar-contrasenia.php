<?php             
session_start();
error_reporting(0);

$idusuario=$_SESSION['idusuario'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];

if ($pass1==$pass2) {

	$pass = password_hash($pass1, PASSWORD_BCRYPT);

	$con="UPDATE `mensajes`.`usuario` SET `password`='".$pass."' WHERE `idusuario`=".$idusuario.";";
	
	require ("mysql.php");

	if($consulta!='0'){
		echo "<script language='JavaScript'>";
		echo "alert('Contraseña actualizada');";
		echo "document.location =('../index.php');";
		echo "</script>";
	} else{
		echo "<script language='JavaScript'>";
		echo "alert('El usuario no pudo ser actualizado');";
		echo "document.location =('../index.php');";
		echo "</script>";
	}

} else  echo "<script language='JavaScript'>";
		echo "alert('Los passwords no coinciden');";
        echo "document.location =('pantalla-ingresar-nueva-contrasenia.php');";
        echo "</script>";

mysqli_close($conexion); 
?>