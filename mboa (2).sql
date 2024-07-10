-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 10:18 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mboa`
--

-- --------------------------------------------------------

--
-- Table structure for table `autre`
--

DROP TABLE IF EXISTS `autre`;
CREATE TABLE IF NOT EXISTS `autre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autre`
--

INSERT INTO `autre` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(1, 'none', 'WABBBD', 20000000, '1_black logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `secteur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_act` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lieux` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `quartier` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `statut` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `empl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notif` int NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`id`, `secteur`, `activite`, `nom`, `prix`, `date`, `date_act`, `lieux`, `quartier`, `statut`, `empl`, `notif`, `token`) VALUES
(35, 'femmes', 'Tresses', 'BOUBOU', 10000, '2024-01-27 05:05:24', '2024-01-24 09:58:43', 'Yaoundé II', 'Quartier Cite Verte', 'Annuler', NULL, 1, '1010'),
(36, 'femmes', 'Tresses', 'BOUBOU', 10000, '2024-01-30 08:11:06', '2024-01-24 10:29:43', 'Yaoundé III', 'Quartier Obili', 'Accepter', 'wawa rick', 1, '1010'),
(37, 'soins', 'none', 'AZ', 100000, '2024-01-27 05:05:24', '2024-01-24 10:29:57', 'Yaoundé II', 'Quartier Cite Verte', 'En_attente', NULL, 1, '1010'),
(38, 'autre', 'none', 'WABBBD', 20000000, '2024-01-27 05:05:24', '2024-01-24 10:30:06', 'Yaoundé IV', 'Quartier Mvog-Mbi', 'En_attente', NULL, 1, '1010'),
(39, 'hommes', 'none', 'PPPOOOOO', 10000, '2024-01-28 09:55:23', '2024-01-24 10:32:49', 'Yaoundé III', 'Quartier Afanoya 4', 'Accepter', 'vivi', 1, '1010'),
(40, 'makeup', 'none', 'MAKKEE', 10000, '2024-01-27 05:05:24', '2024-01-24 10:33:04', 'Yaoundé II', 'Quartier Grand Messa', 'En_attente', NULL, 1, '1010');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `lat` decimal(9,6) DEFAULT NULL,
  `lng` decimal(9,6) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `unique_location` (`lat`,`lng`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `lat`, `lng`) VALUES
(1, 'John', 'Doe', 40.712800, -74.006000),
(2, 'Jane', 'Smith', 34.052200, -118.243700),
(3, 'David', 'Johnson', 51.507400, -0.127800),
(4, 'Emma', 'Williams', 48.856600, 2.352200);

-- --------------------------------------------------------

--
-- Table structure for table `femmes`
--

DROP TABLE IF EXISTS `femmes`;
CREATE TABLE IF NOT EXISTS `femmes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `femmes`
--

INSERT INTO `femmes` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(1, 'Tresses', 'BOUBOU', 10000, '1_black logo.jpg'),
(2, 'Greffes', 'WABBBD', 100000, '2_black logo.jpg'),
(3, 'Perruques', 'AZZZ', 100000, '3_black logo.jpg'),
(4, 'Perruques', 'PAPARAZI', 100000, '4_reseaux.png'),
(5, 'Tresses', 'TUTU', 100000, '5_1-17257_impact-reports-conclusions-icon-png-transparent-png.png'),
(6, 'Tresses', 'TIIIIIII', 100000, '6_téléchargement.jpeg'),
(7, 'Défrissage', 'APP', 10000, '7_imh.jpg'),
(8, 'Tresses', 'bbbbbb', 10000, '8_u.jpg'),
(9, 'Perruques', 'Pariennne', 10000, '9_png-clipart-software-testing-computer-software-agile-software-development-appraiser-stick-figure-c'),
(10, 'Coiffurees', 'rrrrrrrrrrrr', 10000, '10_88397991-rubber-stamp-conclusion-conception-grunge-avec-des-rayures-de-poussière-les-effets-peuvent-être.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hommes`
--

DROP TABLE IF EXISTS `hommes`;
CREATE TABLE IF NOT EXISTS `hommes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hommes`
--

INSERT INTO `hommes` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(3, 'none', 'PPPOOOOO', 10000, '2_black logo.jpg'),
(4, 'COUPE en degradee', 'WIZ', 100000, '3_black logo.jpg'),
(8, 'COUPE en degradee', 'AZ', 10000, '7_u.jpg'),
(9, 'COUPE en degradee', 'Fresh man', 2000, '8_');

-- --------------------------------------------------------

--
-- Table structure for table `makeup`
--

DROP TABLE IF EXISTS `makeup`;
CREATE TABLE IF NOT EXISTS `makeup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makeup`
--

INSERT INTO `makeup` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(1, 'none', 'MAKKEE', 10000, '1_young-female-barista-wear-face-mask-serving-take-away-hot-coffee-paper-cup-consumer-cafes.jpg'),
(3, 'none', 'AWUUUU', 20000, '3_black logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `onglerie`
--

DROP TABLE IF EXISTS `onglerie`;
CREATE TABLE IF NOT EXISTS `onglerie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onglerie`
--

INSERT INTO `onglerie` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(1, 'none', 'ARRRR', 20000, '3_black logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soins`
--

DROP TABLE IF EXISTS `soins`;
CREATE TABLE IF NOT EXISTS `soins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soins`
--

INSERT INTO `soins` (`id`, `activite`, `nom`, `prix`, `image`) VALUES
(1, 'none', 'AZ', 100000, '1_black logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `statu` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `tel`, `password`, `statu`, `token`, `lat`, `lng`) VALUES
(1, 'thierry', 'thierry@gmail.com', 69999999, '$2y$10$yyjrubHoJJWSTGCqG3uQ9OSRDEUB5BXsQgyHoEnm.ZSN4MXv4XCYO', 'client', '691469999999', 0.00000000, 0.00000000),
(2, 'Kaka', 'kaka@gmail.com', 77878787, '$2y$10$0/DmkDSSoGfTCcXXkLBe4.dQZsjmMiO1BwBWCV0DyDRar.XcJ/cVS', 'client', '499777878787', 0.00000000, 0.00000000),
(5, 'vivi', 'vivi@gmail.com', 689487039, '$2y$10$KfvysyTuHbofqPEkW.0Tx.R8nzppaYERd6C7qS/9Fk.Y8Xl8KLnyq', 'empl', '9715689487039', 0.00000000, 0.00000000),
(6, 'admin', 'admin@gmail.com', 0, '$2y$10$KfvysyTuHbofqPEkW.0Tx.R8nzppaYERd6C7qS/9Fk.Y8Xl8KLnyq', 'admin', '1010', 0.00000000, 0.00000000),
(7, 'kiki', 'kiki@gmail.com', 690909090, '$2y$10$xAXDkUUgTtXttwAWSEHZ3eCcRSAnFDolP/0fZDGaumS.3gD00tx.S', 'client', '6044690909090', 0.00000000, 0.00000000),
(8, 'wawa rick', 'wawa@gmail.com', 678989807, '$2y$10$Sj5hhRWwcf.YyaeLUD8RN.6FrnDO9oQRsJ713xFQyXw2Vgz6O4f7.', 'empl', '5563678989807', 0.00000000, 0.00000000),
(9, 'Root', 'root@gmail.com', 671029393, 'root123', 'admin', '123456789', 0.00000000, 0.00000000),
(12, 'Takam Tchide Yannick Orlus', 'yannickorlus@onmail.com', 697237892, '$2y$10$gc3hxcK3gny4lf0BPn4MAeWohC8niuQ7EVkFvySppcJWl28eddTya', 'client', '6883697237892', 3.86550000, 11.53410000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
