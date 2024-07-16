-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2024 at 03:08 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopndto_sooprsdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_roles`
--

CREATE TABLE `access_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_menu_ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='access control roles ';

--
-- Dumping data for table `access_roles`
--

INSERT INTO `access_roles` (`id`, `role_name`, `access_menu_ids`, `status`, `created_at`) VALUES
(1, 'Super Admin', '1,2,44,46,55', 1, '2022-07-25 16:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_mobile` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_role` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_email`, `user_mobile`, `password`, `user_role`, `status`, `created_at`) VALUES
(3, 'Super Admin', 'admin@gmail.com', '22222222222', '12345678', 1, 1, '2022-02-11 17:12:00'),
(4, 'vinay', 'vny.009@gmail.com', '', '$2y$10$FBSg8J7e0xOxCTVEOnAAIeX/RtyYPFBff34HqBzHdbNFz1Dc2pxy.', 1, 1, '2022-02-16 16:49:16'),
(5, 'super', 'super@email.com ', '1234567890', '$2b$10$YRCCuHb0M7tgPah8wNSLOO92f/D.eh71VF1dK2KNEMWeof5rTbEnq', 1, 0, '2022-09-02 11:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `category_menu_id` int(11) DEFAULT NULL,
  `menu_label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='admin menu';

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `category_menu_id`, `menu_label`, `menu_url`, `sort_order`, `created_at`) VALUES
(1, 0, 'Enquiry', '#', 0, '2021-08-19 10:45:24'),
(2, 1, 'Enquiry List', 'userlist', 0, '2021-08-19 10:46:53'),
(44, 0, 'Services', '#', 1, NULL),
(46, 44, 'View All Services', 'all_events', 0, NULL),
(55, 44, 'Create Service', 'create_event', 0, '2022-03-16 17:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`, `updated_at`) VALUES
(16, '65e1634d14131banner1_bs8hwn.webp', '2024-02-29 23:40:37', '2024-02-29 23:40:37'),
(17, '65e1638b37086banner-2_muq6wi.webp', '2024-02-29 23:41:39', '2024-02-29 23:41:39'),
(18, '65e163961a2cbbanner-3_v2jg1f.webp', '2024-02-29 23:41:50', '2024-02-29 23:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_queries`
--

CREATE TABLE `contact_us_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us_queries`
--

INSERT INTO `contact_us_queries` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'sandy', 'smsunny@gmail.com', '89012778889', '2024-03-01 05:23:42', NULL),
(2, 'sandeep', 'smsunnythefunnyy@gmail.com', '7894561236', '2024-03-01 05:27:42', NULL),
(3, 'sandeep', 'smsunnythefunnyy@gmail.com', '', '2024-03-01 05:27:54', NULL),
(4, 'sandeep', 'smsunnythefunnyy@gmail.com', '', '2024-03-01 05:28:42', NULL),
(5, 'sandy', '', '8901277889', '2024-03-01 05:32:20', NULL),
(6, 'qwertyu', 'qwerty@gmail.com', '8954857689', '2024-03-07 12:43:10', NULL),
(7, 'Amin Ahmed', 'amin@bdcalling.com', '+8801730876997', '2024-03-10 07:16:09', NULL),
(8, 'Mr. MAK', 'cinemasterystudios@gmail.com', '+19018780262', '2024-03-23 15:45:01', NULL),
(9, 'Mr. MAK', 'cinemasterystudios@gmail.com', '+19018780262', '2024-03-23 15:47:19', NULL),
(10, 'Mr. MAK', 'cinemasterystudios@gmail.com', '+19018780262', '2024-03-23 15:51:32', NULL),
(11, 'Ganesh kamath', 'gnkamat1968@gmail.com', '+916374567546', '2024-04-06 06:35:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `professional_id`, `credits`, `created_at`, `updated_at`) VALUES
(1, 2, 140, '2023-05-18 12:16:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_history`
--

CREATE TABLE `credit_history` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `credit_value` float DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for professional credit history';

--
-- Dumping data for table `credit_history`
--

INSERT INTO `credit_history` (`id`, `professional_id`, `credit_value`, `remarks`, `credit_date`) VALUES
(1, 1, -25, 'debit', '2023-06-06 18:02:25'),
(2, 2, 25, 'credit from sooprs offer', '2023-06-06 18:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Customer table for Sooprs';

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `mobile`, `city`, `image`, `updated_at`, `password`, `created_at`) VALUES
(1, 'Sandeep Mahesh', 'smsunnythefunny@gmail.com', '8901277889', 'Gurgaon', 'https://sooprs.com/sooprss/assets/files/64e4aa6d77655-1692707437.png', NULL, '$2y$10$Z4e7mSc1suYwe5PC4NVU8.UPp37ASA4goK5PLsyvocC6G.3dF4OZe', '2023-07-19 02:09:56'),
(2, 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL, '', '2023-08-23 07:44:37'),
(3, 'Gokul', 'gnoi45@gmail.com', '9523558483', 'Gurugram', NULL, NULL, '$2y$10$to7nDhNVsr6B7bNO0qvPJeJDyOa64tq08nNbiMl6vaKRUDv9M/fye', '2023-08-31 08:45:45'),
(4, 'Deepak Customer', 'sandeep.meh28@gmail.com', '7894561238', NULL, NULL, NULL, '$2y$10$hwPfETLt0fn2s6bd6o8LnefEDc8aTEBFATaFYf8HhuM0sKUYw57l2', '2023-09-11 06:53:42'),
(18, 'Shazam Cust', 'sunnythesandy@gmail.com', '5623562653', NULL, NULL, NULL, '$2y$10$dic895bhMWbBYAUdACkDCun1xrUbW//UmMYZJVDriYzpH6hsFKluS', '2023-09-11 11:54:48'),
(24, 'Customer2023', 'cust1234@gmail.com', '8700968756', NULL, NULL, NULL, '', '2023-10-04 07:29:49'),
(25, 'Customer2023', 'cust12345@gmail.com', '8700968766', NULL, NULL, NULL, '', '2023-10-04 07:33:26'),
(26, 'Customer2023', 'cust999@gmail.com', '8700962548', NULL, NULL, NULL, '', '2023-10-04 07:34:04'),
(27, 'Customer2023', 'cust9099@gmail.com', '8700234589', NULL, NULL, NULL, '', '2023-10-04 07:35:56'),
(28, 'Customer2023', 'gokul@x.com', '9898980909', NULL, NULL, NULL, '', '2023-10-04 12:55:29'),
(29, 'anurag', 'sanurag002@gmail.com', '989890998', 'city', NULL, NULL, '', '2023-10-05 06:46:49'),
(30, 'Gokul', 'gokul@techninza.in', '9090898909', NULL, 'https://sooprs.com/sooprss/assets/files/651e5d429ffe6-1696488770.png', NULL, '$2y$10$MDiT/azLwboLndAUOb1bae9qekRc3YzgjmITTKP8MGINKpUdxZ84G', '2023-10-05 06:50:42'),
(31, 'Digital Customer', 'digital@gmail.com', '456245798', 'manesar', NULL, NULL, '', '2023-10-05 09:50:32'),
(32, 'mmmmmmmmmmmmm', 'mmmmmmmmm@gmail.com', '4488448877', 'mmmmmmmm', NULL, NULL, '', '2023-10-05 09:53:10'),
(33, 'DC Enquiry', 'dcenq@gmail.com', '8901999999', 'masoori', NULL, NULL, '', '2023-10-05 10:15:41'),
(34, 'JCB Kumar', 'jcb@gmail.com', '8946894689', 'gurugram', NULL, NULL, '', '2023-10-05 10:24:43'),
(35, 'dddddddddddd', 'ddddddd@gmail.com', '8888787878', 'nnnnnnnnn', NULL, NULL, '', '2023-10-05 10:27:06'),
(36, 'qqwwqerwrewrw', 'fdewfwe@gmail.com', '4546454645', 'vhgvfjhyv', NULL, NULL, '', '2023-10-05 10:30:01'),
(37, 'vfsdvbgfdbgfb', 'bdgbds@gmail.com', '1245689758', 'cdscwed', NULL, NULL, '', '2023-10-05 10:32:11'),
(38, 'Hybrid Yadav', 'hybrid@gmail.com', '4566544566', 'hybrid city', NULL, NULL, '', '2023-10-05 10:48:58'),
(39, 'Customer2023', 'asdfg@gmail.com', '1234567890', NULL, NULL, NULL, '', '2023-10-05 12:04:29'),
(40, 'customer', 'customer@gmail.com', '9090909292', NULL, NULL, NULL, '$2y$10$CloznNUunjW9HUyURurSheB5kdsiD4LxTe9AOkOpeKZuV1Iw3ycRu', '2023-10-05 12:41:01'),
(41, 'Customer2023', 'vny.009@gmail.com', '8375910558', NULL, NULL, NULL, '', '2023-10-09 06:04:16'),
(42, 'Customer2023', 'sandeepmehandia2@gmail.com', '5623562356', NULL, NULL, NULL, '', '2023-10-13 12:57:55'),
(43, 'Anurag Chauhan', 'sanurag0022@gmail.com', '8077556071', NULL, NULL, NULL, '$2y$10$KKLkTHgkCzggQlTevdVwaOTOISV5VWMlYBR1Pmb32JeSzgHK.ePxC', '2023-10-17 12:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer_query`
--

CREATE TABLE `customer_query` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '0-not-assigned,1-assigned,2-completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_query`
--

INSERT INTO `customer_query` (`id`, `lead_id`, `customer_id`, `service_id`, `question`, `answer`, `status`) VALUES
(313, 109, 15, 1, 'What do you need developing?', 'A new website', 0),
(314, 109, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(315, 109, 15, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(316, 109, 15, 1, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(333, 115, 15, 1, 'What do you need developing?', 'A new website', 0),
(334, 115, 15, 1, 'What type of website do you want developed?', 'Large Business', 0),
(335, 115, 15, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(336, 115, 15, 1, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(337, 116, 15, 1, 'What do you need developing?', 'A new website', 0),
(338, 116, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(339, 116, 15, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(340, 116, 15, 1, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(341, 117, 17, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(342, 117, 17, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(343, 117, 17, 2, 'What type of project is this?', 'Application - business', 0),
(344, 118, 59, 1, 'What do you need developing?', 'A new website', 0),
(345, 118, 59, 1, 'What type of website do you want developed?', 'Large Business', 0),
(346, 118, 59, 1, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(347, 118, 59, 1, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(348, 119, 59, 1, 'What do you need developing?', 'A new website', 0),
(349, 119, 59, 1, 'What type of website do you want developed?', 'small business', 0),
(350, 119, 59, 1, 'What is your approximate monthly budget?', 'I would Like to discuss this with the pro', 0),
(351, 119, 59, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(352, 120, 15, 2, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(353, 120, 15, 2, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(354, 120, 15, 2, 'What type of project is this?', 'Application - business', 0),
(355, 121, 59, 2, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(356, 121, 59, 2, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(357, 121, 59, 2, 'What type of project is this?', 'Application - business', 0),
(358, 122, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(359, 123, 59, 1, 'What do you need developing?', 'A new website', 0),
(360, 123, 59, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(361, 123, 59, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(362, 123, 59, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(363, 124, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(364, 125, 60, 2, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(365, 125, 60, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(366, 125, 60, 2, 'What type of project is this?', 'Application - social media', 0),
(367, 126, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(368, 127, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(369, 128, 61, 2, 'What type of project is this?', 'Plug-in', 0),
(370, 129, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(371, 130, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(372, 131, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(373, 132, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(374, 133, 59, 2, 'What type of project is this?', 'Plug-in', 0),
(375, 134, 61, 2, 'What type of project is this?', 'Plug-in', 0),
(376, 135, 62, 2, 'What type of project is this?', 'Plug-in', 0),
(377, 136, 63, 2, 'What type of project is this?', 'Plug-in', 0),
(378, 137, 61, 2, 'What type of project is this?', 'Plug-in', 0),
(379, 138, 64, 1, 'What do you need developing?', 'A new website', 0),
(380, 138, 64, 1, 'What type of website do you want developed?', 'small business', 0),
(381, 138, 64, 1, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(382, 138, 64, 1, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(383, 139, 63, 1, 'What do you need developing?', 'Update to an existing website', 0),
(384, 139, 63, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(385, 139, 63, 1, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(386, 139, 63, 1, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(387, 140, 59, 5, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(388, 140, 59, 5, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(389, 140, 59, 5, 'Which Digital Marketing Service do you need?', 'Search Engine Optimization (SEO)', 0),
(390, 141, 65, 2, 'What type of project is this?', 'Plug-in', 0),
(391, 142, 61, 2, 'What type of project is this?', 'Plug-in', 0),
(392, 143, 66, 2, 'What type of project is this?', 'Plug-in', 0),
(393, 144, 62, 2, 'What type of project is this?', 'Plug-in', 0),
(394, 145, 67, 2, 'What type of project is this?', 'Plug-in', 0),
(395, 146, 68, 2, 'What type of project is this?', 'Plug-in', 0),
(396, 147, 69, 2, 'What type of project is this?', 'Plug-in', 0),
(397, 148, 70, 2, 'What type of project is this?', 'Plug-in', 0),
(398, 149, 71, 2, 'What type of project is this?', 'Plug-in', 0),
(399, 150, 72, 2, 'What type of project is this?', 'Plug-in', 0),
(400, 151, 73, 2, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(401, 151, 73, 2, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(402, 151, 73, 2, 'What type of project is this?', 'Application - game', 0),
(403, 152, 74, 20, 'What is your approximate monthly budget?', 'I would Like to discuss this with the pro', 0),
(404, 152, 74, 20, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(405, 152, 74, 20, 'What type of project is this?', 'Application - game', 0),
(406, 153, 75, 2, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(407, 153, 75, 2, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(408, 153, 75, 2, 'What type of project is this?', 'Application - game', 0),
(409, 154, 19, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(410, 154, 19, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(411, 154, 19, 2, 'What type of project is this?', 'Application - business', 0),
(412, 155, 76, 2, 'What is your approximate monthly budget?', 'I would Like to discuss this with the pro', 0),
(413, 155, 76, 2, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(414, 155, 76, 2, 'What type of project is this?', 'Application - business', 0),
(415, 156, 77, 2, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(416, 156, 77, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(417, 156, 77, 2, 'What type of project is this?', 'Application - other', 0),
(418, 157, 16, 1, 'What do you need developing?', 'A new website', 0),
(419, 157, 16, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(420, 157, 16, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(421, 157, 16, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(422, 158, 78, 1, 'What do you need developing?', 'A new website', 0),
(423, 158, 78, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(424, 158, 78, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(425, 158, 78, 1, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(426, 159, 76, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(427, 159, 76, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(428, 159, 76, 2, 'What type of project is this?', 'Application - mobile commerce', 0),
(429, 160, 17, 1, 'What do you need developing?', 'A new website', 0),
(430, 160, 17, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(431, 160, 17, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(432, 160, 17, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(433, 161, 79, 1, 'What do you need developing?', 'A new website', 0),
(434, 161, 79, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(435, 161, 79, 1, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(436, 161, 79, 1, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(437, 162, 80, 1, 'What do you need developing?', 'A new website', 0),
(438, 162, 80, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(439, 162, 80, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(440, 162, 80, 1, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(441, 163, 15, 2, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(442, 163, 15, 2, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(443, 163, 15, 2, 'What type of project is this?', 'Application - business', 0),
(444, 164, 81, 5, 'What is your approximate monthly budget?', '50k-99k', 0),
(445, 164, 81, 5, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(446, 164, 81, 5, 'Which Digital Marketing Service do you need?', 'Social Media Marketing (SMM)', 0),
(447, 165, 82, 5, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(448, 165, 82, 5, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(449, 165, 82, 5, 'Which Digital Marketing Service do you need?', 'Paid Ads (PPC)', 0),
(450, 166, 83, 5, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(451, 166, 83, 5, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(452, 166, 83, 5, 'Which Digital Marketing Service do you need?', 'Paid Ads (PPC)', 0),
(453, 167, 84, 5, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(454, 167, 84, 5, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(455, 167, 84, 5, 'Which Digital Marketing Service do you need?', 'Paid Ads (PPC)', 0),
(456, 168, 85, 5, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(457, 168, 85, 5, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(458, 168, 85, 5, 'Which Digital Marketing Service do you need?', 'All Marketing Services', 0),
(459, 169, 59, 5, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(460, 169, 59, 5, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(461, 169, 59, 5, 'Which Digital Marketing Service do you need?', 'Social Media Marketing (SMM)', 0),
(462, 170, 86, 5, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(463, 170, 86, 5, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(464, 170, 86, 5, 'Which Digital Marketing Service do you need?', 'Search Engine Optimization (SEO)', 0),
(465, 171, 87, 1, 'What do you need developing?', 'A new website', 0),
(466, 171, 87, 1, 'What type of website do you want developed?', 'small business', 0),
(467, 171, 87, 1, 'What is your approximate monthly budget?', 'I am not sure', 0),
(468, 171, 87, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(469, 172, 88, 2, 'What is your approximate monthly budget?', 'I would Like to discuss this with the pro', 0),
(470, 172, 88, 2, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(471, 172, 88, 2, 'What type of project is this?', 'Application - social media', 0),
(472, 173, 89, 2, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(473, 173, 89, 2, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(474, 173, 89, 2, 'What type of project is this?', 'Application - game', 0),
(475, 174, 89, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(476, 174, 89, 2, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(477, 174, 89, 2, 'What type of project is this?', 'Application - game', 0),
(478, 175, 90, 2, 'What is your approximate monthly budget?', 'I am not sure', 0),
(479, 175, 90, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(480, 175, 90, 2, 'What type of project is this?', 'Application - game', 0),
(481, 176, 91, 1, 'What do you need developing?', 'A new website', 0),
(482, 176, 91, 1, 'What type of website do you want developed?', 'small business', 0),
(483, 176, 91, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(484, 176, 91, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(485, 177, 92, 1, 'What do you need developing?', 'A new website', 0),
(486, 177, 92, 1, 'What type of website do you want developed?', 'small business', 0),
(487, 177, 92, 1, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(488, 177, 92, 1, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(489, 178, 93, 20, 'What is your approximate monthly budget?', 'I am not sure', 0),
(490, 178, 93, 20, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(491, 178, 93, 20, 'What type of project is this?', 'Application - game', 0),
(492, 179, 94, 2, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(493, 179, 94, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(494, 179, 94, 2, 'What type of project is this?', 'Application - other', 0),
(495, 180, 15, 2, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(496, 180, 15, 2, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(497, 180, 15, 2, 'What type of project is this?', 'Application - game', 0),
(498, 181, 95, 2, 'What is your approximate monthly budget?', 'I am not sure', 0),
(499, 181, 95, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(500, 181, 95, 2, 'What type of project is this?', 'Application - business', 0),
(501, 182, 96, 1, 'What do you need developing?', 'A new website', 0),
(502, 182, 96, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(503, 182, 96, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(504, 182, 96, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(505, 183, 97, 2, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(506, 183, 97, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(507, 183, 97, 2, 'What type of project is this?', 'Application - business', 0),
(508, 184, 98, 2, 'What is your approximate monthly budget?', 'I am not sure', 0),
(509, 184, 98, 2, 'How likely are you to make a hiring decision?', 'I am planning and researching', 0),
(510, 184, 98, 2, 'What type of project is this?', 'Application - game', 0),
(511, 185, 99, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(512, 185, 99, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(513, 185, 99, 2, 'What type of project is this?', 'Application - other', 0),
(514, 186, 100, 2, 'What is your approximate monthly budget?', 'I am not sure', 0),
(515, 186, 100, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(516, 186, 100, 2, 'What type of project is this?', 'Application - business', 0),
(517, 187, 101, 20, 'What is your approximate monthly budget?', 'I am not sure', 0),
(518, 187, 101, 20, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(519, 187, 101, 20, 'What type of project is this?', 'Application - game', 0),
(520, 188, 102, 5, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(521, 188, 102, 5, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(522, 188, 102, 5, 'Which Digital Marketing Service do you need?', 'All Marketing Services', 0),
(523, 189, 103, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(524, 189, 103, 2, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(525, 189, 103, 2, 'What type of project is this?', 'Application - mobile commerce', 0),
(526, 190, 104, 2, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(527, 190, 104, 2, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(528, 190, 104, 2, 'What type of project is this?', 'Application - game', 0),
(529, 191, 105, 1, 'What do you need developing?', 'A new website', 0),
(530, 191, 105, 1, 'What type of website do you want developed?', 'I would like to discuss this with professional', 0),
(531, 191, 105, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(532, 191, 105, 1, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(533, 192, 15, 1, 'What do you need developing?', 'A new website', 0),
(534, 192, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(535, 192, 15, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(536, 192, 15, 1, 'How likely are you to make a hiring decision?', 'I am likely to hire someone', 0),
(537, 194, 15, 1, 'What do you need developing?', 'A new website', 0),
(538, 194, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(539, 194, 15, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(540, 194, 15, 1, 'How likely are you to make a hiring decision?', 'I am definitely going to hire someone', 0),
(541, 195, 15, 1, 'What do you need developing?', 'A new website', 0),
(542, 195, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(543, 195, 15, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(544, 195, 15, 1, 'How likely are you to make a hiring decision?', 'I will possibly hire someone', 0),
(545, 196, 60, 1, 'What do you need developing?', 'A new website', 0),
(546, 196, 60, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(547, 196, 60, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(548, 196, 60, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(549, 197, 15, 1, 'What do you need developing?', 'A new website', 0),
(550, 197, 15, 1, 'What type of website do you want developed?', 'Ecommerce', 0),
(551, 197, 15, 1, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(552, 197, 15, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(553, 198, 1, 1, 'What do you need developing?', 'A new website', 0),
(554, 198, 1, 1, 'What type of website do you want developed?', 'Bespoke/custom', 0),
(555, 198, 1, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(556, 198, 1, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(557, 199, 1, 1, 'What do you need developing?', 'A new website', 0),
(558, 199, 1, 1, 'What type of website do you want developed?', 'Bespoke/custom', 0),
(559, 199, 1, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(560, 199, 1, 1, 'How likely are you to make a hiring decision?', 'I am ready to hire now', 0),
(561, 200, 1, 0, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(562, 201, 1, 0, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(563, 202, 1, 0, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(564, 203, 1, 0, 'What is your approximate monthly budget?', '50k-99k', 0),
(565, 204, 1, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(566, 205, 1, 0, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(567, 206, 1, 0, 'What is your approximate monthly budget?', '50k-99k', 0),
(568, 206, 1, 0, 'What type of project is this?', 'Plug-in', 0),
(569, 207, 1, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(570, 208, 1, 1, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(571, 209, 1, 1, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(572, 210, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(573, 211, 1, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(574, 211, 1, 2, 'What type of project is this?', 'Application - game', 0),
(575, 212, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(576, 213, 1, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(577, 214, 1, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(578, 215, 2, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(579, 216, 2, 4, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(580, 216, 2, 4, 'What type of project is this?', 'Application - social media', 0),
(581, 217, 1, 2, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(582, 217, 1, 2, 'What type of project is this?', 'Application - business', 0),
(583, 218, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(584, 219, 2, 1, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(585, 220, 2, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(586, 221, 2, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(587, 222, 1, 2, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(588, 222, 1, 2, 'What type of project is this?', 'Application - utility', 0),
(589, 223, 3, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(590, 224, 2, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(591, 225, 2, 2, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(592, 225, 2, 2, 'What type of project is this?', 'Application - game', 0),
(593, 226, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(594, 244, 1, 2, 'What is your approximate monthly budget?', '50k-99k', 0),
(595, 244, 1, 2, 'What type of project is this?', 'Application - business', 0),
(596, 247, 3, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(597, 248, 29, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(598, 249, 2, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(599, 250, 2, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(600, 251, 2, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(601, 252, 2, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(602, 253, 30, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(603, 254, 3, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(604, 255, 1, 2, 'What is your budget for the project?', 'Less than ₹1 Lakh', 0),
(605, 256, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(606, 257, 4, 2, 'What is your budget for the project?', '₹2.5 - ₹4.9 Lakhs', 0),
(607, 258, 31, 5, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(608, 258, 31, 5, 'Which Digital Marketing Service do you need?', 'Search Engine Optimization (SEO)', 0),
(609, 259, 32, 5, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(610, 259, 32, 5, 'Which Digital Marketing Service do you need?', 'Social Media Marketing (SMM)', 0),
(611, 260, 33, 5, 'What is your approximate monthly budget?', '50k-99k', 0),
(612, 260, 33, 5, 'Which Digital Marketing Service do you need?', 'Paid Ads (PPC)', 0),
(613, 261, 33, 5, 'What is your approximate monthly budget?', '50k-99k', 0),
(614, 261, 33, 5, 'Which Digital Marketing Service do you need?', 'Social Media Marketing (SMM)', 0),
(615, 262, 34, 2, 'What is your budget for the project?', '₹1- ₹2.49 Lakhs\r\n', 0),
(616, 262, 34, 2, 'Which Digital Marketing Service do you need?', 'Search Engine Optimization (SEO)', 0),
(617, 263, 35, 2, 'What is your budget for the project?', '₹2.5 - ₹4.9 Lakhs', 0),
(618, 264, 36, 2, 'What is your budget for the project?', '₹1- ₹2.49 Lakhs\r\n', 0),
(619, 265, 37, 1, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(620, 266, 38, 1, 'What is your approximate monthly budget?', 'More than 25 Lakhs', 0),
(621, 270, 40, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(622, 271, 1, 0, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(623, 272, 1, 0, 'What is your budget for the project?', '₹1- ₹2.49 Lakhs\r\n', 0),
(624, 273, 1, 0, 'What is your approximate monthly budget?', '2.5-4.9 Lakh', 0),
(625, 274, 1, 0, 'What is your approximate monthly budget?', '10-24.9 Lakh', 0),
(626, 275, 1, 0, 'What is your budget for the project?', '₹5 - ₹9.9 Lakhs ', 0),
(627, 276, 1, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(628, 277, 1, 1, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(629, 278, 1, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(630, 279, 3, 2, 'What is your budget for the project?', '₹1- ₹2.49 Lakhs\r\n', 0),
(631, 301, 3, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(632, 302, 253, 1, 'What is your approximate monthly budget?', 'Less than 50k', 0),
(633, 303, 253, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(634, 304, 253, 1, 'What is your approximate monthly budget?', '5-9.9 Lakh', 0),
(635, 305, 253, 1, 'What is your approximate monthly budget?', '1-2.49 Lakhs', 0),
(636, 306, 253, 7, 'What is your approximate monthly budget for SEO?', 'Less than ₹10k', 0),
(637, 308, 253, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(638, 309, 256, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(639, 310, 257, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(640, 311, 257, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(641, 312, 257, 1, 'What is your approximate monthly budget?', '50k-99k', 0),
(642, 313, 257, 2, 'What is your budget for the project?', '₹1- ₹2.49 Lakhs\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cust_prof_chats`
--

CREATE TABLE `cust_prof_chats` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) DEFAULT NULL,
  `cust_id` varchar(255) DEFAULT NULL,
  `prof_id` varchar(255) DEFAULT NULL,
  `message` text,
  `reply` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_prof_chats`
--

INSERT INTO `cust_prof_chats` (`id`, `lead_id`, `cust_id`, `prof_id`, `message`, `reply`, `status`, `created_at`, `updated_at`, `bid_id`) VALUES
(19, '425', 'sandip-kumar', '', 'Hello, hey there, Sandip this side.', '', 0, '2023-12-16 12:26:25', NULL, 52),
(26, '426', 'sandip-kumar', '', 'ZXCZXC', '', 1, '2023-12-18 10:42:28', NULL, 53),
(32, '429', 'sandip-kumar', '', 'hi', '', 1, '2023-12-20 11:10:43', NULL, 56),
(33, '432', 'sandip-kumar', '', 'hey', '', 1, '2023-12-20 11:47:35', NULL, 60),
(35, '433', 'sandip-kumar', '', 'hi', '', 1, '2023-12-21 05:25:18', NULL, 61),
(37, '439', 'sandip-kumar', '', 'Hi Gokul', '', 1, '2023-12-22 17:09:23', NULL, 67),
(55, '441', 'sandip-kumar', '', 'hhhhhhhhhhhhh', '', 1, '2023-12-26 12:21:21', NULL, 69),
(56, '441', 'sandeep-mehandia', '', 'dffffffffffff', '', 1, '2023-12-26 12:21:57', NULL, 69),
(57, '441', 'sandip-kumar', '', 'vgbhgbhgnhg', '', 0, '2023-12-26 12:23:54', NULL, 69),
(58, '445', 'sandip-kumar', '', 'hi there?', '', 0, '2023-12-26 18:13:20', NULL, 73),
(59, '445', 'sandeep-mehandia', '387', 'Hello, how are you?\r\n', '', 0, '2023-12-27 06:23:54', NULL, 73),
(60, '445', 'sandip-kumar', '', 'hi sir', '', 0, '2023-12-27 06:37:15', NULL, 73),
(61, '445', 'sandeep-mehandia', '387', 'hello', '', 1, '2023-12-27 06:37:30', NULL, 73),
(62, '445', 'sandip-kumar', '387', 'where are you?', '', 1, '2023-12-27 07:10:46', NULL, 73),
(63, '445', 'sandeep-mehandia', '387', 'qwerty', '', 0, '2023-12-27 07:19:01', NULL, 73),
(64, '445', 'sandip-kumar', '387', 'i also qwerty', '', 0, '2023-12-27 07:19:32', NULL, 73),
(65, '445', 'sandip-kumar', '387', 'I have some doubts .', '', 1, '2023-12-27 07:26:19', NULL, 73),
(66, '445', 'sandip-kumar', '387', 'ggg', '', 0, '2023-12-27 07:30:57', NULL, 73),
(67, '445', 'sandip-kumar', '387', 'fffff', '', 1, '2023-12-27 07:34:07', NULL, 73),
(68, '445', 'sandip-kumar', '356', 'hi hello', '', 1, '2023-12-27 07:52:14', NULL, 73),
(69, '445', 'sandeep-mehandia', '356', 'hello hii hii', '', 1, '2023-12-27 07:52:38', NULL, 73),
(70, '445', 'sandip-kumar', '356', 'hiiiiiiiiiiiiiiiiiiiiiiiiiii', '', 1, '2023-12-27 08:18:11', NULL, 73),
(71, '445', 'sandeep-mehandia', '387', 'hihiihihihihiiii', '', 1, '2023-12-27 08:18:48', NULL, 73),
(72, '445', 'sandip-kumar', '356', 'cbhudwflbcw rfhigler', '', 1, '2023-12-27 08:22:05', NULL, 73),
(73, '445', 'sandip-kumar', '356', 'nvjkw;av jighetngijpqe ', '', 1, '2023-12-27 08:24:49', NULL, 73),
(74, '445', 'sandeep-mehandia', '387', 'cxbvc nnb nb vh', '', 1, '2023-12-27 08:25:12', NULL, 73),
(75, '444', 'sandip-kumar', '356', 'hello', '', 1, '2023-12-27 09:57:36', NULL, 72),
(76, '446', 'anubhav', '0', 'dsfgdsfg', '', 1, '2023-12-27 10:33:56', NULL, 74),
(77, '446', 'vishal', '389', 'sdfgsdfgsdfg', '', 1, '2023-12-27 10:34:25', NULL, 74),
(78, '446', 'anubhav', '0', 'ghjfghj', '', 0, '2023-12-27 10:34:48', NULL, 74),
(79, '447', 'vishal-customer', '391', 'asdfasdfasdf', '', 1, '2023-12-27 10:59:34', NULL, 75),
(80, '447', 'rahul-professional', '390', 'asdf', '', 1, '2023-12-27 10:59:46', NULL, 75),
(81, '449', 'sandip-kumar', '356', 'hello there', '', 1, '2023-12-27 16:33:35', NULL, 76),
(82, '449', 'sandeep-mehandia', '387', 'hi', '', 0, '2023-12-27 16:33:51', NULL, 76),
(83, '449', 'sandip-kumar', '356', 'thanks you\r\n', '', 1, '2023-12-27 16:34:07', NULL, 76),
(84, '450', '400', '399', 'Hi, I am testing', '', 1, '2023-12-30 11:09:27', NULL, 78),
(85, '450', '399', '400', 'hasdf', '', 0, '2023-12-30 11:09:57', NULL, 78),
(86, '452', '402', '391', 'hi', '', 0, '2024-01-05 06:08:18', NULL, 80),
(87, '452', '391', '402', 'hello', '', 0, '2024-01-05 12:17:53', NULL, 80),
(88, '452', '391', '402', 'may I?', '', 0, '2024-01-05 12:24:19', NULL, 80),
(89, '452', '391', '402', 'ask you something?\r\n', '', 0, '2024-01-05 12:25:43', NULL, 80),
(90, '452', '402', '391', 'yes', '', 0, '2024-01-05 12:33:36', NULL, 80),
(91, '452', '402', '391', 'you may', '', 0, '2024-01-05 12:40:11', NULL, 80),
(92, '452', '391', '402', 'ok, so the doubt is....', '', 1, '2024-01-05 12:58:40', NULL, 80),
(93, '452', '402', '391', 'yes ask please', '', 1, '2024-01-05 13:02:01', NULL, 80),
(94, '452', '391', '402', 'do you have any knowledge about coding?', '', 1, '2024-01-05 13:03:31', NULL, 80),
(95, '452', '402', '391', 'no much but yes, I have a little knowledge ', '', 1, '2024-01-05 13:17:32', NULL, 80),
(96, '452', '391', '402', 'htrhth', '', 0, '2024-01-05 13:31:22', NULL, 80),
(97, '452', '391', '402', 'xctyj', '', 0, '2024-01-06 05:37:12', NULL, 80),
(98, '463', '391', '410', 'hiiii', '', 0, '2024-01-06 07:54:21', NULL, 82),
(99, '463', '410', '391', 'hello', '', 0, '2024-01-06 07:55:00', NULL, 82),
(100, '463', '391', '410', 'ioggklk;jhvh;k;#$', '', 0, '2024-01-06 07:55:36', NULL, 82),
(101, '463', '410', '397', 'hello\r\n', '', 0, '2024-01-06 08:03:57', NULL, 83),
(102, '463', '397', '410', 'hiiii', '', 0, '2024-01-06 08:04:24', NULL, 83),
(103, '464', '412', '413', 'hi', '', 0, '2024-01-07 07:43:30', NULL, 88),
(104, '464', '413', '412', 'hey', '', 0, '2024-01-07 07:43:47', NULL, 88),
(105, '464', '412', '413', 'I can give you 500 USD Only', '', 0, '2024-01-07 07:44:06', NULL, 88),
(106, '464', '413', '412', 'ok pls give it', '', 0, '2024-01-07 07:44:25', NULL, 88),
(107, '542', '517', '412', 'Hello,\r\nWe are experts in Laravel Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.\r\n', '', 1, '2024-02-27 06:09:04', NULL, 453),
(108, '542', '509', '412', 'Hello Sir,\r\nWe would be very glad to help you with your web development project. When can we discuss this?', '', 1, '2024-02-29 10:15:38', NULL, 445),
(109, '543', '509', '498', 'Hello Sir,\r\nWe hope you are well.\r\nWe would be very glad to help you with your application development project. When can we discuss this?', '', 1, '2024-02-29 10:17:19', NULL, 446),
(110, '541', '509', '412', 'Hello Sir,\r\nWe hope you are well.\r\nWe would be very glad to help you with your software development project. Please let us know when can we discuss this.', '', 1, '2024-02-29 10:20:30', NULL, 447),
(111, '541', '542', '412', 'HI can i help you in this project\r\n', '', 1, '2024-03-12 12:00:08', NULL, 480),
(112, '554', '549', '548', 'Hello?', '', 1, '2024-03-12 13:07:25', NULL, 487),
(113, '551', '549', '534', 'Hello?', '', 1, '2024-03-12 13:08:47', NULL, 488),
(114, '558', '418', '548', '9876543210 contact  me', '', 1, '2024-03-15 11:41:52', NULL, 495),
(115, '558', '418', '548', 'call me ', '', 1, '2024-03-15 11:45:56', NULL, 495),
(116, '558', '418', '548', '**********', '', 1, '2024-03-15 11:46:08', NULL, 495),
(117, '558', '418', '548', '********', '', 1, '2024-03-15 11:49:00', NULL, 495),
(118, '558', '548', '418', 'Hello', '', 1, '2024-03-15 12:54:35', NULL, 495),
(119, '558', '548', '418', 'Hi , how are you?', '', 1, '2024-03-15 12:59:31', NULL, 495),
(120, '425', '356', '387', 'hi', '', 1, '2024-03-18 11:51:05', NULL, 52),
(121, '425', '356', '387', 'hi\r\n', '', 1, '2024-03-18 12:01:45', NULL, 52),
(122, '425', '356', '387', 'hello', '', 1, '2024-03-18 12:04:10', NULL, 52),
(123, '425', '356', '387', 'ytej', '', 1, '2024-03-18 12:04:20', NULL, 52),
(124, '425', '356', '387', 'kiurli', '', 1, '2024-03-18 12:08:01', NULL, 52),
(125, '425', '356', '387', '********** hi', '', 1, '2024-03-19 12:54:01', NULL, 52),
(126, '425', '356', '387', '', '', 1, '2024-03-19 13:03:42', NULL, 52),
(127, '425', '356', '387', '', '', 1, '2024-03-19 13:03:46', NULL, 52),
(128, '425', '356', '387', '', '', 1, '2024-03-19 13:03:46', NULL, 52),
(129, '425', '356', '387', '', '', 1, '2024-03-19 13:13:03', NULL, 52),
(130, '558', '548', '418', 'I have submitted the milestones. PLease check and approve.', '', 1, '2024-03-22 10:28:39', NULL, 495),
(131, '558', '418', '548', 'Thanks.', '', 1, '2024-03-22 10:29:28', NULL, 495),
(132, '558', '418', '548', 'Hi this is Aman', '', 1, '2024-03-22 11:02:52', NULL, 495),
(133, '560', '548', '581', 'hi', '', 1, '2024-03-27 12:12:24', NULL, 500),
(134, '558', '548', '418', '890127789 hello', '', 1, '2024-03-27 13:33:30', NULL, 495),
(135, '558', '548', '418', '**********', '', 1, '2024-03-27 13:35:18', NULL, 495),
(136, '563', '594', '600', 'Hello\r\nHow are you doing?', '', 1, '2024-03-30 06:42:57', NULL, 513),
(137, '564', '594', '600', 'Hello\r\nHow are you doing ', '', 1, '2024-04-01 16:21:51', NULL, 512),
(138, '567', '548', '418', 'As given in the project requirements, need simple 2-3 pages multiple website.', '', 1, '2024-04-03 10:23:44', NULL, 520),
(139, '567', '418', '548', 'Yes sir, please give me the opportunity, I will do that', '', 1, '2024-04-03 10:24:12', NULL, 520),
(140, '563', '594', '600', 'Hello ', '', 1, '2024-04-04 10:57:23', NULL, 513),
(141, '552', '594', '539', 'Hello ', '', 1, '2024-04-04 10:58:42', NULL, 509),
(142, '568', '634', '412', 'Hi Dear, I am a Shopify Developer, You Need a Sin Care Products Store\r\n', '', 1, '2024-04-05 22:36:32', NULL, 528);

-- --------------------------------------------------------

--
-- Table structure for table `email_otps`
--

CREATE TABLE `email_otps` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_otps`
--

INSERT INTO `email_otps` (`id`, `email`, `otp`, `created_at`, `updated_at`, `expired_at`) VALUES
(1, 'sandeepmehandia2@gmail.com', 8534, '2023-10-17 05:56:53', NULL, '2023-10-16 19:31:53'),
(2, 'vny.009@gmail.com', 8002, '2023-10-17 07:25:53', NULL, '2023-10-16 21:00:53'),
(3, 'sanurag0022@gmail.com', 6965, '2023-10-17 13:28:23', NULL, NULL),
(4, 'sanurag0022@gmail.com', 4180, '2023-10-17 13:29:04', NULL, NULL),
(5, 'sanurag0022@gmail.com', 4347, '2023-10-17 13:31:23', NULL, NULL),
(6, 'gok@gmail.com', 1755, '2023-10-18 05:07:17', NULL, NULL),
(7, 'sanurag0023@gmail.com', 4946, '2023-10-18 05:21:12', NULL, NULL),
(8, 'sanurag0022@gmail.com', 5434, '2023-10-18 06:06:45', NULL, NULL),
(9, 'sanurag0022@gmail.com', 9291, '2023-10-18 06:09:59', NULL, NULL),
(10, 'sanurag80022@gmail.com', 6566, '2023-10-18 06:59:25', NULL, NULL),
(11, 'pro@gmail.com', 1255, '2023-10-18 08:37:11', NULL, NULL),
(12, 'sanurag0022@gmail.com', 3986, '2023-10-18 10:19:40', NULL, NULL),
(13, 'gnoi45@gmail.com', 2851, '2023-10-18 10:24:51', NULL, NULL),
(14, 'gnoi45@gmail.com', 4561, '2023-10-18 10:31:54', NULL, NULL),
(15, 'sanurag0022@gmail.com', 4093, '2023-10-18 11:10:05', NULL, NULL),
(16, 'gokul@techninza.in', 9917, '2023-10-18 14:21:03', NULL, NULL),
(17, 'gokul@tech.in', 6915, '2023-10-19 13:22:28', NULL, NULL),
(18, 'vinay@tech.in', 5017, '2023-10-19 13:39:17', NULL, NULL),
(19, 'vinay@sooprs.com', 2286, '2023-10-21 13:18:16', NULL, NULL),
(20, 'gnoi45@gmail.com', 4687, '2023-10-22 05:33:44', NULL, NULL),
(21, 'gokul@techninza.in', 2080, '2023-10-22 05:49:17', NULL, NULL),
(22, 'newsignup@gmail.com', 1346, '2023-11-02 11:05:26', NULL, NULL),
(23, 'amitsharma_88@live.com', 7350, '2023-11-02 11:09:14', NULL, NULL),
(24, 'employer@gmail.com', 1413, '2023-11-02 15:18:20', NULL, NULL),
(25, 'employee@gmail.com', 5618, '2023-11-02 15:24:37', NULL, NULL),
(26, 'hsofficials28@gmail.com', 4993, '2023-11-03 09:43:15', NULL, NULL),
(27, 'vny.009@gmail.com', 5957, '2023-11-14 13:46:07', NULL, NULL),
(28, 'vny.009@gmail.com', 8129, '2023-11-14 17:01:42', NULL, NULL),
(29, 'sunnyapp@gmail.com', 5322, '2023-11-21 10:16:53', NULL, NULL),
(30, 'sandy222@gmail.com', 4205, '2023-11-21 10:25:57', NULL, NULL),
(31, 'sandeep.meh28@gmail.com', 4575, '2023-11-21 11:09:14', NULL, NULL),
(32, 'sandeep.meh28@gmail.com', 3289, '2023-11-21 11:17:21', NULL, NULL),
(33, 'sandeep.meh28@gmail.com', 4001, '2023-11-21 11:23:07', NULL, NULL),
(34, 'sandeepmeh28@gmail.com', 2592, '2023-11-21 11:33:09', NULL, NULL),
(35, 'sandeepmeh333@gmail.com', 3480, '2023-11-21 11:33:59', NULL, NULL),
(36, 'sandeep.meh28@gmail.com', 1298, '2023-11-21 11:36:32', NULL, NULL),
(37, 'sandeep.meh288@gmail.com', 5806, '2023-11-21 11:38:26', NULL, NULL),
(38, 'sandeep.meh289@gmail.com', 7146, '2023-11-21 11:39:29', NULL, NULL),
(39, 'sandeep.meh2899@gmail.com', 3356, '2023-11-21 11:40:06', NULL, NULL),
(58, 'sandeepmehandia2@gmail.com', 8533, '2023-11-22 04:55:03', NULL, NULL),
(59, 'sandeepmehandia22@gmail.com', 2585, '2023-11-22 04:56:45', NULL, NULL),
(60, 'sandeepmehandia222@gmail.com', 4683, '2023-11-22 04:57:25', NULL, NULL),
(61, 'sandeepmehandia2222@gmail.com', 5533, '2023-11-22 04:58:46', NULL, NULL),
(62, 'sandeepmehandia22222@gmail.com', 4750, '2023-11-22 04:59:07', NULL, NULL),
(63, 'sandeepmehandia222222@gmail.com', 5668, '2023-11-22 04:59:30', NULL, NULL),
(64, 'sandeepmehandia2222222@gmail.com', 2448, '2023-11-22 05:04:05', NULL, NULL),
(65, 'sandeepmehandia33@gmail.com', 8432, '2023-11-22 05:04:48', NULL, NULL),
(66, 'sandeepmehandia002@gmail.com', 8572, '2023-11-22 05:06:19', NULL, NULL),
(67, 'sandeep2mehandia2@gmail.com', 8643, '2023-11-22 05:08:32', NULL, NULL),
(68, 'sandeep123meh@gmail.com', 8040, '2023-11-22 05:11:53', NULL, NULL),
(69, 'sandeepmehandia2@gmail.com', 8298, '2023-11-22 05:17:07', NULL, NULL),
(70, 'sandeepmehandia123@gmail.com', 4559, '2023-11-22 05:19:30', NULL, NULL),
(71, 'sandeepmehandia39@gmail.com', 8674, '2023-11-22 05:25:26', NULL, NULL),
(72, 'sandeepmehandiua01@gmail.com', 8031, '2023-11-22 05:39:41', NULL, NULL),
(73, 'sandeepmehanfia987@gmail.com', 9376, '2023-11-22 05:43:27', NULL, NULL),
(74, 'sandeepmehandia989@gmail.com', 7161, '2023-11-22 05:53:30', NULL, NULL),
(75, 'sandeepmehandia2@gmail.com', 4619, '2023-11-22 05:56:12', NULL, NULL),
(76, 'sandeepmehandia234@gmail.com', 3044, '2023-11-22 06:07:59', NULL, NULL),
(77, 'sandeepmehandia001@gmail.com', 4603, '2023-11-22 06:09:40', NULL, NULL),
(78, 'sandeepmehandia2@gmail.com', 3882, '2023-11-22 06:15:17', NULL, NULL),
(79, 'sandeepmehandia2@gmail.com', 6286, '2023-11-22 06:20:10', NULL, NULL),
(80, 'vinay@techninza.in', 5537, '2023-11-22 11:19:24', NULL, NULL),
(81, 'vinay@techninza.in', 2235, '2023-11-24 08:12:57', NULL, NULL),
(82, 'vinay@techninza.in', 9736, '2023-11-24 08:38:23', NULL, NULL),
(83, 'vny.009@gmail.com', 5791, '2023-11-24 08:41:42', NULL, NULL),
(84, 'sandeep.meh28@gmail.com', 8650, '2023-11-24 11:07:59', NULL, NULL),
(85, 'sandeep.meh28@gmail.com', 7963, '2023-11-24 12:04:27', NULL, NULL),
(86, 'sandeep.meh28@gmail.com', 8135, '2023-11-24 12:26:25', NULL, NULL),
(87, 'sandeep.meh28@gmail.com', 2392, '2023-11-24 12:34:56', NULL, NULL),
(88, 'sandeep.meh28@gmail.com', 4850, '2023-11-24 12:48:40', NULL, NULL),
(89, 'sandeep.meh28@gmail.com', 3866, '2023-11-24 13:00:14', NULL, NULL),
(90, 'vny.009@gmail.com', 3696, '2023-11-24 13:00:19', NULL, NULL),
(91, 'abc@xyz.com', 4316, '2023-11-27 10:21:28', NULL, NULL),
(92, 'ssg', 4374, '2023-11-27 10:25:51', NULL, NULL),
(93, 'gdfg', 5954, '2023-11-27 10:27:09', NULL, NULL),
(94, 'rtdrtdr', 7891, '2023-11-27 10:27:46', NULL, NULL),
(95, 'sandy.sandeep3105@gmail.com', 6325, '2023-12-06 06:52:59', NULL, NULL),
(96, 'techninzaacademy@gmail.com', 9758, '2023-12-06 12:31:07', NULL, NULL),
(97, 'gazetinctechnology@gmail.com', 6517, '2023-12-06 12:46:58', NULL, NULL),
(98, 'gokul@techninza.in', 2537, '2023-12-08 12:40:15', NULL, NULL),
(99, 'smsunnythefunny@gmail.com', 4812, '2023-12-08 12:51:27', NULL, NULL),
(100, 'kumardipak4191@gmail.com', 1796, '2023-12-08 12:59:48', NULL, NULL),
(101, 'kapilrohilla2002@gmail.com', 8763, '2023-12-08 13:13:46', NULL, NULL),
(102, 'sanurag0022@gmail.com', 7159, '2023-12-08 13:23:08', NULL, NULL),
(103, 'sandeep.meh28@gmail.com', 1163, '2023-12-09 06:27:55', NULL, NULL),
(104, '', 3377, '2023-12-09 06:28:38', NULL, NULL),
(105, 'sandeep.meh28@gmail.com', 3552, '2023-12-09 06:30:39', NULL, NULL),
(106, '', 2801, '2023-12-09 06:31:00', NULL, NULL),
(107, '', 1022, '2023-12-09 06:31:26', NULL, NULL),
(108, '', 4422, '2023-12-09 06:32:31', NULL, NULL),
(109, 'sandeep.meh28@gmail.com', 4733, '2023-12-09 06:33:52', NULL, NULL),
(110, 'sandeep.meh28@gmail.com', 2412, '2023-12-09 06:34:46', NULL, NULL),
(111, 'varunrana@gmail.com', 2607, '2023-12-09 12:04:59', NULL, NULL),
(112, 'varunrana600@gmail.com', 3591, '2023-12-09 12:07:15', NULL, NULL),
(113, 'sunnythesandy@gmail.com', 9979, '2023-12-13 11:51:41', NULL, NULL),
(114, 'sunnythesandy@gmail.com', 9332, '2023-12-13 11:54:56', NULL, NULL),
(115, 'sandeepmehandia2@gmail.com', 6507, '2023-12-27 10:22:50', NULL, NULL),
(116, 'sandeepmehandia2@gmail.com', 9127, '2023-12-27 10:25:49', NULL, NULL),
(117, 'sandy.sunny3105@gmail.com', 1094, '2023-12-27 10:29:04', NULL, NULL),
(118, 'sandeepmehandia2@gmail.com', 1666, '2023-12-27 10:54:30', NULL, NULL),
(119, 'sandy.sunny3105@gmail.com', 5906, '2023-12-27 10:56:20', NULL, NULL),
(120, 'sunnythesandy@gmail.com', 1256, '2023-12-29 11:28:55', NULL, NULL),
(121, 'sunnythesandy@gmail.com', 7414, '2023-12-29 11:30:28', NULL, NULL),
(122, 'sunnythesandy@gmail.com', 2145, '2023-12-29 11:33:12', NULL, NULL),
(123, 'sunnythesandy@gmail.com', 7033, '2023-12-29 13:18:21', NULL, NULL),
(124, 'sunnythesandy@gmail.com', 1190, '2023-12-30 06:30:10', NULL, NULL),
(125, 'sunnythesandy@gmail.com', 4711, '2023-12-30 07:01:15', NULL, NULL),
(126, 'gokul@techniza.in', 1940, '2023-12-30 10:05:17', NULL, NULL),
(127, 'gokul@techninza.in', 4556, '2023-12-30 10:07:32', NULL, NULL),
(128, 'gnoi45@gmail.com', 3268, '2023-12-30 10:12:04', NULL, NULL),
(129, 'devtilante@gmail.com', 2668, '2024-01-03 06:37:39', NULL, NULL),
(130, 'sandeep.meh28@gmail.com', 3499, '2024-01-05 06:02:47', NULL, NULL),
(131, 'vinay@techninza.in', 8323, '2024-01-05 10:41:17', NULL, NULL),
(132, 'vinay@techninza.in', 2435, '2024-01-05 10:45:16', NULL, NULL),
(133, 'sandeep.meh28@gmail.com', 7522, '2024-01-05 11:06:48', NULL, NULL),
(134, 'sandeep.meh28@gmail.com', 3765, '2024-01-05 11:12:18', NULL, NULL),
(135, 'sandeep.meh28@gmail.com', 7049, '2024-01-05 11:12:45', NULL, NULL),
(136, 'sandeep.meh28@gmail.com', 8838, '2024-01-05 11:13:17', NULL, NULL),
(137, 'sandeep.meh28@gmail.com', 4360, '2024-01-05 11:15:10', NULL, NULL),
(138, 'sandeep.meh28@gmail.com', 6225, '2024-01-05 11:18:00', NULL, NULL),
(139, 'sandeep.meh28@gmail.com', 3157, '2024-01-05 11:18:33', NULL, NULL),
(140, 'sandeep.meh28@gmail.com', 6548, '2024-01-05 11:19:36', NULL, NULL),
(141, 'sandeep.meh28@gmail.com', 7196, '2024-01-06 05:03:26', NULL, NULL),
(142, 'sandeep.meh28@gmail.com', 7017, '2024-01-06 05:10:07', NULL, NULL),
(143, 'sandeep.meh28@gmail.com', 4679, '2024-01-06 05:22:47', NULL, NULL),
(144, 'sandeep.meh28@gmail.com', 3785, '2024-01-06 05:26:11', NULL, NULL),
(145, 'kapilrohilla35@gmail.com', 8831, '2024-01-06 06:46:18', NULL, NULL),
(146, 'madhurjain.198@gmail.com', 1768, '2024-01-06 09:58:11', NULL, NULL),
(147, 'gnoi45@gmail.com', 1630, '2024-01-07 07:08:53', NULL, NULL),
(148, 'gokul@techninza.in', 3450, '2024-01-07 07:20:06', NULL, NULL),
(149, 'poornimajindal2002@gmail.com', 5822, '2024-01-08 07:45:06', NULL, NULL),
(150, 'tr5531803@gmail.com', 2641, '2024-01-09 05:30:17', NULL, NULL),
(151, 'archanachaturvedi004@gmail.com', 7124, '2024-01-09 06:21:52', NULL, NULL),
(152, 'yadav188@gmail.com', 1150, '2024-01-09 18:07:05', NULL, NULL),
(153, 'aman54bhutani@gmail.com', 5265, '2024-01-10 13:02:49', NULL, NULL),
(154, 'dass.harish@gmail.com', 9556, '2024-01-11 06:45:18', NULL, NULL),
(155, 'sddfsf', 7283, '2024-01-11 08:54:51', NULL, NULL),
(156, 'srgsg', 8440, '2024-01-11 10:48:35', NULL, NULL),
(157, 'tr5531803@gmail.com', 7722, '2024-01-11 13:04:42', NULL, NULL),
(158, 'gdfgfd', 6635, '2024-01-12 04:55:52', NULL, NULL),
(159, 'pritykumari.sharma0125@gmail.com', 2853, '2024-01-12 05:33:53', NULL, NULL),
(160, 'svsv', 1140, '2024-01-12 06:29:07', NULL, NULL),
(161, 'rudrasharma@gmail.com', 2103, '2024-01-12 12:31:25', NULL, NULL),
(162, 'karan637554@gmail.com', 8422, '2024-01-13 11:18:38', NULL, NULL),
(163, 'sharewithmaurya@gmail.com', 4982, '2024-01-13 15:51:37', NULL, NULL),
(164, 'liyorin112@ikuromi.com', 1832, '2024-01-16 18:04:56', NULL, NULL),
(165, 'amitsharma_88@live.com', 6799, '2024-01-17 07:21:21', NULL, NULL),
(166, 'nileshtiwari1391@gmail.com', 8528, '2024-01-17 07:22:20', NULL, NULL),
(167, 'sukrat040@gmail.com', 4573, '2024-01-17 07:40:27', NULL, NULL),
(168, 'miltonchowdhiry@gmail.com', 3434, '2024-01-17 08:49:32', NULL, NULL),
(169, 'koushiksarkaroffice@gmail.com', 2749, '2024-01-17 09:05:27', NULL, NULL),
(170, 'sanurag0022@gmail.com', 3824, '2024-01-17 09:37:20', NULL, NULL),
(171, 'kapilrohilla2002@gmail.com', 4623, '2024-01-17 09:40:50', NULL, NULL),
(172, 'chandansharma79928.fea@gmail.com', 5970, '2024-01-17 10:05:33', NULL, NULL),
(173, 'gabani7004@gmail.com', 5645, '2024-01-17 10:23:28', NULL, NULL),
(174, 'praveenbhu6@gmail.com', 3564, '2024-01-20 05:19:18', NULL, NULL),
(175, 'pulkitdixit1232@gmail.com', 9472, '2024-02-02 05:33:50', NULL, NULL),
(176, 'olayinkaolasina@gmail.com', 7333, '2024-02-03 21:35:52', NULL, NULL),
(177, 'pradyumna9956vish@gmail.com', 6359, '2024-02-05 06:22:59', NULL, NULL),
(178, 'amitesh.kr1993@gmail.com', 6446, '2024-02-10 04:56:22', NULL, NULL),
(179, 'sonalsaurabh8877@gmail.com', 3470, '2024-02-10 11:22:34', NULL, NULL),
(180, 'abdusallam808@gmail.com', 1832, '2024-02-13 15:58:29', NULL, NULL),
(181, 'vishal.data11@gmail.com', 4925, '2024-02-17 07:48:28', NULL, NULL),
(182, 'pallav.kumar837@gmail.com', 9200, '2024-02-17 10:34:42', NULL, NULL),
(183, 'princek082@gmail.com', 1973, '2024-02-17 13:07:29', NULL, NULL),
(184, 'arun99178@gmail.com', 1279, '2024-02-19 04:18:07', NULL, NULL),
(185, 'pushpajachinthalapudi@gmail.com', 7899, '2024-02-19 08:56:01', NULL, NULL),
(186, 'shaikbaji1911@gmail.com', 2463, '2024-02-19 09:51:01', NULL, NULL),
(187, 'ypenurkar02@gmail.com', 3618, '2024-02-19 11:34:12', NULL, NULL),
(188, 'satish.cn32@gmail.com', 9758, '2024-02-19 13:29:14', NULL, NULL),
(189, 'satish.cn32@gmail.com', 6495, '2024-02-19 13:31:06', NULL, NULL),
(190, 'stharakace7@gmail.com', 8506, '2024-02-19 14:25:30', NULL, NULL),
(191, 'dheepikaraytp551@gmail.com', 7969, '2024-02-20 02:56:57', NULL, NULL),
(192, 'contactmrtarar@gmail.com', 2393, '2024-02-20 06:00:36', NULL, NULL),
(193, 'keyurkyada8154@gmail.com', 9436, '2024-02-20 06:27:38', NULL, NULL),
(194, 'trushant777@gmail.com', 1782, '2024-02-20 07:07:26', NULL, NULL),
(195, 'mohankrishnaiosdeveloper@gmail.com', 9814, '2024-02-20 07:13:15', NULL, NULL),
(196, 'trushant777@gmail.com', 9988, '2024-02-20 07:15:33', NULL, NULL),
(197, 'trushant777@gmail.com', 5182, '2024-02-20 07:16:50', NULL, NULL),
(198, 'sjaiprakash457@gmail.com', 3840, '2024-02-20 10:39:52', NULL, NULL),
(199, 'fiibixtech@gmail.com', 9746, '2024-02-20 11:50:19', NULL, NULL),
(200, 'malaviyakaushik800@gmail.com', 8884, '2024-02-20 12:00:23', NULL, NULL),
(201, 'smsunnythrb@gmail.com', 9265, '2024-02-20 14:42:08', NULL, NULL),
(202, 'khushal.agarwal987@gmail.com', 8323, '2024-02-20 16:48:24', NULL, NULL),
(203, 'blessingfem9@gmail.com', 1333, '2024-02-21 01:43:35', NULL, NULL),
(204, 'mayankkankoriya45678@gmail.com', 1965, '2024-02-21 06:21:59', NULL, NULL),
(205, 'mdnifaurrahmanx27@gmail.com', 3704, '2024-02-21 10:08:36', NULL, NULL),
(206, 'palitatushar@gmail.com', 1016, '2024-02-21 10:32:00', NULL, NULL),
(207, 'palitatushar@gmail.com', 2432, '2024-02-21 10:34:26', NULL, NULL),
(208, 'palitatushar@gmail.com', 3253, '2024-02-21 10:36:08', NULL, NULL),
(209, 'anslyali90@gmail.com', 3628, '2024-02-21 11:01:54', NULL, NULL),
(210, 'tayyabarafique203@gmail.com', 6280, '2024-02-21 14:46:56', NULL, NULL),
(211, 'varun.kudalkar@gmail.com', 2435, '2024-02-22 06:19:58', NULL, NULL),
(212, 'sweetyasir186@gmail.com', 6716, '2024-02-22 07:24:30', NULL, NULL),
(213, 'sgondal3770@gmail.com', 4904, '2024-02-22 08:04:27', NULL, NULL),
(214, 'asimshahzad6763132@gmail.com', 8710, '2024-02-22 08:50:30', NULL, NULL),
(215, 'fahad.shoukat111@gmail.com', 6242, '2024-02-22 09:26:58', NULL, NULL),
(216, 'hassnaatfarooq@gmail.com', 2382, '2024-02-22 09:33:59', NULL, NULL),
(217, 'collinskipkorir430@gmail.com', 9817, '2024-02-22 10:01:02', NULL, NULL),
(218, 'gattiflab@gmail.com', 1120, '2024-02-22 11:20:28', NULL, NULL),
(219, 'jaystamakuwala@gmail.com', 2425, '2024-02-22 11:48:52', NULL, NULL),
(220, 'rexileen@yahoo.com', 2292, '2024-02-22 12:02:54', NULL, NULL),
(221, 'ramonolalekan43@gmail.com', 3176, '2024-02-22 12:12:10', NULL, NULL),
(222, 'nemanjamatijevic32@gmail.com', 5858, '2024-02-22 12:22:11', NULL, NULL),
(223, 'rahulsbhalerao2294@gmail.com', 7541, '2024-02-22 13:01:51', NULL, NULL),
(224, 'tejdiv123@gmail.com', 3629, '2024-02-22 14:14:56', NULL, NULL),
(225, 'serverfix22@gmail.com', 3547, '2024-02-22 14:16:50', NULL, NULL),
(226, 'jaweriamehmood94@gmail.com', 4478, '2024-02-22 15:15:01', NULL, NULL),
(227, 'ehxanali2546@gmail.com', 7502, '2024-02-22 16:02:37', NULL, NULL),
(228, 'manueljramirez3@gmail.com', 6460, '2024-02-22 17:21:49', NULL, NULL),
(229, 'vyas.sharad11@gmail.com', 9892, '2024-02-23 05:48:35', NULL, NULL),
(230, 'farhanakramryk@gmail.com', 9889, '2024-02-23 05:50:11', NULL, NULL),
(231, 'ayomidigitalz@gmail.com', 1838, '2024-02-23 07:13:42', NULL, NULL),
(232, 'haamza@live.co.uk', 7564, '2024-02-23 07:21:22', NULL, NULL),
(233, 'hassanfreelancedev@gmail.com', 3897, '2024-02-23 08:30:33', NULL, NULL),
(234, 'jayesh.chouhan@sleddingtech.com', 4154, '2024-02-23 09:39:23', NULL, NULL),
(235, 'lokeshkumarjjn29@gmail.com', 1418, '2024-02-23 09:56:02', NULL, NULL),
(236, 'abidbadhon866@gmail.com', 9788, '2024-02-23 10:02:08', NULL, NULL),
(237, 'muhammadayanjavaid17@gmail.com', 9914, '2024-02-23 10:15:14', NULL, NULL),
(238, 'mounshree.in@gmail.com', 2845, '2024-02-23 10:52:00', NULL, NULL),
(239, 'mounshree.in@gmail.com', 5434, '2024-02-23 10:53:09', NULL, NULL),
(240, 'mounshree.in@gmail.com', 7664, '2024-02-23 11:24:41', NULL, NULL),
(241, 'virtualrizwan@gmail.com', 8174, '2024-02-23 13:50:31', NULL, NULL),
(242, 'solomonhemigadon@gmail.com', 5383, '2024-02-23 15:53:44', NULL, NULL),
(243, 'deepaksaraswat238@gmail.com', 1053, '2024-02-23 16:39:20', NULL, NULL),
(244, 'swopnilm170@gmail.com', 3824, '2024-02-23 17:37:47', NULL, NULL),
(245, 'ashwinipardeshi8149@gmail.com', 4327, '2024-02-24 09:20:52', NULL, NULL),
(246, 'laibazulfiqar966@gmail.com', 2334, '2024-02-24 18:01:36', NULL, NULL),
(247, 'copertinotrazafy@gmail.com', 7552, '2024-02-26 06:56:45', NULL, NULL),
(248, 'damiansmit@live.nl', 3635, '2024-02-26 08:02:09', NULL, NULL),
(249, 'saadasghar429@gmail.com', 3247, '2024-02-26 08:24:32', NULL, NULL),
(250, 'tnzerox@gmail.com', 9744, '2024-02-26 08:28:42', NULL, NULL),
(251, 'usuraj35@gmail.com', 9429, '2024-02-26 08:40:17', NULL, NULL),
(252, 'ibartssales@gmail.com', 2062, '2024-02-26 08:41:17', NULL, NULL),
(253, 'mah.nooray98@gmail.com', 9018, '2024-02-26 10:39:57', NULL, NULL),
(254, 'numan@warpvision.in', 8722, '2024-02-26 14:12:35', NULL, NULL),
(255, 'tundephilps@gmail.com', 5679, '2024-02-26 14:50:14', NULL, NULL),
(256, 'mailtomageshsankar@gmail.com', 4587, '2024-02-26 18:48:19', NULL, NULL),
(257, 'taiwoayomide202@gmail.com', 3909, '2024-02-26 22:51:00', NULL, NULL),
(258, 'hinaw2732@gmail.com', 4946, '2024-02-27 04:07:42', NULL, NULL),
(259, 'hinaw2732@gmail.com', 4945, '2024-02-27 04:08:20', NULL, NULL),
(260, 'hinaw2732@gmail.com', 6177, '2024-02-27 04:09:54', NULL, NULL),
(261, 'jamw7690@gmail.com', 9756, '2024-02-27 05:21:44', NULL, NULL),
(262, 'priyanka@pinblooms.com', 3075, '2024-02-27 05:38:25', NULL, NULL),
(263, 'samarsrivastava02@gmail.com', 9769, '2024-02-27 06:49:52', NULL, NULL),
(264, 'razab0715@gmail.com', 6872, '2024-02-27 07:16:32', NULL, NULL),
(265, 'yazdanshaikh11@gmail.com', 1959, '2024-02-27 16:59:36', NULL, NULL),
(266, 'muhammadfaaiez@gmail.com', 3986, '2024-02-28 07:16:47', NULL, NULL),
(267, 'ukashaasi123@gmail.com', 6929, '2024-02-28 12:05:31', NULL, NULL),
(268, 'torahulsomaraj@gmail.com', 8103, '2024-02-29 05:01:38', NULL, NULL),
(269, 'mitul.patel@weavolve.com', 9833, '2024-02-29 05:09:02', NULL, NULL),
(270, 'HaiderAli459801@gmail.com', 3433, '2024-02-29 05:25:02', NULL, NULL),
(271, 'HaiderAli459801@gmail.com', 4059, '2024-02-29 05:26:08', NULL, NULL),
(272, 'hitesh.chanchiya@gmail.com', 5606, '2024-02-29 05:31:11', NULL, NULL),
(273, 'sairachaudhary59@gmail.com', 6557, '2024-02-29 07:06:52', NULL, NULL),
(274, 'sooprsblog@gmail.com', 6319, '2024-02-29 08:06:35', NULL, NULL),
(275, 'meupetroullube-5586@yopmail.com', 9641, '2024-02-29 09:40:32', NULL, NULL),
(276, '1062rishabhsharma@Gmail.com', 9098, '2024-03-01 07:06:24', NULL, NULL),
(277, 'vny.009@gmail.com', 5349, '2024-03-01 08:23:58', NULL, NULL),
(278, 'Amritduwal1@gmail.com', 7918, '2024-03-02 01:26:29', NULL, NULL),
(279, 'axnoldigital@gmail.com', 3309, '2024-03-07 07:18:18', NULL, NULL),
(280, 'sarthvaste800@gmail.com', 7857, '2024-03-07 09:45:38', NULL, NULL),
(281, 'adewaleoluwatoyin81@gmail.com', 1810, '2024-03-07 11:53:36', NULL, NULL),
(282, 'mafaq3615@gmail.com', 5128, '2024-03-07 12:21:26', NULL, NULL),
(283, 'shoaibur206@gmail.com', 2024, '2024-03-09 15:59:46', NULL, NULL),
(284, 'analy.assist@gmail.com', 8795, '2024-03-11 06:13:58', NULL, NULL),
(285, 'vikky@gmail.com', 7370, '2024-03-11 08:54:12', NULL, NULL),
(286, 'miqart1@gmail.com', 6253, '2024-03-11 10:16:07', NULL, NULL),
(287, 'ar31213@gmail.com', 6238, '2024-03-11 16:21:57', NULL, NULL),
(288, 'ar31213@gmail.com', 7755, '2024-03-11 16:26:34', NULL, NULL),
(289, 'hdtank77@gmail.com', 3930, '2024-03-12 07:19:49', NULL, NULL),
(290, 'rakotoniainarajomampionona@gmail.com', 7406, '2024-03-12 08:10:17', NULL, NULL),
(291, 'nijbhup27@gmail.com', 7299, '2024-03-12 08:12:32', NULL, NULL),
(292, 'malikhassanraza4982@gmail.com', 1696, '2024-03-12 08:14:14', NULL, NULL),
(293, 'paamoohz1@gmail.com', 8936, '2024-03-12 09:28:01', NULL, NULL),
(294, 'arif@techzarinfo.com', 7408, '2024-03-12 09:51:02', NULL, NULL),
(295, 'pqlfkgp688@iemail.one', 9132, '2024-03-12 10:14:59', NULL, NULL),
(296, 'ayodelebolariwa695@gmail.com', 6605, '2024-03-12 10:24:52', NULL, NULL),
(297, 'musmannadeem92@gmail.com', 1812, '2024-03-12 12:55:52', NULL, NULL),
(298, 'mohxinmuhammad@gmail.com', 1975, '2024-03-12 14:18:54', NULL, NULL),
(299, 'mohxinmuhammad@gmail.com', 6030, '2024-03-12 14:20:05', NULL, NULL),
(300, 'sherazzafar148@gmail.com', 1163, '2024-03-13 05:29:17', NULL, NULL),
(301, 'mizanurl@yahoo.com', 1240, '2024-03-13 05:55:47', NULL, NULL),
(302, 'rnflanja06@gmail.com', 2173, '2024-03-13 08:23:23', NULL, NULL),
(303, 'singhianjeetsingh@gmail.com', 1477, '2024-03-13 08:30:49', NULL, NULL),
(304, 'hellonisha125@gmail.com', 1117, '2024-03-13 12:24:58', NULL, NULL),
(305, 'sandeep.meh28@gmail.com', 1804, '2024-03-13 13:14:51', NULL, NULL),
(306, 'chaqib186@gmail.com', 7599, '2024-03-14 05:43:20', NULL, NULL),
(307, 'r3ddy03@gmail.com', 3523, '2024-03-14 05:57:04', NULL, NULL),
(308, 'keriawilliskeira@gmail.com', 4588, '2024-03-14 08:02:20', NULL, NULL),
(309, 'shireenpeerbuksh2011@gmail.com', 4894, '2024-03-14 08:14:10', NULL, NULL),
(310, 'gurubhajansingh@gmail.com', 8812, '2024-03-14 17:07:35', NULL, NULL),
(311, 'deepjngra@gmail.com', 2673, '2024-03-15 02:29:25', NULL, NULL),
(312, 'sumitpandey050198@gmail.com', 3928, '2024-03-15 07:14:59', NULL, NULL),
(313, 'shahraizcodevibz@gmail.com', 8318, '2024-03-15 17:22:53', NULL, NULL),
(314, 'ajnanshaikh8646@gmail.com', 6387, '2024-03-16 07:40:59', NULL, NULL),
(315, 'ufomaitive@gmail.com', 2491, '2024-03-16 09:10:38', NULL, NULL),
(316, 'ufomaitive@gmail.com', 7582, '2024-03-16 09:12:55', NULL, NULL),
(317, 'ufomaitive@gmail.com', 5357, '2024-03-16 10:15:22', NULL, NULL),
(318, 'kontcheu23@gmail.com', 8042, '2024-03-18 06:45:37', NULL, NULL),
(319, 'jabin@creativetechpark.com', 6293, '2024-03-18 08:22:49', NULL, NULL),
(320, 'rayhan120.mr@gmail.com', 4250, '2024-03-18 08:42:24', NULL, NULL),
(321, 'rayhanmr.1200@gmail.com', 1871, '2024-03-18 08:46:21', NULL, NULL),
(322, 'Savita16.tech@gmail.com', 4722, '2024-03-18 19:59:43', NULL, NULL),
(323, 'shafiqsarker962@gmail.com', 5849, '2024-03-22 05:53:23', NULL, NULL),
(324, 'narendrachouhan458@gmail.com', 5739, '2024-03-22 06:25:21', NULL, NULL),
(325, 'tahir.naeem90@gmail.com', 9373, '2024-03-23 09:36:34', NULL, NULL),
(326, 'mdmusaddequr@gmail.com', 5657, '2024-03-23 09:52:00', NULL, NULL),
(327, 'hassaank1@yahoo.com', 9262, '2024-03-23 11:21:54', NULL, NULL),
(328, 'hassaank1@yahoo.com', 4652, '2024-03-23 11:22:31', NULL, NULL),
(329, 'felix.brown@gmx.ch', 8288, '2024-03-23 19:35:10', NULL, NULL),
(330, 'ehzazizhar@gmail.com', 1210, '2024-03-26 07:28:25', NULL, NULL),
(331, 'ravishankarpoddar09@gmail.com', 6965, '2024-03-26 08:00:29', NULL, NULL),
(332, 'rahuljindal494@gmail.com', 5581, '2024-03-26 11:25:40', NULL, NULL),
(333, 'rahul.jindal1232@gmail.com', 5169, '2024-03-26 11:26:36', NULL, NULL),
(334, 'cinemasterystudios@gmai.com', 5857, '2024-03-26 15:04:39', NULL, NULL),
(335, 'cinemasterystudios@gmai.com', 1064, '2024-03-26 15:06:27', NULL, NULL),
(336, 'cinemasterystudios@gmai.com', 9865, '2024-03-26 15:11:55', NULL, NULL),
(337, 'buyindag@gmail.com', 6234, '2024-03-27 12:56:31', NULL, NULL),
(338, 'Contact@whtefern.in', 4507, '2024-03-27 13:06:58', NULL, NULL),
(339, 'info@whitefern.in', 6166, '2024-03-27 13:35:49', NULL, NULL),
(340, 'malicktalha1990@gmail.com', 4281, '2024-03-28 13:10:46', NULL, NULL),
(341, 'adilbazmi34@gmail.com', 8080, '2024-03-29 05:10:06', NULL, NULL),
(342, 'habeebatopeyemi7@gmail.com', 3688, '2024-03-29 05:32:24', NULL, NULL),
(343, 'habeebatopeyemi7@gmail.com', 6046, '2024-03-29 05:38:08', NULL, NULL),
(344, 'kumaryogi6@gmail.com', 6103, '2024-03-29 07:41:48', NULL, NULL),
(345, 'adichoice007@gmail.com', 2015, '2024-03-29 07:41:50', NULL, NULL),
(346, 'adichoice007@gmail.com', 5252, '2024-03-29 07:42:42', NULL, NULL),
(347, 'adichoice007@gmail.com', 6947, '2024-03-29 07:44:16', NULL, NULL),
(348, 'nilrahul25@gmail.com', 4260, '2024-03-29 07:47:55', NULL, NULL),
(349, 'krishnamovies1@gmail.com', 6836, '2024-03-29 11:28:56', NULL, NULL),
(350, 'mony9838@gmail.com', 1410, '2024-03-29 11:34:23', NULL, NULL),
(351, 'Suraag2004@gmail.com', 6821, '2024-03-29 11:41:06', NULL, NULL),
(352, 'muzammilimam12@gmail.com', 2070, '2024-03-29 11:43:38', NULL, NULL),
(353, 'malikmanish097@gmail.com', 5279, '2024-03-29 12:19:17', NULL, NULL),
(354, 'malikmanish097@gmail.com', 3856, '2024-03-29 12:21:08', NULL, NULL),
(355, 'photographyabhishek777@gmail.con', 4708, '2024-03-29 12:33:00', NULL, NULL),
(356, 'photographyabhishek777@gmail.con', 5770, '2024-03-29 12:33:37', NULL, NULL),
(357, 'sribiswajitguin@gmail.com', 3885, '2024-03-29 12:56:03', NULL, NULL),
(358, 'jigarpadaya16@gmail.com', 6060, '2024-03-29 13:22:56', NULL, NULL),
(359, 'jigarpadaya16@gmail.com', 8130, '2024-03-29 13:24:21', NULL, NULL),
(360, 'jigarpadaya16@gmail.com', 6440, '2024-03-29 13:30:06', NULL, NULL),
(361, 'gautam9897187594@gmail.com', 9730, '2024-03-29 16:58:36', NULL, NULL),
(362, 'Prakharpatsariya@gmail.com', 2954, '2024-03-29 17:54:43', NULL, NULL),
(363, 'parvejhossain6031@gmail.com', 7932, '2024-03-29 22:05:29', NULL, NULL),
(364, 'parvejhossain6031@gmail.com', 2842, '2024-03-29 22:11:24', NULL, NULL),
(365, 'mallickrabin325@gmail.com', 4335, '2024-03-30 04:57:30', NULL, NULL),
(366, 'surveshravan@gmail.com', 5662, '2024-03-30 04:58:48', NULL, NULL),
(367, 'tony.redcarpet@gmal.com', 2207, '2024-03-30 05:02:24', NULL, NULL),
(368, 'tony.redcarpet@gmal.com', 1536, '2024-03-30 05:03:07', NULL, NULL),
(369, 'studio.creativedrishti@gmail.com', 5877, '2024-03-30 05:06:23', NULL, NULL),
(370, 'ajitk1171@gmail.com', 5699, '2024-03-30 05:12:55', NULL, NULL),
(371, 'gouravde9@gmail.com', 7875, '2024-03-30 05:51:47', NULL, NULL),
(372, 'tarun.justin@gmail.com', 4114, '2024-03-30 06:16:31', NULL, NULL),
(373, 'rana2ghosh7@gmail.com', 6186, '2024-03-30 12:26:30', NULL, NULL),
(374, 'asmevent1@gmail.com', 6282, '2024-03-31 08:38:18', NULL, NULL),
(375, 'thechetanphotographer@gmail.com', 9435, '2024-03-31 13:12:58', NULL, NULL),
(376, 'noelsakaria@gmail.com', 3893, '2024-04-01 05:57:41', NULL, NULL),
(377, 'akashwankhade531@gmail.com', 3849, '2024-04-01 07:08:03', NULL, NULL),
(378, 'majumdermistu399@gmail.com', 7619, '2024-04-01 07:24:30', NULL, NULL),
(379, 'ruhisingh359@gmail.com', 2353, '2024-04-01 07:46:25', NULL, NULL),
(380, 'ruhisingh359@gmail.com', 9633, '2024-04-01 07:47:07', NULL, NULL),
(381, 'gnkamat1968@gmail.com', 2040, '2024-04-02 01:20:16', NULL, NULL),
(382, 'wts.ur.requirment@gmail.com', 7797, '2024-04-02 01:49:05', NULL, NULL),
(383, 'lngshlucky@gmail.com', 3767, '2024-04-02 11:25:47', NULL, NULL),
(384, 'lngshlucky@gmail.com', 4547, '2024-04-02 11:26:42', NULL, NULL),
(385, 'rizwan8980@gmail.com', 7772, '2024-04-02 11:27:52', NULL, NULL),
(386, 'daainads@gmail.com', 2387, '2024-04-03 07:52:06', NULL, NULL),
(387, 'dipanshudixit110@gmail.com', 3921, '2024-04-03 12:03:27', NULL, NULL),
(388, 'lanikasama@gmail.com', 2416, '2024-04-04 06:59:04', NULL, NULL),
(389, 'prateeksongara02@gmail.com', 1912, '2024-04-04 09:25:18', NULL, NULL),
(390, 'musharafshah6713@gmail.com', 9297, '2024-04-04 10:15:11', NULL, NULL),
(391, 'abbashadir409@gmail.com', 1255, '2024-04-04 10:25:20', NULL, NULL),
(392, 'haseebr7185@gmail.com', 9288, '2024-04-04 10:28:24', NULL, NULL),
(393, 'haseebr7185@gmail.com', 9258, '2024-04-04 10:29:35', NULL, NULL),
(394, 'bdlancer2013@gmail.com', 9420, '2024-04-04 10:42:31', NULL, NULL),
(395, 'joshuaoyeniyi45@gmail.com', 3956, '2024-04-04 10:48:03', NULL, NULL),
(396, 'zohaibzafar0340@gmail.com', 7056, '2024-04-04 13:14:59', NULL, NULL),
(397, 'zohaibzafar0340@gmail.com', 6640, '2024-04-04 13:15:52', NULL, NULL),
(398, '3pletwealth@gmail.com', 7143, '2024-04-04 14:35:39', NULL, NULL),
(399, 'Ferminalusa@gmail.com', 4023, '2024-04-04 15:54:20', NULL, NULL),
(400, 'sa1727848@gmail.com', 9851, '2024-04-04 19:57:37', NULL, NULL),
(401, 'sa1727848@gmail.com', 5708, '2024-04-04 19:58:16', NULL, NULL),
(402, 'sime.huawei2@gmail.com', 2827, '2024-04-05 00:26:24', NULL, NULL),
(403, 'mtechpk1@gmail.com', 8588, '2024-04-05 05:28:30', NULL, NULL),
(404, 'heemaylackhani@gmail.com', 1543, '2024-04-05 05:36:46', NULL, NULL),
(405, 'emoneysam51@gmail.com', 8189, '2024-04-05 05:41:34', NULL, NULL),
(406, 'fobaexpedition@hotmail.com', 4321, '2024-04-05 05:55:12', NULL, NULL),
(407, 'zaifi.shab09@gmail.com', 4481, '2024-04-05 05:58:41', NULL, NULL),
(408, 'huzaifaturk014@gmail.com', 7362, '2024-04-05 06:02:23', NULL, NULL),
(409, 'Beownadventure001@gmail.com', 7599, '2024-04-05 06:38:49', NULL, NULL),
(410, 'bandaybasit121@gmail.com', 7809, '2024-04-05 06:40:53', NULL, NULL),
(411, 'theluxurytravel.in@gmail.com', 1104, '2024-04-05 08:15:20', NULL, NULL),
(412, 'hassanzafarbwn9@gmail.com', 2933, '2024-04-05 09:10:41', NULL, NULL),
(413, 'harshgupta28995@gmail.com', 5424, '2024-04-05 09:48:24', NULL, NULL),
(414, 'musafiravel@gmail.com', 3460, '2024-04-05 09:58:58', NULL, NULL),
(415, 'zahidkhan0291960@gmail.com', 2190, '2024-04-05 10:31:55', NULL, NULL),
(416, 'anand.g008@gmail.com', 3316, '2024-04-05 10:40:03', NULL, NULL),
(417, 'solankitour07@gmail.com', 5361, '2024-04-05 10:46:13', NULL, NULL),
(418, 'pruthvi.raj7118@gmail.com', 2729, '2024-04-05 13:05:02', NULL, NULL),
(419, 'techzee16@gmail.com', 2955, '2024-04-05 15:28:16', NULL, NULL),
(420, 'kingaifab@gmail.com', 8665, '2024-04-05 19:12:20', NULL, NULL),
(421, 'MAX.AKHIL@GMAIL.COM', 5850, '2024-04-06 03:01:47', NULL, NULL),
(422, 'zerishyusuf525@gmail.com', 2728, '2024-04-06 07:15:23', NULL, NULL),
(423, 'usmanfreelance05@gmail.com', 4842, '2024-04-06 07:35:45', NULL, NULL),
(424, 'Shayanarain107@gmail.com', 4956, '2024-04-06 10:39:32', NULL, NULL),
(425, 'shahzeb.bukhari1@outlook.com', 2903, '2024-04-06 11:04:51', NULL, NULL),
(426, 'sauravthakur0404@gmail.com', 4421, '2024-04-07 08:19:43', NULL, NULL),
(427, 'divinereflectionsevent@gmail.com', 4983, '2024-04-08 07:14:42', NULL, NULL),
(428, 'inderjeetsingh0307@gmail.com', 1719, '2024-04-08 13:22:50', NULL, NULL),
(429, 'silvabob147@gmail.com', 7615, '2024-04-08 17:27:36', NULL, NULL),
(430, 'ankitsharma59659@gmail.com', 5005, '2024-04-09 05:17:39', NULL, NULL),
(431, 'camerawalabengali@gmail.com', 5110, '2024-04-09 05:21:49', NULL, NULL),
(432, 'ubosatiworld@gmail.com', 4277, '2024-04-09 05:22:46', NULL, NULL),
(433, 'narumimomose111@gmail.com', 2382, '2024-04-09 06:17:07', NULL, NULL),
(434, 'jasminekate.patino@one.uz.edu.ph', 8265, '2024-04-09 06:30:05', NULL, NULL),
(435, 'rachytechy@gmail.com', 8842, '2024-04-09 09:33:29', NULL, NULL),
(436, 'madhavik100@gmail.com', 8839, '2024-04-10 05:05:21', NULL, NULL),
(437, 'meenamani8393@gmail.com', 4195, '2024-04-10 08:40:07', NULL, NULL),
(438, 'sagarjadhav2391@gmail.com', 5320, '2024-04-10 08:55:20', NULL, NULL),
(439, 'eventicosevents@gmail.com', 2216, '2024-04-10 09:44:10', NULL, NULL),
(440, 'rahlparmar12345@gmail.com', 8724, '2024-04-10 10:47:03', NULL, NULL),
(441, 'rahlparmar12345@gmail.com', 4865, '2024-04-10 10:49:31', NULL, NULL),
(442, 'rahlparmar12345@gmail.com', 5518, '2024-04-10 10:52:18', NULL, NULL),
(443, 'pranitat18@gmail.com', 1920, '2024-04-11 08:16:03', NULL, NULL),
(444, 'pranitat18@gmail.com', 2538, '2024-04-11 08:17:18', NULL, NULL),
(445, 'sharmastuti23@gmail.com', 7167, '2024-04-11 09:35:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gig_orders`
--

CREATE TABLE `gig_orders` (
  `gorder_id` int(11) NOT NULL,
  `gig_id` int(11) DEFAULT NULL,
  `final_amt` float DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Gig Orders table';

-- --------------------------------------------------------

--
-- Table structure for table `investor_queries`
--

CREATE TABLE `investor_queries` (
  `id` int(11) NOT NULL,
  `name` text,
  `phone` text,
  `email` varchar(255) DEFAULT NULL,
  `service` text,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investor_queries`
--

INSERT INTO `investor_queries` (`id`, `name`, `phone`, `email`, `service`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Akshay KHanna', '8954625468', 'sandeep.meh28@gmail.com', '', 'Some message very imp. to you', '2023-05-06 09:09:40', NULL),
(2, 'Akash', '5645689898', 'sandeep.meh28@gmail.com', 'app-development', 'cdsafcsdafdsvdsvwdefewf', '2023-05-06 09:15:54', NULL),
(3, 'jugad', '9987456856', 'sandeep.meh28@gmail.com', 'web-development', 'bhj', '2023-05-06 09:18:58', NULL),
(4, 'poiuytrewq', '9638529636', 'sandeep.meh28@gmail.com', 'web-development', 'thn', '2023-05-06 09:23:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_price` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `applicable_tax` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from_mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from_city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from_pincode` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `to_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `to_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `to_mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `to_city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `to_pincode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `join_professionals`
--

CREATE TABLE `join_professionals` (
  `id` int(11) NOT NULL,
  `name` text,
  `slug` varchar(100) DEFAULT NULL,
  `email` text,
  `password` varchar(255) DEFAULT NULL,
  `mobile` text,
  `listing_about` text,
  `bio` text,
  `organisation` text,
  `resume` text,
  `image` text,
  `portfolio_images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service` text,
  `services` text,
  `status` int(11) DEFAULT NULL,
  `is_buyer` int(11) NOT NULL DEFAULT '0',
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `skills` text,
  `wallet` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_professionals`
--

INSERT INTO `join_professionals` (`id`, `name`, `slug`, `email`, `password`, `mobile`, `listing_about`, `bio`, `organisation`, `resume`, `image`, `portfolio_images`, `created_at`, `updated_at`, `service`, `services`, `status`, `is_buyer`, `city`, `country`, `is_verified`, `skills`, `wallet`) VALUES
(356, 'Sandeep Mehandia', 'sandeep-mehandia', 'smsunnythefunny@gmail.com', '$2y$10$bJr09ATd2ZkA14fBQeqn0.JKlLFJadQCyUaiJCFnoJwWOtKm0JAX.', '8901277889', 'Hello! I\'m Sandeep, a dedicated backend developer with a passion for creating robust and scalable solutions. With 2 years of experience in the field, I thrive in crafting efficient and secure server-side applications that power the digital world.', 'Hi there! I\'m Sandeep, a dedicated Laravel Developer with a flair for crafting efficient and scalable web applications. ', 'Techninza', 'https://sooprs.com/assets/files/6574078ce9c95-1702102924.pdf', 'https://sooprs.com/assets/files/65f96f725b86f-1710845810.jpg', NULL, '2023-12-08 12:51:27', '2024-03-26 06:19:10', NULL, '35,26,19,17,16,1', 1, 0, NULL, 'IN', 1, '1,7,8,14', 150),
(357, 'Dipak Kumar', 'dipak-kumar', 'kumardipak4191@gmail.com', '$2y$10$Pbn8IqbCkRVPPeolBe7lm.GdcQFAM24AW.HaReKPbosy9pwQNcxYi', '7379636972', 'i am mern developer', 'dipak kumar from new delhi', 'techninza', NULL, 'https://sooprs.com/assets/files/65a7a16cd92c6-1705484652.jpg', NULL, '2023-12-08 12:59:48', NULL, NULL, '1,2,19', 1, 0, NULL, '1', 1, '7,16,33,8,11,15,17', 40),
(362, 'varun rana', 'varun-rana', 'varunrana@gmail.com', '$2y$10$ZZQfC1jP4pHLKKAO3MlfT.On3MfUzO1j3tW8aWYV/TbP.8IhfMXiS', '7027496996', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 12:04:59', NULL, NULL, NULL, 1, 0, NULL, '1', 0, NULL, 50),
(363, 'varun rana', 'varun-rana-1', 'varunrana600@gmail.com', '$2y$10$MT7t2b8TguHNG23qWgwDOOnovsvCet3XD.LAw6roABRdG5ZAX.6fu', '7027082348', 'react native developer', 'react native developer', 'react native developer', NULL, 'https://sooprs.com/assets/files/65745939677b5-1702123833.png', NULL, '2023-12-09 12:07:15', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(364, 'Nishant', 'nishant', 'nishant@gmail.com', '$2y$10$B6vkBsEZ3rg/f7BcVZPKwuZoDBNrt6ziF.UC58rLuVeiY0L9HBiKe', '9002020210', NULL, NULL, 'Technie', NULL, NULL, NULL, '2023-12-12 01:43:11', '2023-12-12 01:43:11', NULL, '20', NULL, 0, NULL, '1', 1, NULL, 50),
(366, 'Karan', 'karan', 'karan@techninza.in', '$2y$10$w/16oUoJsqO7Gk6i.78d6.37CgWUPjR0wFnx764CNjWSmMnptY88C', '6783682', 'Love karaoke singing', 'I am an enthusiastic app developer', 'abc', NULL, NULL, NULL, '2023-12-12 01:58:26', '2023-12-12 01:58:26', NULL, '20', NULL, 0, NULL, '1', 1, '1,4', 980),
(367, 'Deven', 'deven', 'deven@techninza.in', '$2y$10$EjlejiUVDkXUefwv50klLeR5iF4erAwMJAwIkAVtnCwWbTX5MP.T.', '6758', 'I love travelling different places.', 'Hi! My name is Deven, I am an experienced Website Developer.', 'dhshsj', NULL, NULL, NULL, '2023-12-12 02:19:06', '2023-12-12 02:19:06', NULL, '1', NULL, 0, NULL, '1', 1, '1,7', 980),
(369, 'Vikas', 'vikas', 'vikas@techninza.in', '$2y$10$dZ2FErKqzj2YAenah42lu.PJcyUq40meZwZowfhjESF.w3TG1K/HW', '27383267', 'I like listening music in my free time.', 'My name is Vikas and I am currently working as a freelancer for the people who are willing to get a website developed.', 'dhshsj', NULL, NULL, NULL, '2023-12-12 02:42:18', '2023-12-12 02:42:18', NULL, '14,3,23,25,5', NULL, 0, NULL, '1', 1, '7,1,8', 980),
(370, 'Ankur', 'ankur', 'ankur@techninza.in', '$2y$10$dWgajCOMqUbeAN/Mz2FaduxEsSXZ5GMEr1FxF39auOfR31FW80XYS', '98479823', 'My favorite pass time is to play online games.', 'My name is Ankur, I am a website developer with an overall experience of 3 years.', 'rgdf', NULL, NULL, NULL, '2023-12-12 02:54:40', '2023-12-12 02:54:40', NULL, '14', NULL, 0, NULL, '1', 1, '14,1,5,7', 990),
(371, 'Piyush', 'piyush', 'piyush@techninza.in', '$2y$10$/HGY8m.rS64cuXmFwUYYwu8Uw58rYb.dMGXzpOt.pCZOME8mUYKbG', '8327489', 'I am fond of learning new skills.', 'I am an experience website developer with the expertise in Javascript & HTML.', 'jjghj', NULL, NULL, NULL, '2023-12-12 03:23:50', '2023-12-12 03:23:50', NULL, '1', NULL, 0, NULL, '1', 1, '7,8,1', 990),
(372, 'Rahul', 'rahul', 'rahul@techninza.in', '$2y$10$pk8HK2ACHBv4tLDNHmO03eqHS8/1xYuP/Mvz00zs05QONTIg33jwy', '4646', 'I like coding & creating unique websites.', 'Website Developer with an overall experience of 4 years.', 'gdgh', NULL, NULL, NULL, '2023-12-12 03:56:06', '2023-12-12 03:56:06', NULL, '1,24,23,5,4', NULL, 0, NULL, '1', 1, '1,9,14', 380),
(373, 'Dinesh', 'dinesh', 'dinesh@techninza.in', '$2y$10$sUWNNwqasvNzNzMRLb5ptOUzF2p6775a5nfhaCFUOMueiWiXS6Kbi', '545645', 'I love playing guitar.', 'Hello! I am Dinesh, a developer by profession & guitarist by choice.', 'htrhrt', NULL, NULL, NULL, '2023-12-12 04:01:21', '2023-12-12 04:01:21', NULL, '1', NULL, 0, NULL, '1', 1, '1,8,11', 700),
(374, 'Prashant', 'prashant', 'prashant@techninza.in', '$2y$10$86y4rlcI4/1X5WluXYt1B.0me6ggktS8dqV0iqyyUEzqmUjvCV4f6', '9794832', 'As a professional, I am a hardworking developer who believes in delivering quality products to my clients.', 'I am an avid cricket lover who loves to watch & play cricket.', 'dgdfgh', NULL, NULL, NULL, '2023-12-12 04:05:50', '2023-12-12 04:05:50', NULL, '1', NULL, 0, NULL, '1', 1, '1,14,9', 690),
(375, 'Arpit', 'arpit', 'arpit@techninza.in', '$2y$10$r5i1kz/bHKteGuZX2q6Sbez5jviZlHWrfFRaYqNJNTJfbfw2di1pq', '2747347', 'Hi, I am a web developer & an expert in creating websites.', 'I like playing football', 'fgfgfn', NULL, NULL, NULL, '2023-12-12 04:11:25', '2023-12-12 04:11:25', NULL, '1', NULL, 0, NULL, '1', 1, '13,11,8,5', 730),
(376, 'Shivam', 'shivam', 'shivam@techninza.in', '$2y$10$uWm7MOsCMMVkxLATVWVDh.8Yz9AozUD94orwFje3oXMOnDstC4G5O', '2899823', 'I believe in providing robust solutions to my clients.', 'Hi there! my name is Shivam, I am a web developer holding 2 years of work experience as a developer.', 'fgsdg', NULL, NULL, NULL, '2023-12-12 04:17:51', '2023-12-12 04:17:51', NULL, '1', NULL, 0, NULL, '1', 1, NULL, 770),
(377, 'Naman', 'naman', 'naman@techninza.in', '$2y$10$e.yqF2qSveGZZasMCGAZTOVTdBJNQuMRDIQSSj1jkcgHTk/g4tYQK', '387395', 'Hi, I am a highly experienced mobile application developer. I have an expertise in creating customized mobile apps compatible for both android & IOS.', 'Mobile App Developer', 'dfgdfg', NULL, NULL, NULL, '2023-12-12 04:23:59', '2023-12-12 04:23:59', NULL, '20', NULL, 0, NULL, '1', 1, '2,4,3', 910),
(378, 'Parth', 'parth', 'parth@techninza.in', '$2y$10$GlfiDimM/DrwLXmOE3SQneuolalh.xe5Vri3rNGKd9EjtWO1dEGie', '45456546', 'I am an IOS mobile application developer holding a good amount of experience in the same.', 'IOS app developer', 'fxgfgngh', NULL, NULL, NULL, '2023-12-12 04:39:11', '2023-12-12 04:39:11', NULL, '9', NULL, 0, NULL, '1', 1, '1,3,2', 870),
(379, 'Neha', 'neha', 'neha@techninza.in', '$2y$10$HL7NNDGZj7bh9onQZ0P7WuFAzcIpH6dTMhbyTGWLk/pVDvPZrBbx2', '46364', 'My name is Neha, I am a mobile application developer and believe in providing robust solutions.', 'Hello! I am Neha, a mobile app developer.', 'rewtwey', NULL, NULL, NULL, '2023-12-12 04:46:15', '2023-12-12 04:46:15', NULL, '20', NULL, 0, NULL, '1', 1, '1,3,2', 870),
(380, 'Nidhi', 'nidhi', 'nidhi@techninza.in', '$2y$10$6aqgNNUGKlkTosDmWozuDerq0BxN3QgrYCHn6.eE6sW8x.fmFdUu6', '3225236', 'Hi! I am a experienced mobile application developer. Having 3 years of total work experience in the same.', 'App developer', 'nbmhjgkhjk', NULL, NULL, NULL, '2023-12-12 04:50:36', '2023-12-12 04:50:36', NULL, '20', NULL, 0, NULL, '1', 1, '1,3,2', 950),
(381, 'Shivangi', 'shivangi', 'shivangi@techninza.in', '$2y$10$NSrlt1f40yXKWn5Q5YV3heoV3rxx3RnRDe9zQzADos0eDTKU0e9yW', '6437457468', 'I am a passionate mobile app developer with a keen interest in coding.', 'Mobile Application Developer', 'htrhrt', NULL, NULL, NULL, '2023-12-12 04:53:28', '2023-12-12 04:53:28', NULL, '20', NULL, 0, NULL, '1', 1, '1,2,3', 980),
(382, 'Satyam', 'satyam', 'satyam@techninza.in', '$2y$10$FmLatr7QUAfTYOhGOOUvDOXUvfRF3dD1IleznYnEwL0V0K5.Rzp2a', '938748293', 'I am having 5 years of experience in developing mobile applications. ', 'Experienced App Developer', 'asfaf', NULL, NULL, NULL, '2023-12-12 04:59:16', '2023-12-12 04:59:16', NULL, '20', NULL, 0, NULL, '1', 1, '3,2', 890),
(383, 'Niharika', 'niharika', 'niharika@techninza.in', '$2y$10$3NZ6TcU6m5vzEb6JJzhtguE.glLwPlteJevFfxmO62ZZN6/vaHNBW', '87324628347', 'I am having an ample experience in developing customized mobile applications, connect with me if you need to develop any app based solution.', 'mobile app developer', 'sfdaf', NULL, NULL, NULL, '2023-12-12 05:01:33', '2023-12-12 05:01:33', NULL, '20', NULL, 0, NULL, '1', 1, '1,2,3,4', 950),
(384, 'Ayushi', 'ayushi', 'ayushi@techninza.in', '$2y$10$90UvLgKpS70GxFiEeUwImuL12.K12UGq60p37x6YbAbvIRQ/F9Rpm', '7492348928', 'My name is Ayushi and I am an experienced mobile application developer.', 'I am an app developer with 2 years of experience.', 'uykyk', NULL, NULL, NULL, '2023-12-12 05:04:11', '2023-12-12 05:04:11', NULL, '20', NULL, 0, NULL, '1', 1, '3,1,2', 980),
(385, 'Lakshita', 'lakshita', 'lakshita@techninza.in', '$2y$10$94DMXU.1VQI82z.FDBQZr.zvv3VcefH6uPW/4IHEuwL2EqNqNMcrW', '8924894', 'Hello! I\'m Lakshita, a dedicated  developer with a passion for creating scalable solutions. With 2 years of experience in the field.', 'Hi there! I\'m Lakshita, a dedicated App Developer with a flair for crafting efficient applications.', 'ewrrter', NULL, NULL, NULL, '2023-12-12 05:07:02', '2023-12-12 05:07:02', NULL, '20,26', NULL, 0, NULL, '1', 1, '1,3,2', 970),
(386, 'Drashti', 'drashti', 'drashti@techninza.in', '$2y$10$d10OFIJffyRgvPEtRdbUzOsCteyZUP1hSYks2XTS2iGbcpqHUu/ge', '53646327', 'As a mobile application developer I believe in delivering customized solutions to my clients.', 'I am having a good amount of exeprience in developing mobile apps.', 'ncnasd', NULL, NULL, NULL, '2023-12-12 05:09:55', '2023-12-12 05:09:55', NULL, '20,26', NULL, 0, NULL, '1', 1, '1,3', 930),
(390, 'Vishal Customer', 'vishal-customer', 'sandeepmehandia2@gmail.com', '$2y$10$kDHUgP8dIvuh.Qd43pFRGe.k/ERqFBvdu52aq.sJKncEw2pEzDPEW', '8901244444', NULL, NULL, NULL, NULL, 'https://shopninja.in/sooprs/assets/files/658e846cafd62-1703838828.png', NULL, '2023-12-27 10:54:30', NULL, NULL, NULL, 1, 1, NULL, '1', 1, NULL, 50),
(391, 'Rahul Professional', 'rahul-professional', 'sandy.sunny3105@gmail.com', '$2y$10$NgzJztJJD7GMTMXPSwmPpeY3AAP9uT7xkfFBElfEP1PG3KilmHQr.', '8901255555', '', '', '', 'https://sooprs.com/assets/files/6597db00c02b0-1704450816.pdf', 'https://shopninja.in/sooprs/assets/files/658e94b8d73f1-1703843000.png', NULL, '2023-12-27 10:56:20', NULL, NULL, NULL, 1, 0, NULL, '1', 1, '', 200),
(397, 'sunny the funny', 'sunny', 'sunnythesandy@gmail.com', '$2y$10$4eKo0GOVz/PyzL/VcTGEquzYp1eqcRJxg5WHlp3nyrl6IFjEoHsbm', '8956411556', 'hello there, i\'m sandeep', 'i\'m sandeep ', 'techninza', 'https://sooprs.com/assets/files/65992475cfd66-1704535157.pdf', 'https://sooprs.com/assets/files/65991f4260ebb-1704533826.png', NULL, '2023-12-30 07:01:15', NULL, NULL, '2,4', 1, 0, NULL, '1', 1, '6', 30),
(398, 'Gokul', 'gokul-1', 'gokul@techniza.in', '$2y$10$dVajom8lbgIoN1W4saEYqeJFyEfQsXCtPXaHCOkm1x1fvo0YPF5xm', '8282839393', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-30 10:05:17', NULL, NULL, '16,26', 1, 0, NULL, '1', 0, NULL, 50),
(401, 'Devendra Tilante', 'devendra-tilante', 'devtilante@gmail.com', '$2y$10$pIW5A6L9eiULFDm4uJlxD.ORcR8S1AEs4Y9OFv6EWfycpMdKYT3NS', '8010382511', 'I have 10+ years of experience in Web and Mobile app development like Android App Development, Website designing, Website Development, CRM/ ERP Development.', 'Expert Full Stack Developer(Web & Mobile) with 10+ years of experience.', 'Freelancer', 'https://sooprs.com/assets/files/659525d08564a-1704273360.pdf', 'https://sooprs.com/assets/files/65952586a6f24-1704273286.jpeg', NULL, '2024-01-03 06:37:39', NULL, NULL, NULL, 1, 0, NULL, '1', 1, '1,2,11,16,18,33,32,28,27,26,22,12,15,14,13', 50),
(402, 'Customer2023', NULL, 'sandeep.meh258@gmail.com', '$2y$10$lTd8IFOvaZJ5m0QFgaFF1uwkphnw/7JDV6AAlZgzVp7JH79ecIOGi', '8929920200', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-05 06:02:47', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(403, 'Customer2023', NULL, 'vinay@techninza.in', '$2y$10$0zZm6mQfHGhavMR9FuQCcOD35ILi9eL9I8CW4Q517Gvf/VURDcdDO', '8375910558', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-05 10:41:17', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(409, 'Cust20240105232611', NULL, 'sandeep.meh208@gmail.com', '$2y$10$pl4VmU5/wqy2f9HLYor/WeFhcaUmGBHU4a0saOoxXH1E7E51.Kq6y', '8978788999', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 05:26:11', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(411, 'Madhur Jain', 'madhur-jain', 'madhurjain.198@gmail.com', '$2y$10$y6N.k2WIEY1aGVUZxP5H.ONxBU0D4tL7ra0446vXU46j26s1qG7tS', '9690093253', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 09:58:11', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(412, 'Cust20240107010853', NULL, 'gnoi45@gmail.com', '$2y$10$SNWooetweAhZ7Nhb391NTuqA31nuZ5XuU6dE45AMi7Fpb25xfGnXO', '9523558483', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-07 07:08:53', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(413, 'Gokul Kumar', 'gokul-professional', 'gokul@techninza.in', '$2y$10$f.gMKzdT0E9.SWA7uUR0EOh4WeqyuVWVRpS/zw0FBznUqD1FXYr1W', '8178924823', 'Programmer, Seeking Business Opportunities', 'Software Developer with more than 12 years of experience ', 'Techninza', NULL, 'https://sooprs.com/assets/files/65a001b536376-1704985013.jpg', NULL, '2024-01-07 07:20:06', NULL, NULL, '1,2,4,5,23', 1, 0, NULL, '1', 1, '1,4,5,7,11,14,17,31,16', 1000),
(414, 'Cust20240108014506', NULL, 'poornimajindal2002@gmail.com', '$2y$10$6BDhrw6mBuFJXQxcEHTaT.GSGlLmnZThLjyvIw1w5twAMUrTt0XD6', '8595789276', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 07:45:06', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(415, 'Prem Kumar', 'prem-kumar', 'tr5531803@gmail.com', '$2y$10$o8W4As/DZ14T1HKlFHJiMeikYbv9EZH.hTsMppcF2Ugr4jtFNfPiO', '9519691405', 'Experienced UI/UX designer with a flair for transforming ideas into captivating digital interfaces. Proficient in tools like Figma, Illustrator, and Sketch, and skilled in bringing designs to life with HTML/CSS and JavaScript. Dedicated to creating user-centric experiences that seamlessly blend aesthetics with functionality.', 'Passionate UI/UX designer crafting seamless digital experiences that blend creativity with user-centric design, dedicated to transforming concepts into visually stunning and intuitive interfaces for a diverse range of clients.', 'Techninza', 'https://sooprs.com/assets/files/65a7a72944f30-1705486121.pdf', 'https://sooprs.com/assets/files/65a7a7cee5087-1705486286.jpg', NULL, '2024-01-09 05:30:17', NULL, NULL, '23,1', 1, 0, NULL, '1', 1, '4,8,7,15,27,41,49,46', 40),
(416, 'Cust20240109002152', NULL, 'archanachaturvedi004@gmail.com', '$2y$10$2BGKiMjfs.hewfcDUKnBAOnBD/Onja0o0vUcXyjvk6eS244SUxeze', '7081886020', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:21:52', NULL, NULL, NULL, NULL, 1, NULL, '1', 0, NULL, 50),
(417, 'umesh yadav', 'umesh-yadav', 'yadav188@gmail.com', '$2y$10$iSRvOiGySTAd2MvTj.qddOMHNM4NXurFSXgoanvyltJ84rx8c4fmm', '9936508089', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 18:07:05', NULL, NULL, NULL, 1, 1, NULL, '1', 1, NULL, 50),
(418, 'AMAN BHUTANI', 'aman', 'aman54bhutani@gmail.com', '$2y$10$NdlmF6rzENW4/YzRCAidGemakB80osrOKi9SkSjb0PUiAKfiWr5U2', '8950209555', 'A passionate Digital Marketing Specialist with expertise in Search Engine Optimization (SEO), Search Engine Marketing (SEM), Social Media Optimization (SMO), Social Media Marketing (SMM), Online Reputation Management (ORM), Brand Promotion & Management, and Google Ads. Above are a few of the basic services that I may provide as a Digital Marketing Specialist for your business. If you\'d like to grow your business, get in touch with me.  Others Services = Photo Editing, Video Editing (Social Media), logo Designee and many others.', 'DIGITAL MARKETER', NULL, NULL, 'https://sooprs.com/assets/files/65ee90fd2bd5d-1710133501.jpg', NULL, '2024-01-10 13:02:49', '2024-04-08 10:01:19', NULL, '48,47,46,24,10,7,5', 1, 0, NULL, '1', 1, '35,37,38,39,40,41,34,47,48,52,51', 940),
(419, 'Harish Uginval', 'harish-uginval', 'dass.harish@gmail.com', '$2y$10$BFmS2fXZBI.CBxggi8AhoeQDZtI3aNT3ooAdJu0S5tW2C2UGjQrWC', '8800128259', 'I have 8 years working as Android and IOS developer. Currently working in US MNC company as senior android developer. ', 'I am experienced Senior Android and IOS developer', '', NULL, 'https://sooprs.com/assets/files/659fba1041924-1704966672.jpeg', NULL, '2024-01-11 06:45:18', NULL, NULL, '20,2,22', 1, 0, NULL, '1', 1, '2,18,20', 50),
(420, 'Cust20240111025451', NULL, 'sddfsf', '$2y$10$NEFixtvvsOfxREJQgcT4heDtZL8RlZhuILE07YwREGIAE7NmwNteq', '2334', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:54:51', NULL, NULL, NULL, NULL, 1, NULL, '1', 0, NULL, 50),
(421, 'Cust20240111044835', NULL, 'srgsg', '$2y$10$S7L/0uD74/0saNGw3Ixf8OqWQhbc1KhyoJwxnSwZ3DNyOu8ye5jTG', '645645', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 10:48:35', NULL, NULL, NULL, NULL, 1, NULL, '1', 0, NULL, 50),
(422, 'Cust20240111225552', NULL, 'gdfgfd', '$2y$10$HcXBRH2x5Ov/5q2LVEhx8ueATWrytJ4tSy6m5Leqexkpt7OK3t/si', '3434', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-12 04:55:52', NULL, NULL, NULL, NULL, 1, NULL, '1', 0, NULL, 50),
(423, 'Prity Kumari', 'prity-kumari', 'pritykumari.sharma0125@gmail.com', '$2y$10$hnyS1eMRMpfWbtGR.brOXOMLAbHvmzSCieF5uy.bpscqzmK3M3TfC', '9708501572', 'We are an award-winning top digital marketing agency offering a specialized spectrum of digital services across multiple industries. We believe that building a brand is not just about selling a lucrative product, but much more about the association it makes with the general audience. And we think there is no place more vital than the digital world to achieve this purpose.', 'Our success in creating business solutions is due in large part to our talented and highly committed team.', 'Digi Global Services ', 'https://sooprs.com/assets/files/65a10ae53e057-1705052901.pdf', NULL, NULL, '2024-01-12 05:33:53', NULL, NULL, '5,7,1,23,24', 1, 0, NULL, '1', 1, NULL, 0),
(424, 'Cust20240112002907', NULL, 'svsv', '$2y$10$crcr7iHrYXEOm0ZOaX4jme7S/khvuGQysCzRBtmq/CKX/3WK/S5j6', '3535', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-12 06:29:07', NULL, NULL, NULL, NULL, 1, NULL, '1', 0, NULL, 50),
(425, 'Rudra Sharma', 'rudra-sharma', 'rudrasharma@gmail.com', '$2y$10$uyQYhutdEPy.KCQld8eYguNrNfr6hJqSKel10TlVqXU3wvch67mVS', '9635648758', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-12 12:31:25', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(426, 'karan singh', 'karan-singh', 'karan637554@gmail.com', '$2y$10$Tsq6v9QIybP0AmouhFRg4eKFbYZPaKd3XYL3JwqZIXCqsC4OCitQ.', '6375542174', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-13 11:18:38', '2024-03-01 06:58:49', NULL, '4', 1, 0, NULL, '1', 1, NULL, 50),
(427, 'Hemant Kumar Maurya', 'hemant-kumar-maurya', 'sharewithmaurya@gmail.com', '$2y$10$XinnqalShDFLea5ULrtKme/l6K3i/dGWa4YI4f00vdbBcauU5L3K.', '7042901060', 'As a seasoned Backend Manager with a wealth of experience, I bring proficiency in a comprehensive stack including JavaScript, Node.js, MongoDB, Amazon S3, Amazon EC2, and Linux fundamentals. My expertise extends beyond technical skills to encompass effective leadership of high-performing development teams. I specialize in optimizing backend infrastructure, ensuring the seamless delivery of scalable and efficient web applications. With a keen eye for detail and a results-driven approach, I am committed to driving innovation and exceeding performance expectations in the dynamic realm of backend development.', 'Experienced Backend Manager proficient in JavaScript, Node.js, MongoDB, Amazon S3, Amazon EC2, and Linux fundamentals, adept at leading high-performing development teams and Optimising backend infrastructure to deliver scalable and efficient Web App', '', 'https://sooprs.com/assets/files/65a2b3dd05828-1705161693.pdf', NULL, NULL, '2024-01-13 15:51:37', NULL, NULL, '1', 1, 0, NULL, '1', 1, '7,15,19,27,8,26,14', 50),
(428, 'Pro Test', 'pro-test', 'liyorin112@ikuromi.com', '$2y$10$vyb4mJiCrJEd.LVwVInwt.me1emMe0Wszzw/Y7uaWyBwN2pYP7of6', '8282828281', 'About Testing', 'Short BIO Testing', 'testing organisation', NULL, NULL, NULL, '2024-01-16 18:04:56', NULL, NULL, NULL, 1, 0, NULL, '1', 1, '1,4,10,9,44,6,11,2,13,14,15,16,17,18,29,31,41,48,50', 50),
(429, 'Amit Sharma', 'amit-sharma', 'amitsharma_88@live.com', '$2y$10$BvPJ8jz1kGB1NAyo8mkrC.h1KUNhHS.iiDjDNNFmYXRG/MuiqOjPS', '9811624074', 'Hi, my name is Amit, I have more than 12+ Years of experience in High-Quality SEO Services, SMO, SMM, SEM (Google AdWords/ PPC), Content Writing, Website Design, Website Development, Domain and Hosting Services. I have developed and improved various successful websites on top ranking on Google, Yahoo, and Bing. Highly skilled in Website Development, Magento, PHP, MySQL, SEO, SMO, Google AdWords, Domain Registration, Dedicated Servers, Business Hosting. Services Offered: SEO Services, SMO (Social Media Optimization), SMM (Social Media Marketing), SEM (Google AdWords/ PPC), Content Writing, Website Design, Website Development, Domain and Hosting Services. I have a \"GET IT DONE\" attitude, due to which my relationship with clients always goes as Long-Term and make them get back to me for their future requirements. Looking forward to working with you.', 'SEO, Internet Marketing, Link Building, Marketing, Website Design', 'techninza', NULL, NULL, NULL, '2024-01-17 07:21:21', NULL, NULL, NULL, 1, 0, NULL, '1', 1, '1,3,4,7,14,37,35,39,40', 50),
(430, 'Nilesh Tiwari ', 'nilesh-tiwari', 'nileshtiwari1391@gmail.com', '$2y$10$Z2P4.yvbeqkftaGcdmy2COsUPnQTM9wuPDPuOGuYiHRw9Pdhu.JyO', '9511536100', '', 'Full Stack Web Developer with 6 years of experience.', '', NULL, NULL, NULL, '2024-01-17 07:22:20', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(431, 'Sukrat', 'sukrat', 'sukrat040@gmail.com', '$2y$10$iIxExhBXBhqcx34DL5Oa4OZlizVYjYcUqugbR0MkRPczFZpW9sA4e', '7988481498', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 07:40:27', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(432, 'Milton Chowdhury', 'milton-chowdhury', 'miltonchowdhiry@gmail.com', '$2y$10$VdyTkJ9o9aOC0gnbG9BY2ufyBTUUkYsor9TUqNI.0MKctyzHl8ESm', '8240355288', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 08:49:32', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(433, 'Koushik Sarkar', 'koushik-sarkar', 'koushiksarkaroffice@gmail.com', '$2y$10$efoqQNq1u4Z3VPdKiHOecOSgvj4rG2wfn/UTuzgA2r/WEpy1nx4tW', '9883509963', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 09:05:27', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(434, 'Anurag Chauhan', 'anurag-chauhan-1', 'sanurag0022@gmail.com', '$2y$10$2E6Inm/Nd6Jth8qYogN1POC8UTWyeQG1j62vGg8qj8Tgz399GnAvG', '8077556071', 'I\'m a passionate and results-driven software developer with a keen interest in PHP, LARAVEL, NodeJS, Javascript. My journey in the world of programming began leapx, meta trader and since then, I\'ve been on a continuous quest to expand my skills and contribute meaningfully to the tech community.', 'The fast-paced nature of the tech industry excites me, and I am committed to staying updated on the latest trends and technologies', 'Techninza', 'https://sooprs.com/assets/files/65a7a4ea38aee-1705485546.pdf', 'https://sooprs.com/assets/files/65a7a097a7820-1705484439.jpg', NULL, '2024-01-17 09:37:20', NULL, NULL, '1,16', 1, 0, NULL, '1', 1, '1,4,7,8,14,15,19', 50),
(435, 'Kapil Rohilla', 'kapil-rohilla', 'kapilrohilal2002@gmail.com', '$2y$10$sYo.zTXCstZh5gAMaF5DUuUFG3nljLuNU1FvTc7luPcfHZ/WCkWX6', '8287842425', 'I\'m a Software developer with good knowledge and Experience in MERN Stack and react-native.', 'MERN Stack Developer', 'Student', 'https://sooprs.com/assets/files/65a7a393f2ba3-1705485203.pdf', NULL, NULL, '2024-01-17 09:40:50', '2024-04-08 02:00:21', NULL, '37,20,1', 1, 0, NULL, '1', 1, '8,7,16,17,19,33', 50),
(436, 'Chandan Sharma', 'chandan-sharma', 'chandansharma79928.fea@gmail.com', '$2y$10$rEyodTIozhbA4wvuwdXfueKLiYPzKV4jQsef.K.B/6XZrjccBfwJ.', '8789731744', NULL, NULL, NULL, 'https://sooprs.com/assets/files/65a7aa61a011a-1705486945.pdf', 'https://sooprs.com/assets/files/65a7a6e59e26f-1705486053.png', NULL, '2024-01-17 10:05:33', NULL, NULL, '1', 1, 0, NULL, '1', 1, '17,33', 50),
(437, 'ANKIT VALLABHABHAI GABANI', 'ankit-vallabhabhai-gabani', 'gabani7004@gmail.com', '$2y$10$tp.5JZcsqUQRa/qcJt4c9OeGg7wGO5ApURs6gDGcYPTX9nKUMZ4TO', '7096859504', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 10:23:28', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 40),
(438, 'Praveen pandey', 'praveen-pandey', 'praveenbhu6@gmail.com', '$2y$10$rFC24UYlm1xyaatm61/ixOFTfEeaBt69JcS4/U8vdwDBNgFBjtkEK', '7860674239', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:19:18', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(439, 'Pulkit Dixit', 'pulkit-dixit', 'pulkitdixit1232@gmail.com', '$2y$10$//dIOYkn9Zeg5nOjJzZcsOUINg.JDtqEDejIMrgYjMSrMD//NMSLy', '9058578736', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-02 05:33:50', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(440, 'Yinka Ogunsina', 'yinka-ogunsina', 'olayinkaolasina@gmail.com', '$2y$10$gr4mIN1NnbaxtPFmyWNxB.wGUYjcSRL7mP5W.UvkVlIC4Q6I8XsE6', '8145310768', 'Yinka Ogunsina is a proficient Digital Marketer specializing in Social Media management and personal branding.   I help organizations and individuals increase their online visibility and reach their target audience with my skills and expertise in SEO, social media management, content creation, Web design/optimization, Google knowledge panel creation and branding.  I have successfully delivered multiple projects for clients across various industries, such as education, health, fashion, crypto currency and entertainment, achieving high levels of customer satisfaction and retention.  As the founder of Supreme Generation, a professional organization that focuses on connecting businesses and individuals to the ideal worker who can handle their project professionally. I am also a passionate Christ Ambassador who preaches the good news of Christ, and a proficient freelancer who offers a range of services on platforms such as Fiverr, Upwork, and LinkedIn.  I have a National Diploma in Food Science and Technology from Osun State Polytechnic, and I have obtained several certifications from Semrush, a leading online marketing tool. I am always eager to learn new skills and explore new opportunities that can help me grow as a professional and as a person. I am devoted to improving people\'s lives as well as society and the nations.  If you are looking for a reliable, creative, and results-oriented partner for your digital marketing and branding needs. I can\'t wait to take your business to the next level!', 'A proficient Digital Marketer and leader of a team. ', 'Supreme Generation', NULL, 'https://sooprs.com/assets/files/65beb3153454f-1706996501.jpg', NULL, '2024-02-03 21:35:52', NULL, NULL, '5,7,24,1', 1, 0, NULL, '1', 1, NULL, 40),
(441, 'PRADYUMNA VISHWAKARMA ', 'pradyumna-vishwakarma', 'pradyumna9956vish@gmail.com', '$2y$10$GxUDxMAfGmqOckuHl1An6OfR3VrbBcFXxDY0.wzyNrA7N3btECZm2', '7786920413', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 06:22:59', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(442, 'Amitesh Kumar ', 'amitesh-kumar', 'amitesh.kr1993@gmail.com', '$2y$10$8ayTU77QsXcbvwYLhQKJHeVWEWt2Hts75w/Cq9TfIXDlK8Twi9mVy', '8287896534', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 04:56:22', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(443, 'Sonal Saurabh', 'sonal-saurabh', 'sonalsaurabh8877@gmail.com', '$2y$10$ViE3Vh0W6ZlBh.YY3sOFYOwf/fceOnfSyNTRnzRCTMZZapYHj/BnW', '9599302496', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 11:22:34', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(444, 'Abdulsallam', 'abdulsallam', 'abdusallam808@gmail.com', '$2y$10$wZOibHI9.MIHUCVeosD7u.SWT91SuukY6Q71Y1vP.5.xIXWJXA0/G', '8103859303', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/65cb92b56ccd8-1707840181.png', NULL, '2024-02-13 15:58:29', NULL, NULL, NULL, 1, 1, NULL, '1', 1, NULL, 50),
(445, 'Cust20240217014829', NULL, 'vishal.data11@gmail.com', '$2y$10$9HWiieF1HNZhyFxkV4CPlui2RZs3HMH5MI0bo.iTA8X5XdjT/9Whq', '7383074483', '', '', '', NULL, 'https://sooprs.com/assets/files/65d06670b76d6-1708156528.png', NULL, '2024-02-17 07:48:29', NULL, NULL, NULL, NULL, 1, NULL, '1', 1, NULL, 50),
(446, 'Pallav Kumar', 'pallav-kumar', 'pallav.kumar837@gmail.com', '$2y$10$FpduBcgkBCMxpQJme2SDuu6AOvJg5HejBRt.CZLGmnFl7JJQkDPqy', '8010265036', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-17 10:34:42', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 40),
(447, 'Prince .', 'prince', 'princek082@gmail.com', '$2y$10$iae.JGIjcum1cUkLuceCRemDUJ32AGOJRp4SfURSz5VpD/CEH88k6', '9565521581', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-17 13:07:29', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 40),
(448, 'Arun Kumar Gupta', 'arun-kumar-gupta', 'arun99178@gmail.com', '$2y$10$rDjvNOwdnDtvY0khtEBNdeHPwIKXB3M340h/GQ/D9ry3BwWpm18ym', '886056651', 'Do you have a  job and are looking for a talented and experienced App and Webapp Design & development? I believe that my experience and skill in this background will prove to be of great help to you. I have worked as a Graphic Design Designer for many years and my skills and experience will prove useful to your work. I am ready to start working on your job today.', 'Do you have a  job and are looking for a talented and experienced App and Webapp Design & development?', 'webspecimen', NULL, 'https://sooprs.com/assets/files/65d2d906c7981-1708316934.jpeg', NULL, '2024-02-19 04:18:07', NULL, NULL, '2,4,20,23', 1, 0, NULL, '1', 1, '1,2,11,13,49,27,16,17,26,29,14,4,7,46', 50),
(449, 'pushpaja', 'pushpaja', 'pushpajachinthalapudi@gmail.com', '$2y$10$O2Uu6A1ViJGUiBav3mFK.uItP9Bg1VGK34ONhj79x2EYLRiKIIJjG', '7731078138', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-19 08:56:01', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 20),
(450, 'Shaik Baji', 'shaik-baji', 'shaikbaji1911@gmail.com', '$2y$10$nShyU2TqTOSAdnjEqhjPLO8m6wwPq2Glu7LXn/cKY2MbTd/MojDbC', '8096664941', 'I am experienced mobile engineer have developed almost 30+ apps and I love coding and building great apps in this era with the latest technology ', 'Experienced Mobile application developer Passionate about the Technology and have been great at programming and have worked for almost 20+ clients and delivered 30+ apps in affordable price Looking forward to work for many clients and give the quality work', '', 'https://sooprs.com/assets/files/65d326db88bbc-1708336859.pdf', 'https://sooprs.com/assets/files/65d32865c41c2-1708337253.jpg', NULL, '2024-02-19 09:51:01', NULL, NULL, NULL, 1, 0, NULL, '1', 1, '2,11,4,1,18,20,22,26,27,49', 40),
(451, 'Yogesh Penurkar', 'yogesh-penurkar', 'ypenurkar02@gmail.com', '$2y$10$.cYMf9EolrvUz31oULdDiOtIk9A8gynRSvaRUhx.zWyaWTwFvlh9K', '9607087400', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-19 11:34:12', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(452, 'satishprattipati ', 'satishprattipati', 'satish.cn32@gmail.com', '$2y$10$/.AxWQa/zJpbh17JFIHasuBdEo1B/3YTwWZyINi/FAEbPEOuA/W62', '7799414492', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-19 13:29:14', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 40),
(453, 'Rakesh Shrestha', 'rakesh-shrestha', 'stharakace7@gmail.com', '$2y$10$.PH2rLluBoVxFLbOuKKVE.VqLM40SpZjCjDNYhZ0DN/9WU0W5W84K', '9848580497', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-19 14:25:30', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(454, 'Dheepikaray T P', 'dheepikaray-t-p', 'dheepikaraytp551@gmail.com', '$2y$10$bwEypfUgkHGOhegrzIMI2.HiPbk9Aiz/My0X8k/1cX0ktUU8uxpQi', '8848486345', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 02:56:57', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 10),
(455, 'Muhammad Chand ', 'muhammad-chand', 'contactmrtarar@gmail.com', '$2y$10$KM0a.q/3FNo8PwU5KpLCEu449sVmt2RKTUjbO/I5rXzcZXaMTFLC6', '9231877810', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 06:00:36', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(456, 'Keyur kyada', 'keyur-kyada', 'keyurkyada8154@gmail.com', '$2y$10$1tWPZKE3Jd3k3QnNbhjr2eaRyA3wUkXjT7UqjHrMtjgdRwymp9166', '8154990520', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 06:27:38', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 20),
(457, 'Trushant Raut ', 'trushant-raut', 'trushant777@gmail.com', '$2y$10$0jgpv/x1BFdcHof2S3Lzdu03x3ZPgwpPJ/zheF9Fc/P50X5qi3TEm', '7020690949', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 07:07:26', NULL, NULL, NULL, 1, 0, NULL, '1', 0, NULL, 50),
(458, 'Mohana Krishna Y', 'mohana-krishna-y', 'mohankrishnaiosdeveloper@gmail.com', '$2y$10$yWlpjxlXqWBFYt7pXoegjuYzRJK3W.RzdJ7uMmuUnPnb2BMGiiliC', '9110364897', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 07:13:15', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 20),
(459, 'Jaiprakash Sharma', 'jaiprakash-sharma', 'sjaiprakash457@gmail.com', '$2y$10$vIq5QPwuT5I6qUlfkEae4eak/0D6Q43c7g4Ov9fsVn67sqZ27NWyC', '9660859433', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 10:39:52', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 50),
(460, 'Ankit P', 'ankit-p', 'fiibixtech@gmail.com', '$2y$10$dJwLIc4e5AAEMPJJC8j2Guku0vJCKFuMVrWfVWy77ZJOxinfBWBLy', '9924452489', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 11:50:19', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 20),
(461, 'Kaushik Malaviya', 'kaushik-malaviya', 'malaviyakaushik800@gmail.com', '$2y$10$focMK4rdnhY.BjJwp7iR4OpeU66MghdWmBAzkwcaEWaotrXiZZEBi', '7405874947', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 12:00:23', NULL, NULL, NULL, 1, 0, NULL, '1', 1, NULL, 30),
(463, 'Khushal Agarwal', 'khushal-agarwal', 'khushal.agarwal987@gmail.com', '$2y$10$7FyzorAeg9fmeuzYuuR6HOIypL5Q.le7juzNcZ6XX0IsEAiqzRpNK', '+917384676470', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-20 16:48:24', NULL, NULL, NULL, 1, 1, NULL, '0', 1, NULL, 50),
(464, 'Femmite', 'femmite', 'blessingfem9@gmail.com', '$2y$10$h.chmXp6PcshUxmA5PD9H.CmRH5wJeozk1/6H2m6mQN741kM3CqBG', '+2347025150399', 'Femmite is a passionate and experienced game developer with a knack for creating immersive and engaging experiences. With over 10 years of experience in the industry, Femmite has worked on a variety of projects ranging from mobile games to AAA titles. He is proficient in a variety of programming languages and game engines, including Unity and Unreal Engine. Femmite is known for his creativity, attention to detail, and ability to problem-solve in high-pressure situations. His love for gaming drives him to constantly push the boundaries of what is possible in the gaming world. When he\'s not coding, Femmite enjoys playing video games, watching movies, and exploring new technologies to incorporate into his work.', 'Femmite is a passionate and experienced game developer with a knack for creating immersive and engaging experiences. With over 10 years of experience in the industry, Femmite has worked on a variety of projects ranging from mobile games to AAA titles. He is proficient in a variety of programming languages and game engines, including Unity and Unreal Engine. Femmite is known for his creativity, attention to detail, and ability to problem-solve in high-pressure situations. His love for gaming drives him to constantly push the boundaries of what is possible in the gaming world. When he\'s not coding, Femmite enjoys playing video games, watching movies, and exploring new technologies to incorporate into his work.', '', NULL, NULL, NULL, '2024-02-21 01:43:35', NULL, NULL, NULL, 1, 0, NULL, '0', 1, '2,10,1,3,16', 50),
(465, 'Mayank Kankoriya', 'mayank-kankoriya', 'mayankkankoriya45678@gmail.com', '$2y$10$099BA/tEgMApIvwpnBu5m.mWzjuSiyvxHSIy6Xb1flnoIM9R3K6eK', '+918319092790', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 06:21:59', NULL, NULL, NULL, 1, 0, NULL, '0', 1, NULL, 50),
(466, 'Md. Nifaur Rahman', 'md-nifaur-rahman', 'mdnifaurrahmanx27@gmail.com', '$2y$10$hUs4rj2phsn6t4bSCFZUxu9U5yD180Dc1ZxciOnKllQO2dJnNXgOi', '+8801647221465', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 10:08:36', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 40),
(467, 'palita tushar', 'palita-tushar', 'palitatushar@gmail.com', '$2y$10$K/PnYau80Z35Rc1DZsf8tOH2HA4CdS.UAEOqDZKc2HGBiC1i7Ni0K', '+918238906472', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 10:32:00', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(468, 'Muhammad Ali', 'muhammad-ali', 'anslyali90@gmail.com', '$2y$10$TheZ8iJYr9Gjzz/QkrK2MeO6hHn0YEb/twYO1RyPQDq0hb1t37zUm', '+923125792187', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 11:01:54', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(469, 'Tayyaba Rafique', 'tayyaba-rafique', 'tayyabarafique203@gmail.com', '$2y$10$QFHxhdCXk72/DO1xD6rL0.lQQRvBf/egu0LE1sPYM8vCP3jUE9sL6', '+923020169873', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-21 14:46:56', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 30),
(470, 'Varun Kudalkar', 'varun-kudalkar', 'varun.kudalkar@gmail.com', '$2y$10$kuM0wjcwpaPGerLNTl1ZlOnS/zLjEG06xENwR6UqWfApkxaVcVzhm', '+917588364088', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 06:19:58', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(471, 'Muhammad Yasir wakeel ', 'muhammad-yasir-wakeel', 'sweetyasir186@gmail.com', '$2y$10$UHz637Yr0X.oRtkprdnW2ObaMXGChc9gdZXRZKUPO24wG3qUcVLIi', '+923057396571', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 07:24:30', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 0),
(472, 'Safeer Hussain', 'safeer-hussain', 'sgondal3770@gmail.com', '$2y$10$2a3TGS9bBBwD5ZGp6HYPrOi5A1ndWdLCd/MAl8.1AYDRyd7QfEedi', '+923076893835', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/65d70344b638d-1708589892.jpeg', NULL, '2024-02-22 08:04:27', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, '33', 40),
(473, 'Asim Shahzad', 'asim-shahzad', 'asimshahzad6763132@gmail.com', '$2y$10$iTuekLfZ0kd198D7fIQMxOFwQLILI17y0l9ciBYzmrB1YRqVC8QL2', '+923066073796', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 08:50:30', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(474, 'Fahad Shoukat', 'fahad-shoukat', 'fahad.shoukat111@gmail.com', '$2y$10$2ZrupiPDM4Wqcl7OQnLe9OSh2IHaE9Ai0hQnq.ZU5kf1JfUUlQS2m', '+923332344848', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 09:26:58', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(475, 'Hasnaat Farooq', 'hasnaat-farooq', 'hassnaatfarooq@gmail.com', '$2y$10$86UfLUE87f.RlTrvGsuu2.Hdlvcq5SmOewaWafN5cwK45ErBC8dJ2', '+923497430201', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 09:33:59', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(476, 'Collins kipkorir ', 'collins-kipkorir', 'collinskipkorir430@gmail.com', '$2y$10$XmU614R9XUbHOg4nwyK/x.lXpmiv1itZhds5.zIYwlKOZr6jqhXZa', '+2540724780159', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 10:01:02', NULL, NULL, NULL, 1, 0, NULL, 'KE', 1, NULL, 40),
(477, 'Aman Chhetri', 'aman-chhetri', 'gattiflab@gmail.com', '$2y$10$HeXwSXdIhh2XTOILxyNiveKRJZlOHkomnpGqnmJ6xWz6Apc4SYf1C', '+918700607125', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 11:20:28', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(478, 'Jay Tamakuwala', 'jay-tamakuwala', 'jaystamakuwala@gmail.com', '$2y$10$HfWSAZbv3gWqjxG74nJ5le.0/ydzWYpcHVNAxvENYDqN.JwcC0sVG', '+917405519598', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 11:48:52', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 30),
(479, 'Rexileen vinola R', 'rexileen-vinola-r', 'rexileen@yahoo.com', '$2y$10$lz0RA/5KUOQaNPU0vCKJd.oxYhGshc6qqzbXrXsf13bLsgt94hjle', '+919488881352', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 12:02:54', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(480, 'Thomas ', 'thomas', 'ramonolalekan43@gmail.com', '$2y$10$fBC50whtmS.iS9cqg7coveJwINyDkgmq95qaZe24fGDJ/O7bXV8ce', '+2347058089937', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 12:12:10', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 50),
(481, 'Nemanja Matijevic', 'nemanja-matijevic', 'nemanjamatijevic32@gmail.com', '$2y$10$lBArlpZ/WkxVC9qvFlRC1u.G2EFYHfo48dWNpE/dJKaWU6XhWGkOy', '+381615204210', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/65d7b44576e9c-1708635205.jpg', NULL, '2024-02-22 12:22:11', NULL, NULL, NULL, 1, 0, NULL, 'RS', 1, NULL, 30),
(482, 'Rahul Bhalerao ', 'rahul-bhalerao', 'rahulsbhalerao2294@gmail.com', '$2y$10$7bT9FyiCA8i/OUMuGeOzhOm5kH./8Z6lEkQsTAgMC8hF3ON8JuJYa', '+918668837758', NULL, NULL, NULL, 'https://sooprs.com/assets/files/65d7462e7965b-1708607022.pdf', NULL, NULL, '2024-02-22 13:01:51', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(483, 'tejdiv', 'tejdiv', 'tejdiv123@gmail.com', '$2y$10$0ONxnz42DL70dT68ihCzrexbbVsrkfbXNAYU6DFuT8HXLShQxuBnG', '+918000410561', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 14:14:56', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(484, 'Aarif ', 'aarif', 'serverfix22@gmail.com', '$2y$10$6i0UK0Box1lLfCW/aSvWVuW2vJDjFwM001v6oRmUKvBu5XKMlytFC', '+916284957785', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 14:16:50', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 30),
(485, 'Jaweria Mehmood', 'jaweria-mehmood', 'jaweriamehmood94@gmail.com', '$2y$10$XK6nnB7QpYqMXZu.qUcRz.5QH//mJSOGiYY6RcWMu/JAB/.i.D.N.', '+9203103023446', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 15:15:01', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(486, 'Ahsan', 'ahsan', 'ehxanali2546@gmail.com', '$2y$10$e.VQu1OxEDO.oDAohWX5M.WnFlCNxVgi/t8vgTvFNtq1OBurpD7pC', '+923227834344', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 16:02:37', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(487, 'MJ Ramirez', 'mj-ramirez', 'manueljramirez3@gmail.com', '$2y$10$fjxkLdNkAX33elvyZY2hnOATxa4oTf7wEturpBYEW6KXEIACN/x9W', '+16174871833', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 17:21:49', NULL, NULL, NULL, 1, 0, NULL, 'US', 1, NULL, 50),
(488, 'sharad', 'sharad', 'vyas.sharad11@gmail.com', '$2y$10$pjHGHo50Siob/7WnGb0GkO8Ql/r/pE/6bI5GIKUVyfr/ocdLhO.Gq', '+917354308563', 'As a seasoned Mobile App Developer with a passion for crafting innovative and user-centric applications, I bring over 8 years of hands-on experience in the dynamic realm of mobile development. My expertise lies in creating seamless and high-performance applications across multiple platforms, with a focus on Android, React Native, and Flutter.  Professional Background: Throughout my career, I have demonstrated a commitment to delivering cutting-edge solutions that meet the ever-evolving demands of the digital landscape. My proficiency in Android development spans the spectrum, from concept to deployment, ensuring a smooth user experience and robust functionality. Additionally, my mastery of React Native and Flutter empowers me to create cross-platform applications that seamlessly integrate with diverse devices, offering a broad reach and optimal performance.  Technical Proficiency:  Android Development: Proven track record of creating feature-rich Android applications, leveraging the latest technologies and design principles to ensure optimal performance and user engagement.  React Native: Extensive experience in harnessing the power of React Native to build efficient and scalable cross-platform applications, enabling clients to reach a wider audience without compromising on quality.  Flutter: Adept at utilizing Flutter to develop visually stunning and responsive applications, combining a native-like experience with the efficiency of cross-platform development.  Achievements: Over the course of my career, I have successfully delivered a myriad of projects, ranging from consumer-facing mobile applications to enterprise-grade solutions. My ability to navigate complex challenges, coupled with a keen eye for detail, has resulted in the creation of applications that not only meet but exceed client expectations.  Collaborative Approach: Recognizing the importance of collaboration in the development process, I thrive in team environments where creativity and technical expertise converge. I am adept at working alongside cross-functional teams, including designers, QA professionals, and project managers, to ensure the seamless execution of projects.  Continuous Learning: In an ever-evolving industry, I remain dedicated to staying at the forefront of emerging technologies and industry best practices. My commitment to continuous learning enables me to integrate the latest advancements into my work, delivering solutions that are not only current but also future-proof.  Conclusion: With a proven track record, technical acumen, and a passion for creating exceptional mobile experiences, I am poised to contribute to the success of your projects. Whether it\'s Android, React Native, or Flutter, I am committed to delivering solutions that transcend expectations and elevate the user experience.', 'Mobile App Developer | Android, React Native ,Flutter Skills | 8+ Years Experience.', 'Independent Freelancer', 'https://sooprs.com/assets/files/65d84e940ee0c-1708674708.pdf', 'https://sooprs.com/assets/files/65d8474aca0d0-1708672842.jpeg', NULL, '2024-02-23 05:48:35', NULL, NULL, '20,4', 1, 0, NULL, 'IN', 1, '2,18,17', 50),
(489, 'Muhammad Farhan Akram', 'muhammad-farhan-akram', 'farhanakramryk@gmail.com', '$2y$10$HDOetl3tSw.IkntdOiJcJOE72GwaYykuHgf7eODajJf4wF2aMXD9q', '+9710562134189', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 05:50:11', NULL, NULL, NULL, 1, 0, NULL, 'AE', 1, NULL, 50),
(490, 'Ayomi Digitalz ', 'ayomi-digitalz', 'ayomidigitalz@gmail.com', '$2y$10$UCGIKXLmaECHbrP/OM1r/ep6Or6LYPEKdnpz1YZwyg0tFjPJzn.sy', '+2347011334807', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 07:13:42', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 50),
(491, 'Hamza Shafique', 'hamza-shafique', 'haamza@live.co.uk', '$2y$10$6nkx4ihUJQnQA0jCrzDCsuw08MzUo0eEZ1QURX18ZgNJ5bO1ATmJy', '+923214847656', ' I\'m a seasoned digital marketer with 10 years of experience managing high-volume, high-performance marketing campaigns.  Certifications: ???? Meta Certified Media Planning Professional (Oct 2022) ???? Google Ads (Search and Display) Certified Professional ???? Google Ads Digital Guru Expert Certified (Oct 2021) ???? Bing Ads Accredited Professional', 'Meta Certified Media Planning Professional | Google Ads Certified Professional | Google Digital Guru Expert', 'Ecommerce Planners', 'https://sooprs.com/assets/files/65d8481be0b95-1708673051.pdf', 'https://sooprs.com/assets/files/65d8482c13371-1708673068.png', NULL, '2024-02-23 07:21:22', NULL, NULL, '5', 1, 0, NULL, 'PK', 1, '39,40,35,34,51,37', 50),
(492, 'Hassan Azouzout', 'hassan', 'hassanfreelancedev@gmail.com', '$2y$10$aOh6IYFPqTbOsqQQwe.nKOFQgE8wCGrIYAfRuIBU75vW6HJY2MND.', '+212766447420', '', 'full-stack mern developer', '', NULL, 'https://sooprs.com/assets/files/65d858f3ed49b-1708677363.jpg', NULL, '2024-02-23 08:30:33', NULL, NULL, NULL, 1, 0, NULL, 'MA', 1, '8,16,7', 40),
(493, 'Jayesh chouhan', 'jayesh-chouhan', 'jayesh.chouhan@sleddingtech.com', '$2y$10$95l/TG3jhq53PXAGImdyR.tjzKsTn6Yd3iWw.8s811amAAwwUiomS', '+919806179963', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 09:39:23', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 0),
(494, 'Lokesh Kumar', 'lokesh-kumar', 'lokeshkumarjjn29@gmail.com', '$2y$10$87txXxwhTjSNrMqSC30nhu5Cw8ziJdam78YXnIPb5muiRjwXiOMDi', '+917732901889', 'Hello! I\'m Lokesh Jangir, a dedicated MERN (MongoDB, Express.js, React.js, Node.js) stack developer with a passion for crafting dynamic web applications. With several years of experience in web development, I specialize in utilizing the latest technologies to build scalable and efficient solutions. Whether it\'s creating intuitive user interfaces with React.js or architecting robust back-end systems with Node.js, I thrive on solving complex problems and delivering high-quality results. From conceptualization to deployment, I\'m committed to excellence every step of the way. Let\'s collaborate and bring your ideas to life!', 'MERN Stack Developer ????️  : Passionate about building dynamic web applications using the MERN (MongoDB, Express.js, React.js, Node.js) stack. With a keen eye for detail and a love for clean, efficient code.', 'Code Dev', NULL, 'https://sooprs.com/assets/files/65d99c5db3cc5-1708760157.jpg', NULL, '2024-02-23 09:56:02', NULL, NULL, '1,2,23,4,20', 1, 0, NULL, 'IN', 1, '16,19,15,7,33', 40),
(495, 'Abid Hasan ', 'abid-hasan', 'abidbadhon866@gmail.com', '$2y$10$/VIDUlw/WA29k8CCs1Sf5uWZTGF.pRdLbIcl0iqIqlKVTqX3k0qtK', '+8801323283306', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 10:02:08', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 50),
(496, 'Muhammad Ayan', 'muhammad-ayan', 'muhammadayanjavaid17@gmail.com', '$2y$10$.u85dxaXNppTpE/y5Ww4s.oWDYjyc6FTe5jVAF6y6ll5yV5mZmbJq', '+92', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 10:15:14', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(497, 'Mounashree Sarkar', 'mounashree-sarkar', 'mounshree.in@gmail.com', '$2y$10$IF.5.rhv7/zp0SMoPLnDZOaE2XZfGviRmLzVOrF07YxjOZjoB4jsm', '+919073580421', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 10:52:00', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(498, 'MD RIZWAN UL HAQUE', 'md-rizwan-ul-haque', 'virtualrizwan@gmail.com', '$2y$10$yiheYYlbZsDawe4IwzOLAu7xhD6KWj.jfXloTR7Irxr79secb/kCe', '9871608265', '', '', '', NULL, NULL, NULL, '2024-02-23 13:50:31', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(499, 'Uriel ', 'uriel', 'solomonhemigadon@gmail.com', '$2y$10$VoUOjDHBW2j.m1EncvQqdOXj7YGYK9ngSOyqrg2o4j/cclsy4XcrC', '+2348106780177', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 15:53:44', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 0),
(500, 'Deepak Saraswat', 'deepak-saraswat', 'deepaksaraswat238@gmail.com', '$2y$10$XqDQNgT5BIuguyHVS55UvuCQYQ53mgOE0DzEbzNMlFrDMlhcVuQG.', '+917906035811', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 16:39:20', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(501, 'swopnil maharjan', 'swopnil-maharjan', 'swopnilm170@gmail.com', '$2y$10$MypINQhytMbau8hya0MV0uckavJ12.fhIaAgr5MRcIudd5kB03jDa', '+9779865588711', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:37:47', NULL, NULL, NULL, 1, 0, NULL, 'NP', 1, NULL, 30);
INSERT INTO `join_professionals` (`id`, `name`, `slug`, `email`, `password`, `mobile`, `listing_about`, `bio`, `organisation`, `resume`, `image`, `portfolio_images`, `created_at`, `updated_at`, `service`, `services`, `status`, `is_buyer`, `city`, `country`, `is_verified`, `skills`, `wallet`) VALUES
(502, 'Ashwini Pardeshi', 'ashwini-pardeshi', 'ashwinipardeshi8149@gmail.com', '$2y$10$FzcgPkwzMJD564jaGTmOnO8v17fMWpDlz7WNUcj9Y3X4MFK6Ht4vu', '+918208043079', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-24 09:20:52', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(503, 'Laiba Zulfiqar ', 'laiba-zulfiqar', 'laibazulfiqar966@gmail.com', '$2y$10$sxTNFrO6JtNZWNfK3Ou7WOi8q6D4XTLxNlSeXabgcbMxCp7KiAG6i', '+923263736579', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-24 18:01:36', NULL, NULL, NULL, 1, 0, NULL, 'PK', 0, NULL, 50),
(504, 'Koopey', 'koopey', 'copertinotrazafy@gmail.com', '$2y$10$HIQwx5L6DpgeIHP3XldKH.O8g.oQdN11y/HXXKs/o9z3QSFIRh8Se', '+261329666931', '', '', '', NULL, NULL, NULL, '2024-02-26 06:56:45', NULL, NULL, NULL, 1, 1, NULL, 'MG', 1, NULL, 50),
(505, 'Damian Smit', 'damian-smit', 'damiansmit@live.nl', '$2y$10$tiJ.wWMUXm7sSqo7rFsv5uDZEwkbEvazbuD5WoiLnttmu0NVNp8LO', '+31633177160', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 08:02:09', NULL, NULL, NULL, 1, 0, NULL, 'NL', 1, NULL, 50),
(506, 'Saad', 'saad', 'saadasghar429@gmail.com', '$2y$10$J1xoEp6YUjd0orpDkeGEP.VwEek1f0ZdjPtHZk4QG4TctbMY4CqAG', '+923125302429', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 08:24:32', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(507, 'Tanuj Adhikari', 'tanuj-adhikari', 'tnzerox@gmail.com', '$2y$10$z3NVuRwEdEUlOifbeJS3Ve8wR3VMOHVPVbWcRPPjVOLAhlK0is9R6', '+9779761720321', NULL, NULL, NULL, 'https://sooprs.com/assets/files/65dc4f46c7063-1708937030.pdf', NULL, NULL, '2024-02-26 08:28:42', NULL, NULL, '1,16', 1, 0, NULL, 'NP', 1, '1,7,8,4,14,19,16,26', 50),
(508, 'Suraj Upadhyay', 'suraj-upadhyay', 'usuraj35@gmail.com', '$2y$10$U.o8Ja5qMfVV6o9njfUPCuoVStAlzvQUUjMkMXYcqVQD4OTX8fNDi', '+91919082955973', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 08:40:17', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(509, 'iB Arts Pvt. Ltd', 'ib-arts-pvt-ltd', 'ibartssales@gmail.com', '$2y$10$7HgTWE/Xv5B1jOQouDWWXOOCVH4dUWUxZg0hGFqABKQJGeetvrhXm', '+917858888785', '', 'Achieve your business goal with our extensive yet specialized spectrum of  services. We at iB Arts Pvt Ltd offer high-quality website design &  development services, mobile app development, Digital marketing & Branding  services for a l types of businesses, and Industry Verticals. ', 'iB Arts Pvt. Ltd.', NULL, 'https://sooprs.com/assets/files/65dc51218d8e8-1708937505.png', NULL, '2024-02-26 08:41:17', NULL, NULL, '1,2,5,7,20,22,23', 1, 0, NULL, 'IN', 1, '2,7,8,12,11,10,51,20,40,39,35,13,17,19,27,26', 20),
(510, 'Mahnoor Nazar', 'mahnoor-nazar', 'mah.nooray98@gmail.com', '$2y$10$s8UaCh1RpQEfsQ/ROGqVJeMONKWJXNwNnrUqcBGPDjuTaAHgeQk1y', '+9203362452736', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 10:39:57', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(511, 'Numan Shaikh', 'numan-shaikh', 'numan@warpvision.in', '$2y$10$Ky0nryw.m6lziKSEhGmyaOidlk9XSR3Mpk21jiCAih3IpraI4gxWm', '+917666978320', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 14:12:35', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(512, 'tunde philps', 'tunde-philps', 'tundephilps@gmail.com', '$2y$10$oisx0TXKnhhqeHmUciRwdexeHReOpVm/VNFVE1XJr0ZALxpTwpPte', '+2348034574154', 'A Software Engineer, Web and Mobile... Tech Stacks, HTML, CSS, Javascript, React, React Native and Next.js.', 'https://tundephilps-portfolio.vercel.app/portfolio', '', NULL, 'https://sooprs.com/assets/files/65dca65aa706f-1708959322.jpg', NULL, '2024-02-26 14:50:14', NULL, NULL, '1,2,4,20,22', 1, 0, NULL, 'NG', 1, NULL, 30),
(513, 'Magesh Sankar', 'magesh-sankar', 'mailtomageshsankar@gmail.com', '$2y$10$7QgliOWj0AOP1BGLbHE12uRRwXZUdEmm2F.OUP72ZJJYSVujUu7S2', '+919677890120', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 18:48:19', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(514, 'Taiwo Ayomide ', 'taiwo-ayomide', 'taiwoayomide202@gmail.com', '$2y$10$Dj0wYuRv3EBu3dVGEMnaPOtfoKRUY0Flhrwe78aodc/N21f2OjhtK', '+2348141242512', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 22:51:00', NULL, NULL, NULL, 1, 0, NULL, 'NG', 0, NULL, 50),
(515, 'Hina Waqar ', 'hina-waqar', 'hinaw2732@gmail.com', '$2y$10$FjUttO6z0gjsz5XNDjgb.edtXG9oHx5hJglzimBoq95ZfC.ys6dzW', '+923314135037', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 04:07:42', NULL, NULL, NULL, 1, 0, NULL, 'PK', 0, NULL, 50),
(516, 'Jam waseem', 'jam-waseem', 'jamw7690@gmail.com', '$2y$10$RGCwgAIjg5EmLXx6XeKW8OaISKVkSD0UgsY35UqE1EEFGn/n5SqlC', '+923246151760', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 05:21:44', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(517, 'Priyanka Sharma', 'priyanka-sharma', 'priyanka@pinblooms.com', '$2y$10$6IvRSf9FrNAfZCp3bUu4Q.Xt94Bpza4JX6z1AlzkeZNuzfsCVy74S', '+919785311511', 'Hello, We are experts in Website & App Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.', '', 'PinBlooms Technology', 'https://sooprs.com/assets/files/65dd7d9117aa2-1709014417.pdf', 'https://sooprs.com/assets/files/65dd81b2627e6-1709015474.jpg', NULL, '2024-02-27 05:38:25', NULL, NULL, '1,2,4,5,7,20,22', 1, 0, NULL, 'IN', 1, '2,1,11,7,8,9,12,13,14,15,16,17,18,19,20,25,35,51,48,27,41,37,38,49,28,29,26', 0),
(518, 'Samar Srivastava', 'samar-srivastava', 'samarsrivastava02@gmail.com', '$2y$10$ASkkm3HoZQlPesBgj.uT0OHAecRz3EMB4AF23JRXL19vyOlTdEg7C', '+917017415264', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 06:49:52', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 10),
(519, 'bilal raza', 'bilal-raza', 'razab0715@gmail.com', '$2y$10$gUm5W6erScA8DnySXf5Ld.TmGRhUM.n6SYGwYj3Dq7MvZlWd8mYDa', '+9203094524862', '', 'React Front end developer', '', 'https://sooprs.com/assets/files/65dd96604cb85-1709020768.pdf', 'https://sooprs.com/assets/files/65dd8e1fea548-1709018655.jpg', NULL, '2024-02-27 07:16:32', NULL, NULL, '1', 1, 0, NULL, 'PK', 1, '7,8,16,33', 50),
(520, 'Yazdan Shaikh', 'yazdan-shaikh', 'yazdanshaikh11@gmail.com', '$2y$10$qoZDsA1gsTsHm5LoVRtwyeuRleDizv.mMLe0SSPWmsCUnaCsCPB6S', '+923493146998', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 16:59:36', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 20),
(521, 'Muhammad Faaiez Nisar', 'muhammad-faaiez-nisar', 'muhammadfaaiez@gmail.com', '$2y$10$9mo/GPCm40LU4mbbH3OoJuas5GRlgWgtzox2Uy3VhCwN.UJKERDbm', '+923214943231', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 07:16:47', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(522, 'Muhammad Ukasha Asi ', 'muhammad-ukasha-asi', 'ukashaasi123@gmail.com', '$2y$10$6Dz/GLhR7fWeknFdivIkluVcpCh9x/wjwnY258De3nQ6epnd1v6T6', '+923057686207', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 12:05:31', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(523, 'Rahul', 'rahul-1', 'torahulsomaraj@gmail.com', '$2y$10$lq3YONNCYqTmUZluZw7VROIhF6egh2BaxCbdDNz0NEFBhX8iegbWm', '+91', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 05:01:38', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(524, 'Mitul Patel', 'mitul-patel', 'mitul.patel@weavolve.com', '$2y$10$QBuuNJbwki/D/PF3U56oWeVcdWRwaFfy/a3AOGoiempbygS7Fvms2', '+919724757428', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 05:09:02', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(525, 'Haider Ali', 'haider-ali', 'HaiderAli459801@gmail.com', '$2y$10$heujx.AiBHEQaIzKiNQtYOU/2WvN0r/20fi9aHOJ3PkMQrNHQE/Ii', '+9203187019827', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 05:25:02', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(526, 'hitesh chanchiya', 'hitesh-chanchiya', 'hitesh.chanchiya@gmail.com', '$2y$10$AQB/tXEfCC7MMDEZzYYPvuiqCfyXtsqHKQPrIJU0g9crbzN5c5TwS', '+919723974928', 'HI I have experience in web development and Graphic Designing. My area of working is as follow: Back-end: PHP,JAVA,.Net, cURL, Web Services, API Integrations , Wordpress Plugin Development. PHP Frameworks: Codeigniter, Laravel . APIs: Twitter, Face-book, Google DFP, Google Maps, Amazon, eBay etc. Databases: -MongoDB, MySQL, PostgreSQL, SQLServer, SQLite JavaScript: AJAX, jQuery, Angularjs, React, TypeScript, NextJS - NodeJS, ExpressJS.  Front-end: HTML, CSS and Twitter-Bootstrap, Wordpress. Repository Management: Git,Bitbucket.  We have currently working in React   Regards Hitesh Chanchiya', '', 'Freelancer', NULL, NULL, NULL, '2024-02-29 05:31:11', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 20),
(527, 'Hafiza Saira', 'hafiza-saira', 'sairachaudhary59@gmail.com', '$2y$10$P/QdSjzwpaBHZTDPrhPB0.mDt/df61tDJSlcoWYFfwpe6c.QRZOEm', '+9203029822411', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 07:06:52', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(528, 'Be Traveler ', 'be-traveler', 'sooprsblog@gmail.com', '$2y$10$IaTri74l9SH768KgmB4Nkeh0kIo7uu48g3dWtUHepiinvFJ90Tpsy', '+918178924823', 'Traveling is not just about tours to places – it also means collecting an extensive amount of knowledge about that particular place.', 'We are a travel agency based in Gurgaon. We provide all kind of packages in your budget. Contact us for affordable travel packages.', 'Travel Agency ', NULL, 'https://sooprs.com/assets/files/65e05a19d4082-1709201945.jpg', NULL, '2024-02-29 08:06:35', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(529, 'Wanderlust weddings', 'wanderlust-weddings', 'meupetroullube-5586@yopmail.com', '$2y$10$U8g/Jz2ofOwi2ozjqfVVme9RiNmeQTZ8C.Vx3EtIjVOX2J8UqwpNe', '+919876543210', 'Hire wanderlust weddings (wedding planner) to get rid off from all work load. Because Wedding planning is our duty. ', 'We are wedding planner company based in Delhi. We fulfill all the requirements related to weddings or ceremonies.  ', 'Wedding planner', NULL, 'https://sooprs.com/assets/files/65e05678ce8b5-1709201016.jpeg', NULL, '2024-02-29 09:40:32', NULL, NULL, NULL, 1, 1, NULL, 'IN', 1, NULL, 50),
(530, 'Rishabh sharma', 'rishabh-sharma', '1062rishabhsharma@Gmail.com', '$2y$10$861NCN1HaPg.YRqe6pzkpOdrSDiQhZv9drBgcfPk2UcoOWRgVyT5O', '+9109760286633', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 07:06:24', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(531, 'Vinay Singh', 'vinay-singh', 'vny.009@gmail.com', '$2y$10$VcJo7.QEpgPH8Yq8Gv8JHO5HkEk.ZXPdCOKrzwTN91InhOFFUC8Vm', '+918375910558', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 08:23:58', NULL, NULL, '26', 1, 1, NULL, 'IN', 1, NULL, 50),
(532, 'Cust20240301192629', NULL, 'Amritduwal1@gmail.com', '$2y$10$JgIVs923F8tbx91hWM03Iu8fTMXrhurJldDCN5Shm7OTleaetW6.G', '9841119563', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-02 01:26:29', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(533, 'Axnol', 'axnol', 'axnoldigital@gmail.com', '$2y$10$s71jxriYf5lXA2.aI4MTLeF4vISr3Qjlah8DqmNY0WM.86SIWqkwe', '+919539399925', 'We create basically everything digital for you; websites, apps and interactive experiences. We have specialized in being the perfect fit for ad agencies with a need for digital expertise. We love creative technologies and the way new media enables us to connect people, brands and organizations in innovative and exhilarating ways. Working by an agile approach we stay changeable and armed with our extensive knowledge of all things web we\'ll achieve your vision on time and within budget.', 'Web/Mobile App Design & Development Company', 'Axnol Digital Solutions Pvt Ltd', NULL, 'https://sooprs.com/assets/files/65e96c22bf83d-1709796386.jpeg', NULL, '2024-03-07 07:18:18', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, '1,2,8,11,14,12,18,20,26,27,35', 0),
(534, 'Cust20240307034538', NULL, 'sarthvaste800@gmail.com', '$2y$10$gN3xaBs9hhKHRiApw6I6g.LfvBWGxHI.MYLKQOhPzOAcx5QUUT4B.', '7558604042', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 09:45:38', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(535, 'Adewale Oluwatoyin', 'adewale-oluwatoyin', 'adewaleoluwatoyin81@gmail.com', '$2y$10$pvNuUXTVYS./MMGmVRXqc.4wsdt0feH89FdC8BtHdOqiTkO2dZ3xq', '+2348166312891', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 11:53:36', NULL, NULL, NULL, 1, 0, NULL, 'NG', 0, NULL, 50),
(536, 'Muhammad Afaq', 'muhammad-afaq', 'mafaq3615@gmail.com', '$2y$10$ORBOts.UxXdY/z52FxYhEOF8Piztwk1jyQhpIJ92pqugZYoWNAIOq', '+923034747619', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 12:21:26', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(537, 'Shoaib Ur Rehman', 'shoaib-ur-rehman', 'shoaibur206@gmail.com', '$2y$10$ivWLiF2/Cag2bIShbVsQS.DDuiYqzuX/Q0A5vcz2AiMpsrhZVgL1O', '+923125386285', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 15:59:46', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(538, 'Analy Assist', 'analy-assist', 'analy.assist@gmail.com', '$2y$10$aGNPVpJZavv.w4gqLFXsQemc9.3TqTzt2eexhREOr.WX4KXJB.g42', '+919205028603', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 06:13:58', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 30),
(539, 'Cust20240311035412', NULL, 'vikky@gmail.com', '$2y$10$JqtAW37EIurJ.nw7w8wjDeohtTkDfDtf.NqP4h1uXRrF4bIFAZWRq', '8059357138', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 08:54:12', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(540, 'Artak Mikayelyan', 'artak', 'miqart1@gmail.com', '$2y$10$SgleHloZeir62FoqUtIIOOgVzlC7QlRHTsxicPiZI.x5EhlxIbXNK', '+37444474000', 'React.js developer with a diverse portfolio encompassing both web and desktop applications. Proficient in various stacks, committed to staying abreast of the latest tools and libraries. Passionate about continuous learning and leveraging cutting-edge technologies to deliver top-notch solutions', '', '', 'https://sooprs.com/assets/files/65eeda812d27a-1710152321.pdf', 'https://sooprs.com/assets/files/65eedaa353ce1-1710152355.jpg', NULL, '2024-03-11 10:16:07', NULL, NULL, NULL, 1, 0, NULL, 'AM', 1, '7,19,16,8,17', 40),
(541, 'Ankit Rathore', 'ankit-rathore', 'ar31213@gmail.com', '$2y$10$qybxeCUjGGY5mY5tTTO8cO.UqE2GL4TzA4E6j54RPb4Vtq3LumilO', '+919569524651', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 16:21:57', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(542, 'hitesh', 'hitesh', 'hdtank77@gmail.com', '$2y$10$N9OKOxaTdrpvt0jPBYs59.nqaPtEv3kYp.Vgf0K8kXlNSGyqePK2O', '+918690585687', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 07:19:49', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(543, 'Rakotoniaina Rajo Mampionona', 'rakotoniaina-rajo-mampionona', 'rakotoniainarajomampionona@gmail.com', '$2y$10$RnuGQsSQ5VB9Fh6QRA3bxOrFa0SI0riNaOk9NclFusIbo./t9utJi', '+261342436126', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/65f00e8836a43-1710231176.jpeg', NULL, '2024-03-12 08:10:17', NULL, NULL, NULL, 1, 0, NULL, 'MG', 1, '1,4,7,8,11,12,13,14,15,16,26,27,33', 50),
(544, 'Bhupendra Sapkota', 'bhupendra-sapkota', 'nijbhup27@gmail.com', '$2y$10$vx40xg.lEpdhSmydlJJlcuXijIjfyTTpULbuNcG5czPtWR0BlmOmK', '+9779860921712', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 08:12:32', NULL, NULL, NULL, 1, 0, NULL, 'NP', 1, NULL, 50),
(545, 'Hassan Raza', 'hassan-raza', 'malikhassanraza4982@gmail.com', '$2y$10$6tEdo0arIzQmWGjqxpGdruZDduLRVmyCqByeE7m6MS/iEh0NIH/FK', '+923041554982', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 08:14:14', NULL, NULL, NULL, 1, 1, NULL, 'PK', 1, NULL, 50),
(546, 'akeem kolapo', 'akeem-kolapo', 'paamoohz1@gmail.com', '$2y$10$di8YDHjHbn.7lF405QU5weVOc0jzBlWs15YojGSbC6nf3TrpxBlUu', '+2349063161535', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 09:28:01', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 10),
(547, 'Arif', 'arif', 'arif@techzarinfo.com', '$2y$10$O25vYDdDJ22Aa4odBrb18uSCgZ.ewBwzyCnVjYAVAjWcLOco180Ei', '+919384308742', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 09:51:02', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(548, 'Cust20240312051459', NULL, 'pqlfkgp688@iemail.one', '$2y$10$U8g/Jz2ofOwi2ozjqfVVme9RiNmeQTZ8C.Vx3EtIjVOX2J8UqwpNe', '9875643210', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 10:14:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(549, 'Ayodele Bolarinwa', 'ayodele-bolarinwa', 'ayodelebolariwa695@gmail.com', '$2y$10$XVoT/zllXIb1PP6RKi4PT.DlnkMh95l94XWcDsxcV2ZH0/UWtFYM6', '+23407069593063', '\"As a digital marketer, I sculpt brand narratives into compelling digital experiences. With a palette of SEO finesse, social media savvy, and strategic insights, I navigate the digital landscape to amplify brand stories. From pixels to profits, I thrive on transforming concepts into captivating online journeys that resonate and inspire.\"', 'Your happiness is my priority', 'Rise Brand', NULL, 'https://sooprs.com/assets/files/65f05df78eb89-1710251511.png', NULL, '2024-03-12 10:24:52', NULL, NULL, '1,5,7,23,24,22,20,4', 1, 0, NULL, 'NG', 1, '11,37,12,13,35,38,51,39,40,52,1,7,42', 30),
(550, 'Muhammad Usman Nadeem ', 'muhammad-usman-nadeem', 'musmannadeem92@gmail.com', '$2y$10$WhS1a8slad.hKOKeGhYgLORAMkU7eVv3oTC7JGDrXrCpz1PAeSQ5q', '+923065918097', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 12:55:52', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(551, 'Mohsin Muhammad ', 'mohsin-muhammad', 'mohxinmuhammad@gmail.com', '$2y$10$IU9e1qE4dRTA7bSsZAXbZ.TG1bLpaRiHHl52THzxXR6ic14t498vm', '+923161050422', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 14:18:54', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(552, 'Sheraz zafar', 'sheraz-zafar', 'sherazzafar148@gmail.com', '$2y$10$SQSRVpfixeGkr9Hbeudxpeg2N.b89p4JBU3zjtlUYI7W6XwBjwtrG', '+923482241520', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 05:29:17', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(553, 'Mizanur Islam Laskar', 'mizanur-islam-laskar', 'mizanurl@yahoo.com', '$2y$10$UpYdwIMawdyMGui3ogk7k.ctxsytn1LNP.cL33E4.mW0ruuFfR.aa', '+8801816719318', NULL, NULL, NULL, 'https://sooprs.com/assets/files/65f14163bf571-1710309731.pdf', 'https://sooprs.com/assets/files/65f141dd79734-1710309853.png', NULL, '2024-03-13 05:55:47', NULL, NULL, '1,4', 1, 0, NULL, 'BD', 1, NULL, 50),
(554, 'RANDRIAMANANTENA Ny Fahafahana Lanja', 'randriamanantena-ny-fahafahana-lanja', 'rnflanja06@gmail.com', '$2y$10$C9cTTu7.VYiXpeSvbQRYMOgozWrNFHtl6Oh/nKaCnrkHJsAzOeixC', '+261349918848', NULL, NULL, NULL, 'https://sooprs.com/assets/files/65f1649b8525d-1710318747.pdf', 'https://sooprs.com/assets/files/65f1634d1876b-1710318413.jpg', NULL, '2024-03-13 08:23:23', NULL, NULL, NULL, 1, 0, NULL, 'MG', 1, NULL, 20),
(555, 'Imanjeet singh', 'imanjeet-singh', 'singhianjeetsingh@gmail.com', '$2y$10$Tk/zIyQxu.oQO1nOtKutj.HdTKreIFSFAmRj77erVWo/LeWXVKtX6', '+919315987391', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 08:30:49', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(556, 'Cust20240313072458', NULL, 'hellonisha125@gmail.com', '$2y$10$g8/ksnAFay6QiwVVxc7vauYokzwWhnnz3a4x2uWk0gQ4JZ3FtRGkK', '+919993776088', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 12:24:58', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(558, 'Aqib', 'aqib', 'chaqib186@gmail.com', '$2y$10$xKtvAiqkKaZGe84dwkqfW.SjoSMJnVkFgfJHO3rhL53tYCi8cYDEO', '+933001688834', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 05:43:20', NULL, NULL, NULL, 1, 0, NULL, 'AF', 0, NULL, 50),
(559, 'G GOUTHAM REDDY ', 'g-goutham-reddy', 'r3ddy03@gmail.com', '$2y$10$6XUKXIv8ax3Lnovwy29/KuUAy.wj97uxWdE8FbG7EdFAYAXp8aE3u', '+919046498059', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 05:57:04', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(560, 'Keira Williams', 'keira-williams', 'keriawilliskeira@gmail.com', '$2y$10$sJJ4CuGXP.3lUzTkrT22gOUmEiJMm70XNkMZjnnE/cQS.nGirew02', '+18705180231', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 08:02:20', NULL, NULL, NULL, 1, 0, NULL, 'US', 0, NULL, 50),
(561, 'shireen', 'shireen', 'shireenpeerbuksh2011@gmail.com', '$2y$10$pua2KTy7/Y2HgDK7B6ElB.nOrxAy3GYU4.gH9wdop8eNMiRZ3PkE2', '+351', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 08:14:10', NULL, NULL, NULL, 1, 0, NULL, 'PT', 1, NULL, 40),
(562, 'Guru Bhajan Singh', 'guru-bhajan-singh', 'gurubhajansingh@gmail.com', '$2y$10$pU33sPcSWuFjMZjD1ijG/O9buzYitXJ0AmOAvtgIQmKjI8MaEumOm', '+918750750097', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 17:07:35', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(563, 'Deepak jangra ', 'deepak-jangra', 'deepjngra@gmail.com', '$2y$10$3whLG3lXYdOlQFWRO20vSOY/rHTam4fmp0JJKxfMXAc/ptjuziXe.', '+917876296172', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-15 02:29:25', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(564, 'Cust20240315021459', NULL, 'sumitpandey050198@gmail.com', '$2y$10$UK3.4U00ZP4yx/frUsMN9OHjAMQlTNd7YR1Sarc.dM/.A6J1jowvm', '+9109130147275', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-15 07:14:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(565, 'Codevibz', 'codevibz', 'shahraizcodevibz@gmail.com', '$2y$10$V5DilhQRbZDI7Holw.fMKu5NpJfnMBjpAWipofhm5fY3SHCNF.Xt.', '+923182682949', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/65f485460d5af-1710523718.jpg', NULL, '2024-03-15 17:22:53', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(566, 'Aznan shaikh', 'aznan-shaikh', 'ajnanshaikh8646@gmail.com', '$2y$10$g8reVlwvNtTqEEFj73PIcOLqPFigOhTkrUKRJDhiCbqyADiyoc89a', '+917487800383', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-16 07:40:59', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(567, 'Itive Peace', 'itive-peace', 'ufomaitive@gmail.com', '$2y$10$o1IkaJddht4tZujz7a7gw.OcZIlbvfd5uWESsUtBVak4C.rJG/ai2', '+2349073278476', 'I am a skilled fullstack developer with over 4 years of experience. I am proficient in system scalability, security, stabality and maximized uptime.', 'Fullstack Developer (MERN)', '', 'https://sooprs.com/assets/files/65f575307fe99-1710585136.pdf', NULL, NULL, '2024-03-16 09:10:38', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, '8,7,16,19,15,14', 50),
(568, 'Vishal Yadav', 'vishal-yadav', 'vishu@gmail.com', '$2y$10$AbyoyJ1P/jpkMGhe7rFEAe/C/dd1RA2POgOxSaLLemj3xJL/Ai8yS', '9856458652', NULL, NULL, 'NIIT', NULL, NULL, NULL, '2024-03-16 05:58:57', '2024-03-16 05:58:57', NULL, '35', 1, 0, NULL, NULL, 1, NULL, 50),
(569, 'Arcel martial kontcheu ', 'arcel-martial-kontcheu', 'kontcheu23@gmail.com', '$2y$10$MfmF6CJzU18ZKI9BtRGikOE94zEKErmMsG97Hl0Qy0l1WQKQOlULu', '+237695717730', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 06:45:37', NULL, NULL, NULL, 1, 0, NULL, 'CM', 1, NULL, 50),
(570, 'Jabin Bushra', 'jabin-bushra', 'jabin@creativetechpark.com', '$2y$10$u89pzu8x9pjl7iYFR2Ib7ecQyz5iJHEIN2ERgNt428gZxLV9Erqz6', '+8801519200002', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 08:22:49', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 50),
(571, 'Mohammad Rayhan', 'mohammad-rayhan', 'rayhan120.mr@gmail.com', '$2y$10$PYpBcpbEpXs7l8CpWwo4hOhucUo0Ls0Q3a.dQpVNkOf2LZ/d/iWeO', '+8801711783120', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 08:42:24', NULL, NULL, NULL, 1, 1, NULL, 'BD', 1, NULL, 50),
(572, 'Mohammar Rayhan', 'mohammar-rayhan', 'rayhanmr.1200@gmail.com', '$2y$10$Jx2s07ytpsfK01i.ZNzjMe24.mqJyTyfrbZ3q.6MR9XgIKXGc2bSy', '+8801841783120', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 08:46:21', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 50),
(573, 'Savita ', 'savita', 'Savita16.tech@gmail.com', '$2y$10$ETamn7wanurrSzAGo2/EXesYvq6mP8Gzw7rF3TeOazoUrdtqmBq1q', '+919971702719', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 19:59:43', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(574, 'Shafiq Islam', 'shafiq-islam', 'shafiqsarker962@gmail.com', '$2y$10$o29vZxUZ6G91hhPg1Ik.O.53kxRd/ZpeMhXEUiWVZXPIyE.E3xpbK', '+8801620119555', '', '', '', NULL, NULL, NULL, '2024-03-22 05:53:23', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 40),
(575, 'Narendra chouhan', 'narendra-chouhan', 'narendrachouhan458@gmail.com', '$2y$10$s/kFOBn.h2S0z.Dz58UXUeLBbGZrdzgL8T/zyvhNJADeZ4jps9eta', '+917665604408', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-22 06:25:21', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(576, 'Tahir Naeem', 'tahir-naeem', 'tahir.naeem90@gmail.com', '$2y$10$cAdbisSfJGNKupHiSZPi3OudVmSf/B2tS8HqWUvSjkTHT/NKM8iH2', '+923360847346', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-23 09:36:34', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(577, 'MD Musaddequr Rahman ', 'md-musaddequr-rahman', 'mdmusaddequr@gmail.com', '$2y$10$MkqHtrpdy7w3S8y5PlxM1ewbiQBcungTGeNTyNrZj9vfsxcI/pdLy', '+8801970381404', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-23 09:52:00', NULL, NULL, NULL, 1, 0, NULL, 'BD', 1, NULL, 50),
(578, 'Hassaan Khan', 'hassaan-khan', 'hassaank1@yahoo.com', '$2y$10$CPZHf1mcfDUuKAPSIP4iTe9ysM4.EyR9q.Mx72dx/1VL4NMUWllE6', '+4407900436838', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-23 11:21:54', NULL, NULL, NULL, 1, 0, NULL, 'GB', 1, NULL, 40),
(579, 'Felix Brown', 'felix-brown', 'felix.brown@gmx.ch', '$2y$10$w6J.44/7yBE7pGXCaTVaju0lBwr6n9ST.2HH.UV9FTFvG1tnjNcLG', '+38349758578', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-23 19:35:10', NULL, NULL, NULL, 1, 1, NULL, 'XK', 1, NULL, 50),
(580, 'Ehzaz', 'ehzaz', 'ehzazizhar@gmail.com', '$2y$10$.CfYpH5J1ULea0MWDolqOu83hwsdilaB.AdFapZ5lMZNtCMDLTe62', '+923084861709', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-26 07:28:25', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(581, 'Ravi', 'ravi', 'ravishankarpoddar09@gmail.com', '$2y$10$VyNskkO5UB4UXyGJybgv.e0OG6n63tcx95i4ISJ85PHf24DbIkFAi', '8929292929', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-26 08:00:29', '2024-04-08 09:47:14', NULL, '45,44,43,42,38', 1, 0, NULL, 'IN', 1, NULL, 40),
(582, 'Rahul Jindal', 'rahul-jindal', 'rahuljindal494@gmail.com', '$2y$10$0huTQqDui2PoS/VlSBf6IexH05zxnXzVxAid4/E.Z825heOgLfzuC', '+917009032180', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-26 11:25:40', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(583, 'Rahul Jindal ', 'rahul-jindal-1', 'rahul.jindal1232@gmail.com', '$2y$10$cWNTVtY0O3/k5F1ZiLei1uSRQqpw5eX/Ij1.ynCigqjzXnvN4SSQS', '+918699456382', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-26 11:26:36', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(584, 'Miss. Rumi', 'miss-rumi', 'cinemasterystudios@gmai.com', '$2y$10$75VUe/i3o8Ten/5WMRpNvOGyaC2ZWeAoNwpXpq4Aa52Oho7UJLU4q', '+8801738360079', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-26 15:04:39', NULL, NULL, NULL, 1, 0, NULL, 'BD', 0, NULL, 50),
(585, 'Ajay', 'ajay', 'ajay@gmail.com', '$2y$10$D3.JeawD/SSH4GOOrqqz0eGRVlc7X.RRr3eGiRwkYrV7sGKnbDqdK', '8282838384', NULL, NULL, 'Techninza', NULL, NULL, NULL, '2024-03-26 23:50:16', '2024-03-26 23:50:16', NULL, '12', NULL, 0, NULL, NULL, 1, NULL, 50),
(586, 'Manish', 'manish', 'manish@gmail.com', '$2y$10$5aZZnz1Z418WdBNIodibHOHVM0lAlWaYfgsrGq2NnTovZUsIx/rjS', '8592929394', NULL, NULL, 'Techninza', NULL, NULL, NULL, '2024-03-27 00:22:06', '2024-03-27 00:22:06', NULL, '44', NULL, 0, NULL, NULL, 1, NULL, 50),
(587, 'rahul', 'rahul-1-2', 'rahul@gmail.com', '$2y$10$cMEAc8GD7OVTxwVrGLFXi.wS6XVYgL3Z/p/7Qsn00oqmFLTtjQE.6', '9529292932', NULL, NULL, 'Techninza', NULL, NULL, NULL, '2024-03-27 00:23:56', '2024-03-27 00:23:56', NULL, '44', NULL, 0, NULL, NULL, 1, NULL, 50),
(588, 'Vinod Sharma', 'vinod-sharma', 'vinod@gmail.com', '$2y$10$IrKXN08Dnl5/uGMfA7awdOHw0oivLL3zkSZL0qepVfH.dIq5Xknh2', '9592929291', NULL, NULL, 'Techninza', NULL, NULL, NULL, '2024-03-27 00:25:48', '2024-03-27 00:25:48', NULL, '44', NULL, 0, NULL, NULL, 1, NULL, 50),
(589, 'Cust20240327075631', NULL, 'buyindag@gmail.com', '$2y$10$T9ZesfUgFM41SxmwhIygwO9LUYXTa.2OUcujPtzTIiqcDhfpyuHk2', '+237670014488', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-27 12:56:31', NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, 50),
(590, 'Whitefern Digital marketing', 'whitefern-digital-marketing', 'Contact@whtefern.in', '$2y$10$sFBD4aG6Xn7sOEm5e/7NIuxAeYB6Bo.G9ygqKRVlKZRUuWAaVn1g6', '+918487818583', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-27 13:06:58', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(591, 'Whitefern Digital marketing', 'whitefern-digital-marketing-1', 'info@whitefern.in', '$2y$10$DkYP.Qt1boc0gPMwirOGf.cJ0o79d17PXkLJMVhOJbNke.HqD1ISy', '+918401584013', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-27 13:35:49', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 10),
(592, 'Talha Malick', 'talha-malick', 'malicktalha1990@gmail.com', '$2y$10$hL4oJeKv5NiOHebhz13Mhu8.LruF1FH.bMbT36vk2YM.Tr75//Vbm', '+923113249878', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-28 13:10:46', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(593, 'Adil Qayyum', 'adil-qayyum', 'adilbazmi34@gmail.com', '$2y$10$FStKUCplCf/AD5R6Jugcwuuow4HYa2eQlT0sM7r/YsCxwHrtJGsyO', '+923309360518', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 05:10:06', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(594, 'Howdy praise', 'howdy-praise', 'habeebatopeyemi7@gmail.com', '$2y$10$ux66c77YUNuTE/8kd0QVx.07r06cNk.FZIWfurJEjZMXcP3NBMfzC', '+2349166366716', '', 'Am howdy praise an expert in website designer,a logo designer,an email marketer and lots more.', '', NULL, 'https://sooprs.com/assets/files/66065fef8c1af-1711693807.jpg', NULL, '2024-03-29 05:32:24', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 0),
(595, 'yogesh kumar', 'yogesh-kumar', 'kumaryogi6@gmail.com', '$2y$10$qFOhYrNRAFduwZSLwSCN5uFmWyoS4iE7WShpLKij0cxukyWzJHA5y', '+917827806397', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 07:41:48', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(596, 'Rahul Bala', 'rahul-bala', 'adichoice007@gmail.com', '$2y$10$eIJuOrsnyEp8XYRH.EL3YOcMlmggeGG6./NiUy6AIoWvhfN1HKu/u', '+917278969516', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 07:41:50', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(597, 'Rahul Das', 'rahul-das', 'nilrahul25@gmail.com', '$2y$10$t8TxT1dX5TuWqpEvR0PmlOuBq4IYjzqmoo4Q1nJPTOoMaxCm3U73q', '+918450039161', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 07:47:55', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(598, 'TILAK RAJ', 'tilak-raj', 'krishnamovies1@gmail.com', '$2y$10$ZlTb3NGf.44tvLVm1Nk1b.ucHy647RZLYWObHApvP3csONGsvTEgm', '+917683026944', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 11:28:56', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(599, 'Mony yadav', 'mony-yadav', 'mony9838@gmail.com', '$2y$10$jzw2XdyTdZrZ6QL7BUR69O.Vnt3lLLgHWM6b0caVQZbzY63VXffNa', '+919770896868', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 11:34:23', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(600, 'Suraag', NULL, 'Suraag2004@gmail.com', '$2y$10$JSyuO833IJNd64uEj/9V7eMn1lJ1oIc4sgS4sWRVrYhGbiNBPHUWG', '+916360104664', '', '', '', NULL, 'https://sooprs.com/assets/files/6606d09db63c9-1711722653.jpeg', NULL, '2024-03-29 11:41:06', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(601, 'Muzammil imam ', 'muzammil-imam', 'muzammilimam12@gmail.com', '$2y$10$8w0ls3zfrrStO5eBNTc1oO6VHQC2PnmBEnXc2WHQzU9ZdsJ4EnLpq', '+919891579768', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 11:43:38', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(602, 'Manish choudhary ', 'manish-choudhary', 'malikmanish097@gmail.com', '$2y$10$JK0mVlzHfulavnxYFo/uOOnRMjWHCRLC2s2v8XBu5bhhP2JL/ZLTq', '+917827694004', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 12:19:17', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(603, 'PhotographyAbhishek', 'photographyabhishek', 'photographyabhishek777@gmail.con', '$2y$10$LTy0FYv2o3SvpZ8E5POmJ.VNVj.c3V2W1LVWObNZ7pJ.vX7XJ370W', '+919899550111', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 12:33:00', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(604, 'biswajit guin', 'biswajit-guin', 'sribiswajitguin@gmail.com', '$2y$10$zIaXAugiI499WDobOCnZLuDfprfU75Rx42YBX297w.hywFbSG.Spe', '+918390846514', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 12:56:03', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(605, 'Jigar padaya', 'jigar-padaya', 'jigarpadaya16@gmail.com', '$2y$10$U8g/Jz2ofOwi2ozjqfVVme9RiNmeQTZ8C.Vx3EtIjVOX2J8UqwpNe', '+917405560002', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 13:22:56', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(606, 'Cust20240329115836', NULL, 'gautam9897187594@gmail.com', '$2y$10$AQ.BShX6RtCRdibMz3K/oeYK61rhcY5HohvF7a94tf6nySMWKFuV2', '+919520398326', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 16:58:36', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(607, 'Prakhar Patsariya ', 'prakhar-patsariya', 'Prakharpatsariya@gmail.com', '$2y$10$TeMlpcre4GnXUcI9a9z4iOsU6i4XV8hyJXGTt2yjdeVAdNfFMPg.O', '+919354201461', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 17:54:43', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(608, 'Farvez Hossain', 'farvez-hossain', 'parvejhossain6031@gmail.com', '$2y$10$oZt698Ig2.oexUKXdy4Ro.vjXCiinm3hze5xxbk81o7p3E8dYXYaG', '+9660564363878', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 22:05:29', NULL, NULL, NULL, 1, 0, NULL, 'SA', 1, NULL, 50),
(609, 'Cust20240329171124', NULL, 'parvejhossain6031@gmail.com', '$2y$10$Kwzx1Dn5mlj.uC9nWxzDL.LlfxN/Gm7agKhAIDzsln0ylyTVPIVB.', '+966564363878', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-29 22:11:24', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(610, 'Raja Mollick ', 'raja-mollick', 'mallickrabin325@gmail.com', '$2y$10$GKqTgCNKl03rr0TDAJrgCe.0LX3pWMLKA7w5aGBkiUeDkM12SAHsK', '+917407798930', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 04:57:30', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 30),
(611, 'Shravan Surve', 'shravan-surve', 'surveshravan@gmail.com', '$2y$10$Wrw4z13R0rVsTPoy8diBUOu8151l3vm7oKZOWakUxywNSQcek/zTi', '+919172194337', '', 'Hi, Myself Shravan Surve, Professional Photographer. Specialised in Fashion, Beauty and Commercial.  I am pleased to inform you that my portfolio website is now live.  Feel free to check it out and feel free to book me for any upcoming shoots. Also if you have any queries feel free to ask.   I am attaching the link in separate message if you need to share it with someone.  https://surveshravan.myportfolio.com/', '', NULL, NULL, NULL, '2024-03-30 04:58:48', NULL, NULL, '50', 1, 0, NULL, 'IN', 1, NULL, 40),
(612, 'Suvayan Basak', 'suvayan-basak', 'tony.redcarpet@gmal.com', '$2y$10$Eqml38hn/VE29VJ7N96CJeDtj10Q8XTSBPvaFtluWv2irdiF2gfGm', '+917686862100', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 05:02:24', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(613, 'Suvayan Basak ', 'suvayan-basak-1', 'studio.creativedrishti@gmail.com', '$2y$10$pLaYI.tZC785YtYkDjMWyu4XkFwgaKamSh4D3KuxkyfQTjJsEArWO', '+919903500400', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 05:06:23', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(614, 'Ajit Kumar', 'ajit-kumar', 'ajitk1171@gmail.com', '$2y$10$b.stame9q6pP9yRlvLeq5.LfidTFj7a0/GeVj138wdUAej7IZlQky', '+919718213802', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 05:12:55', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(615, 'Gourav De', 'gourav-de', 'gouravde9@gmail.com', '$2y$10$XDSHLwKnNwoNV6dCvJFL9O9hjM2C9B.C5crn6fGkMebZk/Ek5zxo2', '+919088648229', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 05:51:47', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(616, 'Tarun', 'tarun', 'tarun.justin@gmail.com', '$2y$10$eV8w8J1R7OweKBnNUr/ZTeXgJfazMbpMwGwZmZfoCqyTwL5wnhCXq', '+919811190540', 'Photographer', 'Photographer', 'TJ Fotography Dot Com', NULL, NULL, NULL, '2024-03-30 06:16:31', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(617, 'Rana Ghosh ', 'rana-ghosh', 'rana2ghosh7@gmail.com', '$2y$10$uUY4CXc/EkTVz15ertJsXePa2EsaauKiO15MJbCvbGJF08zaHwJ5u', '+918293817507', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 12:26:30', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 30),
(618, 'Abhijeet ', 'abhijeet', 'asmevent1@gmail.com', '$2y$10$pP66hWtUiT2TI0xBOLwHtOQ3mj35WGckI8fxzjp9A3VM0HGAgFX0q', '+918999022359', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-31 08:38:18', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(619, 'Chetan Sharma', 'chetan-sharma', 'thechetanphotographer@gmail.com', '$2y$10$SbXrpiLYGPwAkOoWAvD2K.4A8gfJX7rglixRgaqFI/8cD72EGZm6O', '+919650131394', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-31 13:12:58', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40),
(620, 'Noel S', 'noel-s', 'noelsakaria@gmail.com', '$2y$10$JL/m/Fy3hVHlIm.Mea4.ceIPgpa9OMxYPqLAF81xmjuU5WGyBTuOC', '+916351148717', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 05:57:41', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(621, 'Akash Wankhade', 'akash-wankhade', 'akashwankhade531@gmail.com', '$2y$10$G4v38Z/cvVCkSj1MaNFwTu9QVaI5Du6w1ms8yHaHFdvzmFBBb1wfe', '+919172322494', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 07:08:03', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(622, 'Mistu Majumderr', 'mistu-majumderr', 'majumdermistu399@gmail.com', '$2y$10$xj93TTmoHVkRP/0M92jM4uEk1/gT1Ouk2f04V.FZzKOqgZTBZfAs6', '+9106291523237', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 07:24:30', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(623, 'Ruhi Kaur', 'ruhi-kaur', 'ruhisingh359@gmail.com', '$2y$10$d/M9tA00gl9atrjFyXQvEehf57umsHq7nRsA4hqOBlE1m8KxBU9FW', '+919871561145', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 07:46:25', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(624, 'Ganesh Nagesh Kamath', 'ganesh-nagesh-kamath', 'gnkamat1968@gmail.com', '$2y$10$6u.Dd78xsessppEH73n0WOEJGk/hHLX.sHIQHpj..jbd0DgOoUoOK', '+916374567546', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 01:20:16', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(625, 'Vishal Gupta ', 'vishal-gupta', 'wts.ur.requirment@gmail.com', '$2y$10$C29wzRPfEFSnfMeeoymbA.4GOgzroesZTcRJObOYuoIWTT2SJ7xTq', '+919831102355', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 01:49:05', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(626, 'Lingesh chary', 'lingesh-chary', 'lngshlucky@gmail.com', '$2y$10$pSRxTLG0rG2ej6zBDyUUKuLFJthNceF9wb26vjPHLcY/ghYotGSNG', '+917842486256', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 11:25:47', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(627, 'Rizwan Pathan', 'rizwan-pathan', 'rizwan8980@gmail.com', '$2y$10$UNb9q0r0HP7YecAGDKPhu.Dk8kPHY7Ulgi.hg4dwZUL9I8yQhhwQi', '+919374159498', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 11:27:52', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(628, 'Daain Ali', 'daain-ali', 'daainads@gmail.com', '$2y$10$Kj0bea2bZx73mNWSE3xOk.covC18hjCjGHaJ81LE9NIOjfRPyhNPW', '+923174033146', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-03 07:52:06', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(629, 'Dipanshu Dixit', 'dipanshu-dixit', 'dipanshudixit110@gmail.com', '$2y$10$E3.O.VjvTCDtITsobxU3fOMne43A1u/zvse/d.Z.h5E/pL8WPTMGq', '+917002540466', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-03 12:03:27', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(630, 'Sama', 'sama', 'lanikasama@gmail.com', '$2y$10$uibGC1jpAmq/JTrc8J85EutA8Ncmk2WtC1CTy9OELBwADMEtJFObG', '+918939027212', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 06:59:04', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(631, 'Prateek songara ', 'prateek-songara', 'prateeksongara02@gmail.com', '$2y$10$2qs8q/zfmy6hXBvI.pQ0R.i9iCDqsjN8KfblgZHfAg05nGyHlf22K', '+919529249121', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 09:25:18', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(632, 'Musharraf', 'musharraf', 'musharafshah6713@gmail.com', '$2y$10$9M6YZYpSkGSMGGioh.nKAuH8Tg2vmqtUbrxvMvERg3RWfhy4364h2', '+923116713726', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 10:15:11', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, '8', 30),
(633, 'Messum Abbas', 'messum-abbas', 'abbashadir409@gmail.com', '$2y$10$pJa8mHJ.zHXT6qiX2nsPhOgYnC6VEbR5KLS3Ru3M0Nv1nsqPjUO/e', '+9203267063959', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 10:25:20', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(634, 'Haseeb Ramzan ', 'haseeb-ramzan', 'haseebr7185@gmail.com', '$2y$10$WwY0KirAHRaMap1VoMprdugjaAHfTp17qI26kZAkrnlV2UoZ8ke9.', '+923032779179', 'Hi there! I\'m Haseeb Ramzan, a Shopify expert with 2 years and 6 months of hands-on experience. Passionate about creating seamless e-commerce experiences, I specialize in building and optimizing Shopify stores to help businesses thrive online. With a keen eye for detail and a dedication to exceeding expectations, I\'m here to elevate your online presence and drive success for your business. Let\'s build something amazing together!', 'Hi there! I\'m Haseeb Ramzan, a Shopify expert with 2 years and 6 months of experience, passionate about crafting seamless e-commerce experiences for businesses worldwide. Let\'s bring your online store vision to life together!', '', NULL, 'https://sooprs.com/assets/files/660f08020d7c8-1712261122.jpeg', NULL, '2024-04-04 10:28:24', NULL, NULL, '15,5,23', 1, 0, NULL, 'PK', 1, '13,51,37,40,41', 40),
(635, 'MD FARUK', 'md-faruk', 'bdlancer2013@gmail.com', '$2y$10$1vtFoSeuxpHsvKG6zodIYOc0Fb5GI4JGsvqrFnCoEjeAh0lVbySrS', '+8801700543338', NULL, NULL, NULL, NULL, 'https://sooprs.com/assets/files/660e85525ceb3-1712227666.jpg', NULL, '2024-04-04 10:42:31', NULL, NULL, '15', 1, 0, NULL, 'BD', 1, '1,13', 40),
(636, 'Trejosh ', 'trejosh', 'joshuaoyeniyi45@gmail.com', '$2y$10$fzNvV40iRRzdG/7tLvra5edUhw3nc83/Q7x/77CoSCMPHXbEruvei', '+234', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 10:48:03', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 50),
(637, 'Cust20240404081459', NULL, 'zohaibzafar0340@gmail.com', '$2y$10$zCrKp7NeU5t8LX6tz4SuZ.J0lVrkwpCRperSWnBmaFW2yq/uA2o0W', '+9203403665028', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 13:14:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 50),
(638, 'Ajijola Damilola', 'ajijola-damilola', '3pletwealth@gmail.com', '$2y$10$1E/KKE1vs658Pzovy/RjKudKvd3GFvQB/BjCROcoDYlawnKl890cy', '+23408167878116', 'I can help you with every step of creating and growing a professional eCommerce business or a Shopify store.', 'Hello there, My name is Crest web, and I\'m a full-stack designer who specializes in Shopify. I have extensive experience of all e-commerce platforms, Shopify, and web design.', 'FHG', NULL, 'https://sooprs.com/assets/files/660ebc16d35a6-1712241686.jpg', NULL, '2024-04-04 14:35:39', NULL, NULL, '1,14,15,40', 1, 0, NULL, 'NG', 1, '38,13,11', 20),
(639, 'Cust20240404105421', NULL, 'Ferminalusa@gmail.com', '$2y$10$ZCtOhjLJje3lGISAOb7DXOroUO8ukpcbzI1JVYOBkPUqK/vM1wPnu', '+51974259622', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 15:54:21', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(640, 'saqib ali', 'saqib-ali', 'sa1727848@gmail.com', '$2y$10$HEoprp9MUUrCb7MomZ5cIOd28P3d7Gl7UumTe7/ZlLlfz8qlsv0Le', '+923334953960', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-04 19:57:37', NULL, NULL, NULL, 1, 0, NULL, 'PK', 0, NULL, 50),
(641, 'Simeon Zahariev', 'simeon-zahariev', 'sime.huawei2@gmail.com', '$2y$10$Sx9bGo3esDnP5pshKXCKeuFUB4UgGHtubJ0rzpPD0dMW4QsBEtgHi', '+38977707087', 'I am a highly ambitious and fast-learning computer science graduate with over 6 years of professional experience as a full-stack web developer. My diverse skill set encompasses WordPress, Magento 1/2, Shopify, Moodle, Zoho Services,  CSS, LESS, HTML, XML, PHP, JavaScript, MySQL, Liquid and server management. I have made significant contributions to a variety of high-level projects, showcasing both my enthusiasm and expertise in turning concepts into reality. My creative problem-solving approach assures consistent delivery of excellent results.', 'Professional full stack web developer for more than 6 years, expert in Magento 1/2, Shopify & WordPress.', 'WebWizardMK', NULL, NULL, NULL, '2024-04-05 00:26:24', NULL, NULL, NULL, 1, 0, NULL, 'MK', 1, '1,8,7', 40),
(642, 'Shahnaz ahmad', 'shahnaz-ahmad', 'mtechpk1@gmail.com', '$2y$10$enF5HQnvWI2Tsy.YQxoSje8FUCCWLKuUEPdMSROU3nrQxkijlmj22', '+923212220630', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 05:28:30', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(643, 'Heemay', 'heemay', 'heemaylackhani@gmail.com', '$2y$10$OFnBCG1T2gqVcyho0bvpkOrwW14Ga1/i4dL2kizxtAG6xvl1Pwb6W', '+919820383836', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 05:36:46', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(644, 'Samshopi ', 'samshopi', 'emoneysam51@gmail.com', '$2y$10$LdJ9Nf8wGDDCiyiSeoxIVuEOrnwqamvPlJeV/841HkYfmdnX/KzYy', '+2349153465710', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 05:41:34', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 50),
(645, 'Foba expedition ', 'foba-expedition', 'fobaexpedition@hotmail.com', '$2y$10$9h5IZHZ4H4QIsc45DMCRp.UmS3MjvrvPMr8LAg00J8/XKiDyCbCKS', '+255689208774', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 05:55:12', NULL, NULL, NULL, 1, 0, NULL, 'TZ', 1, NULL, 50),
(646, 'Muhammad Huzaifa', 'muhammad-huzaifa', 'zaifi.shab09@gmail.com', '$2y$10$0AI53S6VTE2U1tteDedh7ei//E7hCXNZfLADjPup5zdEi4Bu1nFsy', '+923055847886', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 05:58:41', NULL, NULL, NULL, 1, 0, NULL, 'PK', 0, NULL, 50),
(647, 'Muhammad Huzaifa', 'muhammad-huzaifa-1', 'huzaifaturk014@gmail.com', '$2y$10$dvbV9y47M5upsXewNqc3QuVPFZIPCgVqEk4GXw6fiqgMY8lZEBzBK', '+923309457041', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 06:02:23', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(648, 'Basit', 'basit', 'Beownadventure001@gmail.com', '$2y$10$0eGZwWtWApwmjXyX9/5RvuqkNiR1dFt.i0GYpKhx.KGEHZ9Bbijmu', '+917006370260', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 06:38:49', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(649, 'Basit', 'basit-1', 'bandaybasit121@gmail.com', '$2y$10$5NN.tDdhBsEiLcHJIGqzqOpmdUDkR7dBHhNrpVJI6rWNpmX42UU7u', '+919622180270', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 06:40:53', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(650, 'Alok Kumar Pandey', 'alok-kumar-pandey', 'theluxurytravel.in@gmail.com', '$2y$10$50ViHG9ScE3H/CaxsysoSO4c9/Zg97GyTpNcEBpMx/uifJH.0bO3G', '+919540721363', '', 'Travel Experiences', 'The Luxury Travel', NULL, NULL, NULL, '2024-04-05 08:15:20', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(651, 'Cust20240405041042', NULL, 'hassanzafarbwn9@gmail.com', '$2y$10$KC0DFMFls.juo7ebJvsV0OwZ1XLQl3Q1qR7zGyboJMs5L24Dh5b1y', '+923267532029', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 09:10:42', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(652, 'Harsh Vardhan gupta ', 'harsh-vardhan-gupta', 'harshgupta28995@gmail.com', '$2y$10$meMMV1jB3.XFjIzQxxszEup.GvtBlNuwZlwiL8dti7KW1dLfcCx0q', '+916307440130', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 09:48:24', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(653, 'Kamran', 'kamran', 'musafiravel@gmail.com', '$2y$10$QHtp5WBqYkw5UL8QO3cYxub/PUT7GE3ioY4a9nExCsUTcHRpGk5qS', '+918887677688', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 09:58:58', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(654, 'Zahid Khan', 'zahid-khan', 'zahidkhan0291960@gmail.com', '$2y$10$kn3Qksk7zsNO6PLUzYbSMuS/xB4Q6FHtzilEo/uYszYz5F3cRXveW', '+923260186583', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 10:31:55', NULL, NULL, NULL, 1, 0, NULL, 'PK', 0, NULL, 50),
(655, 'Anand A', 'anand-a', 'anand.g008@gmail.com', '$2y$10$CBrB/BC0bC2a4x0zalesqu9GNB2LnIaHrD3EKbTIwe5Kb09Hr6Uwa', '+919447712308', 'Let me take moment to introduce myself - I am Anand Ajith and I am a professional photographer  with experience working with brands and Corporate companies', 'Professional Photographer specialised in multiple genres', '', NULL, NULL, NULL, '2024-04-05 10:40:03', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, '54,111,112,48', 50),
(656, 'hello', 'hello', 'solankitour07@gmail.com', '$2y$10$jZgBNaPb1dvjIc2XrIXUsedCs9TVJ8.1A5v0Xpq7qblhZZFF/liaq', '+917665701280', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 10:46:13', NULL, NULL, NULL, 1, 1, NULL, 'IN', 1, NULL, 50),
(657, 'Prudhvi Raj ', 'prudhvi-raj', 'pruthvi.raj7118@gmail.com', '$2y$10$9pQaXH5KGcdZrJO0UDEjmun/81F0Smv9QWuDLGWe1ySTRYJYpKKp2', '+917382155522', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 13:05:02', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(658, 'zeeshan ali', 'zeeshan-ali', 'techzee16@gmail.com', '$2y$10$RYusKjGYGXDJ4if8xzJUOuGJGKbVTPaFgHJUJuh.iO0FVIAQroV.6', '+923277047418', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 15:28:16', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(659, 'King Aifab', 'king-aifab', 'kingaifab@gmail.com', '$2y$10$0pWbvSnlnQiPXt808mvpuOTcPQj.hSdmLipRoCbaEDx3ohNYEyxCW', '+2349159158128', 'Am King Aifab, am a professional freelancer and have been on freelancing for the past 3 years. ', 'E-commerce Expert || Shopify Website Designer and Expert || Wix Designer || Professional Freelancer ', '', NULL, NULL, NULL, '2024-04-05 19:12:20', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 50),
(660, 'Akhil Shaji', 'akhil-shaji', 'MAX.AKHIL@GMAIL.COM', '$2y$10$7x/Gfq2TrmDCt/QVlkDqHOyNMIx4Y6zb8VKljF3hnEQ4q19dG2c.S', '+9107676344845', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 03:01:47', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(661, 'Zerish yusuf', 'zerish-yusuf', 'zerishyusuf525@gmail.com', '$2y$10$y5dOZXzygN1fTzZwtSDvDe7Qd5LGQWIC7r7.Z9t9Sh3YJYB/lwmla', '+923222800123', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:15:23', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(662, 'Usman', 'usman', 'usmanfreelance05@gmail.com', '$2y$10$KeY40eoPNT9LWiVszYDaDuwsf.VLRaVzsNB5RYvmIWlXfUi7vUU0W', '+923269018424', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:35:45', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 40),
(663, 'Muhammad Shayan', 'muhammad-shayan', 'Shayanarain107@gmail.com', '$2y$10$6M.ivSQ0hq4za.gCctVIVO28tIYC5ThNYXCs3B/TtimndBzlvb7Sa', '+9203019370107', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 10:39:32', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 30),
(664, 'Syed Shahzeb Bukhari', 'syed-shahzeb-bukhari', 'shahzeb.bukhari1@outlook.com', '$2y$10$b35zTA3yxvSe50xVy0IDquRF6S036kH2bTKxs8Ze6G3Kf8DWzV1/S', '+923216303707', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 11:04:51', NULL, NULL, NULL, 1, 0, NULL, 'PK', 1, NULL, 50),
(665, 'Saurav', 'saurav', 'sauravthakur0404@gmail.com', '$2y$10$tqL/gzmIR/BlVZZrDW30IOVv0wHSctuYFcaiFSQMgKFjJCQLJo5Fq', '+919548732796', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-07 08:19:43', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(666, 'Yogi', 'yogi', 'divinereflectionsevent@gmail.com', '$2y$10$TpPvnErWyYwyUYJx9TaTBOvCev737YVIWgdtsMZtZpXjsKMqyJ1Yq', '+918447382419', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 07:14:42', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(667, 'Inderjeet singh', 'inderjeet-singh', 'inderjeetsingh0307@gmail.com', '$2y$10$DJceHGFeibzpkTH9llKQgOQxIP1C3L9enJQHslVvBHvly2PfOMsA2', '+918053931595', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 13:22:50', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 40);
INSERT INTO `join_professionals` (`id`, `name`, `slug`, `email`, `password`, `mobile`, `listing_about`, `bio`, `organisation`, `resume`, `image`, `portfolio_images`, `created_at`, `updated_at`, `service`, `services`, `status`, `is_buyer`, `city`, `country`, `is_verified`, `skills`, `wallet`) VALUES
(668, 'bob silva', 'bob-silva', 'silvabob147@gmail.com', '$2y$10$9pt3XFyhkuu6a4U3Szi4cuZN1.M8LONr7uObRS4q.ARo9rh553K3O', '+19299306191', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 17:27:36', NULL, NULL, NULL, 1, 0, NULL, 'US', 1, NULL, 50),
(669, 'Ankit Sharma ', 'ankit-sharma', 'ankitsharma59659@gmail.com', '$2y$10$KpQv84/NfJHG.1c6MInuc.vq73t8H3Kw5L.d4KSKd52YtgyMLZ.uC', '+919830784558', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 05:17:39', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(670, 'Sandip Das', 'sandip-das', 'camerawalabengali@gmail.com', '$2y$10$WupSSs.xuAMZnvn.GCHMGuLvKWZ/iK53IzhwOh9vhEiD/AtbpqSpW', '+917044663355', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 05:21:49', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(671, 'SATI WORLD', 'sati-world', 'ubosatiworld@gmail.com', '$2y$10$9.PNTMsbqPRQ2kaAlo033udmW8o4ZZh/0I/mqLwCWu8lyEY4BZnN6', '+918368474782', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 05:22:46', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 0),
(672, 'Cust20240409011707', NULL, 'narumimomose111@gmail.com', '$2y$10$a/teZ51DuHox8tYSmm0rUuVnZyechfvHth8cB7LBXLlF9vE4sOdTy', '+639089601289', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 06:17:07', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 50),
(673, 'Jasmine Kate A. Patiño', 'jasmine-kate-a-pati-o', 'jasminekate.patino@one.uz.edu.ph', '$2y$10$IkY1Vcl5zQiEZBi5nx52iub/R34tsOT9vkp6aKLL3XBhblDXteZBe', '+639050670664', 'I am versatile and can do multi-tasking, if you\'re interested you can contact me on my email address narumimomose111@gmail.com or jasminekate.patino@one.uz.edu.ph Thank You so much and Godbless.. Looking forward for more projects', 'Hi I\'m Jasmine Kate A. Patiño 23, from Philippines. I\'m a  Freelance Web Developer/UI & UX Designer/IoT Developer/IoT Engineer /Programmer/ Video Editor/Graphic Designer ', 'Ideal Vision- Web Developer', 'https://sooprs.com/assets/files/6614e4ceda827-1712645326.pdf', 'https://sooprs.com/assets/files/6614e308a2a26-1712644872.jpg', NULL, '2024-04-09 06:30:05', NULL, NULL, NULL, 1, 0, NULL, 'PH', 1, '1,5,8,13,27,89,14,47,2,7,11', 10),
(674, 'Raven Mills ', 'raven-mills', 'rachytechy@gmail.com', '$2y$10$6OiKwGcCVgNAYLQ7t5Xcce9wvSk/60tVfaQfLSiRdJLkAwL12VKJm', '+2348072823607', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 09:33:29', NULL, NULL, NULL, 1, 0, NULL, 'NG', 1, NULL, 30),
(675, 'Madhavi Gupta ', 'madhavi-gupta', 'madhavik100@gmail.com', '$2y$10$jF6c4Pxq3Mluzsr42lTTuevwAmhTw2/i8yjy6BObGHD3dNIDTXFCa', '+919582957103', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-10 05:05:21', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(676, 'Meena mani', 'meena-mani', 'meenamani8393@gmail.com', '$2y$10$3jGIIf5KuGTScmVA64q.3u4K3CnzLAgmuKeQuwddbtjI.uLHpjWeW', '+919342917771', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-10 08:40:07', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(677, 'Sagar', 'sagar', 'sagarjadhav2391@gmail.com', '$2y$10$vRmkkKsgXLRMiGydb.SfVOJm.4.ukQuGDKDer7u3cMTExdZdlmHf6', '+919664234007', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-10 08:55:20', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 20),
(678, 'Eventicosevents', 'eventicosevents', 'eventicosevents@gmail.com', '$2y$10$/gcaO4rUQbmPkyvy0.p3.eVhPATMSdWBCvJHWoobT50czH1LGBum.', '+918103975434', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-10 09:44:10', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50),
(679, 'Rahul Parmar', 'rahul-parmar', 'rahlparmar12345@gmail.com', '$2y$10$SKta/tug0kcExQpzwtgC0OBHTnXZy44m2xtvBCPXugrfO58pmJSJ.', '+919200809854', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-10 10:47:03', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(680, 'Pranita Thorat', 'pranita-thorat', 'pranitat18@gmail.com', '$2y$10$eab8PzitB5b70jrz6cOUE.p2FkpdI8YYfLuDpyqjFpUpGg7apMbmS', '+919370013952', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-11 08:16:03', NULL, NULL, NULL, 1, 0, NULL, 'IN', 0, NULL, 50),
(681, 'stuti sharma', 'stuti-sharma', 'sharmastuti23@gmail.com', '$2y$10$Vg7eNKaDyCkRy0e26T.uhuLB5Wa8camUgqdip2Siyec62pTPTXEq.', '+919818002487', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-11 09:35:17', NULL, NULL, NULL, 1, 0, NULL, 'IN', 1, NULL, 50);

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `customer_id` int(11) DEFAULT '0',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `min_budget` int(10) DEFAULT NULL,
  `max_budget_amount` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_remarks` varchar(50) DEFAULT NULL,
  `description` text,
  `assigned_staff` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assigned_staff_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `project_status` int(5) NOT NULL DEFAULT '0' COMMENT '0- not-assigned,1-assigned,2-completed',
  `bid_count` int(11) DEFAULT '0',
  `assigned_date` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `credits` int(11) DEFAULT NULL,
  `is_sent_to_professionals` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `type`, `customer_id`, `name`, `email`, `mobile`, `city`, `pincode`, `deadline`, `project_title`, `min_budget`, `max_budget_amount`, `category`, `client_remarks`, `description`, `assigned_staff`, `latest_status`, `created_at`, `updated_at`, `assigned_staff_name`, `project_status`, `bid_count`, `assigned_date`, `credits`, `is_sent_to_professionals`) VALUES
(315, NULL, 254, '', 'sanurag0022@gmail.com', '8077556071', '', '', '0000-00-00', 'Custom Website For My Store', 100, '5000', '1', NULL, 'I am looking for a WordPress developer to upgrade my custom menu with both design and functionality changes. I have some ideas in mind but need assistance in implementing them. The project has a short-term timeline of 3-7 days.\n\nSkills and Experience:\n- Strong proficiency in WordPress development\n- Experience in customizing menus and adding new functionalities\n- Familiarity with CSS and HTML for design modifications\n- Ability to work within a tight timeline and deliver high-quality results', NULL, NULL, '2023-10-21 17:57:16', NULL, NULL, 1, 1, NULL, NULL, 0),
(375, NULL, 33, '', 'sandeepvarma@gmail.com', '7901003266', '', '', '0000-00-00', 'SEO for my website', 444, '6666', '7', NULL, 'I want SEO for my website as soon as possible. I want SEO for my website as soon as possible. I want SEO for my website as soon as possible. I want SEO for my website as soon as possible. I want SEO for my website as soon as possible. ', NULL, NULL, '2023-11-23 15:15:13', NULL, NULL, 1, 3, NULL, NULL, 0),
(376, NULL, 33, '', 'sandeepvarma@gmail.com', '7901003266', '', '', '0000-00-00', 'I want content for my website.', 150, '400', '24', NULL, 'I have an E-Commerce website. I want neat , clean and unique content for it. I have an E-Commerce website. I want neat , clean and unique content for it. I have an E-Commerce website. I want neat , clean and unique content for it. I have an E-Commerce website. I want neat , clean and unique content for it. I have an E-Commerce website. I want neat , clean and unique content for it. I have an E-Commerce website. I want neat , clean and unique content for it. ', NULL, NULL, '2023-11-24 11:59:42', NULL, NULL, 1, 3, NULL, NULL, 0),
(377, NULL, 33, '', 'sandeepvarma@gmail.com', '7901003266', '', '', '0000-00-00', 'I want graphics for my gaming website.', 500, '999', '23', NULL, 'My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. My website is a gaming platform, for that I want high resolution graphics. ', NULL, NULL, '2023-11-24 12:01:11', NULL, NULL, 1, 2, NULL, NULL, 0),
(378, NULL, 33, '', 'sandeepvarma@gmail.com', '7901003266', '', '', '0000-00-00', 'Website development for my new product.', 2000, '9000', '1', NULL, 'I want  a website for my product \"Weissner\". I want  a website for my product \"Weissner\". I want  a website for my product \"Weissner\". I want  a website for my product \"Weissner\". I want  a website for my product \"Weissner\". ', NULL, NULL, '2023-11-24 12:51:25', NULL, NULL, 1, 1, NULL, NULL, 0),
(379, NULL, 81, '', 'vinay@techninza.in', '8375910558', '', '', '0000-00-00', 'Want a app for my local store.', 500, '1000', '2', NULL, 'Want a app for my local store. Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.Want a app for my local store.', NULL, NULL, '2023-11-24 13:42:57', NULL, NULL, 1, 3, NULL, NULL, 0),
(424, NULL, 361, '', 'sandeep.meh28@gmail.com', '8700968756', '', '', '0000-00-00', 'Real Estate Website Development', 500, '1000', '1', NULL, 'Want a real estate website with all features within 2 months.\r\nCreating a fully-featured real estate website within a tight timeframe of two months requires careful planning, efficient development, and effective project management. Below is an extended outline of the steps involved in building a comprehensive real estate website, considering various features and functionalities. This plan assumes a collaborative effort involving developers, designers, content creators, and other team members.', NULL, NULL, '2023-12-09 13:05:46', NULL, NULL, 1, 3, NULL, NULL, 0),
(425, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'Need SEO for my website', 499, '899', '7', NULL, 'I have a website which provides real estate properties to customer. I need proper SEO for my website.', NULL, NULL, '2023-12-16 11:01:32', NULL, NULL, 1, 3, NULL, NULL, 0),
(427, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'Need for Graphic Designer ', 200, '500', '23', NULL, 'Need for graphic designer for my e-commerce website', NULL, NULL, '2023-12-19 11:43:20', NULL, NULL, 1, 2, NULL, NULL, 0),
(428, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'Content writer for my products', 500, '800', '24', NULL, 'Content writer for my products', NULL, NULL, '2023-12-20 12:23:49', NULL, NULL, 1, 2, NULL, NULL, 0),
(430, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'Digital Marketing', 200, '500', '5', NULL, 'Digital Marketing project', NULL, NULL, '2023-12-20 16:49:53', NULL, NULL, 1, 3, NULL, NULL, 0),
(432, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'React Native App', 10000, '11000', '4', NULL, 'Need a react native app for stock market, my budget is only 10 thousand USD, please help, need urgently ...\r\nthanks', NULL, NULL, '2023-12-20 17:16:27', NULL, NULL, 1, 2, NULL, NULL, 0),
(433, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'new project', 1000, '2000', '2', NULL, 'I want to create an application for trading and facebook ads .... please connect with me asap....', NULL, NULL, '2023-12-21 10:50:29', NULL, NULL, 1, 3, NULL, NULL, 0),
(439, NULL, 387, '', 'sunnythesandy@gmail.com', '8901277777', '', '', '0000-00-00', 'ShipRocket Like App', 1200, '1300', '2', NULL, 'Hi,\r\n\r\nI need to create an application just like shiprocket, I have apis and other documents ready, looking for an agency who can create such application, should have prior experience or previously developed some apps like this.\r\n\r\nThanks\r\n', NULL, NULL, '2023-12-22 22:30:04', NULL, NULL, 1, 2, NULL, NULL, 0),
(450, NULL, 400, '', '', '', '', '', '0000-00-00', 'Wants to create a mobile App', 5000, '5500', '1', NULL, 'Hi,\r\n\r\nI need to create a mobile application asap, please dm me ...\r\n\r\nThanks\r\n', NULL, NULL, '2023-12-30 15:42:04', NULL, NULL, 1, 2, NULL, NULL, 0),
(452, NULL, 402, '', '', '', '', '', '0000-00-00', 'Looking for a digital Marketing Agency', 1200, '1500', '5', NULL, 'I want to market my product on all social media channels, wants to connect to a digital market agency , regarding that', NULL, NULL, '2024-01-05 11:32:47', NULL, NULL, 1, 3, NULL, NULL, 0),
(454, NULL, 403, '', '', '', '', '', '0000-00-00', 'Want my food delivery to be build ', 250, '400', '20', NULL, 'I want to make my food delivery app. \r\n\r\nTechnology required: React native for mobile app, Laravel for admin. ', NULL, NULL, '2024-01-05 16:11:17', NULL, NULL, 1, 1, NULL, NULL, 0),
(458, NULL, 409, '', '', '', '', '', '0000-00-00', 'Flutter web developer', 1500, '3000', '1', NULL, 'I\'m looking for a skilled developer to create a Flutter web application with interactive user platform capabilities. It will be a plus if the developer has a strong portfolio showcasing their past work references.', NULL, NULL, '2024-01-06 10:56:11', NULL, NULL, 1, 2, NULL, NULL, 0),
(464, NULL, 412, '', '', '', '', '', '0000-00-00', 'Need an app for trading', 1200, '1500', '2', NULL, 'Hi,\r\n\r\nI am looking to develop a mobile application from where users can trade easily.\r\n\r\nDevelopers must have prior experience in their field.\r\n\r\nAnd please as a startup I don\'t have much budget, so hopefully I will get product in budget.\r\n\r\nThanks', NULL, NULL, '2024-01-07 12:38:53', NULL, NULL, 1, 4, NULL, NULL, 0),
(465, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'one single web page ', 500, '500', '1', NULL, 'Need a single web page \r\n\r\nbudget is very less only 500$', NULL, NULL, '2024-01-07 12:52:37', NULL, NULL, 1, 3, NULL, NULL, 0),
(466, NULL, 414, '', '', '', '', '', '0000-00-00', 'Freelancing ', 190, '200', '5', NULL, 'I\'m keen to work as a freelancer in for social media management.\r\nAs I\'m having 2 years of experience and I\'ve worked with 10+ brands including metaspace, floxypay, luxelace, Vmycards and more.', NULL, NULL, '2024-01-08 13:15:06', NULL, NULL, 1, 1, NULL, NULL, 0),
(470, NULL, 420, '', '', '', '', '', '0000-00-00', 'Web App Developement for property selling and buying', 150, '450', '1', NULL, 'I am looking for a web app developer to create a property selling and buying platform. The ideal candidate will have experience in the following areas:\r\n\r\n- Custom features: The web app should integrate with third-party APIs and have advanced analytics capabilities.\r\n- User interface: The client prefers a visually appealing and interactive design to enhance user experience.', NULL, NULL, '2024-01-11 14:24:51', NULL, NULL, 1, 2, NULL, NULL, 0),
(471, NULL, 421, '', '', '', '', '', '0000-00-00', 'Backend and frontend poker game', 250, '750', '1', NULL, 'I am looking for a freelancer to develop a web-based Texas Hold\'em poker game with basic, simple features. The ideal candidate should have experience in both backend and frontend development, as well as knowledge of poker game mechanics. The main requirements for this project include:-\r\nBackend Development:\r\n- Implementing the game logic and rules\r\n- Creating a secure and efficient server-side architecture\r\n- Integrating real-time multiplayer functionality\r\n\r\nFrontend Development:\r\n- Designing and developing an intuitive and user-friendly interface\r\n- Implementing responsive design for optimal performance on different devices\r\n- Integrating animations and sound effects to enhance the gaming experience\r\n\r\nAdditional Requirements:\r\n- Implementing a user authentication system to allow players to create accounts and log in\r\n- Implementing a chat system for players to communicate during the game\r\n- Implementing a simple scoring system and keeping track of players\' statistics\r\n\r\nSkills and Experience:\r\n- Strong knowledge of HTML, CSS, and JavaScript\r\n- Experience with frontend frameworks (Reactjs)\r\n- Experience with backend frameworks (PHP)\r\n- Experience with database management systems (e.g., MySQL, PostgreSQL)\r\n- Familiarity with real-time communication protocols (e.g., WebSockets, [login to view URL])', NULL, NULL, '2024-01-11 16:18:35', NULL, NULL, 1, 2, NULL, NULL, 0),
(472, NULL, 422, '', '', '', '', '', '0000-00-00', '**URGENT** C++ Assignment', 10, '30', '1', NULL, 'I need someone who can do a barber management system that needs to be done in an hour or two. It needs to be connected to a MyPHPadmin database and all data will be read from there. Will send functions needed but it\'s pretty straightforward, just the database thingy is hard. Thank you!', NULL, NULL, '2024-01-12 10:25:52', NULL, NULL, 1, 2, NULL, NULL, 0),
(473, NULL, 424, '', '', '', '', '', '0000-00-00', 'Mobile App Development - Conversion Project', 250, '600', '20', NULL, 'Seeking skilled mobile app developer(s) to work on a mobile app conversion project for both iOS and Android devices. Must be skilled in native iOS/Swift and Android/Java.\r\nProject involves UI conversions, Some functionality tweaks, update some API calls. Must fully test and deliver the app(s) and support go live. testing on mobile and Tablet devices\r\nMust continuously update GitHuib with changed code\r\n\r\n- Fixed time - Delivery in 2-3 weeks\r\n- Fixed bid MAX Rate is $600 for both iOS and Android\r\n\r\nMust be\r\n- Proactive in communication\r\n- Provide through testing of all functionality and promptly do bug fixes\r\n- Provide support for Go-Live\r\n- Provide production support\r\n- Should sign NDA\r\n\r\nPlease only make a bid if you feel this project aligns with your qualifications and professional interests.', NULL, NULL, '2024-01-12 11:59:07', NULL, NULL, 1, 2, NULL, NULL, 0),
(474, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Shopify E-commerce Store with Social Media Ad Creation', 100, '150', '1', NULL, 'Description:\r\nI am looking for a skilled freelancer to create an e-commerce store on Shopify and assist with social media ad creation. The purpose of the website is to serve as an online store where I can sell physical goods.\r\n\r\nKey Requirements:\r\n- Experience in building e-commerce stores on Shopify\r\n- Proficiency in Shopify\'s features and customization options\r\n- Knowledge of best practices for optimizing an e-commerce store for conversions and user experience\r\n- Ability to integrate payment gateways and set up secure checkout processes\r\n- Design skills to create an attractive and user-friendly website layout\r\n\r\nSocial Media Ad Creation:\r\nIn addition to building the e-commerce store, I am also interested in creating social media ads to promote my products. The ideal freelancer should have experience in creating engaging and effective social media ads.\r\n\r\nKey Skills for Social Media Ad Creation:\r\n- Proficiency in social media platforms such as Facebook, Instagram, and Twitter\r\n- Ability to create eye-catching and engaging ad visuals\r\n- Knowledge of targeting and audience segmentation for effective ad campaigns\r\n- Experience in analyzing ad performance and optimizing campaigns for better results\r\n\r\nIf you have the skills and experience required for this project, please provide examples of your previous work and a brief overview of your approach to building', NULL, NULL, '2024-01-12 13:44:43', NULL, NULL, 1, 3, NULL, NULL, 0),
(475, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'B2C Digital Marketing Expansion', 100, '150', '5', NULL, 'I\'m seeking a skilled digital marketer. My key objectives are to increase website traffic, boost search engine rankings, and drive more leads. My target audience is B2C consumers. Key tasks include:\r\n\r\n- Optimizing and managing marketing campaigns on Facebook and Instagram\r\n- Utilizing SEO strategies to improve search engine rankings\r\n- Implementing effective lead generation techniques\r\n\r\nIdeal experience includes a proven track record in improving website traffic, SEO proficiency, and successful lead generation. Knowledge in managing B2C-focused marketing campaigns on Facebook and Instagram is highly valuable.', NULL, NULL, '2024-01-13 11:58:52', NULL, NULL, 1, 2, NULL, NULL, 0),
(476, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'google adword for business', 200, '500', '5', NULL, 'Please read carefully and provide proposal accordingly. Donot send generic proposal.\r\n\r\nPlease share your previous achievements and why should we choose your services\r\n\r\nI am looking for a Google AdWords expert to help boost product sales for my business. With a monthly budget of $500, I want to maximize my advertising efforts and bring in more customers.\r\n\r\nKey requirements:\r\n- Proficiency in Google AdWords and experience managing campaigns with a limited budget\r\n- Ability to analyze and optimize ad performance to achieve the goal of boosting product sales\r\n- Strong understanding of keyword research and targeting to ensure relevant ads reach the right audience\r\n- Creative thinking to come up with effective ad copy and strategies\r\n- Excellent communication skills to collaborate and provide suggestions based on my ideas\r\n\r\nIf you have a proven track record of success in Google AdWords campaigns and can help me achieve my sales goals, please submit your proposal.', NULL, NULL, '2024-01-13 15:39:26', NULL, NULL, 1, 2, NULL, NULL, 0),
(477, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Website for Car Auction', 250, '750', '1', NULL, 'I am looking for a skilled web developer to create a website for a car auction. The main purpose of the website is to facilitate online bidding, allowing users to bid on cars that are up for auction.\r\n\r\nFeatures:\r\n- User registration and bidding system: Users should be able to create an account, log in, and place bids on cars.\r\n- Car search and filter options: Users should be able to search for cars based on specific criteria such as make, model, year, etc.\r\n- Contact form for inquiries: Users should have the option to contact the auction organizer for any inquiries they may have.\r\n\r\nDesign preferences:\r\n- The client is open to suggestions for the design of the website. They do not have a specific design in mind, but they would like it to be clean and modern.\r\n\r\nIdeal skills and experience:\r\n- Proficiency in web development languages such as HTML, CSS, and JavaScript.\r\n- Experience with user registration and bidding systems.\r\n- Knowledge of database management systems for storing user information and bid data.\r\n- Ability to create a clean and modern design that is visually appealing and user-friendly.\r\n\r\nIf you have the necessary skills and experience, and you are able to deliver a high-quality website that meets the client\'s requirements, please submit your proposal.', NULL, NULL, '2024-01-13 18:15:58', NULL, NULL, 1, 4, NULL, NULL, 0),
(478, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Java Pro for Business Software Development', 130, '250', '1', NULL, 'Barcelona PHP Programmers\r\nTAP Series\r\nRemote Position\r\nTAP Series is located in Westlake Village, California with a fast-growing team and a culture to develop solutions with best practices.\r\n\r\nWhat we are seeking:\r\n\r\n\r\nWe are a growing company and are seeking new candidates to collaborate with dedicated individuals to help continue pushing to work with our production team. This is a part-time position where you will be collaborating with dedicated individuals to help continue to push the company forward.\r\n\r\nWe are committed to a diverse and inclusive workplace. TAP Series is an equal-opportunity employer and does not discriminate on the basis of race, national origin, gender, gender identity, sexual orientation, protected veteran status, disability, age, or other legally protected status.', NULL, NULL, '2024-01-15 09:44:53', NULL, NULL, 1, 4, NULL, NULL, 0),
(479, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Fix JavaScript Lightbox Image Viewer Issues', 100, '250', '1', NULL, 'I need assistance with a JavaScript image viewer on my website. Although I\'ve successfully incorporated a lightbox style viewer, one issue persists that I have not been able to resolve:\r\n\r\n- When the lightbox image viewer is activated, it opens and only displays the first image irrespective of the image selected.\r\n\r\nIt\'s important to note that I\'m not using any specific library or plugin for the lightbox image viewer, and there\'s no specific naming or storage pattern for my images that could potentially interfere with the code.\r\n\r\nThe ideal freelancer for this project would have significant experience with JavaScript and be able to perform a thorough troubleshooting process. They should also be able to provide me with a clear explanation of the issue and the steps they took to resolve it. If interested, please submit a bid along with a brief account of any previous similar work experience.', NULL, NULL, '2024-01-15 12:04:34', NULL, NULL, 1, 4, NULL, NULL, 0),
(480, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Multi-Platform Social Media Sales Campaign', 150, '450', '5', NULL, 'I\'m looking to develop a strong, sales-driven, social media campaign across Facebook, Instagram, Twitter, and YouTube. The main goal is boosting sales and conversions for my brand. Our effort will primarily target millennials, parents, and travel enthusiasts who form my brand\'s core audience.\r\n\r\nThe ideal candidate will be well-versed in:\r\n- Social media management across all four platforms,\r\n- Sales maximization strategies specifically tuned to social media,\r\n- Awareness of millennial, parent, and travel enthusiast markets.\r\n\r\nExperience with brand building in these specific audience sectors is highly desirable.', NULL, NULL, '2024-01-15 14:52:51', NULL, NULL, 1, 5, NULL, NULL, 0),
(481, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Enhance YouTube Engagement, Views & Ranking', 100, '150', '5', NULL, 'I am seeking for a professional to increase the views, subscribers, and the ranking of my YouTube Videos. Ideally, this would be achieved through a combination of influencer marketing and SEO, so a background in these areas is important.\r\n\r\nKey objectives include:\r\n- Expanding views and subscriber count\r\n- Boosting my video rankings on Youtube\r\n\r\nMy target audience primarily includes young adults and parents. So, understanding of consumer behavior, and expertise in capturing and engaging this demographic is crucial.\r\n\r\nYour responsibilities would involve:\r\n- Influencer marketing: Identifying and coordinating with relevant influencers in my content category.\r\n- SEO: Optimizing video titles, descriptions, and tags to improve visibility on search engine results, thus enhancing video rankings.\r\n\r\nA successful project would result in marked improvement in views, subscriber count, user engagement, and subsequently, video rankings.\r\n\r\nSkills:\r\n- Proven experience in Influencer marketing\r\n- Proficiency in SEO\r\n- Understanding of YouTube algorithms\r\n- knack for engaging specific target audience, i.e., young adults and parents.', NULL, NULL, '2024-01-15 16:27:14', NULL, NULL, 1, 4, NULL, NULL, 0),
(482, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Pop Culture Content Creation', 1500, '3000', '24', NULL, 'I\'m seeking a versatile content creator adept at creating engaging blog articles, infographics, and videos tailored for the general public. My focus is on entertainment and pop culture trends.\r\n\r\nIdeal Skills & Experience:\r\n- Demonstrable experience in pop culture-related content creation\r\n- Excellent blog writing skills\r\n- Proven skill in designing compelling infographics\r\n- Proficiency in video creation, including scripting, production and editing\r\n- Solid understanding of audience engagement tactics\r\n\r\nI\'m eager to collaborate with someone who shares the same enthusiasm for pop culture, and can help me communicate complex trends in an engaging and effective manner.', NULL, NULL, '2024-01-16 11:59:46', NULL, NULL, 1, 5, NULL, NULL, 0),
(483, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Automated Security Software Setup for Windows', 250, '750', '1', NULL, 'I\'m looking for a professional with a sound knowledge of downloadable software installation, particularly for Windows. The core functionality of my software revolves around security.\r\nThe software alreadt developed it is based on paythone and i need to automate the instllation process i am using the command DSN to install and set the path of the software manaualy i need this function to be in auto mode also the paythone software installed by user, for the software to function mean while the software listed in new web site created for this porpose and manage the subsbscription by IP address for each license mean user fill the form pay the money then get link to download the software the software get the ip address of the device and keep record in our web site the ip assoociated with that subsbcription one license for one machine only.\r\n\r\n\r\n- Automatic installation process\r\n- Alert-based functionalities\r\n\r\nYour task will be to ensure that the software installs automatically upon user execution. Attention to detail and a knack for simplifying complex processes are crucial skills you\'ll need to excel at this job. Your main objective is to make the installation process user-friendly while ensuring the alert mechanism of the security software works flawlessly.', NULL, NULL, '2024-01-16 13:18:14', NULL, NULL, 1, 6, NULL, NULL, 0),
(484, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'AI for Individual Stock Forecasting', 250, '750', '1', NULL, 'I\'m looking for an AI specialist to create a trained model that can effectively forecast individual company\'s stock prices. Specifically, I require a tabular forecasting model. This project entails using machine learning or deep learning to generate accurate, reliable predictions based on historical data and other relevant factors.\r\n\r\nIdeal Skills & Experience for the Job:\r\n- Expertise in AI and machine learning\r\n- Profound knowledge of financial markets and stock price forecasting\r\n- Experience with tabular data analysis and forecasting\r\n- Proficient in Python or R programming languages\r\n- Familiarity with AI platforms like TensorFlow, Keras or PyTorch\r\n\r\nPlease note, accuracy is paramount in this project and your bid should reflect your confidence in achieving high predictive accuracy.\r\n\r\nThe Dataset i will provide it will have Input and output folder , the data file has 1 to 100 columns , the input is the pattern data and output is result of pattern so ai model should get trained using both and then when user gives the input data of pattern then it should forecast the number of rows\r\n\r\nPlease msg me i will send you the complete specs. i need ai expert for this, must have extensive experiance in a/ml field', NULL, NULL, '2024-01-16 15:24:14', NULL, NULL, 1, 5, NULL, NULL, 0),
(485, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Flutter iOS Version Development Needed', 100, '150', '22', NULL, 'I\'m looking for an experienced developer to create the iOS version of my Android app using Flutter.\r\n\r\nKey details are as follows:\r\n\r\n• The design is already created and will be provided to you.\r\n• The iOS version should mimic the Android version identically. There are no exclusive features specific to iOS.\r\n• Timeline for the project is flexible, allowing for a developer to focus on quality and detail.\r\n\r\nIdeal skill sets for this project include:\r\n\r\n• Extensive experience with iOS development\r\n• Proficiency in Flutter\r\n• Ability to follow pre-existing design schemes\r\n• Strong communication skills for regular project updates.', NULL, NULL, '2024-01-16 16:50:43', NULL, NULL, 1, 5, NULL, NULL, 0),
(486, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'FlutterFlow Developer for QR Functionality Fix', 100, '280', '20', NULL, 'I\'m in need of a proficient FlutterFlow developer to resolve a crucial functionality issue in my project. The trouble at hand is with respect to a QR code checker functionality that I\'ve been trying to incorporate. Essentially, the ideal end result is for the application to display a success message upon successful scanning and checking of a QR code. Thus, I need a freelancer who excels at:\r\n\r\n- FlutterFlow development\r\n- Resolving functionality issues\r\n- Implementing QR code functionalities\r\n- UI/UX understanding to ensure the success message is presented optimally\r\n\r\nExperience with similar projects will be a significant advantage.', NULL, NULL, '2024-01-17 07:59:17', NULL, NULL, 1, 7, NULL, NULL, 0),
(487, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Need help developing an MVP for mobile app', 250, '750', '4', NULL, 'EVNT is an ambitious tech startup dedicated to transforming the event management landscape. Our flagship product, EVNT, aims to revolutionize how individuals plan and experience events. We are looking for a talented and motivated Mobile App Developer to contribute to the creation of an MVP of the first version of our app.\r\n\r\nDeliverables\r\nMVP Development Deliverables for EVNT Mobile App:\r\n\r\nProject Kickoff:\r\nDetailed project plan outlining milestones and timelines.\r\nKickoff meeting to align development objectives and expectations.\r\n\r\nDevelopment:\r\nFunctional MVP with core features, including event creation, user profiles, and vendor registration.\r\nSeamless integration with backend services for data management.\r\nCross-platform compatibility (iOS and Android).\r\n\r\nTesting and Debugging:\r\nRigorous testing of MVP functionalities.\r\nIdentification and resolution of any bugs or issues.', NULL, NULL, '2024-01-17 10:19:26', NULL, NULL, 1, 6, NULL, NULL, 0),
(488, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Shopify API Integration for E-SIMS', 250, '750', '1', NULL, 'I\'m looking for an expert in Shopify API integration to implement particular features that streamline my business operations - specifically automated processing of digital orders, inventory synchronization, and product listings.\r\n\r\nSkills & Experience:\r\n\r\n- Proven expertise in Shopify API integration.\r\n- Prior experience in setting up automated processes for digital orders.\r\n- Knowledge of inventory synchronisation and managing product listing on Shopify platform.\r\n\r\nKey Responsibilities:\r\n\r\n- Link Supplier\'s API to shopify in order to process the orders automatically\r\n- Right now, the email is automatically send by the supplier\'s system. I would like to customize my own email template and send it by my own domain instead.\r\n\r\n\r\nThis project requires a combination of technical competence and an understanding of e-commerce dynamics, particularly within the digital goods industry. Your mission should you choos', NULL, NULL, '2024-01-17 15:06:12', NULL, NULL, 1, 7, NULL, NULL, 0),
(489, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Digital Products E-commerce Platform', 3000, '5000', '1', NULL, 'I\'m looking for a talented web developer to continue and maintain an existing website and shop.\r\n\r\nThe ideal candidate for this project would:\r\n- Able to see into an existing project and continue or improve the existing\r\n- Not complain about the existing programming, open for improvals\r\n- Have a profound experience working with e-commerce platforms, particularly those that deal with physical products\r\n- Understand the importance of a clean, user-friendly design.\r\n- Able to maintain website and databases\r\n\r\nA portfolio showcasing similar projects will largely increase your chance of getting this job. Looking forward to seeing your proposals.', NULL, NULL, '2024-01-17 17:14:00', NULL, NULL, 1, 8, NULL, NULL, 0),
(490, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Long-Term Digital Ad Management', 100, '1500', '5', NULL, 'I\'m seeking a proficient digital ad manager for a long-term position. The scope of this project entails the handling of Google Ads, Facebook Ads, and Instagram Ads, with a targeted audience , specifically the age bracket of 25-34. It\'s important to note that video ads have been the most successful content type in our campaigns.\r\n\r\nIdeal Skills:\r\n- Proficiency in Google, Facebook, and Instagram Ads.\r\n- Understanding of how to strategically target working professionals aged 25-34.\r\n- Creativity and expertise in producing compelling video ads.\r\n\r\nExperience:\r\nSuitable freelancers should have extensive experience in managing digital ads across diverse platforms, specifically targeting the demographic mentioned. A well-rounded portfolio showcasing successful video ad campaigns would be ideal.', NULL, NULL, '2024-01-18 17:20:06', NULL, NULL, 1, 7, NULL, NULL, 0),
(491, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Need an Event App', 1500, '2000', '2', NULL, 'we are looking to create an event based app for travel and tourism , we are based in Lakshdeep. want to meet in person\r\n', NULL, NULL, '2024-01-19 13:46:59', NULL, NULL, 1, 9, NULL, NULL, 0),
(492, NULL, 434, '', 'sanurag0022@gmail.com', '8077556071', '', '', '0000-00-00', 'trading website development', 500, '1000', '1', NULL, 'need a website for fundamental analysis of stocks', NULL, NULL, '2024-01-20 11:18:51', NULL, NULL, 1, 6, NULL, NULL, 0),
(493, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Children Book Promotion Specialist Needed', 1000, '2000', '5', NULL, 'I\'m seeking an expert marketing professional who has experience in promoting children\'s books. The right candidate would have the specific knowledge and insights on the best ways to reach pre-schoolers and primary school children.\r\n\r\nThe theme of the book revolves around imagination, so it\'s crucial that the marketing strategy is creative and appeals to young, inventive minds.\r\n\r\nKey Responsibilities:\r\n* Creating an effective promotional strategy to increase the visibility of the book on social media.\r\n* Developing engaging content suitable for the target audience and/or their parents\r\n\r\nRequired Skills and Experience:\r\n* Proven experience in children\'s book marketing.\r\n* Strong understanding of social media platforms.\r\n* Excellent content creation and marketing strategy skills.', NULL, NULL, '2024-01-20 12:10:05', NULL, NULL, 1, 6, NULL, NULL, 0),
(494, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Daily Instagram Management & Content Curation', 250, '750', '5', NULL, 'I\'m on the lookout for an experienced Instagram manager who can curate and post engaging content on a daily basis. The right contractor will:\r\n\r\n* Manage my account and post 3 times daily. The required timing flexibility and commitment to this role are key to achieving constant engagement.\r\n* Curate high-quality photographs, videos, and quotes to post. The candidate should have a keen eye for selecting content that will resonate with my audience.\r\n* Uphold a modern aesthetic across all posts. The ability to consistently maintain this aesthetic is crucial to the success of this project.\r\n\r\nIdeal candidates will have ample experience in social media management, exceptional communication skills, and a demonstrated knack for maintaining consistent aesthetics across various platforms.', NULL, NULL, '2024-01-20 14:05:39', NULL, NULL, 1, 7, NULL, NULL, 0),
(495, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Website SEO Enhancement', 20, '170', '5', NULL, 'I am looking for an experienced SEO professional to optimise my active website, for improving its ranking. The primary focus will be on the following search engines: Google and Bing.\r\nIdeal candidate should have:\r\n- Proven experience in SEO optimisation.\r\n- A deep understanding of SEO guidelines, tools, and tracking.\r\n- Intricate knowledge of Google and Bing\'s ranking factors and algorithm updates.\r\n- A record of delivering SEO growth.\r\nYour main duties will encompass:\r\n- Conducting a comprehensive SEO audit of my website.\r\n- Identifying areas of improvement and optimising website content for the best possible search engine ranking.\r\n- Building a robust SEO strategy focused on our primary goal: improving site ranking.', NULL, NULL, '2024-01-22 10:14:22', NULL, NULL, 1, 5, NULL, NULL, 0),
(496, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Dedicated Hosting for Wordpress Website', 30, '250', '1', NULL, 'For my Wordpress website, I\'m seeking a knowledgeable professional to provide dedicated hosting. I\'m open to either Linux or Windows platforms.\r\n\r\nKey requirements for the project include:\r\n\r\n- Extensive knowledge and experience of dedicated hosting.\r\n- Proficiency in handling Wordpress websites.\r\n- Familiarity with both Linux and Windows Operating Systems.\r\n- Efficient and reliable service, ensuring optimal website performance.\r\n\r\nDon\'t hesitate to bid if you have the desired skills and experience. I\'m looking forward to working with a hosting expert who can meet my requirements.', NULL, NULL, '2024-01-22 11:18:03', NULL, NULL, 1, 5, NULL, NULL, 0),
(497, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Minimalist Farm Animal Logo Design', 30, '250', '23', NULL, 'I\'m in need of a modern, minimalist logo in a black, white, and gray color palette. The design should incorporate key elements that are crucial to my brand, namely, my dogs, quail, chicken, and turkeys.\r\n\r\nIdeal Skills and Experience:\r\n• Proficient in creating minimal design.\r\n• Experienced in animal-themed logos.\r\n• Good sense of balance and proportion for design.\r\n• Ability to work with black, white, and gray color palette.\r\n\r\nSpecific Requirements:\r\n• The logo must convey a modern and minimalist aesthetic.\r\nMust include “Roo’s Roost”\r\n• The logo must incorporate my dogs, quail, chicken, and turkeys in an elegant and non-cluttered way.\r\n• While it should be sophisticated, I also want it to exude warmth and reflect the personality of my farm animals.\r\n• Sketches or drafts for feedback before finalization is preferred.', NULL, NULL, '2024-01-22 13:12:07', NULL, NULL, 1, 6, NULL, NULL, 0),
(498, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Experienced React JS Developer for AI Projects', 1800, '3000', '1', NULL, 'I am searching for a highly experienced React JS developer who can aid in the development of AI-based projects.\r\n\r\nSpecifically, I am interested in finding someone who has:\r\n\r\n- At least 6 to 8 years of experience working with React JS\r\n- Proven experience, specifically in AI projects and web-based applications.\r\n- An decent level of expertise in developing AI functionalities using React JS.\r\n\r\nWhile I do possess a moderate understanding of AI technologies, I am ideally seeking a React JS developer who can guide and lead the project to fruition using their expertise.\r\n\r\nLet\'s connect and create an impactful AI-based solution together!', NULL, NULL, '2024-01-22 15:27:52', NULL, NULL, 1, 8, NULL, NULL, 0),
(499, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Social Media Lead Generation Specialist', 10, '30', '5', NULL, 'I am on a mission to expand my brand and generate leads through social media marketing. A knowledgeable individual who excels in all things related to social media platforms including Facebook, Instagram, LinkedIn, and Google is the one I am looking for.\r\n\r\nIdeal Skills/Experience:\r\n\r\n- Proven proficiency in social media marketing, specifically on platforms such as Facebook, Instagram and LinkedIn.\r\n- Adept at lead generation techniques.\r\n- Strong ability to implement SEO best practices in conjunction with social media campaigns.\r\n- Background in successful content marketing, specifically tailoring it to optimize lead generation.\r\n\r\nKey Responsibilities Include:\r\n\r\n- Utilizing Facebook, Instagram, LinkedIn, Google to generate quality leads.\r\n- Strategizing, creating, and optimizing eye-catching content relevant to our audience.\r\n- Maximizing SEO to complement social media strategies.\r\n- Primarily focus on generating leads to meet our objectives.', NULL, NULL, '2024-01-24 15:01:25', NULL, NULL, 1, 4, NULL, NULL, 0),
(500, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'SocialNet App Build', 300, '900', '22', NULL, 'Seeking a skilled developer for a social networking iOS app. The core focus is on creating a robust messaging system that fosters user interaction.\r\n\r\n- **Platform:** iOS\r\n- **Primary Function:** Social Networking with emphasis on user communication.\r\n- **Core Features:**\r\n- **Messaging System:** Must be secure, intuitive, and handle high volume of users.\r\n\r\n**Skills Required:**\r\n- Experience with iOS development (Swift/Objective-C)\r\n- Proven portfolio with social networking apps\r\n- Strong grasp of secure messaging protocols\r\n- Familiarity with social app monetization strategies is a plus\r\n\r\n**Experience Needed:**\r\n- Developing real-time chat functionality\r\n- Implementing user-friendly interfaces\r\n- Prior work with social media integrations and APIs\r\n\r\nI value communication and timely delivery. Please include examples of past social networking projects with your proposal.\r\n\r\nDiscription of app I will send to you', NULL, NULL, '2024-01-25 10:24:00', NULL, NULL, 1, 4, NULL, NULL, 0),
(501, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Realistic Sauna Assembly Animation', 250, '750', '23', NULL, 'I\'m looking for a talented animator to bring my sauna\'s assembly process to life. This will be a realistic 3D instructional video that must clearly illustrate the steps required for assembling and disassembling our high-quality saunas.\r\n\r\nKey points for the project:\r\n- Realistic 3D animation that mirrors the real-world assembly procedure.\r\n- Focus on clarity and educational value, catering to customers who prefer visual guides.\r\n- Highlight the process\'s efficiency and ease.\r\n\r\nYour responsibilities will include:\r\n- Developing a storyboard based on the provided schematics.\r\n- Creating lifelike 3D models of the sauna components.\r\n- Animating the assembly and disassembly process with accuracy.\r\n\r\nI\'m providing detailed sauna schematics to ensure precision in the animation. Therefore, I need someone with:\r\n\r\nIdeal Skills:\r\n- Proficiency in 3D animation software like Maya, Cinema 4D, or Blender.\r\n- Strong portfolio showcasing realistic modeling and animation.\r\n- Attention to detail for translating schematics to animations.\r\n- Experience in creating instructional or how-to videos is a plus.\r\n\r\nPlease submit your bid with relevant work samples and an estimate of your turnaround time.', NULL, NULL, '2024-01-25 12:41:27', NULL, NULL, 1, 4, NULL, NULL, 0),
(502, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Upgrade of .NET windows console application from .net 4 to .net 8', 250, '750', '1', NULL, 'Seeking a freelancer to complete the .NET 4 Windows console app upgrade to .NET 8, using Managed Extensibility Framework (MEF). The upgrade, started with the .NET Upgrade Assistant, needs finalizing.\r\n\r\nRequirements:\r\n1. Proficient in .NET 4 and .NET 8, experienced in Windows console applications.\r\n2. Experience using the .NET Upgrade Assistant.\r\n3. Capable of troubleshooting and resolving upgrade-related errors.\r\n4. Familiar with MEF in .NET applications.\r\n5. Ensure compatibility with Visual Studio 2022.\r\n6. Past work examples and a clear upgrade strategy.\r\n\r\nAll the code will be available from GitHub, you will have access to the developer who has completed the work to date.\r\n\r\nAcceptance Criteria:\r\n1. Application compiles and runs error-free in Visual Studio 2022 and directly from the console.\r\n2. MEF components function correctly post-upgrade.\r\n3. Detailed documentation of the upgrade process, troubleshooting, and best practices for .NET 8 and Visual Studio 2022.\r\n\r\nLooking for a freelancer to efficiently complete the upgrade, enhancing the app\'s performance and compatibility.', NULL, NULL, '2024-01-25 14:26:54', NULL, NULL, 1, 4, NULL, NULL, 0),
(503, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Angular-Based High-End Travel Website Redesign', 250, '750', '1', NULL, 'As an established travel platform targeting vacation rentals, I am seeking an experienced Angular coder with a clean and refined esthetic. The main objective is to create a memorable, easy to maneuver, and luxurious online experience for my visitors.\r\n\r\nKey features to be incorporated into the site are:\r\n- An interactive map\r\n- High-quality images to showcase various destinations\r\n- Thoughtfully selected, pleasing font styles\r\n- Varied page layouts to stand out from typical websites\r\n- Booking functionality to easily secure rentals\r\n\r\nImportant elements of user interaction:\r\n- A responsive chatbot for customer service\r\n- A feature for personalized user accounts\r\n\r\nThe ideal freelancer for this job is a creative professional who comprehends luxury branding in the travel industry, demonstrates excellent design skills, and is fully proficient in coupling these skills with Angular\'s capabilities. Note: this project isn\'t for those who deliver cookie cutter or ordinary designs. The goal here is to design a distinctive, tasteful, and user-friendly interface that woos visitors into being loyal users.\r\n\r\nPlease share any travel or vacation rental or hotel website you have designed or picture rich websites. These examples should showcase your best work. Looking for reasonable quotes as I am on budget and also estimate of how long it might take.', NULL, NULL, '2024-01-25 18:07:02', NULL, NULL, 1, 4, NULL, NULL, 0),
(504, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Dynamic Management App', 750, '1500', '4', NULL, 'I am looking for a talented freelancer to bring my vision for a construction project management app to life. This app should be a seamlessly integrated tool for both iOS and Android platforms.\r\n\r\nKey Requirements:\r\n\r\n- Robust Task Management: The app must allow users to organize, prioritize, and track tasks efficiently.\r\n- Secure File Sharing: It should enable file sharing among team members with a focus on collaboration.\r\n- Google Drive Integration: The app must connect with Google Drive to access and manage documents directly.\r\n- App would require access for worker inductions, storage and access to project specific documents including uploaded safety documents and daily site diary updates as well as checklists. Also sign in and out register.\r\n\r\nIdeal Candidate Skills:\r\n\r\n- Proficient in iOS and Android app development\r\n- Experienced with cloud storage APIs, specifically Google Drive\r\n- Understanding of UX/UI principles for effective task management features\r\n\r\nYour capability to create a user-friendly and secure environment for task management and file sharing will be integral to the success of this project.\r\n\r\nIf you have a portfolio that showcases similar projects and robust technical expertise, I\'d love to consider your proposal.', NULL, NULL, '2024-01-27 10:01:29', NULL, NULL, 1, 4, NULL, NULL, 0),
(505, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'SEO Conversion & Ranking Boost', 150, '450', '7', NULL, 'I am looking for an SEO expert who understands the importance of not only improving a website\'s search engine rankings but also how to translate those rankings into real conversions. Here\'s what I need:\r\n\r\n- Improve my website’s visibility in search engine results.\r\n- Increase the rate at which visitors take desired actions on the site.\r\n\r\nTo achieve these goals, the ideal freelancer will have:\r\n\r\n- Proven experience in SEO with a track record of successful projects.\r\n- Expertise in both on-page and off-page optimization techniques.\r\n- Ability to perform in-depth keyword research and content optimization.\r\n- A deep understanding of user intent and the ability to tailor content to user needs.\r\n\r\nExperience:\r\n\r\n- Applicants should provide clear evidence of past success in similar projects.\r\n\r\nAreas for Improvement:\r\n\r\n- My website requires enhancement of content quality and relevance. It is crucial to deliver content that meets the search intent and encourage engagement – a step that I believe will significantly increase conversions.\r\n\r\nIf you believe your experience aligns with my project needs, please apply with a brief overview of your approach to improve my website\'s SEO and conversion rate. An understanding of current SEO best practices and adaptability to the latest algorithms is essential. Looking forward to reading about how your expertise can elevate my website\'s performance.', NULL, NULL, '2024-01-27 11:19:49', NULL, NULL, 1, 4, NULL, NULL, 0),
(506, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Node.js API Gateway Microservices Integration', 1200, '2200', '1', NULL, 'I am looking for a proficient Node.js developer with an extensive understanding of API Gateway architecture to implement a microservices project.\r\n\r\nKey Requirements:\r\n\r\n- Proven experience in Node.js development\r\n- Proficiency in API Gateway architecture\r\n- Strong knowledge of PostgreSQL\r\n\r\nI need someone who can efficiently implement microservices using Node.js within an API Gateway architecture. It’s required that the data should be managed through PostgreSQL. Your bid should reflect your experience and expertise in these areas.', NULL, NULL, '2024-01-27 13:03:26', NULL, NULL, 1, 6, NULL, NULL, 0);
INSERT INTO `lead` (`id`, `type`, `customer_id`, `name`, `email`, `mobile`, `city`, `pincode`, `deadline`, `project_title`, `min_budget`, `max_budget_amount`, `category`, `client_remarks`, `description`, `assigned_staff`, `latest_status`, `created_at`, `updated_at`, `assigned_staff_name`, `project_status`, `bid_count`, `assigned_date`, `credits`, `is_sent_to_professionals`) VALUES
(507, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Practo Like App ', 5000, '6000', '2', NULL, 'We want to create a practo like app, only android and Ios App needed with admin panel, website not required.\r\n\r\nWe are very tight with budget. Please give your best quote.\r\n\r\nThank You!', NULL, NULL, '2024-01-31 13:44:30', NULL, NULL, 1, 7, NULL, NULL, 0),
(508, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'add function on wordpress site', 20, '150', '1', NULL, 'Hi,\r\nwe are creating a wordpress website where local students and teachers can connect. locality will be decided by pincode.\r\nwhat we need is,\r\n1. student sign up form/page where they can enter categories/subjects they are looking for\r\n2. teacher sign up form/page where they can enter categories/subjects they are expert at\r\n3. matching of student/teacher on teacher/student dashboard/match page pin code based and category/subject based.\r\n4. student profile page\r\n5. teacher profile page\r\n\r\nthats it.', NULL, NULL, '2024-02-01 11:22:41', NULL, NULL, 1, 5, NULL, NULL, 0),
(509, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Full Stack Engineer (Mobile & Desktop App)', 100, '900', '1', NULL, 'I\'m in need of an experienced full stack developer proficient in JavaScript and Python for an upcoming e-commerce project. We are seeking a talented Full Stack Developer to join our dynamic team and play a pivotal role in building our Minimum Viable Product (MVP). As a Full Stack Developer, you will be responsible for both front-end and back-end development, ensuring the seamless integration of various features and functionalities.\r\n\r\nBackend may just be limited to firebase. We have some UI/UX designs already and will describe the idea to you. We\'re hoping to get this done quickly.\r\n\r\nFor the backend we may just use something simple like firebase and do something more complex down the line.\r\n\r\nKnowledge of AI/ML would be largely beneficial.\r\n\r\n- Skills & Experience:\r\n- Proven expertise in JavaScript and Python.\r\n- Previous working experience in e-commerce projects.\r\n- Strong understanding of databases and UI/UX design.', NULL, NULL, '2024-02-01 12:43:59', NULL, NULL, 1, 6, NULL, NULL, 0),
(510, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'NAV Integration Expertise Needed', 800, '1600', '1', NULL, 'I\'m seeking a Microsoft Dynamics NAV developer to bolster our LS Retail system with additional functionality. The project revolves around enhancing a LS Retail \'WS Request\' codeunit we utilize for our retail operations in Dynamics NAV 2015 on premises\r\n\r\nProject Key Points:\r\n- WS Request and WS Request Setup tables have been populated with a new request SEND_SALES_PRICE\r\n- Adding required code to LS Retail WS Request codeunit to handle the new request (saving data into all fields in 7002 sales price table); depending on developer efficiency other requests and tables can be worked on as well\r\n- Current codeunit will be delivered as .fob (you should be roughly aware which one)\r\n- the source code of the codeunit will outlined together and the you the developer will do the coding\r\n- modified codeunit will be provided back as .fob and all modifications as plain text\r\n\r\nIdeal Candidate Skill Set:\r\n- Proficient in Dynamics NAV 2015 development, specifically codeunits.\r\n- access to Dynamics NAV 2015 development environment\r\n- access to Dynamics NAV 2015 developer license', NULL, NULL, '2024-02-01 15:50:50', NULL, NULL, 1, 3, NULL, NULL, 0),
(511, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Engaging News Sharing Site', 150, '450', '1', NULL, 'I\'m seeking an expert web designer to create an informative and user-friendly website for disseminating news to the general public. Ideal candidates will possess the following qualifications:\r\n\r\n- Proven experience in web design, particularly with information-heavy websites\r\n- Strong understanding of UX/UI principles to ensure a clean and navigable interface\r\n- Knowledge in responsive design to cater to desktop and mobile users\r\n- SEO skills to maximize visibility and reach\r\n- Capability to implement easy-to-use content management systems\r\n- Experience with analytics tools to track engagement and audience insights\r\n\r\nThis project will require a collaborative effort to ensure the end product is both aesthetically pleasing and functional. Your portfolio showcasing similar projects will be a deciding factor in my selection process.', NULL, NULL, '2024-02-02 10:51:44', NULL, NULL, 1, 4, NULL, NULL, 0),
(512, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Skilled iOS App Developer Needed', 750, '1500', '22', NULL, 'I\'m looking for a qualified iOS app developer to bring my vision to life. As the specific type of app and its functionalities were skipped, the concept isn\'t set in stone. This is where you, a creative and innovative developer, can come in and provide suggestions.\r\n\r\nKey Responsibilities:\r\n- Conceptualize and develop an optimal iOS app solution\r\n- Understand requirements and contribute ideas\r\n- Test, tweak and perfect app\r\n\r\nApplicants should have:\r\n\r\n- Strong ability to write robust and reliable code\r\n- Confidence in handling all phases of an app development project\r\n- Practical experience in iOS app development\r\n\r\nPlease include a detailed project proposal in your application, showcasing your ability to analyze needs and envisage the best possible solutions. I\'m looking forward to seeing your innovative ideas and exceptional technical skills. Let\'s create something great together.', NULL, NULL, '2024-02-02 12:43:23', NULL, NULL, 1, 5, NULL, NULL, 0),
(513, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Hybrid app development', 30, '250', '4', NULL, 'I am looking for a mobile app developer who can show a web view in the app.\r\nAlso help us to show some custom notifications to the users.\r\nIt has to be a hybrid app.\r\nWe also want help to upload apps on app and play store.', NULL, NULL, '2024-02-02 13:59:05', NULL, NULL, 1, 5, NULL, NULL, 0),
(514, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Personal Asset Smart Contracts', 30, '250', '1', NULL, 'I\'m looking to develop a personal-use Smart Contract platform focused on asset management. I want to harness the power of Ethereum (Solidity) or IBM Hyperledger to create a secure and efficient system.\r\n\r\nKey Requirements:\r\n\r\n- Development of Smart Contracts for asset management applications\r\n- Utilization of Ethereum Blockchain (Solidity) and IBM Hyperledger technologies\r\n- Design a system that\'s accessible via both a user-friendly graphical interface and command-line for advanced usage scenarios\r\n\r\nIdeal Skills:\r\n\r\n- Proficient in Solidity and other smart contract programming languages\r\n- Experience with IBM Hyperledger framework\r\n- Strong understanding of blockchain technology, particularly Ethereum\r\n- Capable of developing intuitive UIs\r\n- Knowledge in creating command-line tools for software interaction\r\n\r\nExperience:\r\n\r\n- Previous projects in asset management on the blockchain\r\n- Portfolio showcasing user interface designs\r\n- References or examples of mixed interaction platforms\r\n\r\nThis project will require someone who is not only a skilled developer but also has an enthusiasm for creating easy-to-use and versatile blockchain applications personalized for individual needs.', NULL, NULL, '2024-02-02 15:37:59', NULL, NULL, 1, 4, NULL, NULL, 0),
(515, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Custom API for CHA Indian Custom Notifications List', 150, '450', '1', NULL, 'I need a skilled developer to create an API that delivers custom notifications through our Custom House Agent software. This API must pull and send regular updates seamlessly. Here’s what I’m looking for:\r\n\r\n- Custom notifications for Customs clearance updates.\r\n- API integration with our existing CHA software.\r\n- Reliable update delivery without manual intervention.\r\n- Notifications exclusively through API endpoints, not email or SMS.\r\n\r\nIDEAL CANDIDATE SKILLS:\r\n- API development and integration expertise.\r\n- Familiarity with Custom House Agent workflows.\r\n- Proficiency in secure data handling and transmission.\r\n- Strong communication skills for updating on progress.\r\n\r\nTo ensure success, effective API documentation for our software maintenance team would be highly appreciated. The end goal is to streamline our notification process, making it more efficient.', NULL, NULL, '2024-02-02 16:08:09', NULL, NULL, 1, 3, NULL, NULL, 0),
(516, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'OTA System Developer Needed', 750, '1500', '1', NULL, 'I\'m seeking a skilled developer for my online travel agency\'s needs. Here’s what’s important for me:\r\n\r\n- Development of a robust booking system for flight reservations\r\n- Seamless API integration with major airlines\r\n- Proficiency in multiple programming languages: PHP, Python, and Java\r\n\r\n**Ideal Skills:**\r\n- Strong experience in booking system development\r\n- Expertise in API integration with a focus on travel-related services\r\n- Solid background in multiple programming languages, especially PHP, Python, and Java\r\n- Previous projects involving flight booking systems would be a huge plus\r\n\r\n**Features Required:**\r\n- User-friendly interface for flight search and booking\r\n\r\n**Expectations:**\r\n- Deliver a scalable and efficient OTA system\r\n- Ensure system security and data privacy\r\n- Provide maintenance and support post-development\r\n\r\nWith your proposal, please include examples of OTA systems you’ve worked on and your approach to this project. Looking forward to a fruitful collaboration!', NULL, NULL, '2024-02-03 10:25:45', NULL, NULL, 1, 7, NULL, NULL, 0),
(517, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'National SEO Enhancement: Ranking, Links, & On-page Technical', 30, '250', '7', NULL, 'I\'m looking to significantly improve my website\'s SEO. I need experienced SEO experts who can focus on:\r\n\r\n- Keyword ranking: The existing performance of my website in search rankings is not satisfactory. I look forward to an improved visibility on national level search trends.\r\n\r\n- Backlink quality: My domain\'s Backlink profile needs an upliftment. Freelancers who can develop high-quality, relevant backlinks are preferred.\r\n\r\n- On-page optimization: My website\'s on-page SEO practices need enhancement. Your job would include optimizing the current pages, adding SEO friendly write ups to the website and implementing appropriate strategies to improve overall on-page performance.\r\n\r\nIdeal candidates should have experience in both on-site and off-site SEO strategies, specifically with improving SEO ratings. A comprehensive knowledge regarding keyword ranking, backlink improvements and on-page optimizations is a must. Also, experience in targeting national customers will be a great add-on. Your expertise would help me reach my customer base spread across the country more efficiently.', NULL, NULL, '2024-02-03 13:13:51', NULL, NULL, 1, 4, NULL, NULL, 0),
(518, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Custom Face Figurine Creation', 30, '250', '23', NULL, 'I\'m looking for a talented 3D artist to bring a unique project to life - a small-scale, detailed custom figurine of a person\'s face. Here\'s what I need:\r\n\r\n- **3D Modeling Expertise:**\r\n- Create a detailed and expressive face.\r\n- Must be printable at a small scale (up to 5 inches).\r\n\r\n- **Aesthetics & Detail:**\r\n- Capture accurate facial expressions.\r\n- Balance between recognizable features and artistic interpretation.\r\n\r\n- **Print-Ready File:**\r\n- Deliver a 3D printable file, optimized for a small print with no errors.\r\n\r\n- **Materials & Texture:**\r\n- Advice on materials for printing to ensure durability and aesthetic appeal.\r\n\r\nIdeal candidates will have experience in character modeling, an eye for detail, and knowledge of preparing models for 3D printing. If your work includes life-like characters and you are familiar with the technical aspects of 3D printing, you\'re likely a great fit for this task!', NULL, NULL, '2024-02-03 15:24:50', NULL, NULL, 1, 2, NULL, NULL, 0),
(519, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Modern Women Health Hub', 300, '800', '1', NULL, 'I am looking for a talented freelancer to create a sleek, modern website dedicated to women\'s health services. My main goals are to:\r\n\r\n- Clearly outline my consultancy\'s services\r\n- Build an accessible platform for potential clients\r\n- Amend my current WIX website to reflect my branding goals - content is all there / ready but styling needs re-working\r\n\r\nThe successful candidate will:\r\n\r\n- Have proven experience in minimalist web design\r\n- Demonstrate previous work with high end, professional looking sites\r\n- Be proficient in creating user-friendly website layouts\r\n- Have knowledge of SEO best practices for blogs\r\n- Understand the importance of mobile-responsive design\r\n\r\nSkills:\r\n\r\n- Web Design and Development\r\n- UI/UX Design\r\n- SEO and Content Strategy\r\n- Wix Expertise\r\n\r\nExperience:\r\n\r\n- Portfolio showcasing modern design work\r\n- References or testimonials from past clients\r\n- Previous projects within the health/wellness industry (preferred)\r\n\r\nif possible I\'d also like a powerpoint presentation template to match the styling of the website\r\n\r\nPlease provide a detailed proposal outlining your approach, including any preliminary ideas for the blog functionality and a possible workflow timeline. I value communication and punctuality, so also include your availability and project delivery estimates. Looking forward to collaborating on this journey to inform and empower women about their health.', NULL, NULL, '2024-02-05 15:33:27', NULL, NULL, 1, 5, NULL, NULL, 0),
(520, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Flutter Developer', 1000, '12500', '1', NULL, 'Looking for an inhouse flutter developer in hyderabad.\r\n\r\nPlease connect', NULL, NULL, '2024-02-05 15:33:56', NULL, NULL, 1, 6, NULL, NULL, 0),
(521, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Flutter & WordPress Integration Expert', 20, '50', '1', NULL, 'I\'m searching for a professional to meld my Flutter app\'s UI with the WordPress backend. This project involves syncing a visually engaging and interactive user interface with the powerful WordPress platform.\r\n\r\nKey Tasks:\r\n\r\n- Implement integration of Flutter UI with WordPress backend.\r\n- Ensure seamless data management across posts, pages, user profiles, and media uploads.\r\n\r\nEssentials:\r\n\r\n- Proven experience with Flutter and WordPress API integration.\r\n- Proficient in crafting custom animations and interactive elements in Flutter.\r\n- Capable of managing complex data and content, including user profiles and media files.\r\n\r\nIdeal Profile:\r\n\r\n- A detail-oriented developer with deep understanding of both Flutter and WordPress.\r\n- Experience building intermediate-level UIs with custom animations and interactions.\r\n- Strong problem-solving skills and ability to handle multiple forms of content.\r\n\r\nThis role demands a creative and tech-savvy developer ready to face the intricate dance of data between a state-of-the-art mobile interface and a robust content management system. Your expertise will help bring a seamless user experience to life.\r\n\r\nNote:- Low Budget only', NULL, NULL, '2024-02-05 16:27:02', NULL, NULL, 1, 4, NULL, NULL, 0),
(522, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Secure WPF CRUD App', 30, '250', '20', NULL, 'I need a professional to create a custom C# WPF application based on a provided UI sketch. My requirements are:\r\n\r\n- Implement user login/authentication.\r\n- Establish CRUD operations for managing textual and numerical data.\r\n- Use the MVVM pattern to structure the application.\r\n- Database schema will be provided for efficient integration.\r\n- prepare output report in PDF and rich text format.\r\n\r\nIdeal Skills:\r\n- Proficiency in C# and WPF.\r\n- Experience with user authentication systems.\r\n- Strong understanding of MVVM architecture.\r\n- Database management expertise.\r\n- Detail-oriented for following the provided UI design closely.', NULL, NULL, '2024-02-06 10:58:14', NULL, NULL, 1, 4, NULL, NULL, 0),
(523, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Wordpress Customization Specialist', 250, '750', '1', NULL, 'For this project, I am in need of a seasoned WordPress professional who can take the lead on some key theme customizations, focusing primarily on overhauling layouts and structures.\r\n\r\nThe central task will be:\r\n- Creating innovative and attractive new page templates.\r\n\r\nThe successful candidate should possess:\r\n- A deep working knowledge of WordPress\r\n- A demonstrated track record of creating unique and functional page templates.\r\n- Expertise in layout and structure modifications\r\n- A keen eye for detail, an intuitive grasp of user experience, and the ability to translate complex requirements into clean, user-friendly designs.\r\n\r\nThe task needs a polished, experienced individual to surgically tweak and refine my existing theme. Are you up for the challenge? Let\'s revolutionize my web presence together!', NULL, NULL, '2024-02-06 12:04:38', NULL, NULL, 1, 5, NULL, NULL, 0),
(524, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'MySQL DBA Consultant', 900, '1800', '1', NULL, 'I\'m seeking a skilled MySQL DBA expert to help enhance the performance and reliability of my systems. Here are the specifics:\r\n\r\nTasks:\r\n- Performance tuning for efficient database management\r\n- Optimization of slow queries to improve speed and efficiency\r\n- Implementing robust backup and recovery plans for data security\r\n\r\nCurrent Status:\r\n- Managing an ecosystem of more than 5 active MySQL databases\r\n\r\nChallenges:\r\n- Tackling issues with slow queries affecting operational efficiency\r\n- Resolving high CPU usage to prevent potential service disruptions\r\n- Addressing connection errors to ensure consistent database accessibility\r\n\r\nIdeal Candidate:\r\n- Proven experience in MySQL database administration\r\n- Expert in performance diagnosis and query optimization\r\n- Strong skills in devising and executing backup strategies\r\n- Familiarity with resolving common MySQL performance issues, like high CPU usage and connection errors\r\n\r\nLooking forward to working with a detail-oriented freelancer who can deliver sustainable improvements to our database infrastructure.', NULL, NULL, '2024-02-06 15:11:15', NULL, NULL, 1, 4, NULL, NULL, 0),
(525, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Loans & Insurance Comparison Marketplace', 250, '750', '1', NULL, 'I am looking to build an online platform for loans and insurance comparison. I also want a dashboard to show analytics\r\n\r\nFor loans and insurance plans, there are two options:\r\n\r\n1. Just fill in contact information for a representative to follow up\r\n\r\n2. Fill in an entire digital loan/insurance application (a form).\r\n\r\nI want it to be built with React.js and Node.js.', NULL, NULL, '2024-02-06 17:55:51', NULL, NULL, 1, 4, NULL, NULL, 0),
(526, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'SEO link building for 5 websites', 200, '250', '7', NULL, 'Need to start right away. We would like weekly reports in our format.', NULL, NULL, '2024-02-07 15:15:24', NULL, NULL, 1, 2, NULL, NULL, 0),
(527, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Convert Website into Android and IOS App', 20, '150', '20', NULL, 'Convert Website into Android and IOS App\r\n\r\nPlease reach out if you have any questions or require any additional information. I look forward to receiving your proposal!', NULL, NULL, '2024-02-07 15:17:17', NULL, NULL, 1, 6, NULL, NULL, 0),
(528, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Pickleball Website', 30, '250', '1', NULL, 'I\'m on the hunt for a talented freelancer to construct a dynamic WordPress website, which will serve as a cornerstone for pickleball enthusiasts. My vision is to curate a space that not only educates but also engages players ranging from novices to veterans.\r\n\r\n**Core Objectives:**\r\n- The primary goal is to create an informative hub. A place where the heart of pickleball beats, pulsing with rules, gear guides, how-to videos, and the latest updates.\r\n- Targeting pickleball players of all levels, the website will be the go-to venue for anyone looking to improve their game, stay informed, or connect with the community.\r\n\r\n**Key Features to Include:**\r\n- A structured overview of pickleball rules and regulations, making it simple for players to stay on top of their game.\r\n- Recommendations on equipment, including reviews and where to purchase them, tailored for various skill levels.\r\n- An interactive section featuring instructional videos covering techniques, strategies, and tips.\r\n- A live update section for the latest pickleball news, including tournament schedules and results.\r\n\r\n**Ideal Skills and Experience:**\r\n- Proven experience in designing and developing WordPress websites.\r\n- Ability to integrate dynamic content sections, such as news updates or blogs.\r\n- Experience in creating user-engaged interfaces that are both informative and easy to navigate.\r\n- Knowledge of SEO best practices to help the website rank well for relevant pickleball-related searches.\r\n- Passion or interest in sports, specifically racket sports, would be a bonus, offering insights into the community\'s needs and preferences.\r\n\r\nIn essence, I\'m looking for a skilled individual who can bring this pickleball-loving community together through a well-crafted, informative, and engaging website.', NULL, NULL, '2024-02-08 10:38:42', NULL, NULL, 1, 6, NULL, NULL, 0),
(529, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Graphic T-Shirt Design Creation', 150, '450', '23', NULL, 'I am in need of a graphic designer to create unique and quality designs for my shirts. The focus is solely on graphic designs but there\'s no specific requirement for elements or themes. Therefore, creativity and ability to create eye-catching designs are pivotal.\r\n\r\nIdeal Skills:\r\n• Graphic Design expertise\r\n• Creative thinking\r\n• Attention to detail\r\n• Experience in T-shirt design is a plus\r\n\r\nDeadline:\r\n• There\'s no set deadline for this project, ensuring the final product meets my standard is the focus. Your proposed turnaround time will, however, be considered during the selection process.', NULL, NULL, '2024-02-08 12:35:50', NULL, NULL, 1, 6, NULL, NULL, 0),
(530, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Marketing Manager', 450, '900', '5', NULL, 'I am seeking a Marketing Manager capable of handling multiple areas within the department such as content creation, marketing strategy development, social media management and advertising/campaign management. The target audience will be Millennials and Gen X, therefore the ideal candidate should have insights and experiences engaging these demographics effectively. You will be in charge of managing our presence and promotions on Facebook, Instagram, and LinkedIn.\r\n\r\nSkills and experiences ideal for this project include:\r\n\r\n- Proficiency in content creation and marketing strategy development\r\n\r\n- Deep understanding of social media platforms: Facebook, Instagram, LinkedIn\r\n\r\n- Experience in advertising and campaign management, specifically targeted towards Millennials and Gen X.', NULL, NULL, '2024-02-08 14:34:57', NULL, NULL, 1, 4, NULL, NULL, 0),
(531, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Facebook Ad Creation for E-commerce', 30, '250', '5', NULL, 'I\'m looking to launch a Facebook Ads campaign to increase the brand visibility of my e-commerce product. The main goal is to boost brand awareness amongst my target audience.\r\n\r\nThe successful freelancer for this project would ideally:\r\n\r\n- Have a deep understanding of Facebook\'s advertising platform\r\n\r\n- Have demonstratable past work in creating engaging, successful Facebook ad campaigns, particularly for e-commerce products\r\n\r\n- Stay updated on the latest Facebook ad trends and strategies\r\n\r\nTo apply, please provide notable examples of your previous work involving Facebook ad campaigns, specifically ones that increased brand awareness for e-commerce products. Proven success in these types of campaigns will make you a strong fit for the role. Your application should also detail how you can apply your past experience to my project. Creative thinking and a results-driven approach are strongly valued.', NULL, NULL, '2024-02-08 17:00:08', NULL, NULL, 1, 6, NULL, NULL, 0),
(532, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Self-Drive Car Booking App Development', 900, '1800', '20', NULL, 'I need a proficient app developer experienced in creating cross-platform applications (Android and iOS) with real-time features. The app must facilitate self-drive car bookings, displaying available cars at various locations.\r\n\r\n● Users should be able to select their desired start and end time, subsequently pay for the booking.\r\n\r\nEssential Features:\r\n\r\n● Cross-platform compatibility (Android and iOS)\r\n\r\n● Real-time map to show available car locations\r\n\r\n● User profile functionality, enabling users to track past bookings and manage personal information.\r\n\r\nAdditional Features and finer details will be discussed upon project initiation. Individuals or teams with experience in real-time map integration and secure payment gateways will have an advantage.', NULL, NULL, '2024-02-09 10:31:50', NULL, NULL, 1, 9, NULL, NULL, 0),
(533, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Engaging Info-Driven Website', 250, '750', '1', NULL, 'I\'m looking for a skilled web developer to bring my informational website to life. My primary goal is to create an engaging platform where I can share in-depth information about my services. Here\'s a brief on what I need:\r\n\r\n- **Purpose:** The website will serve as an informational hub. It’s pivotal for it to be user-friendly and visually appealing to keep visitors engaged and informed. Future expansion will eventually include e commerce.\r\n\r\n- **Special Functionalities:**\r\n\r\n- **Contact Form**: An essential feature to facilitate easy communication with visitors.\r\n\r\n- **Photo Upload Capability**: I need the flexibility to upload photos to showcase our work or services constantly.\r\n\r\n- **Social Media Integration**: Direct links to our social media accounts for seamless visitor redirection and engagement.\r\n\r\n- **Pages Required:** The website will consist of 10-20 pages. We must have a location to 20-50 off files for download. This will allow enough room to cover all necessary information without overwhelming visitors. The pages will likely include a homepage, about us, services, blog section for future updates, contact page, and a others tailored to specific needs.\r\n\r\n**Ideal Skills and Experience:**\r\n\r\n- Proficiency in web development and design, especially in creating informational websites.\r\n\r\n- Experience with integrating contact forms, photo upload capabilities, and social media links.\r\n\r\n- Ability to create a visually appealing site that’s easy to navigate.\r\n\r\n- Knowledge of SEO best practices to ensure the site is discoverable.\r\n\r\n- Excellent communication skills to ensure my vision is accurately realized.\r\n\r\nI\'m looking forward to working with someone who shares a passion for creating intuitive and engaging websites. Your expertise will help in making this project a cornerstone of our digital presence.', NULL, NULL, '2024-02-09 11:03:19', NULL, NULL, 1, 9, NULL, NULL, 0),
(534, NULL, 445, '', '', '', '', '', '0000-00-00', 'Copy Paste And Typing Data Entry Project Available', 1000, '2500', '24', NULL, 'Do online Data Entry Jobs for more than 50 International companies directly on their working server. Offer available worldwide. Work in the comfort of your home. A Genuine Typing Job from world’s best home based business provider. Work Free before you register. Earn a guaranteed $1500 p.m.  . For more details E-mail us at : ******** Us at www.data-entry-works.com Or Call us at : +91 – **********', NULL, NULL, '2024-02-17 13:18:29', NULL, NULL, 0, 0, NULL, NULL, 0),
(535, NULL, 445, '', 'vishal.data11@gmail.com', '7383074483', '', '', '0000-00-00', 'Typing Data Enry Project Offered', 1000, '2000', '24', NULL, '\r\n\r\n\r\nJOB RESPONSIBILITY: Your Job Responsibilities is that you have to submit your work on time without mistake.\r\ncompany will give u the content u have to just type according to the company guidelines.\r\nWe are offering Work From Home Jobs, Data Entry Jobs, Part time Jobs, Full Time Jobs, Fresher Jobs.\r\n\r\nRequirements: Basic Computer Knowledge and Basic Typing skills.\r\n\r\nSalary: 23000 to 90000 or more /month.\r\n\r\nFor more details or instant reply- Just send \'Hi\' through sms on this number- **********\r\n\r\nAfter sending message, with in 2 minutes you will received full details\r\n\r\nFor more details visit company website- data-entry-works.com\r\n\r\n', NULL, NULL, '2024-02-17 13:21:59', NULL, NULL, 1, 1, NULL, NULL, 0),
(536, NULL, 445, '', 'vishal.data11@gmail.com', '7383074483', '', '', '0000-00-00', 'data entry jobs available.data-entry-works.com', 1000, '2500', '16', NULL, '\r\n\r\n\r\nJOB RESPONSIBILITY: Your Job Responsibilities is that you have to submit your work on time without mistake.\r\ncompany will give u the content u have to just type according to the company guidelines.\r\nWe are offering Work From Home Jobs, Data Entry Jobs, Part time Jobs, Full Time Jobs, Fresher Jobs.\r\n\r\nRequirements: Basic Computer Knowledge and Basic Typing skills.\r\n\r\nSalary: 23000 to 90000 or more /month.\r\n\r\nFor more details or instant reply- Just send \'Hi\' through sms on this number- **********\r\n\r\nAfter sending message, with in 2 minutes you will received full details\r\n\r\nFor more details visit company website- data-entry-works.com\r\n\r\n', NULL, NULL, '2024-02-17 13:23:02', NULL, NULL, 1, 4, NULL, NULL, 0),
(537, NULL, 445, '', 'vishal.data11@gmail.com', '7383074483', '', '', '0000-00-00', 'Home based copy paste and typing data entry jobs available.www.data-entry-works.com', 1000, '2500', '24', NULL, '\r\n\r\n\r\nJOB RESPONSIBILITY: Your Job Responsibilities is that you have to submit your work on time without mistake.\r\ncompany will give u the content u have to just type according to the company guidelines.\r\nWe are offering Work From Home Jobs, Data Entry Jobs, Part time Jobs, Full Time Jobs, Fresher Jobs.\r\n\r\nRequirements: Basic Computer Knowledge and Basic Typing skills.\r\n\r\nSalary: 23000 to 90000 or more /month.\r\n\r\nFor more details or instant reply- Just send \'Hi\' through sms on this number- **********\r\n\r\nAfter sending message, with in 2 minutes you will received full details\r\n\r\nFor more details visit company website- data-entry-works.com\r\n\r\n', NULL, NULL, '2024-02-17 13:26:40', NULL, NULL, 1, 1, NULL, NULL, 0),
(538, NULL, 445, '', 'vishal.data11@gmail.com', '7383074483', '', '', '0000-00-00', '100% Genuine Online Offline Data Entry Jobs Available.www.data-entry-works.com', 1000, '2500', '24', NULL, '\r\n\r\n\r\nJOB RESPONSIBILITY: Your Job Responsibilities is that you have to submit your work on time without mistake.\r\ncompany will give u the content u have to just type according to the company guidelines.\r\nWe are offering Work From Home Jobs, Data Entry Jobs, Part time Jobs, Full Time Jobs, Fresher Jobs.\r\n\r\nRequirements: Basic Computer Knowledge and Basic Typing skills.\r\n\r\nSalary: 23000 to 90000 or more /month.\r\n\r\nFor more details or instant reply- Just send \'Hi\' through sms on this number- **********\r\n\r\nAfter sending message, with in 2 minutes you will received full details\r\n\r\nFor more details visit company website- data-entry-works.com\r\n\r\n', NULL, NULL, '2024-02-17 13:29:20', NULL, NULL, 1, 4, NULL, NULL, 0),
(539, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Urban Clap Like App Required , URGENT!!', 150, '250', '4', NULL, 'Looking for Urban Clap Like Application, should be working in both android and IOS.\r\n\r\nPlease share your budget.', NULL, NULL, '2024-02-20 13:42:54', NULL, NULL, 1, 7, NULL, NULL, 0),
(540, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Wordpress Website Required', 100, '110', '1', NULL, 'A basic wordpress website is required , budget is\r\n10K INR only.', NULL, NULL, '2024-02-23 10:40:16', NULL, NULL, 1, 8, NULL, NULL, 0),
(541, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Project Management Software ', 3000, '5000', '1', NULL, 'An Advanced Project Management Software required, currently we are managing our data in excel sheet.\r\n\r\nPlease connect asap.', NULL, NULL, '2024-02-23 10:44:48', NULL, NULL, 1, 5, NULL, NULL, 0),
(542, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Social Media Website ', 5000, '6000', '1', NULL, 'Social Media Website in Laravel', NULL, NULL, '2024-02-23 10:53:30', NULL, NULL, 1, 14, NULL, NULL, 0),
(543, NULL, 498, '', 'virtualrizwan@gmail.com', '9871608265', '', '', '0000-00-00', 'Need an app for iOS and Android', 650, '800', '20', NULL, 'I am looking for a simple application based on react-native for customer onboarding. The data need to be saved locally on the mobile device and can be exported as .xlsx and sent on given email.', NULL, NULL, '2024-02-23 19:54:22', NULL, NULL, 1, 8, NULL, NULL, 0),
(545, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Wordpress Project', 1000, '1200', '1', NULL, '15 page website required in wordpress , pls contact on this number : **********,\r\n\r\nMax budget : 100K', NULL, NULL, '2024-02-29 12:41:40', NULL, NULL, 1, 5, NULL, NULL, 0),
(546, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Windows store plugin', 600, '800', '1', NULL, 'Looking for a windows store plugin\r\n\r\n', NULL, NULL, '2024-02-29 17:28:46', NULL, NULL, 0, 0, NULL, NULL, 0),
(547, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'Small App Required', 500, '600', '2', NULL, 'Resolve IOT Android App issues, rewrite as needed and push to Google Play. Features necessary:\r\n1. Add Device (unique Device ID/QR Code on the bottom of each device). No limit to the number of devices added.\r\n2. Device should be able to be turned ON/OFF via the App by tapping the device and tapping the circle from ON to OFF and visa versa\r\n3. Device should be able to be set to a schedule by tapping the device and tapping the schedule button.', NULL, NULL, '2024-03-01 13:52:24', NULL, NULL, 0, 0, NULL, NULL, 1),
(548, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'VPN App required', 100, '150', '2', NULL, 'A VPN based App needed, code I have purchased , its in flutter, need a flutter developer who can fix it for me..', NULL, NULL, '2024-03-01 13:53:37', NULL, NULL, 0, 0, NULL, NULL, 1),
(550, NULL, 412, '', 'gnoi45@gmail.com', '9523558483', '', '', '0000-00-00', 'POP DISPATCH TRACKING', 8000, '10000', '1', NULL, 'A complete POP DISPATCH TRACKING system required, please share project timelines and estimated costs.\r\n\r\n', NULL, NULL, '2024-03-06 11:49:18', NULL, NULL, 1, 4, NULL, NULL, 0),
(551, NULL, 534, '', '', '', '', '', '0000-00-00', 'Nike shoe design', 200, '300', '23', NULL, 'I have made this creative Nike air jordan post by help of photoshop . I have used creative texture to enhance the design . By using all of my creativity i have designed this design', NULL, NULL, '2024-03-07 15:15:38', NULL, NULL, 1, 2, NULL, NULL, 0),
(552, NULL, 539, '', '', '', '', '', '0000-00-00', 'ecommerce', 500, '1000', '7', NULL, '', NULL, NULL, '2024-03-11 14:24:12', NULL, NULL, 1, 3, NULL, NULL, 0),
(553, NULL, 531, '', 'vny.009@gmail.com', '+918375910558', '', '', '0000-00-00', 'Make a website', 0, 'NaN', '1', NULL, '', NULL, NULL, '2024-03-11 17:26:13', NULL, NULL, 1, 1, NULL, NULL, 0),
(554, NULL, 548, '', '', '', '', '', '0000-00-00', 'SEO (ON page, OFF page)', 1000, '2000', '5', NULL, 'Need a digital marketer expert, with more than 5 years of experience. ', NULL, NULL, '2024-03-12 15:44:59', NULL, NULL, 1, 3, NULL, NULL, 0),
(555, NULL, 556, '', '', '', '', '', '0000-00-00', 'PHP/Laravel Website Development', 1200, '1500', '2', NULL, 'We are an India-based IT service company, having 60+ technology experts under a roof with 10+ years of track records. We will give you our 100% and create the best website according to your requirements.\r\n\r\nWe are experts in UI/UX/PHP/ Laravel, WordPress, Shopify, HTML, CSS, iOS/Android/Flutter JavaScript, etc.\r\n\r\nPlease review these links:-\r\nLinkedin:-https://in.linkedin.com/company/votive-technologies\r\nWebsite:- https://www.votivetech.com/\r\nPortfolio:-https://www.portfolio.votivetech.com/\r\nUpwork:- https://www.upwork.com/agencies/votivetechnologies\r\nFreelancer: https://www.freelancer.in/u/michale21\r\n\r\nIf our proposal aligns with your vision, Message us today to discuss your project, and let\'s build something incredible together!\r\nContact: +919993776088\r\n\r\nBest regards,\r\nNisha\r\n********', NULL, NULL, '2024-03-13 17:54:58', NULL, NULL, 1, 2, NULL, NULL, 0),
(558, NULL, 548, '', 'pqlfkgp688@iemail.one', '+919378652410', '', '', '0000-00-00', 'Need a google ads expert. ', 500, '900', '5', NULL, 'Need a google ads expert with 4 to 5 years of experience. ', NULL, NULL, '2024-03-15 16:41:13', NULL, NULL, 1, 6, NULL, NULL, 0),
(559, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Algo Trading on Mt4', 500, '600', '2', NULL, 'Need to develop a small script for doing algo trading on Mt4 softwares.\r\n\r\n', NULL, NULL, '2024-03-18 12:44:31', NULL, NULL, 0, 0, NULL, NULL, 0),
(560, NULL, 548, '', 'pqlfkgp688@iemail.one', '+918375910556', '', '', '0000-00-00', 'Create a food delivery mobile app for my city', 500, '800', '4', NULL, 'Hello, I want an app to be created for food delivery startup. There will be customer, delivery boy, vendor login panel. App will be on Android and iOS both. \r\n', NULL, NULL, '2024-03-26 12:51:47', NULL, NULL, 1, 2, NULL, NULL, 0),
(562, NULL, 589, '', '', '', '', '', '0000-00-00', 'Money exchange app', 150, '300', '2', NULL, 'We want to establish a smart contract between our platform and coinbase.\r\nWe have already done it with binance and we wanted same with coinbase \r\n', NULL, NULL, '2024-03-27 18:26:31', NULL, NULL, 0, 0, NULL, NULL, 0),
(563, NULL, 600, '', '', '', '', '', '0000-00-00', 'Photographer/editor ', 2000, '3000', '50', NULL, '', NULL, NULL, '2024-03-29 17:11:06', NULL, NULL, 1, 5, NULL, NULL, 0),
(564, NULL, 600, '', 'Suraag2004@gmail.com', '+916360104664', '', '', '0000-00-00', 'Luminous lenswork', 500, '2000', '50', NULL, '\"Unleash the Power of Visuals with luminous lenswork studio\"\r\n\r\nTransforming ideas into unforgettable moments, our freelance photography and editing team is ready to bring your vision to life. Specializing in all genres, from intimate portraits to dynamic commercial campaigns, we deliver stunning imagery with precision and passion.\r\n\r\nWith a commitment to excellence and a collaborative spirit, we ensure every project receives the attention it deserves. From concept to final delivery, we\'re dedicated to exceeding expectations and capturing the essence of every moment.\r\n\r\nElevate your storytelling with luminous lenswork. Contact us today to discuss your next project and let\'s create something extraordinary together.\"', NULL, NULL, '2024-03-29 17:20:15', NULL, NULL, 1, 2, NULL, NULL, 0),
(565, NULL, 606, '', '', '', '', '', '0000-00-00', 'Candid photography ', 6000, '60000', '50', NULL, '', NULL, NULL, '2024-03-29 22:28:36', NULL, NULL, 1, 5, NULL, NULL, 0),
(566, NULL, 609, '', '', '', '', '', '0000-00-00', 'Translate and retyping ', 4, '8', '24', NULL, 'I am proportional freelancer digital marketing. I am active freelancer.', NULL, NULL, '2024-03-30 03:41:24', NULL, NULL, 0, 0, NULL, NULL, 0),
(567, NULL, 548, '', 'pqlfkgp688@iemail.one', '+918595959595', '', '', '0000-00-00', 'simple website', 100, '150', '14', NULL, 'Few Simple Web Pages are required.\r\n\r\nBudget should be affordable.', NULL, NULL, '2024-04-03 15:50:57', NULL, NULL, 1, 6, NULL, NULL, 0),
(568, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Shopify Developer Required', 750, '1000', '1', NULL, 'Hi,\r\n\r\nWe are looking for a shopify developer, who can develop our website from scratch, its an e-commerce skin care software.\r\n', NULL, NULL, '2024-04-04 11:15:28', NULL, NULL, 1, 8, NULL, NULL, 0),
(569, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Mobile App', 1500, '2000', '2', NULL, 'I need a mobile app for my Dry fruit business.\r\n\r\n', NULL, NULL, '2024-04-04 17:42:55', NULL, NULL, 1, 1, NULL, NULL, 0),
(570, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Service App Required', 1200, '1300', '2', NULL, 'Looking for a mobile app like urban company', NULL, NULL, '2024-04-04 17:46:04', NULL, NULL, 1, 1, NULL, NULL, 0),
(571, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Dream11 App', 5000, '6000', '2', NULL, 'Need an app like Dream 11,\r\n\r\nFor start only need it in cricket category', NULL, NULL, '2024-04-04 17:47:21', NULL, NULL, 1, 1, NULL, NULL, 0),
(573, NULL, 639, '', '', '', '', '', '0000-00-00', 'Travel agent', 0, 'NaN', '40', NULL, 'Im a travel agent in Peru offering all adventure vacations, hiking, mountain biking, Machupicchu ', NULL, NULL, '2024-04-04 21:24:21', NULL, NULL, 0, 0, NULL, NULL, 0),
(579, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'GPS APP Required', 2000, '3000', '2', NULL, 'Looking for a GPS vechile tracking app , only for android.', NULL, NULL, '2024-04-05 10:45:24', NULL, NULL, 1, 3, NULL, NULL, 1),
(586, NULL, 412, '', 'gnoi45@gmail.com', '+919523558483', '', '', '0000-00-00', 'Dating App', 1000, '1500', '2', NULL, 'One Dating App needed, we have the design already, only need an app developer who can develop it.\r\n\r\n', NULL, NULL, '2024-04-08 22:53:59', NULL, NULL, 1, 3, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_staffs`
--

CREATE TABLE `lead_staffs` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_staffs`
--

INSERT INTO `lead_staffs` (`id`, `lead_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 107, 2, '2023-04-12 01:24:57', '2023-04-12 01:24:57'),
(4, 108, 5, '2023-04-12 01:38:31', '2023-04-12 01:38:31'),
(5, 109, 1, '2023-04-12 01:38:36', '2023-04-12 01:38:36'),
(6, 110, 5, '2023-04-12 01:40:24', '2023-04-12 01:40:24'),
(7, 112, 5, '2023-04-14 01:44:53', '2023-04-14 01:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `status` text,
  `date` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `lead_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(22, 107, 'Assigned', '2023-04-12', '2023-04-12 01:24:57', '2023-04-12 01:24:57'),
(23, 108, 'Assigned', '2023-04-12', '2023-04-12 01:38:31', '2023-04-12 01:38:31'),
(24, 109, 'Assigned', '2023-04-12', '2023-04-12 01:38:36', '2023-04-12 01:38:36'),
(25, 110, 'Assigned', '2023-04-12', '2023-04-12 01:40:24', '2023-04-12 01:40:24'),
(26, 112, 'Assigned', '2023-04-14', '2023-04-14 01:44:53', '2023-04-14 01:44:53'),
(27, 107, 'called but noty povkedf', '2023-04-15', '2023-04-14 01:46:18', '2023-04-14 01:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL COMMENT 'without spaces',
  `meta_title` text,
  `meta_description` text,
  `meta_keywords` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_25_114913_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `milestone_id` varchar(50) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `milestone_name` varchar(255) DEFAULT NULL,
  `milestone_deadline` varchar(255) DEFAULT NULL,
  `milestone_amount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 when created and 1 when accepted',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not done, 1-done',
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `user_id`, `milestone_id`, `project_id`, `milestone_name`, `milestone_deadline`, `milestone_amount`, `status`, `is_completed`, `payment_status`, `remark`, `created_at`, `updated_at`) VALUES
(51, 418, 'milestone_w0Okq_20240401_073851', 558, 'Phase-1', '2024-04-01', 250, 1, 1, 1, '', '2024-04-01 12:38:51', NULL),
(52, 418, 'milestone_w0Okq_20240401_073851', 558, 'Phase-2', '2024-04-03', 200, 1, 0, 0, '', '2024-04-01 12:38:51', NULL),
(53, 418, 'milestone_w0Okq_20240401_073851', 558, 'Phase-3', '2024-06-25', 300, 1, 0, 0, '', '2024-04-01 12:38:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `my_leads`
--

CREATE TABLE `my_leads` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` text,
  `amount` int(11) NOT NULL DEFAULT '0',
  `order_id` varchar(255) DEFAULT NULL,
  `is_seen` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_leads`
--

INSERT INTO `my_leads` (`id`, `professional_id`, `lead_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `description`, `amount`, `order_id`, `is_seen`) VALUES
(24, 0, 0, 0, '2023-10-21 13:33:34', NULL, NULL, NULL, 0, NULL, 0),
(25, 254, 317, 0, '2023-10-21 13:33:56', NULL, NULL, 'test test', 1000, NULL, 0),
(26, 254, 318, 1, '2023-10-22 05:43:03', NULL, NULL, 'I can do this work', 90, NULL, 0),
(27, 260, 319, 1, '2023-10-22 05:54:40', NULL, NULL, 'can do in 1 week', 100, NULL, 0),
(28, 254, 320, 0, '2023-10-22 07:09:31', NULL, NULL, 'can do in one month', 100, NULL, 0),
(29, 254, 321, 0, '2023-10-22 11:28:02', NULL, NULL, 'asfasdffasdfasdfasdf', 100, NULL, 0),
(30, 265, 324, 1, '2023-11-02 15:30:47', NULL, NULL, 'I can do this in 500 dollars only', 500, NULL, 0),
(31, 263, 325, 0, '2023-11-04 06:17:21', NULL, NULL, 'Quality work will be delivered.', 70, NULL, 0),
(32, 263, 322, 0, '2023-11-04 06:23:01', NULL, NULL, 'na', 30, NULL, 0),
(33, 263, 327, 1, '2023-11-04 06:36:58', NULL, NULL, 'sa', 40000, NULL, 0),
(34, 263, 371, 1, '2023-11-04 06:36:58', NULL, NULL, 'sa', 40000, NULL, 0),
(35, 2, 374, 0, '2023-11-23 07:36:56', NULL, NULL, 'I am an App Developer with 5 Years of experience in App Development. I am an App Developer with 5 Years of experience in App Development. I am an App Developer with 5 Years of experience in App Development. I am an App Developer with 5 Years of experience in App Development. I am an App Developer with 5 Years of experience in App Development. I am an App Developer with 5 Years of experience in App Development. ', 800, NULL, 0),
(36, 2, 374, 0, '2023-11-23 08:17:23', NULL, NULL, 'I am a well experienced developer. I am a well experienced developer. I am a well experienced developer. I am a well experienced developer. ', 200, NULL, 0),
(37, 2, 375, 1, '2023-11-23 12:48:57', NULL, NULL, 'I wan to', 200, NULL, 0),
(38, 276, 375, 0, '2023-11-24 03:21:10', NULL, NULL, 'I am best developer in this field.I am best developer in this field.I am best developer in this field.I am best developer in this field.', 100, NULL, 0),
(39, 2, 376, 1, '2023-11-24 06:32:32', NULL, NULL, 'I think I am best suited for this work. You can view my portfolios in my profile link. I think I am best suited for this work. You can view my portfolios in my profile link. I think I am best suited for this work. You can view my portfolios in my profile link. ', 399, NULL, 0),
(40, 2, 377, 0, '2023-11-24 07:22:16', NULL, NULL, 'See my profile if I can do the best for you. See my profile if I can do the best for you. See my profile if I can do the best for you. See my profile if I can do the best for you. ', 599, NULL, 0),
(41, 340, 380, 1, '2023-11-24 08:50:26', NULL, NULL, 'I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best I am best ', 490, NULL, 0),
(42, 347, 390, 1, '2023-11-24 13:03:04', NULL, NULL, 'I am best developr in this category. try me', 4000, NULL, 0),
(43, 260, 396, 1, '2023-11-28 16:49:43', NULL, NULL, 'I can do this app, I have 2 plus years of experience in taking works like this', 800, NULL, 0),
(44, 2, 396, 0, '2023-12-02 11:44:13', NULL, NULL, 'I am bidding', 500, NULL, 0),
(45, 260, 411, 1, '2023-12-02 11:44:13', NULL, NULL, 'I am bidding', 500, NULL, 0),
(46, 260, 417, 0, '2023-12-04 16:33:48', NULL, NULL, 'I can complete this app in 7 days, I have a team of high expert tech people', 1000, NULL, 0),
(47, 353, 396, 0, '2023-12-06 12:38:10', NULL, NULL, 'new wrok', 500, NULL, 0),
(48, 353, 423, 1, '2023-12-06 12:50:24', NULL, NULL, 'I will do it', 300, NULL, 0),
(49, 355, 379, 0, '2023-12-08 12:50:15', NULL, NULL, 'deasdfasdfasdfasdf', 500, NULL, 0),
(50, 356, 424, 0, '2023-12-09 07:58:47', NULL, NULL, 'I have 3 years of experience in building real estate websites of all kinds.', 600, NULL, 0),
(51, 387, 424, 0, '2023-12-13 11:57:24', NULL, NULL, 'good experience in building these type of apps', 300, NULL, 0),
(52, 356, 425, 1, '2023-12-16 05:47:29', NULL, NULL, 'I have 4 years of experience in SEO. I can give you results within 3 months.', 599, '#ORD931252023121963045649', 0),
(53, 356, 426, 1, '2023-12-18 10:41:03', NULL, NULL, 'sfasdfasdf', 1222, '#ORD931252023121942645649', 0),
(54, 356, 427, 1, '2023-12-19 06:14:09', NULL, NULL, 'perfect for this work', 299, NULL, 0),
(55, 356, 428, 1, '2023-12-20 06:54:25', NULL, NULL, 'have experience in content writer ', 399, '.ORD56202312206355124130.', 0),
(56, 356, 429, 1, '2023-12-20 11:06:09', NULL, NULL, 'bidding at 600 dollars', 600, '.ORD13202312207656044342.', 0),
(57, 356, 429, 0, '2023-12-20 11:06:09', NULL, NULL, 'bidding at 600 dollars', 600, NULL, 0),
(58, 356, 430, 1, '2023-12-20 11:20:27', NULL, NULL, 'bidding first time', 299, '.ORD23202312208258045726.', 0),
(59, 356, 431, 1, '2023-12-20 11:33:55', NULL, NULL, 'bidding for 199', 199, '.ORD78202312207059050408.', 0),
(60, 356, 432, 1, '2023-12-20 11:47:08', NULL, NULL, 'I can do it in this amount, please check my portfolio , I have done, previous projects like this ', 10000, '.ORD18202312208260051759.', 0),
(61, 356, 433, 1, '2023-12-21 05:23:43', NULL, NULL, 'I can do this in 1100 usd', 1100, '.ORD90202312219461105632.', 0),
(62, 356, 434, 0, '2023-12-22 08:30:00', NULL, NULL, 'can work under your budget', 700, NULL, 0),
(63, 356, 435, 0, '2023-12-22 10:00:46', NULL, NULL, 'Bidding on this project for he first time', 500, NULL, 0),
(64, 356, 436, 0, '2023-12-22 10:02:46', NULL, NULL, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 200, NULL, 0),
(65, 356, 437, 0, '2023-12-22 10:08:56', NULL, NULL, 'app development project bid ', 100, NULL, 0),
(66, 356, 438, 0, '2023-12-22 10:20:47', NULL, NULL, 'I am beginner but have good skills', 200, NULL, 0),
(67, 355, 439, 1, '2023-12-22 17:07:37', NULL, NULL, 'first Bid', 500, '.ORD32202312229067104133.', 0),
(68, 356, 440, 1, '2023-12-23 11:03:03', NULL, NULL, 'can do your work in less amount and less time', 500, '.ORD11202312236968050551.', 0),
(69, 356, 441, 1, '2023-12-23 11:37:11', NULL, NULL, 'need a graphic designer. ', 200, '.ORD79202312238769050724.', 0),
(70, 356, 442, 1, '2023-12-26 13:56:44', NULL, NULL, 'vthbrtnbsb', 200, '.ORD51202312267270073225.', 0),
(71, 356, 443, 1, '2023-12-26 14:01:15', NULL, NULL, 'mhmdt', 100, '.ORD24202312269371110033.', 0),
(72, 356, 444, 1, '2023-12-26 17:19:58', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 100, '.ORD97202312265572110641.', 0),
(73, 356, 445, 1, '2023-12-26 17:26:07', NULL, NULL, 'vnrwjuilghre', 100, '.ORD56202312265973113533.', 0),
(75, 391, 447, 1, '2023-12-27 10:59:16', NULL, NULL, '234234', 22, '.ORD12202312306875124908.', 0),
(76, 356, 449, 1, '2023-12-27 16:31:25', NULL, NULL, 'I can do for 1200 USD', 1200, '.ORD56202312275676100541.', 0),
(77, 391, 448, 1, '2023-12-30 07:34:11', NULL, NULL, 'qwerty', 50, '.ORD12202312309577013440.', 0),
(78, 399, 450, 1, '2023-12-30 10:22:43', NULL, NULL, 'I can do it in 4900 USD only, please consider me, I need this work..\r\n\r\nThanks', 4900, '.ORD87202312306278044110.', 0),
(79, 391, 425, 0, '2024-01-04 08:13:04', NULL, NULL, 'vbyhrgkvburilgbreg', 1000, NULL, 0),
(80, 391, 452, 0, '2024-01-05 06:07:22', NULL, NULL, 'qwertyuinj fhew fhreb ghardg', 1200, NULL, 0),
(81, 391, 453, 0, '2024-01-05 08:22:44', NULL, NULL, 'vdfbftdbtardb', 1005, NULL, 0),
(82, 391, 463, 0, '2024-01-06 07:48:13', NULL, NULL, 'testing testing', 100000, NULL, 0),
(83, 397, 463, 1, '2024-01-06 08:02:02', NULL, NULL, 'im making another bid', 60000, '.ORD57202401066583020542.', 0),
(84, 397, 462, 0, '2024-01-06 08:22:11', NULL, NULL, 'placing a bid', 60000, NULL, 0),
(85, 397, 462, 0, '2024-01-06 08:22:15', NULL, NULL, 'placing a bid', 60000, NULL, 0),
(86, 413, 463, 0, '2024-01-07 07:24:10', NULL, NULL, 'can do now, please consider me', 600, NULL, 0),
(87, 413, 463, 0, '2024-01-07 07:24:13', NULL, NULL, 'can do now, please consider me', 600, NULL, 0),
(88, 413, 464, 1, '2024-01-07 07:27:08', NULL, NULL, 'asdfasdf', 1400, '.ORD36202401078888014439.', 0),
(89, 413, 464, 0, '2024-01-07 07:27:10', NULL, NULL, 'asdfasdf', 1400, NULL, 0),
(90, 391, 464, 0, '2024-01-08 05:53:42', NULL, NULL, 'bidding on this project with 1000', 1000, NULL, 0),
(91, 423, 452, 0, '2024-01-12 07:11:19', NULL, NULL, 'We are a Digital Marketing Agency India based. We have Provide all kinds of Digital Marketing Services. Social Media Marketing Service.\r\nwww.digiglobalservices.com', 1400, NULL, 0),
(92, 423, 430, 0, '2024-01-12 07:14:45', NULL, NULL, 'We are a Digital Marketing Agency India based. We have Provide all kinds of Digital Marketing Services. Social Media Marketing Service.\r\nwww.digiglobalservices.com', 400, NULL, 0),
(93, 423, 425, 0, '2024-01-12 07:16:40', NULL, NULL, 'We are a Digital Marketing Agency India based. We have Provide all kinds of Digital Marketing Services. Social Media Marketing Service.\r\nwww.digiglobalservices.com', 300, NULL, 0),
(94, 423, 375, 0, '2024-01-12 07:17:36', NULL, NULL, 'We are a Digital Marketing Agency India based. We have Provide all kinds of Digital Marketing Services. Social Media Marketing Service.\r\nwww.digiglobalservices.com', 100, NULL, 0),
(95, 423, 474, 0, '2024-01-12 09:18:36', NULL, NULL, 'We are an award-winning top digital marketing agency offering a specialized spectrum of digital services across multiple industries. We believe that building a brand is not just about selling a lucrative product, but much more about the association it makes with the general audience. And we think there is no place more vital than the digital world to achieve this purpose.\r\nhttps://www.digiglobalservices.com/', 70, NULL, 0),
(96, 413, 477, 0, '2024-01-14 07:29:03', NULL, NULL, 'I can do in 500 USD', 500, NULL, 0),
(97, 357, 488, 0, '2024-01-17 09:56:50', NULL, NULL, 'xjiux', 900000, NULL, 0),
(98, 437, 464, 0, '2024-01-17 10:25:13', NULL, NULL, 'Hi\r\nI have read all your description.\r\nI am professional Mobile developer and ready to start work now.\r\nI am sure high quality, good communication.\r\nPlease contact me and Let\'s go ahead !\r\nThanks.', 1200, NULL, 0),
(99, 418, 491, 0, '2024-01-19 09:39:01', NULL, NULL, 'yes i can do it in 1 month.', 1800, NULL, 0),
(100, 418, 490, 0, '2024-01-19 09:42:07', NULL, NULL, 'yes i can do it.', 800, NULL, 0),
(101, 418, 489, 0, '2024-01-19 09:43:09', NULL, NULL, 'Yes i can do it.', 3800, NULL, 0),
(102, 418, 488, 0, '2024-01-19 09:45:44', NULL, NULL, 'Yes i can do it.', 450, NULL, 0),
(103, 418, 486, 0, '2024-01-19 09:47:22', NULL, NULL, 'Yes i can do it. ', 190, NULL, 0),
(104, 418, 483, 0, '2024-01-19 09:59:31', NULL, NULL, 'Yes i can do it.', 500, NULL, 0),
(105, 366, 494, 0, '2024-01-20 10:50:40', NULL, NULL, 'As an experienced social media manager, I am positive that I can provide the level of service you\'re seeking. Managing Instagram accounts and curating content is not just a job for me; it\'s a passion. I understand the importance of flexibility and commitment when it comes to timing and engagement on social media, and I assure you that I\'ll give your account the diligence and regularity it needs.\r\n\r\nFurthermore, my keen eye for aesthetics ensures that your Instagram feed will remain visually modern, consistent, and appealing to your audience throughout. This implies a deep analysis of what captures their attention which I\'ve garnered from my years of experience managing various accounts across diverse platforms.\r\n\r\nFinally, choosing me guarantees real growth for your brand. My approach is organic as I focus on attracting real people from your targeted demographic who\'ll genuinely engage with your content and contribute to the growth of your business . Resulting in increased followers, higher levels of engagement, more website traffic and overall increased brand recognition and awareness. So, ready to take your Instagram presence to the next level? Let\'s get acquainted!', 550, NULL, 0),
(106, 366, 493, 0, '2024-01-20 10:52:35', NULL, NULL, 'I\'ve successfully managed social media campaigns, leading to enhanced online presence and audience interaction. I’d love to share examples from my portfolio and explore how we can create a dynamic campaign for your children\'s book.\r\n\r\nHave a wonderful day!', 1500, NULL, 0),
(107, 366, 492, 0, '2024-01-20 11:53:14', NULL, NULL, 'As an experienced social media manager, I am positive that I can provide the level of service you\'re seeking. ', 800, NULL, 0),
(108, 366, 491, 0, '2024-01-20 11:53:43', NULL, NULL, 'As an experienced social media manager, I am positive that I can provide the level of service you\'re seeking. ', 1700, NULL, 0),
(109, 366, 490, 0, '2024-01-20 11:54:19', NULL, NULL, 'As an experienced social media manager, I am positive that I can provide the level of service you\'re seeking. ', 700, NULL, 0),
(110, 367, 489, 0, '2024-01-20 12:04:22', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 3600, NULL, 0),
(111, 367, 488, 0, '2024-01-20 12:05:02', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 550, NULL, 0),
(112, 367, 487, 0, '2024-01-20 12:06:01', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 650, NULL, 0),
(113, 367, 486, 0, '2024-01-20 12:06:54', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 250, NULL, 0),
(114, 367, 485, 0, '2024-01-20 12:08:30', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 130, NULL, 0),
(115, 369, 484, 0, '2024-01-20 12:13:11', NULL, NULL, 'Hi! I am an experienced developer & can done your work as per your need.', 720, NULL, 0),
(116, 369, 483, 0, '2024-01-20 12:13:54', NULL, NULL, 'Hi! I am an experienced developer & can done your work as per your need.', 700, NULL, 0),
(117, 369, 482, 0, '2024-01-20 12:17:02', NULL, NULL, 'Hi! I am an experienced content writer & can done your work as per your need.', 2700, NULL, 0),
(118, 369, 481, 0, '2024-01-20 12:17:38', NULL, NULL, 'Hi! I am an experienced digital marketer & can done your work as per your need.', 120, NULL, 0),
(119, 369, 480, 0, '2024-01-20 12:18:36', NULL, NULL, 'Hi! I am an experienced digital marketer & can done your work as per your need.', 400, NULL, 0),
(120, 370, 479, 0, '2024-01-20 12:20:59', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 220, NULL, 0),
(121, 370, 478, 0, '2024-01-20 12:21:25', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 200, NULL, 0),
(122, 370, 477, 0, '2024-01-20 12:21:52', NULL, NULL, 'As an experienced developer, I am positive that I can provide the level of service you\'re seeking.', 700, NULL, 0),
(123, 370, 476, 0, '2024-01-20 12:22:34', NULL, NULL, 'As an experienced digital marketer, I am positive that I can provide the level of service you\'re seeking.', 450, NULL, 0),
(124, 415, 494, 0, '2024-01-20 12:22:56', NULL, NULL, 'I can do this job best :-)', 50, NULL, 0),
(125, 370, 475, 0, '2024-01-20 12:23:04', NULL, NULL, 'As an experienced digital marketer, I am positive that I can provide the level of service you\'re seeking.', 130, NULL, 0),
(126, 371, 474, 0, '2024-01-20 12:25:29', NULL, NULL, 'As an experienced developer & digital marketer, I can complete your project as per your need.', 140, NULL, 0),
(127, 371, 473, 0, '2024-01-20 12:26:03', NULL, NULL, 'As an experienced developer, I can complete your project as per your need.', 550, NULL, 0),
(128, 371, 472, 0, '2024-01-20 12:26:35', NULL, NULL, 'As an experienced programmer, I can complete your project as per your need.', 25, NULL, 0),
(129, 371, 471, 0, '2024-01-20 12:27:10', NULL, NULL, 'As an experienced developer, I can complete your project as per your need.', 725, NULL, 0),
(130, 371, 470, 0, '2024-01-20 12:27:40', NULL, NULL, 'As an experienced developer, I can complete your project as per your need.', 425, NULL, 0),
(131, 372, 315, 0, '2024-01-22 10:02:54', NULL, NULL, 'I can get your job done as per your need.', 4000, NULL, 0),
(132, 372, 376, 0, '2024-01-22 10:04:50', NULL, NULL, 'I can get your job done as per your need.', 350, NULL, 0),
(133, 372, 377, 0, '2024-01-22 10:05:49', NULL, NULL, 'I can get your job done as per your need.', 700, NULL, 0),
(134, 372, 378, 0, '2024-01-22 10:06:31', NULL, NULL, 'I can get your job done as per your need.', 8000, NULL, 0),
(135, 372, 379, 0, '2024-01-22 10:07:18', NULL, NULL, 'I can get your job done as per your need.', 900, NULL, 0),
(136, 372, 424, 0, '2024-01-22 10:08:03', NULL, NULL, 'I can get your job done as per your need.', 400, NULL, 0),
(137, 372, 427, 0, '2024-01-22 10:09:00', NULL, NULL, 'I can get your job done as per your need.', 400, NULL, 0),
(138, 372, 428, 0, '2024-01-22 10:09:36', NULL, NULL, 'I can get your job done as per your need.', 700, NULL, 0),
(139, 372, 430, 0, '2024-01-22 10:10:49', NULL, NULL, 'I can get your job done as per your need.', 350, NULL, 0),
(140, 372, 432, 0, '2024-01-22 10:11:53', NULL, NULL, 'I can get your job done as per your need.', 9500, NULL, 0),
(141, 372, 433, 0, '2024-01-22 10:12:32', NULL, NULL, 'I can get your job done as per your need.', 1400, NULL, 0),
(142, 372, 439, 0, '2024-01-22 10:13:08', NULL, NULL, 'I can get your job done as per your need.', 1000, NULL, 0),
(143, 372, 450, 0, '2024-01-22 10:14:03', NULL, NULL, 'I can get your job done as per your need.', 4800, NULL, 0),
(144, 372, 452, 0, '2024-01-22 10:14:41', NULL, NULL, 'I can get your job done as per your need.', 1150, NULL, 0),
(145, 372, 454, 0, '2024-01-22 10:15:22', NULL, NULL, 'I can get your job done as per your need.', 380, NULL, 0),
(146, 372, 458, 0, '2024-01-22 10:16:00', NULL, NULL, 'I can get your job done as per your need.', 2800, NULL, 0),
(147, 372, 465, 0, '2024-01-22 10:19:38', NULL, NULL, 'I can get your job done as per your need.', 490, NULL, 0),
(148, 372, 466, 0, '2024-01-22 10:22:53', NULL, NULL, 'I can get your job done as per your need.', 190, NULL, 0),
(149, 372, 470, 0, '2024-01-22 10:23:45', NULL, NULL, 'I can get your job done.', 400, NULL, 0),
(150, 372, 471, 0, '2024-01-22 10:24:21', NULL, NULL, 'I can get your job done.', 700, NULL, 0),
(151, 372, 472, 0, '2024-01-22 10:24:58', NULL, NULL, 'I can get your job done.', 20, NULL, 0),
(152, 372, 473, 0, '2024-01-22 10:25:31', NULL, NULL, 'I can get your job done.', 500, NULL, 0),
(153, 372, 474, 0, '2024-01-22 10:30:13', NULL, NULL, 'I can get your job done.', 65, NULL, 0),
(154, 372, 475, 0, '2024-01-22 10:34:46', NULL, NULL, 'I can get your job done.', 125, NULL, 0),
(155, 372, 476, 0, '2024-01-22 10:36:58', NULL, NULL, 'I can get your job done.', 425, NULL, 0),
(156, 372, 477, 0, '2024-01-22 10:37:31', NULL, NULL, 'I can get your job done.', 480, NULL, 0),
(157, 372, 478, 0, '2024-01-22 10:38:16', NULL, NULL, 'I can get your job done.', 180, NULL, 0),
(158, 372, 479, 0, '2024-01-22 10:39:21', NULL, NULL, 'I can get your job done.', 200, NULL, 0),
(159, 372, 480, 0, '2024-01-22 10:39:54', NULL, NULL, 'I can get your job done.', 380, NULL, 0),
(160, 372, 481, 0, '2024-01-22 10:40:21', NULL, NULL, 'I can get your job done.', 100, NULL, 0),
(161, 372, 482, 0, '2024-01-22 10:40:52', NULL, NULL, 'I can get your job done.', 2500, NULL, 0),
(162, 372, 483, 0, '2024-01-22 10:41:28', NULL, NULL, 'I can get your job done.', 475, NULL, 0),
(163, 372, 484, 0, '2024-01-22 10:42:02', NULL, NULL, 'I can get your job done.', 700, NULL, 0),
(164, 372, 485, 0, '2024-01-22 10:42:36', NULL, NULL, 'I can get your job done.', 110, NULL, 0),
(165, 372, 486, 0, '2024-01-22 10:43:12', NULL, NULL, 'I can get your job done.', 180, NULL, 0),
(166, 372, 487, 0, '2024-01-22 10:43:43', NULL, NULL, 'I can get your job done.', 600, NULL, 0),
(167, 372, 489, 0, '2024-01-22 10:44:52', NULL, NULL, 'I can get your job done.', 3500, NULL, 0),
(168, 372, 490, 0, '2024-01-22 10:45:21', NULL, NULL, 'I can get your job done.', 680, NULL, 0),
(169, 372, 491, 0, '2024-01-22 10:45:59', NULL, NULL, 'I can get your job done.', 1650, NULL, 0),
(170, 372, 492, 0, '2024-01-22 10:46:25', NULL, NULL, 'I can get your job done.', 775, NULL, 0),
(171, 372, 493, 0, '2024-01-22 10:46:53', NULL, NULL, 'I can get your job done.', 1400, NULL, 0),
(172, 372, 494, 0, '2024-01-22 10:47:44', NULL, NULL, 'I can get your job done.', 450, NULL, 0),
(173, 372, 495, 0, '2024-01-23 04:19:52', NULL, NULL, 'I can get your job done.', 150, NULL, 0),
(174, 372, 496, 0, '2024-01-23 04:20:21', NULL, NULL, 'I can get your job done.', 230, NULL, 0),
(175, 372, 497, 0, '2024-01-23 04:20:45', NULL, NULL, 'I can get your job done.', 230, NULL, 0),
(176, 372, 498, 0, '2024-01-23 04:21:14', NULL, NULL, 'I can get your job done.', 2800, NULL, 0),
(177, 373, 478, 0, '2024-01-23 04:46:12', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 160, NULL, 0),
(178, 373, 479, 0, '2024-01-23 04:46:47', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 200, NULL, 0),
(179, 373, 480, 0, '2024-01-23 04:47:49', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 350, NULL, 0),
(180, 373, 481, 0, '2024-01-23 04:48:23', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 100, NULL, 0),
(181, 373, 482, 0, '2024-01-23 04:48:57', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 2200, NULL, 0),
(182, 373, 483, 0, '2024-01-23 04:49:31', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 600, NULL, 0),
(183, 373, 484, 0, '2024-01-23 04:49:59', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 700, NULL, 0),
(184, 373, 485, 0, '2024-01-23 04:50:25', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 100, NULL, 0),
(185, 373, 486, 0, '2024-01-23 04:50:54', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 150, NULL, 0),
(186, 373, 487, 0, '2024-01-23 04:51:34', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 700, NULL, 0),
(187, 373, 488, 0, '2024-01-23 04:53:53', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 650, NULL, 0),
(188, 373, 489, 0, '2024-01-23 04:54:28', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 4000, NULL, 0),
(189, 373, 490, 0, '2024-01-23 04:54:58', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 700, NULL, 0),
(190, 373, 491, 0, '2024-01-23 04:55:30', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 1600, NULL, 0),
(191, 373, 492, 0, '2024-01-23 04:55:56', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 700, NULL, 0),
(192, 373, 493, 0, '2024-01-23 04:56:23', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 1200, NULL, 0),
(193, 373, 494, 0, '2024-01-23 04:56:52', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 500, NULL, 0),
(194, 373, 495, 0, '2024-01-23 04:57:19', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 125, NULL, 0),
(196, 373, 497, 0, '2024-01-23 05:08:21', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 200, NULL, 0),
(197, 373, 498, 0, '2024-01-23 05:08:43', NULL, NULL, 'My strong technical background and proficiency in various technologies make me the ideal candidate to take your project to the next level. I\'m dedicated to delivering high-quality work on time and within budget. I\'m confident that my experience and expertise will be a valuable addition to your project, helping you achieve your goals.', 2500, NULL, 0),
(198, 356, 498, 0, '2024-01-23 05:15:22', NULL, NULL, 'I have 3 years of experience in React JS and also developed one project using AI. I think we can discuss about the project.', 2000, NULL, 0),
(199, 374, 478, 0, '2024-01-27 05:11:23', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 150, NULL, 0),
(200, 374, 479, 0, '2024-01-27 05:12:10', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 180, NULL, 0),
(201, 374, 480, 0, '2024-01-27 05:12:52', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 330, NULL, 0),
(202, 374, 481, 0, '2024-01-27 05:13:24', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 90, NULL, 0),
(203, 374, 482, 0, '2024-01-27 05:14:43', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 2100, NULL, 0),
(204, 374, 483, 0, '2024-01-27 05:15:16', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 450, NULL, 0),
(205, 374, 484, 0, '2024-01-27 05:15:49', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 675, NULL, 0),
(206, 374, 485, 0, '2024-01-27 05:16:21', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 90, NULL, 0),
(207, 374, 486, 0, '2024-01-27 05:16:49', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 130, NULL, 0),
(208, 374, 487, 0, '2024-01-27 05:17:24', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 580, NULL, 0),
(209, 374, 488, 0, '2024-01-27 05:17:59', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 430, NULL, 0),
(210, 374, 489, 0, '2024-01-27 05:18:29', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 3400, NULL, 0),
(211, 374, 490, 0, '2024-01-27 05:18:59', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 650, NULL, 0),
(212, 374, 491, 0, '2024-01-27 05:19:26', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 1500, NULL, 0),
(213, 374, 492, 0, '2024-01-27 05:19:53', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 680, NULL, 0),
(214, 374, 493, 0, '2024-01-27 05:20:25', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 1100, NULL, 0),
(215, 374, 494, 0, '2024-01-27 05:20:50', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 400, NULL, 0),
(216, 374, 495, 0, '2024-01-27 05:22:20', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 100, NULL, 0),
(217, 374, 496, 0, '2024-01-27 05:22:45', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 200, NULL, 0),
(218, 374, 497, 0, '2024-01-27 05:24:51', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 180, NULL, 0),
(219, 374, 498, 0, '2024-01-27 05:25:14', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 1800, NULL, 0),
(220, 374, 499, 0, '2024-01-27 05:25:47', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 30, NULL, 0),
(221, 374, 500, 0, '2024-01-27 05:26:11', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 850, NULL, 0),
(222, 374, 501, 0, '2024-01-27 05:26:32', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 700, NULL, 0),
(223, 374, 502, 0, '2024-01-27 05:26:49', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 700, NULL, 0),
(224, 374, 503, 0, '2024-01-27 05:27:05', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 700, NULL, 0),
(225, 374, 504, 0, '2024-01-27 05:27:20', NULL, NULL, 'I can start working immediately and will try to send you the results as soon as possible.', 1400, NULL, 0),
(226, 375, 482, 0, '2024-01-27 05:36:01', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 2000, NULL, 0),
(227, 375, 483, 0, '2024-01-27 05:36:27', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 430, NULL, 0),
(228, 375, 484, 0, '2024-01-27 05:37:32', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 650, NULL, 0),
(229, 375, 485, 0, '2024-01-27 05:38:01', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 100, NULL, 0),
(230, 375, 486, 0, '2024-01-27 05:38:28', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 120, NULL, 0),
(231, 375, 487, 0, '2024-01-27 05:38:58', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 550, NULL, 0),
(232, 375, 488, 0, '2024-01-27 05:39:30', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 400, NULL, 0),
(233, 375, 489, 0, '2024-01-27 05:39:58', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 3300, NULL, 0),
(234, 375, 490, 0, '2024-01-27 05:40:23', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 600, NULL, 0),
(235, 375, 491, 0, '2024-01-27 05:41:02', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 1700, NULL, 0),
(236, 375, 492, 0, '2024-01-27 05:41:42', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 650, NULL, 0),
(237, 375, 493, 0, '2024-01-27 05:42:05', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 1000, NULL, 0),
(238, 375, 494, 0, '2024-01-27 05:42:32', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 350, NULL, 0),
(239, 375, 495, 0, '2024-01-27 05:42:54', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 80, NULL, 0),
(240, 375, 496, 0, '2024-01-27 05:43:14', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 175, NULL, 0),
(241, 375, 497, 0, '2024-01-27 05:43:40', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 150, NULL, 0),
(242, 375, 498, 0, '2024-01-27 05:44:18', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 2200, NULL, 0),
(243, 375, 499, 0, '2024-01-27 05:44:55', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 30, NULL, 0),
(244, 375, 500, 0, '2024-01-27 05:45:17', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 825, NULL, 0),
(245, 375, 501, 0, '2024-01-27 05:45:34', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 675, NULL, 0),
(246, 375, 502, 0, '2024-01-27 05:45:53', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 675, NULL, 0),
(247, 375, 503, 0, '2024-01-27 05:46:18', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 675, NULL, 0),
(248, 375, 504, 0, '2024-01-27 05:46:40', NULL, NULL, 'If you are looking for a reliable, creative, and experienced professional, look no further. Contact me now and let\'s discuss your needs and goals. I look forward to hearing from you soon.\r\nThank you.', 1350, NULL, 0),
(249, 376, 486, 0, '2024-01-27 05:51:39', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 100, NULL, 0),
(250, 376, 487, 0, '2024-01-27 05:52:16', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 500, NULL, 0),
(251, 376, 488, 0, '2024-01-27 05:52:46', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 375, NULL, 0),
(252, 376, 489, 0, '2024-01-27 05:53:18', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 3000, NULL, 0),
(253, 376, 490, 0, '2024-01-27 05:53:49', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 500, NULL, 0),
(254, 376, 491, 0, '2024-01-27 05:54:29', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 1400, NULL, 0),
(255, 376, 492, 0, '2024-01-27 05:55:00', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 600, NULL, 0),
(256, 376, 493, 0, '2024-01-27 05:55:30', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 900, NULL, 0),
(257, 376, 494, 0, '2024-01-27 05:55:57', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 300, NULL, 0),
(258, 376, 495, 0, '2024-01-27 05:56:18', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 50, NULL, 0),
(259, 376, 496, 0, '2024-01-27 05:56:39', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 150, NULL, 0),
(260, 376, 497, 0, '2024-01-27 05:57:03', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 120, NULL, 0),
(261, 376, 498, 0, '2024-01-27 05:57:27', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 1600, NULL, 0),
(262, 376, 499, 0, '2024-01-27 05:57:45', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 20, NULL, 0),
(263, 376, 500, 0, '2024-01-27 05:58:08', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 800, NULL, 0),
(264, 376, 501, 0, '2024-01-27 05:58:30', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 650, NULL, 0),
(265, 376, 502, 0, '2024-01-27 05:59:32', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 650, NULL, 0),
(266, 376, 503, 0, '2024-01-27 05:59:56', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 650, NULL, 0),
(267, 376, 504, 0, '2024-01-27 06:00:16', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 1300, NULL, 0),
(268, 376, 505, 0, '2024-01-27 06:00:50', NULL, NULL, 'You can rely on me for consistent reporting and transparent communication throughout the project.', 400, NULL, 0),
(269, 372, 499, 0, '2024-01-27 06:13:38', NULL, NULL, 'Hi, I\'m excited to offer my services as a freelancer for your Facebook/Instagram promotion, With extensive experience in creating engaging social media content and a deep understanding of Facebook/Instagram algorithms, I am confident that I can help increase brand awareness and promote your product effectively.\r\n\r\nMy skills include copywriting and graphic design, allowing me to craft compelling posts that capture attention and drive engagement. I will closely monitor the performance of each post and make adjustments as needed to ensure optimal results.\r\n\r\nI am eager to collaborate with you and contribute to the success of your campaign. Please feel free to reach out to discuss the project in more detail.\r\n\r\nBest regards', 25, NULL, 0),
(270, 372, 500, 0, '2024-01-27 06:14:59', NULL, NULL, 'Hello,\r\nGreetings Hope you are doing well.\r\n\r\nI am a Mobile Application developer with over 5 years of experience.\r\nI am confident in my ability and skills to develop high-quality Mobile apps and would like to work on your social networking mobile app project.\r\nI will complete the work as per your requirements.\r\nI want to discuss more this project to prepare the final concept.\r\nSo let’s discuss this in detail over chat then will make plans to start work on it.\r\n\r\nWaiting for your earliest reply.\r\n\r\nThanks.\r\nRahul', 800, NULL, 0),
(271, 372, 501, 0, '2024-01-27 06:16:27', NULL, NULL, 'As an experienced 3D modeling and rendering expert, I have the technical skills and creative eye necessary to bring your sauna assembly animation to life. My proficiency with software, such as Maya and Blender, ensures that I can create realistic visuals that accurately mirror the real-world assembly procedure. Drawing from my architectural and product design background, I have consistently delivered high-quality work that aligns with precise schematics, giving me the capacity to bring efficiency and ease into every frame of your instructional video.\r\n\r\nIn my six years in the industry, I have developed a strong attention to detail that is vital for translating complex information into clear, educational visuals. This has served me well in creating numerous instructional videos. With this project, my goal would be to emphasize not just the step-by-step process but also the quality and value of your saunas. By understanding your target audience\'s preferences for visual-oriented guides, I\'ll produce an engaging 3D animation that helps customers assemble their saunas confidently.', 700, NULL, 0),
(272, 372, 502, 0, '2024-01-27 06:17:22', NULL, NULL, 'Hi there, I have expertise in .NET framework and .NET Core desktop application development. Additionally, I have hands-on experience in creating pluggable applications using MEF in the .NET framework and implementing Dependency Injection in .NET Core applications. I am confident that I can deliver the high-quality service you are seeking.\r\n\r\nFeel free to reach out to initiate further discussions. I look forward to the opportunity to collaborate with you.\r\n\r\nThank You.', 700, NULL, 0),
(273, 372, 503, 0, '2024-01-27 06:19:12', NULL, NULL, 'I have 4+ yrs of expertise in Angular and can work on your task, Do you have a UI design ready ?\r\n\r\nMessage me to discuss more.', 650, NULL, 0),
(274, 372, 504, 0, '2024-01-27 06:26:16', NULL, NULL, 'HI,\r\nI can help you to build Dynamic Management App, Robust Task Management ,Secure File Sharing ,\r\nGoogle Drive Integration .Need to know more.\r\n\r\nLet’s get on a chat\r\n\r\nI am among the 1% freelancer here so you can expect high Quality work with top communication and an amazing experience.\r\n\r\nWishing you best of health and success\r\n\r\nPeace and Regards\r\nRahul', 1200, NULL, 0),
(275, 372, 505, 0, '2024-01-27 06:32:38', NULL, NULL, 'My name is Rahul and I believe my extensive experience in digital marketing makes me the ideal candidate for your SEO Conversion & Ranking Boost project. With a special focus on maximizing online visibility and engagement, I\'ve developed a multitude of strategies that directly translate into increased conversions. My forte lies not only in improving search engine rankings but also in driving user actions- which is precisely what you need.\r\n\r\nIn terms of my SEO skills, I have proven proficiency in both on-page and off-page optimization techniques, just as you sought after. Keyword research and content optimization is another area I excel at. I understand the nuances of crafting content that meets user needs and search intent, while also encouraging engagement- a factor I believe will significantly impact your conversions positively.\r\n\r\nMy adaptability to the latest algorithms and staying updated with SEO best practices also differentiates me. In addition to data analysis being my paramount strength, my ability to leverage it effectively further supports the success of my digital campaigns. With a creative yet data-driven approach, I am confident that I can deliver remarkable results for your project. So, let\'s collaborate to elevate your website\'s performance!', 450, NULL, 0);
INSERT INTO `my_leads` (`id`, `professional_id`, `lead_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `description`, `amount`, `order_id`, `is_seen`) VALUES
(276, 374, 505, 0, '2024-01-27 06:41:32', NULL, NULL, 'With over a decade of experience and an impressive track record, I believe I\'m the top candidate for your SEO and Conversions project. I\'ve spent years perfecting my skills in both on-page and off-page techniques, which I can strategically apply to improve your website\'s ranking and drive more targeted traffic. My deep understanding of keyword research and content optimization can solve your content improvement needs while aligning with user intent to enhance engagement and boost conversions.\r\n\r\nNot only am I up-to-date with current SEO best practices, but I also have a knack for adapting quickly to the latest algorithms- an ability that has consistently helped my clients remain at the forefront of search engine rankings. My approach will not just improve visibility but also ensure that the visitors take meaningful actions on your site. Moreover, you can rely on me for consistent reporting and transparent communication throughout the project.\r\n\r\nLastly, it\'s not just about the technical skills, but my unwavering commitment to client satisfaction makes me a valuable asset. Working with me means you\'ll get more than just tactical SEO support; you\'ll get a reliable, trustworthy partner who will prioritize your needs above all else. Together, we can maximize your online visibility and drive sustainable business growth by turning your increased traffic into conversions.', 375, NULL, 0),
(277, 375, 505, 0, '2024-01-27 07:23:30', NULL, NULL, 'With my extensive experience in SEO and Digital Marketing, I am confident that I can help you turn your website\'s improved search engine rankings into tangible conversions. My approach to SEO is comprehensive and tailored to meet specific goals. I will invest time in understanding your business and target audience, conduct thorough keyword research and utilize all my skills to ensure that the content on your website matches user intent and encourages engagement.\r\n\r\nOne of my strengths lies in not just optimizing websites for visibility but also for user experience. Through technical SEO audits and error corrections, I will improve the overall quality of your website, making it more appealing to both search engines and users alike.\r\n\r\nIn summary, choosing me means choosing a partner who combines technical expertise with a deep understanding of human interaction on the web. I\'m thrilled at the prospect of helping you achieve greater success through improved SEO and enhanced conversions. Let\'s drive increased visibility, higher engagement rates, and ultimately substantial ROI together! Thank you for considering my application; I look forward to discussing your project further!', 350, NULL, 0),
(278, 413, 507, 0, '2024-01-31 08:15:51', NULL, NULL, 'I can do this work in 4500 USD, please contact me, I have prior experience in similar field.', 4500, NULL, 0),
(279, 372, 506, 0, '2024-01-31 08:22:37', NULL, NULL, 'Yes, I can do this work, I have more than 12 years of experience in IT sector, Please consider my bid.', 1300, NULL, 0),
(280, 372, 507, 0, '2024-01-31 08:23:55', NULL, NULL, 'I have done this type of app previously, please dm me.', 8000, NULL, 0),
(281, 373, 506, 0, '2024-02-02 06:32:26', NULL, NULL, 'Dear employer as a API developer (working with NodeJS) I am having relevant skills as you requested in your project description...I can share some demo as well in further chat. Can we discuss more on this to get detailed understanding about the project ? As I am having some technical questions on this so let me know when you get time to discuss this and clear the doubts.', 2000, NULL, 0),
(282, 374, 506, 0, '2024-02-02 06:33:45', NULL, NULL, 'Hi Good Day, I can understand that you are looking for a expert node.js developer to work on your projects and I can make sure the features and functionalities of the website that\'s applicable on both desktop and mobile versions.\r\n\r\nI\'m a Senior web developer. I have 12+ years of experience in website and mobile app development. I have good skills in All PHP CMS Like WordPress, Shopify, OS Commerce , Dotnet, and Joomla. I can handle both design and development for a whole project and I have a team too.\r\n\r\nPlease leave me a message, so we can discuss and confirm the requirements.', 1900, NULL, 0),
(283, 375, 506, 0, '2024-02-02 06:34:39', NULL, NULL, 'I am a proficient Node.js developer with an extensive understanding of API Gateway architecture. I have the skills and experience to implement a microservices project for you.', 1800, NULL, 0),
(284, 376, 506, 0, '2024-02-02 06:35:38', NULL, NULL, 'Hi there, As an experienced Node.js developer, our company is well-equipped to take on your project. Our team has a deep understanding of API Gateway architectures and we’ve utilized this expertise in many prior engagements, consistently delivering successful projects. We have also leveraged PostgreSQL extensively in managing data for powerful microservices, making us the perfect fit for your requirements.', 1500, NULL, 0),
(285, 373, 507, 0, '2024-02-02 06:40:21', NULL, NULL, 'I am confident that we can reach new heights together on this project. Let’s turn your vision into actionable results!', 7000, NULL, 0),
(286, 374, 507, 0, '2024-02-02 06:41:03', NULL, NULL, 'Let\'s discuss your project further and find the best way to bring your vision to life.', 6000, NULL, 0),
(287, 372, 508, 0, '2024-02-02 06:42:28', NULL, NULL, 'Hello There,\r\n\r\nI will add function to your site which will all function you mentioned here.\r\n\r\nI have 10 years of experience in Wordpress.\r\n\r\nThanks', 145, NULL, 0),
(288, 373, 508, 0, '2024-02-02 06:43:34', NULL, NULL, 'Hello,\r\nhope you are doing well !\r\nI have 8+ years of experience in web designing and development in wordpress and I can add a function on your wordpress side as per your requirement and details. please come on chat so we can discuss more details.\r\nThank you', 130, NULL, 0),
(289, 374, 508, 0, '2024-02-02 06:44:24', NULL, NULL, 'I can develop this module on WordPress as per your need. I would like to discuss more about how you want designs to be for Profile pages and then we can finalise project to get started.', 125, NULL, 0),
(290, 375, 508, 0, '2024-02-02 06:45:13', NULL, NULL, 'Hello There,\r\n\r\nHope you Doing well,\r\n\r\nI can add the function in the WordPress website with the student sign-up form/page, teacher sign-up form/page, matching of student/teacher, student profile page, and teacher profile page as you need so please discuss with me in detail over the chat.\r\n\r\n\r\nThanks', 110, NULL, 0),
(291, 376, 508, 0, '2024-02-02 06:46:12', NULL, NULL, 'As an experienced freelancer with specialised expertise in WordPress and Designing, I’ve worked on several projects similar to yours. With me on board, you\'ll get a student and teacher sign-up form that ensures easy data entry for subjects across different categories, an essential component in fostering meaningful connections. More so, my proficiency in JavaScript allows for an accurate matching system based on pin codes and subject matters, bringing local students and teachers closer.', 100, NULL, 0),
(292, 373, 509, 0, '2024-02-02 07:04:53', NULL, NULL, 'Hi There,\r\n\r\nI hope this message finds you well. I am writing to express my interest in your upcoming e-commerce project and to propose my services as a Full Stack Developer. With my expertise in JavaScript and Python, I am confident in my ability to contribute to the development of your Minimum Viable Product (MVP).\r\n\r\nAs a Full Stack Developer, I will be responsible for both front-end and back-end development, ensuring the seamless integration of various features and functionalities. I have previous experience working on e-commerce projects, which has equipped me with the necessary skills and knowledge to deliver a successful solution for your business.', 850, NULL, 0),
(293, 372, 509, 0, '2024-02-02 07:06:04', NULL, NULL, 'I have demonstrated my proficiency in both front-end and back-end development, ensuring the smooth integration of various features and functionalities. Leveraging my skills, I have successfully collaborated with cross-functional teams, translating UI/UX designs into functional, user-friendly applications. I am excited about the opportunity to bring this expertise to your team and contribute to the swift realization of your project goals.', 800, NULL, 0),
(294, 373, 510, 0, '2024-02-02 07:07:19', NULL, NULL, 'After carefully reviewing your project description \"NAV Integration Expertise Needed\", we believe that our team is exceptionally suited for this job.\r\n\r\nWe have very good expertise in your mentioned skills i.e. .NET, Dynamics and that\'s why I believe that we can work on your project efficiently.', 1500, NULL, 0),
(295, 372, 510, 0, '2024-02-02 07:08:23', NULL, NULL, 'I read your job description carefully, I am very interested in your project.\r\nAs I has rich experiences on those Dynamics and .NET, your project attracts me.\r\nLet\'s discuss in more details.', 1200, NULL, 0),
(296, 373, 511, 0, '2024-02-02 07:09:43', NULL, NULL, 'Hello Greetings!! I have read your description and understood that you need a news website built. We are a team of expertise and we are here to provide you a professional looking website in which you can easily add news.\r\n\r\nKindly initiate the chat and give us an opportunity to work for you.', 400, NULL, 0),
(297, 372, 511, 0, '2024-02-02 07:10:24', NULL, NULL, 'Hello,\r\nhope you are doing well !\r\nI have 9 years of experience in website designing and development in php and CMS customization with a strong focus on UI/UX design. My knowledge in HTML, CSS and PHP allows me to create websites that are not only visually appealing but also functionally effective, just like your envisioned news sharing site. please come on chat so we can discuss further details.', 350, NULL, 0),
(298, 377, 509, 0, '2024-02-02 10:10:11', NULL, NULL, 'I am interested in your DYNAMIC JAVASCRIPT project. Please send me a message so that we can discuss more. We really wish to work with you on this project with my experience of more than 8 years, skills and knowledge of your projects.\r\n\r\n☆ Frameworks ☆\r\n- Laravel, CI, WordPress, Flutter, Dart , angular, Ionic\r\n\r\n☆ Database ☆\r\n- PostgreSQL, MySQL, SQLite, MongoDB,\r\n\r\n☆ Front end Techniques ☆\r\n-AngularJS, NodeJS, JavaScript, jQuery, HTML, CSS, Bootstrap,\r\n\r\n☆ Backend Techniques ☆\r\nPHP, Laravel , CI, Node\r\n\r\nThanks', 725, NULL, 0),
(299, 378, 509, 0, '2024-02-02 10:11:34', NULL, NULL, 'I hope this message finds you well. I am writing to express my interest in your upcoming e-commerce project and to propose my services as a Full Stack Developer. With my expertise in JavaScript and Python, I am confident in my ability to contribute to the development of your Minimum Viable Product (MVP).\r\n\r\nAs a Full Stack Developer, I will be responsible for both front-end and back-end development, ensuring the seamless integration of various features and functionalities. I have previous experience working on e-commerce projects, which has equipped me with the necessary skills and knowledge to deliver a successful solution for your business.\r\n\r\nRegarding the backend, we can utilize a simple and efficient solution like Firebase to meet your immediate requirements. This will allow us to quickly develop the initial version of your e-commerce platform. Additionally, I am open to exploring more complex backend solutions in the future, as your business grows.\r\n\r\nFurthermore, I have a strong understanding of databases and UI/UX design, which will enable me to create a user-friendly and visually appealing interface for your customers. I am also knowledgeable in AI/ML, which can be leveraged to enhance the functionality and personalization of your e-commerce platform.', 700, NULL, 0),
(300, 377, 510, 0, '2024-02-02 10:13:27', NULL, NULL, 'As a seasoned .NET developer with over a decade of impeccable experience, I would like to affirm that your project perfectly aligns with my expertise. Having driven more than 80 successful projects where I played key roles as an Architect, Project Lead, and full stack developer, I have gained profound knowledge of Microsoft Dynamics and LS Retail. Specifically on NAV 2015 which is what you need for this task.\r\n\r\nOne notable trait about my work ethic is speed and accuracy. I don\'t just deliver quickly but also ensure each line of code is carefully examined for efficiency and accuracy.', 1000, NULL, 0),
(301, 377, 511, 0, '2024-02-02 10:16:03', NULL, NULL, 'Hi\r\n\r\nI have read your job description that\'s perfectly match with my skills and past works as I am well experienced (10 Years) with the things you need to assist with.\r\n\r\n\r\nMy Skills Includes…\r\n\r\n- PHP, HTML, MySQL, Javascript, css\r\n- Wordpress, Elementor, woo-commerce\r\n- Laravel, react.js, node.js\r\n- API Development\r\n\r\nIf this sounds interesting, Let\'s connect for further discussion.\r\n\r\nThank You.', 300, NULL, 0),
(302, 377, 512, 0, '2024-02-02 10:18:38', NULL, NULL, 'Hi, I am interested in this project. I can provide you with the Customised iOS Application with all features needed for your project in a creative and professional manner. We have previously worked on various Personal blog projects, Games, Mobile Apps & Corporate websites and we can cater to all your requirements in an effecient manner. We can complete the project in 15-30 days and we have long-term experience of various cloud computing platforms (Microsoft Azure, Google Cloud Platform, Amazon Web Services, etc.) and IDEs (Microsoft Visual Studio, Android Studio, Xcode). You can trust us with your project as we have previously worked on similar App development projects and we can design and develop your app with the desired features in an elegant manner. Please share your details and connect with us so that we can collaborate and complete this project.', 1400, NULL, 0),
(303, 377, 513, 0, '2024-02-02 10:19:29', NULL, NULL, 'Hello There,\r\n\r\nHope you Doing well,\r\n\r\nI can make Mobile applications in hybrid perfectly as you need so I can add some custom notifications for users as you need so please discuss with me in detail over the chat.\r\n\r\nKind wishes', 225, NULL, 0),
(304, 377, 514, 0, '2024-02-02 10:20:30', NULL, NULL, 'With my extensive background in full-stack Java and Python development, I am excited to bring my expertise to your Personal Asset Smart Contracts project. While I may not have direct experience with Solidity or IBM Hyperledger, my proficiency with various front-end and back-end technologies and frameworks indicates my ability to quickly adapt and learn new languages. The inclusion of Spring Boot, Django, Flask among others demonstrate my adaptability.\r\n\r\nMy understanding of Oracle, PostgreSQL, MySQL for integrating databases coupled with my knowledge in server technologies like AWS and GCP that can facilitate the running of the two technologies you desire on a large and secure system. My experience collaborating with clients showcases my skill in converting complex requirements into practical solutions – a valuable ability for creating an accessible yet efficient interface amidst the complexity of blockchain. I believe these qualities amplify how well-suited I am to your needs.\r\n\r\nBy choosing me for this project, you\'re not only gaining the skills necessary but also a collaborator committed to meeting deadlines and providing valuable inputs along the development process. Let\'s create a reliable, secure and user-friendly platform to revolutionize personal asset management together.', 240, NULL, 0),
(305, 378, 511, 0, '2024-02-02 10:22:04', NULL, NULL, 'Hi,\r\nI can create Engaging News Sharing Site\r\nI am an experienced Web developer and work on crypto currency development and equipped with all the necessary skills to provide you best website that completely satisfies your business needs.\r\nPlease share your requirements with me over chat so we can proceed further.', 280, NULL, 0),
(306, 378, 512, 0, '2024-02-02 10:23:05', NULL, NULL, 'Hello!\r\n\r\nGreetings of the day!!\r\n\r\nI have reviewed your job description and understood it well, I have over 7 years of expertise in developing similar applications. Proficient in mobile app development, I specialise in creating user-friendly designs and robust back end systems. My skills align perfectly with your requirements, and I have hands-on experience with IOS App development. Let\'s discuss how I can bring your vision to success.', 1350, NULL, 0),
(307, 378, 513, 0, '2024-02-02 10:24:58', NULL, NULL, 'With a decade of diverse app development experience, I can be your full-stack solution for your hybrid app development project. Combining my skills in Angular, React Native, Ionic, Cordova, Capacitor, Node.js and more, I can create a seamless and user-friendly environment by blending the best of both web and app functionalities.\r\n\r\nNot only can I implement a web view within your hybrid app, but I also excel at devising ways to enhance user experience such as custom notifications - a skill that has proven incredible valuable in previous projects. Moreover, my extensive knowledge of deploying apps on the Apple App Store and Google Play Store will undoubtedly help pave the way for your app’s success.\r\n\r\nThe hallmark of my work is not just delivering functional applications but rather creating meaningful experiences for users. My passion extends beyond coding; it lies in leveraging technology to improve lives— this project seems aligned to my core. Let\'s work together to bring your vision to life!', 200, NULL, 0),
(308, 378, 514, 0, '2024-02-02 10:26:02', NULL, NULL, 'With profound knowledge in blockchain technology and my solid experience in developing asset management systems on the blockchain, I offer your project a diversified skillset which includes expertise in Solidity and IBM Hyperledger. My portfolio showcases a versatile range of my ability to craft inclusive and user-friendly UI/UX designs that are highly interactive. I\'ll leverage these skills to create both a comprehensible graphical interface as well as advanced command-line tools that would cater to a wide range of user preferences on your platform.\r\n\r\n\r\nEmbarking on this project successfully will demand more than just programming competence; it will demand coding with precision, innovation, and attention to provide optimum results. I guarantee uninterrupted communication, timely delivery, incredible performance, and efficient support throughout the lifespan of the project. GlobalGeek Infotech has always been delivering cutting-edge software solutions to bring distinguishing customer experiences. With us, your endeavor of personalizing and streamlining your asset management with smart contracts is in safe hands.', 220, NULL, 0),
(309, 379, 512, 0, '2024-02-02 10:27:48', NULL, NULL, 'Dear Client,\r\nI have gone through your details and I noticed you are looking for an iOS expert.\r\n\r\nAs an enthusiastic iOS developer, I have deep knowledge of Xcode, Swift, SwiftUI, UIKIT, Objective C, SQLite, CoreData, Firebase & graphic design. I have good experience with PostgreSQL, MySQL, MongoDB, Oracle and I have knowledge of data structures, Design patterns, OOP concept.\r\nI have already developed and published 164+ mobile apps to the mobile market.\r\n\r\nI can start to work on this project right now and I have confidence in my ability to perform it perfectly.\r\nLook forward to hearing from you soon.\r\nThanks', 1300, NULL, 0),
(310, 379, 513, 0, '2024-02-02 10:28:42', NULL, NULL, 'Hello,\r\ni can Wrap/Convert your website into Android and IOS applications.\r\nShare the website URL so i can provide you Demo app for you testing.\r\ni have already done many website embedded apps and i have some live sample apps for you.\r\nLet\'s chat to proceed.', 180, NULL, 0),
(311, 379, 514, 0, '2024-02-02 10:30:21', NULL, NULL, 'Hello\r\n\r\nI have gone through your project brief for Personal Asset Smart Contracts & feel confident to design a creative designs.\r\n\r\nExpect the following benefits by hiring:\r\n- Multiple concepts and revisions for the selected version\r\n- 100% Satisfaction guaranteed\r\n- Final formats .ai .psd .eps .pdf .jpeg .png\r\n\r\nIt will be a pleasure if you will give me an opportunity to turn your idea into reality.\r\n\r\nRegards', 200, NULL, 0),
(312, 380, 512, 0, '2024-02-02 10:31:56', NULL, NULL, 'Greetings, we have rich experience in iPhone apps development. I am really interested in your application so i have placed a fair price. Please consider my bid.\r\n\r\nI don\'t want any upfront payment.\r\n\r\nI am 100% sure i can do this. Also don\'t worry about time frame i will try to complete within 25 days just for safer side i have placed 30 days. Please consider my bid .Please let me know what do you think.\r\nAlso you can see my profile about my work and communication.\r\nThank you', 1200, NULL, 0),
(313, 380, 513, 0, '2024-02-02 10:32:52', NULL, NULL, 'Hi how are you ?\r\n\r\nI have read your project details for show a web view in the app and include push notifications. I am sure that i can do this job very well on time and within your budget.\r\n\r\nI am highly skilled as a hybrid mobile app developer, routinely creating innovative and useful apps that are popular and that work well. Let’s connect over CHAT for a detailed discussion.\r\n\r\nWhy Me-\r\n✔ Quality work at affordable prices\r\n✔ Strong Android, iPhone, and backend architecture and database knowledge\r\n✔ Develop applications that support all devices\r\n✔ Delivering product on/before time\r\n✔ Always up-to-date with the latest technologies\r\n\r\nUsing tech:-\r\n=> Design: Figma, Adobe XD, Adobe Photoshop, Sketch.\r\n=> Mobile APP: React Native & Flutter.\r\n=> Interaction with backend - Rest API, JSON, XML, Node.js, React.js, PHP, Laravel.\r\n\r\nWill provide 100% result guarantee and expert development\r\n\r\nThank you', 150, NULL, 0),
(314, 380, 514, 0, '2024-02-02 10:34:12', NULL, NULL, 'With my extensive knowledge and experience in blockchain development and web design, I am confident in my capability to create your ideal personal asset Smart Contract platform. Proficient in Solidity and other smart contract programming languages, I can harness the power of Ethereum (Solidity) or IBM Hyperledger to ensure a secure and efficient system that will meet your needs perfectly. Additionally, my strong grasp of blockchain technology, particularly Ethereum, makes me adept at designing innovative solutions.\r\n\r\nA key aspect of this project is accessibility, which I prioritise with my history as a user interface designer. Along with designing intuitive UIs for a seamless user experience, I will create command-line tools for software interaction to cater to advanced usage scenarios. My previous projects in asset management on the blockchain and portfolio showcasing user interface designs offer proof of my competence.\r\n\r\nI genuinely value personalized solutions because of the unique nature of every project. Thus, building a user-friendly graphical interface tailored to address your specific requirements fits seamlessly with my work ethos. The complexities of asset management on the blockchain require utmost precision and specific skill set – qualities I possess in abundance. Hire me for effective project completion that offers high security, accessability and ease-of-use.', 175, NULL, 0),
(315, 377, 515, 0, '2024-02-02 10:39:50', NULL, NULL, 'With my extensive programming background, I am confident I can deliver a solution tailored to your needs for API development and integration. Having worked in diverse domains and technologies such as Node.js and React.js, I am well-versed in creating secure APIs with seamless data handling and transmission. This includes a thorough understanding of the complexities involved in working with custom software like yours.\r\n\r\nMy proficiency in the most common languages e.g. C#, PHP, Javascript as well as frameworks like Laravel adds depth to my skill set. I have not only built APIs like you require but have also provided comprehensive documentation and training to the software maintenance team ensuring smooth operations for your CHA software.\r\n\r\nAs communication is vital to this project, my strong communication skills will ensure that you are regularly updated on the progress made. My dedication to meeting clients\' expectations is what distinguishes me from others. I firmly believe that my skill set and experience would align with your project objectives. Let’s improve the efficiency of your customs notification process together!', 420, NULL, 0),
(316, 378, 515, 0, '2024-02-02 10:41:19', NULL, NULL, 'With over 6 years of experience in IT and a strong proficiency in C# Programming, I\'m confident I can deliver the custom API you\'re seeking for your Custom House Agent software - a solution that will streamline your notification process and ensure a reliable update delivery system. I understand that precision and accuracy are critical to your workflow, and as someone with a keen eye for detail, I can promise seamless data handling and transmission with maximum security.\r\n\r\nWhat sets me apart is my familiarity with Custom House Agent workflows. Having worked on similar projects in the past, I have an in-depth knowledge of the requirements and challenges involved. This enables me to create bespoke solutions tailored specifically for your needs. Also, being an effective communicator, I\'ll keep you updated on the progress at all stages, giving you full control over the project.\r\n\r\nFurthermore, once the API is developed, I\'ll ensure thorough API documentation for your maintenance team. This will allow them to navigate and maintain the system effectively in the future. With my combined technological skills and proficiency in global communication - complemented by my commitment to your security and success - hiring me would be an investment that will yield returns for years to come. I look forward to discussing how we can enhance your CHA systems together!', 400, NULL, 0),
(317, 379, 515, 0, '2024-02-02 10:42:19', NULL, NULL, 'Hi,\r\n\r\nI am an experienced API developer with expertise in C#, .Net MVC , python & nodejs.\r\n\r\nI can develop your api with required integrations.\r\n\r\nPlease share more details.\r\n\r\nThank you.', 380, NULL, 0),
(318, 382, 516, 0, '2024-02-03 09:59:47', NULL, NULL, 'I am a skilled developer with expertise in building robust booking systems for online travel agencies. Proficient in PHP, Python, and Java, I specialize in seamless API integration with major airlines.\r\n\r\nMy extensive experience includes developing user-friendly interfaces for flight search and booking. I have successfully delivered scalable and efficient OTA systems with a focus on system security and data privacy. Previous projects involving flight booking systems showcase my capabilities.\r\n\r\nI am committed to providing maintenance and support post-development. Let\'s collaborate to create a top-notch online travel platform.\r\n\r\nLooking forward to the opportunity.', 1400, NULL, 0),
(319, 382, 517, 0, '2024-02-03 10:00:36', NULL, NULL, 'With a wealth of experience in both on-site and off-site SEO strategies, I am well-prepared to significantly improve your website\'s performance in keyword rankings, backlink quality, and on-page optimization. My proven track record includes successfully enhancing the visibility of websites on a national level, utilizing targeted strategies to reach a broader customer base.\r\n\r\nI understand the critical importance of optimizing your website\'s on-page elements, implementing SEO-friendly content, and developing high-quality, relevant backlinks for an uplifted domain profile. My comprehensive knowledge of SEO practices, coupled with a focus on national-level targeting, positions me as the ideal candidate to efficiently elevate your website\'s SEO performance. I look forward to contributing to the success of your online presence and reaching your customer base more effectively.', 240, NULL, 0),
(320, 382, 518, 0, '2024-02-03 10:01:29', NULL, NULL, 'Hi-ya,\r\nunderstood the requirements of your project \"Custom Face Figurine Creation\" and have read your description that \"I\'m looking for a talented 3D artist to bring a unique project to life - a small-scale, detailed cus......\" so on\r\n\r\nI am skilled Swift photoshop artist with skills including 3D Modelling, 3ds Max, 3D Rendering, Maya and 3D Animation.\r\n\r\nBelow is my profile link where you can see past work and employer feedbacks regarding my work quality:\r\nhttps://www.freelancer.com/u/LionConcepts\r\n\r\nIs there any deadline to meet?\r\n\r\nLooking forward to your response\r\nThanks', 240, NULL, 0),
(321, 383, 516, 0, '2024-02-03 10:03:02', NULL, NULL, 'With over 18 years of experience in Web and APP Development, I\'ve crafted my skills to align precisely with your needs. From developing robust booking systems to seamless API integration, I have you covered. My proficiency in PHP, Python, and Java is exactly what you are looking for in an OTA System Developer.\r\n\r\nI’ve successfully executed multiple projects involving flight booking systems, which amplifies my understanding of the challenges and intricacies involved. My work includes maintaining a user-friendly interface for smooth flight search and booking experiences. Furthermore, my dedication to providing maintenance and support post-development matches your expectations of a long-term professional relationship.\r\n\r\nTo summarize, I bring expertise coupled with proven success from past clients - be it in PHP or Python or Java. Being the preferred development expert for countless clients over the years speaks volumes about my commitment to delivering scalable and efficient products with unwavering focus on security measures and data privacy. Let’s streamline your travel agency with my trusted skillset!', 1200, NULL, 0),
(322, 383, 517, 0, '2024-02-03 10:03:59', NULL, NULL, 'Hello,\r\n\r\n\r\nWe can analyze your current on-site and off-site SEO situation and create a plan to help you meet your ranking goals & beat out your competition.\r\n\r\nStep1: On-Page Optimization\r\n✓ Browser Compatibility Optimization\r\n✓ Page Speed Optimization\r\n✓ Keyword Density Best Practices\r\n✓ Internal Linking Strategy\r\n✓ URL & Content Analysis\r\n✓ Meta Description optimization\r\n✓ Broken Links Checking\r\n\r\nStep 2: Off-Page Optimization\r\n✓ Social Bookmarking\r\n✓ Blog Comments\r\n✓ Local listing\r\n✓ Video submission\r\n✓ Classified submission\r\n✓ Image sharing\r\n✓ Search engine submissions\r\n\r\nLooking forward for your reply.\r\n\r\nRegards!', 210, NULL, 0),
(323, 383, 518, 0, '2024-02-03 10:05:12', NULL, NULL, 'I have seen your description that you need a unique project to life - a small-scale, detailed custom figurine of a person\'s face\r\n\r\nI am skilled 3D animators that have 9 years of experience. I\'m a deliverer of high quality 3D Designs, Renderings & Animations and many satisfied clients have benefited from my expertise and professional output. Here\'s what I love to hear from my clients.\r\n\r\nSoftware experience: Maya/ Blender/ Photoshop / After Effects/3D Max\r\nLet’s discuss this further.\r\nThanks Cheers.', 210, NULL, 0),
(324, 440, 517, 0, '2024-02-03 21:40:34', NULL, NULL, 'I am available to help your website SEO using my knowledge as a professional Digital Marketer. I will help your website with one of the secret strategies open to only top SEO expert.\r\n\r\nNo need for paid keyword research plan on any platform, what I need is already on your website and Google search console.\r\n\r\nContact me immediately, let me help you with getting your website rank higher to your satisfaction. ', 200, NULL, 0),
(325, 386, 519, 0, '2024-02-05 10:10:00', NULL, NULL, 'Hello,\r\nHope you are doing great,\r\nI can design and develop a fully professional website for women\'s health services as per your work requirements,\r\nI have a 9+ year experience for web designing and development,\r\nLet\'s connect through chat for detailed discussion,\r\nThanks', 750, NULL, 0),
(326, 386, 520, 0, '2024-02-05 10:11:18', NULL, NULL, 'I am ready to work on this project.', 12000, NULL, 0),
(327, 385, 519, 0, '2024-02-05 10:13:37', NULL, NULL, 'Hi There,\r\n\r\nI can create a sleek, modern website dedicated to women\'s health services. I have read your job description and assure you that I am a perfect fit for the job.I am a senior  Designer & Developer having vast and proven experience in web development and Web Designing using PHP, wordpress , Wix ,Shopify, magento 1 & 2, Bootstrap, Opencart ,CS-Cart, Laravel, Codeigniter , Yii, React JS , Angular JS , Vue JS, javascript, jquery, PSD to HTML conversion , PSD to Wordpress , graphic design , UX/UI, CSS, HTML, MYsql, JavaScript , AJAX, APIs and many other.\r\n\r\nI\'m available right away to discuss the requirements.\r\n\r\nLooking for the soonest reply from you.  \r\n\r\nThanks', 700, NULL, 0),
(328, 385, 520, 0, '2024-02-05 10:14:27', NULL, NULL, 'With over 5 years of experience and having helped 1000+ businesses you can be assured of getting the desired output.', 11000, NULL, 0),
(329, 383, 521, 0, '2024-02-05 10:58:33', NULL, NULL, 'Hi,\r\n\r\nI am an Android and Flutter developer having six-year or above of work experience with mobile app development and also some experience with PHP for APIs and backend as SQL for server data.\r\n\r\nSkills: Android, Flutter, Php, java, kotlin, Asp.net, Mysql, SQLite, SQL, Sqflite, JSON, Firebase', 45, NULL, 0),
(330, 384, 521, 0, '2024-02-05 10:59:28', NULL, NULL, 'Hhi I am experienced in this and I can start right now but i have few doubts and questions lets have a quick chat and get it started waiting for your reply.', 40, NULL, 0),
(331, 377, 516, 0, '2024-02-06 05:46:56', NULL, NULL, 'With over 8 years of experience in Web and APP Development, I\'ve crafted my skills to align precisely with your needs. From developing robust booking systems to seamless API integration, I have you covered. My proficiency in PHP, Python, and Java is exactly what you are looking for in an OTA System Developer.\r\n\r\nI’ve successfully executed multiple projects involving flight booking systems, which amplifies my understanding of the challenges and intricacies involved. My work includes maintaining a user-friendly interface for smooth flight search and booking experiences. Furthermore, my dedication to providing maintenance and support post-development matches your expectations of a long-term professional relationship.\r\n\r\nTo summarize, I bring expertise coupled with proven success from past clients - be it in PHP or Python or Java. Being the preferred development expert for countless clients over the years speaks volumes about my commitment to delivering scalable and efficient products with unwavering focus on security measures and data privacy. Let’s streamline your travel agency with my trusted skillset!', 1150, NULL, 0),
(332, 380, 516, 0, '2024-02-06 05:48:05', NULL, NULL, 'Dear Sir,\r\n\r\nI am ready to develop a robust flight booking system for your travel agency. My expertise in Android, HTML, Java, and PHP will ensure a user-friendly interface and seamless API integration. I will prioritize system security, data privacy, and post-development support. I offer a free demonstration of the solution before project awarding for your peace of mind. With my background in multiple programming languages and previous experience in OTA systems, I am confident in meeting your expectations. Thank you for considering my proposal.', 1100, NULL, 0),
(333, 381, 516, 0, '2024-02-06 05:49:30', NULL, NULL, 'Hi\r\n\r\nI understand that you are seeking a skilled developer for your online travel agency\'s needs and I am confident that I can help you.\r\n\r\nPlease message me so that we can have a detailed discussion.\r\n\r\nWe are the fastest growing web & mobile development company in India with a family of 50+ employees in-house, leveraging our expertise & proficiency through our services. We help tech & start-up companies with their web, mobile app design & development needs. We are experts in PHP, iOS, Android, WordPress, Shopify, SEO/SMM, cloud services, Web design, Python, backend.\r\n\r\n- Native and Flutter Android Application & iPhone Application design and development\r\n-Game design and development\r\n- Web Designing\r\n- Web Application Development\r\n- Website Development\r\n- Social Networking Design & Development\r\n- Portal Development\r\n- e-Commerce Design & Development\r\n- Corporate Website Design & Development\r\n- Search Engine Optimization\r\n- Internet Marketing\r\n- Crypto-currency, Ethereum, Block-chain,\r\n\r\nWe provide 100% quality work within your reasonable budget and given a timeline.', 1200, NULL, 0),
(334, 384, 517, 0, '2024-02-06 05:51:44', NULL, NULL, 'I\'m an SEO Expert with over 7+ Years of Experience. I can Bring your website on 1st Page Rank on Google and Drive Organic Traffic or Visitors via 100% White Hat SEO technique. I\'ve worked on several similar project and got top rankings.', 170, NULL, 0),
(335, 386, 521, 0, '2024-02-06 06:31:13', NULL, NULL, 'As a passionate and skilled Flutter developer, my primary goal is to contribute impactful and meaningful work in the realm of mobile app development. Your live project that entails merging the engaging UI of your Flutter app with the powerful functionalities of a WordPress backend aligns perfectly with my skills and aspirations.', 35, NULL, 0),
(336, 386, 522, 0, '2024-02-06 06:32:14', NULL, NULL, 'I have work experience in developing application using WPF. So it will be a great opportunity for to work on this again', 225, NULL, 0),
(337, 386, 523, 0, '2024-02-06 09:51:43', NULL, NULL, 'I have read your project description regarding \"Theme customizations, focusing primarily on overhauling layouts and structures\" & it can be done as I\'m an expert having 11+ years of proven experience working as a FULL STACK DEVELOPER having expertise in PHP, HTML, WEBSITE DESIGN, WORDPRESS, CSS, JAVASCRIPT and many other.\r\n\r\nI\'m available right away to discuss the requirements so I can start work immediately. Looking for a long term business relation with you.', 750, NULL, 0),
(338, 386, 524, 0, '2024-02-06 09:52:45', NULL, NULL, 'I am a Java and PL/SQL developer working on technology since 9+ years having hands on windows and web development experience. I would like to help in your application development.\r\n\r\nTo proceed further, I am ready to discuss your project and start immediately. Looking forward to hearing you back and discussing all details.', 1700, NULL, 0),
(339, 378, 519, 0, '2024-02-06 09:54:50', NULL, NULL, 'I have more than 10 years of experience with web design and development on WordPress, WooCommerce, Shopify, Wix, PHP, HTML/CSS and I will create it.', 600, NULL, 0),
(340, 378, 520, 0, '2024-02-06 09:56:03', NULL, NULL, 'I am ready to work on your project with a set deadline.', 10000, NULL, 0),
(341, 378, 521, 0, '2024-02-06 09:56:54', NULL, NULL, 'Hello sir,\r\nCan you share your website?\r\nWich type of website you have?\r\nsir i will create for application using your wordpress site backend, as i have worked with flutter wordpress backend of a ecomerce app, i can show the app with source code,\r\nI will complete your project within your budget and time.\r\nSo let\'s chat.\r\nThank you.', 25, NULL, 0),
(342, 378, 522, 0, '2024-02-06 09:57:37', NULL, NULL, 'I am a Software Developer with more than 17 years of experience in implementing .NET and SQL Server related projects. My key areas of expertise include (but not limited to) Windows Forms, WPF, ASP.NET Web Services, Entity Framework and SQL Server.\r\n\r\nI would like to hear more on the details of the UI layouts and system in general, and lookking forward to contribute my skills.', 200, NULL, 0),
(343, 378, 523, 0, '2024-02-06 09:58:26', NULL, NULL, 'I read your job description completely, and I found my skills relevant to your project. I am an Expert Full Stack Developer with over 8+ years of experience. I build Custom themes, Custom CRM, Laravel, ERP, Shopify, Wordpress, Wix etc. My focus is to build the best, most secure, reliable, optimized, and good User Experience websites for my clients.', 700, NULL, 0),
(344, 378, 524, 0, '2024-02-06 09:59:51', NULL, NULL, 'I am an experienced MySQL DBA with a proven track record in performance tuning, query optimization, and robust backup strategies. With expertise in resolving common MySQL issues, I am well-equipped to enhance the efficiency and reliability of your database ecosystem. I am committed to delivering sustainable improvements, tackling challenges such as slow queries and high CPU usage. Let\'s work together to ensure your database infrastructure operates seamlessly.', 1600, NULL, 0),
(345, 379, 522, 0, '2024-02-06 10:01:09', NULL, NULL, 'In terms of the specific project requirements you\'ve outlined, my expertise shines. User authentication is a critical component for secure applications and I have ample experience building robust authentication systems. Alongside this, my strong understanding of MVVM architecture enables me to structure applications in a scalable and maintainable manner for easier future updates or changes.', 180, NULL, 0),
(346, 379, 523, 0, '2024-02-06 10:01:59', NULL, NULL, 'Hi, ready to elevate your WordPress site! As an experienced developer, I\'ll craft innovative page templates, revamp layouts for a stunning, user-friendly experience. Let\'s discuss details in DM!', 680, NULL, 0),
(347, 379, 524, 0, '2024-02-06 10:02:48', NULL, NULL, 'With over a decade of experience in MySQL database administration, I have successfully managed diverse ecosystems with several active databases, making me the perfect fit for your project. My main objective is to enhance the performance and reliability of your systems by implementing a robust backup and recovery plan to ensure data security while optimizing slow queries to improve speed and efficiency.', 1500, NULL, 0),
(348, 382, 522, 0, '2024-02-06 10:04:02', NULL, NULL, 'Hi, I am an experienced programmer. I understand exactly what you need. I can do it in 5 days. I promise you will be satisfied with my work. Thank you for your trust.', 150, NULL, 0),
(349, 382, 523, 0, '2024-02-06 10:04:48', NULL, NULL, 'We are interested to help you in this project work. We can assign you an experienced Wordpress Developer who will provide you full technical support according to your requirement and provide you a quick solution', 600, NULL, 0),
(350, 382, 524, 0, '2024-02-06 10:05:22', NULL, NULL, 'I have 8+ years of combined experience in SEO friendly Website designing & development, and other software development and have expertise in PHP and its framework CodeIgniter, Java and its framework spring boot as well as JS frameworks ReactJs and Node.Js, AWS.', 1200, NULL, 0),
(351, 377, 525, 0, '2024-02-06 13:00:23', NULL, NULL, 'I\'m thrilled about the opportunity to work on your Loans & Insurance Comparison Marketplace project! With my skills in Software Testing, Node.js, React.js, Web Development, and Web Design, I am confident in delivering exceptional results. I love collaborating on challenging projects like this. Could you please provide more details about the analytics you\'d like to see on the dashboard? Let\'s discuss how we can bring your vision to life!', 750, NULL, 0),
(352, 380, 525, 0, '2024-02-06 13:01:28', NULL, NULL, 'It will be a pleasure to work together to make your project a reality. Please feel free to contact me. I´m looking forward to working with you. I really appreciate your time and remain attentive to any request or question. Greetings', 700, NULL, 0),
(353, 381, 525, 0, '2024-02-06 13:02:32', NULL, NULL, 'I have the ability to bring your vision into reality while keeping your targeted end-users in focus throughout the process. I appreciate your consideration and look forward to discussing this project with you further.!!', 600, NULL, 0),
(354, 382, 526, 0, '2024-02-07 09:52:44', NULL, NULL, 'I have checked your requirement and I am okay to deliver quality wise SEO work for website. As per google guidelines I will use only legal method and will create only high DA links.', 225, NULL, 0),
(355, 382, 527, 0, '2024-02-07 09:53:25', NULL, NULL, 'Hi, we are experts in React Native hybrid mobile app development. Please, send me a message to discuss the work.', 140, NULL, 0),
(356, 379, 526, 0, '2024-02-07 09:54:21', NULL, NULL, 'I am an SEO expert having 7+ years working experience in this field. I will boost your website visibility in search engine & increase organic website traffic through my high quality SEO services.', 200, NULL, 0),
(357, 379, 527, 0, '2024-02-07 09:54:54', NULL, NULL, 'Hello,If we could have further communication, we may have deeper understanding on your needs and reach a better agreement.\r\n\r\nWe have experience on similar projects, and we actually developed some apps and systems with multiple developing language.\r\n\r\nWe also have experience on international co-op developing across Europe and America. We\'ve accomplished cooperative projects with high ratings.\r\n\r\nLooking forward to your reply.', 130, NULL, 0),
(358, 378, 527, 0, '2024-02-07 09:55:59', NULL, NULL, 'With my extensive 10+ years of experience as a full stack developer specializing in working with frontend and backend technologies like HTML, CSS, Javascript, Bootstrap, React and more. I am well-equipped to seamlessly convert your website into an Android and IOS app. My deep understanding of computer architecture and various levels of software along with a special interest in emerging technologies such as blockchain gives me the edge to handle challenging tasks effectively.', 120, NULL, 0),
(359, 376, 528, 0, '2024-02-08 07:09:48', NULL, NULL, 'Hello There!\r\n\r\nI\'m ready to construct a dynamic WordPress site for pickleball enthusiasts, focusing on education and engagement.\r\n\r\nKey features include rules overview, equipment recommendations, instructional videos, and live updates.\r\n\r\nWith expertise in WordPress, dynamic content integration, and SEO, I aim to create an informative and engaging space inspired by thedinkpickleball.com.\r\n\r\nLet\'s discuss more about this particular job, send me a message to begin!\r\n\r\nThank you.', 250, NULL, 0),
(360, 375, 529, 0, '2024-02-08 07:11:01', NULL, NULL, 'Checked your job description and it says you require Graphic T-Shirt Design Creation.\r\nAll assignments will be delivered to you in accordance with the task and idea requirements.\r\ngraphic design expert with original and cutting-edge concepts.', 430, NULL, 0),
(361, 373, 528, 0, '2024-02-08 09:06:18', NULL, NULL, 'As an adept web developer, I\'m excited about the prospect of crafting a dynamic WordPress hub for pickleball enthusiasts. My experience aligns with your vision. I anticipate discussing further. Thank you!', 225, NULL, 0),
(362, 373, 529, 0, '2024-02-08 09:07:07', NULL, NULL, 'I can easily create or design all kinds of Graphic design work as you are looking designs to \"The beautiful Graphic T-Shirt Design\" .', 400, NULL, 0),
(363, 373, 530, 0, '2024-02-08 09:07:50', NULL, NULL, 'I came across your project and it jumped out at me. I can help you implement effective social media campaigns with compelling content and develop efficient strategies to increase brand awareness and business revenue.\r\n', 800, NULL, 0),
(364, 372, 528, 0, '2024-02-08 09:08:54', NULL, NULL, 'I have more than 10 years of experience with web design and development on WordPress, WooCommerce and I will develop it.', 200, NULL, 0),
(365, 372, 529, 0, '2024-02-08 09:10:29', NULL, NULL, 'I have read your project brief and I am fully confident about the project success , I can do your job in the shortest time frame as possible , I can provide you the best out as per your requirement and you will be 100 % satisfied with my work quality its for sure , because work is my solo identity so I don’t want to loose my identity by providing you the lower quality work ,\r\nYou will get unlimited revisions to ensure your satisfaction ,', 380, NULL, 0),
(366, 372, 530, 0, '2024-02-08 09:11:13', NULL, NULL, 'We\'ll increase your online visibility by regularly updating and marketing on social media.', 780, NULL, 0),
(367, 382, 530, 0, '2024-02-08 09:16:51', NULL, NULL, 'I will help you with Social Media Optimization. I have 10 years of SMO. I am an established marketing professional team, I will execute a strategic plan of social media marketing.', 750, NULL, 0),
(368, 382, 528, 0, '2024-02-08 09:18:28', NULL, NULL, 'After analyzing your link. I am ready to start work on your project right now. I am a professional website developer having 11 years of working experience.', 200, NULL, 0),
(369, 382, 529, 0, '2024-02-08 09:20:08', NULL, NULL, 'hi there,\r\nI am t-shirt designer and graphics designer. I have 10+ years experience. give me work.\r\n\r\nthanks.', 350, NULL, 0),
(370, 379, 529, 0, '2024-02-08 09:21:27', NULL, NULL, 'I understand this is an on going contract for shirt designs. I have access to thousands pieces of artwork that allows me to create unique, eye catching designs for men, women and children’s. I would love to connect and see how we can work together to get your shirts sold!', 300, NULL, 0);
INSERT INTO `my_leads` (`id`, `professional_id`, `lead_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `description`, `amount`, `order_id`, `is_seen`) VALUES
(371, 379, 528, 0, '2024-02-08 09:22:19', NULL, NULL, 'With more than a decade of experience in Web Design & Development, I am well-suited to help you build a professional, sleek, and easy-to-use digital product storefront. My proficiency in Magento 2 | WordPress | Shopify can provide you with the opportunity to explore different platforms that best suit your business needs and ensure a seamless eCommerce experience for your valuable users.', 170, NULL, 0),
(372, 379, 530, 0, '2024-02-08 09:23:15', NULL, NULL, 'I am a professional Social media marketing expert for 8 consecutive years. I can grow your business page, create content, and all must be done naturally.', 700, NULL, 0),
(373, 366, 531, 0, '2024-02-08 11:31:07', NULL, NULL, 'With a proven track record in developing engaging Facebook ad campaigns for e-commerce products, I bring a wealth of experience to the table. I stay abreast of the latest trends and strategies in Facebook advertising, ensuring our campaign remains cutting-edge and effective.', 250, NULL, 0),
(374, 367, 531, 0, '2024-02-08 11:32:01', NULL, NULL, 'After reading your project details, I found that you are looking for Social Media Marketing Expert, I do have huge experience in Managing Social Media Marketing & I can fulfill your requirements', 240, NULL, 0),
(375, 369, 531, 0, '2024-02-08 11:32:39', NULL, NULL, 'I reviewed your requirements and I can see that you are looking to launch a Facebook Ads campaign to increase the brand visibility of e-commerce products and the goal is to boost brand awareness amongst the target audience. I specialize in Facebook ads with 10+years of experience.', 220, NULL, 0),
(376, 379, 531, 0, '2024-02-08 11:33:37', NULL, NULL, 'We can provide you with the best strategy to boost your Facebook Ad campaign and increase the reach of the audience in a shorter period. We believe in quali can deliver quality results that will greatly benefit your business. We can cater to your needs with quality work that will help you to improve your business.', 200, NULL, 0),
(377, 371, 531, 0, '2024-02-08 11:34:20', NULL, NULL, 'Having thoroughly reviewed your project description, I am a seasoned Digital Marketer with expertise in Social Media Marketing, Social Media advertising across platforms like Facebook, Instagram, Twitter, and LinkedIn, proficiency in Facebook pixel and conversion strategies, Email Marketing, Google advertising, and Google Analytics setup. I bring 12 years of valuable experience to the table.', 150, NULL, 0),
(378, 367, 532, 0, '2024-02-09 05:04:21', NULL, NULL, 'With a solid background in mobile app development, featuring both Android and iPhone platforms, I am confident in being the right person for your self-drive car booking app. In-depth expertise in Flutter and React Native allows me to create cross-platform apps with ease and efficiency, fully catering to your needs for compatibility. My experience also encompasses real-time features and map integration, which are vital elements of your project.', 1700, NULL, 0),
(379, 383, 532, 0, '2024-02-09 05:05:28', NULL, NULL, 'Sincerely, I\'m happy to say that I\'ve already worked on a similar Application that you want. I can provide you with solutions for Self-Drive Car Booking App (both Android & iOS) with all features & functionalities, high UI/UX, and easy to navigate.', 1500, NULL, 0),
(380, 385, 532, 0, '2024-02-09 05:06:11', NULL, NULL, 'I\'m a Cross-Platform App developer having 4+ years of experience in services for \"iOS & Android & Web app development\" In addition to your project needs, I\'ll provide you with clean source code, free bug patches, and maintenance.', 1600, NULL, 0),
(381, 369, 532, 0, '2024-02-09 05:07:19', NULL, NULL, 'I am a certified web & mobile app developer with a experience of more than 8 years. I understand your requirement and ready to work with you. Let\'s a meeting to discuss further about your project.', 1400, NULL, 0),
(382, 366, 533, 0, '2024-02-09 05:37:46', NULL, NULL, 'A successful partnership with you would be an absolute pleasure and lead to more opportunities like yours in the future. So go ahead and award me this project; let\'s create something beautiful together!', 750, NULL, 0),
(383, 386, 533, 0, '2024-02-09 05:38:56', NULL, NULL, 'Hello dear, I have the necessary experience for your project.', 700, NULL, 0),
(384, 370, 533, 0, '2024-02-09 05:40:00', NULL, NULL, 'Let\'s discuss your requirements in detail and create a website that not only meets but exceeds your expectations.\r\nLooking forward to the opportunity!', 600, NULL, 0),
(385, 446, 532, 0, '2024-02-17 10:36:06', NULL, NULL, 'hi', 1000, NULL, 0),
(386, 413, 538, 0, '2024-02-17 12:46:09', NULL, NULL, 'I can do this work, please consider my profile', 900, NULL, 0),
(387, 413, 537, 0, '2024-02-17 12:47:08', NULL, NULL, 'I can do this work', 900, NULL, 0),
(388, 447, 520, 0, '2024-02-17 13:13:37', NULL, NULL, '\r\n\r\nI can help with flutter app development project and can deliver very professional work within required deadline.\r\n\r\nBid is negotiable based on project and deadline.\r\nI am an experienced and 5-star rated freelancer with 7+ years in cross platform mobile app development.\r\n\r\nTo know more about me...please visit my portfolio link. https://www.codementor.io/@princerapa', 8000, NULL, 0),
(389, 449, 538, 0, '2024-02-19 08:59:17', NULL, NULL, 'I am interested to complete this task as soon as possible. Hope u consider my profile', 900, NULL, 0),
(390, 449, 536, 0, '2024-02-19 09:01:46', NULL, NULL, 'I am interested in doing this work.', 900, NULL, 0),
(391, 449, 528, 0, '2024-02-19 09:05:10', NULL, NULL, 'I am interested in doing this work', 180, NULL, 0),
(392, 450, 532, 0, '2024-02-19 09:53:26', NULL, NULL, 'I am an experienced mobile developer who can build apps for the clients for both iOS and Android and I have 7+ experience in the Industry I can work for this project and I have been familiar with this idea ', 1500, NULL, 0),
(393, 452, 527, 0, '2024-02-19 13:35:03', NULL, NULL, 'Hai I’m Satish P . I can convert web into android and iOS app ', 100, NULL, 0),
(394, 454, 520, 0, '2024-02-20 03:03:31', NULL, NULL, 'iam a fresher', 240, NULL, 0),
(395, 454, 516, 0, '2024-02-20 03:12:19', NULL, NULL, 'iam ready to work this project', 150, NULL, 0),
(396, 454, 509, 0, '2024-02-20 03:16:48', NULL, NULL, 'iam ready to work this project and also develop an e-commerce app using python. i know html, css, bootstrap, javascript, python and django', 100, NULL, 0),
(397, 454, 477, 0, '2024-02-20 03:21:47', NULL, NULL, 'iam ready to do this and i have skill and experience in HTML, CSS, JavaScript and Python', 300, NULL, 0),
(398, 456, 527, 0, '2024-02-20 06:30:14', NULL, NULL, 'I can concert both in netive, in android in java and in ios in swift ', 100, NULL, 0),
(399, 456, 513, 0, '2024-02-20 06:32:52', NULL, NULL, 'Hi, I can provide this support in ios and android, but in netive and helpb to publish apps also ', 250, NULL, 0),
(400, 456, 512, 0, '2024-02-20 06:35:17', NULL, NULL, 'Hi, sir \r\n\r\nI am ios developer. And can provide you best app according to your requirements and can provide you fully support with app. So let\'s connect and discuss about the apps functions and then can decide the price ', 1500, NULL, 0),
(401, 458, 507, 0, '2024-02-20 07:15:53', NULL, NULL, 'We have a team of five developer, front end, backend and mobile development', 3000, NULL, 0),
(402, 458, 491, 0, '2024-02-20 07:17:48', NULL, NULL, 'Yes we will do', 1400, NULL, 0),
(403, 458, 433, 0, '2024-02-20 07:20:02', NULL, NULL, 'We have a team of five developer, front end, backend and mobile development', 1200, NULL, 0),
(404, 460, 491, 0, '2024-02-20 11:55:14', NULL, NULL, 'Hi, \r\n\r\nGood Day!!!\r\n\r\nI hope you are doing well! \r\n\r\nWe are into Business Consulting Services that deal with Startup and Mid-level Organizations.\r\n\r\nWe are helping you out with level-wise services starting from Business Planning, Branding, Generating Marketing Strategies, Web and Mobile App Development, and Lastly Digital Marketing.\r\n\r\nOur aim is to provide you a platform with the help that you can establish your business in terms of Brand as well as sales.\r\n\r\nPlease feel free to contact us at +91 99244 52489 or drop us an email on ********\r\n\r\nReference Web and Mobile Apps:\r\n\r\nhttps://www.ovintiv.com/\r\nhttps://www.birjuacharyacfp.com/\r\nhttps://atlanticproductions.tv/ \r\nhttps://radicalorange.tv/\r\nhttps://www.bombayshirts.com/collections/all/products/bsc-brush-linen-shirt - Customize shirts brands, Apparel, Clothing\r\nhttps://www.misalosangeles.com - Ladies\' clothing item\r\nhttps://lola-jeans.com - Women\'s Apparel, Clothing\r\nhttps://officialhodgetwins.com - Giant Store For Apparel, Clothing store\r\nhttps://balticborn.com - Clothing\r\nhttps://gustifashion.com - Kid\'s clothing\r\nhttps://teddyfresh.com - Apparel, Clothing store\r\nhttps://www.hoonigan.com - Fashion Store\r\nhttp://www.webcoursesbangkok.com\r\nhttp://www.wealthyyou.com.au\r\nhttps://www.totaltclinic.com/\r\nhttps://nurturelife.com/\r\nhttps://www.holisticdental.com.au/\r\nhttps://www.b2ceurope.eu/\r\nhttp://soldbyerin.com/\r\nhttps://play.google.com/store/apps/details?id=au.com.homely.android\r\nhttps://apps.apple.com/au/app/homely-com-au-real-estate/id1004229463\r\nhttps://tbhivcare.org/\r\nhttps://www.soulcity.org.za/\r\n\r\nI am looking forward to hearing from you.\r\n\r\nThanks and Regards,\r\nAnkit P', 1850, NULL, 0),
(405, 461, 532, 0, '2024-02-20 12:02:43', NULL, NULL, 'Hi client \r\nI can work 40+ hours per week with your time zone,I will work weekend also and commit every day I have rich experience in java programming language for 4+ years \r\nAnd I know about REST api and team work as well so I think I am most matched developer for your task\r\nDeep knowledge of java native development I know that I have no reviews but you can trust me \r\nI will do my best to make the world class result.I want to discuss more details in chatting \r\nThank you', 1000, NULL, 0),
(406, 461, 539, 0, '2024-02-20 12:03:23', NULL, NULL, 'Hi client \r\nI can work 40+ hours per week with your time zone,I will work weekend also and commit every day I have rich experience in java programming language for 4+ years \r\nAnd I know about REST api and team work as well so I think I am most matched developer for your task\r\nDeep knowledge of java native development I know that I have no reviews but you can trust me \r\nI will do my best to make the world class result.I want to discuss more details in chatting \r\nThank you', 250, NULL, 0),
(407, 466, 539, 0, '2024-02-21 10:16:57', NULL, NULL, 'I will develop a multiplatform app for you. In android you will get native experience & In iOS you will get Hybrid experience. I can work upto 45 hour per week.', 240, NULL, 0),
(408, 469, 538, 0, '2024-02-21 14:50:46', NULL, NULL, 'I can do this work', 700, NULL, 0),
(409, 469, 536, 0, '2024-02-21 14:52:47', NULL, NULL, 'Yes I can do this work ', 700, NULL, 0),
(410, 471, 535, 0, '2024-02-22 07:31:01', NULL, NULL, 'I am Rao Yasir a data entry specialist I will work with u and submit assignment at a time without mistakes..', 1500, NULL, 0),
(411, 471, 533, 0, '2024-02-22 08:13:12', NULL, NULL, '\"Dear\r\n\r\nI am writing to express my keen interest in your project. With 3+ YEARS  of experience in WEBSITE DEVELOPMENT , I am well-equipped to contribute effectively to your project\'s success. My expertise includes A PROFESSIONAL WEBSITE DEVELOPER , and I am enthusiastic about the opportunity to leverage these capabilities to meet and exceed your project goals.\r\n\r\nI look forward to the possibility of discussing how my background, skills, and enthusiasm can contribute to your project\'s objectives.\r\n\r\nBest regards,\r\n[MUHAMMAD YASIR WAKEEL]\"', 500, NULL, 0),
(412, 471, 539, 0, '2024-02-22 08:19:05', NULL, NULL, '\"I am excited to inform you that I am well-equipped to develop a multiplatform application tailored to your needs. With my expertise, Android users can expect a seamless native experience, while iOS users will enjoy the benefits of a hybrid experience. I am committed to delivering a high-quality app that meets your requirements and provides an exceptional user experience across both platforms.\"', 210, NULL, 0),
(413, 472, 520, 0, '2024-02-22 08:22:02', NULL, NULL, 'A highly motivated and results-oriented Senior MERN Stack Developer with 3+ years of experience seeking a remote opportunity to contribute to exciting and impactful projects. Possesses in-depth knowledge of the full MERN stack (React, Node.js, Express, MongoDB) and a proven track record of building and deploying robust, scalable web applications. Strong collaborative and communication skills, thrives in a remote work environment.\r\n\r\nTechnical Skills:\r\n\r\nFrontend:\r\nReact (including experience with frameworks/libraries like Redux, Next.js)\r\nHTML5, CSS3, JavaScript\r\nBackend:\r\nNode.js with in-depth experience in Express.js\r\nAPI development and design\r\nDeployment tools (AWS, Heroku, etc.)\r\nDatabase:\r\nMongoDB (including aggregation queries and data modeling)\r\nTesting:\r\nUnit testing (Jest, Mocha)\r\nIntegration testing\r\nEnd-to-end testing (Cypress, Selenium)\r\nVersion control: Git\r\nAdditional Skills (optional):\r\n\r\nCloud deployment (AWS, Heroku, Google Cloud)\r\nDevOps tools (Docker, Kubernetes)\r\nContinuous integration/continuous delivery (CI/CD)\r\nProject management methodologies (Agile, Scrum)', 1000, NULL, 0),
(414, 473, 509, 0, '2024-02-22 08:53:20', NULL, NULL, 'Proposal for Website Development Project\r\n\r\nI am excited to send proposel for  the development of a website based on the Figma file provided. The website will be designed to showcase the client\'s products and services in an engaging and user-friendly.\r\n\r\n\r\n\r\nOur estimated cost for this website development project is $700. This includes all aspects of the development process, from design implementation.\r\n\r\nIf you are interested in moving forward with this proposal, we would be happy to schedule a meeting to discuss the project in more detail and answer any questions you may have. Please let me know your availability so we can coordinate a time that works for you.\r\n\r\nWe look forward to the opportunity to work with you on this exciting project and bring your vision to life on the web. Thank you for considering my proposal.', 700, NULL, 0),
(415, 476, 533, 0, '2024-02-22 10:23:30', NULL, NULL, 'I am experienced web developer with 5 years of experience and interested in working with you.\r\nwill convert your word to reality', 400, NULL, 0),
(416, 477, 465, 0, '2024-02-22 11:30:44', NULL, NULL, 'I\'m particularly interested in this project and believe my skills can be valuable in achieving your goals. I\'d be happy to discuss my ideas and approach in more detail during a call at your convenience.', 450, NULL, 0),
(417, 478, 506, 0, '2024-02-22 11:53:40', NULL, NULL, ' I gone through your requirements and understand that you are looking for a expert node.js developer to work on your projects.\r\n\r\nI have 8 years of professional experience with nodejs and many technologies.\r\n\r\nPlease feel free to contact me for further discussion.', 1200, NULL, 0),
(418, 478, 525, 0, '2024-02-22 12:34:10', NULL, NULL, 'i gone through your requirements and i totally understand it.\r\n\r\nI have 8 years of experince on React and node and had similar experince.\r\n\r\nI can easily complete your project on given timeline.\r\nI will try to complete it in minimum budget.\r\n\r\nI am eager to start work on your project and will provide best outcome of your project.\r\n\r\nlet\'s connect and start work on your project.\r\n\r\nThank you.', 750, NULL, 0),
(419, 483, 539, 0, '2024-02-22 14:17:39', NULL, NULL, 'Hello, i see your requirement. I have ready solution available for both IOS and Android. Lets discuss it. Thanks', 250, NULL, 0),
(420, 484, 539, 0, '2024-02-22 14:18:22', NULL, NULL, 'Hi I am website developer I can create website just send message me on WhatsApp+916284957785 and check demo ', 230, NULL, 0),
(421, 484, 519, 0, '2024-02-22 14:19:48', NULL, NULL, 'Hi I am website developer I can create any type of website just send message on WhatsApp+916284957785 and check demo it\'s free ', 700, NULL, 0),
(422, 486, 533, 0, '2024-02-22 16:07:21', NULL, NULL, 'Hi i am professional software engineer. Experience in developing all kind of web mobile and desktop applications. I have expertise and team to bring your idea live. We are expert in providing quality product. We are providing satisfying services. Please feel free to contact us.', 600, NULL, 0),
(423, 481, 507, 0, '2024-02-22 20:52:47', NULL, NULL, 'I have a team of experienced full-stack web developers with huge projects in their portfolio', 4500, NULL, 0),
(424, 471, 532, 0, '2024-02-23 03:50:55', NULL, NULL, 'With over 8 years of extensive experience as a certified web and mobile app developer, I possess a deep understanding of your requirements and am fully prepared to collaborate with you. My expertise and dedication ensure that I am well-equipped to meet your project\'s needs and deliver exceptional results. I eagerly anticipate the opportunity to work with you.', 1500, NULL, 0),
(425, 460, 542, 0, '2024-02-23 05:53:23', NULL, NULL, 'Hi, \r\n\r\nGood Evening!!!\r\n\r\nI hope you are doing well! \r\n\r\nWe will surely help you out to build your website in your budget.\r\n\r\nWe are helping you out with level-wise services starting from Business Planning, Branding, Generating Marketing Strategies, Web and Mobile App Development, and Lastly Digital Marketing.\r\n\r\nOur aim is to provide you a platform with the help that you can establish your business in terms of Brand as well as sales.\r\n\r\nPlease feel free to contact us at +91 99244 52489 or drop us an email on ********\r\n\r\nReference Websites:\r\n\r\nhttps://www.bombayshirts.com/collections/all/products/bsc-brush-linen-shirt  - Customize shirts brands, Apparel, Clothing\r\n\r\nhttps://www.misalosangeles.com  - Ladies\' clothing item\r\n\r\nhttps://lola-jeans.com  - Women\'s Apparel, Clothing\r\n\r\nhttps://rekucci.com  - Clothing\r\n\r\nhttps://officialhodgetwins.com  - Giant Store For Apparel, Clothing store\r\n\r\nhttps://balticborn.com  - Clothing\r\n\r\nhttps://gustifashion.com  - Kid\'s clothing\r\n\r\nhttps://teddyfresh.com  - Apparel, Clothing store\r\n\r\nhttps://www.hoonigan.com  - Fashion Store\r\n\r\nhttps://www.jwhulmeco.com  - Bags, BriefCases, Apparel store\r\n\r\nhttps://arthurmontreal.com  - Fashion stores\r\n\r\nhttps://bootsonline.com.au  - Shoe stores\r\n\r\nhttp://frenchlingerieshop.com  - Lingerie / fashion stores\r\n\r\nhttp://northernsouvenirs.ca  - Apparel stores B2B\r\n\r\nhttp://www.uniformaustralia.com.au  - Corporate uniform stores B2C / B2B\r\n\r\nhttps://www.selecti.be  - Fashion stores\r\n\r\nhttp://moneysworth-best.com  - Shoe accessories stores\r\n\r\nhttps://uniquebatik.us  - Vintage items B2C / B2B stores\r\n\r\nhttps://www.evenskyn.com  - Beauty Products\r\n\r\nhttps://blushbar.com.au  - Giant Hair And Beauty Solution Store\r\n\r\nhttps://blackopalbeauty.com  - Skincare, Beauty Products\r\n\r\nhttps://instanatural.com  - Skincare, Beauty Care, and Wellness Products\r\n\r\nhttps://borboletabeauty.com  - Beauty Products\r\n\r\nhttps://arda-wigs.com  - Cosplay, Anime, Costume & Fashion Wigs Supplier\r\n\r\nhttp://younifiwellness.com  - MLM for Wellness products\r\n\r\nhttps://www.needly.com.au  - Food & Grocery stores\r\n\r\nhttps://vetslovepets.com.au  - Pets stores\r\n\r\nhttp://grasslandbeef.com  - Beef stores\r\n\r\nhttps://spesarecord.it  - Grocery Multiple Vendor Marketplace\r\n\r\nhttps://www.mayfairfresh.com.au  - Grocery stores\r\n\r\nhttp://aliments-st-germain.com  - Candy stores\r\n\r\nI am looking forward to hearing from you.\r\n\r\nThanks and Regards,', 5500, NULL, 0),
(426, 460, 540, 0, '2024-02-23 05:54:06', NULL, NULL, 'Hi, \r\n\r\nGood Evening!!!\r\n\r\nI hope you are doing well! \r\n\r\nWe will surely help you out to build your website in your budget.\r\n\r\nWe are helping you out with level-wise services starting from Business Planning, Branding, Generating Marketing Strategies, Web and Mobile App Development, and Lastly Digital Marketing.\r\n\r\nOur aim is to provide you a platform with the help that you can establish your business in terms of Brand as well as sales.\r\n\r\nPlease feel free to contact us at +91 99244 52489 or drop us an email on ********\r\n\r\nReference Websites:\r\n\r\nhttps://www.bombayshirts.com/collections/all/products/bsc-brush-linen-shirt  - Customize shirts brands, Apparel, Clothing\r\n\r\nhttps://www.misalosangeles.com  - Ladies\' clothing item\r\n\r\nhttps://lola-jeans.com  - Women\'s Apparel, Clothing\r\n\r\nhttps://rekucci.com  - Clothing\r\n\r\nhttps://officialhodgetwins.com  - Giant Store For Apparel, Clothing store\r\n\r\nhttps://balticborn.com  - Clothing\r\n\r\nhttps://gustifashion.com  - Kid\'s clothing\r\n\r\nhttps://teddyfresh.com  - Apparel, Clothing store\r\n\r\nhttps://www.hoonigan.com  - Fashion Store\r\n\r\nhttps://www.jwhulmeco.com  - Bags, BriefCases, Apparel store\r\n\r\nhttps://arthurmontreal.com  - Fashion stores\r\n\r\nhttps://bootsonline.com.au  - Shoe stores\r\n\r\nhttp://frenchlingerieshop.com  - Lingerie / fashion stores\r\n\r\nhttp://northernsouvenirs.ca  - Apparel stores B2B\r\n\r\nhttp://www.uniformaustralia.com.au  - Corporate uniform stores B2C / B2B\r\n\r\nhttps://www.selecti.be  - Fashion stores\r\n\r\nhttp://moneysworth-best.com  - Shoe accessories stores\r\n\r\nhttps://uniquebatik.us  - Vintage items B2C / B2B stores\r\n\r\nhttps://www.evenskyn.com  - Beauty Products\r\n\r\nhttps://blushbar.com.au  - Giant Hair And Beauty Solution Store\r\n\r\nhttps://blackopalbeauty.com  - Skincare, Beauty Products\r\n\r\nhttps://instanatural.com  - Skincare, Beauty Care, and Wellness Products\r\n\r\nhttps://borboletabeauty.com  - Beauty Products\r\n\r\nhttps://arda-wigs.com  - Cosplay, Anime, Costume & Fashion Wigs Supplier\r\n\r\nhttp://younifiwellness.com  - MLM for Wellness products\r\n\r\nhttps://www.needly.com.au  - Food & Grocery stores\r\n\r\nhttps://vetslovepets.com.au  - Pets stores\r\n\r\nhttp://grasslandbeef.com  - Beef stores\r\n\r\nhttps://spesarecord.it  - Grocery Multiple Vendor Marketplace\r\n\r\nhttps://www.mayfairfresh.com.au  - Grocery stores\r\n\r\nhttp://aliments-st-germain.com  - Candy stores\r\n\r\nI am looking forward to hearing from you.\r\n\r\nThanks and Regards,', 10000, NULL, 0),
(427, 492, 489, 0, '2024-02-23 08:47:12', NULL, NULL, 'Hello,\r\nI hope this message finds you well. My name is Hassan Azouzout, a full-stack MERN Developer with a passion for creating engaging and interactive web experiences. I am reaching out to express my interest in the web development project you\'re seeking a developer for.\r\n\r\nHaving worked on numerous projects that align closely with your requirements, I am confident in my ability to contribute effectively to your existing e-commerce website.\r\n\r\nMy experience spans across the MERN stack, allowing me to seamlessly integrate and maintain both front-end and back-end components of your project. I am particularly adept at working with e-commerce platforms, especially those dealing with physical products, ensuring a smooth and efficient user experience.\r\n\r\nI understand the importance of a clean, user-friendly design and am committed to maintaining and improving your website and databases to ensure they remain up-to-date and functional.\r\n\r\nMy portfolio https://hassanwebdev.vercel.app , which showcases a range of projects similar to yours, demonstrates my proficiency in web development and my ability to deliver high-quality work.\r\n\r\nThank you for considering my proposal, looking forward to discussing the project details with you further and working together.\r\nPlease let me know if you have any questions or need more information.\r\n\r\nBest regards,\r\nHassan.', 800, NULL, 0),
(428, 496, 542, 0, '2024-02-23 10:20:18', NULL, NULL, 'I have 4 year experience for this work.\r\n', 5000, NULL, 0),
(429, 493, 542, 0, '2024-02-23 10:55:05', NULL, NULL, 'Hi, I hope you are doing well! We will surely help you out to build your website. \r\nDEMO LINK - https://play.google.com/store/apps/details?id=com.iconic.socialv&hl=en&gl=US&pli=1 \r\n', 4000, NULL, 0),
(430, 493, 540, 0, '2024-02-23 11:35:17', NULL, NULL, 'Greetings! Are you in need of a stunning and functional website to establish your online presence or enhance your existing one? Look no further! I offer expert WordPress website development services tailored to meet your unique needs.', 105, NULL, 0),
(431, 493, 539, 0, '2024-02-23 11:42:38', NULL, NULL, 'URBAN CLAP CLONE\r\nU Clab Service app is Complete Solution for Your Service Business.( U\r\nClab App Created By Cander Developers ). Through this app you can\r\nbook your service at home. Beauty, Health Service, AC repair, Fitness\r\nTrainer At Home, Sofa Cleaning, Car Washing, SPA At Home, Yoga\r\nTrainer and etc. In this app User can easily Book Service at home. And\r\nuser Can call the worker for there work Status. In This App all\r\nWorker Verified by Admin with Validate Information And admin\r\nmanage all thing. If you want to start own U Clab Service App. This is\r\nComplete Solution.\r\nWhatsApp - https://wa.me/919111015030\r\nTry Demo App & Admin Panel\r\nApphttps://drive.google.com/file/d/1YYNlqvwULdmBMwN0zW\r\nuksKO1hiID4B13/view?usp=sharing\r\nApp: https://doc.canders.in/apk/U_Clab_v_6.apk\r\nAdmin Panel: https://uclab.canders.in\r\nAdmin Login\r\nUsername: ********\r\nPassword: 12345678\r\nCustomer Login\r\nUsername: ********\r\nPassword: 12345678\r\nWorker Login\r\nUsername: ********\r\nPassword: 12345678', 250, NULL, 0),
(432, 498, 507, 0, '2024-02-23 13:54:21', NULL, NULL, 'Hi,\r\n\r\nI have a vast experience in mobile application development right from 2010. I have extensive experience in designing and developing react-native based cross-platform apps for iOS and Android.\r\n\r\nI have also worked on various native iOS App using objective-c and Swift.\r\n\r\nRequest to have a look on my profile history here - https://www.upwork.com/freelancers/~011cdbdb8973bf672d\r\n\r\nLooking forward to work with you in this project.\r\n\r\nRegards, Rizwan', 6000, NULL, 0),
(433, 499, 543, 0, '2024-02-23 15:55:56', NULL, NULL, 'I have 5 years experience in software engineer, with expertise in \r\nNextjs\r\nReactjs\r\nNodejs\r\nSolidity\r\nReact native\r\nRedis\r\nMysql\r\nMongodb', 800, NULL, 0),
(434, 499, 542, 0, '2024-02-23 15:56:23', NULL, NULL, 'I have 5 years experience in software engineer, with expertise in \r\nNextjs\r\nReactjs\r\nNodejs\r\nSolidity\r\nReact native\r\nRedis\r\nMysql\r\nMongodb', 5000, NULL, 0),
(435, 499, 533, 0, '2024-02-23 15:57:10', NULL, NULL, 'I have 5 years experience in software engineer, with expertise in \r\nNextjs\r\nReactjs\r\nNodejs\r\nSolidity\r\nReact native\r\nRedis\r\nMysql\r\nMongodb', 1000, NULL, 0),
(436, 499, 532, 0, '2024-02-23 15:57:47', NULL, NULL, 'I have 5 years experience in software engineer, with expertise in \r\nNextjs\r\nReactjs\r\nNodejs\r\nSolidity\r\nReact native\r\nRedis\r\nMysql\r\nMongodb', 1800, NULL, 0),
(437, 499, 516, 0, '2024-02-23 15:59:09', NULL, NULL, 'I have 5 years experience in software engineer, with expertise in \r\nNextjs\r\nReactjs\r\nNodejs\r\nSolidity\r\nReact native\r\nRedis\r\nMysql\r\nMongodb', 1800, NULL, 0),
(438, 413, 543, 0, '2024-02-23 16:30:17', NULL, NULL, 'I can do this work in 700 USD, please consider me.', 700, NULL, 0),
(439, 501, 533, 0, '2024-02-23 17:43:31', NULL, NULL, 'i am a MERN stack developer. i have created social media app where you can post your things follow other users and other. i have also created e-commerce website. feel free to contact me on ******** for further discussions. i would love to chat more about the project', 400, NULL, 0),
(440, 471, 543, 0, '2024-02-24 00:48:10', NULL, NULL, 'I can do this work in 750 USD, please consider me I am will this work professionally..', 750, NULL, 0),
(441, 413, 541, 0, '2024-02-24 04:45:29', NULL, NULL, 'I can do this project, I have already build one software like this in past.', 3500, NULL, 0),
(442, 494, 542, 0, '2024-02-24 07:46:03', NULL, NULL, 'I am writing to express my interest in your E-commerce project. With a proven track record in developing robust and scalable online platforms, I am confident in my ability to bring your vision to life. Let\'s Discuss about your Requirement.', 3000, NULL, 0),
(443, 502, 498, 0, '2024-02-24 09:27:45', NULL, NULL, 'I have 6.5 years of experience in React JS,typescript,redux,saga,jest,css/scss,material UI,ant design,I have done more than 10 project in react js, \r\nI have played role techincal lead as well as front end developer\r\nI think we can discuss about the project. If you are looking for a experienced professional in react js\r\nContact me now and let\'s discuss', 2300, NULL, 0),
(444, 501, 540, 0, '2024-02-25 06:23:03', NULL, NULL, 'i can make your website in that budget in reactjs which creates alot better website for same budget. send me mail in ******** i will send you my cv, we can have a call and start project immediately.', 100, NULL, 0),
(445, 509, 542, 0, '2024-02-26 08:48:19', NULL, NULL, 'At iB Arts, our unwavering commitment lies in delivering excellence and ensuring client satisfaction. With over 7 years of expertise, we take pride in our proven track record of successfully executed projects.\r\n\r\nExplore our portfolio at www.ibarts.in to witness the caliber of our work firsthand.\r\n\r\nWe are genuinely excited about the opportunity to collaborate with you and bring your vision to life!', 4500, NULL, 0),
(446, 509, 543, 0, '2024-02-26 09:00:36', NULL, NULL, 'At iB Arts, our unwavering commitment lies in delivering excellence and ensuring client satisfaction. With over 7 years of expertise in web and app development, we take pride in our proven track record of successfully executed projects.\r\n\r\nExplore our portfolio at www.ibarts.in to witness the caliber of our work firsthand.\r\n\r\nWe are genuinely excited about the opportunity to collaborate with you and bring your vision to life!', 800, NULL, 0),
(447, 509, 541, 0, '2024-02-26 09:15:44', NULL, NULL, 'At iB Arts, our unwavering commitment lies in delivering excellence and ensuring client satisfaction. With over 7 years of expertise in web and app development, we take pride in our proven track record of successfully executed projects. We also have a history of delivering similar projects like yours with utmost client satisfaction.\r\n\r\nExplore our portfolio at www.ibarts.in to witness the caliber of our work firsthand.\r\n\r\nWe are genuinely excited about the opportunity to collaborate with you and bring your vision to life!', 3500, NULL, 0),
(448, 493, 531, 0, '2024-02-26 11:42:08', NULL, NULL, '\r\nI looked over your specifications and noticed that you want to start a Facebook Ads campaign to raise e-commerce\'s brand awareness.', 200, NULL, 0),
(449, 493, 523, 0, '2024-02-26 11:52:53', NULL, NULL, '\"Theme customizations, focusing primarily on overhauling layouts and structures\" is the project description that I have seen, and it can be', 650, NULL, 0),
(450, 511, 542, 0, '2024-02-26 14:18:15', NULL, NULL, 'We are a group of 50+ Freelancers, have executed and built many project. www.warpvision.in(under New website development). +91-********** can connect us', 6000, NULL, 0),
(451, 512, 543, 0, '2024-02-26 14:59:01', NULL, NULL, 'I can build your app easily. Visit My portfolio at https://tundephilps-portfolio.vercel.app/portfolio', 750, NULL, 0),
(452, 481, 542, 0, '2024-02-26 18:17:40', NULL, NULL, 'If you\'re looking for a modern and outstanding website feel free to reach out to me. I have 5 years of experience and a great portfolio to back it up!', 4500, NULL, 0),
(453, 517, 542, 0, '2024-02-27 05:55:37', NULL, NULL, 'Hello,\r\nWe are experts in Laravel Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.', 2500, NULL, 0),
(454, 517, 543, 0, '2024-02-27 05:57:05', NULL, NULL, 'Hello,\r\nWe are experts in Android/iOS Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.', 700, NULL, 0),
(455, 517, 540, 0, '2024-02-27 05:58:24', NULL, NULL, 'Hello,\r\nWe are experts in Laravel Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.\r\nPlease note that the provided rate is for hourly basis', 15, NULL, 0),
(456, 517, 539, 0, '2024-02-27 06:08:05', NULL, NULL, 'Hello,\r\nWe are experts in Android/iOS App Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.\r\nNote: The rate is for hourly basis', 15, NULL, 0),
(457, 517, 519, 0, '2024-02-27 06:11:06', NULL, NULL, '\r\nHello,\r\nWe are experts in Website Development with 13+ years of professional experience working with clients from USA, UK, Australia, France, Germany, Belgium and many more. Our developer team has experience working on 500+ projects. We also provide trial 8-12 hrs of development service to build trust and better cater to your needs.\r\nContact us at ********', 15, NULL, 0),
(458, 518, 541, 0, '2024-02-27 06:53:26', NULL, NULL, 'Hello there, \r\nWe are excited to introduce our comprehensive project management software, designed to streamline your project workflows, enhance collaboration, and drive productivity.\r\n\r\nKey Features:\r\n- **Task Management**: Assign tasks, set deadlines, and track progress effortlessly.\r\n- **Team Collaboration**: Foster real-time collaboration with built-in communication tools and shared workspaces.\r\n- **Time Tracking**: Monitor project hours and analyze resource allocation for optimal efficiency.\r\n- **Customizable Dashboards**: Gain insights at a glance with personalized dashboards tailored to your specific needs.\r\n- **File Sharing**: Seamlessly share documents, images, and other project files within the platform.\r\n- **Integration Capabilities**: Integrate with popular tools like Slack, Trello, and Google Drive for enhanced functionality.\r\n- **Security**: Rest assured with robust security measures to protect your sensitive project data.\r\n\r\nWe understand the importance of finding the right project management solution to meet your unique requirements. That\'s why our software offers flexibility, scalability, and user-friendly interface, ensuring a seamless experience for your team.\r\n\r\nWould you be interested in scheduling a demo to see how our software can revolutionize your project management process? Please let us know your availability, and we\'ll be more than happy to accommodate.\r\n\r\nThank you for considering our project management software. We look forward to the opportunity to work with you and support your project management needs.', 4500, NULL, 0),
(459, 518, 540, 0, '2024-02-27 06:55:08', NULL, NULL, 'Hello there, \r\nI\'m reaching out to introduce our comprehensive WordPress website solutions, crafted to empower your online presence and drive meaningful results for your business.\r\n\r\nKey Features:\r\n- **Custom Design**: Tailored WordPress themes designed to reflect your brand identity and captivate your audience.\r\n- **Responsive Layouts**: Mobile-friendly designs ensure seamless user experiences across all devices.\r\n- **Content Management**: Easily update and manage your website content with WordPress\'s intuitive interface.\r\n- **SEO Optimization**: Built-in SEO features to help improve your website\'s visibility and attract more organic traffic.\r\n- **E-commerce Integration**: Seamlessly integrate e-commerce functionality to sell products or services directly from your website.\r\n- **Performance Optimization**: Fast-loading pages and optimized performance for enhanced user satisfaction and search engine rankings.\r\n- **Security**: Robust security measures to protect your website from potential threats and vulnerabilities.\r\n\r\nWhether you\'re looking to establish a professional online presence, generate leads, or sell products/services online, our WordPress website solutions offer the flexibility and scalability to meet your specific goals.\r\n\r\nWould you be interested in scheduling a consultation to discuss your website needs in more detail? We\'d love the opportunity to understand your requirements and tailor a solution that best fits your business.\r\n\r\nThank you for considering our WordPress website services. We\'re committed to helping you succeed online and look forward to the possibility of working together.\r\n', 110, NULL, 0),
(460, 518, 542, 0, '2024-02-27 06:57:23', NULL, NULL, '\r\n\r\nI trust this message finds you well. I\'m excited to introduce our cutting-edge social media website solutions, designed to revolutionize the way you engage with your audience and build a thriving online community.\r\n\r\nKey Features:\r\n- **Custom Social Network**: Tailored social media platforms built to reflect your brand identity and cater to your audience\'s interests.\r\n- **User Profiles and Networking**: Enable users to create profiles, connect with others, and build meaningful relationships within your community.\r\n- **Content Sharing**: Empower users to share posts, images, videos, and other content seamlessly across the platform.\r\n- **Real-time Interactions**: Foster real-time interactions with features like comments, likes, shares, and messaging.\r\n- **Community Management Tools**: Administer your social network effortlessly with robust moderation and management tools.\r\n- **Monetization Options**: Explore various monetization strategies such as advertising, subscriptions, and sponsored content to generate revenue.\r\n- **Analytics and Insights**: Gain valuable insights into user behavior, engagement metrics, and content performance to optimize your strategy.\r\n\r\nWhether you\'re looking to create a niche community, foster user-generated content, or drive brand advocacy, our social media website solutions offer the flexibility and scalability to meet your objectives.\r\n\r\nWould you be interested in scheduling a consultation to discuss your social media project in more detail? We\'d love the opportunity to understand your vision and tailor a solution that aligns with your goals.\r\n\r\nThank you for considering our social media website services. We\'re dedicated to helping you build a vibrant online community and look forward to the possibility of collaborating with you.', 5500, NULL, 0),
(461, 518, 543, 0, '2024-02-27 06:59:49', NULL, NULL, '\r\n\r\nI hope this message finds you well. I am writing to present a proposal for an exciting project aimed at enhancing your customer onboarding process through a custom React Native application.\r\n\r\n**Project Overview:**\r\nWe propose the development of a mobile application built on the React Native framework, tailored specifically to streamline your customer onboarding procedures. This application will allow your team to efficiently collect and manage customer data directly from their mobile devices, ensuring a seamless and personalized onboarding experience.\r\n\r\n**Key Features:**\r\n1. **Simple Data Collection**: An intuitive interface for capturing essential customer information such as name, email, contact details, and any additional data points relevant to your onboarding process.\r\n2. **Local Data Storage**: Securely store customer data locally on the user\'s mobile device using AsyncStorage, ensuring data privacy and accessibility even without an internet connection.\r\n3. **Export Functionality**: Enable users to export collected customer data as .xlsx files directly from the application, simplifying data management and analysis.\r\n4. **Email Integration**: Seamlessly integrate email functionality to allow users to send exported .xlsx files to designated email addresses, facilitating easy sharing and collaboration.\r\n5. **Customization Options**: Tailor the application to your unique branding and requirements, ensuring a cohesive and professional user experience aligned with your company\'s identity.\r\n\r\n**Benefits:**\r\n- **Streamlined Process**: Eliminate manual paperwork and streamline your customer onboarding process with a user-friendly mobile application.\r\n- **Data Security**: Ensure the security and confidentiality of customer information by storing data locally on the user\'s device, reducing the risk of data breaches.\r\n- **Enhanced Productivity**: Empower your team to collect, manage, and share customer data efficiently, saving time and resources.\r\n- **Improved Customer Experience**: Provide a seamless and personalized onboarding experience for your customers, enhancing satisfaction and retention.\r\n\r\n**Next Steps:**\r\nIf you are interested in moving forward with this project, we would be delighted to schedule a meeting to discuss your specific requirements in more detail. Our team is committed to delivering a high-quality solution tailored to your needs and objectives.\r\n\r\nThank you for considering our proposal. We look forward to the opportunity to collaborate with you and contribute to the success of your customer onboarding initiatives.', 800, NULL, 0),
(463, 520, 540, 0, '2024-02-27 17:18:43', NULL, NULL, 'Sure, I can create a basic WordPress website for you. Let\'s discuss your requirements in more detail. When are you available for a quick call or meeting?', 70, NULL, 0),
(464, 520, 542, 0, '2024-02-27 17:32:45', NULL, NULL, 'Sure, we can develop a social media website using Laravel. Let\'s discuss your requirements.', 5000, NULL, 0),
(465, 520, 529, 0, '2024-02-27 17:34:58', NULL, NULL, 'Hi there,\r\n\r\nSure thing! Here\'s a concise response:\r\n\r\n\"Hi Client\'s,\r\n\r\nI appreciate the opportunity! I specialize in graphic design and T-shirt designs. My skills include creative thinking, attention to detail, and expertise in graphic design. While I don\'t have a specific deadline, I assure you a quality and unique design. Looking forward to working together.\r\n\r\nBest,\r\nYazdan Shaikh', 300, NULL, 0),
(466, 522, 536, 0, '2024-02-28 12:14:32', NULL, NULL, 'Hi', 2147483647, NULL, 0),
(467, 524, 543, 0, '2024-02-29 05:18:54', NULL, NULL, 'Will provide CSV export functionality which you can open in excel, Please confirm with the other developer as well if he provide you csv or excel before starting,', 550, NULL, 0),
(468, 526, 542, 0, '2024-02-29 05:34:27', NULL, NULL, 'HI\r\nI  have  experience in web development.\r\nMy area of working is as follow:\r\nBack-end: PHP,JAVA,.Net, cURL, Web Services, API Integrations , Wordpress Plugin Development.\r\nPHP Frameworks: Codeigniter, Laravel .\r\nAPIs: Twitter, Face-book, Google DFP, Google Maps, Amazon, eBay etc.\r\nDatabases: -MongoDB, MySQL, PostgreSQL, SQLServer, SQLite\r\nJavaScript: AJAX, jQuery, Angularjs, React, TypeScript, NextJS - NodeJS, ExpressJS.\r\n\r\nFront-end: HTML, CSS and Twitter-Bootstrap, Wordpress.\r\nRepository Management: Git,Bitbucket.\r\n\r\nWe have currently working in React\r\n\r\n\r\nRegards\r\nHitesh Chanchiya', 5000, NULL, 0),
(469, 526, 545, 0, '2024-02-29 10:30:33', NULL, NULL, 'Hi\r\n\r\nI have 7 + years of experience developer and I have also work on WordPress and Custom Plugin Development or Plugin Attachment.\r\n\r\nThanks.', 250, NULL, 0),
(470, 526, 540, 0, '2024-02-29 10:37:04', NULL, NULL, 'Hi \r\nI have 7 + years experience developer and I have also work on Wordpress CMS Like Wordpress Theme Development,Custom Plugin Development,PSD to Wordpress,Blogin Website etc...\r\n\r\nThanks.', 100, NULL, 0),
(471, 413, 545, 0, '2024-02-29 11:55:48', NULL, NULL, 'I can do this work, I have more than 10 years of experience on wordpress and shopify', 999, NULL, 0),
(472, 533, 545, 0, '2024-03-07 07:23:33', NULL, NULL, 'Hi,\r\n\r\nInterested to design and develop your wordpress website. Pretty confident to undertake the task and interested for further discussions.\r\n\r\nMy Portfolio Works :\r\n\r\nhttps://elementstate.com/\r\nhttps://tcaworldwide.com/\r\nhttps://www.papasbay.com/\r\nhttps://www.aloeveda.com/\r\nhttps://e-tuitions.com/\r\nhttps://simplife.ae/\r\nhttps://www.infis.in/\r\nhttps://foxl.co/\r\n\r\nHope I will get a positive reply,\r\nRegards,\r\nKrishna.\r\n(S) : unniupf', 900, NULL, 0),
(473, 533, 542, 0, '2024-03-07 07:31:26', NULL, NULL, 'Dear Sir, \r\n\r\nInterested to design and develop your social media website using Laravel. Pretty confident to undertake the task and interested for further discussions.\r\n\r\nOur Portfolio Works :\r\n\r\nhttps://elementstate.com/\r\nhttps://tcaworldwide.com/\r\nhttps://www.papasbay.com/\r\nhttps://www.aloeveda.com/\r\nhttps://e-tuitions.com/\r\nhttps://simplife.ae/\r\nhttps://www.infis.in/\r\nhttps://foxl.co/\r\n\r\nHope I will get a positive reply,\r\nRegards,\r\nKrishna,\r\n(S) : unniupf', 1000, NULL, 0),
(474, 533, 541, 0, '2024-03-07 07:33:26', NULL, NULL, 'Dear Sir, \r\n\r\nInterested to design and develop your project management software. Pretty confident to undertake the task and interested for further discussions.\r\n\r\nAlready I have readymade solution for CRM as well.\r\n\r\nOur Portfolio Works :\r\n\r\nhttps://elementstate.com/\r\nhttps://tcaworldwide.com/\r\nhttps://www.papasbay.com/\r\nhttps://www.aloeveda.com/\r\nhttps://e-tuitions.com/\r\nhttps://simplife.ae/\r\nhttps://www.infis.in/\r\nhttps://foxl.co/\r\n\r\nHope I will get a positive reply,\r\nRegards,\r\nKrishna,\r\n(S) : unniupf', 2000, NULL, 0),
(475, 533, 533, 0, '2024-03-07 07:36:29', NULL, NULL, 'Dear Sir, \r\n\r\nInterested to design and develop your informational website with ecommerce functionality. Pretty confident to undertake the task and interested for further discussions.\r\n\r\nOur Portfolio Works :\r\n\r\nhttps://elementstate.com/\r\nhttps://tcaworldwide.com/\r\nhttps://www.papasbay.com/\r\nhttps://www.aloeveda.com/\r\nhttps://e-tuitions.com/\r\nhttps://simplife.ae/\r\nhttps://www.infis.in/\r\nhttps://foxl.co/\r\n\r\nHope I will get a positive reply,\r\nRegards,\r\nKrishna,\r\n(S) : unniupf', 600, NULL, 0),
(476, 537, 527, 0, '2024-03-09 16:08:05', NULL, NULL, 'Hi there,\r\nI am Shoaib, a React Native Developer. I will convert the site into an iOS and Android App. Feel free to share the details. ', 50, NULL, 0),
(477, 538, 545, 0, '2024-03-11 06:18:00', NULL, NULL, 'Hi, my team has build multiple wordpress, shopify & Coded websites in the past 15 years, kindly allow us an opportunity to discuss that what can we do for you', 350, NULL, 0),
(478, 538, 540, 0, '2024-03-11 06:20:34', NULL, NULL, 'We can work on your budget, kindly allow us a chance to discuss with you the milestones that we can achieve together', 120, NULL, 0),
(479, 540, 498, 0, '2024-03-11 10:29:23', NULL, NULL, 'Ready to start!', 2500, NULL, 0),
(480, 542, 541, 0, '2024-03-12 07:23:34', NULL, NULL, 'Hello hiring member i am hitesh tank i am having 7 +Years experience in laravel php, flutter , ajax, jquery , javascript, html,css , bootstrap and many more things, i can start this project right now so let me know if i can help you on this or not thanks in advance :)', 5000, NULL, 0),
(481, 546, 552, 0, '2024-03-12 09:31:39', NULL, NULL, 'Me and my team will do your to your taste and give good results ', 600, NULL, 0),
(482, 546, 542, 0, '2024-03-12 09:34:17', NULL, NULL, 'Hi, am reaching out to you to let you I have interest in working with you for your social media project, you will get the best from me', 5500, NULL, 0),
(483, 546, 550, 0, '2024-03-12 09:36:44', NULL, NULL, 'I Ave good experience of such project and the project timeline will be two weeks and 7 days for correctional stage. ', 85000, NULL, 0),
(484, 546, 538, 0, '2024-03-12 09:39:06', NULL, NULL, 'I can deliver perfectly, please consider me and let work together to archive your goal and timeline ', 900, NULL, 0),
(485, 547, 550, 0, '2024-03-12 09:53:57', NULL, NULL, 'we are techzarinf, 12yrs experience in IT domain, kindly share your detailed requirement document', 9000, NULL, 0),
(486, 418, 554, 1, '2024-03-12 10:19:14', NULL, NULL, 'i can do complete SEO of your website. ', 1500, '.ORD532024031589486024751.', 0),
(487, 549, 554, 0, '2024-03-12 13:00:04', NULL, NULL, 'Subject: Boost Your Business with Customized Digital Marketing\r\n\r\nHi,\r\n\r\nI\'m bolarinwa, a digital marketer ready to enhance your online presence. Let\'s discuss a tailored strategy covering social media, SEO, content, and more. Eager to chat and propel your business forward.\r\n\r\nBest,\r\n[Bolarinwa]', 1350, NULL, 0),
(488, 549, 551, 0, '2024-03-12 13:04:31', NULL, NULL, 'Unlock unparalleled visual impact with my creative Nike Air Jordan post, meticulously crafted using advanced Photoshop techniques. Elevate your brand with a fusion of artistic textures, showcasing a design that captures attention and sparks engagement. Let\'s bring your vision to life with this uniquely crafted masterpiece.', 300, NULL, 0),
(489, 554, 552, 0, '2024-03-13 08:35:58', NULL, NULL, 'My team can carry out your project, and we have experience in UI/UX design with good results', 1000, NULL, 0);
INSERT INTO `my_leads` (`id`, `professional_id`, `lead_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `description`, `amount`, `order_id`, `is_seen`) VALUES
(490, 554, 379, 0, '2024-03-13 08:39:07', NULL, NULL, 'Nous pouvons réaliser votre application avec des fonctionalités impecable, veuiller me donner un retour si vous voulez réaliser votre application', 950, NULL, 0),
(491, 554, 497, 0, '2024-03-13 08:44:56', NULL, NULL, '\r\nI can create your modern and minimalist logo in a black, white and gray color palette. My clients are all satisfied with my work so don\'t hesitate to contact me if you want satisfaction.', 200, NULL, 0),
(492, 561, 555, 0, '2024-03-14 08:17:16', NULL, NULL, 'I am Shireen Imran who work more than 7 years in php framework like laravel and wordpress', 1100, NULL, 0),
(493, 356, 554, 0, '2024-03-15 07:30:45', NULL, NULL, 'I can do On-page and Off-page SEO with best results.', 1200, NULL, 0),
(494, 356, 558, 0, '2024-03-15 11:13:34', NULL, NULL, 'I can run google ads for you , having 3 years of experience.', 850, NULL, 0),
(495, 418, 558, 1, '2024-03-15 11:16:09', NULL, NULL, 'I have 4 years of experience in PPC/Google ads. I can run your ads with results. ', 750, '.ORD182024031590495063908.', 0),
(496, 574, 558, 0, '2024-03-22 06:00:50', NULL, NULL, 'Hi, I would like to ensure you that having 3 years of experience in Google ads with data driven marketing.', 700, NULL, 0),
(497, 575, 558, 0, '2024-03-22 06:27:02', NULL, NULL, 'I can manage Google Ads for you. I have a 4+ years of experience.', 10, NULL, 0),
(498, 576, 558, 0, '2024-03-23 10:17:12', NULL, NULL, 'i have  6+ experience in this field Google and Facebook Meta Ads i can run all type of ads with good ROI and ROAS', 650, NULL, 0),
(499, 578, 558, 0, '2024-03-23 11:25:44', NULL, NULL, 'Based in the UK, with few clients for Google ads already working under my wing, I do this full time with my agency. I always aim for quality work with the best strategies and planning.', 900, NULL, 0),
(500, 581, 560, 1, '2024-03-26 08:04:39', NULL, NULL, 'We have team of professionals, We will help you to make this app ', 799, '.ORD262024032793500070618.', 0),
(501, 533, 560, 0, '2024-03-28 04:35:40', NULL, NULL, 'Dear Sir, \r\n\r\nInterested to design and develop your food delivery mobile app .Pretty confident to undertake the task and interested for further discussions.\r\n\r\nOur Android Application Projects\r\n\r\nEpic Club : https://play.google.com/store/apps/details?id=com.eliteclub&hl=en_IN&gl=US\r\n\r\nSimplelife : https://play.google.com/store/apps/details?id=com.palpx.simplelife\r\n\r\nThrissur Fashion Jewellery : https://play.google.com/store/apps/details?id=com.thrissurfashionjewellery.thrissurjewellery&pli=1\r\n\r\nCambuild Visitor App : https://play.google.com/store/apps/details?id=epenh.conferenceapp.cambuild&hl=en\r\n\r\nTake Away 555 : https://play.google.com/store/apps/details?id=com.epenh.takeaway555&hl=en\r\n\r\nHope I will get a positive reply,\r\nRegards,\r\nKrishna,\r\nMob or Whatsapp : +91 ********** \r\nSkype : unniupf', 800, NULL, 0),
(502, 591, 550, 0, '2024-03-28 11:51:40', NULL, NULL, 'I have 7+ years of experience in website development. We have expertise in HTML, CSS, jQuery, Ajax, PHP, WordPress, React Js, Angular, Vue Js, Node Js, Laravel, CodeIgniter, Shopify, and OpenCart. We have developed websites for Health Care, Education, real estate, and other industries.\r\n\r\nWe have completed happily more than 100+ projects and delivered them to clients successfully.\r\n\r\nLooking for a prompt response.\r\nRegards,\r\nDarshak Katariya\r\nPhone / WhatsApp: +91 **********', 9500, NULL, 0),
(503, 591, 555, 0, '2024-03-28 11:55:13', NULL, NULL, 'We have 7+ years of experience in website development. We have expertise in HTML, CSS, jQuery, Ajax, PHP, WordPress, React Js, Angular, Vue Js, Node Js, Laravel, CodeIgniter, Shopify, and OpenCart. We have developed websites for Health Care, Education, real estate, and other industries.\r\n\r\nWe have completed happily more than 100+ projects and delivered them to clients successfully.\r\n\r\nLooking for a prompt response.\r\nRegards,\r\nDarshak Katariya\r\nPhone / WhatsApp: +91 **********', 1300, NULL, 0),
(504, 591, 551, 0, '2024-03-28 11:56:58', NULL, NULL, 'I am Darshak Katariya I have 7year of experience in Graphic designing', 250, NULL, 0),
(505, 591, 458, 0, '2024-03-28 12:01:14', NULL, NULL, 'I have experience in App development  ', 2000, NULL, 0),
(506, 593, 480, 0, '2024-03-29 05:13:05', NULL, NULL, 'I AM READY', 200, NULL, 0),
(507, 594, 550, 0, '2024-03-29 06:09:30', NULL, NULL, 'Greetings! a seasoned professional specializing in website design. I wanted to connect with you because I understand the pivotal role a well-crafted website plays in today\'s business landscape.\r\n\r\nWith a keen eye for aesthetics and a focus on user experience, I\'ve had the privilege of helping businesses establish a strong online presence. Whether you\'re considering a website overhaul or exploring e-commerce possibilities, my expertise can make a significant impact.\r\n\r\nI\'d love the opportunity to discuss how a thoughtfully designed website can enhance your brand. Please let me know a time that works for a brief conversation.', 85000, NULL, 0),
(508, 594, 545, 0, '2024-03-29 06:13:30', NULL, NULL, 'Greetings! a seasoned professional specializing in website design. I wanted to connect with you because I understand the pivotal role a well-crafted website plays in today\'s business landscape.\r\n\r\nWith a keen eye for aesthetics and a focus on user experience, I\'ve had the privilege of helping businesses establish a strong online presence. Whether you\'re considering a website overhaul or exploring e-commerce possibilities, my expertise can make a significant impact.\r\n\r\nI\'d love the opportunity to discuss how a thoughtfully designed website can enhance your brand. Please let me know a time that works for a brief conversation.', 600, NULL, 0),
(509, 594, 552, 0, '2024-03-29 06:23:58', NULL, NULL, 'Greetings! a seasoned professional specializing in website design. I wanted to connect with you because I understand the pivotal role a well-crafted website plays in today\'s business landscape.\r\n\r\nWith a keen eye for aesthetics and a focus on user experience, I\'ve had the privilege of helping businesses establish a strong online presence. Whether you\'re considering a website overhaul or exploring e-commerce possibilities, my expertise can make a significant impact.\r\n\r\nI\'d love the opportunity to discuss how a thoughtfully designed website can enhance your brand. Please let me know a time that works for a brief conversation.', 800, NULL, 0),
(510, 601, 563, 1, '2024-03-29 11:46:35', NULL, NULL, 'Hello,\r\nI\'m muzammil imam from Delhi \r\nI\'m cinematographer and I do freelance with sony 6400 4k camera \r\nLens 50mm1.8,35mm 1.4,16-50mm\r\nGimble zhiyun weebill 2\r\nVapor light kit\r\nIf anybody want cinematographer traditional videographer and photographer as well then contact me 98915 79768', 50, '.ORD702024032982510092838.', 0),
(511, 604, 564, 1, '2024-03-29 12:59:39', NULL, NULL, 'I am a photographer. I have experience in 6 years.I am from kolkata. Please call me **********', 1000, '.ORD572024032985511092854.', 0),
(512, 594, 564, 1, '2024-03-29 14:24:29', NULL, NULL, 'Wow, it\'s impressive that you have such a clear vision for your website! You seem to have a great sense of what you want your website to look like and how you want to convey your message. I\'m happy to help you bring your vision to life. I think the idea of a simple layout with minimal text and a focus on visuals is spot-on. We can make the photos the star of the show and create a visual experience that really resonates with your target audience. I\'m excited to work with you on this project!', 1000, '.ORD882024032965512092859.', 0),
(513, 594, 563, 1, '2024-03-29 14:26:49', NULL, NULL, 'Wow, it\'s impressive that you have such a clear vision for your website! You seem to have a great sense of what you want your website to look like and how you want to convey your message. I\'m happy to help you bring your vision to life. I think the idea of a simple layout with minimal text and a focus on visuals is spot-on. We can make the photos the star of the show and create a visual experience that really resonates with your target audience. I\'m excited to work with you on this project!', 1000, '.ORD492024032957513092838.', 0),
(514, 611, 563, 0, '2024-03-30 05:01:07', NULL, NULL, 'Hi,\r\nMyself Shravan Surve, Professional Photographer. Specialised in Fashion, Beauty and Commercial. \r\nI am pleased to inform you that my portfolio website is now live. \r\nFeel free to check it out and feel free to book me for any upcoming shoots. Also if you have any queries feel free to ask. \r\n\r\nI am attaching the link in separate message if you need to share it with someone.\r\n\r\nhttps://surveshravan.myportfolio.com/', 1841, NULL, 0),
(515, 610, 563, 0, '2024-03-30 05:01:32', NULL, NULL, 'I am a photographer.. \r\nI have z6ii.\r\nSigma 35 mm 1.4\r\nNikon 50mm 1.8\r\nGodox tt685ii with xt1 trigger', 2000, NULL, 0),
(516, 610, 565, 0, '2024-03-30 05:04:27', NULL, NULL, 'I am a candid photographer from Kolkata.. \r\nI have nikon z6ii \r\nWith sigma 35 1.4\r\nNikon 50 mm 1.8\r\nGodox Tt 685 ii with xt1 trigger\r\n85 cm octa', 180, NULL, 0),
(517, 617, 563, 0, '2024-03-30 12:29:50', NULL, NULL, 'Wading photographer ', 100, NULL, 0),
(518, 617, 565, 0, '2024-03-30 12:32:14', NULL, NULL, 'Available with nikon 5600d GodexTT 520 ||  + Trigger 50 mm prime,18-200 mm,18-55 mm kit & octa', 200, NULL, 0),
(519, 619, 565, 0, '2024-03-31 13:18:50', NULL, NULL, 'Hi Myself chetan sharma\r\n\r\nI\'m Available Candid photography \r\nBook Your date with me for Amazing memories .\r\n\r\nEquipments Details \r\nNikon Z6 II\r\n\r\nLenses\r\n85 MM f 1. 8\r\n50MM f 1.8\r\n24-70 MM\r\n\r\nLights:- \r\nGodox TT685\r\n', 600, NULL, 0),
(521, 418, 567, 0, '2024-04-04 04:50:15', NULL, NULL, 'I am a professional , I can do this work', 100, NULL, 0),
(522, 632, 568, 0, '2024-04-04 10:16:38', NULL, NULL, 'I\'ll create ', 800, NULL, 0),
(523, 632, 536, 0, '2024-04-04 10:29:09', NULL, NULL, 'Interested', 1000, NULL, 0),
(524, 635, 568, 0, '2024-04-04 10:46:41', NULL, NULL, 'I know liquid code and develop any custom sections . I can make you eye catching shopify store design . do you have any reference site? \r\nsee my previuos works below .\r\nhttps://znbeauties.com/\r\nhttps://www.primehealthdirect.com/\r\nhttps://klimbbd.com/', 750, NULL, 0),
(525, 638, 567, 0, '2024-04-04 14:40:45', NULL, NULL, 'Hello, i can do this', 100, NULL, 0),
(526, 638, 553, 0, '2024-04-04 15:04:09', NULL, NULL, 'Shopify Store With a Premium Shopify Theme + In-Depth Product Research + Logo + Branding', 100, NULL, 0),
(527, 638, 568, 0, '2024-04-04 15:06:18', NULL, NULL, 'Premium Store Setup + Branding + SEO + 50 Products + Winning Product Research + Branding + Logo', 400, NULL, 0),
(528, 634, 568, 0, '2024-04-04 20:58:35', NULL, NULL, 'Shopify Development for Skin Care Online Store.\r\n\r\nI am reaching out to express my interest in collaborating with you to develop a captivating Shopify online store for your skin care products. With my expertise as a Shopify developer, I am confident in my ability to create a visually stunning and user-friendly platform that showcases your products and enhances your brand\'s online presence.\r\n\r\nMy approach to Shopify development focuses on creating a seamless shopping experience for your customers, with attention to detail in design, functionality, and performance. I am committed to understanding your unique brand identity and objectives to tailor a solution that meets your specific needs and exceeds your expectations.\r\n\r\nTogether, we can create a Shopify store that not only attracts customers but also engages and converts them, driving growth and success for your skin care business.\r\n\r\nThank you for considering my proposal. I am eager to discuss how we can bring your vision to life and create a successful online store for your skin care products.\r\n\r\nBest regards,\r\nHaseeb Ramzan', 450, NULL, 0),
(529, 641, 568, 0, '2024-04-05 15:35:05', NULL, NULL, 'Experienced Web developer, 6+ Shopify expert, contact me to see my previous projects.', 799, NULL, 0),
(530, 662, 568, 0, '2024-04-06 07:39:59', NULL, NULL, 'I\'m a professional shopify store designer with a years of experience in designing. Let\'s connect to empower your business.', 100, NULL, 0),
(531, 663, 568, 0, '2024-04-06 11:42:52', NULL, NULL, 'I am a shopify web development and i have 2 years of experience in this field.', 399, NULL, 0),
(532, 663, 567, 0, '2024-04-06 11:45:32', NULL, NULL, 'Hello i can do this. And i have 2 years experience.', 79, NULL, 0),
(533, 667, 565, 0, '2024-04-08 13:25:01', NULL, NULL, 'Candid ', 50000, NULL, 0),
(534, 512, 586, 0, '2024-04-08 17:45:11', NULL, NULL, 'I can build your app full stack, Check out my portfolio https://tundephilps-portfolio.vercel.app/portfolio', 1400, NULL, 0),
(535, 671, 586, 0, '2024-04-09 05:38:14', NULL, NULL, 'Hi I am from sati world a web development agency.\r\nAre you still looking for that then hurry up we are here with 1 year support \r\nAnd we are a agency \r\nWith expert team.\r\n', 1300, NULL, 0),
(536, 671, 579, 0, '2024-04-09 05:38:51', NULL, NULL, 'Hi I am from sati world a web development agency.\r\nAre you still looking for that then hurry up we are here with 1 year support \r\nAnd we are a agency \r\nWith expert team.\r\n', 2500, NULL, 0),
(537, 671, 571, 0, '2024-04-09 05:39:37', NULL, NULL, 'Hi I am from sati world a web development agency.\r\nAre you still looking for that then hurry up we are here with 1 year support \r\nAnd we are a agency \r\nWith expert team.\r\n', 5500, NULL, 0),
(538, 671, 570, 0, '2024-04-09 05:40:11', NULL, NULL, 'Hi I am from sati world a web development agency.\r\nAre you still looking for that then hurry up we are here with 1 year support \r\nAnd we are a agency \r\nWith expert team.\r\n', 1200, NULL, 0),
(539, 671, 569, 0, '2024-04-09 05:40:36', NULL, NULL, 'Hi I am from sati world a web development agency.\r\nAre you still looking for that then hurry up we are here with 1 year support \r\nAnd we are a agency \r\nWith expert team.\r\n', 1900, NULL, 0),
(540, 673, 567, 0, '2024-04-09 06:33:32', NULL, NULL, 'Hii I can help you with that', 150, NULL, 0),
(541, 673, 579, 0, '2024-04-09 06:40:02', NULL, NULL, 'Hi I can work this for you^^', 2000, NULL, 0),
(542, 673, 568, 0, '2024-04-09 06:57:11', NULL, NULL, 'Hi i can help you with this ', 750, NULL, 0),
(543, 673, 465, 0, '2024-04-09 07:04:44', NULL, NULL, 'Okay i can do this. Let\'s work it out together.', 400, NULL, 0),
(544, 674, 567, 0, '2024-04-09 09:42:08', NULL, NULL, 'If it is a simple websites as you said, we can do it for at a cheaper budget just like you wanted.', 65, NULL, 0),
(545, 674, 376, 0, '2024-04-09 09:47:48', NULL, NULL, 'I can help you get  neat and suitable contents for your E-commerce website. I am talented in that aspect.', 300, NULL, 0),
(546, 677, 565, 0, '2024-04-10 08:57:33', NULL, NULL, 'We are a team of professional photographers \r\nJust let us know the work it will be done \r\n', 7500, NULL, 0),
(547, 677, 586, 0, '2024-04-10 09:02:40', NULL, NULL, 'Hello \r\n\r\nYour app can be built by our company professionals. Do let me know if you are interested in the same', 1300, NULL, 0),
(548, 677, 579, 0, '2024-04-10 09:03:45', NULL, NULL, 'Hello \r\n\r\nThis app can be developed by our company do let me know if you are interested ', 2500, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT '0' COMMENT '0-not seen,1-seen',
  `notification_to` text,
  `notification_type` int(11) DEFAULT NULL,
  `msg` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `bid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `seen`, `notification_to`, `notification_type`, `msg`, `created_at`, `updated_at`, `lead_id`, `bid_id`) VALUES
(1, 387, 1, NULL, 1, 'Got a new bid', '2023-12-13 11:57:24', NULL, 424, NULL),
(21, 387, 1, NULL, 1, 'Got a new bid ', '2023-12-26 14:01:15', NULL, NULL, NULL),
(23, 387, 1, NULL, 1, 'Got a new bid on Digital marketing project', '2023-12-26 17:26:07', NULL, NULL, NULL),
(25, 356, 1, NULL, 2, 'New Project assigned to you', '2023-12-26 17:36:41', NULL, NULL, NULL),
(26, 356, 1, NULL, 2, 'New Project assigned to you', '2023-12-26 18:05:33', NULL, NULL, NULL),
(27, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-26 18:13:20', NULL, 445, 73),
(28, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 06:23:54', NULL, 445, 73),
(32, 387, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 07:19:01', NULL, 445, 73),
(33, 387, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 07:19:32', NULL, 445, 73),
(34, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 07:26:19', NULL, 445, 73),
(37, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 07:52:14', NULL, 445, 73),
(39, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 08:18:11', NULL, 445, 73),
(40, 387, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 08:18:48', NULL, 445, 73),
(41, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 08:22:05', NULL, 445, 73),
(42, 356, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 08:24:49', NULL, 445, 73),
(43, 387, 1, NULL, 3, 'You got a new message on Digital marketing project', '2023-12-27 08:25:12', NULL, 445, 73),
(44, 356, 1, NULL, 3, 'You got a new message on Internet of things', '2023-12-27 09:57:36', NULL, 444, 72),
(49, 390, 1, NULL, 1, 'Got a new bid on asdfasdf', '2023-12-27 10:59:16', NULL, 0, 0),
(50, 391, 1, NULL, 3, 'You got a new message on asdfasdf', '2023-12-27 10:59:34', NULL, 447, 75),
(51, 390, 1, NULL, 3, 'You got a new message on asdfasdf', '2023-12-27 10:59:46', NULL, 447, 75),
(52, 387, 1, NULL, 1, 'Got a new bid on first project', '2023-12-27 16:31:25', NULL, 0, 0),
(53, 356, 1, NULL, 3, 'You got a new message on first project', '2023-12-27 16:33:35', NULL, 449, 76),
(54, 387, 1, NULL, 3, 'You got a new message on first project', '2023-12-27 16:33:51', NULL, 449, 76),
(55, 356, 0, NULL, 3, 'You got a new message on first project', '2023-12-27 16:34:07', NULL, 449, 76),
(56, 356, 1, NULL, 2, 'New Project assigned to you', '2023-12-27 16:35:41', NULL, 0, 0),
(57, 391, 1, NULL, 2, 'New Project assigned to you', '2023-12-30 07:19:08', NULL, 0, 0),
(58, 390, 1, NULL, 1, 'Got a new bid on  gfb', '2023-12-30 07:34:11', NULL, 0, 0),
(59, 391, 1, NULL, 2, 'New Project assigned to you', '2023-12-30 07:34:40', NULL, 0, 0),
(60, 400, 1, NULL, 1, 'Got a new bid on Wants to create a mobile App', '2023-12-30 10:22:43', NULL, 0, 0),
(61, 399, 1, NULL, 2, 'New Project assigned to you', '2023-12-30 10:41:10', NULL, 0, 0),
(62, 399, 1, NULL, 3, 'You got a new message on Wants to create a mobile App', '2023-12-30 11:09:27', NULL, 450, 78),
(63, 400, 1, NULL, 3, 'You got a new message on Wants to create a mobile App', '2023-12-30 11:09:57', NULL, 450, 78),
(64, 0, 0, NULL, 1, 'Got a new bid on Need SEO for my website', '2024-01-04 08:13:04', NULL, 0, 0),
(65, 402, 1, NULL, 1, 'Got a new bid on Looking for a digital Marketing Agency', '2024-01-05 06:07:22', NULL, 0, 0),
(66, 391, 1, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 06:08:18', NULL, 452, 80),
(67, 390, 1, NULL, 1, 'Got a new bid on wertyui', '2024-01-05 08:22:44', NULL, 0, 0),
(68, 402, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:17:53', NULL, 452, 80),
(69, 402, 1, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:24:19', NULL, 452, 80),
(70, 402, 1, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:25:43', NULL, 452, 80),
(71, 391, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:33:36', NULL, 452, 80),
(72, 391, 1, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:40:11', NULL, 452, 80),
(73, 402, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 12:58:40', NULL, 452, 80),
(74, 391, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 13:02:01', NULL, 452, 80),
(75, 402, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 13:03:31', NULL, 452, 80),
(76, 391, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 13:17:32', NULL, 452, 80),
(77, 402, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-05 13:31:22', NULL, 452, 80),
(78, 402, 0, NULL, 3, 'You got a new message on Looking for a digital Marketing Agency', '2024-01-06 05:37:12', NULL, 452, 80),
(79, 410, 1, NULL, 1, 'Got a new bid on testing again phone:********** email:********', '2024-01-06 07:48:13', NULL, 0, 0),
(80, 410, 0, NULL, 3, 'You got a new message on testing again phone:********** email:********', '2024-01-06 07:54:21', NULL, 463, 82),
(81, 391, 0, NULL, 3, 'You got a new message on testing again phone:********** email:********', '2024-01-06 07:55:00', NULL, 463, 82),
(82, 410, 0, NULL, 3, 'You got a new message on testing again phone:********** email:********', '2024-01-06 07:55:36', NULL, 463, 82),
(83, 410, 0, NULL, 1, 'Got a new bid on testing again phone:********** email:********', '2024-01-06 08:02:02', NULL, 0, 0),
(84, 397, 1, NULL, 3, 'You got a new message on testing again phone:********** email:********', '2024-01-06 08:03:57', NULL, 463, 83),
(85, 410, 1, NULL, 3, 'You got a new message on testing again phone:********** email:********', '2024-01-06 08:04:24', NULL, 463, 83),
(86, 397, 0, NULL, 2, 'New Project assigned to you', '2024-01-06 08:05:42', NULL, 0, 0),
(87, 410, 0, NULL, 1, 'Got a new bid on testing with login', '2024-01-06 08:22:11', NULL, 0, 0),
(88, 410, 0, NULL, 1, 'Got a new bid on testing with login', '2024-01-06 08:22:15', NULL, 0, 0),
(89, 410, 0, NULL, 1, 'Got a new bid on testing again phone:********** email:********', '2024-01-07 07:24:10', NULL, 0, 0),
(90, 410, 0, NULL, 1, 'Got a new bid on testing again phone:********** email:********', '2024-01-07 07:24:13', NULL, 0, 0),
(91, 412, 0, NULL, 1, 'Got a new bid on Need an app for trading', '2024-01-07 07:27:08', NULL, 0, 0),
(92, 412, 0, NULL, 1, 'Got a new bid on Need an app for trading', '2024-01-07 07:27:10', NULL, 0, 0),
(93, 413, 1, NULL, 3, 'You got a new message on Need an app for trading', '2024-01-07 07:43:30', NULL, 464, 88),
(94, 412, 0, NULL, 3, 'You got a new message on Need an app for trading', '2024-01-07 07:43:47', NULL, 464, 88),
(95, 413, 1, NULL, 3, 'You got a new message on Need an app for trading', '2024-01-07 07:44:06', NULL, 464, 88),
(96, 412, 0, NULL, 3, 'You got a new message on Need an app for trading', '2024-01-07 07:44:25', NULL, 464, 88),
(97, 413, 1, NULL, 2, 'New Project assigned to you', '2024-01-07 07:44:39', NULL, 0, 0),
(98, 412, 0, NULL, 1, 'Got a new bid on Need an app for trading', '2024-01-08 05:53:42', NULL, 0, 0),
(99, 402, 0, NULL, 1, 'Got a new bid on Looking for a digital Marketing Agency', '2024-01-12 07:11:19', NULL, 0, 0),
(100, 0, 0, NULL, 1, 'Got a new bid on Digital Marketing', '2024-01-12 07:14:45', NULL, 0, 0),
(101, 0, 0, NULL, 1, 'Got a new bid on Need SEO for my website', '2024-01-12 07:16:40', NULL, 0, 0),
(102, 0, 0, NULL, 1, 'Got a new bid on SEO for my website', '2024-01-12 07:17:36', NULL, 0, 0),
(103, 412, 0, NULL, 1, 'Got a new bid on Shopify E-commerce Store with Social Media Ad Creation', '2024-01-12 09:18:36', NULL, 0, 0),
(104, 412, 0, NULL, 1, 'Got a new bid on Website for Car Auction', '2024-01-14 07:29:03', NULL, 0, 0),
(105, 412, 1, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-17 09:56:50', NULL, 0, 0),
(106, 412, 0, NULL, 1, 'Got a new bid on Need an app for trading', '2024-01-17 10:25:13', NULL, 0, 0),
(107, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-19 09:39:01', NULL, 0, 0),
(108, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-19 09:42:07', NULL, 0, 0),
(109, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-19 09:43:09', NULL, 0, 0),
(110, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-19 09:45:44', NULL, 0, 0),
(111, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-19 09:47:22', NULL, 0, 0),
(112, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-19 09:59:31', NULL, 0, 0),
(113, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-20 10:50:40', NULL, 0, 0),
(114, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-20 10:52:35', NULL, 0, 0),
(115, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-20 11:53:14', NULL, 0, 0),
(116, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-20 11:53:43', NULL, 0, 0),
(117, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-20 11:54:19', NULL, 0, 0),
(118, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-20 12:04:22', NULL, 0, 0),
(119, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-20 12:05:02', NULL, 0, 0),
(120, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-20 12:06:01', NULL, 0, 0),
(121, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-20 12:06:54', NULL, 0, 0),
(122, 412, 0, NULL, 1, 'Got a new bid on Flutter iOS Version Development Needed', '2024-01-20 12:08:30', NULL, 0, 0),
(123, 412, 0, NULL, 1, 'Got a new bid on AI for Individual Stock Forecasting', '2024-01-20 12:13:11', NULL, 0, 0),
(124, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-20 12:13:54', NULL, 0, 0),
(125, 412, 0, NULL, 1, 'Got a new bid on Pop Culture Content Creation', '2024-01-20 12:17:02', NULL, 0, 0),
(126, 412, 0, NULL, 1, 'Got a new bid on Enhance YouTube Engagement, Views & Ranking', '2024-01-20 12:17:38', NULL, 0, 0),
(127, 412, 0, NULL, 1, 'Got a new bid on Multi-Platform Social Media Sales Campaign', '2024-01-20 12:18:36', NULL, 0, 0),
(128, 412, 0, NULL, 1, 'Got a new bid on Fix JavaScript Lightbox Image Viewer Issues', '2024-01-20 12:20:59', NULL, 0, 0),
(129, 412, 0, NULL, 1, 'Got a new bid on Java Pro for Business Software Development', '2024-01-20 12:21:25', NULL, 0, 0),
(130, 412, 0, NULL, 1, 'Got a new bid on Website for Car Auction', '2024-01-20 12:21:52', NULL, 0, 0),
(131, 412, 0, NULL, 1, 'Got a new bid on google adword for business', '2024-01-20 12:22:34', NULL, 0, 0),
(132, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-20 12:22:56', NULL, 0, 0),
(133, 412, 0, NULL, 1, 'Got a new bid on B2C Digital Marketing Expansion', '2024-01-20 12:23:04', NULL, 0, 0),
(134, 412, 0, NULL, 1, 'Got a new bid on Shopify E-commerce Store with Social Media Ad Creation', '2024-01-20 12:25:29', NULL, 0, 0),
(135, 424, 0, NULL, 1, 'Got a new bid on Mobile App Development - Conversion Project', '2024-01-20 12:26:03', NULL, 0, 0),
(136, 422, 0, NULL, 1, 'Got a new bid on **URGENT** C++ Assignment', '2024-01-20 12:26:35', NULL, 0, 0),
(137, 421, 0, NULL, 1, 'Got a new bid on Backend and frontend poker game', '2024-01-20 12:27:10', NULL, 0, 0),
(138, 420, 0, NULL, 1, 'Got a new bid on Web App Developement for property selling and buying', '2024-01-20 12:27:40', NULL, 0, 0),
(139, 0, 0, NULL, 1, 'Got a new bid on Custom Website For My Store', '2024-01-22 10:02:54', NULL, 0, 0),
(140, 0, 0, NULL, 1, 'Got a new bid on I want content for my website.', '2024-01-22 10:04:50', NULL, 0, 0),
(141, 0, 0, NULL, 1, 'Got a new bid on I want graphics for my gaming website.', '2024-01-22 10:05:49', NULL, 0, 0),
(142, 0, 0, NULL, 1, 'Got a new bid on Website development for my new product.', '2024-01-22 10:06:31', NULL, 0, 0),
(143, 0, 0, NULL, 1, 'Got a new bid on Want a app for my local store.', '2024-01-22 10:07:18', NULL, 0, 0),
(144, 0, 0, NULL, 1, 'Got a new bid on Real Estate Website Development', '2024-01-22 10:08:03', NULL, 0, 0),
(145, 0, 0, NULL, 1, 'Got a new bid on Need for Graphic Designer ', '2024-01-22 10:09:00', NULL, 0, 0),
(146, 0, 0, NULL, 1, 'Got a new bid on Content writer for my products', '2024-01-22 10:09:36', NULL, 0, 0),
(147, 0, 0, NULL, 1, 'Got a new bid on Digital Marketing', '2024-01-22 10:10:49', NULL, 0, 0),
(148, 0, 0, NULL, 1, 'Got a new bid on React Native App', '2024-01-22 10:11:53', NULL, 0, 0),
(149, 0, 0, NULL, 1, 'Got a new bid on new project', '2024-01-22 10:12:32', NULL, 0, 0),
(150, 0, 0, NULL, 1, 'Got a new bid on ShipRocket Like App', '2024-01-22 10:13:08', NULL, 0, 0),
(151, 0, 0, NULL, 1, 'Got a new bid on Wants to create a mobile App', '2024-01-22 10:14:03', NULL, 0, 0),
(152, 402, 0, NULL, 1, 'Got a new bid on Looking for a digital Marketing Agency', '2024-01-22 10:14:41', NULL, 0, 0),
(153, 403, 0, NULL, 1, 'Got a new bid on Want my food delivery to be build ', '2024-01-22 10:15:22', NULL, 0, 0),
(154, 409, 0, NULL, 1, 'Got a new bid on Flutter web developer', '2024-01-22 10:16:00', NULL, 0, 0),
(155, 412, 0, NULL, 1, 'Got a new bid on one single web page ', '2024-01-22 10:19:38', NULL, 0, 0),
(156, 414, 0, NULL, 1, 'Got a new bid on Freelancing ', '2024-01-22 10:22:53', NULL, 0, 0),
(157, 420, 0, NULL, 1, 'Got a new bid on Web App Developement for property selling and buying', '2024-01-22 10:23:45', NULL, 0, 0),
(158, 421, 0, NULL, 1, 'Got a new bid on Backend and frontend poker game', '2024-01-22 10:24:21', NULL, 0, 0),
(159, 422, 0, NULL, 1, 'Got a new bid on **URGENT** C++ Assignment', '2024-01-22 10:24:58', NULL, 0, 0),
(160, 424, 0, NULL, 1, 'Got a new bid on Mobile App Development - Conversion Project', '2024-01-22 10:25:31', NULL, 0, 0),
(161, 412, 0, NULL, 1, 'Got a new bid on Shopify E-commerce Store with Social Media Ad Creation', '2024-01-22 10:30:13', NULL, 0, 0),
(162, 412, 0, NULL, 1, 'Got a new bid on B2C Digital Marketing Expansion', '2024-01-22 10:34:46', NULL, 0, 0),
(163, 412, 0, NULL, 1, 'Got a new bid on google adword for business', '2024-01-22 10:36:58', NULL, 0, 0),
(164, 412, 0, NULL, 1, 'Got a new bid on Website for Car Auction', '2024-01-22 10:37:31', NULL, 0, 0),
(165, 412, 0, NULL, 1, 'Got a new bid on Java Pro for Business Software Development', '2024-01-22 10:38:16', NULL, 0, 0),
(166, 412, 0, NULL, 1, 'Got a new bid on Fix JavaScript Lightbox Image Viewer Issues', '2024-01-22 10:39:21', NULL, 0, 0),
(167, 412, 0, NULL, 1, 'Got a new bid on Multi-Platform Social Media Sales Campaign', '2024-01-22 10:39:54', NULL, 0, 0),
(168, 412, 0, NULL, 1, 'Got a new bid on Enhance YouTube Engagement, Views & Ranking', '2024-01-22 10:40:21', NULL, 0, 0),
(169, 412, 0, NULL, 1, 'Got a new bid on Pop Culture Content Creation', '2024-01-22 10:40:52', NULL, 0, 0),
(170, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-22 10:41:28', NULL, 0, 0),
(171, 412, 0, NULL, 1, 'Got a new bid on AI for Individual Stock Forecasting', '2024-01-22 10:42:02', NULL, 0, 0),
(172, 412, 0, NULL, 1, 'Got a new bid on Flutter iOS Version Development Needed', '2024-01-22 10:42:36', NULL, 0, 0),
(173, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-22 10:43:12', NULL, 0, 0),
(174, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-22 10:43:43', NULL, 0, 0),
(175, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-22 10:44:52', NULL, 0, 0),
(176, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-22 10:45:21', NULL, 0, 0),
(177, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-22 10:45:59', NULL, 0, 0),
(178, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-22 10:46:26', NULL, 0, 0),
(179, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-22 10:46:53', NULL, 0, 0),
(180, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-22 10:47:44', NULL, 0, 0),
(181, 412, 0, NULL, 1, 'Got a new bid on Website SEO Enhancement', '2024-01-23 04:19:52', NULL, 0, 0),
(182, 412, 0, NULL, 1, 'Got a new bid on Dedicated Hosting for Wordpress Website', '2024-01-23 04:20:21', NULL, 0, 0),
(183, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-01-23 04:20:45', NULL, 0, 0),
(184, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-23 04:21:14', NULL, 0, 0),
(185, 412, 0, NULL, 1, 'Got a new bid on Java Pro for Business Software Development', '2024-01-23 04:46:12', NULL, 0, 0),
(186, 412, 0, NULL, 1, 'Got a new bid on Fix JavaScript Lightbox Image Viewer Issues', '2024-01-23 04:46:47', NULL, 0, 0),
(187, 412, 0, NULL, 1, 'Got a new bid on Multi-Platform Social Media Sales Campaign', '2024-01-23 04:47:49', NULL, 0, 0),
(188, 412, 0, NULL, 1, 'Got a new bid on Enhance YouTube Engagement, Views & Ranking', '2024-01-23 04:48:23', NULL, 0, 0),
(189, 412, 0, NULL, 1, 'Got a new bid on Pop Culture Content Creation', '2024-01-23 04:48:57', NULL, 0, 0),
(190, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-23 04:49:31', NULL, 0, 0),
(191, 412, 0, NULL, 1, 'Got a new bid on AI for Individual Stock Forecasting', '2024-01-23 04:49:59', NULL, 0, 0),
(192, 412, 0, NULL, 1, 'Got a new bid on Flutter iOS Version Development Needed', '2024-01-23 04:50:25', NULL, 0, 0),
(193, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-23 04:50:54', NULL, 0, 0),
(194, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-23 04:51:34', NULL, 0, 0),
(195, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-23 04:53:53', NULL, 0, 0),
(196, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-23 04:54:28', NULL, 0, 0),
(197, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-23 04:54:58', NULL, 0, 0),
(198, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-23 04:55:30', NULL, 0, 0),
(199, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-23 04:55:56', NULL, 0, 0),
(200, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-23 04:56:23', NULL, 0, 0),
(201, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-23 04:56:52', NULL, 0, 0),
(202, 412, 0, NULL, 1, 'Got a new bid on Website SEO Enhancement', '2024-01-23 04:57:19', NULL, 0, 0),
(203, 412, 0, NULL, 1, 'Got a new bid on Dedicated Hosting for Wordpress Website', '2024-01-23 04:58:57', NULL, 0, 0),
(204, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-01-23 05:08:21', NULL, 0, 0),
(205, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-23 05:08:43', NULL, 0, 0),
(206, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-23 05:15:22', NULL, 0, 0),
(207, 412, 0, NULL, 1, 'Got a new bid on Java Pro for Business Software Development', '2024-01-27 05:11:23', NULL, 0, 0),
(208, 412, 0, NULL, 1, 'Got a new bid on Fix JavaScript Lightbox Image Viewer Issues', '2024-01-27 05:12:10', NULL, 0, 0),
(209, 412, 0, NULL, 1, 'Got a new bid on Multi-Platform Social Media Sales Campaign', '2024-01-27 05:12:52', NULL, 0, 0),
(210, 412, 0, NULL, 1, 'Got a new bid on Enhance YouTube Engagement, Views & Ranking', '2024-01-27 05:13:24', NULL, 0, 0),
(211, 412, 0, NULL, 1, 'Got a new bid on Pop Culture Content Creation', '2024-01-27 05:14:43', NULL, 0, 0),
(212, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-27 05:15:16', NULL, 0, 0),
(213, 412, 0, NULL, 1, 'Got a new bid on AI for Individual Stock Forecasting', '2024-01-27 05:15:49', NULL, 0, 0),
(214, 412, 0, NULL, 1, 'Got a new bid on Flutter iOS Version Development Needed', '2024-01-27 05:16:21', NULL, 0, 0),
(215, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-27 05:16:49', NULL, 0, 0),
(216, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-27 05:17:24', NULL, 0, 0),
(217, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-27 05:17:59', NULL, 0, 0),
(218, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-27 05:18:29', NULL, 0, 0),
(219, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-27 05:18:59', NULL, 0, 0),
(220, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-27 05:19:26', NULL, 0, 0),
(221, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-27 05:19:53', NULL, 0, 0),
(222, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-27 05:20:25', NULL, 0, 0),
(223, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-27 05:20:50', NULL, 0, 0),
(224, 412, 0, NULL, 1, 'Got a new bid on Website SEO Enhancement', '2024-01-27 05:22:20', NULL, 0, 0),
(225, 412, 0, NULL, 1, 'Got a new bid on Dedicated Hosting for Wordpress Website', '2024-01-27 05:22:45', NULL, 0, 0),
(226, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-01-27 05:24:51', NULL, 0, 0),
(227, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-27 05:25:14', NULL, 0, 0),
(228, 412, 0, NULL, 1, 'Got a new bid on Social Media Lead Generation Specialist', '2024-01-27 05:25:47', NULL, 0, 0),
(229, 412, 0, NULL, 1, 'Got a new bid on SocialNet App Build', '2024-01-27 05:26:11', NULL, 0, 0),
(230, 412, 0, NULL, 1, 'Got a new bid on Realistic Sauna Assembly Animation', '2024-01-27 05:26:32', NULL, 0, 0),
(231, 412, 0, NULL, 1, 'Got a new bid on Upgrade of .NET windows console application from .net 4 to .net 8', '2024-01-27 05:26:49', NULL, 0, 0),
(232, 412, 0, NULL, 1, 'Got a new bid on Angular-Based High-End Travel Website Redesign', '2024-01-27 05:27:05', NULL, 0, 0),
(233, 412, 0, NULL, 1, 'Got a new bid on Dynamic Management App', '2024-01-27 05:27:20', NULL, 0, 0),
(234, 412, 0, NULL, 1, 'Got a new bid on Pop Culture Content Creation', '2024-01-27 05:36:01', NULL, 0, 0),
(235, 412, 0, NULL, 1, 'Got a new bid on Automated Security Software Setup for Windows', '2024-01-27 05:36:27', NULL, 0, 0),
(236, 412, 0, NULL, 1, 'Got a new bid on AI for Individual Stock Forecasting', '2024-01-27 05:37:32', NULL, 0, 0),
(237, 412, 0, NULL, 1, 'Got a new bid on Flutter iOS Version Development Needed', '2024-01-27 05:38:01', NULL, 0, 0),
(238, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-27 05:38:28', NULL, 0, 0),
(239, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-27 05:38:58', NULL, 0, 0),
(240, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-27 05:39:30', NULL, 0, 0),
(241, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-27 05:39:58', NULL, 0, 0),
(242, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-27 05:40:23', NULL, 0, 0),
(243, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-27 05:41:02', NULL, 0, 0),
(244, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-27 05:41:42', NULL, 0, 0),
(245, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-27 05:42:05', NULL, 0, 0),
(246, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-27 05:42:32', NULL, 0, 0),
(247, 412, 0, NULL, 1, 'Got a new bid on Website SEO Enhancement', '2024-01-27 05:42:54', NULL, 0, 0),
(248, 412, 0, NULL, 1, 'Got a new bid on Dedicated Hosting for Wordpress Website', '2024-01-27 05:43:14', NULL, 0, 0),
(249, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-01-27 05:43:40', NULL, 0, 0),
(250, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-27 05:44:18', NULL, 0, 0),
(251, 412, 0, NULL, 1, 'Got a new bid on Social Media Lead Generation Specialist', '2024-01-27 05:44:55', NULL, 0, 0),
(252, 412, 0, NULL, 1, 'Got a new bid on SocialNet App Build', '2024-01-27 05:45:17', NULL, 0, 0),
(253, 412, 0, NULL, 1, 'Got a new bid on Realistic Sauna Assembly Animation', '2024-01-27 05:45:34', NULL, 0, 0),
(254, 412, 0, NULL, 1, 'Got a new bid on Upgrade of .NET windows console application from .net 4 to .net 8', '2024-01-27 05:45:53', NULL, 0, 0),
(255, 412, 0, NULL, 1, 'Got a new bid on Angular-Based High-End Travel Website Redesign', '2024-01-27 05:46:18', NULL, 0, 0),
(256, 412, 0, NULL, 1, 'Got a new bid on Dynamic Management App', '2024-01-27 05:46:40', NULL, 0, 0),
(257, 412, 0, NULL, 1, 'Got a new bid on FlutterFlow Developer for QR Functionality Fix', '2024-01-27 05:51:39', NULL, 0, 0),
(258, 412, 0, NULL, 1, 'Got a new bid on Need help developing an MVP for mobile app', '2024-01-27 05:52:16', NULL, 0, 0),
(259, 412, 0, NULL, 1, 'Got a new bid on Shopify API Integration for E-SIMS', '2024-01-27 05:52:46', NULL, 0, 0),
(260, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-01-27 05:53:18', NULL, 0, 0),
(261, 412, 0, NULL, 1, 'Got a new bid on Long-Term Digital Ad Management', '2024-01-27 05:53:49', NULL, 0, 0),
(262, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-01-27 05:54:29', NULL, 0, 0),
(263, 434, 0, NULL, 1, 'Got a new bid on trading website development', '2024-01-27 05:55:00', NULL, 0, 0),
(264, 412, 0, NULL, 1, 'Got a new bid on Children Book Promotion Specialist Needed', '2024-01-27 05:55:30', NULL, 0, 0),
(265, 412, 0, NULL, 1, 'Got a new bid on Daily Instagram Management & Content Curation', '2024-01-27 05:55:57', NULL, 0, 0),
(266, 412, 0, NULL, 1, 'Got a new bid on Website SEO Enhancement', '2024-01-27 05:56:18', NULL, 0, 0),
(267, 412, 0, NULL, 1, 'Got a new bid on Dedicated Hosting for Wordpress Website', '2024-01-27 05:56:39', NULL, 0, 0),
(268, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-01-27 05:57:03', NULL, 0, 0),
(269, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-01-27 05:57:27', NULL, 0, 0),
(270, 412, 0, NULL, 1, 'Got a new bid on Social Media Lead Generation Specialist', '2024-01-27 05:57:45', NULL, 0, 0),
(271, 412, 0, NULL, 1, 'Got a new bid on SocialNet App Build', '2024-01-27 05:58:08', NULL, 0, 0),
(272, 412, 0, NULL, 1, 'Got a new bid on Realistic Sauna Assembly Animation', '2024-01-27 05:58:30', NULL, 0, 0),
(273, 412, 0, NULL, 1, 'Got a new bid on Upgrade of .NET windows console application from .net 4 to .net 8', '2024-01-27 05:59:32', NULL, 0, 0),
(274, 412, 0, NULL, 1, 'Got a new bid on Angular-Based High-End Travel Website Redesign', '2024-01-27 05:59:56', NULL, 0, 0),
(275, 412, 0, NULL, 1, 'Got a new bid on Dynamic Management App', '2024-01-27 06:00:16', NULL, 0, 0),
(276, 412, 0, NULL, 1, 'Got a new bid on SEO Conversion & Ranking Boost', '2024-01-27 06:00:50', NULL, 0, 0),
(277, 412, 0, NULL, 1, 'Got a new bid on Social Media Lead Generation Specialist', '2024-01-27 06:13:38', NULL, 0, 0),
(278, 412, 0, NULL, 1, 'Got a new bid on SocialNet App Build', '2024-01-27 06:14:59', NULL, 0, 0),
(279, 412, 0, NULL, 1, 'Got a new bid on Realistic Sauna Assembly Animation', '2024-01-27 06:16:27', NULL, 0, 0),
(280, 412, 0, NULL, 1, 'Got a new bid on Upgrade of .NET windows console application from .net 4 to .net 8', '2024-01-27 06:17:22', NULL, 0, 0),
(281, 412, 0, NULL, 1, 'Got a new bid on Angular-Based High-End Travel Website Redesign', '2024-01-27 06:19:12', NULL, 0, 0),
(282, 412, 0, NULL, 1, 'Got a new bid on Dynamic Management App', '2024-01-27 06:26:16', NULL, 0, 0),
(283, 412, 0, NULL, 1, 'Got a new bid on SEO Conversion & Ranking Boost', '2024-01-27 06:32:38', NULL, 0, 0),
(284, 412, 0, NULL, 1, 'Got a new bid on SEO Conversion & Ranking Boost', '2024-01-27 06:41:32', NULL, 0, 0),
(285, 412, 0, NULL, 1, 'Got a new bid on SEO Conversion & Ranking Boost', '2024-01-27 07:23:30', NULL, 0, 0),
(286, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-01-31 08:15:51', NULL, 0, 0),
(287, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-01-31 08:22:37', NULL, 0, 0),
(288, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-01-31 08:23:55', NULL, 0, 0),
(289, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-02-02 06:32:26', NULL, 0, 0),
(290, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-02-02 06:33:45', NULL, 0, 0),
(291, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-02-02 06:34:39', NULL, 0, 0),
(292, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-02-02 06:35:38', NULL, 0, 0),
(293, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-02-02 06:40:21', NULL, 0, 0),
(294, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-02-02 06:41:03', NULL, 0, 0),
(295, 412, 0, NULL, 1, 'Got a new bid on add function on wordpress site', '2024-02-02 06:42:28', NULL, 0, 0),
(296, 412, 0, NULL, 1, 'Got a new bid on add function on wordpress site', '2024-02-02 06:43:34', NULL, 0, 0),
(297, 412, 0, NULL, 1, 'Got a new bid on add function on wordpress site', '2024-02-02 06:44:24', NULL, 0, 0),
(298, 412, 0, NULL, 1, 'Got a new bid on add function on wordpress site', '2024-02-02 06:45:13', NULL, 0, 0),
(299, 412, 0, NULL, 1, 'Got a new bid on add function on wordpress site', '2024-02-02 06:46:12', NULL, 0, 0),
(300, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-02 07:04:53', NULL, 0, 0),
(301, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-02 07:06:04', NULL, 0, 0),
(302, 412, 0, NULL, 1, 'Got a new bid on NAV Integration Expertise Needed', '2024-02-02 07:07:19', NULL, 0, 0),
(303, 412, 0, NULL, 1, 'Got a new bid on NAV Integration Expertise Needed', '2024-02-02 07:08:23', NULL, 0, 0),
(304, 412, 0, NULL, 1, 'Got a new bid on Engaging News Sharing Site', '2024-02-02 07:09:43', NULL, 0, 0),
(305, 412, 0, NULL, 1, 'Got a new bid on Engaging News Sharing Site', '2024-02-02 07:10:24', NULL, 0, 0),
(306, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-02 10:10:11', NULL, 0, 0),
(307, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-02 10:11:34', NULL, 0, 0),
(308, 412, 0, NULL, 1, 'Got a new bid on NAV Integration Expertise Needed', '2024-02-02 10:13:27', NULL, 0, 0),
(309, 412, 0, NULL, 1, 'Got a new bid on Engaging News Sharing Site', '2024-02-02 10:16:03', NULL, 0, 0),
(310, 412, 0, NULL, 1, 'Got a new bid on Skilled iOS App Developer Needed', '2024-02-02 10:18:38', NULL, 0, 0),
(311, 412, 0, NULL, 1, 'Got a new bid on Hybrid app development', '2024-02-02 10:19:29', NULL, 0, 0),
(312, 412, 0, NULL, 1, 'Got a new bid on Personal Asset Smart Contracts', '2024-02-02 10:20:30', NULL, 0, 0),
(313, 412, 0, NULL, 1, 'Got a new bid on Engaging News Sharing Site', '2024-02-02 10:22:04', NULL, 0, 0),
(314, 412, 0, NULL, 1, 'Got a new bid on Skilled iOS App Developer Needed', '2024-02-02 10:23:05', NULL, 0, 0),
(315, 412, 0, NULL, 1, 'Got a new bid on Hybrid app development', '2024-02-02 10:24:58', NULL, 0, 0),
(316, 412, 0, NULL, 1, 'Got a new bid on Personal Asset Smart Contracts', '2024-02-02 10:26:02', NULL, 0, 0),
(317, 412, 0, NULL, 1, 'Got a new bid on Skilled iOS App Developer Needed', '2024-02-02 10:27:48', NULL, 0, 0),
(318, 412, 0, NULL, 1, 'Got a new bid on Hybrid app development', '2024-02-02 10:28:42', NULL, 0, 0),
(319, 412, 0, NULL, 1, 'Got a new bid on Personal Asset Smart Contracts', '2024-02-02 10:30:21', NULL, 0, 0),
(320, 412, 0, NULL, 1, 'Got a new bid on Skilled iOS App Developer Needed', '2024-02-02 10:31:56', NULL, 0, 0),
(321, 412, 0, NULL, 1, 'Got a new bid on Hybrid app development', '2024-02-02 10:32:52', NULL, 0, 0),
(322, 412, 0, NULL, 1, 'Got a new bid on Personal Asset Smart Contracts', '2024-02-02 10:34:12', NULL, 0, 0),
(323, 412, 0, NULL, 1, 'Got a new bid on Custom API for CHA Indian Custom Notifications List', '2024-02-02 10:39:50', NULL, 0, 0),
(324, 412, 0, NULL, 1, 'Got a new bid on Custom API for CHA Indian Custom Notifications List', '2024-02-02 10:41:19', NULL, 0, 0),
(325, 412, 0, NULL, 1, 'Got a new bid on Custom API for CHA Indian Custom Notifications List', '2024-02-02 10:42:19', NULL, 0, 0),
(326, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-03 09:59:47', NULL, 0, 0),
(327, 412, 0, NULL, 1, 'Got a new bid on National SEO Enhancement: Ranking, Links, & On-page Technical', '2024-02-03 10:00:36', NULL, 0, 0),
(328, 412, 0, NULL, 1, 'Got a new bid on Custom Face Figurine Creation', '2024-02-03 10:01:29', NULL, 0, 0),
(329, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-03 10:03:02', NULL, 0, 0),
(330, 412, 0, NULL, 1, 'Got a new bid on National SEO Enhancement: Ranking, Links, & On-page Technical', '2024-02-03 10:03:59', NULL, 0, 0),
(331, 412, 0, NULL, 1, 'Got a new bid on Custom Face Figurine Creation', '2024-02-03 10:05:12', NULL, 0, 0),
(332, 412, 0, NULL, 1, 'Got a new bid on National SEO Enhancement: Ranking, Links, & On-page Technical', '2024-02-03 21:40:34', NULL, 0, 0),
(333, 412, 0, NULL, 1, 'Got a new bid on Modern Women Health Hub', '2024-02-05 10:10:00', NULL, 0, 0),
(334, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-05 10:11:18', NULL, 0, 0),
(335, 412, 0, NULL, 1, 'Got a new bid on Modern Women Health Hub', '2024-02-05 10:13:37', NULL, 0, 0),
(336, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-05 10:14:27', NULL, 0, 0),
(337, 412, 0, NULL, 1, 'Got a new bid on Flutter & WordPress Integration Expert', '2024-02-05 10:58:33', NULL, 0, 0),
(338, 412, 0, NULL, 1, 'Got a new bid on Flutter & WordPress Integration Expert', '2024-02-05 10:59:28', NULL, 0, 0),
(339, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-06 05:46:56', NULL, 0, 0),
(340, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-06 05:48:05', NULL, 0, 0),
(341, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-06 05:49:30', NULL, 0, 0),
(342, 412, 0, NULL, 1, 'Got a new bid on National SEO Enhancement: Ranking, Links, & On-page Technical', '2024-02-06 05:51:44', NULL, 0, 0),
(343, 412, 0, NULL, 1, 'Got a new bid on Flutter & WordPress Integration Expert', '2024-02-06 06:31:13', NULL, 0, 0),
(344, 412, 0, NULL, 1, 'Got a new bid on Secure WPF CRUD App', '2024-02-06 06:32:14', NULL, 0, 0),
(345, 412, 0, NULL, 1, 'Got a new bid on Wordpress Customization Specialist', '2024-02-06 09:51:43', NULL, 0, 0),
(346, 412, 0, NULL, 1, 'Got a new bid on MySQL DBA Consultant', '2024-02-06 09:52:45', NULL, 0, 0),
(347, 412, 0, NULL, 1, 'Got a new bid on Modern Women Health Hub', '2024-02-06 09:54:50', NULL, 0, 0),
(348, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-06 09:56:03', NULL, 0, 0),
(349, 412, 0, NULL, 1, 'Got a new bid on Flutter & WordPress Integration Expert', '2024-02-06 09:56:54', NULL, 0, 0),
(350, 412, 0, NULL, 1, 'Got a new bid on Secure WPF CRUD App', '2024-02-06 09:57:37', NULL, 0, 0),
(351, 412, 0, NULL, 1, 'Got a new bid on Wordpress Customization Specialist', '2024-02-06 09:58:26', NULL, 0, 0),
(352, 412, 0, NULL, 1, 'Got a new bid on MySQL DBA Consultant', '2024-02-06 09:59:51', NULL, 0, 0),
(353, 412, 0, NULL, 1, 'Got a new bid on Secure WPF CRUD App', '2024-02-06 10:01:09', NULL, 0, 0),
(354, 412, 0, NULL, 1, 'Got a new bid on Wordpress Customization Specialist', '2024-02-06 10:01:59', NULL, 0, 0),
(355, 412, 0, NULL, 1, 'Got a new bid on MySQL DBA Consultant', '2024-02-06 10:02:48', NULL, 0, 0),
(356, 412, 0, NULL, 1, 'Got a new bid on Secure WPF CRUD App', '2024-02-06 10:04:02', NULL, 0, 0),
(357, 412, 0, NULL, 1, 'Got a new bid on Wordpress Customization Specialist', '2024-02-06 10:04:48', NULL, 0, 0),
(358, 412, 0, NULL, 1, 'Got a new bid on MySQL DBA Consultant', '2024-02-06 10:05:22', NULL, 0, 0),
(359, 412, 0, NULL, 1, 'Got a new bid on Loans & Insurance Comparison Marketplace', '2024-02-06 13:00:23', NULL, 0, 0),
(360, 412, 0, NULL, 1, 'Got a new bid on Loans & Insurance Comparison Marketplace', '2024-02-06 13:01:28', NULL, 0, 0),
(361, 412, 0, NULL, 1, 'Got a new bid on Loans & Insurance Comparison Marketplace', '2024-02-06 13:02:32', NULL, 0, 0),
(362, 412, 0, NULL, 1, 'Got a new bid on SEO link building for 5 websites', '2024-02-07 09:52:44', NULL, 0, 0),
(363, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-02-07 09:53:25', NULL, 0, 0),
(364, 412, 0, NULL, 1, 'Got a new bid on SEO link building for 5 websites', '2024-02-07 09:54:21', NULL, 0, 0),
(365, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-02-07 09:54:54', NULL, 0, 0),
(366, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-02-07 09:55:59', NULL, 0, 0),
(367, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-08 07:09:48', NULL, 0, 0),
(368, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-08 07:11:01', NULL, 0, 0),
(369, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-08 09:06:18', NULL, 0, 0),
(370, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-08 09:07:07', NULL, 0, 0),
(371, 412, 0, NULL, 1, 'Got a new bid on Marketing Manager', '2024-02-08 09:07:50', NULL, 0, 0),
(372, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-08 09:08:54', NULL, 0, 0),
(373, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-08 09:10:29', NULL, 0, 0),
(374, 412, 0, NULL, 1, 'Got a new bid on Marketing Manager', '2024-02-08 09:11:13', NULL, 0, 0),
(375, 412, 0, NULL, 1, 'Got a new bid on Marketing Manager', '2024-02-08 09:16:51', NULL, 0, 0),
(376, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-08 09:18:28', NULL, 0, 0),
(377, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-08 09:20:08', NULL, 0, 0),
(378, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-08 09:21:27', NULL, 0, 0),
(379, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-08 09:22:19', NULL, 0, 0),
(380, 412, 0, NULL, 1, 'Got a new bid on Marketing Manager', '2024-02-08 09:23:15', NULL, 0, 0),
(381, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-08 11:31:07', NULL, 0, 0),
(382, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-08 11:32:01', NULL, 0, 0),
(383, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-08 11:32:39', NULL, 0, 0),
(384, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-08 11:33:37', NULL, 0, 0),
(385, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-08 11:34:20', NULL, 0, 0),
(386, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-09 05:04:21', NULL, 0, 0),
(387, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-09 05:05:28', NULL, 0, 0),
(388, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-09 05:06:11', NULL, 0, 0),
(389, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-09 05:07:19', NULL, 0, 0),
(390, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-09 05:37:46', NULL, 0, 0),
(391, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-09 05:38:56', NULL, 0, 0),
(392, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-09 05:40:00', NULL, 0, 0),
(393, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-17 10:36:06', NULL, 0, 0),
(394, 445, 0, NULL, 1, 'Got a new bid on 100% Genuine Online Offline Data Entry Jobs Available.www.data-entry-works.com', '2024-02-17 12:46:09', NULL, 0, 0),
(395, 445, 0, NULL, 1, 'Got a new bid on Home based copy paste and typing data entry jobs available.www.data-entry-works.com', '2024-02-17 12:47:08', NULL, 0, 0),
(396, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-17 13:13:37', NULL, 0, 0),
(397, 445, 0, NULL, 1, 'Got a new bid on 100% Genuine Online Offline Data Entry Jobs Available.www.data-entry-works.com', '2024-02-19 08:59:17', NULL, 0, 0),
(398, 445, 0, NULL, 1, 'Got a new bid on data entry jobs available.data-entry-works.com', '2024-02-19 09:01:46', NULL, 0, 0),
(399, 412, 0, NULL, 1, 'Got a new bid on Pickleball Website', '2024-02-19 09:05:10', NULL, 0, 0),
(400, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-19 09:53:26', NULL, 0, 0),
(401, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-02-19 13:35:03', NULL, 0, 0),
(402, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-20 03:03:31', NULL, 0, 0),
(403, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-20 03:12:19', NULL, 0, 0),
(404, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-20 03:16:48', NULL, 0, 0),
(405, 412, 0, NULL, 1, 'Got a new bid on Website for Car Auction', '2024-02-20 03:21:47', NULL, 0, 0),
(406, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-02-20 06:30:14', NULL, 0, 0),
(407, 412, 0, NULL, 1, 'Got a new bid on Hybrid app development', '2024-02-20 06:32:52', NULL, 0, 0),
(408, 412, 0, NULL, 1, 'Got a new bid on Skilled iOS App Developer Needed', '2024-02-20 06:35:17', NULL, 0, 0),
(409, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-02-20 07:15:53', NULL, 0, 0),
(410, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-02-20 07:17:48', NULL, 0, 0),
(411, 0, 0, NULL, 1, 'Got a new bid on new project', '2024-02-20 07:20:02', NULL, 0, 0),
(412, 412, 0, NULL, 1, 'Got a new bid on Need an Event App', '2024-02-20 11:55:14', NULL, 0, 0),
(413, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-20 12:02:43', NULL, 0, 0),
(414, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-20 12:03:23', NULL, 0, 0),
(415, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-21 10:16:57', NULL, 0, 0),
(416, 445, 0, NULL, 1, 'Got a new bid on 100% Genuine Online Offline Data Entry Jobs Available.www.data-entry-works.com', '2024-02-21 14:50:46', NULL, 0, 0),
(417, 445, 0, NULL, 1, 'Got a new bid on data entry jobs available.data-entry-works.com', '2024-02-21 14:52:47', NULL, 0, 0),
(418, 445, 0, NULL, 1, 'Got a new bid on Typing Data Enry Project Offered', '2024-02-22 07:31:01', NULL, 0, 0),
(419, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-22 08:13:12', NULL, 0, 0),
(420, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-22 08:19:05', NULL, 0, 0),
(421, 412, 0, NULL, 1, 'Got a new bid on Flutter Developer', '2024-02-22 08:22:02', NULL, 0, 0),
(422, 412, 0, NULL, 1, 'Got a new bid on Full Stack Engineer (Mobile & Desktop App)', '2024-02-22 08:53:20', NULL, 0, 0),
(423, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-22 10:23:30', NULL, 0, 0),
(424, 412, 0, NULL, 1, 'Got a new bid on one single web page ', '2024-02-22 11:30:44', NULL, 0, 0),
(425, 412, 0, NULL, 1, 'Got a new bid on Node.js API Gateway Microservices Integration', '2024-02-22 11:53:40', NULL, 0, 0),
(426, 412, 0, NULL, 1, 'Got a new bid on Loans & Insurance Comparison Marketplace', '2024-02-22 12:34:10', NULL, 0, 0),
(427, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-22 14:17:39', NULL, 0, 0),
(428, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-22 14:18:22', NULL, 0, 0),
(429, 412, 0, NULL, 1, 'Got a new bid on Modern Women Health Hub', '2024-02-22 14:19:48', NULL, 0, 0),
(430, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-22 16:07:21', NULL, 0, 0),
(431, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-02-22 20:52:47', NULL, 0, 0),
(432, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-23 03:50:55', NULL, 0, 0),
(433, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-23 05:53:23', NULL, 0, 0),
(434, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-23 05:54:06', NULL, 0, 0),
(435, 412, 0, NULL, 1, 'Got a new bid on Digital Products E-commerce Platform', '2024-02-23 08:47:12', NULL, 0, 0),
(436, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-23 10:20:18', NULL, 0, 0),
(437, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-23 10:55:05', NULL, 0, 0),
(438, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-23 11:35:17', NULL, 0, 0),
(439, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-23 11:42:38', NULL, 0, 0),
(440, 412, 0, NULL, 1, 'Got a new bid on Practo Like App ', '2024-02-23 13:54:21', NULL, 0, 0),
(441, 498, 1, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-23 15:55:56', NULL, 0, 0),
(442, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-23 15:56:23', NULL, 0, 0),
(443, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-23 15:57:10', NULL, 0, 0),
(444, 412, 0, NULL, 1, 'Got a new bid on Self-Drive Car Booking App Development', '2024-02-23 15:57:47', NULL, 0, 0),
(445, 412, 0, NULL, 1, 'Got a new bid on OTA System Developer Needed', '2024-02-23 15:59:09', NULL, 0, 0),
(446, 498, 1, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-23 16:30:17', NULL, 0, 0),
(447, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-02-23 17:43:31', NULL, 0, 0),
(448, 498, 1, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-24 00:48:10', NULL, 0, 0),
(449, 412, 0, NULL, 1, 'Got a new bid on Project Management Software ', '2024-02-24 04:45:29', NULL, 0, 0),
(450, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-24 07:46:03', NULL, 0, 0),
(451, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-02-24 09:27:45', NULL, 0, 0),
(452, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-25 06:23:03', NULL, 0, 0),
(453, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-26 08:48:19', NULL, 0, 0),
(454, 498, 0, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-26 09:00:36', NULL, 0, 0),
(455, 412, 0, NULL, 1, 'Got a new bid on Project Management Software ', '2024-02-26 09:15:44', NULL, 0, 0),
(456, 412, 0, NULL, 1, 'Got a new bid on Facebook Ad Creation for E-commerce', '2024-02-26 11:42:08', NULL, 0, 0),
(457, 412, 0, NULL, 1, 'Got a new bid on Wordpress Customization Specialist', '2024-02-26 11:52:53', NULL, 0, 0),
(458, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-26 14:18:15', NULL, 0, 0),
(459, 498, 0, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-26 14:59:01', NULL, 0, 0),
(460, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-26 18:17:40', NULL, 0, 0),
(461, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-27 05:55:37', NULL, 0, 0),
(462, 498, 1, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-27 05:57:05', NULL, 0, 0),
(463, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-27 05:58:24', NULL, 0, 0),
(464, 412, 0, NULL, 1, 'Got a new bid on Urban Clap Like App Required , URGENT!!', '2024-02-27 06:08:05', NULL, 0, 0),
(465, 412, 0, NULL, 3, 'You got a new message on Social Media Website ', '2024-02-27 06:09:04', NULL, 542, 453),
(466, 412, 0, NULL, 1, 'Got a new bid on Modern Women Health Hub', '2024-02-27 06:11:06', NULL, 0, 0),
(467, 412, 0, NULL, 1, 'Got a new bid on Project Management Software ', '2024-02-27 06:53:26', NULL, 0, 0),
(468, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-27 06:55:08', NULL, 0, 0),
(469, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-27 06:57:23', NULL, 0, 0),
(470, 498, 0, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-27 06:59:49', NULL, 0, 0),
(471, 356, 1, NULL, 1, 'Got a new bid on Google ads expert', '2024-02-27 10:27:57', NULL, 0, 0),
(472, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-27 17:18:43', NULL, 0, 0),
(473, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-27 17:32:45', NULL, 0, 0),
(474, 412, 0, NULL, 1, 'Got a new bid on Graphic T-Shirt Design Creation', '2024-02-27 17:34:58', NULL, 0, 0),
(475, 445, 0, NULL, 1, 'Got a new bid on data entry jobs available.data-entry-works.com', '2024-02-28 12:14:32', NULL, 0, 0),
(476, 498, 0, NULL, 1, 'Got a new bid on Need an app for iOS and Android', '2024-02-29 05:18:54', NULL, 0, 0),
(477, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-02-29 05:34:27', NULL, 0, 0),
(478, 412, 0, NULL, 3, 'You got a new message on Social Media Website ', '2024-02-29 10:15:38', NULL, 542, 445),
(479, 498, 1, NULL, 3, 'You got a new message on Need an app for iOS and Android', '2024-02-29 10:17:19', NULL, 543, 446),
(480, 412, 0, NULL, 3, 'You got a new message on Project Management Software ', '2024-02-29 10:20:30', NULL, 541, 447);
INSERT INTO `notifications` (`id`, `user_id`, `seen`, `notification_to`, `notification_type`, `msg`, `created_at`, `updated_at`, `lead_id`, `bid_id`) VALUES
(481, 412, 0, NULL, 1, 'Got a new bid on Wordpress Project', '2024-02-29 10:30:33', NULL, 0, 0),
(482, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-02-29 10:37:04', NULL, 0, 0),
(483, 412, 0, NULL, 1, 'Got a new bid on Wordpress Project', '2024-02-29 11:55:48', NULL, 0, 0),
(484, 412, 0, NULL, 1, 'Got a new bid on Wordpress Project', '2024-03-07 07:23:33', NULL, 0, 0),
(485, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-03-07 07:31:26', NULL, 0, 0),
(486, 412, 0, NULL, 1, 'Got a new bid on Project Management Software ', '2024-03-07 07:33:26', NULL, 0, 0),
(487, 412, 0, NULL, 1, 'Got a new bid on Engaging Info-Driven Website', '2024-03-07 07:36:29', NULL, 0, 0),
(488, 412, 0, NULL, 1, 'Got a new bid on Convert Website into Android and IOS App', '2024-03-09 16:08:05', NULL, 0, 0),
(489, 412, 0, NULL, 1, 'Got a new bid on Wordpress Project', '2024-03-11 06:18:00', NULL, 0, 0),
(490, 412, 0, NULL, 1, 'Got a new bid on Wordpress Website Required', '2024-03-11 06:20:34', NULL, 0, 0),
(491, 412, 0, NULL, 1, 'Got a new bid on Experienced React JS Developer for AI Projects', '2024-03-11 10:29:23', NULL, 0, 0),
(492, 412, 0, NULL, 1, 'Got a new bid on Project Management Software ', '2024-03-12 07:23:34', NULL, 0, 0),
(493, 539, 0, NULL, 1, 'Got a new bid on ecommerce', '2024-03-12 09:31:39', NULL, 0, 0),
(494, 412, 0, NULL, 1, 'Got a new bid on Social Media Website ', '2024-03-12 09:34:17', NULL, 0, 0),
(495, 412, 0, NULL, 1, 'Got a new bid on POP DISPATCH TRACKING', '2024-03-12 09:36:44', NULL, 0, 0),
(496, 445, 0, NULL, 1, 'Got a new bid on 100% Genuine Online Offline Data Entry Jobs Available.www.data-entry-works.com', '2024-03-12 09:39:06', NULL, 0, 0),
(497, 412, 0, NULL, 1, 'Got a new bid on POP DISPATCH TRACKING', '2024-03-12 09:53:57', NULL, 0, 0),
(498, 548, 1, NULL, 1, 'Got a new bid on SEO (ON page, OFF page)', '2024-03-12 10:19:14', NULL, 0, 0),
(499, 412, 0, NULL, 3, 'You got a new message on Project Management Software ', '2024-03-12 12:00:08', NULL, 541, 480),
(500, 548, 0, NULL, 1, 'Got a new bid on SEO (ON page, OFF page)', '2024-03-12 13:00:04', NULL, 0, 0),
(501, 534, 0, NULL, 1, 'Got a new bid on Nike shoe design', '2024-03-12 13:04:31', NULL, 0, 0),
(502, 548, 0, NULL, 3, 'You got a new message on SEO (ON page, OFF page)', '2024-03-12 13:07:25', NULL, 554, 487),
(503, 534, 0, NULL, 3, 'You got a new message on Nike shoe design', '2024-03-12 13:08:47', NULL, 551, 488),
(504, 539, 0, NULL, 1, 'Got a new bid on ecommerce', '2024-03-13 08:35:58', NULL, 0, 0),
(505, 0, 0, NULL, 1, 'Got a new bid on Want a app for my local store.', '2024-03-13 08:39:07', NULL, 0, 0),
(506, 412, 0, NULL, 1, 'Got a new bid on Minimalist Farm Animal Logo Design', '2024-03-13 08:44:56', NULL, 0, 0),
(507, 556, 0, NULL, 1, 'Got a new bid on PHP/Laravel Website Development', '2024-03-14 08:17:16', NULL, 0, 0),
(508, 548, 0, NULL, 1, 'Got a new bid on SEO (ON page, OFF page)', '2024-03-15 07:30:45', NULL, 0, 0),
(509, 356, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 07:47:51', NULL, 0, 0),
(510, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 07:47:51', NULL, 0, 0),
(511, 356, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 08:13:05', NULL, 0, 0),
(512, 356, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 08:23:12', NULL, 0, 0),
(513, 356, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 08:26:53', NULL, 0, 0),
(514, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-15 11:13:34', NULL, 0, 0),
(515, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-15 11:16:09', NULL, 0, 0),
(516, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 11:16:57', NULL, 0, 0),
(517, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 11:25:31', NULL, 0, 0),
(518, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 11:30:16', NULL, 0, 0),
(519, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 11:35:13', NULL, 0, 0),
(520, 418, 0, NULL, 2, 'New Project assigned to you', '2024-03-15 11:39:08', NULL, 0, 0),
(521, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 11:41:52', NULL, 558, 495),
(522, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 11:45:56', NULL, 558, 495),
(523, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 11:46:08', NULL, 558, 495),
(524, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 11:49:00', NULL, 558, 495),
(525, 418, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 12:54:35', NULL, 558, 495),
(526, 418, 1, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-15 12:59:31', NULL, 558, 495),
(527, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-18 11:51:05', NULL, 425, 52),
(528, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-18 12:01:45', NULL, 425, 52),
(529, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-18 12:04:10', NULL, 425, 52),
(530, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-18 12:04:20', NULL, 425, 52),
(531, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-18 12:08:01', NULL, 425, 52),
(532, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-19 12:54:01', NULL, 425, 52),
(533, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-19 13:03:42', NULL, 425, 52),
(534, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-19 13:03:46', NULL, 425, 52),
(535, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-19 13:03:46', NULL, 425, 52),
(536, 387, 0, NULL, 3, 'You got a new message on Need SEO for my website', '2024-03-19 13:13:03', NULL, 425, 52),
(537, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-22 06:00:50', NULL, 0, 0),
(538, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-22 06:27:02', NULL, 0, 0),
(539, 418, 1, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-22 10:28:39', NULL, 558, 495),
(540, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-22 10:29:28', NULL, 558, 495),
(541, 548, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-22 11:02:52', NULL, 558, 495),
(542, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-23 10:17:13', NULL, 0, 0),
(543, 548, 0, NULL, 1, 'Got a new bid on Need a google ads expert. ', '2024-03-23 11:25:44', NULL, 0, 0),
(544, 548, 0, NULL, 1, 'Got a new bid on Create a food delivery mobile app for my city', '2024-03-26 08:04:39', NULL, 0, 0),
(545, 581, 0, NULL, 2, 'New Project assigned to you', '2024-03-27 12:06:18', NULL, 0, 0),
(546, 581, 0, NULL, 3, 'You got a new message on Create a food delivery mobile app for my city', '2024-03-27 12:12:24', NULL, 560, 500),
(547, 418, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-27 13:33:30', NULL, 558, 495),
(548, 418, 0, NULL, 3, 'You got a new message on Need a google ads expert. ', '2024-03-27 13:35:18', NULL, 558, 495),
(549, 548, 0, NULL, 1, 'Got a new bid on Create a food delivery mobile app for my city', '2024-03-28 04:35:40', NULL, 0, 0),
(550, 412, 0, NULL, 1, 'Got a new bid on POP DISPATCH TRACKING', '2024-03-28 11:51:40', NULL, 0, 0),
(551, 556, 0, NULL, 1, 'Got a new bid on PHP/Laravel Website Development', '2024-03-28 11:55:13', NULL, 0, 0),
(552, 534, 0, NULL, 1, 'Got a new bid on Nike shoe design', '2024-03-28 11:56:58', NULL, 0, 0),
(553, 409, 0, NULL, 1, 'Got a new bid on Flutter web developer', '2024-03-28 12:01:14', NULL, 0, 0),
(554, 412, 0, NULL, 1, 'Got a new bid on Multi-Platform Social Media Sales Campaign', '2024-03-29 05:13:05', NULL, 0, 0),
(555, 412, 0, NULL, 1, 'Got a new bid on POP DISPATCH TRACKING', '2024-03-29 06:09:30', NULL, 0, 0),
(556, 412, 0, NULL, 1, 'Got a new bid on Wordpress Project', '2024-03-29 06:13:30', NULL, 0, 0),
(557, 539, 0, NULL, 1, 'Got a new bid on ecommerce', '2024-03-29 06:23:58', NULL, 0, 0),
(558, 600, 0, NULL, 1, 'Got a new bid on Photographer/editor ', '2024-03-29 11:46:35', NULL, 0, 0),
(559, 600, 0, NULL, 1, 'Got a new bid on Luminous lenswork', '2024-03-29 12:59:39', NULL, 0, 0),
(560, 600, 1, NULL, 1, 'Got a new bid on Luminous lenswork', '2024-03-29 14:24:29', NULL, 0, 0),
(561, 600, 0, NULL, 1, 'Got a new bid on Photographer/editor ', '2024-03-29 14:26:49', NULL, 0, 0),
(562, 594, 1, NULL, 2, 'New Project assigned to you', '2024-03-29 14:28:38', NULL, 0, 0),
(563, 601, 1, NULL, 2, 'New Project assigned to you', '2024-03-29 14:28:38', NULL, 0, 0),
(564, 604, 0, NULL, 2, 'New Project assigned to you', '2024-03-29 14:28:54', NULL, 0, 0),
(565, 594, 1, NULL, 2, 'New Project assigned to you', '2024-03-29 14:28:59', NULL, 0, 0),
(566, 600, 0, NULL, 1, 'Got a new bid on Photographer/editor ', '2024-03-30 05:01:07', NULL, 0, 0),
(567, 600, 0, NULL, 1, 'Got a new bid on Photographer/editor ', '2024-03-30 05:01:32', NULL, 0, 0),
(568, 606, 0, NULL, 1, 'Got a new bid on Candid photography ', '2024-03-30 05:04:27', NULL, 0, 0),
(569, 600, 0, NULL, 3, 'You got a new message on Photographer/editor ', '2024-03-30 06:42:57', NULL, 563, 513),
(570, 600, 0, NULL, 1, 'Got a new bid on Photographer/editor ', '2024-03-30 12:29:50', NULL, 0, 0),
(571, 606, 0, NULL, 1, 'Got a new bid on Candid photography ', '2024-03-30 12:32:14', NULL, 0, 0),
(572, 606, 0, NULL, 1, 'Got a new bid on Candid photography ', '2024-03-31 13:18:50', NULL, 0, 0),
(573, 600, 0, NULL, 3, 'You got a new message on Luminous lenswork', '2024-04-01 16:21:51', NULL, 564, 512),
(574, 548, 1, NULL, 1, 'Got a new bid on simple website', '2024-04-03 10:22:18', NULL, 0, 0),
(575, 418, 1, NULL, 3, 'You got a new message on simple website', '2024-04-03 10:23:44', NULL, 567, 520),
(576, 548, 0, NULL, 3, 'You got a new message on simple website', '2024-04-03 10:24:12', NULL, 567, 520),
(577, 418, 0, NULL, 2, 'New Project assigned to you', '2024-04-03 10:24:34', NULL, 0, 0),
(578, 548, 0, NULL, 1, 'Got a new bid on simple website', '2024-04-04 04:50:15', NULL, 0, 0),
(579, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-04 10:16:38', NULL, 0, 0),
(580, 445, 0, NULL, 1, 'Got a new bid on data entry jobs available.data-entry-works.com', '2024-04-04 10:29:09', NULL, 0, 0),
(581, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-04 10:46:41', NULL, 0, 0),
(582, 600, 0, NULL, 3, 'You got a new message on Photographer/editor ', '2024-04-04 10:57:23', NULL, 563, 513),
(583, 539, 0, NULL, 3, 'You got a new message on ecommerce', '2024-04-04 10:58:42', NULL, 552, 509),
(584, 548, 0, NULL, 1, 'Got a new bid on simple website', '2024-04-04 14:40:45', NULL, 0, 0),
(585, 531, 0, NULL, 1, 'Got a new bid on Make a website', '2024-04-04 15:04:09', NULL, 0, 0),
(586, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-04 15:06:18', NULL, 0, 0),
(587, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-04 20:58:35', NULL, 0, 0),
(588, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-05 15:35:05', NULL, 0, 0),
(589, 412, 0, NULL, 3, 'You got a new message on Shopify Developer Required', '2024-04-05 22:36:32', NULL, 568, 528),
(590, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-06 07:39:59', NULL, 0, 0),
(591, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-06 11:42:52', NULL, 0, 0),
(592, 548, 0, NULL, 1, 'Got a new bid on simple website', '2024-04-06 11:45:32', NULL, 0, 0),
(593, 606, 0, NULL, 1, 'Got a new bid on Candid photography ', '2024-04-08 13:25:01', NULL, 0, 0),
(594, 412, 0, NULL, 1, 'Got a new bid on Dating App', '2024-04-08 17:45:12', NULL, 0, 0),
(595, 412, 0, NULL, 1, 'Got a new bid on Dating App', '2024-04-09 05:38:14', NULL, 0, 0),
(596, 412, 0, NULL, 1, 'Got a new bid on GPS APP Required', '2024-04-09 05:38:51', NULL, 0, 0),
(597, 412, 0, NULL, 1, 'Got a new bid on Dream11 App', '2024-04-09 05:39:37', NULL, 0, 0),
(598, 412, 0, NULL, 1, 'Got a new bid on Service App Required', '2024-04-09 05:40:11', NULL, 0, 0),
(599, 412, 0, NULL, 1, 'Got a new bid on Mobile App', '2024-04-09 05:40:36', NULL, 0, 0),
(600, 548, 0, NULL, 1, 'Got a new bid on simple website', '2024-04-09 06:33:32', NULL, 0, 0),
(601, 412, 0, NULL, 1, 'Got a new bid on GPS APP Required', '2024-04-09 06:40:02', NULL, 0, 0),
(602, 412, 0, NULL, 1, 'Got a new bid on Shopify Developer Required', '2024-04-09 06:57:11', NULL, 0, 0),
(603, 412, 0, NULL, 1, 'Got a new bid on one single web page ', '2024-04-09 07:04:44', NULL, 0, 0),
(604, 548, 0, NULL, 1, 'Got a new bid on simple website', '2024-04-09 09:42:08', NULL, 0, 0),
(605, 0, 0, NULL, 1, 'Got a new bid on I want content for my website.', '2024-04-09 09:47:48', NULL, 0, 0),
(606, 606, 0, NULL, 1, 'Got a new bid on Candid photography ', '2024-04-10 08:57:33', NULL, 0, 0),
(607, 412, 0, NULL, 1, 'Got a new bid on Dating App', '2024-04-10 09:02:40', NULL, 0, 0),
(608, 412, 0, NULL, 1, 'Got a new bid on GPS APP Required', '2024-04-10 09:03:45', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_categories`
--

INSERT INTO `page_categories` (`id`, `category`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Development', 'development', '2023-08-07 22:50:35', '2023-08-07 23:10:03', NULL),
(3, 'Designing', 'designing', '2023-08-07 23:20:46', '2023-08-07 23:20:46', NULL),
(4, 'Latest Tech', 'latest-tech', '2023-08-07 23:20:52', '2023-08-07 23:20:52', NULL),
(5, 'Marketing', 'marketing', '2023-08-07 23:21:14', '2023-08-07 23:21:14', NULL),
(6, 'Law', 'law', '2023-08-07 23:21:17', '2023-08-07 23:21:17', NULL),
(7, 'Accounting', 'accounting', '2023-08-07 23:21:21', '2023-08-07 23:21:21', NULL),
(8, 'Miscellaneous', 'miscellaneous', '2023-08-07 23:21:49', '2023-08-07 23:21:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-03-25 07:21:57', '2023-03-25 07:21:57'),
(2, 'role-create', 'web', '2023-03-25 07:21:57', '2023-03-25 07:21:57'),
(3, 'role-edit', 'web', '2023-03-25 07:21:57', '2023-03-25 07:21:57'),
(4, 'role-delete', 'web', '2023-03-25 07:21:57', '2023-03-25 07:21:57'),
(5, 'lead-list', 'web', '2023-03-25 07:21:57', '2023-03-25 07:21:57'),
(9, 'access-menu-show', 'web', '2023-04-10 06:41:13', '2023-04-11 00:55:09'),
(10, 'dashboard-show', 'web', '2023-04-10 06:44:24', NULL),
(11, 'service-edit', 'web', '2023-04-10 06:46:02', NULL),
(12, 'questions-edit', 'web', '2023-04-10 06:48:52', NULL),
(13, 'questions-delete', 'web', '2023-04-10 06:49:06', NULL),
(14, 'answers-edit', 'web', '2023-04-10 06:52:11', NULL),
(15, 'answers-delete', 'web', '2023-04-10 06:52:24', NULL),
(16, 'add-answers', 'web', '2023-04-10 06:53:57', '2023-04-11 00:55:18'),
(17, 'add-questions', 'web', '2023-04-10 06:55:00', NULL),
(18, 'services-menu-show', 'web', '2023-04-10 09:08:38', NULL),
(20, 'assign-button', 'web', '2023-04-11 01:25:40', '2023-04-11 01:25:40'),
(21, 'customers-list', 'web', '2023-04-11 06:00:20', '2023-04-11 06:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` int(11) NOT NULL,
  `name` text,
  `image` text,
  `about` text,
  `listing_about` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` text,
  `designation` text,
  `slug` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `name`, `image`, `about`, `listing_about`, `created_at`, `updated_at`, `price`, `designation`, `slug`) VALUES
(1, 'Aayush Khurana', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 15', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', '2023-04-29 04:03:40', NULL, '600/day', 'Web Developer', 'aayush-khurana'),
(2, 'Akshay', NULL, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 15', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less ', '2023-04-29 05:14:29', NULL, '500/day', 'Web Designer', 'akshay'),
(3, 'Ramesh', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 15', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less ', '2023-04-29 05:14:29', NULL, '500/day', 'Web Designer', 'ramesh');

-- --------------------------------------------------------

--
-- Table structure for table `professional_gigs`
--

CREATE TABLE `professional_gigs` (
  `gig_id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `gig_title` text COLLATE utf8_unicode_ci,
  `gig_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gig_price` float DEFAULT NULL,
  `gig_desc` text COLLATE utf8_unicode_ci,
  `gig_status` int(2) DEFAULT '1' COMMENT '1= active, 0 = inactive',
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Professional Gig table';

-- --------------------------------------------------------

--
-- Table structure for table `professional_leads`
--

CREATE TABLE `professional_leads` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professional_portfolios`
--

CREATE TABLE `professional_portfolios` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `professional_slug` varchar(255) DEFAULT NULL,
  `title` text,
  `description` text,
  `files` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professional_portfolios`
--

INSERT INTO `professional_portfolios` (`id`, `professional_id`, `professional_slug`, `title`, `description`, `files`, `created_at`, `updated_at`, `link`) VALUES
(1, 2, 'sandeep-m', 'Portfolio one', 'Portfolio one description', '20231004_033147artificial-intelligence.jpg,20231004_033147digital-marketing.jpg,20231004_033147facebook-logo.png', '2023-10-04 08:31:47', NULL, NULL),
(9, 225, NULL, 'project1', 'project1 description', '20231004_0756588WhatsApp Image 2023-09-23 at 14.27.38.jpeg', '2023-10-04 12:56:58', NULL, NULL),
(10, 225, NULL, 'project2', 'project2 description', '20231004_0757210WhatsApp Image 2023-09-23 at 14.27.37.jpeg', '2023-10-04 12:57:21', NULL, NULL),
(11, 226, NULL, 'title', 'description', '20231005_1206235WhatsApp Image 2023-09-23 at 14.27.38.jpeg', '2023-10-05 05:06:23', NULL, NULL),
(12, 226, NULL, 'text', 'desc', '20231005_1206504sooprs_logo_blue_side2.png', '2023-10-05 05:06:50', NULL, NULL),
(13, 227, NULL, 'titlte', 'kjskjk', '20231005_0132158sooprs_logo_blue_side2.png', '2023-10-05 06:32:15', NULL, NULL),
(15, 228, NULL, 'title', 'description', '20231005_0159019sooprs_logo_blue_side2.png', '2023-10-05 06:59:01', NULL, NULL),
(16, 228, NULL, 'tiasfdas', 'asdfasdfasdfasdfasdf asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfvasdfasdfasdfasdfasdfvvvasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf', '20231005_01592961111.png', '2023-10-05 06:59:29', NULL, NULL),
(17, 235, NULL, 'title', 'description', '20231005_0738570Passport_Photograph.jpg', '2023-10-05 12:38:57', NULL, NULL),
(18, 235, NULL, 'title', 'description', '20231005_0739226471A1885.JPG', '2023-10-05 12:39:22', NULL, NULL),
(19, 235, NULL, 'title', 'description', '20231005_0739246471A1885.JPG', '2023-10-05 12:39:24', NULL, NULL),
(20, 235, NULL, 'title', 'description', '20231005_0745046471A1852.JPG', '2023-10-05 12:45:04', NULL, NULL),
(23, 238, '@madhukar231006035157', 'title', 'descrption', '20231006_0442423sooprs_logo_blue_side2.png', '2023-10-06 09:42:42', NULL, NULL),
(24, 251, '', 'Test Portfolio', 'qwerty qwerty', '20231018_0553162tiago-exterior-right-front-three-quarter-24.webp', '2023-10-18 10:53:16', NULL, NULL),
(28, 255, 'gokul', 'title', 'description', '20231018_0922425sooprs_logo.png', '2023-10-18 14:22:42', NULL, NULL),
(36, 254, 'anurag-chauhan', 'test portfolio', 'test test', '20231021_0553261tiago-exterior-right-front-three-quarter-24.webp', '2023-10-21 10:53:26', NULL, NULL),
(37, 260, 'gokul', 'talkcharge', 'I created this project alone ', '20231022_1258066Screenshot_2.png', '2023-10-22 05:58:06', NULL, NULL),
(39, 254, 'anurag-chauhan', 'talkcharge', 'I made app of this project, its an affliate app.', '20231022_0304431Screenshot_2.png', '2023-10-22 08:04:43', NULL, NULL),
(41, 254, 'anurag-chauhan', 'sooprs', 'sooprs', '20231022_0606281sooprs_logo.png', '2023-10-22 11:06:28', NULL, NULL),
(42, 254, 'anurag-chauhan', 'new', 'new', '20231022_0649307Screenshot_3.png', '2023-10-22 11:49:30', NULL, 'www.cleardekho.com'),
(43, 265, 'employee', 'cleardekho', 'I have made this app', '20231102_103501224x7.png', '2023-11-02 15:35:01', NULL, 'www.cleardekho.com'),
(44, 263, 'amit', 'Website Development', 'Developed an eCommerce Website', '20231103_024954201-09-2022.jpg', '2023-11-03 07:49:54', NULL, 'www.ecommerce.com'),
(45, 263, 'amit', 'Website Development', 'Developed an eCommerce Website', '20231103_024957801-09-2022.jpg', '2023-11-03 07:49:57', NULL, 'www.ecommerce.com'),
(46, 263, 'amit', 'Website Development', 'Developed an eCommerce Website', '20231103_025111601-09-2022.jpg', '2023-11-03 07:51:11', NULL, 'www.ecommerce.com'),
(47, 271, '', 'portfolio1', 'Describing about myself is very long work, its quite hectic', '20231104_0645587WIN_20231104_04_44_10_Pro.jpg', '2023-11-04 11:45:58', NULL, 'www.techninza.in'),
(48, 271, '', 'portfolio1', 'Describing about myself is very long work, its quite hectic', '20231104_0645581WIN_20231104_04_44_10_Pro.jpg', '2023-11-04 11:45:58', NULL, 'www.techninza.in'),
(49, 347, 'vijay-singh-1', 'Talkcharge', 'Coupon site and deal platform', '20231124_0716352illo_welcome_1.png', '2023-11-24 13:16:35', NULL, 'https://talkcharge.com'),
(50, 260, 'gokul', 'portfolio1', 'asdfasdfasdfasdfasdfasdfasdf\r\nasdfasdfasdfasdfasdfasdfasdf\r\nasdfasdfasdfasdfasdfasdfasdf\r\nasdfasdfasdfasdfasdfasdfasdf', '20231204_1037194cute-pancakes-with-chicken-compressed-removebg-preview.png', '2023-12-04 16:37:19', NULL, 'porto'),
(51, 352, 'sandeep', 'certigo', 'certigo description', '20231206_125855124x7.png', '2023-12-06 06:58:55', NULL, 'certigo.com'),
(52, 353, 'gokul-1', 'website education', 'web education platform\r\nweb education platform\r\nweb education platform\r\nweb education platform\r\nweb education platform\r\nweb education platform', '20231206_063459424x7.png', '2023-12-06 12:34:59', NULL, ''),
(53, 353, 'gokul-1', 'portfolio2', 'portfolio2 description\r\nportfolio2 description\r\nportfolio2 description\r\nportfolio2 description\r\nportfolio2 description', '20231206_0636063cute-pancakes-with-chicken-compressed.jpg', '2023-12-06 12:36:06', NULL, ''),
(54, 355, 'gokul', 'talkcharge', 'Affiliate Marketing Wesbite , Completely Commission based.', '20231208_0643369LCArticle_CarMaintenanceChecklist.jpg', '2023-12-08 12:43:36', NULL, ''),
(55, 355, 'gokul', 'cleardekho', 'Demo of Lenskart', '20231208_0645232lovepik-potted-flowers-stick-figures-png-image_401755435_wh860.png', '2023-12-08 12:45:23', NULL, ''),
(56, 357, 'dipak-kumar', 'Couchette', 'bean bag project', '20231208_070719124x7.png', '2023-12-08 13:07:19', NULL, ''),
(57, 358, 'kapil-rohilla', 'User Management System', 'Its a MERN stack web app having features like - pagination , searching based of 3 different filter, user can login, create account.', '20231208_071925024x7.png', '2023-12-08 13:19:25', NULL, 'https://github.com/kapilrohilla/heliverseAssignment'),
(59, 363, 'varun-rana-1', 'react native developer', 'react native developer', '20231209_06111222.png', '2023-12-09 12:11:12', NULL, ''),
(60, 356, 'sandeep-mehandia', 'Real Estate Website - Smart Landmark', 'Smart Landmark Pvt. Ltd. is a real estate company located in India. The company has been in operation since 2004, and they specialize in providing a range of real estate services, including land acquisition, land development, and property management. Their team of experienced professionals is committed to delivering high-quality services and providing clients with comprehensive solutions for their real estate needs. They pride themselves on their strong work ethic and dedication to customer satisfaction. Smart Landmark primary focus is on land acquisition and development, with a particular emphasis on acquiring land for residential and commercial development. They also offer property management services to help clients manage their properties efficiently and effectively.', '20231211_0227421Screenshot 2023-12-11 135656.png', '2023-12-11 08:27:42', NULL, 'https://smartlandmark.in/'),
(66, 356, 'sandeep-mehandia', 'Butterfly', 'Butterfly - A gaming App', '20231211_0408093Screenshot 2023-12-11 152318.png', '2023-12-11 10:08:09', NULL, 'https://butterflydrems.com/'),
(69, 365, 'amit', 'hgfh', 'dgfdgdgh', '20231212_01215871.jpg', '2023-12-12 07:21:58', NULL, ''),
(70, 366, 'karan', 'caross', 'caross', '20231212_0142117caross.png', '2023-12-12 07:42:11', NULL, ''),
(71, 367, 'deven', 'Budget Logistics', 'Budget Logistic and Packers is a professional and reputed relocation service provider based in Bangalore.', '20231212_0155491Budget Logistics.png', '2023-12-12 07:55:49', NULL, 'https://budgetlogisticspackers.com/'),
(72, 369, 'vikas', 'Book Taxis', 'Book Taxis is an online taxi booking platform.', '20231212_0217235Book Taxi.png', '2023-12-12 08:17:23', NULL, 'https://booktaxis.site/'),
(73, 370, 'ankur', 'Eastern Herbal Company', 'Eastern Herbal Company is dedicated to promoting health and wellness through the power of Eastern herbal medicine. We offer a diverse range of high-quality herbal products, personalized consultations, and educational resources to support individuals on their holistic wellness journey. With a focus on authenticity, sustainability, and accessibility, we aim to empower individuals to enhance their well-being naturally.', '20231212_0249461EHC.png', '2023-12-12 08:49:46', NULL, 'https://easternherbalcompany.com/'),
(74, 371, 'piyush', 'The 3 Arrrows', 'They are into the construction business since 2006 and we are officially registered in Companies Act, 1956 in March 2013 as “THE 3 ARROWS NIRMAN PVT. LTD.\".', '20231212_02572103 arrows.png', '2023-12-12 08:57:21', NULL, 'https://the3arrowsnirman.in/'),
(75, 372, 'rahul', 'Raju Bros', 'Optimize and Enhance Your PCB Testing Facilities with Our FCT Solutions.', '20231212_0328516raju.png', '2023-12-12 09:28:51', NULL, 'https://www.rajubros.com/'),
(76, 374, 'prashant', 'JP Oil Mill', 'Food Processing Company', '20231212_0339422jp.png', '2023-12-12 09:39:42', NULL, 'https://j-p-oil-mill.business.site/'),
(77, 375, 'arpit', 'CKD Pack', 'Ckdpack specializes in designing mathematically engineered packaging and logistical solutions.', '20231212_0345497ckd.png', '2023-12-12 09:45:49', NULL, 'https://www.ckdpack.com/'),
(78, 376, 'shivam', 'Milli Pure Foods', 'Milli Pure Foods Private Limited is a leading Fortified Rice Kernels (FRK) manufacturer and seller supplying Fortified Rice Kernels (FRK) in India, mainly in Punjab, Haryana, Uttar Pradesh, and Bihar.', '20231212_0351557milli.png', '2023-12-12 09:51:55', NULL, 'https://www.millipurefoods.com/'),
(79, 377, 'naman', 'Talkcharge', 'TalkCharge provides hassle free online experience with cashback offers for users whenever they shop.', '20231212_0407227talk.png', '2023-12-12 10:07:22', NULL, ''),
(80, 399, 'gokul-kumar', 'techninza', 'This is my Website', '20231230_0418396images.jpg', '2023-12-30 10:18:39', NULL, ''),
(81, 397, 'sunny', 'test project', 'hello i m testing portfolio', '20240106_0345267Avatar29.png,20240106_0345267Avatar30.png,20240106_0345263Avatar36.png', '2024-01-06 09:45:26', NULL, 'https://sooprs.com/professional/sunny'),
(82, 397, 'sunny', 'testing', 'testing testing', '20240106_0350194Screenshot 2024-01-06 133333.png,20240106_0350191Screenshot 2024-01-06 135241.png,20240106_0350198Screenshot 2024-01-06 135832.png', '2024-01-06 09:50:19', NULL, ''),
(87, 391, 'rahul-professional', 'Portfolio testing', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '20240110_0659327age-restriction.jpg,20240110_0659336download (1).jpg,20240110_0659330download.jpg', '2024-01-10 12:59:33', NULL, ''),
(92, 391, 'rahul-professional', 'btrhrt', 'hgrthyrthyrth', '20240111_0128310car-maintenance-606ab2f8ab000.jpg', '2024-01-11 07:28:31', NULL, ''),
(93, 391, 'rahul-professional', 'beragbregb', 'trhg', '20240111_0130193car-maintenance-606ab2f8ab000.jpg', '2024-01-11 07:30:19', NULL, ''),
(98, 419, 'harish-uginval', 'Social media app like Facebook', 'Social media app for anonymous user', '20240111_0353466photo_2023-11-25 09.36.47.jpeg', '2024-01-11 09:53:46', NULL, ''),
(99, 419, 'harish-uginval', 'Social media app like tik tok', '', '20240111_0354362home.png', '2024-01-11 09:54:36', NULL, ''),
(100, 413, 'gokul-professional', 'Talkcharge', 'TalkCharge - India’s sole online portal providing both Online Services and Discount Coupons. Our services include Recharge, DTH, Data Card and Bill Payments for Electricity, Landline, Gas, Water Bills and more for all the operators such as Airtel, Vodafone, BSNL, JIO, MTNL etc. ', '20240111_0900161talkcharge.png', '2024-01-11 15:00:16', NULL, ''),
(101, 413, 'gokul-professional', 'Earnezy', 'An Earning Application', '20240111_0904377earnezy.png', '2024-01-11 15:04:37', NULL, ''),
(103, 413, 'gokul-professional', 'LUDO', 'Online Ludo Game', '20240111_0911422ludo.png', '2024-01-11 15:11:42', NULL, ''),
(104, 429, 'amit-sharma', 'Aahilya Holidays', 'Aahilya Holidays specialise in really unique holidays that go off the normal tourist route and onto the off the beaten track. Aahilya Holidays love to explore rural villages, traditional textile techniques which honour the ethnic culture of each country that they visit.', '20240117_0132537aahilya.png', '2024-01-17 07:32:53', NULL, 'https://www.aahilyaholidays.com/'),
(105, 434, 'anurag-chauhan-1', 'Leapx', 'Digital Marketing Automation App', '20240117_0354183Screenshot 2024-01-17 152259.png', '2024-01-17 09:54:18', NULL, 'https://leapxads.com'),
(106, 434, 'anurag-chauhan-1', 'Meta Trader', 'Trading Website', '20240117_0354565Screenshot 2024-01-17 152242.png', '2024-01-17 09:54:56', NULL, 'http://65.0.59.137:8080/'),
(109, 415, 'prem-kumar', 'UI/UX Designer', 'PDP Page design concept for Shoes store ', '20240117_0422409Screenshot 2024-01-17 155216.png', '2024-01-17 10:22:40', NULL, 'https://www.behance.net/prem718'),
(111, 472, 'safeer-hussain', 'Senior MERN Stack Developer - Safeer Hussain', 'A highly motivated and results-oriented Senior MERN Stack Developer with 3+ years of experience seeking a remote opportunity to contribute to exciting and impactful projects. Possesses in-depth knowledge of the full MERN stack (React, Node.js, Express, MongoDB) and a proven track record of building and deploying robust, scalable web applications. Strong collaborative and communication skills, thrives in a remote work environment.\r\n\r\nTechnical Skills:\r\n\r\nFrontend:\r\nReact (including experience with frameworks/libraries like Redux, and Next.js)\r\nHTML5, CSS3, JavaScript\r\nBackend:\r\nNode.js with in-depth experience in Express.js\r\nAPI development and design\r\nDeployment tools (AWS, Heroku, etc.)\r\nDatabase:\r\nMongoDB (including aggregation queries and data modeling)\r\nTesting:\r\nUnit testing (Jest, Mocha)\r\nIntegration testing\r\nEnd-to-end testing (Cypress, Selenium)\r\nVersion control: Git\r\nAdditional Skills (optional):\r\n\r\nCloud deployment (AWS, Heroku, Google Cloud)\r\nDevOps tools (Docker, Kubernetes)\r\nContinuous integration/continuous delivery (CI/CD)\r\nProject management methodologies (Agile, Scrum)', '20240222_0217567WhatsApp Image 2024-02-22 at 12.09.05 AM.jpeg', '2024-02-22 08:17:56', NULL, 'https://next-portfolio-01.vercel.app/'),
(112, 488, 'sharad', 'GM10', 'GM10 is the social platform for everything trading cards. We’re collectors who have built a collector-focused application that connects the trading card hobby by bringing the best of everything into one platform. These collector-focused tools include:', '20240223_0214393Screenshot 2024-02-23 at 1.42.59 PM.png', '2024-02-23 08:14:39', NULL, 'https://play.google.com/store/apps/details?id=com.it.gm10'),
(113, 488, 'sharad', 'Area! App', '\r\nArea! is a personal safety guide that utilizes locally powered artificial intelligence to keep you safe.', '20240223_0219148Screenshot 2024-02-23 at 1.46.59 PM.png', '2024-02-23 08:19:14', NULL, 'https://play.google.com/store/apps/details?id=com.towntalk.areaapp'),
(114, 488, 'sharad', 'ROLA.ai', '', '20240223_0221079Screenshot 2024-02-23 at 1.50.09 PM.png', '2024-02-23 08:21:07', NULL, ''),
(115, 488, 'sharad', 'Amistee Partners', '', '20240223_0222378Screenshot 2024-02-23 at 1.52.14 PM.png', '2024-02-23 08:22:37', NULL, ''),
(116, 492, 'hassan', 'My Portfolio', 'My portfolio website contains all the information about me as also all my previous projects and links to social media accounts\r\n', '20240223_0238222portfolio-v2.png', '2024-02-23 08:38:22', NULL, 'https://hassanwebdev.vercel.app/'),
(117, 517, 'priyanka-sharma', 'PinBlooms technology', '', '20240227_1242296banner-logo.jpg', '2024-02-27 06:42:29', NULL, 'https://drive.google.com/file/d/1GH5F6q_jv6--YMWLiRM4mfp9UuHCGa-r/view?usp=sharing'),
(118, 519, 'bilal-raza', 'React Front-end dev', '', '20240227_0126056profile1.JPG', '2024-02-27 07:26:05', NULL, 'https://www.techmatrixs.com'),
(119, 528, 'be-traveler', 'Manali tour package', 'Delhi – Manali – Delhi Volvo Bus 2 Tickets\r\n3 Night Accommodation in a hotel\r\nDouble Sharing Basis Accommodation in Hotel ( Deluxe Room in Use )\r\nAll Days Breakfast and Dinner\r\nFlower Bed Decoration Once Night in Manali\r\nHoneymoon Cake Once Night in Manali\r\nPick up and Drop from Manali Volvo Bus Stand to Hotel\r\nOne Day Sightseeing of Local Manali by Private Car\r\nOne Full Day Sightseeing of Solang Valley by Private Car\r\nOne Full Day Sightseeing of Kullu – Nagar Castle by Private Car\r\nAll taxes include. ', '20240229_0223120manali tour package.png', '2024-02-29 08:23:12', NULL, 'https://tickyourtour.com/st_tour/manali-tour-package/'),
(120, 528, 'be-traveler', 'Thailand Tour package ', '₹ 24,450 / Pack\r\n\r\nService Specifications\r\n\r\nNo Of Persons\r\n25\r\nDestination Location\r\nSouth India\r\nStarting Location\r\nChennai\r\nMinimum Order Quantity\r\n25 Pack\r\nProduct Capacity\r\n40\r\nService Description\r\n\r\nInclusive:\r\n\r\n2N stay in Pattaya\r\n2N stay in Bangkok\r\nFull Board Meal\r\nAll entry tickets\r\nsight seeing in Pvt\r\nEnglish speaking guide\r\n\r\nNot Included:\r\n\r\nAir Fare\r\nOn arrival visa charges\r\n\r\nWith Regards\r\nPious Devavaram\r\nJoy Tourism\r\nCoimbatore\r\n**********', '20240229_0228066thailand tour.webp', '2024-02-29 08:28:06', NULL, 'https://m.indiamart.com/proddetail/tour-packages-for-thailand-26324763191.html'),
(121, 529, 'wanderlust-weddings', 'Delhi Dwarka wedding', '', '20240229_0400341wedding pic.jpeg', '2024-02-29 10:00:34', NULL, ''),
(122, 529, 'wanderlust-weddings', 'Janakpuri wedding project', '', '20240229_0404233wedding.jpeg', '2024-02-29 10:04:23', NULL, ''),
(123, 529, 'wanderlust-weddings', 'Delhi (Najafgarh) project', '', '20240229_0405427pic mrg.jpeg', '2024-02-29 10:05:42', NULL, ''),
(125, 553, 'mizanur-islam-laskar', 'Fiverr Portfolio', 'Some projects that were added in my Fiverr Portfolio', '20240313_0110132FiverrPortfolio.JPG', '2024-03-13 06:10:13', NULL, 'https://www.fiverr.com/users/cicakemizan/portfolio'),
(126, 567, 'itive-peace', 'E-commerce application', 'A visually pleasing e-commerce site built with webflow.', '20240316_0523564k1.jpg,20240316_0523567k2.jpg,20240316_0523568k3.jpg,20240316_0523569k4.jpg', '2024-03-16 10:23:56', NULL, 'kerstoneluxe.webflow.io'),
(127, 567, 'itive-peace', 'Tech Agency Website', 'A professionally designed and developed website for a tech agency.', '20240316_0528579Screenshot 2024-03-16 112708.jpg,20240316_0528579Screenshot 2024-03-16 112734.jpg,20240316_0528576Screenshot 2024-03-16 112759.jpg,20240316_0528570Screenshot 2024-03-16 112821.jpg', '2024-03-16 10:28:57', NULL, 'https://www.liteutilities.com/'),
(128, 611, 'shravan-surve', 'Shravan Surve Photography ', 'Hi,\r\nMyself Shravan Surve, Professional Photographer. Specialised in Fashion, Beauty and Commercial. \r\nI am pleased to inform you that my portfolio website is now live. \r\nFeel free to check it out and feel free to book me for any upcoming shoots. Also if you have any queries feel free to ask. \r\n\r\nI am attaching the link in separate message if you need to share it with someone.\r\n', '20240330_1203506IMG_3370.jpeg', '2024-03-30 05:03:50', NULL, 'https://surveshravan.myportfolio.com/'),
(129, 611, 'shravan-surve', 'Shravan Surve Photography ', 'Hi,\r\nMyself Shravan Surve, Professional Photographer. Specialised in Fashion, Beauty and Commercial. \r\nI am pleased to inform you that my portfolio website is now live. \r\nFeel free to check it out and feel free to book me for any upcoming shoots. Also if you have any queries feel free to ask. \r\n\r\nI am attaching the link in separate message if you need to share it with someone.\r\n', '20240330_1205234IMG_4358.jpeg', '2024-03-30 05:05:23', NULL, 'https://surveshravan.myportfolio.com/'),
(130, 616, 'tarun', 'Photographer', 'TJ FOTOGRAPHY DOT COM , ( NINE EIGHT ONE ONE ONE NINE ZERO FIVE FOUR ZERO )', '20240330_0122557_MG_3009edited.JPG,20240330_0122556_MG_3119edited.JPG,20240330_0122550_MG_3405edited.JPG,20240330_0122555_MG_3427edited.JPG,20240330_0122555_MG_3454edited.JPG,20240330_0122553_MG_3456edited.JPG,20240330_0122553IMG_0667edited.JPG,20240330_0122551IMG_0684edited.JPG,20240330_0122556IMG_0764edited.JPG,20240330_0122550IMG_0863edited.JPG,20240330_0122556IMG_0889edited.JPG,20240330_0122555IMG_0953edited.JPG,20240330_0122558IMG_1050edited.JPG,20240330_0122550IMG_1095edited.JPG,20240330_0122555IMG_1104edited.JPG,20240330_0122556IMG_1106edited.JPG,20240330_0122551IMG_1240edited.JPG,20240330_0122556IMG_1257edited.JPG,20240330_0122558IMG_1288edited.JPG,20240330_0122551IMG_3954edited.JPG', '2024-03-30 06:22:55', NULL, 'Tjfotography.com'),
(131, 638, 'ajijola-damilola', 'Prid0r', 'STORE', '20240404_0953549Prid0r.png', '2024-04-04 14:53:54', NULL, 'https://prid0r.myshopify.com/?key=b2856de843fa29c6ab835499af6d7c148851a60ddb73e5323468fceec2e62a99'),
(132, 634, 'haseeb-ramzan', ' Experienced Shopify Expert with Specialization in E-commerce Solutions', 'I am writing to introduce myself as a seasoned Shopify expert with over two years and six months of experience specializing in e-commerce solutions. With a proven track record of delivering exceptional results for clients across various industries, I am eager to bring my expertise to your team at Sooprs.com.\r\n\r\nAs a Shopify expert, I have successfully launched and optimized numerous e-commerce stores, focusing on enhancing user experience, increasing conversion rates, and driving sales. My proficiency lies in designing and customizing Shopify stores, optimizing product listings, managing inventory, and implementing effective marketing strategies to maximize online visibility and revenue.\r\n\r\nKey Professional Keywords:\r\n\r\nShopify Expert\r\nE-commerce Solutions\r\nStore Launch and Optimization\r\nUser Experience Enhancement\r\nConversion Rate Optimization\r\nSales Growth Strategies\r\nProduct Listing Optimization\r\nInventory Management\r\nDigital Marketing\r\nI am committed to staying updated with the latest trends and best practices in e-commerce to ensure that my clients receive innovative and results-driven solutions. With a strong passion for delivering excellence and a dedication to exceeding expectations, I am confident in my ability to contribute to the success of your projects.\r\n\r\nThank you for considering my application. I am eager to discuss how my skills and experiences align with the needs of your team at Sooprs.com.\r\n\r\nSincerely,\r\nHaseeb Ramzan', '20240404_0319447Haseeb Ramzan Cv.png', '2024-04-04 20:19:44', NULL, 'https://falakfabrics.store\r\n\r\nhttps://ummiscents.com\r\n\r\nhttps://www.electronicouniverse.com\r\n\r\n\r\n\r\nhttps://9444b5-3.myshopify.com/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\n\r\nhttps://www.arfeencollection.shop\r\n\r\n\r\n\r\nhttps://divinesmart.shop/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\n\r\nhttps://decorshopinc.com\r\n\r\n\r\n\r\nhttps://balexi.com/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\nhttps://divinedispatch.shop/?_ab=0&_fd=0&_sc=1\r\n\r\nhttps://megamarts.site'),
(133, 634, 'haseeb-ramzan', 'Experienced Shopify Expert with Specialization in E-commerce Solutions', 'I am writing to introduce myself as a seasoned Shopify expert with over two years and six months of experience specializing in e-commerce solutions. With a proven track record of delivering exceptional results for clients across various industries, I am eager to bring my expertise to your team at Sooprs.com.\r\n\r\nAs a Shopify expert, I have successfully launched and optimized numerous e-commerce stores, focusing on enhancing user experience, increasing conversion rates, and driving sales. My proficiency lies in designing and customizing Shopify stores, optimizing product listings, managing inventory, and implementing effective marketing strategies to maximize online visibility and revenue.\r\n\r\nKey Professional Keywords:\r\n\r\nShopify Expert\r\nE-commerce Solutions\r\nStore Launch and Optimization\r\nUser Experience Enhancement\r\nConversion Rate Optimization\r\nSales Growth Strategies\r\nProduct Listing Optimization\r\nInventory Management\r\nDigital Marketing\r\nI am committed to staying updated with the latest trends and best practices in e-commerce to ensure that my clients receive innovative and results-driven solutions. With a strong passion for delivering excellence and a dedication to exceeding expectations, I am confident in my ability to contribute to the success of your projects.\r\n\r\nThank you for considering my application. I am eager to discuss how my skills and experiences align with the needs of your team at Sooprs.com.\r\n\r\nSincerely,\r\nHaseeb Ramzan', '20240404_0349579Haseeb Ramzan Cv.png', '2024-04-04 20:49:57', NULL, 'https://falakfabrics.store\r\n\r\nhttps://ummiscents.com\r\n\r\nhttps://www.electronicouniverse.com\r\n\r\n\r\n\r\nhttps://9444b5-3.myshopify.com/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\n\r\nhttps://www.arfeencollection.shop\r\n\r\n\r\n\r\nhttps://divinesmart.shop/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\n\r\nhttps://decorshopinc.com\r\n\r\n\r\n\r\nhttps://balexi.com/?_ab=0&_fd=0&_sc=1\r\n\r\n\r\nhttps://divinedispatch.shop/?_ab=0&_fd=0&_sc=1\r\n\r\nhttps://megamarts.site');

-- --------------------------------------------------------

--
-- Table structure for table `professional_reviews`
--

CREATE TABLE `professional_reviews` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` text,
  `review` text,
  `image` text,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professional_reviews`
--

INSERT INTO `professional_reviews` (`id`, `professional_id`, `customer_id`, `name`, `review`, `image`, `rating`, `created_at`, `updated_at`, `lead_id`) VALUES
(4, 15, 1, 'Ravi Kumar', 'The design is very  professional and well done.  I love the washed-out\r\nimage of the  globe on the left  behind  the  links.  The  site  feels\r\ngreat.  I suggest  that you change the fonts to Arial, a more  rounded\r\nfont, to go with the professional feel of the site.  There are minimum\r\ngraphics,  and the  graphics  there are small  and  fast-loading.  The\r\ncolors of the images go together nicely.', 'placeholder.jpg', 4, '2023-05-06 04:38:47', NULL, NULL),
(5, 16, 1, 'Alok Kumar', 'The design is very  professional and well done.  I love the washed-out\r\nimage of the  globe on the left  behind  the  links.  The  site  feels\r\ngreat.  I suggest  that you change the fonts to Arial, a more  rounded\r\nfont, to go with the professional feel of the site.  There are minimum\r\ngraphics,  and the  graphics  there are small  and  fast-loading.  The\r\ncolors of the images go together nicely.', 'placeholder.jpg', 4, '2023-05-06 04:39:25', NULL, NULL),
(6, 17, 1, 'Akash Kumar', 'The design is very professional and well done. I love the washed-out\r\nimage of the globe on the left behind the links. The site feels\r\ngreat. I suggest that you change the fonts to Arial, a more rounded\r\nfont, to go with the professional feel of the site. There are minimum\r\ngraphics, and the graphics there are small and fast-loading. The\r\ncolors of the images go together nicely.', 'placeholder.jpg', 5, '2023-05-06 04:40:42', NULL, NULL),
(7, 20, 1, 'Atul Kumar', 'The design is very professional and well done. I love the washed-out\r\nimage of the globe on the left behind the links. The site feels\r\ngreat. I suggest that you change the fonts to Arial, a more rounded\r\nfont, to go with the professional feel of the site. There are minimum\r\ngraphics, and the graphics there are small and fast-loading. The\r\ncolors of the images go together nicely.', 'placeholder.jpg', 3, '2023-05-06 04:40:46', NULL, NULL),
(8, 15, 1, 'Shiv Kumar', 'The design is very professional and well done. I love the washed-out\r\nimage of the globe on the left behind the links. The site feels\r\ngreat. I suggest that you change the fonts to Arial, a more rounded\r\nfont, to go with the professional feel of the site.', 'placeholder.jpg', 2, '2023-05-06 04:43:00', NULL, NULL),
(9, 2, 15, 'sandeep', 'qwerty', NULL, 3, '2023-08-14 10:43:22', NULL, NULL),
(10, 2, 15, 'sunny', 'werty rtyui tyu it yu.', NULL, 2, '2023-08-14 11:03:42', NULL, 109),
(11, 2, 1, 'Sandeep', 'hvdui fewuihruifh uifg heuigh ugh gh iq', NULL, 3, '2023-08-23 10:07:41', NULL, 199),
(12, 2, 1, 'Akash Kumar', 'The design is very professional and well done. I love the washed-out\r\nimage of the globe on the left behind the links. The site feels\r\ngreat. I suggest that you change the fonts to Arial, a more rounded\r\nfont, to go with the professional feel of the site. There are minimum\r\ngraphics, and the graphics there are small and fast-loading. The\r\ncolors of the images go together nicely.', 'placeholder.jpg', 5, '2023-05-06 04:40:42', NULL, NULL),
(20, 356, 390, 'Sandip Kumar', 'I am very happy by the work', NULL, 5, '2023-12-18 08:10:34', NULL, 425),
(21, 356, 402, 'new review', 'nice work keep it up', NULL, 4, '2023-12-18 13:36:58', NULL, 426),
(22, 356, 403, 'ok work', 'good work', NULL, 4, '2023-12-20 11:14:55', NULL, 429),
(24, 355, 387, 'not good', 'type review here', NULL, 5, '2023-12-22 17:12:42', NULL, 439),
(25, 399, 400, 'not good', 'poor service', NULL, 5, '2023-12-30 10:51:36', NULL, 450),
(26, 397, 410, 'test user', 'nice development', NULL, 4, '2024-01-06 10:01:06', NULL, 463),
(27, 413, 412, 'Great Work', 'Work is Great ', NULL, 5, '2024-01-07 07:45:21', NULL, 464),
(28, 418, 548, 'Nice work done', 'I am very well satisfied with the work done by the professional in time.', NULL, 5, '2024-03-15 11:53:54', NULL, 558);

-- --------------------------------------------------------

--
-- Table structure for table `project_requirements`
--

CREATE TABLE `project_requirements` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `description` text,
  `file` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_requirements`
--

INSERT INTO `project_requirements` (`id`, `project_id`, `description`, `file`, `created_at`, `updated_at`) VALUES
(5, 425, 'Overview:\r\nIn today\'s digital landscape, search engine optimization (SEO) plays a pivotal role in determining the online visibility and success of businesses. Our project aims to implement a comprehensive SEO strategy for optimizing website performance, improving search engine rankings, and increasing organic traffic. By leveraging proven SEO techniques and innovative strategies, we strive to enhance the online presence of our client\'s website, driving more qualified leads and maximizing conversion rates.\r\n\r\nObjectives:\r\n\r\n1. Keyword Research and Analysis: Conduct in-depth keyword research to identify relevant and high-traffic keywords related to the client\'s industry, products, and services. Analyze keyword competitiveness and search volume to prioritize target keywords effectively.\r\n\r\n2. On-Page Optimization: Implement on-page SEO techniques to optimize website elements such as meta tags, headers, URLs, and content structure. Ensure that each webpage is fully optimized for target keywords, relevancy, and user experience.\r\n\r\n3. Content Strategy Development: Develop a robust content strategy focused on creating high-quality, informative, and engaging content that resonates with the target audience. Incorporate keyword-rich content, blog posts, articles, infographics, and multimedia to attract and retain visitors while satisfying search engine algorithms.\r\n\r\n4. Technical SEO Audit: Perform a comprehensive technical SEO audit to identify and address any issues that may impact website performance and search engine crawlability. Optimize website speed, mobile responsiveness, site architecture, URL structure, and internal linking to enhance overall SEO health.', 'https://sooprs.com/assets/files/65f7e02be353e-1710743595.docx', '2024-03-18 06:11:10', NULL),
(8, 558, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'https://sooprs.com/assets/files/65fe7bb96ae14-1711176633.pdf', '2024-03-23 06:50:33', NULL),
(9, 560, 'Make an mobile app using react native and with normal UI. ', '', '2024-03-27 12:07:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', '2023-03-25 07:29:12', '2023-03-25 07:29:12'),
(3, 'User', 'web', '2023-03-27 00:25:17', '2023-03-27 00:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(20, 2),
(21, 2),
(5, 3),
(12, 3),
(13, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sp_country`
--

CREATE TABLE `sp_country` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `svg` text COLLATE utf8_unicode_ci COMMENT 'flag svg',
  `dial_code` text COLLATE utf8_unicode_ci COMMENT 'code before number',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sooprs country table';

--
-- Dumping data for table `sp_country`
--

INSERT INTO `sp_country` (`country_id`, `country_code`, `country_name`, `status`, `svg`, `dial_code`, `created_at`, `updated_at`) VALUES
(1, 'IND', 'India', 1, 'fc1f073fe91403f00d2219185fdea79bin.svg', NULL, '2024-03-13 07:14:05', '2024-03-13 02:38:49'),
(2, 'NG', 'Nigeria', 1, 'f0bbac6fa079f1e00b2c14c1d3c6ccf0ng.svg', NULL, '2024-03-13 07:14:05', '2024-03-26 05:13:56'),
(3, 'PK', 'Pakistan', 1, '1f8fe28e9283d7b5300af087a298f200pk.svg', NULL, '2024-03-13 07:14:05', '2024-03-26 05:19:02'),
(5, 'LK', 'Sri Lanka', 1, 'c5cc17e395d3049b03e0f1ccebb02b4dlk.svg', NULL, '2024-03-13 07:14:05', '2024-03-26 06:15:28'),
(6, 'NP', 'Nepal', 1, '333222170ab9edca4785c39f55221fe7np.svg', NULL, '2024-03-13 07:14:05', '2024-03-13 05:31:09'),
(7, 'MM', 'Maynmar', 1, '2b1905b5d4641830901acf76c957cfb1mm.svg', NULL, '2024-03-13 07:14:05', '2024-03-15 01:45:35'),
(8, 'TH', 'Thailand', 1, 'e0308d73972d8dd5e2dd27853106386eth.svg', NULL, '2024-03-13 07:14:05', '2024-03-27 04:13:02'),
(10, 'UK', 'United Kingdom', 0, NULL, NULL, '2024-03-13 07:14:05', NULL),
(12, 'AF', 'Afghanistan', 1, '320755112b6d9e248ce1c26e1fcf534baf.svg', NULL, '2024-03-13 05:42:39', '2024-03-14 04:29:47'),
(13, 'AL', 'Albania', 1, 'aad64398a969ec3186800d412fa7ab31al.svg', NULL, '2024-03-13 05:43:02', '2024-03-14 04:30:35'),
(14, 'DZA', 'Algeria', 1, 'bd4828247647544af24a15ac79a1ef9fdz.svg', NULL, '2024-03-13 05:44:00', '2024-03-14 04:32:47'),
(15, 'AD', 'Andorra', 1, '9ac5a6d86e8924182271bd820acbce0ead.svg', NULL, '2024-03-13 05:44:33', '2024-03-14 04:34:37'),
(16, 'AO', 'Angola', 1, 'a088ea2078cd92b0b8a0e78a32c5c082ao.svg', NULL, '2024-03-13 05:44:41', '2024-03-14 04:35:10'),
(17, 'AG', 'Antigua and Barbuda', 1, 'b2dd140336c9df867c087a29b2e66034ag.svg', NULL, '2024-03-13 05:45:45', '2024-03-14 04:35:53'),
(18, 'AR', 'Argentina', 1, '4b7a55505729b7f664e7222960e9c2d5ar.svg', NULL, '2024-03-13 05:46:00', '2024-03-14 04:36:35'),
(19, 'AM', 'Armenia', 1, 'd3aeec875c479e55d1cdeea161842ec6am.svg', NULL, '2024-03-13 05:47:11', '2024-03-14 04:38:30'),
(20, 'AW', 'Aruba', 1, '670c26185a3783678135b4697f7dbd1aaw.svg', NULL, '2024-03-13 05:47:43', '2024-03-14 04:39:21'),
(21, 'AS', 'American Samoa', 1, 'bd33f02c4e28615b5af2d24703e066d5as.svg', NULL, '2024-03-13 05:48:45', '2024-03-14 04:34:03'),
(22, 'AU', 'Australia', 1, '4b26dc4663ccf960c8538d595d0a1d3aau.svg', NULL, '2024-03-13 05:50:37', '2024-03-14 04:40:15'),
(23, 'AT', 'Austria', 1, 'c778a2d8bf30ef1d3c2d6bc5696defadat.svg', NULL, '2024-03-13 05:51:04', '2024-03-14 04:40:56'),
(24, 'AZ', 'Azerbaijan', 1, 'bf424cb7b0dea050a42b9739eb261a3aaz.svg', NULL, '2024-03-13 05:51:22', '2024-03-14 04:45:34'),
(25, 'BS', 'Bahamas', 1, '1371bccec2447b5aa6d96d2a540fb401bs.svg', NULL, '2024-03-13 05:51:51', '2024-03-14 04:52:32'),
(26, 'BD', 'Bangladesh', 1, '8d2a5f7d4afa5d0530789d3066945330bd.svg', NULL, '2024-03-13 05:52:30', '2024-03-14 04:54:50'),
(27, 'BB', 'Barbados', 1, '90b9ec1e25ed6705ac341eb17690d55cbb.svg', NULL, '2024-03-13 05:53:09', '2024-03-14 05:11:00'),
(28, 'BI', 'Burundi', 1, '3da972c3ec85b6f3cc5306acf034fd23bi.svg', NULL, '2024-03-13 05:54:00', '2024-03-14 05:33:05'),
(29, 'BE', 'Belgium', 1, 'f4a331b7a22d1b237565d8813a34d8acbe.svg', NULL, '2024-03-13 05:54:30', '2024-03-14 05:13:31'),
(30, 'BJ', 'Benin', 1, '376d41c34fac1e911e7e197b6a28270ebj.svg', NULL, '2024-03-13 05:54:47', '2024-03-14 05:15:42'),
(31, 'BM', 'Bermuda', 1, '8832ae39136fb470b3fbbf9f47b4570dbm.svg', NULL, '2024-03-13 05:55:15', '2024-03-14 05:16:32'),
(32, 'BT', 'Bhutan', 1, 'cb59b747f88a35e0d452377f60f7c25fbt.svg', NULL, '2024-03-13 05:55:33', '2024-03-14 05:18:59'),
(33, 'BA', 'Bosnia and Herzegovina', 1, 'ab2481c9f93d0ed3033a3281d865ccb2ba.svg', NULL, '2024-03-13 05:56:35', '2024-03-14 05:20:35'),
(34, 'BZ', 'Belize', 1, '9e9ed6d2fc9dbdfdfb8b8e93906d9212bz.svg', NULL, '2024-03-13 05:57:05', '2024-03-14 05:15:03'),
(35, 'BY', 'Belarus', 1, 'f1507aba9fc82ffa7cc7373c58f8a613by.svg', NULL, '2024-03-13 05:57:21', '2024-03-14 05:12:26'),
(36, 'BO', 'Bolivia', 1, '56c82ccd658e09e829f16bb99457bcbcbo.svg', NULL, '2024-03-13 05:58:44', '2024-03-14 05:20:02'),
(37, 'BW', 'Botswana', 1, 'c91c0b6681d733fe9b76c95b8996b1abbw.svg', NULL, '2024-03-13 06:01:18', '2024-03-14 05:21:39'),
(38, 'BR', 'Brazil', 1, 'c0172ea66506f59c8c435eb66176fb67br.svg', NULL, '2024-03-13 06:01:53', '2024-03-14 05:22:20'),
(39, 'BH', 'Bahrain', 1, '8289889263db4a40463e3f358bb7c7a1bh.svg', NULL, '2024-03-13 06:02:23', '2024-03-14 04:53:27'),
(40, 'BN', 'Brunei', 1, '14e422f05b68cc0139988e128ee880dfbn.svg', NULL, '2024-03-13 06:02:39', '2024-03-14 05:30:19'),
(41, 'BG', 'Bulgaria', 1, '0da54aa0b1ee702d0c45af548b1a54c7bg.svg', NULL, '2024-03-13 06:02:57', '2024-03-14 05:31:01'),
(42, 'BF', 'Burkina Faso', 1, '5fd513e89cc656d9c7ab2bca4168a4f2bf.svg', NULL, '2024-03-13 06:03:28', '2024-03-14 05:31:33'),
(43, 'CF', 'Central African Republic', 1, '412758d043dd247bddea07c7ec558c31cf.svg', NULL, '2024-03-13 06:03:45', '2024-03-14 05:44:21'),
(44, 'KH', 'Cambodia', 1, 'c82836ed448c41094025b4a872c5341ekh.svg', NULL, '2024-03-13 06:04:10', '2024-03-14 05:35:11'),
(45, 'CA', 'Canada', 1, '7ea4e7fcdc6aff2777bd594a3754e02aca.svg', NULL, '2024-03-13 06:04:27', '2024-03-14 05:38:31'),
(46, 'KY', 'Cayman Islands', 1, '251e16a2aac0ca4847adf561483381bfky.svg', NULL, '2024-03-13 06:04:59', '2024-03-14 05:43:13'),
(47, 'CG', 'Congo', 1, '27d8d40b22f812a1ba6c26f8ef7df480cg.svg', NULL, '2024-03-13 06:05:20', '2024-03-14 06:04:34'),
(48, 'TD', 'Chad', 1, 'c930eecd01935feef55942cc445f708ftd.svg', NULL, '2024-03-13 06:05:40', '2024-03-14 05:45:03'),
(49, 'CL', 'Chile', 1, '78b9cab19959e4af8ff46156ee460c74cl.svg', NULL, '2024-03-13 06:05:55', '2024-03-14 05:50:04'),
(50, 'CN', 'China', 1, '7f018eb7b301a66658931cb8a93fd6e8cn.svg', NULL, '2024-03-13 06:06:11', '2024-03-14 05:51:39'),
(51, 'CI', 'Cote d\'Ivoire', 1, 'd790c9e6c0b5e02c87b375e782ac01bcci.svg', NULL, '2024-03-13 06:06:41', '2024-03-14 06:11:00'),
(52, 'CM', 'Cameroon', 1, '5bd529d5b07b647a8863cf71e98d651acm.svg', NULL, '2024-03-13 06:06:55', '2024-03-14 05:36:57'),
(54, 'CD', 'DR Congo', 1, '88ed1c065719496c24b45a72994a3283cd.svg', NULL, '2024-03-13 06:08:14', '2024-03-14 06:35:12'),
(55, 'CK', 'Cook Islands', 1, 'f41ff84e7cbd129397c11f8c5d20c0f4ck.svg', NULL, '2024-03-13 06:08:32', '2024-03-14 06:05:34'),
(56, 'CO', 'Colombia', 1, '9f16b57bdd4400066a83cd8eaa151c41co.svg', NULL, '2024-03-13 06:08:52', '2024-03-14 05:54:08'),
(57, 'KM', 'Comoros', 1, 'e4a93f0332b2519177ed55741ea4e5e7km.svg', NULL, '2024-03-13 06:09:15', '2024-03-14 06:03:32'),
(58, 'CV', 'Cape Verde', 1, '2835acf1b5aaa6ade0d10b4c977e912acv.svg', NULL, '2024-03-13 06:09:31', '2024-03-14 05:41:39'),
(59, 'CR', 'Costa Rica', 1, '6d1e481bdcf159961818823e652a7725cr.svg', NULL, '2024-03-13 06:09:45', '2024-03-14 06:08:51'),
(60, 'HR', 'Croatia', 1, '5c50b4df4b176845cd235b6a510c6903hr.svg', NULL, '2024-03-13 06:10:06', '2024-03-14 06:12:04'),
(61, 'CU', 'Cuba', 1, '063e26c670d07bb7c4d30e6fc69fe056cu.svg', NULL, '2024-03-13 06:10:45', '2024-03-14 06:14:20'),
(62, 'CY', 'Cyprus', 1, '8d6a06b2f1208b59454a9a749928b0c0cy.svg', NULL, '2024-03-13 06:11:06', '2024-03-14 06:19:45'),
(63, 'CZ', 'Czech Republic', 1, '43975bc2dfc84641a2a8c4d3fe653176cz.svg', NULL, '2024-03-13 06:11:36', '2024-03-14 06:20:45'),
(64, 'DK', 'Denmark', 1, '1113d7a76ffceca1bb350bfe145467c6dk.svg', NULL, '2024-03-13 06:11:54', '2024-03-14 06:21:22'),
(66, 'DJ', 'Djibouti', 1, '415585bd389b69659223807d77a96791dj.svg', NULL, '2024-03-13 06:12:53', '2024-03-14 06:31:14'),
(67, 'DM', 'Dominica', 1, '6754828e66a922ed1b376ef3f43b625edm.svg', NULL, '2024-03-13 06:13:35', '2024-03-14 06:32:26'),
(68, 'DO', 'Dominican Republic', 1, 'd630553e32ae21fb1a6df39c702d2c5cdo.svg', NULL, '2024-03-13 06:13:57', '2024-03-14 06:34:06'),
(69, 'EC', 'Ecuador', 1, '4e87337f366f72daa424dae11df0538cec.svg', NULL, '2024-03-13 06:14:18', '2024-03-14 06:36:27'),
(70, 'EG', 'Egypt', 1, '95f8d9901ca8878e291552f001f67692eg.svg', NULL, '2024-03-13 06:14:50', '2024-03-14 06:37:03'),
(71, 'ER', 'Eritrea', 1, '080acdcce72c06873a773c4311c2e464er.svg', NULL, '2024-03-13 06:15:11', '2024-03-14 06:42:19'),
(72, 'SV', 'El Salvador', 1, 'eb6dc8aba23375061b6f07b137617096sv.svg', NULL, '2024-03-13 06:15:29', '2024-03-14 06:40:01'),
(73, 'ES', 'Spain', 1, 'ac597b7eca2b4a550ad15962eeeee42aes.svg', NULL, '2024-03-13 06:15:50', '2024-03-26 06:14:42'),
(74, 'EE', 'Estonia', 1, '575425a3f433138553be468c9d1ecba7ee.svg', NULL, '2024-03-13 06:16:07', '2024-03-14 06:44:20'),
(75, 'ET', 'Ethiopia', 1, '9edcc1391c208ba0b503fe9a22574251et.svg', NULL, '2024-03-13 06:16:23', '2024-03-14 06:45:18'),
(76, 'FJ', 'Fiji', 1, 'a330f9fecc388ce67f87b09855480ca3fj.svg', NULL, '2024-03-13 06:16:37', '2024-03-14 06:46:38'),
(77, 'FI', 'Finland', 1, 'ca3a856a28df7d77d948949206ff9fdffi.svg', NULL, '2024-03-13 06:16:53', '2024-03-14 06:47:52'),
(78, 'FR', 'France', 1, 'a992a9e939240ce589accf70240bdddafr.svg', NULL, '2024-03-13 06:17:08', '2024-03-14 06:48:33'),
(79, 'FM', 'Micronesia', 1, '6490791e7abf6b29a381288cc23a8223fm.svg', NULL, '2024-03-13 06:17:24', '2024-03-15 01:49:05'),
(80, 'GA', 'Gabon', 1, '12a1d073d5ed3fa12169c67c4e2ce415ga.svg', NULL, '2024-03-13 06:17:51', '2024-03-14 06:49:09'),
(81, 'GM', 'Gambia', 1, 'acf06cdd9c744f969958e1f085554c8bgm.svg', NULL, '2024-03-13 06:18:04', '2024-03-14 06:50:38'),
(82, 'GB', 'Great Britain', 1, '71a8b2ffe0b594a5c1b3c28090384fd7gb.svg', NULL, '2024-03-13 06:18:19', '2024-03-14 06:57:35'),
(83, 'GW', 'Guinea-Bissau', 1, 'ecf9902e0f61677c8de25ae60b654669gw.svg', NULL, '2024-03-13 06:18:49', '2024-03-14 07:25:13'),
(84, 'GE', 'Georgia', 1, '2004e0f2b74655ee92d3a6af6bdb6626ge.svg', NULL, '2024-03-13 06:19:10', '2024-03-14 06:52:16'),
(85, 'GQ', 'Equatorial Guinea', 1, '32b9e74c8f60958158eba8d1fa372971gq.svg', NULL, '2024-03-13 06:20:39', '2024-03-14 06:41:24'),
(86, 'DE', 'Germany', 1, '99f42c473afe0eb4bd047ae133b851fcde.svg', NULL, '2024-03-13 06:21:00', '2024-03-14 06:53:06'),
(87, 'GH', 'Ghana', 1, '6194a1ee187acd6606989f03769e8f7fgh.svg', NULL, '2024-03-13 06:21:13', '2024-03-14 06:54:48'),
(88, 'GR', 'Greece', 1, '5588902a8054f6e22ed3484c140ffc62gr.svg', NULL, '2024-03-13 06:21:32', '2024-03-14 07:01:32'),
(89, 'GD', 'Grenada', 1, 'ac3870fcad1cfc367825cda0101eee62gd.svg', NULL, '2024-03-13 06:21:49', '2024-03-14 07:03:01'),
(90, 'GT', 'Guatemala', 1, '54c3d58c5efcf59ddeb7486b7061ea5agt.svg', NULL, '2024-03-13 06:22:06', '2024-03-14 07:09:41'),
(91, 'GN', 'Guinea', 1, '3cf2559725a9fdfa602ec8c887440f32gn.svg', NULL, '2024-03-13 06:22:33', '2024-03-14 07:15:17'),
(92, 'GU', 'Guam', 1, 'decc2e06a44e61f12a030bc4951563ebgu.svg', NULL, '2024-03-13 06:22:55', '2024-03-14 07:06:59'),
(93, 'GY', 'Guyana', 1, '3f24bb08a5741e4197af64e1f93a5029gy.svg', NULL, '2024-03-13 06:23:18', '2024-03-14 07:26:19'),
(94, 'HT', 'Haiti', 1, 'beff5a409891f9bf1bfa1e555fe213e2ht.svg', NULL, '2024-03-13 06:23:36', '2024-03-14 07:28:01'),
(95, 'HK', 'Hong Kong', 1, '717e15ebeb12bbe8061ef3c21578f463hk.svg', NULL, '2024-03-13 06:24:21', '2024-03-14 07:33:28'),
(96, 'HN', 'Honduras', 1, '803ef56843860e4a48fc4cdb3065e8cehn.svg', NULL, '2024-03-13 06:25:05', '2024-03-14 07:31:11'),
(97, 'HU', 'Hungary', 1, 'f2e43fa3400d826df4195a9ac70dca62hu.svg', NULL, '2024-03-13 06:25:20', '2024-03-14 07:35:23'),
(98, 'ID', 'Indonesia', 1, '624ec1c881656ee6418604df2928494bid.svg', NULL, '2024-03-13 06:25:37', '2024-03-14 07:36:59'),
(99, 'IR', 'Iran', 1, '86d7c8a08b4aaa1bc7c599473f5ddddair.svg', NULL, '2024-03-13 06:26:20', '2024-03-14 07:37:51'),
(100, 'IE', 'Ireland', 1, 'c5dc3e08849bec07e33ca353de62ea04ie.svg', NULL, '2024-03-13 06:28:19', '2024-03-14 07:39:05'),
(101, 'IQ', 'Iraq', 1, 'e846fb8a4f365ca8e84393d4f34e1b07iq.svg', NULL, '2024-03-13 06:28:50', '2024-03-14 07:38:29'),
(102, 'IS', 'Iceland', 1, '4c5bcfec8584af0d967f1ab10179ca4bis.svg', NULL, '2024-03-13 06:29:40', '2024-03-14 07:36:05'),
(103, 'IL', 'Israel', 1, 'ef48e3ef07e359006f7869b04fa07f5eil.svg', NULL, '2024-03-13 06:30:03', '2024-03-15 00:26:43'),
(104, 'VI', 'Virgin Islands', 1, 'dfbfa7ddcfffeb581f50edcf9a0204bbvi.svg', NULL, '2024-03-13 06:30:50', '2024-03-27 04:47:04'),
(105, 'IT', 'Italy', 1, 'aa78c3db4fc4a1a343183d6113ec46bait.svg', NULL, '2024-03-13 06:31:08', '2024-03-15 00:29:43'),
(106, 'VG', 'British Virgin Islands', 1, 'f005e17eabbb0d38b06b8a78f3637d85vg.svg', NULL, '2024-03-13 06:31:27', '2024-03-14 05:27:28'),
(107, 'JM', 'Jamaica', 1, 'a6e4f250fb5c56aaf215a236c64e5b0ajm.svg', NULL, '2024-03-13 06:31:40', '2024-03-15 00:30:41'),
(108, 'JO', 'Jordan', 1, 'b9937273f2b46912b56d09c8faa7da23jo.svg', NULL, '2024-03-13 06:32:19', '2024-03-15 00:32:41'),
(109, 'JP', 'Japan', 1, '06b1338ba02add2b5d2da67663b19ebejp.svg', NULL, '2024-03-13 06:33:13', '2024-03-15 00:31:55'),
(110, 'KZ', 'Kazakhstan', 1, 'ca886eb9edb61a42256192745c72cd79kz.svg', NULL, '2024-03-13 06:33:34', '2024-03-15 00:33:50'),
(111, 'KE', 'Kenya', 1, '7bd87e2f279ba0141a9795e201bf1a53ke.svg', NULL, '2024-03-13 06:33:46', '2024-03-15 00:35:20'),
(112, 'KG', 'Kyrgyzstan', 1, '25824988925b5fd75ef84e8202957b74kg.svg', NULL, '2024-03-13 06:34:19', '2024-03-15 00:42:06'),
(113, 'KI', 'Kiribati', 1, '4502591a3be059858cf9e9d763134ee3ki.svg', NULL, '2024-03-13 06:35:17', '2024-03-15 00:36:50'),
(114, 'KR', 'South Korea', 1, 'cf05968255451bdefe3c5bc64d550517kr.svg', NULL, '2024-03-13 06:35:33', '2024-03-26 06:12:04'),
(115, 'XK', 'Kosovo', 1, 'fa28c6cdf8dd6f41a657c3d7caa5c709xk.svg', NULL, '2024-03-13 06:35:56', '2024-03-15 00:38:25'),
(116, 'SA', 'Saudi Arabia', 1, 'a1a527267c0d33a86382a03c4c721cd2sa.svg', NULL, '2024-03-13 06:36:34', '2024-03-26 05:55:41'),
(117, 'KW', 'Kuwait', 1, '1bf0c59238dd24a7f09a889483a50e8fkw.svg', NULL, '2024-03-13 06:37:06', '2024-03-15 00:39:55'),
(118, 'LA', 'Laos', 1, 'ec0f40c389aeef789ce03eb814facc6cla.svg', NULL, '2024-03-13 06:37:22', '2024-03-15 00:50:09'),
(119, 'LV', 'Latvia', 1, 'b3b4d2dbedc99fe843fd3dedb02f086flv.svg', NULL, '2024-03-13 06:38:01', '2024-03-15 00:51:40'),
(120, 'LY', 'Libya', 1, '0141a8aedb1b53970fac7c81dac79fbely.svg', NULL, '2024-03-13 06:38:20', '2024-03-15 00:58:21'),
(121, 'LR', 'Liberia', 1, 'aaf2979785deb27864047e0ea40ef1b7lr.svg', NULL, '2024-03-13 06:38:39', '2024-03-15 00:56:09'),
(122, 'LC', 'Saint Lucia', 1, '2de5d16682c3c35007e4e92982f1a2balc.svg', NULL, '2024-03-13 06:39:26', '2024-03-26 05:45:06'),
(123, 'LS', 'Lesotho', 1, '966b6dfb6b0819cc10644bea3115cf20ls.svg', NULL, '2024-03-13 06:39:43', '2024-03-15 00:55:06'),
(124, 'LB', 'Lebanon', 1, '211c1e0b83b9c69fa9c4bdede203c1e3lb.svg', NULL, '2024-03-13 06:40:54', '2024-03-15 00:54:06'),
(125, 'LI', 'Liechtenstein', 1, '5e76bef6e019b2541ff53db39f407a98li.svg', NULL, '2024-03-13 06:41:14', '2024-03-15 00:59:17'),
(126, 'LT', 'Lithuania', 1, 'c5a8c45bb92b22b295a2e79afdc26280lt.svg', NULL, '2024-03-13 06:41:44', '2024-03-15 01:00:36'),
(127, 'LU', 'Luxembourg', 1, '72e6d3238361fe70f22fb0ac624a7072lu.svg', NULL, '2024-03-13 06:42:08', '2024-03-15 01:01:46'),
(128, 'MG', 'Madagascar', 1, '25ef0d887bc7a2b30089a025618e1c62mg.svg', NULL, '2024-03-13 06:42:34', '2024-03-15 01:06:12'),
(129, 'MA', 'Morocco', 1, 'abd1c782880cc59759f4112fda0b8f98ma.svg', NULL, '2024-03-13 06:42:54', '2024-03-26 05:03:12'),
(130, 'MY', 'Malaysia', 1, 'd9437926cc8d785a7bdb8578fd85d8e3my.svg', NULL, '2024-03-13 06:43:46', '2024-03-15 01:15:06'),
(131, 'MW', 'Malawi', 1, 'a523426cc585745318d5f6d91a9c0706mw.svg', NULL, '2024-03-13 06:44:33', '2024-03-15 01:13:02'),
(132, 'MD', 'Moldova', 1, '5caf41d62364d5b41a893adc1a9dd5d4md.svg', NULL, '2024-03-13 06:44:48', '2024-03-15 01:55:28'),
(133, 'MV', 'Maldives', 1, '03492e99e42e7ea8480cdfb4899604f5mv.svg', NULL, '2024-03-13 06:45:06', '2024-03-15 01:18:03'),
(134, 'MX', 'Mexico', 1, 'd82d678e9583c1f5f283ec56fbf1abb7mx.svg', NULL, '2024-03-13 06:45:23', '2024-03-15 01:48:16'),
(135, 'MN', 'Mongolia', 1, '5d6646aad9bcc0be55b2c82f69750387mn.svg', NULL, '2024-03-13 06:45:46', '2024-03-26 04:59:59'),
(136, 'MH', 'Marshall Islands', 1, 'afdec7005cc9f14302cd0474fd0f3c96mh.svg', NULL, '2024-03-13 06:46:13', '2024-03-15 01:33:12'),
(137, 'MK', 'Macedonia', 1, '713fd63d76c8a57b16fc433fb4ae718amk.svg', NULL, '2024-03-13 06:46:45', '2024-03-15 01:02:39'),
(138, 'ML', 'Mali', 1, '47267ca39f652c0de27a4b27c5e11c40ml.svg', NULL, '2024-03-13 06:47:01', '2024-03-15 01:19:48'),
(139, 'MT', 'Malta', 1, 'ad1f8bb9b51f023cdc80cf94bb615aa9mt.svg', NULL, '2024-03-13 06:47:18', '2024-03-15 01:20:46'),
(140, 'ME', 'Montenegro', 1, '8baca01b732cf56f7ce83df216514363me.svg', NULL, '2024-03-13 06:47:40', '2024-03-26 05:02:01'),
(141, 'MC', 'Monaco', 1, 'a267f936e54d7c10a2bb70dbe6ad7a89mc.svg', NULL, '2024-03-13 06:47:53', '2024-03-15 02:00:15'),
(142, 'MZ', 'Mozambique', 1, '67c08c98984cc2bc4b9d1f0d2fe6726amz.svg', NULL, '2024-03-13 06:48:13', '2024-03-26 05:04:06'),
(143, 'MU', 'Mauritius', 1, 'd37124c4c79f357cb02c655671a432famu.svg', NULL, '2024-03-13 06:48:38', '2024-03-15 01:43:54'),
(144, 'MR', 'Mauritania', 1, '816a6db41f0e44644bc65808b6db5ca4mr.svg', NULL, '2024-03-13 06:48:51', '2024-03-15 01:41:48'),
(145, 'MM', 'Myanmar', 1, '04fcc65450efcccdc9869442c3e36310mm.svg', NULL, '2024-03-13 06:49:15', '2024-03-26 05:04:47'),
(146, 'NA', 'Namibia', 1, '97d0e0329055e6ddaaaf2335a2509231na.svg', NULL, '2024-03-13 06:49:34', '2024-03-26 05:06:14'),
(147, 'NI', 'Nicaragua', 1, '517f24c02e620d5a4dac1db388664a63ni.svg', NULL, '2024-03-13 06:49:56', '2024-03-26 05:11:25'),
(148, 'NL', 'Netherlands', 1, '79f69230354b71206fb723c571cce58bnl.svg', NULL, '2024-03-13 06:50:15', '2024-03-26 05:08:55'),
(149, 'NE', 'Niger', 1, '13ece95531e87921222a0f9d93230691ne.svg', NULL, '2024-03-13 06:51:31', '2024-03-26 05:12:16'),
(150, 'NO', 'Norway', 1, 'bb7946e7d85c81a9e69fee1cea4a087cno.svg', NULL, '2024-03-13 06:51:50', '2024-03-26 05:15:17'),
(151, 'NR', 'Nauru', 1, 'b1790a55a67906c18bd9a046e17c5935nr.svg', NULL, '2024-03-13 06:52:06', '2024-03-26 05:07:28'),
(152, 'NZ', 'New Zealand', 1, 'b65f2ecd2900ba6ae49a14d9c4b16fb4nz.svg', NULL, '2024-03-13 06:52:24', '2024-03-26 05:10:30'),
(153, 'OM', 'Oman', 1, 'e0a209539d1e74ab9fe46b9e01a19a97om.svg', NULL, '2024-03-13 06:52:49', '2024-03-26 05:17:48'),
(154, 'PA', 'Panama', 1, 'd63c4a5e9b600279c3da776f6113a400pa.svg', NULL, '2024-03-13 06:53:25', '2024-03-26 05:24:05'),
(155, 'PY', 'Paraguay', 1, '6add07cf50424b14fdf649da87843d01py.svg', NULL, '2024-03-13 06:54:06', '2024-03-26 05:28:35'),
(156, 'PE', 'Peru', 1, 'db9ad56c71619aeed9723314d1456037pe.svg', NULL, '2024-03-13 06:54:31', '2024-03-26 05:30:59'),
(157, 'PH', 'Philippines', 1, 'b0ba5c44aaf65f6ca34cf116e6d82ebfph.svg', NULL, '2024-03-13 06:55:40', '2024-03-26 05:31:53'),
(158, 'PS', 'Palestine', 1, 'f4573fc71c731d5c362f0d7860945b88ps.svg', NULL, '2024-03-13 06:56:04', '2024-03-26 05:22:13'),
(159, 'PW', 'Palau', 1, 'a4a8a31750a23de2da88ef6a491dfd5cpw.svg', NULL, '2024-03-13 06:56:10', '2024-03-26 05:20:26'),
(160, 'PG', 'Papua New Guinea', 1, '78aa9cdf7ccc43360c7b8d362a07d223pg.svg', NULL, '2024-03-13 06:56:26', '2024-03-26 05:25:40'),
(161, 'PL', 'Poland', 1, 'faacbcd5bf1d018912c116bf2783e9a1pl.svg', NULL, '2024-03-13 06:56:38', '2024-03-26 05:34:07'),
(162, 'PT', 'Portugal', 1, '419345a4c56c55ba30671ab8c25d2a73pt.svg', NULL, '2024-03-13 06:57:49', '2024-03-26 05:35:30'),
(163, 'KP', 'North Korea', 1, 'b9ed18a301c9f3d183938c451fa183dfkp.svg', NULL, '2024-03-13 06:58:04', '2024-03-26 05:14:31'),
(164, 'PR', 'Puerto Rico', 1, 'af44c4c56f385c43f2529f9b1b018f6apr.svg', NULL, '2024-03-13 06:58:39', '2024-03-26 05:36:58'),
(165, 'QA', 'Qatar', 1, '89a4779d3836ea432f7ea074e522a17eqa.svg', NULL, '2024-03-13 06:58:52', '2024-03-26 05:38:18'),
(166, 'RO', 'Romania', 1, 'b24d516bb65a5a58079f0f3526c87c57ro.svg', NULL, '2024-03-13 06:59:08', '2024-03-26 05:40:53'),
(167, 'ZA', 'South Africa', 1, 'e9510081ac30ffa83f10b68cde1cac07za.svg', NULL, '2024-03-13 06:59:42', '2024-03-26 06:11:31'),
(168, 'RU', 'Russia', 1, 'a2eab75e37ee14b3ed50bb2b74036617ru.svg', NULL, '2024-03-13 06:59:58', '2024-03-26 05:41:48'),
(169, 'RW', 'Rwanda', 1, '91378b331327b40e564390c43cd6b2berw.svg', NULL, '2024-03-13 07:00:19', '2024-03-26 05:43:23'),
(170, 'WS', 'Samoa', 1, '48a79bcf6049ad894ef98cbc17afec96ws.svg', NULL, '2024-03-13 07:00:39', '2024-03-26 05:48:48'),
(171, 'SN', 'Senegal', 1, '7e889fb76e0e07c11733550f2a6c7a5asn.svg', NULL, '2024-03-13 07:01:00', '2024-03-26 05:58:21'),
(172, 'SC', 'Seychelles', 1, 'f1398d2c9b3610251169157332225c49sc.svg', NULL, '2024-03-13 07:01:23', '2024-03-26 05:59:37'),
(173, 'SG', 'Singapore', 1, 'cdbc9bca0a9fd93852571cced0089c4dsg.svg', NULL, '2024-03-13 07:01:39', '2024-03-26 06:02:46'),
(174, 'KN', 'Saint Kitts and Nevis', 1, 'ec36e2ba64f11c9e910e0353e0836d81kn.svg', NULL, '2024-03-13 07:03:15', '2024-03-26 05:44:36'),
(175, 'SL', 'Sierra Leone', 1, '3770282ae7c0e576d1017a97a9260a3fsl.svg', NULL, '2024-03-13 07:03:37', '2024-03-26 06:00:41'),
(176, 'SI', 'Slovenia', 1, 'd6ef5f7fa914c19931a55bb262ec879csi.svg', NULL, '2024-03-13 07:04:03', '2024-03-26 06:07:44'),
(177, 'SM', 'San Marino', 1, '35464c848f410e55a13bb9d78e7fddd0sm.svg', NULL, '2024-03-13 07:04:16', '2024-03-26 05:51:21'),
(178, 'SB', 'Solomon Islands', 1, '5101a4796c5127131b2112e2bc6fe02bsb.svg', NULL, '2024-03-13 07:04:36', '2024-03-26 06:09:51'),
(179, 'SO', 'Somalia', 1, '575425a3f433138553be468c9d1ecba7so.svg', NULL, '2024-03-13 07:04:59', '2024-03-26 06:10:31'),
(180, 'RS', 'Serbia', 1, '09ab23b6b607496f095feed7aaa1259brs.svg', NULL, '2024-03-13 07:05:19', '2024-03-26 05:58:57'),
(182, 'SS', 'South Sudan', 1, '98baeb82b676b662e12a7af8ad9212f6ss.svg', NULL, '2024-03-13 07:05:50', '2024-03-26 06:13:53'),
(183, 'ST', 'Sao Tome and Principe', 1, '1b318124e37af6d74a03501474f44ea1st.svg', NULL, '2024-03-13 07:06:17', '2024-03-26 05:54:02'),
(184, 'SD', 'Sudan', 1, '71cc107d2e0408e60a3d3c44f47507bdsd.svg', NULL, '2024-03-13 07:06:35', '2024-03-26 06:17:18'),
(185, 'SE', 'Sweden', 1, 'e242660df1b69b74dcc7fde711f924ffse.svg', NULL, '2024-03-13 07:06:55', '2024-03-26 06:19:51'),
(186, 'SR', 'Suriname', 1, 'f91e24dfe80012e2a7984afa4480a6d6sr.svg', NULL, '2024-03-13 07:07:11', '2024-03-26 06:18:07'),
(187, 'SK', 'Slovakia', 1, 'e0688d13958a19e087e123148555e4b4sk.svg', NULL, '2024-03-13 07:07:43', '2024-03-26 06:05:56'),
(188, 'SY', 'Syria', 1, '164bf317ea19ccfd9e97853edc2389f4sy.svg', NULL, '2024-03-13 07:08:54', '2024-03-27 04:08:27'),
(189, 'TZ', 'Tanzania', 1, 'cc4af25fa9d2d5c953496579b75f6f6ctz.svg', NULL, '2024-03-13 07:09:14', '2024-03-27 04:12:17'),
(190, 'TO', 'Tonga', 1, 'f87522788a2be2d171666752f97ddebbto.svg', NULL, '2024-03-13 07:09:33', '2024-03-27 04:17:21'),
(192, 'TJ', 'Tajikistan', 1, '04da4aea8e38ac933ab23cb2389dddeftj.svg', NULL, '2024-03-13 07:11:10', '2024-03-27 04:10:33'),
(193, 'TM', 'Turkmenistan', 1, '8ca8da41fe1ebc8d3ca31dc14f5fc56ctm.svg', NULL, '2024-03-13 07:11:17', '2024-03-27 04:27:36'),
(194, 'TL', 'Timor-Leste', 1, '3a1dd98341fafc1dfe9bcf36360e6b84tl.svg', NULL, '2024-03-13 07:12:21', '2024-03-27 04:14:44'),
(195, 'TG', 'Togo', 1, '2517756c5a9be6ac007fe9bb7fb92611tg.svg', NULL, '2024-03-13 07:12:38', '2024-03-27 04:16:40'),
(196, 'TW', 'Chinese Taipei', 1, '398410ece9d7343091093a2a7f8ee381tw.svg', NULL, '2024-03-13 07:12:55', '2024-03-14 05:53:21'),
(197, 'TT', 'Trinidad and Tobago', 1, '250b164d84ea39a488422da8500786e6tt.svg', NULL, '2024-03-13 07:13:53', '2024-03-27 04:19:46'),
(198, 'TN', 'Tunisia', 1, '66fae5b05c0f64c4d2bdcdf1ad85f7b2tn.svg', NULL, '2024-03-13 07:14:16', '2024-03-27 04:23:48'),
(199, 'TR', 'Turkey', 1, 'f82798ec8909d23e55679ee26bb26437tr.svg', NULL, '2024-03-13 07:14:30', '2024-03-27 04:26:27'),
(200, 'TV', 'Tuvalu', 1, '44feb0096faa8326192570788b38c1d1tv.svg', NULL, '2024-03-13 07:15:12', '2024-03-27 04:29:39'),
(201, 'AE', 'United Arab Emirates', 1, 'e77dbaf6759253c7c6d0efc5690369c7ae.svg', NULL, '2024-03-13 07:15:43', '2024-03-27 04:32:11'),
(202, 'UG', 'Uganda', 1, '2e0aca891f2a8aedf265edf533a6d9a8ug.svg', NULL, '2024-03-13 07:16:05', '2024-03-27 04:31:17'),
(203, 'UA', 'Ukraine', 1, '319a67432f51ed53938542b809320dd2ua.svg', NULL, '2024-03-13 07:16:17', '2024-03-27 04:31:45'),
(204, 'UY', 'Uruguay', 1, '285c595717332b49cfb72d1d48a5a962uy.svg', NULL, '2024-03-13 07:16:41', '2024-03-27 04:38:48'),
(205, 'US', 'United States', 1, NULL, NULL, '2024-03-13 07:17:18', '2024-03-13 07:17:18'),
(206, 'UZ', 'Uzbekistan', 1, 'a7a3d70c6d17a73140918996d03c014fuz.svg', NULL, '2024-03-13 07:17:36', '2024-03-27 04:37:55'),
(207, 'VU', 'Vanuatu', 1, 'c6862d63b17d713ee14f3a405d9fde77vu.svg', NULL, '2024-03-13 07:18:22', '2024-03-27 04:39:41'),
(209, 'VE', 'Venezuela', 1, 'ebd6d2f5d60ff9afaeda1a81fc53e2d0ve.svg', NULL, '2024-03-13 07:18:57', '2024-03-27 04:43:56'),
(210, 'VN', 'Vietnam', 1, 'c4f796afbc6267501964b46427b3f6bavn.svg', NULL, '2024-03-13 07:19:14', '2024-03-27 04:44:28'),
(211, 'VC', 'Saint Vincent and the Grenadines', 1, 'f04b8b59e703ac3889bf1ce4ca52db81vc.svg', NULL, '2024-03-13 07:19:44', '2024-03-26 05:47:10'),
(212, 'YE', 'Yemen', 1, '810462d01f318bd13e628a77fc3f92c0ye.svg', NULL, '2024-03-13 07:20:13', '2024-03-27 04:48:13'),
(213, 'ZM', 'Zambia', 1, '0c72cb7ee1512f800abe27823a792d03zm.svg', NULL, '2024-03-13 07:20:32', '2024-03-27 04:48:46'),
(214, 'ZA', 'Zanzibar', 1, NULL, NULL, '2024-03-13 07:20:54', '2024-03-13 07:20:54'),
(215, 'ZW', 'Zimbabwe', 1, 'fdc42b6b0ee16a2f866281508ef56730zw.svg', NULL, '2024-03-13 07:21:10', '2024-03-27 04:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `sp_skills`
--

CREATE TABLE `sp_skills` (
  `skill_id` int(11) NOT NULL,
  `skill_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skill_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sooprs skills table for freelancers';

--
-- Dumping data for table `sp_skills`
--

INSERT INTO `sp_skills` (`skill_id`, `skill_slug`, `skill_name`, `category_id`, `status`) VALUES
(1, 'php', 'PHP', 1, 1),
(2, 'mobile-app-developer', 'Mobile App Developer', 2, 1),
(3, 'java-developer', 'Java Developer', 1, 1),
(4, 'python', 'Python', 1, 1),
(5, 'c++', 'C++', 1, 1),
(6, 'c#', 'C#', 1, 1),
(7, 'javascript', 'Javascript', 1, 1),
(8, 'html-css', 'HTML & CSS', 1, 1),
(9, 'aspnet', 'ASP.NET', 1, 1),
(10, 'game-development', 'Game Development', 1, 1),
(11, 'wordpress', 'Wordpress', 1, 1),
(12, 'woo-commerce', 'WooCommerce', 1, 1),
(13, 'shopify-developer', 'Shopify Developer', 1, 1),
(14, 'mysql', 'MySql', 1, 1),
(15, 'mongodb', 'MongoDB', 1, 1),
(16, 'reactjs', 'React Js', 1, 1),
(17, 'react-native', 'React Native', 1, 1),
(18, 'android-developer', 'Android', 1, 1),
(19, 'javascript-developer', 'Javascript Developer', 1, 1),
(20, 'ios-developer', 'iOS Developer', 1, 1),
(21, 'data-scientist', 'Data Scientist', 1, 1),
(22, 'swift', 'Swift Developer', 1, 1),
(23, 'generative-ai', 'Generative AI', 1, 1),
(24, 'golang-developer', 'Golang', 1, 1),
(25, 'enterprise-developer', 'Enterprise Software Developer', 1, 1),
(26, 'backend-developer', 'Backend Developer', 1, 1),
(27, 'uiux-designer', 'UI/UX Designer', 1, 1),
(28, 'wp-plugin-developer', 'WP Plugin Developer', 1, 1),
(29, 'wp-frontend-developer', 'WP frontend Developer', 1, 1),
(30, 'windows-app-developer', 'windows-app-developer', 1, 1),
(31, 'linux-developer', 'Linux Developer', 1, 1),
(32, 'aws-certified-architect', 'AWS Certified Architect', 1, 1),
(33, 'mern-developer', 'MERN Developer', 1, 1),
(34, 'video-marketing', 'Video Marketing', NULL, 1),
(35, 'seo-sem', 'SEO & SEM', NULL, 1),
(36, 'content-marketing', 'Content Marketing', NULL, 1),
(37, 'social-media-marketing-smm', 'Social media marketing (SMM)', NULL, 1),
(38, 'email-marketing', 'Email Marketing', NULL, 1),
(39, 'google-ads', 'Google Ads', NULL, 1),
(40, 'facebook-ads', 'Facebook Ads', NULL, 1),
(41, 'canva', 'Canva', NULL, 1),
(42, 'blogger', 'Blogger', NULL, 1),
(43, 'ms-excel', 'MS-Excel', NULL, 1),
(44, 'ms-word', 'MS-Word', NULL, 1),
(45, 'ms-powepoint', 'MS-Powepoint', NULL, 1),
(46, 'adobe-photoshop', 'Adobe photoshop', NULL, 1),
(47, 'video-editing', 'Video editing', NULL, 1),
(48, 'photo-editing', 'Photo editing', NULL, 1),
(49, 'figma', 'Figma', NULL, 1),
(50, 'ruby', 'Ruby', NULL, 1),
(51, 'e-commerce-marketing', 'E-Commerce marketing', NULL, 1),
(52, 'affiliate-influencer-marketing', 'Affiliate & Influencer marketing', NULL, 1),
(53, 'youtuber', 'YouTuber', NULL, 1),
(54, 'photography', 'Photography', NULL, 1),
(55, 'divorce-lawyer', 'Divorce Lawyer', NULL, 1),
(56, 'musician', 'Musician', NULL, 1),
(57, 'corporate-lawyer', 'Corporate Lawyer', NULL, 1),
(59, 'opencart', 'Opencart', NULL, 1),
(60, 'vuejs', 'VueJS', NULL, 1),
(61, 'flutter', 'Flutter', NULL, 1),
(62, 'react-native', 'React Native', NULL, 1),
(63, 'laravel', 'Laravel', NULL, 1),
(64, 'unity-developer', 'Unity Developer', NULL, 1),
(65, 'chatgpt-developer', 'ChatGPT Developer', NULL, 1),
(67, 'kotlin-developer', 'Kotlin Developer', NULL, 1),
(68, 'dart-developer', 'Dart Developer', NULL, 1),
(69, 'machine-learning', 'Machine Learning', NULL, 1),
(70, 'sketch', 'Sketch', NULL, 1),
(71, 'adobe-xd', 'Adobe XD', NULL, 1),
(72, 'ms-excel', 'MS Excel', NULL, 1),
(73, 'odoo-developer', 'Odoo Developer', NULL, 1),
(74, '3d-cad', '3D CAD', NULL, 1),
(75, '2d-game-art', '2D Game Art', NULL, 1),
(76, '3d-printing-expert', '3D Printing Expert', NULL, 1),
(77, 'amazon-fba-specialist', 'Amazon FBA Specialist', NULL, 1),
(78, 'adobe-premiere-pro', 'Adobe Premiere Pro', NULL, 1),
(79, 'animator', 'Animator', NULL, 1),
(80, 'aws-developer', 'AWS Developer', NULL, 1),
(81, 'apache-spark-specialist', 'Apache Spark Specialist', NULL, 1),
(82, 'apple-xcode-specialist', 'Apple Xcode Specialist', NULL, 1),
(83, 'app-store-specialist', 'App Store Specialist', NULL, 1),
(84, 'api-developer', 'API Developer', NULL, 1),
(85, 'airtable-freelancer', 'Airtable Freelancer', NULL, 1),
(86, 'autocad-specialist', 'AutoCAD Specialist', NULL, 1),
(87, 'automotive-designer', 'Automotive Designer', NULL, 1),
(88, 'article-writer', 'Article Writer', NULL, 1),
(89, 'arduino-programmer', 'Arduino Programmer', NULL, 1),
(90, 'audio-mixer', 'Audio Mixer', NULL, 1),
(91, 'app-store-optimizationaso-specialist', 'App Store Optimization(ASO) Specialist', NULL, 1),
(92, 'ppt-designer', 'PPT Designer', NULL, 1),
(93, 'blockchain-developer', 'Blockchain Developer', NULL, 1),
(94, 'chrome-extension-developer', 'Chrome Extension Developer', NULL, 1),
(95, 'chatbot-developer', 'Chatbot Developer', NULL, 1),
(96, 'brochure-designer', 'Brochure Designer', NULL, 1),
(97, 'blender3d-specialist', 'Blender3D Specialist', NULL, 1),
(98, 'book-cover-designer', 'Book Cover Designer', NULL, 1),
(99, 'mongodb-developer', 'MongoDB Developer', NULL, 1),
(100, 'bigquery-developer', 'BigQuery Developer', NULL, 1),
(101, 'business-coach', 'Business Coach', NULL, 1),
(102, 'blog-writer', 'Blog Writer', NULL, 1),
(103, 'ghost-writer', 'Ghost Writer', NULL, 1),
(104, 'wedding-planner', 'Wedding Planner', NULL, 1),
(105, 'corporate-event-planner', 'Corporate Event Planner', NULL, 1),
(106, 'birthday-party-planner', 'Birthday Party Planner', NULL, 1),
(107, 'social-event-planner', 'Social Event Planner', NULL, 1),
(108, 'pre-wedding-photographer', 'Pre Wedding Photographer', NULL, 1),
(109, 'wedding-photographer', 'Wedding Photographer', NULL, 1),
(110, 'maternity-photoshoot', 'Maternity Photoshoot', NULL, 1),
(111, 'fashion-photographer', 'Fashion Photographer', NULL, 1),
(112, 'commercial-photoshoot', 'Commercial Photoshoot', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_answers`
--

CREATE TABLE `sr_answers` (
  `answer_id` int(11) NOT NULL,
  `ques_id` int(11) DEFAULT NULL,
  `answer_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `connected_ques_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Sooprs answers table';

--
-- Dumping data for table `sr_answers`
--

INSERT INTO `sr_answers` (`answer_id`, `ques_id`, `answer_text`, `connected_ques_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A new website', 4, 0, '2023-04-17 07:10:16', NULL),
(3, 1, 'Update to an existing website', 4, 0, '2023-04-17 07:10:16', NULL),
(4, 2, '1&1', 5, 0, '2023-04-17 07:10:16', NULL),
(5, 2, 'Go Daddy', 5, 0, '2023-04-17 07:10:16', NULL),
(6, 2, 'Shopify', 5, 0, '2023-04-17 07:10:16', NULL),
(7, 2, 'SquareSpace', 5, 0, '2023-04-17 07:10:16', NULL),
(8, 2, 'Weebly', 5, 0, '2023-04-17 07:10:16', NULL),
(9, 2, 'Wix', 5, 0, '2023-04-17 07:10:16', NULL),
(10, 2, 'WordPress', 5, 0, '2023-04-17 07:10:16', NULL),
(11, 2, 'In-house/custom', 5, 0, '2023-04-17 07:10:16', NULL),
(12, 2, 'As recommended by pro', 5, 0, '2023-04-17 07:10:16', NULL),
(21, 4, 'Bespoke/custom', 6, 0, '2023-04-17 07:10:16', NULL),
(22, 4, 'Ecommerce', 6, 0, '2023-04-17 07:10:16', NULL),
(23, 4, 'Large Business', 6, 0, '2023-04-17 07:10:16', NULL),
(24, 4, 'small business', 6, 0, '2023-04-17 07:10:16', NULL),
(26, 4, 'I would like to discuss this with professional', 6, 0, '2023-04-17 07:10:16', NULL),
(27, 5, 'As recommended by the pro', 6, 0, '2023-04-17 07:10:16', NULL),
(28, 5, 'I Know the front-end system I want', 12, 0, '2023-04-17 07:10:16', NULL),
(29, 5, 'I know the back-end system i want', 13, 0, '2023-04-17 07:10:16', NULL),
(30, 5, 'I know the front-end system & back-end system i want', 12, 0, '2023-04-17 07:10:16', NULL),
(31, 6, 'Less than 50k', NULL, 0, '2023-04-17 07:10:16', NULL),
(32, 6, '50k-99k', NULL, 0, '2023-04-17 07:10:16', NULL),
(33, 6, '1-2.49 Lakhs', NULL, 0, '2023-04-17 07:10:16', NULL),
(34, 6, '2.5-4.9 Lakh', NULL, 0, '2023-04-17 07:10:16', NULL),
(35, 6, '5-9.9 Lakh', NULL, 0, '2023-04-17 07:10:16', NULL),
(36, 6, '10-24.9 Lakh', NULL, 0, '2023-04-17 07:10:16', NULL),
(37, 6, 'More than 25 Lakhs', NULL, 0, '2023-04-17 07:10:16', NULL),
(38, 6, 'I am not sure', NULL, 0, '2023-04-17 07:10:16', NULL),
(39, 6, 'I would Like to discuss this with the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(40, 7, 'I am ready to hire now', NULL, 0, '2023-04-17 07:10:16', NULL),
(41, 7, 'I am definitely going to hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(42, 7, 'I am likely to hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(43, 7, 'I will possibly hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(44, 7, 'I am planning and researching', NULL, 0, '2023-04-17 07:10:16', NULL),
(45, 8, 'Maria DB', 5, 0, '2023-04-17 07:10:16', NULL),
(46, 8, 'Microsoft SQL Server', 5, 0, '2023-04-17 07:10:16', NULL),
(47, 8, 'Mongo DB', 5, 0, '2023-04-17 07:10:16', NULL),
(48, 8, 'MySql', 5, 0, '2023-04-17 07:10:16', NULL),
(49, 8, 'Oracle', 5, 0, '2023-04-17 07:10:16', NULL),
(50, 8, 'PostgreSql', 5, 0, '2023-04-17 07:10:16', NULL),
(51, 8, 'SQLite', 5, 0, '2023-04-17 07:10:16', NULL),
(52, 8, 'I am not so sure', 5, 0, '2023-04-17 07:10:16', NULL),
(53, 8, 'I would like to discuss this with the pro', 5, 0, '2023-04-17 07:10:16', NULL),
(55, 9, '1&1', 8, 0, '2023-04-17 07:10:16', NULL),
(56, 9, 'Go Daddy', 8, 0, '2023-04-17 07:10:16', NULL),
(57, 9, 'Shopify', 8, 0, '2023-04-17 07:10:16', NULL),
(58, 9, 'SquareSpace', 8, 0, '2023-04-17 07:10:16', NULL),
(59, 9, 'Weebly', 8, 0, '2023-04-17 07:10:16', NULL),
(60, 9, 'Wix', 8, 0, '2023-04-17 07:10:16', NULL),
(61, 9, 'WordPress', 8, 0, '2023-04-17 07:10:16', NULL),
(64, 9, 'As recommended by pro', 8, 0, '2023-04-17 07:10:16', NULL),
(65, 10, 'Less than 500', 5, 0, '2023-04-17 07:10:16', NULL),
(66, 10, '500-999', 5, 0, '2023-04-17 07:10:16', NULL),
(67, 10, '1,000-2,499', 5, 0, '2023-04-17 07:10:16', NULL),
(68, 10, '2,500-4,900', 5, 0, '2023-04-17 07:10:16', NULL),
(69, 10, '5000-9999', 5, 0, '2023-04-17 07:10:16', NULL),
(70, 10, '10,000-24,999', 5, 0, '2023-04-17 07:10:16', NULL),
(71, 10, '25,000 or more', 5, 0, '2023-04-17 07:10:16', NULL),
(72, 10, 'I am not sure', 5, 0, '2023-04-17 07:10:16', NULL),
(74, 11, 'Blog', 10, 0, '2023-04-17 07:10:16', NULL),
(75, 11, 'Calendar Integration', 10, 0, '2023-04-17 07:10:16', NULL),
(76, 11, 'Database Development', 10, 0, '2023-04-17 07:10:16', NULL),
(77, 11, 'Directory', 10, 0, '2023-04-17 07:10:16', NULL),
(78, 11, 'Event/Document management', 10, 0, '2023-04-17 07:10:16', NULL),
(79, 11, 'Onlline Store', 10, 0, '2023-04-17 07:10:16', NULL),
(80, 11, 'Social Media Integration', 10, 0, '2023-04-17 07:10:16', NULL),
(81, 11, 'Tracking & Reporting', 10, 0, '2023-04-17 07:10:16', NULL),
(82, 12, 'Ajax', 6, 0, '2023-04-17 07:10:16', NULL),
(83, 12, 'CSS/CSS3', 6, 0, '2023-04-17 07:10:16', NULL),
(84, 12, 'Flash/actionscript', 6, 0, '2023-04-17 07:10:16', NULL),
(85, 12, 'HTML/HTML5', 6, 0, '2023-04-17 07:10:16', NULL),
(86, 12, 'Javascript', 6, 0, '2023-04-17 07:10:16', NULL),
(87, 12, 'jQuery', 6, 0, '2023-04-17 07:10:16', NULL),
(88, 12, 'Silverlight', 6, 0, '2023-04-17 07:10:16', NULL),
(89, 12, 'I would like to discuss with the pro', 6, 0, '2023-04-17 07:10:16', NULL),
(90, 13, '.NET', 6, 0, '2023-04-17 07:10:16', NULL),
(91, 13, 'ASP', 6, 0, '2023-04-17 07:10:16', NULL),
(92, 13, 'Java', 6, 0, '2023-04-17 07:10:16', NULL),
(93, 13, 'Perl', 6, 0, '2023-04-17 07:10:16', NULL),
(95, 13, 'PHP', 6, 0, '2023-04-17 07:10:16', NULL),
(96, 13, 'Python', 6, 0, '2023-04-17 07:10:16', NULL),
(97, 13, 'Ruby/Ruby On Rails', 6, 0, '2023-04-17 07:10:16', NULL),
(98, 13, 'I would like to discuss with the pro', 6, 0, '2023-04-17 07:10:16', NULL),
(99, 24, '1&1', 11, 0, '2023-04-17 07:10:16', NULL),
(100, 24, 'Go Daddy', 11, 0, '2023-04-17 07:10:16', NULL),
(101, 24, 'Shopify', 11, 0, '2023-04-17 07:10:16', NULL),
(102, 24, 'SquareSpace', 11, 0, '2023-04-17 07:10:16', NULL),
(103, 24, 'SquareSpace', 11, 0, '2023-04-17 07:10:16', NULL),
(104, 24, 'Weebly', 11, 0, '2023-04-17 07:10:16', NULL),
(105, 24, 'Wix', 11, 0, '2023-04-17 07:10:16', NULL),
(106, 24, 'WordPress', 11, 0, '2023-04-17 07:10:16', NULL),
(107, 24, 'As recommended by pro', 11, 0, '2023-04-17 07:10:16', NULL),
(108, 32, 'Application - business', 6, 0, '2023-04-17 07:10:16', NULL),
(109, 32, 'Application - game', 6, 0, '2023-04-17 07:10:16', NULL),
(110, 32, 'Application - mobile commerce', 6, 0, '2023-04-17 07:10:16', NULL),
(111, 32, 'Application - social media', 6, 0, '2023-04-17 07:10:16', NULL),
(112, 32, 'Application - utility', 6, 0, '2023-04-17 07:10:16', NULL),
(113, 32, 'Application - other', 6, 0, '2023-04-17 07:10:16', NULL),
(114, 14, 'Plug-in', NULL, 0, '2023-04-17 07:10:16', NULL),
(115, 15, 'Develop a new app', NULL, 0, '2023-04-17 07:10:16', NULL),
(116, 15, 'Changes to an app that already exists', NULL, 0, '2023-04-17 07:10:16', NULL),
(117, 15, 'I would like to discuss this with the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(118, 16, 'Cost to download', NULL, 0, '2023-04-17 07:10:16', NULL),
(119, 16, 'In-app advertising', NULL, 0, '2023-04-17 07:10:16', NULL),
(120, 16, 'In-app purchases', NULL, 0, '2023-04-17 07:10:16', NULL),
(121, 16, 'Sponsorships', NULL, 0, '2023-04-17 07:10:16', NULL),
(122, 16, 'Subscription', NULL, 0, '2023-04-17 07:10:16', NULL),
(123, 16, 'I will not be monetising the app', NULL, 0, '2023-04-17 07:10:16', NULL),
(124, 16, 'I need guidance from the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(125, 17, 'Android', NULL, 0, '2023-04-17 07:10:16', NULL),
(126, 17, 'iOS', NULL, 0, '2023-04-17 07:10:16', NULL),
(127, 17, 'Windows store', NULL, 0, '2023-04-17 07:10:16', NULL),
(128, 18, '.NET', NULL, 0, '2023-04-17 07:10:16', NULL),
(129, 18, 'Adobe AIR', NULL, 0, '2023-04-17 07:10:16', NULL),
(130, 18, 'C#', NULL, 0, '2023-04-17 07:10:16', NULL),
(131, 18, 'Java ME', NULL, 0, '2023-04-17 07:10:16', NULL),
(132, 18, 'Objective C', NULL, 0, '2023-04-17 07:10:16', NULL),
(133, 18, 'Swift', NULL, 0, '2023-04-17 07:10:16', NULL),
(134, 18, 'I am not sure', NULL, 0, '2023-04-17 07:10:16', NULL),
(135, 18, 'I am looking for guidance from the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(136, 19, 'Yes', NULL, 0, '2023-04-17 07:10:16', NULL),
(137, 19, 'No - I need guidance from the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(138, 19, 'I am not sure', NULL, 0, '2023-04-17 07:10:16', NULL),
(139, 20, 'Less than ₹1 Lakh', NULL, 0, '2023-04-17 07:10:16', NULL),
(140, 20, '₹1- ₹2.49 Lakhs\r\n', NULL, 0, '2023-04-17 07:10:16', NULL),
(141, 20, '₹2.5 - ₹4.9 Lakhs', NULL, 0, '2023-04-17 07:10:16', NULL),
(142, 20, '₹5 - ₹9.9 Lakhs ', NULL, 0, '2023-04-17 07:10:16', NULL),
(143, 20, '₹10 Lakhs or more', NULL, 0, '2023-04-17 07:10:16', NULL),
(144, 21, 'ASAP', NULL, 0, '2023-04-17 07:10:16', NULL),
(145, 21, 'Within a week', NULL, 0, '2023-04-17 07:10:16', NULL),
(146, 21, 'Within a month', NULL, 0, '2023-04-17 07:10:16', NULL),
(147, 21, 'Within 3 months', NULL, 0, '2023-04-17 07:10:16', NULL),
(148, 21, 'I am not sure', NULL, 0, '2023-04-17 07:10:16', NULL),
(149, 22, 'I am ready to hire now', NULL, 0, '2023-04-17 07:10:16', NULL),
(150, 22, 'I am definitely going to hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(151, 22, 'I am likely to hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(152, 22, 'I will possibly hire someone', NULL, 0, '2023-04-17 07:10:16', NULL),
(153, 22, 'I am planning and researching', NULL, 0, '2023-04-17 07:10:16', NULL),
(154, 23, 'Cost to download', NULL, 0, '2023-04-17 07:10:16', NULL),
(155, 25, 'Generate content', NULL, 0, '2023-04-17 07:10:16', NULL),
(156, 25, 'Improve Google/Bing ranking', NULL, 0, '2023-04-17 07:10:16', NULL),
(157, 25, 'Improve my site structure', NULL, 0, '2023-04-17 07:10:16', NULL),
(158, 25, 'Promote my website', NULL, 0, '2023-04-17 07:10:16', NULL),
(159, 25, 'Technical SEO', NULL, 0, '2023-04-17 07:10:16', NULL),
(160, 25, 'Website audit', NULL, 0, '2023-04-17 07:10:16', NULL),
(161, 25, 'I would like to discuss with the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(162, 26, 'Global', NULL, 0, '2023-04-17 07:10:16', NULL),
(163, 26, 'International ', NULL, 0, '2023-04-17 07:10:16', NULL),
(164, 26, 'National', NULL, 0, '2023-04-17 07:10:16', NULL),
(165, 26, 'Regional', NULL, 0, '2023-04-17 07:10:16', NULL),
(166, 26, 'Local', NULL, 0, '2023-04-17 07:10:16', NULL),
(167, 27, 'Less than 500', NULL, 0, '2023-04-17 07:10:16', NULL),
(168, 27, '500 - 999', NULL, 0, '2023-04-17 07:10:16', NULL),
(169, 27, '1,000 - 4,999', NULL, 0, '2023-04-17 07:10:16', NULL),
(170, 27, '5,000 - 9,999', NULL, 0, '2023-04-17 07:10:16', NULL),
(171, 27, '10,000 - 49,999', NULL, 0, '2023-04-17 07:10:16', NULL),
(172, 27, '50,000 or more', NULL, 0, '2023-04-17 07:10:16', NULL),
(173, 27, 'I don\'t have a website yet', NULL, 0, '2023-04-17 07:10:16', NULL),
(174, 28, 'Less than ₹10k', NULL, 0, '2023-04-17 07:10:16', NULL),
(175, 28, '₹10k to ₹49k', NULL, 0, '2023-04-17 07:10:16', NULL),
(176, 28, '₹50k to ₹99k', NULL, 0, '2023-04-17 07:10:16', NULL),
(177, 28, '₹1 Lakh or more', NULL, 0, '2023-04-17 07:10:16', NULL),
(178, 28, 'I am not sure', NULL, 0, '2023-04-17 07:10:16', NULL),
(179, 28, 'I would like to discuss this with the pro', NULL, 0, '2023-04-17 07:10:16', NULL),
(180, 29, 'ASAP', 7, 0, '2023-04-17 07:10:16', NULL),
(181, 29, 'Within a week', 7, 0, '2023-04-17 07:10:16', NULL),
(182, 29, 'Within a month', 7, 0, '2023-04-17 07:10:16', NULL),
(183, 29, 'Within 3 months', 7, 0, '2023-04-17 07:10:16', NULL),
(184, 29, 'Within the next 2-3 months', 7, 0, '2023-04-17 07:10:16', NULL),
(186, 33, 'Search Engine Optimization (SEO)', 6, 0, '2023-04-17 07:10:16', NULL),
(187, 33, 'Social Media Marketing (SMM)', 6, 0, '2023-04-17 07:10:16', NULL),
(188, 33, 'Paid Ads (PPC)', 6, 0, '2023-04-17 07:10:16', NULL),
(189, 33, 'All Marketing Services', 6, 0, '2023-04-17 07:10:16', NULL),
(190, 14, 'Application - business', 6, 0, '2023-04-17 07:10:16', NULL),
(191, 14, 'Application - game', 6, 0, '2023-04-17 07:10:16', NULL),
(192, 14, 'Application - mobile commerce', 6, 0, '2023-04-17 07:10:16', NULL),
(193, 14, 'Application - social media', 6, 0, '2023-04-17 07:10:16', NULL),
(194, 14, 'Application - utility', 6, 0, '2023-04-17 07:10:16', NULL),
(195, 14, 'Application - other', 6, 0, '2023-04-17 07:10:16', NULL),
(196, 34, 'Application - business', 6, 0, '2023-04-17 07:10:16', NULL),
(197, 34, 'Application - game', 6, 0, '2023-04-17 07:10:16', NULL),
(198, 34, 'Application - mobile commerce', 6, 0, '2023-04-17 07:10:16', NULL),
(199, 38, 'Application', 14, 0, '2023-04-17 07:10:16', '2023-05-15 07:30:06'),
(200, 38, 'Application', 38, 0, '2023-04-17 07:10:16', '2023-05-15 07:27:32'),
(202, 35, 'Application - business', 6, 0, '2023-04-17 07:10:16', NULL),
(203, 35, 'Application - game', 6, 0, '2023-04-17 07:10:16', NULL),
(204, 35, 'Application - mobile commerce', 6, 0, '2023-04-17 07:10:16', NULL),
(205, 35, 'Application - social media', 6, 0, '2023-04-17 07:10:16', NULL),
(206, 35, 'Application - utility', 6, 0, '2023-04-17 07:10:16', NULL),
(207, 35, 'Application - other', 6, 0, '2023-04-17 07:10:16', NULL),
(208, 36, 'Application - business', 6, 0, '2023-04-17 07:10:16', NULL),
(209, 36, 'Application - game', 6, 0, '2023-04-17 07:10:16', NULL),
(210, 36, 'Application - mobile commerce', 6, 0, '2023-04-17 07:10:16', NULL),
(211, 36, 'Application - social media', 6, 0, '2023-04-17 07:10:16', NULL),
(212, 36, 'Application - utility', 6, 0, '2023-04-17 07:10:16', NULL),
(213, 36, 'Application - other', 6, 0, '2023-04-17 07:10:16', NULL),
(221, 42, 'add-answer-trial-one-testt', 44, 0, '2023-05-16 00:14:17', '2023-05-16 00:48:26'),
(223, 42, 'add-answer-trial-threee', NULL, 0, '2023-05-16 00:25:11', '2023-05-16 00:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `sr_pages`
--

CREATE TABLE `sr_pages` (
  `id` int(11) NOT NULL,
  `page_title` text,
  `slug` varchar(255) DEFAULT NULL,
  `heading` text,
  `thumb_image` text,
  `banner_image` text,
  `content` text,
  `content_image` text,
  `service_name` text,
  `service_id` text,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `service_category` text,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sr_pages`
--

INSERT INTO `sr_pages` (`id`, `page_title`, `slug`, `heading`, `thumb_image`, `banner_image`, `content`, `content_image`, `service_name`, `service_id`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `deleted_at`, `service_category`, `status`) VALUES
(23, 'Mobile App Development', 'mobile-app-development', 'Where do you need Mobile App Developers', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119725/sooprs/android_tfaoie.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<h2 style=\"margin-top: 0cm; background: white;\"><span style=\"font-family: \'Segoe UI\',\'sans-serif\'; color: #212529;\">What is Mobile App Development Service ?</span></h2>\r\n<p style=\"text-align: justify; background: white; box-sizing: border-box; margin: 7.5pt 0cm .0001pt 0cm;\"><span style=\"font-size: 11.5pt; font-family: \'Poppins\',\'serif\'; mso-bidi-font-family: \'Segoe UI\'; color: black;\">Mobile app development is the process of creating software applications that run on mobile devices such as smartphones, tablets, and smartwatches. Mobile app development can involve building native apps that are specifically designed for a particular platform (e.g. iOS or Android), hybrid apps that combine native code with web technologies, or web apps that are designed to be accessed through a mobile web browser.</span></p>\r\n<p style=\"text-align: justify; background: white; margin: 7.5pt 0cm .0001pt 0cm;\"><span style=\"font-size: 11.5pt; font-family: \'Poppins\',\'serif\'; mso-bidi-font-family: \'Segoe UI\'; color: black;\">&nbsp;</span></p>\r\n<h2 style=\"margin-top: 0cm; background: white; box-sizing: border-box; margin-bottom: 0.5rem; color: var(--bs-heading-color,inherit); font-size: 1.75rem;\"><span style=\"font-family: \'Segoe UI\',\'sans-serif\'; color: #212529;\">Technology</span></h2>\r\n<p style=\"text-align: justify; background: white; box-sizing: border-box; margin: 7.5pt 0cm .0001pt 0cm;\"><span style=\"font-size: 11.5pt; font-family: \'Poppins\',\'serif\'; mso-bidi-font-family: \'Segoe UI\'; color: black;\">The mobile app development process typically involves several stages, including ideation and planning, design, development, testing, and deployment. During the ideation and planning stage, developers will work with stakeholders to define the app\'s purpose, features, and target audience. The design stage involves creating the user interface and visual design of the app, while the development stage involves coding the app and integrating any necessary APIs or backend systems. Once the app has been developed, it will undergo testing to ensure that it functions as expected and is free of bugs. Finally, the app will be deployed to the appropriate app stores or made available for download through a web portal.</span></p>\r\n<p style=\"text-align: justify; background: white; margin: 7.5pt 0cm .0001pt 0cm;\"><span style=\"font-size: 11.5pt; font-family: \'Poppins\',\'serif\'; mso-bidi-font-family: \'Segoe UI\'; color: black;\">&nbsp;</span></p>\r\n<h3 style=\"margin-top: 0cm; background: white; box-sizing: border-box; margin-bottom: 0.5rem; color: var(--bs-heading-color,inherit); font-size: 1.75rem;\"><span style=\"font-family: \'Segoe UI\',\'sans-serif\'; color: #212529;\">How Sooprs can help you</span></h3>\r\n<p style=\"text-align: justify; background: white; box-sizing: border-box; margin: 7.5pt 0cm .0001pt 0cm;\"><span style=\"font-size: 11.5pt; font-family: \'Poppins\',\'serif\'; mso-bidi-font-family: \'Segoe UI\'; color: black;\">Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681122146/sooprs/digital-page-2_gjmndh.webp', NULL, '2', 'Mobile App Development | Android | iOS | Hybrid Development', 'mobile app development, mobile app development service, android app development, ios app development, hybrid app development, mobile app development near me, mobile app developer,', 'Sooprs provide best mobile app development service. Sooprs provide mobile app development in various platform like android, ios and hybrid development.', '2023-04-15 02:12:35', '2024-01-17 01:56:42', NULL, '1', 1),
(27, 'Web Development', 'web-development', 'What is Web Development Service ?', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119467/sooprs/website-development_mlfhi1.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Web Development Service ?</h3>\r\n<p>Nowadays, if you have a business, you must be present online, but transforming business to online is not an easy task... Some faces lot of challenges in this , we at sooprs helps businesses to go through this process smoothly.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>For Web Development, we have all options available starting from basic html, css informational website to high tech React JS based super fast website. In E-commerce from wordpress to custom website options are also there.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any website you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681122146/sooprs/digital-page-2_gjmndh.webp', NULL, '1', 'meta title', 'meta key words', 'meta description', '2023-08-08 23:57:10', '2023-12-04 08:11:56', NULL, '1', 1),
(28, 'Web Designing', 'web-designing', 'Where do you need Designers?', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119949/sooprs/web-design_c01uom.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119949/sooprs/web-design_c01uom.webp', '<div>\r\n<h3 class=\"fw-bold\">What is Web Designing Service ?</h3>\r\n<p>Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. Web designing essentially involves working on every attribute of the website that people interact with, so that the website is simple and efficient,allows users to quickly find the information they need, and looks visually pleasing. All these factors, when combined, decide how well the website is designed.</p>\r\n<div class=\"text-block-button\"><a id=\"bark_submit\" class=\"btn btn-primary bark-btn\" role=\"button\"></a>Find a Web Designer</div>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Websites are working smarter and looking impressive with the growth of technologies used in web designing. Our Designers are qualified in the foundation that comprises HTML, CSS, Figma,UI &amp; UX design. Also, we are providing the both two technologies which is super essential for web designing i.e. Front-end development or Client-side development.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119949/sooprs/web-design_c01uom.webp', NULL, '14', 'meta title', 'meta key words', 'meta description', '2023-08-09 03:58:39', '2024-01-17 01:58:19', NULL, '3', 1),
(29, 'Internet Of Things', 'internet-of-things', 'Internet Of Things', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604418/sooprs/iot_ydvbdr.webp', NULL, '<div>\r\n<h3 class=\"fw-bold\">What is Internet of Things ?</h3>\r\n<p>IoT refers to a network of physical objects that are connected to the internet and are able to communicate with each other. It describes the network of physical objects - \"things\" - that are embedded with sensors, software, and other devices connecting and exchanging data with other devices and systems over the internet. The goal of IoT is to create a more efficient and interconnected world.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>The major technologies and protocols of IoT are RFID, NFC, Low-energy bluetooth , wire-less, radio protocols, wi-fi direct. For security purpose , technologies like Edge computing and blockchain are used.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs helps you with IoT into how customers interact with their products , helping in better understanding customer preferences and optimize services. In addition to our broad range of products , we use cutting edge-technology to make it easier than ever before.</p>\r\n</div>', NULL, NULL, '16', 'qwerty', 'qwe ,qwer, qwert,wertgyh,dfg', 'qwertyu', '2023-08-09 04:04:33', '2023-08-09 04:04:33', NULL, '4', 1),
(30, 'Game Development', 'game-development', 'Game Development', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683698515/sooprs/game-development_nxzsr5.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683698515/sooprs/game-development_nxzsr5.webp', '<div>\r\n<h3 class=\"fw-bold\">What is Game Development service ?</h3>\r\n<p>Game Development is the art of creating games and describes the design, development and release of a game. It involve concept generation, design, build, test and release. While creating a game, it is important to think about the game mechanics, rewards, player engagement and level design. The effort is undertaken by a developer, ranging from a single person to an international team dispersed across the globe.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>The latest technology include augmented reality, blockchain NFTs, cryptocurrency, cloud-based games, and esports. These technologies and trends will make it easier for developers to create innovative games for mobile and web platforms. Game developers also use programming languages, frameworks, libraries, patterns, servers, software, and other tools to develop game applications.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Our Video game developers help transform games from a concept to a playable reality. They do this by coding visual elements, programming features, and testing iterations until a game is ready for market. Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683698515/sooprs/game-development_nxzsr5.webp', NULL, '12', 'game development', 'game development', 'game development', '2023-08-09 04:48:54', '2024-03-06 02:22:18', NULL, '1', 0),
(31, 'Software Development', 'software-development', 'Software Development', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683697560/sooprs/software-developer_f4g5vu.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Software Developing Service ?</h3>\r\n<p>Software Developing is the practice of promoting products or services using digital channels such as search engines, social media, email, mobile apps, and websites. It is a broad term that encompasses a wide range of tactics and strategies that businesses use to reach and engage with their target audience online.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Some common software developing techniques include search engine optimization (SEO), pay-per-click (PPC) advertising, content marketing, social media marketing, email marketing, influencer marketing, and affiliate marketing. These techniques can be used individually or in combination to create a comprehensive software developing strategy that achieves specific business objectives.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681122146/sooprs/digital-page-2_gjmndh.webp', NULL, NULL, 'qwertyui', 'qwerty', 'qwertyu', '2023-08-09 05:12:52', '2023-08-09 05:26:40', NULL, '1', 1),
(32, 'Hybrid App Development', 'hybrid-app-development', 'Hybrid App Development', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119216/sooprs/hybrid_bhk5en.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Mobile App Development Service ?</h3>\r\n<p>Mobile app development is the process of creating software applications that run on mobile devices such as smartphones, tablets, and smartwatches. Mobile app development can involve building native apps that are specifically designed for a particular platform (e.g. iOS or Android), hybrid apps that combine native code with web technologies, or web apps that are designed to be accessed through a mobile web browser.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>The mobile app development process typically involves several stages, including ideation and planning, design, development, testing, and deployment. During the ideation and planning stage, developers will work with stakeholders to define the app\'s purpose, features, and target audience. The design stage involves creating the user interface and visual design of the app, while the development stage involves coding the app and integrating any necessary APIs or backend systems. Once the app has been developed, it will undergo testing to ensure that it functions as expected and is free of bugs. Finally, the app will be deployed to the appropriate app stores or made available for download through a web portal.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, 'qwerty', 'qwert', 'qwerty', '2023-08-10 01:07:03', '2023-08-10 01:07:03', NULL, '1', 1),
(33, 'App Designing', 'app-designing', 'App Designing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120054/sooprs/app-design_gmjwci.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Application Designing service ?</h3>\r\n<p>Application design combines a user interface, commonly known as (UI), and user experience (UX). User interface Design tends to the overall style of the app, like colors, fonts, and the general look and feel. In contrast, the user experience will always focus on actual functionality and usability.</p>\r\n<div class=\"text-block-button\"><a id=\"bark_submit\" class=\"btn btn-primary bark-btn\" role=\"button\"></a>Find a Web Designer</div>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Websites are working smarter and looking impressive with the growth of technologies used in web designing. Our developers are qualified in the foundation that comprises HTML, CSS, UI &amp; UX design, wireframing and UI development. Also, we are providing the both two technologies which is super essential for web designing i.e. Front-end development or Client-side development.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '23', NULL, NULL, NULL, '2023-08-10 01:08:58', '2023-08-10 01:08:58', NULL, '3', 1),
(34, 'Graphic Designing', 'graphic-designing', 'Graphic Designing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120138/sooprs/graphic_k04klu.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Application Designing service ?</h3>\r\n<p>Application design combines a user interface, commonly known as (UI), and user experience (UX). User interface Design tends to the overall style of the app, like colors, fonts, and the general look and feel. In contrast, the user experience will always focus on actual functionality and usability.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Websites are working smarter and looking impressive with the growth of technologies used in web designing. Our developers are qualified in the foundation that comprises HTML, CSS, UI &amp; UX design, wireframing and UI development. Also, we are providing the both two technologies which is super essential for web designing i.e. Front-end development or Client-side development.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '23', 'Graphic designer', 'Graphic designer', 'Graphic designer', '2023-08-10 01:09:59', '2023-12-04 08:15:07', NULL, '3', 1),
(35, 'UI/UX Designing', 'uiux-designing', 'UI/UX Designing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120308/sooprs/ui_ans5ev.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is UI/UX designing service?</h3>\r\n<p>User experience design is the process of defining the experience a user would go through when interacting with a company, its services, and its products. UX design are often driven by research, data analysis, and test results rather than aesthetic preferences and opinions. Unlike user interface design, which focuses solely on the design of a computer interface, UX design encompasses all aspects of a user\'s perceived experience with a product or website, such as its usability, usefulness, desirability, brand perception, and overall performance. UX design is also an element of the customer experience, which encompasses all aspects and stages of a customer\'s experience and interaction with a company. User experience design draws from design approaches like human-computer interaction and user-centered design, and includes elements from similar disciplines like interaction design, visual design, information architecture, user research, and others.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '19', 'UI designer', 'UI designer', 'UI designer', '2023-08-10 01:12:29', '2023-12-04 08:16:20', NULL, '3', 1),
(36, 'Animation Designing', 'animation-designing', 'Animation Designing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Animation designing service ?</h3>\r\n<p>Design animation describes the use of moving digital imagery to supplement a digital design. Good design animation is functional and delightful, a welcome addition that enhances the overall usability of your website or app. Animation design is the act of creating visual effects and animations for a variety of multimedia, including video games, videos, and digital assets like websites and apps. These effects and animations can be 2D or 3D (CGI) and range from a simple loading icon that indicates something is happening behind the scenes to a full-scale animated video.</p>\r\n<div class=\"text-block-button\"><a id=\"bark_submit\" class=\"btn btn-primary bark-btn\" role=\"button\"></a>Find a designer</div>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '23', NULL, NULL, NULL, '2023-08-10 01:13:46', '2023-08-10 01:13:46', NULL, '3', 1),
(37, 'Artificial Intelligence', 'artificial-intelligence', 'Artificial Intelligence', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604422/sooprs/artificial-intelligence_asn43t.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Artificial Intelliegence ?</h3>\r\n<p>Artificial intelligence (AI) involves using computers to do things that traditionally requires human intelligence. AI can process large amounts of data in ways that human cannot. Artificial Intelligence has become a catchall for all applications that perform complex tasks that once required human inputs. It is the simulation of human intelligence process by machines, specially computers system. Artificial intelligence is - perceiving , synthesizing , and inferring information.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>For Artificial Intelligence , we have all latest technologies available like :- Natural Language Generation , Speech recognition , Virtual agents , Decision management , AI optimized hardware , Deep learning platforms , Robotic process automation and Image recognition.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>With the help of Artificial Intelligence , we can provide you the increase in ability to predict outcomes by leveraging data to discover patterns and trends. AI can take in and process large amounts of data quickly and accurately , providing insights that can be used to make decisions and predictions.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '26', NULL, NULL, NULL, '2023-08-10 01:15:03', '2023-08-10 01:15:03', NULL, '4', 1),
(38, 'Machine Learning', 'machine-learning', 'Machine Learning', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604427/sooprs/machine-learning_fdy1kp.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Machine Learning ?</h3>\r\n<p>Machine Learning is a branch of Artificial Intelligence (AI) and computer science which focuses on the use of data and algorithms to imitate the way that human learns ,gradually improving its accuarcy. Here , three types of machnine learning are also available - supervised , unsupervised and reinforcement learning.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>The Machine Learning Process typically involves many technologies including Artificial Neural Networks (ANNs), Deep Neural Networks (DNNs), Generative Adversarial Networks (GANs), Support Vector Machines (SVMs), Principal Component Analysis (PCAs), Conversational AI and Conversational Bots.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs will help you with Machine Learning that enable developers to code better, spot bugs, and fix them. Developers also get the advantage of appropriate machine learning algorithms in testing software programs.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '26', NULL, NULL, NULL, '2023-08-10 01:15:46', '2023-08-10 01:15:46', NULL, '4', 1),
(39, 'Augmented Reality', 'augmented-reality', 'Augmented Reality', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604712/sooprs/augumented-reality_wlb7jf.webp', 'Augmented Reality', '<div>\r\n<h3 class=\"fw-bold\">What is Augmented Reality ?</h3>\r\n<p>Augmented reality is an interactive experience that combines the real world and computer-generated content. The content can span multiple sensory modalities, including visual, auditory, haptic, somatosensory and olfactory. It is the integration of digital information with the user\'s environment with generated preceptual information overlaid on top of it. (AR) is the real-time use of information in the form of text, graphics, audio and other virtual enhancements integrated with real-world.</p>\r\n<div class=\"text-block-button\"><a id=\"bark_submit\" class=\"btn btn-primary bark-btn\" role=\"button\"></a>Find a Developer</div>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Augmented reality is an enhanced, interactive version of a real-world environment achieved through digital visual elements, sounds, and other sensory stimuli via holographic technology. We also provide you the two major technologies like diffractive waveguides and reflective waveguides required for Augmented reality.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '26', NULL, NULL, NULL, '2023-08-10 01:16:34', '2023-08-10 01:16:34', NULL, '4', 1),
(40, 'Virtual Reality', 'virtual-reality', 'Virtual Reality', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604433/sooprs/virtual-reality_gz1usf.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div>\r\n<h3 class=\"fw-bold\">What is Virtual Reality ?</h3>\r\n<p>Virtual Reality (VR) is a computer - generated environment with scenes and objects that appear to real, making the user feel they are immersed in their surroundings. It is simulated 3D environment that enables users to explore and interact with a virtual surrounding.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Gyroscopes and motion sensors for tracking head, body and hand positions. Small HD screens for stereoscopic displays and small, lightweight and fast computer processors.</p>\r\n</div>\r\n<div>\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>VR create a virtual environment that allows customer service representatives to interact with customers in real-time, regardless of location. Virtual Reality allows faster training and retain knowledge better.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '26', NULL, NULL, NULL, '2023-08-10 01:17:26', '2023-08-10 01:17:26', NULL, '4', 1),
(41, 'Digital Marketing', 'digital-marketing', 'Digital Marketing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/digital-marketing_ark4pb.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Digital Marketing Service ?</h3>\r\n<p>Digital marketing is the practice of promoting products or services using digital channels such as search engines, social media, email, mobile apps, and websites. It is a broad term that encompasses a wide range of tactics and strategies that businesses use to reach and engage with their target audience online.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Some common digital marketing techniques include search engine optimization (SEO), pay-per-click (PPC) advertising, content marketing, social media marketing, email marketing, influencer marketing, and affiliate marketing. These techniques can be used individually or in combination to create a comprehensive digital marketing strategy that achieves specific business objectives.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '5', NULL, NULL, NULL, '2023-08-10 01:18:19', '2023-08-10 01:18:19', NULL, '5', 1),
(42, 'Search Engine Marketing', 'search-engine-marketing', 'Search Engine Marketing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/sem_fupfek.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Search Engine Marketing Service ?</h3>\r\n<p>Search engine marketing, or SEM, includes all strategies used to ensure your business is visible on search engine results pages. You can get your business in the number one spot when a user searches a particular keyword.<br><br>Increased Return on Investment and sales revenue<br>Boost in profits and Gross Domestic Product<br>Increase website optimization<br>Quality Online and Offline reputation management<br>Well developed online presence<br>Signing so as to secure the source code non-exposure understanding.<br>Marketing success that redefines industry standards<br>SERP analysis that translates into higher conversion rate and wider audience reach<br>Strong lead generation and solid prospects turning into loyal clientele<br>SEO, SEM, SERP, ORM, SMO and CRO that thinks from the client\'s perspective</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Some common digital marketing techniques include search engine optimization (SEO), pay-per-click (PPC) advertising, content marketing, social media marketing, email marketing, influencer marketing, and affiliate marketing. These techniques can be used individually or in combination to create a comprehensive digital marketing strategy that achieves specific business objectives.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '5', NULL, NULL, NULL, '2023-08-10 01:19:00', '2023-08-10 01:19:00', NULL, '5', 1),
(43, 'Content Marketing', 'content-marketing', 'Content Marketing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/content-marketing_glsdvr.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Content Marketing Service ?</h3>\r\n<p>It involves creating, publishing, and distributing content to your target audience through free and gated channels, such as social media platforms, blogs, videos, ebooks, and webinars. With content marketing, the goal is to help your audience along their buyer\'s journey. First, identify common FAQs and concerns your buyers have before they are ready to make a purchase.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Content marketing is the development and distribution of relevant, useful content&mdash;blogs, newsletters, white papers, social media posts, emails, videos, and the like&mdash;to current and potential customers. When it&rsquo;s done right, this content conveys expertise and makes it clear that a company values the people to whom it sells.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '5', NULL, NULL, NULL, '2023-08-10 01:19:42', '2023-08-10 01:19:42', NULL, '5', 1),
(44, 'Social Media Marketing', 'social-media-marketing', 'Social Media Marketing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/smm_qzugi6.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Social Media Marketing Service ?</h3>\r\n<p>With platforms like Facebook, Instagram, LinkedIn, and Twitter, brands can promote their business and engage with audiences on a more personal basis. No one logs on to social media looking for something to purchase, it\'s important to balance promotion with entertainment. Compelling images and captions that encourage your audience to like, share and comment will bring your brand that much closer to gaining a customer.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>Some common social media marketing techniques include Creating Collaborative Stories, Content Connect to Current Events, Variety in Content, Television Style of Content Structure. These techniques can be used individually or in combination to create a comprehensive social media marketing strategy that achieves specific business objectives.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '5', NULL, NULL, NULL, '2023-08-10 01:20:50', '2023-08-10 01:20:50', NULL, '5', 1),
(45, 'Influencer Marketing', 'influencer-marketing', 'Influencer Marketing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/video-marketing_kqbi9o.webp', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">What is Influencer Marketing Service ?</h3>\r\n<p>Influencer marketing describes the use of video content to promote or inform audiences about your brand and products. Brands can use video across a variety of digital channels and formats, including their own website, social media marketing, programmatic advertising, and more.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">Technology</h3>\r\n<p>One of the main reasons that video marketing is so important is that video is a popular medium among audiences. Two-thirds of consumers say they would rather watch a video to learn about a product or service than read about it.</p>\r\n</div>\r\n<div class=\"mt-4\">\r\n<h3 class=\"fw-bold\">How Sooprs can help you</h3>\r\n<p>Sooprs offers multiple vendors and will provide you with the best rates on any app you need. Plus, we offer a variety of services which means you can rely on us for anything. In addition to our broad range of products, we use cutting-edge technology to make it easier than ever before.</p>\r\n</div>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, '5', NULL, NULL, NULL, '2023-08-10 01:21:52', '2024-02-10 06:41:45', NULL, '5', 1),
(46, 'Environment Law', 'environment-law', 'Environment Law', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641489/environment_law_ncpooj.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best lawyers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of lawyers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:26:37', '2023-08-10 01:26:37', NULL, '6', 1),
(47, 'Corporate Law', 'corporate-law', 'Corporate Law', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641489/corportate_law_k91ysc.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best lawyers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of lawyers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:27:45', '2023-08-10 01:27:45', NULL, '6', 1),
(48, 'Media Law', 'media-law', 'Media Law', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641489/media_law_krrnjc.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best lawyers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of lawyers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:28:34', '2023-08-10 01:28:34', NULL, '6', 1),
(49, 'Property Law', 'property-law', 'Property Law', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641489/property_law_mkdclg.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best lawyers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of lawyers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:29:14', '2023-08-10 01:29:14', NULL, '6', 1),
(50, 'Divorce Law', 'divorce-law', 'Divorce Law', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641489/divorce_law_n3mbth.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best lawyers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of lawyers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:30:13', '2023-08-10 01:30:13', NULL, '6', 1),
(51, 'Company Registration', 'company-registration', 'Company Registration', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640937/company_registration_pnbche.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640937/company_registration_pnbche.png', '<p>You can find the best accountants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640937/company_registration_pnbche.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:31:11', '2023-08-10 01:31:11', NULL, '7', 1),
(52, 'GST', 'gst', 'Goods And Services Tax', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640937/gst_wkjrdh.png', 'You can find the best accountants on Sooprs. Start your search and get free quotes now!  First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.  Best of all - it\'s completely free!', '<p>You can find the best accountants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'You can find the best accountants on Sooprs. Start your search and get free quotes now!  First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.  Best of all - it\'s completely free!', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:32:24', '2023-08-10 01:32:24', NULL, '7', 1),
(53, 'Auditing', 'auditing', 'Auditing', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640937/auditing_fu4fsq.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best accountants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:33:06', '2023-08-10 01:33:06', NULL, '7', 1),
(54, 'ITR', 'itr', 'ITR', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640936/itr_aljumk.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best accountants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:34:08', '2023-08-10 01:34:28', NULL, '7', 1),
(55, 'Trademark', 'trademark', 'Trademark', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686640936/trademark_mhpgme.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best accountants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of accountants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:35:32', '2023-08-10 01:35:32', NULL, '7', 1),
(56, 'Diet', 'diet', 'Diet', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641010/diet_vfampw.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best diet planners on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a diet planner and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of diet planners to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:36:24', '2023-08-10 01:36:24', NULL, '8', 1),
(57, 'Event', 'event', 'Event', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641010/event_w4wuom.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best event planners on Sooprs. Start your search and get free quotes now!<br><br>First time looking for an event planner and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of event planners to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:42:09', '2023-08-10 01:42:09', NULL, '8', 1),
(58, 'Consultation', 'consultation', 'Consultation', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641009/consultation_p95aif.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best event consultants on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a consultant and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of consultants to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:42:58', '2023-08-10 01:42:58', NULL, '8', 1);
INSERT INTO `sr_pages` (`id`, `page_title`, `slug`, `heading`, `thumb_image`, `banner_image`, `content`, `content_image`, `service_name`, `service_id`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `deleted_at`, `service_category`, `status`) VALUES
(59, 'Packers', 'packers', 'Packers', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641009/packersnmovers_zpuk9i.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691577707/sooprs/web-dev_tobzw3.png', '<p>You can find the best packers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a packer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of packers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:43:44', '2023-08-10 01:43:44', NULL, '8', 1),
(60, 'Gym', 'gym', 'Gym', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1686641009/gym_y9vtxl.png', 'You can find the best packers on Sooprs. Start your search and get free quotes now!  First time looking for a packer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of packers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.  Best of all - it\'s completely free!', '<p>You can find the best gym trainers on Sooprs. Start your search and get free quotes now!<br><br>First time looking for a gym trainer and not sure where to start? Provide us with some information regarding your specific requirements and we\'ll send you a list of gym trainers to review. There\'s no pressure to hire, so you can compare profiles and ask for more information before you make your decision.<br><br>Best of all - it\'s completely free!</p>', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1691649043/sooprs/web-dev-right_lglxbp.png', NULL, NULL, NULL, NULL, NULL, '2023-08-10 01:44:43', '2023-08-10 01:44:43', NULL, '8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_questions`
--

CREATE TABLE `sr_questions` (
  `ques_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `question_title` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_first_question` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Soopers questions';

--
-- Dumping data for table `sr_questions`
--

INSERT INTO `sr_questions` (`ques_id`, `service_id`, `question_title`, `is_first_question`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'What do you need developing?', 0, 0, '2023-04-17 07:10:58', NULL),
(2, 1, 'What website platform would you want to use?', 0, 0, '2023-04-17 07:10:58', NULL),
(4, 1, 'What type of website do you want developed?', 0, 0, '2023-04-17 07:10:58', NULL),
(5, 1, 'Do you know which software technology you need?', 0, 0, '2023-04-17 07:10:58', NULL),
(6, 1, 'What is your approximate monthly budget?', 1, 0, '2023-04-17 07:10:58', NULL),
(7, 1, 'How likely are you to make a hiring decision?', 0, 0, '2023-04-17 07:10:58', NULL),
(8, 1, 'Which database technologies do you need help with?', 0, 0, '2023-04-17 07:10:58', NULL),
(9, 1, 'Which website platform do you currently use?', 0, 0, '2023-04-17 07:10:58', NULL),
(10, 1, 'How many website visitors do you get each month?', 0, 0, '2023-04-17 07:10:58', NULL),
(11, 1, 'What updates to the website would you like?', 0, 0, '2023-04-17 07:10:58', NULL),
(12, 1, 'Which front-end systems do you need help with?', 0, 0, '2023-04-17 07:10:58', NULL),
(13, 1, 'Which back-end systems do you need help with?', 0, 0, '2023-04-17 07:10:58', NULL),
(14, 2, 'What type of project is this?', 0, 0, '2023-04-17 07:10:58', NULL),
(15, 2, 'What sort of development work do you need?', 0, 0, '2023-04-17 07:10:58', NULL),
(16, 2, 'How do you plan on monetising the app?', 0, 0, '2023-04-17 07:10:58', NULL),
(17, 2, 'Which platform(s) is this needed for?', 0, 0, '2023-04-17 07:10:58', NULL),
(18, 2, 'Which programming language(s) would you consider using?', 0, 0, '2023-04-17 07:10:58', NULL),
(19, 2, 'Do you have a budget in mind?', 0, 0, '2023-04-17 07:10:58', NULL),
(20, 2, 'What is your budget for the project?', 1, 0, '2023-04-17 07:10:58', NULL),
(21, 2, 'How soon would you like the project to begin?', 0, 0, '2023-04-17 07:10:58', NULL),
(22, 2, 'How likely are you to make a hiring decision?', 0, 0, '2023-04-17 07:10:58', NULL),
(23, 2, 'How do you currently monetise your app?', 0, 0, '2023-04-17 07:10:58', NULL),
(24, 1, 'Which website platform do you currently use?', 0, 0, '2023-04-17 07:10:58', '2023-05-16 01:13:31'),
(25, 7, 'Which SEO service(s) do you require?', 0, 0, '2023-04-17 07:10:58', NULL),
(26, 7, 'What is the scale of your operation?', 0, 0, '2023-04-17 07:10:58', NULL),
(27, 7, 'How many website visitors do you get each month?', 0, 0, '2023-04-17 07:10:58', NULL),
(28, 7, 'What is your approximate monthly budget for SEO?', 1, 0, '2023-04-17 07:10:58', NULL),
(29, 7, 'When do you want the work to begin?', 0, 0, '2023-04-17 07:10:58', NULL),
(31, 3, 'What type of project is this?', 1, 0, '2023-04-17 07:10:58', NULL),
(32, 4, 'What type of project is this?', 1, 0, '2023-04-17 07:10:58', NULL),
(33, 5, 'Which Digital Marketing Service do you need?', 1, 0, '2023-04-17 07:10:58', NULL),
(34, 20, 'What type of project is this?', 1, 0, '2023-04-17 07:10:58', NULL),
(35, 21, 'What type of project is this?', 1, 0, '2023-04-17 07:10:58', NULL),
(36, 22, 'What type of project is this?', 1, 0, '2023-04-17 07:10:58', NULL),
(37, 4, 'What is your budget for this ?', 0, 0, '2023-05-15 06:59:29', '2023-05-15 06:59:29'),
(38, 20, 'What is your budget for this App ?', 0, 0, '2023-05-15 07:00:43', '2023-05-15 07:00:43'),
(42, 23, 'add-question-trial-one?', 1, 0, '2023-05-16 00:08:15', '2023-05-16 00:12:01'),
(43, 23, 'add-question-trial-two?', 0, 0, '2023-05-16 00:08:39', '2023-05-16 00:12:16'),
(44, 23, 'add-question-four-trial', 0, 0, '2023-05-16 00:32:42', '2023-05-16 00:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `sr_services`
--

CREATE TABLE `sr_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_imgs` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_bg_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `service_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `cat_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'admin user email or id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='service names ';

--
-- Dumping data for table `sr_services`
--

INSERT INTO `sr_services` (`id`, `service_name`, `service_imgs`, `service_bg_img`, `service_desc`, `cat_id`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Website Development', 'https://shopninja.in/haarogya/images/services/61a4e292c62a1-1638195858.jpg', 'https://shopninja.in/haarogya/images/service_bg/6214f1b098b7e-1645539760.png', '<p>Yoga is essentially a spiritual discipline based on an extremely subtle science, which focuses on bringing harmony between mind and body. It is an art and scince of healthy living.</p>\r\n', 0, 1, NULL, NULL, '1'),
(2, 'App Development', NULL, '', '', 0, 1, NULL, NULL, '1'),
(4, 'Hybrid App Development', 'https://techninza.in/api/public/images/App1.png', 'https://shopninja.in/haarogya/images/service_bg/61cc89afedfe2-1640794543.png', '<p>Zumba class is a combination of dance and fitness moves done to a background of exhilarating, international rhythms. The Zumba formula is 70% Latin music and 30% of anything else. A typical Zumba class will feature merengue, salsa, cha-cha, reggaeton, bachata, samba, soca, hip-hop, bellydance, bhangra.</p>\r\n', 0, 1, '2021-10-10 05:49:40', NULL, 'hara@gmail.com'),
(5, 'Digital Marketing', 'https://shopninja.in/haarogya/images/services/6194ea00693ed-1637149184.png', '', '<p>begginer</p>\r\n', 0, 1, '2021-11-17 11:39:44', NULL, 'hara@gmail.com'),
(7, 'SEO', 'https://techninza.in/api/public/images/marketing1.png', 'https://shopninja.in/haarogya/images/service_bg/6214f4ccb2441-1645540556.jpg', '<p>Physical therapy, also known as physiotherapy, is one of the allied health professions. It is provided by physical therapists who promote, maintain, or restore health through physical examination, diagnosis, prognosis, patient education, physical intervention, rehabilitation, disease prevention, and health promotion.</p>\r\n', 0, 1, '2021-11-24 05:29:25', NULL, 'hara@gmail.com'),
(8, 'Android App Development', 'https://techninza.in/api/public/images/App2.png', '', NULL, 5, 1, NULL, NULL, NULL),
(9, 'IOS App Development', 'https://techninza.in/api/public/images/App3.png', '', NULL, 2, 1, NULL, NULL, NULL),
(10, 'Social Media Marketing', 'https://techninza.in/api/public/images/marketing2.png', '', NULL, 5, NULL, NULL, NULL, NULL),
(11, 'Advertisement', 'https://techninza.in/api/public/images/marketing3.png', '', NULL, 5, NULL, NULL, NULL, NULL),
(12, 'Gaming App', 'https://techninza.in/api/public/images/App4.png', '', NULL, 2, 1, NULL, NULL, NULL),
(13, 'Brand Marketing', 'https://techninza.in/api/public/images/marketing1.png', '', NULL, 5, NULL, NULL, NULL, NULL),
(14, 'Website Design', 'https://techninza.in/api/public/images/web1.png', '', NULL, 5, 1, NULL, NULL, NULL),
(15, 'E-commerce Website', 'https://techninza.in/api/public/images/web2.png', '', NULL, 1, 1, NULL, NULL, NULL),
(16, 'Internet of Things', NULL, '', '', 0, 1, NULL, NULL, '1'),
(17, 'Home Automation', 'https://techninza.in/api/public/images/iot1.png', '', '', 16, 1, NULL, NULL, '1'),
(18, 'Custom Web Application', 'https://techninza.in/api/public/images/web3.png', '', NULL, 1, 1, NULL, NULL, NULL),
(19, 'Web Redesign', 'https://techninza.in/api/public/images/web4.png', '', NULL, 1, 1, NULL, NULL, NULL),
(20, 'Mobile App Development', 'https://techninza.in/api/public/images/App1.png', 'https://shopninja.in/haarogya/images/service_bg/61cc89afedfe2-1640794543.png', '<p>Zumba class is a combination of dance and fitness moves done to a background of exhilarating, international rhythms. The Zumba formula is 70% Latin music and 30% of anything else. A typical Zumba class will feature merengue, salsa, cha-cha, reggaeton, bachata, samba, soca, hip-hop, bellydance, bhangra.</p>\r\n', 0, 1, '2021-10-10 05:49:40', NULL, 'hara@gmail.com'),
(22, 'App Designing', NULL, '', '', 0, 1, NULL, NULL, '1'),
(23, 'Graphic Designer', NULL, '', NULL, 0, 1, '2023-05-29 00:00:00', NULL, NULL),
(24, 'Writing & Translation', NULL, '', NULL, 0, 1, '2023-05-29 00:00:00', '2024-01-17 07:25:27', NULL),
(25, 'Video & Animation', NULL, '', NULL, NULL, 1, '2024-01-17 12:56:15', '2024-01-17 07:26:15', NULL),
(26, 'AI Services', NULL, '', NULL, NULL, 1, '2024-01-17 12:57:58', '2024-01-17 07:27:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sr_services_new`
--

CREATE TABLE `sr_services_new` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_slug` varchar(255) DEFAULT NULL,
  `service_imgs` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_bg_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `service_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `cat_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 for parent category',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `sr_home` text,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'admin user email or id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='service names ';

--
-- Dumping data for table `sr_services_new`
--

INSERT INTO `sr_services_new` (`id`, `service_name`, `service_slug`, `service_imgs`, `service_bg_img`, `service_desc`, `cat_id`, `meta_title`, `meta_keywords`, `meta_description`, `sr_home`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Website Development', 'web-development', 'https://shopninja.in/haarogya/images/services/61a4e292c62a1-1638195858.jpg', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119467/sooprs/website-development_mlfhi1.webp', NULL, 34, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-27 00:16:39', '1'),
(2, 'App Development', 'app-development', NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-23 05:57:09', '1'),
(4, 'Hybrid App Development', 'hybrid-app-development', 'https://techninza.in/api/public/images/App1.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119216/sooprs/hybrid_bhk5en.webp', NULL, 34, NULL, NULL, NULL, NULL, 1, '2021-10-10 00:19:40', '2024-03-27 00:17:17', 'hara@gmail.com'),
(5, 'Digital Marketing', 'digital-marketing', 'https://shopninja.in/haarogya/images/services/6194ea00693ed-1637149184.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/digital-marketing_ark4pb.webp', '<p>begginer</p>', 40, NULL, NULL, NULL, NULL, 1, '2021-11-17 06:09:44', '2024-03-19 04:35:40', 'hara@gmail.com'),
(7, 'SEO', 'seo', 'https://techninza.in/api/public/images/marketing1.png', NULL, '<p>Physical therapy, also known as physiotherapy, is one of the allied health professions. It is provided by physical therapists who promote, maintain, or restore health through physical examination, diagnosis, prognosis, patient education, physical intervention, rehabilitation, disease prevention, and health promotion.</p>', 40, NULL, NULL, NULL, NULL, 1, '2021-11-23 23:59:25', '2024-03-23 06:26:13', 'hara@gmail.com'),
(8, 'Android App Development', 'adroid-app-development', 'https://techninza.in/api/public/images/App2.png', NULL, NULL, 34, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-23 05:58:39', NULL),
(9, 'IOS App Development', 'ios-app-development', 'https://techninza.in/api/public/images/App3.png', '', NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(10, 'Social Media Marketing', 'social-media-marketing', 'https://techninza.in/api/public/images/marketing2.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/smm_qzugi6.webp', NULL, 40, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-19 04:36:15', NULL),
(11, 'Advertisement', 'advertisement', 'https://techninza.in/api/public/images/marketing3.png', '', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Gaming App Development', 'gaming-app-development', 'https://techninza.in/api/public/images/App4.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1710593601/sooprs/game-development_xufvs9.webp', NULL, 34, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-16 07:50:59', NULL),
(13, 'Brand Marketing', 'brand-marketing', 'https://techninza.in/api/public/images/marketing1.png', '', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Web Designing', 'web-designing', 'https://techninza.in/api/public/images/web1.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119949/sooprs/web-design_c01uom.webp', NULL, 36, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-23 05:15:56', NULL),
(15, 'E-commerce Website', 'ecommerce-website', 'https://techninza.in/api/public/images/web2.png', '', NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 'Internet of Things', 'internet-of-things', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604418/sooprs/iot_ydvbdr.webp', NULL, 41, NULL, NULL, NULL, NULL, 1, NULL, '2024-03-23 05:20:49', '1'),
(17, 'Home Automation', 'home-automation', 'https://techninza.in/api/public/images/iot1.png', '', '', 16, NULL, NULL, NULL, NULL, 1, NULL, NULL, '1'),
(18, 'Custom Web Application', 'custom-web-application', 'https://techninza.in/api/public/images/web3.png', '', NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(19, 'Web Redesign', NULL, 'https://techninza.in/api/public/images/web4.png', '', NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(20, 'Mobile App Development', 'mobile-app-development', 'https://techninza.in/api/public/images/App1.png', 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681119725/sooprs/android_tfaoie.webp', NULL, 34, 'app mobile development title', 'app mobile development keywords', 'app mobile development description', NULL, 1, '2021-10-10 00:19:40', '2024-03-27 00:17:36', 'hara@gmail.com'),
(23, 'Graphic Designing', 'graphic-designing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120138/sooprs/graphic_k04klu.webp', NULL, 36, NULL, NULL, NULL, NULL, 1, '2023-05-28 18:30:00', '2024-03-16 07:43:46', NULL),
(24, 'Writing & Translation', 'writing-and-translation', NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, 1, '2023-05-28 18:30:00', '2024-03-23 06:00:27', NULL),
(25, 'Video & Animation', 'video-and-animation', NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, 1, '2024-01-17 07:26:15', '2024-03-23 05:59:53', NULL),
(26, 'AI Services', 'ai-services', NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 1, '2024-01-17 07:27:58', '2024-03-23 05:59:08', NULL),
(34, 'Development', 'development', NULL, NULL, NULL, 0, NULL, NULL, NULL, '1,2,4,12,35', 1, '2024-03-16 04:30:56', '2024-03-27 05:51:56', NULL),
(35, 'Software Development', 'software-development', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683697560/sooprs/software-developer_f4g5vu.webp', NULL, 34, NULL, NULL, NULL, NULL, 1, '2024-03-16 05:36:29', '2024-03-16 06:31:25', NULL),
(36, 'Designing', 'designing', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-03-16 07:33:28', '2024-03-16 07:33:28', NULL),
(37, 'App Designing', 'app-designing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120054/sooprs/app-design_gmjwci.webp', NULL, 36, NULL, NULL, NULL, NULL, 1, '2024-03-16 07:42:13', '2024-03-16 07:43:14', NULL),
(38, 'UI/UX Designing', 'uiux-designing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120308/sooprs/ui_ans5ev.webp', NULL, 36, NULL, NULL, NULL, NULL, 1, '2024-03-16 07:44:34', '2024-03-23 05:16:34', NULL),
(39, 'Animation Designing', 'animation-designing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp', NULL, 36, NULL, NULL, NULL, NULL, 1, '2024-03-16 07:45:05', '2024-03-16 07:45:05', NULL),
(40, 'Marketing', 'marketing', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-03-19 04:31:55', '2024-03-19 04:31:55', NULL),
(41, 'Latest Tech', 'latest-tech', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:20:28', '2024-03-23 05:20:28', NULL),
(42, 'Artificial Intelligence', 'artificial-intelligence', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604422/sooprs/artificial-intelligence_asn43t.webp', NULL, 41, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:23:26', '2024-03-23 05:23:26', NULL),
(43, 'Machine Learning', 'machine-learning', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604427/sooprs/machine-learning_fdy1kp.webp', NULL, 41, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:25:10', '2024-03-23 05:25:10', NULL),
(44, 'Augmented Reality', 'augmented-reality', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604712/sooprs/augumented-reality_wlb7jf.webp', NULL, 41, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:26:27', '2024-03-23 05:26:27', NULL),
(45, 'Virtual reality', 'virtual-reality', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683604433/sooprs/virtual-reality_gz1usf.webp', NULL, 41, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:27:10', '2024-03-23 05:27:10', NULL),
(46, 'Search Engine Marketing', 'search-engine-marketing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/sem_fupfek.webp', NULL, 40, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:36:24', '2024-03-23 05:36:24', NULL),
(47, 'Content Marketing', 'content-marketing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/content-marketing_glsdvr.webp', NULL, 40, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:36:53', '2024-03-23 05:36:53', NULL),
(48, 'Influencer Marketing', 'influencer-marketing', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/video-marketing_kqbi9o.webp', NULL, 40, NULL, NULL, NULL, NULL, 1, '2024-03-23 05:37:33', '2024-03-23 05:37:33', NULL),
(49, 'Event Planning', 'event-planning', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1711453175/sooprs/Event_planning_lmvk29.jpg', '<p class=\"p1\">At Sooprs.com, we understand the challenges involved in planning a significant event, whether it\'s a wedding planner, corporate event planner, birthday planner or other event planner. Our platform connects you with experienced event organisers who can bring your vision to life.</p>\r\n<p class=\"p1\">Booking an event organiser through Sooprs.com has many benefits. Firstly, our curated selection of organisers ensures you find the perfect match for your event, tailored to your specific needs and preferences. From choosing themes to coordinating venues and managing vendors, our organisers handle every detail with expertise, saving you time and stress.</p>\r\n<p class=\"p1\">Additionally, Sooprs.com guarantees exceptional skill and reliability. Our organisers are screened for their experience, creativity, and dedication, ensuring your event is executed flawlessly from start to finish. With their expertise, you can relax and enjoy your event, knowing every aspect is being taken care of accurately.</p>', 0, 'Event planner booking on Sooprs.com', 'Event planner booking, Birthday planner booking, Wedding planner booking, Corporate event planner', 'Book event planner on sooprs.com by posting your requirement.', NULL, 1, '2024-03-26 05:43:09', '2024-03-26 06:11:10', NULL),
(50, 'Photography', 'photography', NULL, 'https://res.cloudinary.com/dr4iluda9/image/upload/v1711453176/sooprs/Photography_ihneug.jpg', '<p>At Sooprs.com, we understand the meaning of getting life\'s significant minutes with ability and innovativeness. That is the explanation we\'ve coordinated a phase that points to interaction gifted visual specialists with clients searching for top-notch imagery for every occasion.</p>\r\n<p>Booking a visual craftsman through Sooprs.com goes with a lot of benefits. Most importantly, our establishment boasts alternate pool picture takers, each with their original style and dominance, ensuring that you track down the best partner for your vision. In addition, we centre around convenience and capability, allowing you to scrutinise portfolios, talk with visual specialists, and book gatherings impeccably in all cases.</p>\r\n<p>Whether you\'re organising a wedding, a family picture meeting, or a corporate event, Sooprs.com deals with you. Experience the straightforwardness and significance of booking picture takers through Sooprs.com today, and let us help you with revering your memories in amazing imagery. Trust Sooprs.com for your photography needs, and permit us to raise your visual description.</p>', 0, 'Book Photographer on Sooprs.com', 'Wedding photographers, Corporate event photographer, Fashion & Modelling, Birthday Parties Photographers', 'Get and book best photographers for your needs at sooprs.com', NULL, 1, '2024-03-26 07:01:55', '2024-03-26 07:01:55', NULL),
(58, 'Travel & Holidays', 'travel-and-holidays', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-04-04 04:16:07', '2024-04-04 04:16:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL DEFAULT '1',
  `amount` decimal(10,2) NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target_id` int(11) NOT NULL DEFAULT '0',
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `closing` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `user_id`, `transaction_type`, `amount`, `transaction_date`, `transaction_id`, `target_id`, `remark`, `created_at`, `updated_at`, `payment_id`, `closing`) VALUES
(31, 340, 0, '10.00', 'November 24, 2023 02:50:26', 'TRANS-1700815826', 0, 'Debited 10 credits for bidding', '2023-11-24 08:50:26', '2023-11-24 08:50:26', '', '40'),
(32, 347, 0, '10.00', 'November 24, 2023 07:03:04', 'TRANS-1700830984', 0, 'Debited 10 credits for bidding', '2023-11-24 13:03:04', '2023-11-24 13:03:04', '', '40'),
(33, 347, 1, '10.00', 'November 24, 2023 07:14:06', 'TRANS-1700831646', 0, 'added 10credits to wallet', '2023-11-24 13:14:06', '2023-11-24 13:14:06', 'pay_N4K7wajlzRiAWQ', '50'),
(34, 260, 0, '10.00', 'November 28, 2023 10:49:43', 'TRANS-1701190183', 0, 'Debited 10 credits for bidding', '2023-11-28 16:49:43', '2023-11-28 16:49:43', '', '130'),
(35, 260, 1, '50.00', 'December 1, 2023 23:10:24', 'TRANS-1701493824', 0, 'added 50credits to wallet', '2023-12-02 05:10:24', '2023-12-02 05:10:24', 'pay_N7M9zOwr8BnVmN', '180'),
(36, 2, 1, '50.00', 'December 2, 2023 05:43:41', 'TRANS-1701517421', 0, 'added 50credits to wallet', '2023-12-02 11:43:41', '2023-12-02 11:43:41', 'pay_N7SrSplrir6QHA', '50'),
(37, 2, 0, '10.00', 'December 2, 2023 05:44:13', 'TRANS-1701517453', 0, 'Debited 10 credits for bidding', '2023-12-02 11:44:13', '2023-12-02 11:44:13', '', '40'),
(38, 260, 0, '10.00', 'December 4, 2023 10:33:48', 'TRANS-1701707628', 0, 'Debited 10 credits for bidding', '2023-12-04 16:33:48', '2023-12-04 16:33:48', '', '170'),
(39, 353, 0, '10.00', 'December 6, 2023 06:38:10', 'TRANS-1701866290', 0, 'Debited 10 credits for bidding', '2023-12-06 12:38:10', '2023-12-06 12:38:10', '', '40'),
(40, 353, 0, '10.00', 'December 6, 2023 06:50:24', 'TRANS-1701867024', 0, 'Debited 10 credits for bidding', '2023-12-06 12:50:24', '2023-12-06 12:50:24', '', '30'),
(41, 355, 0, '10.00', 'December 8, 2023 06:50:15', 'TRANS-1702039815', 0, 'Debited 10 credits for bidding', '2023-12-08 12:50:15', '2023-12-08 12:50:15', '', '40'),
(42, 356, 0, '10.00', 'December 9, 2023 01:58:47', 'TRANS-1702108727', 0, 'Debited 10 credits for bidding', '2023-12-09 07:58:47', '2023-12-09 07:58:47', '', '40'),
(43, 387, 0, '10.00', 'December 13, 2023 17:27:24', 'TRANS-1702468644', 0, 'Debited 10 credits for bidding', '2023-12-13 11:57:24', '2023-12-13 11:57:24', '', '40'),
(44, 356, 0, '10.00', 'December 16, 2023 11:17:29', 'TRANS-1702705649', 0, 'Debited 10 credits for bidding', '2023-12-16 05:47:29', '2023-12-16 05:47:29', '', '30'),
(45, 356, 0, '10.00', 'December 18, 2023 16:11:03', 'TRANS-1702896063', 0, 'Debited 10 credits for bidding', '2023-12-18 10:41:03', '2023-12-18 10:41:03', '', '20'),
(46, 356, 0, '10.00', 'December 19, 2023 11:44:09', 'TRANS-1702966449', 0, 'Debited 10 credits for bidding', '2023-12-19 06:14:09', '2023-12-19 06:14:09', '', '10'),
(47, 356, 0, '10.00', 'December 20, 2023 12:24:25', 'TRANS-1703055265', 0, 'Debited 10 credits for bidding', '2023-12-20 06:54:25', '2023-12-20 06:54:25', '', '0'),
(48, 356, 1, '50.00', 'December 20, 2023 13:02:45', 'TRANS-1703057565', 0, 'added 50credits to wallet', '2023-12-20 07:32:45', '2023-12-20 07:32:45', 'pay_NEWCYi9GrqtyGJ', '50'),
(49, 356, 0, '10.00', 'December 20, 2023 16:36:09', 'TRANS-1703070369', 0, 'Debited 10 credits for bidding', '2023-12-20 11:06:09', '2023-12-20 11:06:09', '', '40'),
(50, 356, 0, '10.00', 'December 20, 2023 16:36:09', 'TRANS-1703070369', 0, 'Debited 10 credits for bidding', '2023-12-20 11:06:09', '2023-12-20 11:06:09', '', '30'),
(51, 356, 0, '10.00', 'December 20, 2023 16:50:27', 'TRANS-1703071227', 0, 'Debited 10 credits for bidding', '2023-12-20 11:20:27', '2023-12-20 11:20:27', '', '20'),
(52, 356, 0, '10.00', 'December 20, 2023 17:03:55', 'TRANS-1703072035', 0, 'Debited 10 credits for bidding', '2023-12-20 11:33:55', '2023-12-20 11:33:55', '', '10'),
(53, 356, 0, '10.00', 'December 20, 2023 17:17:08', 'TRANS-1703072828', 0, 'Debited 10 credits for bidding', '2023-12-20 11:47:08', '2023-12-20 11:47:08', '', '0'),
(54, 356, 1, '10.00', 'December 21, 2023 10:53:19', 'TRANS-1703136199', 0, 'added 10credits to wallet', '2023-12-21 05:23:19', '2023-12-21 05:23:19', 'pay_NEsWw3hNZ5Gn6V', '10'),
(55, 356, 0, '10.00', 'December 21, 2023 10:53:43', 'TRANS-1703136223', 0, 'Debited 10 credits for bidding', '2023-12-21 05:23:43', '2023-12-21 05:23:43', '', '0'),
(56, 356, 1, '100.00', 'December 22, 2023 13:59:29', 'TRANS-1703233769', 0, 'added 100credits to wallet', '2023-12-22 08:29:29', '2023-12-22 08:29:29', 'pay_NFKEisVMVz5x3y', '100'),
(57, 356, 0, '10.00', 'December 22, 2023 14:00:00', 'TRANS-1703233800', 0, 'Debited 10 credits for bidding', '2023-12-22 08:30:00', '2023-12-22 08:30:00', '', '90'),
(58, 356, 0, '10.00', 'December 22, 2023 15:30:46', 'TRANS-1703239246', 0, 'Debited 10 credits for bidding', '2023-12-22 10:00:46', '2023-12-22 10:00:46', '', '80'),
(59, 356, 0, '10.00', 'December 22, 2023 15:32:46', 'TRANS-1703239366', 0, 'Debited 10 credits for bidding', '2023-12-22 10:02:46', '2023-12-22 10:02:46', '', '70'),
(60, 356, 0, '10.00', 'December 22, 2023 15:38:56', 'TRANS-1703239736', 0, 'Debited 10 credits for bidding', '2023-12-22 10:08:56', '2023-12-22 10:08:56', '', '60'),
(61, 356, 0, '10.00', 'December 22, 2023 15:50:47', 'TRANS-1703240447', 0, 'Debited 10 credits for bidding', '2023-12-22 10:20:47', '2023-12-22 10:20:47', '', '50'),
(62, 355, 0, '10.00', 'December 22, 2023 22:37:37', 'TRANS-1703264857', 0, 'Debited 10 credits for bidding', '2023-12-22 17:07:37', '2023-12-22 17:07:37', '', '30'),
(63, 356, 0, '10.00', 'December 23, 2023 16:33:03', 'TRANS-1703329383', 0, 'Debited 10 credits for bidding', '2023-12-23 11:03:03', '2023-12-23 11:03:03', '', '40'),
(64, 356, 0, '10.00', 'December 23, 2023 17:07:11', 'TRANS-1703331431', 0, 'Debited 10 credits for bidding', '2023-12-23 11:37:11', '2023-12-23 11:37:11', '', '30'),
(65, 356, 0, '10.00', 'December 26, 2023 19:26:44', 'TRANS-1703599004', 0, 'Debited 10 credits for bidding', '2023-12-26 13:56:44', '2023-12-26 13:56:44', '', '20'),
(66, 356, 0, '10.00', 'December 26, 2023 19:31:15', 'TRANS-1703599275', 0, 'Debited 10 credits for bidding', '2023-12-26 14:01:15', '2023-12-26 14:01:15', '', '10'),
(67, 356, 0, '10.00', 'December 26, 2023 22:49:58', 'TRANS-1703611198', 0, 'Debited 10 credits for bidding', '2023-12-26 17:19:58', '2023-12-26 17:19:58', '', '0'),
(68, 356, 1, '200.00', 'December 26, 2023 22:55:38', 'TRANS-1703611538', 0, 'added 200credits to wallet', '2023-12-26 17:25:38', '2023-12-26 17:25:38', 'pay_NH3VYjnymCsyJ8', '200'),
(69, 356, 0, '10.00', 'December 26, 2023 22:56:07', 'TRANS-1703611567', 0, 'Debited 10 credits for bidding', '2023-12-26 17:26:07', '2023-12-26 17:26:07', '', '190'),
(70, 388, 0, '10.00', 'December 27, 2023 16:03:03', 'TRANS-1703673183', 0, 'Debited 10 credits for bidding', '2023-12-27 10:33:03', '2023-12-27 10:33:03', '', '40'),
(71, 391, 0, '10.00', 'December 27, 2023 16:29:16', 'TRANS-1703674756', 0, 'Debited 10 credits for bidding', '2023-12-27 10:59:16', '2023-12-27 10:59:16', '', '40'),
(72, 356, 0, '10.00', 'December 27, 2023 22:01:25', 'TRANS-1703694685', 0, 'Debited 10 credits for bidding', '2023-12-27 16:31:25', '2023-12-27 16:31:25', '', '180'),
(73, 391, 0, '10.00', 'December 30, 2023 01:34:11', 'TRANS-1703921651', 0, 'Debited 10 credits for bidding', '2023-12-30 07:34:11', '2023-12-30 07:34:11', '', '30'),
(74, 391, 1, '190.00', 'December 30, 2023 02:09:35', 'TRANS-1703923775', 0, 'added 190credits to wallet', '2023-12-30 08:09:35', '2023-12-30 08:09:35', 'pay_NIUAfZj2Tbqsfm', '220'),
(75, 391, 1, '10.00', 'December 30, 2023 02:31:00', 'TRANS-1703925060', 0, 'added 10credits to wallet', '2023-12-30 08:31:00', '2023-12-30 08:31:00', 'pay_NIUXIRa6tUP2Gt', '230'),
(76, 391, 1, '20.00', 'December 30, 2023 02:33:28', 'TRANS-1703925208', 0, 'added 20credits to wallet', '2023-12-30 08:33:28', '2023-12-30 08:33:28', 'pay_NIUZtOTLoEs0QT', '250'),
(77, 399, 0, '10.00', 'December 30, 2023 04:22:43', 'TRANS-1703931763', 0, 'Debited 10 credits for bidding', '2023-12-30 10:22:43', '2023-12-30 10:22:43', '', '40'),
(78, 391, 0, '10.00', 'January 4, 2024 02:13:04', 'TRANS-1704355984', 0, 'Debited 10 credits for bidding', '2024-01-04 08:13:04', '2024-01-04 08:13:04', '', '240'),
(79, 391, 0, '10.00', 'January 5, 2024 00:07:22', 'TRANS-1704434842', 0, 'Debited 10 credits for bidding', '2024-01-05 06:07:22', '2024-01-05 06:07:22', '', '230'),
(80, 391, 0, '10.00', 'January 5, 2024 02:22:44', 'TRANS-1704442964', 0, 'Debited 10 credits for bidding', '2024-01-05 08:22:44', '2024-01-05 08:22:44', '', '220'),
(81, 410, 1, '10.00', 'January 6, 2024 01:26:51', 'TRANS-1704526011', 0, 'added 10credits to wallet', '2024-01-06 07:26:51', '2024-01-06 07:26:51', 'pay_NLFBKVrY45OlQY', '60'),
(82, 391, 0, '10.00', 'January 6, 2024 01:48:13', 'TRANS-1704527293', 0, 'Debited 10 credits for bidding', '2024-01-06 07:48:13', '2024-01-06 07:48:13', '', '210'),
(83, 397, 0, '10.00', 'January 6, 2024 02:02:02', 'TRANS-1704528122', 0, 'Debited 10 credits for bidding', '2024-01-06 08:02:02', '2024-01-06 08:02:02', '', '40'),
(84, 397, 0, '10.00', 'January 6, 2024 02:22:11', 'TRANS-1704529331', 0, 'Debited 10 credits for bidding', '2024-01-06 08:22:11', '2024-01-06 08:22:11', '', '30'),
(85, 397, 0, '10.00', 'January 6, 2024 02:22:15', 'TRANS-1704529335', 0, 'Debited 10 credits for bidding', '2024-01-06 08:22:15', '2024-01-06 08:22:15', '', '20'),
(86, 397, 1, '10.00', 'January 6, 2024 03:43:16', 'TRANS-1704534196', 0, 'added 10credits to wallet', '2024-01-06 09:43:16', '2024-01-06 09:43:16', 'pay_NLHVRwBA3yJ9JW', '30'),
(87, 413, 0, '10.00', 'January 7, 2024 01:24:10', 'TRANS-1704612250', 0, 'Debited 10 credits for bidding', '2024-01-07 07:24:10', '2024-01-07 07:24:10', '', '40'),
(88, 413, 0, '10.00', 'January 7, 2024 01:24:13', 'TRANS-1704612253', 0, 'Debited 10 credits for bidding', '2024-01-07 07:24:13', '2024-01-07 07:24:13', '', '30'),
(89, 413, 0, '10.00', 'January 7, 2024 01:27:08', 'TRANS-1704612428', 0, 'Debited 10 credits for bidding', '2024-01-07 07:27:08', '2024-01-07 07:27:08', '', '20'),
(90, 413, 0, '10.00', 'January 7, 2024 01:27:10', 'TRANS-1704612430', 0, 'Debited 10 credits for bidding', '2024-01-07 07:27:10', '2024-01-07 07:27:10', '', '10'),
(91, 391, 0, '10.00', 'January 7, 2024 23:53:42', 'TRANS-1704693222', 0, 'Debited 10 credits for bidding', '2024-01-08 05:53:42', '2024-01-08 05:53:42', '', '200'),
(92, 413, 1, '10.00', 'January 12, 2024 00:28:19', 'TRANS-1705040899', 0, 'added 10credits to wallet', '2024-01-12 06:28:19', '2024-01-12 06:28:19', 'pay_NNbOBqRd3Uum4R', '20'),
(93, 423, 0, '10.00', 'January 12, 2024 01:11:19', 'TRANS-1705043479', 0, 'Debited 10 credits for bidding', '2024-01-12 07:11:19', '2024-01-12 07:11:19', '', '40'),
(94, 423, 0, '10.00', 'January 12, 2024 01:14:45', 'TRANS-1705043685', 0, 'Debited 10 credits for bidding', '2024-01-12 07:14:45', '2024-01-12 07:14:45', '', '30'),
(95, 423, 0, '10.00', 'January 12, 2024 01:16:40', 'TRANS-1705043800', 0, 'Debited 10 credits for bidding', '2024-01-12 07:16:40', '2024-01-12 07:16:40', '', '20'),
(96, 423, 0, '10.00', 'January 12, 2024 01:17:36', 'TRANS-1705043856', 0, 'Debited 10 credits for bidding', '2024-01-12 07:17:36', '2024-01-12 07:17:36', '', '10'),
(97, 423, 0, '10.00', 'January 12, 2024 03:18:36', 'TRANS-1705051116', 0, 'Debited 10 credits for bidding', '2024-01-12 09:18:36', '2024-01-12 09:18:36', '', '0'),
(98, 413, 0, '10.00', 'January 14, 2024 01:29:03', 'TRANS-1705217343', 0, 'Debited 10 credits for bidding', '2024-01-14 07:29:03', '2024-01-14 07:29:03', '', '10'),
(99, 357, 0, '10.00', 'January 17, 2024 03:56:50', 'TRANS-1705485410', 0, 'Debited 10 credits for bidding', '2024-01-17 09:56:50', '2024-01-17 09:56:50', '', '40'),
(100, 437, 0, '10.00', 'January 17, 2024 04:25:13', 'TRANS-1705487113', 0, 'Debited 10 credits for bidding', '2024-01-17 10:25:13', '2024-01-17 10:25:13', '', '40'),
(101, 418, 0, '10.00', 'January 19, 2024 03:39:01', 'TRANS-1705657141', 0, 'Debited 10 credits for bidding', '2024-01-19 09:39:01', '2024-01-19 09:39:01', '', '40'),
(102, 418, 0, '10.00', 'January 19, 2024 03:42:07', 'TRANS-1705657327', 0, 'Debited 10 credits for bidding', '2024-01-19 09:42:07', '2024-01-19 09:42:07', '', '30'),
(103, 418, 0, '10.00', 'January 19, 2024 03:43:09', 'TRANS-1705657389', 0, 'Debited 10 credits for bidding', '2024-01-19 09:43:09', '2024-01-19 09:43:09', '', '20'),
(104, 418, 0, '10.00', 'January 19, 2024 03:45:44', 'TRANS-1705657544', 0, 'Debited 10 credits for bidding', '2024-01-19 09:45:44', '2024-01-19 09:45:44', '', '10'),
(105, 418, 0, '10.00', 'January 19, 2024 03:47:22', 'TRANS-1705657642', 0, 'Debited 10 credits for bidding', '2024-01-19 09:47:22', '2024-01-19 09:47:22', '', '0'),
(106, 418, 0, '10.00', 'January 19, 2024 03:59:31', 'TRANS-1705658371', 0, 'Debited 10 credits for bidding', '2024-01-19 09:59:31', '2024-01-19 09:59:31', '', '990'),
(107, 366, 0, '10.00', 'January 20, 2024 04:50:40', 'TRANS-1705747840', 0, 'Debited 10 credits for bidding', '2024-01-20 10:50:40', '2024-01-20 10:50:40', '', '40'),
(108, 366, 0, '10.00', 'January 20, 2024 04:52:35', 'TRANS-1705747955', 0, 'Debited 10 credits for bidding', '2024-01-20 10:52:35', '2024-01-20 10:52:35', '', '30'),
(109, 366, 0, '10.00', 'January 20, 2024 05:53:14', 'TRANS-1705751594', 0, 'Debited 10 credits for bidding', '2024-01-20 11:53:14', '2024-01-20 11:53:14', '', '20'),
(110, 366, 0, '10.00', 'January 20, 2024 05:53:43', 'TRANS-1705751623', 0, 'Debited 10 credits for bidding', '2024-01-20 11:53:43', '2024-01-20 11:53:43', '', '10'),
(111, 366, 0, '10.00', 'January 20, 2024 05:54:19', 'TRANS-1705751659', 0, 'Debited 10 credits for bidding', '2024-01-20 11:54:19', '2024-01-20 11:54:19', '', '0'),
(112, 367, 0, '10.00', 'January 20, 2024 06:04:22', 'TRANS-1705752262', 0, 'Debited 10 credits for bidding', '2024-01-20 12:04:22', '2024-01-20 12:04:22', '', '40'),
(113, 367, 0, '10.00', 'January 20, 2024 06:05:02', 'TRANS-1705752302', 0, 'Debited 10 credits for bidding', '2024-01-20 12:05:02', '2024-01-20 12:05:02', '', '30'),
(114, 367, 0, '10.00', 'January 20, 2024 06:06:01', 'TRANS-1705752361', 0, 'Debited 10 credits for bidding', '2024-01-20 12:06:01', '2024-01-20 12:06:01', '', '20'),
(115, 367, 0, '10.00', 'January 20, 2024 06:06:54', 'TRANS-1705752414', 0, 'Debited 10 credits for bidding', '2024-01-20 12:06:54', '2024-01-20 12:06:54', '', '10'),
(116, 367, 0, '10.00', 'January 20, 2024 06:08:30', 'TRANS-1705752510', 0, 'Debited 10 credits for bidding', '2024-01-20 12:08:30', '2024-01-20 12:08:30', '', '0'),
(117, 369, 0, '10.00', 'January 20, 2024 06:13:11', 'TRANS-1705752791', 0, 'Debited 10 credits for bidding', '2024-01-20 12:13:11', '2024-01-20 12:13:11', '', '40'),
(118, 369, 0, '10.00', 'January 20, 2024 06:13:54', 'TRANS-1705752834', 0, 'Debited 10 credits for bidding', '2024-01-20 12:13:54', '2024-01-20 12:13:54', '', '30'),
(119, 369, 0, '10.00', 'January 20, 2024 06:17:02', 'TRANS-1705753022', 0, 'Debited 10 credits for bidding', '2024-01-20 12:17:02', '2024-01-20 12:17:02', '', '20'),
(120, 369, 0, '10.00', 'January 20, 2024 06:17:38', 'TRANS-1705753058', 0, 'Debited 10 credits for bidding', '2024-01-20 12:17:38', '2024-01-20 12:17:38', '', '10'),
(121, 369, 0, '10.00', 'January 20, 2024 06:18:36', 'TRANS-1705753116', 0, 'Debited 10 credits for bidding', '2024-01-20 12:18:36', '2024-01-20 12:18:36', '', '0'),
(122, 370, 0, '10.00', 'January 20, 2024 06:20:59', 'TRANS-1705753259', 0, 'Debited 10 credits for bidding', '2024-01-20 12:20:59', '2024-01-20 12:20:59', '', '40'),
(123, 370, 0, '10.00', 'January 20, 2024 06:21:25', 'TRANS-1705753285', 0, 'Debited 10 credits for bidding', '2024-01-20 12:21:25', '2024-01-20 12:21:25', '', '30'),
(124, 370, 0, '10.00', 'January 20, 2024 06:21:52', 'TRANS-1705753312', 0, 'Debited 10 credits for bidding', '2024-01-20 12:21:52', '2024-01-20 12:21:52', '', '20'),
(125, 370, 0, '10.00', 'January 20, 2024 06:22:34', 'TRANS-1705753354', 0, 'Debited 10 credits for bidding', '2024-01-20 12:22:34', '2024-01-20 12:22:34', '', '10'),
(126, 415, 0, '10.00', 'January 20, 2024 06:22:56', 'TRANS-1705753376', 0, 'Debited 10 credits for bidding', '2024-01-20 12:22:56', '2024-01-20 12:22:56', '', '40'),
(127, 370, 0, '10.00', 'January 20, 2024 06:23:04', 'TRANS-1705753384', 0, 'Debited 10 credits for bidding', '2024-01-20 12:23:04', '2024-01-20 12:23:04', '', '0'),
(128, 371, 0, '10.00', 'January 20, 2024 06:25:29', 'TRANS-1705753529', 0, 'Debited 10 credits for bidding', '2024-01-20 12:25:29', '2024-01-20 12:25:29', '', '40'),
(129, 371, 0, '10.00', 'January 20, 2024 06:26:03', 'TRANS-1705753563', 0, 'Debited 10 credits for bidding', '2024-01-20 12:26:03', '2024-01-20 12:26:03', '', '30'),
(130, 371, 0, '10.00', 'January 20, 2024 06:26:35', 'TRANS-1705753595', 0, 'Debited 10 credits for bidding', '2024-01-20 12:26:35', '2024-01-20 12:26:35', '', '20'),
(131, 371, 0, '10.00', 'January 20, 2024 06:27:10', 'TRANS-1705753630', 0, 'Debited 10 credits for bidding', '2024-01-20 12:27:10', '2024-01-20 12:27:10', '', '10'),
(132, 371, 0, '10.00', 'January 20, 2024 06:27:40', 'TRANS-1705753660', 0, 'Debited 10 credits for bidding', '2024-01-20 12:27:40', '2024-01-20 12:27:40', '', '0'),
(133, 372, 0, '10.00', 'January 22, 2024 04:02:54', 'TRANS-1705917774', 0, 'Debited 10 credits for bidding', '2024-01-22 10:02:54', '2024-01-22 10:02:54', '', '990'),
(134, 372, 0, '10.00', 'January 22, 2024 04:04:50', 'TRANS-1705917890', 0, 'Debited 10 credits for bidding', '2024-01-22 10:04:50', '2024-01-22 10:04:50', '', '980'),
(135, 372, 0, '10.00', 'January 22, 2024 04:05:49', 'TRANS-1705917949', 0, 'Debited 10 credits for bidding', '2024-01-22 10:05:49', '2024-01-22 10:05:49', '', '970'),
(136, 372, 0, '10.00', 'January 22, 2024 04:06:31', 'TRANS-1705917991', 0, 'Debited 10 credits for bidding', '2024-01-22 10:06:31', '2024-01-22 10:06:31', '', '960'),
(137, 372, 0, '10.00', 'January 22, 2024 04:07:18', 'TRANS-1705918038', 0, 'Debited 10 credits for bidding', '2024-01-22 10:07:18', '2024-01-22 10:07:18', '', '950'),
(138, 372, 0, '10.00', 'January 22, 2024 04:08:03', 'TRANS-1705918083', 0, 'Debited 10 credits for bidding', '2024-01-22 10:08:03', '2024-01-22 10:08:03', '', '940'),
(139, 372, 0, '10.00', 'January 22, 2024 04:09:00', 'TRANS-1705918140', 0, 'Debited 10 credits for bidding', '2024-01-22 10:09:00', '2024-01-22 10:09:00', '', '930'),
(140, 372, 0, '10.00', 'January 22, 2024 04:09:36', 'TRANS-1705918176', 0, 'Debited 10 credits for bidding', '2024-01-22 10:09:36', '2024-01-22 10:09:36', '', '920'),
(141, 372, 0, '10.00', 'January 22, 2024 04:10:49', 'TRANS-1705918249', 0, 'Debited 10 credits for bidding', '2024-01-22 10:10:49', '2024-01-22 10:10:49', '', '910'),
(142, 372, 0, '10.00', 'January 22, 2024 04:11:53', 'TRANS-1705918313', 0, 'Debited 10 credits for bidding', '2024-01-22 10:11:53', '2024-01-22 10:11:53', '', '900'),
(143, 372, 0, '10.00', 'January 22, 2024 04:12:32', 'TRANS-1705918352', 0, 'Debited 10 credits for bidding', '2024-01-22 10:12:32', '2024-01-22 10:12:32', '', '890'),
(144, 372, 0, '10.00', 'January 22, 2024 04:13:08', 'TRANS-1705918388', 0, 'Debited 10 credits for bidding', '2024-01-22 10:13:08', '2024-01-22 10:13:08', '', '880'),
(145, 372, 0, '10.00', 'January 22, 2024 04:14:03', 'TRANS-1705918443', 0, 'Debited 10 credits for bidding', '2024-01-22 10:14:03', '2024-01-22 10:14:03', '', '870'),
(146, 372, 0, '10.00', 'January 22, 2024 04:14:41', 'TRANS-1705918481', 0, 'Debited 10 credits for bidding', '2024-01-22 10:14:41', '2024-01-22 10:14:41', '', '860'),
(147, 372, 0, '10.00', 'January 22, 2024 04:15:22', 'TRANS-1705918522', 0, 'Debited 10 credits for bidding', '2024-01-22 10:15:22', '2024-01-22 10:15:22', '', '850'),
(148, 372, 0, '10.00', 'January 22, 2024 04:16:00', 'TRANS-1705918560', 0, 'Debited 10 credits for bidding', '2024-01-22 10:16:00', '2024-01-22 10:16:00', '', '840'),
(149, 372, 0, '10.00', 'January 22, 2024 04:19:38', 'TRANS-1705918778', 0, 'Debited 10 credits for bidding', '2024-01-22 10:19:38', '2024-01-22 10:19:38', '', '830'),
(150, 372, 0, '10.00', 'January 22, 2024 04:22:53', 'TRANS-1705918973', 0, 'Debited 10 credits for bidding', '2024-01-22 10:22:53', '2024-01-22 10:22:53', '', '820'),
(151, 372, 0, '10.00', 'January 22, 2024 04:23:45', 'TRANS-1705919025', 0, 'Debited 10 credits for bidding', '2024-01-22 10:23:45', '2024-01-22 10:23:45', '', '810'),
(152, 372, 0, '10.00', 'January 22, 2024 04:24:21', 'TRANS-1705919061', 0, 'Debited 10 credits for bidding', '2024-01-22 10:24:21', '2024-01-22 10:24:21', '', '800'),
(153, 372, 0, '10.00', 'January 22, 2024 04:24:58', 'TRANS-1705919098', 0, 'Debited 10 credits for bidding', '2024-01-22 10:24:58', '2024-01-22 10:24:58', '', '790'),
(154, 372, 0, '10.00', 'January 22, 2024 04:25:31', 'TRANS-1705919131', 0, 'Debited 10 credits for bidding', '2024-01-22 10:25:31', '2024-01-22 10:25:31', '', '780'),
(155, 372, 0, '10.00', 'January 22, 2024 04:30:13', 'TRANS-1705919413', 0, 'Debited 10 credits for bidding', '2024-01-22 10:30:13', '2024-01-22 10:30:13', '', '770'),
(156, 372, 0, '10.00', 'January 22, 2024 04:34:46', 'TRANS-1705919686', 0, 'Debited 10 credits for bidding', '2024-01-22 10:34:46', '2024-01-22 10:34:46', '', '760'),
(157, 372, 0, '10.00', 'January 22, 2024 04:36:58', 'TRANS-1705919818', 0, 'Debited 10 credits for bidding', '2024-01-22 10:36:58', '2024-01-22 10:36:58', '', '750'),
(158, 372, 0, '10.00', 'January 22, 2024 04:37:31', 'TRANS-1705919851', 0, 'Debited 10 credits for bidding', '2024-01-22 10:37:31', '2024-01-22 10:37:31', '', '740'),
(159, 372, 0, '10.00', 'January 22, 2024 04:38:16', 'TRANS-1705919896', 0, 'Debited 10 credits for bidding', '2024-01-22 10:38:16', '2024-01-22 10:38:16', '', '730'),
(160, 372, 0, '10.00', 'January 22, 2024 04:39:21', 'TRANS-1705919961', 0, 'Debited 10 credits for bidding', '2024-01-22 10:39:21', '2024-01-22 10:39:21', '', '720'),
(161, 372, 0, '10.00', 'January 22, 2024 04:39:54', 'TRANS-1705919994', 0, 'Debited 10 credits for bidding', '2024-01-22 10:39:54', '2024-01-22 10:39:54', '', '710'),
(162, 372, 0, '10.00', 'January 22, 2024 04:40:21', 'TRANS-1705920021', 0, 'Debited 10 credits for bidding', '2024-01-22 10:40:21', '2024-01-22 10:40:21', '', '700'),
(163, 372, 0, '10.00', 'January 22, 2024 04:40:52', 'TRANS-1705920052', 0, 'Debited 10 credits for bidding', '2024-01-22 10:40:52', '2024-01-22 10:40:52', '', '690'),
(164, 372, 0, '10.00', 'January 22, 2024 04:41:28', 'TRANS-1705920088', 0, 'Debited 10 credits for bidding', '2024-01-22 10:41:28', '2024-01-22 10:41:28', '', '680'),
(165, 372, 0, '10.00', 'January 22, 2024 04:42:02', 'TRANS-1705920122', 0, 'Debited 10 credits for bidding', '2024-01-22 10:42:02', '2024-01-22 10:42:02', '', '670'),
(166, 372, 0, '10.00', 'January 22, 2024 04:42:36', 'TRANS-1705920156', 0, 'Debited 10 credits for bidding', '2024-01-22 10:42:36', '2024-01-22 10:42:36', '', '660'),
(167, 372, 0, '10.00', 'January 22, 2024 04:43:12', 'TRANS-1705920192', 0, 'Debited 10 credits for bidding', '2024-01-22 10:43:12', '2024-01-22 10:43:12', '', '650'),
(168, 372, 0, '10.00', 'January 22, 2024 04:43:43', 'TRANS-1705920223', 0, 'Debited 10 credits for bidding', '2024-01-22 10:43:43', '2024-01-22 10:43:43', '', '640'),
(169, 372, 0, '10.00', 'January 22, 2024 04:44:52', 'TRANS-1705920292', 0, 'Debited 10 credits for bidding', '2024-01-22 10:44:52', '2024-01-22 10:44:52', '', '630'),
(170, 372, 0, '10.00', 'January 22, 2024 04:45:21', 'TRANS-1705920321', 0, 'Debited 10 credits for bidding', '2024-01-22 10:45:21', '2024-01-22 10:45:21', '', '620'),
(171, 372, 0, '10.00', 'January 22, 2024 04:45:59', 'TRANS-1705920359', 0, 'Debited 10 credits for bidding', '2024-01-22 10:45:59', '2024-01-22 10:45:59', '', '610'),
(172, 372, 0, '10.00', 'January 22, 2024 04:46:25', 'TRANS-1705920385', 0, 'Debited 10 credits for bidding', '2024-01-22 10:46:25', '2024-01-22 10:46:25', '', '600'),
(173, 372, 0, '10.00', 'January 22, 2024 04:46:53', 'TRANS-1705920413', 0, 'Debited 10 credits for bidding', '2024-01-22 10:46:53', '2024-01-22 10:46:53', '', '590'),
(174, 372, 0, '10.00', 'January 22, 2024 04:47:44', 'TRANS-1705920464', 0, 'Debited 10 credits for bidding', '2024-01-22 10:47:44', '2024-01-22 10:47:44', '', '580'),
(175, 372, 0, '10.00', 'January 22, 2024 22:19:52', 'TRANS-1705983592', 0, 'Debited 10 credits for bidding', '2024-01-23 04:19:52', '2024-01-23 04:19:52', '', '570'),
(176, 372, 0, '10.00', 'January 22, 2024 22:20:21', 'TRANS-1705983621', 0, 'Debited 10 credits for bidding', '2024-01-23 04:20:21', '2024-01-23 04:20:21', '', '560'),
(177, 372, 0, '10.00', 'January 22, 2024 22:20:45', 'TRANS-1705983645', 0, 'Debited 10 credits for bidding', '2024-01-23 04:20:45', '2024-01-23 04:20:45', '', '550'),
(178, 372, 0, '10.00', 'January 22, 2024 22:21:14', 'TRANS-1705983674', 0, 'Debited 10 credits for bidding', '2024-01-23 04:21:14', '2024-01-23 04:21:14', '', '540'),
(179, 373, 0, '10.00', 'January 22, 2024 22:46:12', 'TRANS-1705985172', 0, 'Debited 10 credits for bidding', '2024-01-23 04:46:12', '2024-01-23 04:46:12', '', '990'),
(180, 373, 0, '10.00', 'January 22, 2024 22:46:47', 'TRANS-1705985207', 0, 'Debited 10 credits for bidding', '2024-01-23 04:46:47', '2024-01-23 04:46:47', '', '980'),
(181, 373, 0, '10.00', 'January 22, 2024 22:47:49', 'TRANS-1705985269', 0, 'Debited 10 credits for bidding', '2024-01-23 04:47:49', '2024-01-23 04:47:49', '', '970'),
(182, 373, 0, '10.00', 'January 22, 2024 22:48:23', 'TRANS-1705985303', 0, 'Debited 10 credits for bidding', '2024-01-23 04:48:23', '2024-01-23 04:48:23', '', '960'),
(183, 373, 0, '10.00', 'January 22, 2024 22:48:57', 'TRANS-1705985337', 0, 'Debited 10 credits for bidding', '2024-01-23 04:48:57', '2024-01-23 04:48:57', '', '950'),
(184, 373, 0, '10.00', 'January 22, 2024 22:49:31', 'TRANS-1705985371', 0, 'Debited 10 credits for bidding', '2024-01-23 04:49:31', '2024-01-23 04:49:31', '', '940'),
(185, 373, 0, '10.00', 'January 22, 2024 22:49:59', 'TRANS-1705985399', 0, 'Debited 10 credits for bidding', '2024-01-23 04:49:59', '2024-01-23 04:49:59', '', '930'),
(186, 373, 0, '10.00', 'January 22, 2024 22:50:25', 'TRANS-1705985425', 0, 'Debited 10 credits for bidding', '2024-01-23 04:50:25', '2024-01-23 04:50:25', '', '920'),
(187, 373, 0, '10.00', 'January 22, 2024 22:50:54', 'TRANS-1705985454', 0, 'Debited 10 credits for bidding', '2024-01-23 04:50:54', '2024-01-23 04:50:54', '', '910'),
(188, 373, 0, '10.00', 'January 22, 2024 22:51:34', 'TRANS-1705985494', 0, 'Debited 10 credits for bidding', '2024-01-23 04:51:34', '2024-01-23 04:51:34', '', '900'),
(189, 373, 0, '10.00', 'January 22, 2024 22:53:53', 'TRANS-1705985633', 0, 'Debited 10 credits for bidding', '2024-01-23 04:53:53', '2024-01-23 04:53:53', '', '890'),
(190, 373, 0, '10.00', 'January 22, 2024 22:54:28', 'TRANS-1705985668', 0, 'Debited 10 credits for bidding', '2024-01-23 04:54:28', '2024-01-23 04:54:28', '', '880'),
(191, 373, 0, '10.00', 'January 22, 2024 22:54:58', 'TRANS-1705985698', 0, 'Debited 10 credits for bidding', '2024-01-23 04:54:58', '2024-01-23 04:54:58', '', '870'),
(192, 373, 0, '10.00', 'January 22, 2024 22:55:30', 'TRANS-1705985730', 0, 'Debited 10 credits for bidding', '2024-01-23 04:55:30', '2024-01-23 04:55:30', '', '860'),
(193, 373, 0, '10.00', 'January 22, 2024 22:55:56', 'TRANS-1705985756', 0, 'Debited 10 credits for bidding', '2024-01-23 04:55:56', '2024-01-23 04:55:56', '', '850'),
(194, 373, 0, '10.00', 'January 22, 2024 22:56:23', 'TRANS-1705985783', 0, 'Debited 10 credits for bidding', '2024-01-23 04:56:23', '2024-01-23 04:56:23', '', '840'),
(195, 373, 0, '10.00', 'January 22, 2024 22:56:52', 'TRANS-1705985812', 0, 'Debited 10 credits for bidding', '2024-01-23 04:56:52', '2024-01-23 04:56:52', '', '830'),
(196, 373, 0, '10.00', 'January 22, 2024 22:57:19', 'TRANS-1705985839', 0, 'Debited 10 credits for bidding', '2024-01-23 04:57:19', '2024-01-23 04:57:19', '', '820'),
(197, 373, 0, '10.00', 'January 22, 2024 22:58:57', 'TRANS-1705985937', 0, 'Debited 10 credits for bidding', '2024-01-23 04:58:57', '2024-01-23 04:58:57', '', '810'),
(198, 373, 0, '10.00', 'January 22, 2024 23:08:21', 'TRANS-1705986501', 0, 'Debited 10 credits for bidding', '2024-01-23 05:08:21', '2024-01-23 05:08:21', '', '800'),
(199, 373, 0, '10.00', 'January 22, 2024 23:08:43', 'TRANS-1705986523', 0, 'Debited 10 credits for bidding', '2024-01-23 05:08:43', '2024-01-23 05:08:43', '', '790'),
(200, 356, 0, '10.00', 'January 22, 2024 23:15:22', 'TRANS-1705986922', 0, 'Debited 10 credits for bidding', '2024-01-23 05:15:22', '2024-01-23 05:15:22', '', '170'),
(201, 374, 0, '10.00', 'January 26, 2024 23:11:23', 'TRANS-1706332283', 0, 'Debited 10 credits for bidding', '2024-01-27 05:11:23', '2024-01-27 05:11:23', '', '990'),
(202, 374, 0, '10.00', 'January 26, 2024 23:12:10', 'TRANS-1706332330', 0, 'Debited 10 credits for bidding', '2024-01-27 05:12:10', '2024-01-27 05:12:10', '', '980'),
(203, 374, 0, '10.00', 'January 26, 2024 23:12:52', 'TRANS-1706332372', 0, 'Debited 10 credits for bidding', '2024-01-27 05:12:52', '2024-01-27 05:12:52', '', '970'),
(204, 374, 0, '10.00', 'January 26, 2024 23:13:24', 'TRANS-1706332404', 0, 'Debited 10 credits for bidding', '2024-01-27 05:13:24', '2024-01-27 05:13:24', '', '960'),
(205, 374, 0, '10.00', 'January 26, 2024 23:14:43', 'TRANS-1706332483', 0, 'Debited 10 credits for bidding', '2024-01-27 05:14:43', '2024-01-27 05:14:43', '', '950'),
(206, 374, 0, '10.00', 'January 26, 2024 23:15:16', 'TRANS-1706332516', 0, 'Debited 10 credits for bidding', '2024-01-27 05:15:16', '2024-01-27 05:15:16', '', '940'),
(207, 374, 0, '10.00', 'January 26, 2024 23:15:49', 'TRANS-1706332549', 0, 'Debited 10 credits for bidding', '2024-01-27 05:15:49', '2024-01-27 05:15:49', '', '930'),
(208, 374, 0, '10.00', 'January 26, 2024 23:16:21', 'TRANS-1706332581', 0, 'Debited 10 credits for bidding', '2024-01-27 05:16:21', '2024-01-27 05:16:21', '', '920'),
(209, 374, 0, '10.00', 'January 26, 2024 23:16:49', 'TRANS-1706332609', 0, 'Debited 10 credits for bidding', '2024-01-27 05:16:49', '2024-01-27 05:16:49', '', '910'),
(210, 374, 0, '10.00', 'January 26, 2024 23:17:24', 'TRANS-1706332644', 0, 'Debited 10 credits for bidding', '2024-01-27 05:17:24', '2024-01-27 05:17:24', '', '900'),
(211, 374, 0, '10.00', 'January 26, 2024 23:17:59', 'TRANS-1706332679', 0, 'Debited 10 credits for bidding', '2024-01-27 05:17:59', '2024-01-27 05:17:59', '', '890'),
(212, 374, 0, '10.00', 'January 26, 2024 23:18:29', 'TRANS-1706332709', 0, 'Debited 10 credits for bidding', '2024-01-27 05:18:29', '2024-01-27 05:18:29', '', '880'),
(213, 374, 0, '10.00', 'January 26, 2024 23:18:59', 'TRANS-1706332739', 0, 'Debited 10 credits for bidding', '2024-01-27 05:18:59', '2024-01-27 05:18:59', '', '870'),
(214, 374, 0, '10.00', 'January 26, 2024 23:19:26', 'TRANS-1706332766', 0, 'Debited 10 credits for bidding', '2024-01-27 05:19:26', '2024-01-27 05:19:26', '', '860'),
(215, 374, 0, '10.00', 'January 26, 2024 23:19:53', 'TRANS-1706332793', 0, 'Debited 10 credits for bidding', '2024-01-27 05:19:53', '2024-01-27 05:19:53', '', '850'),
(216, 374, 0, '10.00', 'January 26, 2024 23:20:25', 'TRANS-1706332825', 0, 'Debited 10 credits for bidding', '2024-01-27 05:20:25', '2024-01-27 05:20:25', '', '840'),
(217, 374, 0, '10.00', 'January 26, 2024 23:20:50', 'TRANS-1706332850', 0, 'Debited 10 credits for bidding', '2024-01-27 05:20:50', '2024-01-27 05:20:50', '', '830'),
(218, 374, 0, '10.00', 'January 26, 2024 23:22:20', 'TRANS-1706332940', 0, 'Debited 10 credits for bidding', '2024-01-27 05:22:20', '2024-01-27 05:22:20', '', '820'),
(219, 374, 0, '10.00', 'January 26, 2024 23:22:45', 'TRANS-1706332965', 0, 'Debited 10 credits for bidding', '2024-01-27 05:22:45', '2024-01-27 05:22:45', '', '810'),
(220, 374, 0, '10.00', 'January 26, 2024 23:24:51', 'TRANS-1706333091', 0, 'Debited 10 credits for bidding', '2024-01-27 05:24:51', '2024-01-27 05:24:51', '', '800'),
(221, 374, 0, '10.00', 'January 26, 2024 23:25:14', 'TRANS-1706333114', 0, 'Debited 10 credits for bidding', '2024-01-27 05:25:14', '2024-01-27 05:25:14', '', '790'),
(222, 374, 0, '10.00', 'January 26, 2024 23:25:47', 'TRANS-1706333147', 0, 'Debited 10 credits for bidding', '2024-01-27 05:25:47', '2024-01-27 05:25:47', '', '780'),
(223, 374, 0, '10.00', 'January 26, 2024 23:26:11', 'TRANS-1706333171', 0, 'Debited 10 credits for bidding', '2024-01-27 05:26:11', '2024-01-27 05:26:11', '', '770'),
(224, 374, 0, '10.00', 'January 26, 2024 23:26:32', 'TRANS-1706333192', 0, 'Debited 10 credits for bidding', '2024-01-27 05:26:32', '2024-01-27 05:26:32', '', '760'),
(225, 374, 0, '10.00', 'January 26, 2024 23:26:49', 'TRANS-1706333209', 0, 'Debited 10 credits for bidding', '2024-01-27 05:26:49', '2024-01-27 05:26:49', '', '750'),
(226, 374, 0, '10.00', 'January 26, 2024 23:27:05', 'TRANS-1706333225', 0, 'Debited 10 credits for bidding', '2024-01-27 05:27:05', '2024-01-27 05:27:05', '', '740'),
(227, 374, 0, '10.00', 'January 26, 2024 23:27:20', 'TRANS-1706333240', 0, 'Debited 10 credits for bidding', '2024-01-27 05:27:20', '2024-01-27 05:27:20', '', '730'),
(228, 375, 0, '10.00', 'January 26, 2024 23:36:01', 'TRANS-1706333761', 0, 'Debited 10 credits for bidding', '2024-01-27 05:36:01', '2024-01-27 05:36:01', '', '990'),
(229, 375, 0, '10.00', 'January 26, 2024 23:36:27', 'TRANS-1706333787', 0, 'Debited 10 credits for bidding', '2024-01-27 05:36:27', '2024-01-27 05:36:27', '', '980'),
(230, 375, 0, '10.00', 'January 26, 2024 23:37:32', 'TRANS-1706333852', 0, 'Debited 10 credits for bidding', '2024-01-27 05:37:32', '2024-01-27 05:37:32', '', '970'),
(231, 375, 0, '10.00', 'January 26, 2024 23:38:01', 'TRANS-1706333881', 0, 'Debited 10 credits for bidding', '2024-01-27 05:38:01', '2024-01-27 05:38:01', '', '960'),
(232, 375, 0, '10.00', 'January 26, 2024 23:38:28', 'TRANS-1706333908', 0, 'Debited 10 credits for bidding', '2024-01-27 05:38:28', '2024-01-27 05:38:28', '', '950'),
(233, 375, 0, '10.00', 'January 26, 2024 23:38:58', 'TRANS-1706333938', 0, 'Debited 10 credits for bidding', '2024-01-27 05:38:58', '2024-01-27 05:38:58', '', '940'),
(234, 375, 0, '10.00', 'January 26, 2024 23:39:30', 'TRANS-1706333970', 0, 'Debited 10 credits for bidding', '2024-01-27 05:39:30', '2024-01-27 05:39:30', '', '930'),
(235, 375, 0, '10.00', 'January 26, 2024 23:39:58', 'TRANS-1706333998', 0, 'Debited 10 credits for bidding', '2024-01-27 05:39:58', '2024-01-27 05:39:58', '', '920'),
(236, 375, 0, '10.00', 'January 26, 2024 23:40:23', 'TRANS-1706334023', 0, 'Debited 10 credits for bidding', '2024-01-27 05:40:23', '2024-01-27 05:40:23', '', '910'),
(237, 375, 0, '10.00', 'January 26, 2024 23:41:02', 'TRANS-1706334062', 0, 'Debited 10 credits for bidding', '2024-01-27 05:41:02', '2024-01-27 05:41:02', '', '900'),
(238, 375, 0, '10.00', 'January 26, 2024 23:41:42', 'TRANS-1706334102', 0, 'Debited 10 credits for bidding', '2024-01-27 05:41:42', '2024-01-27 05:41:42', '', '890'),
(239, 375, 0, '10.00', 'January 26, 2024 23:42:05', 'TRANS-1706334125', 0, 'Debited 10 credits for bidding', '2024-01-27 05:42:05', '2024-01-27 05:42:05', '', '880'),
(240, 375, 0, '10.00', 'January 26, 2024 23:42:32', 'TRANS-1706334152', 0, 'Debited 10 credits for bidding', '2024-01-27 05:42:32', '2024-01-27 05:42:32', '', '870'),
(241, 375, 0, '10.00', 'January 26, 2024 23:42:54', 'TRANS-1706334174', 0, 'Debited 10 credits for bidding', '2024-01-27 05:42:54', '2024-01-27 05:42:54', '', '860'),
(242, 375, 0, '10.00', 'January 26, 2024 23:43:14', 'TRANS-1706334194', 0, 'Debited 10 credits for bidding', '2024-01-27 05:43:14', '2024-01-27 05:43:14', '', '850'),
(243, 375, 0, '10.00', 'January 26, 2024 23:43:40', 'TRANS-1706334220', 0, 'Debited 10 credits for bidding', '2024-01-27 05:43:40', '2024-01-27 05:43:40', '', '840'),
(244, 375, 0, '10.00', 'January 26, 2024 23:44:18', 'TRANS-1706334258', 0, 'Debited 10 credits for bidding', '2024-01-27 05:44:18', '2024-01-27 05:44:18', '', '830'),
(245, 375, 0, '10.00', 'January 26, 2024 23:44:55', 'TRANS-1706334295', 0, 'Debited 10 credits for bidding', '2024-01-27 05:44:55', '2024-01-27 05:44:55', '', '820'),
(246, 375, 0, '10.00', 'January 26, 2024 23:45:17', 'TRANS-1706334317', 0, 'Debited 10 credits for bidding', '2024-01-27 05:45:17', '2024-01-27 05:45:17', '', '810'),
(247, 375, 0, '10.00', 'January 26, 2024 23:45:34', 'TRANS-1706334334', 0, 'Debited 10 credits for bidding', '2024-01-27 05:45:34', '2024-01-27 05:45:34', '', '800'),
(248, 375, 0, '10.00', 'January 26, 2024 23:45:53', 'TRANS-1706334353', 0, 'Debited 10 credits for bidding', '2024-01-27 05:45:53', '2024-01-27 05:45:53', '', '790'),
(249, 375, 0, '10.00', 'January 26, 2024 23:46:18', 'TRANS-1706334378', 0, 'Debited 10 credits for bidding', '2024-01-27 05:46:18', '2024-01-27 05:46:18', '', '780'),
(250, 375, 0, '10.00', 'January 26, 2024 23:46:40', 'TRANS-1706334400', 0, 'Debited 10 credits for bidding', '2024-01-27 05:46:40', '2024-01-27 05:46:40', '', '770'),
(251, 376, 0, '10.00', 'January 26, 2024 23:51:39', 'TRANS-1706334699', 0, 'Debited 10 credits for bidding', '2024-01-27 05:51:39', '2024-01-27 05:51:39', '', '990'),
(252, 376, 0, '10.00', 'January 26, 2024 23:52:16', 'TRANS-1706334736', 0, 'Debited 10 credits for bidding', '2024-01-27 05:52:16', '2024-01-27 05:52:16', '', '980'),
(253, 376, 0, '10.00', 'January 26, 2024 23:52:46', 'TRANS-1706334766', 0, 'Debited 10 credits for bidding', '2024-01-27 05:52:46', '2024-01-27 05:52:46', '', '970'),
(254, 376, 0, '10.00', 'January 26, 2024 23:53:18', 'TRANS-1706334798', 0, 'Debited 10 credits for bidding', '2024-01-27 05:53:18', '2024-01-27 05:53:18', '', '960'),
(255, 376, 0, '10.00', 'January 26, 2024 23:53:49', 'TRANS-1706334829', 0, 'Debited 10 credits for bidding', '2024-01-27 05:53:49', '2024-01-27 05:53:49', '', '950'),
(256, 376, 0, '10.00', 'January 26, 2024 23:54:29', 'TRANS-1706334869', 0, 'Debited 10 credits for bidding', '2024-01-27 05:54:29', '2024-01-27 05:54:29', '', '940'),
(257, 376, 0, '10.00', 'January 26, 2024 23:55:00', 'TRANS-1706334900', 0, 'Debited 10 credits for bidding', '2024-01-27 05:55:00', '2024-01-27 05:55:00', '', '930'),
(258, 376, 0, '10.00', 'January 26, 2024 23:55:30', 'TRANS-1706334930', 0, 'Debited 10 credits for bidding', '2024-01-27 05:55:30', '2024-01-27 05:55:30', '', '920'),
(259, 376, 0, '10.00', 'January 26, 2024 23:55:57', 'TRANS-1706334957', 0, 'Debited 10 credits for bidding', '2024-01-27 05:55:57', '2024-01-27 05:55:57', '', '910'),
(260, 376, 0, '10.00', 'January 26, 2024 23:56:18', 'TRANS-1706334978', 0, 'Debited 10 credits for bidding', '2024-01-27 05:56:18', '2024-01-27 05:56:18', '', '900'),
(261, 376, 0, '10.00', 'January 26, 2024 23:56:39', 'TRANS-1706334999', 0, 'Debited 10 credits for bidding', '2024-01-27 05:56:39', '2024-01-27 05:56:39', '', '890'),
(262, 376, 0, '10.00', 'January 26, 2024 23:57:03', 'TRANS-1706335023', 0, 'Debited 10 credits for bidding', '2024-01-27 05:57:03', '2024-01-27 05:57:03', '', '880'),
(263, 376, 0, '10.00', 'January 26, 2024 23:57:27', 'TRANS-1706335047', 0, 'Debited 10 credits for bidding', '2024-01-27 05:57:27', '2024-01-27 05:57:27', '', '870'),
(264, 376, 0, '10.00', 'January 26, 2024 23:57:45', 'TRANS-1706335065', 0, 'Debited 10 credits for bidding', '2024-01-27 05:57:45', '2024-01-27 05:57:45', '', '860'),
(265, 376, 0, '10.00', 'January 26, 2024 23:58:08', 'TRANS-1706335088', 0, 'Debited 10 credits for bidding', '2024-01-27 05:58:08', '2024-01-27 05:58:08', '', '850'),
(266, 376, 0, '10.00', 'January 26, 2024 23:58:30', 'TRANS-1706335110', 0, 'Debited 10 credits for bidding', '2024-01-27 05:58:30', '2024-01-27 05:58:30', '', '840'),
(267, 376, 0, '10.00', 'January 26, 2024 23:59:32', 'TRANS-1706335172', 0, 'Debited 10 credits for bidding', '2024-01-27 05:59:32', '2024-01-27 05:59:32', '', '830'),
(268, 376, 0, '10.00', 'January 26, 2024 23:59:56', 'TRANS-1706335196', 0, 'Debited 10 credits for bidding', '2024-01-27 05:59:56', '2024-01-27 05:59:56', '', '820'),
(269, 376, 0, '10.00', 'January 27, 2024 00:00:16', 'TRANS-1706335216', 0, 'Debited 10 credits for bidding', '2024-01-27 06:00:16', '2024-01-27 06:00:16', '', '810'),
(270, 376, 0, '10.00', 'January 27, 2024 00:00:50', 'TRANS-1706335250', 0, 'Debited 10 credits for bidding', '2024-01-27 06:00:50', '2024-01-27 06:00:50', '', '800'),
(271, 372, 0, '10.00', 'January 27, 2024 00:13:38', 'TRANS-1706336018', 0, 'Debited 10 credits for bidding', '2024-01-27 06:13:38', '2024-01-27 06:13:38', '', '530'),
(272, 372, 0, '10.00', 'January 27, 2024 00:14:59', 'TRANS-1706336099', 0, 'Debited 10 credits for bidding', '2024-01-27 06:14:59', '2024-01-27 06:14:59', '', '520'),
(273, 372, 0, '10.00', 'January 27, 2024 00:16:27', 'TRANS-1706336187', 0, 'Debited 10 credits for bidding', '2024-01-27 06:16:27', '2024-01-27 06:16:27', '', '510'),
(274, 372, 0, '10.00', 'January 27, 2024 00:17:22', 'TRANS-1706336242', 0, 'Debited 10 credits for bidding', '2024-01-27 06:17:22', '2024-01-27 06:17:22', '', '500'),
(275, 372, 0, '10.00', 'January 27, 2024 00:19:12', 'TRANS-1706336352', 0, 'Debited 10 credits for bidding', '2024-01-27 06:19:12', '2024-01-27 06:19:12', '', '490'),
(276, 372, 0, '10.00', 'January 27, 2024 00:26:16', 'TRANS-1706336776', 0, 'Debited 10 credits for bidding', '2024-01-27 06:26:16', '2024-01-27 06:26:16', '', '480'),
(277, 372, 0, '10.00', 'January 27, 2024 00:32:38', 'TRANS-1706337158', 0, 'Debited 10 credits for bidding', '2024-01-27 06:32:38', '2024-01-27 06:32:38', '', '470'),
(278, 374, 0, '10.00', 'January 27, 2024 00:41:32', 'TRANS-1706337692', 0, 'Debited 10 credits for bidding', '2024-01-27 06:41:32', '2024-01-27 06:41:32', '', '720'),
(279, 375, 0, '10.00', 'January 27, 2024 01:23:30', 'TRANS-1706340210', 0, 'Debited 10 credits for bidding', '2024-01-27 07:23:30', '2024-01-27 07:23:30', '', '760'),
(280, 413, 0, '10.00', 'January 31, 2024 02:15:51', 'TRANS-1706688951', 0, 'Debited 10 credits for bidding', '2024-01-31 08:15:51', '2024-01-31 08:15:51', '', '0'),
(281, 372, 0, '10.00', 'January 31, 2024 02:22:37', 'TRANS-1706689357', 0, 'Debited 10 credits for bidding', '2024-01-31 08:22:37', '2024-01-31 08:22:37', '', '460'),
(282, 372, 0, '10.00', 'January 31, 2024 02:23:55', 'TRANS-1706689435', 0, 'Debited 10 credits for bidding', '2024-01-31 08:23:55', '2024-01-31 08:23:55', '', '450'),
(283, 373, 0, '10.00', 'February 2, 2024 00:32:26', 'TRANS-1706855546', 0, 'Debited 10 credits for bidding', '2024-02-02 06:32:26', '2024-02-02 06:32:26', '', '780'),
(284, 374, 0, '10.00', 'February 2, 2024 00:33:45', 'TRANS-1706855625', 0, 'Debited 10 credits for bidding', '2024-02-02 06:33:45', '2024-02-02 06:33:45', '', '710'),
(285, 375, 0, '10.00', 'February 2, 2024 00:34:39', 'TRANS-1706855679', 0, 'Debited 10 credits for bidding', '2024-02-02 06:34:39', '2024-02-02 06:34:39', '', '750'),
(286, 376, 0, '10.00', 'February 2, 2024 00:35:38', 'TRANS-1706855738', 0, 'Debited 10 credits for bidding', '2024-02-02 06:35:38', '2024-02-02 06:35:38', '', '790'),
(287, 373, 0, '10.00', 'February 2, 2024 00:40:21', 'TRANS-1706856021', 0, 'Debited 10 credits for bidding', '2024-02-02 06:40:21', '2024-02-02 06:40:21', '', '770'),
(288, 374, 0, '10.00', 'February 2, 2024 00:41:03', 'TRANS-1706856063', 0, 'Debited 10 credits for bidding', '2024-02-02 06:41:03', '2024-02-02 06:41:03', '', '700'),
(289, 372, 0, '10.00', 'February 2, 2024 00:42:28', 'TRANS-1706856148', 0, 'Debited 10 credits for bidding', '2024-02-02 06:42:28', '2024-02-02 06:42:28', '', '440'),
(290, 373, 0, '10.00', 'February 2, 2024 00:43:34', 'TRANS-1706856214', 0, 'Debited 10 credits for bidding', '2024-02-02 06:43:34', '2024-02-02 06:43:34', '', '760'),
(291, 374, 0, '10.00', 'February 2, 2024 00:44:24', 'TRANS-1706856264', 0, 'Debited 10 credits for bidding', '2024-02-02 06:44:24', '2024-02-02 06:44:24', '', '690'),
(292, 375, 0, '10.00', 'February 2, 2024 00:45:13', 'TRANS-1706856313', 0, 'Debited 10 credits for bidding', '2024-02-02 06:45:13', '2024-02-02 06:45:13', '', '740'),
(293, 376, 0, '10.00', 'February 2, 2024 00:46:12', 'TRANS-1706856372', 0, 'Debited 10 credits for bidding', '2024-02-02 06:46:12', '2024-02-02 06:46:12', '', '780'),
(294, 373, 0, '10.00', 'February 2, 2024 01:04:53', 'TRANS-1706857493', 0, 'Debited 10 credits for bidding', '2024-02-02 07:04:53', '2024-02-02 07:04:53', '', '750'),
(295, 372, 0, '10.00', 'February 2, 2024 01:06:04', 'TRANS-1706857564', 0, 'Debited 10 credits for bidding', '2024-02-02 07:06:04', '2024-02-02 07:06:04', '', '430'),
(296, 373, 0, '10.00', 'February 2, 2024 01:07:19', 'TRANS-1706857639', 0, 'Debited 10 credits for bidding', '2024-02-02 07:07:19', '2024-02-02 07:07:19', '', '740'),
(297, 372, 0, '10.00', 'February 2, 2024 01:08:23', 'TRANS-1706857703', 0, 'Debited 10 credits for bidding', '2024-02-02 07:08:23', '2024-02-02 07:08:23', '', '420'),
(298, 373, 0, '10.00', 'February 2, 2024 01:09:43', 'TRANS-1706857783', 0, 'Debited 10 credits for bidding', '2024-02-02 07:09:43', '2024-02-02 07:09:43', '', '730'),
(299, 372, 0, '10.00', 'February 2, 2024 01:10:24', 'TRANS-1706857824', 0, 'Debited 10 credits for bidding', '2024-02-02 07:10:24', '2024-02-02 07:10:24', '', '410'),
(300, 377, 0, '10.00', 'February 2, 2024 04:10:11', 'TRANS-1706868611', 0, 'Debited 10 credits for bidding', '2024-02-02 10:10:11', '2024-02-02 10:10:11', '', '990'),
(301, 378, 0, '10.00', 'February 2, 2024 04:11:34', 'TRANS-1706868694', 0, 'Debited 10 credits for bidding', '2024-02-02 10:11:34', '2024-02-02 10:11:34', '', '990'),
(302, 377, 0, '10.00', 'February 2, 2024 04:13:27', 'TRANS-1706868807', 0, 'Debited 10 credits for bidding', '2024-02-02 10:13:27', '2024-02-02 10:13:27', '', '980'),
(303, 377, 0, '10.00', 'February 2, 2024 04:16:03', 'TRANS-1706868963', 0, 'Debited 10 credits for bidding', '2024-02-02 10:16:03', '2024-02-02 10:16:03', '', '970'),
(304, 377, 0, '10.00', 'February 2, 2024 04:18:38', 'TRANS-1706869118', 0, 'Debited 10 credits for bidding', '2024-02-02 10:18:38', '2024-02-02 10:18:38', '', '960'),
(305, 377, 0, '10.00', 'February 2, 2024 04:19:29', 'TRANS-1706869169', 0, 'Debited 10 credits for bidding', '2024-02-02 10:19:29', '2024-02-02 10:19:29', '', '950'),
(306, 377, 0, '10.00', 'February 2, 2024 04:20:30', 'TRANS-1706869230', 0, 'Debited 10 credits for bidding', '2024-02-02 10:20:30', '2024-02-02 10:20:30', '', '940'),
(307, 378, 0, '10.00', 'February 2, 2024 04:22:04', 'TRANS-1706869324', 0, 'Debited 10 credits for bidding', '2024-02-02 10:22:04', '2024-02-02 10:22:04', '', '980'),
(308, 378, 0, '10.00', 'February 2, 2024 04:23:05', 'TRANS-1706869385', 0, 'Debited 10 credits for bidding', '2024-02-02 10:23:05', '2024-02-02 10:23:05', '', '970'),
(309, 378, 0, '10.00', 'February 2, 2024 04:24:58', 'TRANS-1706869498', 0, 'Debited 10 credits for bidding', '2024-02-02 10:24:58', '2024-02-02 10:24:58', '', '960'),
(310, 378, 0, '10.00', 'February 2, 2024 04:26:02', 'TRANS-1706869562', 0, 'Debited 10 credits for bidding', '2024-02-02 10:26:02', '2024-02-02 10:26:02', '', '950'),
(311, 379, 0, '10.00', 'February 2, 2024 04:27:48', 'TRANS-1706869668', 0, 'Debited 10 credits for bidding', '2024-02-02 10:27:48', '2024-02-02 10:27:48', '', '990'),
(312, 379, 0, '10.00', 'February 2, 2024 04:28:42', 'TRANS-1706869722', 0, 'Debited 10 credits for bidding', '2024-02-02 10:28:42', '2024-02-02 10:28:42', '', '980'),
(313, 379, 0, '10.00', 'February 2, 2024 04:30:21', 'TRANS-1706869821', 0, 'Debited 10 credits for bidding', '2024-02-02 10:30:21', '2024-02-02 10:30:21', '', '970'),
(314, 380, 0, '10.00', 'February 2, 2024 04:31:56', 'TRANS-1706869916', 0, 'Debited 10 credits for bidding', '2024-02-02 10:31:56', '2024-02-02 10:31:56', '', '990'),
(315, 380, 0, '10.00', 'February 2, 2024 04:32:52', 'TRANS-1706869972', 0, 'Debited 10 credits for bidding', '2024-02-02 10:32:52', '2024-02-02 10:32:52', '', '980'),
(316, 380, 0, '10.00', 'February 2, 2024 04:34:12', 'TRANS-1706870052', 0, 'Debited 10 credits for bidding', '2024-02-02 10:34:12', '2024-02-02 10:34:12', '', '970'),
(317, 377, 0, '10.00', 'February 2, 2024 04:39:50', 'TRANS-1706870390', 0, 'Debited 10 credits for bidding', '2024-02-02 10:39:50', '2024-02-02 10:39:50', '', '930'),
(318, 378, 0, '10.00', 'February 2, 2024 04:41:19', 'TRANS-1706870479', 0, 'Debited 10 credits for bidding', '2024-02-02 10:41:19', '2024-02-02 10:41:19', '', '940'),
(319, 379, 0, '10.00', 'February 2, 2024 04:42:19', 'TRANS-1706870539', 0, 'Debited 10 credits for bidding', '2024-02-02 10:42:19', '2024-02-02 10:42:19', '', '960'),
(320, 382, 0, '10.00', 'February 3, 2024 03:59:47', 'TRANS-1706954387', 0, 'Debited 10 credits for bidding', '2024-02-03 09:59:47', '2024-02-03 09:59:47', '', '990'),
(321, 382, 0, '10.00', 'February 3, 2024 04:00:36', 'TRANS-1706954436', 0, 'Debited 10 credits for bidding', '2024-02-03 10:00:36', '2024-02-03 10:00:36', '', '980'),
(322, 382, 0, '10.00', 'February 3, 2024 04:01:29', 'TRANS-1706954489', 0, 'Debited 10 credits for bidding', '2024-02-03 10:01:29', '2024-02-03 10:01:29', '', '970'),
(323, 383, 0, '10.00', 'February 3, 2024 04:03:02', 'TRANS-1706954582', 0, 'Debited 10 credits for bidding', '2024-02-03 10:03:02', '2024-02-03 10:03:02', '', '990'),
(324, 383, 0, '10.00', 'February 3, 2024 04:03:59', 'TRANS-1706954639', 0, 'Debited 10 credits for bidding', '2024-02-03 10:03:59', '2024-02-03 10:03:59', '', '980'),
(325, 383, 0, '10.00', 'February 3, 2024 04:05:12', 'TRANS-1706954712', 0, 'Debited 10 credits for bidding', '2024-02-03 10:05:12', '2024-02-03 10:05:12', '', '970'),
(326, 440, 0, '10.00', 'February 3, 2024 15:40:34', 'TRANS-1706996434', 0, 'Debited 10 credits for bidding', '2024-02-03 21:40:34', '2024-02-03 21:40:34', '', '40'),
(327, 386, 0, '10.00', 'February 5, 2024 04:10:00', 'TRANS-1707127800', 0, 'Debited 10 credits for bidding', '2024-02-05 10:10:00', '2024-02-05 10:10:00', '', '990'),
(328, 386, 0, '10.00', 'February 5, 2024 04:11:18', 'TRANS-1707127878', 0, 'Debited 10 credits for bidding', '2024-02-05 10:11:18', '2024-02-05 10:11:18', '', '980'),
(329, 385, 0, '10.00', 'February 5, 2024 04:13:37', 'TRANS-1707128017', 0, 'Debited 10 credits for bidding', '2024-02-05 10:13:37', '2024-02-05 10:13:37', '', '990'),
(330, 385, 0, '10.00', 'February 5, 2024 04:14:27', 'TRANS-1707128067', 0, 'Debited 10 credits for bidding', '2024-02-05 10:14:27', '2024-02-05 10:14:27', '', '980'),
(331, 383, 0, '10.00', 'February 5, 2024 04:58:33', 'TRANS-1707130713', 0, 'Debited 10 credits for bidding', '2024-02-05 10:58:33', '2024-02-05 10:58:33', '', '960');
INSERT INTO `transaction_history` (`id`, `user_id`, `transaction_type`, `amount`, `transaction_date`, `transaction_id`, `target_id`, `remark`, `created_at`, `updated_at`, `payment_id`, `closing`) VALUES
(332, 384, 0, '10.00', 'February 5, 2024 04:59:28', 'TRANS-1707130768', 0, 'Debited 10 credits for bidding', '2024-02-05 10:59:28', '2024-02-05 10:59:28', '', '990'),
(333, 377, 0, '10.00', 'February 5, 2024 23:46:56', 'TRANS-1707198416', 0, 'Debited 10 credits for bidding', '2024-02-06 05:46:56', '2024-02-06 05:46:56', '', '920'),
(334, 380, 0, '10.00', 'February 5, 2024 23:48:05', 'TRANS-1707198485', 0, 'Debited 10 credits for bidding', '2024-02-06 05:48:05', '2024-02-06 05:48:05', '', '960'),
(335, 381, 0, '10.00', 'February 5, 2024 23:49:30', 'TRANS-1707198570', 0, 'Debited 10 credits for bidding', '2024-02-06 05:49:30', '2024-02-06 05:49:30', '', '990'),
(336, 384, 0, '10.00', 'February 5, 2024 23:51:44', 'TRANS-1707198704', 0, 'Debited 10 credits for bidding', '2024-02-06 05:51:44', '2024-02-06 05:51:44', '', '980'),
(337, 386, 0, '10.00', 'February 6, 2024 00:31:13', 'TRANS-1707201073', 0, 'Debited 10 credits for bidding', '2024-02-06 06:31:13', '2024-02-06 06:31:13', '', '970'),
(338, 386, 0, '10.00', 'February 6, 2024 00:32:14', 'TRANS-1707201134', 0, 'Debited 10 credits for bidding', '2024-02-06 06:32:14', '2024-02-06 06:32:14', '', '960'),
(339, 386, 0, '10.00', 'February 6, 2024 03:51:43', 'TRANS-1707213103', 0, 'Debited 10 credits for bidding', '2024-02-06 09:51:43', '2024-02-06 09:51:43', '', '950'),
(340, 386, 0, '10.00', 'February 6, 2024 03:52:45', 'TRANS-1707213165', 0, 'Debited 10 credits for bidding', '2024-02-06 09:52:45', '2024-02-06 09:52:45', '', '940'),
(341, 378, 0, '10.00', 'February 6, 2024 03:54:50', 'TRANS-1707213290', 0, 'Debited 10 credits for bidding', '2024-02-06 09:54:50', '2024-02-06 09:54:50', '', '930'),
(342, 378, 0, '10.00', 'February 6, 2024 03:56:03', 'TRANS-1707213363', 0, 'Debited 10 credits for bidding', '2024-02-06 09:56:03', '2024-02-06 09:56:03', '', '920'),
(343, 378, 0, '10.00', 'February 6, 2024 03:56:54', 'TRANS-1707213414', 0, 'Debited 10 credits for bidding', '2024-02-06 09:56:54', '2024-02-06 09:56:54', '', '910'),
(344, 378, 0, '10.00', 'February 6, 2024 03:57:37', 'TRANS-1707213457', 0, 'Debited 10 credits for bidding', '2024-02-06 09:57:37', '2024-02-06 09:57:37', '', '900'),
(345, 378, 0, '10.00', 'February 6, 2024 03:58:26', 'TRANS-1707213506', 0, 'Debited 10 credits for bidding', '2024-02-06 09:58:26', '2024-02-06 09:58:26', '', '890'),
(346, 378, 0, '10.00', 'February 6, 2024 03:59:51', 'TRANS-1707213591', 0, 'Debited 10 credits for bidding', '2024-02-06 09:59:51', '2024-02-06 09:59:51', '', '880'),
(347, 379, 0, '10.00', 'February 6, 2024 04:01:09', 'TRANS-1707213669', 0, 'Debited 10 credits for bidding', '2024-02-06 10:01:09', '2024-02-06 10:01:09', '', '950'),
(348, 379, 0, '10.00', 'February 6, 2024 04:01:59', 'TRANS-1707213719', 0, 'Debited 10 credits for bidding', '2024-02-06 10:01:59', '2024-02-06 10:01:59', '', '940'),
(349, 379, 0, '10.00', 'February 6, 2024 04:02:48', 'TRANS-1707213768', 0, 'Debited 10 credits for bidding', '2024-02-06 10:02:48', '2024-02-06 10:02:48', '', '930'),
(350, 382, 0, '10.00', 'February 6, 2024 04:04:02', 'TRANS-1707213842', 0, 'Debited 10 credits for bidding', '2024-02-06 10:04:02', '2024-02-06 10:04:02', '', '960'),
(351, 382, 0, '10.00', 'February 6, 2024 04:04:48', 'TRANS-1707213888', 0, 'Debited 10 credits for bidding', '2024-02-06 10:04:48', '2024-02-06 10:04:48', '', '950'),
(352, 382, 0, '10.00', 'February 6, 2024 04:05:22', 'TRANS-1707213922', 0, 'Debited 10 credits for bidding', '2024-02-06 10:05:22', '2024-02-06 10:05:22', '', '940'),
(353, 377, 0, '10.00', 'February 6, 2024 07:00:23', 'TRANS-1707224423', 0, 'Debited 10 credits for bidding', '2024-02-06 13:00:23', '2024-02-06 13:00:23', '', '910'),
(354, 380, 0, '10.00', 'February 6, 2024 07:01:28', 'TRANS-1707224488', 0, 'Debited 10 credits for bidding', '2024-02-06 13:01:28', '2024-02-06 13:01:28', '', '950'),
(355, 381, 0, '10.00', 'February 6, 2024 07:02:32', 'TRANS-1707224552', 0, 'Debited 10 credits for bidding', '2024-02-06 13:02:32', '2024-02-06 13:02:32', '', '980'),
(356, 382, 0, '10.00', 'February 7, 2024 03:52:44', 'TRANS-1707299564', 0, 'Debited 10 credits for bidding', '2024-02-07 09:52:44', '2024-02-07 09:52:44', '', '930'),
(357, 382, 0, '10.00', 'February 7, 2024 03:53:25', 'TRANS-1707299605', 0, 'Debited 10 credits for bidding', '2024-02-07 09:53:25', '2024-02-07 09:53:25', '', '920'),
(358, 379, 0, '10.00', 'February 7, 2024 03:54:21', 'TRANS-1707299661', 0, 'Debited 10 credits for bidding', '2024-02-07 09:54:21', '2024-02-07 09:54:21', '', '920'),
(359, 379, 0, '10.00', 'February 7, 2024 03:54:54', 'TRANS-1707299694', 0, 'Debited 10 credits for bidding', '2024-02-07 09:54:54', '2024-02-07 09:54:54', '', '910'),
(360, 378, 0, '10.00', 'February 7, 2024 03:55:59', 'TRANS-1707299759', 0, 'Debited 10 credits for bidding', '2024-02-07 09:55:59', '2024-02-07 09:55:59', '', '870'),
(361, 376, 0, '10.00', 'February 8, 2024 01:09:48', 'TRANS-1707376188', 0, 'Debited 10 credits for bidding', '2024-02-08 07:09:48', '2024-02-08 07:09:48', '', '770'),
(362, 375, 0, '10.00', 'February 8, 2024 01:11:01', 'TRANS-1707376261', 0, 'Debited 10 credits for bidding', '2024-02-08 07:11:01', '2024-02-08 07:11:01', '', '730'),
(363, 373, 0, '10.00', 'February 8, 2024 03:06:18', 'TRANS-1707383178', 0, 'Debited 10 credits for bidding', '2024-02-08 09:06:18', '2024-02-08 09:06:18', '', '720'),
(364, 373, 0, '10.00', 'February 8, 2024 03:07:07', 'TRANS-1707383227', 0, 'Debited 10 credits for bidding', '2024-02-08 09:07:07', '2024-02-08 09:07:07', '', '710'),
(365, 373, 0, '10.00', 'February 8, 2024 03:07:50', 'TRANS-1707383270', 0, 'Debited 10 credits for bidding', '2024-02-08 09:07:50', '2024-02-08 09:07:50', '', '700'),
(366, 372, 0, '10.00', 'February 8, 2024 03:08:54', 'TRANS-1707383334', 0, 'Debited 10 credits for bidding', '2024-02-08 09:08:54', '2024-02-08 09:08:54', '', '400'),
(367, 372, 0, '10.00', 'February 8, 2024 03:10:29', 'TRANS-1707383429', 0, 'Debited 10 credits for bidding', '2024-02-08 09:10:29', '2024-02-08 09:10:29', '', '390'),
(368, 372, 0, '10.00', 'February 8, 2024 03:11:13', 'TRANS-1707383473', 0, 'Debited 10 credits for bidding', '2024-02-08 09:11:13', '2024-02-08 09:11:13', '', '380'),
(369, 382, 0, '10.00', 'February 8, 2024 03:16:51', 'TRANS-1707383811', 0, 'Debited 10 credits for bidding', '2024-02-08 09:16:51', '2024-02-08 09:16:51', '', '910'),
(370, 382, 0, '10.00', 'February 8, 2024 03:18:28', 'TRANS-1707383908', 0, 'Debited 10 credits for bidding', '2024-02-08 09:18:28', '2024-02-08 09:18:28', '', '900'),
(371, 382, 0, '10.00', 'February 8, 2024 03:20:08', 'TRANS-1707384008', 0, 'Debited 10 credits for bidding', '2024-02-08 09:20:08', '2024-02-08 09:20:08', '', '890'),
(372, 379, 0, '10.00', 'February 8, 2024 03:21:27', 'TRANS-1707384087', 0, 'Debited 10 credits for bidding', '2024-02-08 09:21:27', '2024-02-08 09:21:27', '', '900'),
(373, 379, 0, '10.00', 'February 8, 2024 03:22:19', 'TRANS-1707384139', 0, 'Debited 10 credits for bidding', '2024-02-08 09:22:19', '2024-02-08 09:22:19', '', '890'),
(374, 379, 0, '10.00', 'February 8, 2024 03:23:15', 'TRANS-1707384195', 0, 'Debited 10 credits for bidding', '2024-02-08 09:23:15', '2024-02-08 09:23:15', '', '880'),
(375, 366, 0, '10.00', 'February 8, 2024 05:31:07', 'TRANS-1707391867', 0, 'Debited 10 credits for bidding', '2024-02-08 11:31:07', '2024-02-08 11:31:07', '', '990'),
(376, 367, 0, '10.00', 'February 8, 2024 05:32:01', 'TRANS-1707391921', 0, 'Debited 10 credits for bidding', '2024-02-08 11:32:01', '2024-02-08 11:32:01', '', '990'),
(377, 369, 0, '10.00', 'February 8, 2024 05:32:39', 'TRANS-1707391959', 0, 'Debited 10 credits for bidding', '2024-02-08 11:32:39', '2024-02-08 11:32:39', '', '990'),
(378, 379, 0, '10.00', 'February 8, 2024 05:33:37', 'TRANS-1707392017', 0, 'Debited 10 credits for bidding', '2024-02-08 11:33:37', '2024-02-08 11:33:37', '', '870'),
(379, 371, 0, '10.00', 'February 8, 2024 05:34:20', 'TRANS-1707392060', 0, 'Debited 10 credits for bidding', '2024-02-08 11:34:20', '2024-02-08 11:34:20', '', '990'),
(380, 367, 0, '10.00', 'February 8, 2024 23:04:21', 'TRANS-1707455061', 0, 'Debited 10 credits for bidding', '2024-02-09 05:04:21', '2024-02-09 05:04:21', '', '980'),
(381, 383, 0, '10.00', 'February 8, 2024 23:05:28', 'TRANS-1707455128', 0, 'Debited 10 credits for bidding', '2024-02-09 05:05:28', '2024-02-09 05:05:28', '', '950'),
(382, 385, 0, '10.00', 'February 8, 2024 23:06:11', 'TRANS-1707455171', 0, 'Debited 10 credits for bidding', '2024-02-09 05:06:11', '2024-02-09 05:06:11', '', '970'),
(383, 369, 0, '10.00', 'February 8, 2024 23:07:19', 'TRANS-1707455239', 0, 'Debited 10 credits for bidding', '2024-02-09 05:07:19', '2024-02-09 05:07:19', '', '980'),
(384, 366, 0, '10.00', 'February 8, 2024 23:37:46', 'TRANS-1707457066', 0, 'Debited 10 credits for bidding', '2024-02-09 05:37:46', '2024-02-09 05:37:46', '', '980'),
(385, 386, 0, '10.00', 'February 8, 2024 23:38:56', 'TRANS-1707457136', 0, 'Debited 10 credits for bidding', '2024-02-09 05:38:56', '2024-02-09 05:38:56', '', '930'),
(386, 370, 0, '10.00', 'February 8, 2024 23:40:00', 'TRANS-1707457200', 0, 'Debited 10 credits for bidding', '2024-02-09 05:40:00', '2024-02-09 05:40:00', '', '990'),
(387, 446, 0, '10.00', 'February 17, 2024 04:36:06', 'TRANS-1708166166', 0, 'Debited 10 credits for bidding', '2024-02-17 10:36:06', '2024-02-17 10:36:06', '', '40'),
(388, 413, 0, '10.00', 'February 17, 2024 06:46:09', 'TRANS-1708173969', 0, 'Debited 10 credits for bidding', '2024-02-17 12:46:09', '2024-02-17 12:46:09', '', '40'),
(389, 413, 0, '10.00', 'February 17, 2024 06:47:08', 'TRANS-1708174028', 0, 'Debited 10 credits for bidding', '2024-02-17 12:47:08', '2024-02-17 12:47:08', '', '30'),
(390, 447, 0, '10.00', 'February 17, 2024 07:13:37', 'TRANS-1708175617', 0, 'Debited 10 credits for bidding', '2024-02-17 13:13:37', '2024-02-17 13:13:37', '', '40'),
(391, 449, 0, '10.00', 'February 19, 2024 02:59:17', 'TRANS-1708333157', 0, 'Debited 10 credits for bidding', '2024-02-19 08:59:17', '2024-02-19 08:59:17', '', '40'),
(392, 449, 0, '10.00', 'February 19, 2024 03:01:46', 'TRANS-1708333306', 0, 'Debited 10 credits for bidding', '2024-02-19 09:01:46', '2024-02-19 09:01:46', '', '30'),
(393, 449, 0, '10.00', 'February 19, 2024 03:05:10', 'TRANS-1708333510', 0, 'Debited 10 credits for bidding', '2024-02-19 09:05:10', '2024-02-19 09:05:10', '', '20'),
(394, 450, 0, '10.00', 'February 19, 2024 03:53:26', 'TRANS-1708336406', 0, 'Debited 10 credits for bidding', '2024-02-19 09:53:26', '2024-02-19 09:53:26', '', '40'),
(395, 452, 0, '10.00', 'February 19, 2024 07:35:03', 'TRANS-1708349703', 0, 'Debited 10 credits for bidding', '2024-02-19 13:35:03', '2024-02-19 13:35:03', '', '40'),
(396, 454, 0, '10.00', 'February 19, 2024 21:03:31', 'TRANS-1708398211', 0, 'Debited 10 credits for bidding', '2024-02-20 03:03:31', '2024-02-20 03:03:31', '', '40'),
(397, 454, 0, '10.00', 'February 19, 2024 21:12:19', 'TRANS-1708398739', 0, 'Debited 10 credits for bidding', '2024-02-20 03:12:19', '2024-02-20 03:12:19', '', '30'),
(398, 454, 0, '10.00', 'February 19, 2024 21:16:48', 'TRANS-1708399008', 0, 'Debited 10 credits for bidding', '2024-02-20 03:16:48', '2024-02-20 03:16:48', '', '20'),
(399, 454, 0, '10.00', 'February 19, 2024 21:21:47', 'TRANS-1708399307', 0, 'Debited 10 credits for bidding', '2024-02-20 03:21:47', '2024-02-20 03:21:47', '', '10'),
(400, 456, 0, '10.00', 'February 20, 2024 00:30:14', 'TRANS-1708410614', 0, 'Debited 10 credits for bidding', '2024-02-20 06:30:14', '2024-02-20 06:30:14', '', '40'),
(401, 456, 0, '10.00', 'February 20, 2024 00:32:52', 'TRANS-1708410772', 0, 'Debited 10 credits for bidding', '2024-02-20 06:32:52', '2024-02-20 06:32:52', '', '30'),
(402, 456, 0, '10.00', 'February 20, 2024 00:35:17', 'TRANS-1708410917', 0, 'Debited 10 credits for bidding', '2024-02-20 06:35:17', '2024-02-20 06:35:17', '', '20'),
(403, 458, 0, '10.00', 'February 20, 2024 01:15:53', 'TRANS-1708413353', 0, 'Debited 10 credits for bidding', '2024-02-20 07:15:53', '2024-02-20 07:15:53', '', '40'),
(404, 458, 0, '10.00', 'February 20, 2024 01:17:48', 'TRANS-1708413468', 0, 'Debited 10 credits for bidding', '2024-02-20 07:17:48', '2024-02-20 07:17:48', '', '30'),
(405, 458, 0, '10.00', 'February 20, 2024 01:20:02', 'TRANS-1708413602', 0, 'Debited 10 credits for bidding', '2024-02-20 07:20:02', '2024-02-20 07:20:02', '', '20'),
(406, 460, 0, '10.00', 'February 20, 2024 05:55:14', 'TRANS-1708430114', 0, 'Debited 10 credits for bidding', '2024-02-20 11:55:14', '2024-02-20 11:55:14', '', '40'),
(407, 461, 0, '10.00', 'February 20, 2024 06:02:43', 'TRANS-1708430563', 0, 'Debited 10 credits for bidding', '2024-02-20 12:02:43', '2024-02-20 12:02:43', '', '40'),
(408, 461, 0, '10.00', 'February 20, 2024 06:03:23', 'TRANS-1708430603', 0, 'Debited 10 credits for bidding', '2024-02-20 12:03:23', '2024-02-20 12:03:23', '', '30'),
(409, 466, 0, '10.00', 'February 21, 2024 04:16:57', 'TRANS-1708510617', 0, 'Debited 10 credits for bidding', '2024-02-21 10:16:57', '2024-02-21 10:16:57', '', '40'),
(410, 469, 0, '10.00', 'February 21, 2024 08:50:46', 'TRANS-1708527046', 0, 'Debited 10 credits for bidding', '2024-02-21 14:50:46', '2024-02-21 14:50:46', '', '40'),
(411, 469, 0, '10.00', 'February 21, 2024 08:52:47', 'TRANS-1708527167', 0, 'Debited 10 credits for bidding', '2024-02-21 14:52:47', '2024-02-21 14:52:47', '', '30'),
(412, 471, 0, '10.00', 'February 22, 2024 01:31:01', 'TRANS-1708587061', 0, 'Debited 10 credits for bidding', '2024-02-22 07:31:01', '2024-02-22 07:31:01', '', '40'),
(413, 471, 0, '10.00', 'February 22, 2024 02:13:12', 'TRANS-1708589592', 0, 'Debited 10 credits for bidding', '2024-02-22 08:13:12', '2024-02-22 08:13:12', '', '30'),
(414, 471, 0, '10.00', 'February 22, 2024 02:19:05', 'TRANS-1708589945', 0, 'Debited 10 credits for bidding', '2024-02-22 08:19:05', '2024-02-22 08:19:05', '', '20'),
(415, 472, 0, '10.00', 'February 22, 2024 02:22:02', 'TRANS-1708590122', 0, 'Debited 10 credits for bidding', '2024-02-22 08:22:02', '2024-02-22 08:22:02', '', '40'),
(416, 473, 0, '10.00', 'February 22, 2024 02:53:20', 'TRANS-1708592000', 0, 'Debited 10 credits for bidding', '2024-02-22 08:53:20', '2024-02-22 08:53:20', '', '40'),
(417, 476, 0, '10.00', 'February 22, 2024 04:23:30', 'TRANS-1708597410', 0, 'Debited 10 credits for bidding', '2024-02-22 10:23:30', '2024-02-22 10:23:30', '', '40'),
(418, 477, 0, '10.00', 'February 22, 2024 05:30:44', 'TRANS-1708601444', 0, 'Debited 10 credits for bidding', '2024-02-22 11:30:44', '2024-02-22 11:30:44', '', '40'),
(419, 478, 0, '10.00', 'February 22, 2024 05:53:40', 'TRANS-1708602820', 0, 'Debited 10 credits for bidding', '2024-02-22 11:53:40', '2024-02-22 11:53:40', '', '40'),
(420, 478, 0, '10.00', 'February 22, 2024 06:34:10', 'TRANS-1708605250', 0, 'Debited 10 credits for bidding', '2024-02-22 12:34:10', '2024-02-22 12:34:10', '', '30'),
(421, 483, 0, '10.00', 'February 22, 2024 08:17:39', 'TRANS-1708611459', 0, 'Debited 10 credits for bidding', '2024-02-22 14:17:39', '2024-02-22 14:17:39', '', '40'),
(422, 484, 0, '10.00', 'February 22, 2024 08:18:22', 'TRANS-1708611502', 0, 'Debited 10 credits for bidding', '2024-02-22 14:18:22', '2024-02-22 14:18:22', '', '40'),
(423, 484, 0, '10.00', 'February 22, 2024 08:19:48', 'TRANS-1708611588', 0, 'Debited 10 credits for bidding', '2024-02-22 14:19:48', '2024-02-22 14:19:48', '', '30'),
(424, 486, 0, '10.00', 'February 22, 2024 10:07:21', 'TRANS-1708618041', 0, 'Debited 10 credits for bidding', '2024-02-22 16:07:21', '2024-02-22 16:07:21', '', '40'),
(425, 481, 0, '10.00', 'February 22, 2024 14:52:47', 'TRANS-1708635167', 0, 'Debited 10 credits for bidding', '2024-02-22 20:52:47', '2024-02-22 20:52:47', '', '40'),
(426, 471, 0, '10.00', 'February 22, 2024 21:50:55', 'TRANS-1708660255', 0, 'Debited 10 credits for bidding', '2024-02-23 03:50:55', '2024-02-23 03:50:55', '', '10'),
(427, 460, 0, '10.00', 'February 22, 2024 23:53:23', 'TRANS-1708667603', 0, 'Debited 10 credits for bidding', '2024-02-23 05:53:23', '2024-02-23 05:53:23', '', '30'),
(428, 460, 0, '10.00', 'February 22, 2024 23:54:06', 'TRANS-1708667646', 0, 'Debited 10 credits for bidding', '2024-02-23 05:54:06', '2024-02-23 05:54:06', '', '20'),
(429, 492, 0, '10.00', 'February 23, 2024 02:47:12', 'TRANS-1708678032', 0, 'Debited 10 credits for bidding', '2024-02-23 08:47:12', '2024-02-23 08:47:12', '', '40'),
(430, 496, 0, '10.00', 'February 23, 2024 04:20:18', 'TRANS-1708683618', 0, 'Debited 10 credits for bidding', '2024-02-23 10:20:18', '2024-02-23 10:20:18', '', '40'),
(431, 493, 0, '10.00', 'February 23, 2024 04:55:05', 'TRANS-1708685705', 0, 'Debited 10 credits for bidding', '2024-02-23 10:55:05', '2024-02-23 10:55:05', '', '40'),
(432, 493, 0, '10.00', 'February 23, 2024 05:35:17', 'TRANS-1708688117', 0, 'Debited 10 credits for bidding', '2024-02-23 11:35:17', '2024-02-23 11:35:17', '', '30'),
(433, 493, 0, '10.00', 'February 23, 2024 05:42:38', 'TRANS-1708688558', 0, 'Debited 10 credits for bidding', '2024-02-23 11:42:38', '2024-02-23 11:42:38', '', '20'),
(434, 498, 0, '10.00', 'February 23, 2024 07:54:21', 'TRANS-1708696461', 0, 'Debited 10 credits for bidding', '2024-02-23 13:54:21', '2024-02-23 13:54:21', '', '40'),
(435, 499, 0, '10.00', 'February 23, 2024 09:55:56', 'TRANS-1708703756', 0, 'Debited 10 credits for bidding', '2024-02-23 15:55:56', '2024-02-23 15:55:56', '', '40'),
(436, 499, 0, '10.00', 'February 23, 2024 09:56:23', 'TRANS-1708703783', 0, 'Debited 10 credits for bidding', '2024-02-23 15:56:23', '2024-02-23 15:56:23', '', '30'),
(437, 499, 0, '10.00', 'February 23, 2024 09:57:10', 'TRANS-1708703830', 0, 'Debited 10 credits for bidding', '2024-02-23 15:57:10', '2024-02-23 15:57:10', '', '20'),
(438, 499, 0, '10.00', 'February 23, 2024 09:57:47', 'TRANS-1708703867', 0, 'Debited 10 credits for bidding', '2024-02-23 15:57:47', '2024-02-23 15:57:47', '', '10'),
(439, 499, 0, '10.00', 'February 23, 2024 09:59:09', 'TRANS-1708703949', 0, 'Debited 10 credits for bidding', '2024-02-23 15:59:09', '2024-02-23 15:59:09', '', '0'),
(440, 413, 0, '10.00', 'February 23, 2024 10:30:17', 'TRANS-1708705817', 0, 'Debited 10 credits for bidding', '2024-02-23 16:30:17', '2024-02-23 16:30:17', '', '20'),
(441, 501, 0, '10.00', 'February 23, 2024 11:43:31', 'TRANS-1708710211', 0, 'Debited 10 credits for bidding', '2024-02-23 17:43:31', '2024-02-23 17:43:31', '', '40'),
(442, 471, 0, '10.00', 'February 23, 2024 18:48:10', 'TRANS-1708735690', 0, 'Debited 10 credits for bidding', '2024-02-24 00:48:10', '2024-02-24 00:48:10', '', '0'),
(443, 413, 0, '10.00', 'February 23, 2024 22:45:29', 'TRANS-1708749929', 0, 'Debited 10 credits for bidding', '2024-02-24 04:45:29', '2024-02-24 04:45:29', '', '10'),
(444, 494, 0, '10.00', 'February 24, 2024 01:46:03', 'TRANS-1708760763', 0, 'Debited 10 credits for bidding', '2024-02-24 07:46:03', '2024-02-24 07:46:03', '', '40'),
(445, 502, 0, '10.00', 'February 24, 2024 03:27:45', 'TRANS-1708766865', 0, 'Debited 10 credits for bidding', '2024-02-24 09:27:45', '2024-02-24 09:27:45', '', '40'),
(446, 501, 0, '10.00', 'February 25, 2024 00:23:03', 'TRANS-1708842183', 0, 'Debited 10 credits for bidding', '2024-02-25 06:23:03', '2024-02-25 06:23:03', '', '30'),
(447, 509, 0, '10.00', 'February 26, 2024 02:48:19', 'TRANS-1708937299', 0, 'Debited 10 credits for bidding', '2024-02-26 08:48:19', '2024-02-26 08:48:19', '', '40'),
(448, 509, 0, '10.00', 'February 26, 2024 03:00:36', 'TRANS-1708938036', 0, 'Debited 10 credits for bidding', '2024-02-26 09:00:36', '2024-02-26 09:00:36', '', '30'),
(449, 509, 0, '10.00', 'February 26, 2024 03:15:44', 'TRANS-1708938944', 0, 'Debited 10 credits for bidding', '2024-02-26 09:15:44', '2024-02-26 09:15:44', '', '20'),
(450, 493, 0, '10.00', 'February 26, 2024 05:42:08', 'TRANS-1708947728', 0, 'Debited 10 credits for bidding', '2024-02-26 11:42:08', '2024-02-26 11:42:08', '', '10'),
(451, 493, 0, '10.00', 'February 26, 2024 05:52:53', 'TRANS-1708948373', 0, 'Debited 10 credits for bidding', '2024-02-26 11:52:53', '2024-02-26 11:52:53', '', '0'),
(452, 511, 0, '10.00', 'February 26, 2024 08:18:15', 'TRANS-1708957095', 0, 'Debited 10 credits for bidding', '2024-02-26 14:18:15', '2024-02-26 14:18:15', '', '40'),
(453, 512, 0, '10.00', 'February 26, 2024 08:59:01', 'TRANS-1708959541', 0, 'Debited 10 credits for bidding', '2024-02-26 14:59:01', '2024-02-26 14:59:01', '', '40'),
(454, 481, 0, '10.00', 'February 26, 2024 12:17:40', 'TRANS-1708971460', 0, 'Debited 10 credits for bidding', '2024-02-26 18:17:40', '2024-02-26 18:17:40', '', '30'),
(455, 517, 0, '10.00', 'February 26, 2024 23:55:37', 'TRANS-1709013337', 0, 'Debited 10 credits for bidding', '2024-02-27 05:55:37', '2024-02-27 05:55:37', '', '40'),
(456, 517, 0, '10.00', 'February 26, 2024 23:57:05', 'TRANS-1709013425', 0, 'Debited 10 credits for bidding', '2024-02-27 05:57:05', '2024-02-27 05:57:05', '', '30'),
(457, 517, 0, '10.00', 'February 26, 2024 23:58:24', 'TRANS-1709013504', 0, 'Debited 10 credits for bidding', '2024-02-27 05:58:24', '2024-02-27 05:58:24', '', '20'),
(458, 517, 0, '10.00', 'February 27, 2024 00:08:05', 'TRANS-1709014085', 0, 'Debited 10 credits for bidding', '2024-02-27 06:08:05', '2024-02-27 06:08:05', '', '10'),
(459, 517, 0, '10.00', 'February 27, 2024 00:11:06', 'TRANS-1709014266', 0, 'Debited 10 credits for bidding', '2024-02-27 06:11:06', '2024-02-27 06:11:06', '', '0'),
(460, 518, 0, '10.00', 'February 27, 2024 00:53:26', 'TRANS-1709016806', 0, 'Debited 10 credits for bidding', '2024-02-27 06:53:26', '2024-02-27 06:53:26', '', '40'),
(461, 518, 0, '10.00', 'February 27, 2024 00:55:08', 'TRANS-1709016908', 0, 'Debited 10 credits for bidding', '2024-02-27 06:55:08', '2024-02-27 06:55:08', '', '30'),
(462, 518, 0, '10.00', 'February 27, 2024 00:57:23', 'TRANS-1709017043', 0, 'Debited 10 credits for bidding', '2024-02-27 06:57:23', '2024-02-27 06:57:23', '', '20'),
(463, 518, 0, '10.00', 'February 27, 2024 00:59:49', 'TRANS-1709017189', 0, 'Debited 10 credits for bidding', '2024-02-27 06:59:49', '2024-02-27 06:59:49', '', '10'),
(464, 418, 0, '10.00', 'February 27, 2024 04:27:57', 'TRANS-1709029677', 0, 'Debited 10 credits for bidding', '2024-02-27 10:27:57', '2024-02-27 10:27:57', '', '980'),
(465, 520, 0, '10.00', 'February 27, 2024 11:18:43', 'TRANS-1709054323', 0, 'Debited 10 credits for bidding', '2024-02-27 17:18:43', '2024-02-27 17:18:43', '', '40'),
(466, 520, 0, '10.00', 'February 27, 2024 11:32:45', 'TRANS-1709055165', 0, 'Debited 10 credits for bidding', '2024-02-27 17:32:45', '2024-02-27 17:32:45', '', '30'),
(467, 520, 0, '10.00', 'February 27, 2024 11:34:58', 'TRANS-1709055298', 0, 'Debited 10 credits for bidding', '2024-02-27 17:34:58', '2024-02-27 17:34:58', '', '20'),
(468, 522, 0, '10.00', 'February 28, 2024 06:14:32', 'TRANS-1709122472', 0, 'Debited 10 credits for bidding', '2024-02-28 12:14:32', '2024-02-28 12:14:32', '', '40'),
(469, 524, 0, '10.00', 'February 28, 2024 23:18:54', 'TRANS-1709183934', 0, 'Debited 10 credits for bidding', '2024-02-29 05:18:54', '2024-02-29 05:18:54', '', '40'),
(470, 526, 0, '10.00', 'February 28, 2024 23:34:27', 'TRANS-1709184867', 0, 'Debited 10 credits for bidding', '2024-02-29 05:34:27', '2024-02-29 05:34:27', '', '40'),
(471, 526, 0, '10.00', 'February 29, 2024 04:30:33', 'TRANS-1709202633', 0, 'Debited 10 credits for bidding', '2024-02-29 10:30:33', '2024-02-29 10:30:33', '', '30'),
(472, 526, 0, '10.00', 'February 29, 2024 04:37:04', 'TRANS-1709203024', 0, 'Debited 10 credits for bidding', '2024-02-29 10:37:04', '2024-02-29 10:37:04', '', '20'),
(473, 413, 0, '10.00', 'February 29, 2024 05:55:48', 'TRANS-1709207748', 0, 'Debited 10 credits for bidding', '2024-02-29 11:55:48', '2024-02-29 11:55:48', '', '0'),
(474, 533, 0, '10.00', 'March 7, 2024 01:23:33', 'TRANS-1709796213', 0, 'Debited 10 credits for bidding', '2024-03-07 07:23:33', '2024-03-07 07:23:33', '', '40'),
(475, 533, 0, '10.00', 'March 7, 2024 01:31:26', 'TRANS-1709796686', 0, 'Debited 10 credits for bidding', '2024-03-07 07:31:26', '2024-03-07 07:31:26', '', '30'),
(476, 533, 0, '10.00', 'March 7, 2024 01:33:26', 'TRANS-1709796806', 0, 'Debited 10 credits for bidding', '2024-03-07 07:33:26', '2024-03-07 07:33:26', '', '20'),
(477, 533, 0, '10.00', 'March 7, 2024 01:36:29', 'TRANS-1709796989', 0, 'Debited 10 credits for bidding', '2024-03-07 07:36:29', '2024-03-07 07:36:29', '', '10'),
(478, 537, 0, '10.00', 'March 9, 2024 10:08:05', 'TRANS-1710000485', 0, 'Debited 10 credits for bidding', '2024-03-09 16:08:05', '2024-03-09 16:08:05', '', '40'),
(479, 538, 0, '10.00', 'March 11, 2024 01:18:00', 'TRANS-1710137880', 0, 'Debited 10 credits for bidding', '2024-03-11 06:18:00', '2024-03-11 06:18:00', '', '40'),
(480, 538, 0, '10.00', 'March 11, 2024 01:20:34', 'TRANS-1710138034', 0, 'Debited 10 credits for bidding', '2024-03-11 06:20:34', '2024-03-11 06:20:34', '', '30'),
(481, 540, 0, '10.00', 'March 11, 2024 05:29:23', 'TRANS-1710152963', 0, 'Debited 10 credits for bidding', '2024-03-11 10:29:23', '2024-03-11 10:29:23', '', '40'),
(482, 542, 0, '10.00', 'March 12, 2024 02:23:34', 'TRANS-1710228214', 0, 'Debited 10 credits for bidding', '2024-03-12 07:23:34', '2024-03-12 07:23:34', '', '40'),
(483, 546, 0, '10.00', 'March 12, 2024 04:31:39', 'TRANS-1710235899', 0, 'Debited 10 credits for bidding', '2024-03-12 09:31:39', '2024-03-12 09:31:39', '', '40'),
(484, 546, 0, '10.00', 'March 12, 2024 04:34:17', 'TRANS-1710236057', 0, 'Debited 10 credits for bidding', '2024-03-12 09:34:17', '2024-03-12 09:34:17', '', '30'),
(485, 546, 0, '10.00', 'March 12, 2024 04:36:44', 'TRANS-1710236204', 0, 'Debited 10 credits for bidding', '2024-03-12 09:36:44', '2024-03-12 09:36:44', '', '20'),
(486, 546, 0, '10.00', 'March 12, 2024 04:39:06', 'TRANS-1710236346', 0, 'Debited 10 credits for bidding', '2024-03-12 09:39:06', '2024-03-12 09:39:06', '', '10'),
(487, 547, 0, '10.00', 'March 12, 2024 04:53:57', 'TRANS-1710237237', 0, 'Debited 10 credits for bidding', '2024-03-12 09:53:57', '2024-03-12 09:53:57', '', '40'),
(488, 418, 0, '10.00', 'March 12, 2024 05:19:14', 'TRANS-1710238754', 0, 'Debited 10 credits for bidding', '2024-03-12 10:19:14', '2024-03-12 10:19:14', '', '970'),
(489, 549, 0, '10.00', 'March 12, 2024 08:00:04', 'TRANS-1710248404', 0, 'Debited 10 credits for bidding', '2024-03-12 13:00:04', '2024-03-12 13:00:04', '', '40'),
(490, 549, 0, '10.00', 'March 12, 2024 08:04:31', 'TRANS-1710248671', 0, 'Debited 10 credits for bidding', '2024-03-12 13:04:31', '2024-03-12 13:04:31', '', '30'),
(491, 554, 0, '10.00', 'March 13, 2024 03:35:58', 'TRANS-1710318958', 0, 'Debited 10 credits for bidding', '2024-03-13 08:35:58', '2024-03-13 08:35:58', '', '40'),
(492, 554, 0, '10.00', 'March 13, 2024 03:39:07', 'TRANS-1710319147', 0, 'Debited 10 credits for bidding', '2024-03-13 08:39:07', '2024-03-13 08:39:07', '', '30'),
(493, 554, 0, '10.00', 'March 13, 2024 03:44:56', 'TRANS-1710319496', 0, 'Debited 10 credits for bidding', '2024-03-13 08:44:56', '2024-03-13 08:44:56', '', '20'),
(494, 561, 0, '10.00', 'March 14, 2024 03:17:16', 'TRANS-1710404236', 0, 'Debited 10 credits for bidding', '2024-03-14 08:17:16', '2024-03-14 08:17:16', '', '40'),
(495, 356, 0, '10.00', 'March 15, 2024 02:30:45', 'TRANS-1710487845', 0, 'Debited 10 credits for bidding', '2024-03-15 07:30:45', '2024-03-15 07:30:45', '', '160'),
(496, 356, 0, '10.00', 'March 15, 2024 06:13:34', 'TRANS-1710501214', 0, 'Debited 10 credits for bidding', '2024-03-15 11:13:34', '2024-03-15 11:13:34', '', '150'),
(497, 418, 0, '10.00', 'March 15, 2024 06:16:09', 'TRANS-1710501369', 0, 'Debited 10 credits for bidding', '2024-03-15 11:16:09', '2024-03-15 11:16:09', '', '960'),
(498, 574, 0, '10.00', 'March 22, 2024 01:00:50', 'TRANS-1711087250', 0, 'Debited 10 credits for bidding', '2024-03-22 06:00:50', '2024-03-22 06:00:50', '', '40'),
(499, 575, 0, '10.00', 'March 22, 2024 01:27:02', 'TRANS-1711088822', 0, 'Debited 10 credits for bidding', '2024-03-22 06:27:02', '2024-03-22 06:27:02', '', '40'),
(500, 576, 0, '10.00', 'March 23, 2024 05:17:12', 'TRANS-1711189032', 0, 'Debited 10 credits for bidding', '2024-03-23 10:17:12', '2024-03-23 10:17:12', '', '40'),
(501, 578, 0, '10.00', 'March 23, 2024 06:25:44', 'TRANS-1711193144', 0, 'Debited 10 credits for bidding', '2024-03-23 11:25:44', '2024-03-23 11:25:44', '', '40'),
(502, 581, 0, '10.00', 'March 26, 2024 03:04:39', 'TRANS-1711440279', 0, 'Debited 10 credits for bidding', '2024-03-26 08:04:39', '2024-03-26 08:04:39', '', '40'),
(503, 533, 0, '10.00', 'March 27, 2024 23:35:40', 'TRANS-1711600540', 0, 'Debited 10 credits for bidding', '2024-03-28 04:35:40', '2024-03-28 04:35:40', '', '0'),
(504, 591, 0, '10.00', 'March 28, 2024 06:51:40', 'TRANS-1711626700', 0, 'Debited 10 credits for bidding', '2024-03-28 11:51:40', '2024-03-28 11:51:40', '', '40'),
(505, 591, 0, '10.00', 'March 28, 2024 06:55:13', 'TRANS-1711626913', 0, 'Debited 10 credits for bidding', '2024-03-28 11:55:13', '2024-03-28 11:55:13', '', '30'),
(506, 591, 0, '10.00', 'March 28, 2024 06:56:58', 'TRANS-1711627018', 0, 'Debited 10 credits for bidding', '2024-03-28 11:56:58', '2024-03-28 11:56:58', '', '20'),
(507, 591, 0, '10.00', 'March 28, 2024 07:01:14', 'TRANS-1711627274', 0, 'Debited 10 credits for bidding', '2024-03-28 12:01:14', '2024-03-28 12:01:14', '', '10'),
(508, 593, 0, '10.00', 'March 29, 2024 00:13:05', 'TRANS-1711689185', 0, 'Debited 10 credits for bidding', '2024-03-29 05:13:05', '2024-03-29 05:13:05', '', '40'),
(509, 594, 0, '10.00', 'March 29, 2024 01:09:30', 'TRANS-1711692570', 0, 'Debited 10 credits for bidding', '2024-03-29 06:09:30', '2024-03-29 06:09:30', '', '40'),
(510, 594, 0, '10.00', 'March 29, 2024 01:13:30', 'TRANS-1711692810', 0, 'Debited 10 credits for bidding', '2024-03-29 06:13:30', '2024-03-29 06:13:30', '', '30'),
(511, 594, 0, '10.00', 'March 29, 2024 01:23:58', 'TRANS-1711693438', 0, 'Debited 10 credits for bidding', '2024-03-29 06:23:58', '2024-03-29 06:23:58', '', '20'),
(512, 601, 0, '10.00', 'March 29, 2024 06:46:35', 'TRANS-1711712795', 0, 'Debited 10 credits for bidding', '2024-03-29 11:46:35', '2024-03-29 11:46:35', '', '40'),
(513, 604, 0, '10.00', 'March 29, 2024 07:59:39', 'TRANS-1711717179', 0, 'Debited 10 credits for bidding', '2024-03-29 12:59:39', '2024-03-29 12:59:39', '', '40'),
(514, 594, 0, '10.00', 'March 29, 2024 09:24:29', 'TRANS-1711722269', 0, 'Debited 10 credits for bidding', '2024-03-29 14:24:29', '2024-03-29 14:24:29', '', '10'),
(515, 594, 0, '10.00', 'March 29, 2024 09:26:49', 'TRANS-1711722409', 0, 'Debited 10 credits for bidding', '2024-03-29 14:26:49', '2024-03-29 14:26:49', '', '0'),
(516, 611, 0, '10.00', 'March 30, 2024 00:01:07', 'TRANS-1711774867', 0, 'Debited 10 credits for bidding', '2024-03-30 05:01:07', '2024-03-30 05:01:07', '', '40'),
(517, 610, 0, '10.00', 'March 30, 2024 00:01:32', 'TRANS-1711774892', 0, 'Debited 10 credits for bidding', '2024-03-30 05:01:32', '2024-03-30 05:01:32', '', '40'),
(518, 610, 0, '10.00', 'March 30, 2024 00:04:27', 'TRANS-1711775067', 0, 'Debited 10 credits for bidding', '2024-03-30 05:04:27', '2024-03-30 05:04:27', '', '30'),
(519, 617, 0, '10.00', 'March 30, 2024 07:29:50', 'TRANS-1711801790', 0, 'Debited 10 credits for bidding', '2024-03-30 12:29:50', '2024-03-30 12:29:50', '', '40'),
(520, 617, 0, '10.00', 'March 30, 2024 07:32:14', 'TRANS-1711801934', 0, 'Debited 10 credits for bidding', '2024-03-30 12:32:14', '2024-03-30 12:32:14', '', '30'),
(521, 619, 0, '10.00', 'March 31, 2024 08:18:50', 'TRANS-1711891130', 0, 'Debited 10 credits for bidding', '2024-03-31 13:18:50', '2024-03-31 13:18:50', '', '40'),
(522, 418, 0, '10.00', 'April 3, 2024 05:22:18', 'TRANS-1712139738', 0, 'Debited 10 credits for bidding', '2024-04-03 10:22:18', '2024-04-03 10:22:18', '', '950'),
(523, 418, 0, '10.00', 'April 3, 2024 23:50:15', 'TRANS-1712206215', 0, 'Debited 10 credits for bidding', '2024-04-04 04:50:15', '2024-04-04 04:50:15', '', '940'),
(524, 632, 0, '10.00', 'April 4, 2024 05:16:38', 'TRANS-1712225798', 0, 'Debited 10 credits for bidding', '2024-04-04 10:16:38', '2024-04-04 10:16:38', '', '40'),
(525, 632, 0, '10.00', 'April 4, 2024 05:29:09', 'TRANS-1712226549', 0, 'Debited 10 credits for bidding', '2024-04-04 10:29:09', '2024-04-04 10:29:09', '', '30'),
(526, 635, 0, '10.00', 'April 4, 2024 05:46:41', 'TRANS-1712227601', 0, 'Debited 10 credits for bidding', '2024-04-04 10:46:41', '2024-04-04 10:46:41', '', '40'),
(527, 638, 0, '10.00', 'April 4, 2024 09:40:45', 'TRANS-1712241645', 0, 'Debited 10 credits for bidding', '2024-04-04 14:40:45', '2024-04-04 14:40:45', '', '40'),
(528, 638, 0, '10.00', 'April 4, 2024 10:04:09', 'TRANS-1712243049', 0, 'Debited 10 credits for bidding', '2024-04-04 15:04:09', '2024-04-04 15:04:09', '', '30'),
(529, 638, 0, '10.00', 'April 4, 2024 10:06:18', 'TRANS-1712243178', 0, 'Debited 10 credits for bidding', '2024-04-04 15:06:18', '2024-04-04 15:06:18', '', '20'),
(530, 634, 0, '10.00', 'April 4, 2024 15:58:35', 'TRANS-1712264315', 0, 'Debited 10 credits for bidding', '2024-04-04 20:58:35', '2024-04-04 20:58:35', '', '40'),
(531, 641, 0, '10.00', 'April 5, 2024 10:35:05', 'TRANS-1712331305', 0, 'Debited 10 credits for bidding', '2024-04-05 15:35:05', '2024-04-05 15:35:05', '', '40'),
(532, 662, 0, '10.00', 'April 6, 2024 02:39:59', 'TRANS-1712389199', 0, 'Debited 10 credits for bidding', '2024-04-06 07:39:59', '2024-04-06 07:39:59', '', '40'),
(533, 663, 0, '10.00', 'April 6, 2024 06:42:52', 'TRANS-1712403772', 0, 'Debited 10 credits for bidding', '2024-04-06 11:42:52', '2024-04-06 11:42:52', '', '40'),
(534, 663, 0, '10.00', 'April 6, 2024 06:45:32', 'TRANS-1712403932', 0, 'Debited 10 credits for bidding', '2024-04-06 11:45:32', '2024-04-06 11:45:32', '', '30'),
(535, 667, 0, '10.00', 'April 8, 2024 08:25:01', 'TRANS-1712582701', 0, 'Debited 10 credits for bidding', '2024-04-08 13:25:01', '2024-04-08 13:25:01', '', '40'),
(536, 512, 0, '10.00', 'April 8, 2024 12:45:11', 'TRANS-1712598311', 0, 'Debited 10 credits for bidding', '2024-04-08 17:45:11', '2024-04-08 17:45:11', '', '30'),
(537, 671, 0, '10.00', 'April 9, 2024 00:38:14', 'TRANS-1712641094', 0, 'Debited 10 credits for bidding', '2024-04-09 05:38:14', '2024-04-09 05:38:14', '', '40'),
(538, 671, 0, '10.00', 'April 9, 2024 00:38:51', 'TRANS-1712641131', 0, 'Debited 10 credits for bidding', '2024-04-09 05:38:51', '2024-04-09 05:38:51', '', '30'),
(539, 671, 0, '10.00', 'April 9, 2024 00:39:37', 'TRANS-1712641177', 0, 'Debited 10 credits for bidding', '2024-04-09 05:39:37', '2024-04-09 05:39:37', '', '20'),
(540, 671, 0, '10.00', 'April 9, 2024 00:40:11', 'TRANS-1712641211', 0, 'Debited 10 credits for bidding', '2024-04-09 05:40:11', '2024-04-09 05:40:11', '', '10'),
(541, 671, 0, '10.00', 'April 9, 2024 00:40:36', 'TRANS-1712641236', 0, 'Debited 10 credits for bidding', '2024-04-09 05:40:36', '2024-04-09 05:40:36', '', '0'),
(542, 673, 0, '10.00', 'April 9, 2024 01:33:32', 'TRANS-1712644412', 0, 'Debited 10 credits for bidding', '2024-04-09 06:33:32', '2024-04-09 06:33:32', '', '40'),
(543, 673, 0, '10.00', 'April 9, 2024 01:40:02', 'TRANS-1712644802', 0, 'Debited 10 credits for bidding', '2024-04-09 06:40:02', '2024-04-09 06:40:02', '', '30'),
(544, 673, 0, '10.00', 'April 9, 2024 01:57:11', 'TRANS-1712645831', 0, 'Debited 10 credits for bidding', '2024-04-09 06:57:11', '2024-04-09 06:57:11', '', '20'),
(545, 673, 0, '10.00', 'April 9, 2024 02:04:44', 'TRANS-1712646284', 0, 'Debited 10 credits for bidding', '2024-04-09 07:04:44', '2024-04-09 07:04:44', '', '10'),
(546, 674, 0, '10.00', 'April 9, 2024 04:42:08', 'TRANS-1712655728', 0, 'Debited 10 credits for bidding', '2024-04-09 09:42:08', '2024-04-09 09:42:08', '', '40'),
(547, 674, 0, '10.00', 'April 9, 2024 04:47:48', 'TRANS-1712656068', 0, 'Debited 10 credits for bidding', '2024-04-09 09:47:48', '2024-04-09 09:47:48', '', '30'),
(548, 677, 0, '10.00', 'April 10, 2024 03:57:33', 'TRANS-1712739453', 0, 'Debited 10 credits for bidding', '2024-04-10 08:57:33', '2024-04-10 08:57:33', '', '40'),
(549, 677, 0, '10.00', 'April 10, 2024 04:02:40', 'TRANS-1712739760', 0, 'Debited 10 credits for bidding', '2024-04-10 09:02:40', '2024-04-10 09:02:40', '', '30'),
(550, 677, 0, '10.00', 'April 10, 2024 04:03:45', 'TRANS-1712739825', 0, 'Debited 10 credits for bidding', '2024-04-10 09:03:45', '2024-04-10 09:03:45', '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sandeep', 'contact@sooprs.com', NULL, '$2y$10$6KroNenMhGkTxLEaepOj9.YnWhn1gUF8.mUWldrPcWFxA2tJs5yHG', 'OjoGqwhnJUNhjWUj7MGuRS4VgIBbKUJEN10yWAdRMB4nOAWkunqdgV0VioFD', '2023-03-23 07:44:07', '2024-01-11 06:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_academics`
--

CREATE TABLE `user_academics` (
  `id` int(11) NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `years` int(11) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_academics`
--

INSERT INTO `user_academics` (`id`, `course`, `institute`, `university`, `years`, `percentage`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 'MCA', 'FIET', 'AKTU', 2023, '76.00', '2023-10-21 08:28:23', '2023-10-21 08:28:23', 254),
(4, 'btech', 'ajmer', 'rtu', 2017, '8.90', '2023-10-22 06:05:17', '2023-10-22 06:05:17', 260),
(5, 'B.Tech', 'xyz', 'abc', 2019, '77.00', '2023-11-03 07:56:45', '2023-11-03 07:56:45', 263),
(6, 'B.tech', 'xyz college', 'xyz college', 2020, '7.00', '2023-11-24 13:20:49', '2023-11-24 13:20:49', 347),
(14, 'B.Tech.', 'Guru Jambheshwar University', 'Guru Jambheshwar University', 2020, '89.00', '2023-12-11 11:04:58', '2023-12-11 11:04:58', 356),
(16, 'Class X', 'Sardar Villabh Bhai Patel Girls Inter College', 'Uttar Pradesh', 2007, '71.00', '2024-01-13 16:10:42', '2024-01-13 16:10:42', 427),
(17, 'Class XII', 'MPP inter college ', 'Uttar Pradesh', 2009, '63.00', '2024-01-13 16:12:06', '2024-01-13 16:12:06', 427),
(19, 'Bsc. Computer Sc.', 'Agra University', '', 2018, '65.00', '2024-01-17 09:51:39', '2024-01-17 09:51:39', 434),
(20, 'MCA', 'FIET', 'AKTU', 2020, '75.00', '2024-01-17 09:52:03', '2024-01-17 09:52:03', 434),
(21, 'Information Technology', 'R.E.C Banda', 'A.K.T.U Lucknow', 2021, '7.40', '2024-01-17 09:52:22', '2024-01-17 09:52:22', 357),
(22, 'Bachelor of computer application', 'Dronacharya Goverment College', 'Gurugram University', 2023, '76.00', '2024-01-17 09:54:18', '2024-01-17 09:54:18', 435),
(23, 'MBA Marketing', 'Lahore School of Economics', 'Lahore School of Economics', 2014, '3.60', '2024-02-23 07:35:50', '2024-02-23 07:35:50', 491),
(24, 'MCA', 'Shri Vaishnav Institute Of Technology & Science - Indore', 'RGPV', 2015, '75.00', '2024-02-23 07:49:37', '2024-02-23 07:49:37', 488),
(25, 'B Tech In Computer Science And Engineering', 'Information of Technology and Engineering', 'Bhagwant University', 2016, '7.50', '2024-02-26 08:45:35', '2024-02-26 08:45:35', 507),
(26, 'BS software engineering ', 'superior university ', '', 2018, '3.00', '2024-02-27 08:01:03', '2024-02-27 08:01:03', 519),
(27, 'Digital', 'Obafemi Awolowo University', 'University', 2017, '4.80', '2024-03-12 13:45:15', '2024-03-12 13:45:15', 549),
(28, 'Digital', 'Obafemi Awolowo University', 'University', 2017, '4.80', '2024-03-12 13:45:15', '2024-03-12 13:45:15', 549),
(29, 'Computer Science', 'Federal University Of Petroleum Resources', '', 2023, '4.90', '2024-03-16 10:31:40', '2024-03-16 10:31:40', 567);

-- --------------------------------------------------------

--
-- Table structure for table `user_exps`
--

CREATE TABLE `user_exps` (
  `id` int(11) NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `is_currently_working` int(11) DEFAULT '0',
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_exps`
--

INSERT INTO `user_exps` (`id`, `organization`, `from_date`, `to_date`, `is_currently_working`, `designation`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'talkcharge', '2023-10-09', '2023-10-22', 0, 'software developer', '2023-10-22 06:02:42', '2023-10-22 06:02:42', 260),
(2, 'techninza', '2022-07-22', '0000-00-00', 0, 'backend developer', '2023-10-22 11:20:28', '2023-10-22 11:20:28', 254),
(3, 'Techninza', '2020-03-03', '2022-11-17', 0, 'Developer', '2023-11-03 07:55:33', '2023-11-03 07:55:33', 263),
(4, 'talkcharge', '2023-11-25', '2023-11-30', 0, 'php developer', '2023-11-24 13:17:39', '2023-11-24 13:17:39', 347),
(5, 'techninza', '2023-11-08', '2023-12-08', 0, 'manager', '2023-12-08 12:47:08', '2023-12-08 12:47:08', 355),
(8, 'Techninza', '2023-03-09', '0000-00-00', 0, 'Web Developer', '2023-12-09 07:02:32', '2023-12-09 07:02:32', 356),
(9, 'techninza', '2023-12-01', '0000-00-00', 0, 'web developer', '2024-01-06 09:57:39', '2024-01-06 09:57:39', 397),
(11, 'Viewlift', '2022-11-14', '2024-01-11', 0, 'Senior android developer', '2024-01-11 06:54:02', '2024-01-11 06:54:02', 419),
(12, 'Pradent Business Pvt. Services', '2016-06-16', '2017-12-31', 0, 'Web Developer', '2024-01-13 16:05:06', '2024-01-13 16:05:06', 427),
(13, 'Huulke Technology', '2018-01-18', '2022-02-28', 0, 'JavaScript Full Stack Developer', '2024-01-13 16:06:29', '2024-01-13 16:06:29', 427),
(14, 'Harappa Learning Private Limited', '2022-03-10', '2023-12-12', 0, 'Manager, Backend', '2024-01-13 16:07:33', '2024-01-13 16:07:33', 427),
(16, 'Prettify Creative', '2021-12-01', '2022-11-30', 0, 'Sr. Web developer', '2024-01-17 09:47:52', '2024-01-17 09:47:52', 434),
(17, 'Techninza', '2022-12-01', '0000-00-00', 0, 'Sr. Web developer', '2024-01-17 09:48:34', '2024-01-17 09:48:34', 434),
(18, 'techninza.in', '2022-01-17', '2024-01-17', 0, 'Mern Stack Developer', '2024-01-17 09:49:08', '2024-01-17 09:49:08', 357),
(19, 'Techninza', '2023-11-22', '0000-00-00', 0, 'ReactJs Developer', '2024-01-17 09:50:19', '2024-01-17 09:50:19', 435),
(20, 'Aara technologies', '2023-11-24', '2024-01-01', 0, 'UI/UX designer', '2024-01-17 10:08:20', '2024-01-17 10:08:20', 415),
(21, 'globecapital.com', '2015-07-19', '2024-02-19', 0, 'software developer', '2024-02-19 04:27:56', '2024-02-19 04:27:56', 448),
(22, 'TCS', '2019-02-19', '2024-02-19', 0, 'Senior Software Engineer ', '2024-02-19 10:00:27', '2024-02-19 10:00:27', 450),
(23, 'Smart IT ventures ', '2017-02-01', '2019-02-15', 0, 'iOS Developer ', '2024-02-19 10:06:10', '2024-02-19 10:06:10', 450),
(24, 'Ideal IT Techno', '2015-10-23', '2018-12-23', 0, 'Senior Mobile developer ', '2024-02-23 05:57:31', '2024-02-23 05:57:31', 488),
(25, 'Techfrolic Software Solution Pvt Ltd', '2018-01-23', '2021-11-23', 0, 'Senior Mobile developer ', '2024-02-23 06:05:36', '2024-02-23 06:05:36', 488),
(26, 'IDEAL IT TECHNO PRIVATE LIMITED', '2022-01-16', '2023-11-27', 0, 'Senior &Team lead Mobile developer ', '2024-02-23 06:07:46', '2024-02-23 06:07:46', 488),
(27, 'Ibex Digital', '2014-08-25', '2017-09-04', 0, 'Assistant Manager -  Ad Operations', '2024-02-23 07:28:46', '2024-02-23 07:28:46', 491),
(28, 'Visionet Systems Inc', '2017-09-04', '2022-12-31', 0, 'Senior Manager -  Digital Marketing', '2024-02-23 07:29:31', '2024-02-23 07:29:31', 491),
(29, 'Visionet Systems Inc', '2017-09-04', '2022-12-31', 0, 'Senior Manager -  Digital Marketing', '2024-02-23 07:33:49', '2024-02-23 07:33:49', 491),
(30, 'Metablock technologies Pvt. Ltd.', '2022-02-08', '2024-01-31', 0, 'Full stack(MERN) Developer', '2024-02-24 07:41:18', '2024-02-24 07:41:18', 494),
(32, 'Code Dev services', '2024-02-01', '0000-00-00', 0, 'Full stack Developer', '2024-02-26 07:06:53', '2024-02-26 07:06:53', 494),
(33, 'Btechnology Group', '2017-03-26', '2019-01-26', 0, 'Build Erp, Client landing project, Crm, Freelancing', '2024-02-26 08:35:24', '2024-02-26 08:35:24', 507),
(34, 'Vantage Bit Pvt Ltd', '2019-02-26', '2021-05-26', 0, 'Manage, support, implement feature, test pasls.com', '2024-02-26 08:37:05', '2024-02-26 08:37:05', 507),
(35, 'Goldstone Pvt Ltd', '2021-06-26', '2022-05-26', 0, 'Manage, support, implement feature as a full stack developer. Tech stack were: laravel react', '2024-02-26 08:38:40', '2024-02-26 08:38:40', 507),
(36, 'Go Code Solution', '2022-06-26', '0000-00-00', 0, 'Freelancing US base project. Tech stack: laravel, jquery, react, aws', '2024-02-26 08:39:55', '2024-02-26 08:39:55', 507),
(37, 'Tradekunj Pvt Ltd', '2020-01-26', '2021-05-26', 0, 'Build Ecommerce web and mobile application. Tech stack: laravel, react, flutter', '2024-02-26 08:41:02', '2024-02-26 08:41:02', 507),
(38, 'Vajratech Pvt Ltd', '2022-06-26', '0000-00-00', 0, 'Freelancing client from Germany, Greece based project. Tech stack: laravel, react, vuejs, jquery, flutter, IOT thingsboard, python, devOps', '2024-02-26 08:42:32', '2024-02-26 08:42:32', 507),
(39, 'iB Arts Pvt. Ltd.', '2016-01-01', '0000-00-00', 0, 'Sales Head', '2024-02-26 08:57:52', '2024-02-26 08:57:52', 509),
(40, 'PinBlooms Technology', '2018-01-01', '0000-00-00', 0, 'Business Analyst', '2024-02-27 06:35:58', '2024-02-27 06:35:58', 517),
(41, 'Travel Agency ', '2000-01-01', '2024-02-29', 0, '...', '2024-02-29 08:34:10', '2024-02-29 08:34:10', 528),
(42, 'Wanderlust weddings', '2005-05-19', '2024-02-29', 0, '../', '2024-02-29 10:09:15', '2024-02-29 10:09:15', 529),
(43, 'Outstream', '2019-11-01', '2021-06-01', 0, 'Frontend Software Engineer', '2024-03-11 10:21:35', '2024-03-11 10:21:35', 540),
(44, 'Enke Systems (Warner Music Group)', '2021-04-01', '0000-00-00', 0, 'Frontend Software Engineer', '2024-03-11 10:22:35', '2024-03-11 10:22:35', 540),
(49, 'Freelance', '2017-01-01', '2024-03-12', 0, 'Développeur Full Stack', '2024-03-12 08:22:14', '2024-03-12 08:22:14', 543),
(50, 'CEO of Rise Brand limited', '2015-03-07', '2024-12-03', 0, 'bolarinwa', '2024-03-12 13:40:13', '2024-03-12 13:40:13', 549),
(51, 'CEO of Rise Brand limited', '2015-03-07', '2024-12-03', 0, 'bolarinwa', '2024-03-12 13:40:13', '2024-03-12 13:40:13', 549),
(52, 'CEO of Rise Brand limited', '2015-03-07', '2024-12-03', 0, 'bolarinwa', '2024-03-12 13:40:13', '2024-03-12 13:40:13', 549),
(53, 'TJ FOTOGRAPHY DOT COM', '2000-07-30', '2024-03-30', 0, 'PROFESSIONAL PHOTOGRAPHER', '2024-03-30 06:24:43', '2024-03-30 06:24:43', 616),
(54, 'TJ FOTOGRAPHY DOT COM', '2000-07-30', '2024-03-30', 0, 'PROFESSIONAL PHOTOGRAPHER', '2024-03-30 06:24:51', '2024-03-30 06:24:51', 616),
(55, 'TJ FOTOGRAPHY DOT COM', '2000-07-30', '2024-03-30', 0, 'PROFESSIONAL PHOTOGRAPHER', '2024-03-30 06:24:51', '2024-03-30 06:24:51', 616),
(56, 'TJ FOTOGRAPHY DOT COM', '2000-07-30', '2024-03-30', 0, 'PROFESSIONAL PHOTOGRAPHER', '2024-03-30 06:24:51', '2024-03-30 06:24:51', 616);

-- --------------------------------------------------------

--
-- Table structure for table `user_milestones`
--

CREATE TABLE `user_milestones` (
  `id` int(11) NOT NULL,
  `milestone_id` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not accepted,1->accepted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_roles`
--
ALTER TABLE `access_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_queries`
--
ALTER TABLE `contact_us_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_history`
--
ALTER TABLE `credit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_id` (`professional_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_query`
--
ALTER TABLE `customer_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_prof_chats`
--
ALTER TABLE `cust_prof_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_otps`
--
ALTER TABLE `email_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gig_orders`
--
ALTER TABLE `gig_orders`
  ADD PRIMARY KEY (`gorder_id`);

--
-- Indexes for table `investor_queries`
--
ALTER TABLE `investor_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_professionals`
--
ALTER TABLE `join_professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `lead_staffs`
--
ALTER TABLE `lead_staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `my_leads`
--
ALTER TABLE `my_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_gigs`
--
ALTER TABLE `professional_gigs`
  ADD PRIMARY KEY (`gig_id`);

--
-- Indexes for table `professional_leads`
--
ALTER TABLE `professional_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_portfolios`
--
ALTER TABLE `professional_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_reviews`
--
ALTER TABLE `professional_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_requirements`
--
ALTER TABLE `project_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sp_country`
--
ALTER TABLE `sp_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `sp_skills`
--
ALTER TABLE `sp_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `sr_answers`
--
ALTER TABLE `sr_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `sr_pages`
--
ALTER TABLE `sr_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr_questions`
--
ALTER TABLE `sr_questions`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `sr_services`
--
ALTER TABLE `sr_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr_services_new`
--
ALTER TABLE `sr_services_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_academics`
--
ALTER TABLE `user_academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_exps`
--
ALTER TABLE `user_exps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_milestones`
--
ALTER TABLE `user_milestones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_roles`
--
ALTER TABLE `access_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us_queries`
--
ALTER TABLE `contact_us_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_history`
--
ALTER TABLE `credit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer_query`
--
ALTER TABLE `customer_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `cust_prof_chats`
--
ALTER TABLE `cust_prof_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `email_otps`
--
ALTER TABLE `email_otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gig_orders`
--
ALTER TABLE `gig_orders`
  MODIFY `gorder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investor_queries`
--
ALTER TABLE `investor_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_professionals`
--
ALTER TABLE `join_professionals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;

--
-- AUTO_INCREMENT for table `lead_staffs`
--
ALTER TABLE `lead_staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `my_leads`
--
ALTER TABLE `my_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professional_gigs`
--
ALTER TABLE `professional_gigs`
  MODIFY `gig_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_leads`
--
ALTER TABLE `professional_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_portfolios`
--
ALTER TABLE `professional_portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `professional_reviews`
--
ALTER TABLE `professional_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_requirements`
--
ALTER TABLE `project_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sp_country`
--
ALTER TABLE `sp_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `sp_skills`
--
ALTER TABLE `sp_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `sr_answers`
--
ALTER TABLE `sr_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `sr_pages`
--
ALTER TABLE `sr_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sr_questions`
--
ALTER TABLE `sr_questions`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sr_services`
--
ALTER TABLE `sr_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sr_services_new`
--
ALTER TABLE `sr_services_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_academics`
--
ALTER TABLE `user_academics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_exps`
--
ALTER TABLE `user_exps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_milestones`
--
ALTER TABLE `user_milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
