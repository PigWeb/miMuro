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
	<script type="text/javascript" src="js/codigo.js"/></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--compatibilidad de idiomas-->
	<title>Home</title>
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
		<div id="container">

					<ul class="dropdown"><!--Menu horizontal-->
						<li><a href="home.php" class="dir">Home</a></li>
						<li><a href="perfil.php" class="dir">Mi Perfil</a></li>
						<li><a href="mensajes-privados.php" class="dir">Inbox</a></li>
						<li><a href="conf.php" class="dir">Configuraci&oacute;n</a></li>
						<?php
              			if($_SESSION['admin']==1){
          				?>
              			<li><a href="admin.php" class="dir">Admin</a></li>
          				<?php   }
					    ?>
					</ul>

					<div class="bienvenidos">
						Hola <?php 
									if ($_SESSION!=NULL) {
									$idusr=$_SESSION['idusr'];
									$nombresesion=$_SESSION['nom'];
									echo " ";
									echo "<a href='perfil.php?id='.$idusr.''>$nombresesion</a>";	
									}

							?>!
					</div>


					<div id="home">
						<div id="search"> <!--buscador-->
						<form method="post" action="resultados.php" name="busqueda">
						<div id="busqueda"><input type="text" placeholder="Buscar por Nombre o Mail" name="search" 
								  style="border-radius:4px; width:300px; height:50px;font-size: 23px" id="busqueda" /></div>
							<div id="lupa"> <input type="image" src="../img/icono_buscar.png" style="width:70px; height:70px;" /></div>
						</form>
						</div>

						<div class="lineavertical2"></div>

						<div id="resultados">
						<div id="mensajestitulo">Resultados</div>
						<?php
						$d=$_POST['search'];
												
            
						$con="CALL search1('%$d%')"; //llama stored procedure
						require ("mysql.php"); //llama al archivo php
						echo "<div class='aviso'>Resultados por Nombre</br></br>";
						while($resultados=mysqli_fetch_array($consulta)){ 
						 //devuelve resultados en forma de array 
   						echo '<a href="perfil.php?p='.base64_encode($resultados['idusuario']).'">Ir al Perfil de:</a>'; //link dinamico que vuelve a la pagina del disco
   						echo ' '.$resultados['nombre'].' ';
   						echo $resultados['apellido']." - ";
   						echo $resultados['descripcion']."</br>";
   						}                
   						echo "</br>";
   						mysqli_close($conexion); //cierra conexion mysql

   						$con="CALL search2('%$d%')"; //llama stored procedure
						require ("mysql.php"); //llama al archivo php
						echo "Resultados por Mail</br></br>";
						while($resultados=mysqli_fetch_array($consulta)){ 
						//devuelve resultados en forma de array 
   						echo '<a href="perfil.php?p='.base64_encode($resultados['idusuario']).'">Ir al Perfil de:</a>'; //link dinamico que vuelve a la pagina del disco
   						echo ' '.$resultados['mail'].' - ';
   						echo $resultados['descripcion']."</br>";
   						}
   						mysqli_close($conexion); //cierra conexion mysql
					    ?>
					
						</div>
  					</div>

  		</div>
  		</div>
  		<div class="footer">
	  		<div class="pie">
	  		Universidad Nacional de la Matanza - Seguridad y Calidad de Aplicaciones Web <br>
	  		 Grupo 8 - 2015

	  		</div>
  		</div>
		

</body>
</html>


