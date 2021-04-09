-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_rules`
--

CREATE TABLE `admin_rules` (
  `id` int(11) NOT NULL,
  `title` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_rules`
--

INSERT INTO `admin_rules` (`id`, `title`) VALUES
(1, 'superAdmin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` char(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`) VALUES
(1, 'Dermatology (Skin)'),
(2, 'Orthopedics (Bones)'),
(3, 'Ear, Nose, and Throat'),
(6, 'Dentistry'),
(7, 'Pediatrics and New Born Child');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `role` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `email`, `password`, `address`, `phone`, `role`, `cat_id`) VALUES
(7, 'ahmed saleh', 'ahmed@jbl.com', '670b14728ad9902aecba32e22fa4f6bd', 'cairo, egypt', '01000055555', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `name` char(65) NOT NULL,
  `department` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `email` char(65) NOT NULL,
  `phone` char(15) NOT NULL,
  `date` date NOT NULL,
  `address` char(255) NOT NULL,
  `comment` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `name`, `department`, `doctor`, `email`, `phone`, `date`, `address`, `comment`) VALUES
(1, 'mohamed', 0, 0, 'mohamed@gmail.com', '127', '2021-03-29', 'القليوبية, الخانكة, المنايل', ''),
(2, 'mostafa', 0, 0, 'mohamed@dd.h', '127', '2021-04-22', 'القليوبية, الخانكة, المنايل', ''),
(3, 'ali', 0, 0, 'mohamed@dd.com', '127', '2021-04-22', 'القليوبية, الخانكة, المنايل', ''),
(4, 'mohamed saleh', 0, 0, 'mohamed@gmail.com', '127', '2021-04-30', 'القليوبية, الخانكة, المنايل', ''),
(5, 'mohamed saleh', 0, 0, 'mohamed@gmail.com', '1127031271', '2021-04-30', 'القليوبية, الخانكة, المنايل', ''),
(6, 'mohamed saleh', 0, 0, 'mohamed@gmail.com', '1127031271', '2021-04-30', 'القليوبية, الخانكة, المنايل', ''),
(7, 'April Burris', 0, 0, 'cagylyti@mailinator.com', '25', '1970-04-10', 'Vero aliquip ipsum N', 'Dolore tempore aut'),
(8, 'Fitzgerald Richard', 0, 0, 'xemidoc@mailinator.com', '49', '1983-05-04', 'Neque animi sint ex', 'Eaque at voluptate s'),
(9, 'Farrah Velasquez', 0, 0, 'sazibu@mailinator.com', '61', '2006-01-30', 'Ipsa similique reru', 'Ad nulla eligendi mo'),
(10, 'Kadeem Garza', 0, 0, 'logonofojy@mailinator.com', '64', '2006-02-20', 'Esse nostrud qui et', 'Duis ut aliquip cons'),
(11, 'Rhea Sutton', 0, 0, 'jocevi@mailinator.com', '33333333', '1974-12-01', 'Iusto laborum Volup', 'Dolore vitae minim v'),
(12, 'Yeo Newman', 0, 0, 'dohop@mailinator.com', '0', '1976-02-02', 'Voluptatum officia u', 'Assumenda sed rem as'),
(13, 'Vielka Blankenship', 0, 0, 'sumeqoco@mailinator.com', '33', '1979-01-29', 'Do beatae adipisci m', 'Similique maiores et'),
(14, 'Kermit Simpson', 0, 0, 'noraj@mailinator.com', '1022222222', '1993-09-12', 'Nostrum tempore nih', 'Ex sequi id eiusmod'),
(15, 'Dieter Mejia', 1, 8, 'nyvikufyzu@mailinator.com', '21', '1979-02-06', 'Accusantium voluptas', 'Et ea ea est earum a'),
(16, 'Gisela Church', 3, 8, 'gabyg@mailinator.com', '79', '1999-02-10', 'Aut elit reprehende', 'Dolores fugit quisq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `department` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `email` char(50) NOT NULL,
  `phone` char(15) NOT NULL,
  `date` date NOT NULL,
  `address` char(100) NOT NULL,
  `comment` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `department`, `doctor`, `email`, `phone`, `date`, `address`, `comment`) VALUES
(1, 'Maggie Phelps', 3, 7, 'molon@mailinator.com', '01005555555', '1998-11-30', 'Ea ad laboriosam a', 'Quaerat deserunt vel'),
(2, 'Lucas Cardenas', 2, 7, 'fosan@mailinator.com', '01000000000', '2021-04-09', 'Eveniet voluptate e', 'Excepturi eos repreh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_rules`
--
ALTER TABLE `admin_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `rol` (`role`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `department` (`department`),
  ADD KEY `doctor` (`doctor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `department` (`department`),
  ADD KEY `doctor` (`doctor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_rules`
--
ALTER TABLE `admin_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`role`) REFERENCES `admin_rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`department`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
