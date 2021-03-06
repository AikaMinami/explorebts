-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 08:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorebts`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `tourist_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `booking_days` int(2) NOT NULL DEFAULT 1,
  `booking_status` varchar(10) NOT NULL DEFAULT 'BOOKED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `tourist_id`, `booking_date`, `product_id`, `quantity`, `booking_days`, `booking_status`) VALUES
(1, 9, '2020-03-21', 1, 2, 2, 'BOOKED'),
(2, 9, '2020-03-21', 6, 1, 2, 'BOOKED'),
(3, 7, '2020-06-28', 8, 1, 1, 'BOOKED'),
(4, 7, '2020-06-28', 12, 2, 1, 'BOOKED'),
(5, 11, '2020-12-29', 2, 1, 3, 'BOOKED'),
(6, 11, '2020-12-29', 3, 1, 3, 'BOOKED'),
(7, 8, '2020-12-21', 7, 1, 2, 'BOOKED'),
(8, 8, '2020-12-21', 11, 2, 2, 'BOOKED'),
(9, 10, '2020-08-02', 5, 1, 2, 'BOOKED'),
(11, 10, '2020-08-02', 1, 1, 3, 'DONE'),
(12, 8, '2020-06-29', 2, 1, 1, 'CANCELED');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_pict` varchar(255) DEFAULT 'no-picture.png',
  `category_code` char(4) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_pict`, `category_code`, `unit_price`, `product_stock`, `vendor_id`, `product_desc`) VALUES
(1, 'Eiger Replecmen Double Layer', '6aec7c5b-dd39-4b15-ba8a-00b1ee0e7cbf.jpg', 'CMP', 15000, 1, 2, 'Double layer tent that can fit up to 3 persons.'),
(2, 'Eiger Mummy 250 - B0451 Sleeping Bad', '103148060_df946ffb-f70d-4f6f-8845-dc7461ab6527_590_590.jpg', 'CMP', 8000, 4, 2, 'This sleeping bag has a mummy model. Suitable for use in places with a temperature of 5 - 15 ° C and suitable for people with a maximum height of 180 cm.'),
(3, 'Consina Jomson New Mountain Boots', 'unnamed.jpg', 'CMP', 25000, 2, 3, 'Consina Jomson New mountain boots sizes 39 - 43 are suitable for climbing mountains. These mountain boots are water resistant and provide excellent control over the footing, which keeps your feet dry and comfortable.'),
(4, 'Jeep Bromo Toyota FJ40 For 7 People', '4155998451.jpg', 'JEEP', 800000, 3, 6, 'Rent a jeep to Mount Bromo area with a capacity of 10 people. Include driver, petrol, and parking. Pick up point in Tosari, Pasuruan.'),
(5, 'Jeep Bromo Toyota BJ40 For 5 People', '213913378.jpg', 'JEEP', 500000, 4, 6, 'Rent a jeep to Mount Bromo area with a capacity of 5 people. Include driver, petrol, and parking. Pick up point in Tosari, Pasuruan.'),
(6, 'Jeep Bromo Toyota FJ40 Exclude Driver', 'sewa-jeep-bromo-1.jpeg', 'JEEP', 300000, 6, 3, 'Rent a jeep to Mount Bromo area with a capacity of 7-9 people. Jeep rental only, not including driver and gasoline. The point of taking a jeep at The Forest Tumpang.'),
(7, 'Private Trip Bromo For 2 People', 'l22234.jfif', 'TRIP', 420000, 2, 4, 'Private trip to Mount Bromo and its surroundings for one day. The customers determine the destination from the start to the end by theirself. Include pickup at Ngadisari, entrance tickets, masks, documentation, and meals.'),
(8, 'Open Trip Bromo For 12 People', 'l26330.jfif', 'TRIP', 250000, 4, 4, 'Destinations: Penanjakan, Ledok Widodaren, Gunung Batok, Kawah Bromo, Bukit Teletubbies, and souvenir shops. Pick up point at The Forest Tumpang. Free to invite any person.'),
(9, 'Open Trip Semeru For 12-20 People', 'Ranu-Kumbolo.jpg', 'TRIP', 650000, 3, 6, 'Open trip to Mount Semeru with 12-20 people. Include transportation, guide, 9x meals, homestay, documentation, first aid kit, tents, and TNBTS insurance.'),
(10, 'Clover Homestay Standard Room', '152143042.jpg', 'INN', 100000, 6, 5, 'Standard room measuring 4m x 4m with single bed. There is an outside bathroom as well as a communal kitchen for cooking.'),
(11, 'Clover Homestay Superior Room', 'bb703007affc1e68ade676d53fcaef1b.jpg', 'INN', 180000, 6, 5, 'Superior room measuring 5m x 5m with twin beds. There is an outside bathroom as well as a communal kitchen for cooking.'),
(12, 'Clover Homestay Deluxe Room', 'unnamed (1).jpg', 'INN', 250000, 2, 5, 'Deluxe room measuring 5m x 5m with a king bed. There is an en-suite bathroom and a communal kitchen for cooking.');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_code` char(4) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_code`, `category_name`, `category_desc`) VALUES
('CMP', 'Camping tools', 'Rental of camping tools for camping needs around Bromo-Tengger-Semeru.'),
('INN', 'Inn', 'Rent a temporary residence to rest while visiting Bromo-Tengger-Semeru.'),
('JEEP', 'Jeep', 'Rent a jeep as a vehicle to visit the Bromo-Tengger-Semeru area.'),
('TRIP', 'Trip', 'Trip service rental to visit Bromo-Tengger-Semeru with certain packages.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(1) NOT NULL,
  `role_name` varchar(10) NOT NULL,
  `role_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'Parties that organize Explore BTS website.'),
(2, 'Vendor', 'Parties who sell or provide goods and services.'),
(3, 'Tourist', 'Tourists who will or are visiting Bromo-Tengger-Semeru National Park.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_pict` varchar(100) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `address`, `phone`, `email`, `password`, `role_id`, `profile_pict`) VALUES
(1, 'Admin', 'admin', 'Jl. Soekarno Hatta No.9, Jatimulyo, Lowokwaru, Malang 65141', '082257229983', 'helpdesk@explorebts.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'user.png'),
(2, 'Kalimati Outdoor', 'kalimatioutdoor', 'Jl. Raya Pulungdowo No.103 Tumpang, Malang 65156', '085868765670', 'kalimatioutdoor@gmail.com', '63af4ec9d3622d41276af881ce29d3cc', 2, 'kalimati-outdoors.jpg'),
(3, 'Arjuna Rental', 'arjunarental', 'Jl. Arjuna No. 119 Tumpang, Malang 65156', '08983117948', 'arjunarental@gmail.com', '0be6b13437a0d536042be08f449c9bcb', 2, 'arjuna-rental.jpg'),
(4, 'Partner Bromo', 'partnerbromo', 'Jl. Raya Bromo No. 86 Ngadisari, Probolinggo 67254', '082132162915', 'partnerbromo@gmail.com', '1b3a407d2c5859ca6488a833269d5eec', 2, 'partner bromo.jpg'),
(5, 'Clover Homestay Probolinggo', 'cloverhomestay', 'Jl. Mawar Merah No. 8 Mayangan, Probolinggo 67219', '081330496663', 'cloverhomestay@gmail.com', 'c4717611aae1f51b4ff28bfab7b69d17', 2, 'clover-homestay.jpg'),
(6, 'Zygy Jeep Rental', 'zygy_jeep', 'Jl. WR. Supratman No. 92 Tosari, Pasuruan 67177', '082335250120', 'zygyrental@gmail.com', '1d2011ada6e2f57f7605d8e024cef2cc', 2, 'zygy.jpg'),
(7, 'Abdul Rohman', 'abdulll', 'Jl. Semanggi Barat No. 131 Lowokwaru, Malang', '082132575729', 'abdulrohman@gmail.com', '68dc7edd3b57f86d479a401d8907780c', 3, 'user.png'),
(8, 'Meuti Zari', 'meutizari', 'Jl. Mawar No. 10 Sawahan, Surabaya', '082231814712', 'meutizari@gmail.com', '771b0be78e48d4db8a616d4920eaa164', 3, 'download20200704114634.png'),
(9, 'Nabilah Argyanti', 'nargyanti', 'Jl. Anna Maria No. 32 Antapani, Bandung', '082257229963', 'nargyanti@gmail.com', '033e343f77ccd828522a48b5085644e9', 3, 'user.png'),
(10, 'Naufal Nafidiin', 'naufal17', 'Jl. Parung Serab No. 48 Ciledug, Tangerang', '081213405817', 'naufal_nafidiin@gmail.com', 'ecd066300359c16e9d079520ee2ae76e', 3, 'user.png'),
(11, 'Widiareta Safitri', 'widiarsaf', 'Jl. Kebonsari No. 51 Sukun, Malang', '085536863159', 'widiarsaf@gmail.com', 'fe119c050336a11674cfd0f529a463c0', 3, 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tourist_id` (`tourist_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_code` (`category_code`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_code`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`tourist_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_code`) REFERENCES `product_categories` (`category_code`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
