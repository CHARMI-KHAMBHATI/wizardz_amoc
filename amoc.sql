-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 04:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentsection`
--

CREATE TABLE `commentsection` (
  `cid` int(11) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentsection`
--

INSERT INTO `commentsection` (`cid`, `oauth_uid`, `cdate`, `message`) VALUES
(1, '118291610618829129804', '2017-04-03 18:46:46', 'this is a comment'),
(2, '111446818760770779627', '2017-04-04 09:56:51', 'this was my comment.');

-- --------------------------------------------------------

--
-- Table structure for table `comment_images`
--

CREATE TABLE `comment_images` (
  `comment_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `img_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_images`
--

INSERT INTO `comment_images` (`comment_id`, `description`, `oauth_uid`, `img_id`, `comment_date`) VALUES
(1, 'wwGw', '111446818760770779627', 10, '0000-00-00 00:00:00'),
(2, 'ah! memories', '111446818760770779627', 8, '0000-00-00 00:00:00'),
(3, 'this too.', '111446818760770779627', 8, '0000-00-00 00:00:00'),
(9, 'WWg', '111446818760770779627', 8, '0000-00-00 00:00:00'),
(16, 'trial', '111446818760770779627', 9, '0000-00-00 00:00:00'),
(20, 'ye hui na baat', '111446818760770779627', 8, '0000-00-00 00:00:00'),
(21, 'pooja try', '111446818760770779627', 8, '0000-00-00 00:00:00'),
(22, 'i want this so much', '111446818760770779627', 3, '0000-00-00 00:00:00'),
(23, 'ye comment hai', '111446818760770779627', 4, '0000-00-00 00:00:00'),
(24, 'binal', '102561184068969482919', 4, '0000-00-00 00:00:00'),
(25, 'the main comment  by charmi', '111446818760770779627', 4, '0000-00-00 00:00:00'),
(26, 'ayushi', '118291610618829129804', 8, '0000-00-00 00:00:00'),
(27, 'comment_try', '111446818760770779627', 8, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(30) NOT NULL,
  `path` varchar(50) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `used_for` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`img_id`, `img_name`, `path`, `oauth_uid`, `description`, `price`, `type`, `used_for`, `name`, `upload_date`) VALUES
(2, 'ev5__.jpg', 'uploads/ev5__.jpg', '111446818760770779627', 'write', '5', 'pencil', 'everyone', 'pencil', '0000-00-00 00:00:00'),
(3, 'ev3_.jpg', 'uploads/ev3_.jpg', '111446818760770779627', 'hd.lqch?', '500', 'rubber', 'pulh', 'xyz', '0000-00-00 00:00:00'),
(4, 'envhk_.jpg', 'uploads/envhk_.jpg', '111446818760770779627', 'YVZw', '78', 'XALCB', 'KCAB. ', 'BALC l', '0000-00-00 00:00:00'),
(5, 'ev2.jpg', 'uploads/ev2.jpg', '118291610618829129804', 'AHBWA', '45', 'vVe', 'Va', 'FQ', '0000-00-00 00:00:00'),
(8, 'ev6.jpeg', 'uploads/ev6.jpeg', '118291610618829129804', 'aS B ', '50', 'kwcbas/', 'ca ba', 'fbc', '0000-00-00 00:00:00'),
(9, 'ev6_.jpg', 'uploads/ev6_.jpg', '118291610618829129804', 'ewBWB', '67', 'abABW', 'za b', ' AB', '0000-00-00 00:00:00'),
(10, 'ev7_.jpg', 'uploads/ev7_.jpg', '118291610618829129804', 'qABW ', '67', 'BSWBN', 'AB ', 'AB ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `replycomments`
--

CREATE TABLE `replycomments` (
  `rid` int(11) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `rdate` datetime NOT NULL,
  `rmessage` text NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replycomments`
--

INSERT INTO `replycomments` (`rid`, `oauth_uid`, `rdate`, `rmessage`, `cid`) VALUES
(1, '111446818760770779627', '2017-04-04 10:00:37', 'so is this ok?', 1),
(2, '111446818760770779627', '2017-04-04 10:13:31', 'this must work', 1),
(3, '111446818760770779627', '2017-04-04 13:42:22', 'try', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment_img`
--

CREATE TABLE `reply_comment_img` (
  `reply_id` int(11) NOT NULL,
  `reply_msg` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_comment_img`
--

INSERT INTO `reply_comment_img` (`reply_id`, `reply_msg`, `oauth_uid`, `comment_id`, `reply_date`) VALUES
(1, 'chk', '111446818760770779627', 2, '0000-00-00 00:00:00'),
(2, 'ye le!', '111446818760770779627', 2, '0000-00-00 00:00:00'),
(3, 'so r we done?', '111446818760770779627', 20, '0000-00-00 00:00:00'),
(4, 'charmi', '111446818760770779627', 21, '0000-00-00 00:00:00'),
(5, 'xyz', '111446818760770779627', 9, '0000-00-00 00:00:00'),
(6, 'bhbn', '111446818760770779627', 21, '0000-00-00 00:00:00'),
(7, 'WWE', '111446818760770779627', 9, '0000-00-00 00:00:00'),
(8, 'heya', '111446818760770779627', 1, '0000-00-00 00:00:00'),
(9, 'esdb', '111446818760770779627', 1, '0000-00-00 00:00:00'),
(10, 'this was from ayushi', '118291610618829129804', 16, '0000-00-00 00:00:00'),
(11, 'ayushi', '118291610618829129804', 16, '0000-00-00 00:00:00'),
(12, 'try', '118291610618829129804', 2, '0000-00-00 00:00:00'),
(13, 'chk plzzz', '118291610618829129804', 2, '0000-00-00 00:00:00'),
(14, 'try plzz', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(15, 'tydwsv', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(16, 'abaWaq', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(17, 'abaWaq', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(18, 'abaWaq', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(19, 'paka mt ayu', '111446818760770779627', 21, '0000-00-00 00:00:00'),
(20, 'yecreply hai', '111446818760770779627', 23, '0000-00-00 00:00:00'),
(21, 'ye reply ka reply hai', '102561184068969482919', 23, '0000-00-00 00:00:00'),
(22, 'ye reply ka reply hai', '102561184068969482919', 23, '0000-00-00 00:00:00'),
(23, 'binal ka reply', '102561184068969482919', 24, '0000-00-00 00:00:00'),
(24, 'trial binal', '102561184068969482919', 23, '0000-00-00 00:00:00'),
(25, 'sai kuch kr', '102561184068969482919', 23, '0000-00-00 00:00:00'),
(26, 'charmi ka reply', '111446818760770779627', 24, '0000-00-00 00:00:00'),
(27, 'charmi ka reply', '111446818760770779627', 23, '0000-00-00 00:00:00'),
(28, 'is this working?', '118291610618829129804', 21, '0000-00-00 00:00:00'),
(29, 'reply ayushi', '118291610618829129804', 23, '0000-00-00 00:00:00'),
(30, 'once again', '118291610618829129804', 23, '0000-00-00 00:00:00'),
(31, 'ye hua k nai ?', '118291610618829129804', 1, '0000-00-00 00:00:00'),
(32, 'yes!', '111446818760770779627', 23, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '111446818760770779627', 'Charmi', 'Khambhati', 'incharmi.ck@gmail.com', 'other', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/111446818760770779627', '2017-03-21 14:05:25', '2017-04-04 16:15:11'),
(2, 'google', '118291610618829129804', 'ayushi', 'solanki', 'ayupsol1@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-HxZ2FWXis50/AAAAAAAAAAI/AAAAAAAAAN0/xxFAvj6AVXU/photo.jpg', 'https://plus.google.com/118291610618829129804', '2017-03-24 09:00:23', '2017-04-03 13:47:48'),
(3, 'google', '102561184068969482919', 'Binal', 'Patel', 'binyashpatel@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-03-30 19:59:22', '2017-03-30 20:07:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentsection`
--
ALTER TABLE `commentsection`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comment_images`
--
ALTER TABLE `comment_images`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `replycomments`
--
ALTER TABLE `replycomments`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `reply_comment_img`
--
ALTER TABLE `reply_comment_img`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentsection`
--
ALTER TABLE `commentsection`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment_images`
--
ALTER TABLE `comment_images`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `replycomments`
--
ALTER TABLE `replycomments`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reply_comment_img`
--
ALTER TABLE `reply_comment_img`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
