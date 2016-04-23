<?php
include('../conexion.php');

if( isset($_REQUEST['search']) && isset($_REQUEST['fecha']) ){

  $search2 = $_REQUEST['search'];
  $fecha = $_REQUEST['fecha'];
}
$consultaporfecha = mysqli_query($conex, " SELECT s.`idvehiculofk`, c.`idcliente`, s.`fecha`, s.`estado`, s.`detalle_prox`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`observaciones`, s.`idadmin`, s.`idtipotiposerviciofk` FROM `servicios` AS s, `vehiculos` AS v, `cliente` AS c WHERE `fecha` $fecha '$search2' AND v.`idvehiculo` = s.`idvehiculofk` AND c.`idcliente` = v.`idclientefk4` ") or die( mysqli_error($conex) );

if($consultafecha = mysqli_fetch_array($consultaporfecha)){
    ?>
    <table border="2" class="width200">
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Estado del servicio</th>
          <th>Fecha</th>
          <th>Proxima fecha</th>
          <th>Km actual</th>
          <th>Km prox serv</th>
          <th>Detalle prox serv</th>
          <th>Ingresado por</th>
          <th>Obsrvciones</th>
          <th>Tipo de servicio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if( isset($_REQUEST['search']) && isset($_REQUEST['fecha']) ){
          $search2 = $_REQUEST['search'];
          $fecha = $_REQUEST['fecha'];
        }
        $consultaporfecha2 = mysqli_query($conex,
        "SELECT
              v.`nromotor`,
              c.`email`,
              s.`fecha`,
              s.`estado`,
              s.`detalle_prox`,
              s.`fecha_prox`,
              s.`kmt_actual`,
              s.`kmt_proxima`,
              s.`observaciones`,
          	  a.`usuario`,
              s.`idtipotiposerviciofk`
          FROM
              `servicios` AS s,
              `vehiculos` AS v,
              `cliente` AS c,
              `administracion` AS a
          WHERE
          	`fecha` $fecha '$search2'
          	AND v.`idvehiculo` = s.`idvehiculofk`
          	AND c.`idcliente` = v.`idclientefk4`
          	AND a.`idadmin` =  s.`idadmin`") or die( mysqli_error($conex) );

        while($consultf = mysqli_fetch_array($consultaporfecha2)){
          ?>
          <tr>
            <td><?php echo $consultf['email']; ?></td>
            <td><?php echo $consultf['estado']; ?></td>
            <td><?php echo $consultf['fecha']; ?></td>
            <td><?php echo $consultf['fecha_prox']; ?></td>
            <td><?php echo $consultf['kmt_actual']; ?></td>
            <td><?php echo $consultf['kmt_proxima']; ?></td>
            <td><?php echo $consultf['detalle_prox']; ?></td>
            <td><?php echo $consultf['usuario']; ?></td>
            <td><?php echo $consultf['observaciones']; ?></td>
            <td><?php echo $consultf['idtipotiposerviciofk']; ?></td>
          </tr>
          <?php
        }
      ?>
      </tbody>
  </table>
  <?php
    }else{
    echo "Resultados no encontrados para personas";
    }
    ?>
