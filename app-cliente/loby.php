<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include('config/auth.php'); ?>
    <link rel="stylesheet" href="js/jquery.mobile-1.4.5.css">
    <link rel="stylesheet" href="styles/loby.css">
    <script type="text/javascript" src="jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-1.4.5.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Menu principal</title>
  </head>
  <body>
     <!-- Seccion del menu -->
     <div data-role="page" id="seccion1">
       <!--Cabecera -->
       <div data-role="header" align="center">
         <font>Bienvenido <span id="userName"> <?php echo $userID; ?> </span> </font>
       </div>
       <!--Contenido. -->
       <div data-role="content" id="content">
        <div  id="titulo">
         <font> Mis vehiculos</font>
        </div>
         <hr>
         <br>
         <?php
           include('config/conection.php');
           $query = mysqli_query( $conex , " SELECT  v.`idvehiculo`, v.`idmarcafk`, v.`idmodelofk`, v.`nromotor`, v.`nrochasis`, v.`color`, v.`foto_path`, v.`fecha_venta`, m.`nombre` AS nombre_marca, mo.`nombre` AS nombre_modelo , m.`nombre`, mo.`anno`, mo.`combustible`, mo.`garant_km`, mo.`garantia_yy`, mo.`hp`, mo.`cilindrada`, mo.`freno_disco`, mo.`baul`, mo.`canasto`, mo.`encendido_elec`, mo.`velocidades`, mo.`automatico`, mo.`tipo_motor` FROM `vehiculos` as v INNER JOIN `marca` as m ON v.`idmarcafk` = m.`idmarca` INNER JOIN `modelo` as mo ON v.`idmodelofk` = mo.`idmodelo`
          WHERE `idclientefk4` = '{$_COOKIE['ckusrid']}'") or die(mysqli_error($conex));
           $count = 0;
           while($queryArray = mysqli_fetch_array($query)){
             $count = $count + 1;
			 if( isset($queryArray['foto_path']) ) {
				$ruta = explode('/', $queryArray['foto_path']);
			 }
             ?>
             <div data-role="collapsible">
             <h3> <?php echo $queryArray['nombre_marca'] . " " . $queryArray['nombre_modelo']; ?> </h3>
               <div id="datosVehiculo- <?php echo $count; ?>">
                 Datos de este vehiculo
                 <br>
                 <div style="float:right;margin-top:-15px;">
                   <img width="100" height="100" src="<?php if( isset( $queryArray['foto_path'] ) ) { echo '../app-bikes/venta_pics/' . $ruta[3]; } ?>" alt="Foto"/>
                 </div>
                 <ul id="lista">
                   <li>Numero del motor: <?php echo $queryArray['nromotor']; ?></li>
                   <li>Numero del chasis: <?php echo $queryArray['nrochasis']; ?></li>
                   <li>Color: <?php echo $queryArray['color']; ?></li>
                   <li>Fecha de la compra: <?php echo $queryArray['fecha_venta']; ?></li>
                   <li><a href="querys/select-servicios.php?id=<?php echo $queryArray['idvehiculo']; ?>&nombre=<?php echo $queryArray['nombre_marca']. " " . $queryArray['nombre_modelo']; ?>" data-ajax="false" style="color:blue;">Services realizados</a></li>
                 </ul>
                 <br>
                 Datos del modelo
                 <br>
                 <ul id="lista">
                   <li>Combustible: <?php echo $queryArray['combustible']; ?></li>
                   <li>Garantia en km: <?php echo $queryArray['garant_km']; ?></li>
                   <li>Garantia en años: <?php echo $queryArray['garantia_yy']; ?></li>
                   <li>Caballos de fuerza: <?php echo $queryArray['hp']; ?></li>
                   <li>Cilindrada: <?php echo $queryArray['cilindrada']; ?></li>
                   <li>Freno de disco: <?php if($queryArray['freno_disco'] == 1){ echo "Si"; }else{ echo "No"; } ?></li>
                   <li>Baul: <?php if($queryArray['baul'] == 1){ echo "Si"; }else{ echo "No"; } ?></li>
                   <li>Canasto: <?php if($queryArray['canasto'] == 1){ echo "Si"; }else{ echo "No"; }?></li>
                   <li>Encendido Electrico: <?php if($queryArray['encendido_elec'] == 1){ echo "Si"; }else{ echo "No"; }?></li>
                   <li>Velocidades: <?php echo $queryArray['velocidades']; ?></li>
                   <li>Automatico: <?php if($queryArray['automatico'] == 1){ echo "Si"; }else{ echo "No"; }?></li>
                 </ul>
               </div>
              </div>
             <?php
           }
         ?>
         <br>
       </div>
       <!-- Footer -->
       <div data-role="footer" id="footer" align="center"  data-id="foo1" data-position="fixed">
         <br>
         <a href="config/close-user.php" data-role="button" id="close" data-ajax="false" align="center">Cerrar sesion</a>
         <p>Consulta de servicios de mantenimiento</p>
       </div>
     </div>
  </body>
</html>
