-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 05:37 PM
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
  `business_password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 2,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessid`, `business_name`, `business_address`, `municipalityid`, `categoryid`, `business_firstname`, `business_lastname`, `business_phonenumber`, `business_owneraddress`, `business_email`, `business_password`, `image`, `role_as`, `status`, `created_at`) VALUES
(40, 'Dumangan', 'abucay', 1, 4, 'dumangan', 'dumangan', '098732485', 'dumangan', 'dumangan@gmail.com', '$2y$10$N/AG7v1Xp3V/kjpacBn6cu1fse6nziHn2znFez7gEHhHvvhf9Evhm', '1654876663.png', 2, 1, '2022-06-10 15:57:43'),
(41, 'FoodProject', 'Orion Bataan', 3, 1, 'Food', ' project', '0975216512', 'Orion Balanga Bataan Bataan', 'foodproject@gmail.com', '$2y$10$PYwu7dcVPBJH0rid6xgcv.azkWkZAxogO7i6AgReEdBeglr/Dv1Su', '1654942517.jpg', 2, 1, '2022-06-11 10:15:17'),
(43, 'sushi', 'Cataning Balanga City Bataan', 5, 2, 'Sushi', 'sushi', '09784351235', 'Cataning Balanga Bataan', 'sushi@gmail.com', '$2y$10$/EJchwZK/qAX./eCudV8teN8XQOBKuahUVALQZQEIC7OleWDllqfy', '1655044369.png', 2, 1, '2022-06-12 14:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `mealcategory`
--

CREATE TABLE `mealcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealcategory`
--

INSERT INTO `mealcategory` (`categoryid`, `categoryname`, `status`) VALUES
(1, 'Chinese', 0),
(2, 'Japanese', 0),
(3, 'Korean', 0),
(4, 'Arabic', 0),
(5, 'American', 0),
(6, 'Asian', 0),
(7, 'Vietnamese', 0),
(8, 'Indian', 0),
(9, 'Filipino', 0);

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `municipalityid` int(11) NOT NULL,
  `municipality_name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`municipalityid`, `municipality_name`, `image`, `status`) VALUES
(1, 'Mariveles', '1653983644.jpg', 0),
(2, 'Limay', '1653985767.jpg', 0),
(3, 'Orion', '1653985829.jpg', 0),
(4, 'Pilar', '1653985839.jpg', 0),
(5, 'Balanga', '1653985850.jpg', 0),
(6, 'Abucay', '1653985880.png', 0),
(7, 'Samal', '1653985892.jpg', 0),
(8, 'Orani', '1653985903.jpg', 0),
(9, 'Hermosa', '1653985913.jpg', 0),
(10, 'Dinalupihan', '1653985928.jpg', 0),
(11, 'Morong', '1653985943.jpg', 0),
(12, 'Bagac', '1653985954.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `businessid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationid` int(11) NOT NULL,
  `namereserveunder` varchar(255) NOT NULL,
  `numberofguest` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `reservation_phonenumber` varchar(255) NOT NULL,
  `reservation_email` varchar(255) NOT NULL,
  `businessid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationid`, `namereserveunder`, `numberofguest`, `reservation_date`, `reservation_time`, `reservation_phonenumber`, `reservation_email`, `businessid`, `userid`, `status`) VALUES
(4, 'password', 5, '2022-06-15', '14:47:00', '097842462', 'password@gmail.com', 40, 53, 0),
(5, 'password', 3, '2022-06-15', '11:16:00', '0974515312', 'password@gmail.com', 41, 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `businessid` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `userid`, `businessid`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(10, 53, 40, 'password', 4, 'test feedback 2', 1655201674),
(11, 53, 43, 'password', 5, 'test', 1655201715);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` tinyint(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `firstname`, `lastname`, `age`, `phonenumber`, `address`, `password`, `image`, `role_as`, `status`, `created_at`) VALUES
(52, 'Admin', 'admin@gmail.com', 'admin', 'admin', 22, '09770942602', 'Balanga Bataan', '$2y$10$Vh3Tj32ixzfgC9potfizOOBlVeblX.rD9Y938BqIE4vJSLnesRQm2', '1654871651.png', 1, 0, '2022-06-10 14:34:11'),
(53, 'password', 'password@gmail.com', 'password', 'password', 19, '098751231558', 'password', '$2y$10$1ZcztMDJLC3wd.E2wnuh7eS24fkU.Z2L51/fF.VOTxVC37xyqrGwK', '1654874493.jpg', 0, 0, '2022-06-10 15:21:33'),
(54, 'logo', 'logo@gmail.com', 'logo', 'logo', 24, '09770942602', 'Balanga', '$2y$10$r8MeSVjkYh.grcx6xyxLAOERqkA6..dczBME33RzV/I.p6J5bVrMu', '1654875145.png', 1, 0, '2022-06-10 15:32:25');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `businessid` (`businessid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationid`),
  ADD KEY `businessid` (`businessid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

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
  MODIFY `businessid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mealcategory`
--
ALTER TABLE `mealcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `municipalityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
