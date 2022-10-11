-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 08:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `municipalityid` int(11) NOT NULL,
  `cuisinename` text NOT NULL,
  `image_cert` varchar(255) NOT NULL,
  `opening` time NOT NULL,
  `closing` time NOT NULL,
  `business_firstname` varchar(255) NOT NULL,
  `business_lastname` varchar(255) NOT NULL,
  `business_phonenumber` varchar(255) NOT NULL,
  `business_owneraddress` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `business_password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 2,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=waiting,1=approve,2=declined',
  `verify_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessid`, `business_name`, `business_address`, `latitude`, `longitude`, `municipalityid`, `cuisinename`, `image_cert`, `opening`, `closing`, `business_firstname`, `business_lastname`, `business_phonenumber`, `business_owneraddress`, `business_email`, `business_password`, `image`, `role_as`, `status`, `verify_token`, `created_at`) VALUES
(91, 'Hap chan', 'Roman Super Highway, Freeport Area of Bataan, Mariveles, 2106 Bataan', '14.440575709531384', '120.49521747474671', 1, 'Chinese', '1661337941.jpg', '10:30:00', '20:30:00', 'Raymond', 'Chua', '09162345678', 'Alasasin, Mariveles, Bataan', 'hapchanmariveles@gmail.com', '$2y$10$YfozBRTts3JE6PTPBfVH..t0OrcHcs6uRU2sUSUs53tZI5IzxYBxi', '1661337941.jpg', 2, 1, '9406001ed771a8fe4368ace91d3a13ce', '2022-08-22 07:12:08'),
(92, 'The Beanery', 'Capitol Drive, Balanga City, Bataan', '14.683100904378685', '120.45169863348008', 5, 'American Filipino', '1661336753.jpg', '08:00:00', '20:30:00', 'Miguel', 'Bautista', '09276543212', 'San Jose, Balanga City, Bataan', 'beanerycapitol@gmail.com', '$2y$10$e0li7eH3Ua5X7m4tUAMqQucPbqCGAZqq1R87MLr53I5lYl60zHpEi', '1661337051.jpg', 2, 1, '181a5774f0127fb272cf4fb098833b75', '2022-08-22 07:19:36'),
(93, 'Angelito Pizza and Restaurant', 'Orani, Bataan', '14.799500581833477', '120.53722355012894', 8, 'Filipino', '1661337649.jpg', '09:30:00', '20:30:00', 'Angelito', 'Pantig', '09186765432', 'Parang Parang Orani, Bataan,', 'oraniangelitos@gmail.com', '$2y$10$v.tTOVGLl82QRuBD.gCd2eIwC.jTp1BV4eQ5Ab4QH.2t.F15CTrFi', '1661337649.jpg', 2, 1, 'eff2bb5f9a8d322638416a38a3afd7b8', '2022-08-22 07:41:48'),
(95, 'Ichiraku', 'Mariveles Bataan', '14.437708084778219', '120.49591484909058', 1, 'Japanese Korean', '1661481184.jpg', '08:00:00', '20:00:00', 'Juan', 'Dela Cruz', '09770942602', 'Mariveles Bataan', '1studentforieat@gmail.com', '$2y$10$ccE1RmFmM./RYK/h8NS1MuqgvvDRmyabMT.KwFNszzQtwz13bny1S', '1661481184.png', 2, 1, '2d5c3be05d94aee03e8068beab8e3a1f', '2022-08-26 02:33:04'),
(96, 'Hap chan', 'Orani', NULL, NULL, 3, 'Chinese Japanese', '1661483025.jpg', '08:00:00', '20:00:00', 'Maria', 'Clara', '09770942602', 'Orani', '3studentforieat@gmail.com', '$2y$10$YjkpCVSX1yJ0jd8TLPTge.bXNg.6LKJhJ2YCB.ygD85nofsaNN80O', '1661483025.jpg', 2, 2, '0bb1b1dbcdba773a47f776f18f563f35', '2022-08-26 03:03:45');

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
(9, 'Filipino', 0),
(18, 'French', 0);

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
  `food_type` varchar(255) NOT NULL,
  `cuisinename` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `businessid`, `name`, `description`, `food_type`, `cuisinename`, `price`, `image`, `status`, `created_at`) VALUES
(47, 91, 'Packed Meal 4', 'Combo Meal', 'Main', 'Chinese', 280, '1661337955.jpg', 0, '2022-08-22 07:14:37'),
(48, 91, 'Packed Meal 3', 'Combo Meal', 'Main', 'Chinese', 245, '1661337962.jpg', 0, '2022-08-22 07:16:08'),
(49, 91, '7-up', 'Soda', 'Drinks', 'Chinese', 45, '1661337969.jpg', 0, '2022-08-22 07:16:39'),
(50, 91, 'Coca Cola', 'Soda', 'Drinks', 'Chinese', 55, '1661337977.png', 1, '2022-08-22 07:16:57'),
(51, 91, 'Sprite', 'Soda', 'Drinks', 'Chinese', 55, '1661337984.jpg', 1, '2022-08-22 07:17:14'),
(52, 91, 'Iced Tea', 'Lemon', 'Drinks', 'Chinese', 45, '1661337991.jpg', 1, '2022-08-22 07:17:38'),
(53, 92, 'Carbonara', 'A dish of hot pasta into which other ingredients (such as eggs, bacon or ham, and grated cheese) have been mixed —often used as a postpositive modifier spaghetti carbonara.', 'Appetizer', 'American', 220, '1661336513.jpg', 1, '2022-08-22 07:21:27'),
(54, 92, 'Cheese Burger', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty.', 'Main', 'American', 180, '1661336521.jpg', 1, '2022-08-22 07:22:45'),
(55, 92, 'Cream Puff', 'A sweet pastry made with a choux pastry dough that is baked to form small dome shaped puffs.', 'Dessert', 'American', 280, '1661336531.jpg', 1, '2022-08-22 07:23:26'),
(56, 92, 'Coca Cola', 'Soda', 'Drinks', 'American', 55, '1661336538.png', 1, '2022-08-22 07:23:51'),
(57, 92, 'Sprite', 'Soda', 'Drinks', 'American', 55, '1661336551.jpg', 1, '2022-08-22 07:24:13'),
(58, 92, 'Kani Salad', 'A colorful salad featuring shredded imitation crab and crunchy vegetables in a mayonnaise-based dressing. ', 'Salad', 'American', 180, '1661336568.jpg', 1, '2022-08-22 07:27:12'),
(59, 92, 'Nachos', ' a tortilla chip topped with melted cheese and often additional savory toppings (such as hot peppers or refried beans)', 'Appetizer', 'American', 190, '1661336583.jpg', 1, '2022-08-22 07:27:52'),
(60, 92, 'Potato Mojos', 'Potato Mojos are amazingly crispy and crunchy on the outside and fluffy on the inside. ', 'Appetizer', 'American', 188, '1661336594.jpg', 1, '2022-08-22 07:28:56'),
(61, 92, 'Onion Rings', 'An onion ring, also called a French fried onion ring, is a form of appetizer or side dish in British and American cuisine.', 'Appetizer', 'American', 150, '1661336604.jpg', 1, '2022-08-22 07:30:09'),
(62, 92, 'Pork belly', 'Pork Belly is the boneless cut that remains after the loin and spareribs are removed. ', 'Main', 'Filipino', 268, '1661336614.jpg', 1, '2022-08-22 07:31:31'),
(63, 92, 'Roast Chicken', 'Roast chicken is chicken prepared as food by roasting whether in a home kitchen, over a fire, or with a rotisserie (rotary spit).', 'Main', 'American', 268, '1661336624.jpg', 1, '2022-08-22 07:32:13'),
(64, 92, 'Pork Sisig', 'Pork sisig is a popular Filipino dish. It is composed of minced pork, chopped onion, and chicken liver. It is a favorite dish for pulutan.', 'Main', 'Filipino', 268, '1661336636.jpg', 1, '2022-08-22 07:34:00'),
(65, 92, 'Cordon Bleu', 'A cordon bleu or schnitzel cordon bleu is a dish of meat wrapped around cheese (or with cheese filling), then breaded and pan-fried or deep-fried.', 'Main', 'American', 268, '1661336647.jpg', 1, '2022-08-22 07:35:30'),
(66, 92, 'Iced Hibiscus Tea', 'Iced hibiscus tea is a refreshing low-sugar alternative that contains lots of beneficial compounds that act as antioxidants.', 'Drinks', 'American', 148, '1661336659.jpg', 1, '2022-08-22 07:38:12'),
(67, 92, 'Lemonade', 'Lemonade is a colourless sweet fizzy drink. A drink that is made from lemons, sugar, and water and is not fizzy can also be referred to as lemonade.', 'Drinks', 'American', 148, '1661336671.jpg', 1, '2022-08-22 07:38:55'),
(68, 93, 'Daing na Bangus', 'Daing na Bangus refers to milkfish that is marinated in a mixture composed of vinegar, crushed peppercorn, garlic, and salt.', 'FishDish', 'Filipino', 190, '1661337704.jpg', 0, '2022-08-22 07:44:46'),
(69, 93, 'Fried Chicken', 'Fried chicken has been described as being \"crunchy\" and \"juicy\", as well as \"crispy\". ', 'MeatDish', 'Filipino', 220, '1661337712.jpg', 1, '2022-08-22 07:45:47'),
(70, 93, 'Coca Cola', 'Soda', 'Drinks', 'Filipino', 55, '1661337719.png', 1, '2022-08-22 07:46:15'),
(71, 93, 'Sprite', 'Soda', 'Drinks', 'Filipino', 55, '1661337731.jpg', 1, '2022-08-22 07:47:06'),
(72, 93, 'Mushroom Soup', 'A warm bowl of soup so deliciously creamy with tender bites of mushroom pieces. Full flavoured with garlic, onions and herbs subtle enough to shine through', 'Soup', 'Filipino', 160, '1661337743.jpg', 1, '2022-08-22 07:47:59'),
(73, 93, 'Iced Tea', 'A cold drink typically consisting of tea, sugar, and lemon, served over ice. Brewed tea served chilled, often with sugar or lemon.', 'Drinks', 'Filipino', 45, '1661337758.jpg', 1, '2022-08-22 07:48:29'),
(74, 93, 'Mojos', 'Mojo Potatoes are amazingly crispy and crunchy on the outside and fluffy on the inside. ', 'Appetizer', 'Filipino', 180, '1661337826.jpg', 1, '2022-08-22 07:49:59'),
(75, 93, 'Nachos', 'a tortilla chip topped with melted cheese and often additional savory toppings (such as hot peppers or refried beans)', 'Appetizer', 'Filipino', 220, '1661337833.jpg', 1, '2022-08-22 07:50:48'),
(76, 93, 'Pork Binagoongan', 'Pork Binagoongan is translated as pork cooked in shrimp paste.', 'Main', 'Filipino', 180, '1661337841.jpg', 1, '2022-08-22 07:51:34'),
(77, 93, 'Plain Rice', ' Rice is easy to cook and can be served as a side dish or a main dish. Plain rice is served with lentils, dal, or a gravy-based dish.', 'Main', 'Filipino', 145, '1661337848.jpg', 1, '2022-08-22 07:52:23'),
(80, 95, 'Ramen', 'Ramen', 'Main', 'Japanese', 150, '1661481500.jpg', 1, '2022-08-26 02:38:20'),
(81, 95, 'Coke', 'Coke Can', 'Drinks', 'Japanese', 30, '1661481530.png', 1, '2022-08-26 02:38:50'),
(82, 95, 'Crab Sticks', 'Crab Sticks', 'Appetizer', 'Korean', 100, '1661481563.jpg', 1, '2022-08-26 02:39:23'),
(83, 95, 'Ramen', 'Ramen', 'Main', 'Japanese', 150, '1661481595.jpg', 0, '2022-08-26 02:39:55');

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
(20, 'MELODEE', 3, '2022-09-15', '19:10:00', '09271704345 ', 'agorita28@gmail.com', 95, 86, 0),
(21, 'LLOYD', 5, '2022-10-04', '08:17:00', '09770942602', 'agorita28@gmail.com', 92, 86, 0);

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
(22, 86, 95, 'LLOYD', 4, 'Very Good', 1661482497),
(23, 86, 95, 'LLOYD', 3, 'asd', 1664512157),
(24, 86, 92, 'LLOYD', 5, 'asdada', 1665149196),
(25, 86, 92, 'LLOYD', 4, 'dfs', 1665149760),
(26, 86, 91, 'LLOYD', 4, 'df', 1665153170),
(27, 86, 95, 'LLOYD', 4, 'asdafdcxcbcvn', 1665154065),
(28, 86, 95, 'LLOYD', 4, 'bvbvnnvvn', 1665156664),
(29, 86, 92, 'LLOYD', 4, 'testad', 1665200726),
(30, 86, 92, 'LLOYD', 4, 'sdfsfs', 1665201312),
(31, 86, 92, 'LLOYD', 5, 'sadwwe', 1665201749),
(32, 86, 92, 'LLOYD', 5, 'asdafsds', 1665202478);

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
  `dateofbirth` date NOT NULL,
  `age` tinyint(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `verify_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `firstname`, `lastname`, `dateofbirth`, `age`, `phonenumber`, `address`, `password`, `image`, `role_as`, `status`, `verify_token`, `created_at`) VALUES
(66, 'admin', 'admin123@gmail.com', 'admin', 'admin', '2000-04-28', 22, '09770942602', 'address', '$2y$10$4mBBlDJME3JrVg0g6fs1tOoG2ZCnnsPxfDmp.sOqbRmEW3pL71Kd.', '1658407379.jpg', 1, 1, NULL, '2022-07-21 12:42:59'),
(67, 'user', 'user123@gmail.com', 'user', 'user', '2000-10-16', 21, '09770942602', 'user1', '$2y$10$vOG4YcEohzfLZNzq3FF9V..E4.fJQNRIkzc78ysg.cIMxB.v7qJSm', '1658569990.jpg', 0, 1, NULL, '2022-07-21 13:20:52'),
(86, 'LLOYD', 'agorita28@gmail.com', 'John Lloyd', 'Agorita', '2000-04-28', 22, '09271704345', 'Bagong SIlang Balanga ', '$2y$10$PSuBSO0EyJKPonUz2x0Nd.ex0lmuDeMZRrp8Z9NNwd6HaKEJom/oO', '1665220367.jpg', 0, 1, 'e3bbb504efa4d0979a3285dd187ee92e', '2022-08-26 02:30:23'),
(87, 'LLOYDYYY', 'johnlloyd.professional@gmail.com', 'John Lloyd', 'Agorita', '2000-04-28', 22, '09770942602', 'Balanga Bataan', '$2y$10$5Z9qlC0XYdhWuHrQxHzJsODdubq7zXWrDdBSHe55cWnM.YAAQ5l/6', '1664774156.jpg', 0, 1, NULL, '2022-10-03 05:15:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`businessid`),
  ADD KEY `municipalityid` (`municipalityid`);

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
  ADD PRIMARY KEY (`review_id`),
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
  MODIFY `businessid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `mealcategory`
--
ALTER TABLE `mealcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `municipalityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`municipalityid`) REFERENCES `municipality` (`municipalityid`);

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

--
-- Constraints for table `review_table`
--
ALTER TABLE `review_table`
  ADD CONSTRAINT `review_table_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `review_table_ibfk_2` FOREIGN KEY (`businessid`) REFERENCES `business` (`businessid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
