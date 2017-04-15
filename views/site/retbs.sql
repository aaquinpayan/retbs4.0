-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 09:08 AM
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
  `grand_total` int(32) NOT NULL,
  `validity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_index_no` int(32) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `kind` varchar(32) NOT NULL,
  `loc_num_street` varchar(32) NOT NULL,
  `loc_brgy_district` varchar(32) NOT NULL,
  `loc_mun_prov` varchar(32) NOT NULL,
  `loc_full` varchar(32) NOT NULL,
  `north_boundary` varchar(32) NOT NULL,
  `south_boundary` varchar(32) NOT NULL,
  `east_boundary` varchar(32) NOT NULL,
  `west_boundary` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taxpayer`
--

CREATE TABLE `taxpayer` (
  `taxpayer_id` int(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `payment_status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax_declaration`
--

CREATE TABLE `tax_declaration` (
  `td_no` int(32) NOT NULL,
  `property_index_no` int(32) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `survey_no` int(32) NOT NULL,
  `classification` varchar(32) NOT NULL,
  `area` int(32) NOT NULL,
  `market_value` int(32) NOT NULL,
  `actual_use` varchar(32) NOT NULL,
  `assessment_level` int(32) NOT NULL,
  `assessment_value` int(32) NOT NULL,
  `php` int(32) NOT NULL,
  `total_php` int(32) NOT NULL,
  `tot_assessed_value` varchar(32) NOT NULL,
  `effectivity_quarter` int(1) NOT NULL,
  `effectivity_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `user_id`, `username`, `password`, `user_type`) VALUES
('Nikki Aquino', 1, 'admin', 'admin', 1),
('', 4, 'taxpayer', 'taxpayer', 4),
('', 3, 'treasurer', 'treasurer', 3),
('', 2, 'assessor', 'assessor', 2);

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
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_index_no`),
  ADD KEY `full_name` (`full_name`);

--
-- Indexes for table `taxpayer`
--
ALTER TABLE `taxpayer`
  ADD PRIMARY KEY (`taxpayer_id`),
  ADD KEY `full_name` (`full_name`),
  ADD KEY `contact_no` (`contact_no`);

--
-- Indexes for table `tax_declaration`
--
ALTER TABLE `tax_declaration`
  ADD PRIMARY KEY (`td_no`),
  ADD KEY `property_index_no` (`property_index_no`),
  ADD KEY `contact_no` (`contact_no`);

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
  MODIFY `soa_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_index_no` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxpayer`
--
ALTER TABLE `taxpayer`
  MODIFY `taxpayer_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_declaration`
--
ALTER TABLE `tax_declaration`
  MODIFY `td_no` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_index_no`) REFERENCES `tax_declaration` (`property_index_no`);

--
-- Constraints for table `taxpayer`
--
ALTER TABLE `taxpayer`
  ADD CONSTRAINT `taxpayer_ibfk_1` FOREIGN KEY (`contact_no`) REFERENCES `tax_declaration` (`contact_no`),
  ADD CONSTRAINT `taxpayer_ibfk_2` FOREIGN KEY (`full_name`) REFERENCES `property` (`full_name`);

--
-- Constraints for table `tax_declaration`
--
ALTER TABLE `tax_declaration`
  ADD CONSTRAINT `tax_declaration_ibfk_1` FOREIGN KEY (`td_no`) REFERENCES `account_statement` (`td_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
