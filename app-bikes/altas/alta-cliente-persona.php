<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	include('../inactivo.php');
	$_SESSION['ultimoAcceso']= date("H:i:s");
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
		//If para comprobar si se ingresaron datos en los textboxs
		if($_REQUEST['nombre1'] && $_REQUEST['apellido1'] && $_REQUEST['apellido2'] && $_REQUEST['ci'] && $_REQUEST['fecha_nac_año'] && $_REQUEST['fecha_nac_mes'] && $_REQUEST['fecha_nac_dia'] && $_REQUEST['email'] && $_REQUEST['telefono'] && $_REQUEST['direccion'] && $_REQUEST['ciudad']){
			//Pedido de valores
			$nombre1=$_REQUEST['nombre1'];
			$nombre2=$_REQUEST['nombre2'];
			$apellido1=$_REQUEST['apellido1'];
			$apellido2=$_REQUEST['apellido2'];
			$ci=$_REQUEST['ci'];
			$fecha_nac_año=$_REQUEST['fecha_nac_año'];
			$fecha_nac_mes=$_REQUEST['fecha_nac_mes'];
			$fecha_nac_dia=$_REQUEST['fecha_nac_dia'];
			$fecha_nac=$fecha_nac_año."-".$fecha_nac_mes."-".$fecha_nac_dia;
			$email=$_REQUEST['email'];
			$telefono=$_REQUEST['telefono'];
			$direccion=$_REQUEST['direccion'];
			$ciudad=$_REQUEST['ciudad'];
			function encriptar($password, $digito = 7) {
					$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
					$salt = sprintf('$2a$%02d$', $digito);
					for($i = 0; $i < 22; $i++)
						{
							$salt .= $set_salt[mt_rand(0, 22)];
						}
						return crypt($password, $salt);
				}
			$usuariop=$_REQUEST['usuariop'];
			$contrasenap=$_REQUEST['contrasenap'];
			$contrasenap=encriptar($contrasenap);
			//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
			include('../conexion.php');
			//Insercion de valores
			mysqli_query($conex, "INSERT INTO `cliente`(`idcliente`, `email`, `direccion`, `ciudad`) VALUES('','$email','$direccion','$ciudad')") or die("Error en consulta");
			mysqli_query($conex, "INSERT INTO `personas`(`ci`,`idclientefk`,`nombre1`,`nombre2`,`apellido1`,`apellido2`,`fecha_nac`) VALUES('$ci',LAST_INSERT_ID(),'$nombre1','$nombre2','$apellido1','$apellido2','$fecha_nac')") or die("Error en consulta");
			mysqli_query($conex, "INSERT INTO `telefonosclientes`(`idclientefk3`, `nrotel`) VALUES(LAST_INSERT_ID(),'$telefono')") or die("Error en consulta");
			mysqli_query($conex, "INSERT INTO `usuariop`(`idcliente`,`usuario`,`contrasena`,`marca_random`) VALUES(LAST_INSERT_ID(),'$usuariop','$contrasenap',null)");
			echo "Usuario agregado";
			header('Location: alta-cliente-persona-form.php?user=1');
		}else{
			//Si uno de los campos esta vacio, muestra el siguiente mensaje.
			echo "Rellene todos los campos";
		}
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
