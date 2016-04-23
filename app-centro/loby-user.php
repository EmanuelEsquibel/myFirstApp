<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
//include('inactivo.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/app-centro/styles/menus.css">
		<script type="text/javascript">
		function color(ide){
			document.getElementById(ide).style.backgroundColor='18D8BF';
			poside=ide.slice(4, 6);
			poside=parseInt(poside);
			var x=1;
				for(x=0;x<=2;x++){
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
		echo "<font color='white' align='center'>User: ".$_SESSION['usercto']."</font>";
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
			<ul class="lista">
				<li class="titulo">
					<img src="styles/flecha2.png"  width="13" height="13"> Servicios
					<li class="link">
						<div id="divlink">
							<a href="altas/alta-item-form.php" target="fondo" id="link0" onclick="color('link0');">
									<img src="styles/flecha.png">
									Items
								</a>
						</div>
					</li>
					<li class="link">
						<div id="divlink">
							<a href="altas/alta-servicios-form.php" target="fondo" id="link1" onclick="color('link1')">
							<img src="styles/flecha.png">
								Service
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
