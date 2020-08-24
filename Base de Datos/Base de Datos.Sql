create database TesisDB;

use TesisDB;


CREATE TABLE IF NOT EXISTS `Usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `ApellidoUsuario` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-
-- Ingresar datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`IdUsuario`, `NombreUsuario`, `ApellidoUsuario`, `Usuario`, `email`, `Password`, `Image`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 'Administrador', 'Administrador', 'admin', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2017-04-04 09:46:39');
