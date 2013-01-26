INSERT INTO `users` (`username`, `password`, `type`, `consultant_id`) VALUES
('admin', 'a759fb1212ff39a9948a0d325d5638d39eb62fa3', 'admin', 1),
('rose', 'f4465763c4eb760d104dc365a6045de47e759ed2', 'cons', 2),
('mia', '3b45f18e1c0a8ed4d44d886a4b5d6d438693d2fc', 'cons', 3),
('armand', 'ffa97a34c064fdf4dc66b6bebed164d67ac40aa6', 'cons', 4),
('demetria', '1bf62359c19352fd3613f99c88285af4edb96856', 'cons',5),
('winifred', '8d18311af7390e2f5d10c6b09821c14bd2bf03ae', 'cons', 6);
-- A senha é o nome do consultor

INSERT INTO `swsdb`.`consultants` (`name`) VALUES ('Admin');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('041.542.248-59','Rose Farrell Keller','M4H7BJ','(81)5071-4315','(81)1414-1780','dictum.placerat@consequatdolorvitae.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('501.556.822-37','Mia Snyder Jennings','P6F0UQ','(81)2551-0791','(81)8979-3850','fermentum.fermentum.arcu@non.ca', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('912.683.647-54','Armand Mckay Grimes','I2E2ZE','(81)7877-5995','(81)8998-2956','erat@arcuVestibulumante.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('729.557.640-19','Demetria Salas Montgomery','O2Q5GN','(81)7204-2015','(81)2503-2971','eu@augue.com', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('552.827.822-86','Winifred Abbott Welch','D7H6VQ','(81)8830-0510','(81)1172-9073','massa.Mauris.vestibulum@Nulla.com', '0');

INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('65.536.992/0001-11', 'empresa1', 'e1', '(81)5071-4321', '(81)8979-3467', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('13.355.633/0001-64', 'empresa2', 'e2', '(81)1454-1780', '(81)7377-5975', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('73.556.532/0001-83', 'empresa3', 'e3', '(81)8981-3840', '(81)8945-2856', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('25.648.576/0001-90', 'empresa4', 'e4', '(81)4503-2771', '(81)1453-9034', '0');
INSERT INTO `swsdb`.`companies` (`cnpj`, `name`, `acronym`, `phone1`, `phone2`, `removed`) VALUES ('53.254.327/0001-56', 'empresa5', 'e5', '(81)7904-2455', '(81)8090-2310', '0');

INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Moreno', '14443', 'Morro da Conceição', 'Recife', 'PE', 'Casa', '52.280-033', '1', '0');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua da Saúde', '32342', 'Macaxeira', 'Recife', 'PE', 'Casa', '52.090-513', '0', '4');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Rio Douro', '87897', 'Ibura', 'Recife', 'PE', 'Casa', '51.240-020', '0', '3');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Travessa Alto do Pacheco', '23424', 'Tejipió', 'Recife', 'PE', 'Casa', '50.930-301', '0', '2');
INSERT INTO `swsdb`.`addresses` (`address`, `number`, `neighborhood`, `city`, `state`, `complement`, `zip_code`, `consultant_id`, `company_id`) VALUES ('Rua Projetada Oito', '54644', 'Pontezinha', 'Cabo de Santo Agostinho', 'PE', 'Casa', '54.589-260', '5', '0');

INSERT INTO `swsdb`.`projects` (`id`, `name`, `description`, `acronym`, `a_hours_individual`, `b_hours_individual`, `c_hours_individual`, `a_hours_group`, `b_hours_group`, `c_hours_group`, `consultant_id`, `parent_project_id`, `company_id`, `removed`) VALUES (NULL, 'Sistema de Hotel', 'Controle de hotéis', 'SH', '10:00:00', '10:00:00', '10:00:00', '20:00:00', '20:00:00', '20:00:00', '1', NULL, '1', '0');
INSERT INTO `swsdb`.`projects` (`id`, `name`, `description`, `acronym`, `a_hours_individual`, `b_hours_individual`, `c_hours_individual`, `a_hours_group`, `b_hours_group`, `c_hours_group`, `consultant_id`, `parent_project_id`, `company_id`, `removed`) VALUES (NULL, 'Controle de lanchonete', 'Auxilar nas vendas', 'CL', '15:00:00', '10:00:00', '18:00:00', '10:00:00', '7:00:00', '30:00:00', '3', NULL, '4', '0');
INSERT INTO `swsdb`.`projects` (`id`, `name`, `description`, `acronym`, `a_hours_individual`, `b_hours_individual`, `c_hours_individual`, `a_hours_group`, `b_hours_group`, `c_hours_group`, `consultant_id`, `parent_project_id`, `company_id`, `removed`) VALUES (NULL, 'Sistema de estoque', 'Controlar o estoque', 'SE', '3:00:00', '3:00:00', '3:00:00', '10:00:00', '5:00:00', '5:00:00', '5', '2', '5', '0');

INSERT INTO `activities` (`id`, `start_hours`, `end_hours`, `date`, `observations`, `description`, `status`, `project_id`, `consultant1_id`, `consultant2_id`, `consultant3_id`, `consultant4_id`, `removed`) VALUES
(1, '10:00:00', '16:00:00', '15/01/2013', 'Varredura nos servidores e fitas de backups', 'Verificacao da qualidade do armazenamento fisico', 'Iniciada', 1, 1, 2, 3, 5, 0),
(2, '08:00:00', '10:00:00', '28/01/2013', 'Verificar distancia entre os pontos e as situacoes adversas', 'Estudo de viabilidade de conexao com fibra otica', 'Em desenvolvimento', 3, 1, 4, NULL, NULL, 0);

INSERT INTO `entries` (`id`, `date`, `type_consulting`, `hours_worked`, `observations`, `consultant_id`, `activity_id`, `approve`, `removed`) VALUES
(1, '10/01/2013', 'A', '10:00:00', 'A qualidade estava excelente', 2, 1, 0, 0),
(2, '19/01/2013', 'C', '05:00:00', 'Apos estudo foi atestado que o custo ficaria muito alto para a distancia entre os pontos, o melhor seria utilizar cabo utp', 3, 2, 0, 0),
(3, '25/01/2013', 'B',1, 'Inviabilidade técnica',2,2,0,0 ),
(4,'13/01/2013','C', 12 , 'Alto custo' , 2 ,2 , 0 ,0 ),
(5, '05/01/2013' , 'A' , 7 , 'Viabialidade de custo' , 2 , 2 , 0 , 0 );