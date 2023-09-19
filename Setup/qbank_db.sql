-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2023 at 10:46 AM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netc_qbank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cp_logs`
--

CREATE TABLE `cp_logs` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
  `logtime` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cp_papers`
--

CREATE TABLE `cp_papers` (
  `pp_id` int(11) NOT NULL,
  `cp_paper_id` int(20) DEFAULT NULL,
  `pp_paper_name` varchar(255) DEFAULT NULL,
  `pp_question_id` int(11) DEFAULT NULL,
  `pp_question_paper_date` varchar(255) DEFAULT NULL,
  `pp_question_paper_time` varchar(255) DEFAULT NULL,
  `pp_question_paper_exam_name` varchar(255) DEFAULT NULL,
  `pp_question_paper_subj_name` varchar(255) DEFAULT NULL,
  `pp_question_paper_grade` varchar(45) DEFAULT NULL,
  `pp_question_paper_note` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_papers`
--

INSERT INTO `cp_papers` (`pp_id`, `cp_paper_id`, `pp_paper_name`, `pp_question_id`, `pp_question_paper_date`, `pp_question_paper_time`, `pp_question_paper_exam_name`, `pp_question_paper_subj_name`, `pp_question_paper_grade`, `pp_question_paper_note`) VALUES
(12, 240511, 'MCQ01', NULL, '2019-02-17', '3 Hrs', 'GCE O/L 2018', 'ICT', 'Grade: 11', 0x41737761726520416c6c207175657374696f6e73);

-- --------------------------------------------------------

--
-- Table structure for table `cp_question`
--

CREATE TABLE `cp_question` (
  `que_id` int(11) NOT NULL,
  `que_subj_id` int(11) DEFAULT NULL,
  `que_unit_id` int(11) NOT NULL,
  `que_que_id` int(11) DEFAULT NULL,
  `que_short_description` varchar(255) DEFAULT NULL,
  `que_long_description` text DEFAULT NULL,
  `que_que_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_question`
--

INSERT INTO `cp_question` (`que_id`, `que_subj_id`, `que_unit_id`, `que_que_id`, `que_short_description`, `que_long_description`, `que_que_type`) VALUES
(34, 5515, 20, 5035, 'පිටු පහකින් යුත් document එකක් සදහා  page number හෝ date එකක් පිටුවේ පහලින් යොදා ගැනීමට  භාවිතා කරනුයේ?', '<p>පිටු පහකින් යුත් document එකක් සදහා&nbsp;&nbsp;page number හෝ&nbsp;date එකක් පිටුවේ පහලින් යොදා ගැනීමට&nbsp;&nbsp;භාවිතා කරනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Bottom margin</li>\r\n	<li>2.&nbsp;&nbsp;Top margin</li>\r\n	<li>3.&nbsp;&nbsp;Header</li>\r\n	<li>4.&nbsp;&nbsp;Footer</li>\r\n</ul>\r\n\r\n<p><a href=\"https://postimages.org/\" target=\"_blank\"><img alt=\"96\" src=\"https://i.postimg.cc/WdTky2M5/96.jpg\" /></a></p>\r\n', 'MCQ'),
(35, 5515, 20, 7354, 'Spelling and grammar නිවැරදි කිරීමට ඔබ යායුතු Tab එක වනුයේ?', '<p>Spelling and grammar නිවැරදි කිරීමට ඔබ යායුතු Tab එක වනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Review</li>\r\n	<li>2.&nbsp;&nbsp;File</li>\r\n	<li>3.&nbsp;&nbsp;Home</li>\r\n	<li>4.&nbsp;&nbsp;Insert</li>\r\n</ul>\r\n', 'Essay'),
(36, 5515, 20, 7011, 'මෙම document එකේ නම කුමක්ද?', '<p>මෙම&nbsp;document එකේ නම කුමක්ද?</p>\r\n\r\n<p><img src=\"http://exams.maxmind.lk/wp-content/uploads/2014/04/ribbon2.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Blank Document</li>\r\n	<li>2.&nbsp;&nbsp;Document 1</li>\r\n	<li>3.&nbsp;&nbsp;Microsoft Word</li>\r\n	<li>4.&nbsp;&nbsp;Nimal folder</li>\r\n</ul>\r\n', 'MCQ'),
(37, 5515, 20, 9365, '“CUT ” විධානය භාවිතයෙන් document එකට කුමක් කර හැකිද?', '<p>&ldquo;CUT &rdquo; විධානය භාවිතයෙන්&nbsp;document එකට කුමක් කර හැකිද?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;තෝරාගන්නා ලද text or graphics මක දැමීමට හැක.</li>\r\n	<li>2.&nbsp;&nbsp;screen එකේ බාගයක් පමණක් දිස්වේ.</li>\r\n	<li>3.&nbsp;&nbsp;මෘදුකාංගය ක්&zwj;රියාවිරහිත වේ.</li>\r\n	<li>4.&nbsp;&nbsp;සියලු පිළිතුරු වැරදිය.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'MCQ'),
(38, 5515, 20, 4057, 'වචනයක ප්‍රමාණය points 12 සිට points 18 දක්කවා වෙනස් කිරීමට ඔබ යොදාගන්න Tab එක වනුයේ?', '<p>වචනයක ප්&zwj;රමාණය&nbsp;points 12 සිට&nbsp;points 18 දක්කවා වෙනස් කිරීමට ඔබ යොදාගන්න Tab එක වනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Home</li>\r\n	<li>2.&nbsp;&nbsp;File</li>\r\n	<li>3.&nbsp;&nbsp;Insert</li>\r\n	<li>4.&nbsp;&nbsp;Page Layout</li>\r\n</ul>\r\n', 'MCQ'),
(39, 5515, 20, 6624, ' මෙම විධානය භාවිතයෙන් යම් වචනයක් italic කරගත හැක?', '<p><img alt=\"\" src=\"http://exams.maxmind.lk/wp-content/uploads/2014/04/bold7.png\" />&nbsp;මෙම විධානය භාවිතයෙන් යම් වචනයක් italic කරගත හැක?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;නිවැරදි</li>\r\n	<li>2.&nbsp;&nbsp;වැරදි</li>\r\n</ul>\r\n', 'MCQ'),
(40, 5515, 20, 1613, 'ඔබට යම් වචනයක් ඉතා සුලුලෙස දකුණු අතට නැවීමට, යොදාගන්න විධනය වනුයේ?', '<p>ඔබට යම් වචනයක් ඉතා සුලුලෙස දකුණු අතට නැවීමට, යොදාගන්න විධනය වනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Capitalizing</li>\r\n	<li>2.&nbsp;&nbsp;Boldface</li>\r\n	<li>3.&nbsp;&nbsp;Italics</li>\r\n	<li>4.&nbsp;&nbsp;Underlining</li>\r\n</ul>\r\n', 'MCQ'),
(41, 5515, 20, 5124, 'Copy සහ Past කිරීමට යොදාගන්න keyboard shortcut එක වනුයේ?', '<p>Copy සහ Past කිරීමට යොදාගන්න keyboard shortcut එක වනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Copy = CTRL + D / Past = CTRL + P</li>\r\n	<li>2.&nbsp;&nbsp;Copy = CTRL + V / Past = CTRL +C</li>\r\n	<li>3.&nbsp;&nbsp;Copy = CTRL + C / Past = CTRL + P</li>\r\n	<li>4.&nbsp;&nbsp;Copy = CTRL + C / Past = CTRL + V</li>\r\n</ul>\r\n', 'MCQ'),
(42, 5515, 20, 1002, '“MS Word” open කර ගන්නා නිවැරදි අකාරය වනුයේ?', '<p>&ldquo;MS Word&rdquo; open කර ගන්නා නිවැරදි අකාරය වනුයේ?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;Start &gt; Microsoft office &gt; Microsoft Word 2010</li>\r\n	<li>2.&nbsp;&nbsp;Start &gt; Microsoft Word 2010</li>\r\n	<li>3.&nbsp;&nbsp;Start &gt; All Programs &gt; Microsoft office &gt; Microsoft Word 2010</li>\r\n	<li>4.&nbsp;&nbsp;Start &gt; All Programs &gt; Microsoft &gt; Microsoft Word 2010</li>\r\n</ul>\r\n', 'MCQ'),
(43, 5515, 20, 3131, '“Times New Roman”, “Comic Sans”සහ  “Calibri” මේ නමින් හදුන්වයි?', '<p>&ldquo;Times New Roman&rdquo;, &ldquo;Comic Sans&rdquo;සහ&nbsp;&nbsp;&ldquo;Calibri&rdquo; මේ නමින් හදුන්වයි?</p>\r\n\r\n<ul>\r\n	<li>1.&nbsp;&nbsp;fonts</li>\r\n	<li>2.&nbsp;&nbsp;variations</li>\r\n	<li>3.&nbsp;&nbsp;font sizes</li>\r\n	<li>4.&nbsp;&nbsp;font colors</li>\r\n</ul>\r\n', 'MCQ');

-- --------------------------------------------------------

--
-- Table structure for table `cp_question_details`
--

CREATE TABLE `cp_question_details` (
  `id` int(12) NOT NULL,
  `que_d_paper_id` int(12) DEFAULT NULL,
  `que_d_subj_id` int(12) DEFAULT NULL,
  `que_d_unit_id` int(12) DEFAULT NULL,
  `que_d_question_id` int(12) DEFAULT NULL,
  `que_d_question_order` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_question_details`
--

INSERT INTO `cp_question_details` (`id`, `que_d_paper_id`, `que_d_subj_id`, `que_d_unit_id`, `que_d_question_id`, `que_d_question_order`) VALUES
(193, 240511, 5515, 20, 5035, '1'),
(195, 240511, 5515, 20, 7011, '3'),
(196, 240511, 5515, 20, 1002, '4'),
(198, 240511, 5515, 20, 9365, '4'),
(199, 240511, 5515, 20, 4057, '5'),
(200, 240511, 5515, 20, 6624, '6'),
(201, 240511, 5515, 20, 1613, '7'),
(202, 240511, 5515, 20, 5124, '8'),
(203, 240511, 5515, 20, 1002, '9'),
(204, 240511, 5515, 20, 3131, '10');

-- --------------------------------------------------------

--
-- Table structure for table `cp_settings`
--

CREATE TABLE `cp_settings` (
  `setting_id` int(11) NOT NULL,
  `showrecords` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_settings`
--

INSERT INTO `cp_settings` (`setting_id`, `showrecords`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `cp_subjects`
--

CREATE TABLE `cp_subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_sub_id` int(11) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_subjects`
--

INSERT INTO `cp_subjects` (`sub_id`, `sub_sub_id`, `sub_name`) VALUES
(20, 5515, 'ICT'),
(21, 6958, 'Science'),
(22, 6440, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `cp_units`
--

CREATE TABLE `cp_units` (
  `uni_id` int(11) NOT NULL,
  `uni_subj_id` int(11) DEFAULT NULL,
  `uni_uni_id` varchar(11) DEFAULT NULL,
  `uni_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_units`
--

INSERT INTO `cp_units` (`uni_id`, `uni_subj_id`, `uni_uni_id`, `uni_name`) VALUES
(20, 5515, '1', 'Unite 01'),
(21, 5515, '2', 'Unite 02'),
(22, 5515, 'U001N1001', 'New Unit 01');

-- --------------------------------------------------------

--
-- Table structure for table `cp_userpermission`
--

CREATE TABLE `cp_userpermission` (
  `per_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `OnOff` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cp_users`
--

CREATE TABLE `cp_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cp_users`
--

INSERT INTO `cp_users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(9822, 'admin', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Admin', 'System');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cp_logs`
--
ALTER TABLE `cp_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cp_papers`
--
ALTER TABLE `cp_papers`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `cp_question`
--
ALTER TABLE `cp_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `cp_question_details`
--
ALTER TABLE `cp_question_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cp_settings`
--
ALTER TABLE `cp_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `cp_subjects`
--
ALTER TABLE `cp_subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `cp_units`
--
ALTER TABLE `cp_units`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `cp_userpermission`
--
ALTER TABLE `cp_userpermission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `cp_users`
--
ALTER TABLE `cp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cp_logs`
--
ALTER TABLE `cp_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;

--
-- AUTO_INCREMENT for table `cp_papers`
--
ALTER TABLE `cp_papers`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cp_question`
--
ALTER TABLE `cp_question`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cp_question_details`
--
ALTER TABLE `cp_question_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `cp_settings`
--
ALTER TABLE `cp_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cp_subjects`
--
ALTER TABLE `cp_subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cp_units`
--
ALTER TABLE `cp_units`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cp_userpermission`
--
ALTER TABLE `cp_userpermission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1693;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
