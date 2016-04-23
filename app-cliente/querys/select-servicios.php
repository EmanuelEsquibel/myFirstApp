<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php include('../config/auth.php'); ?>
<link rel="stylesheet" href="../styles/servicios.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../js/jquery.mobile-1.4.5.css">
<script type="text/javascript" src="../jquery-1.11.3.js"></script>
<script type="text/javascript" src="../js/jquery.mobile-1.4.5.js"></script>
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Servicios realizados</title>
</head>
  <body>
    <div data-role="page"  id="seccion1">
      <!--Cabecera -->
      <div data-role="header" align="center">
        <font>Servicios del vehiculo <span id="nombreMoto"> <?php echo $_REQUEST['nombre']; ?> </span> </font>
      </div>
        <!--Contenido. -->
        <div data-role="content">
        <table border="1" class="width200">
          <thead>
            <tr>
              <th>Servicio</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id_vehiculo = $_REQUEST['id'];
            include('../config/conection.php');
            $query = mysqli_query( $conex , "SELECT s.`idservicios`, s.`fecha` FROM servicios as s INNER JOIN vehiculos as v ON s.`idvehiculofk` = v.`idvehiculo` WHERE s.`idvehiculofk` = '{$id_vehiculo}' ") or die(mysqli_error($conex));
            $count = 0;
            while($queryArray = mysqli_fetch_array($query)){
            $count = $count + 1;
            ?>
            <tr>
              <td><a href="#seccion2" name="link"><?php echo $count; ?></a></td>
              <td><a href="#seccion2" name="link"><?php echo $queryArray['fecha']; ?></a></td>
              <td id="ver"><a id="verboton" data-ajax="false" data-role="button" href="datos-servicio.php?id=<?php echo $queryArray['idservicios']; ?>&fecha=<?php echo $queryArray['fecha']; ?>">Ver</a></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Footer -->
      <div data-role="footer" id="footer" align="center"  data-id="foo1" data-position="fixed">
        <br>
        <a href="../config/close-user.php" data-role="button" id="close" data-ajax="false" align="center">Cerrar sesion</a>
        <p>Consulta de servicios de mantenimiento</p>
      </div>
    </div>
  </body>
</html>
