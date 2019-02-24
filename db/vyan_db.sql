-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2019 lúc 11:25 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vyan_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `is_active`, `url`, `title`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(28, '22c7161fdde5f688e01d6c3eb321e631.jpg', 1, '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'Vi Banner 1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-12-27 21:41:17', 'administrator', '2018-12-27 21:41:17', 'administrator', 1),
(29, 'c5b86392acdd5d0a0eec6b449966c05f.jpg', 1, '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'Vi banner 2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-12-27 21:40:46', 'administrator', '2018-12-27 21:40:46', 'administrator', 1),
(30, 'd2b5ba16cee6fc2c591255f9faafb337.jpg', 1, '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'Vi Banner 3', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-12-27 21:53:43', 'administrator', '2018-12-27 21:53:43', 'administrator', 1),
(31, 'a6197903102021897e12ec65476b8d48.jpg', 0, '', 'Vi Banner 4', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2019-01-24 21:55:18', 'administrator', '2019-01-24 21:55:18', 'administrator', 1),
(32, 'de0b26c069c6278762f6ae0380c51ff3.jpg', 0, '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'asda', '', '2019-01-24 21:55:31', 'administrator', '2019-01-24 21:55:31', 'administrator', 1),
(33, '', 0, 'http://phongkhamkinhdo.vn', 'Hậu quả của bệnh trĩ là gì?', 'Hậu quả của bệnh trĩ là gì?', '2019-02-24 16:19:32', 'administrator', '2019-02-24 16:19:32', 'administrator', 1),
(34, '20a58b34e4f1875a2210795a470cee86.jpg', 1, 'http://phongkhamkinhdo.vn', 'Hậu quả của bệnh trĩ là gì?', 'Hậu quả của bệnh trĩ là gì?', '2019-02-24 16:49:34', 'administrator', '2019-02-24 16:49:34', 'administrator', 0),
(35, '7e09dbdfebd4c853d07b9a3ce05ba159.jpg', 1, 'https://hellobacsi.com/', '8 biện pháp khắc phục tại nhà cho bệnh trĩ', '', '2019-02-24 16:58:54', 'administrator', '2019-02-24 16:58:54', 'administrator', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1o20a8q8kvglr2p9nk5vs0rolhpiqjgt', '::1', 1551003715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030333534313b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('2qo42igl43q739m6mpqfmoj49pb7pcqt', '::1', 1551000417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030303431373b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('6atfgg2ejcm87kssv8m8cjdv5b5sc4of', '::1', 1550998900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939383930303b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('a6nhnqc2j4r1imhi2mh0du60nq1ss3u4', '::1', 1550997726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939373732363b6c616e67416262726576696174696f6e7c733a323a227669223b),
('a86nlfa1h7k0qm1p98tga8cb85f0apg4', '::1', 1551002660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030323636303b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('e1j1qb529ea74vanklkjrkenufi7dnlj', '::1', 1551000029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030303032393b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b6d6573736167655f737563636573737c733a32353a225468c3aa6d206de1bb9b69207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d),
('egk3fp3cmga5jkc0590rh331cq0v7e2k', '::1', 1550997733, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939373733333b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('ete784vchscv3aaj6t0914l844ft9bgg', '::1', 1551003239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030333233393b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('h81jabfbrgbauvbl2i9pml5l5j2420k2', '::1', 1551001770, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030313737303b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('haunt5hi1qooiuj99ljkv5u7vncuggkg', '::1', 1550998466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939383436363b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('iq0gp5f776atqoeprluombndue0d9123', '::1', 1550999704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939393730343b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('jbfrefkgd8viapclinjtlffur3ujspok', '::1', 1550999363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939393336333b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('lpd08spvsi2js7fem3t8ib2emo3bnjea', '::1', 1551003541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030333534313b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('mq0bnovba6bmgcun0cg60ije90ogpq50', '::1', 1551001164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030313136343b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('mseems4068edpv9e2fdogbe6ttttfqer', '::1', 1551002204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030323230343b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('q4311jcbt9u9fvmu9n9b7ddjbo3jhqfg', '::1', 1550998084, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535303939383038343b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b),
('vc50op50gbck2djhrb6c8hmna1b8ocj7', '::1', 1551001468, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313030313436383b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353530393338363839223b6c6173745f636865636b7c693a313535303939373733333b6d6573736167655f737563636573737c733a31393a2253e1bbad61207468c3a06e682063c3b46e6721223b5f5f63695f766172737c613a313a7b733a31353a226d6573736167655f73756363657373223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'manager', 'General Manager'),
(3, 'mod', 'General Mod'),
(4, 'members', 'General Members');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iframe` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(10) NOT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tag` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `node_path` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `category_id`, `title`, `slug`, `image`, `description`, `body`, `iframe`, `meta_keywords`, `meta_description`, `is_active`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `tag`, `node_path`) VALUES
(5, 9, 'test', 'test', '8177dc00d4bfe59331b650f35e922d48.jpg', '<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br /><br /><img src=\"http://localhost/vyan/source/1_4.jpg?1550849465545\" alt=\"1_4\" /></p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br /><br /><img src=\"http://localhost/vyan/source/kinh-nghiem-thue-tau-va-du-thuyen-tham-quan-du-lich-kham-pha-vinh-ha-long.jpg?1550849489103\" alt=\"kinh-nghiem-thue-tau-va-du-thuyen-tham-quan-du-lich-kham-pha-vinh-ha-long\" /><br />It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WEUCTs6DnT8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'adasd', 'adasd', 1, 0, 2019, 'administrator', 2019, 'administrator', '[\"Th\\u1eddi gian: 45 ph\\u00fat (*) \",\"H\\u1ed3i ph\\u1ee5c: 5 \\u2013 7 ng\\u00e0y (*)\",\"G\\u00e2y t\\u00ea t\\u1ea1i ch\\u1ed7\",\"Kh\\u00f4ng c\\u1ea7n ngh\\u1ec9 d\\u01b0\\u1ee1ng\"]', '1/5/9'),
(6, 15, 'Hậu quả của bệnh trĩ là gì?', 'hau-qua-cua-benh-tri-la-gi', '', 'aaaaaaaaaaa', '<img src=\"http://localhost/vyan/source/2_2.jpg?1550943741198\" alt=\"2_2\" />', 'aaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaa', 0, 0, 2019, 'administrator', 2019, 'administrator', '[\"aaaaaaaaaa\"]', '1/12/15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(10) NOT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `node_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service_category`
--

INSERT INTO `service_category` (`id`, `title`, `slug`, `parent_id`, `image`, `description`, `meta_keywords`, `meta_description`, `is_active`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `node_path`, `level`) VALUES
(1, 'Beauty Surgeon', 'beauty-surgeon', 0, '743f98785ffc6f97e523de9fa57bf49c.jpg', 'Beauty Surgeon', 'Beauty Surgeon', 'Beauty Surgeon', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/', 0),
(2, 'Skincare &amp; Spa', 'skincare-spa', 0, '60e8097edb9de7753c4554fd491d44a6.jpg', 'Skincare &amp; Spa', 'Skincare & Spa', 'Skincare & Spa', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/2/', 0),
(3, 'Others Care', 'others-care', 0, '35625164c3da66fe4f407a002ef5d070.jpg', 'Others Care', 'Others Care', 'Others Care', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/3/', 0),
(4, 'Thẩm Mỹ Mũi', 'tham-my-mui', 1, '98ee2955cdf8856d3e683b58734d0984.jpg', '<p>Thẩm Mỹ Mũi</p>', 'Thẩm Mỹ Mũi', 'Thẩm Mỹ Mũi', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/4/', 1),
(5, 'Thẩm mỹ mắt', 'tham-my-mat', 1, '821ea3ffbcd2576a5cb3ac6473c46cd0.jpg', '<p>Thẩm mỹ mắt</p>', 'Thẩm mỹ mắt', 'Thẩm mỹ mắt', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/5/', 1),
(9, 'Nâng mũi S line 3D', 'nang-mui-s-line-3d', 4, 'b204271315387394863de47bcb6f2e78.jpg', 'N&acirc;ng mũi S line 3D', 'Nâng mũi S line 3D', 'Nâng mũi S line 3D', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/9/', 2),
(10, '11111111', '11111111', 4, '6c341bee04e5c67b325f449e29fb5155.jpg', '', '', '', 0, 1, 2019, 'administrator', 2019, 'administrator', '0/1/4/10/', 2),
(11, 'Thẩm mỹ khuân mặt', 'tham-my-khuan-mat', 1, 'dc4b5138417ca807f0f1b01095439bde.jpg', 'Thẩm mỹ khu&acirc;n mặt', 'Thẩm mỹ khuân mặt', 'Thẩm mỹ khuân mặt', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/11/', 1),
(12, 'Thẩm mỹ vóc dáng', 'tham-my-voc-dang', 1, 'ac206fe6e8c377002b5a203ede171caa.jpg', 'Thẩm mỹ v&oacute;c d&aacute;ng', 'Thẩm mỹ vóc dáng', 'Thẩm mỹ vóc dáng', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/12/', 1),
(13, 'Cắt mí mắt PLASMA', 'cat-mi-mat-plasma', 5, '1aaff0c64295c59f1c3db057828aacaf.jpg', 'Cắt m&iacute; mắt PLASMA', 'Cắt mí mắt PLASMA', 'Cắt mí mắt PLASMA', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/5/13/', 2),
(14, 'Thẩm mỹ khuôn mặt 3D', 'tham-my-khuon-mat-3d', 11, '8971a583f1287bbf6e655e0ee47296ff.jpg', 'Thẩm mỹ khu&ocirc;n mặt 3D', 'Thẩm mỹ khuôn mặt 3D', 'Thẩm mỹ khuôn mặt 3D', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/14/', 2),
(15, 'Thẩm mỹ vòng 1 Nano', 'tham-my-vong-1-nano', 12, '83d50e6b0dbcce8b85cd82afdc017dd5.jpg', 'Thẩm mỹ v&ograve;ng 1 Nano', 'Thẩm mỹ vòng 1 Nano', 'Thẩm mỹ vòng 1 Nano', 0, 0, 2019, 'administrator', 2019, 'administrator', '0/1/12/15/', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `address`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1550997733, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL),
(26, '::1', 'mod', '$2y$08$zY2Mi2asgCa3BMqFE7AoAONl3xj3Y/EptWdbwl0qdLhtxcOMKdCQy', NULL, 'mod@mod.com', NULL, NULL, NULL, NULL, 1544965531, 1547744767, 1, 'Minh', 'MinhMod', NULL, NULL, NULL),
(28, '::1', 'modmod', '$2y$08$.xyBML8PCdZwOEwCzLnFi.oUWp.tJXJM04ti/8RD201uGpbHIgyEi', NULL, 'mod@gmail.com', NULL, NULL, NULL, NULL, 1545235689, 1545235700, 0, 'mod', 'mod', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(27, 26, 3),
(29, 28, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
