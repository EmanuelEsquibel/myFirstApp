<?php
include('../conexion.php');

$consulta1 = mysqli_query($conex, " SELECT p.`ci`, s.`estado`, s.`fecha`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`detalle_prox`, s.`idadmin`, s.`observaciones`, s.`idtipotiposerviciofk` FROM	`servicios` as s, `personas` as p, `vehiculos` as v  WHERE  p.`$combo` = '$search' AND v.`idclientefk4` = p.`idclientefk` AND s.`idvehiculofk` = v.`idvehiculo`") or die( mysqli_error($conex) );

if($consultaif = mysqli_fetch_array($consulta1)){
    ?>
    <table border="2" class="width200">
      <thead>
        <tr>
          <th>CI</th>
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
        $consulta = mysqli_query($conex, " SELECT p.`ci`, s.`estado`, s.`fecha`, s.`fecha_prox`, s.`kmt_actual`, s.`kmt_proxima`, s.`detalle_prox`, s.`idadmin`, s.`observaciones`, s.`idtipotiposerviciofk` FROM	`servicios` as s, `personas` as p, `vehiculos` as v  WHERE  p.`$combo` = '$search' AND v.`idclientefk4` = p.`idclientefk` AND s.`idvehiculofk` = v.`idvehiculo`") or die( mysqli_error($conex) );

        while($consult = mysqli_fetch_array($consulta)){
          ?>
          <tr>
            <td><?php echo $consult['ci']; ?></td>
            <td><?php echo $consult['estado']; ?></td>
            <td><?php echo $consult['fecha']; ?></td>
            <td><?php echo $consult['fecha_prox']; ?></td>
            <td><?php echo $consult['kmt_actual']; ?></td>
            <td><?php echo $consult['kmt_proxima']; ?></td>
            <td><?php echo $consult['detalle_prox']; ?></td>
            <td><?php echo $consult['idadmin']; ?></td>
            <td><?php echo $consult['observaciones']; ?></td>
            <td><?php echo $consult['idtipotiposerviciofk']; ?></td>
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
