<?php
session_start();
error_reporting(0);

$idseg=$_SESSION['idusr'];
$iddor=$_POST['receptor'];

$con="CALL Seguimiento('$iddor','$idseg')"; 
require ("mysql.php");
if(!$consulta){
				echo "<script language='JavaScript'>";
				echo "alert('Todavia sigues a este usuario!');";
            	echo 'document.location =("perfil.php?p='.$iddor.'");';
            	echo "</script>";				
}				
				else{			
								if ($consulta!='0') {
														echo "<script language='JavaScript'>";
														echo "alert('Ya estas siguiendo a este usuario!');";
            											echo 'document.location =("perfil.php?p='.$iddor.'");';
            											echo "</script>";
													}				
													else{
															echo "No se ha podido efectuar el seguimiento";
															echo "<script language='JavaScript'>";
															echo "alert('No ha podido comenzar a seguir a la persona que desea. Intente de nuevo mas tarde.');";
            												echo "document.location =('perfil.php?p=".$iddor."');";
            												echo "</script>";
            											}
					}

mysqli_close($conexion); 

?>