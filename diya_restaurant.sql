-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 27, 2023 lúc 12:37 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `diya_restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `feeShip` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `address`, `feeShip`, `distance`, `phone`, `user_id`) VALUES
(3, 'Thái Văn C', '12 Trần Quang Diệu, Phường An Thới, ', 60000, 6, 378368339, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`) VALUES
(1, 'defaultAvatar.jpg'),
(3, 'Y6d1F2Kp08NyKib7JGwEHLhngFrHIWE7mBXFe4Mv.jpg'),
(4, 'RIf9Cu959HFEksOT0ZHwvGX0ahtOZaSqHqU9IuI1.jpg'),
(5, 'Ey1kDSiY18sWLNJ3gODIgNOctgFYQlSqoRErvdVY.jpg'),
(6, 'MrDBJLMFyvc2a5aFclDUwPgMNLsmA6lMYCD1Cu5n.jpg'),
(7, 'HNQmroGQcpSiy48NNFrsSFwgQGfNOBmtXoxqf7mx.jpg'),
(8, 'DvqULlc42qMBp5zDJfB9iusLtcBv1I2i7UXjumlB.jpg'),
(9, 'rbh7v2V9DR77zBXJdzlvNx5sCB5W5pp8X9ETo4GO.jpg'),
(10, 'H9Gxx4AGGlceRfeitIpzJBdxh8KwQCElYA5Na3za.jpg'),
(11, 'VGsTrsGJljjxwJh6r0EkZU8dN5T9s2CHyTqT8Dg9.jpg'),
(12, 'Pjf1uDooa3GNnO8eNfqXmxtAaMjyGbfhxgI3r2Yn.jpg'),
(13, 'SC9NeiVgor6V5m5LVguNmVDPlWEoVTwZUY6eCs44.webp'),
(14, 'HdZdRkVCXUUV6yjGPKAKOFmaFAzjhkPaK2vTsGvU.webp'),
(15, 'JMmkjHyeDw5sHGlvabZTzyYfza6E0rsD8nuYQyRk.png'),
(16, 'tnHSbVyBJreedLbfry5EupFkI6QjcbloW0QwXfM8.jpg'),
(17, '0G4QM7vtK13ookBHYnoeRGPtsE8OlSSVB2VYgImQ.jpg'),
(18, 'VF6ZNdemvwDBjExDkgYlZQSZ96a0KTiJg2W2RAMp.jpg'),
(19, 'Uay8jO256MhqsCs6NhJM6crCfbWemP8cAGfhyIgq.jpg'),
(20, 'tBU47elHQjv85c4bW9pFqEdATkpGVVVGuw2vLJBP.jpg'),
(21, 'G4lA0xFOnuUmKlgt18KQH5qhxBWInNmZpNAxAcqd.jpg'),
(22, 'i7rmS7taqYiWYZlzAm8HpW1fuAXi33VZ21vYlZq7.jpg'),
(23, 'Gm97jPv1UV1zBym1xut3wLOmdWoaOrDdYzWNo63U.png'),
(24, 'ljZZhGC4qMiNgH3C95J3aNj4R3oqLOcLUCzE2VqM.jpg'),
(25, 'PGbcaiLOtBv6qlbhsbEFK8hOSsKpwapcgJAKoLKV.jpg'),
(26, 'vcG3pOGPdsd05qBjlgqYavihPZWiRZKTbEZfOSUc.webp'),
(27, '5o9azOvlupznJalGqYwc1S7c5yPIPeu4qK663mNN.jpg'),
(28, 'uDsTiJeYBSVOP7JAIFS7xB3eZYQTPJRz5R2UqckX.jpg'),
(29, 'q1yFnQvT2lPusuHnn9oRGBhA9oQaxZ27ccaZah5p.jpg'),
(30, 'BrIn72Pf7G2uVA4zXbgQgczyYatPJxYYxABLGmnU.webp'),
(31, 'pbsMCAP6r2EiuIJog41YSLrjqzuwdtXPHFaPufKZ.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `image_id` int(11) UNSIGNED NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `price`, `type_id`, `image_id`, `ingredients`, `status`) VALUES
(2, 'Tiger Nâu', 22000, 2, 14, NULL, 0),
(3, 'Heniken', 26000, 2, 15, NULL, 0),
(4, 'Chả giò hải sản', 78000, 4, 16, 'Chả giò làm từ hải sản', 0),
(5, 'Chả giò cua', 79000, 4, 17, NULL, 0),
(7, 'Tôm đất vị hoàng kim', 219000, 10, 19, NULL, 0),
(8, 'Hải sản sốt Canjun', 219000, 11, 20, NULL, 0),
(10, 'Cơm xào hải sản', 130000, 7, 23, 'Cơm chiên hải sản siêu hấp dẫn với hạt cơm tơi giòn hòa quyện vị ngọt của hải sản và các rau củ bùi bùi vô cùng bổ dưỡng', 0),
(11, 'Lẩu gà lá quế', 189000, 23, 26, 'Nồi lẩu gà nóng hổi, dậy mùi thơm với phần thịt gà săn chắc', 0),
(12, 'Lẩu nấm', 209000, 23, 27, 'Xương gà được ninh kỹ cùng gia vị giúp nước lẩu ngọt và thơm', 0),
(13, 'Nước suối', 15000, 24, 28, NULL, 0),
(14, 'Fanta', 25000, 24, 29, NULL, 0),
(15, 'Bò lúc lắc khoai tây', 109000, 22, 30, 'Bò lúc lắc ăn với khoai tây chiên là món ăn độc đáo, thú vị và có hương vị siêu ngon.', 0),
(16, 'Bò beefsteak', 109000, 22, 31, 'Bò bít tết là món ăn rất được ưa chuộng tại châu Âu, châu Mỹ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `finish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type_order` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `processed_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `finish_date`, `type_order`, `table_id`, `address_id`, `payment_id`, `status`, `processed_by`) VALUES
(38, NULL, '2022-12-10 12:30:16', '2022-12-10 12:30:18', 'Tại chỗ', 4, NULL, NULL, 1, 1),
(39, 11, '2022-12-10 13:31:09', '2022-12-14 12:56:19', 'Online', NULL, 3, NULL, 3, 1),
(40, 11, '2022-12-11 12:03:30', '2022-12-14 12:56:19', 'Online', NULL, 3, NULL, 4, 1),
(41, NULL, '2022-12-11 22:23:47', '2022-12-11 22:23:57', 'Tại chỗ', 4, NULL, NULL, 1, 1),
(42, 11, '2022-12-11 22:30:29', '2022-12-11 22:30:53', 'Online', NULL, 3, 2, 3, NULL),
(43, NULL, '2022-12-11 22:41:15', '2022-12-11 22:41:39', 'Tại chỗ', 4, NULL, NULL, 1, 1),
(44, NULL, '2022-12-11 22:58:00', '2022-12-11 22:58:24', 'Tại chỗ', 4, NULL, NULL, 1, 1),
(45, 11, '2022-12-11 23:02:38', '2022-12-14 12:56:19', 'Online', NULL, 3, 3, 3, NULL),
(46, NULL, '2022-12-11 23:46:16', '2022-12-11 23:46:38', 'Tại chỗ', 4, NULL, NULL, 1, 1),
(47, 11, '2022-12-11 23:50:30', '2022-12-14 12:56:19', 'Online', NULL, 3, 4, 3, NULL),
(48, 11, '2022-12-11 23:51:46', '2022-12-14 12:56:19', 'Online', NULL, 3, NULL, 1, 1),
(49, NULL, '2022-12-13 16:44:01', '2022-12-13 17:32:34', 'Tại chỗ', 5, NULL, NULL, 1, 1),
(50, 16, '2022-12-14 15:50:20', '2022-12-14 15:50:20', 'Online', NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `menu_id`, `quantity`) VALUES
(50, 38, 10, 1),
(51, 39, 2, 4),
(52, 39, 3, 1),
(53, 40, 2, 1),
(54, 40, 3, 1),
(55, 40, 10, 1),
(56, 41, 5, 1),
(57, 42, 7, 2),
(58, 42, 8, 1),
(59, 43, 3, 1),
(60, 43, 5, 1),
(61, 44, 3, 1),
(62, 44, 7, 3),
(63, 45, 2, 2),
(64, 45, 4, 1),
(65, 46, 3, 1),
(66, 46, 7, 1),
(67, 47, 2, 2),
(68, 47, 3, 1),
(69, 48, 2, 1),
(70, 48, 5, 1),
(73, 49, 4, 1),
(74, 50, 2, 2),
(75, 50, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `payment_id_code`, `paypal_payer_id`, `payer_email`, `amount`, `currency`, `payment_status`) VALUES
(2, 'PAYID-MOLFT3Y4DP021299T168220M', 'E5WA7ZQ84EFV8', 'sb-hlqvr21942719@personal.example.com', 29.03, 'USD', 'approved'),
(3, 'PAYID-MOLGC7A1YG32010P3889450C', 'E5WA7ZQ84EFV8', 'sb-hlqvr21942719@personal.example.com', 5.75, 'USD', 'approved'),
(4, 'PAYID-MOLGZNY9MT76962EF004300Y', 'E5WA7ZQ84EFV8', 'sb-hlqvr21942719@personal.example.com', 4.05, 'USD', 'approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reservation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `people` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `table_preserve_id` int(11) DEFAULT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `user_confirmed_id` int(11) UNSIGNED DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `reservation_time`, `people`, `status`, `table_preserve_id`, `customer_id`, `user_confirmed_id`, `message`, `response`) VALUES
(4, '2022-12-11 22:42:19', '2022-12-11 22:42:19', 4, '1', 2, 11, NULL, NULL, NULL),
(5, '2022-12-11 23:54:11', '2022-12-11 23:54:11', 4, '1', 2, 11, NULL, 'Ngồi gần cửa sổ', NULL),
(6, '2022-12-11 23:53:12', '2022-12-30 04:00:00', 4, '0', NULL, 11, NULL, 'Ngồi nơi mát mẻ', NULL),
(7, '2022-12-15 01:18:23', '2022-12-15 02:00:00', 4, '1', 2, 16, NULL, NULL, NULL),
(8, '2022-12-30 04:24:57', '2023-01-11 01:00:00', 2, '0', NULL, 16, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tables`
--

INSERT INTO `tables` (`id`, `code`, `capacity`, `status`) VALUES
(2, 'B1', 4, 0),
(3, 'C1', 8, 0),
(4, 'A1', 2, 0),
(5, 'A2', 8, 0),
(6, 'C3', 8, 0),
(7, 'B3', 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(2, 'Bia', NULL),
(4, 'Chả giò', NULL),
(7, 'Cơm', NULL),
(10, 'Crawfish', 'Tôm đất'),
(11, 'Hải sản', 'Các hải sản tươi sống'),
(22, 'Món bò', 'Các món làm từ bò'),
(23, 'Lẩu', NULL),
(24, 'Nước ngọt', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user_role` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa có',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` int(11) UNSIGNED DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `id_user_role`, `name`, `email`, `phone`, `password`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thái Vươn Phàm', 'thai1vuon2pham@gmail.com', '0369006523', '$2y$10$8d0FCUkYsTAUqxS5sMvCOubJMJtjWaxDLXLavcmeiqsZlLhUj9V0u', 25, 0, '2022-12-08 21:41:43', '2022-12-14 13:25:03'),
(2, 2, 'Trần Văn Tám', 'uwiegand@example.net', '02330030303', '$2y$10$9YtALYeHf40HyalKiN9IkO4KYRkNZO0cionNukwNzWrMaoH6cCMsq', 1, 0, '2022-09-25 10:50:37', '2022-12-15 01:16:09'),
(3, 2, 'Trần Văn Chín', 'no@cm.com', '0339939393', '$2y$10$/Kv3V50P.fOOrcqun3l7TeAiiiS6JjIDkYM2AIsvgzcca3IUc2aHe', 1, 0, '2022-09-25 10:56:36', '2022-12-15 01:16:08'),
(11, 4, 'Trần Văn Chính', 'tranvan9@gmail.com', '0939557539', '$2y$10$OROia8UfCwdo6o.I0UcMu.nXYv/lCXzaTqRAQM62WKFLyPOo7ohaK', 1, 0, '2022-11-23 08:36:47', '2022-12-15 01:16:07'),
(14, 3, 'Duyên', 'no@ccm.com', '0369006524', '$2y$10$0whz5uPuKKm8MJQdQmLgD.qhGylQBK7c95E11DY/q3sRl2jusIfNK', 1, 1, '2022-12-09 00:51:34', '2022-12-15 01:16:06'),
(15, 2, 'Trần Văn Mười', 'uwiegandd@example.net', '0369006525', '$2y$10$3d.l.jiqshSqoZeZ8uK16.Uq.eKe6cPMI2xh6tVy/QUKQPwnCR62G', 1, 0, '2022-12-09 00:52:30', '2022-12-15 01:16:04'),
(16, 4, 'Nguyễn Thế Doan', 'kevinlois@kangsohang.com', '0939557538', '$2y$10$yabTfFfWYNfGqYQtcaJexOpNDsc91jxpHu1hIZEiFDNgVNdi6HrJS', 1, 0, '2022-12-14 15:41:06', '2022-12-15 01:16:02'),
(17, 4, 'Thái Thanh', 'thaithanh@gmail.com', '0369006529', '$2y$10$tQ55ec0PZygR0Ww5HTXEIOK3EMJwPLgbmjxMER2ERen8vBAjsUokG', 1, 0, '2022-12-15 02:24:34', '2022-12-15 02:24:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`) VALUES
(1, 'Admin'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_menu_image` (`image_id`),
  ADD KEY `FK_menu_type` (`type_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_table` (`table_id`),
  ADD KEY `FK_order_payment` (`payment_id`),
  ADD KEY `FK_user_order` (`customer_id`),
  ADD KEY `FK_order_address` (`address_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_detail` (`order_id`),
  ADD KEY `FK_detail_menu` (`menu_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reservation_customer` (`customer_id`),
  ADD KEY `FK_reservation_user_coinfirmed` (`user_confirmed_id`),
  ADD KEY `FK_reservation_table` (`table_preserve_id`);

--
-- Chỉ mục cho bảng `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `FK_user_role` (`id_user_role`),
  ADD KEY `avatar` (`avatar`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `FK_user_address` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `FK_menu_image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_menu_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_address` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_table` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_order` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_detail_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu_items` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_reservation_customer` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reservation_table` FOREIGN KEY (`table_preserve_id`) REFERENCES `tables` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reservation_user_coinfirmed` FOREIGN KEY (`user_confirmed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_avatar` FOREIGN KEY (`avatar`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`id_user_role`) REFERENCES `user_roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
