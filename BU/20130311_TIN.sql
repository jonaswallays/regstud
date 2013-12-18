-- phpMyAdmin SQL Dump
-- version 2.11.11
-- http://www.phpmyadmin.net
--
-- Host: flupke.hogent.be:3306
-- Generation Time: Mar 11, 2013 at 03:24 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `fbo_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `seckeuze`
--

CREATE TABLE IF NOT EXISTS `seckeuze` (
  `id` int(11) NOT NULL auto_increment,
  `naam` varchar(256) NOT NULL,
  `voornaam` varchar(256) NOT NULL,
  `straat` varchar(256) default NULL,
  `pc` varchar(256) default NULL,
  `gemeente` varchar(256) default NULL,
  `sexe` varchar(256) default NULL,
  `email` varchar(256) default NULL,
  `school` varchar(256) default NULL,
  `locatie_school` varchar(256) default NULL,
  `richting_school` varchar(256) default NULL,
  `memo` mediumblob,
  `fac` varchar(256) default NULL,
  `opl` varchar(2048) default NULL,
  `keuze` varchar(2048) default NULL,
  `regdate` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `seckeuze`
--

INSERT INTO `seckeuze` (`id`, `naam`, `voornaam`, `straat`, `pc`, `gemeente`, `sexe`, `email`, `school`, `locatie_school`, `richting_school`, `memo`, `fac`, `opl`, `keuze`, `regdate`) VALUES
(1, 'maenhout', 'julie', '', '', '', NULL, 'julietjemaenhout@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Financie- en verzekeringswezen', '2013-02-27 13:41:29'),
(2, 'Van Keer', 'Sofie', 'Berkenveld 11', '9255', 'Buggenhout', NULL, 'sofievankeer@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Office management', '  Medical management assistant', '2013-02-27 14:18:43'),
(3, 'Lasoen', 'Angelo', 'Koningin Fabiolalaan 11', '9990', 'Maldegem', NULL, 'angelo4lasoen@gmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-27 15:36:33'),
(4, 'debels', 'stéphanie', 'roggelaan 45', '8500', 'kortrijk', NULL, 'debelsstephanie@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Marketing', '2013-02-27 15:41:05'),
(5, 'baudoux', 'roxane', 'lekestraat 39', '9190', 'stekene', NULL, 'roxane_baudoux@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Marketing', '2013-02-27 15:53:51'),
(6, 'desmet', 'marline', 'meiweg 47', '8790', 'waregem', NULL, 'marlinedesmet@hotmail.be', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Office management', '  Management assistant', '2013-02-27 16:06:43'),
(7, 'serifoski', 'osman', 'heembeeksestraat 186', '1120', 'Neder-over-Heembeek', NULL, 'osman_1120@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:37:21'),
(8, 'Erdem', 'Numan', 'Waterschransweg 39', '2500', 'Lier', NULL, 'numanerdem1993@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:37:31'),
(9, 'Van Hal', 'Yves', 'koningin fabiolapark 31', '9820', 'Merelbeke', NULL, 'yves.vanhal@gmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:37:36'),
(10, 'Bulduk', 'Mehmet', 'Groenstraat 87', '1030', 'Schaarbeek', NULL, 'buldukmehmet@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:37:40'),
(11, 'Ayoub', 'madania', 'clos des deux tilleuls 4', '1120', 'Neder-over-hembeek', NULL, 'ayoub.atlas@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:38:10'),
(12, 'koroglu', 'osman', 'hutstraat 21', '1030', 'schaarbeek', NULL, 'oszii3-42@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:38:16'),
(13, 'Koroglu', 'Ayoub', 'Rue verte 69', '1030', 'Schaarbeek', NULL, 'ufuk.tutar@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:38:55'),
(14, 'Kilic', 'Onur', 'ribaucourtstraat 88', '1080', 'Sint-Jans-Molenbeek', NULL, 'onur_kilic@live.be', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:39:19'),
(15, 'Baburi', 'Mortaza', 'Drootbeekstraat 18', '1020', 'Laken', NULL, 'baburi.mortaza@live.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-02-28 13:48:27'),
(16, 'Van Hauwermeiren', 'Katrien', 'Kokerijstraat 7', '9310', 'Meedert', NULL, 'daisyvdv@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Accountancy-fiscaliteit', '2013-03-01 10:39:33'),
(17, 'De Moor', 'Jana', 'Merehoekstraat 95', '9550', 'Herzele', NULL, 'janade.moor@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Accountancy-fiscaliteit', '2013-03-01 10:40:18'),
(18, 'Demeunck', 'Kevin', 'X', 'X', 'X', NULL, 'kevin_demeunck@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Retailmanagement', '  Accountancy-fiscaliteit', '2013-03-01 10:42:33'),
(19, 'De Kerpel', 'Julie', 'Botermelkstraat 85', '9200', 'Dendermonde', NULL, 'julie.dekerpel@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Accountancy-fiscaliteit  Management assistant', '2013-03-01 10:43:20'),
(20, 'Verhofstadt', 'Jeroen', 'X', 'X', 'X', NULL, 'jeroen_v@live.be', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Accountancy-fiscaliteit', '2013-03-01 10:43:55'),
(21, 'De Smedt', 'Frederik', 'Gasthuisstraat 105a', '1760', 'Roosdaal', NULL, 'frederik.de.smedt@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-03-01 10:44:33'),
(22, 'Couck', 'Brent', 'Terlinden 64', '9450', 'Denderhoutem', NULL, 'brent.c@codiction.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Toegepaste informatica', '', '2013-03-01 10:45:10'),
(23, 'De WAegeneer', 'Yoran', 'Prindaal 17', '9403', 'Neigen', NULL, 'yoran.dw@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Financie- en verzekeringswezen', '2013-03-01 10:45:52'),
(24, 'Van Boxtae', 'Tine', 'Mazitstraat 25', '1790', 'Affligem', NULL, 'tinevanboxstael@gamil.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Retailmanagement', '  Accountancy-fiscaliteit  Financie- en verzekeringswezen', '2013-03-01 10:46:54'),
(25, 'De Kerpel', 'Julie', 'Botermelkstraat 85', '9200', 'Dendermonde', NULL, 'julie.dekerpel@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Management assistant', '2013-03-01 10:47:53'),
(26, 'Heredia Rosa', 'Elisa', 'VAn Bartonnestraat 93', '1090', 'Jette', NULL, 'elisaa.h@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Management assistant', '2013-03-01 10:48:40'),
(27, 'Orazietti', 'Thomas', 'Postbergstraat 4', '1750', 'Lennik', NULL, 'basket-ph@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '', '  Management assistant', '2013-03-01 10:49:15'),
(28, 'Lefèvre', 'Laurenc', 'J. Lauwerijnstraat 37', '9988', 'Watervliet', NULL, 'laurencelefevre@gmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Bedrijfsmanagement', '', '2013-03-01 10:50:03'),
(29, 'Deryckere', 'Lisa', 'Larestraat 36', '9920', 'Lovendegem', NULL, 'lisa.deryckere@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Office management', '', '2013-03-01 10:51:18'),
(30, 'De Bruecker', 'Eva', 'Parkleem 17', '9932', 'Zomergem', NULL, 'evadebruecker@hotmail.com', NULL, NULL, NULL, NULL, 'Bedrijf en Organisatie', '  Office management', '', '2013-03-01 10:52:01');
