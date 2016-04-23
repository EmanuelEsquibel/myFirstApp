<html>
<head>
  <link rel="stylesheet" href="../styles/form-servicios.css" charset="utf-8"></link>
  <meta charset="utf-8">
  <style media="screen">
    table input{
      width:100%;
    }
  </style>
</head>
<body style="margin: 0px ;">
<table id="tabla-buscar">
  <thead>
    <tr>
	  <th></th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Numero motor</th>
      <th>Numero chasis</th>
      <th>Color</th>
      <th>Garantia km</th>
      <th>Garantia meses</th>
	  <th>Fecha venta</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="cuerpo">
<?php
if(isset($_REQUEST['select']) && isset($_REQUEST['buscar'])) {
?>
<?php
$date = date("Y/m/d");
$date = strtotime($date);
$select = $_REQUEST['select'];
$search = $_REQUEST['buscar'];
include('../conexion.php');
if( $_REQUEST['select'] == "persona" ){
$consulta=mysqli_query($conex," 
		SELECT 
			n.nombre as nombre_marca, m.nombre, v.nromotor, v.nrochasis, v.color, m.garant_km, m.garantia_yy, v.idvehiculo, v.fecha_venta
		FROM
			personas AS p
			INNER JOIN
				vehiculos as v ON p.idclientefk = v.idclientefk4
			INNER JOIN 
				marca AS n ON v.idmarcafk = n.idmarca
			INNER JOIN 
				modelo AS m ON v.idmodelofk = m.idmodelo
		WHERE
			p.ci = '$search'
	") or die(mysqli_error($conex));
}else if($_REQUEST['select'] == "empresa") {
	$consulta=mysqli_query($conex," 
		SELECT 
			n.nombre as nombre_marca, m.nombre, v.nromotor, v.nrochasis, v.color, m.garant_km, m.garantia_yy, v.idvehiculo, v.fecha_venta
		FROM
			empresas AS e
			INNER JOIN
				vehiculos as v ON e.idclientefk2 = v.idclientefk4
			INNER JOIN 
				marca AS n ON v.idmarcafk = n.idmarca
			INNER JOIN 
				modelo AS m ON v.idmodelofk = m.idmodelo
		WHERE
			e.rut = '$search'
	") or die(mysqli_error($conex));
}


	$count = 0;
while($fetch = mysqli_fetch_array($consulta)){
	$fecha_venta = strtotime($fetch['fecha_venta']);
	$fecha = date('Y-m-j');
	$newDate = strtotime ( '+' . $fetch['garantia_yy'] . ' month' , $fecha_venta ) ;
	$newDate = date ( 'Y-m-j' , $newDate );
	$newDate = strtotime($newDate);
	if( $newDate > $date){
		$invalid = true;
	?>
	<tr style="background-color: red;">
<?php 
	}else{
		$invalid = false;
		?> <tr> <?php
	}
?>	
	<td><input id="valid<?php echo $count; ?>" value="<?php echo $invalid; ?>"></td>
	<td><input type="text" id="input0<?php echo $count; ?>" value="<?php echo $fetch['nombre_marca']; ?>"></td>
	<td><input type="text" id="input1<?php echo $count; ?>" value="<?php echo $fetch['nombre']; ?>"></td>
	<td><input type="text" id="input2<?php echo $count; ?>" value="<?php echo $fetch['nromotor']; ?>"></td>
	<td><input type="text" id="input3<?php echo $count; ?>" value="<?php echo $fetch['nrochasis']; ?>"></td>
	<td><input type="text" id="input4<?php echo $count; ?>" value="<?php echo $fetch['color']; ?>"></td>
	<td><input type="text" id="input6<?php echo $count; ?>" value="<?php echo $fetch['garant_km']; ?>"></td>
	<td><input type="text" id="input7<?php echo $count; ?>" value="<?php echo $fetch['garantia_yy']; ?>"></td>
	<td><input type="text" id="input7<?php echo $count; ?>" value="<?php echo $fetch['fecha_venta']; ?>"></td>
	<td><input type="button" class="elegir" name="name" id="elegir<?php echo $count; ?>" value="Elegir"></td>
	<input type="text" id="input8<?php echo $count; ?>" value="<?php echo $fetch['idvehiculo']; ?>" hidden>
	<input type="text" id="id" value="<?php echo $fetch['idvehiculo']; ?>" hidden>
	
</tr>
<?php
$count += 1;
}
?>
</tbody>
</table>
  <script type="text/javascript">
	
	(function(){
		
		function mostrar(idButton, idInput, idInput2, idInput3, valid){
			document.getElementById( idButton ).onclick = function() {
				var valids = document.getElementById(valid);
				if( valids.value == false ){
					var vehiculo = document.getElementById( idInput ).value + " " + document.getElementById( idInput2 ).value;
					parent.document.getElementById( 'marca' ).value = vehiculo;
					parent.document.getElementById( 'idvehiculo' ).value = document.getElementById( idInput3 ).value;
				}else{
					alert("El vehiculo esta excedido del periodo de garantia");
				}
			}
		}
		
		function recorrer(){
			var buttons = document.getElementsByClassName('elegir');
			for( var x = 0; x < buttons.length; x++ ){				
				mostrar("elegir" + x , "input0" + x, "input1" + x, "input8" + x , "valid" + x);
			}
		}
		
		window.addEventListener( "load", function() { 
			recorrer();
		}, false );
	
	}());
  
  /*var boton = document.getElementById('elegir');
  boton.addEventListener("click", function(){
    var marca = document.getElementById('input0').value;
    var modelo = document.getElementById('input1').value;
    var id = document.getElementById('id').value;
    var grntKmt = document.getElementById('input6').value;
    parent.document.getElementById("marca").value = marca + " " + modelo;
    parent.document.getElementById("idvehiculo").value = id;
    parent.document.getElementById('grntKmt').value = grntKmt;
    });*/
  </script>
</body>
</html>
<?php
}
?>
