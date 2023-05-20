-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 08:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_kytuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `method_payment` tinyint(2) DEFAULT NULL COMMENT '0: tiền mặt\r\n1: chuyển khoản',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: Chưa Thanh toán\r\n1: Đã thanh toán',
  `liquidation` date DEFAULT NULL COMMENT 'null là chưa thanh lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `student_id`, `room_id`, `user_id`, `date_start`, `date_end`, `method_payment`, `status`, `liquidation`) VALUES
(17, 'CNB20DCCN421', 18, 40, '2023-05-14', '2023-05-16', 0, 1, '2023-05-14'),
(19, 'CNB20DCCN421', 18, 40, '2023-05-03', '2023-05-13', 0, 1, NULL),
(21, 'CNB20DCCN422', 18, 40, '2023-05-03', '2023-05-25', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electric_water`
--

CREATE TABLE `electric_water` (
  `id` int(11) NOT NULL,
  `e_first` int(11) NOT NULL,
  `e_last` int(11) NOT NULL,
  `price_per_e` int(11) NOT NULL,
  `w_first` int(11) NOT NULL,
  `w_last` int(11) NOT NULL,
  `price_per_w` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment` tinyint(2) DEFAULT NULL COMMENT '1: tiền mặt \r\n0: chuyển khoản',
  `status` tinyint(1) NOT NULL COMMENT '0: Chưa thanh toán\r\n1: Đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoices_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0: đạng thường\r\n1: khần cấp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_id` varchar(250) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL COMMENT '0: đã gửi\r\n1: đang xử lý\r\n2: đã xử lý '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `max_num` tinyint(2) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'người quản lý',
  `status` tinyint(2) DEFAULT NULL COMMENT '1: hoạt động\r\n0: bảo trì',
  `area` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: khu dành cho nam\r\n1: dành cho nữ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `price`, `max_num`, `user_id`, `status`, `area`) VALUES
(18, '102-B1', 123, 12, 40, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describe` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0: đóng\r\n1: Hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL COMMENT 'Nếu là tài khoản cho sinh viên thì username sẽ là mã sinh viên',
  `password` varchar(250) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT NULL COMMENT '0:nam 1:nu',
  `date_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar_url` text DEFAULT '\'avatar-default.png\'',
  `role` int(11) DEFAULT 1 COMMENT '0: Admin\r\n1: Sinh viên',
  `status` tinyint(2) DEFAULT 1 COMMENT '0: khóa\r\n1: Mở',
  `color_scheme` tinyint(2) DEFAULT 0 COMMENT '0: nền trắng\r\n1: nền đen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `sex`, `date_birth`, `address`, `email`, `phone`, `avatar_url`, `role`, `status`, `color_scheme`) VALUES
(40, 'admin', '202cb962ac59075b964b07152d234b70', 'Lương Văn Hòa ', 0, '2022-11-27', 'Tân Thành - Kiên Thành', 'hoa@gmail.com', '09999999999', 'avatar-default.png', 0, 1, 0),
(73, 'CNB20DCCN421', '009c4e472f8b0e24fb689db4ae121696', 'Luong Hoa', 0, '2023-05-02', '123', 'luonghoa121002@gmail.com', '0351743443', 'avatar-default.png', 1, 1, 0),
(75, 'CNB20DCCN422', '009c4e472f8b0e24fb689db4ae121696', 'mavuvong', 0, '0000-00-00', '', '123@gmail.com', '0357143496', 'avatar-default.png', 1, 1, 0),
(79, 'B20DCCN422', 'c39728699104fc25c8f245804a8dde01', 'Luong Hoa', 0, '0000-00-00', '123', 'luonghoa121002@gmail.com', '0351743443', 'avatar-default.png', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s` (`room_id`),
  ADD KEY `fk_sa` (`user_id`),
  ADD KEY `fk_saa` (`student_id`);

--
-- Indexes for table `electric_water`
--
ALTER TABLE `electric_water`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ew_roms` (`rooms_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id` (`invoices_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_ibfk_1` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`),
  ADD KEY `fk_room_user` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_roleUser` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `electric_water`
--
ALTER TABLE `electric_water`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noti`
--
ALTER TABLE `noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sa` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electric_water`
--
ALTER TABLE `electric_water`
  ADD CONSTRAINT `fk_ew_roms` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_room_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `check_date_end_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-05-13 10:48:01' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `contracts` SET `liquidation` = date_end WHERE date_end < CURDATE() AND liquidation IS NULL$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
