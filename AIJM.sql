-- MySQL Script generated by MySQL Workbench
-- Tue May 16 14:52:08 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema AIJM
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AIJM
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AIJM` DEFAULT CHARACTER SET utf8 ;
USE `AIJM` ;

-- -----------------------------------------------------
-- Table `AIJM`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AIJM`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `Nom` TINYTEXT NOT NULL,
  `Prenom` TINYTEXT NOT NULL,
  `Mail` VARCHAR(45) NOT NULL,
  `Type` TINYTEXT NOT NULL,
  `Identifiant` VARCHAR(45) NOT NULL,
  `Motdepasse` VARCHAR(45) NOT NULL,
  `VerifMail` VARCHAR(45) NULL,
  PRIMARY KEY (`idUtilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AIJM`.`Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AIJM`.`Ticket` (
  `idTicket` INT NOT NULL AUTO_INCREMENT,
  `Utilisateur_idUtilisateur` INT NOT NULL,
  `idUtilisateur` INT NOT NULL,
  `DateCreation` DATETIME NOT NULL,
  `Type` TINYTEXT NOT NULL,
  `Piorite` TINYTEXT NOT NULL,
  `Salle` TINYTEXT NOT NULL,
  `Description` TEXT(400) NOT NULL,
  `Commentaire` TEXT(400) NULL,
  `Note` TEXT(400) NULL,
  `Statut` TINYTEXT NOT NULL,
  `DateFermeture` DATETIME NULL,
  PRIMARY KEY (`idTicket`, `Utilisateur_idUtilisateur`),
  INDEX `fk_Ticket_Utilisateur_idx` (`Utilisateur_idUtilisateur` ASC),
  CONSTRAINT `fk_Ticket_Utilisateur`
    FOREIGN KEY (`Utilisateur_idUtilisateur`)
    REFERENCES `AIJM`.`Utilisateur` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AIJM`.`Imprimante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AIJM`.`Imprimante` (
  `idImprimante` INT NOT NULL AUTO_INCREMENT,
  `Marque` TINYTEXT NOT NULL,
  `Modele` TINYTEXT NOT NULL,
  `Type` TINYTEXT NOT NULL,
  `Nombre` TINYINT(4) NOT NULL,
  `RefNoir` VARCHAR(45) NULL,
  `RefMagenta` VARCHAR(45) NULL,
  `RefJaune` VARCHAR(45) NULL,
  `RefCyan` VARCHAR(45) NULL,
  `RefTroiscouleurs` VARCHAR(45) NULL,
  `QuantNoir` TINYINT(4) NULL DEFAULT 0,
  `QuantMagenta` TINYINT(4) NULL DEFAULT 0,
  `QuantJaune` TINYINT(4) NULL DEFAULT 0,
  `QuantCyan` TINYINT(4) NULL DEFAULT 0,
  `QuantTroiscouleurs` TINYINT(4) NULL DEFAULT 0,
  `FournisseurNom` TINYTEXT NULL,
  `FournisseurTel` VARCHAR(45) NULL,
  `FournisseurUrl` VARCHAR(2048) NULL,
  PRIMARY KEY (`idImprimante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AIJM`.`Imprimante_Emplacement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AIJM`.`Imprimante_Emplacement` (
  `idEmplacement` INT NOT NULL AUTO_INCREMENT,
  `Imprimante_idImprimante` INT NOT NULL,
  `ImpNom` TINYTEXT NULL,
  `Salle` TINYTEXT NOT NULL,
  PRIMARY KEY (`idEmplacement`, `Imprimante_idImprimante`),
  INDEX `fk_Imprimante_Emplacement_Imprimante1_idx` (`Imprimante_idImprimante` ASC),
  CONSTRAINT `fk_Imprimante_Emplacement_Imprimante1`
    FOREIGN KEY (`Imprimante_idImprimante`)
    REFERENCES `AIJM`.`Imprimante` (`idImprimante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
