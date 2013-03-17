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
  `cpf` VARCHAR(14) NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(2) NOT NULL ,
  `acronym_color` VARCHAR(7) NULL ,
  `phone1` VARCHAR(13) NULL ,
  `phone2` VARCHAR(13) NULL ,
  `email` VARCHAR(45) NULL ,
  `removed` TINYINT(1) NOT NULL ,
  UNIQUE INDEX `acronym_UNIQUE` (`acronym` ASC) ,
  UNIQUE INDEX `acronym_color_UNIQUE` (`acronym_color` ASC) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`users`
-- consultor, admin, gerente financeiro, gerente de consultoria, gerente de relacionamento
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`users` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `type` ENUM('cons', 'admin','fin_manager','cons_manager','rel_manager') NOT NULL ,
  `consultant_id` INT NULL ,
  PRIMARY KEY (`id`, `username`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`companies` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cnpj` VARCHAR(18) NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `acronym` VARCHAR(45) NOT NULL ,
  `phone1` VARCHAR(13) NULL ,
  `phone2` VARCHAR(13) NULL ,
  `logo` VARCHAR(45) NULL ,
  `removed` TINYINT(1) NOT NULL ,
  UNIQUE INDEX `acronym_UNIQUE` (`acronym` ASC) ,
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
  `address` VARCHAR(45) NULL ,
  `number` VARCHAR(5) NULL ,
  `neighborhood` VARCHAR(45) NULL ,
  `city` VARCHAR(45) NULL ,
  `state` VARCHAR(45) NULL ,
  `complement` VARCHAR(45) NULL ,
  `zip_code` VARCHAR(10) NULL ,
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
  `name` VARCHAR(45) NULL ,
  `phone1` VARCHAR(13) NULL ,
  `phone2` VARCHAR(13) NULL ,
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
  `name` VARCHAR(45) NULL ,
  `phone1` VARCHAR(13) NULL ,
  `phone2` VARCHAR(13) NULL ,
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
DROP TABLE IF EXISTS `swsdb`.`sponsors` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`sponsors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `phone1` VARCHAR(13) NULL ,
  `phone2` VARCHAR(13) NULL ,
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
  `a_hours_individual` TIME NULL ,
  `b_hours_individual` TIME NULL ,
  `c_hours_individual` TIME NULL ,
  `a_hours_group` TIME NULL ,
  `b_hours_group` TIME NULL ,
  `c_hours_group` TIME NULL ,
  `consultant_id` INT NULL , 
  `parent_project_id` INT NULL ,
  `company_id` INT NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_projects_consultants` (`consultant_id` ASC) ,
  INDEX `fk_projects_projects` (`parent_project_id` ASC) ,
  INDEX `fk_projects_companies` (`company_id` ASC) ,
  CONSTRAINT `fk_projects_consultants`
    FOREIGN KEY (`consultant_id`)
	REFERENCES `swsdb`.`consultants` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
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
  `date` varchar(10) NOT NULL ,
  `observations` MEDIUMTEXT NULL ,
  `description` VARCHAR(100) NOT NULL ,
  `status` ENUM('Planejada', 'Em desenvolvimento', 'Concluída', 'Cancelada') NOT NULL ,
  `project_id` INT NOT NULL ,
  `consultant1_id` INT  ,
  `consultant2_id` INT  ,
  `consultant3_id` INT  ,
  `consultant4_id` INT  ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`attachments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`attachments` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`attachments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `activity_id` INT ,
  `file_name` VARCHAR(20),
  `file` LONGBLOB,  
  `creation_date` VARCHAR(10),
  `removed` TINYINT(1),
  
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`entries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`entries` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`entries` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `date` VARCHAR(12) NOT NULL ,
  `type_consulting` VARCHAR(1) NOT NULL,
  `type` ENUM('Individual', 'Grupo') NOT NULL ,
  `hours_worked` TIME NOT NULL ,
  `observations` MEDIUMTEXT NULL ,
  `consultant_id` INT  NOT NULL ,
  `activity_id` INT  NOT NULL ,
  `approved` TINYINT(1) NOT NULL ,
  `removed` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`),
  INDEX `fk_entries_consultants` (`consultant_id` ASC) ,
  INDEX `fk_entries_activities` (`activity_id` ASC) ,
  CONSTRAINT `fk_entries_consultants`
    FOREIGN KEY (`consultant_id`)
	REFERENCES `swsdb`.`consultants` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
  CONSTRAINT `fk_entries_activities`
    FOREIGN KEY (`activity_id`)
    REFERENCES `swsdb`.`activities` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`activities_consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`activities_consultants` ;

CREATE  TABLE IF NOT EXISTS `swsdb`.`activities_consultants` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `consultant_id` INT NOT NULL ,
  `activity_id` INT NOT NULL ,
   PRIMARY KEY (`id`),
  INDEX `fk_activities_consultants_consultants` (`consultant_id` ASC) ,
  INDEX `fk_activities_consultants_activities` (`activity_id` ASC) ,
  CONSTRAINT `fk_activities_consultants_consultants`
    FOREIGN KEY (`consultant_id`)
    REFERENCES `swsdb`.`consultants` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activities_consultants_activities`
    FOREIGN KEY (`activity_id`)
    REFERENCES `swsdb`.`activities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`project_consultants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`project_consultants`;

CREATE  TABLE IF NOT EXISTS `swsdb`.`project_consultants` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `project_id` INT NOT NULL ,
  `consultant_id` INT NOT NULL ,
  `value_hour_a_individual` DECIMAL(16, 2) NULL ,
  `value_hour_b_individual` DECIMAL(16, 2) NULL ,
  `value_hour_c_individual` DECIMAL(16, 2) NULL ,
  `value_hour_a_group` DECIMAL(16, 2) NULL ,
  `value_hour_b_group` DECIMAL(16, 2) NULL ,
  `value_hour_c_group` DECIMAL(16, 2) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_project_consultants_projects` (`project_id` ASC) ,
  INDEX `fk_project_consultants_consultants` (`consultant_id` ASC) ,
  CONSTRAINT `fk_project_consultants_consultants`
    FOREIGN KEY (`consultant_id`)
    REFERENCES `swsdb`.`consultants` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_consultants_projects`
    FOREIGN KEY (`project_id`)
    REFERENCES `swsdb`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `swsdb`.`expenses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `swsdb`.`expenses`;

CREATE  TABLE IF NOT EXISTS `swsdb`.`expenses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(100) NOT NULL ,
  `value` DECIMAL(16, 2) NOT NULL ,
  `type` ENUM('e', 's') NOT NULL ,
  `project_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,  
  INDEX `fk_expenses_projects` (`project_id` ASC) ,
  CONSTRAINT `fk_expenses_projects`
    FOREIGN KEY (`project_id`)
    REFERENCES `swsdb`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;