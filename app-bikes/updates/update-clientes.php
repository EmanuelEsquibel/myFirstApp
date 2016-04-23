<?php
session_start();
include('../inactivo.php');
$_SESSION['ultimoAcceso']= date("H:i:s");
//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){

			if( isset($_REQUEST['ci']) && isset($_REQUEST['nombre1']) && isset($_REQUEST['apellido1']) && isset($_REQUEST['apellido2']) && isset($_REQUEST['fecha_anno']) && isset($_REQUEST['fecha_mes'])&& isset($_REQUEST['fecha_dia']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['ciudad']) && isset($_REQUEST['nrotel'])){

      $idclientefk=$_REQUEST['edc'];
      $ci=$_REQUEST['ci'];
      $nombre1=$_REQUEST['nombre1'];
      $nombre2=$_REQUEST['nombre2'];
      $apellido1=$_REQUEST['apellido1'];
      $apellido2=$_REQUEST['apellido2'];
			$fecha_nac=$_REQUEST['fecha_anno']."-".$_REQUEST['fecha_mes']."-".$_REQUEST['fecha_dia'];
      $email=$_REQUEST['email'];
      $direccion=$_REQUEST['direccion'];
      $ciudad=$_REQUEST['ciudad'];
      $nrotel=$_REQUEST['nrotel'];


      include('../conexion.php');

      mysqli_query($conex,"UPDATE `personas` SET `ci`='$ci',`nombre1`='$nombre1',`nombre2`='$nombre2',`apellido1`='$apellido1',`apellido2`='$apellido2',`fecha_nac`='$fecha_nac' WHERE `idclientefk` = '$idclientefk'") or die("");

      mysqli_query($conex,"UPDATE `telefonosclientes` SET `nrotel`='$nrotel' WHERE `idclientefk3` = '$idclientefk'") or die("");

      mysqli_query($conex,"UPDATE `cliente` SET `email`='$email',`direccion`='$direccion',`ciudad`='$ciudad' WHERE `idcliente` = '$idclientefk'") or die("");

      header("Location: /app-bikes/selects/form-select-clientes.php?select1=personas&selectb=rut&select=ci&search=$ci&exito=1");
		}else{
			echo "Porfavor rellene todos los campos";
		}
  }else{
		header("Location: index-bikes.html");
	}
?>
