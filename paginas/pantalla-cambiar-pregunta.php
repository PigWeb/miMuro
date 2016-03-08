<?php    
session_start();
error_reporting(0);
if ($_SESSION['primeraVez']==1) {
	$_SESSION['primeraVez']=0;
}else require("inactividad.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilo2.css"/>
	<script type="text/javascript" src="../js/codigo.js"/></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--compatibilidad de idiomas-->
	<title>	Login</title>
	<style type="text/css">
		#preguntaSeguridad {
	    width: 350px;
	    height: 350px;
	    margin-top: 50px;
	    padding-left: 40px;
	    border-radius: 10px;
	    border: solid;
	    border-width: 2px;
	    border-color: #edeeee;
	    margin-left: auto;
	    margin-right: auto;
	    background-color: #fff;
	}
	</style>
</head>
<body>
	<div class="header">
						<?php if 		($_SESSION==null){
						?>
									<div><a href="../index.php" class="mimuro">MiMuro</a></div>
						<?php
							}		else{ 
						?>
									<div><a href="home.php" class="mimuro">MiMuro</a></div>
						<?php
							}
						?>
		</div>
	<div id="contenedor">
		<div id="preguntaSeguridad">
			<h1>Cambiar respuesta a la pregunta secreta (Cual es tu pelicula favorita?)</h1>
			<form method="post" action="cambiar-pregunta-usuario.php" id="" name="" >
			<div id="ingreso">Ingrese su actual respuesta</div>
			<div id="entrada"><input type="text" name="pass-actual" id="pass-actual" placeholder="" style="width:300px; height:30px; border-radius:3px;"></div>
			<div id="ingreso">Ingrese su nueva respuesta</div>
		  	<div id="entrada"><input type="text" name="pass-nueva-1" id="pass-nueva-1" placeholder="" style="width:300px; height:30px; border-radius:3px" autocomplete="off"></div>
		  	<div id="ingreso">Confirme su respuesta</div>
		  	<div id="entrada"><input type="text" name="pass-nueva-2" id="pass-nueva-2" placeholder="" style="width:300px; height:30px; border-radius:3px" autocomplete="off"></div>
		  	<br>
		 	<div><input type="submit" id="aceptar" name="aceptar" value="Responder" ></div>
			</form>
		</div>
	</div>		
	</body>
</html>