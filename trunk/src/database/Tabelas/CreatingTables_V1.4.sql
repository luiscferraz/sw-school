SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

SHOW WARNINGS;
DROP SCHEMA IF EXISTS `swsdb` ;
CREATE SCHEMA IF NOT EXISTS `swsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
SHOW WARNINGS;
USE `swsdb` ;

-- -----------------------------------------------------
-- Table `activities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activities` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `activities` (
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
AUTO_INCREMENT = 41
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultants` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cpf` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `acronym` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `acronym_color` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `email` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

SHOW WARNINGS;
CREATE UNIQUE INDEX `acronym_UNIQUE` ON `consultants` (`acronym` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `acronym_color_UNIQUE` ON `consultants` (`acronym_color` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `cpf_UNIQUE` ON `consultants` (`cpf` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `activities_consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activities_consultants` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `activities_consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `consultant_id` INT(11) NOT NULL ,
  `activity_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `addresses` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `addresses` (
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
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `attachments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attachments` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `attachments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `activity_id` INT(11) NULL DEFAULT NULL ,
  `file_name` VARCHAR(20) NULL DEFAULT NULL ,
  `file` LONGBLOB NULL DEFAULT NULL ,
  `creation_date` VARCHAR(10) NULL DEFAULT NULL ,
  `removed` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `companies` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `companies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cnpj` VARCHAR(18) NULL DEFAULT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(45) NOT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `logo` VARCHAR(45) NULL DEFAULT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE UNIQUE INDEX `acronym_UNIQUE` ON `companies` (`acronym` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `entries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `entries` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `entries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `date` VARCHAR(12) NOT NULL ,
  `type_consulting` VARCHAR(1) NOT NULL ,
  `type` ENUM('Individual','Grupo') NOT NULL ,
  `hours_worked` DOUBLE(4,1) NOT NULL ,
  `observations` MEDIUMTEXT NULL DEFAULT NULL ,
  `consultant_id` INT(11) NOT NULL ,
  `activity_id` INT(11) NOT NULL ,
  `approved` TINYINT(1) NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `projects` (
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
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `expenses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `expenses` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `expenses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(100) NOT NULL ,
  `value` DECIMAL(16,2) NOT NULL ,
  `type` ENUM('e','s') NOT NULL ,
  `typeExpense` VARCHAR(20) NOT NULL ,
  `project_id` INT(11) NOT NULL ,
  `consultant_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `financials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `financials` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `financials` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `project_consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project_consultants` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `project_consultants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `project_id` INT(11) NOT NULL ,
  `consultant_id` INT(11) NOT NULL ,
  `value_hour_a_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_b_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_c_individual` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_a_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_b_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  `value_hour_c_group` DECIMAL(16,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `sepgs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sepgs` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `sepgs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `sponsors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sponsors` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `sponsors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(13) NULL DEFAULT NULL ,
  `phone2` VARCHAR(13) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `company_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `type` ENUM('cons','admin','fin_manager','cons_manager','rel_manager') NOT NULL ,
  `consultant_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `username`) )
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
USE `swsdb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;