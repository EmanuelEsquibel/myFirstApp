<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	include('../inactivo.php');
	$_SESSION['ultimoAcceso']= date("H:i:s");
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
		//If para comprobar si se ingresaron datos en los textboxs
		if($_POST['rut'] && $_POST['razon_soc'] && $_POST['responsable'] && $_POST['direccion']){
				//Pedido de valores
				$rut=$_REQUEST['rut'];
				$razon_soc=$_REQUEST['razon_soc'];
				$responsable=$_REQUEST['responsable'];
				$direccion=$_REQUEST['direccion'];
				$telefono=$_REQUEST['telefono'];
				//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
				include('../conexion.php');
				//Insercion de valores
				$consulta=mysqli_query($conex, "INSERT INTO `centroautorizado`(`idcentroautorizado`, `rut`, `razon_soc`, `responsable`, `direccion`) VALUES('','$rut','$razon_soc','$responsable','$direccion')") or die("Error en consulta");
				$consulta2=mysqli_query($conex, "INSERT INTO `telefonoscentros`(`idcentro`, `nrotelcentro`) VALUES(LAST_INSERT_ID(),'$telefono')") or die("Error en consulta ");
				echo "Centro autorizado agregado";
				header('Location: alta-centro-autorizado-form.php?user=1');
				include('inactivo.php');
		}else{
			//Si uno de los campos esta vacio, muestra el siguiente mensaje.
			echo "Rellene todos los campos";
			}
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
