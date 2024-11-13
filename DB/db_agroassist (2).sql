-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 07:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agroassist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'Sredha S', 'ssredha97@gmail.com', 'Sredha@123'),
(4, 'Raihana Siraj', 'raihana@gmail.com', 'Raihana@123'),
(6, 'Fathima K P', 'fathima@gmail.com', 'Fathima@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `adv_id` int(11) NOT NULL,
  `adv_date` varchar(60) NOT NULL,
  `adv_discription` varchar(250) NOT NULL,
  `adv_status` int(11) NOT NULL DEFAULT 0,
  `supplier_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `adv_photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`adv_id`, `adv_date`, `adv_discription`, `adv_status`, `supplier_id`, `farmer_id`, `adv_photo`) VALUES
(7, '', 'photo', 1, 0, 3, 'crop3.jpg'),
(9, '', 'corn', 1, 0, 2, 'crop1.jpg'),
(10, '', 'flowers', 1, 3, 3, 'crop4.jpg'),
(11, '', 'good products needed', 0, 3, 0, 'image8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_amount` varchar(60) NOT NULL,
  `booking_date` varchar(60) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_amount`, `booking_date`, `supplier_id`, `booking_status`) VALUES
(9, '50.00', '2024-09-28', 3, 1),
(10, '50.00', '2024-09-28', 3, 1),
(11, '50.00', '2024-09-28', 3, 1),
(12, '50.00', '2024-09-28', 3, 1),
(13, '50.00', '2024-09-28', 3, 1),
(14, '50.00', '2024-09-28', 3, 2),
(15, '50.00', '2024-10-08', 6, 1),
(16, '50.00', '2024-10-08', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `cart_status`, `product_id`, `booking_id`) VALUES
(13, 1, 1, 11, 9),
(14, 1, 1, 10, 10),
(15, 1, 1, 12, 11),
(16, 1, 1, 14, 12),
(17, 1, 1, 12, 13),
(18, 1, 1, 14, 13),
(19, 1, 1, 15, 13),
(20, 1, 1, 15, 14),
(21, 1, 1, 15, 15),
(22, 1, 1, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Fruits'),
(7, 'Vegetables'),
(8, 'Flowers'),
(9, 'Nuts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(60) NOT NULL,
  `complaint_content` varchar(250) NOT NULL,
  `complaint_date` varchar(60) NOT NULL,
  `complaint_reply` varchar(250) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `product_id`, `supplier_id`, `farmer_id`) VALUES
(7, 'my complaint', 'product is not good', '2024-09-19', '', 0, 14, 3, 0),
(12, 'my complaint', 'my site is not working properly', '2024-09-20', '', 0, 0, 0, 2),
(13, 'my complaint', 'my site is not working properly', '2024-09-20', '', 0, 0, 0, 2),
(14, 'my complaint', 'my site has errors', '2024-09-20', '', 0, 0, 0, 2),
(15, 'my complaint', 'my site has errors', '2024-09-20', '', 0, 0, 0, 2),
(16, 'my complaint', 'your product is damaged', '2024-09-20', '', 0, 0, 3, 0),
(17, 'my complaint', 'product is not good', '2024-10-04', '', 0, 0, 3, 0),
(18, 'my complaint', 'site is not working', '2024-10-04', 'okeyy i will check', 1, 0, 0, 3),
(19, 'my complaint', 'Product is not good', '2024-10-05', '', 0, 0, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(9, 'Ernakulam'),
(10, 'Kottayam'),
(11, 'Thrissur'),
(12, 'Idukki'),
(13, 'Malappuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer`
--

CREATE TABLE `tbl_farmer` (
  `farmer_id` int(11) NOT NULL,
  `farmer_name` varchar(60) NOT NULL,
  `farmer_contact` varchar(60) NOT NULL,
  `farmer_email` varchar(60) NOT NULL,
  `farmer_address` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `farmer_photo` varchar(250) NOT NULL,
  `farmer_proof` varchar(250) NOT NULL,
  `farmer_status` int(11) NOT NULL DEFAULT 0,
  `farmer_password` varchar(60) NOT NULL,
  `farmer_squestion` varchar(200) NOT NULL,
  `farmer_answer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_farmer`
--

INSERT INTO `tbl_farmer` (`farmer_id`, `farmer_name`, `farmer_contact`, `farmer_email`, `farmer_address`, `place_id`, `farmer_photo`, `farmer_proof`, `farmer_status`, `farmer_password`, `farmer_squestion`, `farmer_answer`) VALUES
(3, 'Ashiq Navas', '8921148226', 'ashiq02@gmail.com', 'Marottickal(H)Chilavu(P.O) Thodupuzha', 13, 'IMG_1578.JPG', 'IMG_1578.JPG', 2, 'Ashiq@123', '', ''),
(4, 'Ajo Thomas', '9465768685', 'ajo@gmail.com', 'Kottayam', 10, 'IMG-20240704-WA0073.jpg', 'IMG-20240704-WA0073.jpg', 1, 'AjoThomas@123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(250) NOT NULL,
  `feedback_date` varchar(60) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `supplier_id`, `farmer_id`) VALUES
(2, 'quality is good', '', 0, 1),
(3, 'product quality is maintained', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(9, 'Thodupuzha', 8),
(10, 'Erattupetta', 10),
(11, 'Muvattupuzha', 9),
(12, 'Chalakudy', 11),
(13, 'Thodupuzha', 12),
(14, 'Perunthalmanna', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_photo` varchar(250) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `product_price` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_photo`, `product_description`, `farmer_id`, `product_price`, `category_id`) VALUES
(12, 'Marigold', 'crop4.jpg', 'used for decoration', 2, '130', 8),
(13, 'Maize', 'crop1.jpg', 'Good for Health', 2, '100', 6),
(14, 'corn', 'crop3.jpg', 'Good', 2, '100', 7),
(15, 'Grapes', 'crop3.jpg', 'Good for health', 3, '50', 6),
(16, 'Marigold', 'crop4.jpg', 'used for decoration', 3, '200', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_count`, `product_id`) VALUES
(10, 3, 0),
(11, 2, 11),
(12, 3, 10),
(13, 2, 10),
(14, 4, 12),
(15, 2, 12),
(16, 2, 14),
(17, 4, 15),
(18, 2, 15),
(19, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(3, 'Pome Fruits', 0),
(4, 'Pome Fruits', 6),
(5, 'Tropical Fruits', 6),
(6, 'Root', 7),
(8, 'Leafy', 7),
(9, 'Aquatic Flowers', 8),
(10, 'Non Aquatic Flowers', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(60) NOT NULL,
  `supplier_contact` varchar(60) NOT NULL,
  `supplier_email` varchar(60) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `supplier_photo` varchar(250) NOT NULL,
  `supplier_proof` varchar(250) NOT NULL,
  `supplier_status` int(11) NOT NULL DEFAULT 0,
  `supplier_password` varchar(60) NOT NULL,
  `supplier_squestion` varchar(200) NOT NULL,
  `supplier_answer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_email`, `supplier_address`, `place_id`, `supplier_photo`, `supplier_proof`, `supplier_status`, `supplier_password`, `supplier_squestion`, `supplier_answer`) VALUES
(2, 'Indraja ', '9432567814', 'indraja123@gmail.com', 'Ottamackal(H),Thodupuzha', 7, 'image8.jpg', 'image4.jpg', 0, 'Indraja@986', '', ''),
(5, 'Sreehari ', '8765432987', 'sreehari@gmail.com', 'Thottathil(H)Erattupetta', 10, 'IMG_1578.JPG', 'IMG_1578.JPG', 1, 'Sreehari@123', '', ''),
(6, 'Abin Eldhose', '9886543289', 'abin34@gmail.com', 'Ilavumkal(H),Muvattupuzha\r\n', 13, 'IMG_1614.JPG', 'IMG_1614.JPG', 1, 'Abin@123', '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_address` varchar(60) NOT NULL,
  `user_contact` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(250) NOT NULL,
  `user_gender` varchar(60) NOT NULL,
  `user_dob` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_address`, `user_contact`, `user_email`, `place_id`, `user_photo`, `user_gender`, `user_dob`, `user_password`, `user_status`) VALUES
(1, 'Abin', 'areeckal(H)\r\nmelukavu p.o', '8876543256', 'abin34@gmail.com', 5, 'image7.jpg', 'Female', '2004-05-03', 'abin123', 2),
(2, 'salman', 'maruthunkal(H)\r\nthodupuzha', '9875436212', 'salman43@gmail.com', 6, 'image2.jpg', 'Female', '2004-08-01', 'salman00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `adv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
