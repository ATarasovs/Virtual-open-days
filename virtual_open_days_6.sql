-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 11:01 AM
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
(1, 'Student Gender Mix', 'doughnut'),
(3, 'Student Gender Mix', 'doughnut');

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
(5, 'Male', '2478', 3),
(6, 'Female', '5267', 3),
(41, 'Male', '100', 1),
(42, 'Female', '200', 1);

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
(1, 'About Scotland', '<p class=\"story-body__introduction\" style=\"\"><b><img src=\"https://www.shaw-trust.org.uk/ShawTrustMediaLibraries/ShawTrust/ShawTrust/Images/Scotland.jpg?ext=.jpg\" style=\"margin-right: 10px;\" width=\"476\" height=\"264\" align=\"left\">Scotland </b>is a part of the United \r\nKingdom. Since 1999, when legislative powers were devolved to a reconstituted Scottish Parliament, it has enjoyed a high degree of \r\nautonomy.</p><p style=\"\">There are three distinct regions: the Highlands and \r\nIslands, a densely populated Central Belt, which includes the main \r\ncities of Edinburgh and Glasgow, and the Southern Uplands bordering \r\nEngland.</p><p style=\"\">The Outer Hebrides and the Inner Hebrides island groups \r\nlie to the west, with the Orkney Islands and Shetland Isles to the \r\nnorth. Once part of Norway, Shetland is nearer to that country than to \r\n&nbsp;&nbsp; Edinburgh, and retains a Norse character.</p><p style=\"\">English is spoken everywhere, and Gaelic speakers make up around 1.3% of\r\n the population, mainly &nbsp;&nbsp; in the northwest and the Hebrides. The old \r\nlanguage of the south, Scots, sometimes described as a &nbsp;&nbsp; dialect of English, still heavily influences the usage of Scottish everyday speech.</p><p><br></p><p>During the 19th century, Scotland became an industrial powerhouse, \r\nwith mining, shipbuilding, heavy engineering and manufacturing supplying\r\n the needs of the expanding British Empire.</p><p><img src=\"https://cdn.cnn.com/cnnnext/dam/assets/170606121333-scotland---travel-destination---shutterstock-512226913.jpg\" style=\"margin-left: 10px;\" width=\"504\" height=\"283\" align=\"right\">These industries \r\ndeclined in the second half of the 20th century, and the modern Scottish\r\n economy was transformed with the discovery of North Sea oil deposits in\r\n 1966, and a rapid development of the service sector.</p><p>A referendum on Scottish independence was held in September 2014. \r\nFifty five percent of voters &nbsp;&nbsp; opted to remain as part of the United \r\nKingdom, while 45% favoured independence when asked the referendum \r\nquestion: \"Should Scotland be an independent country?\"</p><p>The referendum was the culmination of a long campaign by nationalists. </p><p>Pressure\r\n for increased autonomy during the 1970s and 1990s led to the passing of\r\n the Scotland Act in 1999 by the Labour government of Tony Blair, with \r\nScottish Secretary Donald Dewar as the architect of the legislation. </p><p>Following\r\n a referendum in 1997, a Scottish Parliament elected by a system of \r\nproportional representation was re-established in Edinburgh, with \r\nprimary lawmaking and limited tax-raising powers.</p><p>More information can be found on <a href=\"http://www.bbc.co.uk/news/world-europe-20718605\">http://www.bbc.co.uk/news/world-europe-20718605</a><br></p>'),
(2, 'About Dundee', NULL),
(3, 'About University', NULL),
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
(2, 'Library', 'Library Description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam. ', '-', '56.457909', '-2.980817', 'Library.jpeg'),
(3, 'School of Life Sciences', 'School of Life Sciences description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', 'School of Life Sciences', '56.457943', '-2.985822', 'SchoolofLifeSciences.jpg'),
(4, 'Institute of Sport Exercises', 'Institute of Sport Exercises description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', '-', '56.458869', '-2.984945', 'InstituteofSportExercises.jpg'),
(5, 'Tower Building', 'Tower Building description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis scelerisque tincidunt. Aenean eu eros sollicitudin odio sagittis hendrerit non id est. Suspendisse pharetra pulvinar orci eu aliquam.', '-', '56.457321', '-2.978448', 'TowerBuilding.jpg'),
(6, 'DUSA The Union', '<div class=\"et_pb_column et_pb_column_1_2  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough\">\r\n				\r\n				\r\n				<div class=\"et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_1\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\">\r\n					<p>Dundee University Students’ Association (DUSA) is #1 in Scotland\r\n for student experience. As the legal and charitable organisation for \r\nmatriculated students of the University of Dundee, we exist to promote \r\nand represent the interests of our members – the students of the \r\nUniversity. The Association aims to provide the highest level of social,\r\n recreational, advice and support services to all members irrespective \r\nof age, gender, background or beliefs.</p>\r\n<p>The Association aims to assist its members to enhance their experiences of being a university student and assist in gaining the</p>\r\n				</div>\r\n			</div> \r\n			</div> \r\n				\r\n				\r\n				<div class=\"et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_2\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\">\r\n					<p>highest possible quality of education by providing opportunities\r\n to volunteer and make valuable use of their free time to help benefit \r\nthemselves and others. The Association’s recreational facilities are \r\ndesigned to offer its members a wide variety of facilities in which to \r\nrelax and socialise. As a student-led organisation the Association aims \r\nto respond to the needs of its membership promptly and effectively and \r\nto openly welcome and encourage their contribution to the workings of \r\nthe Association.</p>\r\n				</div>\r\n			</div>', '<p>Dundee University Students’ Association (DUSA) is #1 in Scotland for \r\nstudent experience. As the legal and charitable organisation for \r\nmatriculated students of the University of Dundee, we exist to promote \r\nand represent the interests of our members – the students of the \r\nUniversity. The Association aims to provide the highest level of social,\r\n recreational, advice and support services to all members irrespective \r\nof age, gender, background or beliefs.</p>', '-', '56.457648', '-2.982095', 'DUSATheUnion.jpg');

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
(1, 'fqOtbQrUcX.jpg', 'photo', 1),
(7, 'LkAqulpYPl.jpg', 'photo', 2),
(10, 'TYsEM0Gyt1.jpeg', 'photo', 2),
(11, 'IjpogAfa9g.jpg', 'photo', 2),
(12, '7l4VXpLGp5.jpg', 'photo', 2),
(15, 'z42dfyjlfy.jpg', 'photo', 2),
(18, '4lssmyfuLk.jpg', 'photo', 2),
(19, 'ClzyQH4Jju.jpg', 'photo', 2),
(20, 'HC5EZO6YaY.jpg', 'photo', 2),
(21, 'hP180eNren.jpg', 'photo', 2),
(22, '9UVdeo2Q15.jpg', 'photo', 2),
(23, 'aAz7ZY3Lxf.jpg', 'photo', 2),
(24, 'OKxeHn4NQp.jpg', 'photo', 2),
(25, '3ia11hyCZM.jpg', 'photo', 2),
(26, 'XlZop7bIlV.jpg', 'photo', 2),
(27, 'ST5Hzodbhg.jpeg', 'photo', 2),
(34, 'RNMB76CBI1.jpg', 'photo', 5),
(35, 'pfzMmCP5Yc.png', 'photo', 5),
(40, 'GpiOeh4vlz.jpg', 'photo', 5),
(41, '8HKZETBsDE.jpg', 'photo', 5),
(42, 'F2cAR7jeTh.jpg', 'photo', 5),
(43, 'uRvS141G5z.png', 'photo', 5),
(44, '6MgRUN4DCz.png', 'photo', 2),
(46, 'o9GPo8aB1e.jpg', 'photo', 3),
(48, 'JyaWgf419v.jpg', 'photo', 1),
(49, '0gJwTuJbRK.jpg', 'panorama', 2),
(50, '5uTh5ywUsE.JPG', 'panorama', 1),
(51, 'kbDKmagzXS.JPG', 'panorama', 1),
(52, 'm49Pvuv7WZ.JPG', 'panorama', 1),
(53, 'slxwvJsF97.JPG', 'panorama', 1),
(54, 'jIaaarkefs.JPG', 'panorama', 1),
(55, 'Vo63JibiHn.JPG', 'panorama', 1),
(56, 'JO8pNUBgi5.JPG', 'panorama', 1),
(57, 'WiYvmCA4Yx.JPG', 'panorama', 1),
(58, 'A7uRyGIRDq.JPG', 'panorama', 1),
(59, 'm0VG0jJ9fs.JPG', 'panorama', 1),
(60, 'gvLJGS7XN5.JPG', 'panorama', 1),
(61, 'IVyWx3tK6q.JPG', 'panorama', 1),
(62, 'XnXfmIhYns.JPG', 'panorama', 1),
(63, 'a6mmixof0W.JPG', 'panorama', 1),
(64, 'j5mtJYQqfu.JPG', 'panorama', 1),
(65, '9OefUPhyc0.JPG', 'panorama', 1),
(66, 'apSuZbl1Sg.JPG', 'panorama', 1);

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
(12, 2, 1),
(13, 2, 2),
(14, 39, 2),
(15, 39, 3),
(16, 39, 1);

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
(44, 'frank123', 'acbe2e2ec6d85ceb61661f0c34a2f33f', '5ab05672305b38.44140010', 'sashariga', 'Frank', 'Lampard', 'franklamp@mail.com', '45211588752', 'Finland', 'Henselki', 'Applicant', '04/03/1994', 'false', 'false', '2018-03-20 00:00:00', NULL);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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
  MODIFY `locationId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participantId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
