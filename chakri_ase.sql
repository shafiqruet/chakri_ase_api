-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2022 at 06:23 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chakri_ase`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsibilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` float NOT NULL DEFAULT 0,
  `employment_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position`, `company`, `responsibilities`, `vacancy`, `employment_status`, `educational_requirements`, `experience_requirements`, `additional_requirements`, `location`, `salary`, `benefits`, `age`, `gender`, `deadline`, `created`) VALUES
(1, 'Head of IT\r\n', 'Labaid Cancer Hospital', '<ul>\r\n                                                            <li>Oversee IT operations and supervise systems and IT staff\r\n</li><li>Develop strategy as it relates to the organization\'s IT infrastructure (computer and information systems, security, communication systems)\r\n</li><li>Develop, manage, and track the IT department\'s annual budget\r\n</li><li>Consult senior-level stakeholders across the entire organization to identify business and technology needs and to optimize the use of information technology\r\n</li><li>Ensure smooth delivery and operation of IT services by monitoring systems performance\r\n</li><li>Create processes and standards for selection, implementation, and support of systems\r\n</li><li>Provide direction, guidance, and training to IT staff\r\n</li><li>Lead large IT projects, including the design and deployment of new IT systems and services</li>\r\n                                                        </ul>', 2, 'Full-time', 'Degree (Bachelor) in CSE, IT or ICT related subjects.', 'At least 12 year(s)', '<ul>\n																<li>12+ years of experience working in IT operations, supervising technology teams, and overseeing large information technology projects\n</li><li>Excellent oral &amp; Written communication skills with strong command in MS Excel &amp; MS Word.\n</li><li>Ability to meet deadlines and work order dates.\n</li><li>Ability to remain, objective and professional in challenging situations.\n</li><li>Ability to work in fast paced work environment both independently and in a group.</li>\n                                                            </ul>', 'Dhaka', 'Negotiable', 'Bdjobs.com Online Job Posting.', '20-30', 'both', '2022-01-08 15:01:04', '2022-01-08 15:01:04'),
(2, 'Senior Software Engineer\r\n', 'Labaid Cancer Hospital', '<ul>\r\n                                                            <li>Oversee IT operations and supervise systems and IT staff\r\n</li><li>Develop strategy as it relates to the organization\'s IT infrastructure (computer and information systems, security, communication systems)\r\n</li><li>Develop, manage, and track the IT department\'s annual budget\r\n</li><li>Consult senior-level stakeholders across the entire organization to identify business and technology needs and to optimize the use of information technology\r\n</li><li>Ensure smooth delivery and operation of IT services by monitoring systems performance\r\n</li><li>Create processes and standards for selection, implementation, and support of systems\r\n</li><li>Provide direction, guidance, and training to IT staff\r\n</li><li>Lead large IT projects, including the design and deployment of new IT systems and services</li>\r\n                                                        </ul>', 2, 'Full-time', 'Degree (Bachelor) in CSE, IT or ICT related subjects.', 'At least 12 year(s)', '<ul>\r\n																<li>12+ years of experience working in IT operations, supervising technology teams, and overseeing large information technology projects\r\n</li><li>Excellent oral &amp; Written communication skills with strong command in MS Excel &amp; MS Word.\r\n</li><li>Ability to meet deadlines and work order dates.\r\n</li><li>Ability to remain, objective and professional in challenging situations.\r\n</li><li>Ability to work in fast paced work environment both independently and in a group.</li>\r\n                                                            </ul>', 'Dhaka', 'Negotiable', 'Bdjobs.com Online Job Posting.', '20-30', 'both', '2022-01-08 15:01:04', '2022-01-08 15:01:04'),
(3, 'Team Lead\r\n', 'Karatbars Software Engineer', '<ul>\r\n                                                            <li>Oversee IT operations and supervise systems and IT staff\r\n</li><li>Develop strategy as it relates to the organization\'s IT infrastructure (computer and information systems, security, communication systems)\r\n</li><li>Develop, manage, and track the IT department\'s annual budget\r\n</li><li>Consult senior-level stakeholders across the entire organization to identify business and technology needs and to optimize the use of information technology\r\n</li><li>Ensure smooth delivery and operation of IT services by monitoring systems performance\r\n</li><li>Create processes and standards for selection, implementation, and support of systems\r\n</li><li>Provide direction, guidance, and training to IT staff\r\n</li><li>Lead large IT projects, including the design and deployment of new IT systems and services</li>\r\n                                                        </ul>', 2, 'Full-time', 'Degree (Bachelor) in CSE, IT or ICT related subjects.', 'At least 12 year(s)', '<ul>\r\n																<li>12+ years of experience working in IT operations, supervising technology teams, and overseeing large information technology projects\r\n</li><li>Excellent oral &amp; Written communication skills with strong command in MS Excel &amp; MS Word.\r\n</li><li>Ability to meet deadlines and work order dates.\r\n</li><li>Ability to remain, objective and professional in challenging situations.\r\n</li><li>Ability to work in fast paced work environment both independently and in a group.</li>\r\n                                                            </ul>', 'Dhaka', 'Negotiable', 'Bdjobs.com Online Job Posting.', '20-30', 'both', '2022-01-08 15:01:04', '2022-01-08 15:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE `jobs_applied` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`id`, `uid`, `job_id`, `created`) VALUES
(1, 1, 3, '2022-01-31 00:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_experience`
--

CREATE TABLE `job_experience` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `experience1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experience`
--

INSERT INTO `job_experience` (`id`, `uid`, `experience1`, `experience2`, `experience3`, `position`, `job_type`, `created`) VALUES
(2, 1, 'Karatbars are LBMA certified 999.9 24 Karat currency grade gold bullion that is\nencased in a sleek, wallet sized card. We implemented crypto currency payment\nmethod like Bitcoin, Ether and our own crypto currency to pay. We also\nimplemented our own payout system.', 'FB Universe is a new affiliate marketing company with partners all over the\nworld. From this site user can purchase life card with gold, convert it digital gold\nand exchange it like Bitcoin, Ether, USD etc. We implemented various type\npayment method for pay and payout. Some part we implemented using Java and\nsome part in PHP. There is lot of feature.', 'PremiumWebCart.com is known for high functionality and sleek design. It is\nactually one of the ecommerce site providers that have established standard apps\nand features most sites are showcasing today. Among the top features\nPremiumWebCart.com has to offer are :\nUser-friendly shopping cart, CRM and Integrated Auto Responder, Storefront,\nMembership system, Live Chat', 'Senior software engineer ', 'Full Time', '2022-01-08 22:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `uid` int(11) NOT NULL,
  `skills1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills4` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills5` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills6` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills7` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills8` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` float DEFAULT NULL,
  `present_salary` float DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`uid`, `skills1`, `skills2`, `skills3`, `skills4`, `skills5`, `skills6`, `skills7`, `skills8`, `expected_salary`, `present_salary`, `created`) VALUES
(1, 'PHP', 'MySql', 'Laravel', 'Flutter', 'Dart', 'React', 'Firebase', 'Git', 100000, 120000, '2022-01-08 22:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `uid` int(11) NOT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`uid`, `father_name`, `mother_name`, `birthday`, `gender`, `marital_status`, `education`, `permanent_address`, `present_address`, `created`) VALUES
(1, 'Nawab Ali', 'Meherun nessa', '1980-10-25', 'Male', 'Married', 'kodhla high school', 'Dhaka,', 'Kodhla,Bagerhat', '2022-01-08 21:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `password`, `phone`, `email`, `address`, `updated`, `created`) VALUES
(1, 'Shafiqul Islam', '$2y$10$G/ICM1UycCM5jhvIXQ.pkORYbUvHGdwKlXgEX/oqM40Un7I//wRv.', '01719016426', 'sha@gmail.com', 'Dhaka', NULL, '2022-01-07 23:42:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
