-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20231025.98b7f38d22
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 08:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'ccbd', '0d89ec971a7bcfe26d68c177a9d53334', 'admin@gmail.com', '', '2023-02-22 07:18:13'),
(3, 'longhoang', '123456', '', '', '2023-08-20 03:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(11) NOT NULL,
  `rs_id` int(11) NOT NULL,
  `title` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slogan` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(25, 13, 'Combo Sườn Cây Đặc Biệt', 'Sườn Cây, Bì, Chả, Canh Rong Biển, Trứng Ốp La Ông Mặt Trời ☀️ (Limitted Offer)', 99000.00, '653a9c0c78286.jpeg'),
(26, 13, 'Combo Sườn Cốt Lết Đặc Biệt', 'Sườn Cốt Lết, Bì, Chả, Canh Rong Biển, Trứng Ốp La Ông Mặt Trời ☀️ (Limitted Offer)', 89000.00, '653a9c594a34f.jpeg'),
(27, 13, 'Cơm Tấm Bì, Chả', 'Bì Thịt Chiên + Chả Vàng Ươm', 39000.00, '653a9c7c40675.jpeg'),
(28, 13, 'Cơm Tấm Trứng Ốp La', '2 Trứng Chiên Ông Mặt Trời ☀️☀️', 25000.00, '653a9c990f381.jpeg'),
(29, 14, 'Bánh mì thịt đặc biệt', 'Bánh mì thịt đặc biệt hay còn gọi BÁNH MÌ THỊT ĐẶC BIỆT, là một trong những đặc sản của tiệm. Sản phẩm gồm thịt, bơ, chả, pate nóng. Đặc biệt, rau dưa sẽ được để riêng nên các khách hàng dễ dàng order, không sợ nhầm lẫn đơ', 67000.00, '653a9cb573301.webp'),
(30, 14, 'Burger BigWin', 'Vỏ bánh nóng hổi, mè phủ tràn ngập Nhân ngập tràn, cắn phát là ngập răng với Pate, dăm bông, chả lụa, giò thủ, chả bò, da bao, dưa, rau, đồ chua,…', 65000.00, '653a9e10a5597.webp'),
(31, 14, 'Bánh mì lớn', 'Ngoài vỏ bánh giòn rụm, điều làm nên nét đặc biệt của Bánh mì Bà Huynh chính là “Pate nóng – Bơ Thơm – Chả ít mỡ – Thịt nhiều”', 52000.00, '653a9e3df386e.webp'),
(32, 15, 'CRAWFISH (TÔM HÙM ĐẤT)', 'Crawfish tuy không có thớ thịt lớn như các loại tôm khác nhưng thịt tôm hùm đất được cho là chắc, dai và có vị béo ngọt, độ đạm cao đặc biệt là phần đầu tôm có gạch.', 72000.00, '653a9e65af215.webp'),
(33, 15, 'COMBO BIG STAR', 'Combo bán chạy nhất tại Lobster Bay với 4 loại hải sản nhập khẩu ngon, thịt ngọt, và giàu giá trị dinh dưỡng kết hợp cùng các loại sốt đủ vị thơm béo, cay hoặc không cay tôn lên hương vị hải sản. Thoải mái cho 2-3 người dù', 1399000.00, '653a9e91b7103.png'),
(34, 15, 'BÀO NGƯ SỐT 6 VỊ', 'Bào Ngư là món ăn ngon bổ dưỡng rất tốt cho sức khỏe từ trẻ nhỏ, nam, nữ đến người lớn tuổi. Trong bào ngư có nhiều vi chất dinh dưỡng giúp tăng cường đề kháng của cơ thể, bổ sung các vi chất cần thiết cho nuôi dưỡng cơ th', 115000.00, '653a9ecba1c44.webp'),
(35, 20, 'COMBO BÁNH MÌ NƯỚNG MẬT ONG + DỒI SỤN NƯỚNG', 'DỒI SỤN GIÒN SẦN SẬT ĂN CÙNG BÁNH MÌ NƯỚNG BƠ MẬT ONG THƠM NGON VÔ CÙNG', 12000.00, '653a9f330342e.jpeg'),
(36, 20, 'CÁNH GÀ NƯỚNG', 'CÁNH GÀ NƯỚNG ĂN CÙNG NƯỚC CHẤM RIÊNG CỦA QUÁN', 23800.00, '653a9f507a75b.jpeg'),
(37, 20, 'THỊT XIÊN NƯỚNG - 1C', 'THỊT XIÊN NƯỚNG ĂN KÈM VỚI NƯỚC CHẤM TANKA', 13800.00, '653a9f736cf0b.jpeg'),
(38, 19, 'Lẩu ếch', 'Lẩu ếch là món ăn phổ biến từ ếch, được nhiều người ưa chuộng bởi hương vị ngọt thơm của thịt ếch, hương lá lốt thơm nồng, vị cay của sa tế, vị chua của măng và vị đậm đà của nước dùng', 299000.00, '653aa0b54f948.jpg'),
(39, 19, 'Ếch rang muối', 'Ếch rang muối là món nhậu ngon đem lại trải nghiệm tuyệt vời với thực khách.', 279000.00, '653aa0e6e8bf2.jpg'),
(40, 18, 'Phở tái gầu', 'Phở tái gầu là sự kết hợp tuyệt mỹ giữa nét thanh tao, ⭐trong vắt của nước dùng và chất béo thơm ngậy của miếng gầu bò tươi rói.', 55000.00, '653aa10cd2664.jpg'),
(41, 18, 'Phở gà', 'Phở gà lại quyến rũ người ăn từ mùi thơm của hành hoa cùng rau mùi và lá chanh bánh tẻ', 45000.00, '653aa1408507b.jpeg'),
(42, 18, 'Phở Thịt Trần', 'Phở thịt trần là một món ăn truyền thống nổi tiếng của Việt Nam, đặc biệt phổ biến trong bữa sáng và bữa tối', 60000.00, '653aa16c651c2.jpg'),
(43, 16, 'Combo Dứa Sơ Ri HD', '02 Nước Ép Dứa Sơ Ri + 03 miếng Gà rán + 5 Gà miếng Nuggets', 199000.00, '653aa1aa9a0a9.jpeg'),
(44, 16, 'Hot Wings (3 Miếng)', '3 miếng cánh gà chặt khúc (cay)', 83000.00, '653aa1d3bda07.jpeg'),
(45, 16, 'Mì Ý Xốt Cà Xúc Xích Gà Zinger', 'Mì Ý Xốt Cà Xúc Xích Gà Zinger', 60000.00, '653aa2135993d.jpeg'),
(46, 16, 'Combo Cơm Trưa Gà Bít-Tết', '1 Cơm Gà Bít-Tết + 1 Ly Lipton (Lớn)', 62000.00, '653aa25534599.jpeg'),
(47, 16, 'Dinner 249k', '5 Miếng Gà + 1 Burger Zinger/ Burger Tôm/Burger Gà Quay Flava + 2 Khoai Tây Chiên (Vừa) + 3 Lon Pepsi', 314.00, '653aa33b9ab3c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(44, 59, 'in process', 'đang vận chyển đơn sẽ đến trong 12p', '2023-10-26 17:21:36'),
(45, 60, '', ' không có lời nhắn', '2023-10-26 17:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `title` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `o_hr` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `c_hr` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `o_days` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(13, 15, 'Cơm tấm Sà Bì Chưởng ', 'phungthanhdo@gmail.com', '09678764654', 'sabichuong.com.vn', '8:00', '21:00', 'T2-T7', ' 86 P. Nguyễn Văn Tuyết, Trung Liệt, Đống Đa, Hà Nội 700000 ', '653a90a19aca7.jpg', '2023-10-26 16:15:29'),
(14, 16, 'Bánh mì Huỳnh Hoa ', 'banhmihuynhhoa@gmail.com', '0987543211', 'huynhhoa.com.vn', '7:00', '22:00', 'T2-T7', '13/2 Quận 7, TP.HCM', '653a916f71910.jpg', '2023-10-26 16:18:55'),
(15, 21, 'Hải sản Lobster Bay', 'haisanlobster@gmail.com', '0289576283', 'lobsterbayvl.com.vn', '7:00', '23:00', 'T2-T7', ' 484 Nguyễn Trí Phương Quận 10, TPHCM  ', '653a928c6979f.jpg', '2023-10-26 16:23:40'),
(16, 22, 'KFC Lê Thanh Nghị ', 'thanhnghie@gmail.com', '090129375', 'thanhnghi.com.vn', '9:00', '23:00', 'T2-T7', '170 Phố Lê Thanh Nghị Quận Hai Bà Trưng Hà Nội', '653a95a1a80fb.png', '2023-10-26 16:36:49'),
(17, 17, 'Bún chả Obama', 'bunchaobama@gmail.com', '090934822', 'buncharngonvaileu.com.vn', '6:00', '13:00', 'T2-T7', ' Ngách 33 Ngõ Thái Hà, P. Láng Hạ, Đống Đa, Hà Nội', '653a9659bfa6d.jpg', '2023-10-26 16:39:53'),
(18, 18, 'Phở Lý Quốc Sư ', 'lyquocsu@gmail.com', '0961220348', 'lyquocsuphooooo.com.vn', '5:00', '10:00', 'T2-T7', 'Số 7 Ngõ 80 Trần Duy Hưng, P. Trung Hòa, Cầu Giấy, Hà Nội', '653a97be213f7.jpg', '2023-10-26 16:45:50'),
(19, 19, 'Lẩu ếch Tú Anh ', 'lauechtuanh@gmail.com', '090934022', 'lauechtuanh.com.vn', '10:00', '22:00', 'T2-T7', '130 Bà Triệu, P. Hà Cầu, Hà Đông, Hà Nội', '653a985fea03e.jpg', '2023-10-26 16:48:31'),
(20, 20, 'Tanka Quán', 'tanka@gmail.com', '0982374892', 'tanka.com.vn', '17:00', '24:00', 'T2-T7', '683 Đê La Thành, P. Thành Công, Ba Đình, Hà Nội', '653a993a694a7.jpg', '2023-10-26 16:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(15, 'Cơm', '2023-10-26 16:15:02'),
(16, 'Bánh mì', '2023-10-26 16:15:59'),
(17, 'Bún', '2023-10-26 16:16:02'),
(18, 'Phở ', '2023-10-26 16:16:06'),
(19, 'Lẩu', '2023-10-26 16:16:15'),
(20, 'Nướng', '2023-10-26 16:16:18'),
(21, 'Hải sản ', '2023-10-26 16:19:25'),
(22, 'Chiên ', '2023-10-26 16:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `f_name` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `l_name` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(19, 'tuan', 'Nguyễn Viết', 'Tuấn', 'tuan@gmail.com', '0353516808', '123456', 'Hà Đông', 1, '2023-09-28 17:07:46'),
(20, 'longhoang', 'Hoàng', 'Long', 'long19092k2@gmail.com', '0967846423', '123456', 'Phương Trạch, Vĩnh Ngọc Đông Anh', 1, '2023-10-26 08:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` varchar(222) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name_userorder` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_useroder` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address_userorder` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `name_userorder`, `phone_useroder`, `address_userorder`) VALUES
(59, 19, 'Bánh mì thịt đặc biệt', 1, 67000.00, 'in process', '2023-10-26 17:22:50', 'long', '124231524', '29 vĩnh ngọc'),
(60, 19, 'Combo Sườn Cây Đặc Biệt', 1, 99000.00, NULL, '2023-10-26 17:21:53', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
