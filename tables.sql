/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cookies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cookies`;

CREATE TABLE `cookies` (
  `cookie_key` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cookie_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `event_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `event_auth_code` smallint(6) DEFAULT '0',
  `google_eid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table faktura
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faktura`;

CREATE TABLE `faktura` (
  `faktura_id` smallint(6) NOT NULL,
  `oppdrag_id` smallint(6) NOT NULL,
  `fakturanr` smallint(6) NOT NULL,
  `kommentar` text,
  `sendt_dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `betalt_dato` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`faktura_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table minus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `minus`;

CREATE TABLE `minus` (
  `minus_id` int(11) NOT NULL,
  `commentary` text,
  `event_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`minus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT 'Melding',
  `message` text NOT NULL,
  `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_id` smallint(6) NOT NULL,
  `news_auth_code` smallint(6) DEFAULT '0',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table oppdrag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oppdrag`;

CREATE TABLE `oppdrag` (
  `oppdrag_id` int(11) NOT NULL,
  `bekreftet` tinyint(1) DEFAULT '0',
  `dato` date NOT NULL,
  `tid` time DEFAULT NULL,
  `sted` text NOT NULL,
  `oppdragsgiver` varchar(150) DEFAULT '',
  `oppdragstype` varchar(30) DEFAULT '',
  `ant_sanger` bigint(20) DEFAULT NULL,
  `pris` varchar(30) DEFAULT '',
  `kontaktperson` varchar(80) DEFAULT '',
  `kontaktnr` bigint(20) DEFAULT NULL,
  `kontaktepost` varchar(60) DEFAULT NULL,
  `notat` text,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`oppdrag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table songfiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `songfiles`;

CREATE TABLE `songfiles` (
  `songfile_id` int(11) NOT NULL,
  `showing_name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `voice` smallint(6) DEFAULT '0',
  `parent_id` smallint(6) NOT NULL,
  `auth_code` smallint(6) DEFAULT '-10',
  PRIMARY KEY (`songfile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table songs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `songs`;

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_trimmed` varchar(255) NOT NULL,
  `auth_code` smallint(6) DEFAULT '-10',
  PRIMARY KEY (`song_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(100) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `bilag_nr` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `auth_code` smallint(6) DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `voice` smallint(6) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
