<?php
  session_start();
  //Destruyo sesion
  unset($_SESSION['usrbks']);
  unset($_SESSION['status']);
  //Luego de hacer lo anterior se redirecciona al index de la aplicacion
  header("Location:  /index-bikes.html");
?>
