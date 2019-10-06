-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 02:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundraiser`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `campaign_type` varchar(255) NOT NULL,
  `campaign_days` bigint(20) NOT NULL,
  `campaign_amount` bigint(20) NOT NULL,
  `campaign_description` varchar(255) NOT NULL,
  `campaignPhone` bigint(20) NOT NULL,
  `campaignImage` varchar(255) DEFAULT NULL,
  `campaignApproval` tinyint(1) DEFAULT '0',
  `campaignExpiry` tinyint(1) DEFAULT '1',
  `campaignCreator` varchar(255) NOT NULL,
  `campaign_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `campaign_name`, `campaign_type`, `campaign_days`, `campaign_amount`, `campaign_description`, `campaignPhone`, `campaignImage`, `campaignApproval`, `campaignExpiry`, `campaignCreator`, `campaign_reg_date`) VALUES
(2, 'suraj le banako campaign', 'social', 234, 234, 'alkdsfj\r\naskdjfa\r\nsdfj\r\nasdjfaklsdfj alskdfj ', 9824119129, 'assets/images/campaignImages/3fe93e8f023ddb6dcacda42b71f34423', 1, 1, 'sandeshstha', '2019-09-21 06:42:22'),
(3, 'test subject', 'natural disaster', 234, 34234, 'adlskf;j\r\nadslfj\r\nasdf', 9824119129, 'assets/images/campaignImages/043f1f04baabfb3d615940aa9e7e9f79', 1, 1, 'sandeshstha', '2019-09-20 15:58:15'),
(4, 'anoter test', 'others', 2343, 3423423, 'adlskf;j\r\nadslfj\r\nasdf', 9824119129, 'assets/images/campaignImages/dcc70845a628dbebaa52aacc01dc8ae3', 1, 1, 'sandeshstha', '2019-09-19 03:38:37'),
(5, 'earthquake', 'natural disaster', 234, 234, 'alskdfj\r\na;lsdf\r\njasdf', 9824119129, 'assets/images/campaignImages/4fd617f05458924b6b61148a337eda65', 1, 1, 'sandeshstha', '2019-09-20 15:53:20'),
(6, 'new campaign', 'social', 234, 34234, 'asdlf;j\r\nasdfjasdf', 9824119129, 'assets/images/campaignImages/7b2124fa5a56762dbd48f8f20644f32e', 1, 1, 'sandeshstha', '2019-09-20 15:54:10'),
(16, 'Flood Raining', 'natural disaster', 20, 20000, 'Incessant rainfall since 11 July afternoon there has killed 64 people and temporarily displaced 16,520 households to date (approximately 80,000 people). Flood waters have receded in most areas, and following repair works major highways are operational. Ho', 9824119129, 'assets/images/campaignImages/c43cad94ee56242278dad53540d85fa2', 1, 1, 'sandeshstha', '2019-09-25 03:16:45'),
(17, 'Kidney Failure', 'others', 50, 100000, 'His name is Chhabi Lal Gautam. He is from Fulbari Chowk-2, Lwang. He is very poor and it is hard to effort daily food for him. God became cruel to him because he has both the kidney failed. When Mr.Gautam concerned with doctor, doctor told that both the k', 9863525468, 'assets/images/campaignImages/c427a2492bde91a2bd6003436413059c', 0, 1, 'sandeshstha', '2019-09-25 03:19:24'),
(18, 'Saptari Earthquake', 'natural disaster', 50, 5000000, 'Saptari is one of the worst-affected districts as a result of the earthquake that took place on the 25th Sept. While the initial epicentre of the earthquake was in Sindupolchok district, the highest magnitude (7.2) aftershock took place in Saptari distric', 9854119129, 'assets/images/campaignImages/828767a3f051e5f3693f3e524634e8af', 1, 1, 'sandeshstha', '2019-09-25 03:21:26'),
(19, 'Gumba Construction', 'social', 50, 2000000, 'Only few families of the Buddhist religion are living in Kyachkhuch â€“ 11, Saptari. Every year the number of members of those families is increasing and they donot have GUMBA to worship nearby them. They collected money to establish the GUMBA but the col', 9824119150, 'assets/images/campaignImages/a684ec055f918e6b7605ab8e6e71d9c9', 0, 1, 'sandeshstha', '2019-09-25 03:24:09'),
(20, 'Public Toilet', 'social', 10, 100000, 'Our village is declared as defecation free. Weâ€™re so happy that government declared but still most of the travelers are lacking with the public toilet of every type. So, we decided to establish public toilet separate for male and female. We collected mo', 9863525466, 'assets/images/campaignImages/49b531931c460539424a3e2df8560287', 0, 0, 'sandeshstha', '2019-09-25 03:25:43'),
(21, 'Computer for Students', 'others', 50, 400000, 'This is our school. It was established in 2005. Every year students are promoted to higher classes. Our syllabus says every student should learn COMPUTER from class 6 but  weâ€™ve only two computers and students 36. We asked DDC for the computers, they ad', 9863525466, 'assets/images/campaignImages/a4554c6d84c65be6cd7f9804707cb11f', 1, 1, 'sandeshstha', '2019-09-25 03:26:54'),
(22, 'Sindupalcowk Earthquake', 'natural disaster', 50, 50000000, 'Sindupolchok is one of the districts as a result of the earthquake that took place on the 20th Sept. While the initial epicentre of the earthquake was in Gorkha district, the highest magnitude (7.2) aftershock took place in Sindupolchok district 20km sout', 9824119129, 'assets/images/campaignImages/f43eb3d9091f268683ffdf810c26f5a3', 1, 1, 'sandeshstha', '2019-09-25 03:27:56'),
(23, 'Sanduk Doctor Help', 'others', 50, 5000000, 'Dr. Sanduk Ruit is an opthalmologist (eye surgeon) from Nepal who has restored the sight of over 130,000 people across Africa and Asia using small-incision cataract surgery. He has planned to restore more eyes on Far-west rural areas. He needs lot of fund', 9824119129, 'assets/images/campaignImages/17f144362dbbf048a5826e9dddb0e8aa', 0, 1, 'sandeshstha', '2019-09-25 03:28:55'),
(24, 'Gandkai college of engineering', 'others', 25, 20000, 'lkasdjflkasd\r\nflaksd\r\nfa\r\nsdjf\r\nasdf', 9863525468, '../assets/images/campaignImages/6b467e9e3ee81cfb87b68697dd0d87f9', 1, 1, 'sandeshstha', '2019-09-25 05:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `donationproof`
--

CREATE TABLE `donationproof` (
  `donation_proof_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `donate_amount` bigint(20) NOT NULL,
  `donor_address` varchar(200) NOT NULL,
  `proof_image` varchar(255) DEFAULT NULL,
  `admin_approval` tinyint(1) DEFAULT '0',
  `proof_submit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donationproof`
--

INSERT INTO `donationproof` (`donation_proof_id`, `donor_id`, `campaign_id`, `donate_amount`, `donor_address`, `proof_image`, `admin_approval`, `proof_submit_date`) VALUES
(2, 30, 1, 5000, 'Lekhnath', 'assets/images/proofImages/ee4797eb1a0e6a29842bc23ec57ffb99', 1, '2019-08-26 15:12:41'),
(4, 33, 34, 5000, 'Lekhnath', 'assets/images/proofImages/ee4797eb1a0e6a29842bc23ec57ffb99', 1, '2019-09-25 00:59:39'),
(6, 37, 22, 5000, 'Lekhnath', '../assets/images/proofImages/6563a070a803bd3b8b52323372860fde', 1, '2019-09-25 03:32:28'),
(7, 38, 18, 5000, 'Lekhnath', '../assets/images/proofImages/777da4d0834567cda35d3ed2c604f91e', 1, '2019-09-25 03:33:08'),
(8, 39, 22, 30000, 'Lekhnath', '../assets/images/proofImages/6acccf2893496bdd25630ab9960971d1', 1, '2019-09-25 03:42:04'),
(9, 40, 16, 400000, 'Lekhnath, Pokhara', '../assets/images/proofImages/736deea0b47a9b1d16af8a74da40c681', 1, '2019-09-25 03:43:52'),
(10, 41, 21, 40000, 'Butwal', '../assets/images/proofImages/6f8ff9405d6201fbc60afcb7a78166c2', 1, '2019-09-25 03:45:43'),
(11, 42, 16, 50000, 'NawalParasi', '../assets/images/proofImages/66055d19370f79e091f9d954e2b7a411', 1, '2019-09-25 03:47:14'),
(12, 41, 21, 70000, 'Chitwan', '../assets/images/proofImages/7ef383985a87ac0c24f97f4cc64a94b9', 1, '2019-09-25 03:48:47'),
(13, 43, 22, 60000, 'Kathmandu', '../assets/images/proofImages/623974e9a9fc50f429373ce5ff1ba3e2', 1, '2019-09-25 03:50:13'),
(14, 44, 22, 50000, 'Chitwan', '../assets/images/proofImages/d7426d710c79ee778c5e6a4c89916fa7', 0, '2019-09-25 04:36:20'),
(15, 45, 18, 5000, 'POkhara', '../assets/images/proofImages/861e8a427e10c2039ada76b27d7e5d0a', 0, '2019-09-25 04:39:02'),
(16, 46, 22, 50000, 'Pokhara', '../assets/images/proofImages/6ccd4d55c886f38dd2ca2b3eb672978e', 0, '2019-09-25 05:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_email` varchar(50) NOT NULL,
  `campaign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `donor_name`, `donor_email`, `campaign_id`) VALUES
(32, 'sandesh shrestha', 'sandeshstha2018@gmail.com', 1),
(41, 'Suman Bhattarai', 'sandeshshrestha2018@gmail.com', 21),
(42, 'Sujan Bhattarai', 'sandeshshrestha2018@gmail.com', 16),
(43, 'Abiral Bhattarai', 'sandeshshrestha2018@gmail.com', 22),
(44, 'Sandip Dai', 'sandeshshrestha2018@gmail.com', 22),
(45, 'Ashisish Poudel', 'sandeshshrestha2018@gmail.com', 18),
(46, 'Demo shrestha', 'sandeshshrestha2018@gmail.com', 22);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `organizer_id` int(11) NOT NULL,
  `organizer_fullname` varchar(256) NOT NULL,
  `organizer_username` varchar(256) NOT NULL,
  `organizer_email` varchar(256) NOT NULL,
  `organizer_password` varchar(256) NOT NULL,
  `organizer_phone` varchar(22) NOT NULL,
  `vkey` varchar(45) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `organizer_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`organizer_id`, `organizer_fullname`, `organizer_username`, `organizer_email`, `organizer_password`, `organizer_phone`, `vkey`, `verified`, `organizer_reg_date`) VALUES
(1, 'Sandesh Shrestha', 'sandeshstha', 'sandeshshrestha2018@gmail.com', '$2y$10$gUeFMhZ//BSmYcBYGVvwb.9bVcn3tfWVTfQvF6bgmoIb5qozhWnWK', '9824119129', 'b910ffdc544ce694da3995f52b640652', 1, '2019-09-25 05:38:25'),
(2, 'alsdkfj', 'alksdfj', 'alskdfj@lskfj', '$2y$10$l2JH7TpYq2k38QoQK865ie5j2toFnlz6ZVJC.JO5yHtquXzO9JtKO', '9824119129', '5978ce10969236995f0900dddde30a3d', 0, '2019-08-10 15:37:12'),
(3, 'suman bhattarai', 'suman', 'suman@gmail.com', '$2y$10$YabfP.Di5m2bJ1ntxbTFBO1RDwCIMsuieIPNZxPFyPV0hvtkwAW4i', '9824119129', '5fd1915a44cf6062be8c46d6005c56d1', 1, '2019-08-17 03:35:48'),
(4, 'SUman Bhtatu', 'sumantest', 'suman@gmaill.com', '$2y$10$3JImC/IABabLIH0ViXphIesTNFF8ZsRe2LbaLbwmSYQTWBahgnzDi', '9824119129', '183b988c056dddbe12bf028eb581b527', 0, '2019-09-04 00:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `donationproof`
--
ALTER TABLE `donationproof`
  ADD PRIMARY KEY (`donation_proof_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `donationproof`
--
ALTER TABLE `donationproof`
  MODIFY `donation_proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
