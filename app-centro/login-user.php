<?php
	session_start();
	if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto']))
		{
		header("Location: loby-user.php");
		}

?>
<html>
	<head>
		<title>Login usuarios</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/loginusuario.css">
		<script>
//		 function espera(){
//			 document.write("<img src='/styles/ajax-loader.gif'>");
//		 }
		</script>
		</head>
	<body>
	<div class="wrap" align="center">
		<br>
     <font style="font-family: serif ;" >CSM COMERCIO</font>
  </div>
	<br>
	<br>
		<div class="box">

			<form action="verify-user.php" method="POST"> <!-- Ingresar pagina php y metodo -->


					<div id="datos"> <!-- Div de datos abierto -->


					<center>
						<input type="text" name="usuario" style="width:150px;" align="center" placeholder="User">
					</center>
					<br>

					<center>
						<input type="password" name="contrasena"  style="width:150px;" align="center" placeholder="Password"><br>
					</center>

						<br>
						<br>
					<center>
						<div name="error" style="width:150px; height:20px; margin-top:-40px; ">
						<?php
						$valor=isset($_REQUEST['user-error']);
						if(strcmp($valor,"1")==0){
						echo "<p style='color:red; margin-top:auto; margin-bottom:auto;'>Usuario no encontrado</p>";
						}
						?>
						</div>


							<input type="submit" value="Ingresar" style=" width:100px; color:black;">
					</center>


					</div> <!-- Div de datos cerrado -->
</div>
</body>
</html>
