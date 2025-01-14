-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_cs65003263019_eatery`
--
CREATE DATABASE IF NOT EXISTS `project_cs65003263019_eatery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_cs65003263019_eatery`;

-- --------------------------------------------------------

--
-- Table structure for table `e_eatery`
--

CREATE TABLE `e_eatery` (
  `e_eatery_id` int(3) NOT NULL,
  `e_eatery_name` varchar(256) NOT NULL,
  `e_eatery_address` varchar(256) NOT NULL,
  `e_eatery_phone` varchar(10) NOT NULL,
  `e_eatery_status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_eatery`
--

INSERT INTO `e_eatery` (`e_eatery_id`, `e_eatery_name`, `e_eatery_address`, `e_eatery_phone`, `e_eatery_status`) VALUES
(1, 'คุณธร (นิติธร) โภชนาแปดริ้ว', 'ถนน 442 3/4 ถนนมรุพงษ์ ตำบลหน้าเมือง อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา', '0936850200', 'เปิดให้บริการ'),
(2, 'คาเฟ่ยอดนักสืบจิ๋วโคนัน', 'กรุงเทพมหานคร ', '0936850001', 'เปิดให้บริการ');

-- --------------------------------------------------------

--
-- Table structure for table `e_eatery_member`
--

CREATE TABLE `e_eatery_member` (
  `e_eatery_member_id` int(4) NOT NULL,
  `e_eatery_member_username` varchar(256) NOT NULL,
  `e_eatery_member_password` varchar(512) NOT NULL,
  `e_eatery_member_fullname` varchar(256) NOT NULL,
  `e_eatery_member_type` varchar(256) NOT NULL,
  `e_eatery_member_status` varchar(256) NOT NULL,
  `e_eatery_member_image_path` varchar(256) NOT NULL,
  `e_eatery_member_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_eatery_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_eatery_member`
--

INSERT INTO `e_eatery_member` (`e_eatery_member_id`, `e_eatery_member_username`, `e_eatery_member_password`, `e_eatery_member_fullname`, `e_eatery_member_type`, `e_eatery_member_status`, `e_eatery_member_image_path`, `e_eatery_member_date`, `fk_eatery_id`) VALUES
(1, 'admin', 'bcaf29cf76c157164339236eb7b4a3038d4e0bd039eaa1f5919ab2efb1a23239', 'แอดมิน', 'ADMIN', 'ปกติ', 'conan.png', '2024-03-27 14:40:48', 1),
(2, 'nititorn4798', 'bcaf29cf76c157164339236eb7b4a3038d4e0bd039eaa1f5919ab2efb1a23239', 'นิติธร นันทสินธ์', 'ลูกค้าปกติ', 'ปกติ', '17102194956035377955990012564151.jpg', '2024-03-27 14:40:58', 1),
(3, 'table!', 'BY!!65003263019!!', 'ว่าง', 'ระบบ', 'ปิด', '-', '2024-03-27 14:41:21', 1),
(4, 'user', 'bcaf29cf76c157164339236eb7b4a3038d4e0bd039eaa1f5919ab2efb1a23239', 'เอโดงาวะ โคนัน', 'ลูกค้าปกติ', 'ปกติ', 'conan.png', '2024-03-27 15:28:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_menu`
--

CREATE TABLE `e_menu` (
  `e_menu_id` int(4) NOT NULL,
  `e_menu_name` varchar(256) NOT NULL,
  `e_menu_price` varchar(256) NOT NULL,
  `e_menu_remain_amount` int(6) NOT NULL,
  `e_menu_ingredient` text NOT NULL,
  `e_menu_status` varchar(256) NOT NULL,
  `e_menu_image_path` varchar(256) NOT NULL,
  `fk_menu_category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_menu`
--

INSERT INTO `e_menu` (`e_menu_id`, `e_menu_name`, `e_menu_price`, `e_menu_remain_amount`, `e_menu_ingredient`, `e_menu_status`, `e_menu_image_path`, `fk_menu_category_id`) VALUES
(1, 'ต้มยำกุ้งแม่น้ำ', '150', 10, 'กุ้งแม่น้ำ', 'ปกติ', 'sa-mun-pai-4_0.jpg', 1),
(2, 'ไก่ผัดเม็ดมะม่วงหิมพานต์', '100', 20, 'ไก่ เม็ดมะม่วงหิมพานต์', 'ปกติ', '7Special-Cashew-Chicken.jpg', 2),
(3, 'กุ้งแม่น้ำย่าง (ตัวเดียว XL)', '120', 5, 'กุ้งแม่น้ำ', 'ปกติ', 'prawn_burn1.jpg', 3),
(4, 'ปลากระพงทอดน้ำปลา', '250', 30, 'ปลากระพง', 'ปกติ', 'No-Image-Placeholder.svg', 4),
(5, 'บิงซูมะม่วง', '30', 15, 'มะม่วง', 'ปกติ', 'Bingsu-mango.jpg', 5),
(6, 'ต้มแซ่บกระดูกหมู', '180', 9, 'กระดูกหมู', 'ปกติ', '2082317182.jpg', 1),
(7, 'ไก่ย่าง', '80', 50, 'ไก่', 'ปกติ', 'kaiwalk.jpg', 3),
(8, 'กะเพราหมูกรอบ', '90', 19, 'หมู', 'ปกติ', 'kaprawmukob.jpg', 2),
(9, 'ข้าวสวย', '20', 30, 'ข้าวหอมมะลิแท้ 100% คัดสรรพิเศษและควบอุณหภูมิความชื้นให้เหมาะสม ข้าวเรียวยาว ขาวใส เป็นเงา นุ่ม มีกลิ่นหอมอร่อย', 'ปกติ', 'Steamed-Rice.jpg', 6),
(10, 'ข้าวเหนียว', '20', 10, 'ข้าวเหนียวพันธุ์เขี้ยวงูข้าว', 'ปกติ', 'image_164440021486028698619d06428t0f3fb546.jpg', 6),
(11, 'ข้าวไรซ์เบอร์รี่', '30', 5, 'มีประสิทธิภาพในการต้านอนุมูลอิสระสูง มีดัชนีน้ำตาลต่ำ จึงสามารถลดอัตราความเสี่ยงจากการเป็นโรคเบาหวานได้ เมื่อหุงแล้วจะมีกลิ่นหอม เนื้อหนึบคล้ายข้าวเหนียวดำ', 'ปกติ', 'rice-berry.jpg', 6),
(12, 'วาฟเฟิลโคนัน', '189', 50, 'วัตถุดิบลึกลับ', 'ปกติ', 'cafeconankidhat.jpg', 7),
(13, 'แซนวิชโคนัน', '80', 56, 'ขนมปังจากเจปัง', 'ปกติ', 'conancafe2019_menu03_fixw_640_hq.jpg', 7),
(14, 'กาแฟชินอิจิ', '48.69', 99, 'เมล็ดกาแฟคัดพิเศษ', 'ปกติ', 'coff.jpg', 8),
(15, 'กาแฟโคนัน ที่น่าสงสัย', '169', 10, 'เมล็ดกาแฟคัดพิเศษ เกรด A จากดอยช้างดาว ผสมกลิ่นอัลมอนด์ (กลิ่นไซยาไนด์)', 'ปกติ', 'ddf5ed50b6209f662b0ef8426b7587741532052988_full.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `e_menu_category`
--

CREATE TABLE `e_menu_category` (
  `e_menu_category_id` int(3) NOT NULL,
  `e_menu_category_name` varchar(256) NOT NULL,
  `e_menu_category_type` varchar(256) NOT NULL,
  `e_menu_category_status` varchar(256) NOT NULL,
  `e_menu_category_image_path` varchar(256) NOT NULL,
  `fk_eatery_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_menu_category`
--

INSERT INTO `e_menu_category` (`e_menu_category_id`, `e_menu_category_name`, `e_menu_category_type`, `e_menu_category_status`, `e_menu_category_image_path`, `fk_eatery_id`) VALUES
(1, 'ต้ม', 'อาหารคาว', 'ปกติ', '2082317182.jpg', 1),
(2, 'ผัด', 'อาหารคาว', 'ปกติ', 'kaprawmukob.jpg', 1),
(3, 'ย่าง', 'อาหารคาว', 'ปกติ', 'prawn1.jpg', 1),
(4, 'ทอด', 'อาหารคาว', 'ปกติ', 'parkapong.jpg', 1),
(5, 'บิงซู', 'อาหารหวาน', 'ปกติ', 'Bingsu-strawberry.jpg', 1),
(6, 'ข้าว', 'อาหารคาว', 'ปกติ', 'Steamed-Rice.jpg', 1),
(7, 'ขนมหวาน', 'อาหารหวาน', 'ปกติ', 'cafeconankidhat.jpg', 2),
(8, 'เครื่องดื่ม', 'เครื่องดื่ม', 'ปกติ', 'coff.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `e_receipt`
--

CREATE TABLE `e_receipt` (
  `e_receipt_id` int(5) NOT NULL,
  `e_receipt_paid` decimal(8,2) NOT NULL,
  `e_receipt_paid_by_userid` int(4) NOT NULL,
  `e_receipt_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `e_receipt_status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_receipt`
--

INSERT INTO `e_receipt` (`e_receipt_id`, `e_receipt_paid`, `e_receipt_paid_by_userid`, `e_receipt_date`, `e_receipt_status`) VALUES
(1, 1050.00, 2, '2024-03-27 14:58:48', 'จ่ายเงินเสร็จสิ้น'),
(2, 2530.00, 2, '2024-03-27 15:23:25', 'จ่ายเงินเสร็จสิ้น'),
(3, 836.00, 4, '2024-03-27 15:39:19', 'จ่ายเงินเสร็จสิ้น'),
(4, 269.00, 4, '2024-03-27 15:39:36', 'จ่ายเงินเสร็จสิ้น'),
(5, 189.00, 4, '2024-03-27 15:39:50', 'จ่ายเงินเสร็จสิ้น'),
(6, 48.69, 4, '2024-03-27 15:42:10', 'จ่ายเงินเสร็จสิ้น'),
(7, 486.69, 4, '2024-03-27 15:47:21', 'จ่ายเงินเสร็จสิ้น');

-- --------------------------------------------------------

--
-- Table structure for table `e_table`
--

CREATE TABLE `e_table` (
  `e_table_id` int(3) NOT NULL,
  `e_table_address` varchar(256) NOT NULL,
  `e_table_description` varchar(256) NOT NULL,
  `e_table_type` varchar(256) NOT NULL,
  `e_table_status` varchar(256) NOT NULL,
  `e_table_image_path` varchar(256) NOT NULL,
  `fk_eatery_id` int(3) NOT NULL,
  `fk_eatery_member_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_table`
--

INSERT INTO `e_table` (`e_table_id`, `e_table_address`, `e_table_description`, `e_table_type`, `e_table_status`, `e_table_image_path`, `fk_eatery_id`, `fk_eatery_member_id`) VALUES
(1, 'โต๊ะที่ 1', 'โต๊ะไม้หน้าร้าน', '4 ที่นั่ง', 'ปกติ', '4tables.jpg', 1, 3),
(2, 'โต๊ะที่ 2', 'โต๊ะสุดพรีเมี่ยม', '8 ที่นั่ง', 'ปกติ', '8tables.jpg', 1, 3),
(3, 'โต๊ะที่ 3', 'โต๊ะพร้อมเก้าอี้เบาะหนังในร้าน', '4 ที่นั่ง', 'ปกติ', '4tabless.jpg', 1, 3),
(4, 'โต๊ะที่ 4', 'โต๊ะภายในร้าน', '2 ที่นั่ง', 'ปกติ', '2tables.jpg', 1, 3),
(5, 'โต๊ะที่ 5', 'โต๊ะไม้สุดสวย', '8 ที่นั่ง', 'ปกติ', '8tablesss.jpg', 1, 3),
(6, 'โต๊ะที่น่าสงสัย', 'โต๊ะที่น่าสงสัยว่าเคยมีคน...', '4 ที่นั่ง', 'ปกติ', 'DJ-F159.jpg', 2, 3),
(7, 'โต๊ะที่ต้องสงสัย', 'โต๊ะที่ต้องสงสัย', '2 ที่นั่ง', 'ปกติ', '2tableew.png', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `e_table_order`
--

CREATE TABLE `e_table_order` (
  `tableorder_id` int(6) NOT NULL,
  `tableorder_table_id` int(3) NOT NULL,
  `tableorder_menu_id` int(4) NOT NULL,
  `tableorder_menu_amount` int(6) NOT NULL,
  `tableorder_orderstatus` varchar(256) NOT NULL,
  `tableorder_expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_table_order`
--

INSERT INTO `e_table_order` (`tableorder_id`, `tableorder_table_id`, `tableorder_menu_id`, `tableorder_menu_amount`, `tableorder_orderstatus`, `tableorder_expire`) VALUES
(1, 1, 1, 1, 'คิดเงินสำเร็จ', '2024-03-28 00:58:17'),
(2, 1, 1, 1, 'คิดเงินสำเร็จ', '2024-03-28 00:58:25'),
(3, 1, 1, 5, 'คิดเงินสำเร็จ', '2024-03-28 00:58:35'),
(4, 2, 6, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:14:31'),
(5, 2, 1, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:14:37'),
(6, 2, 2, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:14:47'),
(7, 2, 3, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:14:57'),
(8, 2, 7, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:15:01'),
(9, 2, 8, 19, 'คิดเงินสำเร็จ', '2024-03-28 01:16:09'),
(10, 2, 9, 3, 'คิดเงินสำเร็จ', '2024-03-28 01:22:45'),
(11, 2, 11, 3, 'คิดเงินสำเร็จ', '2024-03-28 01:22:53'),
(12, 2, 10, 2, 'คิดเงินสำเร็จ', '2024-03-28 01:22:58'),
(13, 6, 12, 4, 'คิดเงินสำเร็จ', '2024-03-28 01:39:03'),
(14, 6, 13, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:39:06'),
(15, 7, 12, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:39:28'),
(16, 7, 13, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:39:32'),
(17, 7, 12, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:39:45'),
(18, 6, 14, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:41:50'),
(19, 7, 15, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:45:52'),
(20, 7, 14, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:45:56'),
(21, 7, 12, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:46:06'),
(22, 7, 13, 1, 'คิดเงินสำเร็จ', '2024-03-28 01:46:09'),
(23, 6, 14, 1, 'ยกเลิกแล้ว', '2024-03-28 01:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_eatery`
--
ALTER TABLE `e_eatery`
  ADD PRIMARY KEY (`e_eatery_id`);

--
-- Indexes for table `e_eatery_member`
--
ALTER TABLE `e_eatery_member`
  ADD PRIMARY KEY (`e_eatery_member_id`),
  ADD KEY `fk_eatery_id` (`fk_eatery_id`);

--
-- Indexes for table `e_menu`
--
ALTER TABLE `e_menu`
  ADD PRIMARY KEY (`e_menu_id`),
  ADD KEY `fk_menu_category_id` (`fk_menu_category_id`);

--
-- Indexes for table `e_menu_category`
--
ALTER TABLE `e_menu_category`
  ADD PRIMARY KEY (`e_menu_category_id`),
  ADD KEY `fk_eatery_id` (`fk_eatery_id`);

--
-- Indexes for table `e_receipt`
--
ALTER TABLE `e_receipt`
  ADD PRIMARY KEY (`e_receipt_id`),
  ADD KEY `e_receipt_paid_by_userid` (`e_receipt_paid_by_userid`);

--
-- Indexes for table `e_table`
--
ALTER TABLE `e_table`
  ADD PRIMARY KEY (`e_table_id`),
  ADD KEY `fk_eatery_id` (`fk_eatery_id`),
  ADD KEY `fk_eatery_member_id` (`fk_eatery_member_id`);

--
-- Indexes for table `e_table_order`
--
ALTER TABLE `e_table_order`
  ADD PRIMARY KEY (`tableorder_id`),
  ADD KEY `tableorder_table_id` (`tableorder_table_id`),
  ADD KEY `tableorder_menu_id` (`tableorder_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_eatery`
--
ALTER TABLE `e_eatery`
  MODIFY `e_eatery_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_eatery_member`
--
ALTER TABLE `e_eatery_member`
  MODIFY `e_eatery_member_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `e_menu`
--
ALTER TABLE `e_menu`
  MODIFY `e_menu_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `e_menu_category`
--
ALTER TABLE `e_menu_category`
  MODIFY `e_menu_category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `e_receipt`
--
ALTER TABLE `e_receipt`
  MODIFY `e_receipt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_table`
--
ALTER TABLE `e_table`
  MODIFY `e_table_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_table_order`
--
ALTER TABLE `e_table_order`
  MODIFY `tableorder_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `e_eatery_member`
--
ALTER TABLE `e_eatery_member`
  ADD CONSTRAINT `e_eatery_member_ibfk_1` FOREIGN KEY (`fk_eatery_id`) REFERENCES `e_eatery` (`e_eatery_id`);

--
-- Constraints for table `e_menu`
--
ALTER TABLE `e_menu`
  ADD CONSTRAINT `e_menu_ibfk_1` FOREIGN KEY (`fk_menu_category_id`) REFERENCES `e_menu_category` (`e_menu_category_id`);

--
-- Constraints for table `e_menu_category`
--
ALTER TABLE `e_menu_category`
  ADD CONSTRAINT `e_menu_category_ibfk_1` FOREIGN KEY (`fk_eatery_id`) REFERENCES `e_eatery` (`e_eatery_id`);

--
-- Constraints for table `e_receipt`
--
ALTER TABLE `e_receipt`
  ADD CONSTRAINT `e_receipt_ibfk_1` FOREIGN KEY (`e_receipt_paid_by_userid`) REFERENCES `e_eatery_member` (`e_eatery_member_id`);

--
-- Constraints for table `e_table`
--
ALTER TABLE `e_table`
  ADD CONSTRAINT `e_table_ibfk_1` FOREIGN KEY (`fk_eatery_id`) REFERENCES `e_eatery` (`e_eatery_id`),
  ADD CONSTRAINT `e_table_ibfk_2` FOREIGN KEY (`fk_eatery_member_id`) REFERENCES `e_eatery_member` (`e_eatery_member_id`);

--
-- Constraints for table `e_table_order`
--
ALTER TABLE `e_table_order`
  ADD CONSTRAINT `e_table_order_ibfk_1` FOREIGN KEY (`tableorder_table_id`) REFERENCES `e_table` (`e_table_id`),
  ADD CONSTRAINT `e_table_order_ibfk_2` FOREIGN KEY (`tableorder_menu_id`) REFERENCES `e_menu` (`e_menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
