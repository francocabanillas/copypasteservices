
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(64) NULL,
  `descripcion` VARCHAR(64) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(128) NULL,
  `descripcion` VARCHAR(256) NULL,
  `precio` DECIMAL(10,0) NULL,
  `stock` INT(10) NULL,
  `importancia` INT(10) NULL,
  `imagen` VARCHAR(20) NULL,
  `id_categoria` INT NOT NULL,
  PRIMARY KEY (`id_producto`),
  INDEX `fk_producto_categoria1_idx` (`id_categoria` ASC),
  CONSTRAINT `fk_producto_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` VARCHAR(20) NOT NULL,
  `clave` VARCHAR(20) NULL,
  `nombres` VARCHAR(64) NULL,
  `paterno` VARCHAR(64) NULL,
  `materno` VARCHAR(64) NULL,
  `correo` VARCHAR(64) NULL,
  `direccion` VARCHAR(128) NULL,
  `telefono` VARCHAR(32) NULL,
  `estado` CHAR(1) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NULL,
  `estado` CHAR(1) NULL,
  `total` DECIMAL(10,2) NULL,
  `id_usuario` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  INDEX `fk_pedido_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_pedido_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalle_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id_detalle_pedido` INT NOT NULL AUTO_INCREMENT,
  `id_producto` INT NOT NULL,
  `id_pedido` INT NOT NULL,
  `precio` DECIMAL(10,2) NULL,
  `cantidad` INT(10) NULL,
  PRIMARY KEY (`id_detalle_pedido`, `id_producto`, `id_pedido`),
  INDEX `fk_detalle_pedido_producto1_idx` (`id_producto` ASC),
  INDEX `fk_detalle_pedido_pedido1_idx` (`id_pedido` ASC),
  CONSTRAINT `fk_detalle_pedido_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_pedido_pedido1`
    FOREIGN KEY (`id_pedido`)
    REFERENCES `pedido` (`id_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rol` (
  `rol_nombre` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`rol_nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id_usuario` VARCHAR(20) NOT NULL,
  `rol_nombre` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `rol_nombre`),
  INDEX `fk_usuario_rol_rol1_idx` (`rol_nombre` ASC),
  CONSTRAINT `fk_usuario_rol_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol_rol1`
    FOREIGN KEY (`rol_nombre`)
    REFERENCES `rol` (`rol_nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aviso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aviso` (
  `id_aviso` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(64) NULL,
  `fecha_inicio` DATETIME NULL,
  `fecha_fin` DATETIME NULL,
  `estado` CHAR(1) NULL,
  `id_usuario` VARCHAR(20) NULL,
  PRIMARY KEY (`id_aviso`),
  INDEX `fk_aviso_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_aviso_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

