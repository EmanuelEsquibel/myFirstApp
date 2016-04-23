<?php
session_start();
include('../inactivo.php');
$_SESSION['ultimoAcceso']= date("H:i:s");
//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
		/*if($_REQUEST['select'] == "persona")){
			$cliente=$_REQUEST['pesona'];
		}elseif($_REQUEST['select'] == "empresa"){
			$cliente=$_REQUEST['empresa'];
		}
		*/
			//If para comprobar si se ingresaron datos en los textboxs
			if($_REQUEST['nromotor'] && $_REQUEST['nrochasis'] && $_REQUEST['color'] && $_REQUEST['fecha_venta_anno'] && $_REQUEST['fecha_venta_mes'] && $_REQUEST['fecha_venta_dia'] && $_REQUEST['marca'] && isset($_REQUEST['modelo']) && $_REQUEST['persona_empresa'] && $_REQUEST['vendedor'] && $_FILES['imagen-venta']['tmp_name']){
				//Pedido de valores
				$cliente=$_REQUEST['persona_empresa'];
				$nromotor=$_REQUEST['nromotor'];
				$nrochasis=$_REQUEST['nrochasis'];
				$color=$_REQUEST['color'];
				$fecha_venta_anno=$_REQUEST['fecha_venta_anno'];
				$fecha_venta_mes=$_REQUEST['fecha_venta_mes'];
				$fecha_venta_dia=$_REQUEST['fecha_venta_dia'];
				$marca=$_REQUEST['marca'];
				$modelo=$_REQUEST['modelo'];
				$vendedor=$_REQUEST['vendedor'];
				$fecha_venta=$fecha_venta_anno."-".$fecha_venta_mes."-".$fecha_venta_dia;
				//En la variable de entorno, $_FILES esta guardado el valor de la imagen que acabamos de subir, ['name'] es la id del input tipo file
				$imagen=$_FILES['imagen-venta']['tmp_name'];
				//En la variable destino se guarda la direccion donde vamos a guardar las imagenes cargadas concatenado con la imagen cargada y el nombre
				$destino="C:/wamp/www/web/app-bikes/venta_pics/".$_FILES['imagen-venta']['name']; //Ingresar donde se guardan las imagenes cargadas para despues usarlas con la db
				//Esta funcion lo que hace es mover la imagen cargada a el destino.
				move_uploaded_file($imagen,$destino);
				//Muestro informacion de la variable $_FILES, porque a veces da problemas
				var_dump($_FILES);
				//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
				include('../conexion.php');
				//Insercion de datos
				$consulta=mysqli_query($conex, "INSERT INTO `vehiculos`(`idvehiculo`, `nromotor`, `nrochasis`, `color`, `foto_path`, `fecha_venta`,`idclientefk4`,`idvendedorfk`,`idmodelofk`,`idmarcafk`) VALUES('','$nromotor','$nrochasis','$color','$destino','$fecha_venta','$cliente','$vendedor','$modelo','$marca')") or die("");
				//Destruyo la varaible para que no se quede guardada y de problemas si qremos cargar otra
				unset($_FILES['imagen']);
				echo "Venta agregado";
				header('Location: alta-vehiculo-form.php?user=1');
			}else{
				//Si uno de los campos esta vacio, muestra el siguiente mensaje.
				echo "Rellene todos los campos";
			}
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
