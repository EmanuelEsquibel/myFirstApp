<?php
  //Aca declaramos la conexion para usos en esta carpeta, para alterar la conexion de las altas, ahi hay un archivo igual dentro de altas
  $conex=mysqli_connect("localhost","root","") or die("Error en conexion");
  mysqli_select_db($conex,"bikes") or die("Error en seleccion ,de base de datos");
?>
