<?php
	//Cada vez que se utiliza las variables de sesion, se tiene que declarar esta funcion antes de usarlas.
	session_start();
	include('../inactivo.php');
	$_SESSION['ultimoAcceso']= date("H:i:s");
	//If para comprobar si el usuario esta logueado
	if(isset($_SESSION['usrbks']) && isset($_SESSION['status']))
		{
		//If para comprobar si se ingresaron datos en los textboxs
		if($_REQUEST['nombre'] && $_REQUEST['ano'] && $_REQUEST['combustible'] && $_REQUEST['garant_km'] && $_REQUEST['garant_yy'] && $_REQUEST['hp'] && $_REQUEST['cilindrada'] && $_REQUEST['marcas'] && $_REQUEST['velocidades'] && $_REQUEST['tipo_motor'] && $_FILES['imagen']['tmp_name']){
			//Pedido de valores
			$nombre=$_REQUEST['nombre'];
			$ano=$_REQUEST['ano'];
			$combustible=$_REQUEST['combustible'];
			$garant_km=$_REQUEST['garant_km'];
			$garant_yy=$_REQUEST['garant_yy'];
			$hp=$_REQUEST['hp'];
			$cilindrada=$_REQUEST['cilindrada'];
			$id_marca=$_REQUEST['marcas'];
			$baul=isset($_REQUEST['baul']);
			$canasto=isset($_REQUEST['canasto']);
			$encendido_elec=isset($_REQUEST['encendido_elec']);
			$velocidades=$_REQUEST['velocidades'];
			$automatico=isset($_REQUEST['automatico']);
			$tipo_motor=$_REQUEST['tipo_motor'];
			$freno_disco=isset($_REQUEST['freno_disco']);
			//La conexion esta declarada en el archivo conexion.php y se incluye mediante include, esto es para no declarar la conexion en cada formulario.
			include('../conexion.php');
			//En la variable de entorno, $_FILES esta guardado el valor de la imagen que acabamos de subir, ['name'] es la id del input tipo file
			$imagen=$_FILES['imagen']['tmp_name'];
			//En la variable destino se guarda la direccion donde vamos a guardar las imagenes cargadas concatenado con la imagen cargada y el nombre
			$destino="C:/wamp/www/web/app-bikes/modelo_pics/".$_FILES['imagen']['name'];
			//Esta funcion lo que hace es mover la imagen cargada a el destino.
			move_uploaded_file($imagen,$destino);
			//Muestro informacion de la variable $_FILES, porque a veces da problemas
			var_dump($_FILES);
			//Insercion de datos
			$consulta=mysqli_query($conex, "INSERT INTO `modelo`(`idmodelo`, `nombre`, `anno`, `combustible`, `garant_km`, `garantia_yy`, `foto_path_modelo`, `hp`, `cilindrada`, `idmarcafk2`,`freno_disco`, `baul`, `canasto`, `encendido_elec`, `velocidades`, `automatico`, `tipo_motor`) VALUES('','$nombre','$ano','$combustible','$garant_km','$garant_yy','$destino','$hp','$cilindrada','$id_marca','$freno_disco','$baul','$canasto','$encendido_elec','$velocidades','$automatico','$tipo_motor')") or die("Error en consulta");
			//Destruyo la varaible para que no se quede guardada y de problemas si qremos cargar otra
			unset($_FILES['imagen']);
			echo "Marca agregada";
			header('Location: ingreso-modelo-vehiculo-form.php?user=1');
			include('inactivo.php');
		}else{
			//Si uno de los campos esta vacio, muestra el siguiente mensaje.
			echo "Porfavor complete todos los campos";
			}
	}else{
		//Si no esta logueado se muestra este link
		echo "Porfavor inicie sesion <a href='http://localhost/index-bikes.html' target='blank'>Ir</a>";
		}
?>
