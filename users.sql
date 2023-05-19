-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 19, 2023 lúc 01:44 PM
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
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `avatar`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đào Tân Quốc Việt', 'daotanquocviet@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 1, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(2, 'Đào Tân Quốc Việt', '0947681349viet@gmail.com', NULL, '$2y$10$.WywdtLS3EK74QeGBVqr.OS2EWPlKruErR.OwelqeBc7xar6KCE0S', '0123456789', 'Thu Duc, tp HCm', '1684500939.jpg', 0, NULL, '2023-05-19 05:09:13', '2023-05-19 05:56:21'),
(3, 'Đào Tân Quốc Việt', '0328634349viet@gmail.com', NULL, '$2y$10$/CBVvad0PZX8OqZ0QWx1NuHec9Nz0JLHPKLK3pIL4Uz/FHl6Xqjui', '1234567890', NULL, '1684501543.jpg', 0, NULL, '2023-05-19 06:05:43', '2023-05-19 06:05:43'),
(4, 'Account User', 'email@gmail.com', NULL, '$2y$10$IqCdSGjbMbxNQUl8KRtZnehiwIvcXLGjpCTD6qTpcma1d9nfkSQXG', '0123456789', NULL, '1684501688.png', 0, NULL, '2023-05-19 06:08:08', '2023-05-19 06:08:08'),
(5, 'User', 'User@gmail.com', NULL, '$2y$10$PU4ztqK1na/S.RyZK8IEAe51FyfHgTvuOB5078VT3isRyGd6EwPk.', '1234567890', NULL, '1684501883.png', 0, NULL, '2023-05-19 06:11:23', '2023-05-19 06:11:23'),
(6, 'Đào Tân Quốc Việt', 'user1@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(7, 'Đào Tân Quốc Việt', 'user2@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(8, 'Đào Tân Quốc Việt', 'user3@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(9, 'Đào Tân Quốc Việt', 'user4@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(10, 'Đào Tân Quốc Việt', 'user5@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(11, 'Đào Tân Quốc Việt', 'user6@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(12, 'Đào Tân Quốc Việt', 'user7@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(13, 'Đào Tân Quốc Việt', 'user8@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(14, 'Đào Tân Quốc Việt', 'user9@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39'),
(15, 'Đào Tân Quốc Việt', 'user110@gmail.com', NULL, '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u', '0123456789', NULL, '1684498119.png', 0, 'yPjv3gLLMk7sSYqWEn9WQ55i0y9gAKetx7Vp2xyqzxh0UaQhiVBhi2v5jZ0Q', '2023-05-19 05:08:39', '2023-05-19 05:08:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
