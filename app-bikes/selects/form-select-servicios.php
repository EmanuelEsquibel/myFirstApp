<?php
session_start();
if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){
include('../inactivo.php');
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/app-bikes/styles/selects.css">
<title>Log de servicios</title>
</head>
<body>
<?php
$_SESSION['ultimoAcceso']= date("H:i:s");
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<div class="general">
	<h3 id="titulo">Log de servicios</h3>
  <br>
  <div id="menu">

    Buscar servicios por

    <select name="selectC" id="selectC" style="background-color: 149583;">
      <option value="ci" selected>Personas[CI]</option>
      <option value="rut">Empresas[RUT]</option>
      <option value="fecha">Fecha</option>
    </select>

    <select name="fecha" id="fecha" style="background-color: 149583;display:none;">
      <option disabled selected>Parametros</option>
      <option value="=" >En la fecha</option>
      <option value=">">Despues de la fecha</option>
      <option value="<">Antes de la fecha</option>
    </select>
    <script type="text/javascript">
      function mostrar(){
        var fechaoption = document.getElementById('selectC');
        fechaoption.addEventListener('change', function() {
          if ( fechaoption.value == "fecha" ) {
            document.getElementById('fecha').style.display='inline';
          } else {
            document.getElementById('fecha').style.display='none';
            document.getElementById('fecha').selectedIndex = 0;
          }
        });
      }
      mostrar();
    </script>
    <input type="text" name="search" style="background-color: 149583;" id="search">
    <input type="submit" value="Buscar" id="buscar">
  </div>
</form>
  <br>
  <br>
  <hr>
<div id="frame">
<div id="resultadosp">
<?php
  if( isset($_REQUEST['selectC']) && isset($_REQUEST['search']) && !isset($_REQUEST['fecha'])){
    if($_REQUEST['selectC'] == 'ci'){

      $combo = $_REQUEST['selectC'];
      $search = $_REQUEST['search'];

      include('buscar-personas.php');

    }elseif($_REQUEST['selectC'] == 'rut'){

        $combo2 = $_REQUEST['selectC'];
        $search2 = $_REQUEST['search'];

        include('buscar-empresas.php');

    }
  }elseif( isset($_REQUEST['selectC']) && isset($_REQUEST['search']) && isset($_REQUEST['fecha'])){

    $combo = $_REQUEST['selectC'];
    $search = $_REQUEST['search'];
    $parametro = $_REQUEST['fecha'];

    include('buscar-servicios-fecha.php');

  }
?>
</div>
</div>
</div>
</body>
</html>
<?php
}else{
//Si no se encuentra logueado alguien se redirecciona al login
header('Location: login-user.php');
}
?>
