<?php
session_start();
include('../../inactivo.php');
$_SESSION['ultimoAcceso']= date("H:i:s");
//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
		{
			//If para comprobar si se ingresaron datos en los textboxs
			if($_REQUEST['usuario'] && $_REQUEST['contrasena']){
				function encriptar($password, $digito = 7) {
				$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				$salt = sprintf('$2a$%02d$', $digito);
				for($i = 0; $i < 22; $i++)
					{
						$salt .= $set_salt[mt_rand(0, 22)];
					}
						return crypt($password, $salt);
				}
				//Pedido de valores
				$usuario=$_REQUEST['usuario'];
				$contrasena=$_REQUEST['contrasena'];
				$contrasena=encriptar($contrasena);
				include('../conexion.php');
				$consulta=mysqli_query($conex, "INSERT INTO `vendedores`(`idvendedor`, `usuario`, `contrasena`) VALUES('','$usuario','$contrasena')") or die("Error en consulta");
				echo "Vendedor agregado";
				header('Location: alta-vendedor-bikes-form.php?user=1');
			}else{
				echo "Rellene todos los campos";
			}
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
