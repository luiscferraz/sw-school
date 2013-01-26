INSERT INTO `users` (`username`, `password`, `type`, `consultant_id`) VALUES
('admin', 'a759fb1212ff39a9948a0d325d5638d39eb62fa3', 'admin', 1),
('rose', 'f4465763c4eb760d104dc365a6045de47e759ed2', 'cons', 2),
('mia', '3b45f18e1c0a8ed4d44d886a4b5d6d438693d2fc', 'cons', 3),
('armand', 'ffa97a34c064fdf4dc66b6bebed164d67ac40aa6', 'cons', 4),
('demetria', '1bf62359c19352fd3613f99c88285af4edb96856', 'cons',5),
('winifred', '8d18311af7390e2f5d10c6b09821c14bd2bf03ae', 'cons', 6),
('anapaula', '69cc369b8b75286e062194068b2a8668a5316c89', 'cons_manager', 7),

('andreacarolina', '896aa27b5081d0a3133c0009ca80151dd3a4cf13', 'fin_manager', 8),

('nicoleamanda', '6a5a7421043e1dbd4c10cc2afe69f34b3079173a', 'cons', 9),

('gabrielle', '50a56a4567ed81049cea5f07efaece9022b0a9a5', 'cons', 10),

('camila', '61980f5da456f242f7aaf3dc7a7b4f6d6b20fe74', 'cons_manager', 11),

('bruna', 'bca32f42dfad38fe58159b2791864eb151a11592', 'cons', 12),

('arthur', 'c37afbb8923e10e37b3d7c248f79ee96b80184ff', 'cons', 13),

('nicolas', '15bc3210b8f7278d046da9eb9e90c61882790569', 'cons', 14),

('angelo', '72d5d5d0adc3349239f9a2f17dd6018adcb5c9a3', 'cons', 15),

('pedro', 'ad918a1ab9850dc71e4412059624d91d7711bf10', 'rel_manager', 16),

('bruno', '06c5068db7fc9ab9260138fb3697735b97b1ffae', 'cons', 17);

-- A senha é o nome do consultor

INSERT INTO `swsdb`.`consultants` (`name`) VALUES ('Admin');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('041.542.248-59','Rose Farrell Keller','M4H7BJ','(81)5071-4315','(81)1414-1780','dictum.placerat@consequatdolorvitae.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('501.556.822-37','Mia Snyder Jennings','P6F0UQ','(81)2551-0791','(81)8979-3850','fermentum.fermentum.arcu@non.ca', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('912.683.647-54','Armand Mckay Grimes','I2E2ZE','(81)7877-5995','(81)8998-2956','erat@arcuVestibulumante.edu', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('729.557.640-19','Demetria Salas Montgomery','O2Q5GN','(81)7204-2015','(81)2503-2971','eu@augue.com', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES ('552.827.822-86','Winifred Abbott Welch','D7H6VQ','(81)8830-0510','(81)1172-9073','massa.Mauris.vestibulum@Nulla.com', '0');
INSERT INTO `swsdb`.`consultants` (`cpf`,`name`,`acronym_color`,`phone1`,`phone2`,`email`, `removed`) VALUES

('063.265.175-08', 'Ana Paula Pacheco Lisboa', '#6a6ac4', '(71)3322-4545', '(71)9976-6767', 'anapaulapachecolisboa@gmail.com', 0),

('823.578.345-28', 'Andrea Carolina Costa Fernandes', '#27cf62', '(85)5916-3293', '(85)9977-6655', 'carolinacostafernandes@hotmail.com', 0),

('681.332.244-38', 'Nicole Amanda Rocha Ferreira', '#d9d9e0', '(21)9080-9724', '', 'nicolerferreira@gmail.com', 0),

('126.547.127-45', 'Gabrielle Sousa Rodrigues', '#7a7ac7', '(87)5660-3576', '(87)8867-5654', 'gabriellesousarodrigues@yahoo.com.br', 0),

('043.871.166-17', 'Camila Alves Dias Paes', '#e8e8e8', '(34)5417-3542', '(34)9354-2541', 'camilaalvesdias@gmail.com', 0),

('987.160.128-01', 'Bruna Alves Martins Castro', '#28c0db', '(62)7817-5792', '(62)8817-5792', 'brunaalves@gmail.com', 0),

('623.232.588-50', 'Arthur Correia Dias', '#45e651', '(16)4345-4567', '(16)8822-1345', 'arthurcdias@hotmail.com', 0),

('179.579.373-22', 'Nicolas Silva Pereira Martins', '#0c8196', '(11)7700-1929', '(11)8844-0011', 'nicolassilva@yahoo.com.br', 0),

('587.805.637-24', 'Angelo  Sousa Cunha Alves', '#ed0c3d', '(61)3434-5654', '(61)9441-0100', 'angelocunha@gmail.com', 0),

('187.820.121-21', 'Pedro Cavalcanti Lima', '#7ff0d8', '(18)6654-8052', '', 'pedrocavalcantilima@hotmail.com', 0),

('715.544.793-55', 'Bruno Pereira Sousa Passos', '#bed925', '(71)4333-1000', '(71)9775-5341', 'brunosousa@gmail.com', 0);


 


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
(5, '05/01/2013' , 'A' , 7 , 'Viabialidade de custo' , 2 , 2 , 0 , 0 ),
(6,'12/01/2013','C', 10 , 'Alto custo' , 2 ,2 , 0 ,0 ),
(7,'11/01/2013','C', 9 , 'Alto custo' , 2 ,2 , 0 ,0 );