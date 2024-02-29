-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 05:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jennyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(100) NOT NULL,
  `a_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`, `a_img`) VALUES
(20, 'Jenny ', 'jenny123@gmail.com', 'jenny123', '8pro1.jpg'),
(33, 'Master', 'master111@gmail.com', '123', '7car2.jpg'),
(48, 'Maria', 'maria123@gmail.com', 'maria123', '2girl.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `quantity` varchar(50) NOT NULL,
  `total` varchar(150) NOT NULL,
  `cart_img` varchar(100) NOT NULL,
  `cart_price` varchar(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `cus_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `quantity`, `total`, `cart_img`, `cart_price`, `pro_name`, `cus_email`) VALUES
(29, 105, '1', '850', '4braclet2.webp', '850', 'Bracelet-0081', 'nida123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(18765, 'Hair', '1'),
(19393, 'Nails', '1'),
(37660, 'Makeup', '1'),
(38036, 'Skincare', '1'),
(39508, 'Jewellery', '1'),
(44750, 'Fragrances', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `customer_eml` varchar(100) NOT NULL,
  `cnt_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `msg`, `customer_eml`, `cnt_name`) VALUES
(23, 'Wonderful services.', 'Cyber222@gmail.com', 'Cyber'),
(29, 'Beautiful and cheap products.', 'hania@gmail.com', 'Hania');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cell_no` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `cus_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cell_no`, `dob`, `cus_password`) VALUES
(20, 'Daniel', 'daniel123@gmail.com', '030-46443567', '2001-03-10', 'daniel123'),
(37, 'Robert', 'robert11@hotmail.com', '030-4644567', '2002-03-26', 'robert123'),
(41, 'Nida', 'nida123@gmail.com', '021-875438', '1998-07-21', 'nida123'),
(52, 'Campbell', 'campbell222@gmail.com', '013-46778893', '2008-06-03', 'campbell123'),
(64, 'John', 'john123@gmail.com', '032-4354356', '2005-03-23', 'john123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cu_id` int(11) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `Pincode` varchar(100) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `pro_total` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cu_id`, `added_on`, `address`, `city`, `Pincode`, `payment_type`, `payment_status`, `order_status`, `pro_total`) VALUES
(23, 41, '2023-07-02 04:34:18', 'zaman', 'park', '998', 'COD', 'success', '1', 500),
(67, 20, '2023-10-29 17:33:53', 'Maymar Karachi', 'Karachi', '34886', 'COD', 'success', '1', 1700),
(68, 37, '2023-06-24 01:54:45', '5th Street ', 'New York', '5664', 'COD', 'success', '4', 2700),
(79, 52, '2023-06-22 18:02:40', 'Linkin Park Street 2', 'London', '05356', 'COD', 'success', '2', 2650),
(82, 20, '2023-06-24 01:46:38', 'Linkin Park Street 2', 'Paris', '4343', 'COD', 'success', '3', 34800),
(83, 64, '2023-06-25 07:04:06', 'Street-5 newtown', 'Auckland', '7865', 'COD', 'success', '1', 2020),
(92, 41, '2023-07-02 04:50:26', 'pul', 'kaka', '332', 'COD', 'success', '1', 1030),
(107, 41, '2023-07-02 04:36:16', 'zaman', 'park', '6456', 'COD', 'success', '1', 540),
(191, 41, '2023-07-02 04:38:14', 'lop', 'looo', '65665', 'COD', 'success', '1', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `status`) VALUES
(1, 'Processing'),
(2, 'Pending'),
(3, 'Complete'),
(4, 'Shipped'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `ordr_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `quantity` decimal(20,0) NOT NULL,
  `total` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`od_id`, `ordr_id`, `pro_id`, `quantity`, `total`) VALUES
(175, 68, 153, 2, 900),
(186, 79, 116, 1, 2150),
(236, 107, 106, 1, 540),
(241, 191, 152, 1, 3000),
(246, 79, 120, 5, 8750),
(283, 79, 102, 6, 3600),
(290, 83, 106, 3, 1620),
(323, 83, 168, 2, 400),
(326, 79, 294, 1, 500),
(363, 23, 111, 1, 500),
(380, 92, 147, 1, 300),
(392, 67, 105, 2, 1700),
(398, 79, 257, 3, 390),
(410, 82, 102, 2, 1200),
(414, 82, 229, 2, 33600),
(430, 68, 102, 3, 1800),
(446, 92, 192, 1, 730);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` varchar(50) NOT NULL,
  `p_mrp` varchar(50) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_status` varchar(50) NOT NULL,
  `ca_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_mrp`, `p_img`, `p_status`, `ca_id`) VALUES
(102, 'Enamel flower Ring-8302', '600', '649', '10ring1.webp', '1', 39508),
(105, 'Bracelet-0081', '850', '899', '4braclet2.webp', '1', 39508),
(106, 'Essence Lip Pencil', '540', '560', '7lippencil1.jpg', '1', 37660),
(108, 'VLCC pomegranate & Aloe Vera Scrub', '870', '900', '5scrub2.jpg', '1', 38036),
(111, 'John Louis Savanah Body Spray For Women', '500', '549', '6deodrant2.jpg', '1', 44750),
(116, 'Ring-8119', '2150', '2229', '8ring2.webp', '1', 39508),
(120, 'Mcaulraek Acne Serum', '1750', '1799', '2acne1.jpg', '1', 38036),
(125, 'Calvin Klein Ladies Eternity Spray', '17630', '17999', '6perfume1.jpg', '1', 44750),
(127, 'Maybelline Ultra BB Cream', '2250', '2300', '9bbcream2.jpg', '1', 37660),
(129, 'Ooh Lala Glow Whitening Scrub', '599', '629', '3scrub1.png', '1', 38036),
(131, 'Bridal-0248', '28500', '30000', '5bridal2.webp', '1', 39508),
(133, 'Color Studio Lipstick Red', '1450', '1544', '1lipstick1.png', '1', 37660),
(135, 'Gabrini BB Powder', '1445', '1599', '1powder2.jpg', '1', 37660),
(138, 'Elvawn Combo Gift Box', '9000', '9499', '8perfume2.jpg', '1', 44750),
(141, 'Necklace', '2000', '2599', '9necklace1.webp', '1', 39508),
(147, 'Saeed Ghani Wax Beans Lavender', '300', '349', '8herbal1.jpg', '1', 38036),
(150, 'Gabrini Mascara Brown', '1095', '1250', '3eyelash2.jpg', '1', 37660),
(152, 'Earrings-0820', '3000', '3499', '7earrings1.webp', '1', 39508),
(153, 'Color Studio Nail Polish Remover', '450', '460', '2nailremover2.jpg', '1', 19393),
(155, 'Revolution Glow Brush', '4070', '4200', '5brush2.jpg', '1', 37660),
(159, 'Earrings-0820', '3500', '3900', '4earrings3.webp', '1', 39508),
(168, 'Artemis Nail Polish Remover', '200', '250', '5nailremover1.jpg', '1', 19393),
(177, 'Color Studio Eyeliner', '950', '1100', '6eyeliner1.jpg', '1', 37660),
(179, 'Color Studio Powder Ivory', '1250', '1300', '8powder1.jpg', '1', 37660),
(181, 'Elvawn Sundra Pour Femme', '3950', '4299', '1perfume3.jpg', '1', 44750),
(182, 'Bracelet-0023', '700', '749', '2braclet1.webp', '1', 39508),
(188, 'Color Studio BB Cream', '1600', '1700', '4bbcream3.jpg', '1', 37660),
(191, 'Lancome Foaming Cleansing Makeup Remover', '2750', '2899', '4remover2.png', '1', 38036),
(192, 'Essence Nail Orchid Jungle', '730', '799', '6nailpolish1.jpg', '1', 19393),
(200, 'Swisspers Cotton Rounds', '600', '650', '9remover3.jpg', '1', 38036),
(201, 'Color Studio Blush', '1450', '1500', '8blush1.jpg', '1', 37660),
(205, 'Saeed Ghani Neem Chehra Powder', '200', '239', '3herbal2.jpg', '1', 38036),
(208, 'Saeed Ghani Almond Oil', '400', '449', '3hairherbal2.jpg', '1', 18765),
(221, 'OPI Nail Lacquer Berry', '2800', '2899', '5nailpolish4.jpg', '1', 19393),
(229, 'Remington Hair Dryer', '16800', '23999', '1hairdryer.webp', '1', 18765),
(233, 'OPI Nail Lacquer', '2800', '2999', '8nailpolish3.jpg', '1', 19393),
(236, 'Ring-8116', '1500', '1799', '9ring3.webp', '1', 39508),
(237, 'Artemis Kajal Brush', '60', '80', '5brush1.jpg', '1', 37660),
(238, 'Bourjois Velvet Lip Pencil', '2680', '2899', '7lippencil2.jpg', '1', 37660),
(241, 'SI Basics Moringa Shampoo', '1150', '1299', '10shampoo1.png', '1', 18765),
(243, 'Gorgeous Beauty Blush', '1195', '1350', '5blush2.jpg', '1', 37660),
(251, 'Mcaulraek BB Cream', '1750', '1800', '1bbcream1.jpg', '1', 37660),
(255, 'Oriflame HairX Black Shine Shampoo', '1699', '2200', '1shampoo2.jpg', '1', 18765),
(257, 'Saeed Ghani Coconut Oil', '130', '149', '6haitherbal1.jpg', '1', 18765),
(258, 'Remington Straightener Ceramic Glide', '11200', '12999', '4straightner.webp', '1', 18765),
(264, 'Maybelline Eye Liner', '2699', '2799', '3eyeliner2.jpg', '1', 37660),
(265, 'Necklace-0864', '4450', '4999', '2necklace2.webp', '1', 39508),
(269, 'Earrings-0821', '850', '900', '10earrings2.webp', '1', 39508),
(278, 'Essence Pretty Nail Yellow', '540', '610', '3nailpolish2.jpg', '1', 19393),
(280, 'Ultra Beauty Eye Makeup Remover', '500', '529', '4remover1.png', '1', 38036),
(281, 'SL Basics Anti Acne Serum', '1150', '1255', '6acne2.jpg', '1', 38036),
(283, 'Color Studio Lipstick Pink', '1450', '2200', '4lipsick2.png', '1', 37660),
(290, 'Bridal-0268', '18500', '20000', '4bridel1.webp', '1', 39508),
(294, 'John Louis Monroe Body Spray For Women', '500', '549', '9deodrant1.jpg', '1', 44750),
(299, 'Rude Mascara Brown', '900', '1000', '10eyelash1.jpg', '1', 37660);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_email` (`a_email`),
  ADD UNIQUE KEY `a_img` (`a_img`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `cart_ibfk_2` (`cus_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_eml` (`customer_eml`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_email` (`cus_email`),
  ADD UNIQUE KEY `cell_no` (`cell_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cu_id` (`cu_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `ordr_id` (`ordr_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cadidfk-1` (`ca_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`p_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cus_email`) REFERENCES `customer` (`cus_email`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cu_id`) REFERENCES `customer` (`cus_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`ordr_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cadidfk-1` FOREIGN KEY (`ca_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
