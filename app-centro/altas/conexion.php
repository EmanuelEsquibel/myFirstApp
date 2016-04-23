<?php
$conex=mysqli_connect("localhost","root","") or die("Error en conexion");
mysqli_select_db($conex,"bikes") or die("Error en seleccion ,de base de datos");
?>