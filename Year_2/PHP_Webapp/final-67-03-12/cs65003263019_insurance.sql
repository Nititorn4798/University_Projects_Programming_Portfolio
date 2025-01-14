-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 06:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs65003263019_insurance`
--
CREATE DATABASE IF NOT EXISTS `cs65003263019_insurance` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cs65003263019_insurance`;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_data`
--

CREATE TABLE `insurance_data` (
  `insurance_id` int(11) NOT NULL,
  `insurance_owner_name` varchar(100) NOT NULL,
  `insurance_number` varchar(11) NOT NULL,
  `insurance_id_card` varchar(13) NOT NULL,
  `insurance_birthday` date NOT NULL,
  `insurance_address` text NOT NULL,
  `insurance_phone` varchar(10) NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `insurance_limit_am` decimal(10,2) NOT NULL,
  `insurance_annual` decimal(10,2) NOT NULL,
  `insurance_year` int(11) NOT NULL,
  `insurance_payee_name` varchar(50) NOT NULL,
  `insurance_image_path` varchar(100) NOT NULL,
  `status_data` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_data`
--

INSERT INTO `insurance_data` (`insurance_id`, `insurance_owner_name`, `insurance_number`, `insurance_id_card`, `insurance_birthday`, `insurance_address`, `insurance_phone`, `insurance_type`, `insurance_limit_am`, `insurance_annual`, `insurance_year`, `insurance_payee_name`, `insurance_image_path`, `status_data`) VALUES
(1, 'นางสาวนวลปราง แสงอุไร', '80310111253', '3240100322568', '1995-01-01', '422 มหาวิทยาลัยราชภัฎราชนครนรินทร์ ถ.มรุงพงศ์', '0896081212', 'ประกันชีวิต', 750000.00, 22000.00, 10, 'นางสาวสุพรัตรา แดงเจริญ', 'images.jpg', 'ปกติ'),
(3, 'นิติธร นันทสินธ์', '12343328877', '1240613131313', '2004-03-16', 'พนมสารคาม ฉะเชิงเทรา', '0931212121', 'ประกันชีวิต', 12000000.00, 58000.00, 80, 'พ่อ ของฉัน', '17102194309391846810634317620355.jpg', 'ปกติ'),
(4, 'นิติธรสอง นันทสินธ์', '92343328822', '1240613131312', '2004-03-16', 'พนมสารคาม ฉะเชิงเทรา', '0987412580', 'ประกันชีวิต', 1250000.00, 5000.00, 10, 'พ่อ ของฉัน', '17102194956035377955990012564151.jpg', 'ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(512) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_register_date` date NOT NULL,
  `user_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_register_date`, `user_level`) VALUES
(1, '4798', 'bcaf29cf76c157164339236eb7b4a3038d4e0bd039eaa1f5919ab2efb1a23239', 'นิติธร นันทสินธ์', '2024-03-12', 'ผู้ใช้งาน'),
(2, 'nititorn1234', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'นิติธร นันทสินธ์', '2024-03-12', 'ผู้ใช้งาน'),
(3, 'nititorn47', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'นิติธร นันทสินธ์ 1234', '2024-03-12', 'ผู้ใช้งาน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurance_data`
--
ALTER TABLE `insurance_data`
  ADD PRIMARY KEY (`insurance_id`),
  ADD UNIQUE KEY `insurance_number` (`insurance_number`,`insurance_id_card`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance_data`
--
ALTER TABLE `insurance_data`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
