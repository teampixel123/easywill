-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 02:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

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
-- Table structure for table `tbl_adequate_provision`
--

CREATE TABLE `tbl_adequate_provision` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `adequate_provision_name_title` varchar(20) NOT NULL,
  `adequate_provision_name` varchar(250) NOT NULL,
  `adequate_provision_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_adequate_provision`
--

INSERT INTO `tbl_adequate_provision` (`id`, `will_id`, `adequate_provision_name_title`, `adequate_provision_name`, `adequate_provision_address`) VALUES
(3, 71932546, 'Mr.', 'Demo Adeq Up', 'Dfbfg Sdfg Kkk'),
(4, 71932546, 'Mr.', 'Demo Adeq', 'Dfbfg Sdfg'),
(5, 29843751, 'Mr.', 'Demo Adeq Up', 'Dfbfg Sdfg'),
(6, 41569723, 'Mr.', 'Dfghdfgh Dfghdgh', 'Fdghfdgh Dfgh'),
(7, 89416732, 'Mr.', 'Dfghdfgh Dfgh', 'Dfghdfgh Dfgh');

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
(10, 71932546, 'Savings Account', '363456', 'rhdgfh', 'dfgh', 'Maharashtra', 416001, '', 0, ''),
(13, 71932546, 'Savings Account', '345743567567', 'drhfgdh', 'dfghfdgh', 'dfghfdh', 222333, '', 0, ''),
(14, 71932546, 'Current Account', '1234', 'hhhh hhhh', 'jjjj jjjj', 'wertwertwert', 555222, '', 0, ''),
(15, 71932546, 'Fixed Deposits', '6789', 'hklhl hjkl', 'hkl68o 6uilyul', 'yhkjhkl', 569321, '9999', 0, ''),
(16, 71932546, 'Bank Locker', '45674567', 'dfghdfgh', 'dfghdfgh', 'fghdfgh', 778899, '', 0, '888'),
(17, 71932546, 'Mutual Funds', '4567567', 'tfjhfghj', 'fghjfghj', '', 889900, '', 0, ''),
(18, 71932546, 'Stock Equities', '56785678', 'gjkghjk', 'gjkghjk', '', 678678, '', 0, ''),
(19, 71932546, 'Insurance Policy', '56785678', 'ghjkhjkghjk', 'uityuikgmjhghjk', '', 0, '', 899990, ''),
(20, 71932546, 'PPF', '3767', 'dgjfghj', 'fghjfghj', 'fgjhfjh', 777888, '', 0, ''),
(21, 29843751, 'Current Account', '123445676789', 'State Bank Of india', 'Kolhapur', 'Maharashtra', 555111, '', 0, ''),
(22, 41569723, 'Savings Account', '2345', 'sfgsfdg sdfg', 'dsfgsdfg', 'mah', 111222, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distribution`
--

CREATE TABLE `tbl_distribution` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `estate_id` int(11) NOT NULL,
  `estate_type` varchar(50) NOT NULL,
  `distribution_name_title` varchar(10) NOT NULL,
  `distribution_name` varchar(250) NOT NULL,
  `distribution_percent` float NOT NULL,
  `distribution_is_complete` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_distribution`
--

INSERT INTO `tbl_distribution` (`id`, `will_id`, `estate_id`, `estate_type`, `distribution_name_title`, `distribution_name`, `distribution_percent`, `distribution_is_complete`) VALUES
(64, 71932546, 17, 'bank_estate', '', 'Dfhdfh Dfgh', 100, 'no'),
(65, 71932546, 18, 'bank_estate', '', 'Fgh Dfgh', 100, 'no'),
(66, 71932546, 19, 'bank_estate', '', 'Dfgjh', 100, 'no'),
(68, 71932546, 20, 'bank_estate', '', 'Rsdtdyj Dfghdfgh', 43, 'no'),
(69, 71932546, 20, 'bank_estate', '', 'Ftuiytui Yuityui Tyuiytui', 57, 'no'),
(73, 71932546, -1, 'omited_estate', '', 'Fghdfgh', 67, 'no'),
(84, 71932546, 14, 'bank_estate', '', 'Dfgjh', 50, 'no'),
(85, 71932546, 14, 'bank_estate', '', 'Sdfh', 20, 'no'),
(86, 71932546, 14, 'bank_estate', '', 'Ghjgjh Fghj', 30, 'no'),
(87, 71932546, 15, 'bank_estate', '', 'Turtyhfhn Dfgdfg', 100, 'no'),
(88, 71932546, 16, 'bank_estate', '', 'Wrterty Ertyufn', 100, 'no'),
(89, 29843751, 20, 'real_estate', '', 'Distri Demo', 63, 'no'),
(90, 29843751, 20, 'real_estate', '', 'Disti Tewo', 37, 'no'),
(91, 29843751, 21, 'bank_estate', '', 'Dfghfgd Dfghfdgh Dfghdfgh', 100, 'no'),
(92, 29843751, 7, 'vehicle_estate', '', 'Dfghdfgh Ertyrte Jkhjvhk', 100, 'no'),
(93, 29843751, 17, 'other_gift_estate', '', 'Rtyuryuvbj Dfghdfgh Dfghdfgh', 100, 'no'),
(94, 29843751, -1, 'omited_estate', '', 'Dfghfgd Dfghdh', 55, 'no'),
(95, 29843751, -1, 'omited_estate', '', 'Ertyertyh Bvghj Dfgjjh', 45, 'no'),
(96, 41569723, 21, 'real_estate', '', 'Fghdfgh Fghfghj', 100, 'no'),
(99, 41569723, 22, 'real_estate', '', 'Drjrtyj Errety', 30, 'no'),
(101, 41569723, -1, 'omited_estate', '', 'Dfgjdfghj Dfj', 100, 'no'),
(103, 41569723, 22, 'bank_estate', '', 'Dfhdfh Dfgh', 100, 'no'),
(104, 41569723, 18, 'other_gift_estate', '', 'Dfhdfh Dfgh', 100, 'no'),
(105, 41569723, 22, 'real_estate', '', 'Dfhdfh Dfgh', 50, 'no'),
(106, 41569723, 22, 'real_estate', '', 'Erter Wer', 20, 'no'),
(107, 89416732, 23, 'real_estate', '', 'Rgerty', 100, 'no'),
(108, 89416732, 19, 'other_gift_estate', '', 'Fgdhdfgh Dfghdfgh', 100, 'no'),
(109, 89416732, -1, 'omited_estate', '', 'Fdghh Dfgh', 100, 'no'),
(111, 71932546, 4, 'other_gift_estate', 'Mrs.', 'Sdgshg Sdfhgh', 50, 'no'),
(112, 71932546, 3, 'vehicle_estate', 'Ms.', 'Xghfdgh Dfghdfgh', 100, 'no'),
(114, 71932546, 10, 'bank_estate', 'Mrs.', 'Dghfgdh Dfghfgdh', 67, 'no'),
(115, 71932546, -1, 'omited_estate', 'Mr.', 'Dfghdfgh Dfghfdgh', 33, 'no'),
(116, 71932546, 13, 'bank_estate', 'Mr.', 'Gfhdfgh Dfgh', 100, 'no'),
(117, 71932546, 10, 'bank_estate', 'Mrs.', 'Dfghfgdh Dfgh', 33, 'no'),
(118, 71932546, 4, 'other_gift_estate', 'Mrs.', 'Tyrthyurtyu Rtyurtyu', 50, 'no'),
(119, 71932546, 11, 'real_estate', 'Mr.', 'Dfhdfh Dfgh', 100, 'no'),
(120, 71932546, 19, 'real_estate', 'Mr.', 'Tertyt Ertyerty', 30, 'no'),
(121, 71932546, 19, 'real_estate', 'Mr.', 'Ertyrety Ertyerty', 70, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executor`
--

CREATE TABLE `tbl_executor` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `executor_name_title` varchar(20) NOT NULL,
  `executor_name` varchar(250) NOT NULL,
  `executor_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_executor`
--

INSERT INTO `tbl_executor` (`id`, `will_id`, `executor_name_title`, `executor_name`, `executor_address`) VALUES
(19, 71932546, 'Mr.', 'Demo Exect Update', 'Asfgsdfg Sdfgsdfg Two Up'),
(21, 71932546, 'Mr.', 'Demo Exect', 'Asfgsdfg Sdfgsdfg Two Up'),
(22, 29843751, 'Mr.', 'Demo Exect Update', 'Asfgsdfg Sdfgsdfg Two Up'),
(23, 29843751, 'Mr.', 'Demo Exec', 'Asfgsdfg Sdfgsdfg'),
(24, 41569723, 'Mr.', 'Hdfghdfgh Dfgh', 'Fdghfgd Dfgh'),
(25, 41569723, 'Mr.', 'Fdghfgdh Dfgh', 'Ghdfgh Dfgh'),
(26, 89416732, 'Mr.', 'Fghdfgh Dfgh', 'Dfghdfgh Dfgh');

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
(18, 71932546, 'Son', 'Rtty Erty', '04-09-2019', 0, 'Mr.', 'Dgj Dfgh', 21, 'yes'),
(21, 71932546, 'Daughter', 'Tjfghj Fghj', '26-10-1999', 19, 'Mr.', '', 0, 'no'),
(25, 71932546, 'Spouse', 'Wwwwwwww Ewterty Ertyerty', '17-07-1969', 50, 'Mr.', '', 0, 'no'),
(26, 29843751, 'Spouse', 'Wife Demo Name', '14-05-1955', 64, 'Mr.', '', 0, 'no'),
(27, 29843751, 'Son', 'Demo Son Name', '29-10-1979', 39, 'Mr.', '', 0, 'no'),
(28, 29843751, 'Daughter', 'Dfghdfg Dfghfdgh Dfghdfgh', '22-04-1982', 37, 'Mr.', '', 0, 'no'),
(29, 41569723, 'Spouse', 'Dfghdfgh Dfgh', '31-10-1980', 38, 'Mr.', '', 0, 'no'),
(30, 41569723, 'Son', 'Ghg Dfgh', '11-09-2019', 0, 'Mr.', 'Dfghfdgh Fghfdgh', 21, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_gift`
--

CREATE TABLE `tbl_other_gift` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `gift_type` varchar(150) NOT NULL,
  `gift_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_other_gift`
--

INSERT INTO `tbl_other_gift` (`id`, `will_id`, `gift_type`, `gift_description`) VALUES
(4, 71932546, 'Jewellery and Valuables', 'ryrty'),
(17, 29843751, 'Jewellery and Valuables', '1kg Silver'),
(18, 41569723, 'Jewellery and Valuables', 'dfghdfgh'),
(19, 89416732, 'Jewellery and Valuables', 'ertyerty');

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
(10, 71932546, 'Mr.', 'Stgfd Fdgh', 'male', 'Married', 'no', '9900990099', 'fgh@mail.com', 'Bagal Chowk', 'Kolhapur', 416001, 'Maharashtra', 'India', '01-02-1950', 'Stud', '223366554411', '', 'Indian', 'Hindu'),
(16, 29843751, 'Mr.', 'Demo One Logout', 'male', 'Married', 'yes', '9966332211', 'demoone@easywill.com', 'Rajarampuri, 1st Lane', 'Kolhapur', 555111, 'Maharashtra', 'India', '01-06-1950', 'Business', '888666333222', '', 'Indian', 'Hindu'),
(17, 41569723, 'Mr.', 'Hasdfjg Jasfhgk', 'male', 'Married', 'no', '9900990099', 'demotwo@easywill.com', 'Dgjhdgj', 'Dgjgjh', 555222, 'Gdhjghj', 'Dghjgfhj', '26-06-1970', 'Dfghfgh', '778899009988', '', 'fghfgh', 'dfghdfgh'),
(18, 87946512, 'Mr.', 'Fghjfhj Fghjfghj', 'male', 'Married', 'no', '9988776655', 'zgsdfg@dfdd.vvv', '', '', NULL, '', '', '', '', '', '', '', ''),
(19, 89416732, 'Mr.', 'Sdhdfg Dfghfgh', 'male', 'Unmarried', 'no', '9900998899', 'dfdfg@dfgf.kkk', 'Zsdfsf', 'Dfgfd', 888999, 'Sdfg', 'Xcbxdfg', '18-07-1979', 'Zxcvzv', '112233665544', '', 'fgwert', 'wertwert');

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
(11, 71932546, 'Flat', 'q234', 'C.S. No.', '234', '234', 'Square Meter', 'bagal Chowk', 'Kolhapur', 416001, 'Mahashtra', 'India'),
(19, 71932546, 'Commercial Shop Unit', '4567', 'C.S. No.', '458', '8899', 'Square Meter', 'fghjfghj fghjfghj', 'Fghjfghj Fghj', 256321, 'Fghjfgjh', 'Fghjfghj'),
(20, 29843751, 'House', '111', 'C.S. No.', '222', '333', 'Square Meter', 'Demo Address', 'Kolhapur', 555111, 'Maharashtra', 'India'),
(21, 41569723, 'House', 'dfghdfgh', 'C.S. No.', 'Dhdfgh', '567567', 'Square Feet', 'dfghdfgh', 'Dfghdgh', 567676, 'Dfghdgh', 'Fdgh'),
(22, 41569723, 'House', '2345', 'C.S. No.', '2345', '555', 'Square Meter', 'sfgsfg', 'Fdgg', 222555, 'Sdfg', 'Jkgfhk'),
(23, 89416732, 'Shop', 'ertyrety', 'C.S. No.', '74567', '5467', 'Square Meter', 'fghdfgh', 'Ertyerty', 777888, 'Ertyerty', 'Ertyert');

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
  `is_have_blur` varchar(10) NOT NULL DEFAULT 'no',
  `user_password` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `reg_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `user_fullname`, `user_mobile_number`, `user_email_id`, `profile_phto`, `user_reg_date`, `user_subscription`, `user_subscription_type`, `user_subscription_start_date`, `user_subscription_end_date`, `updation_end_date`, `promocode`, `is_promocode_used`, `max_will`, `rem_will`, `complete_will`, `incomplete_will`, `rem_updations`, `pdf_download`, `is_have_blur`, `user_password`, `user_username`, `reg_date`) VALUES
(3, 63759248, 'Xfghfdg Dfghfdgh', 9999999999, '', '', '', 'no', '', '', '', '', '', 'yes', 0, 0, 1, 0, 0, 0, 'yes', '222', '', '27-08-2019'),
(4, 94681253, 'Datta Mane', 8888888888, '', '', '', 'no', '', '', '', '', '', 'yes', 0, 0, 1, 0, 0, 0, 'yes', '123', '', '10-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `vehicle_model_name` varchar(200) NOT NULL,
  `vehicle_registration_no` varchar(100) NOT NULL,
  `vehicle_make_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`id`, `will_id`, `vehicle_model_name`, `vehicle_registration_no`, `vehicle_make_year`) VALUES
(3, 71932546, 'kolhapur', 'e456', 2012),
(7, 29843751, 'sdkfjgh s.dklfgjh', 'MH09 ZZ9999', 2019);

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
(10, 63759248, 71932546, 'yes', 'no', 'Kolhapur', '17-09-2019', '', 1, '25-09-2019', 'no', '03-09-2019'),
(16, 0, 29843751, 'yes', 'no', 'Kolhapur', '18-09-2019', '', 0, '', 'yes', '10-09-2019'),
(17, 94681253, 41569723, 'yes', 'no', 'Kolhapur', '24-09-2019', '', 0, '', 'yes', '10-09-2019'),
(18, 63759248, 87946512, 'no', 'no', '', '10-09-2019', '', 0, '', 'yes', '10-09-2019'),
(19, 0, 89416732, 'yes', 'no', 'Kolhapur', '25-09-2019', '', 0, '', 'yes', '10-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_witness`
--

CREATE TABLE `tbl_witness` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `witness_name_title` varchar(20) NOT NULL,
  `witness_name` varchar(250) NOT NULL,
  `witness_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_witness`
--

INSERT INTO `tbl_witness` (`id`, `will_id`, `witness_name_title`, `witness_name`, `witness_address`) VALUES
(7, 71932546, 'Mr.', 'Demo Witnesst', 'Xdfgh Sdfgf Lll'),
(8, 71932546, 'Mr.', 'Demo Witnesst Up', 'Xdfgh Sdfgf Kkk'),
(9, 29843751, 'Mr.', 'Demo Witnesst Up', 'Xdfgh Sdfgf Kkk'),
(10, 29843751, 'Mr.', 'Demo Witness Ppp', 'Xdfgh Sdfgf'),
(11, 41569723, 'Mr.', 'Dfghfgdh Dfgh', 'Fgdhdfgh Dfgh'),
(12, 41569723, 'Mr.', 'Dfghfgh Dfgh', ' Dfgh Dfgh'),
(13, 89416732, 'Mr.', 'Dfghdfgh Dfgh', 'Dfghfdgh Dfgh'),
(14, 89416732, 'Mr.', 'Tjfghjfghj Fghj', 'Fghjfgh Fghj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adequate_provision`
--
ALTER TABLE `tbl_adequate_provision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_executor`
--
ALTER TABLE `tbl_executor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_gift`
--
ALTER TABLE `tbl_other_gift`
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
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_will`
--
ALTER TABLE `tbl_will`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adequate_provision`
--
ALTER TABLE `tbl_adequate_provision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_executor`
--
ALTER TABLE `tbl_executor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_other_gift`
--
ALTER TABLE `tbl_other_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_will`
--
ALTER TABLE `tbl_will`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
