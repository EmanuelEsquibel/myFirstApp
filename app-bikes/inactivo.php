<?php
$ultimoAcceso = $_SESSION['ultimoAcceso'];
$ahora = date("H:i:s");
$tiempo_transcurrido = strtotime($ahora) - strtotime($ultimoAcceso);
//comparamos el tiempo transcurrido
 if($tiempo_transcurrido >= 900) {
   //si pasaron 15 minutos o más
   unset($_SESSION['usrbks']);
   unset($_SESSION['status']);
   unset($_SESSION['ultimoAcceso']);
   echo "<script type='text/javascript'>
          alert('Sesion caducada');
          window.top.location.href='http://localhost/index-bikes.html';
         </script>";
 }
 ?>
