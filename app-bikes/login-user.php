<?php
session_start();
if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
			header("Location: loby-user.php");
		}
?>
<html>
	<head>
		<title>Login usuarios</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/loginusuario.css">
		<script>
		 function espera(){
			 document.write("<img src='/styles/ajax-loader.gif'>");
		 		}
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
							<label for="usuario"></label>
							<input type="text" name="usuario" style="width:150px;" align="center" placeholder="User" id="user">
						</center>
						<br>
						<center>
							<label for="contraseña"></label>
							<input type="password" name="contrasena"  style="width:150px;" align="center" placeholder="Password" id="pass"><br>
						</center>
						<br>
						<br>
						<center>
							<div name="error" style="width:150px; height:20px; margin-top:-40px; ">
								<?php
									$valor=isset($_GET['user-error']);
									if(strcmp($valor,"1")==0){
											echo "<p style='color:red; margin-top:auto; margin-bottom:auto;'>Usuario no encontrado</p>";
											}
								?>
							</div>
							<input type="submit" value="Ingresar" style=" width:100px;" onclick="">
						</center>

			</form>
					</div> <!-- Div de datos cerrado -->
	<br>
	</div>
<!--
<footer class="footer">
<p></p>
</footer>
-->
</body>
</html>
