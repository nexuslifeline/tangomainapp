-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 09:47 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquire_points_info`
--

CREATE TABLE `acquire_points_info` (
  `acquire_point_id` bigint(20) NOT NULL,
  `acq_txn_no` varchar(55) DEFAULT '',
  `customer_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_points_acquired` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acquire_points_info`
--

INSERT INTO `acquire_points_info` (`acquire_point_id`, `acq_txn_no`, `customer_id`, `remarks`, `total_points_acquired`, `date_created`, `created_by_user`) VALUES
(1, 'ACQ-0000001', 3, '', '50.00', '2016-11-26 15:08:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acquire_points_items`
--

CREATE TABLE `acquire_points_items` (
  `acquire_item_id` bigint(20) NOT NULL,
  `txn_acquired_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT '0',
  `item_qty` int(11) NOT NULL,
  `acquired_points` decimal(20,2) DEFAULT '0.00',
  `points_each` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acquire_points_items`
--

INSERT INTO `acquire_points_items` (`acquire_item_id`, `txn_acquired_id`, `item_id`, `item_qty`, `acquired_points`, `points_each`) VALUES
(1, 1, 10, 1, '0.00', '0.00'),
(2, 1, 1, 1, '50.00', '50.00'),
(3, 1, 11, 1, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `advertisement_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`advertisement_id`, `images`, `is_deleted`, `is_active`) VALUES
(1, 'assets/images/ads/img-1.jpg', 0, 1),
(2, 'assets/images/ads/img-2.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(555) DEFAULT '',
  `branch_address` varchar(555) DEFAULT '',
  `contact_person` varchar(255) DEFAULT '',
  `branch_landline` varchar(55) DEFAULT '',
  `branch_mobile_no` varchar(55) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_address`, `contact_person`, `branch_landline`, `branch_mobile_no`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES
(1, 'Main Branch', '', '', '', '', '2016-10-07 11:20:00', 1, '2016-10-07 11:28:18', 1, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` bigint(20) NOT NULL,
  `card_code` varchar(555) DEFAULT '',
  `description` varchar(755) DEFAULT '',
  `remarks` varchar(755) DEFAULT '',
  `date_received` date DEFAULT '0000-00-00',
  `date_activated` datetime DEFAULT '0000-00-00 00:00:00',
  `activated_by_user` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_activated` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `card_code`, `description`, `remarks`, `date_received`, `date_activated`, `activated_by_user`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_active`, `is_deleted`, `is_activated`) VALUES
(3, '123', 'Test Card 1', '1', '2016-11-19', '2016-11-19 17:07:54', 1, '2016-11-19 17:07:23', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0', b'1'),
(4, '123456', 'test card 123456', 'test card 123456', '2016-11-23', '0000-00-00 00:00:00', 0, '2016-11-23 22:31:24', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(155) DEFAULT '',
  `cat_description` varchar(555) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`, `cat_description`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES
(1, 'Tickets', 'Tickets', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(2, 'Store Items', 'Store Items', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(7, 'Snacks', 'Snacks', '2016-10-25 01:10:39', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(8, 'Gadgets', 'Gadgets', '2016-10-25 18:57:53', 2, '2016-11-13 20:15:58', 1, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) NOT NULL,
  `cus_lname` varchar(155) DEFAULT '',
  `cus_fname` varchar(155) DEFAULT '',
  `cus_mname` varchar(155) DEFAULT '',
  `cus_address` varchar(755) DEFAULT '',
  `cus_email` varchar(255) DEFAULT '',
  `cus_mobile_no` varchar(30) DEFAULT '',
  `cus_telephone` varchar(20) DEFAULT '',
  `cus_username` varchar(100) DEFAULT '',
  `cus_password` varchar(555) DEFAULT '',
  `cus_bdate` date DEFAULT '0000-00-00',
  `cus_photo` varchar(255) DEFAULT '',
  `card_id` bigint(20) DEFAULT '0',
  `member_type_id` bigint(20) DEFAULT '0',
  `total_earn_pts` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `current_pts` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `cus_lname`, `cus_fname`, `cus_mname`, `cus_address`, `cus_email`, `cus_mobile_no`, `cus_telephone`, `cus_username`, `cus_password`, `cus_bdate`, `cus_photo`, `card_id`, `member_type_id`, `total_earn_pts`, `date_created`, `current_pts`, `created_by_user`, `date_deleted`, `deleted_by_user`, `date_modified`, `modified_by_user`, `is_active`, `is_deleted`) VALUES
(3, 'Sanchez', 'Mark Philip', 'S', '', 'mark@yahoo.com', '999999', '', 'mark@yahoo.com', 'ab39c54239118a4b086b878b7878100f769dd197', '2016-11-19', '', 3, 0, '50.00', '2016-11-19 17:07:54', '50.00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` bigint(20) NOT NULL,
  `item_code` varchar(155) DEFAULT '',
  `item_name` varchar(255) DEFAULT '',
  `category_id` int(11) DEFAULT '0',
  `required_points_redeem` decimal(20,2) DEFAULT '0.00',
  `acquired_points_reward` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_code`, `item_name`, `category_id`, `required_points_redeem`, `acquired_points_reward`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES
(1, '100001', '1 TICKET', 1, '0.00', '50.00', '0000-00-00 00:00:00', 0, '2016-11-16 22:26:31', 1, '0000-00-00 00:00:00', 0, b'1', b'0'),
(2, 'T2', '2 TICKET', 7, '0.00', '0.00', '0000-00-00 00:00:00', 0, '2016-11-16 22:29:24', 1, '0000-00-00 00:00:00', 0, b'1', b'0'),
(3, 'T3', '3 TICKET', 8, '0.00', '0.00', '0000-00-00 00:00:00', 0, '2016-11-16 22:29:35', 1, '0000-00-00 00:00:00', 0, b'1', b'0'),
(4, 'T4', '4 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(5, 'T5', '5 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(6, 'T6', '6 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(7, 'T7', '7 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(8, 'T8', '8 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(9, 'T9', '9 TICKET', 1, '0.00', '0.00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(10, 'T10', '10 TICKET', 2, '0.00', '0.00', '0000-00-00 00:00:00', 0, '2016-11-16 22:29:06', 1, '0000-00-00 00:00:00', 0, b'1', b'0'),
(11, '100', 'POPCORN', 7, '20.00', '0.00', '2016-11-16 22:48:05', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `membership_type`
--

CREATE TABLE `membership_type` (
  `member_type_id` int(11) NOT NULL,
  `member_type` varchar(155) DEFAULT '',
  `member_description` varchar(555) DEFAULT '',
  `required_points` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_type`
--

INSERT INTO `membership_type` (`member_type_id`, `member_type`, `member_description`, `required_points`, `date_created`, `created_by_user`, `date_deleted`, `deleted_by_user`, `date_modified`, `modified_by_user`, `is_active`, `is_deleted`) VALUES
(1, 'Bronze Member', '', '1000.00', '2016-11-13 15:10:29', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(2, 'Silver Member', '', '1200.00', '2016-11-13 15:10:39', 1, '0000-00-00 00:00:00', 0, '2016-11-13 15:14:39', 1, b'1', b'0'),
(3, 'Gold Member', '', '1400.00', '2016-11-13 15:11:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0'),
(4, 'Diamond Members', '', '2000.00', '2016-11-16 20:03:49', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `redeem_info`
--

CREATE TABLE `redeem_info` (
  `redeem_id` bigint(20) NOT NULL,
  `red_txn_no` varchar(55) DEFAULT '',
  `customer_id` bigint(20) DEFAULT NULL,
  `remarks` varchar(755) DEFAULT NULL,
  `total_points_redeem` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_items`
--

CREATE TABLE `redeem_items` (
  `redeem_item_id` bigint(20) NOT NULL,
  `txn_redeem_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT '0',
  `item_qty` int(11) NOT NULL,
  `redeem_points` decimal(20,2) DEFAULT '0.00',
  `points_each` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rights_links`
--

CREATE TABLE `rights_links` (
  `link_id` int(11) NOT NULL,
  `parent_code` varchar(100) DEFAULT '',
  `link_code` varchar(20) DEFAULT NULL,
  `link_name` varchar(255) DEFAULT '',
  `controller_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights_links`
--

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`, `controller_name`) VALUES
(1, '1', '1-1', 'Admin Dashboard', 'Dashboard'),
(2, '2', '2-1', 'Activate Card', 'Memberships'),
(3, '2', '2-2', 'Record Points', 'Record_points'),
(4, '2', '2-3', 'Redeem Points', 'Redeem_points'),
(5, '3', '3-1', 'Card Enlistment', 'Cards'),
(6, '3', '3-2', 'Item Masterlist', 'Items'),
(7, '3', '3-3', 'Category Masterlist', 'Categories'),
(8, '4', '4-1', 'Register User', 'Users'),
(9, '4', '4-2', 'Create User Rights', 'User_groups'),
(10, '4', '4-3', 'Create Branch', 'Branch'),
(11, '5', '4-4', 'User Profile', 'Profile'),
(12, '5', '4-5', 'Setup Member Types', 'Membership_types'),
(13, '2', '2-4', 'Upgrade Membership', 'Member_upgrade');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT '',
  `password` varchar(555) DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `user_lname` varchar(155) DEFAULT '',
  `user_fname` varchar(155) DEFAULT '',
  `user_mname` varchar(155) DEFAULT '',
  `user_bdate` date DEFAULT '0000-00-00',
  `branch_id` int(11) DEFAULT '0',
  `user_group_id` int(11) DEFAULT '0',
  `user_address` varchar(755) DEFAULT '',
  `user_mobile` varchar(255) NOT NULL,
  `user_photo` varchar(255) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_name`, `password`, `user_email`, `user_lname`, `user_fname`, `user_mname`, `user_bdate`, `branch_id`, `user_group_id`, `user_address`, `user_mobile`, `user_photo`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `is_active`, `is_deleted`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'nexuslifeline@gmail.com', 'Lifeline', 'Nexus', '', '2016-01-01', 1, 1, '', '', 'assets/images/user/583942c187ff0.jpg', '0000-00-00 00:00:00', 0, '2016-11-26 16:07:31', 1, b'1', b'0'),
(2, 'robert', '356a192b7913b04c54574d18c28d46e6395428ab', '', 'dela cruz', 'robert', '', '1970-01-01', 1, 2, NULL, '', NULL, '2016-11-16 22:58:06', 0, '0000-00-00 00:00:00', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL,
  `user_group` varchar(555) DEFAULT '',
  `access_description` varchar(755) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `access_description`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_deleted`, `is_active`) VALUES
(1, 'System Administrator', 'Can access all features.', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0', b'1'),
(2, 'Cashier', 'cashier only', '2016-11-16 22:53:18', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_rights`
--

CREATE TABLE `user_group_rights` (
  `user_rights_id` bigint(20) NOT NULL,
  `user_group_id` int(11) DEFAULT '0',
  `link_code` varchar(20) DEFAULT '',
  `is_default` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_rights`
--

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`, `is_default`) VALUES
(1, 1, '1-1', 0),
(2, 1, '2-1', 0),
(3, 1, '2-2', 0),
(4, 1, '2-3', 0),
(5, 1, '3-1', 0),
(6, 1, '3-2', 0),
(7, 1, '3-3', 0),
(8, 1, '4-1', 0),
(9, 1, '4-2', 0),
(10, 1, '4-3', 0),
(11, 1, '4-4', 0),
(12, 1, '4-5', 0),
(13, 1, '2-4', 0),
(16, 1, '1-1', 0),
(17, 1, '2-1', 0),
(18, 1, '2-2', 0),
(19, 1, '2-3', 0),
(20, 1, '3-1', 0),
(21, 1, '3-2', 0),
(22, 1, '3-3', 0),
(23, 1, '4-1', 0),
(24, 1, '4-2', 0),
(25, 1, '4-3', 0),
(26, 1, '4-4', 0),
(27, 1, '4-5', 0),
(28, 1, '2-4', 0),
(29, 1, '1-1', 0),
(30, 1, '2-1', 0),
(31, 1, '2-2', 0),
(32, 1, '2-3', 0),
(33, 1, '3-1', 0),
(34, 1, '3-2', 0),
(35, 1, '3-3', 0),
(36, 1, '4-1', 0),
(37, 1, '4-2', 0),
(38, 1, '4-3', 0),
(39, 1, '4-4', 0),
(40, 1, '4-5', 0),
(41, 1, '2-4', 0),
(44, 2, '2-1', 0),
(45, 2, '2-2', 1),
(46, 2, '2-3', 0),
(47, 2, '3-2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquire_points_info`
--
ALTER TABLE `acquire_points_info`
  ADD PRIMARY KEY (`acquire_point_id`);

--
-- Indexes for table `acquire_points_items`
--
ALTER TABLE `acquire_points_items`
  ADD PRIMARY KEY (`acquire_item_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `membership_type`
--
ALTER TABLE `membership_type`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `redeem_info`
--
ALTER TABLE `redeem_info`
  ADD PRIMARY KEY (`redeem_id`);

--
-- Indexes for table `redeem_items`
--
ALTER TABLE `redeem_items`
  ADD PRIMARY KEY (`redeem_item_id`);

--
-- Indexes for table `rights_links`
--
ALTER TABLE `rights_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`user_group_id`),
  ADD UNIQUE KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_group_rights`
--
ALTER TABLE `user_group_rights`
  ADD PRIMARY KEY (`user_rights_id`),
  ADD UNIQUE KEY `user_rights_id` (`user_rights_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquire_points_info`
--
ALTER TABLE `acquire_points_info`
  MODIFY `acquire_point_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `acquire_points_items`
--
ALTER TABLE `acquire_points_items`
  MODIFY `acquire_item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `membership_type`
--
ALTER TABLE `membership_type`
  MODIFY `member_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `redeem_info`
--
ALTER TABLE `redeem_info`
  MODIFY `redeem_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `redeem_items`
--
ALTER TABLE `redeem_items`
  MODIFY `redeem_item_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rights_links`
--
ALTER TABLE `rights_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_group_rights`
--
ALTER TABLE `user_group_rights`
  MODIFY `user_rights_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
