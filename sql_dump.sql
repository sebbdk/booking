-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2015 at 06:44 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(36) NOT NULL,
  `booking_type_id` varchar(36) NOT NULL,
  `date_time` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_type_id`, `date_time`, `name`, `email`, `phone`, `confirmed`, `created`) VALUES
('55c8c810-6d08-4b6a-b29c-4b7d833cee3c', '', '0000-00-00 00:00:00', '', '', '', 0, '2015-08-10 17:49:36'),
('55c8c87c-d8dc-4899-b126-4bc8833cee3c', '', '0000-00-00 00:00:00', '', '', '', 0, '2015-08-10 17:51:24'),
('55c8c8ab-1f80-44ae-a51e-4bc8833cee3c', '', '0000-00-00 00:00:00', '', '', '', 0, '2015-08-10 17:52:11'),
('55c8c99d-22e8-4b2f-a198-4d28833cee3c', '559157ae-86a4-4275-8942-de95833cee3c', '2015-08-11 10:30:00', 'test', '123123@asdas.sk', '123123123', 1, '2015-08-10 17:56:13'),
('55cf2baa-0b24-4fdd-ab60-0cc3833cee3c', '55914f23-1890-4030-b6b4-db74833cee3c', '2015-08-12 11:30:00', 'jahsgdfas', 'asdads@asdas.sk', '982372983', 0, '2015-08-15 14:08:10'),
('55db4521-e850-4b60-a923-4d46833cee3c', '55914f23-1890-4030-b6b4-db74833cee3c', '2015-08-11 11:30:00', '12312', 'asd@asd.sk', '123123', 0, '2015-08-24 18:24:01'),
('55db4785-83c4-467a-8862-4269833cee3c', '55914f23-1890-4030-b6b4-db74833cee3c', '2015-08-11 12:15:00', '12312', 'asd@asd.sk', '123123', 0, '2015-08-24 18:34:13'),
('55db4790-6978-4e5d-a467-40cb833cee3c', '55914f23-1890-4030-b6b4-db74833cee3c', '2015-08-11 12:15:00', '12312', 'asd@asd.sk', '123123', 0, '2015-08-24 18:34:24'),
('55db47a3-0b80-4409-b419-7543833cee3c', '55914f23-1890-4030-b6b4-db74833cee3c', '2015-08-12 10:45:00', 'asdasd', '123123@asdas.sk', '123123', 0, '2015-08-24 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `booking_types`
--

CREATE TABLE `booking_types` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `mobile_pay_number` varchar(255) NOT NULL,
  `length` float NOT NULL,
  `asset_file` varchar(1024) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_types`
--

INSERT INTO `booking_types` (`id`, `name`, `price`, `mobile_pay_number`, `length`, `asset_file`, `color`) VALUES
('55914f23-1890-4030-b6b4-db74833cee3c', 'Fedt frysning: behandling', '500 kr', '12345678', 0.75, '55db4330-c7b8-416c-b830-433f833cee3c.png', '#4267ad'),
('559157ae-86a4-4275-8942-de95833cee3c', 'Konsultation', '0', '', 0.5, '55db4342-a0c8-46f6-8e8b-199c833cee3c.jpg', '#a91500');

-- --------------------------------------------------------

--
-- Table structure for table `open_times`
--

CREATE TABLE `open_times` (
  `id` varchar(36) NOT NULL,
  `booking_type_id` varchar(36) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `open_times`
--

INSERT INTO `open_times` (`id`, `booking_type_id`, `start`, `end`) VALUES
('55941a21-97a4-4bc7-94ed-fd76833cee3c', '', '2015-07-01 00:00:00', '2015-07-01 00:00:00'),
('55941a23-4ecc-4156-acdb-fd76833cee3c', '', '2015-07-02 00:00:00', '2015-07-02 00:00:00'),
('55941a26-8bc0-42d5-9ae3-fe71833cee3c', '', '2015-06-03 00:00:00', '2015-06-03 00:00:00'),
('55941a28-592c-4268-8a2d-fe71833cee3c', '', '2015-06-04 00:00:00', '2015-06-04 00:00:00'),
('55941a62-8684-4376-9f99-fe87833cee3c', '', '2015-07-03 00:00:00', '2015-07-03 00:00:00'),
('55c8c44e-5ec8-4ae1-8118-28e4833cee3c', '', '2015-08-10 00:00:00', '2015-08-10 00:00:00'),
('55c8c451-c970-4486-845a-28e4833cee3c', '', '2015-08-11 00:00:00', '2015-08-11 00:00:00'),
('55c8c454-9e50-46e9-84d9-28e4833cee3c', '', '2015-08-12 00:00:00', '2015-08-12 00:00:00'),
('55c8c455-b73c-49dd-b239-28e4833cee3c', '', '2015-08-13 00:00:00', '2015-08-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `password_reset_token`) VALUES
('55db486a-2404-4844-adeb-45cf833cee3c', 'demo bruger', 'test@test.dk', '55073a51e503f55503d4a3e3fe35524638b973c1', ''),
('55db48db-e1dc-4394-9bf4-4ba8833cee3c', 'sebbdk (DO NOT DELETE)', 'sebb@sebb.dk', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`), ADD KEY `booking_type_id` (`booking_type_id`);

--
-- Indexes for table `booking_types`
--
ALTER TABLE `booking_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_times`
--
ALTER TABLE `open_times`
 ADD PRIMARY KEY (`id`), ADD KEY `booking_type_id` (`booking_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);
