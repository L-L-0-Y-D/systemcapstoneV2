-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 02:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `businessid` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `municipalityid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `business_firstname` varchar(255) NOT NULL,
  `business_lastname` varchar(255) NOT NULL,
  `business_phonenumber` varchar(255) NOT NULL,
  `business_owneraddress` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `business_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessid`, `business_name`, `business_address`, `municipalityid`, `categoryid`, `business_firstname`, `business_lastname`, `business_phonenumber`, `business_owneraddress`, `business_email`, `business_password`) VALUES
(15, 'abc', 'def', 1, 5, 'ghi', 'jkl', '12345', 'mno', 'pqr@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(17, 'aaa', 'aaa', 6, 7, 'aaa', 'aa', '231312', 'aaa', 'aaa@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(18, 'bbb', 'bbb', 3, 5, 'bbb', 'bbb', '2313213', 'bbb', 'bbb@gmail.com', '08f8e0260c64418510cefb2b06eee5cd');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `feedback_date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `businessid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `mealid` int(11) NOT NULL,
  `mealname` varchar(255) NOT NULL,
  `mealdescription` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mealcategory`
--

CREATE TABLE `mealcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealcategory`
--

INSERT INTO `mealcategory` (`categoryid`, `categoryname`) VALUES
(1, 'Chinese'),
(2, 'Japanese'),
(3, 'Korean'),
(4, 'Arabic'),
(5, 'American'),
(6, 'Asian'),
(7, 'Vietnamese'),
(8, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `municipalityid` int(11) NOT NULL,
  `municipality_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`municipalityid`, `municipality_name`) VALUES
(1, 'Mariveles'),
(2, 'Limay'),
(3, 'Orion'),
(4, 'Pilar'),
(5, 'Balanga'),
(6, 'Abucay'),
(7, 'Samal'),
(8, 'Orani'),
(9, 'Hermosa'),
(10, 'Dinalupihan'),
(11, 'Morong'),
(12, 'Bagac');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationid` int(11) NOT NULL,
  `namereserveunder` varchar(25) NOT NULL,
  `numberofguest` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `reservatiopn_phonenumber` varchar(255) NOT NULL,
  `businessid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_meal`
--

CREATE TABLE `restaurant_meal` (
  `businessid` int(11) NOT NULL,
  `mealid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_rating`
--

CREATE TABLE `restaurant_rating` (
  `ratingid` int(11) NOT NULL,
  `businessid` int(11) NOT NULL,
  `ratingvalue` double NOT NULL,
  `ratingdate` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `firstname`, `lastname`, `age`, `phonenumber`, `address`, `password`) VALUES
(15, 'aaa@gmail.com', 'aaa@gmail.com', 'aaa', 'aaa', '15', '12456', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`businessid`),
  ADD KEY `municipalityid` (`municipalityid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `businessid` (`businessid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`mealid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `mealcategory`
--
ALTER TABLE `mealcategory`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`municipalityid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationid`),
  ADD KEY `businessid` (`businessid`);

--
-- Indexes for table `restaurant_meal`
--
ALTER TABLE `restaurant_meal`
  ADD KEY `businessid` (`businessid`),
  ADD KEY `mealid` (`mealid`);

--
-- Indexes for table `restaurant_rating`
--
ALTER TABLE `restaurant_rating`
  ADD PRIMARY KEY (`ratingid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `businessid` (`businessid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `businessid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `mealid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mealcategory`
--
ALTER TABLE `mealcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `municipalityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_rating`
--
ALTER TABLE `restaurant_rating`
  MODIFY `ratingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`municipalityid`) REFERENCES `municipality` (`municipalityid`),
  ADD CONSTRAINT `business_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `mealcategory` (`categoryid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `mealcategory` (`categoryid`),
  ADD CONSTRAINT `meal_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `mealcategory` (`categoryid`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`);

--
-- Constraints for table `restaurant_meal`
--
ALTER TABLE `restaurant_meal`
  ADD CONSTRAINT `restaurant_meal_ibfk_1` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`),
  ADD CONSTRAINT `restaurant_meal_ibfk_2` FOREIGN KEY (`mealid`) REFERENCES `meal` (`mealid`);

--
-- Constraints for table `restaurant_rating`
--
ALTER TABLE `restaurant_rating`
  ADD CONSTRAINT `restaurant_rating_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `restaurant_rating_ibfk_2` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
