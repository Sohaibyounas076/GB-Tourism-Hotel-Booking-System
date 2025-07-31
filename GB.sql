-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 02:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gilgit_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('Sulman@gmail.com', '123'),
('admin', '12345'),
('admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_caption` varchar(255) NOT NULL,
  `hotel_logo` varchar(255) NOT NULL,
  `hotel_banner_img` varchar(255) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `hotel_caption`, `hotel_logo`, `hotel_banner_img`, `hotel_address`, `status`, `created_at`) VALUES
(1, 'RIXOS', 'Live and feel like a local in your own luxury apartment', 'hotels/hotels1_logo.png', 'hotels/hotel1room.jpg', 'city gilgit', 1, '2021-06-10 12:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_offerings`
--

CREATE TABLE `hotel_offerings` (
  `id` int(11) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `fa_class` varchar(255) NOT NULL,
  `offer_desc` text DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `offer_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_offerings`
--

INSERT INTO `hotel_offerings` (`id`, `offer_name`, `fa_class`, `offer_desc`, `hotel_id`, `offer_img`) VALUES
(1, 'Transportation', 'fas fa-bus', 'The rooftop helipads of Gast Hotel in San Francisco offer hotel guests quick and easy access by helicopter to the airport and destinations around their respective cities.Enjoy a hassle-free travel experience with complimentary airport shuttle service to SFO when you stay at the Gast Hotel.', 1, 'hotels/photo-8.jpg'),
(2, 'Parking', 'fas fa-parking', 'Our hotel provides full security parking.We organized all\r\ntypes of vehicles in the parking. Our parking is fully free', 1, 'hotels/parkscars.jpg'),
(3, 'Visit Places', 'fas fa-place-of-worship', 'Visit is travel brand and travel magazine. We showcase the best places to visit and travelto.', 1, 'hotels/visit3.jpg'),
(5, 'Transportation', 'first', 'Our hotel provides full transporatiion.We organized all types of vehicles in the transport.', 7, 'hotels/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `rent_per_night` int(11) NOT NULL,
  `room_img` varchar(255) NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`id`, `room_name`, `rent_per_night`, `room_img`, `room_desc`, `room_type`, `room_capacity`, `hotel_id`, `status`, `created_at`) VALUES
(1, 'Classic Room', 1000, 'rooms/hotelroome2.1.jpeg', 'some description of the room. some description of the room. some description of the room. some description of the room. ', 'Single Bed', 2, 1, 1, '2021-06-28 13:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_types`
--

CREATE TABLE `hotel_room_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_room_types`
--

INSERT INTO `hotel_room_types` (`id`, `type_name`) VALUES
(1, 'Single Bed'),
(2, 'Double Bed'),
(3, 'Twins Room'),
(4, 'Family Room');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_specs`
--

CREATE TABLE `hotel_specs` (
  `id` int(11) NOT NULL,
  `spec_name` varchar(255) NOT NULL,
  `spec_desc` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_specs`
--

INSERT INTO `hotel_specs` (`id`, `spec_name`, `spec_desc`, `hotel_id`) VALUES
(1, 'Exceptional Food', 'The unique flavors you will find in our restaurant will bring you one step closer to feeling like a local. You can grab a quick croissant or sit down for an exceptional full course dinner.', 1),
(2, 'Cozy Rooms', 'A room needs to be more than just an assortment of furniture. What’s more, the most thoughtfully designed of spaces can evoke a whole range of emotions in those who experience it.', 1),
(3, 'Business Class Rooms', 'there are best qality  rooms in our hotel. there are best qality  rooms in our hotel. there are best qality  rooms in our hotel. ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roombooking`
--

CREATE TABLE `roombooking` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `CNIC` varchar(15) NOT NULL,
  `Contact No` varchar(11) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Rooms` varchar(10) NOT NULL,
  `Room frequency` int(2) NOT NULL,
  `Checkin` date NOT NULL,
  `Check out` date NOT NULL,
  `Adults` int(2) NOT NULL,
  `Childrens` int(2) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `Massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Picture` varchar(11) NOT NULL,
  `create at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `password`, `Phone`, `Picture`, `create at`) VALUES
(46, 'Sohaib Youn', 'admin@gmail.com', '12345', '+9233377078', 'data/BE17D1', '2023-07-30 12:18:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_offerings`
--
ALTER TABLE `hotel_offerings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_room_types`
--
ALTER TABLE `hotel_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_specs`
--
ALTER TABLE `hotel_specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombooking`
--
ALTER TABLE `roombooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotel_offerings`
--
ALTER TABLE `hotel_offerings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_room_types`
--
ALTER TABLE `hotel_room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_specs`
--
ALTER TABLE `hotel_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roombooking`
--
ALTER TABLE `roombooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
