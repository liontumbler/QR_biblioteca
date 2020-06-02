-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `db_biblioteca` ;

-- -----------------------------------------------------
-- Table `db_biblioteca`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca`.`estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `facultad` VARCHAR(45) NOT NULL,
  `ID_` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca`.`libros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `n_clasificacion` VARCHAR(20) NOT NULL,
  `n_registro` INT(20) NOT NULL,
  `titulo` VARCHAR(200) NOT NULL,
  `autor` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_biblioteca`.`consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca`.`consulta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) NOT NULL,
  `horas` VARCHAR(45) NOT NULL,
  `estudiante` INT NOT NULL,
  `libros` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_consulta_estudiante`
    FOREIGN KEY (`estudiante`)
    REFERENCES `db_biblioteca`.`estudiante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_libros1`
    FOREIGN KEY (`libros`)
    REFERENCES `db_biblioteca`.`libros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
