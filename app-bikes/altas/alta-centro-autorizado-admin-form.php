<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
		include('../inactivo.php');
?>
			<!-- Si se cumple que el usuario esta logueado se muestra el formulario -->
			<html>
				<head>
					<link rel="stylesheet" type="text/css" href="/app-bikes/styles/forms-basicos.css">
					<meta charset="UTF-8">
					<script src="../js/autofocus.js" charset="utf-8"></script>
					<script type="text/javascript">
						function equal(){
							if(document.getElementById('pass').value != document.getElementById('verifypass').value)
								{
									alert("Las contrasenas no coinciden");
								return false;
							}
						}
					</script>
				</head>
			<body onload="autofocus();">
			<?php
			 $_SESSION['ultimoAcceso']= date("H:i:s");
			?>
				<div id="divcentrado" align="center">
					<h3 id="titulo">Administracion-Centros autorizados</h3>
						<form action="alta-centro-autorizado-admin.php" method="post" onSubmit="return equal();">
						<br>
						<br>
						Usuario:
						<input type="text" name="usuario" class="inputs" maxlength="45" pattern="[a-zA-Z]{8,45}" placeholder=" alfabetico[8-45]" required>
						<br>
						Contrase&ntildea:
						<input type="password" name="contrasena" id="pass" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
						<br>
						Confirmar contrase&ntildea:
						<input type="password" id="verifypass" class="inputs" required>
						<br>
						Centro autorizado: <select name="centros" class="inputs" required>
																	<option disabled selected>Seleccione un centro autorizado</option>
																	<?php
																	include('../conexion.php');
																	$consulta=mysqli_query($conex, "SELECT idcentroautorizado, razon_soc FROM centroautorizado") or die("Error en consulta");
																	while($consultaw=mysqli_fetch_array($consulta)){
																	?>
																	<option value="<?php echo $consultaw['idcentroautorizado']; ?>"><?php echo $consultaw['razon_soc'];?></option>
																	<?php
																	}
																	?>
																</select>
						<br>
						<br>
						<?php
						if(isset($_REQUEST['user'])){
								echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'> Usuario registrado</font><br><br>";
							}
						?>
						<br>
						<input type="submit" value="Ingresar" class="submit">
					</form>
				</div>
			</body>
			</html>
<?php
		}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
