-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220509.53f11afcaa
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 08:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_animaux`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_race` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `ville` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date_annonce` date NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'free',
  `genre` varchar(15) NOT NULL,
  `number_etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `id_membre`, `id_race`, `titre`, `ville`, `description`, `date_annonce`, `etat`, `genre`, `number_etat`) VALUES
(30, 24, 5, 'Titre de l\'annonce', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum harum quas quae, provident et corrupti nam ex aperiam saepe nulla!Lorem ipsum dolor s', '0000-00-00', 'free', 'male', 1),
(31, 24, 20, 'strong molly', 35, 'duhv ihjbyuf  jhb jhv ', '2022-05-03', 'free', 'female', 1),
(32, 24, 20, 'fish molly', 192, 'jhgy6uhjbkj', '2020-02-19', 'free', 'female', 1),
(33, 24, 17, 'titre_test', 58, 'discription_dest', '0000-00-00', 'free', 'male', 1),
(36, 24, 25, 'titre 1', 325, 'jhvgbbfyhjc vc  bcbvchg ', '2022-05-21', 'free', 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `id_ban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`id_ban`, `id_user`, `id_membre`) VALUES
(1, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Chats'),
(2, 'Chiens'),
(3, 'Oiseaux'),
(4, 'Poissons'),
(8, 'Rongeurs'),
(9, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id_chats` int(11) NOT NULL,
  `id_membre_send` int(11) NOT NULL,
  `id_membre_receive` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date_message` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id_chats`, `id_membre_send`, `id_membre_receive`, `message`, `date_message`) VALUES
(1, 7, 9, 'Nothing, this is message is empty, go to your bedroom and sleep', NULL),
(2, 9, 7, 'hhh no, I won\'t go, you go and leave me', NULL),
(3, 9, 24, '1', NULL),
(4, 24, 9, '2', '2022-05-03 00:00:00'),
(5, 9, 26, 'yu', NULL),
(6, 30, 24, 'ol.iy,ughjm', NULL),
(7, 24, 9, '3', NULL),
(8, 24, 7, 'hello', NULL),
(9, 26, 24, 'test_1', '2022-05-04 00:00:00'),
(11, 9, 24, '4', '2022-05-16 00:00:00'),
(12, 26, 24, 'test_2', '2022-05-16 00:00:00'),
(13, 24, 26, 'test_3', '2022-05-16 00:00:00'),
(14, 24, 30, 'malk ka tsitili hadchi a Hind wach ka tkhrb9i 3liya yae', '2022-05-16 00:00:00'),
(15, 24, 9, '5', '0000-00-00 00:00:00'),
(16, 24, 9, '6', '2022-05-17 14:06:10'),
(17, 9, 24, '7', '2022-05-17 14:06:49'),
(18, 9, 24, '8', '2022-05-17 14:06:53'),
(19, 24, 9, '9', '2022-05-17 14:27:58'),
(20, 24, 9, '10', '2022-05-17 14:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoris`
--

INSERT INTO `favoris` (`id_favoris`, `id_membre`, `id_annonce`) VALUES
(72, 24, 30);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `ville` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `nb_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `user_name`, `email`, `password`, `telephone`, `ville`, `img`, `bio`, `nb_ban`) VALUES
(7, 'zakariae', 'chalh@gmail.com', '000', '0767185387', 9, '', '', 0),
(9, 'ahlam', '1@gmail.com', '123123123', '0123456789', 1, '', '', 0),
(24, 'Chalh Zakariae', 'chalhzakariae3@gmail.com', '123456789', '+212 767-185387', 58, '24.png', '', 0),
(26, 'Hicham', '3@gmail.com', '000', '', 3, '', '', 0),
(29, 'name 1', 'chal@gmail.com', '0000', '', 8, '', '', 0),
(30, 'hind', 'hind@gmail.com', '000', '', 10, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom_race` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`id_race`, `id_categorie`, `nom_race`) VALUES
(1, 1, 'Siamese'),
(2, 1, 'Ragdoll'),
(3, 1, 'Burmese'),
(4, 1, 'Autre'),
(5, 2, 'Bull dog'),
(6, 2, 'Cane Corso'),
(7, 2, 'Malinois'),
(8, 2, 'Chihuahua'),
(9, 2, 'Husky'),
(10, 2, 'Caniche'),
(11, 2, 'Autre'),
(12, 3, 'Pigeon'),
(13, 3, 'Perroquet'),
(14, 3, 'Canari'),
(15, 3, 'Autre'),
(16, 4, 'Guppy'),
(17, 4, 'Plety'),
(18, 4, ' Néon bleu'),
(19, 4, 'Molly'),
(20, 4, 'Autre'),
(21, 8, ' Hérissons'),
(22, 8, 'Souris'),
(23, 8, 'Furet'),
(24, 8, 'Écureuil'),
(25, 8, 'Autre'),
(26, 9, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(11) NOT NULL,
  `id_membre_send` int(11) NOT NULL,
  `id_membre_receive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `user_name`) VALUES
(1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `ville` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `ville`) VALUES
(1, 'Aïn Harrouda'),
(2, 'Ben Yakhlef'),
(3, 'Bouskoura'),
(4, 'Casablanca'),
(5, 'Médiouna'),
(6, 'Mohammadia'),
(7, 'Tit Mellil'),
(8, 'Ben Yakhlef'),
(9, 'Bejaâd'),
(10, 'Ben Ahmed'),
(11, 'Benslimane'),
(12, 'Berrechid'),
(13, 'Boujniba'),
(14, 'Boulanouare'),
(15, 'Bouznika'),
(16, 'Deroua'),
(17, 'El Borouj'),
(18, 'El Gara'),
(19, 'Guisser'),
(20, 'Hattane'),
(21, 'Khouribga'),
(22, 'Loulad'),
(23, 'Oued Zem'),
(24, 'Oulad Abbou'),
(25, 'Oulad H\'Riz Sahel'),
(26, 'Oulad M\'rah'),
(27, 'Oulad Saïd'),
(28, 'Oulad Sidi Ben Daoud'),
(29, 'Ras El Aïn'),
(30, 'Settat'),
(31, 'Sidi Rahhal Chataï'),
(32, 'Soualem'),
(33, 'Azemmour'),
(34, 'Bir Jdid'),
(35, 'Bouguedra'),
(36, 'Echemmaia'),
(37, 'El Jadida'),
(38, 'Hrara'),
(39, 'Ighoud'),
(40, 'Jamâat Shaim'),
(41, 'Jorf Lasfar'),
(42, 'Khemis Zemamra'),
(43, 'Laaounate'),
(44, 'Moulay Abdallah'),
(45, 'Oualidia'),
(46, 'Oulad Amrane'),
(47, 'Oulad Frej'),
(48, 'Oulad Ghadbane'),
(49, 'Safi'),
(50, 'Sebt El Maârif'),
(51, 'Sebt Gzoula'),
(52, 'Sidi Ahmed'),
(53, 'Sidi Ali Ban Hamdouche'),
(54, 'Sidi Bennour'),
(55, 'Sidi Bouzid'),
(56, 'Sidi Smaïl'),
(57, 'Youssoufia'),
(58, 'Fès'),
(59, 'Aïn Cheggag'),
(60, 'Bhalil'),
(61, 'Boulemane'),
(62, 'El Menzel'),
(63, 'Guigou'),
(64, 'Imouzzer Kandar'),
(65, 'Imouzzer Marmoucha'),
(66, 'Missour'),
(67, 'Moulay Yaâcoub'),
(68, 'Ouled Tayeb'),
(69, 'Outat El Haj'),
(70, 'Ribate El Kheir'),
(71, 'Séfrou'),
(72, 'Skhinate'),
(73, 'Tafajight'),
(74, 'Arbaoua'),
(75, 'Aïn Dorij'),
(76, 'Dar Gueddari'),
(77, 'Had Kourt'),
(78, 'Jorf El Melha'),
(79, 'Kénitra'),
(80, 'Khenichet'),
(81, 'Lalla Mimouna'),
(82, 'Mechra Bel Ksiri'),
(83, 'Mehdia'),
(84, 'Moulay Bousselham'),
(85, 'Sidi Allal Tazi'),
(86, 'Sidi Kacem'),
(87, 'Sidi Slimane'),
(88, 'Sidi Taibi'),
(89, 'Sidi Yahya El Gharb'),
(90, 'Souk El Arbaa'),
(91, 'Akka'),
(92, 'Assa'),
(93, 'Bouizakarne'),
(94, 'El Ouatia'),
(95, 'Es-Semara'),
(96, 'Fam El Hisn'),
(97, 'Foum Zguid'),
(98, 'Guelmim'),
(99, 'Taghjijt'),
(100, 'Tan-Tan'),
(101, 'Tata'),
(102, 'Zag'),
(103, 'Marrakech'),
(104, 'Ait Daoud'),
(115, 'Amizmiz'),
(116, 'Assahrij'),
(117, 'Aït Ourir'),
(118, 'Ben Guerir'),
(119, 'Chichaoua'),
(120, 'El Hanchane'),
(121, 'El Kelaâ des Sraghna'),
(122, 'Essaouira'),
(123, 'Fraïta'),
(124, 'Ghmate'),
(125, 'Ighounane'),
(126, 'Imintanoute'),
(127, 'Kattara'),
(128, 'Lalla Takerkoust'),
(129, 'Loudaya'),
(130, 'Lâattaouia'),
(131, 'Moulay Brahim'),
(132, 'Mzouda'),
(133, 'Ounagha'),
(134, 'Sid LMokhtar'),
(135, 'Sid Zouin'),
(136, 'Sidi Abdallah Ghiat'),
(137, 'Sidi Bou Othmane'),
(138, 'Sidi Rahhal'),
(139, 'Skhour Rehamna'),
(140, 'Smimou'),
(141, 'Tafetachte'),
(142, 'Tahannaout'),
(143, 'Talmest'),
(144, 'Tamallalt'),
(145, 'Tamanar'),
(146, 'Tamansourt'),
(147, 'Tameslouht'),
(148, 'Tanalt'),
(149, 'Zeubelemok'),
(150, 'Meknès'),
(151, 'Khénifra'),
(152, 'Agourai'),
(153, 'Ain Taoujdate'),
(154, 'MyAliCherif'),
(155, 'Rissani'),
(156, 'Amalou Ighriben'),
(157, 'Aoufous'),
(158, 'Arfoud'),
(159, 'Azrou'),
(160, 'Aïn Jemaa'),
(161, 'Aïn Karma'),
(162, 'Aïn Leuh'),
(163, 'Aït Boubidmane'),
(164, 'Aït Ishaq'),
(165, 'Boudnib'),
(166, 'Boufakrane'),
(167, 'Boumia'),
(168, 'El Hajeb'),
(169, 'Elkbab'),
(170, 'Er-Rich'),
(171, 'Errachidia'),
(172, 'Gardmit'),
(173, 'Goulmima'),
(174, 'Gourrama'),
(175, 'Had Bouhssoussen'),
(176, 'Haj Kaddour'),
(177, 'Ifrane'),
(178, 'Itzer'),
(179, 'Jorf'),
(180, 'Kehf Nsour'),
(181, 'Kerrouchen'),
(182, 'M\'haya'),
(183, 'M\'rirt'),
(184, 'Midelt'),
(185, 'Moulay Ali Cherif'),
(186, 'Moulay Bouazza'),
(187, 'Moulay Idriss Zerhoun'),
(188, 'Moussaoua'),
(189, 'N\'Zalat Bni Amar'),
(190, 'Ouaoumana'),
(191, 'Oued Ifrane'),
(192, 'Sabaa Aiyoun'),
(193, 'Sebt Jahjouh'),
(194, 'Sidi Addi'),
(195, 'Tichoute'),
(196, 'Tighassaline'),
(197, 'Tighza'),
(198, 'Timahdite'),
(199, 'Tinejdad'),
(200, 'Tizguite'),
(201, 'Toulal'),
(202, 'Tounfite'),
(203, 'Zaouia d\'Ifrane'),
(204, 'Zaïda'),
(205, 'Ahfir'),
(206, 'Aklim'),
(207, 'Al Aroui'),
(208, 'Aïn Bni Mathar'),
(209, 'Aïn Erreggada'),
(210, 'Ben Taïeb'),
(211, 'Berkane'),
(212, 'Bni Ansar'),
(213, 'Bni Chiker'),
(214, 'Bni Drar'),
(215, 'Bni Tadjite'),
(216, 'Bouanane'),
(217, 'Bouarfa'),
(218, 'Bouhdila'),
(219, 'Dar El Kebdani'),
(220, 'Debdou'),
(221, 'Douar Kannine'),
(222, 'Driouch'),
(223, 'El Aïoun Sidi Mellouk'),
(224, 'Farkhana'),
(225, 'Figuig'),
(226, 'Ihddaden'),
(227, 'Jaâdar'),
(228, 'Jerada'),
(229, 'Kariat Arekmane'),
(230, 'Kassita'),
(231, 'Kerouna'),
(232, 'Laâtamna'),
(233, 'Madagh'),
(234, 'Midar'),
(235, 'Nador'),
(236, 'Naima'),
(237, 'Oued Heimer'),
(238, 'Oujda'),
(239, 'Ras El Ma'),
(240, 'Saïdia'),
(241, 'Selouane'),
(242, 'Sidi Boubker'),
(243, 'Sidi Slimane Echcharaa'),
(244, 'Talsint'),
(245, 'Taourirt'),
(246, 'Tendrara'),
(247, 'Tiztoutine'),
(248, 'Touima'),
(249, 'Touissit'),
(250, 'Zaïo'),
(251, 'Zeghanghane'),
(252, 'Rabat'),
(253, 'Salé'),
(254, 'Ain El Aouda'),
(255, 'Harhoura'),
(256, 'Khémisset'),
(257, 'Oulmès'),
(258, 'Rommani'),
(259, 'Sidi Allal El Bahraoui'),
(260, 'Sidi Bouknadel'),
(261, 'Skhirate'),
(262, 'Tamesna'),
(263, 'Témara'),
(264, 'Tiddas'),
(265, 'Tiflet'),
(266, 'Touarga'),
(267, 'Agadir'),
(268, 'Agdz'),
(269, 'Agni Izimmer'),
(270, 'Aït Melloul'),
(271, 'Alnif'),
(272, 'Anzi'),
(273, 'Aoulouz'),
(274, 'Aourir'),
(275, 'Arazane'),
(276, 'Aït Baha'),
(277, 'Aït Iaâza'),
(278, 'Aït Yalla'),
(279, 'Ben Sergao'),
(280, 'Biougra'),
(281, 'Boumalne-Dadès'),
(282, 'Dcheira El Jihadia'),
(283, 'Drargua'),
(284, 'El Guerdane'),
(285, 'Harte Lyamine'),
(286, 'Ida Ougnidif'),
(287, 'Ifri'),
(288, 'Igdamen'),
(289, 'Ighil n\'Oumgoun'),
(290, 'Imassine'),
(291, 'Inezgane'),
(292, 'Irherm'),
(293, 'Kelaat-M\'Gouna'),
(294, 'Lakhsas'),
(295, 'Lakhsass'),
(296, 'Lqliâa'),
(297, 'M\'semrir'),
(298, 'Massa (Maroc)'),
(299, 'Megousse'),
(300, 'Ouarzazate'),
(301, 'Oulad Berhil'),
(302, 'Oulad Teïma'),
(303, 'Sarghine'),
(304, 'Sidi Ifni'),
(305, 'Skoura'),
(306, 'Tabounte'),
(307, 'Tafraout'),
(308, 'Taghzout'),
(309, 'Tagzen'),
(310, 'Taliouine'),
(311, 'Tamegroute'),
(312, 'Tamraght'),
(313, 'Tanoumrite Nkob Zagora'),
(314, 'Taourirt ait zaghar'),
(315, 'Taroudannt'),
(316, 'Temsia'),
(317, 'Tifnit'),
(318, 'Tisgdal'),
(319, 'Tiznit'),
(320, 'Toundoute'),
(321, 'Zagora'),
(322, 'Afourar'),
(323, 'Aghbala'),
(324, 'Azilal'),
(325, 'Aït Majden'),
(326, 'Beni Ayat'),
(327, 'Béni Mellal'),
(328, 'Bin elouidane'),
(329, 'Bradia'),
(330, 'Bzou'),
(331, 'Dar Oulad Zidouh'),
(332, 'Demnate'),
(333, 'Dra\'a'),
(334, 'El Ksiba'),
(335, 'Foum Jamaa'),
(336, 'Fquih Ben Salah'),
(337, 'Kasba Tadla'),
(338, 'Ouaouizeght'),
(339, 'Oulad Ayad'),
(340, 'Oulad M\'Barek'),
(341, 'Oulad Yaich'),
(342, 'Sidi Jaber'),
(343, 'Souk Sebt Oulad Nemma'),
(344, 'Zaouïat Cheikh'),
(345, 'Tanger'),
(346, 'Tétouan'),
(347, 'Akchour'),
(348, 'Assilah'),
(349, 'Bab Berred'),
(350, 'Bab Taza'),
(351, 'Brikcha'),
(352, 'Chefchaouen'),
(353, 'Dar Bni Karrich'),
(354, 'Dar Chaoui'),
(355, 'Fnideq'),
(356, 'Gueznaia'),
(357, 'Jebha'),
(358, 'Karia'),
(359, 'Khémis Sahel'),
(360, 'Ksar El Kébir'),
(361, 'Larache'),
(362, 'M\'diq'),
(363, 'Martil'),
(364, 'Moqrisset'),
(365, 'Oued Laou'),
(366, 'Oued Rmel'),
(367, 'Ouazzane'),
(368, 'Point Cires'),
(369, 'Sidi Lyamani'),
(370, 'Sidi Mohamed ben Abdallah el-Raisuni'),
(371, 'Zinat'),
(372, 'Ajdir'),
(373, 'Aknoul'),
(374, 'Al Hoceïma'),
(375, 'Aït Hichem'),
(376, 'Bni Bouayach'),
(377, 'Bni Hadifa'),
(378, 'Ghafsai'),
(379, 'Guercif'),
(380, 'Imzouren'),
(381, 'Inahnahen'),
(382, 'Issaguen (Ketama)'),
(383, 'Karia (El Jadida)'),
(384, 'Karia Ba Mohamed'),
(385, 'Oued Amlil'),
(386, 'Oulad Zbair'),
(387, 'Tahla'),
(388, 'Tala Tazegwaght'),
(389, 'Tamassint'),
(390, 'Taounate'),
(391, 'Targuist'),
(392, 'Taza'),
(393, 'Taïnaste'),
(394, 'Thar Es-Souk'),
(395, 'Tissa'),
(396, 'Tizi Ouasli'),
(397, 'Laayoune'),
(398, 'El Marsa'),
(399, 'Tarfaya'),
(400, 'Boujdour'),
(401, 'Awsard'),
(402, 'Oued-Eddahab'),
(403, 'Stehat'),
(404, 'Aït Attab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_race` (`id_race`),
  ADD KEY `id_membre` (`id_membre`),
  ADD KEY `ville` (`ville`);

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id_ban`),
  ADD KEY `ban_ibfk_1` (`id_membre`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chats`),
  ADD KEY `id_membre_receive` (`id_membre_receive`),
  ADD KEY `id_membre_send` (`id_membre_send`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `id_annonce` (`id_annonce`),
  ADD KEY `favoris_ibfk_2` (`id_membre`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `ville` (`ville`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`),
  ADD KEY `race_ibfk_1` (`id_categorie`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `id_membre_receive` (`id_membre_receive`),
  ADD KEY `id_membre_send` (`id_membre_send`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `annonce_ibfk_3` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`);

--
-- Constraints for table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `ban_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`id_membre_receive`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`id_membre_send`) REFERENCES `membre` (`id_membre`);

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`);

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`);

--
-- Constraints for table `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `race_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_membre_receive`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_membre_send`) REFERENCES `membre` (`id_membre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



