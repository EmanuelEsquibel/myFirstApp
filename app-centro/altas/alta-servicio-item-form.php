<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
?>

<html>
	<head>
		<link  rel="stylesheet" type="text/css" href="/app-centro/styles/form-basico.css">
		<title>Titulo</title>
	</head>
	<body>
		<div id="general" align="center">
			<form action="alta-servicio-item.php" method="post">
			<h3 id="titulo">Ingresar cantidad del item seleccionado</h3>
<br><br>
	Item <br><select name="item" class="inputs">
					<?php
					include('conexion.php');
						$consulta=mysqli_query($conex, "SELECT iditem, descripcion, imp_sugerido FROM item") or die("Error en consulta");
						while($consultaw=mysqli_fetch_array($consulta)){
					?>
						<option value="<?php echo $consultaw['iditem']; ?>"><?php echo $consultaw['descripcion'].", Impuesto sugerido: ".$consultaw['imp_sugerido'];?></option>
					<?php } ?>
			</select>
<br><br>
Cantidad <br><input type="text" name="cantidad" class="inputs"><br><br>
Importe Total <br><input type="text" name="importe" class="inputs"><br><br>
<br><br>
<input type="submit" value="Ingresar" class="submit">
</form>
</div>
</body>
</html>
<?php
}else{
echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}
?>
