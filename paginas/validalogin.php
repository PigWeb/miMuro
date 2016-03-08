<?php 		
header('Content-Type: text/html;charset=UTF-8');
session_start();
error_reporting (0);
?>
				<?php //validacion de login
						$email = $_POST["mail"];
						$p1 = $_POST["pass"];

						//validacion
						$con="CALL conusr('$email')";
						require("mysql.php");
						$f=mysqli_fetch_array($consulta);
						$pass=$f['password'];
						//cargamos los valores del usr correspondientes a los ultimos bloqueos--
						$intentos=$f['intentos'];
						$dtbloqueo=$f['fechabloq'];
						
						if($f!=NULL) {
							//guardamos el tiempo de bloqueo total
							$ahora=time();
							if ($dtbloqueo!=0) {
                			$tiempoBloqueo= $ahora-$dtbloqueo;
      						} else $tiempoBloqueo=0;
							
							 
							//preguntar si ya esta bloqueado--
							if($intentos>=3&&$tiempoBloqueo<= 300)
							{
								echo "<script language='JavaScript'>";
						        echo "alert('Usuario bloqueado por motivos de seguridad. Intente dentro de 5 minutos');";
            			        echo "document.location =('../index.php');";
            				    echo "</script>";
							} else{

							$iguales = password_verify($p1,$pass);
							
							if ($iguales) {
						
						$Nombre=$f['nombre'];
						$Apellido=$f['apellido'];
						$Mail=$f['mail'];
						$descripcion=$f['descripcion'];
						$admin=$f['administrador'];
						$id=$f['idusuario'];
						//abre una sesion nueva con los valores del usuario registrado 
						$_SESSION['nom']=$Nombre;
						$_SESSION['mail']=$Mail;
						$_SESSION['ape']=$Apellido;
						$_SESSION['des']=$descripcion;
						$_SESSION['admin']=$admin;											
						$_SESSION['activo']=1;
						$_SESSION['idusr']=$id;
						$_SESSION['ultimoAcceso']=0;
						$_SESSION['primeraVez']=1;
            			//borrar los intentos fallidos--
            			$intentos=0;
            			$con="CALL updintentos('$intentos','$id')";
            			require("mysql.php");
            			//borrar el tiempo de bloqueo
            			$dtbloqueo='0';
            			$con="CALL updtiempobloq('$dtbloqueo','$id')";
						require("mysql.php");
						mysqli_close($conexion);
						echo "<script language='JavaScript'>";
            			echo "location = 'home.php';";
            			echo "</script>";  
						}
						else{ 
							//aca se van a ir contabilizando los intentos fallidos del usr. --
							//hay que buscar el usuario por la variable $email y sumarle intentos fallidos --
							$id=$f['idusuario'];
							$intentos=$intentos+1;
							//usar sp para sumar intentos fallidos en la base de datos --
							$con="CALL updintentos('$intentos','$id')";
							require("mysql.php");
							//aca hay que preguntar si tiene tres intentos fallidos, --
            				//y ahi guardar el tiempo en la variable $dtbloqueo que --
            				//guarda el datetime del momento del bloqueo --
            				if($intentos>=3)
            					{
            					$dtbloqueo=time();
            					$con="CALL updtiempobloq('$dtbloqueo','$id')";
            					require("mysql.php");
            					echo "<script language='JavaScript'>";
						        echo "alert('Usuario bloqueado por motivos de seguridad. Intente dentro de 5 minutos');";
            			        echo "document.location =('../index.php');";
            				    echo "</script>";
            					}else {
            						echo "<script language='JavaScript'>";
						    		echo "alert('Los datos son invalidos.');";
            			    		echo "document.location =('../index.php');";
            						echo "</script>";
            					}
            				mysqli_close($conexion);
            			}

            			}
						
						} 
						else{ echo "<script language='JavaScript'>";
						      echo "alert('Los datos son invalidos.');";
            			      echo "document.location =('../index.php');";
							  echo "</script>";
						}
					
						/*--Fin isset validar--*/ 
				?>