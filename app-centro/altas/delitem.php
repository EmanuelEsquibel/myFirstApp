<?php
$variditem=$_REQUEST['iditem'];
include('conexion.php');
mysqli_query ( $conex, "DELETE FROM item WHERE `iditem` = '$variditem' ");
mysqli_query ( $conex, "DELETE FROM srviciositem WHERE `iditem` = '$variditem' ");
header("location:alta-item-form.php");
?>
