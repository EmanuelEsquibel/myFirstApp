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
		<link rel="stylesheet" type="text/css" href="/app-bikes/styles/form-venta-modelo-persona.css">
		<script type="text/javascript" src="../js/autofocus.js"></script>
		<script type="text/javascript">
		function equal(){
			if(document.getElementById('pass').value != document.getElementById('verifypass').value){
					alert("Las contrasenas no coinciden");
				return false;
			}
			return true;
		}
		function fecha(){
		var anio = document.getElementById('fecha_nac_ano').value;
		anio=parseInt(anio);
		var mes =	document.getElementById('fecha_nac_mes').value;
		mes=parseInt(mes);
		var dia = document.getElementById('fecha_nac_dia').value;
		dia=parseInt(dia);
		var valor=28;
			if(((anio % 4) == 0) && ((anio % 100 != 0) || (anio % 400 == 0))){
				valor=29;
			}
			if(mes == 2 && dia > valor){
				alert("Ingrese una fecha valida");
				return false;
			}
			return true;
		}
		</script>
	</head>
<body onload="autofocus();">
<?php
 $_SESSION['ultimoAcceso'] = date("H:i:s");
?>
	<div class="general">
		<h3 id="titulo">Clientes personas</h3>
		<br>
		<form action="alta-cliente-persona.php" method="post" onSubmit="return (fecha() && equal())">
			<div id="divizquierda" align="center">
				<br>
				<br>
				Primer nombre
				<input type="text" name="nombre1" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" placeholder=" alfabetico[1-45]" required>
				<br>
				Segundo nombre
				<input type="text" name="nombre2" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{0,45}" placeholder=" alfabetico[1-45]">
				<br>
				Primer apellido
				<input type="text" name="apellido1" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" placeholder=" alfabetico[1-45]" required>
				<br>
				Segundo apellido <input type="text" name="apellido2" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" placeholder=" alfabetico[1-45]" required>
				<br>
				CI
				<input type="text" name="ci" class="inputs" maxlength="8" pattern="[0-9]{8,8}" placeholder=" numerico[8]" required>
				<br>
			</div>
			<div id="divcentro" align="center">
			<br>
			<br>
				<div id="fecha_nac" style="background-color:;height:40px;width:200px;">
					Fecha de nacimiento<br>
					<div align="center" style="width:160px;height:50px;">
						<div style="width:48px;float:left;margin-right:5px;">
							<select name="fecha_nac_año" id="fecha_nac_ano" class="inputfechapersona" style="width:48px;" required>
							<option disabled selected>A&ntildeo </option>
								<?php
								$añoactual = date("Y");
								$añoactuali = $añoactual - 18;
								$añoactualf = $añoactual - 90;
								for($x=$añoactuali;$x>=$añoactualf;$x--){
								?>
									<option value="<?php echo $x;?>"> <?php echo $x; ?> </option>
								<?php
								}
								?>
							</select>
						</div>
						<div style="width:48px;float:left;margin-right:5px;">
							<select name="fecha_nac_mes" id="fecha_nac_mes" class="inputfechapersona" style="width:48px;"  required>
							<option disabled selected>Mes</option>
								<?php
									for($x=1;$x<=12;$x++){
								?>
										<option value="<?php echo $x; ?>";><?php echo $x; ?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div style="width:48px;float:left;">
							<select name="fecha_nac_dia" id="fecha_nac_dia" class="inputfechapersona" style="width:48px;" required>
							<option disabled selected>Dia</option>
								<?php
								for($x=1;$x<=31;$x++){
									?>
									<option value="<?php echo $x; ?>";><?php echo $x; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<br>
					Email
					<input type="email" name="email" class="inputs" placeholder="example@gmail.com" required>
					<br>
					Telefono
					<input type="text" name="telefono" class="inputs" class="inputs" maxlength="11" pattern="[0-9]{8,9}" placeholder=" numerico[0-11]" required>
					<br>
					Direccion
					<input type="text" name="direccion" class="inputs" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{1,45}" placeholder=" alfanumerico[1-45]" required>
					<br>
					Ciudad
					<input type="text" name="ciudad" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" placeholder=" alfabetico[1-45]" required>
					<br>
			</div>

			<div id="divderecha" align="center">
				<br>
				<br>
				Usuario <input type="text" name="usuariop" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
				<br>
				Contrase&ntildea <input type="password" name="contrasenap" id="pass" class="inputs" maxlength="45" pattern="[a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
				<br>
				Confirmar contrase&ntildea <input type="password" id="verifypass" class="inputs">
				<br>
			</div>
			<br>
			<br>
			<div id="divsubmit">
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
</form>
</body>
</html>
<?php
}else{
//Si no esta logueado se muestra este link
echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
}
?>
