<?php
header('Content-Type: text/html;charset=UTF-8');
session_start();
if(isset($_POST['aceptar'])){
	if($_SESSION['CAPTCHA'] != $_POST['introducir']){
		echo "<script language='javascript'>";
		echo "document.location=('../index.php');";
		echo "</script>";
	}
		echo "<script language='javascript'>";
		echo "document.location=('home.php');";
		echo "</script>";
	
}
else{
    echo "Error";
   }
?>