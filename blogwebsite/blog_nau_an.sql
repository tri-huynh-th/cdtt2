-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2025 at 08:12 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_nau_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$gSHjVmYK.AahKUA7j.WHNOqFJJQe9vWgMt5LbzoO3fGTCFTJgRhym');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `post_id`, `name`, `amount`) VALUES
(17, 10, 'Mít', 'Tuỳ thích   '),
(18, 10, 'Dâu tây', 'Tuỳ thích   '),
(19, 10, 'Xoài chín tới', '300g '),
(20, 10, 'Thanh long đỏ ', '200g '),
(21, 10, 'Sữa chua không đường', '2 hộp'),
(22, 10, 'Dưa hấu ', 'Tuỳ thích  '),
(23, 10, 'Sữa tươi không đường ', '100ml (xoài) / 70ml (thanh long)'),
(24, 10, 'Muối hồng ', '1g '),
(25, 10, 'Mật hoa dừa ', ' 60ml (xoài) / 70ml (thanh long)'),
(26, 11, 'Cơm trắng', '2 cup '),
(27, 11, ' Đậu hủ trắng', ' 2 bìa  '),
(28, 11, 'Phô mai bào ', '1 ít (tuỳ loại, tuỳ thích) '),
(29, 12, 'Cá (rô phi, diêu hồng,…)', '1kg (1 con to) '),
(30, 12, 'Giấm ', '10ml    ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(50) DEFAULT 'mon_an_man'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `thumbnail`, `overview`, `created_at`, `category`) VALUES
(10, 'Hướng Dẫn Làm Hoa Quả Dầm Sốt Healthy', '/blogwebsite/uploads/thumbnails/1750017476_Hướng Dẫn Làm Hoa Quả Dầm Sốt Healthy.jpeg', 'Hoa quả dầm sốt healthy là một món ăn nhẹ thanh mát, kết hợp từ nhiều loại trái cây tươi giàu vitamin cùng sốt healthy mịn màng, tự nhiên. Món ăn không chỉ hấp dẫn bởi màu sắc rực rỡ và hương vị hài hòa, mà còn là lựa chọn lý tưởng cho người đang theo đuổi lối sống lành mạnh, giảm cân hoặc ăn uống khoa học. Đây là món tráng miệng hoặc bữa phụ vừa ngon miệng vừa tốt cho hệ tiêu hóa và vóc dáng.', '2025-06-15 19:57:56', 'mon_an_man'),
(11, 'Hướng Dẫn Làm Cơm Taco Okinawa Chay Với Đậu Hủ', '/blogwebsite/uploads/thumbnails/1750017625_Cơm Taco Okinawa Chay Với Đậu Hủ.jpg', 'Một biến tấu thú vị của món taco truyền thống theo phong cách chay, sử dụng đậu hủ làm nhân thay thịt, kết hợp cùng cơm trắng, phô mai, rau củ và sốt salsa tự pha. Món ăn này vừa tươi mát, vừa đậm đà, thích hợp cho bữa trưa thanh nhẹ hoặc bữa tối lành mạnh.', '2025-06-15 20:00:25', 'mon_an_man'),
(12, 'Hướng Dẫn Cá Rán Chấm Mắm Thái', '/blogwebsite/uploads/thumbnails/1750017766_Hướng Dẫn Cá Rán Chấm Mắm Thái.jpeg', 'Cá rán chấm mắm Thái – một món ăn đậm đà, kích thích vị giác với phần nước chấm đỉnh cao chuẩn vị Thái Lan: chua nhẹ, cay nồng, thơm mùi thảo mộc và cực kỳ bắt cơm.', '2025-06-15 20:02:46', 'mon_an_man');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `step_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `post_id`, `description`, `image`, `step_order`) VALUES
(21, 10, 'Cho tất cả nguyên liệu của sốt xoài vào máy xay, xay nhuyễn, sau đó làm tương tự với sốt thanh long; múc khoảng 70-80ml sốt vào ly.', '', 1),
(22, 10, 'Thêm hoa quả đã chuẩn bị và đá hoặc nước theo sở thích.', '', 2),
(23, 10, 'Trộn đều, để tủ lạnh hoặc thưởng thức ngay.', '', 3),
(24, 11, 'Chuẩn bị rau củ\r\nCà rốt bào sợi nhỏ, vắt tắc hoặc chanh vào rồi để riêng. Xà lách cắt sợi mỏng.', '', 1),
(25, 11, 'Làm đậu hủ taco\r\nĐậu hủ bóp nhuyễn, trộn đều với bột taco. Phi thơm hành và tỏi trong dầu olive, cho đậu vào xào. Nêm thêm nước tương tamari, bột nêm, tiêu và một chút nước. Xào đến khi đậu khô ráo, thấm đều gia vị.', '', 2),
(26, 11, ' Pha sốt salsa\r\nTrộn đều các nguyên liệu làm sốt salsa, khuấy kỹ đến khi hoà quyện.', '', 3),
(27, 11, 'Lắp món & thưởng thức\r\nCho cơm nóng ra dĩa, xếp lần lượt: một lớp đậu hủ xào, xà lách, phô mai bào, cà rốt bào, cà chua, thêm một lớp đậu hủ nữa. Rưới sốt salsa lên trên, có thể rắc thêm ớt bột nếu thích ăn cay. Muốn phô mai tan chảy thì quay lò vi sóng 1 phút rồi thưởng thức nóng.', '', 4),
(28, 12, 'Sơ chế, ướp và chiên cá\r\nLàm sạch cá, rửa với giấm và muối. Khứa nhẹ lên thân cá, ướp với tiêu, hạt nêm trong 15–20 phút. Phủ một lớp mỏng bột mì rồi chiên cá trong dầu nóng đến khi vàng giòn hai mặt. Vớt ra để ráo dầu.', '', 1),
(29, 12, 'Pha nước sốt mắm Thái\r\nGiã nhuyễn rễ mùi, ớt, tiêu xanh, hành tím, muối và muối Hảo Hảo. Trộn hỗn hợp với nước mắm, nước cốt chanh và đường thốt nốt. Khuấy tan hoàn toàn rồi thêm lá chanh thái chỉ vào sau cùng.', '', 2),
(30, 12, 'Trình bày và thưởng thức\r\nRưới đều nước sốt mắm Thái lên cá vừa chiên hoặc chấm tùy khẩu vị. Dùng nóng với cơm trắng hoặc ăn kèm rau sống để tăng thêm hương vị.', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
