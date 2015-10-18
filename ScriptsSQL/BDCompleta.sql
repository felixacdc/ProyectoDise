-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema edusoft
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema edusoft
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `edusoft` DEFAULT CHARACTER SET utf8 ;
USE `edusoft` ;

-- -----------------------------------------------------
-- Table `edusoft`.`profesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`profesiones` (
  `idProfesion` INT(11) NOT NULL AUTO_INCREMENT,
  `Profesion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idProfesion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`catedraticos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`catedraticos` (
  `idCatedratico` INT(11) NOT NULL AUTO_INCREMENT,
  `codigoCatedratico` INT(11) NOT NULL,
  `nombreCatedratico` VARCHAR(60) NOT NULL,
  `domicilioCatedratico` VARCHAR(100) NOT NULL,
  `telefonoCatedratico` VARCHAR(8) NOT NULL,
  `emailCatedratico` VARCHAR(20) NULL DEFAULT NULL,
  `Profesiones_idProfesion` INT(11) NOT NULL,
  PRIMARY KEY (`idCatedratico`),
  UNIQUE INDEX `codigoCatedratico_UNIQUE` (`codigoCatedratico` ASC),
  INDEX `fk_Catedraticos_Profesiones1_idx` (`Profesiones_idProfesion` ASC),
  CONSTRAINT `fk_Catedraticos_Profesiones1`
    FOREIGN KEY (`Profesiones_idProfesion`)
    REFERENCES `edusoft`.`profesiones` (`idProfesion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`cursos` (
  `idCurso` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCurso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`grado` (
  `idGrado` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idGrado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`asignacioncursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`asignacioncursos` (
  `idAsignacionCursos` INT(11) NOT NULL,
  `IdGrado` INT(11) NOT NULL,
  `IdCurso` INT(11) NOT NULL,
  `IdCatedratico` INT(11) NOT NULL,
  PRIMARY KEY (`idAsignacionCursos`),
  INDEX `GradosAsigCursos_idx` (`IdGrado` ASC),
  INDEX `CursosAsigCursos_idx` (`IdCurso` ASC),
  INDEX `AsigCurCate_idx` (`IdCatedratico` ASC),
  CONSTRAINT `AsigCurCate`
    FOREIGN KEY (`IdCatedratico`)
    REFERENCES `edusoft`.`catedraticos` (`idCatedratico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CursosAsigCursos`
    FOREIGN KEY (`IdCurso`)
    REFERENCES `edusoft`.`cursos` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `GradosAsigCursos`
    FOREIGN KEY (`IdGrado`)
    REFERENCES `edusoft`.`grado` (`idGrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`cicloescolar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`cicloescolar` (
  `idCicloEscolar` INT(11) NOT NULL AUTO_INCREMENT,
  `Año` INT(11) NOT NULL,
  PRIMARY KEY (`idCicloEscolar`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`encargados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`encargados` (
  `idEncargado` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreEncargado` VARCHAR(60) NOT NULL,
  `domicilioEncargado` VARCHAR(100) NOT NULL,
  `numeroContacto` VARCHAR(8) NOT NULL,
  `emailContacto` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idEncargado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`estados` (
  `idEstado` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoEstado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`estudiantes` (
  `idEstudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `numeroCarne` VARCHAR(200) NOT NULL,
  `nombreEstudiante` VARCHAR(60) NOT NULL,
  `direccionEstudiante` VARCHAR(100) NOT NULL,
  `telefonoEstudiante` VARCHAR(8) NOT NULL,
  `emailEstudiante` VARCHAR(20) NOT NULL,
  `idEncargado` INT(11) NOT NULL,
  `idEstado` INT(11) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  UNIQUE INDEX `numeroCarne_UNIQUE` (`numeroCarne` ASC),
  INDEX `fk_Estudiantes_Encargados_idx` (`idEncargado` ASC),
  INDEX `fk_Estudiantes_Estados1_idx` (`idEstado` ASC),
  CONSTRAINT `fk_Estudiantes_Encargados`
    FOREIGN KEY (`idEncargado`)
    REFERENCES `edusoft`.`encargados` (`idEncargado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Estados1`
    FOREIGN KEY (`idEstado`)
    REFERENCES `edusoft`.`estados` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`Seccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`Seccion` (
  `idSeccion` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(145) NOT NULL,
  PRIMARY KEY (`idSeccion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `edusoft`.`AsignacionSeccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`AsignacionSeccion` (
  `idAsignacionSeccion` INT NOT NULL AUTO_INCREMENT,
  `idSeccion` INT NOT NULL,
  `idGrado` INT NOT NULL,
  PRIMARY KEY (`idAsignacionSeccion`),
  INDEX `fkasigseccysecc_idx` (`idSeccion` ASC),
  INDEX `fkasiggradygrad_idx` (`idGrado` ASC),
  CONSTRAINT `fkasigseccysecc`
    FOREIGN KEY (`idSeccion`)
    REFERENCES `edusoft`.`Seccion` (`idSeccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkasiggradygrad`
    FOREIGN KEY (`idGrado`)
    REFERENCES `edusoft`.`grado` (`idGrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `edusoft`.`asignaciongrados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`asignaciongrados` (
  `idAsignacionGrados` INT(11) NOT NULL,
  `IdEstudiante` INT(11) NOT NULL,
  `IdCicloEscolar` INT(11) NOT NULL,
  `idAsignacionSeccion` INT(11) NOT NULL,
  PRIMARY KEY (`idAsignacionGrados`),
  INDEX `EstudianteAsigGrado_idx` (`IdEstudiante` ASC),
  INDEX `AsigGraCiclo_idx` (`IdCicloEscolar` ASC),
  INDEX `fkasiggrayasigsecc_idx` (`idAsignacionSeccion` ASC),
  CONSTRAINT `AsigGraCiclo`
    FOREIGN KEY (`IdCicloEscolar`)
    REFERENCES `edusoft`.`cicloescolar` (`idCicloEscolar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `EstudianteAsigGrado`
    FOREIGN KEY (`IdEstudiante`)
    REFERENCES `edusoft`.`estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkasiggrayasigsecc`
    FOREIGN KEY (`idAsignacionSeccion`)
    REFERENCES `edusoft`.`AsignacionSeccion` (`idAsignacionSeccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`tipotransacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`tipotransacciones` (
  `idtipoTransaccion` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoTransaccion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idtipoTransaccion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`nivelesacademicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`nivelesacademicos` (
  `idnivelAcademico` INT(11) NOT NULL AUTO_INCREMENT,
  `nivelAcademico` VARCHAR(50) NOT NULL,
  `valorInscripcion` DECIMAL(20,2) NOT NULL,
  `valorColegiatura` DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (`idnivelAcademico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`tipopago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`tipopago` (
  `idTipoPago` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idTipoPago`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`transacciones` (
  `idTransaccion` INT(11) NOT NULL AUTO_INCREMENT,
  `idEstudiante` INT(11) NOT NULL,
  `IdTipoPago` INT(11) NOT NULL,
  `IdNivelAcademico` INT(11) NOT NULL,
  `fechaTransaccion` DATE NOT NULL,
  `montoTotal` DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (`idTransaccion`),
  INDEX `fk_Transacciones_Estudiantes1_idx` (`idEstudiante` ASC),
  INDEX `fk_trasacciontipop_idx` (`IdTipoPago` ASC),
  INDEX `fk_trasaccionnivelAcad_idx` (`IdNivelAcademico` ASC),
  CONSTRAINT `fk_Transacciones_Estudiantes1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `edusoft`.`estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trasaccionnivelAcad`
    FOREIGN KEY (`IdNivelAcademico`)
    REFERENCES `edusoft`.`nivelesacademicos` (`idnivelAcademico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trasacciontipop`
    FOREIGN KEY (`IdTipoPago`)
    REFERENCES `edusoft`.`tipopago` (`idTipoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`mes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`mes` (
  `idMes` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`detalletransacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`detalletransacciones` (
  `iddetalleTransaccion` INT(11) NOT NULL AUTO_INCREMENT,
  `idTransaccion` INT(11) NOT NULL,
  `idtipoTransaccion` INT(11) NOT NULL,
  `IdMes` INT(11) NOT NULL,
  `IdCicloEscolar` INT(11) NOT NULL,
  `subTotal` DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (`iddetalleTransaccion`),
  INDEX `fk_detalleTransaccion_Transacciones1_idx` (`idTransaccion` ASC),
  INDEX `fk_detalleTransaccion_tipoTransacciones1_idx` (`idtipoTransaccion` ASC),
  INDEX `fk_detalltransa_mes_idx` (`IdMes` ASC),
  INDEX `fk_detalletransa_ciclo_idx` (`IdCicloEscolar` ASC),
  CONSTRAINT `fk_detalleTransaccion_tipoTransacciones1`
    FOREIGN KEY (`idtipoTransaccion`)
    REFERENCES `edusoft`.`tipotransacciones` (`idtipoTransaccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleTransaccion_Transacciones1`
    FOREIGN KEY (`idTransaccion`)
    REFERENCES `edusoft`.`transacciones` (`idTransaccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalletransa_ciclo`
    FOREIGN KEY (`IdCicloEscolar`)
    REFERENCES `edusoft`.`cicloescolar` (`idCicloEscolar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalltransa_mes`
    FOREIGN KEY (`IdMes`)
    REFERENCES `edusoft`.`mes` (`idMes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`tipousuario` (
  `idTipoUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `edusoft`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edusoft`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(100) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `IdTipoUsuario` INT(11) NOT NULL,
  `IdEstudiante` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`),
  INDEX `fk_Usuario_tipousuario_idx` (`IdTipoUsuario` ASC),
  INDEX `fk_Estudiante_Usuario_idx` (`IdEstudiante` ASC),
  CONSTRAINT `fk_Estudiante_Usuario`
    FOREIGN KEY (`IdEstudiante`)
    REFERENCES `edusoft`.`estudiantes` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_tipousuario`
    FOREIGN KEY (`IdTipoUsuario`)
    REFERENCES `edusoft`.`tipousuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `edusoft`.`encargados`
-- -----------------------------------------------------
START TRANSACTION;
USE `edusoft`;
INSERT INTO `edusoft`.`encargados` (`idEncargado`, `nombreEncargado`, `domicilioEncargado`, `numeroContacto`, `emailContacto`) VALUES (1, 'Julio Antonio Lopez', '4ta calle 3-29 zona 5', '67542374', 'jal01@gmail.com');

COMMIT;


-- -----------------------------------------------------
-- Data for table `edusoft`.`estados`
-- -----------------------------------------------------
START TRANSACTION;
USE `edusoft`;
INSERT INTO `edusoft`.`estados` (`idEstado`, `tipoEstado`) VALUES (1, 'Activo');
INSERT INTO `edusoft`.`estados` (`idEstado`, `tipoEstado`) VALUES (2, 'Desactivo');

COMMIT;


-- -----------------------------------------------------
-- Data for table `edusoft`.`estudiantes`
-- -----------------------------------------------------
START TRANSACTION;
USE `edusoft`;
INSERT INTO `edusoft`.`estudiantes` (`idEstudiante`, `numeroCarne`, `nombreEstudiante`, `direccionEstudiante`, `telefonoEstudiante`, `emailEstudiante`, `idEncargado`, `idEstado`) VALUES (1, 'a1', 'Lucas Perez', 'Reu', '53625344', 'LP@gmail.com', 1, 1);
INSERT INTO `edusoft`.`estudiantes` (`idEstudiante`, `numeroCarne`, `nombreEstudiante`, `direccionEstudiante`, `telefonoEstudiante`, `emailEstudiante`, `idEncargado`, `idEstado`) VALUES (2, 'b2', 'Maria Lopez', 'Reu', '56342122', 'ml01@gmail.com', 1, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `edusoft`.`tipousuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `edusoft`;
INSERT INTO `edusoft`.`tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES (1, 'Director');
INSERT INTO `edusoft`.`tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES (2, 'Secretaria');
INSERT INTO `edusoft`.`tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES (3, 'Catedratico');
INSERT INTO `edusoft`.`tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES (4, 'Estudiante');

COMMIT;


-- -----------------------------------------------------
-- Data for table `edusoft`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `edusoft`;
INSERT INTO `edusoft`.`usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES (1, 'admin01', '12345', 1, NULL);
INSERT INTO `edusoft`.`usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES (2, 'secre01', 'abcde', 2, NULL);
INSERT INTO `edusoft`.`usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES (3, 'master01', '12345', 3, NULL);
INSERT INTO `edusoft`.`usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES (4, 'alum01', 'abcde', 4, 1);
INSERT INTO `edusoft`.`usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES (5, 'alum02', '12345', 4, 2);

COMMIT;

