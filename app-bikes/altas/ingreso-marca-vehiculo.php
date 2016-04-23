<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	include('../inactivo.php');
	$_SESSION['ultimoAcceso']= date("H:i:s");
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
		{
			//If para comprobar si se ingresaron datos en los textboxs
			if($_REQUEST['nombre_marca'] && $_REQUEST['origen_marca']){
				//Pedido de valores
				$nombre_marca=$_REQUEST['nombre_marca'];
				$origen_marca=$_REQUEST['origen_marca'];
				//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
				include('../conexion.php');
				//Insercion de valores
				$consulta=mysqli_query($conex, "INSERT INTO `marca`(`idmarca`, `nombre`, `origen`) VALUES('','$nombre_marca','$origen_marca')") or die("Error en consulta");
				echo "Marca agregada";
				header('Location: ingreso-marca-vehiculo-form.php?user=1');
			}else{
				//Si uno de los campos esta vacio, muestra el siguiente mensaje.
				echo "Porfavor rellene todos los campos";
			}
	}else{
	//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
