<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
		{
			include('../inactivo.php');
?>
			<!-- Si se cumple que el usuario esta logueado se muestra el formulario -->
			<html>
				<head>
					<link rel="stylesheet" type="text/css" href="/app-bikes/styles/forms-basicos.css">
					<script type="text/javascript" src="../js/autofocus.js"></script>
				</head>
			<body onload="autofocus();">
			<?php
			 $_SESSION['ultimoAcceso']= date("H:i:s");
			?>
						<div id="divcentrado" align="center">
							<h3 id="titulo">Centros autorizados</h3>
							<br>
							<form action="alta-centro-autorizado.php" method="post">
								<br>
								<br>
								RUT <input type="text" name="rut" class="inputs" id="rut" maxlength="12" pattern="[a-zA-Z0-9]{12,12}" placeholder=" numerico[12]" required>
								<br>
								<br>
								Razon social <input type="text" name="razon_soc" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{0,45}" placeholder=" alfanumerico[0-45]" required>
								<br>
								<br>
								Responsable <input type="text" name="responsable" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{0,45}" placeholder=" alfabetico[0-45]" required>
								<br>
								<br>
								Direccion   <input type="text" name="direccion" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{0,45}" placeholder=" alfanumerico[0-45]" required>
								<br>
								<br>
								Telefono   <input type="text" name="telefono" class="inputs" maxlength="11" pattern="[a-zA-Z0-9]{0,11}" placeholder=" numerico[0-11]" required>
								<br>
								<br>
								<br>
								<br>
								<?php
									if(isset($_REQUEST['user'])){
											echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Usuario registrado</font>";
									}
								?>
								<br>
								<br>
								<input type="submit" value="Ingresar" class="submit">
								<br>
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
