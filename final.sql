-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2016 at 05:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `article` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `article`) VALUES
(2, 1, 'global warming', 0x3c6469763e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20616c74657261206d656c696f726520666162656c6c61732065752063756d2e2054652065616d2071756973206972697572652c2065616d20616420766f6c75707475612072656374657175652e2044756f206c617564656d20636f6e636c7573696f6e656d7175652061642c2070617274656d20696e74656c6c65676562617420656f732074652e2051756f206e652073696d756c206969737175652c206e6f2067726165636f207669727475746520696e7465726573736574207669732c207072616573656e7420636f6e736574657475722075737520616e2e204f6375727265726574206d616c7569737365742069642063756d2c206e6520617373756d20616e696d616c20706572666563746f2070726f2c2065756d20617420616468756320666162656c6c6173206d616c7569737365742e3c2f6469763e0d0a3c6469763ec2a03c2f6469763e0d0a3c6469763e50726f207175616e646f20707574656e74206e6f2e20496e616e692073696d756c206575207065722c206e6f206361736520617267756d656e74756d207175692e20536561206d61676e6120616571756520616c697175616e646f20696e2c20726562756d2061756469616d20696d70656469742065616d2061742e20517569206d756e657265206469676e697373696d206d6f64657261746975732065612e20496420746962697175652066617374696469692073696d696c69717565206861732c207361657065206d616c7569737365742065612070726f2e3c2f6469763e0d0a3c6469763ec2a03c2f6469763e0d0a3c6469763e45786572636920616e696d616c2061642065756d2c20616420686162656d75732073656e736962757320737561766974617465206573742e204167616d2074616d7175616d207065722075742e204d6569206e6f206e69736c206d616c69732067726165636f2c206d6569206e652071756964616d20636f6d6d6f646f20726567696f6e652c2069757320616e20766964697420766976656e64756d206d6e657361726368756d2e20416e20656c6974206e756c6c612070657263697069742064756f2c206561206e656320616c69692064697373656e746965742c2076696d2063752069697371756520616c746572756d2e20446f63747573206e6f737472756d20706574656e7469756d206d656c2065612c206e652071756f206e6f73746572206f7074696f6e2e3c2f6469763e0d0a3c6469763ec2a03c2f6469763e0d0a3c6469763e526964656e73206d616c756973736574206174206d65612c2073696d756c207574616d7572206d616c7569737365742065782070726f2c20706f737369742071756f64736920616e63696c6c61652065756d2061742e204573736520636f6e74656e74696f6e6573206e6f207175692e204561206e6f6c756973736520636f74696469657175652071756f2e2045742070726f206e6f62697320646562697469732e3c2f6469763e0d0a3c6469763ec2a03c2f6469763e0d0a3c6469763e45752064656e697175652066696572656e7420656f732c20757375206167616d206d6f64757320636976696275732065752e204d656920637520646f6c6f726520707574616e742074696e636964756e742c206f6d697474616e747572207065727365717565726973207465206573742c2070726920696e766964756e7420766f6c757074617269612063752e20456f7320657520657469616d20666163696c697369206465736572756e742c206272757465206c6567696d7573207363726970746f72656d206569206573742c20706f7374656120616e696d616c20726567696f6e652063752076656c2e204561206a7573746f20726566657272656e747572206d65692e2045616d20657520646963746120666162656c6c61732e20416e20636f6d6d6f646f20646963657265742064756f2e206368656573653c2f6469763e);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'elieobeid7', 'elieobeid7@gmail.com', '$2y$10$sYae7gibS0DjiPM/AURx2O6pZObf7AOBsFh8VpoJvytc8yjtJbiYm');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `vote_ip` binary(20) NOT NULL,
  `vote_count` smallint(6) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`),
  ADD UNIQUE KEY `vote_ip` (`vote_ip`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;