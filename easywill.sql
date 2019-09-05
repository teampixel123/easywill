-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 02:32 PM
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
(2, 35287694, 'Mr.', 'Demo Adeq Up', 'Dfbfg Sdfg Kkk');

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
(4, 39854716, 'Insurance Policy', '5678', 'fghdf', 'dfghdh', '', 0, '', 999999, ''),
(5, 65938471, 'Savings Account', '3456', 'dghdfh dfghdh', 'fghdfgh', 'Maharashtra', 555777, '', 0, ''),
(6, 86579314, 'Bank Locker', '3456', 'dbd d', 'sdfghsdfg', 'Maharashtra', 555777, '', 3456, '3456'),
(7, 86579314, 'Savings Account', '3456', 'rdhfdgh dfgh', 'rdh dfgh', 'fghjfghj fghj', 555777, '', 0, ''),
(8, 76324958, 'Savings Account', '12345678', 'sbi', 'rajarampuri', 'maha', 416001, '', 0, ''),
(9, 76324958, 'Current Account', '123456', 'idbi', 'bagal chowk', 'maharashtra', 416216, '', 0, ''),
(10, 71932546, 'Savings Account', '363456', 'rhdgfh', 'dfgh', 'Maharashtra', 416001, '', 0, ''),
(11, 39247518, 'Current Account', '24356', 'dgh', 'dfgh', 'dfgh', 222233, '', 0, ''),
(12, 35287694, 'Savings Account', '4578', 'fghj', 'fghj', 'fgj', 152369, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distribution`
--

CREATE TABLE `tbl_distribution` (
  `id` int(11) NOT NULL,
  `will_id` bigint(20) NOT NULL,
  `estate_id` int(11) NOT NULL,
  `estate_type` varchar(50) NOT NULL,
  `distribution_name` varchar(250) NOT NULL,
  `distribution_percent` float NOT NULL,
  `distribution_is_complete` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_distribution`
--

INSERT INTO `tbl_distribution` (`id`, `will_id`, `estate_id`, `estate_type`, `distribution_name`, `distribution_percent`, `distribution_is_complete`) VALUES
(3, 39247518, 12, 'real_estate', 'xcbv', 33, 'no'),
(7, 39247518, 13, 'real_estate', 'Dfhdfh Dfgh', 5, 'no'),
(14, 39247518, 13, 'real_estate', 'Ajsfhdg Jkafghd', 95, 'no'),
(20, 39247518, 12, 'real_estate', 'Dfhdfh Dfgh', 34, 'no'),
(21, 39247518, 11, 'bank_estate', 'Dfhdfh Dfgh', 50, 'no'),
(24, 39247518, 14, 'real_estate', 'Fghdfgh', 100, 'no'),
(26, 39247518, 11, 'bank_estate', 'Fghdfgh', 40, 'no'),
(28, 39247518, 11, 'bank_estate', 'Dfhdfh Dfgh', 10, 'no'),
(29, 39247518, 4, 'vehicle_estate', 'Dfhdfh Dfgh', 100, 'no'),
(34, 39247518, 12, 'real_estate', 'Dfhdfh Dfgh', 20, 'no'),
(35, 39247518, 12, 'real_estate', 'Sdfh', 13, 'no'),
(37, 39247518, 5, 'other_gift_estate', 'Fgh Dfgh', 100, 'no'),
(41, 35287694, 16, 'real_estate', 'Dfgjh', 100, 'no'),
(42, 35287694, 12, 'bank_estate', 'Dgh Dfgh', 100, 'no'),
(43, 35287694, 5, 'vehicle_estate', 'Dfhdfh Dfgh', 100, 'no'),
(47, 35287694, 6, 'other_gift_estate', 'Fgh Dfgh', 100, 'no'),
(48, 35287694, 17, 'real_estate', 'Dfhdfh Dfgh', 60, 'no'),
(49, 35287694, 17, 'real_estate', 'Demo Bnk', 40, 'no'),
(50, 43785261, 6, 'vehicle_estate', 'Demo Bnk', 100, 'no'),
(51, 71932546, 11, 'real_estate', 'Demo Bnk', 100, 'no'),
(52, 71932546, 10, 'bank_estate', 'Fgh Dfgh', 100, 'no'),
(53, 71932546, 3, 'vehicle_estate', 'Fghdfgh', 100, 'no'),
(54, 71932546, 4, 'other_gift_estate', 'Dfhdfh Dfgh', 100, 'no');

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
(3, 35287694, 'Mr.', 'Demo Exec Hh', 'Asfgsdfg Sdfgsdfg Kk'),
(16, 35287694, 'Mr.', 'Demo Exect Update', 'Asfgsdfg Sdfgsdfg Two Up'),
(17, 43785261, 'Mr.', 'Demo Exect Update', 'Asfgsdfg Sdfgsdfg'),
(18, 43785261, 'Mr.', 'Demo Exect', 'Asfgsdfg Sdfgsdfg'),
(19, 71932546, 'Mr.', 'Demo Exect Update', 'Asfgsdfg Sdfgsdfg Two Up'),
(20, 71932546, 'Mr.', 'Demo Exect', 'Asfgsdfg Sdfgsdfg');

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
(16, 39854716, 'Son', 'Dfgdfhj Dfgh', '21-08-2019', 0, 'Mr.', 'Asdhfg Jkhg', 21, 'yes'),
(17, 65938471, 'Spouse', 'Demo Spouse', '15-07-1981', 38, 'Mr.', '', 0, 'no'),
(18, 71932546, 'Son', 'Rtty Erty', '04-09-2019', 0, 'Mr.', 'Dgj Dfgh', 21, 'yes'),
(19, 39247518, 'Spouse', 'Asg Dfg', '23-06-1970', 49, 'Mr.', '', 0, 'no'),
(20, 35287694, 'Spouse', 'Dfgh Dfgh', '27-07-1955', 64, 'Mr.', '', 0, 'no');

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
(1, 86579314, 'Jewellery and Valuables', 'sdfgsdfg'),
(2, 76324958, 'Jewellery and Valuables', '1 kg silver'),
(3, 76324958, 'Remained Assets', 'historic item 1'),
(4, 71932546, 'Jewellery and Valuables', 'ryrty'),
(5, 39247518, 'Jewellery and Valuables', 'tghfgh'),
(6, 35287694, 'Jewellery and Valuables', 'fghjfghj fghjfghj fghj');

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
(6, 39854716, 'Mr.', 'Demo Will', 'male', 'Married', 'yes', '9988776655', 'datta@pixelbazar.com', 'Rajarampuri', 'Kolhapur', 555777, 'Maharashtra', 'India', '22-01-1959', 'Business', '552233669988', '', 'Indian', 'Hindu'),
(7, 95281763, 'Mr.', 'Demo Will', 'male', 'Unmarried', 'no', '9900998877', 'sfghd@mail.com', 'Rajarampuri', 'Kolhapur', 555777, 'Maharashtra', 'India', '07-01-1970', 'Business', '556633221144', '', 'Indian', 'Hindu'),
(8, 65938471, 'Mr.', 'Demo Two', 'male', 'Married', 'yes', '8855669933', 'demotwo@email.com', 'Rajarampuri', 'Kolhapur', 555777, 'Maharashtra', 'India', '02-01-1979', 'Business', '112233445566', '', 'Indian', 'Hindu'),
(9, 76324958, 'Mr.', 'Dhananjay', 'male', 'Unmarried', 'no', '9021182145', 'abc@gmail.com', 'Bagal Chowk', 'Kolhapur', 416001, 'Maharashtra', 'India', '25-08-1991', 'Businessman', '123456789456', 'Abcfd1234G', 'India', 'hindu'),
(10, 71932546, 'Mr.', 'Stgfd Fdgh', 'male', 'Married', 'no', '9900990099', 'fgh@mail.com', 'Bagal Chowk', 'Kolhapur', 416001, 'Maharashtra', 'India', '01-02-1950', 'Stud', '223366554411', '', 'Indian', 'Hindu'),
(11, 39247518, 'Mr.', 'Fgj Dfj', 'male', 'Unmarried', 'no', '8899009988', 'demo3@easywill.com', 'Sdh Sdfgh', 'Gad', 416500, 'Maharashtra', 'India', '14-01-1959', 'Bus', '889900998877', '', 'Indian', 'Hindu'),
(12, 35287694, 'Mr.', 'Dfgh Dfgh', 'male', 'Married', 'yes', '9900998876', 'demo@easywill.com', 'Asdf', 'Qwer', 555222, 'Zxcv', 'Bnmlk', '15-06-1950', 'Mnbvc', '558899663322', '', 'oiuy', 'poiu'),
(13, 43785261, 'Mr.', 'Thj Fghj', 'male', 'Married', 'no', '8899009988', 'dempo@ggg.mmm', 'Ry', 'Rty', 111222, 'Erty', 'Erty', '24-07-1969', 'Erty', '441122336655', '', 'dfh', 'dfgh'),
(14, 37518926, 'Ms.', 'Fk Ghjk', 'female', 'Unmarried', 'no', '9990009990', 'logdemo@easywill.com', '', '', NULL, '', '', '', '', '', '', '', ''),
(15, 37649815, 'Ms.', 'Demo Update Two', 'female', 'Divorcee', 'no', '8889990009', 'demo@www.bbb', '', '', NULL, '', '', '', '', '', '', '', '');

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
(4, 39854716, 'Commercial Shop Unit', '1234', 'C.S. No.', '4321', '555', 'Square Meter', 'Rajarampuri', 'Kolhapur', 333444, 'Maharashtra', 'India'),
(5, 95281763, 'House', 'Maharashtra', 'C.S. No.', '111', '222', 'Square Meter', 'Rajarampuri', 'Kolhapur', 333333, 'Maharashtra', 'India'),
(6, 86579314, 'Commercial Shop Unit', 'Fff', 'C.S. No.', '2346', '3456', 'Square Meter', 'Fdghsdh Sfgh', 'Sfdgh', 111111, 'Maharashtra', 'India'),
(7, 86579314, 'Commercial Shop Unit', '3456', 'C.S. No.', 'Gh', '5677', 'Square Meter', 'sdfg sdfg', 'Kolhapur', 555777, 'Maharashtra', 'India'),
(8, 76324958, 'House', 'Maharashtra', 'C.S. No.', '4564', '1200', 'Square Feet', 'bagal Chowk', 'Kolhapur', 416001, 'Maharashtra', 'India'),
(9, 76324958, 'Shop', '12456', 'C.S. No.', '98654', '1200', 'Square Feet', 'C.S.No. 345, Tarabai PArk', 'Kolhapur', 416003, 'Maharashtra', 'India'),
(10, 76324958, 'Land', 'Maharashtra', 'C.S. No.', '123456', '1200', 'Square Feet', 'bagal Chowk', 'Kolhapur', 416001, 'Maharashtra', 'India'),
(11, 71932546, 'Flat', 'q234', 'C.S. No.', '234', '234', 'Square Meter', 'bagal Chowk', 'Kolhapur', 416001, 'Mahashtra', 'India'),
(12, 39247518, 'Shop', '4567', 'C.S. No.', '367', '7788', 'Square Feet', 'fghj', 'Fghj', 416500, 'Maharastra', 'India'),
(13, 39247518, 'Commercial Shop Unit', '4568', 'C.S. No.', '77', '6789', 'Square Meter', 'demo', 'Dfgh', 556633, 'Skfsdfg', 'Sdfg'),
(14, 39247518, 'House', '467', 'C.S. No.', 'Dfgh', '54678', 'Square Feet', 'fhj', 'Fgjh', 999000, 'Jj', 'Fgh'),
(17, 35287694, 'Commercial Shop Unit', '4567', 'C.S. No.', '567', '6767', 'Square Meter', 'erty', 'Eryt', 222333, 'Eryt', 'Erty');

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
(1, 76324958, 'maruti Suzuki', '12456378', 2018),
(2, 76324958, 'Skoda Fabia', '98654123', 2015),
(3, 71932546, 'kolhapur', 'e456', 2012),
(4, 39247518, 'rdhdfgh', '4567', 2015),
(5, 35287694, 'fghjgfhj fghj', '5678', 2013),
(6, 43785261, 'thjfgh', 'fghj', 2000);

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
(6, 0, 39854716, 'no', 'no', '', '29-08-2019', '', 0, '', 'yes', '29-08-2019'),
(7, 0, 95281763, 'no', 'no', '', '30-08-2019', '', 0, '', 'yes', '30-08-2019'),
(8, 0, 65938471, 'no', 'no', '', '30-08-2019', '', 0, '', 'yes', '30-08-2019'),
(9, 0, 76324958, 'no', 'no', '', '01-09-2019', '', 0, '', 'yes', '01-09-2019'),
(10, 63759248, 71932546, 'no', 'no', 'Kolhapur', '17-09-2019', '', 0, '', 'yes', '03-09-2019'),
(11, 0, 39247518, 'no', 'no', '', '03-09-2019', '', 0, '', 'yes', '03-09-2019'),
(12, 0, 35287694, 'no', 'no', 'Kolhapur', '17-09-2019', '', 0, '', 'yes', '04-09-2019'),
(13, 82651394, 43785261, 'no', 'no', 'Kolhapur', '25-09-2019', '', 0, '', 'yes', '04-09-2019'),
(14, 63759248, 37518926, 'no', 'no', '', '05-09-2019', '', 0, '', 'yes', '05-09-2019'),
(15, 63759248, 37649815, 'no', 'no', '', '05-09-2019', '', 0, '', 'yes', '05-09-2019');

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
(3, 35287694, 'Mr.', 'Demo Witness Ppp', 'Xdfgh Sdfgf Lll'),
(4, 35287694, 'Mr.', 'Demo Witnesst Up', 'Xdfgh Sdfgf Kkk'),
(5, 43785261, 'Mr.', 'Demo Witnesst', 'Xdfgh Sdfgf'),
(6, 43785261, 'Mr.', 'Demo Witnesst Up', 'Xdfgh Sdfgf Lll'),
(7, 71932546, 'Mr.', 'Demo Witnesst', 'Xdfgh Sdfgf Lll'),
(8, 71932546, 'Mr.', 'Demo Witnesst Up', 'Xdfgh Sdfgf Kkk');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bank_assets`
--
ALTER TABLE `tbl_bank_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_executor`
--
ALTER TABLE `tbl_executor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_family_info`
--
ALTER TABLE `tbl_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_other_gift`
--
ALTER TABLE `tbl_other_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_personal_info`
--
ALTER TABLE `tbl_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_real_estate`
--
ALTER TABLE `tbl_real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_will`
--
ALTER TABLE `tbl_will`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
