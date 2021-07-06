-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 05:27 PM
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
-- Database: `phdportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `adminemail`, `adminpassword`, `role`) VALUES
(1, 'admin', 'publisherstop@gmail.com', 'admin', 'admin'),
(2, 'Deputy', 'deputy@gmail.com', 'admin', 'deputy'),
(3, 'Registrar', 'registrar@gmail.com', 'admin', 'registrar'),
(4, 'Chancellor', 'chancellor@gmail.com', 'admin', 'chancellor');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `own` tinyint(4) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `name`, `title`, `about`, `own`, `count`) VALUES
(1, 'Suman Das', 'Techno India Hooghly', 'CS', 1, 3),
(3, 'Subrata Saha', 'Techno India Hooghly', 'C,c++', 0, 0),
(4, 'Soumya Sen', 'TIH', 'all', 1, 0),
(5, 'subhendu sir', 'dad', '<p>afsg</p>', 1, 0),
(6, 'sssssssss', 'eeeeeee', 'eeeeeeeeeee', 0, 0),
(7, 'dip', 'dip', 'dip', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `synopsis`
--

CREATE TABLE `synopsis` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `guide` varchar(255) NOT NULL,
  `is_deputy` tinyint(4) NOT NULL DEFAULT '0',
  `is_registrar` tinyint(4) NOT NULL DEFAULT '0',
  `is_chancellor` tinyint(4) NOT NULL DEFAULT '0',
  `thesis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synopsis`
--

INSERT INTO `synopsis` (`id`, `email`, `title`, `abstract`, `synopsis`, `guide`, `is_deputy`, `is_registrar`, `is_chancellor`, `thesis`) VALUES
(3, 'dipronildas.net@gmail.com', 'sssssssss', 'sssssssssssssss', 'uploaddocuments/synopsis/dipronildas.net@gmail.com_synopsis.pdf', 'subhendu sir', 1, 1, 1, 'uploaddocuments/thesis/dipronildas.net@gmail.com_thesis.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `is_profile` tinyint(4) NOT NULL DEFAULT '0',
  `is_approved` tinyint(4) NOT NULL DEFAULT '0',
  `is_payment` tinyint(4) NOT NULL DEFAULT '0',
  `is_synopsis` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone`, `gender`, `dob`, `course`, `password`, `otp`, `is_profile`, `is_approved`, `is_payment`, `is_synopsis`) VALUES
(4, 'dipronil', '', 'das', 'dipronildas.net@gmail.com', '9804633142', 'male', '2021-06-28', '', '1234', 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userfull`
--

CREATE TABLE `userfull` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `alteremail` varchar(255) NOT NULL,
  `alterphone` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `insti10` varchar(25) NOT NULL,
  `start10` date NOT NULL,
  `end10` date NOT NULL,
  `board10` varchar(25) NOT NULL,
  `per10` int(11) NOT NULL,
  `insti12` varchar(25) NOT NULL,
  `start12` date NOT NULL,
  `end12` date NOT NULL,
  `board12` varchar(25) NOT NULL,
  `per12` int(11) NOT NULL,
  `instigra` varchar(25) NOT NULL,
  `startgra` date NOT NULL,
  `endgra` date NOT NULL,
  `boardgra` varchar(25) NOT NULL,
  `pergra` int(11) NOT NULL,
  `instipo` varchar(25) NOT NULL,
  `startpo` date NOT NULL,
  `endpo` text NOT NULL,
  `boardpo` varchar(25) NOT NULL,
  `perpo` int(11) NOT NULL,
  `mark10` varchar(255) NOT NULL,
  `mark12` varchar(255) NOT NULL,
  `markgra` varchar(255) NOT NULL,
  `markpo` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `sign` varchar(255) NOT NULL,
  `addressp` varchar(255) NOT NULL,
  `proforma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfull`
--

INSERT INTO `userfull` (`id`, `user_id`, `title`, `alteremail`, `alterphone`, `fathername`, `address`, `city`, `pin`, `state`, `country`, `insti10`, `start10`, `end10`, `board10`, `per10`, `insti12`, `start12`, `end12`, `board12`, `per12`, `instigra`, `startgra`, `endgra`, `boardgra`, `pergra`, `instipo`, `startpo`, `endpo`, `boardpo`, `perpo`, `mark10`, `mark12`, `markgra`, `markpo`, `photo`, `sign`, `addressp`, `proforma`) VALUES
(4, 4, '', '', '', '', '', '', '', '', 'India', '', '0000-00-00', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', 0, '', '0000-00-00', '', '', 0, 'uploaddocuments/marksheet10/dipronildas.net@gmail.com_marksheet10.pdf', 'uploaddocuments/marksheet12/dipronildas.net@gmail.com_marksheet12.pdf', 'uploaddocuments/marksheetgraduation/dipronildas.net@gmail.com_marksheetgraduation.pdf', 'uploaddocuments/marksheetpostgraduation/dipronildas.net@gmail.com_marksheetpostgraduation.pdf', 'uploaddocuments/photo/dipronildas.net@gmail.com_photo.jpg', 'uploaddocuments/sign/dipronildas.net@gmail.com_sign.jpg', 'uploaddocuments/addressproff/dipronildas.net@gmail.com_addressproof.pdf', 'uploaddocuments/proforma/dipronildas.net@gmail.com_proforma.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synopsis`
--
ALTER TABLE `synopsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userfull`
--
ALTER TABLE `userfull`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `synopsis`
--
ALTER TABLE `synopsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userfull`
--
ALTER TABLE `userfull`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `synopsis`
--
ALTER TABLE `synopsis`
  ADD CONSTRAINT `synopsis_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userfull`
--
ALTER TABLE `userfull`
  ADD CONSTRAINT `userfull_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
