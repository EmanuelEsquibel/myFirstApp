<html>
	<head>
		<meta charset="utf-8">
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/login.css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="js/jquery.mobile-1.4.5.css">
		<script type="text/javascript" src="jquery-1.11.3.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.4.5.js"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<title>Login usuario</title>
	</head>
<body>
	<div data-role="page" data-theme="a" id="seccion">
	<!--Cabecera -->
	<div data-role="header" align="center">
		<font> CSM Online </font>
	</div>
	<br>
	<!--Contenido. -->
		<div data-role="content">
			<form method="POST" action="querys/verify-user.php" data-ajax="false">
				<input type="text" name="user" placeholder="Ingrese un usuario" required>
				<br>
				<input type="password" name="password" placeholder="Ingrese una constraseña" required>
			<!-- Boton para dejar sesion abierta. -->
				<div id="keepSession">
					<label for="keepSession" id="keepSessionLabel"> No cerrar sesión
						<input type="checkbox" name="keepSession" data-theme="c">
					</label>
				</div>
			<!-- Division para mostrar un mensaje de error si el usuario no se encuentra. -->
				<div id="error" align="center">
					<?php
					if(isset($_REQUEST['user-error'])){
					?>
					<font color='black' size='3'><img src='styles/Icono_alerta.png' height='14px' width='14px'> Usuario no econtrado</font>
					<?php
					}
					?>
					<br>
				</div>
				<br>
				<br>
				<input type="submit" value="Ingresar">
			</form>
		</div>
	<!-- Footer -->
		<div data-role="footer" align="center"  data-id="foo1" data-position="fixed">
			<p>Consulta de servicios de mantenimiento</p>
		</div>
	</div>
</body>
</html>
