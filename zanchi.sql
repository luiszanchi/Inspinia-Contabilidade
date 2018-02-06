-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.21-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para zanchi
DROP DATABASE IF EXISTS `zanchi`;
CREATE DATABASE IF NOT EXISTS `zanchi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zanchi`;

-- Copiando estrutura para tabela zanchi.gastos
DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `cd_gastos` bigint(20) NOT NULL AUTO_INCREMENT,
  `cd_tipo_gasto` int(11) NOT NULL,
  `tp_operacao` varchar(1) COLLATE utf8_bin NOT NULL,
  `ds_gasto` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `dt_gasto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vl_gasto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cd_gastos`),
  KEY `FK_GASTO_TO_TIPO_GASTO` (`cd_tipo_gasto`),
  CONSTRAINT `FK_GASTO_TO_TIPO_GASTO` FOREIGN KEY (`cd_tipo_gasto`) REFERENCES `tipo_gasto` (`cd_tipo_gasto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela zanchi.gastos: ~0 rows (aproximadamente)
DELETE FROM `gastos`;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;

-- Copiando estrutura para tabela zanchi.grupo_gasto
DROP TABLE IF EXISTS `grupo_gasto`;
CREATE TABLE IF NOT EXISTS `grupo_gasto` (
  `cd_grupo_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `ds_grupo_gasto` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cd_grupo_gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela zanchi.grupo_gasto: ~5 rows (aproximadamente)
DELETE FROM `grupo_gasto`;
/*!40000 ALTER TABLE `grupo_gasto` DISABLE KEYS */;
INSERT INTO `grupo_gasto` (`cd_grupo_gasto`, `ds_grupo_gasto`) VALUES
	(1, 'Empresa'),
	(2, 'Alimentacao'),
	(3, 'Superfluo'),
	(4, 'Transporte'),
	(5, 'Externo'),
	(6, 'Ensino');
/*!40000 ALTER TABLE `grupo_gasto` ENABLE KEYS */;

-- Copiando estrutura para tabela zanchi.meio_pag_rec
DROP TABLE IF EXISTS `meio_pag_rec`;
CREATE TABLE IF NOT EXISTS `meio_pag_rec` (
  `cd_meio_pag_rec` int(11) NOT NULL AUTO_INCREMENT,
  `ds_meio_pag_rec` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_meio_pag_rec`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zanchi.meio_pag_rec: ~3 rows (aproximadamente)
DELETE FROM `meio_pag_rec`;
/*!40000 ALTER TABLE `meio_pag_rec` DISABLE KEYS */;
INSERT INTO `meio_pag_rec` (`cd_meio_pag_rec`, `ds_meio_pag_rec`) VALUES
	(1, 'Dinheiro'),
	(2, 'Cartão');
/*!40000 ALTER TABLE `meio_pag_rec` ENABLE KEYS */;

-- Copiando estrutura para tabela zanchi.tipo_gasto
DROP TABLE IF EXISTS `tipo_gasto`;
CREATE TABLE IF NOT EXISTS `tipo_gasto` (
  `cd_tipo_gasto` int(100) NOT NULL AUTO_INCREMENT,
  `ds_tipo_gasto` varchar(200) COLLATE utf8_bin NOT NULL,
  `cd_grupo_gasto` int(11) NOT NULL,
  PRIMARY KEY (`cd_tipo_gasto`),
  KEY `FK_TIPO_GASTO_TO_GRUPO_GASTO` (`cd_grupo_gasto`),
  CONSTRAINT `FK_TIPO_GASTO_TO_GRUPO_GASTO` FOREIGN KEY (`cd_grupo_gasto`) REFERENCES `grupo_gasto` (`cd_grupo_gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela zanchi.tipo_gasto: ~9 rows (aproximadamente)
DELETE FROM `tipo_gasto`;
/*!40000 ALTER TABLE `tipo_gasto` DISABLE KEYS */;
INSERT INTO `tipo_gasto` (`cd_tipo_gasto`, `ds_tipo_gasto`, `cd_grupo_gasto`) VALUES
	(1, 'Salario', 1),
	(2, 'Unisinos', 2),
	(3, 'Lanches', 2),
	(4, 'Refeição', 2),
	(5, 'Uber', 2),
	(6, 'Passagem', 2),
	(7, 'Serviço', 1),
	(8, 'Outros', 2),
	(11, 'Outros', 1);
/*!40000 ALTER TABLE `tipo_gasto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
