-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2014 at 09:17 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `postdate` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `author` text CHARACTER SET ucs2 COLLATE ucs2_general_mysql500_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `postdate`, `author`) VALUES
(28, 'Welcome to your blog!', 'Welcome to your personal ''LightBlog'' blog. You can add, edit and delete posts by looking at the bottom of the pages. (In order to edit or remove a post you must be inside it first.)\r\nFor posts you can use BBCode just like in most common forums. \r\nLightBlog automatically resizes your images even if they are over 4K in resolution. LightBlog also is dynamic and will resize according to what device it''s being used on.', '28/09/2014', 'vladka24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
