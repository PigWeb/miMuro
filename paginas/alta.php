<?php
    error_reporting(0);
    session_start();
	if($_SESSION['admin']!=1)
	{
		echo "<script language='javascript'>";
		echo "document.location=('home.php');";
		echo "</script>";
	}
	else
	{

$id=$_GET['id'];
$con="CALL alta('$id')";
require ("mysql.php");

if ($consulta!='0') {
	echo "<script language='JavaScript'>";
	echo "alert('Usuario dado de alta');";
    echo "document.location =('admin.php');";
    echo "</script>";
}
		else{
					echo "<script language='JavaScript'>";
					echo "alert('El usuario no pudo ser dado de alta');";
            		echo "document.location =('admin.php');";
            		echo "</script>";
}

mysqli_close($conexion); 
}
?>