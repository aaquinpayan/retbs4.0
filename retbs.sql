-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 04:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_statement`
--

CREATE TABLE `account_statement` (
  `soa_id` int(32) NOT NULL,
  `td_no` int(32) NOT NULL,
  `barangay` varchar(32) NOT NULL,
  `year_unpaid` int(32) NOT NULL,
  `percentage` int(32) NOT NULL,
  `basic` int(32) NOT NULL,
  `penalty_basic` int(32) NOT NULL,
  `sef` int(32) NOT NULL,
  `penalty_sef` int(32) NOT NULL,
  `total_amount` int(32) NOT NULL,
  `grand_total` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_statement`
--

INSERT INTO `account_statement` (`soa_id`, `td_no`, `barangay`, `year_unpaid`, `percentage`, `basic`, `penalty_basic`, `sef`, `penalty_sef`, `total_amount`, `grand_total`) VALUES
(1, 113, '', 2016, 24, 6, 144, 6, 144, 300, 300);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492203460),
('m170411_092617_user_table', 1492204540);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `p_no` int(32) NOT NULL,
  `property_index_no` int(32) NOT NULL,
  `name_of_owner` varchar(32) NOT NULL,
  `kind` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `north_boundary` varchar(32) NOT NULL,
  `south_boundary` varchar(32) NOT NULL,
  `east_boundary` varchar(32) NOT NULL,
  `west_boundary` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`p_no`, `property_index_no`, `name_of_owner`, `kind`, `location`, `north_boundary`, `south_boundary`, `east_boundary`, `west_boundary`) VALUES
(0, 1, 'Anj Estilles Mendoza', 'sdfsdfsd', 'sjkdhajshdka', '32', '43', '23', '12'),
(0, 5, 'Anj Estilles Mendoza', 'asdasda', '32', '32', '32', '32', '32'),
(0, 6, 'Jared Astudillo Espineli', '111', '111', '111', '111', '1111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `taxpayer`
--

CREATE TABLE `taxpayer` (
  `taxpayer_id` int(32) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `payment_status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxpayer`
--

INSERT INTO `taxpayer` (`taxpayer_id`, `full_name`, `contact_no`, `gender`, `occupation`, `address`, `payment_status`) VALUES
(2, 'Anj Estilles Mendoza', '09736285936', 'F', 'Student', 'LB', 'Paid'),
(3, 'Jared Astudillo Espineli', '09111111111', 'M', 'Programmer', 'Cavite', 'Not Paid'),
(4, 'Alchelle Rose Apilado Quinpayan', '09062222222', '1', 'Student', 'dhahdkjahsdakhd', 'a'),
(5, 'hsdjahskdajs', '89898998', 'M', 'sadsdad', 'adsadasd', 'Not Paid'),
(6, 'Anne Trixia Mirones', '09364189363', 'F', 'Freelance Model', 'Los Banos', 'Paid'),
(7, 'Laubrey Marie Ual', '0936123467', 'F', 'Stand-up comedian', 'QC', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tax_declaration`
--

CREATE TABLE `tax_declaration` (
  `td_no` int(32) NOT NULL,
  `property_owner` varchar(64) NOT NULL,
  `property_index_no` varchar(32) NOT NULL,
  `arp_no` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `tel_no` varchar(15) NOT NULL,
  `beneficial_user` varchar(32) NOT NULL,
  `user_tel_no` varchar(15) NOT NULL,
  `user_address` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `survey_no` int(32) NOT NULL,
  `otc` varchar(32) NOT NULL,
  `oct` varchar(32) NOT NULL,
  `date` varchar(15) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `blk_no` int(11) NOT NULL,
  `bound_north` varchar(32) NOT NULL,
  `bound_south` varchar(32) NOT NULL,
  `bound_east` varchar(32) NOT NULL,
  `bound_west` varchar(32) NOT NULL,
  `property_kind` varchar(32) NOT NULL,
  `classification` varchar(32) NOT NULL,
  `area` int(32) NOT NULL,
  `market_value` decimal(32,0) NOT NULL,
  `actual_use` varchar(32) NOT NULL,
  `assessment_level` decimal(32,0) NOT NULL,
  `assessed_value` decimal(32,0) NOT NULL,
  `total_php` decimal(32,0) NOT NULL,
  `php` decimal(32,0) NOT NULL,
  `tot_assessed_value` varchar(128) NOT NULL,
  `taxability` varchar(32) NOT NULL,
  `effectivity_quarter` int(1) NOT NULL,
  `effectivity_year` int(4) NOT NULL,
  `mun_assessor` varchar(32) NOT NULL,
  `prov_assessor` varchar(32) NOT NULL,
  `cancels_arp_no` varchar(32) NOT NULL,
  `cancels_assessed_value` decimal(32,0) NOT NULL,
  `tax_dec_pdf` varchar(32) NOT NULL,
  `tax_dec_filename` varchar(32) NOT NULL,
  `faas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_declaration`
--

INSERT INTO `tax_declaration` (`td_no`, `property_owner`, `property_index_no`, `arp_no`, `address`, `tel_no`, `beneficial_user`, `user_tel_no`, `user_address`, `location`, `survey_no`, `otc`, `oct`, `date`, `lot_no`, `blk_no`, `bound_north`, `bound_south`, `bound_east`, `bound_west`, `property_kind`, `classification`, `area`, `market_value`, `actual_use`, `assessment_level`, `assessed_value`, `total_php`, `php`, `tot_assessed_value`, `taxability`, `effectivity_quarter`, `effectivity_year`, `mun_assessor`, `prov_assessor`, `cancels_arp_no`, `cancels_assessed_value`, `tax_dec_pdf`, `tax_dec_filename`, `faas`) VALUES
(1, 'De Castro, Antonio', '024-11-0041-001-01', '11-0041-00001', 'Lemery, Batangas', '', '', '', '', 'Sinisian East', 4167, '', '', '', 0, 0, 'Brgy. Bagong Pook', 'Aln 02 Sec 002 Aln 01', 'Mataas na Bayan', 'Sec 002 Aln 01', 'Land', 'Agricultural', 9376, '1409400', 'Agricultural', '0', '84560', '1409400', '84560', '', 'Taxable', 1, 2010, 'Engr. Ernesto M. Hernandez', 'Engr. Eduardo B. Cedo Jr.', '2006-041-00001', '97270', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_type`, `username`, `password`, `authKey`, `accessToken`) VALUES
(1, 'Nikki Aquino', 1, 'admin', 'admin', '', ''),
(4, '', 4, 'taxpayer', 'taxpayer', '', ''),
(3, '', 3, 'treasurer', 'treasurer', '', ''),
(13, 'Susan Aquino Zamora', 1, 'admin098', '1234', '', ''),
(11, 'Alchl Quinpayan', 4, 'taxpayer', 'taxpayer', '', ''),
(12, 'Juan Eme', 2, 'Assessor', 'assessor', '', ''),
(14, 'adsda', 1, 'admin', 'admin', '', ''),
(15, 'dasda', 2, 'admin', 'admin', '', ''),
(16, 'Nikki Aquino', 1, 'admin1', 'admin1', 'asdasd3423', 'sdfdsf3242');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_statement`
--
ALTER TABLE `account_statement`
  ADD PRIMARY KEY (`soa_id`),
  ADD KEY `td_no` (`td_no`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_index_no`),
  ADD KEY `full_name` (`name_of_owner`);

--
-- Indexes for table `taxpayer`
--
ALTER TABLE `taxpayer`
  ADD PRIMARY KEY (`taxpayer_id`),
  ADD KEY `contact_no` (`contact_no`),
  ADD KEY `full_name` (`full_name`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `tax_declaration`
--
ALTER TABLE `tax_declaration`
  ADD PRIMARY KEY (`td_no`),
  ADD KEY `property_index_no` (`property_index_no`),
  ADD KEY `contact_no` (`tel_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_statement`
--
ALTER TABLE `account_statement`
  MODIFY `soa_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taxpayer`
--
ALTER TABLE `taxpayer`
  MODIFY `taxpayer_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tax_declaration`
--
ALTER TABLE `tax_declaration`
  MODIFY `td_no` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
