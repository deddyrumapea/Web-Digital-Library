-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 06:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` char(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(70) NOT NULL,
  `publisher` varchar(70) NOT NULL,
  `year` int(4) NOT NULL,
  `pages` int(4) NOT NULL,
  `cover_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `publisher`, `year`, `pages`, `cover_img`) VALUES
('BOOK-0WEJW', 'Atomic Habits', 'James Clear', 'Avery', 2018, 320, 'assets/images/5fcb667c937ca.jpg'),
('BOOK-8ADS8', 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'Free Press', 2004, 371, 'assets/images/IMG (11).jpg'),
('BOOK-A1FL9', 'Guns, Germs, and Steel', 'Jared M. Diamond', 'W. W. Norton & Company', 1999, 457, 'assets/images/IMG (1).jpg'),
('BOOK-AA29H', 'The 4-Hour Workweek', 'Timothy Ferriss', 'Harmony Books', 2007, 308, 'assets/images/IMG (13).jpg'),
('BOOK-ADM12', 'Team of Rivals', 'Doris Kearns Goodwin', 'Simon & Schuster', 2006, 916, 'assets/images/IMG (7).jpg'),
('BOOK-DK3S1', 'A People\'s History of the United States', 'Howard Zinn', 'Harper Perennial', 2005, 731, 'assets/images/IMG (25).jpg'),
('BOOK-DS39S', 'Factfulness', 'Hans Rosling', 'Sceptre', 2018, 342, 'assets/images/IMG (19).jpg'),
('BOOK-DSAF1', 'Homo Deus: A History of Tomorrow', 'Yuval Noah Harari', 'Harper', 2017, 449, 'assets/images/IMG (17).jpg'),
('BOOK-DSF19', 'Why We Sleep', 'Matthew Walker', 'Scribner', 2017, 368, 'assets/images/IMG (18).jpg'),
('BOOK-EJ90R', 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Signal Books', 2014, 464, 'assets/images/IMG (24).jpg'),
('BOOK-ERJJK', 'The Devil in the White City', 'Erik Larson', 'Crown Publishers', 2003, 447, 'assets/images/IMG (26).jpg'),
('BOOK-GJS1K', 'The Power of Habit', 'Charles Duhigg', 'Random House', 2012, 375, 'assets/images/IMG (16).jpg'),
('BOOK-J2NA2', 'The Magic of Thinking Big', 'David J. Schwartz', 'Touchstone', 1987, 320, 'assets/images/IMG (14).jpg'),
('BOOK-JDSF2', 'Rich Dad, Poor Dad', 'Robert T. Kiyosaki', 'Time Warner Books UK', 2007, 195, 'assets/images/IMG (12).jpg'),
('BOOK-KJSD2', 'How to Win Friends and Influence People', 'Dale Carnegie', 'Gallery Books', 1998, 288, 'assets/images/IMG (9).jpg'),
('BOOK-LW3JD', 'The Origin of Species', 'Charles Darwin', 'CABI', 2003, 336, 'assets/images/IMG (22).jpg'),
('BOOK-MQWJ1', 'Who Moved My Cheese?', 'Spencer Johnson', 'Vermilion', 2002, 96, 'assets/images/IMG (10).jpg'),
('BOOK-NWE8S', 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Farrar', 2011, 499, 'assets/images/IMG (15).jpg'),
('BOOK-PEF31', 'A Brief History of Time', 'Stephen Hawking', 'Bantam', 1988, 102, 'assets/images/IMG (21).jpg'),
('BOOK-QJ1KP', 'John Adams', 'David McCullough', 'Simon & Schuster Paperbacks', 2001, 751, 'assets/images/IMG (8).jpg'),
('BOOK-SAD3Q', 'The Selfish Gene', 'Richard Dawkins', 'Oxford University Press, USA', 1990, 236, 'assets/images/IMG (23).jpg'),
('BOOK-SK38A', 'The Richest Man in Babylon', 'George S. Clason', 'Berkley Books', 2008, 194, 'assets/images/IMG (6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `address`) VALUES
('admin', '$2y$10$9jiv5fVFYZeaIxf4j4rFX..b0T4xDBRAmO8krNVqXV8/mNbPMkIQq', 'admin@digilib.com', '3778  Brown Avenue, Chappells, South Carolina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
