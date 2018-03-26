-- MySQL Script generated by MySQL Workbench
-- Wed Mar 14 19:57:51 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema miaudote
-- -----------------------------------------------------
DROP SCHEMA  `miaudote`;
-- -----------------------------------------------------
-- Schema miaudote
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `miaudote` DEFAULT CHARACTER SET utf8 ;
USE `miaudote` ;

-- -----------------------------------------------------
-- Table `miaudote`.`ESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`ESTADO` (
  `COD_ESTADO` INT NOT NULL AUTO_INCREMENT,
  `NOM_ESTADO` VARCHAR(100) NULL,
  PRIMARY KEY (`COD_ESTADO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`CIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`CIDADE` (
  `COD_CIDADE` INT NOT NULL AUTO_INCREMENT,
  `NOM_CIDADE` VARCHAR(100) NULL,
  `ESTADO_COD_ESTADO` INT NOT NULL,
  PRIMARY KEY (`COD_CIDADE`),
  INDEX `fk_CIDADE_ESTADO1_idx` (`ESTADO_COD_ESTADO` ASC),
  CONSTRAINT `fk_CIDADE_ESTADO1`
    FOREIGN KEY (`ESTADO_COD_ESTADO`)
    REFERENCES `miaudote`.`ESTADO` (`COD_ESTADO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`INSTITUICAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`INSTITUICAO` (
  `COD_INSTITUICAO` INT NOT NULL AUTO_INCREMENT,
  `NOM_INSTITUICAO` VARCHAR(100) NULL,
  `NUM_TELEFONE` INT NULL,
  `IND_TIPO_INSTITUICAO` CHAR(1) NULL,
  `IND_EXCLUIDO` char(1) NULL DEFAULT 'F',
  `DES_EMAIL` VARCHAR(100) NULL,
  `CIDADE_COD_CIDADE` INT NOT NULL,
  PRIMARY KEY (`COD_INSTITUICAO`),
  INDEX `fk_INSTITUICAO_CIDADE1_idx` (`CIDADE_COD_CIDADE` ASC),
  CONSTRAINT `fk_INSTITUICAO_CIDADE1`
    FOREIGN KEY (`CIDADE_COD_CIDADE`)
    REFERENCES `miaudote`.`CIDADE` (`COD_CIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`ESPECIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`ESPECIE` (
  `COD_ESPECIE` INT NOT NULL AUTO_INCREMENT,
  `DES_ESPECIE` VARCHAR(100) NULL,
  PRIMARY KEY (`COD_ESPECIE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`ANIMAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`ANIMAL` (
  `COD_ANIMAL` INT NOT NULL AUTO_INCREMENT,
  `NOM_ANIMAL` VARCHAR(100) NULL,
  `IND_IDADE` CHAR(1) NULL,
  `IND_PORTE_ANIMAL` char(1) NULL,
  `IND_SEXO_ANIMAL` CHAR(1) NULL,
  `IND_CASTRADO` CHAR(1) NULL,
  `IND_ADOTADO` CHAR(1) NULL DEFAULT 'F',
  `IND_EXCLUIDO` CHAR(1) NULL DEFAULT 'F',
  `DAT_CADASTRO` DATE NULL,
  `DAT_ADOCAO` DATE NULL,
  `DES_OBSERVACAO` VARCHAR(200) NULL,
  `DES_VACINA` VARCHAR(100) NULL,
  `DES_TEMPERAMENTO` VARCHAR(100) NULL,
  `INSTITUICAO_COD_INSTITUICAO` INT NOT NULL,
  `ESPECIE_COD_ESPECIE` INT NOT NULL,
  PRIMARY KEY (`COD_ANIMAL`),
  INDEX `fk_ANIMAL_INSTITUICAO1_idx` (`INSTITUICAO_COD_INSTITUICAO` ASC),
  INDEX `fk_ANIMAL_ESPECIE1_idx` (`ESPECIE_COD_ESPECIE` ASC),
  CONSTRAINT `fk_ANIMAL_INSTITUICAO1`
    FOREIGN KEY (`INSTITUICAO_COD_INSTITUICAO`)
    REFERENCES `miaudote`.`INSTITUICAO` (`COD_INSTITUICAO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ANIMAL_ESPECIE1`
    FOREIGN KEY (`ESPECIE_COD_ESPECIE`)
    REFERENCES `miaudote`.`ESPECIE` (`COD_ESPECIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`USUARIO` (
  `COD_USUARIO` INT NOT NULL AUTO_INCREMENT,
  `DES_SENHA` VARCHAR(80) NULL,
  `NOM_USUARIO` VARCHAR(100) NULL,
  `DES_TIPO_USUARIO` CHAR(1) NULL,
  `DES_EMAIL` VARCHAR(60) NULL,
  `IND_EXCLUIDO` CHAR(1) NULL,
  PRIMARY KEY (`COD_USUARIO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miaudote`.`FOTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `miaudote`.`FOTO` (
  `COD_FOTO_ANIMAL` INT NOT NULL AUTO_INCREMENT,
  `NOM_FOTO` VARCHAR(200) NULL,
  `TIP_FOTO` VARCHAR(10) NULL,
  `BIN_FOTO` MEDIUMBLOB,
  `IND_FOTO_PRINCIPAL` CHAR(1) NULL,
  `ANIMAL_COD_ANIMAL` INT NOT NULL,
  PRIMARY KEY (`COD_FOTO_ANIMAL`),
  INDEX `fk_FOTO_ANIMAL1_idx` (`ANIMAL_COD_ANIMAL` ASC),
  CONSTRAINT `fk_FOTO_ANIMAL1`
    FOREIGN KEY (`ANIMAL_COD_ANIMAL`)
    REFERENCES `miaudote`.`ANIMAL` (`COD_ANIMAL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

DELETE FROM `ESPECIE` WHERE 1;

DELETE FROM `CIDADE` WHERE 1;

DELETE FROM `ESTADO` WHERE 1;

DELETE FROM `INSTITUICAO` WHERE 1;
			
INSERT INTO ESTADO(NOM_ESTADO)
VALUES ('Minas Gerais'), ('S�o Paulo'), ('Rio de Janeiro');

INSERT INTO CIDADE(NOM_CIDADE, ESTADO_COD_ESTADO)
VALUES ('Belo Horizonte', 1), ('Contagem', 1), ('Betim', 1), ('Lagoa Santa', 1), ('Ribeir�o das Neves', 1),
('S�o Paulo', 2), ('Rio de Janeiro', 3);

INSERT INTO INSTITUICAO(NOM_INSTITUICAO, NUM_TELEFONE, IND_TIPO_INSTITUICAO, DES_EMAIL, CIDADE_COD_CIDADE)
VALUES ('Proteger', '3333-3333', 'O', 'contato@ongproteger.com.br', 1),
('Jo�o J�nior', '9999-9999',  'P' ,'joaojunin@gmail.com', 1);

INSERT INTO ESPECIE(DES_ESPECIE)
VALUES ('Cachorro'), ('Gato');