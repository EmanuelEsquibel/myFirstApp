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
				</head>
			<body onload="autofocus();">
				<div id="divcentrado" align="center">
					<h3 id="titulo">Tipo de servicios</h3>
					<br>
						<form action="alta-tipo-servicio.php" method="post" name="formulario">
							<br>
							<br>
							<font>Tipo de servicio:</font>
							<input type="text" name="tipo" id="tipo" class="inputs" maxlength="11" pattern="[0-9]{0,11}" placeholder=" numerico[0-11]" required>
							<br>
							<font>Detalle:</font>
							<input type="text" name="detalle" id="detalle" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{0,45}" placeholder=" alfabetico[0-45]" required>
							<br>
							<br>
							<br>
							<?php
							$_SESSION['ultimoAcceso']= date("H:i:s");
							if(isset($_REQUEST['user'])){
									echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Tipo de servicio registrado</font>";
							}
							?>
							<br>
							<br>
							<br>
							<input type="submit" value="Ingresar" class="submit" name="submit" id="submit">
						</form>
					</div>
			</body>
			</html>
<?php
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
		}
?>
