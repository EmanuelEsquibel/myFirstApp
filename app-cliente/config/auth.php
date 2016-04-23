<?php session_start();
// Si existe la sesion se cumple, o si existe una cookie tambien se logue.
if((isset($_SESSION['ssusr']) && isset($_SESSION['status'])) || (isset($_COOKIE['ckusr']) && isset($_COOKIE['ckbrand']) && $_COOKIE["ckusr"]!="" && $_COOKIE["ckbrand"]!="")){
// Si se encontro la cookie se cerifica que esta no este vacia.
// Si no se encuentra la cookie se loguea con la session.
  if(isset($_COOKIE['ckusr']) && isset($_COOKIE['ckbrand']) && $_COOKIE["ckusr"] != "" &&  $_COOKIE["ckbrand"] != ""){
      // Incluimos la conexion
      include('conection.php');
      // Buscamos en la db el usuario de la cookie con su respectiva marca_random.
      $sql = mysqli_query($conex, "SELECT * FROM usuariop WHERE usuario = '{$_COOKIE['ckusr']}' AND marca_random = '{$_COOKIE['ckbrand']}' ");
      // Creamos un array de la consulta.
      $sqlArray = mysqli_fetch_array($sql);
      // Si se encontro un usuario en la consulta, se compara.
      if(strcmp( $_COOKIE['ckusr'] , $sqlArray['usuario'] ) != 0 && strcmp( $_COOKIE['ckbrand'] , $sqlArray['marca_random'] ) != 0){
        header("Location: index.php?user-error=1");
      }
    }
      // Si se loguea por sesion o por cookie se crea una variable donde almacena el nombre del usuario..
      // para identificarlo dentro de la app.
      // Creo una cookie para guardar el nombre del usuario porque da problemas llamarlo desde una variable.
      if(isset($_SESSION['ssusr'])){
        $userID = $_SESSION['ssusr'];
        setcookie("usrid", $userID , time()+60*60*24*30, "/");
      }elseif(isset($_COOKIE['ckusr'])){
        $userID = $_COOKIE['ckusr'];
        setcookie("usrid", $userID , time()+60*60*24*30, "/");
      }
  }else{
    header("Location: /app-cliente/index.php?user-error=1");
  }
?>
