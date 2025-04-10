-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2025 at 09:06 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `Classroom` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `hour`, `Classroom`) VALUES
(8, 'PHP', '21:00:00', 'Apex'),
(9, 'JS', '14:00:00', 'Sunbreak'),
(10, 'Vuex', '16:00:00', 'Sunrise'),
(11, 'Pinia', '18:00:00', 'NaN'),
(12, 'Node.js', '15:00:00', 'Morningstar');

-- --------------------------------------------------------

--
-- Table structure for table `classuserlink`
--

CREATE TABLE `classuserlink` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `class_id` int NOT NULL,
  `Added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `classuserlink`
--

INSERT INTO `classuserlink` (`id`, `user_id`, `class_id`, `Added`) VALUES
(35, 21, 8, '2025-04-10 09:01:54'),
(36, 21, 10, '2025-04-10 09:01:54'),
(37, 21, 12, '2025-04-10 09:01:54'),
(38, 22, 8, '2025-04-10 09:02:15'),
(39, 22, 9, '2025-04-10 09:02:15'),
(40, 22, 11, '2025-04-10 09:02:15'),
(41, 23, 8, '2025-04-10 09:02:47'),
(42, 23, 9, '2025-04-10 09:02:47'),
(43, 23, 10, '2025-04-10 09:02:47'),
(44, 24, 8, '2025-04-10 09:03:47'),
(45, 24, 9, '2025-04-10 09:03:47'),
(46, 24, 10, '2025-04-10 09:03:47'),
(47, 24, 11, '2025-04-10 09:03:47'),
(48, 24, 12, '2025-04-10 09:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `message` text NOT NULL,
  `is_error` tinyint(1) NOT NULL DEFAULT '0',
  `request_type` varchar(255) DEFAULT NULL,
  `request_body` text,
  `ip_address` varchar(45) DEFAULT 'unknown',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `message`, `is_error`, `request_type`, `request_body`, `ip_address`, `created_at`) VALUES
(1, 'Request to /users', 0, 'GET', '{\"id\":\"aaa\"}', '::1', '2025-04-04 03:11:17'),
(2, 'Request to /users', 0, 'GET', '{\"id\":\"aaa\"}', '::1', '2025-04-04 03:11:43'),
(3, 'Request to /users', 0, 'POST', '{\"id\":\"aaa\"}', '::1', '2025-04-04 03:13:22'),
(4, 'User is not logged', 1, NULL, NULL, '::1', '2025-04-04 03:13:22'),
(5, 'Request to /users', 0, 'GET', '{\"id\":\"aaa\"}', '::1', '2025-04-04 03:13:50'),
(6, 'User is not logged', 1, NULL, NULL, '::1', '2025-04-04 03:42:45'),
(7, 'Request to /users', 0, 'PATCH', '{\"id\":\"3\",\"name\":\"dddd\",\"email\":\"dddd\"}', '::1', '2025-04-04 03:48:39'),
(8, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-04 03:48:44'),
(9, 'Request to /users', 0, 'POST', '{\"name\":\"aaa\",\"email\":\"aaa\",\"password\":\"aaa\"}', '::1', '2025-04-04 03:48:46'),
(10, 'Request to /login', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-08 02:11:28'),
(11, 'Request to /login', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-08 02:55:03'),
(12, 'Request to /classes', 0, 'POST', '{\"name\":\"Chemistry\",\"hour\":\"09:00:00\",\"classroom\":\"F606\"}', '::1', '2025-04-08 02:55:25'),
(13, 'Request to /classes', 0, 'GET', '{\"id\":1}', '::1', '2025-04-08 02:55:54'),
(14, 'Request to /classes', 0, 'PATCH', '{\"id\":1,\"name\":\"Advanced Chemistry\",\"hour\":\"10:30:00\",\"classroom\":\"G707\"}', '::1', '2025-04-08 02:56:13'),
(15, 'Request to /classes', 0, 'DELETE', '{\"id\":1}', '::1', '2025-04-08 02:56:52'),
(16, 'Request to /classes', 0, 'POST', '{\"name\":\"Chemistry\",\"hour\":\"21:00:00\",\"classroom\":\"outpost\"}', '::1', '2025-04-08 04:02:52'),
(17, 'Request to /classes', 0, 'GET', '{\"id\":1}', '::1', '2025-04-08 04:03:39'),
(18, 'Request to /classes', 0, 'PATCH', '{\"id\":2,\"name\":\"test13\",\"hour\":\"13:33:00\",\"classroom\":\"goood\"}', '::1', '2025-04-08 04:04:34'),
(19, 'Request to /classes', 0, 'PATCH', '{\"id\":2,\"name\":\"test5\",\"hour\":\"11:44:00\",\"classroom\":\"marica\"}', '::1', '2025-04-08 23:16:16'),
(20, 'Request to /classes', 0, 'DELETE', '{\"id\":5}', '::1', '2025-04-08 23:36:06'),
(21, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 02:58:33'),
(22, 'Request to /classes', 0, 'GET', '{\"id\":1}', '::1', '2025-04-09 02:59:24'),
(23, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:12:55'),
(24, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:13:46'),
(25, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:14:25'),
(26, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:15:37'),
(27, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:18:13'),
(28, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:19:16'),
(29, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:19:42'),
(30, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:20:18'),
(31, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-09 03:21:09'),
(32, 'Request to /classes', 0, 'GET', '{\"id\":1}', '::1', '2025-04-09 03:33:07'),
(33, 'Request to /classes', 0, 'GET', '{\"id\":2}', '::1', '2025-04-09 03:33:11'),
(34, 'Request to /classes', 0, 'GET', '{\"id\":3}', '::1', '2025-04-09 03:33:17'),
(35, 'Request to /', 0, 'GET', NULL, '::1', '2025-04-10 06:31:02'),
(36, 'Request to /', 0, 'GET', NULL, '::1', '2025-04-10 06:31:08'),
(37, 'Request to /', 0, 'GET', NULL, '::1', '2025-04-10 06:31:09'),
(38, 'Request to /users', 0, 'POST', '{\"name\":\"aaa\",\"email\":\"aaa\",\"password\":\"aaa\",\"classes\":[1,2]}', '::1', '2025-04-10 06:37:01'),
(39, 'User is not logged', 1, NULL, NULL, '::1', '2025-04-10 06:37:01'),
(40, 'Request to /classes', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-10 06:37:32'),
(41, 'User is not logged', 1, NULL, NULL, '::1', '2025-04-10 06:37:32'),
(42, 'Request to /login', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-10 06:37:58'),
(43, 'Request to /users', 0, 'POST', '{\"name\":\"aaa\",\"email\":\"aaa\",\"password\":\"aaa\",\"classes\":[1,2]}', '::1', '2025-04-10 06:38:20'),
(44, 'Request to /users', 0, 'POST', '{\"name\":\"aaa\",\"email\":\"aaa\",\"password\":\"aaa\",\"classes\":[1,2]}', '::1', '2025-04-10 06:39:49'),
(45, 'Request to /users', 0, 'POST', '{\"name\":\"aaa\",\"email\":\"aaa\",\"password\":\"aaa\",\"classes\":[1,2]}', '::1', '2025-04-10 06:43:04'),
(46, 'Request to /users', 0, 'GET', '{\"id\":\"11\"}', '::1', '2025-04-10 06:43:21'),
(47, 'Request to /users', 0, 'PATCH', '{\"id\":\"3\",\"name\":\"dddd\",\"email\":\"dddd\",\"classes\":[2,3]}', '::1', '2025-04-10 06:53:40'),
(48, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-10 06:53:54'),
(49, 'Request to /users', 0, 'PATCH', '{\"id\":\"3\",\"name\":\"dddd\",\"email\":\"dddd\",\"classes\":[1]}', '::1', '2025-04-10 06:54:08'),
(50, 'Request to /users', 0, 'GET', '{\"id\":\"3\"}', '::1', '2025-04-10 06:54:14'),
(51, 'Request to /classes', 0, 'GET', '{\"id\":3}', '::1', '2025-04-10 06:57:08'),
(52, 'Request to /classes', 0, 'PATCH', '{\"id\":2,\"name\":\"test5\",\"hour\":\"11:44:00\",\"classroom\":\"marica\",\"users\":[10,11,13]}', '::1', '2025-04-10 07:09:03'),
(53, 'Request to /classes', 0, 'PATCH', '{\"id\":3,\"name\":\"test5\",\"hour\":\"11:44:00\",\"classroom\":\"marica\",\"users\":[6,7,4]}', '::1', '2025-04-10 07:10:21'),
(54, 'Request to /classes', 0, 'PATCH', '{\"id\":3,\"name\":\"bababa\",\"hour\":\"12:44:00\",\"classroom\":\"marica\",\"users\":[6,7,4]}', '::1', '2025-04-10 07:13:26'),
(55, 'Request to /classes', 0, 'DELETE', '{\"id\":4}', '::1', '2025-04-10 07:15:16'),
(56, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:18:06'),
(57, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:22:38'),
(58, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:23:09'),
(59, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:23:59'),
(60, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:26:42'),
(61, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:28:08'),
(62, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:28:59'),
(63, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:29:45'),
(64, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:30:02'),
(65, 'Request to /users', 0, 'DELETE', '{\"id\":11}', '::1', '2025-04-10 07:32:17'),
(66, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:32:50'),
(67, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:33:35'),
(68, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:34:14'),
(69, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:36:01'),
(70, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:36:23'),
(71, 'Request to /users', 0, 'POST', '{\"name\":\"pendejo\",\"email\":\"anao\",\"password\":\"aaa\",\"classes\":[1,3]}', '::1', '2025-04-10 07:47:24'),
(72, 'Request to /users', 0, 'POST', '{\"name\":\"baiano\",\"email\":\"babaaaaa\",\"password\":\"asd\",\"classes\":[1,2,3]}', '::1', '2025-04-10 07:48:13'),
(73, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"oiaso\",\"email\":\"danao\",\"classes\":[1]}', '::1', '2025-04-10 07:50:12'),
(74, 'Request to /users', 0, 'GET', '{\"id\":\"13\"}', '::1', '2025-04-10 07:50:28'),
(75, 'Request to /users', 0, 'DELETE', '{\"id\":\"11\"}', '::1', '2025-04-10 07:50:46'),
(76, 'Request to /users', 0, 'DELETE', '{\"id\":\"12\"}', '::1', '2025-04-10 07:50:52'),
(77, 'Request to /classes', 0, 'POST', '{\"name\":\"baianisse\",\"hour\":\"21:00:00\",\"classroom\":\"apex\"}', '::1', '2025-04-10 07:51:25'),
(78, 'Request to /classes', 0, 'DELETE', '{\"id\":6}', '::1', '2025-04-10 07:51:35'),
(79, 'Request to /classes', 0, 'PATCH', '{\"id\":3,\"name\":\"broooo\",\"hour\":\"11:52:00\",\"classroom\":\"marica\"}', '::1', '2025-04-10 07:51:59'),
(80, 'Request to /classes', 0, 'GET', '{\"id\":3}', '::1', '2025-04-10 07:52:14'),
(81, 'Request to /login', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-10 08:02:03'),
(82, 'Failed login attempt', 1, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-10 08:02:03'),
(83, 'Request to /login', 0, 'POST', '{\"email\":\"dddd\",\"password\":\"dddd\"}', '::1', '2025-04-10 08:02:35'),
(84, 'Failed login attempt', 1, 'POST', '{\"email\":\"dddd\",\"password\":\"dddd\"}', '::1', '2025-04-10 08:02:35'),
(85, 'Request to /login', 0, 'POST', '{\"email\":\"dddd\",\"password\":\"teste\"}', '::1', '2025-04-10 08:03:11'),
(86, 'Failed login attempt', 1, 'POST', '{\"email\":\"dddd\",\"password\":\"teste\"}', '::1', '2025-04-10 08:03:11'),
(87, 'Request to /login', 0, 'POST', '{\"email\":\"babaaaaa\",\"password\":\"asd\"}', '::1', '2025-04-10 08:03:37'),
(88, 'Failed login attempt', 1, 'POST', '{\"email\":\"babaaaaa\",\"password\":\"asd\"}', '::1', '2025-04-10 08:03:37'),
(89, 'Request to /login', 0, 'POST', '{\"email\":\"danao\",\"password\":\"asd\"}', '::1', '2025-04-10 08:03:48'),
(90, 'Request to /users', 0, 'POST', '{\"name\":\"baiano\",\"email\":\"babaaaaa\",\"password\":\"asd\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:04:04'),
(91, 'Request to /users', 0, 'POST', '{\"name\":\"baiano\",\"email\":\"babaaaaa\",\"password\":\"asd\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:04:23'),
(92, 'Request to /users', 0, 'POST', '{\"name\":\"baianoo\",\"email\":\"babaaaaa\",\"password\":\"asd\",\"permission\":\"viewer\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:09:12'),
(93, 'Request to /users', 0, 'POST', '{\"name\":\"baianoio\",\"email\":\"babaaaaa\",\"password\":\"asd\",\"permission\":\"viewer\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:12:36'),
(94, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"ndavei\",\"classes\":[1]}', '::1', '2025-04-10 08:15:52'),
(95, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"ndavei\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:16:30'),
(96, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"ndavei\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:17:24'),
(97, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"ndavei\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:18:35'),
(98, 'Request to /logout', 0, 'POST', '{\"email\":\"teste\",\"password\":\"teste\"}', '::1', '2025-04-10 08:19:18'),
(99, 'Request to /logout', 0, 'POST', NULL, '::1', '2025-04-10 08:19:53'),
(100, 'Request to /users', 0, 'POST', '{\"name\":\"disgraca\",\"email\":\"disgraca\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:20:21'),
(101, 'User is not logged', 1, NULL, NULL, '::1', '2025-04-10 08:20:21'),
(102, 'Request to /login', 0, 'POST', '{\"email\":\"danao\",\"password\":\"asd\"}', '::1', '2025-04-10 08:20:32'),
(103, 'Failed login attempt', 1, 'POST', '{\"email\":\"danao\",\"password\":\"asd\"}', '::1', '2025-04-10 08:20:32'),
(104, 'Request to /login', 0, 'POST', '{\"email\":\"dddd\",\"password\":\"dddd\"}', '::1', '2025-04-10 08:21:53'),
(105, 'Failed login attempt', 1, 'POST', '{\"email\":\"dddd\",\"password\":\"dddd\"}', '::1', '2025-04-10 08:21:53'),
(106, 'Request to /users', 0, 'POST', '{\"name\":\"disgraca\",\"email\":\"disgraca\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:22:19'),
(107, 'Request to /login', 0, 'POST', '{\"email\":\"disgraca\",\"password\":\"123\"}', '::1', '2025-04-10 08:22:43'),
(108, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"ndavei\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:23:12'),
(109, 'Request to /users', 0, 'POST', '{\"name\":\"disgracaa\",\"email\":\"disgracaa\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:27:42'),
(110, 'Request to /users', 0, 'POST', '{\"name\":\"disgracaaa\",\"email\":\"disgracaaa\",\"password\":\"123\",\"permission\":\"admin\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:28:53'),
(111, 'Request to /users', 0, 'POST', '{\"name\":\"disgracaaa\",\"email\":\"disgracaaa\",\"password\":\"123\",\"permission\":\"admin\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:29:16'),
(112, 'Request to /logout', 0, 'POST', NULL, '::1', '2025-04-10 08:29:33'),
(113, 'Request to /login', 0, 'POST', '{\"email\":\"disgracaaa\",\"password\":\"123\"}', '::1', '2025-04-10 08:29:38'),
(114, 'Request to /users', 0, 'POST', '{\"name\":\"disgracaaa\",\"email\":\"disgracaaa\",\"password\":\"123\",\"permission\":\"admin\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:29:50'),
(115, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"disgracaaa\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:30:38'),
(116, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"disgracaaaa\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:30:44'),
(117, 'Request to /users', 0, 'PATCH', '{\"id\":\"13\",\"name\":\"opora\",\"email\":\"disgracaaaa\",\"classes\":[1],\"permission\":\"viewer\"}', '::1', '2025-04-10 08:30:54'),
(118, 'Request to /users', 0, 'POST', '{\"name\":\"disgracaaa\",\"email\":\"disgracaaaa\",\"password\":\"123\",\"permission\":\"admin\",\"classes\":[1,2,3]}', '::1', '2025-04-10 08:31:09'),
(119, 'Request to /classes', 0, 'GET', '{\"id\":3}', '::1', '2025-04-10 08:33:32'),
(120, 'Request to /classes', 0, 'PATCH', '{\"id\":3,\"name\":\"maricon\",\"hour\":\"11:52:00\",\"classroom\":\"maricaa\"}', '::1', '2025-04-10 08:33:48'),
(121, 'Request to /classes', 0, 'GET', '{\"id\":3}', '::1', '2025-04-10 08:33:51'),
(122, 'Request to /classes', 0, 'POST', '{\"name\":\"sacanagem\",\"hour\":\"21:00:00\",\"classroom\":\"phpzin\"}', '::1', '2025-04-10 08:34:03'),
(123, 'Request to /classes', 0, 'DELETE', '{\"id\":7}', '::1', '2025-04-10 08:34:19'),
(124, 'Request to /classes', 0, 'POST', '{\"name\":\"PHP\",\"hour\":\"21:00:00\",\"classroom\":\"Apex\"}', '::1', '2025-04-10 08:58:33'),
(125, 'Request to /classes', 0, 'POST', '{\"name\":\"JS\",\"hour\":\"14:00:00\",\"classroom\":\"Sunbreak\"}', '::1', '2025-04-10 08:58:44'),
(126, 'Request to /classes', 0, 'POST', '{\"name\":\"Vuex\",\"hour\":\"16:00:00\",\"classroom\":\"Sunrise\"}', '::1', '2025-04-10 08:58:53'),
(127, 'Request to /classes', 0, 'POST', '{\"name\":\"Pinia\",\"hour\":\"18:00:00\",\"classroom\":\"NaN\"}', '::1', '2025-04-10 08:59:11'),
(128, 'Request to /classes', 0, 'POST', '{\"name\":\"Node.js\",\"hour\":\"15:00:00\",\"classroom\":\"Morningstar\"}', '::1', '2025-04-10 08:59:46'),
(129, 'Request to /users', 0, 'POST', '{\"name\":\"Ayumu\",\"email\":\"ayuuu@mail.com\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[8,10,12]}', '::1', '2025-04-10 09:01:54'),
(130, 'Request to /users', 0, 'POST', '{\"name\":\"Otavio\",\"email\":\"oootaviu@mail.com\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[8,9,11]}', '::1', '2025-04-10 09:02:15'),
(131, 'Request to /users', 0, 'POST', '{\"name\":\"Brasil\",\"email\":\"patriabrasil@gmail.com\",\"password\":\"123\",\"permission\":\"viewer\",\"classes\":[8,9,10]}', '::1', '2025-04-10 09:02:47'),
(132, 'Request to /users', 0, 'POST', '{\"name\":\"Milad\",\"email\":\"M.torabi@gmail.com\",\"password\":\"123\",\"permission\":\"admin\",\"classes\":[8,9,10,11,12]}', '::1', '2025-04-10 09:03:47'),
(133, 'Request to /logout', 0, 'POST', NULL, '::1', '2025-04-10 09:04:13'),
(134, 'Request to /login', 0, 'POST', '{\"email\":\"M.torabi@gmail.com\",\"password\":\"123\"}', '::1', '2025-04-10 09:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `permission` enum('admin','viewer') NOT NULL DEFAULT 'admin',
  `type` enum('teacher','student') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `type`) VALUES
(2, 'Dercin Camisa10', 'Anderson@gmail.com', '$2y$10$N4o2U2ddyqP4FynNQOPCHeuGtvLMVEkp/LCC0cRWOqcObAlSU.K9a', 'viewer', 'teacher'),
(5, 'Mario Cabron', 'mario@gmail.com', '$2y$10$ayIDGMTfU2tlEE.CHNV27O9/155XISjYI5qmuHvjhf8pFlI.j/q6i', 'viewer', 'student'),
(21, 'Ayumu', 'ayuuu@mail.com', '$2y$10$i1z0hGSRMKxuCpnAoV8lneUSR7e4pW6f30LkVRez2/5EBm0id9qU2', 'viewer', 'student'),
(22, 'Otavio', 'oootaviu@mail.com', '$2y$10$jFejgilmHWkRbC6Wfrj.we2v5xg.3H0M/mrz07N93wuhWKCrwIuxe', 'viewer', 'student'),
(23, 'Brasil', 'patriabrasil@gmail.com', '$2y$10$2LYqyeEYh02o72dpf3wdR.vYmsc.OKiUr96rP5082idLLG2qcmF1i', 'viewer', 'student'),
(24, 'Milad', 'M.torabi@gmail.com', '$2y$10$YvQaX4KvS5fuEi35e97Ei.l2253NSs9.VyC.CqsFna5IdyNfwmaqG', 'admin', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `classuserlink`
--
ALTER TABLE `classuserlink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classuserlink`
--
ALTER TABLE `classuserlink`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classuserlink`
--
ALTER TABLE `classuserlink`
  ADD CONSTRAINT `classuserlink_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classuserlink_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
