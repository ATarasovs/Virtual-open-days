-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 05 2018 г., 00:03
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `virtual_open_days`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
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
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventShortDescription`, `eventDescription`, `eventStartDate`, `eventStartTime`, `isStarted`, `isFinished`, `eventImage`, `eventVideo`, `eventLead`, `locationId`) VALUES
(1, 'First event', '<p><span style=\"background-color: rgb(255, 255, 255);\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '08/03/2018', '09:00', 'true', 'true', 'Firstevent.jpg', 'OtJHX7O3p5U', 'Dr Craig Ramsay', 4),
(2, 'Second event', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '06/03/2018', '08:15', 'true', 'false', 'Secondevent.jpg', '76HtGVE7bL4', 'Dr Craig Ramsay', 2),
(3, 'event 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas \r\naccumsan eleifend augue. Quisque ut ullamcorper mi, at mollis elit. \r\nPraesent sit amet blandit lacus, eget posuere mi. Sed eu quam ornare, \r\ncongue magna non, congue turpis. Maecenas convallis erat sed sem \r\ndignissim, gravida vestibulum nulla varius. Proin consequat et est \r\nconvallis fermentum. Pellentesque laoreet cursus dui, id mollis nibh \r\nconvallis sed. Sed ornare hendrerit ipsum, vel eleifend sapien placerat \r\nnon. In egestas tortor id sapien commodo, vel dapibus nisi iaculis. \r\nAliquam commodo lorem tortor, nec scelerisque odio sollicitudin at.\r\n</p>\r\n<p>\r\nMorbi at congue metus. Phasellus tristique ex sed facilisis rutrum. \r\nVivamus imperdiet semper dolor vel pulvinar. Duis sit amet scelerisque \r\nlacus, ut egestas velit. Maecenas ornare, ligula eu elementum pulvinar, \r\nneque ex aliquam nunc, nec porttitor justo lectus cursus lacus. Morbi \r\naugue velit, accumsan ac commodo sed, ultricies id quam. Donec \r\nscelerisque est ac mattis vestibulum. Aliquam lacus leo, volutpat ut \r\ncommodo sit amet, ullamcorper ac diam. Maecenas dui lorem, consectetur \r\nnon purus et, sodales rhoncus massa. Fusce dui ligula, malesuada nec \r\naliquam a, sollicitudin id ante. Vivamus blandit a libero ac lobortis.\r\n</p>\r\n<p>\r\nDonec et elementum est, eget faucibus ex. Vivamus bibendum tellus id \r\nlibero venenatis, eu molestie nunc molestie. In mattis nibh magna, vel \r\npharetra leo imperdiet quis. Maecenas cursus, ipsum ac vestibulum \r\nlobortis, orci velit fringilla enim, sit amet lacinia felis leo ut \r\nsapien. Nam pulvinar, ex sit amet porttitor iaculis, elit velit \r\nconvallis lorem, et suscipit diam arcu sed urna. Phasellus luctus ac \r\nlacus a volutpat. Aliquam tincidunt pharetra metus, id condimentum dolor\r\n dictum ut. Pellentesque vitae vehicula justo, id elementum nulla. Fusce\r\n vitae ex facilisis, maximus orci ut, iaculis lorem. Sed ultricies vitae\r\n lorem sed placerat. Vestibulum ante ipsum primis in faucibus orci \r\nluctus et ultrices posuere cubilia Curae; Vestibulum luctus lorem sit \r\namet sodales vehicula. Ut molestie dui dolor, in gravida massa tempor \r\nat. Integer a fringilla elit, at auctor ante. Donec vestibulum, mauris \r\nin finibus fermentum, nisi nibh condimentum ipsum, id ultrices lectus \r\nipsum eu dolor.\r\n</p>', '16/03/2018', '09:00', 'true', 'true', 'event3.jpg', '', 'Dr Ian Murray', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `informationId` int(11) NOT NULL,
  `informationTitle` varchar(1000) DEFAULT NULL,
  `informationDescription` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `information`
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
-- Структура таблицы `locations`
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
-- Дамп данных таблицы `locations`
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
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `mediaId` int(6) NOT NULL,
  `mediaPath` varchar(100) DEFAULT NULL,
  `mediaType` varchar(100) DEFAULT NULL,
  `locationId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`mediaId`, `mediaPath`, `mediaType`, `locationId`) VALUES
(3, '6G9Q8fYY2Y.jpg', 'photo', 2),
(5, '0SQhl4wJxz.jpg', 'photo', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
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
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `login`, `author`, `message`, `time`, `eventId`) VALUES
(88, 'aleks', 'Aleksandr Tarasov', 'Hello from user', '2018-02-27 11:22:39', 2),
(89, 'aleks', 'Aleksandr Tarasov', ':)', '2018-02-27 11:22:55', 2),
(92, 'aleks', 'Aleksandr Tarasov', 'jhkhh', '2018-02-27 11:54:10', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `participants`
--

CREATE TABLE `participants` (
  `participantId` int(6) NOT NULL,
  `userId` int(6) NOT NULL,
  `eventId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `participants`
--

INSERT INTO `participants` (`participantId`, `userId`, `eventId`) VALUES
(10, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
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
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `salt`, `realPassword`, `firstName`, `lastName`, `email`, `phone`, `country`, `city`, `position`, `birthday`, `isAdmin`, `isConfirmed`, `joinDate`, `userImage`) VALUES
(2, 'admin', '7d2e68b252af2ad419edc76d926670a2', '5a9c44e68547f0.94604425', NULL, 'Admin', 'Admin', 'admin@admin.com', '2223432', 'Latvia', 'Riga', 'Student', '12/09/1995', 'true', 'true', '0000-00-00 00:00:00', 'admin.png'),
(3, 'aleks', '5e0627333e125669e73c074c8f3ae688', '5a33a1d57cbb88.80623815', NULL, 'Aleksandr', 'Tarasov', '', '', '', '', '', '', 'false', NULL, '0000-00-00 00:00:00', NULL),
(4, 'test', '251c2b7c63a6fe476c0796716b278980', '5a33c13c34b035.66113024', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL),
(5, 'test2', '6b30fb646a375fac22ca6dbe98fc0213', '5a33c14c3ea492.96259257', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL),
(6, 'admin2', '5e0627333e125669e73c074c8f3ae688', '5a33a1d57cbb88.80623815', NULL, 'klskfk', 'dfkdlfk', 'kldfkldkf@eamil.com', '', 'ddkfldf', '', '', 'dlkfldkf', 'true', NULL, '0000-00-00 00:00:00', NULL),
(7, 'lskdlfk', '73bf1b3071b8d0e915d5f20d1f6f574c', '5a33c2f7c70636.89373174', NULL, 'lkdflkdflk', 'kfdlkldfkl', 'lkfdlkfdk', '', 'lklkfdlkf', '', '', 'kldlkdflk', NULL, NULL, '0000-00-00 00:00:00', NULL),
(9, '', 'fbac937e4f4c6863e937f406e0a7d686', '5a70f27c4364f3.82723435', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL),
(10, '', '1c2d64ecaaf88144dbcdb248f29db16f', '5a70f299345319.24513247', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '2018-01-30 00:00:00', NULL),
(11, '', '03e1967e9747171426cde6563b67d26a', '5a70f2d08b20a0.21171196', NULL, '', '', '', '', '', '', '', '', 'true', 'true', '2018-01-30 00:00:00', NULL),
(12, '', 'e748f87e14e26755c3ed62e5994ad6c6', '5a70f2e5e66a21.42526689', NULL, '', '', '', '', '', '', '', '', 'true', 'true', '2018-01-30 00:00:00', NULL),
(13, '', '2e55d1c7c20bc05e4ecdc94b5b10ca04', '5a70f373d0a604.39485957', NULL, '', '', '', '', '', '', '', '', 'true', 'true', '2018-01-30 00:00:00', NULL),
(14, '', 'b0103d5f4b6ef57241d2240977c84441', '5a70f4ec928691.01865791', NULL, 'pokgpofdkfpokdpfop', 'pokopdgkofpkdo', 'pgkopkfdopk', 'pokfpockfopdk', 'opkfopdkfopdkfok', '', 'pfopckodkop', 'dfdfdfdf', 'true', 'true', '2018-01-30 00:00:00', NULL),
(15, '', '9b9d9156578d3e2d7e2634f9b530ff0a', '5a70f5c764f2e3.11252654', NULL, '', '', '', '', '', NULL, '', '', 'true', 'true', '2018-01-30 00:00:00', NULL),
(16, '', '1683c84dacd809df23e4fe2502b48d6c', '5a70f71125f0e9.54868314', NULL, 'fgfgfg', 'fgfgfg', 'fgfgfg', 'fgfgfg', 'fgfgfg', NULL, 'fgfgfgfg', 'fgfgfgfg', 'true', 'true', '2018-01-30 00:00:00', NULL),
(17, '', 'b4a4ce3f6691e973081e7c22486e70ab', '5a70f8695a1be8.99043567', NULL, ';lk;dlk;flkd;lk', ';lk;dglkd;lkgfl;k', ';lkdf;k;ldfk;lk', ';lgfl;kgfkl;', 'klgkdl;kg;lk', NULL, ';lk;gf;lgfgfkl;', 'l;gkfl;kgfk', 'true', 'true', '2018-01-30 00:00:00', NULL),
(18, 'fgfgfgfg', '433c11922db21d7a3253a17313be8f55', '5a70f91e543976.75383213', NULL, '', '', '', '', '', NULL, '', '', 'true', 'true', '2018-01-31 00:00:00', NULL),
(19, 'dgffdgdfg', '6b62a2c3cc720d8e61125c328a9b9118', '5a70f99a3ebb75.13233811', NULL, '', '', '', '', '', NULL, '', '', 'true', 'true', '2018-01-31 00:00:00', NULL),
(20, 'ds;jsdkl', '836de68c3ca55241c6c5c649ebf74279', '5a70f9efa078b9.05155200', NULL, '', '', '', '', '', NULL, '', '', 'true', 'true', '2018-01-31 00:00:00', NULL),
(21, '', 'd8c46a0b2ce0e05c070a9407b0344ebe', '5a70fa4f6b6773.79361712', NULL, '', '', '', '', '', NULL, '', '', NULL, NULL, '2018-01-31 00:00:00', NULL),
(22, 'dfofdkjdfkj', 'a54158ad4a6c283cfc8b303768916cfe', '5a70fa6474f4b3.58160331', NULL, ';lk;gdlkfgl;kl;k', ';lkg;lkg;lfl;k', ';lkg;lfk;gl;', 'k;lkgd;lk;glkl;k', 'l;kggd;kg;lk', NULL, ';lkg;ldkg;lkfg;lk', ';lkgd;lkg;lkf;lk', NULL, NULL, '2018-01-31 00:00:00', NULL),
(23, 'dosfkfdfslkd', 'a94bbd90ba1d1562038c98443c3ea2f5', '5a70faeb40ed15.81210039', NULL, ';lkdlkflkdfkl', ';lkldkf;lkf;lfgk', 'lk;dlk;lkf;ldfk;l', 'k;lkdf;lkd;flk;lk', ';lkdl;kfl;kd;lk', NULL, ';lkfdl;k;flkdflk;', ';lkkl;dkf;lk', 'true', 'true', '2018-01-31 00:00:00', NULL),
(24, 'sdddklsfk;', 'f61e42649a5b74a6cbcf86e28aeae68b', '5a70fb4e6e2ab8.77335932', NULL, 'l;kf;kg;lfkl;k;', 'lk;ldkl;fkd;fk', 'kjdkjfkldj', 'kljlkjdgfkljklj', 'lkjdlkjfldjfklj', 'kljdlkcjflkjfdkljdfkjl', 'kjkljdlkjfdlkjfkl', 'jkljkljdfkdfjlkjlkdjlk', 'true', 'true', '2018-01-31 00:00:00', NULL),
(25, 'lllllll', '9a9c95bb92b7af79375e5f97dc468dc5', '5a70fbb90924e9.39258897', NULL, 'lllllll', 'llllllllllll', 'sldkdfkfdj@gmail.com', '238398903809', 'Latvia', 'Dundee', 'Staff', '12/09/1995', 'true', 'true', '2018-01-31 00:00:00', NULL),
(26, 'df', '43c6c17692496d528a883ec45986c738', '5a70fc35689772.83485607', NULL, 'Aleks', 'Tarasov', 'adkjdfj@dfldfk.ru', '2328382398', 'Latvia', 'Riga', 'Student', '12/09/1995', 'true', 'true', '2018-01-31 00:00:00', NULL),
(27, 'dsjkfdslkjs', '7bed65e5129c2e0947283288c12eb623', '5a72560c461854.38217303', NULL, 'kljkldjflkjdfklj', 'lkjdfklfjkldfjk', 'dsfgfdddf', 'fdgfddf', 'dfdffd', 'fdgdfdf', 'fdggfgdf', NULL, 'true', 'true', '2018-02-01 00:00:00', NULL),
(28, 'aaaaaaaa', '963ec868d89558ff1170edf2a2a804da', '5a725686136d34.33350716', NULL, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaa', NULL, 'true', 'true', '2018-02-01 00:00:00', NULL),
(29, 'bbbbbb', '2af8855a8d41e329d6d836c64e8136bd', '5a7257698c0955.59221214', NULL, 'bbbbbb', 'bbbbbb', 'bbbbbb', 'bbbbbb', 'bbbbbb', 'bbbbbb', 'bbbbbb', NULL, 'false', 'true', '2018-02-01 00:00:00', NULL),
(30, 'aleksandr', '079f42cfd8eeee4678e6b74501047ed0', '5a774ab7178be4.93577209', NULL, 'Aleksandr', 'Tarasov', 'a.tarasov1209@gmail.com', '7754337070', 'United Kingdom', 'Dundee', 'Student', NULL, 'true', 'true', '2018-02-04 00:00:00', NULL),
(38, 'admin3', '1b72ccddca9a4f07a5a402e4150d2534', '5a9724190ccb66.97835147', NULL, 'John', 'Snow', 'john.snow@gmail.com', '222333444555', 'United kingdom', 'Dundee', 'Staff', NULL, 'true', 'true', '2018-02-28 00:00:00', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `locationId` (`locationId`);

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`informationId`);

--
-- Индексы таблицы `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationId`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `fk_foreign_key_name_2` (`locationId`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key_name` (`eventId`);

--
-- Индексы таблицы `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participantId`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `userId` (`userId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `informationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT для таблицы `participants`
--
ALTER TABLE `participants`
  MODIFY `participantId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`);

--
-- Ограничения внешнего ключа таблицы `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_foreign_key_name_2` FOREIGN KEY (`locationId`) REFERENCES `locations` (`locationId`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`);

--
-- Ограничения внешнего ключа таблицы `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
