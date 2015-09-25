-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2015 at 03:25 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `70foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `registration_id` int(11) NOT NULL,
  `registration_name` varchar(50) NOT NULL,
  `registration_age` varchar(2) NOT NULL,
  `registration_address` text NOT NULL,
  `registration_phone` varchar(16) NOT NULL,
  `registration_email` varchar(50) DEFAULT NULL,
  `registration_image_dir` varchar(255) NOT NULL,
  `registration_idcard` varchar(255) NOT NULL,
  `registration_photo` varchar(255) NOT NULL,
  `registration_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`registration_id`, `registration_name`, `registration_age`, `registration_address`, `registration_phone`, `registration_email`, `registration_image_dir`, `registration_idcard`, `registration_photo`, `registration_created_at`) VALUES
(1, 'Ali Fahmi', '29', 'Jalan Prapanca Raya 12 LG Kebayoran baru Jaksel 12150', '082233043298', NULL, '25-09-2015', 'id_nasihat.png', 'foto_nasihat.png', '2015-09-25 14:45:01'),
(2, 'Agam Fauza', '23', 'Jalan Prapanca Raya 12 LG Kebayoran baru Jaksel 12150', '0852', NULL, '25-09-2015', 'id_not_resign_reasons.png', 'foto_not_resign_reasons.png', '2015-09-25 15:24:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
