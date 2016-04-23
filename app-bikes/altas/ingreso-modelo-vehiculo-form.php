<?php
session_start();
if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
{
	include('../inactivo.php');
	unset($_FILES['imagen']);
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="/app-bikes/styles/form-venta-modelo-persona.css">
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
		<section class="general">
			<h3 id="titulo">Modelos</h3>
			<br>
				<form  action="ingreso-modelo-vehiculo.php" method="POST" enctype="multipart/form-data">
					<div id="divizquierda" align="center">
					<br>
						Nombre
						<input type="text" name="nombre" class="inputs" maxlength="45" pattern="[" "a-zA-Z0-9]{8,45}" placeholder=" alfanumerico[8-45]" required>
						<br>
						A&ntildeo
						<input type="text" name="ano" class="inputs" maxlength="45" pattern="[0-9]{1,11}" placeholder=" numerico[0-11]" required>
						<br>
						Combustible
						<input type="text" name="combustible" class="inputs" maxlength="45" pattern="[a-zA-Z]{0,45}" placeholder=" numerico[0-45]" required>
						<br>
						Garantia en km
						<input type="text" name="garant_km" class="inputs" maxlength="11" pattern="[a-zA-Z0-9]{0,11}" placeholder=" numerico[0-11]" required>
						<br>
						Garantia en meses
						<input type="text" name="garant_yy" class="inputs" maxlength="11" pattern="[0-9]{0,11}" placeholder=" numerico[0-11]" required>
						<br>
						Tipo motor
						<select class="inputs" name="tipo_motor" required="">
							<option disabled selected>Ingreso de tipo de motor</option>
							<option value="2">2 tiempos</option>
							<option value="4">4 tiempos</option>
						</select>
						<br>
					</div>

					<div id="divcentro" align="center">
						<br>
						Cilindrada <input type="text" name="cilindrada" class="inputs" maxlength="11" pattern="[0-9]{0,11}" placeholder="  numerico[0-11]" required>
						<br>
						Caballos de fuerza <input type="" name="hp" class="inputs" maxlength="11" pattern="[0-9]{0,11}" placeholder="  numerico[0-11]" required>
						<br>
							Marca <select name="marcas" class="select" required="">
													<option disabled selected>Ingresar marca</option>
											<?php
											include('../conexion.php');
											$consulta=mysqli_query($conex, "SELECT idmarca, nombre FROM marca") or die("Error en consulta");
											while($consultaw=mysqli_fetch_array($consulta)){
												?>
												<option value="<?php echo $consultaw['idmarca']; ?>"><?php echo $consultaw['nombre'];?></option>
												<?php
											}
											?>
										</select>
							<br>
							Velocidades <select name="velocidades" class="select" required="">
													<option disabled selected>Ingresar velocidades</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
					<br>
					<br>
					Foto del modelo
					<br>
					<input type="file" name="imagen"  id="imagen" class="inputfoto" accept="image/*"  required>
					<br>
					</div>
					<div id="divderecha">
					<br>
					<br>
					<div id="divcheckbox">
							<label><input type="checkbox" name="baul" value="s" class="datosmodelo"> Baul</label><br><br><br>
							<label><input type="checkbox" name="canasto"  value="s"  class="datosmodelo"> Canasto</label><br><br><br>
							<label><input type="checkbox" name="encendido_elec" value="s"  class="datosmodelo"> Encendido electrico</label><br><br><br>
							<label><input type="checkbox" name="freno_disco" value="1"  class="datosmodelo"> Freno disco</label><br><br><br>
							<label><input type="checkbox" name="automatico" value="1" class="datosmodelo"> Automatico</label><br><br><br>
					</div>
					</div>
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
		</section>
	</form>
	</body>
	</html>
	<?php
}else{
	echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
	}
?>
