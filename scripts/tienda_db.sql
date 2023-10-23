-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tienda_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tienda_db` ;

-- -----------------------------------------------------
-- Schema tienda_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tienda_db` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema tienda_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tienda_db` ;

-- -----------------------------------------------------
-- Schema tienda_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tienda_db` DEFAULT CHARACTER SET utf8 ;
USE `tienda_db` ;

-- -----------------------------------------------------
-- Table `tienda_db`.`comprobante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`comprobante` (
  `id_comprobante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cantidad` INT NULL,
  `igv` INT NULL,
  `serie` INT NULL,
  PRIMARY KEY (`id_comprobante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_db`.`tipo_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`tipo_cliente` (
  `id_tipo_cliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tipo_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tienda_db`.`tipo_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`tipo_documento` (
  `id_tipo_documento` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cantidad` INT NULL,
  PRIMARY KEY (`id_tipo_documento`))
ENGINE = InnoDB;

USE `tienda_db` ;

-- -----------------------------------------------------
-- Table `tienda_db`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`categoria` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(250) NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`producto` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(250) NULL DEFAULT NULL,
  `precio` DECIMAL(6,2) NOT NULL,
  `stock` INT(11) NULL DEFAULT NULL,
  `codigo` VARCHAR(45) NULL,
  `img` VARCHAR(50) NULL,
  `id_categoria` INT(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  -- INDEX `fk_Producto_categoria1` (`id_categoria` ASC) VISIBLE,
  -- UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) VISIBLE,
  CONSTRAINT `fk_Producto_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `tienda_db`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`Cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `direccion` VARCHAR(50) NULL DEFAULT NULL,
  `telefono` INT NULL DEFAULT NULL,
  `num_documento` VARCHAR(50) NULL DEFAULT NULL,
  `id_tipo_cliente` INT NOT NULL,
  `id_tipo_documento` INT NOT NULL,
  PRIMARY KEY (`id_cliente`),
  -- INDEX `fk_Cliente_tipo_cliente1_idx` (`id_tipo_cliente` ASC) VISIBLE,
  -- INDEX `fk_Cliente_tipo_documento1_idx` (`id_tipo_documento` ASC) VISIBLE,
  CONSTRAINT `fk_Cliente_tipo_cliente1`
    FOREIGN KEY (`id_tipo_cliente`)
    REFERENCES `tienda_db`.`tipo_cliente` (`id_tipo_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_tipo_documento1`
    FOREIGN KEY (`id_tipo_documento`)
    REFERENCES `tienda_db`.`tipo_documento` (`id_tipo_documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT 0,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `ci` VARCHAR(10) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `celular` VARCHAR(45) NULL DEFAULT NULL,
  `id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
 -- INDEX `fk_Usuario_rol1` (`id_rol` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_rol1`
    FOREIGN KEY (`id_rol`)
    REFERENCES `tienda_db`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`ventas` (
  `id_venta` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  `subtotal` VARCHAR(250) NOT NULL,
  `igv` VARCHAR(250) NULL DEFAULT NULL,
  `descuento` VARCHAR(45) NULL DEFAULT NULL,
  `total` DATETIME NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `serie` VARCHAR(45) NULL,
  `num_documento` VARCHAR(45) NULL,
  `id_usuario` INT(11) NOT NULL,
  `id_comprobante` INT NOT NULL,
  PRIMARY KEY (`id_venta`),
 -- INDEX `fk_ventas_Cliente1_idx` (`id_cliente` ASC) VISIBLE,
 -- INDEX `fk_ventas_usuario1_idx` (`id_usuario` ASC) VISIBLE,
--  INDEX `fk_ventas_comprobante1_idx` (`id_comprobante` ASC) VISIBLE,
  CONSTRAINT `fk_ventas_Cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `tienda_db`.`Cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `tienda_db`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_comprobante1`
    FOREIGN KEY (`id_comprobante`)
    REFERENCES `tienda_db`.`comprobante` (`id_comprobante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tienda_db`.`detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tienda_db`.`detalle` (
  `id_producto` INT(11) NOT NULL,
  `id_venta` INT(11) NOT NULL,
  `precio` DECIMAL(6,2) NULL DEFAULT NULL,
  `cantidad` INT NULL DEFAULT NULL,
  `importe` DECIMAL(6,2) NULL DEFAULT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT 0,
  PRIMARY KEY (`id_producto`, `id_venta`),
--  INDEX `fk_producto_has_reserva_reserva1` (`id_venta` ASC) VISIBLE,
  CONSTRAINT `fk_producto_has_reserva_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `tienda_db`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_reserva_reserva1`
    FOREIGN KEY (`id_venta`)
    REFERENCES `tienda_db`.`ventas` (`id_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
