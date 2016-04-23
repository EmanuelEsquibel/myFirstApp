<!DOCTYPE html>
<html style="margin-top:-9px;">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/form-venta-modelo-persona.css" charset="utf-8">
    <title></title>
		<script type="text/javascript">
			function enviarmodelo(select2){
				select2=select2.value;
				parent.recibirmodelo(select2);
			}
		</script>
  </head>
  <body>
<div align="center">

    <br>
Modelo <select name="modelo" class="select" style="width:200px;" required>
          <option disabled selected>Ingrese un modelo</option>
          <?php
          if(isset($_REQUEST['marca'])){
          $idmarca=$_REQUEST['marca'];
          }
          include('../conexion.php');
          $consulta0 = "SELECT idmodelo, nombre FROM modelo WHERE idmarcafk2 = $idmarca";
          $consulta=mysqli_query($conex, $consulta0) or die(mysqli_error());
          while($consultaw=mysqli_fetch_array($consulta)){
            ?>
            <option value="<?php echo $consultaw['idmodelo']; ?>" onclick="enviarmodelo(this);"><?php echo $consultaw['nombre']; ?></option>
            <?php
          }
          ?>
        </select>

      </div>
  </body>
</html>
