-- --------------------------------------------------------
-- Хост:                         185.148.145.93
-- Версия на сървъра:            5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- ОС на сървъра:                Linux
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дъмп структура за таблица site.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `headline` text NOT NULL,
  `story` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица site.news: 0 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Дъмп структура за таблица site.store
CREATE TABLE IF NOT EXISTS `store` (
  `id` smallint(5) unsigned NOT NULL,
  `item_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `disc` varchar(255) DEFAULT NULL,
  `big_name` varchar(255) NOT NULL,
  `item_price_dp` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `item_votes` tinyint(10) NOT NULL DEFAULT '0',
  `item_image` text NOT NULL,
  `item_color` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `item_icons` varchar(255) NOT NULL DEFAULT '0',
  `cat` int(11) NOT NULL,
  `faction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица site.store: 15 rows
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` (`id`, `item_id`, `item_name`, `disc`, `big_name`, `item_price_dp`, `item_votes`, `item_image`, `item_color`, `item_icons`, `cat`, `faction`) VALUES
	(1, 33225, 'Swift Spectral Tiger', '100% Ground Mount', 'Reins of the Swift Spectral Tiger', 2, 1, '/static/images/store/mounts/spectral_1.png', 4, 'ability_mount_whitetiger', 1, 3),
	(2, 33224, 'Spectral Tiger', '60% Ground Mount', 'Reins of the Spectral Tiger', 3, 2, '/static/images/store/mounts/spectral_1.png', 3, 'ability_mount_whitetiger', 1, 3),
	(3, 34329, 'Crux of the Apocalypse', NULL, 'Crux of the Apocalypse', 3, 23, '', 4, 'inv_weapon_shortblade_75', 2, NULL),
	(4, 23716, 'Carved Ogre Idol', NULL, 'Carved Ogre Idol', 3, 3, '', 4, 'inv_misc_idol_01', 2, NULL),
	(5, 32837, 'Warglaive of Azzinoth', NULL, 'Warglaive of Azzinoth', 222, 22, '', 5, 'inv_weapon_glave_01', 2, NULL),
	(6, 32838, 'Warglaive of Azzinoth', NULL, 'Warglaive of Azzinoth', 12, 22, '', 5, 'inv_weapon_glave_01', 2, NULL),
	(7, 19902, 'Swift Zulian Tiger', '100% Ground Mount', 'Swift Zulian Tiger', 2, 4, '/static/images/store/mounts/zulian_tiger.png', 4, 'ability_mount_jungletiger', 1, 3),
	(8, 38576, 'Big Battle Bear', '100% Ground Mount', 'Big Battle Bear', 2, 3, '/static/images/store/mounts/battlebear_1.png', 4, 'ability_druid_challangingroar', 1, 3),
	(9, 19872, 'Swift Razzashi Raptor', '100% Ground Mount', 'Swift Razzashi Raptor', 2, 3, '/static/images/store/mounts/razzashi_raptor.png', 4, 'ability_mount_raptor', 1, 3),
	(10, 8586, 'Mottled Red Raptor', '100% Ground Mount', 'Whistle of the Mottled Red Raptor', 2, 3, '/static/images/store/mounts/mottled_test_1.png', 4, 'ability_mount_raptor', 1, 1),
	(11, 13317, 'Ivory Raptor', '100% Ground Mount', 'Whistle of the Ivory Raptor', 2, 3, '/static/images/store/mounts/ivory_test_1.png', 4, 'ability_mount_raptor', 1, 1),
	(12, 13327, 'Icy Blue Mechanostrider', '100% Ground Mount', 'Icy Blue Mechanostrider Mod A', 2, 3, '/static/images/store/mounts/bluemecha_1.png', 4, 'ability_mount_mechastrider', 1, 0),
	(13, 13326, 'White Mechanostrider Mod A', '100% Ground Mount', 'White Mechanostrider Mod A', 2, 3, '/static/images/store/mounts/whitemecha_1.png', 4, 'ability_mount_mechastrider', 1, 0),
	(14, 35226, 'X-51 Nether-Rocket X-TREME', '280% Flying Mount', 'X-51 Nether-Rocket X-TREME', 2, 3, '/static/images/store/mounts/redrocket_1.png', 4, 'ability_mount_rocketmount', 1, 3),
	(15, 35225, 'X-51 Nether-Rocket', '60% Flying Mount', 'X-51 Nether-Rocket', 2, 3, '/static/images/store/mounts/bluerocket_1.png', 3, 'ability_mount_rocketmountblue', 1, 3);
/*!40000 ALTER TABLE `store` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
