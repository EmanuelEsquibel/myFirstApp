<?php
// Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
session_start ();
include ('../inactivo.php');
$_SESSION ['ultimoAcceso'] = date ( "H:i:s" );
// If para comprobar si el usuario esta logueado
if (isset ( $_SESSION ['usrbks'] ) && isset ( $_SESSION ['status'] )) {
	// If para comprobar si se ingresaron datos en los textboxs
	if (isset($_REQUEST ['usuario']) &&  isset($_REQUEST['contrasena']) && isset($_REQUEST ['centros'])) {
		// Pedido de valores
		$usuario = $_REQUEST ['usuario'];
		$contrasena = $_REQUEST ['contrasena'];
		$centro_aut = $_REQUEST ['centros'];
		function encriptar($password, $digito = 7) {
			$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$salt = sprintf ( '$2a$%02d$', $digito );
				for($i = 0; $i < 22; $i ++) {
					$salt .= $set_salt [mt_rand ( 0, 22 )];
				}
			return crypt ( $password, $salt );
		}
		// Encriptacion de contraseñas
		$contrasena=encriptar($contrasena);
		// La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
		include ('../conexion.php');
		// Insercion de valores
		$consulta = mysqli_query ( $conex, "INSERT INTO `administracion`(`idadmin`, `usuario`, `contrasena`, `idcentrofk`) VALUES('','$usuario','$contrasena','$centro_aut')" ) or die ( "Error en consulta");
		echo "Administrador de centro agregado";
		header ( 'Location: alta-centro-autorizado-admin-form.php?user=1' );
	} else {
		// Si uno de los campos esta vacio, muestra el siguiente mensaje.
		echo "Rellene todos los campos";
	}
} else {
	// Si no esta logueado se muestra este link
	echo "Inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
}
?>
