-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 01:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seguimiento`
--

-- --------------------------------------------------------

--
-- Table structure for table `traking_records`
--

CREATE TABLE `traking_records` (
  `id` int(99) NOT NULL,
  `user_id` varchar(999) DEFAULT NULL,
  `fecha` varchar(99) DEFAULT NULL,
  `dispositivo` varchar(999) DEFAULT NULL,
  `navegador` varchar(999) DEFAULT NULL,
  `paginaRemitente` varchar(999) DEFAULT NULL,
  `fingerprint` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traking_records`
--

INSERT INTO `traking_records` (`id`, `user_id`, `fecha`, `dispositivo`, `navegador`, `paginaRemitente`, `fingerprint`) VALUES
(158, '1670642', '2019-01-27 23:15:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/paso1.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(159, '1670642', '2019-01-27 23:15:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/paso1.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(160, '1670642', '2019-01-27 23:19:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/paso1.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(161, '1670642', '2019-01-27 23:28:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(162, '1670642', '2019-01-27 23:28:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(163, '1670642', '2019-01-27 23:33:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(164, '1670642', '2019-01-27 23:52:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(165, '1670642', '2019-01-27 23:53:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(166, '1670642', '2019-01-27 23:53:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47'),
(167, '1670642', '2019-01-27 23:54:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'http://localhost/getmember.dev/seguimiento/index.php', '9e9e2a3b947206d6cf65567c77f22f47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `traking_records`
--
ALTER TABLE `traking_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `traking_records`
--
ALTER TABLE `traking_records`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
