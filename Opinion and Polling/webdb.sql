-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 04:36 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `upVoteCount` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `answer`, `upVoteCount`, `timeStamp`) VALUES
(1, 'Indian Space Research Organization.', 4, '2016-03-07 23:53:39'),
(2, 'HTML5, CSS3', 0, '2016-03-08 02:17:23'),
(3, 'Deepika Padukone', 1, '2016-03-08 02:17:23'),
(4, 'Priyanka Chopra', 1, '2016-03-08 02:17:23'),
(5, 'Kareena Kapoor', 1, '2016-03-08 02:17:23'),
(6, 'Digital security is bigest concern in IT industry.', 1, '2016-03-08 02:17:23'),
(8, 'Mobile computing, Machine learning, AI (artificial intelligence), M-commerce, cloud computing, intelligent computing and AI robotics are booming in computer science industry.', 0, '2016-03-08 02:17:23'),
(9, 'AI (Artificial Intelligence & Robotics): AI figuring out how to formalize human capabilities, which currently appear beyond the reach of computers and robots, then make computers and robots more efficient at it. Big website like Google, Facebbok and Quora already started to implement machine learning & AI on their platforms.', 0, '2016-03-08 02:17:23'),
(10, 'Robotics, artificial intelligence, human computer interaction...IT industry is obviously related to CS research but many technologies are not CS branches as such.', 0, '2016-03-08 02:17:23'),
(13, 'First, there are these amazing and really smart set of people you work with that help you learn so much, tasty food, pool tables in every building, multiple gyms with the best facilities, a volleyball court, a very interestingly designed campus (search for Googleplex Mountain View on Youtube and you''ll find some video) and to top it all there is a 4 lane full fledged bowling alley on campus.\r\n\r\nThen there are these amazing projects and features that people are working on that you feel: wow, I am witnessing the future being built. Plus even as a beginner you get to experience and use some of the latest features in Google products before they are public, which is kind of cool. But this is just the beginning.\r\n\r\nOne week with your team, and you start feeling guilty, as to how less contributing you are to the firm that is providing you with, what can be described as the probably the best experience of your life. But working at a firm this big, there is simply nothing you can do about it except learning the code base and systems as fast as you can. And then comes your manager/mentor/any random member form your team that reassures you that this is common with all newbies and that you need not feel any pressure. He makes you feel that they have faith in you. So not only you start working hard you learn to do it without pressure and sustain the motivation. This is truly awesome.', 0, '2016-03-08 02:17:23'),
(14, 'I started at Google on the 12th of May this year, so my answer here is based on what you might think of as the "Noogler experience".\r\n\r\nIt''s also worth noting that I am a Site Reliability Engineer. My job is to ensure things are robust, that they always work and we are never relying on hope to keep our services running. Other people in other parts of the business (and, indeed, other parts of the world) may have a different story to tell.', 1, '2016-03-08 02:17:23'),
(15, 'deepika padukone', 0, '2016-03-13 22:07:26'),
(16, 'Professor', 1, '2016-03-14 01:04:33'),
(17, 'Thanks', 0, '2016-03-14 02:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `answer_has_vote`
--

CREATE TABLE `answer_has_vote` (
  `ID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL,
  `votedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_has_vote`
--

INSERT INTO `answer_has_vote` (`ID`, `answerID`, `votedUserID`) VALUES
(1, 1, 3),
(2, 1, 6),
(3, 5, 1),
(4, 14, 1),
(5, 3, 1),
(6, 6, 1),
(7, 4, 1),
(8, 1, 1),
(9, 16, 18),
(10, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Name`) VALUES
(247, 'Afghanistan'),
(248, 'Albania'),
(249, 'Algeria'),
(250, 'American Samoa'),
(251, 'Andorra'),
(252, 'Angola'),
(253, 'Anguilla'),
(254, 'Antarctica'),
(255, 'Antigua and Barbuda'),
(256, 'Argentina'),
(257, 'Armenia'),
(258, 'Aruba'),
(259, 'Australia'),
(260, 'Austria'),
(261, 'Azerbaijan'),
(262, 'Bahamas'),
(263, 'Bahrain'),
(264, 'Bangladesh'),
(265, 'Barbados'),
(266, 'Belarus'),
(267, 'Belgium'),
(268, 'Belize'),
(269, 'Benin'),
(270, 'Bermuda'),
(271, 'Bhutan'),
(272, 'Bolivia'),
(273, 'Bosnia and Herzegovina'),
(274, 'Botswana'),
(275, 'Bouvet Island'),
(276, 'Brazil'),
(277, 'British Indian Ocean Territory'),
(278, 'Brunei Darussalam'),
(279, 'Bulgaria'),
(280, 'Burkina Faso'),
(281, 'Burundi'),
(282, 'Cambodia'),
(283, 'Cameroon'),
(284, 'Canada'),
(285, 'Cape Verde'),
(286, 'Cayman Islands'),
(287, 'Central African Republic'),
(288, 'Chad'),
(289, 'Chile'),
(290, 'China'),
(291, 'Christmas Island'),
(292, 'Cocos (Keeling) Islands'),
(293, 'Colombia'),
(294, 'Comoros'),
(295, 'Congo'),
(296, 'Cook Islands'),
(297, 'Costa Rica'),
(298, 'Croatia (Hrvatska)'),
(299, 'Cuba'),
(300, 'Cyprus'),
(301, 'Czech Republic'),
(302, 'Denmark'),
(303, 'Djibouti'),
(304, 'Dominica'),
(305, 'Dominican Republic'),
(306, 'East Timor'),
(307, 'Ecuador'),
(308, 'Egypt'),
(309, 'El Salvador'),
(310, 'Equatorial Guinea'),
(311, 'Eritrea'),
(312, 'Estonia'),
(313, 'Ethiopia'),
(314, 'Falkland Islands (Malvinas)'),
(315, 'Faroe Islands'),
(316, 'Fiji'),
(317, 'Finland'),
(318, 'France'),
(319, 'France, Metropolitan'),
(320, 'French Guiana'),
(321, 'French Polynesia'),
(322, 'French Southern Territories'),
(323, 'Gabon'),
(324, 'Gambia'),
(325, 'Georgia'),
(326, 'Germany'),
(327, 'Ghana'),
(328, 'Gibraltar'),
(329, 'Guernsey'),
(330, 'Greece'),
(331, 'Greenland'),
(332, 'Grenada'),
(333, 'Guadeloupe'),
(334, 'Guam'),
(335, 'Guatemala'),
(336, 'Guinea'),
(337, 'Guinea-Bissau'),
(338, 'Guyana'),
(339, 'Haiti'),
(340, 'Heard and Mc Donald Islands'),
(341, 'Honduras'),
(342, 'Hong Kong'),
(343, 'Hungary'),
(344, 'Iceland'),
(345, 'India'),
(346, 'Isle of Man'),
(347, 'Indonesia'),
(348, 'Iran (Islamic Republic of)'),
(349, 'Iraq'),
(350, 'Ireland'),
(351, 'Israel'),
(352, 'Italy'),
(353, 'Ivory Coast'),
(354, 'Jersey'),
(355, 'Jamaica'),
(356, 'Japan'),
(357, 'Jordan'),
(358, 'Kazakhstan'),
(359, 'Kenya'),
(360, 'Kiribati'),
(361, 'Korea, Democratic People''s Rep'),
(362, 'Korea, Republic of'),
(363, 'Kosovo'),
(364, 'Kuwait'),
(365, 'Kyrgyzstan'),
(366, 'Lao People''s Democratic Republ'),
(367, 'Latvia'),
(368, 'Lebanon'),
(369, 'Lesotho'),
(370, 'Liberia'),
(371, 'Libyan Arab Jamahiriya'),
(372, 'Liechtenstein'),
(373, 'Lithuania'),
(374, 'Luxembourg'),
(375, 'Macau'),
(376, 'Macedonia'),
(377, 'Madagascar'),
(378, 'Malawi'),
(379, 'Malaysia'),
(380, 'Maldives'),
(381, 'Mali'),
(382, 'Malta'),
(383, 'Marshall Islands'),
(384, 'Martinique'),
(385, 'Mauritania'),
(386, 'Mauritius'),
(387, 'Mayotte'),
(388, 'Mexico'),
(389, 'Micronesia, Federated States o'),
(390, 'Moldova, Republic of'),
(391, 'Monaco'),
(392, 'Mongolia'),
(393, 'Montenegro'),
(394, 'Montserrat'),
(395, 'Morocco'),
(396, 'Mozambique'),
(397, 'Myanmar'),
(398, 'Namibia'),
(399, 'Nauru'),
(400, 'Nepal'),
(401, 'Netherlands'),
(402, 'Netherlands Antilles'),
(403, 'New Caledonia'),
(404, 'New Zealand'),
(405, 'Nicaragua'),
(406, 'Niger'),
(407, 'Nigeria'),
(408, 'Niue'),
(409, 'Norfolk Island'),
(410, 'Northern Mariana Islands'),
(411, 'Norway'),
(412, 'Oman'),
(413, 'Pakistan'),
(414, 'Palau'),
(415, 'Palestine'),
(416, 'Panama'),
(417, 'Papua New Guinea'),
(418, 'Paraguay'),
(419, 'Peru'),
(420, 'Philippines'),
(421, 'Pitcairn'),
(422, 'Poland'),
(423, 'Portugal'),
(424, 'Puerto Rico'),
(425, 'Qatar'),
(426, 'Reunion'),
(427, 'Romania'),
(428, 'Russian Federation'),
(429, 'Rwanda'),
(430, 'Saint Kitts and Nevis'),
(431, 'Saint Lucia'),
(432, 'Saint Vincent and the Grenadin'),
(433, 'Samoa'),
(434, 'San Marino'),
(435, 'Sao Tome and Principe'),
(436, 'Saudi Arabia'),
(437, 'Senegal'),
(438, 'Serbia'),
(439, 'Seychelles'),
(440, 'Sierra Leone'),
(441, 'Singapore'),
(442, 'Slovakia'),
(443, 'Slovenia'),
(444, 'Solomon Islands'),
(445, 'Somalia'),
(446, 'South Africa'),
(447, 'South Georgia South Sandwich I'),
(448, 'Spain'),
(449, 'Sri Lanka'),
(450, 'St. Helena'),
(451, 'St. Pierre and Miquelon'),
(452, 'Sudan'),
(453, 'Suriname'),
(454, 'Svalbard and Jan Mayen Islands'),
(455, 'Swaziland'),
(456, 'Sweden'),
(457, 'Switzerland'),
(458, 'Syrian Arab Republic'),
(459, 'Taiwan'),
(460, 'Tajikistan'),
(461, 'Tanzania, United Republic of'),
(462, 'Thailand'),
(463, 'Togo'),
(464, 'Tokelau'),
(465, 'Tonga'),
(466, 'Trinidad and Tobago'),
(467, 'Tunisia'),
(468, 'Turkey'),
(469, 'Turkmenistan'),
(470, 'Turks and Caicos Islands'),
(471, 'Tuvalu'),
(472, 'Uganda'),
(473, 'Ukraine'),
(474, 'United Arab Emirates'),
(475, 'United Kingdom'),
(476, 'United States'),
(477, 'United States minor outlying i'),
(478, 'Uruguay'),
(479, 'Uzbekistan'),
(480, 'Vanuatu'),
(481, 'Vatican City State'),
(482, 'Venezuela'),
(483, 'Vietnam'),
(484, 'Virgin Islands (British)'),
(485, 'Virgin Islands (U.S.)'),
(486, 'Wallis and Futuna Islands'),
(487, 'Western Sahara'),
(488, 'Yemen'),
(489, 'Yugoslavia'),
(490, 'Zaire'),
(491, 'Zambia'),
(492, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `interestID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interestID`, `name`, `description`) VALUES
(1, 'Sports', NULL),
(2, 'Politics', NULL),
(3, 'Cricket', NULL),
(4, 'Football', NULL),
(5, 'Computer Science', NULL),
(6, 'Fashion', NULL),
(7, 'Bollywood', NULL),
(8, 'Hollywood', NULL),
(9, 'History', NULL),
(10, 'Technology', NULL),
(11, 'Places', NULL),
(12, 'India', NULL),
(13, 'Space', NULL),
(14, 'Aliens', NULL),
(15, 'Love', NULL),
(16, 'Relationships', NULL),
(17, 'Philosophy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `timeStamp`, `question`) VALUES
(1, '2016-03-07 23:00:44', 'Who is best actress of India?'),
(2, '2016-03-07 23:01:08', 'What is the full form of ISRO?'),
(3, '2016-03-07 23:02:26', 'What are currently the hottest topics of research in Computer Science?'),
(4, '2016-03-07 23:02:26', 'What is the best source to learn web programming?'),
(6, '2016-03-07 23:02:26', 'What is it like to work at Google?'),
(7, '2016-03-09 02:23:42', 'what is current status of education?'),
(8, '2016-03-09 02:45:46', 'How are you?'),
(9, '2016-03-14 01:03:54', 'Who is Naved'),
(10, '2016-03-14 03:00:49', 'What is meaning of my name?');

-- --------------------------------------------------------

--
-- Table structure for table `question_has_answer`
--

CREATE TABLE `question_has_answer` (
  `ID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_has_answer`
--

INSERT INTO `question_has_answer` (`ID`, `questionID`, `answerID`) VALUES
(1, 2, 1),
(2, 4, 2),
(3, 1, 3),
(4, 3, 10),
(5, 1, 4),
(6, 3, 8),
(7, 1, 5),
(8, 3, 6),
(9, 6, 13),
(10, 6, 14),
(11, 1, 15),
(12, 9, 16),
(13, 2, 16),
(14, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `question_has_interest`
--

CREATE TABLE `question_has_interest` (
  `ID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `interestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_has_interest`
--

INSERT INTO `question_has_interest` (`ID`, `questionID`, `interestID`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 1, 12),
(4, 2, 5),
(5, 2, 10),
(6, 2, 13),
(7, 2, 14),
(8, 3, 17),
(9, 4, 5),
(10, 4, 10),
(11, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sanswer`
--

CREATE TABLE `sanswer` (
  `surveyAnswerID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `votes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanswer`
--

INSERT INTO `sanswer` (`surveyAnswerID`, `description`, `timeStamp`, `votes`) VALUES
(1, 'Johhny Depp', '2016-03-08 00:55:06', 0),
(2, 'Leonardo DiCaaprio', '2016-03-08 00:55:06', 0),
(5, 'Tom Cruise', '2016-03-08 00:57:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `surveyID` int(11) NOT NULL,
  `sQuestion` varchar(1000) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`surveyID`, `sQuestion`, `timeStamp`, `timeOut`) VALUES
(1, 'Who is the best actor of 2015?', '2016-03-08 00:49:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_has_interest`
--

CREATE TABLE `survey_has_interest` (
  `ID` int(11) NOT NULL,
  `surveyID` int(11) NOT NULL,
  `interestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_has_interest`
--

INSERT INTO `survey_has_interest` (`ID`, `surveyID`, `interestID`) VALUES
(1, 1, 7),
(2, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `survey_has_sanswer`
--

CREATE TABLE `survey_has_sanswer` (
  `ID` int(11) NOT NULL,
  `surveyID` int(11) NOT NULL,
  `surveyanswerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_has_sanswer`
--

INSERT INTO `survey_has_sanswer` (`ID`, `surveyID`, `surveyanswerID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aboutMe` varchar(500) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `picURL` varchar(100) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT '#2381C8'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `password`, `create_time`, `aboutMe`, `birthday`, `firstName`, `lastName`, `picURL`, `country`, `age`, `gender`, `color`) VALUES
(1, 'mj2509', 'mparihar@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2016-03-03 23:15:18', 'Totally exhausted. No chance for recovery.', '1992-09-25', 'Manoj', 'Parihar', 'assets/Male.png', 'India', 0, 'Male', '#F99E29'),
(3, 'user1', 'user1@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2016-03-03 23:15:18', 'Status quo User 1.', '1992-09-25', 'Test', 'User1', 'assets/Female.png', 'Barbados', 0, 'Female', '#2381C8'),
(4, 'user2', 'user2@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2016-03-07 23:15:18', 'Status quo User 2.', '1990-09-25', 'Test', 'User2', 'jgqIuYLDAx2i04m/disney_characters_minnie_mouse.jpg', 'India', 30, 'Female', '#2381C8'),
(5, 'user3', 'user3@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2016-03-07 23:15:18', 'Status quo User 3.', '1995-09-25', 'Test', 'USer3', 'f5lkBXNVRuEe28n/Donald-Duck-310x310.jpg', 'India', 30, 'Male', '#2381C8'),
(6, 'user4', 'user4@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2016-03-07 23:15:18', 'Status quo User 4.', '1989-09-25', 'Test', 'USer4', 'assets/Male.png', 'USA', NULL, 'Female', '#2381C8'),
(17, NULL, 'mph@scu.edu', '7815696ecbf1c96e6894b779456d330e', '2016-03-12 03:44:45', NULL, '1992-03-01', 'Mahi', 'Mhatre', 'assets/Male.png', NULL, 24, 'Male', '#2381C8'),
(18, 'pooja', 'pgandhi3@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2016-03-14 00:59:17', 'Rock the life floor', '2016-03-01', 'Pooja', 'Gandhi', 'assets/Female.png', 'Antarctica', 0, 'Female', '#F99E29'),
(21, NULL, 'mah@scu.edu', '7815696ecbf1c96e6894b779456d330e', '2016-03-14 01:43:42', NULL, '1992-03-01', 'Mah', 'Mha', 'assets/Male.png', NULL, 24, 'Male', '#2381C8'),
(22, 'vicky', 'vpatel@scu.edu', '73dca64c99f334ec491d1ac414c9f343', '2016-03-14 02:56:24', 'I am fun loving person.', '1990-12-01', 'Vismit', 'Patel', 'iBRamvH7bGYuxI2/Bhaiya USA 20140802_074931.jpg', 'India', 25, 'Male', '#93C73F');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_answers`
--

CREATE TABLE `user_has_answers` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_answers`
--

INSERT INTO `user_has_answers` (`ID`, `userID`, `answerID`) VALUES
(1, 3, 1),
(2, 6, 2),
(3, 3, 3),
(4, 4, 4),
(5, 1, 6),
(6, 5, 13),
(7, 5, 10),
(8, 4, 14),
(9, 3, 8),
(10, 1, 9),
(11, 4, 5),
(12, 1, 15),
(13, 18, 16),
(14, 22, 16),
(15, 22, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_interests`
--

CREATE TABLE `user_has_interests` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `interestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_interests`
--

INSERT INTO `user_has_interests` (`ID`, `userID`, `interestID`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 1, 10),
(5, 1, 13),
(6, 1, 17),
(7, 3, 6),
(8, 3, 7),
(9, 3, 17),
(10, 3, 12),
(11, 3, 11),
(12, 4, 1),
(13, 4, 2),
(14, 4, 6),
(15, 4, 15),
(16, 4, 16),
(17, 4, 7),
(18, 5, 1),
(19, 5, 3),
(20, 5, 4),
(21, 5, 10),
(22, 5, 13),
(23, 5, 14),
(24, 6, 1),
(25, 6, 1),
(26, 6, 7),
(27, 6, 8),
(28, 6, 12),
(29, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_questions`
--

CREATE TABLE `user_has_questions` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_questions`
--

INSERT INTO `user_has_questions` (`ID`, `userID`, `questionID`) VALUES
(2, 1, 1),
(3, 1, 2),
(5, 4, 3),
(6, 6, 4),
(7, 5, 6),
(9, 1, 8),
(10, 5, 7),
(11, 18, 9),
(12, 22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_sanswer`
--

CREATE TABLE `user_has_sanswer` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `surveyanswerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_sanswer`
--

INSERT INTO `user_has_sanswer` (`ID`, `userID`, `surveyanswerID`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_survey`
--

CREATE TABLE `user_has_survey` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `surveyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_survey`
--

INSERT INTO `user_has_survey` (`ID`, `userID`, `surveyID`) VALUES
(1, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `answer_has_vote`
--
ALTER TABLE `answer_has_vote`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `voteAnswer` (`answerID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interestID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `question_has_answer`
--
ALTER TABLE `question_has_answer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QA` (`questionID`),
  ADD KEY `AQ` (`answerID`);

--
-- Indexes for table `question_has_interest`
--
ALTER TABLE `question_has_interest`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `quesInt` (`questionID`),
  ADD KEY `intQues` (`interestID`);

--
-- Indexes for table `sanswer`
--
ALTER TABLE `sanswer`
  ADD PRIMARY KEY (`surveyAnswerID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`surveyID`);

--
-- Indexes for table `survey_has_interest`
--
ALTER TABLE `survey_has_interest`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `intSAns` (`interestID`),
  ADD KEY `sAnsInt` (`surveyID`);

--
-- Indexes for table `survey_has_sanswer`
--
ALTER TABLE `survey_has_sanswer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `surAns` (`surveyID`),
  ADD KEY `ansSur` (`surveyanswerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID_UNIQUE` (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `user_has_answers`
--
ALTER TABLE `user_has_answers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userAns` (`userID`),
  ADD KEY `ansUser` (`answerID`);

--
-- Indexes for table `user_has_interests`
--
ALTER TABLE `user_has_interests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userInt` (`userID`),
  ADD KEY `intUser` (`interestID`);

--
-- Indexes for table `user_has_questions`
--
ALTER TABLE `user_has_questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userQues` (`userID`),
  ADD KEY `quesUser` (`questionID`);

--
-- Indexes for table `user_has_sanswer`
--
ALTER TABLE `user_has_sanswer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userSAnswer` (`userID`),
  ADD KEY `sAnswerUser` (`surveyanswerID`);

--
-- Indexes for table `user_has_survey`
--
ALTER TABLE `user_has_survey`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userSurvey` (`userID`),
  ADD KEY `surveyUser` (`surveyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `answer_has_vote`
--
ALTER TABLE `answer_has_vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `question_has_answer`
--
ALTER TABLE `question_has_answer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `question_has_interest`
--
ALTER TABLE `question_has_interest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sanswer`
--
ALTER TABLE `sanswer`
  MODIFY `surveyAnswerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `survey_has_interest`
--
ALTER TABLE `survey_has_interest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `survey_has_sanswer`
--
ALTER TABLE `survey_has_sanswer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_has_answers`
--
ALTER TABLE `user_has_answers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_has_interests`
--
ALTER TABLE `user_has_interests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_has_questions`
--
ALTER TABLE `user_has_questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_has_sanswer`
--
ALTER TABLE `user_has_sanswer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_has_survey`
--
ALTER TABLE `user_has_survey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_has_vote`
--
ALTER TABLE `answer_has_vote`
  ADD CONSTRAINT `voteAnswer` FOREIGN KEY (`answerID`) REFERENCES `answers` (`answerID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `question_has_answer`
--
ALTER TABLE `question_has_answer`
  ADD CONSTRAINT `AQ` FOREIGN KEY (`answerID`) REFERENCES `answers` (`answerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `QA` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `question_has_interest`
--
ALTER TABLE `question_has_interest`
  ADD CONSTRAINT `intQues` FOREIGN KEY (`interestID`) REFERENCES `interests` (`interestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `quesInt` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `survey_has_interest`
--
ALTER TABLE `survey_has_interest`
  ADD CONSTRAINT `intSAns` FOREIGN KEY (`interestID`) REFERENCES `interests` (`interestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sAnsInt` FOREIGN KEY (`surveyID`) REFERENCES `survey` (`surveyID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `survey_has_sanswer`
--
ALTER TABLE `survey_has_sanswer`
  ADD CONSTRAINT `ansSur` FOREIGN KEY (`surveyanswerID`) REFERENCES `sanswer` (`surveyAnswerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `surAns` FOREIGN KEY (`surveyID`) REFERENCES `survey` (`surveyID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_answers`
--
ALTER TABLE `user_has_answers`
  ADD CONSTRAINT `ansUser` FOREIGN KEY (`answerID`) REFERENCES `answers` (`answerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userAns` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_interests`
--
ALTER TABLE `user_has_interests`
  ADD CONSTRAINT `intUser` FOREIGN KEY (`interestID`) REFERENCES `interests` (`interestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userInt` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_questions`
--
ALTER TABLE `user_has_questions`
  ADD CONSTRAINT `quesUser` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userQues` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_sanswer`
--
ALTER TABLE `user_has_sanswer`
  ADD CONSTRAINT `sAnswerUser` FOREIGN KEY (`surveyanswerID`) REFERENCES `sanswer` (`surveyAnswerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userSAnswer` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_survey`
--
ALTER TABLE `user_has_survey`
  ADD CONSTRAINT `surveyUser` FOREIGN KEY (`surveyID`) REFERENCES `survey` (`surveyID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userSurvey` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
