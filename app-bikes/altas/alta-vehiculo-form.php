<?php
//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
session_start();
//If para comprobar si el usuario esta logueado
if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
{
include('../inactivo.php');
unset($_FILES['imagen']);
?>
<!-- Si se cumple que el usuario esta logueado se muestra el formulario -->
<html>

	<head>
		<meta charset="UTF-8">
		<!-- La etiqueta style se usa para escribir codigo css -->
		<link rel="stylesheet"  type="text/css" href="/app-bikes/styles/form-venta-modelo-persona.css">
		<script src="../js/autofocus.js" charset="utf-8"></script>
		<script>
			function showempresa(){
				document.getElementById('empresa').style.display='inline';
				document.getElementById('persona').style.display='none';
			}
			function showpersona(){
				document.getElementById('persona').style.display='block';
				document.getElementById('empresa').style.display='none';
			}
			function fecha(){
			var anio = document.getElementById('fecha_venta_anno').value;
			anio=parseInt(anio);
			var mes =	document.getElementById('fecha_venta_mes').value;
			mes=parseInt(mes);
			var dia = document.getElementById('fecha_venta_dia').value;
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
			function verificarmodelo(){
				var modelo=document.getElementById('modelo').value;
				if(modelo == ''){
					alert("Seleccione un modelo");
					return false;
				}
			}
			function cargarmodelos(){
				var iframe=document.getElementById('framemarco');
				var marca=document.getElementById('marcaselect').value;
				window.frames[0].location.href = "select-modelo-marca.php?marca=" + marca;
			}
			function recibirmodelo(select2){
				document.getElementById('modelo').value=select2;
			}

			function persona_empresa(option){
				var valor=option.value;
				document.getElementById('persona_empresa_button').value=valor;
			}

			function verificar_persona_empresa(){
				var valor1=document.getElementById('persona_empresa_button').value;
				if(valor1 == ''){
					alert("Seleccione un cliente");
					return false;
				}
			}
			function reset_value(){
				document.getElementById('persona_empresa_button').value='';
			}
            function requestDate(){
				var fecha = new Date();
				document.getElementById('fecha_venta_anno').value = fecha.getFullYear();
				document.getElementById('fecha_venta_mes').value = fecha.getMonth() + 1;
				document.getElementById('fecha_venta_dia').value = fecha.getDate();
			}
		</script>
	</head>
<body onload="autofocus();requestDate();">
<?php
 $_SESSION['ultimoAcceso']= date("H:i:s");
?>
<div class="general" id="general">
	<h3 id="titulo">Ventas</h3>
	<br>
	<form action="alta-vehiculo.php" method="post" enctype="multipart/form-data" onSubmit="return (fecha() && verificarmodelo() && verificar_persona_empresa())">
		<div id="divfecha">
			Fecha
			<input type="text" name="fecha_venta_anno" id="fecha_venta_anno" class="inputsfecha"  placeholder="Año" maxlength="4" pattern="[0-9]{0,4}" required>  /
			<input type="text" name="fecha_venta_mes" id="fecha_venta_mes" class="inputsfecha"  placeholder="Mes" maxlength="2" pattern="[0-9]{0,4}" required>  /
			<input type="text" name="fecha_venta_dia" id="fecha_venta_dia" class="inputsfecha" placeholder="Dia" maxlength="2" pattern="[0-9]{0,4}" required>
		</div>
		<br>
		<br>
		<p align="center">Para el ingreso de una venta, anteriormente se requerira el ingreso de un  <span style="color: green;font-weight: 800; ">cliente</span></p>
		<hr width="80%" align="center">
		<br>
		<br>

		<div id="divizquierda" align="center" style="height: 300px;">
			Numero del motor
			<input type="text" name="nromotor"  class="inputs" maxlength="15" pattern="[0-9]{0,15}" placeholder="  numerico[0-15]" required>
			<br>
			Numero del chasis
			<input type="text" name="nrochasis"  class="inputs" maxlength="17" pattern="[0-9]{0,17}" placeholder="  numerico[0-17]" required>
			<br>
			Color
			<input type="text" name="color"  class="inputs" maxlength="45" pattern="[' 'a-zA-Z0-9]{1,45}" placeholder="  alfanumerico[0-10]" required>
		</div>

		<div id="divcentro"  align="center"  style="height: 300px;">

			Marca <select name="marca" class="select" id="marcaselect" required>
						<option disabled selected>Ingrese una marca</option>
						<?php
						include('../conexion.php');
						$consulta=mysqli_query($conex, "SELECT idmarca, nombre, origen FROM marca") or die("");
						while($consultaw=mysqli_fetch_array($consulta)){
						?>
						<option value="<?php echo $consultaw['idmarca']; ?>" onclick="cargarmodelos();"><?php echo $consultaw['nombre']."|".$consultaw['origen'];?></option>
						<?php
						}
						?>
					</select>
			<iframe src="select-modelo-marca.php" width="250" height="80" style="border-width:0px;" id="framemarca">
			</iframe>
			<input type="text" name="modelo" id="modelo" readonly style="display:none;">
		<br>
		Foto
		<br>
			<label>
				<input type="file" name="imagen-venta" value="Foto" accept="image/*" required>
			</label>
		</div>
		<div id="divderecha" align="center"  style="height: 300px;">
				Cliente
				<select class="select" onChange="reset_value();">
					<option onclick="showpersona();" selected value="persona">Persona</option>
					<option  onclick="showempresa();" value="empresa">Empresa</option>
				</select>
				<br><br>
				<div  id="persona">
						<select name="persona" class="select">
											<option disabled selected>Ingrese una persona</option>
											<?php
											include('../conexion.php');
											$consulta=mysqli_query($conex, "SELECT idclientefk, nombre1, apellido1 FROM personas") or die("Error en consulta");
											while($consultaw=mysqli_fetch_array($consulta)){
											?>
											<option value="<?php echo $consultaw['idclientefk']; ?>" onclick="persona_empresa(this);"><?php echo $consultaw['nombre1']." ".$consultaw['apellido1'];?></option>
											<?php
											}
											?>
						</select>
					</div>
				<div  id="empresa" style="display:none;">
					<select name="empresa"  class="select">
										<option disabled selected>Ingrese una empresa</option>
										<?php
										include('../conexion.php');
										$consulta=mysqli_query($conex, "SELECT idclientefk2, rut FROM empresas") or die("Error en consulta");
										while($consultaw=mysqli_fetch_array($consulta)){
										?>
										<option value="<?php echo $consultaw['idclientefk2']; ?>" onclick="persona_empresa(this);"><?php echo $consultaw['rut'];?></option>
										<?php
										}
										?>
							 	</select>
					</div>
				<input type="text" name="persona_empresa" id="persona_empresa_button" style="display:none;">
				<br>
				Vendedor <select name="vendedor" class="select" required>
											<option disabled selected>Ingrese un vendedor</option>
											<?php
											include('../conexion.php');
											$consulta=mysqli_query($conex, "SELECT idvendedor, usuario FROM vendedores") or die("Error en consulta");
											while($consultaw=mysqli_fetch_array($consulta)){
											?>
											<option value="<?php echo $consultaw['idvendedor']; ?>"><?php echo $consultaw['usuario']; ?></option>
											<?php
											}
											?>
									  </select>
		</div>
		<div id="divsubmit">
			<?php
				if(isset($_REQUEST['user'])){
						echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Usuario registrado</font>";
				}
			?>
			<input type="submit" value="Ingresar" class="submitvehiculo">
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
