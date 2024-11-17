-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 08:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `posted_on` date NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `author`, `posted_on`, `content`, `image`, `category`) VALUES
(6, 'The man', 'Posted by Admin', '2023-12-14', 'i love farming', 'uploads/farmPartnership.jpg', 'farming vergitables'),
(7, 'the man', 'Posted by Admin', '2024-01-05', 'altigh', 'uploads/food.jpg', 'farming vergitables'),
(8, 'Defeating tomato disease.', 'Posted by Admin', '2023-12-07', 'It\'s the warm season. Farmers are happy that their tomatoes are finally going to receive the much 					sunlight needed for the fruit to grow bigger, juicier and firmer. What most probably', 'uploads/farming.jpg', 'farming vergitables'),
(9, 'What is a healthy soil?', 'Posted by Admin', '2023-12-12', 'Soil health is the capacity of soil to function as a living system, with ecosystem and land use boundaries,						to sustain plant and animal productivity, maintain or enhance water and air quality, and promote plant and					animal health. Healthy soils maintain a diverse community of soil organisms that help to control plant disease, 						insect and weed...', 'uploads/healthySoil.jpg', 'social health'),
(10, 'Digital revolution in Farming.', 'Posted by Admin', '2023-12-25', 'With increasing population, urbanization and contagious depletion of natural resources, there has to 						be a paradigm shift in farmer’s perception from...', 'uploads/farming.jpg', 'digital farming'),
(11, 'Succession farm partnerships', 'ghost', '2023-12-13', 'With almost one in three farmers over the normal retirement age but only one in twenty farmers under the age of 35,						the Department of Agriculture, Food and the ...', 'uploads/farmPartnership.jpg', 'Partnership'),
(12, 'Food security in Kenya.', 'ghost', '2023-12-13', 'The agricultural sector is the backbone of the economy, contributing approximately 33 percent of Kenya’s Gross Domestic 						Product (GDP). The agriculture sector employs more than 40 percent of the total population and 70 percent of the \r\n						rural population. However, agricultural productivity has stagnated in recent years. Smallholder farmers and agricultural						enterprises continue to face growing their businesses and improving the quality of agricultural goods. 						We work to enhance agriculture-led economic...', 'uploads/yield.jpg', 'food security'),
(17, 'the man', 'Posted by Admin', '2023-12-20', 'there once lived a man called ghost and he was a tech enthusiast', 'uploads/digitalFarming.jpg', 'social health'),
(18, 'the boy', 'Posted by Admin', '2023-12-14', 'there is always a sad boy sitting infront of the computer everyday and thing hmmmmm', 'uploads/tractor.jpeg', 'the boy'),
(19, 'tech guy', 'ghost', '2023-12-20', 'there\'s this guy who likes computers and he understands the computer language', 'uploads/7.jpg', 'computing');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `provider_type` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `additional_requests` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_name`, `customer_email`, `customer_phone`, `provider_id`, `provider_type`, `booking_date`, `booking_time`, `additional_requests`, `status`, `created_at`, `farmer_id`) VALUES
(28, 'Spyboy', 'example@gmail.com', '0523565896', 12, '0', '2024-02-22', '02:55:00', 'that\'s kk', 'Confirmed', '2024-02-11 11:55:39', 58),
(29, 'Spyboy', 'example@gmail.com', '0523565896', 12, '0', '2024-02-23', '15:00:00', 'ok', 'Pending', '2024-02-11 12:00:46', 58),
(30, 'Matter', 'example@gmail.com', '0523565896', 12, '0', '2024-02-07', '14:30:00', 'kk', 'Pending', '2024-02-11 12:30:46', 54);

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `crop_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `variety` varchar(255) DEFAULT NULL,
  `planting_date` date DEFAULT NULL,
  `harvest_date` date DEFAULT NULL,
  `acreage` decimal(10,2) DEFAULT NULL,
  `growth_stage` varchar(100) DEFAULT NULL,
  `issues` text DEFAULT NULL,
  `treatments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`crop_id`, `name`, `variety`, `planting_date`, `harvest_date`, `acreage`, `growth_stage`, `issues`, `treatments`, `created_at`, `farmer_id`) VALUES
(14, 'Ricce', 'rice', '2023-12-12', '2023-12-05', 900.00, 'seddling', 'daday', 'adding more water', '2023-12-31 21:05:39', NULL),
(20, 'Maize', 'an othe', '0000-00-00', '0000-00-00', 456.00, 'seddling', 'falling off and dying', 'adding more water', '2024-01-09 22:57:56', 54),
(21, 'Rice', 'grains', '2024-01-23', '2024-03-29', 345.00, NULL, NULL, NULL, '2024-01-25 15:56:54', 54);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `crop` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `firstName`, `lastName`, `address`, `phone`, `location`, `crop`, `email`, `username`, `password`, `user_type`) VALUES
(54, 'salim', 'shaibu', 'gu 240', '0541120274', 'Nairobi', 'maize', 'elano@gmail.com', 'spyboy', '$2y$10$dR/1qKP1Jshpsg6/uojd2eZsayUR7u7jNO7SIpvpv/1nb.iGw.58y', 'Farmer'),
(58, 'Salim', 'Elano', 'ret 23', '0542456676', 'tamale', 'millet', 'example23@email.com', 'spyboy2', '$2y$10$7fJ2.oZbc7vu.Ue4MPGV0ORCvymULBwKRS0PwJbaYIbXPWwuvYp3m', 'Farmer'),
(59, NULL, NULL, NULL, '0241234560', NULL, NULL, 'cybergh0st404@protonmail.com', 'ManNN', '$2y$10$d2H82z/2R0x3JhoeveVWseFfS/xlU2C3ZWOTtTeL3oxHZOu3UWfMe', 'Farmer');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` int(11) NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `farm_size` decimal(8,2) NOT NULL,
  `crops_grown` text NOT NULL,
  `livestock` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `farm_name`, `location`, `farm_size`, `crops_grown`, `livestock`, `created_at`, `image_url`, `farmer_id`) VALUES
(4, 'ghost', 'ghana', 89.00, 'banana', 'fowls', '2023-12-30 17:42:56', 'images/capsicum.jpg', NULL),
(6, 'chinchina', 'tamale', 5667.00, 'maize', 'birds and goats', '2024-01-09 10:59:19', 'images/pic3.jpg', 54);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_records`
--

CREATE TABLE `maintenance_records` (
  `record_id` int(11) NOT NULL,
  `tractor_id` int(11) DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `maintenance_type` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_records`
--

INSERT INTO `maintenance_records` (`record_id`, `tractor_id`, `maintenance_date`, `maintenance_type`, `notes`) VALUES
(2, 15, '2024-01-02', 'repair', 'th eloddl'),
(3, 15, '2024-01-17', 'repair', 'i love repair'),
(4, 13, '2024-02-02', 'replacing of the tire', 'tire has been changed'),
(5, 13, '2024-01-25', 'Changing of oil', 'oil was successfully changed'),
(6, 16, '2024-01-12', 'Replacing  of the fuel tank and two  tires', 'The tank had a leak and the two tires burst when it was used in farming..so it was taking to the mechanic and  an amount of GH340 was  spent');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `MobileNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `UserName`, `MobileNo`, `Email`, `Password`, `UserType`, `Fname`, `Lname`) VALUES
(11, 'spyboy', '0277586909', 'example23@email.com', '$2y$10$tP91LhNF01z1zaKQooiU.OHddTbNrTXPfLrvr27rxVDAA.aUn3pXm', 'Farmer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movers`
--

CREATE TABLE `movers` (
  `mover_id` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movers`
--

INSERT INTO `movers` (`mover_id`, `contact`, `email`, `location`, `created_at`, `username`, `password`, `user_type`, `company_name`, `contact_person`, `address`) VALUES
(7, '0503223500', 'example12@email.com', 'tamale', '2024-01-14 00:39:54', 'Salim', '$2y$10$QXd7B04CqHSEqo6ykLUFou8xrESlqWuChX26ylUbH0BmVLrz5pb52', 'Mover', 'Ring', 'Ghost', 'gu 240'),
(10, '0542456676', 'example523@email.com', 'tamale', '2024-01-17 18:11:47', 'Timtooni', '$2y$10$K4TyvbiU8b6RgG6HtqZ0u.aI4UIg0mgNIijFYGAd1UxW5mwK/iYQq', 'Mover', 'AgroCenter', 'Yussif', 'eh45'),
(12, '0241234560', 'elahn237834@gmail.com', '', '2024-06-07 08:38:39', 'staff', '$2y$10$AjsBOWitHMkw8iWz7sKQXONqj4Z/a.6cepprRdOZJQSPDkzSjqkP2', 'Mover', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mover_bookings`
--

CREATE TABLE `mover_bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `provider_type` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `additional_requests` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mover_bookings`
--

INSERT INTO `mover_bookings` (`booking_id`, `customer_name`, `customer_email`, `customer_phone`, `provider_id`, `provider_type`, `booking_date`, `booking_time`, `additional_requests`, `status`, `created_at`) VALUES
(1, 'Dadasco', 'example23@gmail.com', '0555677959', 10, '0', '2024-02-12', '03:04:00', 'i think is ok', 'Pending', '2024-02-02 17:12:46'),
(2, 'ghost', 'example23@gmail.com', '0555677959', 10, '0', '2024-02-14', '02:04:00', 'ok', 'Pending', '2024-02-02 17:24:37'),
(3, 'ghost', 'example23@gmail.com', '0555677959', 10, '0', '2024-02-14', '02:04:00', 'ok', 'Confirmed', '2024-02-02 17:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `mover_machines`
--

CREATE TABLE `mover_machines` (
  `machine_id` int(11) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `mover_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year_of_manufacture` int(11) DEFAULT NULL,
  `capacity` decimal(10,2) DEFAULT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `license_plate` varchar(20) DEFAULT NULL,
  `machine_image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mover_machines`
--

INSERT INTO `mover_machines` (`machine_id`, `machine_name`, `description`, `mover_id`, `model`, `year_of_manufacture`, `capacity`, `fuel_type`, `license_plate`, `machine_image`) VALUES
(5, 'Toyota Nissan', 'this is a powerful mover machine', 7, 'MD34', 2022, 345.00, 'Dissel', '45tyuiu98', 0x2e2e2f68616e646c65732f696d616765732f666f726b2d6c6966742e6a7067),
(6, 'Toyota Nissan', 'this is a powerful mover machine', 7, 'MD34', 2022, 345.00, 'Dissel', '45tyuiu98', 0x2e2e2f68616e646c65732f696d616765732f666f726b2d6c6966742e6a7067),
(7, 'Van', 'this is the main machine', 7, '23ETY', 2002, 345.00, 'Dissel', '45tyuiu98', 0x2e2e2f68616e646c65732f696d616765732f63656d656e742d6d697865722e6a7067),
(10, 'toyota', 'it runs likehell', 12, 'ghty56', 2020, 299.00, 'dissel', 'SXE2345', 0x2e2e2f68616e646c65732f696d616765732f63656d656e742d6d697865722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `mover_maintenance_records`
--

CREATE TABLE `mover_maintenance_records` (
  `record_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `maintenance_type` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mover_maintenance_records`
--

INSERT INTO `mover_maintenance_records` (`record_id`, `machine_id`, `maintenance_date`, `maintenance_type`, `notes`) VALUES
(1, 5, '2024-01-11', 'Changing of oil', 'this was done successfully');

-- --------------------------------------------------------

--
-- Table structure for table `mover_notifications`
--

CREATE TABLE `mover_notifications` (
  `notification_id` int(11) NOT NULL,
  `mover_id` int(11) DEFAULT NULL,
  `notification_text` varchar(255) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `additional_requests` text DEFAULT NULL,
  `is_confirmed` varchar(50) DEFAULT 'Not Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mover_notifications`
--

INSERT INTO `mover_notifications` (`notification_id`, `mover_id`, `notification_text`, `booking_id`, `booking_date`, `booking_time`, `additional_requests`, `is_confirmed`) VALUES
(1, 10, 'New booking initiated for your service.', 3, '0000-00-00', '02:04:00', 'ok', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `mover_tasks`
--

CREATE TABLE `mover_tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `task_status` enum('pending','completed') DEFAULT 'pending',
  `mover_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mover_tasks`
--

INSERT INTO `mover_tasks` (`task_id`, `task_name`, `task_description`, `task_date`, `task_status`, `mover_id`) VALUES
(4, 'moving', 'this is it', '2024-01-15', 'completed', 7),
(5, 'clearing of the land', 'driving and dancing', '2024-01-16', 'completed', 7),
(6, 'clearing of the land', 'driving and dancing', '2024-01-16', 'completed', 7),
(7, 'clearing of the land', 'Clearring of land round gurugu', '2024-01-12', 'completed', 10),
(8, 'clearing of the land', 'Clearring of land round gurugu', '2024-01-12', 'completed', 10),
(9, 'clearing of the land', 'Clearring of land round gurugu', '2024-01-12', 'pending', 10),
(10, 'Taking the goods and sending to the market', 'lets do it', '2024-01-04', 'pending', 7),
(11, 'moving items out of the farm in savelgu', 'the whole farm', '2024-01-10', 'pending', 7),
(12, 'moving items out of the farm in savelgu', 'i need love', '2024-01-08', 'pending', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE `news_articles` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `posted_date` date NOT NULL,
  `content` text NOT NULL,
  `article_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`id`, `image`, `alt_text`, `title`, `posted_date`, `content`, `article_link`) VALUES
(3, 'uploads/tea.jpg', 'tea', 'Tea prices dip 13% as high volumes persist', '2023-12-07', 'Average tea prices for factories managed by Kenya Tea Development Agency have dropped by 13.3%...', 'https://kilimonews.co.ke/general-news/tea-prices-dip-13-as-high-volumes-persist/'),
(4, 'uploads/pyrethrum.jpg', 'flower', 'Pyrethrum farmers to benefit from Norwegian agency support', '2023-12-15', 'Pyrethrum farmers from four counties in Kenya will benefit from support by the Norwegian Agency', 'https://kilimonews.co.ke/agriculture-investment/pyrethrum-farmers-to-benefit-from-norwegian-agency-support/\" class=\"btn-readmore'),
(5, 'uploads/youth.jpg', 'youth', 'Study shows access to infrastructure can increase youth engagement in agriculture', '2024-01-21', 'Youth unemployment remains a critical challenge in developing countries, especially in Sub-Saharan Africa where the...', 'https://kilimonews.co.ke/agribusiness/study-shows-access-to-infrastructure-can-increase-youth-engagement-in-agriculture/\" class=\"btn-readmore'),
(6, 'uploads/pesticide.jpg', 'sprayer', 'Industry has pesticides ready for locust spraying in Kenya- Agrochemicals Association', '2023-12-22', 'Kenya has the pesticides to tackle the country’s locust invasion ready and stored in local..', 'href=\"https://kilimonews.co.ke/agricultural-products/industry-has-pesticides-ready-for-locust-spraying-in-kenya-agrochemicals-association/'),
(7, 'uploads/milkProcessing.jpg', 'milk in a jar', 'New KCC to venture into goat and camel milk processing', '2023-12-17', 'Dairy goat and camel farmers have a reason to smile as New KCC plans to', 'https://kilimonews.co.ke/agricultural-products/new-kcc-to-venture-into-goat-and-camel-milk-processing/\" class=\"btn-readmore'),
(9, 'uploads/teaFarmer.jpg', 'human', 'the boy', '2023-12-13', 'there is always this sad boy who likes coding every day ', 'href=\"https://kilimonews.co.ke/agricultural-products/industry-has-pesticides-ready-for-locust-spraying-in-kenya-agrochemicals-association/'),
(10, 'uploads/6.jpg', 'computer', 'the tech guy', '2023-12-20', 'tech is life says the tech enthusiast who codes and sits infront of the computer everyday', 'https://kilimonews.co.ke/agribusiness/study-shows-access-to-infrastructure-can-increase-youth-engagement-in-agriculture/\" class=\"btn-readmore');

-- --------------------------------------------------------

--
-- Table structure for table `owner_tasks`
--

CREATE TABLE `owner_tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `task_status` enum('pending','completed') DEFAULT 'pending',
  `owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_tasks`
--

INSERT INTO `owner_tasks` (`task_id`, `task_name`, `task_description`, `task_date`, `task_status`, `owner_id`) VALUES
(1, 'moving', 'ddlkddl', '2024-01-03', 'completed', 12),
(2, 'moving', 'ddlkddl', '2024-01-03', 'pending', 12),
(3, 'moving', 'ddlkddl', '2024-01-03', 'pending', 12),
(4, 'clearing of the land', 'reegbtyhn5ujn5unun', '2024-01-10', 'completed', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `climatic_requirements` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discounted_price`, `climatic_requirements`, `created_at`) VALUES
(7, 'Banana', 'jsust a dlk', 45.00, 34.00, 'jksfjkjflsdlkjf', '2023-12-30 18:36:02'),
(8, 'Banana', 'jsust a dlk', 45.00, 34.00, 'jksfjkjflsdlkjf', '2023-12-30 23:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`) VALUES
(5, 7, 'product_images/capsicum.jpg'),
(6, 8, 'product_images/capsicum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rated_user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `rater_user_id` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `task_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tractors`
--

CREATE TABLE `tractors` (
  `tractor_id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `utilization` varchar(255) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tractors`
--

INSERT INTO `tractors` (`tractor_id`, `brand`, `model`, `year`, `horsepower`, `description`, `image_url`, `conditions`, `availability`, `utilization`, `owner_id`) VALUES
(11, 'Wax', 'ghty56', 8778, 998, 'the manl;sdlfsflksdf nd', '../handles/images/Banner.jpg', 'good', 'available', 'alright', NULL),
(12, 'Nissan', 'ghty56', 989, 9890, 'hkjhj', '../handles/images/dumb truck.jpg', 'good', 'available', 'alright', NULL),
(13, 'Dazzel', 'MD34', 2024, 567, 'this thing errrh', '../handles/images/recent-img1.jpg', 'Good', 'availble', 'ok', 12),
(15, 'toyota', 'AS54', 2023, 235, 'This is a good tractor', '../handles/images/Banner.jpg', '', 'Available', 'i think this is good', 12),
(16, 'Honda', '23ETY', 1998, 345, 'this is the main thing', '../handles/images/cement-mixer.jpg', 'Very Good', 'Available', 'can be used for farming and harvesting', 12),
(17, 'Dazzel', '23ETY', 2013, 565, 'Its working perfectly with everything', '../handles/images/add-post-hero-image.jpg', 'Very Good', 'Available', 'can be used for farming and harvesting', 13),
(18, 'toyota Honda', 'MD34', 2015, 563, 'this is also working fine with just some slight issue', '../handles/images/Banner.jpg', 'Very Good', 'not available', 'ok', 13),
(19, 'hanzel toyota', 'AS54', 2017, 754, 'this is working very fine', '../handles/images/recent-img1.jpg', 'Very Good', 'Available', 'can be used for farming and harvesting', 13),
(20, 'Dazzel', '23ETY', 2013, 565, 'Its working perfectly with everything', '../handles/images/add-post-hero-image.jpg', 'Very Good', 'Available', 'can be used for farming and harvesting', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tractor_owners`
--

CREATE TABLE `tractor_owners` (
  `owner_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `No` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tractor_owners`
--

INSERT INTO `tractor_owners` (`owner_id`, `firstName`, `lastName`, `address`, `phone`, `location`, `No`, `type`, `email`, `username`, `password`, `user_type`) VALUES
(1, 'Salim', 'ghost', 'gu 240', '0541120274', 'tamale', '3', 'dessel', 'cybergh0st404@protonmail.com', NULL, NULL, NULL),
(8, 'maami', 'elano', 'hgj', '0541120274', 'tamale', '7', 'manny', 'example@gmail.com', NULL, NULL, NULL),
(9, 'maami', 'elano', 'hgj', '0541120274', 'tamale', '7', 'manny', 'example@gmail.com', NULL, NULL, NULL),
(12, 'Rafique', 'Shaibu', 'ret 23', '0541120274', 'tamale', '2', NULL, 'elano@gmail.com', 'Dadasco', '$2y$10$nAmXK6s6i1VU94paG3rx.e8WsZfgBfNrAt4jH.ECt.IjHacPjF9nO', 'TractorOwner'),
(13, NULL, NULL, NULL, '0542456676', NULL, NULL, NULL, 'example23@email.com', 'Faeh', '$2y$10$SH0OFtmNFcoNYOLjPvrC5eNN/1qIyC3AiAHcj7EOuDsdWxpYKuSVW', 'TractorOwner');

-- --------------------------------------------------------

--
-- Table structure for table `tractor_owners_notifications`
--

CREATE TABLE `tractor_owners_notifications` (
  `notification_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `notification_text` varchar(255) DEFAULT NULL,
  `is_confirmed` varchar(200) DEFAULT 'not confirmed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `additional_requests` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tractor_owners_notifications`
--

INSERT INTO `tractor_owners_notifications` (`notification_id`, `owner_id`, `notification_text`, `is_confirmed`, `created_at`, `booking_id`, `booking_date`, `booking_time`, `additional_requests`) VALUES
(12, 12, 'New booking initiated for your service.', 'Confirmed', '2024-02-11 11:55:39', 28, '0000-00-00', '02:55:00', 'that\'s kk'),
(13, 12, 'New booking initiated for your service.', 'not confirmed', '2024-02-11 12:00:46', 29, '0000-00-00', '15:00:00', 'ok'),
(14, 12, 'New booking initiated for your service.', 'not confirmed', '2024-02-11 12:30:46', 30, '0000-00-00', '14:30:00', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('farmer','investor','other_role') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `provider_id` (`provider_id`,`provider_type`,`booking_date`,`booking_time`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`crop_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `maintenance_records`
--
ALTER TABLE `maintenance_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `tractor_id` (`tractor_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movers`
--
ALTER TABLE `movers`
  ADD PRIMARY KEY (`mover_id`);

--
-- Indexes for table `mover_bookings`
--
ALTER TABLE `mover_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `provider_id` (`provider_id`,`provider_type`,`booking_date`,`booking_time`);

--
-- Indexes for table `mover_machines`
--
ALTER TABLE `mover_machines`
  ADD PRIMARY KEY (`machine_id`),
  ADD KEY `mover_id` (`mover_id`);

--
-- Indexes for table `mover_maintenance_records`
--
ALTER TABLE `mover_maintenance_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `machine_id` (`machine_id`);

--
-- Indexes for table `mover_notifications`
--
ALTER TABLE `mover_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `mover_id` (`mover_id`);

--
-- Indexes for table `mover_tasks`
--
ALTER TABLE `mover_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `mover_id` (`mover_id`);

--
-- Indexes for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_tasks`
--
ALTER TABLE `owner_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tractors`
--
ALTER TABLE `tractors`
  ADD PRIMARY KEY (`tractor_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `tractor_owners`
--
ALTER TABLE `tractor_owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tractor_owners_notifications`
--
ALTER TABLE `tractor_owners_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `maintenance_records`
--
ALTER TABLE `maintenance_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movers`
--
ALTER TABLE `movers`
  MODIFY `mover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mover_bookings`
--
ALTER TABLE `mover_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mover_machines`
--
ALTER TABLE `mover_machines`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mover_maintenance_records`
--
ALTER TABLE `mover_maintenance_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mover_notifications`
--
ALTER TABLE `mover_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mover_tasks`
--
ALTER TABLE `mover_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news_articles`
--
ALTER TABLE `news_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owner_tasks`
--
ALTER TABLE `owner_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tractors`
--
ALTER TABLE `tractors`
  MODIFY `tractor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tractor_owners`
--
ALTER TABLE `tractor_owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tractor_owners_notifications`
--
ALTER TABLE `tractor_owners_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `tractor_owners` (`owner_id`) ON DELETE CASCADE;

--
-- Constraints for table `crops`
--
ALTER TABLE `crops`
  ADD CONSTRAINT `crops_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`farmer_id`);

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`farmer_id`);

--
-- Constraints for table `maintenance_records`
--
ALTER TABLE `maintenance_records`
  ADD CONSTRAINT `maintenance_records_ibfk_1` FOREIGN KEY (`tractor_id`) REFERENCES `tractors` (`tractor_id`);

--
-- Constraints for table `mover_bookings`
--
ALTER TABLE `mover_bookings`
  ADD CONSTRAINT `mover_bookings_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `movers` (`mover_id`) ON DELETE CASCADE;

--
-- Constraints for table `mover_machines`
--
ALTER TABLE `mover_machines`
  ADD CONSTRAINT `mover_machines_ibfk_1` FOREIGN KEY (`mover_id`) REFERENCES `movers` (`mover_id`);

--
-- Constraints for table `mover_maintenance_records`
--
ALTER TABLE `mover_maintenance_records`
  ADD CONSTRAINT `mover_maintenance_records_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `mover_machines` (`machine_id`);

--
-- Constraints for table `mover_notifications`
--
ALTER TABLE `mover_notifications`
  ADD CONSTRAINT `mover_notifications_ibfk_1` FOREIGN KEY (`mover_id`) REFERENCES `movers` (`mover_id`);

--
-- Constraints for table `mover_tasks`
--
ALTER TABLE `mover_tasks`
  ADD CONSTRAINT `mover_tasks_ibfk_1` FOREIGN KEY (`mover_id`) REFERENCES `movers` (`mover_id`);

--
-- Constraints for table `owner_tasks`
--
ALTER TABLE `owner_tasks`
  ADD CONSTRAINT `owner_tasks_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tractor_owners` (`owner_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `tractors`
--
ALTER TABLE `tractors`
  ADD CONSTRAINT `tractors_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tractor_owners` (`owner_id`);

--
-- Constraints for table `tractor_owners_notifications`
--
ALTER TABLE `tractor_owners_notifications`
  ADD CONSTRAINT `tractor_owners_notifications_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tractor_owners` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
