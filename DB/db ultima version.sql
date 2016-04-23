CREATE DATABASE  IF NOT EXISTS `bikes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bikes`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: bikes
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administracion`
--

DROP TABLE IF EXISTS `administracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administracion` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `idcentrofk` int(11) DEFAULT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `idadmin_UNIQUE` (`idadmin`),
  KEY `fk_administracion_1_idx` (`idcentrofk`),
  CONSTRAINT `fk_administracion_1` FOREIGN KEY (`idcentrofk`) REFERENCES `centroautorizado` (`idcentroautorizado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `centroautorizado`
--

DROP TABLE IF EXISTS `centroautorizado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centroautorizado` (
  `idcentroautorizado` int(11) NOT NULL AUTO_INCREMENT,
  `rut` char(12) DEFAULT NULL,
  `razon_soc` varchar(45) DEFAULT NULL,
  `responsable` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcentroautorizado`),
  UNIQUE KEY `idcentroautorizado_UNIQUE` (`idcentroautorizado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `idcliente_UNIQUE` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `rut` char(12) NOT NULL,
  `idclientefk2` int(11) NOT NULL,
  `r_social` varchar(45) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rut`,`idclientefk2`),
  KEY `fk_empresas_1_idx` (`idclientefk2`),
  CONSTRAINT `fk_empresas_1` FOREIGN KEY (`idclientefk2`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `imp_sugerido` int(11) DEFAULT NULL,
  PRIMARY KEY (`iditem`),
  UNIQUE KEY `iditem_UNIQUE` (`iditem`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `origen` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmarca`),
  UNIQUE KEY `idmarca_UNIQUE` (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `idmodelo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `combustible` varchar(45) DEFAULT NULL,
  `garant_km` int(11) DEFAULT NULL,
  `garantia_yy` int(11) DEFAULT NULL,
  `foto_path_modelo` varchar(100) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `cilindrada` int(11) DEFAULT NULL,
  `idmarcafk2` int(11) DEFAULT NULL,
  `freno_disco` bit(1) DEFAULT NULL,
  `baul` bit(1) DEFAULT NULL,
  `canasto` bit(1) DEFAULT NULL,
  `encendido_elec` bit(1) DEFAULT NULL,
  `velocidades` int(1) DEFAULT NULL,
  `automatico` bit(1) DEFAULT NULL,
  `tipo_motor` int(1) DEFAULT NULL,
  PRIMARY KEY (`idmodelo`),
  UNIQUE KEY `idmodelo_UNIQUE` (`idmodelo`),
  KEY `fk_modelo_1_idx` (`idmarcafk2`),
  CONSTRAINT `fk_modelo_1` FOREIGN KEY (`idmarcafk2`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `ci` int(11) NOT NULL,
  `idclientefk` int(11) NOT NULL,
  `nombre1` varchar(45) DEFAULT NULL,
  `nombre2` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`ci`,`idclientefk`),
  KEY `fk_personas_1_idx` (`idclientefk`),
  CONSTRAINT `fk_personas_1` FOREIGN KEY (`idclientefk`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `idservicios` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `detalle_prox` varchar(200) DEFAULT NULL,
  `fecha_prox` date DEFAULT NULL,
  `kmt_actual` int(11) DEFAULT NULL,
  `kmt_proxima` int(11) DEFAULT NULL,
  `idvehiculofk` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `idtipotiposerviciofk` int(11) NOT NULL,
  PRIMARY KEY (`idservicios`),
  UNIQUE KEY `idservicios_UNIQUE` (`idservicios`),
  KEY `fk_servicios_1_idx` (`idvehiculofk`),
  KEY `fk_servicios_2_idx` (`idadmin`),
  KEY `fk_servicios_4_idx` (`idtipotiposerviciofk`),
  CONSTRAINT `fk_servicios_1` FOREIGN KEY (`idvehiculofk`) REFERENCES `vehiculos` (`idvehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_2` FOREIGN KEY (`idadmin`) REFERENCES `administracion` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_4` FOREIGN KEY (`idtipotiposerviciofk`) REFERENCES `tiposervicio` (`idtiposervicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `srviciositem`
--

DROP TABLE IF EXISTS `srviciositem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srviciositem` (
  `idsrvicio` int(11) NOT NULL AUTO_INCREMENT,
  `iditem` int(11) NOT NULL,
  `importe` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idserviciofk` int(11) NOT NULL,
  PRIMARY KEY (`idsrvicio`,`iditem`),
  KEY `fk_srviciositem_2_idx` (`iditem`),
  KEY `fk_srvicios_idx` (`idserviciofk`),
  CONSTRAINT `fk_srviciositem_1` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefonoscentros`
--

DROP TABLE IF EXISTS `telefonoscentros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonoscentros` (
  `idcentro` int(11) NOT NULL,
  `nrotelcentro` int(11) NOT NULL,
  PRIMARY KEY (`idcentro`,`nrotelcentro`),
  CONSTRAINT `fk_telefonoscentros_1` FOREIGN KEY (`idcentro`) REFERENCES `centroautorizado` (`idcentroautorizado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefonosclientes`
--

DROP TABLE IF EXISTS `telefonosclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonosclientes` (
  `idclientefk3` int(11) NOT NULL,
  `nrotel` int(11) NOT NULL,
  PRIMARY KEY (`idclientefk3`,`nrotel`),
  CONSTRAINT `fk_telefonosClientes_1` FOREIGN KEY (`idclientefk3`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiposervicio`
--

DROP TABLE IF EXISTS `tiposervicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervicio` (
  `idtiposervicio` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `detalle` varchar(45) NOT NULL,
  PRIMARY KEY (`idtiposervicio`),
  UNIQUE KEY `idtiposervicio_UNIQUE` (`idtiposervicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuariop`
--

DROP TABLE IF EXISTS `usuariop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariop` (
  `idcliente` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `marca_random` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  CONSTRAINT `fk_usuariop_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `idvehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nromotor` char(12) NOT NULL,
  `nrochasis` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `foto_path` varchar(100) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `idclientefk4` int(11) NOT NULL,
  `idvendedorfk` int(11) NOT NULL COMMENT '	',
  `idmodelofk` int(11) NOT NULL,
  `idmarcafk` int(11) NOT NULL,
  PRIMARY KEY (`idvehiculo`),
  UNIQUE KEY `idvehiculo_UNIQUE` (`idvehiculo`),
  KEY `fk_vehiculos_1_idx` (`idclientefk4`),
  KEY `fk_vehiculos_2_idx` (`idvendedorfk`),
  KEY `fk_vehiculos_3_idx` (`idmodelofk`),
  KEY `fk_vehiculos_4_idx` (`idmarcafk`),
  CONSTRAINT `fk_vehiculos_1` FOREIGN KEY (`idclientefk4`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculos_2` FOREIGN KEY (`idvendedorfk`) REFERENCES `vendedores` (`idvendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculos_3` FOREIGN KEY (`idmodelofk`) REFERENCES `modelo` (`idmodelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculos_4` FOREIGN KEY (`idmarcafk`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedores` (
  `idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  PRIMARY KEY (`idvendedor`),
  UNIQUE KEY `idvendedores_UNIQUE` (`idvendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-08 12:53:34
