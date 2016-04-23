<?php
session_start();
unset($_SESSION['usercto']);
unset($_SESSION['statuscto']);
header("Location: http://localhost/index-centro.html");
?>
