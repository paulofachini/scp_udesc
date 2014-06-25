SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ponto` DEFAULT CHARACTER SET latin1 ;
USE `ponto` ;

-- -----------------------------------------------------
-- Table `ponto`.`calendarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`calendarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ano` INT(11) NULL DEFAULT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE = INNODB
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ponto`.`calendariosdet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`calendariosdet` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `dataini` DATE NULL DEFAULT NULL,
  `datafin` DATE NULL DEFAULT NULL,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `calendario` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `calendario`),
  CONSTRAINT `fk_calendariosdet_calendarios1`
  FOREIGN KEY (`calendario`)
  REFERENCES `ponto`.`calendarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB
  DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_calendariosdet_calendarios1_idx` ON `ponto`.`calendariosdet` (`calendario` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`configuracoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`configuracoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `chave` VARCHAR(45) NULL DEFAULT NULL,
  `valor` VARCHAR(2000) NULL DEFAULT NULL,
  `label` VARCHAR(200) NULL DEFAULT NULL,
  `mascara` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE = INNODB
  AUTO_INCREMENT = 8
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ponto`.`datas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`datas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE = INNODB
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ponto`.`setores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`setores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `codinteg` INT(11) NULL DEFAULT NULL,
  `lider_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_setores_pessoas1`
  FOREIGN KEY (`lider_id`)
  REFERENCES `ponto`.`pessoas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB
  AUTO_INCREMENT = 2;

CREATE INDEX `fk_setores_pessoas1_idx` ON `ponto`.`setores` (`lider_id` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`tipopessoas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`tipopessoas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `codinteg` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  ENGINE = INNODB
  AUTO_INCREMENT = 2
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ponto`.`pessoas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`pessoas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codinteg` INT(11) NULL DEFAULT NULL,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(200) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `setor` INT(11) NOT NULL,
  `tipoPessoa` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_pessoas_setores`
  FOREIGN KEY (`setor`)
  REFERENCES `ponto`.`setores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoas_tipoPessoas1`
  FOREIGN KEY (`tipoPessoa`)
  REFERENCES `ponto`.`tipopessoas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB
  AUTO_INCREMENT = 2;

CREATE INDEX `fk_pessoas_setores_idx` ON `ponto`.`pessoas` (`setor` ASC);

CREATE INDEX `fk_pessoas_tipoPessoas1_idx` ON `ponto`.`pessoas` (`tipoPessoa` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`registropontos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`registropontos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` INT(11) NOT NULL,
  `pessoa` INT(11) NOT NULL,
  `hora` TIME NULL DEFAULT NULL,
  `registropontoscol` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_registropontos_datas1`
  FOREIGN KEY (`data`)
  REFERENCES `ponto`.`datas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registropontos_pessoas1`
  FOREIGN KEY (`pessoa`)
  REFERENCES `ponto`.`pessoas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB;

CREATE INDEX `fk_registropontos_datas1_idx` ON `ponto`.`registropontos` (`data` ASC);

CREATE INDEX `fk_registropontos_pessoas1_idx` ON `ponto`.`registropontos` (`pessoa` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`banco_horas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`banco_horas` (
  `id` INT(11) NOT NULL,
  `numero_horas` FLOAT NOT NULL,
  `pessoas_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_banco_horas_pessoas1`
  FOREIGN KEY (`pessoas_id`)
  REFERENCES `ponto`.`pessoas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB;

CREATE INDEX `fk_banco_horas_pessoas1_idx` ON `ponto`.`banco_horas` (`pessoas_id` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`batida_ponto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`batida_ponto` (
  `id` INT(11) NOT NULL,
  `bat_dia` DATETIME NULL DEFAULT NULL,
  `total_horas` FLOAT NULL,
  `situacao` INT(11) NULL DEFAULT NULL,
  `pessoas_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_batida_ponto_pessoas1`
  FOREIGN KEY (`pessoas_id`)
  REFERENCES `ponto`.`pessoas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB;

CREATE INDEX `fk_batida_ponto_pessoas1_idx` ON `ponto`.`batida_ponto` (`pessoas_id` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`batida_ponto_hora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`batida_ponto_hora` (
  `bath_codbath` INT(11) NOT NULL,
  `hora` DATETIME NOT NULL,
  `batida_ponto_id` INT(11) NOT NULL,
  PRIMARY KEY (`bath_codbath`),
  CONSTRAINT `fk_batida_ponto_hora_batida_ponto1`
  FOREIGN KEY (`batida_ponto_id`)
  REFERENCES `ponto`.`batida_ponto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB;

CREATE INDEX `fk_batida_ponto_hora_batida_ponto1_idx` ON `ponto`.`batida_ponto_hora` (`batida_ponto_id` ASC);


-- -----------------------------------------------------
-- Table `ponto`.`horas_pagas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto`.`horas_pagas` (
  `id` INT(11) NOT NULL,
  `horas` FLOAT NOT NULL,
  `banco_horas_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_horas_pagas_banco_horas1`
  FOREIGN KEY (`banco_horas_id`)
  REFERENCES `ponto`.`banco_horas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = INNODB;

CREATE INDEX `fk_tb_horas_pagas_banco_horas1_idx` ON `ponto`.`horas_pagas` (`banco_horas_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `setores` VALUES (1,'AdministraÃ§Ã£o',1, NULL),(2,'Administrativo',2, NULL),(3,'Desenvolvimento',77, NULL);

INSERT INTO `tipopessoas` VALUES (1,'Administrador',1),(2,'RH',2);

INSERT INTO `pessoas` VALUES (1,44,'Administrador','adm@sisponto.com.br','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,1),(2,122,'FuncionÃ¡rio 12','f12@sisponto.com.br','da39a3ee5e6b4b0d3255bfef95601890afd80709',2,1);

INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (1,'horas_diarias','1','Horas diarias',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (2,'horario_entrada','2','Horário Entrada',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (3,'horario_saida_almoco','3','Horário Saída para Almoço',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (4,'horario_entrada_almoco','4','Horário Entrada após Almoço',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (5,'horario_saida','5','Horário Saída',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (6,'tempo_tolerancia','6','Tempo de Tolerância',NULL);
INSERT  INTO `configuracoes`(`id`,`chave`,`valor`,`label`,`mascara`) VALUES (7,'dia_inicial','7','Dia Inicial',NULL);
