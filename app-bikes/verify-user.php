<?php
session_start();
//Consulta de usuarios
	include('conexion.php');
	$consulta = mysqli_query($conex, "SELECT usuario, contrasena FROM vendedores") or die("Error de conexion");
	//Si no hay registros en la base, se muestra un mensaje en el loby.
		if($consult -> num_rows == null){
			header("Location: login-user.php?user-error=1");
		}
	//Mientra q la consulta devuelva valores
	while($consult = mysqli_fetch_array($consulta)){
		//Si el usuario y la contraseña ingresados coinciden con algun registro...
		if(strcmp($_POST['usuario'],$consult['usuario']) == 0 && crypt($_POST['contrasena'],$consult['contrasena']) == $consult['contrasena']){
			//Se crea una sesion q se mantendra mientras el navegador este abierto
			$usrbks=$_POST['usuario'];
			$_SESSION['usrbks']=$usrbks;
			$_SESSION['status']="SI";
			$_SESSION['ultimoAcceso'] = date("H:i:s");
			header('Location: loby-user.php');
		}else{
			//Si el usuario y la contraseña ingresados no coinciden con algun registro se vuelve al login con un error
			header('Location: login-user.php?user-error=1');
		}
	}
?>
