-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 08:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_open_days`
--

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE `charts` (
  `id` int(6) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`id`, `title`, `type`) VALUES
(4, 'Total students - 10,660', 'doughnut'),
(5, 'International students - 2,489', 'doughnut'),
(6, 'Total faculty staff - 1,510', 'doughnut'),
(7, 'Student gender mix', 'doughnut');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(6) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `number` varchar(1000) NOT NULL,
  `chartId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `title`, `number`, `chartId`) VALUES
(3, 'PG students', '2132', 4),
(4, 'UG students', '8528', 4),
(5, 'PG students', '1469', 5),
(6, 'UG students', '1020', 5),
(7, 'International staff', '493', 6),
(8, 'Domestic staff', '1017', 6),
(11, 'Men', '3518', 7),
(12, 'Women', '7142', 7);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(6) NOT NULL,
  `eventName` varchar(500) NOT NULL,
  `eventShortDescription` varchar(5000) DEFAULT NULL,
  `eventDescription` longtext,
  `eventStartDate` varchar(200) DEFAULT NULL,
  `eventStartTime` varchar(200) DEFAULT NULL,
  `isStarted` varchar(10) DEFAULT NULL,
  `isFinished` varchar(10) DEFAULT NULL,
  `eventImage` varchar(200) DEFAULT NULL,
  `eventVideo` varchar(200) DEFAULT NULL,
  `eventLead` varchar(500) DEFAULT NULL,
  `locationId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventShortDescription`, `eventDescription`, `eventStartDate`, `eventStartTime`, `isStarted`, `isFinished`, `eventImage`, `eventVideo`, `eventLead`, `locationId`) VALUES
(1, 'First event', '<p><span style=\"background-color: rgb(255, 255, 255);\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '08/03/2018', '09:00', 'true', 'true', 'Firstevent.jpg', 'OtJHX7O3p5U', 'Dr Craig Ramsay', 4),
(2, 'Second event', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '06/03/2018', '08:15', 'true', 'false', 'Secondevent.jpg', '76HtGVE7bL4', 'Dr Craig Ramsay', 2),
(3, 'event 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '16/03/2018', '09:00', 'true', 'true', 'event3.jpg', '', 'Dr Ian Murray', 2);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `informationId` int(11) NOT NULL,
  `informationTitle` varchar(1000) DEFAULT NULL,
  `informationDescription` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`informationId`, `informationTitle`, `informationDescription`) VALUES
(1, 'About Scotland', '<p class=\"story-body__introduction\" style=\"\"><b><img src=\"https://www.shaw-trust.org.uk/ShawTrustMediaLibraries/ShawTrust/ShawTrust/Images/Scotland.jpg?ext=.jpg\" style=\"margin-right: 10px;\" width=\"476\" height=\"264\" align=\"left\">Scotland </b>is a part of the United \r\nKingdom. Since 1999, when legislative powers were devolved to a reconstituted Scottish Parliament, it has enjoyed a high degree of \r\nautonomy.</p><p style=\"\">There are three distinct regions: the Highlands and \r\nIslands, a densely populated Central Belt, which includes the main \r\ncities of Edinburgh and Glasgow, and the Southern Uplands bordering \r\nEngland.</p><p style=\"\">The Outer Hebrides and the Inner Hebrides island groups \r\nlie to the west, with the Orkney Islands and Shetland Isles to the \r\nnorth. Once part of Norway, Shetland is nearer to that country than to \r\n&nbsp;&nbsp; Edinburgh, and retains a Norse character.</p><p style=\"\">English is spoken everywhere, and Gaelic speakers make up around 1.3% of\r\n the population, mainly in the northwest and the Hebrides. The old \r\nlanguage of the south, Scots, sometimes described as a dialect of English, still heavily influences the usage of Scottish everyday speech.</p><p><br></p><p>During the 19th century, Scotland became an industrial powerhouse, \r\nwith mining, shipbuilding, heavy engineering and manufacturing supplying\r\n the needs of the expanding British Empire.</p><p><img src=\"https://cdn.cnn.com/cnnnext/dam/assets/170606121333-scotland---travel-destination---shutterstock-512226913.jpg\" style=\"margin-left: 10px;\" width=\"504\" height=\"283\" align=\"right\">These industries \r\ndeclined in the second half of the 20th century, and the modern Scottish\r\n economy was transformed with the discovery of North Sea oil deposits in\r\n 1966, and a rapid development of the service sector.</p><p>A referendum on Scottish independence was held in September 2014. \r\nFifty five percent of voters &nbsp;&nbsp; opted to remain as part of the United \r\nKingdom, while 45% favoured independence when asked the referendum \r\nquestion: \"Should Scotland be an independent country?\"</p><p>The referendum was the culmination of a long campaign by nationalists. </p><p>Pressure\r\n for increased autonomy during the 1970s and 1990s led to the passing of\r\n the Scotland Act in 1999 by the Labour government of Tony Blair, with \r\nScottish Secretary Donald Dewar as the architect of the legislation. </p><p>Following\r\n a referendum in 1997, a Scottish Parliament elected by a system of \r\nproportional representation was re-established in Edinburgh, with \r\nprimary lawmaking and limited tax-raising powers.</p><p>More information can be found on <a href=\"http://www.bbc.co.uk/news/world-europe-20718605\">http://www.bbc.co.uk/news/world-europe-20718605</a><br></p>'),
(2, 'About Dundee', '<p><br></p><p><img style=\"width: 902.5px;\" src=\"https://www.dundee.com/sites/all/themes/dundee/img/slider/slider-1.jpg\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span></p><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Dundee is a dynamic and multicultural city, with a real buzz about \r\nit.&nbsp; It\'s recently been described as \"Britain’s coolest little and we\'re excited about the many changes and developments currently taking place.</span><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"></span></p><p><span style=\"font-family: &quot;Verdana&quot;;\"><br></span><span style=\"font-family: &quot;Verdana&quot;;\"><br></span><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Dundee is Scotland\'s fourth largest city and has a population of \r\nabout 150,000.&nbsp; The people of Dundee are famously friendly and open, and\r\n the relatively small size and close-knit community make the city both \r\naffordable to live in and a safe place to be. </span></p><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span></p><p><span style=\"font-size: 24px;\">?Who we are?</span></p><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Dundee is in an idyllic location hugging the banks of the River Tay \r\nEstuary.&nbsp; Did you know that we have more hours of sunshine, the purest \r\nair quality and more green spaces than any other Scottish city?</span></p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">\r\n</span><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Situated on the east coast, we are at the heart of Scotland\'s road \r\nand rail network, putting spectacular scenery, skiing, mountain climbing\r\n and sailing within easy reach.</span></p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">\r\n</span><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Scotland\'s four main airports also make it easy (and affordable) to \r\nreach the main centres of the UK and Europe, and the new \r\nDundee-Amsterdam route opens up even more possibilities for travel.</span></p><p><span style=\"font-size: 24px;\"></span><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span><br></p><span style=\"font-family: &quot;Verdana&quot;;\"></span>'),
(3, 'About University', '<p style=\"line-height: 1.5;\"><br></p><p style=\"line-height: 1.5;\" align=\"center\"><img style=\"width: 247px;\" src=\"http://novosang.co.uk/sites/default/files/img/partners/university-of-dundee.png\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span></p><p style=\"line-height: 1.5;\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span></p><p style=\"line-height: 1.5;\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Our\r\n core mission at the University of Dundee is to transform lives, locally\r\n and globally, through the creation, sharing and application of \r\nknowledge.</span></p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">\r\n</span><p style=\"line-height: 1.5;\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">We are doing that in all sorts of ways. The teaching we offer forms \r\npart of a student experience that is consistently rated among the best \r\nin the UK, and is producing graduates who are ready to help solve \r\nreal-world problems and become future leaders across society.</span></p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">\r\n</span><p style=\"line-height: 1.5;\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">We carry out research that has a real impact on people’s lives, here \r\nin Scotland and around the world. We are focused on shaping the future \r\nthrough innovative design, promoting the sustainable use of global \r\nresources, and improving social, physical and cultural wellbeing.</span></p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">\r\n</span><p style=\"line-height: 1.5;\"><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Find out more about us through these pages or come and visit us to experience Dundee for yourself.</span></p><span style=\"font-family: &quot;Verdana&quot;;\">\r\n</span><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Professor Sir Pete Downes,</span><br><strong><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">Principal and Vice-Chancellor</span></strong></p><p><strong><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"></span></strong><br><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\">More information can be found on <a href=\"http://www.bbc.co.uk/news/world-europe-20718605\">http://www.bbc.co.uk/news/world-europe-20718605</a></span></p><span style=\"font-family: &quot;Verdana&quot;;\">\r\n\r\n\r\n\r\n\r\n\r\n						\r\n					\r\n					\r\n				</span>'),
(4, 'How to apply', NULL),
(5, 'Costs & Fundings', NULL),
(6, 'Accommodation', NULL),
(7, 'Entertainment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationId` int(6) NOT NULL,
  `locationName` varchar(100) DEFAULT NULL,
  `locationDescription` longtext,
  `locationShortDescription` varchar(1000) DEFAULT NULL,
  `locationDepartment` varchar(1000) DEFAULT NULL,
  `locationLatitude` varchar(20) DEFAULT NULL,
  `locationLongitude` varchar(20) DEFAULT NULL,
  `locationImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `locationName`, `locationDescription`, `locationShortDescription`, `locationDepartment`, `locationLatitude`, `locationLongitude`, `locationImage`) VALUES
(1, 'Queen Mother Building', '<p>\r\n	            In the late 1990s, the then Department of Applied Computing\r\n was housed in the MicroCentre and had expanded to include a renovated \r\nbuilding,  the Jam Factory (it had been originally built for making jam,\r\n and we decided to retain its name).  We were looking to expand our \r\nfacilities, particularly for our research into computer systems to \r\nsupport disabled people.  At that time, the demographics of increasing \r\nnumbers of older people were beginning to be recognised.  It was also \r\nclear to us that older people had different user characteristics than \r\nthe  \"disabled\" people for whom assistive technology had been \r\ntraditionally designed.\r\n</p>\r\n<p>\r\n	                 We therefore began to devise a research plan which \r\nfocused on the IT needs of older people.  The Queen Mother was Dundee \r\nUniversity\'s first Chancellor, and also was an older person with a very \r\nhigh profile. In addition we had developed strong links with Mary, \r\nDowager Countess of Strathmore from Glamis Castle, the Queen Mother\'s \r\nchildhood home. Through the good offices of the Countess, we were able \r\nto obtain permission to use the Queen Mother\'s name to promote our \r\nresearch.  Our planned new building was to be called the Queen Mother \r\nBuilding, and Mary Strathmore became our patron. Mary also donated the \r\nStrathmore Trophy for our annual competition for secondary school \r\nchildren interested in computing.\r\n</p>\r\n<p>\r\n	                 To support our research into computer support for \r\nolder people, and in keeping with our \"user centred\" approach, the plans\r\n for the new building included a <strong>user centre</strong> which \r\nprovided a base where groups of older people could work with computers \r\nand help us with our research.  We had also been developing methods of \r\nusing theatrical performances in our research, both to help with <strong>raising awareness</strong> of the challenges older people had with modern technology and also to assist with the <strong>requirements gathering </strong>stages of developing new technology. The new building was thus designed to include a fully functioning <strong>studio theatre</strong>\r\n (the Wolfson Theatre - named after the trust which provided the funding\r\n for it). We believe that Computing at the University of Dundee is \r\nunique in the world in having these facilities.\r\n</p>\r\n<p>\r\n	                 All of the groups who were going to use the building -\r\n academic, research and support staff, and undergraduate and research \r\nstudents - met with  architects Page\\Park to discuss how it should look \r\nand operate.  There was universal support for a building which did not \r\nlook like a computer building (\"it should not look geeky\"), and the idea\r\n of avoiding straight lines was discussed, as was the potential \r\nenvironmental impact of the building.  On the basis of these \r\ndiscussions, Karen Pickering from Page\\Park produced the innovative \r\ndesign which is now the home of Computing at the University of Dundee.  \r\nThis gave us a beautiful building with an exciting exterior, and an \r\ninternal design of which encouraged interaction between users. It is \r\nheated by waste heat from the University\'s combined heat and power \r\nsystem and is naturally cooled.\r\n</p>\r\n<p>\r\n	 <img alt=\"QMB opening\" style=\"width: 300px; float: right; margin: 0px 0px 10px 10px;\" src=\"https://www.computing.dundee.ac.uk/system/redactor_assets/pictures/62/82cca937-108d-4004-8810-c1ad61074178.jpg\">\r\n</p>\r\n<p>\r\n	             The QMB is very successful new building and some of its \r\ndesign features have been reflected in other nearby new builds on the \r\ncampus, such as the Dalhousie Building (which also followed our lead by \r\nbeing named after another previous Chancellor - Lord Dalhousie).\r\n</p>\r\n<p>\r\n	             The Queen Mother Building was officially opened on 3rd March 2006 by HRH Princess Anne.\r\n</p>\r\n<p>\r\n	  You can view:</p><ul><li><span style=\"color: rgb(0, 0, 255);\"><a href=\"http://staff.computing.dundee.ac.uk/irmurray/website/QMB-FlyThrough.mp4\" target=\"_blank\">a simulated 3-D flythrough of the architect\'s model of the building</a></span></li><li><span style=\"color: rgb(0, 0, 255);\"><br></span><span style=\"background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(0, 0, 255);\"><a href=\"http://staff.computing.dundee.ac.uk/irmurray/website/QMB-Timelapse.mp4\" target=\"_blank\">a timelapse video of the building under construction</a></span></span></li></ul>', 'In the late 1990s, the then Department of Applied Computing was housed \r\nin the MicroCentre and had expanded to include a renovated building,  \r\nthe Jam Factory (it had been originally built for making jam, and we \r\ndecided to retain its name).  We were looking to expand our facilities, \r\nparticularly for our research into computer systems to support disabled \r\npeople.  At that time, the demographics of increasing numbers of older \r\npeople were beginning to be recognised.  It was also clear to us that \r\nolder people had different user characteristics than the  \"disabled\" \r\npeople for whom assistive technology had been traditionally designed.\r\n<p></p>', 'School of Computing', '56.458594', '-2.982749', 'QueenMotherBuilding.jpg'),
(2, 'Library', 'Library Description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam. ', '-', '56.457909', '-2.980817', 'Library.jpg'),
(3, 'School of Life Sciences', 'School of Life Sciences description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', 'School of Life Sciences', '56.457943', '-2.985822', 'SchoolofLifeSciences.jpg'),
(4, 'Institute of Sport Exercises', 'Institute of Sport Exercises description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', '-', '56.458869', '-2.984945', 'InstituteofSportExercises.jpg'),
(5, 'Tower Building', 'Tower Building description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', '-', '56.457321', '-2.978448', 'TowerBuilding.jpg'),
(6, 'DUSA The Union', '<div class=\"et_pb_column et_pb_column_1_2  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough\">\r\n				\r\n				\r\n				<div class=\"et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_1\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\">\r\n					<p>Dundee University Students’ Association (DUSA) is #1 in Scotland\r\n for student experience. As the legal and charitable organisation for \r\nmatriculated students of the University of Dundee, we exist to promote \r\nand represent the interests of our members – the students of the \r\nUniversity. The Association aims to provide the highest level of social,\r\n recreational, advice and support services to all members irrespective \r\nof age, gender, background or beliefs.</p>\r\n<p>The Association aims to assist its members to enhance their experiences of being a university student and assist in gaining the</p>\r\n				</div>\r\n			</div> \r\n			</div> \r\n				\r\n				\r\n				<div class=\"et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_2\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\">\r\n					<p>highest possible quality of education by providing opportunities\r\n to volunteer and make valuable use of their free time to help benefit \r\nthemselves and others. The Association’s recreational facilities are \r\ndesigned to offer its members a wide variety of facilities in which to \r\nrelax and socialise. As a student-led organisation the Association aims \r\nto respond to the needs of its membership promptly and effectively and \r\nto openly welcome and encourage their contribution to the workings of \r\nthe Association.</p>\r\n				</div>\r\n			</div>', '<p>Dundee University Students’ Association (DUSA) is #1 in Scotland for \r\nstudent experience. As the legal and charitable organisation for \r\nmatriculated students of the University of Dundee, we exist to promote \r\nand represent the interests of our members – the students of the \r\nUniversity. The Association aims to provide the highest level of social,\r\n recreational, advice and support services to all members irrespective \r\nof age, gender, background or beliefs.</p>', '-', '56.457648', '-2.982095', 'DUSATheUnion.jpg'),
(7, 'Dalhousie', '<p></p><p>This designated teaching facility accommodates up to 2500 in an \r\ninteresting array of lecture theatres, IT suites and general teaching \r\nspaces.&nbsp; Our seminar rooms are fully equipped with a full range of audio\r\n visual presentation equipment.</p><p>With an impressive entrance and double height glazed foyer, the \r\nDalhousie building offers unique exhibition and hospitality space, \r\ncombining functionality with sharp state-of-the-art design.</p>\r\n<p>Our contemporary venue offers flexible high quality rooms for small \r\nmeetings or an ideal space for both private and public sector \r\nconferences, and seminars throughout the year but particularly April – \r\nSeptember.</p><br><b>Dalhousie building capacity</b><br><p></p><p></p><table class=\"table table-bordered\"><tbody><tr><td>Lecture Theatre 1 Tiered</td><td>120<br></td></tr><tr><td>Lecture Theatre 2 Tiered</td><td>120<br></td></tr><tr><td>Lecture Theatre 3 Tiered</td><td>350<br></td></tr><tr><td>Lecture Theatre 4 Tiered</td><td>196<br></td></tr><tr><td>Large Rooms x 14</td><td>60<br></td></tr><tr><td>Medium Rooms x 6</td><td>40<br></td></tr><tr><td>Small Rooms x 5</td><td>25<br></td></tr><tr><td>Small Rooms x 4<br></td><td>20<br></td></tr></tbody></table>', '<p>This designated teaching facility accommodates up to 2500 in an \r\ninteresting array of lecture theatres, IT suites and general teaching \r\nspaces.&nbsp; Our seminar rooms are fully equipped with a full range of audio\r\n visual presentation equipment.<br><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"></span></p><p><span style=\"font-family: &quot;Verdana&quot;; font-size: 18px;\"><br></span></p>', '-', '56.459438', '-2.982198', 'Dalhousie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int(6) NOT NULL,
  `mediaPath` varchar(100) DEFAULT NULL,
  `mediaType` varchar(100) DEFAULT NULL,
  `locationId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `mediaPath`, `mediaType`, `locationId`) VALUES
(67, 'vw5Zlym0g7.jpg', 'photo', 1),
(68, '5mXTxufFCk.jpg', 'photo', 1),
(69, '5xXr7nKddu.jpg', 'photo', 1),
(70, 'LbB5I7JrWO.jpg', 'photo', 1),
(71, '6pM9ii67Bd.jpg', 'photo', 1),
(72, 'b8SWPkBhuk.jpg', 'photo', 1),
(73, 'aUZ5XqlbhB.jpg', 'photo', 1),
(74, 'X6Z6ompH85.jpg', 'photo', 1),
(87, 'rFVhEnQ2x2.JPG', 'panorama', 1),
(88, 'WMtWHNFwZE.JPG', 'panorama', 1),
(89, '422RndHGZ0.JPG', 'panorama', 1),
(90, 'IpNS0dhnlq.JPG', 'panorama', 1),
(91, '5Ko2nJ0wWG.JPG', 'panorama', 1),
(92, 'ar5DlsSoIk.JPG', 'panorama', 1),
(93, 'GwiU1yTMss.JPG', 'panorama', 1),
(94, 'jc9oiOx61T.JPG', 'panorama', 1),
(95, 'kjcTJvQGKA.JPG', 'panorama', 1),
(96, 'oA3JSAmeBk.JPG', 'panorama', 1),
(97, 'AeJTZPeRno.JPG', 'panorama', 1),
(98, 'h98bx4rQOj.JPG', 'panorama', 1),
(99, 'YawvzhRNpa.JPG', 'panorama', 1),
(100, 'Ve60JR2Hfl.JPG', 'panorama', 1),
(101, 'ZksDaM8Ybg.JPG', 'panorama', 1),
(102, 'iSD4oM5UZu.JPG', 'panorama', 1),
(104, '8IwEMG1DkK.jpg', 'photo', 2),
(105, '1v4sfBA1gZ.jpg', 'photo', 2),
(107, 'BdHRyHgzkY.jpg', 'photo', 2),
(108, '3HISGpUf3k.jpg', 'photo', 2),
(109, 'twAl0l3Au1.jpg', 'photo', 2),
(112, 'jTXC5014ao.JPG', 'panorama', 2),
(113, '5eSrreJAOj.JPG', 'panorama', 2),
(114, 'VLmeZtrA17.JPG', 'panorama', 2),
(115, 'QOOwjXNvJD.JPG', 'panorama', 2),
(116, 'tk2a7ZDDmC.JPG', 'panorama', 2),
(117, 'mWGdzGgJBk.JPG', 'panorama', 2),
(118, 'A4d4ZvhcMT.JPG', 'panorama', 2),
(119, 'm8O29lCxob.JPG', 'panorama', 2),
(120, 'bZBoVq5WCW.JPG', 'panorama', 2),
(121, '2kY3I0Cuwk.JPG', 'panorama', 2),
(122, 'h0Fh44u8XI.JPG', 'panorama', 2),
(123, 'FfTwTHvg1P.jpg', 'photo', 5),
(124, 's14vBRD7V1.jpg', 'photo', 5),
(126, 'nNNUNQynOt.jpg', 'photo', 5),
(127, 'eDXV7Wm3bP.jpg', 'photo', 5),
(128, 'xAGny7SgVp.jpg', 'photo', 5),
(129, 'hVS4CjWIc4.jpg', 'photo', 5),
(131, 'eJ8NVHP88l.JPG', 'panorama', 5),
(132, 'MRbXJcsUak.JPG', 'panorama', 5),
(133, '1TvTpzsuc9.JPG', 'panorama', 5),
(134, 'qsoIWAYQHN.JPG', 'panorama', 5),
(135, 'OEoLAx1b1u.JPG', 'panorama', 5),
(136, 'c9VPUywkAl.JPG', 'panorama', 5),
(137, 'vuJOhuZpaZ.JPG', 'panorama', 5),
(139, 'kaAfEmngzw.JPG', 'panorama', 5),
(140, 'KSpRrrOuml.JPG', 'panorama', 5),
(141, 'Ku2NNrVIgC.JPG', 'panorama', 5),
(142, 'RYAR2iqH7t.JPG', 'panorama', 5),
(144, '6qG8Wd7GrV.jpg', 'photo', 4),
(154, 'EB8ZTfLa9N.jpg', 'photo', 4),
(156, 'sqjEQ4Kih6.jpg', 'photo', 4),
(157, 'vW1LK6xbqt.jpg', 'photo', 4),
(158, 'SGjp5G415t.jpg', 'photo', 4),
(160, 'O8AP4r7p5g.JPG', 'panorama', 4),
(161, 'VmuQu3uhaw.JPG', 'panorama', 4),
(162, 'Wzd6qfwiko.JPG', 'panorama', 4),
(163, 'waDCya55DS.JPG', 'panorama', 4),
(164, 'TvI6EkVINN.JPG', 'panorama', 4),
(166, 'L34krnk9el.JPG', 'panorama', 4),
(178, 'Bgfxj13YRk.jpg', 'photo', 3),
(179, 'zzAAEiZxN9.jpg', 'photo', 3),
(182, 'XlGl2m54ez.jpg', 'photo', 3),
(188, '8PrqqIl3un.jpg', 'photo', 3),
(189, 'hVBxBBaTVt.jpg', 'photo', 3),
(191, '3TN7RdfD8c.JPG', 'panorama', 3),
(193, '8okUqFBzgI.JPG', 'panorama', 3),
(194, 'aAwb7hmDbB.JPG', 'panorama', 3),
(195, 'nDidWHA1f0.jpg', 'photo', 6),
(196, 'B16jSjpjke.jpg', 'photo', 6),
(197, 'NGteqyB41c.JPG', 'panorama', 6),
(198, 'BxizozrJWO.JPG', 'panorama', 6),
(199, 'Otx7tM8uCE.jpg', 'photo', 7),
(200, 'tGFsu6ARjr.jpg', 'photo', 7),
(201, 'YC2IYPRLjq.jpg', 'photo', 7),
(202, '8sk2bTh18w.jpg', 'photo', 7),
(203, 'uo0wPNax5v.jpg', 'photo', 7),
(206, 'EQ05x9G1TE.JPG', 'panorama', 7),
(207, 'iyW2LV1yCu.JPG', 'panorama', 7),
(208, 'BmWybfup7l.JPG', 'panorama', 7),
(209, 'cLEPi0vrJp.JPG', 'panorama', 7),
(210, 'rGYdkiLjkB.JPG', 'panorama', 7),
(211, 'nAE0svqypY.JPG', 'panorama', 7),
(212, 'zxqTK72h5E.JPG', 'panorama', 7),
(213, 'lqFeybimGu.JPG', 'panorama', 7),
(214, 'EhtZIIq3Zm.JPG', 'panorama', 7),
(215, 'MiPPQodva1.JPG', 'panorama', 7),
(216, '1Tov4ouhAl.JPG', 'panorama', 7),
(217, 'ZiBckqBC09.JPG', 'panorama', 7),
(218, '2FVwPoinU4.JPG', 'panorama', 7),
(219, 'kMaqzAqkQL.JPG', 'panorama', 7),
(220, '9Um6UNYyNV.JPG', 'panorama', 7),
(221, 'rOpY7TjQKV.JPG', 'panorama', 7),
(222, 'alerSlCrNp.JPG', 'panorama', 7),
(223, 'zn9SdCebeF.JPG', 'panorama', 7),
(224, 'jmg2JauUda.JPG', 'panorama', 7);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eventId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `login`, `author`, `message`, `time`, `eventId`) VALUES
(88, 'aleks', 'Aleksandr Tarasov', 'Hello from user', '2018-02-27 11:22:39', 2),
(89, 'aleks', 'Aleksandr Tarasov', ':)', '2018-02-27 11:22:55', 2),
(92, 'aleks', 'Aleksandr Tarasov', 'jhkhh', '2018-02-27 11:54:10', 1),
(93, 'admin', 'Admin Administrator', 'Hey', '2018-03-09 16:29:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participantId` int(6) NOT NULL,
  `userId` int(6) NOT NULL,
  `eventId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`participantId`, `userId`, `eventId`) VALUES
(11, 2, 3),
(14, 39, 2),
(15, 39, 3),
(16, 39, 1),
(18, 40, 1),
(19, 40, 3),
(20, 2, 2),
(21, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(6) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `realPassword` varchar(200) DEFAULT NULL,
  `firstName` varchar(128) DEFAULT NULL,
  `lastName` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `birthday` varchar(128) DEFAULT NULL,
  `isAdmin` varchar(10) DEFAULT NULL,
  `isConfirmed` varchar(10) DEFAULT NULL,
  `joinDate` timestamp NULL DEFAULT NULL,
  `userImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `salt`, `realPassword`, `firstName`, `lastName`, `email`, `phone`, `country`, `city`, `position`, `birthday`, `isAdmin`, `isConfirmed`, `joinDate`, `userImage`) VALUES
(2, 'admin', 'a532a3f4c1d721f86cb68302529c732b', '5ab0496e987093.40402976', 'sashariga', 'Admin', 'Administrator', 'admin@admin.com', '0756456731', 'United Kingdom', 'Dundee', 'Administrator', '12/09/1995', 'true', 'true', '0000-00-00 00:00:00', 'admin.png'),
(39, 'atarasovs', '7f3dcb78f0c1b66eefb0606cef851ade', '5a9d6843c38397.57217735', 'sashariga', 'Aleksandrs', 'Tarasovs', 'a.tarasov1209@gmail.com', '07563710331', 'Latvia', 'Riga', 'Student', '12/09/1995', 'false', 'false', '2018-03-05 00:00:00', 'atarasovs.png'),
(40, 'admin2', '3579f4017687526f67d9ef2b206b63a5', '5ab04b018acba4.64958516', 'sashariga', 'Jhon', 'Doe', 'jhondoe@yahoo.com', '45215246546541', 'Ukraine', 'Kiev', 'Lecturer', '06/09/2017', 'true', 'false', '2018-03-19 00:00:00', NULL),
(41, 'admin3', '62b896f4e7e79650f1add52492eea6ed', '5ab04a7f608d15.28439488', 'sashariga', 'Jake', 'Brown', 'jake123@mail.com', '454645464121156', 'Usa', 'New York', 'School Administrator', '11/03/2018', 'true', 'false', '2018-03-20 00:00:00', NULL),
(44, 'frank123', 'acbe2e2ec6d85ceb61661f0c34a2f33f', '5ab05672305b38.44140010', 'sashariga', 'Frank', 'Lampard', 'franklamp@mail.com', '45211588752', 'Finland', 'Henselki', 'Applicant', '04/03/1994', 'false', 'false', '2018-03-20 00:00:00', NULL),
(45, 'staffmember', '0ab3cf9a7fdf3c2c7ad1075b2bfc7961', '5abe7873c89ff9.31349762', 'admin123', 'Staff', 'Member', 'staff@dundee.ac.uk', '2309230', 'United kingdom', 'Dundee', 'Staff', '08/01/2018', 'true', 'true', '2018-03-29 23:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key_name4` (`chartId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `locationId` (`locationId`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`informationId`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `fk_foreign_key_name_2` (`locationId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key_name` (`eventId`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participantId`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `informationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participantId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `fk_foreign_key_name4` FOREIGN KEY (`chartId`) REFERENCES `charts` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_foreign_key_name_2` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
