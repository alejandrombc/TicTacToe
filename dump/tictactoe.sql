/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para hiberus
CREATE DATABASE IF NOT EXISTS `hiberus` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hiberus`;

-- Volcando estructura para tabla hiberus.tictactoe
CREATE TABLE IF NOT EXISTS `tictactoe` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `player` varchar(50) DEFAULT '0',
  `winning_type` varchar(50) DEFAULT '0',
  `state` varchar(50) DEFAULT '0',
  `seconds` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='Table with all game entries';

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
