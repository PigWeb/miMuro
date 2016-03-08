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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--compatibilidad de idiomas-->
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>	<!--Enlace a Jquery-->
	<script type="text/javascript" src="js/codigo.js"/></script>
		<script type="text/javascript">
		  $(document).ready(function(){ // Script del Navegador
		    $("ul.subnavegador").not('.selected').hide();
		    $("a.desplegable").click(function(e){
		      var desplegable = $(this).parent().find("ul.subnavegador");
		      $('.desplegable').parent().find("ul.subnavegador").not(desplegable).slideUp('slow');
		      desplegable.slideToggle('slow');
		      e.preventDefault();
		    })
		 });
		</script>
	<title>Perfil</title>

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

				<div id="perfilmostrar">
						
					<div class="imagen"><img src="../img/perfildefault.png" width="120px" height="120px" alt=""/></a></div>
					<div id="infoperfil"><p></p></div>

					<div><input type="submit" id="botonperfilguardar" name="botonperfil" value="Guardar Cambios"></div>

				</div>

				<div class="lineavertical"></div>

				<div id="mensajes">
					<div id="mensajestitulo">Opciones</div>
					<?php if($_SESSION['activo']!=NULL){ 
					?>
					<ul class="navegador">
						  <li id="priv"><a href="#" class="desplegable" title="Privacidad">Privacidad</a>
						    <ul class="subnavegador">
						      <li>
						      <form id="privacidad" action="privacidad.php" method="post">
								<div><input type="radio" name="privacidad" value="1" id="1"> Solo pueden acceder usuarios que sigues.</div>
								<div><input type="radio" name="privacidad" value="2" id="2"> Todos los usuarios pueden acceder a tu perfil pero solo escribir aquellos que sigues.</div>
								<div><input type="radio" checked name="privacidad" value="3" id="3"> Todos los usuarios registrados pueden acceder a tu perfil y publicar contenido.</div>
								<div><input type="radio" name="privacidad" value="4" id="4"> Usuarios an&oacute;nimos pueden leer contenido.</div>
								<div><input type="radio" name="privacidad" value="5" id="5"> Usuarios an&oacute;nimos pueden crear y leer contenido.</div>
					         
					         	<div><input type="submit" id="botonconf" name="botonconf" value="Guardar"></div>
					            </form>
						      </li>
						    </ul>
						  </li>
						  <li id="sobre"><a class="desplegable" href="#" title="Opciones de Mensajes">Opciones de Mensajes</a>
						    <ul class="subnavegador">
						       <li>
						   			<form id="privacidad" action="opcmsj.php" method="post">

						        	<label>Elije la cantidad de mensajes a mostrar en tu muro</label>
				
								<?php require("mysql.php");


									$sql="SELECT * from define_max_mensaje order by opcion";
										$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
										 
										if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
										{
										    $combobit="";
										    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
										    {
										        $combobit .=" <option value='".$row['opcion']."'>".$row['opcion']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
										    }
										}
										else
										{
										    echo "No hubo resultados";
										}
										$conexion->close(); //cerramos la conexión
										?>

											<select name="opcmensajes">
      										 <?php echo $combobit; ?>
  										 </select>

								<div><input type="submit" id="botonconf2" name="botonconf2" value="Guardar"></div>
					        	</form>
								</li>
							</ul>
						  </li>
						 <li id="sobre"><a class="desplegable" href="#" title="Opciones de Mensajes">Cambiar password y pregunta secreta</a> 
						  <ul class="subnavegador">
						  <li id="priv"><a href="pantalla-cambiar-contrasenia.php" title="Cambiar contrase&ntilde;a">Cambiar contrase&ntilde;a</a></li>
						  <li id="priv"><a href="pantalla-cambiar-pregunta.php" title="Cambiar pregunta secreta">Cambiar pregunta secreta</a></li>
						</ul>
					    </li>
					 <?php
					 } 	
 
				else{ echo "<div class='aviso'><br/>Solo los usuarios registrados pueden configurar su perfil. 
												Registrate o inicia sesion!<br/><br/></div>";
										echo "<form action='../index.php'>
    									<input type=submit value='Volver al Inicio' name='logon' id='botonback'>
										</form>";
								}
				
					?>
						

					</ul>

							
					
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
