/**
* Criação da extrutura do banco de dados
*/

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- BANCO DE DADOS festival_helper
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `festival_helper` ;

-- -----------------------------------------------------
-- BANCO DE DADOS festival_helper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `festival_helper` DEFAULT CHARACTER SET utf8 ;
USE `festival_helper` ;

-- -----------------------------------------------------
-- Tabela `festival_helper`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `festival_helper`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `festival_helper`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `Sobrenome` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `EmailConfirmed` TINYINT NOT NULL,
  `TelefoneConfirmed` TINYINT NOT NULL,
  `Site_idSite` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `Site_idSite`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) VISIBLE,
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) VISIBLE,
  UNIQUE INDEX `Telefone_UNIQUE` (`Telefone` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela `festival_helper`.`Site`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `festival_helper`.`Site` ;

CREATE TABLE IF NOT EXISTS `festival_helper`.`Site` (
  `idSite` INT NOT NULL AUTO_INCREMENT,
  `BacgroundIMG` BLOB NOT NULL,
  `LogoIMG` BLOB NOT NULL,
  PRIMARY KEY (`idSite`),
  UNIQUE INDEX `idSite_UNIQUE` (`idSite` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela `festival_helper`.`Evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `festival_helper`.`Evento` ;

CREATE TABLE IF NOT EXISTS `festival_helper`.`Evento` (
  `idEvento` INT NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` INT NOT NULL,
  `Site` VARCHAR(45) NOT NULL,
  `DataInicio` DATETIME NOT NULL,
  `DataFim` DATETIME NOT NULL,
  `Site_idSite` INT NOT NULL,
  PRIMARY KEY (`idEvento`, `Site_idSite`),
  UNIQUE INDEX `Site_UNIQUE` (`Site` ASC) VISIBLE,
  INDEX `fk_Evento_Usuario_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  UNIQUE INDEX `idEvento_UNIQUE` (`idEvento` ASC) VISIBLE,
  INDEX `fk_Evento_Site1_idx` (`Site_idSite` ASC) VISIBLE,
  CONSTRAINT `fk_Evento_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `festival_helper`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Site1`
    FOREIGN KEY (`Site_idSite`)
    REFERENCES `festival_helper`.`Site` (`idSite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela `festival_helper`.`Palco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `festival_helper`.`Palco` ;

CREATE TABLE IF NOT EXISTS `festival_helper`.`Palco` (
  `idPalco` INT NOT NULL AUTO_INCREMENT,
  `Evento_idEvento` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Cor` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idPalco`),
  INDEX `fk_Palco_Evento1_idx` (`Evento_idEvento` ASC) VISIBLE,
  UNIQUE INDEX `idPalco_UNIQUE` (`idPalco` ASC) VISIBLE,
  CONSTRAINT `fk_Palco_Evento1`
    FOREIGN KEY (`Evento_idEvento`)
    REFERENCES `festival_helper`.`Evento` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela `festival_helper`.`Show`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `festival_helper`.`Show` ;

CREATE TABLE IF NOT EXISTS `festival_helper`.`Show` (
  `idShow` INT NOT NULL AUTO_INCREMENT,
  `Palco_idPalco` INT NOT NULL,
  `Artista` VARCHAR(45) NOT NULL,
  `Categoria` VARCHAR(45) NULL,
  `HorarioInicio` DATETIME NOT NULL,
  `HorarioFim` DATETIME NOT NULL,
  PRIMARY KEY (`idShow`),
  INDEX `fk_Show_Palco1_idx` (`Palco_idPalco` ASC) VISIBLE,
  UNIQUE INDEX `idShow_UNIQUE` (`idShow` ASC) VISIBLE,
  CONSTRAINT `fk_Show_Palco1`
    FOREIGN KEY (`Palco_idPalco`)
    REFERENCES `festival_helper`.`Palco` (`idPalco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
