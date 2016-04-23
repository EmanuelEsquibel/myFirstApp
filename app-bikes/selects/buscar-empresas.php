<?php
  include('../conexion.php');
$consulta2 = mysqli_query ( $conex, " SELECT e.`rut` ,s.`estado`, s.`fecha`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`detalle_prox`, s.`idadmin`, s.`observaciones`, s.`idtipotiposerviciofk` FROM `servicios` as s, `vehiculos` as v, `empresas` as e WHERE	(e.`$combo2` = '$search2') AND v.`idclientefk4` = e.`idclientefk2` AND s.`idvehiculofk` = v.`idvehiculo` ") or die( mysqli_error($conex) );

if($consultaif2 = mysqli_fetch_array($consulta2)){
    ?>
    <table border="2" class="width200">
      <thead>
        <tr>
          <th>RUT</th>
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

        include('../conexion.php');

        $consulta22 = mysqli_query ( $conex, " SELECT e.`rut` ,s.`estado`, s.`fecha`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`detalle_prox`, s.`idadmin`, s.`observaciones`, s.`idtipotiposerviciofk` FROM `servicios` as s, `vehiculos` as v, `empresas` as e WHERE	(e.`$combo2` = '$search2') AND v.`idclientefk4` = e.`idclientefk2` AND s.`idvehiculofk` = v.`idvehiculo` ") or die( mysqli_error($conex) );

        while($consult22 = mysqli_fetch_array($consulta22)){
          ?>
          <tr>
            <td><?php echo $consult22['rut']; ?></td>
            <td><?php echo $consult22['estado']; ?></td>
            <td><?php echo $consult22['fecha']; ?></td>
            <td><?php echo $consult22['fecha_prox']; ?></td>
            <td><?php echo $consult22['kmt_actual']; ?></td>
            <td><?php echo $consult22['kmt_proxima']; ?></td>
            <td><?php echo $consult22['detalle_prox']; ?></td>
            <td><?php echo $consult22['idadmin']; ?></td>
            <td><?php echo $consult22['observaciones']; ?></td>
            <td><?php echo $consult22['idtipotiposerviciofk']; ?></td>
          </tr>
          <?php
        }
      ?>
      </tbody>
  </table>
  <?php
}else{
   echo "Resultados no encontrados para empresas";
  }
?>
