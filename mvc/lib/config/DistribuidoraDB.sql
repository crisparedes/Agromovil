-- Usuario
CREATE TABLE IF NOT EXISTS `Usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Tipo` char NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Vendedor
CREATE TABLE IF NOT EXISTS `Vendedor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Usuario_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Bodeguero
CREATE TABLE IF NOT EXISTS `Bodeguero` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Usuario_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Proveedor
CREATE TABLE IF NOT EXISTS `Proveedor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nit` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Producto
CREATE TABLE IF NOT EXISTS `Producto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Cantidad` int NOT NULL,
  `PrecioUnitario` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Cliente
CREATE TABLE IF NOT EXISTS `Cliente` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Nit` varchar(15) NOT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Factura
CREATE TABLE IF NOT EXISTS `Factura` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Total` double NOT NULL,
  `Proveedor_Id` int(11) NOT NULL,
  `Bodeguero_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Producto Factura
CREATE TABLE IF NOT EXISTS `ProductoFactura` (
  `Producto_Id` int(11) NOT NULL,
  `Factura_Id` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitarioCompra` double NOT NULL,
  PRIMARY KEY (`Producto_Id`,`Factura_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- Pedido
CREATE TABLE IF NOT EXISTS `Pedido` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` char NOT NULL,
  `FechaPedido` date NOT NULL,
  `Total` double NOT NULL,
  `Vendedor_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- FacturaVenta
CREATE TABLE IF NOT EXISTS `FacturaVenta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Total` double NOT NULL,
  `Cliente_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- Producto Pedido
CREATE TABLE IF NOT EXISTS `ProductoPedido` (
  `Producto_Id` int(11) NOT NULL,
  `Pedido_Id` int(11) NOT NULL,
  `FacturaVenta_Id` int(11) NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Producto_Id`,`Pedido_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


ALTER TABLE `Vendedor`
    ADD CONSTRAINT `fk_vendedor_usuario` FOREIGN KEY (`Usuario_Id`) REFERENCES `Usuario`(`Id`) ON DELETE CASCADE;
    
ALTER TABLE `Bodeguero`
    ADD CONSTRAINT `fk_bodeguero_usuario` FOREIGN KEY (`Usuario_Id`) REFERENCES `Usuario`(`Id`) ON DELETE CASCADE;

ALTER TABLE `Factura`
    ADD CONSTRAINT `fk_factura_proveedor` FOREIGN KEY (`Proveedor_Id`) REFERENCES `Proveedor`(`Id`) ON DELETE CASCADE;

ALTER TABLE `Factura`
    ADD CONSTRAINT `fk_factura_bodeguero` FOREIGN KEY (`Bodeguero_Id`) REFERENCES `Bodeguero`(`Id`) ON DELETE CASCADE;

ALTER TABLE `ProductoFactura`
    ADD CONSTRAINT `fk_productofactura_factura` FOREIGN KEY (`Factura_Id`) REFERENCES `Factura`(`Id`) ON DELETE CASCADE;

ALTER TABLE `ProductoFactura`
    ADD CONSTRAINT `fk_productofactura_producto` FOREIGN KEY (`Producto_Id`) REFERENCES `Producto`(`Id`) ON DELETE CASCADE;

ALTER TABLE `Pedido`
    ADD CONSTRAINT `fk_pedido_vendedor` FOREIGN KEY (`Vendedor_Id`) REFERENCES `Vendedor`(`Id`) ON DELETE CASCADE;

ALTER TABLE `FacturaVenta`
    ADD CONSTRAINT `fk_facturaventa_cliente` FOREIGN KEY (`Cliente_Id`) REFERENCES `Cliente`(`Id`) ON DELETE CASCADE;

ALTER TABLE `ProductoPedido`
    ADD CONSTRAINT `fk_productopedido_producto` FOREIGN KEY (`Producto_Id`) REFERENCES `Producto`(`Id`) ON DELETE CASCADE;

ALTER TABLE `ProductoPedido`
    ADD CONSTRAINT `fk_productopedido_pedido` FOREIGN KEY (`Pedido_Id`) REFERENCES `Pedido`(`Id`) ON DELETE CASCADE;

ALTER TABLE `ProductoPedido`
    ADD CONSTRAINT `fk_productopedido_facturaventa` FOREIGN KEY (`FacturaVenta_Id`) REFERENCES `FacturaVenta`(`Id`) ON DELETE CASCADE;

-- Usuarios necesarios para desarrollo
INSERT INTO Usuario (Email, Password,Tipo)
SELECT 'test@mail.com', '12345','A'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Usuario WHERE Email = 'test@mail.com');

INSERT INTO Usuario (Email, Password,Tipo)
SELECT 'testB@mail.com', '12345','V'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Usuario WHERE Email = 'testB@mail.com');

INSERT INTO Usuario (Email, Password,Tipo)
SELECT 'testV@mail.com', '12345','B'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Usuario WHERE Email = 'testV@mail.com');


-- Vendedor necesario para desarrollo
INSERT INTO Vendedor (Nombre, Telefono, Direccion, Usuario_Id)
SELECT 'Manuel Tay', 43546577, '2 calle 3-05 zona 5', 3
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Vendedor WHERE Usuario_Id = 3);

-- Bodeguero
INSERT INTO Bodeguero (Nombre, Telefono, Direccion, Usuario_Id)
SELECT 'Christian Agustin', 84736784, '3 av 10-32 zona 15', 4
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Bodeguero WHERE Usuario_Id = 4);

-- Proveedor
INSERT INTO Proveedor (Nit, Nombre)
SELECT '1542455-K','Fernando Gonzalez'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Proveedor WHERE Nit = '1542455-K');

INSERT INTO Proveedor (Nit, Nombre)
SELECT '544545-5','Edwin Tay'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Proveedor WHERE Nit = '544545-5');

-- Productos
INSERT INTO Producto(Descripcion, Cantidad, PrecioUnitario)
SELECT 'Impresora HP 290', 10, 700
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Producto WHERE Descripcion = 'Impresora HP 290');

INSERT INTO Producto(Descripcion, Cantidad, PrecioUnitario)
SELECT 'Impresora Canon MP200', 20, 400
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Producto WHERE Descripcion = 'Impresora Canon MP200');

-- Cliente
INSERT INTO Cliente (Nit, Nombre, Telefono, Direccion)
SELECT '45223-K','Fernando Agustin',66324534,'Ciudad de Guatemala'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Proveedor WHERE Nit = '45223-K');

INSERT INTO Cliente (Nit, Nombre, Telefono, Direccion)
SELECT '188349-5','Edward Tay',66232465,'Villa Nueva'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM Proveedor WHERE Nit = '188349-5');
