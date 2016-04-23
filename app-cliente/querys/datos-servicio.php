<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php include('../config/auth.php'); ?>
<link rel="stylesheet" href="../styles/datos-servicio.css" media="screen" title="no title" charset="utf-8">
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
        <font>Servicio realizado el <span id="fechaS"> <?php echo $_REQUEST['fecha']; ?> </span> </font>
      </div>
        <!--Contenido. -->
        <div data-role="content">
          <ol data-role="listview">
            <?php
            $idservicio = $_REQUEST['id'];
            include('../config/conection.php');
            $consulta = mysqli_query($conex, " SELECT s.`fecha`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`detalle_prox`, a.`usuario`, s.`observaciones` FROM	`servicios` as s INNER JOIN administracion as a ON a.`idadmin` = s.`idadmin` WHERE s.`idservicios` = $idservicio") or die( mysqli_error($conex) );

            while($consult = mysqli_fetch_array($consulta)){
              ?>
                <li>Fecha del proximo servicio: <?php echo $consult['fecha_prox']; ?></li>
                <li>Kilometros: <?php echo $consult['kmt_actual']; ?></li>
                <li>Proximo servicio a los: <?php echo $consult['kmt_proxima']; ?></li>
                <li>Observaciones: <?php echo $consult['observaciones']; ?></li>
                <li>Detalles para el proximo servicio: <?php echo $consult['detalle_prox']; ?></li>
                <li>Ingresado por: <?php echo $consult['usuario']; ?></li>
            <?php
            }
            ?>
        </ol>
        <br>
        <ul style="background-color:white;width:100%;margin-left:-15px;">
          <li>Items usados</li>
        </ul>
        <br>
        <ol data-role="listview">
          <?php
          $idservicio = $_REQUEST['id'];
          include('../config/conection.php');
          $consulta = mysqli_query($conex, " SELECT i.`descripcion`, i.`imp_sugerido` ,srv.`importe`, srv.`cantidad` FROM	`srviciositem` as srv INNER JOIN `servicios` as s ON srv.`idserviciofk` = s.`idservicios` INNER JOIN `item` as i ON srv.`iditem` = i.`iditem` WHERE srv.`idserviciofk` = $idservicio") or die( mysqli_error($conex) );

          while($consult = mysqli_fetch_array($consulta)){
            ?>
              <li>
                <?php echo $consult['descripcion']; ?>
                <li>
                   <?php  echo "Valor unitario: " . $consult['imp_sugerido']; ?>
                </li>
                <li>
                   <?php  echo "Cantidad: " . $consult['cantidad']; ?>
                </li>
                <li>
                   <?php  echo "Importe total: " . $consult['importe']; ?>
                </li>
              </li>
              <br>
          <?php
          }
          ?>
      </ol>
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
