-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lacuartapuerta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lacuartapuerta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lacuartapuerta` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema lacuartapuerta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lacuartapuerta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lacuartapuerta` DEFAULT CHARACTER SET utf8 ;
USE `lacuartapuerta` ;

-- -----------------------------------------------------
-- Table `lacuartapuerta`.`erabiltzaile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacuartapuerta`.`erabiltzaile` (
  `iderabiltzaile` INT NOT NULL AUTO_INCREMENT,
  `ErabiltzaileIzena` VARCHAR(25) NULL,
  `Pasahitza` VARCHAR(25) NULL,
  `Bimenak` INT(1) NULL,
  `Puntuak` INT(4) NULL,
  PRIMARY KEY (`iderabiltzaile`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacuartapuerta`.`filmak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacuartapuerta`.`filmak` (
  `idPelikulak` INT NOT NULL,
  `Izenburuak` VARCHAR(50) NULL,
  `Iruzkin` VARCHAR(250) NULL,
  `Argazkia` MEDIUMBLOB NULL,
  `Generoa` VARCHAR(15) NULL,
  `Zuzendaria` VARCHAR(20) NULL,
  `Urtea` VARCHAR(5) NULL,
  `Sinopsis` VARCHAR(250) NULL,
  `Kritika` VARCHAR(300) NULL,
  `Balorazioa` VARCHAR(3) NULL,
  `Trailer` VARCHAR(200) NULL,
  PRIMARY KEY (`idPelikulak`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacuartapuerta`.`iritzi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacuartapuerta`.`iritzi` (
  `idiritzi` INT NOT NULL AUTO_INCREMENT,
  `Izarrak` INT(1) NULL,
  `erabiltzaile_iderabiltzaile` INT NOT NULL,
  `filmak_idPelikulak` INT NOT NULL,
  PRIMARY KEY (`idiritzi`),
  INDEX `fk_iritzi_erabiltzaile_idx` (`erabiltzaile_iderabiltzaile` ASC),
  INDEX `fk_iritzi_filmak1_idx` (`filmak_idPelikulak` ASC) ,
  CONSTRAINT `fk_iritzi_erabiltzaile`
    FOREIGN KEY (`erabiltzaile_iderabiltzaile`)
    REFERENCES `lacuartapuerta`.`erabiltzaile` (`iderabiltzaile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iritzi_filmak1`
    FOREIGN KEY (`filmak_idPelikulak`)
    REFERENCES `lacuartapuerta`.`filmak` (`idPelikulak`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacuartapuerta`.`iruzkinak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacuartapuerta`.`iruzkinak` (
  `idIruzkinak` INT NOT NULL AUTO_INCREMENT,
  `iruzkina` VARCHAR(250) NULL,
  `erabiltzaile_iderabiltzaile` INT NOT NULL,
  `filmak_idPelikulak` INT NOT NULL,
  PRIMARY KEY (`idIruzkinak`),
  INDEX `fk_iruzkinak_erabiltzaile1_idx` (`erabiltzaile_iderabiltzaile` ASC),
  INDEX `fk_iruzkinak_filmak1_idx` (`filmak_idPelikulak` ASC),
  CONSTRAINT `fk_iruzkinak_erabiltzaile1`
    FOREIGN KEY (`erabiltzaile_iderabiltzaile`)
    REFERENCES `lacuartapuerta`.`erabiltzaile` (`iderabiltzaile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iruzkinak_filmak1`
    FOREIGN KEY (`filmak_idPelikulak`)
    REFERENCES `lacuartapuerta`.`filmak` (`idPelikulak`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lacuartapuerta`.`galderak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lacuartapuerta`.`galderak` (
  `idgalderak` INT NOT NULL AUTO_INCREMENT,
  `Enuntziatua` VARCHAR(200) NULL,
  `Erantzuna` VARCHAR(50) NULL,
  `erabiltzaile_iderabiltzaile` INT NOT NULL,
  PRIMARY KEY (`idgalderak`),
  INDEX `fk_galderak_erabiltzaile1_idx` (`erabiltzaile_iderabiltzaile` ASC),
  CONSTRAINT `fk_galderak_erabiltzaile1`
    FOREIGN KEY (`erabiltzaile_iderabiltzaile`)
    REFERENCES `lacuartapuerta`.`erabiltzaile` (`iderabiltzaile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
