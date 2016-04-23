<?php
session_start();
if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
include('inactivo.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/app-bikes/styles/menus.css">
			<script type="text/javascript">
				function color(ide){
					document.getElementById(ide).style.backgroundColor='18D8BF';
					poside=ide.slice(4, 6);
				  poside=parseInt(poside);
					var x=1;
						for(x=1;x<=10;x++){
							if(poside != x){
								document.getElementById("link"+ x).style.backgroundColor='';
							}
						}
					}
			</script>
	</head>
<body>
<?php
$_SESSION['ultimoAcceso']= date("H:i:s");
?>
<br>
<br>
<br>
	<center>
		<a href="close-user.php" target="_parent" style="color:white;" id="cerrar" ><font color="black">Cerrar sesion</font></a>
		<br>
		<br>
		<?php
		if(isset($_SESSION['usrbks'])){
		echo "<font color='white' align='center'>User: ".$_SESSION['usrbks']."</font>";
		}
		?>

	</center>
<br>
<br>
<!--Linea -->
<hr width="120%" style="margin-left: -16px;"/>
<!--Titulo -->
<font id="titulocategoria">Altas</font>
<!--Div para los menus -->
	<div id="menus">
		<!--Declaro una lista -->
		<!--
		<li class="link">
			<div id="divlink">
					<a href="altas/alta-tipo-servicio-form.php" target="fondo" id="link0" onclick="color('link0');">
				<img src="styles/flecha.png">
						Tipo de servicio
					</a>
			</div>
		</li>
	-->

		<ul class="lista">
			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13"> Centros
				<li class="link">
					<div id="divlink">
							<a href="altas/alta-centro-autorizado-form.php" target="fondo" id="link1" onclick="color('link1');">
						<img src="styles/flecha.png">
								Centro
							</a>
						</div>
					</li>

			</li>

			<li class="titulo">
				 <img src="styles/flecha2.png"  width="13" height="13">
				  Administracion
				<li class="link">
					<div id="divlink">
						<a href="altas/alta-centro-autorizado-admin-form.php" target="fondo" id="link2" onclick="color('link2')">
						<img src="styles/flecha.png">
							Centro autorizado
						</a>
					</div>
				</li>
				<li class="link">
					<div id="divlink">
						<a href="altas/alta-vendedor-bikes-form.php" target="fondo" id="link3"  onclick="color('link3')">
						<img src="styles/flecha.png">
							Vendedores
						</a>
					</div>
				</li>
			</li>

			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13">
				Vehiculos
					<li class="link">
						<div id="divlink">
								<a href="altas/ingreso-marca-vehiculo-form.php" target="fondo" id="link4" onclick="color('link4')">
							<img src="styles/flecha.png">
									Marca
								</a>
							</div>
						</li>
				<li class="link">
					<div id="divlink">
						<a href="altas/ingreso-modelo-vehiculo-form.php" target="fondo" id="link5" onclick="color('link5')">
						<img src="styles/flecha.png">
							Modelo
						</a>
					</div>
				</li>
			</li>

			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13">
					Clientes
				<li class="link">
					<div id="divlink">
							<a href="altas/alta-cliente-persona-form.php" target="fondo" id="link6" onclick="color('link6')">
						<img src="styles/flecha.png">
								Persona
							</a>
						</div>
					</li>
				<li class="link">
					<div id="divlink">
						<a href="altas/alta-cliente-empresa-form.php" target="fondo" id="link7" onclick="color('link7')">
						<img src="styles/flecha.png">
							Empresa
						</a>
					</div>
				</li>
			</li>

			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13">
					Ventas
				<li class="link">
					<div id="divlink">
						<a href="altas/alta-vehiculo-form.php" target="fondo" id="link8" onclick="color('link8')">
						<img src="styles/flecha.png">
							A&ntildeadir una venta
						</a>
					</div>
				</li>
			</li>
		</ul>
	</div>

<font id="titulocategoria">Busquedas</font>
	<div id="menus">
		<ul class="lista">
			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13">
				 Clientes
					<li>
						<div id="divlink">
							<a href="selects/form-select-clientes.php" target="fondo" id="link9" onclick="color('link9')">
							<img src="styles/flecha.png">
							 Cliente
						 </a>
						</div>
					</li>
				</li>
			</ul>
		</div>
	<div id="menus">
		<ul class="lista">
			<li class="titulo">
				<img src="styles/flecha2.png"  width="13" height="13">
				 Servicios
					<li class="link">
						<div id="divlink">
						 <a href="selects/form-select-servicios.php" target="fondo" id="link10" onclick="color('link10')">
							<img src="styles/flecha.png">
								Servicios
							</a>
						</div>
					</li>
				</li>
			</ul>
		</div>
</body>
</html>
<?php
}else{
//Si no se encuentra logueado alguien se redirecciona al login
header('Location: login-user.php');
}

?>
