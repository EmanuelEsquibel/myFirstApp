<?php
session_start();
include('../inactivo.php');
if(isset($_SESSION['usrbks']) && isset($_SESSION['status'])){

if(isset($_REQUEST['rut']) && isset($_REQUEST['r_social']) && isset($_REQUEST['contacto']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['ciudad']) && isset($_REQUEST['nrotel']) && isset($_REQUEST['ed'])){
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
          <form action="update-clientes-empresa.php" method="POST">
            <h3 id="titulo">Ingrese los nuevos valores</h3>
            <br>
            <br>
            <input type="text" name="ed" value="<?php echo $_REQUEST['ed']; ?>" hidden><br>
            <div id="divizquierda">
              <div id="datosi">
                RUT
                <input type="text" name="rut" value="<?php echo $_REQUEST['rut']; ?>" class="inputs" maxlength="12" pattern="[0-9]{0,12}" required>
                <br>
                Razon Social
                <input type="text" name="r_social" value="<?php echo $_REQUEST['r_social'];?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}">
                <br>
                Contacto
                <input type="text" name="contacto" value="<?php echo $_REQUEST['contacto']; ?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}" required>
                <br>
                Email
                <input type="email" name="email" value="<?php echo $_REQUEST['email']; ?>" class="inputs" maxlength="45" required>
                <br>
                Direccion
                <input type="text" name="direccion" value="<?php echo $_REQUEST['direccion']; ?>" class="inputs" maxlength="45" pattern="[" "a-zA-Z]{1,45}">
              </div>
            </div>
            <div id="divderecha">
              <div id="datosd">
                Ciudad
                <input type="text" name="ciudad" value="<?php echo $_REQUEST['ciudad']; ?>" class="inputs"  maxlength="45" pattern="[" "a-zA-Z]{1,45}" required>
                <br>
                Numero de telefono
                <input type="text" name="nrotel" value="<?php echo $_REQUEST['nrotel']; ?>" class="inputs"  maxlength="45" pattern="[0-9]{1,11}" required>
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
  }else{
    echo "Porfavor rellene todos los campos";
  }
}else{
  echo "Porfavor logueese <a href='/index-bikes.html' target='blank'>Ir</a>";
}
?>
