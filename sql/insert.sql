SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema cabinet_of_ministers
-- -----------------------------------------------------

USE `cabinet_of_ministers` ;

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`cabmin`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`cabmin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `size` INT NULL,
  `created_date` DATE NULL,
  `finished_date` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`cabmin_powers`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`cabmin_powers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cabmin_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cabmin_powers_cabmin_idx` (`cabmin_id` ASC) VISIBLE,
  CONSTRAINT `fk_cabmin_powers_cabmin`
    FOREIGN KEY (`cabmin_id`)
    REFERENCES `cabinet_of_ministers`.`cabmin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`user`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `address1` VARCHAR(45) NULL,
  `address2` VARCHAR(45) NULL,
  `political_affiliation` VARCHAR(45) NULL,
  `birth_date` DATE NULL,
  `committee_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`minister`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`minister` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(256) NULL,
  `appointed_date` DATE NULL,
  `finished_date` DATE NULL,
  `cabmin_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_minister_user1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_minister_cabmin1_idx` (`cabmin_id` ASC) VISIBLE,
  CONSTRAINT `fk_minister_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `cabinet_of_ministers`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_minister_cabmin1`
    FOREIGN KEY (`cabmin_id`)
    REFERENCES `cabinet_of_ministers`.`cabmin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`committee`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`committee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cabmin_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(256) NULL,
  `created_date` DATE NULL,
  `finished_date` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_committee_cabmin1_idx` (`cabmin_id` ASC) VISIBLE,
  CONSTRAINT `fk_committee_cabmin1`
    FOREIGN KEY (`cabmin_id`)
    REFERENCES `cabinet_of_ministers`.`cabmin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`ministry`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`ministry` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `minister_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(256) NULL,
  `budget` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ministry_minister1_idx` (`minister_id` ASC) VISIBLE,
  CONSTRAINT `fk_ministry_minister1`
    FOREIGN KEY (`minister_id`)
    REFERENCES `cabinet_of_ministers`.`minister` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`legislation`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cabinet_of_ministers`.`legislation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ministry_id` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(256) NULL,
  `type` INT NULL,
  `status` INT NULL,
  `created_date` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_legislation_ministry1_idx` (`ministry_id` ASC) VISIBLE,
  CONSTRAINT `fk_legislation_ministry1`
    FOREIGN KEY (`ministry_id`)
    REFERENCES `cabinet_of_ministers`.`ministry` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
