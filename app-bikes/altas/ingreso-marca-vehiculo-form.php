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
					<h3 id="titulo">Marcas</h3>
					<br>
					<form action="ingreso-marca-vehiculo.php" method="post">
						<br>
						<br>
						Nombre: <input type="text" name="nombre_marca" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{1,45}" placeholder=" alfanumerico[1-45]" required>
						<br>
						Origen: <input type="text" name="origen_marca" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{1,45}" placeholder=" alfanumerico[1-45]" required>
						<br>
						<br>
						<?php
						if(isset($_REQUEST['user'])){
								echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Usuario registrado</font>";
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
			echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
}
?>
