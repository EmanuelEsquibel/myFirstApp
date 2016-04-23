<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../styles/form-servicios.css">
		<title>Servicio</title>
		<meta charset="utf-8">
		<script type="text/javascript">
				function enviarDatosBuscar(){
						var iframe=document.getElementById('iframe1');
						var select=document.getElementById('vehiculo').value;
						var buscar=document.getElementById('buscador').value;
						window.frames[0].location.href = "../selects/select-vehiculos.php?select=" + select + "&buscar=" + buscar;
				}
				function asignar(option) {
					document.getElementById('texto2').value = option.value;
				}
				function cambiar(input) {
					var total = document.getElementById('texto2').value*input.value;
					document.getElementById('texto4').value = total;
				}
				function borrar() {
					document.getElementById('texto3').value = "";
					document.getElementById('texto4').value = "";
				}
				function requestDate(){
					var fecha = new Date();
					document.getElementById('aneo').value = fecha.getFullYear();
					document.getElementById('mes').value = fecha.getMonth() + 1;
					document.getElementById('dia').value = fecha.getDate();
				}
				function validate(){
					var iframe1 = document.getElementById('iframe1');
					if(iframe1.contentWindow.document.getElementById('id')){
							if(!document.getElementById('idvehiculo').value){
								alert("Seleccione el vehiculo");
								return false;
							}
					}else{
						alert("Ingrese un vehiculo");
						return false;
					}
					var tareas = document.getElementById('maximo').value;
					if(!tareas || tareas == 0){
							alert("Ingrese al menos una tarea");
							return false;
					}
				}
		
	</script>
	</head>
	<body onload="requestDate()">
		<!-- Division general -->
		<div id="general">
			<form action="alta-servicios.php" method="POST" onSubmit="return validate()">
				<h3 id="titulo">Dar de alta un servicio</h3>
		<div id="cabecera">
			<!-- Division de fecha -->
			<div id="div-fecha">
				Fecha:
				<input type="text" name="aneo" id="aneo" class="inputs-fecha" placeholder="YY" required>
				/ <input type="text" name="mes" id="mes" class="inputs-fecha" placeholder="MM" required>
				/ <input type="text" name="dia" id="dia" class="inputs-fecha" placeholder="DD" required>
			</div>
		</div>
		<br>
		<br>
		<hr>
		<!-- Division para buscar vehiculos -->
		<div id="buscar-vehiculo">
			<div id="buscar-left" align="center">
			Buscar por:
				<br>
										<select name="vehiculo" id="vehiculo"  style="border-color: ;width:25%;">
											<option value="persona" >Persona</option>
											<option value="empresa">Empresa</option>
										</select>
				<input type="text" name="buscador" placeholder="Ingrese datos a buscar" id="buscador"  style="border-color: ;width:40%;">
				<input type="button" value="Buscar" onclick="enviarDatosBuscar();"  style="width:25%;">
			</div>
			<br>
			<div id="buscar-right">
				<iframe src="../selects/select-vehiculos.php" id="iframe1"></iframe>
			</div>
			<br>
		</div>
		<br>
		<br>
		<br>
		<!-- Inputs ocultos -->
		<input name="idvehiculo" id="idvehiculo" hidden>
		<input name="maximo" id="maximo" hidden>
		<input name="name" id="grntKmt" hidden>
		<!-- Division para ingresar tareas -->
		<div id="ingresar-tarea" align="center">
		<br>
		<br>
		<br>
		<br>
		<hr>
		Tareas para el vehiculo: <input type="text" name="marca" id="marca" style="font-family:arial;font-size:20px;border-width: 0px;color:green;" readonly>
		<br>
		<br>
			Pieza <select id="texto" onchange="borrar()" style="border-color: ">
							<option value="" selected>Seleccione pieza</option>
							<?php
							include('../conexion.php');
							$consulta=mysqli_query($conex,"SELECT iditem, descripcion, imp_sugerido FROM item WHERE 1");
							while($consult = mysqli_fetch_array($consulta) ){
							 ?>
<option name="pieza" value="<?php echo $consult['imp_sugerido']; ?>" onclick="asignar( this );"> <?php echo $consult['iditem'] . "-" .  $consult['descripcion']; ?> </option>
								<?php
								}
								?>
						</select>
			Valor <input type="text" id="texto2"  readonly>
			Cantidad <input type="text" id="texto3" onKeyUp="cambiar(this);" style="border-color: ">
			Total <input type="text" id="texto4" readonly style="border-color: ;border-width: 0.5px;">
			<input type="button" name="add-tarea" id="boton" value="Add" style="border-color: ">
		</div>
		<br>
		<!-- Division mostrar tareas realizadas -->
		<div id="mostrar-tareas" align="center">
			<table class="width200" id="tabla">
				<thead>
					<tr>
						<th>Nombre pieza</th>
						<th>Valor pieza</th>
						<th>Cantidad</th>
						<th>Valor total</th>
					</tr>
				</thead>
				<tbody id = "cuerpo">

				</tbody>
			</table>
		</div>
		<hr>
		<!--Division kilometros -->
		<div id="kilometros" align="center">
			<br>
			<br>
			Kilometro actual <input class="inputs" type="text" name="kmt_actual" required><br>
			Kilometro proximo <input class="inputs" type="text" name="kmt_proxima" required><br>
			Fecha proxima <input class="inputs" type="text" name="fecha_prox" required><br>
		</div>
		<!-- Division observaciones y detalle final -->
		<div id="obs-det">
			<div id="obs">
				<p>Observaciones</p>
				<textarea class="area" rows="4" cols="20" name="observaciones"  required></textarea>
			</div>
			<div id="det">
				<p>Detalle proximo</p>
				<textarea class="area" rows="4" cols="20" name="detalle_prox" required></textarea>
			</div>
		</div>
		<br>
		<br>
		<div id="submit" style="width:100%;" align="center">
		<?php if(isset($_REQUEST['user'])){ echo "<font color='green' size='4'><img src='../styles/correcto.png' height='15px' width='15px'>Servicio realizado</font>"; } ?>
		<br>
		<br>
			<input type="submit" value="Todo listo" class="submit">			
		</div>
		<!-- Tabla dinamica -->
		<script type="text/javascript" src="../js/tabladinamica.js"></script>
		</form>
	</body>
	
</html>
<?php
}else{
echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}
?>
