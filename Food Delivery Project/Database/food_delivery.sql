-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 01:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `alldays`
--

CREATE TABLE `alldays` (
  `id` int(100) NOT NULL,
  `days_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alldays`
--

INSERT INTO `alldays` (`id`, `days_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `date`, `image`, `status`) VALUES
(97, 'Steve', 'hi we are here', '2021-03-25', 'internet.jpg', 1),
(98, 'sdasd', 'ghfgh', '2021-04-14', 'about.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_comment` text NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_comment`, `blog_id`, `user_id`, `date`) VALUES
(23, 'abc', 8, 51, '2021-04-06 00:00:00'),
(24, 'Hi', 10, 51, '2021-04-06 12:23:36'),
(25, 'hi', 10, 51, '2021-04-06 12:23:42'),
(28, 'Hello', 9, 51, '2021-04-10 09:14:42'),
(29, 'Hello', 9, 51, '2021-04-10 09:14:51'),
(30, '   ', 9, 51, '2021-04-10 09:14:56'),
(31, '  ', 10, 51, '2021-04-10 09:16:18'),
(32, '   ', 10, 51, '2021-04-10 09:16:23'),
(33, 'Hello', 10, 51, '2021-04-10 09:16:33'),
(34, '  ', 10, 51, '2021-04-12 10:46:30'),
(35, 'Steve', 10, 51, '2021-04-12 11:12:33'),
(36, 'Steve', 10, 51, '2021-04-12 11:12:33'),
(37, 'testing', 8, 51, '2021-04-14 06:48:49'),
(38, 'testing', 8, 51, '2021-04-14 06:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `driver_profile`
--

CREATE TABLE `driver_profile` (
  `id` int(255) NOT NULL,
  `driver_id` int(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_image` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `driver_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_profile`
--

INSERT INTO `driver_profile` (`id`, `driver_id`, `driver_name`, `driver_image`, `vehicle_no`, `vehicle_model`, `booking_time`, `driver_number`) VALUES
(3, 52, 'Bilal Khan ', 'pic4.jpg', 'abc-123', 'Honda CD', '08:00', '03321234567'),
(4, 52, 'Zain Ali', '1628747163.jpg', 'xyz-123', 'Honda CD 70', '10:00', '03321234789'),
(8, 52, 'Hamza', '1628765224.png', 'efg-123', 'Swift', '09:30', '03321256435'),
(13, 82, 'Bilal Khan', '1628765256.png', 'abc-123', 'Honda CD 70', '10:00', '03321232369'),
(14, 82, 'Hamza Abid', '1628765306.jpg', 'efg-123', 'Swift', '11:00', '03321959473'),
(15, 45, 'Zohaib', '1628849528.jpg', 'C1H91J5', 'Swift', '10:00', '03321256435'),
(16, 45, 'Subhan ', '1628849622.jpg', 'abc-123', 'Honda CD 70', '08:40', '03321234789');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `name`, `price`, `description`, `duration`, `status`) VALUES
(3, 'ali', '500', 'abcd', '5 months', 0),
(5, 'ibrahim', '500', 'testing', '2 months', 0),
(7, 'text', '638', 'testing', '7 months', 0),
(8, 'maham', '1000', 'avail this offer now...', '3months', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `employees` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `res_name`, `industry`, `employees`, `street_name`, `postal_code`, `city`, `fname`, `lname`, `email`, `phone`, `reason`, `status`, `image`, `description`) VALUES
(1, 'Karachi Broast', 'Hospitality & Real Estate', '50-100', 'Defence', '222222', 'Karachi', 'Zaid', 'Iftikar', 'Zaid@gmail.com', '0321546545', 'Events/Catering', 'Approved', 'about.jpg', '<p>New <strong>Restaurant</strong> is going to start</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'User'),
(2, 'Vendor'),
(3, 'Driver'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`id`, `name`, `phone`, `email`, `address`, `image`, `password`, `status`) VALUES
(5, 'Ibrahim', '32132123', 'Ibrahim@gmail.com', 'Malir', 'aa.jpg', 'Ibrahim', 'Unsuspend'),
(7, 'maha', '0232323223233', 'Steven@gmail.com', 'Malir', 'Screenshot (2).png', '1234', 'Unsuspend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blog_name` varchar(200) NOT NULL,
  `blog_desc` varchar(200) NOT NULL,
  `blog_date` datetime NOT NULL DEFAULT current_timestamp(),
  `blog_image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `blog_name`, `blog_desc`, `blog_date`, `blog_image`, `status`) VALUES
(8, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown pr', '2021-04-05 00:00:00', 'about_img3.jpg', 0),
(9, 'abc', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containi', '2021-04-05 00:00:00', 'banner4.jpg', 0),
(10, 'Why do we use it?', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containi', '2021-04-05 00:00:00', 'about_bg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `name`, `phone`, `address`, `status`, `user_id`) VALUES
(4, 'Del Frio', '2313212312132', 'Shah Faisal Town', 'Unsuspend', '4'),
(5, 'OPTP', '32132132313232', 'Gulshan', 'Unsuspend', '4'),
(7, 'Potatoes', '1231231', 'Karachi', 'Suspend', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_name`) VALUES
(1, 'Fast Food'),
(3, 'Italian Food'),
(4, 'Salads'),
(6, 'Chinese'),
(8, 'Steve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `name`, `phone`, `email`, `address`, `role`, `password`, `status`, `image`) VALUES
(1, 'Zohaib', '1321321222', 'Zohaib@gmail.com', 'Bhagy Korangi', 'Driver', 'Zohaib', 'Suspend', 'aa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opreations`
--

CREATE TABLE `tbl_opreations` (
  `id` int(50) NOT NULL,
  `vendor_id` int(50) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_opreations`
--

INSERT INTO `tbl_opreations` (`id`, `vendor_id`, `day`, `time`) VALUES
(17, 49, 'Saturday', '11:25'),
(18, 49, 'Friday', '06:00'),
(19, 49, 'Wednesday', '10:00'),
(20, 49, 'Thursday', '08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `offer`, `discount`, `promo_code`, `status`, `user_id`) VALUES
(4, 'Del Frio', '21%', '132132', 'Unsuspend', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricing`
--

CREATE TABLE `tbl_pricing` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(200) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pricing`
--

INSERT INTO `tbl_pricing` (`id`, `title`, `description`, `price`, `status`) VALUES
(5, 'steve', 'jason', '120', 'Unsuspend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qauntity` varchar(255) NOT NULL,
  `descp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `vendor_id`, `category`, `sub_category`, `product_name`, `product_price`, `product_image`, `qauntity`, `descp`, `status`) VALUES
(7, 0, '3', '4', 'samosa', '13', 'about_img1.jpg', '5', 'etgvbwrfc', 'Suspend'),
(9, 0, '3', '3', 'sushi', '250', 'gallery_item9.jpg', '80', 'for testing ok', 'Suspend'),
(14, 0, '3', '2', 'Burger', '1000', 'about_img4.jpg', '1', 'yammy', 'Suspend'),
(15, 0, '6', '3', 'rice', '350', 'gallery_item_small6.jpg', '2', 'Chinese Egg Fried Rice', 'Suspend'),
(20, 0, '1', '1', 'Burger', '1', 'blog_bg.jpg', '1', 'adasdsad', 'Suspend'),
(25, 49, '6', '6', 'Salad', '100', 'about_img4.jpg', '3', 'SALAD', 'Suspend'),
(26, 49, '3', '4', 'Cheese Burger', '300', 'about_img2.jpg', '2', 'Zinger Cheese Burgur', 'Suspend'),
(27, 49, '', '', '123', '', '', '', '', 'Suspend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriptionplan`
--

CREATE TABLE `tbl_subscriptionplan` (
  `pack_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_price` varchar(255) NOT NULL,
  `pack_description` varchar(200) NOT NULL,
  `pack_duration` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `pack_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscriptionplan`
--

INSERT INTO `tbl_subscriptionplan` (`pack_id`, `username`, `pack_name`, `pack_price`, `pack_description`, `pack_duration`, `date`, `pack_status`) VALUES
(42, '51', '5', '', '', '', '2021-04-14 06:45:57', 'Suspend'),
(43, '47', '5', '', '', '', '2021-07-08 11:32:46', 'Suspend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, ' Burgers', '1'),
(2, 'BBQ', '1'),
(4, 'Pizza', '3'),
(5, 'Russian Salads', '4'),
(6, 'Food', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `verification` int(250) NOT NULL,
  `vkey` varchar(250) NOT NULL,
  `upgrade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `phone`, `email`, `password`, `image`, `address`, `role`, `verification`, `vkey`, `upgrade`, `status`) VALUES
(45, 'Zohaib', '31232132132', 'Zohaib@gmail.com', 'zohaib', '1628747531.png', 'Bhagy Korangi', '3', 1, '', '', 'Unsuspend'),
(47, 'Ibrahim', '32132132123', 'Ibrahim@gmail.com', 'Ibrahim', 'aa.jpg', 'Malir', '1', 1, '', '', 'Unsuspend'),
(49, 'Zaid', '231321321212', 'Zaid@gmail.com', 'zaid', 'internet.jpg', 'Karachi', '2', 1, '', '', 'Unsuspend'),
(51, 'Rafay', '23132131223', 'Rafay@gmail.com', 'Rafay', 'internet.jpg', 'Karachi', '1', 1, '', '', 'Unsuspend'),
(52, 'Qaseem', '321321231', 'Qasim@gmail.com', 'qasim', '1628747163.jpg', 'Karachi', '3', 1, '', '', 'Unsuspend'),
(54, 'Steve', '21321323231', 'stevejason360@gmail.com', 'steve', 'internet.jpg', 'Karachi', '2', 1, '', '', 'Unsuspend'),
(66, 'Waleed', '1321321312', 'raiyyanali123@gmail.com', '1234', '1584748336631.jpg', 'Malir', '2', 0, '', '', 'Suspend'),
(69, 'Admin', '03322314353', 'Admin@gmail.com', 'admin123', '', '', '4', 0, '', '', 'Suspend'),
(70, 'maham', '45584854', 'maham@gmail.com', '1234', 'about_img4.jpg', 'karachi', '2', 0, '', '', 'Suspend'),
(78, 'Subhan Ahmed', '03320678590', 'ahmedsubhan741@gmail.com', 'Aptech456', '1584748336631.jpg', 'A-127 Gulistan society, quaidabad', '1', 0, 'da7df94c5ccf883ecd8417585fa212a5', '', 'Suspend'),
(82, 'Bilal Khan', '03320398653', 'bilalkhan@gmail.com', 'bilal', 'pic11.jpg', 'Korangi', '3', 0, '', '', 'Suspend'),
(106, 'Zain Ali', '03320303030', 'smart_zain@ymail.com', 'zain', 'profile.png', 'Malir', '1', 1, '8162048451f6194e519726208f94a3f3', '', 'Unsuspend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `Id` int(11) NOT NULL,
  `vehicle_no` varchar(220) NOT NULL,
  `license_no` varchar(220) NOT NULL,
  `vehicle_model` varchar(220) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_image` varchar(220) NOT NULL,
  `vehicle_type` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`Id`, `vehicle_no`, `license_no`, `vehicle_model`, `user_id`, `vehicle_image`, `vehicle_type`) VALUES
(4, '123', '123', 'Swift', 52, 'car.jpg', 'Car'),
(8, '123', '123', 'Rikshaw', 52, 'rikshaw.jpg', 'Tricycle'),
(10, '1233', '1233', 'Honda CD 125', 52, 'bike.jpg', 'Motorcycle'),
(14, 'Abc-456', 'xyz-464', 'Honda', 82, '1628767842.jpg', 'Motorcycle'),
(17, 'Abc-876', 'xyz-432', 'Rikshaw', 82, '1628767984.jpg', 'Tricycle'),
(18, 'Ijk-326', 'efg-469', 'Swift', 82, 'car.jpg', 'Car'),
(19, 'brh-485', 'CF6H41', 'Honda ', 45, '1628849345.jpg', 'Motorcycle'),
(20, 'ABC-123', 'B4X9T61', 'Rikshaw', 45, '1628849374.jpg', 'Tricycle'),
(21, 'CJB-464', 'K7H5C12', 'Swift', 45, '1628849423.jpg', 'Car');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id`, `name`, `phone`, `email`, `address`, `image`, `role`, `password`, `status`) VALUES
(2, 'Subhan', '1323', 'subhan@gmail.com', 'abc London', '1584748336631.jpg', 'Vendor', 'Aptech', 'Suspend');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `description`) VALUES
(8, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alldays`
--
ALTER TABLE `alldays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_profile`
--
ALTER TABLE `driver_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_opreations`
--
ALTER TABLE `tbl_opreations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscriptionplan`
--
ALTER TABLE `tbl_subscriptionplan`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alldays`
--
ALTER TABLE `alldays`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `driver_profile`
--
ALTER TABLE `driver_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_opreations`
--
ALTER TABLE `tbl_opreations`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_subscriptionplan`
--
ALTER TABLE `tbl_subscriptionplan`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
