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
		<link rel="stylesheet" type="text/css" href="/app-bikes/styles/form-empresa.css">
		<script type="text/javascript" src="../js/autofocus.js"></script>
		<script type="text/javascript">
		function equal(){
			if(document.getElementById('pass').value != document.getElementById('verifypass').value){
					alert("Las contrasenas no coinciden");
				return false;
			}
			return true;
		}
		</script>
	</head>
<body onload="autofocus();">
	<?php
	 $_SESSION['ultimoAcceso']= date("H:i:s");
	?>
	<div class="general">
		<div class="centrado">
		<h3 id="titulo">Clientes empresas</h3>
		<br>
		<form action="alta-cliente-empresa.php" method="post" onsubmit="return equal();">
			<div id="divizquierda" align="center" style=" margin-bottom: -155px;">
				<font>RUT:</font>
				<input type="text" name="rut" class="inputs" maxlength="12" pattern="[a-zA-Z0-9]{12,12}" placeholder=" numerico[12]" required>
				<br>
				<font>Razon social:</font>
				<input type="text" name="r_social" class="inputs"maxlength="45" pattern="[" "a-zA-Z0-9]{0,45}" placeholder=" alfanumerico[0-45]" required>
				<br>
				<font>Contacto:</font>
				<input type="text" name="contacto" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{0,45}" placeholder=" alfabetico[0-45]" required>
				<br>
				<font>Email:</font>
				<input type="email" name="email" class="inputs" maxlength="45" placeholder=" example@gmail.com" required>
				<br>
				<br>
				<br>
			</div>
			<div id="divcentro" align="center">
				<font>Telefono:</font>
				<input type="text" name="telefono" class="inputs" maxlength="11" pattern="[a-zA-Z0-9]{0,11}" placeholder=" numerico[0-11]" required>
				<br>
				<font>Direccion:</font>
				<input type="text" name="direccion" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{0,45}" placeholder=" alfanumerico[0-45]" required>
				<br>
				<font>Ciudad:</font> <input type="text" name="ciudad" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{0,45}" placeholder=" alfabetico[0-45]" required>
				<br>
				<br>
			</div>
			<div id="divderecha" align="center">
				Usuario <input type="text" name="usuariop" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
				<br>
				Contrase&ntildea <input type="password" name="contrasenap" id="pass" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
				<br>
				Confirmar contrase&ntildea <input type="password" id="verifypass" class="inputs">
			</div>
			<br>
			<div id="divsubmit" align="center">
				<?php
				if(isset($_REQUEST['user'])){
						echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Usuario registrado</font>";
				}
				?>
				<br>
				<br>
				<input type="submit" value="Ingresar" class="submit">
			</div>
		<br>
	</div>
</div>
	</form>
</body>
</html>
<?php
}else{
//Si no esta logueado se muestra este link
echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
}
?>
