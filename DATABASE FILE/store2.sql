-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 03:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` varchar(45) CHARACTER SET utf8 NOT NULL,
  `privacy_policy` varchar(3000) CHARACTER SET utf8 NOT NULL,
  `version` varchar(255) CHARACTER SET utf8 NOT NULL,
  `downloads_count` varchar(45) NOT NULL,
  `about` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(45) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `name`, `date`, `privacy_policy`, `version`, `downloads_count`, `about`, `image`, `icon`) VALUES
(1, 'تمبلت TEMPLETE', '2022-09-29', 'سياسة الخصوصية الجديد', '3.9', '5090', 'موقع تمبلت هوموقع مميز يتيح تنزيل قوالب مجانا واخر اخبار التقنية والتكنولوجياوغيرها من المميزات.', 'logo-text-nav.png', 'logo-icon-nav.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`, `image`) VALUES
(1, 'omar', 'admin088@mail.com', '202cb962ac59075b964b07152d234b70', '2022-09-04 20:31:45', '2022-09-27', '2102143064.jpeg'),
(2, 'omar', 'omarkhamis088@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-09-04 18:53:31', '2022-10-01', 'IMG-20210930-WA0019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorize`
--

CREATE TABLE `categorize` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `cat_image` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorize`
--

INSERT INTO `categorize` (`cat_id`, `cat_name`, `cat_image`) VALUES
(6, 'microsoft_office', '2022001.jpg'),
(7, 'adobe', '2022002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(3) NOT NULL,
  `fullname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `data` varchar(300) NOT NULL,
  `date` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `done` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `fullname`, `email`, `Subject`, `data`, `date`, `user_id`, `done`) VALUES
(1, 'عمر خميس', 'omarkhamis088@gmail.com', 'مشكلة في رفع التطبيقات', 'اواجه مشكلة في رفع التطبيقات ارجو المساعدة', '', 0, ''),
(2, 'عمر خميس', 'omarkhamis088@gmail.com', 'رفع التطبيق', 'نيبيسهبايسخىبيسىي', '', 0, ''),
(3, 'عمر خميس', 'omarkhamis088@gmail.com', 'رفع التطبيق', 'نيبيسهبايسخىبيسىي', '', 0, '1'),
(4, 'عمر', 'omarkhamis088@gmail.com', 'صعوبة التنزيل', 'hiiiii', '', 0, '1'),
(5, 'عمر', '', '', '', '', 0, '1'),
(6, 'علي', '', '', '', '', 0, ''),
(7, 'رامي', 'rami@gmail.com', 'تحديث', 'التحديث الاخير يوجد فيه عيوب', '', 0, ''),
(8, 'علي عبدالكريم', 'user2@gmail.com', 'صعوبة التنزيل', 'مقدرت ارفع حاجة', '25-09-2022 12:23:24', 40, ''),
(9, 'سهيل', 'suheel@gmail.com', 'صعوبة التنزيل', 'لا استطيع رفع أي قالب', '29-09-2022 02:05:18', 47, '1');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_categorize`
--

CREATE TABLE `main_categorize` (
  `m_cat_id` int(4) NOT NULL,
  `m_cat_name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `m_cat_image` varchar(300) CHARACTER SET utf8 NOT NULL,
  `cat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_categorize`
--

INSERT INTO `main_categorize` (`m_cat_id`, `m_cat_name`, `m_cat_image`, `cat_id`) VALUES
(1, 'Word', '2022003.png', 6),
(2, 'Excel', '2022004.png', 6),
(3, 'PowerPoint', '2022005.png', 6),
(4, 'Access', '2022006.png', 6),
(5, 'Photoshop', '2022007.png', 7),
(6, 'Illustrator', '2022008.png', 7),
(7, 'Premier', '2022009.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `news_data` varchar(255) CHARACTER SET utf8 NOT NULL,
  `news_date` varchar(45) CHARACTER SET utf8 NOT NULL,
  `news_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `news_type` varchar(300) CHARACTER SET utf8 NOT NULL,
  `udate` varchar(45) CHARACTER SET utf8 NOT NULL,
  `option` varchar(2) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `news_data`, `news_date`, `news_image`, `news_type`, `udate`, `option`) VALUES
(2, 'Samsung Galaxy Note 3 Not', 'The Samsung Galaxy Note 3 Neo is an Android phablet smartphone produced by Samsung Electronics. mmm           The Galaxy Note 3 Neo was unveiled by Samsung Poland on February 1, 2014, with its..', '13-09-2022 12:13:44', '412529896.jpeg', 'إعلان', '01-10-2022 12:22:01', '1'),
(3, 'Smart Phones', 'A smartphone is a mobile phone with an advanced mobile operating system which combines features of            a personal computer operating system with other..', '13-09-2022 12:13:44', '929011599.jpeg', 'إعلان', '25-09-2022 11:06:35', '0'),
(4, 'Google Messenger', 'Stay in touch with friends and family. Messenger from Google is a\r\n            communications app that helps you send and receive SMS and MMS messages to any phone.', '13-09-2022 12:13:44', '1125787903.jpeg', 'إعلان', '30-09-2022 12:00:30', '0'),
(5, 'ايفون 14', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2024', '13-09-2022 12:13:44', '', 'إعلان', '30-09-2022 12:00:53', '0'),
(8, 'ايفون 14', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2022', '13-09-2022 12:17:47', '', 'إعلان', '18-09-2022 08:53:30', '1'),
(9, 'ايفون 14+', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2022', '13-09-2022 12:21:24', '', 'خبر', '23-09-2022 07:32:55', '1'),
(10, 'ايفون 14', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2022', '13-09-2022 12:23:15', '', 'خبر', '', '0'),
(11, 'ايفون 14', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2022', '13-09-2022 12:38:32', '', 'إعلان', '', '0'),
(12, 'ايفون 14', 'اخر إصدارات شركة ابل للهواتف الذكية لعام 2022', '13-09-2022 12:39:18', '', 'إعلان', '', '0'),
(13, 'جالكسي اس 20', 'اخر إصدارات شركة سامسونج للهواتف الذكية لعام 2022', '30-09-2022 02:09:17', '2.png', 'خبر', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_views` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `total_views`) VALUES
(1, 1),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `visitor_ip` varchar(255) NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`visitor_ip`, `page_id`) VALUES
('::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templetes`
--

CREATE TABLE `templetes` (
  `id` int(11) NOT NULL,
  `templete_name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `templete_file` varchar(255) CHARACTER SET utf8 NOT NULL,
  `templete_desc` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `size` varchar(20) CHARACTER SET utf8 NOT NULL,
  `templete_date` varchar(45) CHARACTER SET utf8 NOT NULL,
  `m_cat_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templetes`
--

INSERT INTO `templetes` (`id`, `templete_name`, `templete_file`, `templete_desc`, `image`, `user_id`, `admin_id`, `size`, `templete_date`, `m_cat_id`) VALUES
(116, 'شهادة تقدير', '352476306.x-msdownload', 'good', '1034282393.png', 40, 0, '363.7177734375', '24-09-2022 10:51:58', 6),
(118, 'سيفي', '184404812.vnd.openxmlformats-officedocument.wordprocessingml.document', 'نموذج سيفي حديث', '1841756268.jpeg', 41, 0, '504.3203125', '25-09-2022 11:19:16', 1),
(119, 'كشف', '1276785808.vnd.openxmlformats-officedocument.wordprocessingml.document', 'كشف درجات', '1318195165.jpeg', 45, 0, '12.4208984375', '26-09-2022 08:46:28', 1),
(127, 'معهد', '1070015870.msaccess', 'نظام معهد', '1009801520.png', 42, 0, '305.9658203125', '26-09-2022 09:21:37', 4),
(128, 'شعار فلاتر', '1018534235.png', 'شعار فلااااااتر', '1360587643.png', 46, 0, '354.1513671875', '26-09-2022 10:26:13', 6),
(129, 'مدرسة', '1418514162.plain', 'قاعدة بيانات بسيطة', '1986073215.png', 47, 0, '226.9287109375', '29-09-2022 02:02:14', 4),
(130, 'بطاقة', '1435339033.vnd.openxmlformats-officedocument.wordprocessingml.document', 'بطاقة شخصية', '882395873.jpeg', 41, 0, '1377.587890625', '30-09-2022 03:23:46', 1),
(131, 'سيفي cv', '1656650453.png', 'نموذج سيفي حديث modern', '1204246791.jpeg', 41, 0, '1377.587890625', '01-10-2022 12:15:24', 6),
(132, 'النهاية', '783409909.pdf', 'النهاية', '1586559248.jpeg', 41, 0, '86.8662109375', '01-10-2022 12:53:23', 1),
(133, 'النهاية', '420921719.png', 'النهاية 2221', '1526293083.jpeg', 41, 0, '1377.587890625', '01-10-2022 12:57:07', 2),
(134, 'النهاية', '1730922674.png', 'النهاية 2022 ', '444273063.jpeg', 41, 0, '1377.587890625', '01-10-2022 12:59:35', 3),
(135, 'النهاية', '1030535206.png', 'النهاية 2024  ', '1500910107.png', 41, 0, '226.9287109375', '01-10-2022 01:02:04', 1),
(136, 'temp', '614433863.png', 'النهاية 2029        ', '50352426.jpeg', 41, 0, '1377.587890625', '01-10-2022 01:14:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tz_who_is_online`
--

CREATE TABLE `tz_who_is_online` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` int(11) NOT NULL DEFAULT 0,
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `countrycode` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(9, 10, 'terry@mail.com', 0x3a3a31, '', '', '2021-03-05 04:12:00'),
(10, 10, 'terry@mail.com', 0x3a3a31, '', '', '2021-03-05 04:14:44'),
(11, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-05 04:19:52'),
(12, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-05 08:53:33'),
(13, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-05 17:35:34'),
(14, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-06 02:43:01'),
(15, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-06 15:18:49'),
(16, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-07 09:35:23'),
(17, 21, 'ross@mail.com', 0x3a3a31, '', '', '2021-03-07 09:59:55'),
(18, 22, 'colin@gmail.com', 0x3a3a31, '', '', '2021-06-16 14:51:24'),
(19, 22, 'colin@gmail.com', 0x3a3a31, '', '', '2021-12-12 15:31:50'),
(20, 22, 'colin@gmail.com', 0x3a3a31, '', '', '2022-04-02 16:01:31'),
(21, 21, 'ross@mail.com', 0x3a3a31, '', '', '2022-04-02 16:52:47'),
(22, 20, 'richards@mail.com', 0x3a3a31, '', '', '2022-04-03 13:15:00'),
(23, 24, 'jennifer@mail.com', 0x3a3a31, '', '', '2022-04-03 14:32:09'),
(24, 24, 'jennifer@mail.com', 0x3a3a31, '', '', '2022-04-03 14:34:17'),
(25, 19, 'bruce@mail.com', 0x3a3a31, '', '', '2022-04-03 14:44:31'),
(26, 27, 'nancy@mail.com', 0x3a3a31, '', '', '2022-04-03 15:00:46'),
(27, 32, 'liamoore@mail.com', 0x3a3a31, '', '', '2022-04-03 15:48:35'),
(28, 32, 'liamoore@mail.com', 0x3a3a31, '', '', '2022-04-03 15:51:34'),
(29, 33, 'admin1@gmail.com', 0x3a3a31, '', '', '2022-08-09 06:54:56'),
(30, 33, 'admin1@gmail.com', 0x3a3a31, '', '', '2022-08-09 07:20:15'),
(31, 33, 'admin1@gmail.com', 0x3a3a31, '', '', '2022-09-06 19:16:37'),
(32, 34, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-06 19:19:14'),
(33, 34, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-06 19:25:46'),
(34, 34, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-06 19:30:41'),
(35, 33, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-09 19:20:20'),
(36, 33, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-09 19:57:42'),
(37, 34, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-09 20:02:44'),
(38, 34, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-19 19:11:09'),
(39, 34, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-22 19:54:34'),
(40, 34, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-25 19:28:17'),
(41, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-25 19:34:29'),
(42, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-25 20:12:01'),
(43, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-25 20:13:37'),
(44, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-25 20:14:11'),
(45, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-25 21:17:59'),
(46, 45, 'abdu@gmail.com', 0x3a3a31, '', '', '2022-09-26 18:45:01'),
(47, 42, 'ali@gmail.com', 0x3a3a31, '', '', '2022-09-26 19:20:54'),
(48, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-26 19:51:10'),
(49, 46, 'user@gmail.com', 0x3a3a31, '', '', '2022-09-26 20:17:14'),
(50, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-26 22:33:15'),
(51, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-27 18:38:47'),
(52, 40, 'user2@gmail.com', 0x3a3a31, '', '', '2022-09-27 20:44:45'),
(53, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-27 20:46:00'),
(54, 42, 'ali@gmail.com', 0x3a3a31, '', '', '2022-09-27 21:01:51'),
(55, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-28 19:28:32'),
(56, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-28 22:40:15'),
(57, 47, 'suheel@gmail.com', 0x3a3a31, '', '', '2022-09-29 11:59:20'),
(58, 47, 'suheel@gmail.com', 0x3a3a31, '', '', '2022-09-29 12:27:06'),
(59, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-29 21:21:11'),
(60, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-30 01:22:37'),
(61, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-30 20:24:46'),
(62, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-30 21:34:37'),
(63, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-30 22:49:11'),
(64, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-09-30 23:35:46'),
(65, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-10-01 00:01:52'),
(66, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-10-01 00:16:37'),
(67, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-10-01 00:57:55'),
(68, 41, 'mohammed@gmail.com', 0x3a3a31, '', '', '2022-10-01 01:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `user_id` int(11) NOT NULL,
  `regNo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) CHARACTER SET utf8 NOT NULL,
  `passUdateDate` varchar(45) CHARACTER SET utf8 NOT NULL,
  `admin_pass_updation_date` varchar(45) CHARACTER SET utf8 NOT NULL,
  `option` varchar(2) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`user_id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`, `admin_pass_updation_date`, `option`, `image`) VALUES
(40, '1011', 'anas', 'suldan', 'aldaylami', 'ذكر', 778454222, 'user2@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-24 20:20:51', '', '', '', '0', 'aaaaaaaa.png'),
(41, '1100', 'محمد', 'عبدالله', 'جوهر', 'ذكر', 775869922, 'mohammed@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-25 19:48:20', '', '30-09-2022 07:55:55', '', '1', 'clash.png'),
(42, '1110', 'علي', 'عبدالكريم', 'القباطي', 'ذكر', 77545698, 'ali@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-25 20:11:16', '', '', '', '1', 'app-icons-clashroyale.png'),
(43, '', 'صالح', '', 'الذيب', '', 0, 'rami@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-26 18:37:16', '', '', '', '', ''),
(44, '', 'سلطان', '', 'الديلمي', '', 0, 'osama@gmail.com', '698d51a19d8a121ce581499d7b701668', '2022-09-26 18:41:56', '', '', '', '', ''),
(45, '', 'عبده', 'علي', 'عبدالله', '', 0, 'abdu@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-26 18:44:44', '', '', '', '', ''),
(46, '', 'رضوان', 'احمد', 'النجار', 'ذكر', 778899444, 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-26 20:16:57', '26-09-2022 04:33:00', '', '', '', '1971452097.png'),
(47, '', 'سهيل', 'صادق', 'خميس', 'ذكر', 772938633, 'suheel@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-29 11:58:52', '29-09-2022 07:06:35', '', '', '', '1784700121.png'),
(48, '', 'رامي', 'صالح', 'الذيب', 'ذكر', 0, 'rami1@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2022-09-29 23:33:34', '', '', '', '', '640902020.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorize`
--
ALTER TABLE `categorize`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categorize`
--
ALTER TABLE `main_categorize`
  ADD PRIMARY KEY (`m_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `templetes`
--
ALTER TABLE `templetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`m_cat_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tz_who_is_online`
--
ALTER TABLE `tz_who_is_online`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`),
  ADD KEY `countrycode` (`countrycode`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorize`
--
ALTER TABLE `categorize`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_categorize`
--
ALTER TABLE `main_categorize`
  MODIFY `m_cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templetes`
--
ALTER TABLE `templetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tz_who_is_online`
--
ALTER TABLE `tz_who_is_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_categorize`
--
ALTER TABLE `main_categorize`
  ADD CONSTRAINT `main_categorize_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorize` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_views`
--
ALTER TABLE `page_views`
  ADD CONSTRAINT `page_views_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `templetes`
--
ALTER TABLE `templetes`
  ADD CONSTRAINT `templetes_ibfk_3` FOREIGN KEY (`m_cat_id`) REFERENCES `main_categorize` (`m_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `templetes_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `userregistration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
