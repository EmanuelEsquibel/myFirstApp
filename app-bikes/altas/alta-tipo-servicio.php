<?php
	session_start();
	include('../inactivo.php');
	$_SESSION['ultimoAcceso']= date("H:i:s");
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
		{
		//If para comprobar si se ingresaron datos en los textboxs
		if($_REQUEST['tipo'] && $_REQUEST['detalle']){
			//Pedido de valores
			$tipo=$_REQUEST['tipo'];
			$detalle=$_REQUEST['detalle'];
			//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
			include('../conexion.php');
			//Insercion de valores
			$consulta=mysqli_query($conex, "INSERT INTO `tiposervicio`(`idtiposervicio`, `tipo`, `detalle`) VALUES('','$tipo','$detalle')") or die("Error en consulta");
			echo "Tipo agregado";
			header('Location: alta-tipo-servicio-form.php?user=1');
		}else{
			//Si uno de los campos esta vacio, muestra el siguiente mensaje.
			echo "Rellene todos los campos";
		}
	}else{
		//Si no esta logueado se muestra este link
		echo "Inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
