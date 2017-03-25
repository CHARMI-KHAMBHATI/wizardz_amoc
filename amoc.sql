-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 02:34 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `oauth_uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `oauth_uid`, `date`, `message`) VALUES
(3, '1', '2017-03-24 17:30:12', 'ESZJNSZB'),
(9, '1', '2017-03-24 17:32:31', 'vqab'),
(10, '1', '2017-03-24 17:32:37', 'awh'),
(11, '1', '2017-03-24 17:43:47', 'qenabw'),
(12, '1', '2017-03-24 17:44:15', 'smtsbs'),
(13, '1', '2017-03-24 17:45:48', 'srnwvree'),
(14, '1', '2017-03-24 17:48:13', 'chk'),
(15, '1', '2017-03-25 13:50:07', 'hi all'),
(16, '1', '2017-03-25 13:50:07', 'hi all'),
(17, '1', '2017-03-25 13:53:39', 'wher are you?'),
(18, '1', '2017-03-25 13:53:39', 'wher are you?'),
(19, '1', '2017-03-25 13:54:08', 'hi wegdjhegfhf'),
(20, '1', '2017-03-25 13:54:08', 'hi wegdjhegfhf'),
(21, '1', '2017-03-25 13:54:22', 'gbcgv'),
(22, '1', '2017-03-25 13:54:22', 'gbcgv'),
(23, '1', '2017-03-25 13:54:22', 'gbcgv'),
(24, '1', '2017-03-25 13:57:59', 'shfjdshfj'),
(25, '1', '2017-03-25 13:57:59', 'shfjdshfj');

-- --------------------------------------------------------

--
-- Table structure for table `comment_images`
--

CREATE TABLE `comment_images` (
  `comment_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_images`
--

INSERT INTO `comment_images` (`comment_id`, `description`, `oauth_uid`, `img_id`) VALUES
(1, 'wwGw', '111446818760770779627', 10),
(2, 'ah! memories', '111446818760770779627', 8),
(3, 'this too.', '111446818760770779627', 8),
(9, 'WWg', '111446818760770779627', 8),
(16, 'trial', '111446818760770779627', 9),
(20, 'ye hui na baat', '111446818760770779627', 8),
(21, 'pooja try', '111446818760770779627', 8);

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
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`img_id`, `img_name`, `path`, `oauth_uid`, `description`, `price`, `type`, `used_for`, `name`) VALUES
(2, 'ev5__.jpg', 'uploads/ev5__.jpg', '111446818760770779627', 'write', '5', 'pencil', 'everyone', 'pencil'),
(3, 'ev3_.jpg', 'uploads/ev3_.jpg', '111446818760770779627', 'hd.lqch?', '500', 'rubber', 'pulh', 'xyz'),
(4, 'envhk_.jpg', 'uploads/envhk_.jpg', '111446818760770779627', 'YVZw', '78', 'XALCB', 'KCAB. ', 'BALC l'),
(5, 'ev2.jpg', 'uploads/ev2.jpg', '118291610618829129804', 'AHBWA', '45', 'vVe', 'Va', 'FQ'),
(8, 'ev6.jpeg', 'uploads/ev6.jpeg', '118291610618829129804', 'aS B ', '56', 'kwcbas/', 'ca ba', 'fbc'),
(9, 'ev6_.jpg', 'uploads/ev6_.jpg', '118291610618829129804', 'ewBWB', '67', 'abABW', 'za b', ' AB'),
(10, 'ev7_.jpg', 'uploads/ev7_.jpg', '118291610618829129804', 'qABW ', '67', 'BSWBN', 'AB ', 'AB ');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment_img`
--

CREATE TABLE `reply_comment_img` (
  `reply_id` int(11) NOT NULL,
  `reply_msg` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_comment_img`
--

INSERT INTO `reply_comment_img` (`reply_id`, `reply_msg`, `oauth_uid`, `comment_id`) VALUES
(1, 'chk ', '111446818760770779627', 2),
(2, 'ye le!', '111446818760770779627', 2),
(3, 'so r we done?', '111446818760770779627', 20),
(4, 'charmi', '111446818760770779627', 21),
(5, 'xyz', '111446818760770779627', 9),
(6, 'bhbn', '111446818760770779627', 21);

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
(1, 'google', '111446818760770779627', 'Charmi', 'Khambhati', 'incharmi.ck@gmail.com', 'other', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/111446818760770779627', '2017-03-21 14:05:25', '2017-03-25 13:07:20'),
(2, 'google', '118291610618829129804', 'ayushi', 'solanki', 'ayupsol1@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-HxZ2FWXis50/AAAAAAAAAAI/AAAAAAAAAN0/xxFAvj6AVXU/photo.jpg', 'https://plus.google.com/118291610618829129804', '2017-03-24 09:00:23', '2017-03-24 13:39:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `comment_images`
--
ALTER TABLE `comment_images`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reply_comment_img`
--
ALTER TABLE `reply_comment_img`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
