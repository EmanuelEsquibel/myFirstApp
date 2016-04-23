<?php
session_start();
include('../inactivo.php');
$_SESSION['ultimoAcceso']= date("H:i:s");
//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){

			if($_REQUEST['ed'] && $_REQUEST['rut'] && $_REQUEST['r_social'] && $_REQUEST['contacto'] && $_REQUEST['email'] && $_REQUEST['nrotel'] && $_REQUEST['direccion'] && $_REQUEST['ciudad']){

      $idclientefk2=$_REQUEST['ed'];
      $rut=$_REQUEST['rut'];
      $r_social=$_REQUEST['r_social'];
      $contacto=$_REQUEST['contacto'];
      $email=$_REQUEST['email'];
      $direccion=$_REQUEST['direccion'];
      $ciudad=$_REQUEST['ciudad'];
      $nrotel=$_REQUEST['nrotel'];

      include('../conexion.php');

      mysqli_query($conex,"UPDATE `empresas` SET `rut`='$rut',`r_social`='$r_social',`contacto`='$contacto' WHERE `idclientefk2` = '$idclientefk2'") or die("");

      mysqli_query($conex,"UPDATE `telefonosclientes` SET `nrotel`='$nrotel' WHERE `idclientefk3` = '$idclientefk2'") or die("");

      mysqli_query($conex,"UPDATE `cliente` SET `email`='$email',`direccion`='$direccion',`ciudad`='$ciudad' WHERE `idcliente` = '$idclientefk2'") or die("");

      header("Location:../selects/form-select-clientes.php?select1=empresas&selectb=rut&select=ci&search=$rut&exito=1");
		}else{
			echo "Porfavor rellene todos los campos";
		}
	}else{
		header("Location: index-bikes.html");
	}
?>
