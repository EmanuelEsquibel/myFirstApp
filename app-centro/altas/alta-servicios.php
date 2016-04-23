<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
 	if($_REQUEST['aneo'] && $_REQUEST['mes'] && $_REQUEST['dia'] && $_REQUEST['observaciones'] && $_REQUEST['detalle_prox'] && $_REQUEST['fecha_prox'] && $_REQUEST['kmt_actual'] && $_REQUEST['kmt_proxima'] && $_REQUEST['idvehiculo'] && $_REQUEST['maximo']){

		$admin=$_SESSION['idusercto'];
		$fecha=$_REQUEST['aneo']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
		$idvehiculo=$_REQUEST['idvehiculo'];

		$tipo = 1;
		$estado="Agendado";

		$detalle_prox=$_REQUEST['detalle_prox'];
		$observaciones=$_REQUEST['observaciones'];

		$fecha_prox=$_REQUEST['fecha_prox'];
		$kmt_actual=$_REQUEST['kmt_actual'];
		$kmt_proxima=$_REQUEST['kmt_proxima'];

		$maximo=$_REQUEST['maximo'];

		include('conexion.php');
		//Ingreso un servicio.
		mysqli_query($conex, "INSERT INTO `servicios`(`idservicios`, `fecha`, `observaciones`, `estado`, `detalle_prox`, `fecha_prox`, `kmt_actual`, `kmt_proxima`, `idvehiculofk`, `idadmin`, `idtipotiposerviciofk`)
		VALUES(null,'$fecha','$observaciones','$estado','$detalle_prox','$fecha_prox','$kmt_actual','$kmt_proxima','$idvehiculo','$admin', 1)") or die("Error en consulta 1".mysqli_error($conex));


		//Consulto la ultima id de la tabla issrvicio.
		$consulta = mysqli_query($conex, "SELECT idservicios FROM servicios WHERE 1 ORDER BY idservicios DESC LIMIT 1") or die("consulta 2".mysqli_error($conex));
		$array=mysqli_fetch_array($consulta);
		//Le sumo uno a la id para que se ingrese en la siguiente posicion.
		$idservicio = $array[0];
		//Recorro las variables pasadas por post que van a contener los datos de las tareas e ingreso sus valores en srviciositem.
		for ($x=1; $x <= $maximo; $x++) {
			$item = $_REQUEST['item1'.$x];
			$item1 = explode("-", $item);
			$srvitem3=$_REQUEST['srvitem3'.$x];
			$srvitem4=$_REQUEST['srvitem4'.$x];
			mysqli_query($conex, "INSERT INTO `srviciositem`(`idsrvicio`, `iditem`, `importe`, `cantidad`, `idserviciofk`) VALUES(null,'$item1[0]','$srvitem4','$srvitem3','$idservicio')");
		}

		echo "Servicio agregado";
		header("Location: alta-servicios-form.php?user=1");

	}else{
		echo "Por favor complete todos los campos";
	}
}else{
	echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}
?>
