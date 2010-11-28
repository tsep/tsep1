-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2010 at 09:41 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tsep`
--

-- --------------------------------------------------------

--
-- Table structure for table `%prefix%elements`
--

DROP TABLE IF EXISTS `%prefix%elements`;
CREATE TABLE IF NOT EXISTS `%prefix%elements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(20) NOT NULL,
  `property` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `%prefix%elements`
--

INSERT INTO `%prefix%elements` (`id`, `tag`, `property`) VALUES
(1, 'a', 'href'),
(2, 'script', 'src'),
(3, 'link', 'href');

-- --------------------------------------------------------

--
-- Table structure for table `%prefix%indices`
--

DROP TABLE IF EXISTS `%prefix%indices`;
CREATE TABLE IF NOT EXISTS `%prefix%indices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `text` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;



-- --------------------------------------------------------

--
-- Table structure for table `%prefix%profiles`
--

DROP TABLE IF EXISTS `%prefix%profiles`;
CREATE TABLE IF NOT EXISTS `%prefix%profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `regex` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


-- --------------------------------------------------------

--
-- Table structure for table `%prefix%stopwords`
--

DROP TABLE IF EXISTS `%prefix%stopwords`;
CREATE TABLE IF NOT EXISTS `%prefix%stopwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stopword` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `%prefix%stopwords_stopword` (`stopword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `%prefix%stopwords`
--

INSERT INTO `%prefix%stopwords` (`id`, `stopword`) VALUES
(1, 'about'),
(2, 'above'),
(3, 'across'),
(4, 'after'),
(5, 'again'),
(6, 'against'),
(7, 'all'),
(8, 'almost'),
(9, 'alone'),
(10, 'along'),
(11, 'already'),
(12, 'also'),
(13, 'although'),
(14, 'always'),
(15, 'among'),
(16, 'an'),
(17, 'and'),
(18, 'another'),
(19, 'any'),
(20, 'anybody'),
(21, 'anyone'),
(22, 'anything'),
(23, 'anywhere'),
(24, 'are'),
(25, 'area'),
(26, 'areas'),
(27, 'around'),
(28, 'as'),
(29, 'ask'),
(30, 'asked'),
(31, 'asking'),
(32, 'asks'),
(33, 'at'),
(34, 'away'),
(35, 'b'),
(36, 'back'),
(37, 'backed'),
(38, 'backing'),
(39, 'backs'),
(40, 'be'),
(41, 'became'),
(42, 'because'),
(43, 'become'),
(44, 'becomes'),
(45, 'been'),
(46, 'before'),
(47, 'began'),
(48, 'behind'),
(49, 'being'),
(50, 'beings'),
(51, 'best'),
(52, 'better'),
(53, 'between'),
(54, 'big'),
(55, 'both'),
(56, 'but'),
(57, 'by'),
(58, 'c'),
(59, 'came'),
(60, 'can'),
(61, 'cannot'),
(62, 'case'),
(63, 'cases'),
(64, 'certain'),
(65, 'certainly'),
(66, 'clear'),
(67, 'clearly'),
(68, 'come'),
(69, 'could'),
(70, 'd'),
(71, 'did'),
(72, 'differ'),
(73, 'different'),
(74, 'differently'),
(75, 'do'),
(76, 'does'),
(77, 'done'),
(78, 'down'),
(79, 'downed'),
(80, 'downing'),
(81, 'downs'),
(82, 'during'),
(83, 'e'),
(84, 'each'),
(85, 'early'),
(86, 'either'),
(87, 'end'),
(88, 'ended'),
(89, 'ending'),
(90, 'ends'),
(91, 'enough'),
(92, 'even'),
(93, 'evenly'),
(94, 'ever'),
(95, 'every'),
(96, 'everybody'),
(97, 'everyone'),
(98, 'everything'),
(99, 'everywhere'),
(100, 'f'),
(101, 'face'),
(102, 'faces'),
(103, 'fact'),
(104, 'facts'),
(105, 'far'),
(106, 'felt'),
(107, 'few'),
(108, 'find'),
(109, 'finds'),
(110, 'first'),
(111, 'for'),
(112, 'four'),
(113, 'from'),
(114, 'full'),
(115, 'fully'),
(116, 'further'),
(117, 'furthered'),
(118, 'furthering'),
(119, 'furthers'),
(120, 'g'),
(121, 'gave'),
(122, 'general'),
(123, 'generally'),
(124, 'get'),
(125, 'gets'),
(126, 'give'),
(127, 'given'),
(128, 'gives'),
(129, 'go'),
(130, 'going'),
(131, 'good'),
(132, 'goods'),
(133, 'got'),
(134, 'great'),
(135, 'greater'),
(136, 'greatest'),
(137, 'group'),
(138, 'grouped'),
(139, 'grouping'),
(140, 'groups'),
(141, 'h'),
(142, 'had'),
(143, 'has'),
(144, 'have'),
(145, 'having'),
(146, 'he'),
(147, 'her'),
(148, 'here'),
(149, 'herself'),
(150, 'high'),
(151, 'higher'),
(152, 'highest'),
(153, 'him'),
(154, 'himself'),
(155, 'his'),
(156, 'how'),
(157, 'however'),
(158, 'i'),
(159, 'if'),
(160, 'important'),
(161, 'in'),
(162, 'interest'),
(163, 'interested'),
(164, 'interesting'),
(165, 'interests'),
(166, 'into'),
(167, 'is'),
(168, 'it'),
(169, 'its'),
(170, 'itself'),
(171, 'j'),
(172, 'just'),
(173, 'k'),
(174, 'keep'),
(175, 'keeps'),
(176, 'kind'),
(177, 'knew'),
(178, 'know'),
(179, 'known'),
(180, 'knows'),
(181, 'l'),
(182, 'large'),
(183, 'largely'),
(184, 'last'),
(185, 'later'),
(186, 'latest'),
(187, 'least'),
(188, 'less'),
(189, 'let'),
(190, 'lets'),
(191, 'like'),
(192, 'likely'),
(193, 'long'),
(194, 'longer'),
(195, 'longest'),
(196, 'm'),
(197, 'made'),
(198, 'make'),
(199, 'making'),
(200, 'man'),
(201, 'many'),
(202, 'may'),
(203, 'me'),
(204, 'member'),
(205, 'members'),
(206, 'men'),
(207, 'might'),
(208, 'more'),
(209, 'most'),
(210, 'mostly'),
(211, 'mr'),
(212, 'mrs'),
(213, 'much'),
(214, 'must'),
(215, 'my'),
(216, 'myself'),
(217, 'n'),
(218, 'necessary'),
(219, 'need'),
(220, 'needed'),
(221, 'needing'),
(222, 'needs'),
(223, 'never'),
(224, 'new'),
(225, 'newer'),
(226, 'newest'),
(227, 'next'),
(228, 'no'),
(229, 'nobody'),
(230, 'non'),
(231, 'noone'),
(232, 'not'),
(233, 'nothing'),
(234, 'now'),
(235, 'nowhere'),
(236, 'number'),
(237, 'numbers'),
(238, 'o'),
(239, 'of'),
(240, 'off'),
(241, 'often'),
(242, 'old'),
(243, 'older'),
(244, 'oldest'),
(245, 'on'),
(246, 'once'),
(247, 'one'),
(248, 'only'),
(249, 'open'),
(250, 'opened'),
(251, 'opening'),
(252, 'opens'),
(253, 'or'),
(254, 'order'),
(255, 'ordered'),
(256, 'ordering'),
(257, 'orders'),
(258, 'other'),
(259, 'others'),
(260, 'our'),
(261, 'out'),
(262, 'over'),
(263, 'p'),
(264, 'part'),
(265, 'parted'),
(266, 'parting'),
(267, 'parts'),
(268, 'per'),
(269, 'perhaps'),
(270, 'place'),
(271, 'places'),
(272, 'point'),
(273, 'pointed'),
(274, 'pointing'),
(275, 'points'),
(276, 'possible'),
(277, 'present'),
(278, 'presented'),
(279, 'presenting'),
(280, 'presents'),
(281, 'problem'),
(282, 'problems'),
(283, 'put'),
(284, 'puts'),
(285, 'q'),
(286, 'quite'),
(287, 'r'),
(288, 'rather'),
(289, 'really'),
(290, 'right'),
(291, 'room'),
(292, 'rooms'),
(293, 's'),
(294, 'said'),
(295, 'same'),
(296, 'saw'),
(297, 'say'),
(298, 'says'),
(299, 'second'),
(300, 'seconds'),
(301, 'see'),
(302, 'seem'),
(303, 'seemed'),
(304, 'seeming'),
(305, 'seems'),
(306, 'sees'),
(307, 'several'),
(308, 'shall'),
(309, 'she'),
(310, 'should'),
(311, 'show'),
(312, 'showed'),
(313, 'showing'),
(314, 'shows'),
(315, 'side'),
(316, 'sides'),
(317, 'since'),
(318, 'small'),
(319, 'smaller'),
(320, 'smallest'),
(321, 'so'),
(322, 'some'),
(323, 'somebody'),
(324, 'someone'),
(325, 'something'),
(326, 'somewhere'),
(327, 'state'),
(328, 'states'),
(329, 'still'),
(330, 'such'),
(331, 'sure'),
(332, 't'),
(333, 'take'),
(334, 'taken'),
(335, 'than'),
(336, 'that'),
(337, 'the'),
(338, 'their'),
(339, 'them'),
(340, 'then'),
(341, 'there'),
(342, 'therefore'),
(343, 'these'),
(344, 'they'),
(345, 'thing'),
(346, 'things'),
(347, 'think'),
(348, 'thinks'),
(349, 'this'),
(350, 'those'),
(351, 'though'),
(352, 'thought'),
(353, 'thoughts'),
(354, 'three'),
(355, 'through'),
(356, 'thus'),
(357, 'to'),
(358, 'today'),
(359, 'together'),
(360, 'too'),
(361, 'took'),
(362, 'toward'),
(363, 'turn'),
(364, 'turned'),
(365, 'turning'),
(366, 'turns'),
(367, 'two'),
(368, 'u'),
(369, 'under'),
(370, 'until'),
(371, 'up'),
(372, 'upon'),
(373, 'us'),
(374, 'use'),
(375, 'used'),
(376, 'uses'),
(377, 'v'),
(378, 'very'),
(379, 'w'),
(380, 'want'),
(381, 'wanted'),
(382, 'wanting'),
(383, 'wants'),
(384, 'was'),
(385, 'way'),
(386, 'ways'),
(387, 'we'),
(388, 'well'),
(389, 'wells'),
(390, 'went'),
(391, 'were'),
(392, 'what'),
(393, 'when'),
(394, 'where'),
(395, 'whether'),
(396, 'which'),
(397, 'while'),
(398, 'who'),
(399, 'whole'),
(400, 'whose'),
(401, 'why'),
(402, 'will'),
(403, 'with'),
(404, 'within'),
(405, 'without'),
(406, 'work'),
(407, 'worked'),
(408, 'working'),
(409, 'works'),
(410, 'would'),
(411, 'x'),
(412, 'y'),
(413, 'year'),
(414, 'years'),
(415, 'yet'),
(416, 'you'),
(417, 'young'),
(418, 'younger'),
(419, 'youngest'),
(420, 'your'),
(421, 'yours'),
(422, 'z');

-- --------------------------------------------------------

--
-- Table structure for table `%prefix%users`
--

DROP TABLE IF EXISTS `%prefix%users`;
CREATE TABLE IF NOT EXISTS `%prefix%users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `%prefix%users`
--

INSERT INTO `%prefix%users` (`id`, `username`, `password`) VALUES
(1, '%username%', '%password%');
