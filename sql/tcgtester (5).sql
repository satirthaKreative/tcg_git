-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 09:16 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcgtester`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise_image`
--

CREATE TABLE `advertise_image` (
  `id` int(11) NOT NULL,
  `adv_images` varchar(255) NOT NULL,
  `type_iv` varchar(150) NOT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertise_image`
--

INSERT INTO `advertise_image` (`id`, `adv_images`, `type_iv`, `image_status`) VALUES
(1, 'uploads/img_uploads/test.jpg', 'i', 1),
(2, 'uploads/img_uploads/download (1).jpg', 'i', 0),
(3, 'uploads/img_uploads/test.jpg', 'i', 1),
(10, 'uploads/video_uploads/test - Copy.mp4', 'v', 1),
(11, 'uploads/video_uploads/test.mp4', 'v', 0);

-- --------------------------------------------------------

--
-- Table structure for table `archetype_category`
--

CREATE TABLE `archetype_category` (
  `id` int(11) NOT NULL,
  `archetype_filter` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archetype_category`
--

INSERT INTO `archetype_category` (`id`, `archetype_filter`, `status`) VALUES
(1, 'Aggro', 1),
(2, 'Big Mana', 1),
(3, 'Tempo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `archetype_name`
--

CREATE TABLE `archetype_name` (
  `id` int(11) NOT NULL,
  `archetype_name` varchar(255) NOT NULL,
  `a_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archetype_name`
--

INSERT INTO `archetype_name` (`id`, `archetype_name`, `a_id`, `status`) VALUES
(1, 'Humans', 1, 1),
(2, 'Affinity', 1, 1),
(3, 'Grixis Death\'s Shadow', 3, 1),
(4, 'Amulet', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `communication_tbl`
--

CREATE TABLE `communication_tbl` (
  `id` int(11) NOT NULL,
  `communication_name` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `communication_tbl`
--

INSERT INTO `communication_tbl` (`id`, `communication_name`, `p_status`, `status`) VALUES
(1, 'Text Chat', 1, 1),
(2, 'Audio Chat', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `format_tbl`
--

CREATE TABLE `format_tbl` (
  `id` int(11) NOT NULL,
  `format_name` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `format_tbl`
--

INSERT INTO `format_tbl` (`id`, `format_name`, `p_status`, `status`) VALUES
(1, 'Standard', 1, 1),
(2, 'Modern', 1, 1),
(3, 'Legacy', 1, 1),
(4, 'Vintage', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `platform_tbl`
--

CREATE TABLE `platform_tbl` (
  `id` int(11) NOT NULL,
  `platform_name` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `platform_tbl`
--

INSERT INTO `platform_tbl` (`id`, `platform_name`, `p_status`, `status`) VALUES
(1, 'MTGA', 1, 1),
(2, 'MTGO', 1, 1),
(3, 'Cockatrice', 1, 1),
(4, 'Xmage', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `provider_data_tbl`
--

CREATE TABLE `provider_data_tbl` (
  `id` int(11) NOT NULL,
  `platform` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `archetype` int(11) NOT NULL,
  `timeframe` int(11) NOT NULL,
  `communication` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider_data_tbl`
--

INSERT INTO `provider_data_tbl` (`id`, `platform`, `format`, `archetype`, `timeframe`, `communication`, `user_id`, `status`) VALUES
(1, 2, 2, 2, 2, 1, 2, 1),
(2, 2, 2, 2, 2, 1, 2, 1),
(3, 2, 2, 2, 2, 1, 2, 1),
(4, 2, 2, 2, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg_font`
--

CREATE TABLE `reg_font` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `enc_pass` text NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `approve_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `about_des` longtext DEFAULT NULL,
  `active_state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_font`
--

INSERT INTO `reg_font` (`id`, `user_name`, `user_email`, `user_pass`, `enc_pass`, `admin_status`, `approve_status`, `status`, `about_des`, `active_state`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, '', 0),
(2, 'Satirtha', 'satirtha.kreative@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, NULL, 0),
(3, 'Satirtha', 'satirtha63@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, NULL, 0),
(4, 'Raj KM', 'raj@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requester_tbl`
--

CREATE TABLE `requester_tbl` (
  `id` int(11) NOT NULL,
  `platform` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `archetype` int(11) NOT NULL,
  `timeframe` int(11) NOT NULL,
  `communication` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requester_tbl`
--

INSERT INTO `requester_tbl` (`id`, `platform`, `format`, `archetype`, `timeframe`, `communication`, `user_id`, `status`) VALUES
(1, 1, 1, 1, 3, 1, 2, 1),
(2, 1, 1, 1, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_provider_tbl`
--

CREATE TABLE `time_provider_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `archetype_id` int(11) NOT NULL DEFAULT 0,
  `time_frame` varchar(255) DEFAULT NULL,
  `communication` varchar(255) DEFAULT NULL,
  `time_buy` varchar(255) DEFAULT NULL,
  `time_left` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `activity_state` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_details`
--

CREATE TABLE `user_payment_details` (
  `id` int(11) NOT NULL,
  `orderID` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `productInfo` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(255) DEFAULT NULL,
  `hashCode` longtext DEFAULT NULL,
  `transactionStatus` text DEFAULT NULL,
  `messageData` longtext NOT NULL,
  `userID` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payment_details`
--

INSERT INTO `user_payment_details` (`id`, `orderID`, `amount`, `productInfo`, `firstname`, `emailID`, `mobileNumber`, `hashCode`, `transactionStatus`, `messageData`, `userID`, `status`) VALUES
(1, 'Txn76919242', '6.00', 'P01,P02', 'Satirtha', 'satirtha.kreative@gmail.com', '9083701907', 'a74cb832c0cdde37b4cb0bcee4e3fc087e479c6737e08e2b085c6b9da0ccf87e3c56199a8afcd9e8795a9fb16f96b20970e01d18c89f9cee55a8ea4c586530f4', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(2, 'Txn39409981', '25.00', '15 min', 'Satirtha', 'satirtha.kreative@gmail.com', '9083702320', 'd4c50016594036d75cbbe03afeb4f7f5814f9ad65950208040f79d01712ababd94243bd9d477dbceb56946290491b140a58d8e40c49c23cae809402bc3a167eb', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(3, 'Txn1355619', '50.00', '30 min', 'Satirtha', 'satirtha.kreative@gmail.com', '9083702332', 'cb800f2a7c84f97c7b7645f0e22bd8afa8b9721ac181a7732bb03367411551c511c2c0dd89e17fdac8c190aa27c36d6615bcaba93011b95a839eb904692dff8c', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(4, 'Txn35280403', '25.00', '15 min', 'Satirtha', 'satirtha.kreative@gmail.com', '9083702380', '127dec11b24b2e6f0313611f63fa067af5e15520068db6fa35dd5fcb0bff5dc5870ede1fdaada5699351ec09fa9c97f685cd507c662d07c33e5f54bb3fb6e5ab', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(5, 'Txn78785236', '50.00', '30 min', 'Aditya', 'aditya.kreative@gmail.com', '9083702406', '23aff52dee61686ee3dae956085217ec20274c4c1a550e2207faf6ab2f0cb1b25ce5ec0c89e4f2a65a5447c3d5d7bc115da7244ead4c0f8095ce39496b22074e', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(6, 'Txn14984965', '100.00', '1 hours', 'satirtha', 'satirtha.kreative@gmail.com', '9083702521', '15cd189fa4dc0fa30e19f7ce75b4429835ba89fe2030453b1f7dbbbef73b99caae5afc6a3735f494be0d4b8e847b71d9c79cc64da3802907bbebf6bf3af00974', 'success', 'Transaction Successful and Hash Verified...', 4, 0),
(7, 'Txn9341630', '100.00', '1 hours', 'satirtha', 'satirtha.kreative@gmail.com', '9083702527', '271a87601b4c93c89635f2162c425f3c54326ad6d42655c7cbb6b472488eb5f9fe9c3e1d96d6b1047e72d470d61d551f0404a9a953f39a8466791d2184f510fa', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(8, 'Txn58723005', '25.00', '15 min', 'satirtha', 'satirtha.kreative@gmail.com', '9083702528', 'a23a8ec5dac2753f4f6c1ef01a4aa5123025b31de63c6e298c281569582ae6d1078d3986387f3faa88d094be2e82898a584f82afbb61a29eee54d8978af1a285', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(9, 'Txn73455119', '100.00', '1 hours', 'Raj', 'biki.kreative@gmail.com', '9083702533', '6127323b61447dffe4b09708e8ba56a7cbc782ab4a3f1d4172076676acac1796794a25e0ba0e7b9112b05ab59cbdd43184930fcd590ab201b0f1fc91b54ca1e8', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(10, 'Txn22539323', '200.00', '2 hours', 'Satirtha', 'satirtha.kreative@gmail.com', '9083702690', '7d6c0865bfe10f9e4277a2900724afa4e16f29a6b69dde6c9fddca98c5fb00ade0e2fd27d5f51e8bcd8c4db1053833cb692709f2b0ef96ac844f15d1ccc615a1', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(11, 'Txn13569700', '25.00', '15 min', 'saNTU', 'biki.kreative@gmail.com', '9083703066', 'ebff10623eb4b3b6d8c7c689b25ce6b5ba3b28f3132cd10e3f28b58f983a6f3651118d38c79f871b66fb1cd2c9b6a1283c35ac3ddcbdf541da3351e107d214fc', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(12, 'Txn45401450', '200.00', '2 hours', 'satirtha', 'biki.kreative@gmail.com', '9083703068', 'e56cb9b9265bd02f9e1c880a29f2f3be9df8a74e86be0dc27b5e52c69112e68c57fddd3773246908b095c683ce4ece44e34fbc918f2ab99f16ba2befddeee14a', 'success', 'Transaction Successful and Hash Verified...', 2, 0),
(13, 'Txn41977813', '200.00', '2 hours', 'dfaf', 'satirtha63@gmail.com', '9083703086', '3f42be15ea512c8d0719f10719e4ac678ac4c7a4ab4aca7b87fe8fb6228982a05295aa64f9a5ffe1f83da5b9f5aa9be04d1c12df142594736ed03294f01aa729', 'success', 'Transaction Successful and Hash Verified...', 4, 0),
(14, 'Txn63484269', '200.00', '2 hours', 'raj', 'satirtha.kreative@gmail.com', '9083703095', 'a3a1f29aa5386b52669a41748ecba9e1d0467a52e662ef4ebf98a4cecef4c1a9036e139cc3fcdd6df231ce6cca847802cce4497734787117651eb387474d6742', 'success', 'Transaction Successful and Hash Verified...', 4, 0),
(15, 'Txn89385942', '200.00', '2 hours', 'uigg', 'satirtha.kreative@gmail.com', '9083703099', '0f22e70a3e8e9f9f17b31b66afa9730dfece56309f3ff7cd248f829835d1e1f38bd035350cebf097a1c485207758c769bb59a1e080eb9041431d398f54fdc983', 'success', 'Transaction Successful and Hash Verified...', 4, 0),
(16, 'Txn23786103', '200.00', '2 hours', 'satirtha', 'satirtha.kreative@gmail.com', '9083703101', 'b850b95889ea55c60c6904d22a45835bfd331bfb7c1fa4cdd824b4700a8494e0af39753edb4e40c43d10a7aa1993ce01d72fccc6bd64490db9e9b920a008761b', 'success', 'Transaction Successful and Hash Verified...', 4, 0),
(17, 'Txn96810635', '200.00', '2 hours', 'satirtha', 'satirtha.kreative@gmail.com', '9083703103', 'c52422157f8a390f0ddae85b15fb5b0eb1dd74c049838016e6ab1ffb13a9189e3ccb9b77717b69a93e0e4829ebcc0fc1f71840ddd0ba31d31ec25587600f0034', 'success', 'Transaction Successful and Hash Verified...', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voult`
--

CREATE TABLE `voult` (
  `id` int(11) NOT NULL,
  `voult_total_time` varchar(255) NOT NULL,
  `time_in_second` varchar(255) NOT NULL,
  `time_in_minute` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voult`
--

INSERT INTO `voult` (`id`, `voult_total_time`, `time_in_second`, `time_in_minute`, `status`) VALUES
(1, '396', '1425600', '23760', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voult_duplicate`
--

CREATE TABLE `voult_duplicate` (
  `id` int(11) NOT NULL,
  `voult_total_time` varchar(255) NOT NULL,
  `time_in_second` varchar(255) NOT NULL,
  `time_in_minute` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voult_duplicate`
--

INSERT INTO `voult_duplicate` (`id`, `voult_total_time`, `time_in_second`, `time_in_minute`, `status`) VALUES
(1, '400', '1440000', '24000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voult_time_slot`
--

CREATE TABLE `voult_time_slot` (
  `id` int(11) NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `time_type` varchar(255) NOT NULL,
  `time_slot_price` varchar(255) NOT NULL,
  `convert_seconds` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voult_time_slot`
--

INSERT INTO `voult_time_slot` (`id`, `time_slot`, `time_type`, `time_slot_price`, `convert_seconds`, `status`) VALUES
(1, '1', 'hours', '100', 3600, 1),
(2, '30', 'min', '50', 1800, 1),
(3, '15', 'min', '25', 900, 1),
(4, '2', 'hours', '200', 7200, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise_image`
--
ALTER TABLE `advertise_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archetype_category`
--
ALTER TABLE `archetype_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archetype_name`
--
ALTER TABLE `archetype_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communication_tbl`
--
ALTER TABLE `communication_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `format_tbl`
--
ALTER TABLE `format_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform_tbl`
--
ALTER TABLE `platform_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_data_tbl`
--
ALTER TABLE `provider_data_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_font`
--
ALTER TABLE `reg_font`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requester_tbl`
--
ALTER TABLE `requester_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_provider_tbl`
--
ALTER TABLE `time_provider_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment_details`
--
ALTER TABLE `user_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voult`
--
ALTER TABLE `voult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voult_duplicate`
--
ALTER TABLE `voult_duplicate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voult_time_slot`
--
ALTER TABLE `voult_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise_image`
--
ALTER TABLE `advertise_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `archetype_category`
--
ALTER TABLE `archetype_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archetype_name`
--
ALTER TABLE `archetype_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `communication_tbl`
--
ALTER TABLE `communication_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `format_tbl`
--
ALTER TABLE `format_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `platform_tbl`
--
ALTER TABLE `platform_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provider_data_tbl`
--
ALTER TABLE `provider_data_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg_font`
--
ALTER TABLE `reg_font`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requester_tbl`
--
ALTER TABLE `requester_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_provider_tbl`
--
ALTER TABLE `time_provider_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payment_details`
--
ALTER TABLE `user_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voult`
--
ALTER TABLE `voult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voult_duplicate`
--
ALTER TABLE `voult_duplicate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voult_time_slot`
--
ALTER TABLE `voult_time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
