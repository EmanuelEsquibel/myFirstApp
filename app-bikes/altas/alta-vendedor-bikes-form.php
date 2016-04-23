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
					<!-- La etiqueta style se usa para escribir codigo css -->
					<link rel="stylesheet"  type="text/css" href="/app-bikes/styles/form-venta-modelo-persona.css">
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
						<h3 id="titulo">Administracion</h3>
						<br>
						<form action="alta-vendedor-bikes.php" method="post" onSubmit="return equal();">
						<br>
						<br>
							Usuario: <input type="text" name="usuario" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
							<br>
							Contrase&ntildea: <input type="password" name="contrasena" id="pass" class="inputs" maxlength="60" pattern="[a-zA-Z0-9]{8,60}" placeholder=" alfanumerico[8-60]" required>
							<br>
							Confirmar contrase&ntildea: <input type="password" id="verifypass" class="inputs">
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
