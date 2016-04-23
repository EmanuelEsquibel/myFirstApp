<?php
session_start();
	//Consulta de usuarios
	include('conexion.php');
	$consulta=mysqli_query($conex, "SELECT idadmin, usuario, contrasena FROM administracion") or die("Error en consulta");
	//Mientra q la consulta devuelva valores
	while($consult=mysqli_fetch_array($consulta)){
		//Si el usuario y la contraseña ingresados coinciden con algun registro...
		if(strcmp($_POST['usuario'],$consult['usuario']) == 0 && crypt($_POST['contrasena'],$consult['contrasena']) == $consult['contrasena']){
		//Se crea una sesion q se mantendra mientas el navegador este abierto
		$usuario=$_POST['usuario'];
		$_SESSION['usercto']=$usuario;
		$_SESSION['statuscto']=true;
		$_SESSION['idusercto']=$consult['idadmin'];
		header('Location: loby-user.php');
		}else{
			//Si el usuario y la contraseña ingresados no coinciden con algun registro se vuelve al login con un error
			header('Location: login-user.php?user-error=1');
		}
	}
?>
