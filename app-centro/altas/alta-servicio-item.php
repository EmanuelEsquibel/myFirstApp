<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
	if($_REQUEST['item'] && $_REQUEST['importe'] && $_REQUEST['cantidad']){

$item=$_REQUEST['item'];
$importe=$_REQUEST['importe'];
$cantidad=$_REQUEST['cantidad'];

include('conexion.php');

$consulta=mysqli_query($conex, "INSERT INTO `srviciositem`(`idsrvicio`, `iditem`, `importe`, `cantidad`) VALUES('','$item','$importe','$cantidad')") or die("Error en consulta".mysqli_error($conex));

echo "Item agregado";

	}else{
			echo "Por favor complete todos los campos";
		 }

}else{
echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}
?>
