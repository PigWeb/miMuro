<!DOCTYPE html>
<?php 						
session_start();
error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilo2.css"/>
<script type="text/javascript" src="../js/codigo.js"/></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--compatibilidad de idiomas-->
<title>	Login</title>
<style type="text/css">
	#preguntaSeguridad {
	width: 350px;
	height: 275px;
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
		<h1>Ingrese su nueva contrase&ntilde;a</h1>
		<form method="post" action="actualizar-contrasenia.php" id="vregistro" name="vregistro" >
			<div id="entrada">
				<input type="password" name="pass1" id="pass1" placeholder="Nueva contrase&ntilde;a" style="width:300px; height:30px; border-radius:3px" autocomplete="off">
			</div>
			</br>
		  	<div id="entrada">
		  		<input type="password" name="pass2" id="pass2" placeholder="Confirme la nueva contrase&ntilde;a" style="width:300px; height:30px; border-radius:3px" autocomplete="off">
		  	</div>
		  	</br>
			<div>
				<input type="submit" id="aceptar" name="aceptar" value="Aceptar" >
			</div>
		</form>
	</div>
</div>		
</body>
</html>