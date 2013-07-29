SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `swsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `swsdb` ;

-- -----------------------------------------------------
-- Table `swsdb`.`activities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`activities` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `start_hours` TIME NOT NULL ,
  `end_hours` TIME NOT NULL ,
  `date` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `observations` MEDIUMTEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `description` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `status` ENUM('Planejada','Em desenvolvimento','Concluída','Cancelada') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `project_id` INT(11) NOT NULL ,
  `consultant1_id` INT(11) NULL DEFAULT NULL ,
  `consultant2_id` INT(11) NULL DEFAULT NULL ,
  `consultant3_id` INT(11) NULL DEFAULT NULL ,
  `consultant4_id` INT(11) NULL DEFAULT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`consultants`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cpf` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `acronym` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `acronym_color` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  `photo` LONGBLOB NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `acronym_UNIQUE` (`acronym` ASC) ,
  UNIQUE INDEX `acronym_color_UNIQUE` (`acronym_color` ASC) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`activities_consultants`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`activities_consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `consultant_id` INT(11) NOT NULL ,
  `activity_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_activities_consultants_consultants` (`consultant_id` ASC) ,
  INDEX `fk_activities_consultants_activities` (`activity_id` ASC) ,
  CONSTRAINT `fk_activities_consultants_activities`
    FOREIGN KEY (`activity_id` )
    REFERENCES `swsdb`.`activities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activities_consultants_consultants`
    FOREIGN KEY (`consultant_id` )
    REFERENCES `swsdb`.`consultants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`addresses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`addresses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `address` VARCHAR(45) NULL DEFAULT NULL ,
  `number` VARCHAR(5) NULL DEFAULT NULL ,
  `neighborhood` VARCHAR(45) NULL DEFAULT NULL ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `state` VARCHAR(45) NULL DEFAULT NULL ,
  `complement` VARCHAR(45) NULL DEFAULT NULL ,
  `zip_code` VARCHAR(10) NULL DEFAULT NULL ,
  `consultant_id` INT(11) NOT NULL ,
  `company_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`attachments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`attachments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `activity_id` INT(11) NULL DEFAULT NULL ,
  `file_name` VARCHAR(20) NULL DEFAULT NULL ,
  `file` LONGBLOB NULL DEFAULT NULL ,
  `creation_date` VARCHAR(10) NULL DEFAULT NULL ,
  `removed` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`owners`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`owners` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `phone` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `date` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`companies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cnpj` VARCHAR(18) NULL DEFAULT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(45) NOT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `logo` VARCHAR(45) NULL DEFAULT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  `fundation` VARCHAR(10) NULL DEFAULT NULL ,
  `owner_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `acronym_UNIQUE` (`acronym` ASC) ,
  INDEX `owner_id` (`owner_id` ASC) ,
  CONSTRAINT `companies_ibfk_1`
    FOREIGN KEY (`owner_id` )
    REFERENCES `swsdb`.`owners` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`companies_bank_infos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies_bank_infos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name_bank` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `number_agency` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `number_account` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `company_id` (`company_id` ASC) ,
  CONSTRAINT `companies_bank_infos_ibfk_1`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`companies_contacts1`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies_contacts1` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `function` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `telephone` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `company_id` (`company_id` ASC) ,
  CONSTRAINT `companies_contacts1_ibfk_1`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`companies_contacts2`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies_contacts2` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `function` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `telephone` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `company_id` (`company_id` ASC) ,
  CONSTRAINT `companies_contacts2_ibfk_1`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`companies_contacts3`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies_contacts3` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `function` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `telephone` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `company_id` (`company_id` ASC) ,
  CONSTRAINT `companies_contacts3_ibfk_1`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`companies_contacts4`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`companies_contacts4` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `function` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `telephone` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `company_id` (`company_id` ASC) ,
  CONSTRAINT `companies_contacts4_ibfk_1`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`consultants_bank_infos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`consultants_bank_infos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name_bank` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `number_agency` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `number_account` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `consultant_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `consultant_id` (`consultant_id` ASC) ,
  CONSTRAINT `consultants_bank_infos_ibfk_1`
    FOREIGN KEY (`consultant_id` )
    REFERENCES `swsdb`.`consultants` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `swsdb`.`entries`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`entries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `date` DATE NOT NULL ,
  `type_consulting` VARCHAR(1) NOT NULL ,
  `type` ENUM('Individual','Grupo') NOT NULL ,
  `hours_worked` DOUBLE(4,1) NOT NULL ,
  `observations` MEDIUMTEXT NULL DEFAULT NULL ,
  `consultant_id` INT(11) NOT NULL ,
  `activity_id` INT(11) NOT NULL ,
  `approved` TINYINT(1) NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entries_consultants` (`consultant_id` ASC) ,
  INDEX `fk_entries_activities` (`activity_id` ASC) ,
  CONSTRAINT `fk_entries_activities`
    FOREIGN KEY (`activity_id` )
    REFERENCES `swsdb`.`activities` (`id` )
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entries_consultants`
    FOREIGN KEY (`consultant_id` )
    REFERENCES `swsdb`.`consultants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`projects` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(200) NULL DEFAULT NULL ,
  `acronym` VARCHAR(15) NOT NULL ,
  `a_hours_individual` DOUBLE(4,1) NULL DEFAULT NULL ,
  `b_hours_individual` DOUBLE(4,1) NULL DEFAULT NULL ,
  `c_hours_individual` DOUBLE(4,1) NULL DEFAULT NULL ,
  `a_hours_group` DOUBLE(4,1) NULL DEFAULT NULL ,
  `b_hours_group` DOUBLE(4,1) NULL DEFAULT NULL ,
  `c_hours_group` DOUBLE(4,1) NULL DEFAULT NULL ,
  `consultant_id` INT(11) NULL DEFAULT NULL ,
  `parent_project_id` INT(11) NULL DEFAULT NULL ,
  `company_id` INT(11) NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_projects_consultants` (`consultant_id` ASC) ,
  INDEX `fk_projects_projects` (`parent_project_id` ASC) ,
  INDEX `fk_projects_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_projects_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON UPDATE CASCADE,
  CONSTRAINT `fk_projects_consultants`
    FOREIGN KEY (`consultant_id` )
    REFERENCES `swsdb`.`consultants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`expenses`
-- -----------------------------------------------------ent
CREATE  TABLE IF NOT EXISTS `swsdb`.`expenses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(100) NOT NULL ,
  `value` DECIMAL(16,2) NOT NULL ,
  `type` ENUM('e,d') NULL DEFAULT NULL ,
  `project_id` INT(11) NOT NULL ,
  `attachments` BLOB NULL DEFAULT NULL ,
  `type_expenses` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_expenses_projects` (`project_id` ASC) ,
  CONSTRAINT `fk_expenses_projects`
    FOREIGN KEY (`project_id` )
    REFERENCES `swsdb`.`projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`financials`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`financials` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_financials_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_financials_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`project_consultants`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`project_consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `project_id` INT(11) NOT NULL ,
  `consultant_id` INT(11) NOT NULL ,
  `value_hour_a_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_b_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_c_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_a_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_b_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_c_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_project_consultants_projects` (`project_id` ASC) ,
  INDEX `fk_project_consultants_consultants` (`consultant_id` ASC) ,
  CONSTRAINT `fk_project_consultants_consultants`
    FOREIGN KEY (`consultant_id` )
    REFERENCES `swsdb`.`consultants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_consultants_projects`
    FOREIGN KEY (`project_id` )
    REFERENCES `swsdb`.`projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`sepgs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`sepgs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sepgs_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_sepgs_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`sponsors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`sponsors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sponsors_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_sponsors_companies`
    FOREIGN KEY (`company_id` )
    REFERENCES `swsdb`.`companies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `swsdb`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swsdb`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `type` ENUM('cons','admin','fin_manager','cons_manager','rel_manager') NOT NULL ,
  `consultant_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `username`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

USE `swsdb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
