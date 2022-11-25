-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 06:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `confirmPassword`) VALUES
(1, 'admin@gmail.com', '8ae624bc8248231584e687b10ce3ec9b42d109d3', '8ae624bc8248231584e687b10ce3ec9b42d109d3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_reports`
--

CREATE TABLE `cart_reports` (
  `id` int(6) UNSIGNED NOT NULL,
  `pid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_reports`
--

INSERT INTO `cart_reports` (`id`, `pid`, `name`, `price`, `quantity`, `date`, `total`) VALUES
(15, '11', 'cake blueberry', '12', '30', '2022-11-20 21:39:53', '12'),
(18, '11', 'cake blueberry', '12', '1', '2022-11-20 21:39:53', '12'),
(26, '14', 'Ice latte', '12', '5', '2022-11-20 21:39:53', '12'),
(16, '11', 'carbonara', '19', '18', '2022-11-24 14:24:45', '702'),
(44, '19', 'Tiramisu Cake', '9', '3', '2022-11-20 21:14:22', '27'),
(45, '20', 'Cheeesecake', '7', '2', '2022-11-20 21:14:22', '14'),
(53, '14', 'cake blueberry', '12', '1', '2022-11-24 14:22:56', '12'),
(48, '21', 'spaghetti carbonara', '15', '1', '2022-11-20 21:36:01', '15'),
(49, '14', 'Ice latte', '12', '1', '2022-11-24 04:29:37', '12'),
(50, '27', 'Spaghetti Aglio Olio', '16', '1', '2022-11-24 13:31:27', '16'),
(51, '20', 'Cheeesecake', '7', '1', '2022-11-24 13:31:27', '7'),
(52, '14', 'Ice latte', '12', '1', '2022-11-24 13:39:18', '12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `tableNo` int(3) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `tableNo`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1337, 'Faisal', '0123456789', 'me@meorfaisal.com', 'Online Banking', 5, 'cake blueberry (12 x 30) - carbonara (19 x 18) - ', 702, '2022-11-20 21:39:53', 'Success'),
(2, 1337, 'Faisal', '0123456789', 'me@meorfaisal.com', 'Online Banking', 3, 'cake blueberry (12 x 1) - ', 12, '2022-11-20 21:39:53', 'pending'),
(3, 8, 'Fatihah', '0123456789', 'yixn02@gmail.com', 'Online Banking', 1, 'Ice latte (12 x 5) - ', 60, '2022-11-20 21:39:53', 'Success'),
(5, 1350, 'Hafizi', '0136985420', 'mecad16437@kixotic.com', 'Online Banking', 5, 'Tiramisu Cake (9 x 3) - Cheeesecake (7 x 2) - ', 41, '2022-11-20 21:39:53', 'pending'),
(6, 1349, 'Dini', '0114458732', 'vojem11069@klblogs.com', 'Online Banking', 2, 'spaghetti carbonara (15 x 1) - ', 15, '2022-11-20 21:39:53', 'pending'),
(28, 1347, 'noranisah', '0124457896', 'tevatix730@klblogs.com', 'Online Banking', 3, 'Spaghetti Aglio Olio (16 x 1) - Cheeesecake (7 x 1) - ', 23, '2022-11-24 13:31:32', 'pending'),
(29, 8, 'Fatihah', '0123456789', 'yixn02@gmail.com', 'Online Banking', 5, 'Ice latte (12 x 1) - ', 12, '2022-11-24 13:39:24', 'pending'),
(30, 8, 'Fatihah', '0123456789', 'yixn02@gmail.com', 'Online Banking', 6, 'cake blueberry (12 x 1) - ', 12, '2022-11-24 14:14:35', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `quantity`, `availability`, `price`, `image`) VALUES
(11, 'cake blueberry', 'Desserts', 1, 'Yes', 12, 'blueberryCake.jpg'),
(14, 'Ice latte', 'Drinks', 15, 'Yes', 12, 'Icedlatte.jpg'),
(19, 'Tiramisu Cake', 'Desserts', 30, 'Yes', 9, 'tiramisuCake.jpg'),
(20, 'Cheeesecake', 'Desserts', 30, 'Yes', 7, 'cheesecake.jpg'),
(21, 'spaghetti carbonara', 'Spaghetti', 10, 'Yes', 15, 'Spaghetti-and-Meatballs.jpg'),
(27, 'Spaghetti Aglio Olio', 'Spaghetti', 15, 'Yes', 16, 'aglio-olio.jpg'),
(28, 'Orange Cake', 'Desserts', 10, 'Yes', 9, 'orangecake.jpg'),
(29, 'spaghetti arrabiata', 'Spaghetti', 5, 'Yes', 15, 'arrabiata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(3) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(3, 'Syiqin', 5, 'Sedapnya!!!', 1668479103),
(5, 'noranisah', 4, 'Sedap tapi kena improve', 1668503000),
(14, 'Iznurin', 5, 'Makanan sedap', 1668626414),
(15, 'Hafiy', 5, 'Taste good!', 1669290392),
(16, 'Balqis', 5, 'Makanan sedap. Saya bagi 5 bintang', 1669290645);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL,
  `job` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `confirmPassword`, `job`, `address`, `phone`, `image`) VALUES
(1, 'Iznurin', 'yixn00@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Manager', 'utm kuala lumpur', '0124563789', 'user1.png'),
(2, 'Auni', 'auni@gmail.com', 'e4cc2bb45484582e37328c2e4b432809fc911aac', 'e4cc2bb45484582e37328c2e4b432809fc911aac', 'Supervisor', 'utm kuala lumpur', '0186325410', 'user2.png'),
(3, 'Aimi', 'Aimiqah@gmail.com', '06058c604a884ae4d9b31bac1e2aed189d4536e6', '06058c604a884ae4d9b31bac1e2aed189d4536e6', 'Assistant', 'utm kuala lumpur', '0167894523', 'user1.png'),
(4, 'balqis', 'Balqisnasir@gmail.com', '08fed51c7199cc5cf7b63ec4738ff9fbcf9b52fa', '08fed51c7199cc5cf7b63ec4738ff9fbcf9b52fa', 'Barista', 'utm kuala lumpur', '0178965230', 'user2.png'),
(5, 'hafiy', 'hafiydnel@gmail.com', '3d490f6f49a0159c9abd1a6f19554d2df4e8e531', '3d490f6f49a0159c9abd1a6f19554d2df4e8e531', 'Barista', 'utm kuala lumpur', '0148965723', 'user1.png'),
(6, 'arif', 'ariftermizi@gmail.com', '1dc948a5735663f67c1686972b15f2b2e583aae2', '1dc948a5735663f67c1686972b15f2b2e583aae2', 'barista', 'utm kuala lumpur', '0114569328', 'user1.png'),
(7, 'jack', 'pogat38285@kixotic.com', '3bb901ca535b5b65a93e463271008779a560563d', '2185d2848abe031a0353cc04dd519e8184947113', 'Trainer', 'utm kuala lumpur', '0134896570', 'user2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL,
  `verifyId` varchar(255) NOT NULL,
  `verifyStatus` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `confirmPassword`, `verifyId`, `verifyStatus`) VALUES
(8, 'Fatihah', 'yixn02@gmail.com', '0123456789', 'b5d7dc843e72a9c3fdbd6b5725949b35bbee309f', 'b5d7dc843e72a9c3fdbd6b5725949b35bbee309f', '3345623321120036987', 1),
(1347, 'noranisah', 'tevatix730@klblogs.com', '0124457896', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '32303132323437373031', 1),
(1348, 'syiqin', 'kawiwar468@jernang.com', '0114569823', 'fa79f3f3edb3692ec47aa82e68c7c426c944d1f8', 'fa79f3f3edb3692ec47aa82e68c7c426c944d1f8', '31333835373537333038', 1),
(1349, 'Dini', 'vojem11069@klblogs.com', '0114458732', 'f1c7849ceecba524c27cf3e93ab9fd36016518c8', 'f1c7849ceecba524c27cf3e93ab9fd36016518c8', '393530393833313332', 1),
(1350, 'Hafizi', 'mecad16437@kixotic.com', '0136985420', 'b2e4047309d4c80b97def8a973cc549cdc017e15', 'b2e4047309d4c80b97def8a973cc549cdc017e15', '32313131343037393338', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_reports`
--
ALTER TABLE `cart_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cart_reports`
--
ALTER TABLE `cart_reports`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1352;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
