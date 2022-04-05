-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 05, 2022 at 03:53 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@admin.com', 'admin', 1),
(2, 'field@field.com', 'field', 2),
(3, 'player@player.com', 'player', 3),
(4, 'kickoff@kickoff.com', 'kickoff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `writer` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `date`, `text`, `image`, `writer`, `writer_id`) VALUES
(1, 'Testingggg', '2022-02-04', '<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>\r\n<p>This is testing for article.</p>\r\n<p>hope u enjoy it! thank u</p>', 'Screen_Shot_2021-12-28_at_11_46_52_PM.png', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `poster` varchar(255) NOT NULL,
  `field_id` int(11) NOT NULL,
  `form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `desc`, `start`, `end`, `poster`, `field_id`, `form`) VALUES
(1, 'Turnamenttttt', 'Come and Join!', '2022-03-31', '2022-02-13', 'Screen_Shot_2021-12-28_at_11_50_07_PM.png', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gallery` text NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`, `desc`, `address`, `phone`, `gallery`, `bank`, `bank_account`, `bank_name`, `account_id`, `photo`) VALUES
(1, 'Gallery Futsal', 'asdasd asdas\r\n dasd asd asd as', 'Sukabirus, Bandung', '1313213213', 'field.png', 'BCA', '2881727', 'Gallery Futsal', 2, 'field.png'),
(2, 'Kick Off Futsal', 'asdasd asdas\r\n dasd asd asd as', 'Sukabirus, Bandung', '1313213213', 'field.png', 'Mandiri', '888271728', 'Kosasih', 4, 'field.png');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `address`, `phone`, `account_id`) VALUES
(1, 'Player', 'PBB D43, Bandung', '123123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `type_field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price`, `start`, `end`, `type_field_id`) VALUES
(1, 70000, 0, 17, 1),
(2, 120000, 18, 23, 1),
(3, 50000, 0, 17, 2),
(4, 90000, 18, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `pay_off` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_type_id` int(11) NOT NULL,
  `bill_file` varchar(255) NOT NULL,
  `rent_bank` varchar(255) NOT NULL,
  `rent_bank_account` varchar(255) NOT NULL,
  `rent_bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `date`, `start`, `end`, `dp`, `pay_off`, `total`, `status`, `account_id`, `type`, `field_id`, `field_type_id`, `bill_file`, `rent_bank`, `rent_bank_account`, `rent_bank_name`) VALUES
(1, '2022-03-21', 15, 17, 70000, 70000, 140000, 1, 3, 1, 1, 1, 'Screen_Shot_2022-03-16_at_12_21_50_AM1.png', 'BCA', '11221122', 'Dihajum'),
(2, '2022-03-21', 15, 17, 50000, 50000, 100000, 1, 3, 1, 1, 2, 'Screen_Shot_2022-02-11_at_1_44_31_PM.png', 'BCA', '11221122', 'Dihajum');

-- --------------------------------------------------------

--
-- Table structure for table `type_field`
--

CREATE TABLE `type_field` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_field`
--

INSERT INTO `type_field` (`id`, `type`, `photo`, `field_id`) VALUES
(1, 'Sintetis Besar', '57621_bmth-vs-coldplay1.jpeg', 2),
(2, 'Sintetis Kecil', '57621_bmth-vs-coldplay1.jpeg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_field`
--
ALTER TABLE `type_field`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_field`
--
ALTER TABLE `type_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
