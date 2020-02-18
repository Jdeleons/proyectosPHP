CREATE SCHEMA `gestor` DEFAULT CHARACTER SET utf8mb4 ;

CREATE TABLE `gestor`.`t_usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `insert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_usuario`));

  CREATE TABLE `gestor`.`t_categorias` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `fechaInsert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_categoria`));

  ALTER TABLE `gestor`.`t_categorias` 
ADD INDEX `fkCategoriaUsuario_idx` (`id_usuario` ASC);
;
ALTER TABLE `gestor`.`t_categorias` 
ADD CONSTRAINT `fkCategoriaUsuario`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `gestor`.`t_usuarios` (`id_usuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


  CREATE TABLE `gestor`.`t_archivos` (
  `id_archivos` INT NOT NULL AUTO_INCREMENT,
  `id_categoria` INT NOT NULL,
  `nombreArchivo` VARCHAR(255) NULL,
  `tipoArchivo` VARCHAR(255) NULL,
  `ruta` TEXT NULL,
  `fecha` DATETIME NULL DEFAULT now(),
  PRIMARY KEY (`id_archivos`));

  ALTER TABLE `gestor`.`t_archivos` 
ADD INDEX `fkArchivosCategoria_idx` (`id_categoria` ASC);
;
ALTER TABLE `gestor`.`t_archivos` 
ADD CONSTRAINT `fkArchivosCategoria`
  FOREIGN KEY (`id_categoria`)
  REFERENCES `gestor`.`t_categorias` (`id_categoria`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

  ALTER TABLE `gestor`.`t_archivos` 
ADD COLUMN `id_usuario` INT NOT NULL AFTER `id_archivos`;

ALTER TABLE `gestor`.`t_archivos` 
ADD INDEX `fkUsuariosArchivos_idx` (`id_usuario` ASC);
;
ALTER TABLE `gestor`.`t_archivos` 
ADD CONSTRAINT `fkUsuariosArchivos`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `gestor`.`t_usuarios` (`id_usuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

  ALTER TABLE `gestor`.`t_usuarios` 
ADD COLUMN `tipo` TINYINT NOT NULL AFTER `password`;


-- crear tabla bitacora
id bitacora          int
id persona           int 
fecha                datetime
ejecutor             varchar
actividad realizada  varchar

informacion_actual    TEXT
informacion_anterior  TEXT

crear triggers

CREATE TABLE `gestor`.`t_bitacora` (
  `id_bitacora` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `ejecutor` VARCHAR(45) NOT NULL,
  `actividad_realizada` TEXT NOT NULL,
  `informacion_anterior` TEXT NOT NULL,
  PRIMARY KEY (`id_bitacora`));

-- codigo para crear un triguer y realizar la tabla bitacora

DELIMITER $$
CREATE TRIGGER `persona_insert` AFTER 
INSERT ON `t_usuarios` FOR EACH ROW 
BEGIN 
INSERT INTO t_bitacora (id_persona, ejecutor, actividad_realizada, informacion_actual) 
VALUES(
        NEW.id_usuario,
        CURRENT_USER, 
        'se inserto nueva persona', 
        CONCAT('Informacion actual: ', NEW.nombre,' ',NEW.usuario));
        
END$$
DELIMITER ;

--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx----------------------------------------
CREATE TRIGGER `usuario_delete` 
  AFTER 
DELETE 
ON `t_usuarios` 
  FOR EACH ROW 

BEGIN

INSERT INTO
t_bitacora(id_persona, 
           ejecutor, 
           actividad_realizada, 
           informacion_anterior)
VALUES( OLD.id_usuario, 
       CURRENT_USER, 
       'Se elimino una persona',  
        CONCAT('Informacion anterior: ',
              OLD.nombre,
              OLD.usuario));           

END


----- TRIGUER PARA ELIMINAR UN ARCHIVO
CREATE TRIGGER `archivo_delete` AFTER DELETE ON `t_archivos` FOR EACH ROW BEGIN

INSERT INTO t_bitacora(id_persona, 
                       ejecutor, 
                       actividad_realizada, 
                       informacion_actual)
    VALUES ( OLD.id_usuario, 
                 CURRENT_USER, 
                 'Se elimino un archivo', 
                 CONCAT('Información anterior: ', 
                 OLD.nombreArchivo, OLD.tipoArchivo));

END