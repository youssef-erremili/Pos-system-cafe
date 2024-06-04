-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe pos system`
--

-- --------------------------------------------------------

--
-- Table structure for table `burger`
--

CREATE TABLE `burger` (
  `burger_id` int(255) NOT NULL,
  `burger_name` varchar(255) NOT NULL,
  `burger_desc` varchar(255) NOT NULL,
  `burger_price` varchar(255) NOT NULL,
  `burger_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `burger`
--

INSERT INTO `burger` (`burger_id`, `burger_name`, `burger_desc`, `burger_price`, `burger_image`) VALUES
(5, 'Bite burger', 'Flavorful Burger Co. Juicy Patty Bistro; Burger Junction; Bite Me Burgers', '28', 'Bite burger.jpg'),
(6, 'Patty Planet', 'The Patty Wagon; Patty O\'Furniture; Planet of the Grapes; Sir Loin\'s Castle; Patty', '22.90', 'Patty Planet.jpg'),
(8, 'Jack Daniels', 'These delicious burgers taste almost exactly like the ones from TGI Friday\'s, but-- dare I say-- even better. Even if you\'re a beginner at the grill.', '20', 'Jack Daniels.jpg'),
(9, 'MUSHROOM & SWISS CHEESE', 'Embrace going the extra mile with this Mushroom Swiss Cheese Burgers recipe for a gourmet beef burger with St Pierre Brioche Buns, fresh herbs, mushrooms and luxurious truffle mayo.', '27', 'Mushroom & Swiss Cheese.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `coffee_id` int(11) NOT NULL,
  `coffee_name` varchar(255) NOT NULL,
  `coffee_desc` varchar(255) NOT NULL,
  `coffee_price` varchar(255) NOT NULL,
  `coffee_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`coffee_id`, `coffee_name`, `coffee_desc`, `coffee_price`, `coffee_image`) VALUES
(2, 'Espresso', 'Originating in Italy, espresso is a beloved caffeine-rich drink with a strong flavor.', '33.3', 'Espresso.jpg'),
(8, 'Chocolate Mocha', 'Beloved for its chocolate flavor, Mocha is a latte with a chocolate twist.', '12', 'Chocolate Mocha.jpg'),
(38, 'Dalgona Coffee', 'you may never drink it the old way again!, you can have your favorite drink right at home.', '33', 'Dalgona Coffee.jpg'),
(39, 'Caramel Macchiato', 'Caramel Macchiato is a popular coffee drink with espresso shots, frothy milk, and caramel sauce. ', '27', 'Caramel Macchiato.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `drink_id` int(255) NOT NULL,
  `drink_name` varchar(255) NOT NULL,
  `drink_desc` varchar(255) NOT NULL,
  `drink_price` varchar(255) NOT NULL,
  `drink_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `drink_name`, `drink_desc`, `drink_price`, `drink_image`) VALUES
(1, 'Buko Salad', 'Mouth-watering coconut juice mixed with milk, gulaman, tapioca, and shredded coconut mea', '22', 'Buko Salad.jpg'),
(2, 'Dulce De Leche', 'Dulce De Leche Milkshake or Ice cream float is delicious, creamy & thick filled with full of flavor & goodness of caramel', '27.50', 'Dulce De Leche.jpg'),
(6, 'Lemonade Watermelon', 'This simple two ingredient recipe combines frozen watermelon and lemonade for a delicious, refreshing frozen beverage! Alcohol can be added, if desired.', '16', 'Lemonade With Watermelon.jpg'),
(7, 'Strawberry Cheesecake', 'This Strawberry Cheesecake Milkshake is made with vanilla ice cream, graham cracker crumbs and a slice of real strawberry cheesecake! Decorated with strawberry sauce and cream cheese whipped cream', '22', 'Strawberry Cheesecakejpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `salads`
--

CREATE TABLE `salads` (
  `salad_id` int(255) NOT NULL,
  `salad_name` varchar(255) NOT NULL,
  `salad_desc` varchar(255) NOT NULL,
  `salad_price` int(255) NOT NULL,
  `salad_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salads`
--

INSERT INTO `salads` (`salad_id`, `salad_name`, `salad_desc`, `salad_price`, `salad_image`) VALUES
(9, 'Salmon Avocado', 'This Salmon Avocado Salad is made with my two favorite super foods – avocado and wild salmon. I could eat this every day!', 55, 'Salmon Avocado.jpg'),
(10, 'Shrimp Avocado', 'This low-carb Shrimp Avocado Salad is made with only a few simple ingredients with a zesty lime olive oil dressing that adds a fresh flavor!', 50, 'Shrimp Avocado.jpg'),
(11, 'Cobb Salad', 'This Cobb Salad Recipe will blow your mind. The textures are interesting and varied, the flavors are fresh and bright and the dressing...wait until you try this dressing!', 46, 'Cobb Salad.jpg'),
(12, 'Blackberry&Arugula', 'This summery salad makes the most of fresh produce with an arugula base, fresh blackberries, blueberries, cucumber, avocado, hazelnuts, vegan feta and a lime mint vinaigrette.', 39, 'Blackberry and Arugula.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'yous', '', '$2y$10$DfZWuCWQfo4w3yDHNw2LxessbQglEtO1PpBJC7t4I4xacGD9U.gq2'),
(2, 'user1', '', '$2y$10$nK9MWbTg9amnaJ83jl4WoOcVNXamGuspEq58Bmk8Tp9VwvWyVA9kK'),
(3, 'youssef', '', '$2y$10$kO1HD.jNwtWa9RE0VHc9wO6PRBqphPiYbJRY.z/q0jw3aUQ8sZfrG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`burger_id`);

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`coffee_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drink_id`);

--
-- Indexes for table `salads`
--
ALTER TABLE `salads`
  ADD PRIMARY KEY (`salad_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `burger_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `coffee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `drink_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salads`
--
ALTER TABLE `salads`
  MODIFY `salad_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
