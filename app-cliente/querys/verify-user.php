<?php session_start();
	//Limpio los strings pasados para evitar inyeccions mysql.
	function clean($mensaje){
			$nopermitidos = array("'",'\\','<','>',"\"",";","=","#","%");
			$mensaje = str_replace($nopermitidos, "", $mensaje);
			return $mensaje;
	}
	$user = clean($_REQUEST['user']);
	$pass = clean($_REQUEST['password']);
	//Consulta de usuarios.
	include('../config/conection.php');
	$consulta = mysqli_query($conex, "SELECT idcliente, usuario, contrasena FROM usuariop WHERE 1") or die("Error de conexion");
	//Si no hay registros en la base, se muestra un mensaje en el loby.
	if($consulta -> num_rows == null){
		header("Location: ../index.php?user-error=1");
	}
	//Mientra q la consulta devuelva valores
	while($consult = mysqli_fetch_array($consulta)){
		//Si el usuario y la contraseña ingresados coinciden con algun registro...
		if(strcmp($user,$consult['usuario']) == 0 && crypt($pass,$consult['contrasena']) == $consult['contrasena']){
			//Se toma la id del cliente encontrador.
			$usuario_encontrado = $consult['idcliente'];
			//Se crea la sesion
			$_SESSION['ssusr'] = $_REQUEST['user'];
			$_SESSION['status'] = "yes";
			//Esta cookie es para identificar al usuario dentro de la app.
			setcookie("ckusrid", $usuario_encontrado, time()+60*60*24*30, "/");
			//Cookies
			//Si el usuario presiono en "No cerrar sesion se crean 2 cookies".
			if(isset($_REQUEST['keepSession'])){
				//Una con el nombre de usuario que servira de identificativo en la app.
				setcookie("ckusr", $_REQUEST['user'], time()+60*60*24*30, "/");
				//Y otra con una marca aleatoria por seguridad.
				//Esta cookie va a ser una marca aleatoria.
				mt_srand (time());
	     	//Generamos un número aleatorio
	     	$numero_aleatorio = mt_rand(1000000,999999999);
				//El numero se va a ingresar en una cookie.
				setcookie("ckbrand",$numero_aleatorio, time()+60*60*24*30, "/");
				//Update de marca_random con el numero aleatorio.
				mysqli_query($conex, "UPDATE usuariop SET marca_random = '$numero_aleatorio' WHERE idcliente = '$usuario_encontrado'") or die("Error de conexion");
			}
			$logueado = true;
			//Redireccionamos al loby
			header('Location: ../loby.php');
		}
	}
	if (!$logueado) {
		//Si el usuario y la contraseña ingresados no coinciden con algun registro se vuelve al login con un error
		header('Location: ../index.php?user-error=1');
	}
?>
