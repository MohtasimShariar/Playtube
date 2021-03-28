-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 07:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'tube776');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `comment`) VALUES
(2, 'Md.Mohtasim Shariar', 'onim04@gmail.com', 'tyjuyhkhuykhyuiukgbjghky');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(100) UNSIGNED NOT NULL,
  `playlist_name` varchar(250) NOT NULL,
  `des` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `playlist_name`, `des`) VALUES
(1, 'World', 'World'),
(2, 'Technology', 'Technology'),
(3, 'Culture', 'Culture'),
(13, 'onim', 'All  input product  here'),
(14, 'study', 'just for study');

-- --------------------------------------------------------

--
-- Table structure for table `play_video`
--

CREATE TABLE `play_video` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `date` date NOT NULL,
  `playlist` varchar(250) NOT NULL,
  `admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `play_video`
--

INSERT INTO `play_video` (`id`, `title`, `video_link`, `date`, `playlist`, `admin`) VALUES
(2, 'ANGRY BIRD', 'tbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '2021-03-23', 'onim', 'admin'),
(3, 'Then What!!!!!!!', 'eiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiisuklksssssssssssssssssyergvbgvbgvbt', '2021-03-23', 'onim', 'admin'),
(5, 'Then What for that!!!!!!!', 'fjhiedukigbjihgfiuygsjgftgr', '2021-03-23', 'onim', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `playlist` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `date`, `playlist`, `image`, `admin`) VALUES
(6, 'one ', 'dfdfdfdfgdffffcgvgvgvgvgvgvgvgvgvgvgvgvgvbf', '2021-03-23', 'World', '1-550-620x400.jpg', 'admin'),
(7, 'two', 'jdfkkkkkkkkkkkkkkkkkkkkkkkkkkgvndrdrdrdrdrdrdrdrghkfjgunv', '2021-03-23', 'World', '3-2-750x350.png', 'admin'),
(9, 'four', 'qaaaaaaaaaaaaaaaaaaaaaaaooooooooooooooooo  ', '2021-03-23', 'World', '22-08-2018-India-business-news-headlines.jpg', 'admin'),
(10, 'five', 'oiiiiiytyrfdsdfghijoihuyftdcvbhiuyftvdbnbtvcbgngbytfvdtfbygnu', '2021-03-23', 'Culture', 'Air-pollution-pti-620x400.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_video`
--
ALTER TABLE `play_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `play_video`
--
ALTER TABLE `play_video`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
