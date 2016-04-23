<?php
//Borramos las cookies con -1.
setcookie("ckusr","",-1,"/");
setcookie("ckbrand","",-1,"/");
setcookie("usrid","",-1,"/");
//Cookie para identificar al usuario con su en la aplicacion.
setcookie("ckusrid","",-1,"/");
//Borramos las sesiones con unset
session_start();
//Rompemos las variables de session por seguridad.
unset($_SESSION['ssusr']);
unset($_SESSION['statusC']);
unset($_SESSION['usrid']);
//Destruimos sesion.
header("Location: ../index.php");
?>
