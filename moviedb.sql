-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2018 at 05:54 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE `adminmaster` (
  `adminname` varchar(20) NOT NULL,
  `userid` int(4) NOT NULL,
  `mobileno` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`adminname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`adminname`, `userid`, `mobileno`, `password`) VALUES
('Administrator', 1, 2147483647, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `areamaster`
--

CREATE TABLE `areamaster` (
  `areaid` int(4) NOT NULL auto_increment,
  `cityid` int(4) NOT NULL,
  `areaname` varchar(20) NOT NULL,
  PRIMARY KEY  (`areaid`),
  UNIQUE KEY `areaname` (`areaname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `areamaster`
--

INSERT INTO `areamaster` (`areaid`, `cityid`, `areaname`) VALUES
(1, 1, 'Maninagar'),
(2, 1, 'Bapunagar'),
(3, 2, 'Alkapuri'),
(4, 3, 'Ghoddod Road'),
(5, 1, 'CTM'),
(6, 1, 'Raipur'),
(7, 1, 'Ashram Road'),
(8, 2, 'VIP Road'),
(9, 2, 'Harni Road'),
(10, 2, 'Kareli Baug'),
(11, 2, 'Pani Ni Tanki'),
(12, 7, 'Race Course Road'),
(13, 3, 'Athava Gate'),
(14, 3, 'varacha'),
(15, 3, 'dumas road'),
(16, 3, 'Magdalla'),
(17, 7, 'Mota Mauva Road'),
(18, 7, 'Kasturbaa Road'),
(20, 7, 'Phulchab Chok'),
(21, 7, 'Kalavad Road'),
(22, 8, 'Wadhavan'),
(23, 4, 'Gunjan Road'),
(24, 4, 'Koparli Road'),
(25, 9, 'Airpot Road'),
(26, 9, 'Pandit Naheru Road'),
(27, 6, 'Anand Vidhyanagar Ro'),
(28, 6, 'Rajshivalay Road'),
(29, 1, 'Nikol'),
(30, 1, 'Drive in Road'),
(31, 1, 'Vastrapur');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `bookingid` int(4) NOT NULL auto_increment,
  `userid` int(4) NOT NULL,
  `showid` int(4) NOT NULL,
  `dateofbooking` date NOT NULL,
  `noofseats` int(4) NOT NULL,
  `totalcharges` int(4) NOT NULL,
  `ticketcharges` int(5) NOT NULL,
  `showdate` date NOT NULL,
  PRIMARY KEY  (`bookingid`),
  KEY `showid` (`showid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`bookingid`, `userid`, `showid`, `dateofbooking`, `noofseats`, `totalcharges`, `ticketcharges`, `showdate`) VALUES
(1, 1, 1, '2018-04-16', 2, 300, 150, '2018-04-16'),
(2, 1, 1, '2018-04-16', 4, 300, 600, '2018-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `bookingseatdetails`
--

CREATE TABLE `bookingseatdetails` (
  `seatdetailsid` int(4) NOT NULL,
  `bookingid` int(4) NOT NULL,
  `seatno` int(4) NOT NULL,
  PRIMARY KEY  (`seatdetailsid`),
  UNIQUE KEY `seatno` (`seatno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingseatdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `canceldetails`
--

CREATE TABLE `canceldetails` (
  `cancelid` int(4) NOT NULL,
  `bookingid` int(4) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `canceldate` date NOT NULL,
  `refundamount` int(5) NOT NULL,
  PRIMARY KEY  (`cancelid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `canceldetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `citymaster`
--

CREATE TABLE `citymaster` (
  `cityid` int(4) NOT NULL auto_increment,
  `cityname` varchar(30) NOT NULL,
  PRIMARY KEY  (`cityid`),
  UNIQUE KEY `cityname` (`cityname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `citymaster`
--

INSERT INTO `citymaster` (`cityid`, `cityname`) VALUES
(1, 'Ahmedabad'),
(6, 'Anand'),
(2, 'Baroda'),
(10, 'Bombay'),
(9, 'Jamnagar'),
(5, 'Nadiad'),
(7, 'Rajkot'),
(3, 'Surat'),
(8, 'Surendranagar'),
(4, 'Vapi');

-- --------------------------------------------------------

--
-- Table structure for table `downloaddetails`
--

CREATE TABLE `downloaddetails` (
  `downloadid` int(4) NOT NULL,
  `customerid` int(4) NOT NULL,
  `uploadid` int(4) NOT NULL,
  `dateofdownload` date NOT NULL,
  PRIMARY KEY  (`downloadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloaddetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `inquirydetail`
--

CREATE TABLE `inquirydetail` (
  `inquiryid` int(4) NOT NULL auto_increment,
  `dateofinquiry` date NOT NULL,
  `userid` int(4) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `dateofreply` date default NULL,
  `reply` varchar(500) default NULL,
  `emailid` varchar(50) NOT NULL,
  `theatreid` int(4) NOT NULL,
  PRIMARY KEY  (`inquiryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inquirydetail`
--

INSERT INTO `inquirydetail` (`inquiryid`, `dateofinquiry`, `userid`, `subject`, `detail`, `dateofreply`, `reply`, `emailid`, `theatreid`) VALUES
(1, '2018-02-16', 1, 'ad', 'axdasd', '2018-04-15', 'asdasd', 'zeel.patel@gmail.com', 1),
(2, '2018-04-13', 1, 'booking issue', 'probem occuerd in booking', '2018-04-15', 'adasd', 'zeelpatel280@gmail.com', 2),
(3, '2018-04-15', 1, 'hi', 'hi', '2018-04-15', '', 'zeelpatel280@gmail.com', 1),
(4, '2018-04-15', 2, 'assadsadas', 'adasdad', NULL, NULL, 'patwa.bhavya@gmail.com', 3),
(5, '2018-04-15', 1, 'sadsa', 'sadasd', NULL, NULL, 'zeelpatel280@gmail.com', 5),
(6, '2018-04-20', 1, 'asd', 'asd', NULL, NULL, 'zeelpatel280@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languagemaster`
--

CREATE TABLE `languagemaster` (
  `languageid` int(4) NOT NULL auto_increment,
  `languagename` varchar(20) NOT NULL,
  PRIMARY KEY  (`languageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `languagemaster`
--

INSERT INTO `languagemaster` (`languageid`, `languagename`) VALUES
(1, 'English'),
(2, 'Hindi'),
(3, 'Gujrati'),
(4, 'Marathi'),
(5, 'Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `managermaster`
--

CREATE TABLE `managermaster` (
  `managerid` int(4) NOT NULL auto_increment,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) default NULL,
  `cityid` int(4) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `mobilenumber` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dateofbirthday` date NOT NULL,
  `dateofjoin` datetime NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `loginname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sque` varchar(50) NOT NULL,
  `sans` varchar(50) NOT NULL,
  `theatreid` int(4) NOT NULL,
  PRIMARY KEY  (`managerid`),
  UNIQUE KEY `emailid` (`emailid`,`loginname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `managermaster`
--

INSERT INTO `managermaster` (`managerid`, `firstname`, `middlename`, `lastname`, `address1`, `address2`, `cityid`, `pincode`, `phonenumber`, `mobilenumber`, `gender`, `dateofbirthday`, `dateofjoin`, `emailid`, `loginname`, `password`, `sque`, `sans`, `theatreid`) VALUES
(1, 'mahesh', 's', 'patel', ',christion galiraipur,ahmedabd						', '						', 1, 382440, '', '8978675869', 'M', '1968-03-01', '2018-04-11 15:38:52', 'maheshcitypulse@gmail.com ', 'citypulse@maninagar', '1234', 'what is your petname', 'dog', 1),
(2, 'Jainam', 'H', 'Shah', 'bombay Housing,Bapunagar					', '						', 1, 383040, '', '9087563408', 'M', '1967-05-17', '2018-04-11 15:40:33', 'jainamcitygold@gmail.com', 'citygold@bapunagar', '1234', 'what is your petname', 'dog', 2),
(3, 'Dipak', 'M', 'Patel', 'Patel Colony,alkapuri,baroda						', '						', 2, 243490, '', '8756347809', 'M', '1968-12-01', '2018-04-11 15:43:40', 'dipakbigcinemas@gmail.com', 'bigcinemas@baroda', '1234', 'what is your petname', 'dog', 3),
(4, 'Saloni', 'J', 'Parmar', 'Sector 14,Kamdar Road,Surat						', '						', 3, 456710, '', '7089465714', 'M', '1986-06-23', '2018-04-11 15:45:26', 'saloniinox@gmail.com', 'inox@surat', '1234', 'what is your petname', 'dog', 4),
(5, 'Suraj', 'M', 'Rana', 'valabhh park,CTM,ahmedabad						', '						', 1, 383050, '', '7856325490', 'M', '1965-09-21', '2018-04-11 15:47:12', 'surajdevi@gmail.com', 'devi@ctm', '1234', 'what is your petname', 'dog', 5),
(6, 'Jalpan', 'S', 'Patel', 'Gopal Tower,Maninagar						', '						', 1, 345609, '', '0978342109', 'M', '1977-11-23', '2018-04-11 15:48:45', 'jalpanmiraj@gmail.com', 'miraj@maninagar', '1234', 'what is your petname', 'dog', 6),
(7, 'Jeet', 'K', 'Parmar', 'GP,Ambawadi						', '						', 1, 365780, '', '8047586980', 'M', '1988-09-12', '2018-04-11 15:50:18', 'jeetshiv@gmail.com', 'shiv@ahsramroad', '1234', 'what is your petname', 'dog', 7),
(8, 'Amit', 'K', 'Prajapati', 'kali colony,rajkot						', '						', 7, 536479, '', '9832354667', 'M', '1971-09-14', '2018-04-11 16:07:19', 'amito7@gmail.com', 'o7@rajkot', '1234', 'what is your petname', 'dog', 8),
(9, 'Kaplesh', 'P', 'patwa', 'Tapsvi Colony,Ghodasar						', '						', 1, 382442, '', '896721904', 'M', '1964-05-02', '2018-04-11 16:09:25', 'kalpeshmira@gmail.com', 'mira@maninagar', '1234', 'what is your petname', 'dog', 9),
(10, 'Nilesh', 'K', 'Rupani', 'mohjo nagar,Rajkot						', '						', 7, 354687, '', '8943561390', 'M', '1979-06-11', '2018-04-11 16:11:26', 'nileshbigcinemas@gmail.com', 'bigcinemas@rajkot', '1234', 'what is your petname', 'dog', 10),
(11, 'Hardik', 'M', 'Vasar', 'Omkar Resiedncy,nikol						', '						', 1, 345687, '', '8912349087', 'M', '1979-08-01', '2018-04-11 16:14:11', 'hardikrajhans@gmail.com', 'rajhans@nikol', '1234', 'what is your petname', 'dog', 11),
(12, 'Smit', 'D', 'Patel', 'Krishna Bunglow,new Ranip						', '						', 1, 424657, '', '8934569087', 'M', '1978-07-17', '2018-04-11 16:17:09', 'smitcinepolis@gmail.com', 'cinepolis@vastrapur', '1234', 'what is your petname', 'dog', 12),
(13, 'Kush', ' M', 'Soni', 'Patel Dairy Road,Anand						', '						', 6, 382831, '', '6352210970', 'M', '1980-06-01', '2018-04-11 16:20:33', 'kushrajshivalay@gmail.com', 'rajshivalaya@anad', '1234', 'what is your petname', 'dog', 13),
(14, 'Krishna', 'H ', 'Raval', 'Valabbh Vidhya nagar Road, anand						', '						', 6, 384858, '', '8967577908', 'F', '1987-04-15', '2018-04-11 16:22:59', 'krishnagolddigital@gmail.com', 'golddigital@anand', '1234', 'what is your petname', 'dog', 14),
(15, 'Harsh', 'M', 'Vaidhya', 'airport Road,Jamanagr						', '						', 9, 382450, '', '9012346513', 'M', '1977-07-13', '2018-04-11 16:26:14', 'harshinox@gmail.com', 'inox@jamnagar', '1234', 'what is your petname', 'dog', 15),
(16, 'Manoj', 'S', 'Prajapati', 'New Vapi Road,Vapi						', '						', 4, 453211, '', '9823864312', 'M', '1960-12-21', '2018-04-11 16:31:04', 'manojvaishali@gmail.com', 'Vaishali@vapi', '1234', 'what is your petname', 'dog', 16),
(17, 'Rakesh ', 'M.', 'Bhalala', 'RAm Colony,Vapi 						', '						', 4, 451345, '', '9381673541', 'M', '1975-12-15', '2018-04-11 16:34:28', 'rakeshcarnival@gmail.com', 'carnival@vapi', '1234', 'what is your petname', 'dog', 17),
(18, 'Mukesh', 'S', 'Rana', 'E-colony ,Surendranagar						', '						', 8, 264421, '', '9845133121', 'M', '1971-12-01', '2018-04-11 16:37:29', 'mukeshmiraj@gmail.com', 'miraj@surendranagar', '1234', 'what is your petname', 'dog', 18),
(19, 'Ramesh', 'K', 'Maruji', 'Race Road, Rajkot 						', '						', 7, 315132, '', '9846544454', 'M', '1972-12-14', '2018-04-11 16:40:01', 'rameshgirnar@gmail.com', 'girnar@rajkot', '1234', 'what is your petname', 'dog', 19),
(20, 'Mohit', 'd.', 'Ramani', 'sri Ram Chock						', '						', 7, 345610, '', '9870605960', 'M', '1992-09-09', '2018-04-11 16:44:43', 'mohitrworld@gmail.com', 'rworld@rajkot', '1234', 'what is your petname', 'dog', 20),
(21, 'Pravlesh', 'R', 'jaiswami', 'gira Chock,rajkot						', '						', 7, 356413, '', '895667890', 'M', '1976-06-09', '2018-04-11 16:46:41', 'pavleshcosmoplex@gmail.com', 'cosmoplex@rajkot', '1234', 'what is your petname', 'dog', 21),
(22, 'Rajesh', 'K', 'Sutrhar', 'magdalla Road,surat						', '						', 3, 354680, '', '7889549010', 'M', '1981-07-01', '2018-04-11 16:48:21', 'rajeshVR@gmail.com', 'inoxvr@surat', '1234', 'what is your petname', 'dog', 22),
(23, 'Viswas', 'K ', 'Rajani', 'Dumas Road,Surat						', '						', 3, 435610, '', '8079903209', 'M', '1976-09-20', '2018-04-11 16:50:08', 'viswasrajhans@gmail.com', 'rajhans@surat', '1234', 'what is your petname', 'dog', 23),
(24, 'Gita', ' M', 'Chodhry', 'Varcha Gam,Suar						', '						', 3, 345623, '', '8967304959', 'F', '1986-03-31', '2018-04-11 16:51:33', 'gitavalam@gmail.com', 'valam@surat', '1234', 'what is your petname', 'dog', 24),
(25, 'Hiren ', 'H ', 'Raval', 'Athava ,Suart						', '						', 3, 345610, '', '8956346310', 'M', '1973-06-09', '2018-04-11 16:53:01', 'hirencinepolis@gmail.com', 'cinepolis@surat', '1234', 'what is your petname', 'dog', 25),
(26, 'Henil', 'H', 'Thakkar', 'pani ni taki,barod						', '						', 2, 345210, '', '8924093409', 'M', '1980-10-16', '2018-04-11 16:54:40', 'henilpratap@gmail.com', 'pratap@baroda', '1234', 'what is your petname', 'dog', 26),
(27, 'Kirtan', ' A', 'Patel', 'Ramji mandir pole,karelibaug						', '						', 2, 382939, '', '0989876756', 'M', '1971-08-17', '2018-04-11 16:56:23', 'kirtanaradhana@gmail.com', 'aradhana@baroda', '1234', 'what is your petname', 'dog', 27),
(28, 'Jay', 'A', 'Modi', 'mota bazar,harni Road						', '						', 2, 356970, '', '8957860890', 'M', '1974-09-12', '2018-04-11 16:58:35', 'jayrajhans@gmail.com', 'rajhans@baroda', '1234', 'what is your petname', 'dog', 28),
(29, 'Mira', 'R', 'rajput', 'gopal tower,maninagar						', '						', 1, 382443, '', '7000800010', 'F', '1985-09-21', '2018-04-11 17:00:16', 'miraanupam@gmail.com', 'anupam@ahmedabad', '1234', 'what is your petname', 'dog', 29),
(30, 'Amit', 'K', 'Ravat', 'Shirmoani Flat,Near Vasant Chokdi,S G highway					', '						', 1, 437586, '', '6970896070', 'M', '1985-09-26', '2018-04-11 17:02:02', 'amitcitygold@gmail.com', 'citygold@ashramroad', '1234', 'what is your petname', 'dog', 30);

-- --------------------------------------------------------

--
-- Table structure for table `managermasterold`
--

CREATE TABLE `managermasterold` (
  `managerid` int(4) NOT NULL,
  `cityid` int(4) NOT NULL,
  `theatreid` int(4) NOT NULL,
  `managername` varchar(20) NOT NULL,
  `mobileno` int(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dateofbirth` date NOT NULL,
  `loginname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sque` varchar(50) NOT NULL,
  `sans` varchar(50) NOT NULL,
  PRIMARY KEY  (`managerid`),
  UNIQUE KEY `loginname` (`loginname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managermasterold`
--


-- --------------------------------------------------------

--
-- Table structure for table `movielanguagemaster`
--

CREATE TABLE `movielanguagemaster` (
  `movielanguageid` int(4) NOT NULL auto_increment,
  `movieid` int(4) NOT NULL,
  `languageid` int(4) NOT NULL,
  PRIMARY KEY  (`movielanguageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `movielanguagemaster`
--

INSERT INTO `movielanguagemaster` (`movielanguageid`, `movieid`, `languageid`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `moviemaster`
--

CREATE TABLE `moviemaster` (
  `movieid` int(4) NOT NULL auto_increment,
  `languageid` int(4) NOT NULL,
  `moviename` varchar(30) NOT NULL,
  `startdate` date NOT NULL,
  `description` varchar(10000) default NULL,
  `image` varchar(100) NOT NULL,
  `youtubelink` varchar(200) NOT NULL,
  PRIMARY KEY  (`movieid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `moviemaster`
--

INSERT INTO `moviemaster` (`movieid`, `languageid`, `moviename`, `startdate`, `description`, `image`, `youtubelink`) VALUES
(1, 1, 'Rampage', '2018-04-14', 'Primatologist Davis Okoye, a man who keeps people at a distance, shares an unshakable bond with George, the extraordinarily intelligent, silverback gorilla who has been in his care since birth.', 'rampage short.jpg', 'https://www.youtube.com/watch?v=coOKvrsmQiI'),
(2, 1, 'Peter Rabbit', '2018-07-17', 'Peter Rabbit, the mischievous and adventurous hero who has captivated generations of readers, now takes on the starring role of his own irreverent, contemporary comedy with attitude. ', 'peter-rabbit-quad.jpg', 'https://www.youtube.com/watch?v=7Pa_Weidt08'),
(3, 1, 'Black Panther', '2018-04-14', 'After the events of Captain America:', 'black panther broad.jpg', 'https://www.youtube.com/watch?v=xjDjIWPwcPU'),
(4, 2, 'Baaghi 2', '2018-04-14', ' battle-hardened army officer goes in search of his ex-lovers child who is mysteriously kidnapped. Neha reaches out to the only person who can help her with her plight, Ronnie. He goes deep into the underbelly of Goa, facing off against drug lords, menacing Russian henchmen, and blood thirsty animals', 'Baaghi short.jpg', 'https://www.youtube.com/watch?v=F2lN25IayH8'),
(5, 2, 'Hichki', '2018-04-14', '"Hichki" is a story about a woman who turns her most daunting weakness into her biggest strength. Naina Mathur (Rani Mukerji) is an aspiring teacher who suffers from Tourette Syndrome. ', 'hichki Short.jpg', 'https://www.youtube.com/watch?v=nLSaCFlXn-g'),
(6, 2, 'BlackMail', '2018-04-14', 'Dev, a toilet paper salesman, in an attempt to spice up his rather monotonous and boring married life, returns home early one day to only find his wife in bed with her lover, Ranjit. ', 'blackmail short.jpg', 'https://www.youtube.com/watch?v=TDF1qdUtbzw'),
(7, 2, 'Mercury', '2018-07-25', 'Five long-time friends, all of whom are maimed as a result of Mercury poisoning, come together for their high school reunion. But a moment of mischief and misfortune during the after-party puts them on a one way road to hell.', 'mercury.jpg', 'https://www.youtube.com/watch?v=TeA293PMT1s'),
(8, 2, 'October', '2018-04-14', 'October is an intriguing tale of Dan who shares an unusual connection with Shuili. However, a tragedy befalls Dan and changes his perception towards love, life, and relationship.', 'October short.png', 'https://www.youtube.com/watch?v=7vracgLyJwI'),
(9, 3, 'Fera Feri Hera Feri', '2018-07-17', 'Mr. Hasmukhlaal is (un)fortunate enough to keep 2 wives at the same time, but the wives have no knowledge of the other marriage. On top of that, he orchestrates his own death for one family and stays with the other. ', 'feraferi Short.jpg', 'https://www.youtube.com/watch?v=I_P3bTPvjRw'),
(10, 2, 'Omerta', '2018-07-18', 'Based on the life of dreaded terrorist Omar Sheikh, whose crimes include masterminding the 1994 kidnappings of foreign tourists in India and plotting the murder of Wall Street journalist Daniel Pearl in 2002.', 'omerta.jpg', 'https://www.youtube.com/watch?v=WvDoOKJrrU4'),
(13, 2, 'Raid', '2018-04-14', 'Raid is based on one of the most high profile raids the country has ever known and is the world', 'Raid Short.jpg', 'https://www.youtube.com/watch?v=3h4thS-Hcrk&t=26s');

-- --------------------------------------------------------

--
-- Table structure for table `reviewdetails`
--

CREATE TABLE `reviewdetails` (
  `reviewid` int(4) NOT NULL auto_increment,
  `userid` int(4) NOT NULL,
  `movieid` int(4) NOT NULL,
  `dateofreview` date NOT NULL,
  `details` varchar(1000) NOT NULL,
  `subject` varchar(70) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY  (`reviewid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reviewdetails`
--

INSERT INTO `reviewdetails` (`reviewid`, `userid`, `movieid`, `dateofreview`, `details`, `subject`, `rating`) VALUES
(1, 1, 1, '2018-04-15', 'asdasdas', 'asdsd', 0),
(2, 1, 1, '2018-04-15', 'adsad', 'asdasd', 0),
(3, 1, 2, '2018-04-15', 'asdasd', 'sasd', 3),
(4, 2, 1, '2018-04-15', 'asdadasd', 'asdasd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `screenmaster`
--

CREATE TABLE `screenmaster` (
  `screenid` int(4) NOT NULL auto_increment,
  `theatreid` int(4) NOT NULL,
  `screenname` varchar(20) NOT NULL,
  `capacity` int(4) NOT NULL,
  PRIMARY KEY  (`screenid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `screenmaster`
--

INSERT INTO `screenmaster` (`screenid`, `theatreid`, `screenname`, `capacity`) VALUES
(1, 1, 'Screen 1', 170),
(2, 1, 'Screen 2', 150),
(3, 1, 'Screen 3', 150),
(4, 1, 'Screen 4', 130),
(5, 1, 'Screen 5', 130),
(6, 2, 'Screen 1', 150),
(7, 2, 'Screen 2', 150),
(8, 2, 'Screen 3', 100),
(9, 3, 'Screen 1', 120),
(10, 3, 'Screen 2', 150),
(11, 4, 'Screen 1', 140),
(12, 4, 'Screen 2', 130),
(13, 4, 'Screen 3', 120),
(14, 5, 'Screen 1', 150),
(15, 5, 'Screen 2', 140),
(16, 5, 'Screen 3', 150);

-- --------------------------------------------------------

--
-- Table structure for table `showdetail`
--

CREATE TABLE `showdetail` (
  `showid` int(4) NOT NULL auto_increment,
  `movieid` int(4) NOT NULL,
  `screenid` int(4) NOT NULL,
  `languageid` int(4) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `showtime` varchar(40) NOT NULL,
  `ticketcharges` int(5) NOT NULL,
  PRIMARY KEY  (`showid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `showdetail`
--

INSERT INTO `showdetail` (`showid`, `movieid`, `screenid`, `languageid`, `startdate`, `enddate`, `showtime`, `ticketcharges`) VALUES
(1, 4, 1, 2, '2018-04-14', '2018-07-14', '9:00 AM', 120),
(2, 4, 1, 2, '2018-04-14', '2018-07-14', '1:30 PM', 120),
(3, 4, 1, 2, '2018-04-14', '2018-07-14', '5:00 PM', 120),
(4, 5, 2, 2, '2018-04-14', '2018-07-14', '9:30 AM', 120),
(5, 5, 2, 2, '2018-04-14', '2018-07-14', '2:00 PM', 120),
(6, 5, 2, 2, '2018-04-14', '2018-07-14', '5:30 PM', 120),
(7, 5, 2, 2, '2018-04-14', '2018-07-14', '10:00 PM', 120),
(8, 8, 3, 2, '2018-04-14', '2018-07-14', '8:30 AM', 120),
(9, 6, 3, 2, '2018-04-14', '2018-07-14', '10:30 AM', 120),
(10, 8, 3, 2, '2018-04-14', '2018-07-14', '2:00 PM', 150),
(11, 4, 3, 2, '2018-04-14', '2018-07-14', '10:00 PM', 150),
(12, 1, 4, 1, '2018-04-14', '2018-07-14', '10:00 AM', 150),
(13, 1, 4, 1, '2018-04-14', '2018-07-14', '3:00 PM', 150),
(14, 8, 4, 2, '2018-04-14', '2018-07-14', '9:30 PM', 150),
(18, 4, 6, 2, '2018-04-15', '2018-07-15', '9:15 AM', 150),
(19, 4, 6, 2, '2018-04-15', '2018-07-15', '12:00 AM', 150),
(20, 4, 6, 2, '2018-04-15', '2018-07-15', '4:00 AM', 150),
(21, 4, 6, 2, '2018-04-15', '2018-07-15', '7:30 PM', 150),
(22, 5, 7, 2, '2018-04-15', '2018-07-15', '8:30 AM', 150),
(23, 5, 7, 2, '2018-04-15', '2018-07-15', '11:30 AM', 150),
(24, 5, 7, 2, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(25, 13, 7, 2, '2018-04-15', '2018-07-15', '6:00 PM', 150),
(26, 8, 7, 2, '2018-04-15', '2018-07-15', '9:30 PM', 150),
(27, 1, 8, 1, '2018-04-15', '2018-07-15', '8:45 AM', 150),
(28, 3, 8, 1, '2018-04-15', '2018-07-15', '11:30 AM', 150),
(29, 1, 8, 1, '2018-04-15', '2018-07-15', '2:45 PM', 150),
(30, 3, 8, 1, '2018-04-15', '2018-07-15', '6:00 PM', 150),
(31, 13, 8, 2, '2018-04-15', '2018-07-15', '9:30 PM', 150),
(33, 4, 9, 2, '2018-04-15', '2018-07-15', '8:00 AM', 150),
(34, 5, 9, 2, '2018-04-15', '2018-07-15', '11:00 AM', 150),
(35, 6, 9, 2, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(36, 4, 9, 2, '2018-04-15', '2018-07-15', '6:00 PM', 150),
(37, 13, 9, 2, '2018-04-15', '2018-07-15', '9:30 PM', 150),
(38, 1, 10, 1, '2018-04-15', '2018-07-15', '9:15 AM', 150),
(39, 13, 10, 2, '2018-04-15', '2018-07-15', '11:45 AM', 150),
(40, 1, 10, 1, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(41, 5, 10, 2, '2018-04-15', '2018-06-15', '6:30 PM', 150),
(42, 4, 11, 2, '2018-04-15', '2019-04-15', '8:30 AM', 150),
(43, 4, 11, 2, '2018-04-15', '2018-07-15', '11:00 AM', 150),
(44, 1, 11, 1, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(45, 4, 11, 2, '2018-04-15', '2018-07-15', '6:00 PM', 150),
(46, 4, 11, 2, '2018-04-15', '2018-07-15', '9:30 PM', 150),
(47, 5, 12, 2, '2018-04-15', '2018-07-15', '9:00 AM', 150),
(48, 6, 12, 2, '2018-04-15', '2018-07-15', '12:00 PM', 150),
(49, 8, 12, 2, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(50, 5, 12, 2, '2018-04-15', '2018-07-15', '6:00 PM', 150),
(51, 1, 14, 1, '2018-04-15', '2018-07-15', '9:00 AM', 150),
(52, 3, 14, 1, '2018-04-15', '2018-07-15', '12:00 PM', 150),
(53, 1, 14, 1, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(54, 13, 14, 2, '2018-04-15', '2018-07-15', '6:30 PM', 150),
(55, 13, 14, 2, '2018-04-15', '2018-07-15', '9:45 PM', 150),
(56, 4, 15, 2, '2018-04-15', '2018-07-15', '8:45 AM', 150),
(57, 4, 15, 2, '2018-04-15', '2018-07-15', '11:30 AM', 150),
(58, 5, 15, 2, '2018-04-15', '2018-07-15', '3:00 PM', 150),
(59, 4, 15, 2, '2018-04-15', '2018-07-15', '6:15 PM', 150),
(60, 5, 15, 2, '2018-04-15', '2018-07-15', '9:45 PM', 150),
(61, 5, 16, 2, '2018-04-15', '2018-07-15', '8:00 AM', 150),
(62, 8, 16, 2, '2018-04-15', '2018-07-15', '12:30 PM', 150),
(63, 8, 16, 2, '2018-04-15', '2018-07-15', '9:20 PM', 150);

-- --------------------------------------------------------

--
-- Table structure for table `theatremaster`
--

CREATE TABLE `theatremaster` (
  `theatreid` int(4) NOT NULL auto_increment,
  `areaid` int(4) NOT NULL,
  `theatrename` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `website` varchar(30) default NULL,
  PRIMARY KEY  (`theatreid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `theatremaster`
--

INSERT INTO `theatremaster` (`theatreid`, `areaid`, `theatrename`, `address`, `mobileno`, `website`) VALUES
(1, 1, 'City Pulse', 'Raipur, 10 Acre', '9856321474', 'www.raipurcitypulse.com'),
(2, 2, 'City Gold ', '406,Golden complex,Bapunagar', '7723561290', 'www.bapuanagrcitygold.com'),
(3, 3, 'Big Cinemas', 'Shiromani Mall,Alkapuri', '9856104589', 'www.alkapuribigcinemas,com'),
(4, 4, 'INOX Cinema', 'Sector-26,Mandir Road', '8934622050', 'www.inox.com'),
(5, 5, 'Devi Cinema', 'CTM Circle ,CTM', '9988231043', 'www.devicinema.com'),
(6, 6, 'Miraj Cinema', 'Big Bazar Mall,raipur', '7832145735', 'www.mirajcinema.com'),
(7, 7, 'Shiv Climex', 'Riverfront Road,Ashram Road', '8942644213', 'www.shivcinema.com'),
(8, 12, 'O7 Miniplex', 'Ghandi Circle,Race Course Road', '8735870912', 'www.o7mini.com'),
(9, 1, 'Mira Cinema', ' Mani Nagar, Near BRTS Bus Stop, Bhairavnath Road, ', '079 2539 3450', 'www.miracinema,com'),
(10, 21, 'Big Cinemas', ' Level 2, Crystal Mall, Opp Rani Tower,Kalawad Road', '0281 398 9404', 'www.bigcinemas.com'),
(11, 29, 'Rajhans Cinemas ', ' 2nd Floor, Pavillion Mall, Nikol, New India Colony, Nikol', ' 092277 23234', 'www.rajhanscinemas.com'),
(12, 31, 'Cinepolis', ' Vastrapur', '079 4019 0510', 'www.cinepolis.com'),
(13, 28, 'Rajshivalay Multiplex', ' Vivekanand Wadi', '02692 247 047', 'www.rajshivalaycinemas.com'),
(14, 27, 'Gold Digital Cinema ', ' Gold Cinema, Opp. Dena Pariwar, Block A 2 3 and 4th Floor', ' 02692 245 633', 'www.goldDigitalcinemas.com'),
(15, 25, 'INOX Cinemas', ' 4th Floor, Crystal Mall, Airport Road', '080802 11111', 'www.inoxcinemas.com'),
(16, 24, 'Vaishali Cinema', ' Koparli Rd, Laddak, Selvas, Imran Nagar', '098244 18786', 'www.vaishalicinema.com'),
(17, 23, 'Carnival Cinemas', 'Survey No. 585, CM/11, Gunjan Road, GIDC', '093270 10231', 'www.carnivalcinema.com'),
(18, 22, 'Miraj Cinemas', ' Laxmi Nagar, Wadhwan', '02752 234 567', 'www.mirajcinemas.com'),
(19, 20, 'Girnar Cinema', ' Phulchhab Chowk', '0281 244 5776 ', 'www.girnarcinema.com'),
(20, 18, 'R World', ' Kasturba Road, Naval Nagar, Opp. Jai Hind Press', '080802 11111', 'www.rworld.com'),
(21, 17, 'Cosmoplex Cinema', 'Mota Mauva Road, Nr. Rangoli Park Restaurant, Kalawad Road', ' 0281 329 7244', 'www.cosmoplexcinemas.com'),
(22, 16, 'INOX VR Surat', '3rd Floor, VR Mall, Dumas Road, Magdalla', '0261 679 5100', 'www.inoxvrsurat.com'),
(23, 15, 'Rajhans Cinemas', 'Dumas Road, Opposite ISKCON Mall, Piplod', ' 0261 225 4696', 'www.rajhanscinemas.com'),
(24, 14, 'Valam Multiplex', 'B-12, Bombay Colony, Adarsh Society, Ram Nagar, Varachha', '080000 09311', 'www.valammultiplex.com'),
(25, 13, 'Cinepolis', 'Imperial Square Mall, Athava Gate', ' 070432 15167', 'www.cinepolis.com'),
(26, 11, 'Pratap Cinema', ' Nyay Mandir, Near Sursagar Lake', '085769 65448', 'www.pratapcinema.com'),
(27, 10, 'Aradhana Cinema', 'Pulbari Naka, Tilak Road, Opp. SSG Hospital, Salatwada, Karelibaug', '0265 242 6335', 'www.aradhanacinema.com'),
(28, 9, 'Rajhans Cinemas', 'ajhans Business Hub, 2nd floor, Opposite Raopura Tower, Vinoba Bhave Road, Harni Road', '0265 242 0042', 'www.rajhanscinema.com'),
(29, 1, 'Anupam Cinema', 'Anupam Cinema Road, Opposite Grain Market, Khokhra,', '079 2293 6699', 'www.anupam.com'),
(30, 7, 'City Gold Ahsrasm Road', 'Ashram Road, Near To Dena Bank', ' 079 6605 8392', 'www.citygold.com');

-- --------------------------------------------------------

--
-- Table structure for table `transctionlog`
--

CREATE TABLE `transctionlog` (
  `tlogid` int(4) NOT NULL,
  `userid` int(4) NOT NULL,
  `systemdateandtime` date NOT NULL,
  `transctiontype` varchar(1) NOT NULL,
  `transctionquery` varchar(100) NOT NULL,
  `previousvalue` varchar(100) NOT NULL,
  PRIMARY KEY  (`tlogid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transctionlog`
--


-- --------------------------------------------------------

--
-- Table structure for table `uploadmaster`
--

CREATE TABLE `uploadmaster` (
  `uploadid` int(10) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `coverimage` varchar(100) default NULL,
  `filename` varchar(1000) default NULL,
  `view` int(10) default NULL,
  `userid` int(4) default NULL,
  `movieid` int(4) default NULL,
  `liking` int(4) NOT NULL default '0',
  PRIMARY KEY  (`uploadid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `uploadmaster`
--

INSERT INTO `uploadmaster` (`uploadid`, `name`, `coverimage`, `filename`, `view`, `userid`, `movieid`, `liking`) VALUES
(1, 'Mundiyan', 'Baaghi short.jpg', 'Mundiyan.mp3', 0, 0, 4, 0),
(2, 'O Saathi', 'Baaghi short.jpg', 'OSaathi.mp3', 0, 0, 4, 0),
(3, ' Get Ready To Fight Again', 'Baaghi short.jpg', 'GetReadyToFightAgain.mp3', 0, 0, 4, 0),
(4, ' Soniye Dil Nayi ', 'Baaghi short.jpg', 'SoniyeDilNayi.mp3', 0, 0, 4, 0),
(5, 'Ek Do Teen ', 'Baaghi short.jpg', 'EkDoTeen.mp3', 0, 0, 4, 0),
(6, 'Lo Safar', 'Baaghi short.jpg', 'LoSafar.mp3', 0, 0, 4, 0),
(7, 'Khol De Par', 'hichki Short.jpg', '01-KholDePar-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(8, 'Madamji Go Easy', 'hichki Short.jpg', '02-MadamjiGoEasy-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(9, 'Oye Hichki', 'hichki Short.jpg', '03-OyeHichki-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(10, 'Soul Hichki', 'hichki Short.jpg', '04-SoulofHichki-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(11, 'Teri Dastaan', 'hichki Short.jpg', '06-TeriDastaan-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(12, 'Phir Kya Hai Gham', 'hichki Short.jpg', '07-PhirKyaHaiGham-MusicBadshah.Com.mp3', 0, 0, 5, 0),
(13, ' October - Theme ', 'October short.png', '01-October-Theme-DownloadMing.SE.mp3', 0, 0, 8, 0),
(14, 'Theher Ja', 'October short.png', '02-TheherJa-DownloadMing.SE.mp3', 0, 0, 8, 0),
(15, 'Manwaa', 'October short.png', '04-Manwaa-DownloadMing.SE.mp3', 0, 0, 8, 0),
(16, 'Chal', 'October short.png', '05-Chal-DownloadMing.SE.mp3', 0, 0, 8, 0),
(17, 'Sanu Ek Pal Chain', 'Raid Short.jpg', '01 - Sanu Ek Pal Chain - DownloadMing.SE.mp3', 0, 0, 13, 0),
(18, 'Nit Khair Manga', 'Raid Short.jpg', '02 - Nit Khair Manga - DownloadMing.SE.mp3', 0, 0, 13, 0),
(19, 'Jhuk Na Paunga', 'Raid Short.jpg', '03 - Jhuk Na Paunga - DownloadMing.SE.mp3', 0, 0, 13, 0),
(20, 'Black', 'Raid Short.jpg', '04 - Black - DownloadMing.SE.mp3', 0, 0, 13, 0),
(21, 'Happy Happy', 'blackmail short.jpg', '01-HappyHappy-DownloadMing.SE.mp3', 0, 0, 6, 0),
(22, 'Patola', 'blackmail short.jpg', '02-Patola-DownloadMing.SE.mp3', 0, 0, 6, 0),
(23, 'Badla', 'blackmail short.jpg', '03-Badla-DownloadMing.SE.mp3', 0, 0, 6, 0),
(24, 'Bewafa Beauty', 'blackmail short.jpg', '04-BewafaBeauty-DownloadMing.SE.mp3', 0, 0, 6, 0),
(25, 'Nidraan Diyaan', 'blackmail short.jpg', '05-NindaraanDiyaan-DownloadMing.SE.mp3', 0, 0, 6, 0),
(26, 'Sataasat', 'blackmail short.jpg', '06-Sataasat-DownloadMing.SE.mp3', 0, 0, 6, 0),
(27, 'Rampage Title Track', 'rampage short.jpg', 'Rampage-Soundtrack-Trailer-Theme-Song.mp3', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userid` int(4) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `cityid` int(4) NOT NULL,
  `pincode` int(11) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sque` varchar(50) NOT NULL,
  `sans` varchar(50) NOT NULL,
  `dateofjoin` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userid`, `name`, `dateofbirth`, `address1`, `address2`, `cityid`, `pincode`, `phoneno`, `mobileno`, `email`, `username`, `password`, `sque`, `sans`, `dateofjoin`, `gender`) VALUES
(1, 'zeel patel', '1979-03-01', 'isanpur', '', 1, 382443, '', '8347697079', 'zeelpatel280@gmail.com', 'zeel.patel', '1234', 'What is your pet name', 'dog', '2018-04-13', 'Male'),
(2, 'bhavya', '1999-06-13', 'anandview apartment', 'ahmedabad', 1, 0, '', '9978992279', 'patwa.bhavya@gmail.com', 'bhavya.patwa', '1234', 'What is your pet name', 'dog', '2018-04-13', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `visitorinquiry`
--

CREATE TABLE `visitorinquiry` (
  `inquiryid` int(4) NOT NULL auto_increment,
  `dateofinquiry` datetime NOT NULL,
  `name` varchar(20) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`inquiryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visitorinquiry`
--

INSERT INTO `visitorinquiry` (`inquiryid`, `dateofinquiry`, `name`, `contactno`, `subject`, `detail`, `email`) VALUES
(1, '2018-04-15 16:30:00', 'abcd', '25468596', 'sdsa', 'asdasd', 'a@b.c');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD CONSTRAINT `bookingdetails_ibfk_1` FOREIGN KEY (`showid`) REFERENCES `showdetail` (`showid`) ON DELETE CASCADE ON UPDATE CASCADE;
