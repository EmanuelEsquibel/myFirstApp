<?php
session_start();
include('../inactivo.php');
if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){

  if( isset($_REQUEST['ci']) && isset($_REQUEST['nombre1']) && isset($_REQUEST['nombre2']) && isset($_REQUEST['apellido1']) && isset($_REQUEST['apellido2']) && isset($_REQUEST['fecha_nac']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['ciudad']) && isset($_REQUEST['nrotel'])){
    ?>
    <html>
    <head>
      <title>Update cliente</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="/app-bikes/styles/form-update-cliente.css">
    </head>
  <body>
        <?php
          $_SESSION['ultimoAcceso']= date("H:i:s");
        ?>
        <div class="general" align="center">
          <form action="/app-bikes/updates/update-clientes.php" method="POST">
            <h3 id="titulo">Ingrese los nuevos valores</h3>
            <br>
            <br>
            <input type="text" name="edc" value="<?php echo $_REQUEST['edc']; ?>" style="display:none;" hidden>
            <br>
            <div id="divizquierda">
              <div id="datosi">
                <?php
                $fecha_nac=$_REQUEST['fecha_nac'];
                $fechacute=explode("-",$fecha_nac);
                ?>
                Fecha
                <div id="divfecha">
                  <input type="text" name="fecha_anno" class="inputsfecha"  value="<?php echo $fechacute[0];?>" maxlength="4" pattern="[0-9]{0,4}" required>  /
                  <input type="text" name="fecha_mes"  class="inputsfecha" value="<?php echo $fechacute[1];?>" maxlength="2" pattern="[0-9]{0,4}" required>  /
                  <input type="text" name="fecha_dia"  class="inputsfecha" value="<?php echo $fechacute[2];?>" maxlength="2" pattern="[0-9]{0,4}" required>
                </div>
                <br>
                Ci
                <input type="text" name="ci" value="<?php echo $_REQUEST['ci']; ?>" class="inputs"   maxlength="8" pattern="[0-9]{8,8}" required>
                <br>
                Nombre 1
                <input type="text" name="nombre1" value="<?php echo $_REQUEST['nombre1'];?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{0,45}">
                <br>
                Nombre 2
                <input type="text" name="nombre2" value="<?php echo $_REQUEST['nombre2']; ?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}">
                <br>
                Apellido 1
                <input type="text" name="apellido1" value="<?php echo $_REQUEST['apellido1']; ?>" class="inputs"  maxlength="45" pattern="[" "a-zA-Z]{1,45}" required>
                <br>
                Apellido 2
                <input type="text" name="apellido2" value="<?php echo $_REQUEST['apellido2']; ?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}">
                <br>
              </div>
            </div>
            <div id="divderecha">
              <div id="datosd">
                Email
                <input type="email" name="email" value="<?php echo $_REQUEST['email']; ?>" class="inputs" required>
                <br>
                Direccion
                <input type="text" name="direccion" value="<?php echo $_REQUEST['direccion']; ?>" class="inputs"  maxlength="45" pattern="[" "a-zA-Z0-9]{1,45}" required>
                <br>
                Ciudad
                <input type="text" name="ciudad" value="<?php echo $_REQUEST['ciudad']; ?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" required>
                <br>
                Numero de telefono
                <input type="text" name="nrotel" value="<?php echo $_REQUEST['nrotel']; ?>" class="inputs" maxlength="11" pattern="[0-9]{0,11}" required>
                <br>
              </div>
            </div>
            <br>
            <input type="submit" name="name" value="Editar" class="submit">
          </form>
        </div>
      </body>
    </html>
    <?php
  }
}
?>
