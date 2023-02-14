-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 11:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `cmdate` date NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `cmdate`, `post_id`) VALUES
(15, 'John Doe', 'This is the first comment!!!', '2023-02-14', 1),
(16, 'Erick Martin', 'Awesome Article', '2023-02-14', 1),
(17, 'Michele Waters', 'I love this', '2023-02-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `headline`, `details`, `date`) VALUES
(1, 'This is the headline', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus impedit architecto praesentium fugit laboriosam minus maiores omnis? Porro eum praesentium, obcaecati odio vel sequi quam placeat nihil facilis magni ipsam temporibus sed, nemo delectus asperiores fugiat ad recusandae hic laboriosam saepe qui ex illum excepturi cum? Blanditiis a ad corrupti, temporibus obcaecati dolore exercitationem beatae non ullam soluta, eligendi iure tempora unde, veritatis neque sint, recusandae? Corrupti quam quo, laudantium voluptatum similique, temporibus rem possimus sunt cum pariatur. Officiis modi nemo aliquid. Libero molestias beatae exercitationem earum sunt quod nemo dolorem recusandae facilis cum aliquid hic quas, in incidunt eligendi iure repudiandae, deserunt tempore vero dolores repellat. Quam, iusto quibusdam sequi, modi minus dolorum, commodi, exercitationem nam optio pariatur soluta.', '2023-02-14'),
(2, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-02-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
