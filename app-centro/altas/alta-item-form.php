<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
?>
<html>
	<head>
		<link  rel="stylesheet" type="text/css" href="/app-centro/styles/form-items.css">
		<title>Alta item de tarea</title>
	</head>
<body>
<div id="general" align="center">
	<h3 id="titulo">Alta item de tarea</h3>
		<form action="alta-item.php" method="post">
		<br>
				Descripcion <input class="inputs" type="text" name="descripcion">
				Importe <input class="inputs" type="text" name="imp_sugerido">
				<input type="submit" value="Ingresar" class="submit">
		</form>
		<hr width="90%" align="center">
<div id="tabla-items">
	<table align="center" class="width200" id="tabla-item">
		<thead>
			<tr>
				<th>Id Item</th>
				<th>Descripcion</th>
				<th>Impuesto sugerido</th>
			</tr>
 		</thead>

			 <tr>
					<?php
						include('conexion.php');
						$query=mysqli_query ( $conex, "SELECT `iditem`, `descripcion`, `imp_sugerido` FROM item");
						while($query2=mysqli_fetch_array($query))
						{
					?>
					<form  action="delitem.php" method="post">
			  	<tbody>
			 	 		<td><input style="background:white;border:none" id="id" type="text" value="<?php echo $query2['iditem']; ?>" name="iditem" readonly="true"></td>
			 	 		<td><input style="background:white;border:none" id="desc" type="text" value="<?php echo $query2['descripcion']; ?>" name="descripcion" readonly="true"></td>
			 	 		<td><input style="background:white;border:none" id="imp" type="text" value="<?php echo $query2['imp_sugerido']; ?>" name="impuesto" readonly="true"></td>
						<td><input style="width:100px;margin: 0 auto;border-radius:5px;-moz-border-radius:15px;-webkit-border-radius:5px;" type="submit" name="eliminar" value="Eliminar"></td>
					</tbody>
					</form>
			  </tr>

			<?php } ?>

	</table>
</div>
</div>
</body>

<?php
}else{
echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}
?>
