-- Crear tabla usuarios
DROP TABLE IF EXISTS `usuarios` ;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `usuario` VARCHAR(100) NULL COMMENT '',
  `pass` VARCHAR(100) NULL COMMENT '',
  `rol` TINYINT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

-- Crear tabla noticias
DROP TABLE IF EXISTS `noticias` ;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `titulo` VARCHAR(255) NULL COMMENT '',
  `texto` TEXT NULL COMMENT '',
  PRIMARY KEY (`id_noticia`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

-- Insertar usuarios
INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `rol`) VALUES 
(1, 'admin', 'admin', 1), (2, 'user', 'user', 2);
