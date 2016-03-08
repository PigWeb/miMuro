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


if ($_SESSION['primeraVez']==1) {
	$_SESSION['primeraVez']=0;
}else require("inactividad.php");

$con="CALL selallusr";	
		include "mysql.php";
		while ($f=mysqli_fetch_array($consulta)) {
				$id=$f['idusuario'];
				$Nombre=$f['nombre'];
				$Apellido=$f['apellido'];
				$Mail=$f['mail'];
				$Descripcion=$f['descripcion'];
				$Password=$f['password'];
				$arreglo[]=array('Idusuario'=>$id,
							'Nombre'=>$Nombre,
							'Apellido'=>$Apellido,
							'Mail'=>$Mail,
							'Descripcion'=>$Descripcion,
							'Password'=>$Password);}

$con="CALL selalta";	
		include "mysql.php";
		while ($f=mysqli_fetch_array($consulta)) {
				$ida=$f['idusuario'];
				$Nombrea=$f['nombre'];
				$Apellidoa=$f['apellido'];
				$Maila=$f['mail'];
				$Descripciona=$f['descripcion'];
				$Passworda=$f['password'];
				$arreglo2[]=array('Idusuario'=>$ida,
							'Nombre'=>$Nombrea,
							'Apellido'=>$Apellidoa,
							'Mail'=>$Maila,
							'Descripcion'=>$Descripciona,
							'Password'=>$Passworda);}

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
					<?php
					$activo=$_SESSION['activo'];
					?>

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
					<div id="homeadmin">
						
					
						<div id="mensajestitulo">ABM usuarios</div>
						<?php 
							echo "</br>";
							$tabla='<table border="1">
								  <tr>
								  <th>Id</th>
								  <th>Nombre</th>
								  <th>Apellido</th>
								  <th>Mail</th>
								  <th>Descripcion</th>
								  <th>Pass</th>
								  <th>Accion</th>
								  </tr>';
							echo $tabla;
						for($i=0;$i<count($arreglo);$i++){
							$tabla2='<tr>
								  <td>'.$arreglo[$i]['Idusuario'].'</td>
								  <td>'.$arreglo[$i]['Nombre'].'</td>
								  <td>'.$arreglo[$i]['Apellido'].'</td>
								  <td>'.$arreglo[$i]['Mail'].'</td>
								  <td>'.$arreglo[$i]['Descripcion'].'</td>
								  <td>'.$arreglo[$i]['Password'].'</td>
								  <td><a href="eliminar-usr.php?id='.$arreglo[$i]['Idusuario'].'">
				    					<img src="../img/delete.png" width="20px" height="20px"/></a>
				    				  <a href="edit-usr.php?id='.$arreglo[$i]['Idusuario'].'">
				    				   <img src="../img/edit.png" width="20px" height="20px"/></a></td>
				    			  </tr>';
							echo $tabla2;
								} 
							echo '</table>';
						?>
						

						
						<div id="mensajestitulo">Usuarios para el alta</div>
						<?php 
							echo "</br>";
							$tabla3='<table border="1">
								  <tr>
								  <th>Id</th>
								  <th>Nombre</th>
								  <th>Apellido</th>
								  <th>Mail</th>
								  <th>Descripcion</th>
								  <th>Pass</th>
								  <th>Accion</th>
								  </tr>';
							echo $tabla3;
						for($i=0;$i<count($arreglo2);$i++){
							$tabla4='<tr>
								  <td>'.$arreglo2[$i]['Idusuario'].'</td>
								  <td>'.$arreglo2[$i]['Nombre'].'</td>
								  <td>'.$arreglo2[$i]['Apellido'].'</td>
								  <td>'.$arreglo2[$i]['Mail'].'</td>
								  <td>'.$arreglo2[$i]['Descripcion'].'</td>
								  <td>'.$arreglo2[$i]['Password'].'</td>
								  <td><a href="alta.php?id='.$arreglo2[$i]['Idusuario'].'">
				    					<img src="../img/tilde.png" width="20px" height="20px"/></a></td>
				    			  </tr>';
							echo $tabla4;
								} 
							echo '</table>';
						?>					

  						<div id="mensajestitulo">Limite de mensajes privados</div>	
  							<form method="post" action="update-limite-msjs-privados.php" style="text-align:center;font-family:Corbel">
  								<span>Cantidad limite de mensajes privados: </span>
  								<input type="text" name="limiteMsjsPrivados" id="limiteMsjsPrivados" size="3">
  								<input type="submit" value="Actualizar">
  							</form>
						

						<div id="defineMaxMensaje">Maximo de mensajes para seleccionar (mayor a 30)</div>
							 <form method="post" action="actualizarCantidadMsj.php" style="text-align:center;font-family:Corbel">
	  							<label >Definir maximo: </label> <input type="text"  id="opcionUno" name="opcionUno" size="3">
								<input type="submit" value="Actualizar"><br/>

	  						</form>
	  					</div>
				
  		</div>
  		  		<div class="footer">
	  		<div class="pie">
	  		Universidad Nacional de la Matanza - Seguridad y Calidad de Aplicaciones Web <br>
	  		 Grupo 8 - 2015

	  		</div>

</body>
   			

</body>
</html>
<?php
}
?>