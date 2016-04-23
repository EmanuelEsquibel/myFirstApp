<?php
session_start();
if(isset($_SESSION['usercto']) && isset($_SESSION['statuscto'])){
	if($_REQUEST['descripcion'] && $_REQUEST['imp_sugerido']){
		
			$descripcion=$_REQUEST['descripcion'];
			$imp_sugerido=$_REQUEST['imp_sugerido'];

			include('conexion.php');
			$consulta=mysqli_query($conex, "INSERT INTO `item`(`iditem`, `descripcion`, `imp_sugerido`) VALUES('','$descripcion','$imp_sugerido')") or die("Error en consulta".mysqli_error($conex));

			header("location:alta-item-form.php");

	}else{
		echo "Por favor complete todos los campos";
	}

}else{
echo "Por favor inicie sesion <a href='http://localhost/index-centro.html' target='blank'>Login</a>";
}


?>
