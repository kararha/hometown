-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 12:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homtown`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`sukoon`@`%` PROCEDURE `rate_cont` (IN `pro_id` INT, IN `address` VARCHAR(100))   BEGIN
    INSERT INTO prof (pro_id , address)
    VALUES (pro_id, address);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUserAndLog` (IN `p_user_id` INT, IN `p_username` VARCHAR(50), IN `p_email` VARCHAR(50), IN `p_password` VARCHAR(50), IN `p_user_type` VARCHAR(20))   BEGIN
    DECLARE log_message TEXT;

    -- Start a transaction for atomicity
    START TRANSACTION;

    -- Update user information
    UPDATE user_form
    SET
        name = p_username,
        email = p_email,
        password = p_password,
        user_type = p_user_type
    WHERE
        id = p_user_id;

    -- Check if the update was successful
    IF ROW_COUNT() > 0 THEN
        SET log_message = CONCAT('User ', p_username, ' (ID: ', p_user_id, ') updated successfully.');
    ELSE
        SET log_message = CONCAT('Failed to update user with ID: ', p_user_id);
    END IF;

    -- Add log entry
    INSERT INTO logs (log_type, log_message)
    VALUES
        ('info', log_message);

    -- Commit the transaction
    COMMIT;

END$$

--
-- Functions
--
CREATE DEFINER=`sukoon`@`%` FUNCTION `con_address` (`id` INT) RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci DETERMINISTIC BEGIN
    DECLARE count varchar(100);
    
    SELECT address INTO count
    FROM prof 
    WHERE pro_id = id;
    
    RETURN count;
END$$

CREATE DEFINER=`sukoon`@`%` FUNCTION `get_contractors` (`id` INT) RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci DETERMINISTIC BEGIN
    DECLARE count varchar(100);
    
    SELECT COUNT(*) INTO count
    FROM prof 
    WHERE pro_id = id;
    
    RETURN count;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `created_at`) VALUES
(1, 'one ', '0987654324', 'one@gmail.com', 'hi i am the first one how send message to the admin', '2024-03-16 22:57:52'),
(2, 'sec', '098765356', 'sec@gmail.com', 'caght me it you can', '2024-03-16 23:12:24'),
(3, 'my big', '0987654386', 'big@gmail.com', 'my big dreams and beauty thing that happen it\'s when look in your eyes', '2024-03-16 23:18:35'),
(4, 'kim', '098765432', 'kim@gmail.com', 'mem', '2024-03-16 23:21:13'),
(5, 'hi', '09876543213', 'hi@gmail.com', 'hi', '2024-03-16 23:24:29'),
(6, 'life', '555555558', 'life@gmail.com', 'life', '2024-03-16 23:25:12'),
(7, 'give ', '09876543234', 'give@gmail.com', 'give me any ', '2024-03-17 13:06:14'),
(8, 'text', '09876543', 'text@gmail.com', 'text me', '2024-03-17 14:21:27'),
(9, 'new ', '098766775', 'new@gmail.com', 'new', '2024-03-17 22:51:58'),
(10, 'um ', '0987654e45', 'um@gmail.com', 'fghyukmnbv', '2024-03-24 07:17:30'),
(11, 'uon', '98765456789', 'uon@gmail.com', 'dfghjkj', '2024-03-24 09:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deal_time` datetime NOT NULL,
  `problem_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_users_view`
-- (See below for the actual view)
--
CREATE TABLE `latest_users_view` (
`user_id` int(255)
,`user_name` varchar(255)
,`user_email` varchar(255)
,`pro_id` int(11)
,`prof_name` varchar(100)
,`prof_email` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_timestamp`, `log_type`, `log_message`) VALUES
(1, '2023-12-11 23:09:38', 'info', 'This is an informational log message.'),
(2, '2023-12-11 23:09:38', 'error', 'An error occurred in the application.'),
(3, '2023-12-11 23:09:38', 'warning', 'A warning message for the application.'),
(4, '2023-12-12 00:07:53', 'info', 'User karar haider (ID: 2) updated successfully.'),
(5, '2023-12-12 07:18:59', 'info', 'User fadil (ID: 5) updated successfully.');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plan_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `name`, `description`, `price`) VALUES
(1, 'Basic', 'Access to basic features. Limited support. Suitable for users who require only essential functionalities and are comfortable with basic support.', '10.00'),
(2, 'Standard', 'Access to standard features. Priority support. Suitable for users who need more advanced features and faster assistance from support teams.', '20.00'),
(3, 'Premium', 'Access to premium features. 24/7 support. Suitable for users who require the highest level of service, including advanced features and round-the-clock support availability.', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_tit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO Description',
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'professional',
  `taken` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `projects` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`pro_id`, `name`, `username`, `email`, `job_tit`, `description`, `company_name`, `address`, `phone`, `password`, `profile_image`, `user_type`, `taken`, `rating`, `projects`) VALUES
(1, 'karar', '', 'karar@gamil.com', 'plamber', 'hi i\'m work with experaence to fix most problem', '', 'onn', 782345434, '81dc9bdb52d04dc20036dbd83', 'images/con8.jpg', 'professional', NULL, 2, NULL),
(2, 'fadil', '', 'fadil@gmail.com', 'admin ', 'No Description', '', 'karbala', 876533211, '81dc9bdb52d04dc20036dbd83', NULL, 'professional', NULL, 4, NULL),
(5, 'sukoon', '', 'sukoon@gmail.com', 'IT pro', 'No Description', '', 'paradise', 2147483647, '827ccb0eea8a706c4c34a1689', 'uploads/con8.jpg', 'professional', NULL, 5, NULL),
(6, 'mark', '', 'mark@example.com', 'Painter', 'Experienced painter with a passion for colors.', '', '223 Main St, Cityville', 1234567890, 'password123', 'uploads/65e111c8eac136.25179696.jpg', 'professional', 'Available', 3, NULL),
(7, 'Jane Smith', '', 'jane.smith@example.com', 'Plumber', 'Skilled plumber ready to fix any plumbing issues.', '', '456 Oak St, Townsville', 987654321, 'securepass', 'plumber.jpg', 'professional', 'Not Available', 3, NULL),
(8, 'Alice Johnson', '', 'alice.johnson@example.com', 'Interior Designer', 'Creative interior designer specializing in modern aesthetics.', '', '789 Pine St, Villagetown', 2147483647, 'mypassword', 'interior_designer.jpg', 'professional', 'Available', NULL, NULL),
(9, 'Robert Miller', '', 'robert.miller@example.com', 'Electrician', 'Licensed electrician for all your electrical needs.', '', '567 Cedar St, Hamletville', 2147483647, 'pass123', 'electrician.jpg', 'professional', 'Not Available', NULL, NULL),
(10, 'Emily Wilson', '', 'emily.wilson@example.com', 'Architect', 'Innovative architect creating functional and beautiful spaces.', '', '890 Elm St, Suburbia', 2147483647, 'archi_pass', 'architect.jpg', 'professional', 'Available', NULL, NULL),
(11, 'Daniel Davis', '', 'daniel.davis@example.com', 'Carpenter', 'Expert carpenter with skills in woodworking and craftsmanship.', '', '234 Oak St, Woodland', 1112223333, 'wood_pass', 'carpenter.jpg', 'professional', 'Not Available', 3, NULL),
(12, 'Sophia Turner', '', 'sophia.turner@example.com', 'Landscaper', 'Passionate landscaper designing and maintaining outdoor spaces.', '', '567 Maple St, Greenfield', 2147483647, 'landscaper_pass', 'landscaper.jpg', 'professional', 'Available', NULL, NULL),
(13, 'Matthew Garcia', '', 'matthew.garcia@example.com', 'Roofing Specialist', 'Specialized in roofing services with a focus on quality and durability.', '', '345 Pine St, Hilltop', 2147483647, 'roof_pass', 'roofer.jpg', 'professional', 'Not Available', NULL, NULL),
(14, 'Olivia Martinez', '', 'olivia.martinez@example.com', 'HVAC Technician', 'Certified HVAC technician providing heating and cooling solutions.', '', '678 Birch St, Meadowville', 2147483647, 'hvac_pass', 'hvac_technician.jpg', 'professional', 'Available', NULL, NULL),
(15, 'William Clark', '', 'william.clark@example.com', 'Plasterer', 'Experienced plasterer offering high-quality plastering services.', '', '789 Cedar St, Lakeside', 2147483647, 'plaster_pass', 'plasterer.jpg', 'professional', 'Not Available', NULL, NULL),
(16, 'Ava Lee', '', 'ava.lee@example.com', 'Flooring Expert', 'Skilled in installing various flooring types with precision and expertise.', '', '123 Elm St, Countryside', 2147483647, 'flooring_pass', 'flooring_expert.jpg', 'professional', 'Available', NULL, NULL),
(17, 'James Hernandez', '', 'james.hernandez@example.com', 'Appliance Repair Technician', 'Proficient in repairing a wide range of household appliances.', '', '234 Oak St, Riverside', 1110009999, 'appliance_pass', 'appliance_technician.jpg', 'professional', 'Not Available', NULL, NULL),
(18, 'Emma Foster', '', 'emma.foster@example.com', 'Locksmith', 'Reliable locksmith providing lock and key services for homes and businesses.', '', '456 Birch St, Uptown', 2147483647, 'lock_pass', 'locksmith.jpg', 'professional', 'Available', 4, NULL),
(19, 'Logan Reed', '', 'logan.reed@example.com', 'Glass Installer', 'Expert in installing and repairing glass for residential and commercial properties.', '', '567 Maple St, Lakeshore', 2147483647, 'glass_pass', 'glass_installer.jpg', 'professional', 'Not Available', NULL, NULL),
(20, 'Mia Butler', '', 'mia.butler@example.com', 'Pest Control Specialist', 'Effective pest control services for a pest-free living environment.', '', '678 Pine St, Hillside', 2147483647, 'pest_pass', 'pest_control.jpg', 'professional', 'Available', NULL, NULL),
(21, 'Liam Phillips', '', 'liam.phillips@example.com', 'Masonry Contractor', 'Skilled masonry contractor specializing in brick and stone work.', '', '123 Oak St, Mountainside', 2147483647, 'masonry_pass', 'masonry_contractor.jpg', 'professional', 'Not Available', NULL, NULL),
(22, 'Ella Turner', '', 'ella.turner@example.com', 'Security System Installer', 'Installation and maintenance of security systems for homes and businesses.', '', '234 Birch St, Meadowside', 1112223333, 'security_pass', 'security_system_installer.jpg', 'professional', 'Available', NULL, NULL),
(23, 'Jackson Ward', '', 'jackson.ward@example.com', 'Carpet Installer', 'Professional carpet installation services for homes and offices.', '', '345 Cedar St, Suburbia', 2147483647, 'carpet_pass', 'carpet_installer.jpg', 'professional', 'Not Available', NULL, NULL),
(24, 'Aria Howard', '', 'aria.howard@example.com', 'Home Inspector', 'Thorough home inspections to ensure the safety and integrity of properties.', '', '456 Elm St, Riverside', 2147483647, 'inspect_pass', 'home_inspector.jpg', 'professional', 'Available', NULL, NULL),
(25, 'Caleb Ross', '', 'caleb.ross@example.com', 'Painting Contractor', 'Commercial and residential painting services with attention to detail.', '', '567 Pine St, Downtown', 2147483647, 'painting_pass', 'painting_contractor.jpg', 'professional', 'Not Available', NULL, NULL),
(26, 'Hannah Watson', '', 'hannah.watson@example.com', 'Apartment Cleaner', 'Professional cleaning services for apartments and rental properties.', '', '678 Oak St, Metroville', 2147483647, 'clean_pass', 'apartment_cleaner.jpg', 'professional', 'Available', NULL, NULL),
(34, 'hope not enogh', 'hope', 'hope@gmail.com', 'hope', 'hope that i can find my soul', 'hope', 'onn', 456780, '$2y$10$PR.AgQEjkZsU3OPQFj8eZuDqKSebsQ4T1H1U2OLhYaObVcrIrpfoC', 'uploads/IMG_20201120_081239.jpg', 'professional', NULL, 5, NULL),
(35, 'hali hood', 'hood', 'hood@gmail.com', 'hood', 'hoooooooooooooood', 'hod.h', 'kerkor', 98765678, '$2y$10$foSGtfpUaA1d6tf5rc1Pd.YOmPWOurOdEz31HMdMwjSv.tcLPe74e', 'uploads/for-laptop.jpg', 'professional', NULL, NULL, NULL),
(36, 'hali hood', 'hood', 'hood@gmail.com', 'hood', 'hoooooooooooooood', 'hod.h', 'kerkor', 98765678, '$2y$10$9bHLOde7Fue/.Jasmee8k.ON.Wch9vVMGwqBREBeKoSi2LsORNE6S', 'uploads/for-laptop.jpg', 'professional', NULL, NULL, NULL),
(37, 'h hh', 'hh', 'h@gmail.com', 'h', 'h', 'h', 'h', 9876, '$2y$10$d2v.jA.KLe5mJTN3qZMvG.uZ/0LroWrxICI2bteLZtUoup1DR5uiK', 'uploads/4k black cat HD wallpaper.jpg', 'professional', NULL, NULL, NULL),
(38, 'hyfa wahbee', 'hyfa', 'hyfa@gmail.com', 'actress', 'i work in the media and move maker and modle ', 'hoofee', 'lebnon', 2147483647, '$2y$10$CMAXxjJXBtPel8Gbs1dotuMDtRq2Vngj16LoqZ43cc1SFgKy7TsCW', 'uploads/٢٠١٦٠٩١٩_٢١٤٤٠٩.jpg', 'professional', NULL, NULL, NULL),
(39, 'hary potter', 'story', 'potter@gmail.com', 'actress', 'i work in the media and move maker and modle ', 'potter', 'usa', 2147483647, '$2y$10$8uv2Wi31nuC3jxtoRMAx1.x74hnv0L9ojWeTjnptCSCs18/eM30zW', 'uploads/٢٠١٧٠١٠٦_١٣٥٦٢٢.jpg', 'professional', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `review_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `pro_id`, `id`, `review_content`) VALUES
(1, 10, 1, 'he is the perfect one done his things on the time'),
(2, 6, 13, 'the second review');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `plan_id`, `prof_id`) VALUES
(1, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `username`, `image`) VALUES
(1, 'karar', 'k@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'mew', 'images/con8.jpg'),
(2, 'karar haider', 'kararone@gmail.com', '12345', 'admin', 'suuuuuu', NULL),
(3, 'skuoon', 'suk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'my', NULL),
(4, 'moonlight', 'moon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'light', NULL),
(5, 'fadil', 'fadi@gmail.com', '1234', 'admin', 'princess', NULL),
(6, 'zeo', 'z@gmail.com', '$2y$10$X4aXbbl6z/sgJW.12JccG.IoJdSLEF/2Vb/dVLFUXMvl7jFVUuj22', 'user', 'zeo', NULL),
(7, 'kill me', 'o@gmail.com', '$2y$10$0k4zDpqczVdr1jqiUDQpruGtnq3yi1f9S3piS41150vXRssGmI1Iy', 'user', 'if uoy can', NULL),
(8, 'neer  meer', 'nm@gmail.com', '$2y$10$wjpLipLdG8C4WPzw3MMwDOpXffYzSCYDUNTVbf70nFhanIr6DDaZS', 'user', 'nmee', NULL),
(9, 'neer  meer', 'nm@gmail.com', '$2y$10$S7r0culY3.ajLDWz9UQM/uXx8hNTsvX/GZ8OqPyb1IRZNzZWIoY9W', 'user', 'nmee', NULL),
(10, 'full mark p', 'full@gmail.com', '$2y$10$5H95RpOBETY.Or/fOIq/3e8ST8p.ezdg3sP/Lp4lCogX2JPZuBa9e', 'user', 'fullmark', 'uploads/con8.jpg'),
(13, 'dont worry boy', 'mem@gmail.com', '$2y$10$4tB73LzUnIpYt4k6agV.P.9CABB2YDAHene2QQXDMM85ike2TP9f.', 'user', 'okko', 'uploads/65fe1dca8663e5.59738825.jpg');

-- --------------------------------------------------------

--
-- Structure for view `latest_users_view`
--
DROP TABLE IF EXISTS `latest_users_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_users_view`  AS SELECT `uf`.`id` AS `user_id`, `uf`.`name` AS `user_name`, `uf`.`email` AS `user_email`, `p`.`pro_id` AS `pro_id`, `p`.`name` AS `prof_name`, `p`.`email` AS `prof_email` FROM (`user_form` `uf` join `prof` `p` on(`uf`.`id` = `p`.`pro_id`)) ORDER BY `uf`.`id` AS `DESCdesc` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `prof_id` (`prof_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prof`
--
ALTER TABLE `prof`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `prof` (`pro_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `prof` (`pro_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user_form` (`id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`plan_id`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`prof_id`) REFERENCES `prof` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
