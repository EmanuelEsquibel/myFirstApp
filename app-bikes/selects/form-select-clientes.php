<?php
//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
session_start();
//If para comprobar si el usuario esta logueado
if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
{
	include('../inactivo.php');
	?>
	<html>
	<head>
		<title>Busqueda cliente</title>
		<link rel="stylesheet" type="text/css" href="/app-bikes/styles/selects.css">
		<meta charset="UTF-8">
		<script>
		function showempresa(){
			document.getElementById('empresa').style.display='inline';
			document.getElementById('persona').style.display='none';
		}
		function showpersona(){
			document.getElementById('persona').style.display='inline';
			document.getElementById('empresa').style.display='none';
		}
		</script>
	</head>
	<body>
		<?php
		$_SESSION['ultimoAcceso'] = date("H:i:s");
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			<div class="general">
				<div style="float:left;background-color:;margin-left:10px;margin-top:30px;">
					<?php
					if(isset($_REQUEST['exito']) && $_REQUEST['exito'] == 1){
						echo "<font style='color:green;'>Usuario modificado satisfactoriamente</font>";
					}
					?>
				</div>
				<h3 id="titulo">Busqueda de clientes</h3>
				<br>
				<div id="menu">
					Buscar
					<select name="select1" style="background-color: 149583;">
						<option value="personas" onclick="showpersona();" selected>Personas</option>
						<option value="empresas" onclick="showempresa();">Empresas</option>
					</select>

					<div id="empresa" style="display: none;">
						<select name="selectb" style="background-color: 149583;">
							<option value="rut" selected>RUT</option>
							<option value="r_social">Razon social</option>
						</select>
					</div>

					<div id="persona" style="display: inline;">
						<select name="select" style="background-color: 149583;">
							<option value="ci" selected>Ci</option>
							<option value="apellido1">Apellidos</option>
						</select>
					</div>
					<input type="text" name="search" style="background-color: 149583;" id="search"> <input type="submit" value="Buscar" id="buscar">
				</div>
			</form>
			<br>
			<br>
			<hr>
			<!-- Personas -->
		<div id="frame">
			<div id="resultadosp">
			<?php
			if (isset ( $_REQUEST ['search'] ) && $_REQUEST ['search'] != "") {
				if (isset ( $_REQUEST ['select1'] ) && $_REQUEST ['select1'] == "personas") {
						if (isset ( $_REQUEST ['select'] ) && isset ( $_REQUEST ['search'] )) {
							$select = $_REQUEST ['select'];
							$search = $_REQUEST ['search'];
							include ('../conexion.php');
							$query = mysqli_query ( $conex, "SELECT p.`idclientefk`, p.`ci`, p.`nombre1`, p.`nombre2`, p.`apellido1`, p.`apellido2`, p.`fecha_nac`, c.`idcliente`, c.`email`, c.`direccion`, c.`ciudad`, t.`idclientefk3`, t.`nrotel` FROM `cliente` AS c, `personas` AS p, `telefonosclientes` AS t WHERE p.`$select` = '$search' AND c.`idcliente` = p.`idclientefk` AND c.`idcliente` = t.`idclientefk3`" ) or die ( "" );
							if($query1=mysqli_fetch_array($query)){
								?>
								<table border="1" align="center" class="width200">
									<thead>
										<tr>
											<th>CI</th>
											<th>Primer nombre</th>
											<th>Segundo nombre</th>
											<th>Primer apellido</th>
											<th>Segundo apellido</th>
											<th>Fecha de nacimiento</th>
											<th>Email</th>
											<th>Direccion</th>
											<th>Ciudad</th>
											<th>Telefono</th>
										</tr>
									</thead>
									<tbody>
										<!--PHP -->
										<?php
										include ('../conexion.php');
										$query = mysqli_query ( $conex, "SELECT p.`idclientefk`, p.`ci`, p.`nombre1`, p.`nombre2`, p.`apellido1`, p.`apellido2`, p.`fecha_nac`, c.`idcliente`, c.`email`, c.`direccion`, c.`ciudad`, t.`idclientefk3`, t.`nrotel` FROM `cliente` AS c, `personas` AS p, `telefonosclientes` AS t WHERE p.`$select` = '$search' AND c.`idcliente` = p.`idclientefk` AND c.`idcliente` = t.`idclientefk3`" ) or die ( "" );
										$cantidad = 0;
										while ( $query1 = mysqli_fetch_array ( $query ) ) {
											$cantidad = $cantidad + 1;
											?>
											<tr>
												<form name="<?php echo "f".$cantidad;?>" action="/app-bikes/updates/update-clientes-form.php" method="POST">
													<td id="uno"><input type="text" name="ci" value="<?php echo $query1['ci']; ?>" readonly></td>
													<td id="dos"><input type="text" name="nombre1" value="<?php echo $query1['nombre1'];?>" readonly></td>
													<td id="tres"><input type="text" name="nombre2" value="<?php echo $query1['nombre2']; ?>" readonly></td>
													<td id="cuatro"><input type="text" name="apellido1" value="<?php echo $query1['apellido1']; ?>" readonly></td>
													<td id="cinco"><input type="text" name="apellido2" value="<?php echo $query1['apellido2']; ?>" readonly></td>
													<td id="sesis"><input type="text" name="fecha_nac" value="<?php echo $query1['fecha_nac']; ?>" readonly></td>
													<td id="siete"><input type="text" name="email" value="<?php echo $query1['email']; ?>" readonly></td>
													<td id="ocho"><input type="text" name="direccion" value="<?php echo $query1['direccion']; ?>" style="width:120px;" readonly></td>
													<td id="nueve"><input type="text" name="ciudad" value="<?php echo $query1['ciudad']; ?>" readonly></td>
													<td id="diez"><input type="text" name="nrotel" value="<?php echo $query1['nrotel']; ?>" readonly></td>
													<td style="display:none;"><input type="text" name="edc" value="<?php echo $query1['idclientefk']; ?>"></td>
													<td><input class="editar" type="submit" value="Editar"></td>
												</form>
											</tr>
											<?php
											//while
										}
										?>
									</tbody>
								</table>
								<?php
								//if si consulta es true
							}
							//if isset select search
						}
						?>
					</div>
					<!-- Empresas -->
					<?php
				} elseif (isset ( $_REQUEST ['select1'] ) && $_REQUEST ['select1'] == "empresas"){
					?>
					<div id="resultadose">
						<?php
						if (isset ( $_REQUEST ['select'] ) && isset ( $_REQUEST ['search'] )){
							$search = $_REQUEST ['search'];
							$selectb = $_REQUEST ['selectb'];
							include ('../conexion.php');
								$query1 = mysqli_query ( $conex, "SELECT e.`rut`, e.`idclientefk2`, e.`r_social`, e.`contacto`, c.`idcliente`, c.`email`, c.`direccion`, c.`ciudad`, t.`idclientefk3`, t.`nrotel` FROM `cliente` AS c, `empresas` AS e, `telefonosclientes` AS t WHERE (e.`$selectb` = '$search') AND c.`idcliente` = e.`idclientefk2` AND c.`idcliente` = t.`idclientefk3`" ) or die ( "" );
							if($query2 = mysqli_fetch_array ( $query1 )){
							?>
							<table border="1" align="center" class="width2002">
								<thead>
									<tr>
										<th>RUT</th>
										<th>Razon social</th>
										<th>Contacto</th>
										<th>Email</th>
										<th>Direccion</th>
										<th>Ciudad</th>
										<th>Numero telefono</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include ('../conexion.php');

									$query1 = mysqli_query ( $conex, "SELECT e.`rut`, e.`idclientefk2`, e.`r_social`, e.`contacto`, c.`idcliente`, c.`email`, c.`direccion`, c.`ciudad`, t.`idclientefk3`, t.`nrotel` FROM `cliente` AS c, `empresas` AS e, `telefonosclientes` AS t WHERE (e.`$selectb` = '$search') AND c.`idcliente` = e.`idclientefk2` AND c.`idcliente` = t.`idclientefk3`" ) or die ( "" );
									$cantidad = 0;
									while ( $query2 = mysqli_fetch_array ( $query1 ) ) {
										$cantidad = $cantidad + 1;
										?>
										<tr>
											<form name="<?php echo "f2".$cantidad;?>" action="../updates/update-clientes-empresa-form.php" method="POST">
												<td style="display:none;">
													<input type="text" name="ed" value="<?php echo $query2['idclientefk2']; ?>" hidden readonly>
												</td>
												<td>
													<input type="text" name="rut" value="<?php echo $query2['rut']; ?>" style="width:90px;" readonly>
												</td>
												<td>
													<input type="text" name="r_social" value="<?php echo $query2['r_social']; ?>" readonly>
												</td>
												<td>
													<input type="text" name="contacto" value="<?php echo $query2['contacto']; ?>" readonly>
												</td>
												<td>
													<input type="text" name="email" value="<?php echo $query2['email']; ?>" readonly style="width:140px;">
												</td>
												<td>
													<input type="text" name="direccion" value="<?php echo $query2['direccion']; ?>" readonly>
												</td>
												<td>
													<input type="text" name="ciudad" value="<?php echo $query2['ciudad']; ?>" readonly>
												</td>
												<td>
													<input type="text" name="nrotel" value="<?php echo $query2['nrotel']; ?>" readonly>
												</td>
												<td>
													<input type="submit" class="editar" value="Editar" readonly>
												</td>
											</form>
										</tr>
										<?php
									//while
									}
									?>
								</tbody>
							</table>
								<?php
								//consulta true
								}
							//if select search
							}
							?>
					</div>
				<?php
				}
			}
			?>

		</div>
	</body>
	</html>
	<?php
}else{
	//Si no esta logueado se muestra este link
	echo "Porfavor inicie sesion <a href='/index-bikes.html' target='blank'>Ir</a>";
}
?>
