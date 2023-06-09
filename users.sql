-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 21, 2023 lúc 03:48 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `avatar`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đào Tân Quốc Việt', 'daotanquocviet@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 1, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(18, 'User', 'user13@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(19, 'User', 'user14@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(17, 'User', 'user12@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(16, 'User', 'user11@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(6, 'User', 'user1@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(7, 'User', 'user2@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(8, 'User', 'user3@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(9, 'User', 'user4@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(10, 'User', 'user5@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(11, 'User', 'user6@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(12, 'User', 'user7@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(13, 'User', 'user8@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(14, 'User', 'user9@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(15, 'User', 'user110@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, 'user.png', 0, NULL, '2023-05-19 05:08:39', '2023-05-19 05:08:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
