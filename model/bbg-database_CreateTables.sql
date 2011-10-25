﻿SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `biobattleground` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `biobattleground` ;

-- -----------------------------------------------------
-- Table `biobattleground`.`Organizm`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Organizm` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `instinct` INT NULL ,
  `toughness` INT NULL ,
  `vitality` INT NULL ,
  `type` ENUM('plant', 'herbivore', 'carnivore', 'scavenger') NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Mapa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Mapa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `map_string` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Klimat`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Klimat` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `sun` INT NULL ,
  `rain` INT NULL ,
  `wind` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Użytkownik`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Użytkownik` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biobattleground`.`Uprawnienia gracza`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Uprawnienia gracza` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_user` INT NULL ,
  `id_organism` INT NULL ,
  `id_map` INT NULL ,
  `id_climate` INT NULL ,
  `play` TINYINT(1)  NULL ,
  `use` TINYINT(1)  NULL ,
  `edit` TINYINT(1)  NULL ,
  `show_stats` TINYINT(1)  NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_organizm` (`id_organism` ASC) ,
  INDEX `id_user` (`id_user` ASC) ,
  INDEX `id_map` (`id_map` ASC) ,
  INDEX `id_climate` (`id_climate` ASC) ,
  CONSTRAINT `id_organizm`
    FOREIGN KEY (`id_organism` )
    REFERENCES `biobattleground`.`Organizm` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user` )
    REFERENCES `biobattleground`.`Użytkownik` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_map`
    FOREIGN KEY (`id_map` )
    REFERENCES `biobattleground`.`Mapa` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_climate`
    FOREIGN KEY (`id_climate` )
    REFERENCES `biobattleground`.`Klimat` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Symulacja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Symulacja` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_climate` INT NULL ,
  `id_map` INT NULL ,
  `simulation_length` INT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_map` (`id_map` ASC) ,
  INDEX `id_climate` (`id_climate` ASC) ,
  CONSTRAINT `id_map`
    FOREIGN KEY (`id_map` )
    REFERENCES `biobattleground`.`Mapa` (`id` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `id_climate`
    FOREIGN KEY (`id_climate` )
    REFERENCES `biobattleground`.`Klimat` (`id` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Stado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Stado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_user_privileges` INT NULL ,
  `id_organism` INT NULL ,
  `id_simulation` INT NULL ,
  `survive` TINYINT(1)  NULL ,
  `average_life_length` INT NULL ,
  `quantity` INT NULL ,
  `deaths` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_organism` (`id_organism` ASC) ,
  INDEX `id_simulation` (`id_simulation` ASC) ,
  INDEX `id_user_privileges` (`id_user_privileges` ASC) ,
  CONSTRAINT `id_organism`
    FOREIGN KEY (`id_organism` )
    REFERENCES `biobattleground`.`Organizm` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_simulation`
    FOREIGN KEY (`id_simulation` )
    REFERENCES `biobattleground`.`Symulacja` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_user_privileges`
    FOREIGN KEY (`id_user_privileges` )
    REFERENCES `biobattleground`.`Uprawnienia gracza` (`id_user` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Uprawnienia symulacji`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Uprawnienia symulacji` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_user` INT NULL ,
  `create` TINYINT(1)  NULL ,
  `join` TINYINT(1)  NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_user` (`id_user` ASC) ,
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user` )
    REFERENCES `biobattleground`.`Użytkownik` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `biobattleground`.`Tura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `biobattleground`.`Tura` (
  `id` INT NOT NULL ,
  `id_organism` INT NULL ,
  `id_simulation` INT NULL ,
  `day` INT NULL ,
  `quantity` INT NULL ,
  `avg_hunger` INT NULL ,
  `avg_hitPoints` INT NULL ,
  `number_of_newborn` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_organism` (`id_organism` ASC) ,
  INDEX `id_simulation` (`id_simulation` ASC) ,
  CONSTRAINT `id_organism`
    FOREIGN KEY (`id_organism` )
    REFERENCES `biobattleground`.`Organizm` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id_simulation`
    FOREIGN KEY (`id_simulation` )
    REFERENCES `biobattleground`.`Symulacja` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
