-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 02:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easywill`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_assets`
--

CREATE TABLE `tbl_bank_assets` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_branch` varchar(200) NOT NULL,
  `bank_state` varchar(100) NOT NULL,
  `bank_pin_code` bigint(20) DEFAULT NULL,
  `fd_recipt_no` varchar(200) NOT NULL,
  `sum_assurance_amount` double NOT NULL,
  `key_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bank_assets`
--

INSERT INTO `tbl_bank_assets` (`id`, `will_id`, `account_type`, `account_number`, `bank_name`, `bank_branch`, `bank_state`, `bank_pin_code`, `fd_recipt_no`, `sum_assurance_amount`, `key_number`) VALUES
(1, 39854716, 'Current Account', '123', 'seg', 'sdfg', 'sdfg', 555777, '', 0, ''),
(2, 39854716, 'Current Account', '3456', 'ttt', 'yyy', 'uuu', 111111, '', 0, ''),
(3, 39854716, 'Insurance Policy', '7788', 'fgh', 'dfgh', 'Maharashtra', 555777, '', 90000, ''),
(4, 39854716, 'Insurance Policy', '5678', 'fghdf', 'dfghdh', '', 0, '', 999999, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_info`
--

CREATE TABLE `tbl_family_info` (
  `id` int(11) NOT NULL,
  `will_id` int(11) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `family_person_name` varchar(250) NOT NULL,
  `family_person_dob` varchar(20) NOT NULL,
  `family_person_age` int(11) NOT NULL,
  `guardian_name_title` varchar(10) NOT NULL,
  `guardian_name` varchar(250) NOT NULL,
  `major_age` int(11) NOT NULL,
  `is_minar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_family_info`
--

INSERT INTO `tbl_family_info` (`id`, `will_id`, `relationship`, `family_person_name`, `family_person_dob`, `family_person_age`, `guardian_name_title`, `guardian_name`, `major_age`, `is_minar`) VALUES
(14, 43792816, 'Spouse', 'Sdhfgh Sfdgh', '16-06-1999', 20, 'Mr.', '', 0, 'no'),
(15, 39854716, 'Spouse', 'Asjfgh Sdjfgh', '07-05-1974', 45, 'Mr.', '', 0, 'no'),
(16, 39854716, 'Son', 'Dfgdfhj Dfgh', '21-08-2019', 0, 'Mr.', 'Asdhfg Jkhg', 21, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_info`
--

CREATE TABLE `tbl_personal_info` (
  `id` int(11) NOT NULL,
  `will_id` int(11) NOT NULL,
  `name_title` varchar(10) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `is_have_child` varchar(10) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `birthdate` varchar(12) NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_personal_info`
--

INSERT INTO `tbl_personal_info` (`id`, `will_id`, `name_title`, `full_name`, `gender`, `marital_status`, `is_have_child`, `mobile_no`, `email`, `address`, `city`, `pincode`, `state`, `country`, `birthdate`, `occupation`, `aadhar_no`, `pan_no`, `nationality`, `religion`) VALUES
(1, 62458931, 'Mr.', 'Thdfh Fdgh', 'male', 'Divorcee', 'no', '9900990099', 'srfsdf@gmail.com', '', '', 0, '', '', '', '', '', '', '', ''),
(2, 52671493, 'Mr.', 'Thdfh Fdgh', 'male', 'Divorcee', 'no', '9900990099', 'datta.pixelbazar@gmail.com', '', '', 0, '', '', '', '', '', '', '', ''),
(3, 14283697, 'Mr.', 'Thdfh Fdgh', 'male', 'Married', 'no', '9900990099', 'learningdm12@gmail.com', '', '', 0, '', '', '', '', '', '', '', ''),
(4, 93567482, 'Mr.', 'Thdfh Fdgh', 'male', 'Married', 'no', '9900990099', 'learningdm12@gmail.com', 'Fdghsdh Sfgh', 'Sfdgh', 111111, 'Fff', 'Dfghdfgh', 'Ddd', 'Dfgh', '667788990099', '', 'Indian', 'Hindu'),
(5, 43792816, 'Mr.', 'Thdfh Fdgh', 'male', 'Married', 'no', '9900990099', 'srfsdf@gmail.com', 'Fdghsdh Sfgh', 'Sfdgh', 111111, 'Fff', 'India', '15/08/2019', 'Fgh', '998877665544', '', 'Indian', 'Hindu'),
(6, 39854716, 'Mr.', 'Demo Will', 'male', 'Married', 'yes', '9988776655', 'datta@pixelbazar.com', 'Rajarampuri', 'Kolhapur', 555777, 'Maharashtra', 'India', '22-01-1959', 'Business', '552233669988', '', 'Indian', 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_real_estate`
--

CREATE TABLE `tbl_real_estate` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `estate_type` varchar(100) NOT NULL,
  `estate_number` varchar(100) NOT NULL,
  `survey_number_type` varchar(20) NOT NULL,
  `survey_number` varchar(100) NOT NULL,
  `measurement_area` varchar(50) NOT NULL,
  `measurement_unit` varchar(50) NOT NULL,
  `real_estate_address` text NOT NULL,
  `real_estate_city` varchar(100) NOT NULL,
  `real_estate_pin` int(11) DEFAULT NULL,
  `real_estate_state` varchar(100) NOT NULL,
  `real_estate_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_real_estate`
--

INSERT INTO `tbl_real_estate` (`id`, `will_id`, `estate_type`, `estate_number`, `survey_number_type`, `survey_number`, `measurement_area`, `measurement_unit`, `real_estate_address`, `real_estate_city`, `real_estate_pin`, `real_estate_state`, `real_estate_country`) VALUES
(3, 43792816, 'House', 'Fff', 'C.S. No.', '3456', '3456', 'Square Meter', 'Fdghsdh Sfgh', 'Sfdgh', 555666, 'Mh', 'India'),
(4, 39854716, 'Commercial Shop Unit', '1234', 'C.S. No.', '4321', '555', 'Square Meter', 'Rajarampuri', 'Kolhapur', 333444, 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_fullname` varchar(150) NOT NULL,
  `user_mobile_number` bigint(20) DEFAULT NULL,
  `user_email_id` varchar(150) NOT NULL,
  `profile_phto` varchar(150) NOT NULL,
  `user_reg_date` varchar(12) NOT NULL,
  `user_subscription` varchar(11) NOT NULL DEFAULT 'no',
  `user_subscription_type` varchar(150) NOT NULL,
  `user_subscription_start_date` varchar(12) NOT NULL,
  `user_subscription_end_date` varchar(12) NOT NULL,
  `updation_end_date` varchar(12) NOT NULL,
  `promocode` varchar(100) NOT NULL,
  `is_promocode_used` varchar(10) NOT NULL DEFAULT 'yes',
  `max_will` int(20) NOT NULL,
  `rem_will` int(11) NOT NULL,
  `complete_will` int(20) NOT NULL,
  `incomplete_will` int(20) NOT NULL,
  `rem_updations` int(11) NOT NULL,
  `pdf_download` int(20) NOT NULL,
  `is_have_blur` varchar(10) NOT NULL DEFAULT 'yes',
  `user_password` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `reg_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `user_fullname`, `user_mobile_number`, `user_email_id`, `profile_phto`, `user_reg_date`, `user_subscription`, `user_subscription_type`, `user_subscription_start_date`, `user_subscription_end_date`, `updation_end_date`, `promocode`, `is_promocode_used`, `max_will`, `rem_will`, `complete_will`, `incomplete_will`, `rem_updations`, `pdf_download`, `is_have_blur`, `user_password`, `user_username`, `reg_date`) VALUES
(1, 85743961, 'Dfghfdg Dfgh', 9900998877, '', '', '', 'no', '', '', '', '', '', 'yes', 0, 0, 0, 0, 0, 0, 'yes', '123', '', '27-08-2019'),
(2, 98513674, 'Dghdfg Dfgh', 9900998878, '', '', '', 'no', '', '', '', '', '', 'yes', 0, 0, 0, 0, 0, 0, 'yes', '321', '', '27-08-2019'),
(3, 63759248, 'Xfghfdg Dfghfdgh', 9999999999, '', '', '', 'no', '', '', '', '', '', 'yes', 0, 0, 0, 0, 0, 0, 'yes', '222', '', '27-08-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_will`
--

CREATE TABLE `tbl_will` (
  `id` int(11) NOT NULL,
  `will_user_id` bigint(20) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `is_will_complete` varchar(20) NOT NULL DEFAULT 'no',
  `is_have_minar_child` varchar(20) NOT NULL DEFAULT 'no',
  `will_place` varchar(150) NOT NULL,
  `will_date` varchar(12) NOT NULL,
  `will_time` varchar(20) NOT NULL,
  `will_rem_updations` int(11) NOT NULL,
  `updation_last_date` varchar(12) NOT NULL,
  `is_blur` varchar(10) NOT NULL DEFAULT 'no',
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_will`
--

INSERT INTO `tbl_will` (`id`, `will_user_id`, `will_id`, `is_will_complete`, `is_have_minar_child`, `will_place`, `will_date`, `will_time`, `will_rem_updations`, `updation_last_date`, `is_blur`, `date`) VALUES
(1, 0, 62458931, 'no', 'no', '', '27-08-2019', '', 0, '', 'yes', '27-08-2019'),
(2, 63759248, 52671493, 'no', 'no', '', '27-08-2019', '', 0, '', 'yes', '27-08-2019'),
(3, 82651394, 14283697, 'no', 'no', '', '27-08-2019', '', 0, '', 'yes', '27-08-2019'),
(4, 82651394, 93567482, 'no', 'no', '', '27-08-2019', '', 0, '', 'yes', '27-08-2019'),
(5, 0, 43792816, 'no', 'no', '', '28-08-2019', '', 0, '', 'yes', '28-08-2019'),
(6, 0, 39854716, 'no', 'no', '', '29-08-2019', '', 0, '', 'yes', '29-08-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_will`
--
ALTER TABLE `tbl_will`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_will`
--
ALTER TABLE `tbl_will`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
