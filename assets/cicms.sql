-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 07:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogentry`
--

CREATE TABLE `blogentry` (
  `id` int(11) NOT NULL,
  `blogentryid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `entryheading` varchar(1000) NOT NULL,
  `entrycontent` varchar(4000) NOT NULL,
  `entrytime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogentry`
--

INSERT INTO `blogentry` (`id`, `blogentryid`, `blogid`, `entryheading`, `entrycontent`, `entrytime`) VALUES
(2, 1807, 3245, 'Updated Content !!!', '<p>Success !!! Content Updated !!!</p>\r\n', 1487488584),
(3, 7757, 3245, 'sdfsdf', '<p>dsfsdfsdf&#39;sdfihsdfsdf&quot;sdnfsdjj</p>\r\n', 1487488652),
(4, 2786, 8582, 'sdsdfsd', '<p>sdf sdf sdfsdf</p>\r\n', 1487488718),
(5, 4725, 8582, 'sdsdfsd', '<p>sdf sdf sdfsdf</p>\r\n', 1487488740),
(6, 9568, 3245, 'New blog entry', '<p>New blog entry content</p>\r\n', 1487504161),
(7, 8773, 3245, 'About Us', '<!--inner-page-about-->\r\n<h3>About Us</h3>\r\n\r\n<p><img alt="" src="images/a1.jpg" /></p>\r\n\r\n<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>\r\n\r\n<p>Fusce feugiat malesuada odio orbi nunc odio gravida at cursus nec luctus a lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna onec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo.Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend.</p>\r\n\r\n<p>Bulum iaculis lacinia est. Proin dictum elemntum velit. Fusce euismod cons equat ante. Lorem ipsum dmeconsectetuer adipiscing elit. ellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla vene natis. In pede mi aliquet sit amet euismod in auctor ut ligula.</p>\r\n<!------->\r\n\r\n<p>WHO WE ARE</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Morbi sapien turpis, aliquet quis elementum ut, molestie nec turpis. Duis ultrices fermentum enim ac facilisis. Phasellus laoreet rhoncus diam ut auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris ut malesuada mi. Aliquam nec est arcu. Quisque dui odio, interdum vel euismod vel, sollicitudin quis augue. Integer pharetra, neque in commodo consectetur, tortor enim venenatis nibh, sed dictum purus tortor non nisl. Vestibulum in bibendum lacus. Suspendisse lobortis pharetra eros. Nam sagittis nulla sed lorem gravida laoreet. Sed id lacus erat. Sed ullamcorper, libero quis ultrices blandit, arcu lorem vehicula urna, ut ultrices nunc tortor a ex. Curabitur interdum sed leo quis condimentum. Nam congue erat elit, eu malesuada augue rutrum non. Donec malesuada ultrices commodo. Vestibulum commodo congue ipsum ac suscipit.</p>\r\n\r\n<ul>\r\n	<li><a href="">Always free from repetition</a></li>\r\n	<li><a href="">Vestibulum rhoncus nibh quis dui fermentum iaculis.</a></li>\r\n	<li><a href="">The standard chunk of Lorem Ipsum</a></li>\r\n	<li><a href="">In consequat dolor in lorem egestas ultrices.</a></li>\r\n	<li><a href="">Aliquam sollicitudin eros id luctus consequat.</a></li>\r\n	<li><a href="">Always free from repetition</a></li>\r\n</ul>\r\n<!------->\r\n\r\n<p>TEAM WORK</p>\r\n\r\n<p><img alt="" src="images/abt1.jpg" /></p>\r\n\r\n<p><a href="single.html">Sed vestibulum dui</a></p>\r\n\r\n<p>Nulla elementum vulputate quam, quis efficitur quam tempus non. Cras a dignissim purus. Ut scelerisque quis eros elementum sollicitudin.</p>\r\n\r\n<p><img alt="" src="images/abt2.jpg" /></p>\r\n\r\n<p><a href="single.html">Fusce fringilla in mattis</a></p>\r\n\r\n<p>Nulla elementum vulputate quam, quis efficitur quam tempus non. Cras a dignissim purus. Ut scelerisque quis eros elementum sollicitudin.</p>\r\n\r\n<p><img alt="" src="images/abt3.jpg" /></p>\r\n\r\n<p><a href="single.html">Donec porta in fringilla</a></p>\r\n\r\n<p>Nulla elementum vulputate quam, quis efficitur quam tempus non. Cras a dignissim purus. Ut scelerisque quis eros elementum sollicitudin.</p>\r\n\r\n<p><img alt="" src="images/abt4.jpg" /></p>\r\n\r\n<p><a href="single.html">Sed non sem facilisis</a></p>\r\n\r\n<p>Nulla elementum vulputate quam, quis efficitur quam tempus non. Cras a dignissim purus. Ut scelerisque quis eros elementum sollicitudin.</p>\r\n<!--/inner-page-about-->', 1488123705);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `blogname` varchar(50) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blogid`, `blogname`, `createdby`, `createdtime`) VALUES
(1, 3245, 'New Blog', '', 1486050534),
(2, 8582, 'New Blog 1', '', 1486051394),
(3, 1216, 'New Blog 2', '', 1486051422),
(4, 8012, 'New Blog 3', '', 1486051492);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pageid` varchar(30) NOT NULL,
  `pageheading` varchar(255) NOT NULL,
  `pagedescription` longtext NOT NULL,
  `entrytime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pageid`, `pageheading`, `pagedescription`, `entrytime`) VALUES
(1, '7965', 'First Page', '<p>First Page content Edited 1</p>\r\n', 1484503061),
(2, '4651', 'About Us', '<p>About us page content</p>\r\n', 1485444116),
(3, '1833', 'Home', '<p>Home page contents</p>\r\n', 1485483624),
(4, '5592', 'Services', '<p>Services page contents</p>\n', 1485485542);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regtime` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `regtime`, `userid`) VALUES
(1, 'admin', 'd5dfbdb14235027f3bc89b365daaac0a', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogentry`
--
ALTER TABLE `blogentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogentry`
--
ALTER TABLE `blogentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
