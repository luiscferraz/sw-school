SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=`TRADITIONAL`;

DROP SCHEMA IF EXISTS `swsdb` ;
CREATE SCHEMA IF NOT EXISTS `swsdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `swsdb` ;


-- -----------------------------------------------------
-- Table `swsdb`.`consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`consultants` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`consultants` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cpf` VARCHAR(14) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(2) NOT NULL ,
  `acronym_color` VARCHAR(7) NOT NULL ,
  `phone1` VARCHAR(13) NOT NULL ,
  `phone2` VARCHAR(13) NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  UNIQUE INDEX `acronym_color_UNIQUE` (`acronym_color` ASC) ,
  UNIQUE INDEX `acronym_UNIQUE` (`acronym` ASC) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`companies` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cnpj` VARCHAR(18) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(45) NOT NULL ,
  `phone1` VARCHAR(13) NOT NULL ,
  `phone2` VARCHAR(13) NULL ,
  `removed` TINYINT(1) NOT NULL ,
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC) ,
  PRIMARY KEY (`id`)) 
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`addresses` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`addresses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `address` VARCHAR(45) NOT NULL ,
  `number` VARCHAR(5) NOT NULL ,
  `neighborhood` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `state` VARCHAR(45) NOT NULL ,
  `complement` VARCHAR(45) NULL ,
  `zip_code` VARCHAR(10) NOT NULL ,
  `consultant_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`sepgs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`sepgs` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`sepgs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(13) NULL ,
  `email` VARCHAR(45) NULL ,
  `company_id` INT NULL ,
    INDEX `fk_sepgs_companies` (`company_id` ASC) ,
    CONSTRAINT `fk_sepgs_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`financials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`financials` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`financials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(13) NULL ,
  `email` VARCHAR(45) NULL ,
  `company_id` INT NULL ,
    INDEX `fk_financials_companies` (`company_id` ASC) ,
    CONSTRAINT `fk_financials_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`sponsors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`Sponsors` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`sponsors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(13) NULL ,
  `email` VARCHAR(45) NULL ,
  `company_id` INT NULL ,
    INDEX `fk_sponsors_companies` (`company_id` ASC) ,
    CONSTRAINT `fk_sponsors_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`projects` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`projects` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(200) NULL ,
  `acronym` VARCHAR(15) NOT NULL ,
  `a_hours` INT NULL ,
  `b_hours` INT NULL ,
  `c_hours` INT NULL ,
  `parent_project_id` INT NULL ,
  `company_id` INT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_projects_projects` (`parent_project_id` ASC) ,
  INDEX `fk_projects_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_projects_projects`
    FOREIGN KEY (`parent_project_id`)
    REFERENCES `swsdb`.`projects` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_projects_companies`
    FOREIGN KEY (`company_id`)
    REFERENCES `swsdb`.`companies` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`activities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`activities` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`activities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `start_hours` TIME NOT NULL ,
  `end_hours` TIME NOT NULL ,
  `date` DATE NOT NULL ,
  `observations` MEDIUMTEXT NULL ,
  `type` VARCHAR(1) NOT NULL ,
  `hours_worked` TIME NOT NULL ,
  `project_id` INT NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_activities_projects` (`project_id` ASC) ,
  CONSTRAINT `fk_activities_projects`
    FOREIGN KEY (`project_id`)
    REFERENCES `swsdb`.`projects` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`consultants_has_activities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`consultants_has_activities` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`consultants_has_activities` (
  `consultant_id` INT NOT NULL ,
  `activity_id` INT NOT NULL ,
  PRIMARY KEY (`consultant_id`, `activity_id`) ,
  INDEX `fk_consultants_has_activities_consultants` (`consultant_id` ASC) ,
  INDEX `fk_consultants_has_activities_activities` (`activity_id` ASC) ,
  CONSTRAINT `fk_consultants_has_activities_consultants`
    FOREIGN KEY (`consultant_id`)
    REFERENCES `swsdb`.`consultants` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultants_has_activities_activities`
    FOREIGN KEY (`activity_id`)
    REFERENCES `swsdb`.`activities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;