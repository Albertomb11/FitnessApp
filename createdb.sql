-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 19, 2017 at 06:07 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnessapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `Id` int(11) NOT NULL,
  `Grupo_muscular` tinytext NOT NULL,
  `Imagen` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`Id`, `Grupo_muscular`, `Imagen`, `created_at`, `updated_at`) VALUES
(1, 'Pectoral', 'https://definicion.de/wp-content/uploads/2013/02/pectoral.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Espalda', 'http://zone1.cloudstoragerevi.netdna-cdn.com/wp-content/uploads/2014/04/big_back.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Hombros', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFWoJfTGHHoUG8N62n8iNYxAYunWtXcIsN9jy7gY5XMfHutatTMg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Piernas', 'http://www.boy4me.com/pub/data/thumb_news/trabaja-pierna-con.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Brazos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZLGl4KlTXjS-Qja7fYSx_PWnDpJeyV3UUySKYzTOpFY5cLN_', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `fitness_id` int(11) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `fitness_id`, `user`, `email`, `ip`, `text`, `approved`, `created_at`, `updated_at`) VALUES
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'Me parece precioso', 1, '2017-12-13 00:57:54', '2017-12-13 00:57:54'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'asdsad', 1, '2017-12-13 00:58:16', '2017-12-13 00:58:16'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'hola narco', 1, '2017-12-13 14:59:55', '2017-12-13 14:59:55'),
(0, 4, 'josan', 'jose_10tonio@hotmail.com', '127.0.0.1', 'precioso\r\n', 1, '2017-12-13 15:01:03', '2017-12-13 15:01:03'),
(0, 4, 'josan', 'jose_10tonio@hotmail.com', '127.0.0.1', 'precioso\r\n', 1, '2017-12-13 15:01:52', '2017-12-13 15:01:52'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'lo mejor', 1, '2017-12-14 16:08:08', '2017-12-14 16:08:08'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'lo mejorcito\r\n', 1, '2017-12-14 16:12:28', '2017-12-14 16:12:28'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'hola', 1, '2017-12-14 16:13:42', '2017-12-14 16:13:42'),
(0, 1, 'alberto', 'alberto1sevilla@hotmail.com', '127.0.0.1', 'asda', 1, '2017-12-14 16:13:57', '2017-12-14 16:13:57'),
(0, 2, 'josan', 'jose_10tonio@hotmail.com', '127.0.0.1', 'hola', 1, '2017-12-14 16:20:52', '2017-12-14 16:20:52'),
(0, 2, 'chiquito', 'chiquito@hotmail.com', '127.0.0.1', 'esto esta bien', 1, '2017-12-14 16:26:56', '2017-12-14 16:26:56'),
(0, 4, 'jgfjhf', 'sss@gmail.com', '127.0.0.1', 'dsadasd', 1, '2017-12-14 17:13:36', '2017-12-14 17:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `fitness`
--

CREATE TABLE IF NOT EXISTS `fitness` (
  `id` int(11) NOT NULL,
  `nombre` tinytext NOT NULL,
  `posicion` tinytext NOT NULL,
  `ejecucion` tinytext NOT NULL,
  `imagen` tinytext NOT NULL,
  `categoria` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitness`
--

INSERT INTO `fitness` (`id`, `nombre`, `posicion`, `ejecucion`, `imagen`, `categoria`, `created_at`, `updated_at`) VALUES
(17, 'sdfssfsdf', 'sdfs', 'asdasd', 'sdfdsf', 'Pectoral', '2017-12-12 14:54:05', '2017-12-12 14:54:05'),
(18, 'matar', 'encima', 'adentro y afuera', 'http://www.phoenixpumps.com/uimages/manufacturers/Paco_Logo_2.png', 'Piernas', '2017-12-14 17:13:08', '2017-12-14 17:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `used` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `email`, `used`, `created_at`, `updated_at`) VALUES
(1, 'alberto1sevilla@hotmail.com', 0, '2017-12-19 17:19:05', '2017-12-19 17:19:05'),
(2, 'alberto1sevilla@hotmail.com', 0, '2017-12-19 17:20:21', '2017-12-19 17:20:21'),
(3, 'alberto1sevilla@hotmail.com', 0, '2017-12-19 17:20:27', '2017-12-19 17:20:27'),
(6, 'pepe123@hotmail.com', 0, '2017-12-19 17:39:29', '2017-12-19 17:39:29'),
(7, 'pepe123@hotmail.com', 0, '2017-12-19 17:44:07', '2017-12-19 17:44:07'),
(8, 'pepe123@hotmail.com', 0, '2017-12-19 17:52:21', '2017-12-19 17:52:21'),
(9, 'alberto1sevilla@hotmail.com', 0, '2017-12-19 17:57:45', '2017-12-19 17:57:45'),
(10, 'usuario@mail.com', 0, '2017-12-19 18:02:05', '2017-12-19 18:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'alberto', 'alberto1sevilla@hotmail.com', '$2y$10$Zje/cYJTFy.1214iqGHp9uhtoIZYpT.FLVUVcWlRbu74R2mwVdqPu', '2017-12-12 14:38:03', '2017-12-12 14:38:03'),
(3, 'pepe213', 'pepe123@hotmail.com', '$2y$10$0fMjyJx1JdAMZQyAMhiVg..hpppsRL1wb46iwQKmbakzHq.5c.5vu', '2017-12-12 23:43:28', '2017-12-12 23:43:28'),
(4, 'jossan', 'josan@coldmail.com', '$2y$10$.jNhVeymloZw/ZaJRbC84e6oQYz.Ez/f0zWnMVAb.M5q/JoaunU.y', '2017-12-13 15:04:14', '2017-12-13 15:04:14'),
(5, 'asdas', 'as@gmail.com', '$2y$10$lof8R1w.M0o2cHkfSH8bR.DkuumRNBYcrUofPGWMxTbslMBxBHi3i', '2017-12-14 17:11:48', '2017-12-14 17:11:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fitness`
--
ALTER TABLE `fitness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fitness`
--
ALTER TABLE `fitness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
