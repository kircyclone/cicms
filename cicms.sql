-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 06:44 PM
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
-- Table structure for table `albumimages`
--

CREATE TABLE `albumimages` (
  `id` int(11) NOT NULL,
  `albumid` int(11) NOT NULL,
  `imagename` varchar(100) NOT NULL,
  `imagecaption` varchar(1000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `addedtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumimages`
--

INSERT INTO `albumimages` (`id`, `albumid`, `imagename`, `imagecaption`, `status`, `addedtime`) VALUES
(1, 9199, '1758605.jpeg', 'Slider 1', '0', 1501501452),
(2, 9199, '6922454.jpeg', 'Slider 2', '0', 1501501452),
(3, 9199, '1516357.jpeg', 'Slider 3', '0', 1501501452),
(4, 9199, '3298614.jpeg', 'Slider 4', '0', 1501501452),
(5, 9199, '1674011.jpeg', 'Slider 5', '0', 1501501452);

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
(1, 1807, 3245, 'About Us', '<p>Success !!! About Us Page Content Updated !!!</p>\r\n', 1487488584),
(2, 9568, 3245, 'New blog entry', '<p>New blog entry content</p>\r\n', 1487504161);

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
(1, 3245, 'New Blog', '', 1486050534);

-- --------------------------------------------------------

--
-- Table structure for table `formentries`
--

CREATE TABLE `formentries` (
  `id` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `formname` varchar(255) NOT NULL,
  `formentries` varchar(4000) NOT NULL,
  `enterytime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formentries`
--

INSERT INTO `formentries` (`id`, `formid`, `formname`, `formentries`, `enterytime`) VALUES
(1, 3941, 'Contact Us', '{"fullname":"Leonardo Da Vinci","email":"example@email.com","mobile":"9495958884","message":"Wanna do business with you..."}', 1501603717);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `formid` varchar(30) NOT NULL,
  `formname` varchar(255) NOT NULL,
  `columns` varchar(4000) NOT NULL,
  `addedby` varchar(30) NOT NULL,
  `addedtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `formid`, `formname`, `columns`, `addedby`, `addedtime`) VALUES
(1, '3941', 'Contact Us', '{"inputtype":"text","labelname":"Full Name","classnames":"fullname","cssstyles":null}', 'admin', '1497682322'),
(2, '3941', 'Contact Us', '{"inputtype":"text","labelname":"Email","classnames":"email","cssstyles":null}', 'admin', '1497682322'),
(3, '3941', 'Contact Us', '{"inputtype":"text","labelname":"Mobile","classnames":"mobile","cssstyles":null}', 'admin', '1497682322'),
(4, '3941', 'Contact Us', '{"inputtype":"textarea","labelname":"Message","classnames":"message","cssstyles":null}', 'admin', '1497682322');

-- --------------------------------------------------------

--
-- Table structure for table `imagealbum`
--

CREATE TABLE `imagealbum` (
  `id` int(11) NOT NULL,
  `albumid` int(11) NOT NULL,
  `albumname` varchar(255) NOT NULL,
  `addedtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagealbum`
--

INSERT INTO `imagealbum` (`id`, `albumid`, `albumname`, `addedtime`) VALUES
(1, 9199, 'jsImgSlider1', 1501090247);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(40) NOT NULL,
  `quotationid` varchar(30) NOT NULL,
  `fromaddress` varchar(255) NOT NULL,
  `fromphone` varchar(255) NOT NULL,
  `fromemail` varchar(255) NOT NULL,
  `toname` varchar(255) NOT NULL,
  `toaddress` varchar(255) NOT NULL,
  `tophone` varchar(30) NOT NULL,
  `toemail` varchar(255) NOT NULL,
  `orderid` varchar(40) NOT NULL,
  `accountno` varchar(255) NOT NULL,
  `total` float(15,2) NOT NULL,
  `tax` float(15,2) NOT NULL,
  `gtotal` float(15,2) NOT NULL,
  `paymentdue` int(11) NOT NULL,
  `invoicedatetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitems`
--

CREATE TABLE `invoiceitems` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(40) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemdescription` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `subtotal` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1833', 'Home', '<p>Home page contents</p>\n\n<p>Home page contents</p>\n\n<p>Home page contents</p>\n', 1485483624),
(2, '4651', 'About Us', '<p>About Us page contents</p>\r\n\r\n<p>About Us page contents</p>\r\n\r\n<p>About Us page contents</p>\r\n\r\n<p>About Us page contents</p>\r\n', 1485444116),
(3, '5592', 'Services', '<p>Services page contents</p>\r\n', 1485485542),
(4, '6237', 'Documentation', '<h2><ins><strong>CICMS</strong></ins><ins><strong> Documentation</strong></ins></h2>\r\n\r\n<p>Place the upzipped files in the required folder&nbsp;and edit the config/config.php file for base_url and other needed changes and got to /admin/loginform and enter admin as username and password to login.</p>\r\n\r\n<p><ins><strong>Creating a Page</strong></ins><br />\r\n<br />\r\n1. Click (Pages -&gt; New Page).<br />\r\n2. Create controller</p>\r\n\r\n<p>&lt;?php</p>\r\n\r\n<p><!--?php</p--></p>\r\n\r\n<p><!--?php</p--></p>\r\n\r\n<p><!--?php</p--></p>\r\n\r\n<p><!--?php</p--></p>\r\n\r\n<p><!--?php</p--></p>\r\n\r\n<p>defined(&#39;BASEPATH&#39;) OR exit(&#39;No direct script access allowed&#39;);</p>\r\n\r\n<p>class {{Controller Name}} extends CI_Controller {<br />\r\n&nbsp;&nbsp; &nbsp;var $thiscontroller,$thisfunction,$pagecontents,$themefoldername;<br />\r\n&nbsp;&nbsp; &nbsp;public function __construct(){<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;parent::__construct();<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; load -&gt; model(&quot;Pages_model&quot;);<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; thiscontroller = $this-&gt;uri-&gt;segment(1);<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; thisfunction = $this-&gt;uri-&gt;segment(2);<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; themefoldername1 = $this -&gt; config -&gt; item(&quot;themefoldername1&quot;);<br />\r\n&nbsp;&nbsp; &nbsp;}<br />\r\n&nbsp;&nbsp; &nbsp;public function index()<br />\r\n&nbsp;&nbsp; &nbsp;{<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; pagecontents = $this -&gt; Pages_model -&gt; showpagecontents(&#39;4651&#39;); // Page id taken from page /adminpage/pageslist<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$bodydata = array(<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&#39;statictitle&#39;&nbsp;&nbsp; &nbsp;=&gt; STATICTITLE,<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&#39;title&#39;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;=&gt; &#39;{{Page Title}}&#39;,<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&#39;pagecontent&#39;&nbsp;&nbsp; &nbsp;=&gt; $this -&gt; pagecontents<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;);<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this -&gt; load -&gt; view(&quot;themes/&quot;.$this -&gt; themefoldername1.&quot;/aboutuscontent&quot;,$bodydata);<br />\r\n&nbsp;&nbsp; &nbsp;}<br />\r\n}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3. This page will become accessible through /{{Controller Name}}</p>\r\n\r\n<p><ins><strong>Adding third party package</strong></ins><br />\r\n<br />\r\n1. Put the files in the folder assetsmodules.</p>\r\n\r\n<p><ins><strong>Creating Image Album</strong></ins><br />\r\n<br />\r\n1. Create album name (adminimages/albumlist)<br />\r\n2. Add Images in the album (adminimages/albumlist -&gt; List / Add / Edit Album Images List)<br />\r\n3. Use jsimgslider_helper.php to add a slider (jsImgSlider is added in the package)</p>\r\n\r\n<p><br />\r\n<strong>Adding Users in User -&gt; Userslist</strong></p>\r\n\r\n<p><ins><strong>Adding Simple Forms</strong></ins><br />\r\n<br />\r\n1. Go to Forms -&gt; Add New Form<br />\r\n2. Select Textbox or Textarea , Label Name, Class Names(Optional), Css styles (Optional) Add to your form.<br />\r\n3. Enter name for your form (eg. Contact Us Form)<br />\r\n4. Click Save Form</p>\r\n', 1501568765);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `quotationid` varchar(30) NOT NULL,
  `fromaddress` varchar(255) NOT NULL,
  `fromphone` varchar(255) NOT NULL,
  `fromemail` varchar(255) NOT NULL,
  `toname` varchar(255) NOT NULL,
  `toaddress` varchar(255) NOT NULL,
  `tophone` varchar(30) NOT NULL,
  `toemail` varchar(255) NOT NULL,
  `orderid` varchar(40) NOT NULL,
  `accountno` varchar(255) NOT NULL,
  `total` float(15,2) NOT NULL,
  `tax` float(15,2) NOT NULL,
  `gtotal` float(15,2) NOT NULL,
  `quotationdatetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotationitems`
--

CREATE TABLE `quotationitems` (
  `id` int(11) NOT NULL,
  `quotationid` varchar(40) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itemdescription` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `subtotal` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessiondetails`
--

CREATE TABLE `sessiondetails` (
  `id` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `adminid` varchar(255) NOT NULL,
  `remoteipaddress` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `controllername` varchar(255) NOT NULL,
  `functionname` varchar(255) NOT NULL,
  `querystring` varchar(255) NOT NULL,
  `hittime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regtime` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `emppoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `password`, `regtime`, `userid`, `status`, `emppoto`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1496555079, '', 'active', 'assets/uploads/empimages/2017/06/05/3785583.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumimages`
--
ALTER TABLE `albumimages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `formentries`
--
ALTER TABLE `formentries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagealbum`
--
ALTER TABLE `imagealbum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotationitems`
--
ALTER TABLE `quotationitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessiondetails`
--
ALTER TABLE `sessiondetails`
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
-- AUTO_INCREMENT for table `albumimages`
--
ALTER TABLE `albumimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blogentry`
--
ALTER TABLE `blogentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `formentries`
--
ALTER TABLE `formentries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `imagealbum`
--
ALTER TABLE `imagealbum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotationitems`
--
ALTER TABLE `quotationitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessiondetails`
--
ALTER TABLE `sessiondetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
