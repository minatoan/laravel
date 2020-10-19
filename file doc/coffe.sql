-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2020 lúc 06:41 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `id` int(20) NOT NULL,
  `tenban` varchar(10) COLLATE utf8_czech_ci DEFAULT NULL,
  `maloaiban` int(20) NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`id`, `tenban`, `maloaiban`, `matc`) VALUES
(82, 'Bàn 1', 29, 9),
(83, 'Bàn 2', 29, 9),
(84, 'Bàn 3', 29, 9),
(85, 'Bàn 4', 29, 9),
(87, 'Bàn 5', 29, 9),
(88, 'Bàn 6', 29, 9),
(89, 'Bàn 7', 29, 9),
(90, 'Bàn 8', 29, 9),
(91, 'Bàn 9', 29, 9),
(92, 'Bàn 10', 29, 9),
(93, 'Bàn 11', 30, 9),
(94, 'Bàn 12', 30, 9),
(95, 'Bàn 13', 30, 9),
(96, 'Bàn 14', 30, 9),
(97, 'Bàn 15', 30, 9),
(98, 'Bàn 16', 30, 9),
(99, 'Bàn 17', 30, 9),
(100, 'Bàn 18', 30, 9),
(101, 'Bàn 19', 30, 9),
(102, 'Bàn 20', 30, 9),
(103, 'Bàn 21', 31, 9),
(104, 'Bàn 22', 31, 9),
(105, 'Bàn 23', 31, 9),
(106, 'Bàn 24', 31, 9),
(107, 'Bàn 25', 31, 9),
(108, 'Bàn 26', 31, 9),
(109, 'Bàn 27', 31, 9),
(110, 'Bàn 28', 31, 9),
(111, 'Bàn 29', 31, 9),
(112, 'Bàn 30', 31, 9),
(113, 'Bàn 2', 32, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(20) NOT NULL,
  `manv` int(20) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `maban` int(20) DEFAULT NULL,
  `tongtien` float DEFAULT NULL,
  `tinhtrang` tinyint(1) NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `manv`, `ngaytao`, `maban`, `tongtien`, `tinhtrang`, `matc`) VALUES
(380, 31, '2020-04-11 15:39:50', 82, 50, 1, 9),
(381, 31, '2020-04-11 15:39:54', 96, 75000, 1, 9),
(382, 31, '2020-04-11 15:41:01', 82, 50000, 1, 9),
(383, 31, '2020-04-11 15:41:04', 96, 15000, 1, 9),
(384, 33, '2020-04-15 13:48:13', 94, 44000, 1, 9),
(385, 33, '2020-04-15 13:48:34', 96, 49000, 1, 9),
(386, 33, '2020-04-15 13:49:04', 96, 127000, 1, 9),
(387, 33, '2020-04-15 13:50:08', 103, 75000, 1, 9),
(388, 33, '2020-04-15 13:50:37', 105, 109000, 1, 9),
(389, 33, '2020-04-15 13:50:54', 87, 52000, 1, 9),
(390, 33, '2020-04-15 13:52:10', 99, 100000, 1, 9),
(391, 33, '2020-04-15 13:52:57', 101, 107000, 1, 9),
(392, 33, '2020-04-15 13:53:00', 97, 89000, 1, 9),
(393, 33, '2020-04-15 13:53:41', 83, 120000, 1, 9),
(394, 33, '2020-04-15 13:54:55', 89, 101000, 1, 9),
(395, 33, '2020-04-15 13:55:38', 97, 116000, 1, 9),
(396, 32, '2020-04-17 06:47:17', 113, 12000, 1, 10),
(397, 32, '2020-04-17 07:07:10', 113, 24000, 1, 10),
(398, 41, '2020-04-18 13:08:50', 83, 15000, 1, 9),
(399, 41, '2020-04-18 13:09:59', 91, 16000, 1, 9),
(400, 41, '2020-04-18 13:10:04', 92, 60000, 1, 9),
(401, 41, '2020-04-18 13:10:43', 103, 94000, 1, 9),
(402, 41, '2020-04-18 13:13:05', 88, 28000, 1, 9),
(403, 41, '2020-04-18 13:13:08', 93, 89000, 1, 9),
(404, 41, '2020-04-18 13:13:17', 98, 32000, 1, 9),
(405, 41, '2020-04-18 13:14:25', 95, 50000, 1, 9),
(406, 41, '2020-04-18 13:15:53', 104, 30000, 1, 9),
(407, 41, '2020-04-18 13:20:25', 97, 112000, 1, 9),
(408, 41, '2020-04-18 13:20:41', 94, 36000, 1, 9),
(409, 41, '2020-04-18 13:20:44', 95, 40000, 1, 9),
(410, 41, '2020-04-18 13:20:47', 93, 40000, 1, 9),
(411, 41, '2020-04-18 13:20:50', 96, 24000, 1, 9),
(412, 41, '2020-04-18 13:20:52', 97, 112000, 1, 9),
(414, 41, '2020-04-18 13:24:37', 82, 25000, 1, 9),
(416, 41, '2020-04-18 13:27:04', 90, 15000, 1, 9),
(417, 41, '2020-04-18 13:27:07', 83, 31000, 1, 9),
(418, 41, '2020-04-18 13:28:13', 101, 40000, 1, 9),
(419, 41, '2020-04-18 13:28:20', 92, 28000, 1, 9),
(420, 41, '2020-04-18 13:29:44', 90, 40000, 1, 9),
(421, 41, '2020-04-18 13:29:47', 91, 24000, 1, 9),
(422, 41, '2020-04-18 13:29:49', 88, 41000, 1, 9),
(423, 41, '2020-04-18 13:29:51', 89, 40000, 1, 9),
(424, 41, '2020-04-18 13:43:16', 90, 25000, 1, 9),
(425, 41, '2020-04-18 13:44:28', 99, 12000, 1, 9),
(426, 41, '2020-04-18 13:44:38', 95, 16000, 1, 9),
(427, 41, '2020-04-18 13:45:31', 91, 13000, 1, 9),
(428, 33, '2020-04-19 11:36:42', 92, 40000, 1, 9),
(429, 33, '2020-04-19 11:37:27', 92, 56000, 1, 9),
(430, 33, '2020-04-19 11:37:40', 90, 12000, 1, 9),
(431, 33, '2020-04-19 11:39:11', 96, 12000, 1, 9),
(432, 33, '2020-04-19 11:52:41', 100, 41000, 1, 9),
(433, 33, '2020-04-19 12:08:27', 99, 28000, 1, 9),
(434, 33, '2020-04-19 12:08:30', 99, 28000, 1, 9),
(435, 33, '2020-04-19 12:11:05', 99, 28000, 1, 9),
(436, 33, '2020-04-19 12:11:25', 90, 25000, 1, 9),
(437, 33, '2020-04-19 12:12:00', 97, 16000, 1, 9),
(438, 33, '2020-04-19 12:12:05', 95, 15000, 1, 9),
(439, 33, '2020-04-19 12:12:10', 106, 25000, 1, 9),
(440, 33, '2020-04-19 12:16:41', 95, 45000, 1, 9),
(441, 33, '2020-04-19 12:16:54', 99, 12000, 1, 9),
(442, 33, '2020-04-19 12:17:10', 111, 28000, 1, 9),
(443, 33, '2020-04-19 12:17:38', 84, 25000, 1, 9),
(444, 33, '2020-04-19 12:17:52', 97, 61000, 1, 9),
(445, 33, '2020-04-19 12:51:19', 101, 16000, 1, 9),
(446, 33, '2020-04-19 12:51:23', 108, 43000, 1, 9),
(447, 33, '2020-04-19 12:52:14', 94, 62000, 1, 9),
(449, 32, '2020-04-26 13:10:45', 113, 12000, 1, 10),
(450, 31, '2020-04-28 12:00:21', 82, 49000, 1, 9),
(451, 31, '2020-06-28 03:02:48', 83, 37000, 1, 9),
(452, 31, '2020-06-28 03:26:47', 84, 25000, 1, 9),
(453, 31, '2020-07-01 14:17:04', 89, 16000, 1, 9),
(454, 31, '2020-07-01 14:17:07', 102, 41000, 1, 9),
(455, 31, '2020-07-01 14:17:11', 91, 12000, 1, 9),
(456, 31, '2020-07-01 14:17:13', 100, 52000, 1, 9),
(457, 31, '2020-07-04 09:22:37', 82, 25000, 1, 9),
(458, 31, '2020-07-08 05:47:48', 97, 39000, 1, 9),
(459, 31, '2020-07-09 11:30:47', 106, 105000, 1, 9),
(460, 31, '2020-07-09 11:30:50', 94, 41000, 1, 9),
(461, 31, '2020-07-09 11:30:57', 108, 48000, 1, 9),
(462, 31, '2020-07-09 11:31:07', 88, 66000, 1, 9),
(463, 31, '2020-07-27 03:03:25', 92, 15000, 1, 9),
(464, 31, '2020-07-27 03:04:36', 96, 55000, 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbill`
--

CREATE TABLE `chitietbill` (
  `id` int(20) NOT NULL,
  `mabill` int(20) NOT NULL,
  `mamon` int(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `dongia` float NOT NULL,
  `matc` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbill`
--

INSERT INTO `chitietbill` (`id`, `mabill`, `mamon`, `soluong`, `dongia`, `matc`) VALUES
(265, 380, 60, 2, 25, 9),
(266, 381, 61, 3, 25000, 9),
(267, 382, 59, 1, 25000, 9),
(268, 382, 61, 1, 25000, 9),
(269, 383, 62, 1, 15000, 9),
(270, 384, 63, 1, 12000, 9),
(271, 384, 78, 2, 16000, 9),
(272, 385, 59, 1, 25000, 9),
(273, 385, 69, 1, 12000, 9),
(274, 385, 63, 1, 12000, 9),
(275, 386, 63, 1, 12000, 9),
(276, 386, 77, 1, 16000, 9),
(277, 386, 59, 2, 25000, 9),
(278, 386, 58, 1, 25000, 9),
(279, 386, 65, 2, 12000, 9),
(280, 387, 58, 1, 25000, 9),
(281, 387, 60, 2, 25000, 9),
(282, 388, 61, 1, 25000, 9),
(283, 388, 72, 3, 12000, 9),
(284, 388, 79, 1, 16000, 9),
(285, 388, 78, 2, 16000, 9),
(286, 389, 77, 1, 16000, 9),
(287, 389, 63, 3, 12000, 9),
(288, 390, 70, 1, 16000, 9),
(289, 390, 65, 2, 12000, 9),
(290, 390, 68, 1, 12000, 9),
(291, 390, 63, 4, 12000, 9),
(292, 391, 61, 1, 25000, 9),
(293, 391, 60, 2, 25000, 9),
(294, 391, 75, 2, 16000, 9),
(295, 392, 66, 1, 16000, 9),
(296, 392, 68, 1, 12000, 9),
(297, 392, 80, 1, 13000, 9),
(298, 392, 63, 4, 12000, 9),
(299, 393, 76, 2, 16000, 9),
(300, 393, 64, 3, 16000, 9),
(301, 393, 78, 1, 16000, 9),
(302, 393, 67, 2, 12000, 9),
(303, 394, 59, 1, 25000, 9),
(304, 394, 72, 1, 12000, 9),
(305, 394, 64, 4, 16000, 9),
(306, 395, 77, 2, 16000, 9),
(307, 395, 65, 1, 12000, 9),
(308, 395, 63, 4, 12000, 9),
(309, 395, 67, 2, 12000, 9),
(310, 396, 81, 1, 12000, 10),
(311, 397, 81, 2, 12000, 10),
(312, 398, 62, 1, 15000, 9),
(313, 399, 64, 1, 16000, 9),
(314, 400, 69, 2, 12000, 9),
(315, 400, 63, 1, 12000, 9),
(316, 400, 68, 2, 12000, 9),
(317, 401, 59, 1, 25000, 9),
(318, 401, 80, 1, 13000, 9),
(319, 401, 64, 1, 16000, 9),
(320, 401, 63, 2, 12000, 9),
(321, 401, 77, 1, 16000, 9),
(322, 402, 66, 1, 16000, 9),
(323, 402, 63, 1, 12000, 9),
(324, 403, 66, 1, 16000, 9),
(325, 403, 74, 3, 16000, 9),
(326, 403, 59, 1, 25000, 9),
(327, 404, 64, 2, 16000, 9),
(328, 405, 59, 2, 25000, 9),
(329, 406, 62, 2, 15000, 9),
(330, 407, 63, 1, 12000, 9),
(331, 407, 59, 4, 25000, 9),
(332, 408, 63, 1, 12000, 9),
(333, 408, 67, 2, 12000, 9),
(334, 409, 70, 1, 16000, 9),
(335, 409, 63, 2, 12000, 9),
(336, 410, 64, 1, 16000, 9),
(337, 410, 63, 2, 12000, 9),
(338, 411, 67, 1, 12000, 9),
(339, 411, 69, 1, 12000, 9),
(340, 412, 63, 1, 12000, 9),
(341, 412, 59, 4, 25000, 9),
(342, 414, 58, 1, 25000, 9),
(343, 416, 62, 1, 15000, 9),
(344, 417, 62, 1, 15000, 9),
(345, 417, 78, 1, 16000, 9),
(346, 418, 64, 1, 16000, 9),
(347, 418, 63, 2, 12000, 9),
(348, 419, 78, 1, 16000, 9),
(349, 419, 68, 1, 12000, 9),
(350, 420, 64, 1, 16000, 9),
(351, 420, 63, 2, 12000, 9),
(352, 421, 65, 1, 12000, 9),
(353, 421, 67, 1, 12000, 9),
(354, 422, 77, 1, 16000, 9),
(355, 422, 59, 1, 25000, 9),
(356, 423, 64, 1, 16000, 9),
(357, 423, 63, 2, 12000, 9),
(358, 424, 58, 1, 25000, 9),
(359, 425, 65, 1, 12000, 9),
(360, 426, 77, 1, 16000, 9),
(361, 427, 80, 1, 13000, 9),
(362, 428, 62, 1, 15000, 9),
(363, 428, 59, 1, 25000, 9),
(364, 429, 62, 1, 15000, 9),
(365, 429, 59, 1, 25000, 9),
(366, 429, 78, 1, 16000, 9),
(367, 430, 65, 1, 12000, 9),
(368, 431, 67, 1, 12000, 9),
(369, 432, 59, 1, 25000, 9),
(370, 432, 77, 1, 16000, 9),
(371, 435, 63, 1, 12000, 9),
(372, 435, 64, 1, 16000, 9),
(373, 436, 61, 1, 25000, 9),
(374, 437, 66, 1, 16000, 9),
(375, 438, 62, 1, 15000, 9),
(376, 439, 61, 1, 25000, 9),
(377, 440, 80, 1, 13000, 9),
(378, 440, 77, 2, 16000, 9),
(379, 441, 65, 1, 12000, 9),
(380, 442, 78, 1, 16000, 9),
(381, 442, 63, 1, 12000, 9),
(382, 443, 61, 1, 25000, 9),
(383, 444, 62, 3, 15000, 9),
(384, 444, 78, 1, 16000, 9),
(385, 445, 66, 1, 16000, 9),
(386, 446, 62, 1, 15000, 9),
(387, 446, 63, 1, 12000, 9),
(388, 446, 64, 1, 16000, 9),
(389, 447, 68, 1, 12000, 9),
(390, 447, 59, 2, 25000, 9),
(392, 449, 81, 1, 12000, 10),
(393, 450, 63, 2, 12000, 9),
(394, 450, 58, 1, 25000, 9),
(395, 451, 58, 1, 25000, 9),
(396, 451, 63, 1, 12000, 9),
(397, 452, 58, 1, 25000, 9),
(398, 453, 79, 1, 16000, 9),
(399, 454, 58, 1, 25000, 9),
(400, 454, 77, 1, 16000, 9),
(401, 455, 63, 1, 12000, 9),
(402, 456, 58, 1, 25000, 9),
(403, 456, 62, 1, 15000, 9),
(404, 456, 63, 1, 12000, 9),
(405, 457, 58, 1, 25000, 9),
(406, 458, 63, 2, 12000, 9),
(407, 458, 62, 1, 15000, 9),
(408, 459, 61, 1, 25000, 9),
(409, 459, 69, 4, 12000, 9),
(410, 459, 76, 2, 16000, 9),
(411, 460, 77, 1, 16000, 9),
(412, 460, 59, 1, 25000, 9),
(413, 461, 77, 3, 16000, 9),
(414, 462, 78, 1, 16000, 9),
(415, 462, 59, 2, 25000, 9),
(416, 463, 62, 1, 15000, 9),
(417, 464, 59, 1, 25000, 9),
(418, 464, 62, 2, 15000, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `id` int(20) NOT NULL,
  `maphieunhap` int(20) NOT NULL,
  `mahang` int(20) NOT NULL,
  `soluong` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `dvt` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `dongia` float NOT NULL,
  `matc` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`id`, `maphieunhap`, `mahang`, `soluong`, `dvt`, `dongia`, `matc`) VALUES
(62, 50, 14, '10', 'Thùng', 200000, 9),
(63, 50, 16, '20', 'Thùng', 200000, 9),
(64, 50, 17, '10', 'Kilogram', 7500, 9),
(65, 50, 15, '20', 'Thùng', 200000, 9),
(66, 51, 15, '1', 'Thùng', 16000, 9),
(69, 53, 14, '10', 'Thùng', 16000, 9),
(70, 53, 15, '10', 'Thùng', 16000, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieuxuat`
--

CREATE TABLE `ctphieuxuat` (
  `id` int(20) NOT NULL,
  `maphieuxuat` int(20) NOT NULL,
  `mahang` int(20) NOT NULL,
  `soluong` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `dvt` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `matc` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieuxuat`
--

INSERT INTO `ctphieuxuat` (`id`, `maphieuxuat`, `mahang`, `soluong`, `dvt`, `matc`) VALUES
(48, 40, 16, '1', 'Thùng', 9),
(49, 40, 14, '1', 'Thùng', 9),
(50, 40, 15, '1', 'Thùng', 9),
(51, 40, 17, '1', 'Kilogram', 9),
(52, 42, 14, '1', 'Thùng', 9),
(53, 43, 14, '1', 'Thùng', 9),
(54, 43, 14, '1', 'Thùng', 9),
(56, 45, 15, '1', 'Thùng', 9),
(57, 45, 14, '1', 'Thùng', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(20) NOT NULL,
  `tenhang` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `soluong` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `dvt` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `tenhang`, `soluong`, `dvt`, `matc`) VALUES
(14, '7-up', '15', 'Thùng', 9),
(15, 'Pepsi', '29', 'Thùng', 9),
(16, 'Mirinda', '19', 'Thùng', 9),
(17, 'Đường', '9', 'Kilogram', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiban`
--

CREATE TABLE `loaiban` (
  `id` int(20) NOT NULL,
  `tenloaiban` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiban`
--

INSERT INTO `loaiban` (`id`, `tenloaiban`, `matc`) VALUES
(29, 'Ngoài trời', 9),
(30, 'Máy lạnh', 9),
(31, 'Sân thượng', 9),
(32, 'Gỗ', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimon`
--

CREATE TABLE `loaimon` (
  `id` int(20) NOT NULL,
  `tenloaimon` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimon`
--

INSERT INTO `loaimon` (`id`, `tenloaimon`, `matc`) VALUES
(14, 'Đá xay', 9),
(15, 'Sinh tố', 9),
(16, 'Nước  ngọt', 9),
(17, 'Pha chế', 9),
(18, 'Pha chế', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(20) NOT NULL,
  `tenmon` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `dongia` float NOT NULL,
  `maloaimon` int(20) NOT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `tenmon`, `dongia`, `maloaimon`, `matc`) VALUES
(58, 'Cà phê đá xay', 25000, 14, 9),
(59, 'Sinh tố dâu tây', 25000, 15, 9),
(60, 'Sinh tố mãng cầu', 25000, 15, 9),
(61, 'Cacao đá xay', 25000, 14, 9),
(62, '7-up', 15000, 16, 9),
(63, 'Cafe', 12000, 17, 9),
(64, 'Cafe sữa', 16000, 17, 9),
(65, 'Lipton', 12000, 17, 9),
(66, 'Lipton sữa', 16000, 17, 9),
(67, 'Đá chanh', 12000, 17, 9),
(68, 'Chanh muối', 12000, 17, 9),
(69, 'Đá me', 12000, 17, 9),
(70, 'Đậu xanh', 16000, 17, 9),
(72, 'Bạc hà', 12000, 17, 9),
(73, 'Bạc hà sữa', 16000, 17, 9),
(74, 'Yaourt đá', 16000, 17, 9),
(75, 'Cam vắt', 16000, 17, 9),
(76, 'Bạc sĩu', 16000, 17, 9),
(77, 'Pesi', 16000, 16, 9),
(78, 'Sting', 16000, 16, 9),
(79, 'Number 1', 16000, 16, 9),
(80, 'Soya', 13000, 16, 9),
(81, 'Cafe', 12000, 18, 10),
(82, 'Sâm dứa', 16000, 17, 9),
(85, 'Cam đá xay', 25000, 14, 9),
(86, 'Bạc hà đá xay', 25000, 14, 9),
(87, 'Tắc đá xay', 18000, 14, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(20) NOT NULL,
  `tenncc` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `diachi` varchar(250) COLLATE utf8_czech_ci DEFAULT NULL,
  `sdt` varchar(11) COLLATE utf8_czech_ci DEFAULT NULL,
  `matc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `tenncc`, `diachi`, `sdt`, `matc`) VALUES
(7, 'Cty TNHH MTV AN KHANG', '37 hẻm 6 mậu thân', '0868647681', 9),
(9, 'Cửa hàng nước giải khát Thế Vinh', '45/7 đường 3/2, Ninh Kiều, Cần Thơ', '07103856941', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(20) NOT NULL,
  `tennv` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_czech_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `calam` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `matc` int(20) NOT NULL,
  `password` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `quyen` int(10) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `tennv`, `ngaysinh`, `gioitinh`, `sdt`, `diachi`, `calam`, `username`, `matc`, `password`, `quyen`, `ghichu`) VALUES
(30, 'admin', '2020-04-17', 'Nam', '0948993765', 'CT', 'Không', 'admin', 8, '$2y$10$Aa1y.rlL8KWh4Ff8ZI/mNOrZsWtfoms1d4ZkrWuRz7XnSU10J/SBe', 2, 'admin'),
(31, 'Lương Kiến An', '1996-04-03', 'Nam', '0901006998', '37 Lý Tự Trọng, an phú, ninh kiều, cần thơ', 'Không', 'kienan', 9, '$2y$10$hr1YAJvA3i6jvIWd8IWSOuxEGdxFmxCCX2jGuDrkf3kI72LQs/Q6e', 1, 'Chủ quán'),
(32, 'Nguyễn Trọng An', '1996-06-14', 'Nam', '0948993765', 'Cần Thơ', 'Không', 'trongan', 10, '$2y$10$hr1YAJvA3i6jvIWd8IWSOuxEGdxFmxCCX2jGuDrkf3kI72LQs/Q6e', 1, 'Chủ quán'),
(33, 'Phan Thanh Trúc', '1998-11-23', 'Nữ', '0868647681', 'Hẻm 233  Đường Nguyễn Văn Cừ, An Hoà, Ninh Kiều, Cần Thơ', 'Sáng', 'thanhtruc', 9, '$2y$10$oWfopdq7J26acVjiBxhecOcd4wtpgyDTFe5srHzX5M7feK4svmWGC', 0, NULL),
(41, 'Nguyễn Văn Việt', '1996-02-08', 'Nam', '0948992843', 'Cần Thơ', 'Chiều', 'nguyentest', 9, '$2y$10$hr1YAJvA3i6jvIWd8IWSOuxEGdxFmxCCX2jGuDrkf3kI72LQs/Q6e', 0, 'Phuc vụ'),
(45, 'Nguyễn Văn A', '1996-02-08', 'Nam', '0948992843', '124', 'Không', 'vana', 14, '$2y$10$TZ8GfN/tFlSgaTaczA1Tpez5jBlAkONzl3RWDhYrFp1ERjjG.3t7O', 1, 'Chủ quán'),
(48, 'Bùi Trung Hiếu', '1998-05-27', 'Nam', '0974852654', 'Cần Thơ', 'Tối', 'trunghieu', 9, '$2y$10$SDutPNB6uSvqkgDFA6/sNuWWALhMrUw4KBNtPRlIxCVxd/uCSQOFi', 0, 'Nhân viên'),
(49, 'Ngô Thanh Vân', '1997-12-11', 'Nữ', '0985635777', 'Cần Thơ', 'Khuya', 'thanhvan', 9, '$2y$10$nJ3MRS8kPfxq.IZFNCT.GuIQaSsaTHxdYHPvK/2s1E2qvJeVdWGjW', 0, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(20) NOT NULL,
  `manv` int(20) NOT NULL,
  `ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ncc` int(20) NOT NULL,
  `tongtien` float NOT NULL,
  `matc` int(20) NOT NULL,
  `ghichu` varchar(250) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `manv`, `ngaynhap`, `ncc`, `tongtien`, `matc`, `ghichu`) VALUES
(50, 31, '2020-04-11 15:46:10', 7, 10075000, 9, NULL),
(51, 33, '2020-04-19 12:24:43', 7, 16000, 9, NULL),
(53, 31, '2020-07-04 09:27:57', 7, 320000, 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `id` int(20) NOT NULL,
  `manv` int(20) NOT NULL,
  `ngayxuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matc` int(20) NOT NULL,
  `ghichu` varchar(250) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`id`, `manv`, `ngayxuat`, `matc`, `ghichu`) VALUES
(40, 31, '2020-04-11 15:47:12', 9, NULL),
(42, 33, '2020-04-19 12:45:14', 9, NULL),
(43, 33, '2020-04-19 12:46:37', 9, NULL),
(45, 31, '2020-04-29 09:27:05', 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhluong`
--

CREATE TABLE `tinhluong` (
  `id` int(20) NOT NULL,
  `manv` int(20) NOT NULL,
  `luongcb` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `calam` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `ngay` date NOT NULL DEFAULT current_timestamp(),
  `giobd` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `giokt` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `songaylam` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `tienthuong` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `tienphat` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `matc` int(20) NOT NULL,
  `ghichu` varchar(250) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhluong`
--

INSERT INTO `tinhluong` (`id`, `manv`, `luongcb`, `calam`, `ngay`, `giobd`, `giokt`, `songaylam`, `tienthuong`, `tienphat`, `matc`, `ghichu`) VALUES
(40, 41, '18000', 'Chiều', '2020-04-28', '13:30', '17:30', '1', '0', '0', 9, NULL),
(41, 33, '18000', 'Sáng', '2020-04-28', '06:00', '11:30', '2', '0', '0', 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tochuc`
--

CREATE TABLE `tochuc` (
  `id` int(20) NOT NULL,
  `tentc` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `diachi` varchar(256) COLLATE utf8_czech_ci DEFAULT NULL,
  `nguoiql` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Đang đổ dữ liệu cho bảng `tochuc`
--

INSERT INTO `tochuc` (`id`, `tentc`, `diachi`, `nguoiql`) VALUES
(8, 'ADMIN', 'ADMIN', 'ADMIN'),
(9, 'CẦN THƠ COFFEE', '190 Nguyễn An Ninh, An Phú, Ninh Kiều, Cần Thơ', 'Lương Kiến An'),
(10, 'Flamboyant Coffee', '256 Đường Nguyễn Văn Cừ, An Hoà, Ninh Kiều, Cần Thơ', 'Nguyễn Trọng An'),
(14, 'CAFE TIME', '124 Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Cần Thơ', 'Nguyễn Văn A');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloaibang` (`maloaiban`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maban` (`maban`),
  ADD KEY `manv` (`manv`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mabill` (`mabill`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahang` (`mahang`),
  ADD KEY `maphieunhap` (`maphieunhap`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `ctphieuxuat`
--
ALTER TABLE `ctphieuxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maphieuxuat` (`maphieuxuat`),
  ADD KEY `mahang` (`mahang`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `loaiban`
--
ALTER TABLE `loaiban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloaimon` (`maloaimon`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manv` (`manv`),
  ADD KEY `ncc` (`ncc`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manv` (`manv`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `tinhluong`
--
ALTER TABLE `tinhluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manv` (`manv`),
  ADD KEY `matc` (`matc`);

--
-- Chỉ mục cho bảng `tochuc`
--
ALTER TABLE `tochuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `ctphieuxuat`
--
ALTER TABLE `ctphieuxuat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `loaiban`
--
ALTER TABLE `loaiban`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tinhluong`
--
ALTER TABLE `tinhluong`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tochuc`
--
ALTER TABLE `tochuc`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`maloaiban`) REFERENCES `loaiban` (`id`),
  ADD CONSTRAINT `ban_ibfk_2` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_5` FOREIGN KEY (`maban`) REFERENCES `ban` (`id`),
  ADD CONSTRAINT `bill_ibfk_6` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `bill_ibfk_7` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  ADD CONSTRAINT `chitietbill_ibfk_3` FOREIGN KEY (`mabill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `chitietbill_ibfk_4` FOREIGN KEY (`mamon`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `chitietbill_ibfk_5` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`maphieunhap`) REFERENCES `phieunhap` (`id`),
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`mahang`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `ctphieunhap_ibfk_3` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `ctphieuxuat`
--
ALTER TABLE `ctphieuxuat`
  ADD CONSTRAINT `ctphieuxuat_ibfk_1` FOREIGN KEY (`maphieuxuat`) REFERENCES `phieuxuat` (`id`),
  ADD CONSTRAINT `ctphieuxuat_ibfk_2` FOREIGN KEY (`mahang`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `ctphieuxuat_ibfk_3` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `loaiban`
--
ALTER TABLE `loaiban`
  ADD CONSTRAINT `loaiban_ibfk_1` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `loaimon`
--
ALTER TABLE `loaimon`
  ADD CONSTRAINT `loaimon_ibfk_1` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`maloaimon`) REFERENCES `loaimon` (`id`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD CONSTRAINT `nhacungcap_ibfk_1` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`ncc`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `phieunhap_ibfk_3` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);

--
-- Các ràng buộc cho bảng `tinhluong`
--
ALTER TABLE `tinhluong`
  ADD CONSTRAINT `tinhluong_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `tinhluong_ibfk_2` FOREIGN KEY (`matc`) REFERENCES `tochuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
