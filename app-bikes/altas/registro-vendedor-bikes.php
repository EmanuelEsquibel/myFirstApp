<?php

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
				header('Location: http://localhost/alta-vendedor-bikes-form.php?user=1');
			}

?>
