<?php session_start();

  if( ( isset ( $_SESSION['ssusr'] ) && isset ( $_SESSION['statusC'] ) ) || ( isset( $_COOKIE['ckusr'] ) && isset ( $_COOKIE['ckbrand'] ) ) ){
    header("Location: loby.php");
  }

?>
