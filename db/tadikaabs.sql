-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2015 at 07:08 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tadikaabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('branch_manager', '25', NULL, 'N;'),
('branch_manager', '26', NULL, 'N;'),
('branch_manager', '31', NULL, 'N;'),
('branch_owner', '2', NULL, 'N;'),
('branch_owner', '3', NULL, 'N;'),
('parent', '30', NULL, 'N;'),
('teacher', '27', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('branch_manager', 2, 'Pengurus Branch', NULL, 'N;'),
('branch_owner', 2, 'Pengusaha Branch', NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('HQ', 2, 'Admin HQ', NULL, 'N;'),
('parent', 2, 'Ibu Bapa', NULL, 'N;'),
('region_manager', 2, 'Pengurus Kawasan', NULL, 'N;'),
('teacher', 2, 'Cikgu Tadika', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
`id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `capacity` int(9) NOT NULL DEFAULT '10',
  `fees` varchar(255) NOT NULL DEFAULT '300',
  `brand_id` int(9) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `gmaps` text NOT NULL,
  `description` text NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(255) NOT NULL,
  `latlong` varchar(40) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `image` varchar(40) DEFAULT NULL,
  `account` int(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `name`, `owner_id`, `capacity`, `fees`, `brand_id`, `address`, `city`, `state`, `gmaps`, `description`, `changetime`, `tel`, `latlong`, `status`, `image`, `account`, `bank`) VALUES
(1, 'branch 1', 0, 10, '300', 1, 'test', '', '', 'test', 'asdfs', '2015-03-28 06:03:37', '23423423', '', 0, '', NULL, ''),
(2, 'Branch 2', 0, 10, '300', 1, 'asfasd', '', '', 'asdfdsaf', 'asdfdsa', '2015-03-28 06:03:55', '242423', '', 0, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `branch_managers`
--

CREATE TABLE `branch_managers` (
`id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_managers`
--

INSERT INTO `branch_managers` (`id`, `branch_id`, `user_id`) VALUES
(12, 1, 26),
(13, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `branch_owners`
--

CREATE TABLE `branch_owners` (
`id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_owners`
--

INSERT INTO `branch_owners` (`id`, `branch_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `branch_teachers`
--

CREATE TABLE `branch_teachers` (
`id` int(11) unsigned NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_teachers`
--

INSERT INTO `branch_teachers` (`id`, `branch_id`, `user_id`) VALUES
(1, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
`id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `owner_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `owner_id`, `description`, `changetime`) VALUES
(1, 'Tadika ABS', '', '4', 'semata-mata', '2013-09-16 03:38:23'),
(2, 'Aulad', '', '4', 'dferf\n', '2013-09-17 06:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
`id` int(9) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `invoice_type_id` int(11) DEFAULT NULL,
  `to_id` int(9) NOT NULL COMMENT 'application: to_id = parent_id',
  `from_id` int(9) NOT NULL COMMENT 'application: from_id = branch_id',
  `rm_total` decimal(19,2) NOT NULL,
  `resit_details` text,
  `other_details` text,
  `remarks` text,
  `status` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `title`, `invoice_type_id`, `to_id`, `from_id`, `rm_total`, `resit_details`, `other_details`, `remarks`, `status`, `timestamp`, `kid_id`) VALUES
(6, '', 1, 30, 26, 300.00, 'online', '', 'Bayaran telah diterima. Terima kasih', 2, '2015-03-29 11:35:40', 10);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
`id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoice_status_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `invoice_status_id`, `date`, `updated_by`) VALUES
(9, 6, 1, '2015-03-29 11:35:40', 26),
(10, 6, 5, '2015-03-29 12:04:02', 30),
(11, 6, 2, '2015-03-29 13:26:18', 26);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE `invoice_status` (
`id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`id`, `name`) VALUES
(1, 'Baru'),
(2, 'Bayaran Diterima'),
(3, 'Batal'),
(4, 'Bayaran Tidak Diterima'),
(5, 'Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_type`
--

CREATE TABLE `invoice_type` (
`id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_type`
--

INSERT INTO `invoice_type` (`id`, `name`) VALUES
(1, 'Yuran Permohonan');

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
`id` int(9) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `pics` varchar(255) DEFAULT '',
  `ic` varchar(255) DEFAULT '',
  `birthplace` varchar(255) NOT NULL,
  `previous_school` text NOT NULL,
  `mykids` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `alergic_to` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `branch_id` int(9) DEFAULT '0',
  `status` varchar(255) DEFAULT '',
  `status_id` int(11) DEFAULT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `fullname`, `gender`, `pics`, `ic`, `birthplace`, `previous_school`, `mykids`, `birthday`, `alergic_to`, `parent_id`, `branch_id`, `status`, `status_id`, `changetime`) VALUES
(10, 'Hadif Iskandar Bin Haezal', 'L', '', '', 'HUKM', 'tiada', '130328142203', '2013-03-28', 'tiada', 30, 1, '', 2, '2015-03-29 11:28:26'),
(12, 'Nor Suraya Binti Haezal', 'P', '', '', 'HUKM', 'Taska pasti ilmi ampang', '140202341232', '2013-03-28', 'tak boleh makan coklat', 30, 2, '', 2, '2015-03-29 15:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `kid_photos`
--

CREATE TABLE `kid_photos` (
`id` int(11) NOT NULL,
  `kid_id` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `filepath` varchar(200) DEFAULT NULL,
  `filesize` varchar(30) DEFAULT NULL,
  `filetype` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kid_photos`
--

INSERT INTO `kid_photos` (`id`, `kid_id`, `filename`, `filepath`, `filesize`, `filetype`) VALUES
(7, 10, 'Anas - Pasport.jpg', 'upload/photo/10/Anas - Pasport.jpg', NULL, NULL),
(9, 12, 'Damia-passport-.jpg', 'upload/photo/12/Damia-passport-.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kid_status`
--

CREATE TABLE `kid_status` (
`id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kid_status`
--

INSERT INTO `kid_status` (`id`, `name`) VALUES
(1, 'Pendaftaran Baru'),
(2, 'Aktif Pelajar'),
(3, 'Tidak Aktif'),
(4, 'Dalam Proses Pembayaran'),
(5, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1427519679),
('m110805_153437_installYiiUser', 1427519696),
('m110810_162301_userTimestampFix', 1427519696);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE `tbl_profiles` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `ic` varchar(12) NOT NULL DEFAULT '',
  `no_kwsp` varchar(20) NOT NULL DEFAULT '',
  `permit` varchar(30) NOT NULL DEFAULT '',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `first_name`, `ic`, `no_kwsp`, `permit`, `salary`) VALUES
(1, 'Administrator', '', '', '', 0.00),
(2, 'Branch ', '', '', '', 0.00),
(3, 'Branch', '', '', '', 0.00),
(26, 'test', '81007526413', '23432', '', 1000.00),
(27, 'teacher', '23423423', '', '', 2000.00),
(30, 'haezal bin musa', '871007526413', '', '', 0.00),
(31, 'haezal 2', '824234234', '', '', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE `tbl_profiles_fields` (
`id` int(11) NOT NULL,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'first_name', 'Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(3, 'ic', 'No Kad Pengenalan', 'VARCHAR', 12, 0, 1, '', '', 'No kad pengenalan tidak sah', '', '', '', '', 3, 3),
(4, 'no_kwsp', 'No KWSP', 'VARCHAR', 20, 0, 0, '', '', '', '', '', '', '', 4, 3),
(5, 'permit', 'No Permit', 'VARCHAR', 30, 0, 0, '', '', '', '', '', '', '', 6, 3),
(6, 'salary', 'Gaji', 'DECIMAL', 10, 0, 0, '', '', '', '', '0', '', '', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'webmaster@example.com', '8c14807ac6ece3a87e77eccfef880bee', 1, 1, '2015-03-28 05:14:56', '2015-03-29 11:06:51'),
(2, 'branch_owner1', '5f4dcc3b5aa765d61d8327deb882cf99', 'branch_owner@gmail.com', 'bcb0c277739c8244152135dbd2870519', 0, 1, '2015-03-27 22:51:04', '2015-03-29 10:09:35'),
(3, 'branch2', '5f4dcc3b5aa765d61d8327deb882cf99', 'branch2@gmail.com', 'ebbe0b02e92790c8b69eb60d77f9273c', 0, 1, '2015-03-27 23:15:12', '2015-03-27 23:44:54'),
(26, 'branch_manager1', '5f4dcc3b5aa765d61d8327deb882cf99', 'test3@gmail.com', 'f1fd3d47e4147dac11c43c52a08e8d7a', 0, 1, '2015-03-28 00:46:45', '2015-03-29 11:00:45'),
(27, 'teacher1', '5f4dcc3b5aa765d61d8327deb882cf99', 'teacher1@gmail.com', '3c58110a1f5d8c821b37e715795fbb40', 0, 1, '2015-03-28 00:53:42', '2015-03-28 01:54:40'),
(30, 'haezal', '5716f55419a25cef848511791a483b21', 'haezal@um.edu.my', '09d06033513f188e816e71a6b44f00ea', 0, 1, '2015-03-28 08:04:35', '2015-03-29 11:07:15'),
(31, 'haezal2', '5f4dcc3b5aa765d61d8327deb882cf99', 'haezal2@gmail.com', 'f639855184dee9659781082a63904a3c', 0, 1, '2015-03-28 01:12:26', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
 ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `AuthItem`
--
ALTER TABLE `AuthItem`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `fk_branch_brand_id` (`brand_id`);

--
-- Indexes for table `branch_managers`
--
ALTER TABLE `branch_managers`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_branch_manager_branch_id` (`branch_id`), ADD KEY `fk_branch_manager_user_id` (`user_id`);

--
-- Indexes for table `branch_owners`
--
ALTER TABLE `branch_owners`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_branch_owner_branch_id` (`branch_id`), ADD KEY `fk_branch_owner_user_id` (`user_id`);

--
-- Indexes for table `branch_teachers`
--
ALTER TABLE `branch_teachers`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_branch_teacher_branch_id` (`branch_id`), ADD KEY `fk_branch_teacher_user_id` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_ibfk1` (`invoice_type_id`), ADD KEY `invoices_ibfk2` (`to_id`), ADD KEY `invoices_ibfk3` (`from_id`), ADD KEY `invoices_ibfk4` (`kid_id`), ADD KEY `invoices_ibfk5` (`status`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
 ADD PRIMARY KEY (`id`), ADD KEY `invoice_details_ibfk1` (`invoice_id`), ADD KEY `invoice_details_ibfk2` (`invoice_status_id`), ADD KEY `invoide_details_ibfk3` (`updated_by`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_type`
--
ALTER TABLE `invoice_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `fk_kids_branch_id` (`branch_id`), ADD KEY `fk_kids_parent_id` (`parent_id`), ADD KEY `fk_kids_status_id` (`status_id`);

--
-- Indexes for table `kid_photos`
--
ALTER TABLE `kid_photos`
 ADD PRIMARY KEY (`id`), ADD KEY `kid_photo_ibfk1` (`kid_id`);

--
-- Indexes for table `kid_status`
--
ALTER TABLE `kid_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Rights`
--
ALTER TABLE `Rights`
 ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_username` (`username`), ADD UNIQUE KEY `user_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branch_managers`
--
ALTER TABLE `branch_managers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `branch_owners`
--
ALTER TABLE `branch_owners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branch_teachers`
--
ALTER TABLE `branch_teachers`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoice_type`
--
ALTER TABLE `invoice_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kid_photos`
--
ALTER TABLE `kid_photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kid_status`
--
ALTER TABLE `kid_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branchs`
--
ALTER TABLE `branchs`
ADD CONSTRAINT `fk_branch_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_managers`
--
ALTER TABLE `branch_managers`
ADD CONSTRAINT `fk_branch_manager_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_branch_manager_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_owners`
--
ALTER TABLE `branch_owners`
ADD CONSTRAINT `fk_branch_owner_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_branch_owner_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_teachers`
--
ALTER TABLE `branch_teachers`
ADD CONSTRAINT `fk_branch_teacher_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_branch_teacher_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
ADD CONSTRAINT `invoices_ibfk1` FOREIGN KEY (`invoice_type_id`) REFERENCES `invoice_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `invoices_ibfk2` FOREIGN KEY (`to_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoices_ibfk3` FOREIGN KEY (`from_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoices_ibfk4` FOREIGN KEY (`kid_id`) REFERENCES `kids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `invoices_ibfk5` FOREIGN KEY (`status`) REFERENCES `invoice_status` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
ADD CONSTRAINT `invoice_details_ibfk1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `invoice_details_ibfk2` FOREIGN KEY (`invoice_status_id`) REFERENCES `invoice_status` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `invoide_details_ibfk3` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `kids`
--
ALTER TABLE `kids`
ADD CONSTRAINT `fk_kids_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_kids_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_kids_status_id` FOREIGN KEY (`status_id`) REFERENCES `kid_status` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `kid_photos`
--
ALTER TABLE `kid_photos`
ADD CONSTRAINT `kid_photo_ibfk1` FOREIGN KEY (`kid_id`) REFERENCES `kids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;
