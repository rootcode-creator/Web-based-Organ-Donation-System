-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 11:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `NumberOfUsers` int(3) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`NumberOfUsers`, `name`, `username`, `password`, `date`) VALUES
(1, 'Tamim', '4d242c203b0e6e9e217cba47a7d45ee41744bc43fd5a9422357879a579bb5035', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-06-08 06:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(6) NOT NULL,
  `name` varchar(64) NOT NULL,
  `reg_number` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `hospital` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `reg_number`, `phone`, `hospital`, `password`, `date`) VALUES
(8, 'Dr Hart', 'BD1', '01301701410', 'Shahid Suhrawardy Hospital', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-03-12 15:14:10'),
(9, 'Dr Pullen', 'BD2', '01301701411', 'CMH (Dhaka Cantonment)', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-03-12 15:27:20'),
(11, 'Dr Brilliant', 'BD539', '01301701418', 'Appolo Hospital', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-04-09 10:13:30'),
(10, 'WAHID', 'BR12', '01301701416', 'Shahid Suhrawardy Hospital', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-04-01 16:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `ordermedicine`
--

CREATE TABLE `ordermedicine` (
  `orderId` int(11) NOT NULL,
  `application_id` int(6) NOT NULL,
  `patientName` varchar(255) NOT NULL,
  `patientPhone` varchar(255) NOT NULL,
  `patientGender` varchar(64) NOT NULL,
  `patientBlood` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `prescription_written_date` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `orderstatus` varchar(10) NOT NULL,
  `individualPrice` varchar(255) NOT NULL,
  `totalPrice` varchar(255) NOT NULL,
  `userResponse` varchar(10) NOT NULL,
  `pharmacistcomment` varchar(255) NOT NULL,
  `commentexist` varchar(10) NOT NULL,
  `usercomment` varchar(255) NOT NULL,
  `usercommentexist` varchar(10) NOT NULL,
  `deliveryStatus` varchar(10) NOT NULL,
  `med1name` varchar(255) NOT NULL,
  `med1quantity` varchar(255) NOT NULL,
  `med2name` varchar(255) NOT NULL,
  `med2quantity` varchar(255) NOT NULL,
  `med3name` varchar(255) NOT NULL,
  `med3quantity` varchar(255) NOT NULL,
  `med4name` varchar(255) NOT NULL,
  `med4quantity` varchar(255) NOT NULL,
  `med5name` varchar(255) NOT NULL,
  `med5quantity` varchar(255) NOT NULL,
  `med6name` varchar(255) NOT NULL,
  `med6quantity` varchar(255) NOT NULL,
  `med7name` varchar(255) NOT NULL,
  `med7quantity` varchar(255) NOT NULL,
  `med8name` varchar(255) NOT NULL,
  `med8quantity` varchar(255) NOT NULL,
  `med9name` varchar(255) NOT NULL,
  `med9quantity` varchar(255) NOT NULL,
  `med10name` varchar(255) NOT NULL,
  `med10quantity` varchar(255) NOT NULL,
  `med11name` varchar(255) NOT NULL,
  `med11quantity` varchar(255) NOT NULL,
  `med12name` varchar(255) NOT NULL,
  `med12quantity` varchar(255) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ`
--

CREATE TABLE `organ` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blood` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `application_date` date NOT NULL,
  `application_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(1) NOT NULL,
  `doctor_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `recomendationWritten` int(1) NOT NULL,
  `doctor_recommendation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prescriptionwritten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `organ`
--

INSERT INTO `organ` (`id`, `name`, `phone_number`, `gender`, `blood`, `application_date`, `application_reason`, `status`, `doctor_info`, `recomendationWritten`, `doctor_recommendation`, `prescriptionwritten`) VALUES
(20, 'SHAKIL', '01301701410', 'Male', 'A+', '2023-06-08', '<p>bgt</p>\r\n', 2, '01301701419', 1, '0', 0),
(21, 'SHAKIL', '01301701410', 'Male', 'A+', '2023-06-08', '<p>rxd</p>\r\n', 1, '01301701419', 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `phone_number`, `password`, `date`) VALUES
(2, 'shakil', '01301701410', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-04-11 07:11:58'),
(1, 'tanzil', '01301701411', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-04-15 02:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(6) NOT NULL,
  `pharmacyName` varchar(255) NOT NULL,
  `registrationNumber` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `pharmacyName`, `registrationNumber`, `phone`, `address`) VALUES
(1, 'Lazz Pharma', 'BD123', '01301701410', '<p>Uttara,Dhaka</p>\r\n'),
(2, 'BD Pharmaa', 'BD125', '01301701416', '<p><a href=\"https://youtube.com\">https://youtube.com</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `application_date` varchar(255) NOT NULL,
  `doctor_info` varchar(255) NOT NULL,
  `prescription_written_date` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `ordered` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `name`, `phone`, `gender`, `blood`, `application_date`, `doctor_info`, `prescription_written_date`, `prescription`, `ordered`) VALUES
(21, 'SHAKIL', '01301701410', 'Male', 'A+', '2023-06-08', '01301701419', '2023-06-08', '<p>a 500mg</p>\r\n\r\n<p>b 300mg</p>\r\n\r\n<p>c 500mg</p>\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stockmedicine`
--

CREATE TABLE `stockmedicine` (
  `id` int(6) NOT NULL,
  `medicinename` varchar(255) NOT NULL,
  `dose` varchar(100) NOT NULL,
  `quantity` int(30) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockmedicine`
--

INSERT INTO `stockmedicine` (`id`, `medicinename`, `dose`, `quantity`, `manufacturer`, `added_date`) VALUES
(2, 'napa extra', '500mg', 51, 'Beximco', '2023-06-08 11:39:22'),
(7, 'napa', '500mg', 494, 'Beximco', '2023-06-08 11:39:22'),
(9, 'Sergel', '20', 164, 'b', '2023-05-13 17:24:33'),
(10, 'Rusova', '10', 64, 'k', '2023-05-13 17:24:33'),
(11, 'Paracitamol', '5', 105, 'd', '2023-05-13 17:24:33'),
(12, 'VERGON', '34', 54, 'u', '2023-06-08 11:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NumberOfUsers` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `height` double(11,2) NOT NULL,
  `phone_number` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NumberOfUsers`, `name`, `gender`, `blood_group`, `height`, `phone_number`, `password`, `date`) VALUES
(4, 'SHAKIL', 'Male', 'A+', 5.90, '01301701410', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-03-12 15:01:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `usernames_uniqueness` (`username`) USING BTREE,
  ADD UNIQUE KEY `numberofuser` (`NumberOfUsers`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`reg_number`),
  ADD UNIQUE KEY `NoOfUsers` (`id`),
  ADD UNIQUE KEY `reg_number_unique` (`reg_number`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `phone` (`phone`),
  ADD KEY `hospital` (`hospital`),
  ADD KEY `password` (`password`),
  ADD KEY `reg_number_index` (`reg_number`) USING BTREE;

--
-- Indexes for table `ordermedicine`
--
ALTER TABLE `ordermedicine`
  ADD UNIQUE KEY `ORDER_ID_UNIQUE` (`orderId`),
  ADD KEY `patientName` (`patientName`),
  ADD KEY `deliveryStatus` (`deliveryStatus`),
  ADD KEY `patientPhone` (`patientPhone`),
  ADD KEY `patientGender` (`patientGender`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `prescription_written_date` (`prescription_written_date`),
  ADD KEY `totalPrice` (`totalPrice`),
  ADD KEY `commentexist` (`commentexist`),
  ADD KEY `orderdate` (`orderdate`),
  ADD KEY `application_id` (`application_id`) USING BTREE,
  ADD KEY `usercommentexist` (`usercommentexist`),
  ADD KEY `usercomment` (`usercomment`);

--
-- Indexes for table `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `gender` (`gender`),
  ADD KEY `application_date` (`application_date`),
  ADD KEY `blood` (`blood`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`),
  ADD KEY `prescriptionwritten` (`prescriptionwritten`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`phone_number`),
  ADD UNIQUE KEY `phone_number_unique` (`phone_number`) USING BTREE,
  ADD UNIQUE KEY `id_unique` (`id`) USING BTREE,
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `phone_number_index` (`phone_number`) USING BTREE,
  ADD KEY `password` (`password`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`registrationNumber`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `registrationNumber_unique` (`registrationNumber`) USING BTREE,
  ADD UNIQUE KEY `phone_unique` (`phone`) USING BTREE,
  ADD UNIQUE KEY `pharmacyName_unique` (`pharmacyName`) USING BTREE,
  ADD KEY `registrationNumber` (`registrationNumber`),
  ADD KEY `phone` (`phone`) USING BTREE,
  ADD KEY `address` (`address`),
  ADD KEY `pharmacyName` (`pharmacyName`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD UNIQUE KEY `id_unique` (`id`);

--
-- Indexes for table `stockmedicine`
--
ALTER TABLE `stockmedicine`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `medicinename_unique` (`medicinename`) USING BTREE,
  ADD KEY `medicinename` (`medicinename`) USING BTREE,
  ADD KEY `quantity` (`quantity`),
  ADD KEY `manufacturer` (`manufacturer`),
  ADD KEY `added_date` (`added_date`),
  ADD KEY `dose` (`dose`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`phone_number`),
  ADD UNIQUE KEY `phone_number_uniquness` (`phone_number`) USING BTREE,
  ADD UNIQUE KEY `NumberOf_Users_uniqueness` (`NumberOfUsers`) USING BTREE,
  ADD KEY `numberofusers` (`NumberOfUsers`),
  ADD KEY `blood_group` (`blood_group`),
  ADD KEY `height` (`height`),
  ADD KEY `phonenumber` (`phone_number`) USING BTREE,
  ADD KEY `gender` (`gender`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `NumberOfUsers` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ordermedicine`
--
ALTER TABLE `ordermedicine`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organ`
--
ALTER TABLE `organ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stockmedicine`
--
ALTER TABLE `stockmedicine`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `NumberOfUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
