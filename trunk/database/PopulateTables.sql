INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('041.542.248-59','Rose Farrell Keller','CJ','M4H7BJ','(81)5071-4315','(81)1414-1780','dictum.placerat@consequatdolorvitae.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('501.556.822-37','Mia Snyder Jennings','DF','P6F0UQ','(81)2551-0791','(81)8979-3850','fermentum.fermentum.arcu@non.ca', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('912.683.647-54','Armand Mckay Grimes','CZ','I2E2ZE','(81)7877-5995','(81)8998-2956','erat@arcuVestibulumante.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('729.557.640-19','Demetria Salas Montgomery','UU','O2Q5GN','(81)7204-2015','(81)2503-2971','eu@augue.com', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('552.827.822-86','Winifred Abbott Welch','GC','D7H6VQ','(81)8830-0510','(81)1172-9073','massa.Mauris.vestibulum@Nulla.com', '0');

INSERT INTO `swsdb`.`users` (`username`, `password`, `type`) VALUES ('admin', 'a759fb1212ff39a9948a0d325d5638d39eb62fa3', 'adm');

INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('65.536.992/0001-11', 'empresa1', 'e1', '(81)5071-4321', '(81)8979-3467', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('13.355.633/0001-64', 'empresa2', 'e2', '(81)1454-1780', '(81)7377-5975', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('73.556.532/0001-83', 'empresa3', 'e3', '(81)8981-3840', '(81)8945-2856', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('25.648.576/0001-90', 'empresa4', 'e4', '(81)4503-2771', '(81)1453-9034', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('53.254.327/0001-56', 'empresa5', 'e5', '(81)7904-2455', '(81)8090-2310', '0');

INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Moreno', '14443', 'Morro da Conceição', 'Recife', 'PE', 'Casa', '52.280-033', '1', '5');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua da Saúde', '32342', 'Macaxeira', 'Recife', 'PE', 'Casa', '52.090-513', '2', '4');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Rio Douro', '87897', 'Ibura', 'Recife', 'PE', 'Casa', '51.240-020', '3', '3');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Travessa Alto do Pacheco', '23424', 'Tejipió', 'Recife', 'PE', 'Casa', '50.930-301', '4', '2');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Projetada Oito', '54644', 'Pontezinha', 'Cabo de Santo Agostinho', 'PE', 'Casa', '54.589-260', '5', '1');