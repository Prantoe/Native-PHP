-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_gokart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(255) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `email`, `pass`) VALUES
(1, 'Clarisa Kristi', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_cust` int(11) NOT NULL,
  `nm_cust` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_cust`, `nm_cust`, `no_telp`, `email`) VALUES
(1, 'Guntur', '083172356900', 'asdfbnmzzxx@gmail.com'),
(13, 'Sukma Krisna', '082186205323', 'sukma21@gmail.com'),
(14, 'Eki Dhias', '9087654398', 'email2@gmail.com'),
(15, 'Danendra', '098765436794', 'email3@gmail.com'),
(16, 'Grace', '456789012334', 'email4@gmail.com'),
(17, 'Brendan', '034567891234', 'email5@gmail.com'),
(18, 'Tania', '081923457923', 'email6@gmail.com'),
(19, 'Abriela', '081942356789', 'email7@gmail.com'),
(20, 'Alifia Nanda', '08234567890', 'email8@gmail.com'),
(21, 'xavira', '082376541890', 'email9@gmail.com'),
(22, 'Marceline', '082165782100', 'email10@gmail.com'),
(23, 'Andi', '081134567890', 'email11@gmail.com'),
(24, 'Ade', '083132148765', 'email12@gmail.com'),
(25, 'Lucas', '082267890541', 'email13@gmail.com'),
(26, 'Gesti bagus', '081456789022', 'email14@gmail.com'),
(27, 'Wafiq', '0821879067123', 'email15@gmail.com'),
(28, 'Alfian', '081890781234', 'email16@gmail.com'),
(29, 'Bintang', '081512347890', 'email18@gmail.com'),
(30, 'Prilly', '081346780976', 'email19@gmail.com'),
(31, 'Safira Putri', '082156780987', 'email20@gmail.com'),
(32, 'Ciro', '081123456789', 'email21@gmail.com'),
(33, 'Andika', '081344557788', 'email22@gmail.com'),
(34, 'Candra', '08215678906', 'email23@gmail.com'),
(35, 'Bagas', '0831770089', 'email24@gmail.com'),
(36, 'Lea', '0822180790', 'email25@gmail.com'),
(37, 'Saniah Amalia', '0811493172', 'email26@gmail.com'),
(38, 'Farhan Azizan', '0831754903', 'email27@gmail.com'),
(39, 'Muhammad Irianto', '082234965748', 'email29@gmail.com'),
(40, 'Maria Chelsea', '0811228460', 'email30@gmail.com'),
(41, 'Retno Wanda', '082242289546', 'email31@gmail.com'),
(42, 'Cathy Patricia', '083155823099', 'email32@gmail.com'),
(43, 'Steven Bernard', '082188338750', 'email33@gmail.com'),
(44, 'Sergio Bryan Aroy', '082337754912', 'email34@gmail.com'),
(45, 'Frans Cartenz', '083175389876', 'email35@gmail.com'),
(46, 'Theresia Zabrina ', '082184339991', 'email36@gmail.com'),
(47, 'Vivi Novita', '081244935789', 'email37@gmail.com'),
(48, 'Andi Ayu', '083982567412', 'email38@gmail.com'),
(49, 'Dwi Gilda', '0811498891', 'email39@gmail.com'),
(50, 'Ghaly', '083166679012', 'email40@gmail.com'),
(51, 'Raka Sultan Salim', '082212340011', 'email41@gmail.com'),
(52, 'Herman Demi Resubun', '083145100076', 'email42@gmail.com'),
(53, 'Marchana Adio', '082100087192', 'email43@gmail.com'),
(54, 'Endy', '082311003922', 'email44@gmail.com'),
(55, 'Akmal haniffin', '082248222182', 'email45@gmail.com'),
(56, 'I Nyoman Warsana', '082199428795', 'email46@gmail.com'),
(57, 'Laras', '083165558933', 'email47@gmail.com'),
(58, 'Amanda Firmandani', '0811496839', 'email48@gmail.com'),
(59, 'Irma Gabriel', '083179222945', 'email49@gmail.com'),
(60, 'Adiya Jaya Kusuma', '082290126673', 'email50@gmail.com'),
(69, 'Warsita', '0812345678', 'email51@gmail.com'),
(70, 'Pradipta', '08912356472', 'email52@gmail.com'),
(71, 'Vanya', '083172356912', 'email53@gmail.com'),
(72, 'Amalia Pratiwi', '456789012334', 'email54@gmail.com'),
(73, 'Ozy uwais', '083173357900', 'email55@gmail.com'),
(74, 'Dian Andriani', '082186205324', 'email56@gmail.com'),
(75, 'Elma', '082187305323', 'email57@gmail.com'),
(76, 'Ophelia', '082186205323', 'email58@gmail.com'),
(77, 'Wulan', '082186205325', 'email59@gmail.com'),
(78, 'Mahendra', '083182356911', 'email60@gmail.com'),
(79, 'Okto Budiyanto', '083162356810', 'email61@gmail.com'),
(80, 'Atma', '082156205321', 'email62@gmail.com'),
(81, 'Jane', '083172357910', 'email63@gmail.com'),
(82, 'Michelle', '098765436794', 'email64@gmail.com'),
(83, 'Safina', '083172456870', 'email65@gmail.com'),
(84, 'Galuh', '034567891234', 'email66@gmail.com'),
(85, 'Maulana', '098765436765', 'email67@gmail.com'),
(86, 'Artwan', '098765436794', 'email68@gmail.com'),
(87, 'Gatra', '08218620532', 'email69@gmail.com'),
(88, 'Adriansyah', '034567891245', 'email70@gmail.com'),
(89, 'Zelaya', '082186205781', 'email71@gmail.com'),
(90, 'Cakrabirawa Dabukke', '082186205345', 'email72@gmail.com'),
(91, 'Balangga', '082186205356', 'email73@gmail.com'),
(92, 'Qori', '09876543667', 'email74@gmail.com'),
(93, 'Raditya', '083172356432', 'email75@gmail.com'),
(94, 'Irwan', '082186205354', 'email76@gmail.com'),
(95, 'Amelia', '083172356765', 'email77@gmail.com'),
(96, 'Gangsa Naj', '456789012334', 'email78@gmail.com'),
(97, 'Putu', '082186205326', 'email79@gmail.com'),
(98, 'Firganto', '034567891234', 'email80@gmail.com'),
(99, 'Manda', '908765439811', 'email81@gmail.com'),
(100, 'Ferdiansyah', '456789012334', 'email82@gmail.com'),
(101, 'Yudha', '083172355709', 'email83@gmail.com'),
(102, 'Yusdwindra', '456789012334', 'email84@gmail.com'),
(103, 'Rifqy Sali', '12356709822', 'email85@gmail.com'),
(104, 'Alrendy', '098765436786', 'email86@gmail.com'),
(105, 'Zahlia', '456789012332', 'email87@gmail.com'),
(106, 'Ogie Kahfi', '082186205354', 'email88@gmail.com'),
(107, ' Aisi Rheza', '098765436798', 'email89@gmail.com'),
(108, 'Fahlian', '082186205651', 'email90@gmail.com'),
(109, 'Elleonora', '098765436798', 'email91@gmail.com'),
(110, 'Ramanta', '098765436799', 'email92@gmail.com'),
(111, 'Arthur', '456789012389', 'email93@gmail.com'),
(112, 'Mutiara', '098765436794', 'email94@gmail.com'),
(113, 'Teddo', '082186205387', 'email95@gmail.com'),
(114, 'Derilandry', '082186205361', 'email96@gmail.com'),
(115, 'Rosaryo', '098765436756', 'email97@gmail.com'),
(116, 'Khansa Arrivaldi', '082186205323', 'email98@gmail.com'),
(117, 'Jenny', '034567891265', 'email99@gmail.com'),
(118, 'Nabila', '456789012334', 'email100@gmail.com'),
(119, 'Meirani', '082186205334', 'email101@gmail.com'),
(120, 'Ike', '082186205334', 'email102@gmail.com'),
(121, 'Fachria Ayu', '098765436723', 'email103@gmail.com'),
(122, 'Azalia', '082186205323', 'email104@gmail.com'),
(123, ' Nael  Yova', '098765436723', 'email105@gmail.com'),
(124, 'Tea', '082186205321', 'email106@gmail.com'),
(125, 'Esra Nandita', '082186205323', 'email107@gmail.com'),
(126, 'Maureen', '034567891221', 'email108@gmail.com'),
(127, 'Auzy Oktafiyanti', '098765436721', 'email109@gmail.com'),
(128, 'Ries Jaya', '082186205321', 'email110@gmail.com'),
(129, 'Maretta', '082186205345', 'email111@gmail.com'),
(130, 'Jordan Rutwan', '034567891321', 'email112@gmail.com'),
(131, 'Emir', '0821862053123', 'email113@gmail.com'),
(132, 'Emil', '082186205321', 'email114@gmail.com'),
(133, 'Siofra taylor', '082186205312', 'email115@gmail.com'),
(134, 'Fante', '082186205331', 'email116@gmail.com'),
(135, 'Micaela', '082186205234', 'email117@gmail.com'),
(136, 'Ayutya tara', '082186205213', 'email118@gmail.com'),
(137, 'Samanta Wallace', '034567891212', 'email119@gmail.com'),
(138, 'Sascha Putri', '098765436210', 'email120@gmail.com'),
(139, 'Randi herlambang', '03456785432', 'email121@gmail.com'),
(140, 'Pepen Sohandi', '082186205214', 'email122@gmail.com'),
(141, 'Makayla', '0821862123', 'email123@gmail.com'),
(142, 'Azel', '082186205231', 'email124@gmail.com'),
(143, 'Elish Liburd', '03456678091', 'email125@gmail.com'),
(144, 'Nadia Hadi', '0987654456', 'email126@gmail.com'),
(145, 'Kyra Hamami', '09876543623', 'email127@gmail.com'),
(146, 'Esther Kurniawan', '08218613210', 'email128@gmail.com'),
(147, 'Isabel Newley', '082182341431', 'email129@gmail.com'),
(148, 'Ella', '456789012323', 'email130@gmail.com'),
(149, 'Salmiah', '0853453455', 'email131@gmail.com'),
(150, 'Shafiyah', '085646456623', 'email132@gmail.com'),
(151, 'Khaerunnisa', '08345345345', 'email133@gmail.com'),
(152, 'Anies', '08453672367', 'email135@gmail.com'),
(153, 'Mursyid', '08347834667', 'email136@gmail.com'),
(154, 'Tezhar Azzubair', '0854667465', 'email137@gmail.com'),
(155, 'Dhian Oktaviani', '085325345', 'email138@gmail.com'),
(156, 'Marcelino', '0845637868', 'email139@gmail.com'),
(157, 'Fauzi Mulia Kamaruddin', '08456776423', 'email140@gmail.com'),
(158, 'Enjang Sukma', '084567345478', 'email141@gmail.com'),
(159, 'Gandung Ilwansyah', '08345672345', 'email142@gmail.com'),
(160, 'Aswin Mangkualam', '08543786546', 'email143@gmail.com'),
(161, 'Abdurrrahman Asyri', '0876458237', 'email144@gmail.com'),
(162, 'Fadlan Nur', '08567453276', 'email145@gmail.com'),
(163, 'Cindy Mokodompit', '08567457534', 'email146@gmail.com'),
(164, 'Muhaimin Iskandar', '0856437565', 'email147@gmail.com'),
(165, 'Muhammad Poli', '0898536423', 'email148@gmail.com'),
(166, 'Sherly Syukri', '0845634243', 'email149@gmail.com'),
(167, 'Hamimah Cintya', '0824564214', 'email150@gmail.com'),
(168, 'Asyka', '0853467555', 'email151@gmail.com'),
(169, 'Serli  ', '083657675', 'email152@gmail.com'),
(170, 'Nafizah', '086753434234', 'email153@gmail.com'),
(171, 'Zukfahmi', '085647324', 'email154@gmail.com'),
(172, 'Fahmi Azka', '085647356', 'email155@gmail.com'),
(173, 'Fendy', '08673454543', 'email156@gmail.com'),
(174, 'Amin', '086745783456', 'email157@gmail.com'),
(175, 'Adhit', '0874534754', 'email158@gmail.com'),
(176, 'Jajang ', '0864735435', 'email159@gmail.com'),
(177, 'Zuraida', '085675324355', 'email160@gmail.com'),
(178, 'Silmi', '086782567543', 'email161@gmail.com'),
(179, 'Ikhsan', '0856127567', 'email162@gmail.com'),
(180, 'Chairunnisa', '084564324', 'email163@gmail.com'),
(181, 'Syaripah', '0845623486', 'email164@gmail.com'),
(182, 'Aprilia', '0867234543', 'email165@gmail.com'),
(183, 'Abdurrahim', '08561754354', 'email166@gmail.com'),
(184, 'Hidayatullah', '0845632452', 'email167@gmail.com'),
(185, 'Satya', '08245367345', 'email168@gmail.com'),
(186, 'Sopian', '0845613434', 'email169@gmail.com'),
(187, 'Misbah', '08567423456', 'email170@gmail.com'),
(188, 'Musa', '0845367124235', 'email171@gmail.com'),
(189, 'Cahya', '085671245', 'email172@gmail.com'),
(190, 'Denira', '0876823785', 'email173@gmail.com'),
(191, 'Wandi', '08567123245', 'email174@gmail.com'),
(192, 'Isabella Ningrum', '08567123443', 'email175@gmail.com'),
(193, 'Tuti', '08567345t345', 'email176@gmail.com'),
(194, 'Nio', '0856127465', 'email177@gmail.com'),
(195, 'Budhi', '085673255', 'email178@gmail.com'),
(196, 'Budianto', '085672345432', 'email179@gmail.com'),
(197, 'Febrianto', '08566673242', 'email180@gmail.com'),
(198, 'Kiki Saputra', '0845623411', 'email181@gmail.com'),
(199, 'Samsul', '0856123451', 'email182@gmail.com'),
(200, 'Rahmat', '082125242134', 'email183@gmail.com'),
(201, 'Rere', '0845132462', 'email184@gmail.com'),
(202, 'Windi', '08124657432', 'email185@gmail.com'),
(203, 'Wedelia', '0814564325', 'email186@gmail.com'),
(204, 'Elindra', '0845656724', 'email187@gmail.com'),
(205, 'Junaidah', '08567234553', 'email188@gmail.com'),
(206, 'Bambang', '086237634124', 'email189@gmail.com'),
(207, 'Fandi', '0845612344', 'email190@gmail.com'),
(208, 'Afif', '0845623456', 'email191@gmail.com'),
(209, 'Gading', '08456235436', 'email192@gmail.com'),
(210, 'Khalifah', '084562345345', 'email193@gmail.com'),
(211, 'Sudarto', '0856754234', 'email194@gmail.com'),
(212, 'Erlangga', '0856734543', 'email195@gmail.com'),
(213, 'Dira Rahmawati', '083178545', 'email196@gmail.com'),
(214, 'Cucu Suratno', '08523765834', 'email197@gmail.com'),
(215, 'Vira ', '0878623454', 'email198@gmail.com'),
(216, 'Fadhilah', '0834782374', 'email199@gmail.com'),
(217, 'Putri Soetyatmoko', '0899567234', 'email200@gmail.com'),
(218, 'Halimah', '0866567234435', 'email201@gmail.com'),
(219, 'Hendra', '0833678245', 'email202@gmail.com'),
(220, 'Yesaya', '0867834564', 'email203@gmail.com'),
(221, 'Jonleri', '0845612455', 'email204@gmail.com'),
(222, 'Badrudin', '084563256', 'email205@gmail.com'),
(223, 'Yunus', '08845623456', 'email206@gmail.com'),
(224, 'Affandi', '08952346783', 'email207@gmail.com'),
(225, 'Ragil', '0812435656', 'email208@gmail.com'),
(226, 'Inggit Bela', '08667823423', 'email209@gmail.com'),
(227, 'Nurmalasari', '084465467', 'email210@gmail.com'),
(228, 'Sylviana', '0811672355', 'email211@gmail.com'),
(229, 'Leliyah', '0881678324', 'email212@gmail.com'),
(230, 'Elliot', '089934525', 'email213@gmail.com'),
(231, 'Tuti Suciana', '084562456', 'email214@gmail.com'),
(232, 'Muhammad Ichsan', '081167855', 'email215@gmail.com'),
(233, 'Fauzi Tejo', '0881243562', 'email216@gmail.com'),
(234, 'Luqman Hakim', '0845643256', 'email217@gmail.com'),
(235, 'Galih', '0856432563', 'email218@gmail.com'),
(236, 'Mahfud', '081432525', 'email219@gmail.com'),
(237, 'Irianita', '088672352', 'email220@gmail.com'),
(238, 'Zuanita', '082378453', 'email221@gmail.com'),
(239, 'Asmara', '08958126784', 'email222@gmail.com'),
(240, 'Yena', '082243545', 'email223@gmail.com'),
(241, 'Novita', '0886724121', 'email224@gmail.com'),
(242, 'Darlansyah', '081167354', 'email225@gmail.com'),
(243, 'Dzulqarnain', '0867345353', 'email226@gmail.com'),
(244, 'Kaidar', '08567124455', 'email227@gmail.com'),
(245, 'Sanusi', '086767453', 'email228@gmail.com'),
(246, 'Faesal Jasmin', '0822675436', 'email229@gmail.com'),
(247, 'Achmad Zaenal', '086734535', 'email230@gmail.com'),
(248, 'Lintang', '085672345', 'email231@gmail.com'),
(249, 'Susiana Putri', '085674356', 'email232@gmail.com'),
(250, 'Anggun', '085673456', 'email233@gmail.com'),
(251, 'Nuraisyah', '088567432', 'email234@gmail.com'),
(252, 'Habibah', '0811674535', 'email235@gmail.com'),
(253, 'Shasa', '086767823', 'email236@gmail.com'),
(254, 'Suryanti', '08672345556', 'email237@gmail.com'),
(255, 'Tenri Ola', '085623556', 'email238@gmail.com'),
(256, 'Rahmat Subagja', '0856723456', 'email239@gmail.com'),
(257, 'Rusdianto', '083572345', 'email240@gmail.com'),
(258, 'Jamiluddin', '086782363', 'email241@gmail.com'),
(259, 'Angga', '086782345', 'email242@gmail.com'),
(260, 'Robi Satria', '0856712345', 'email243@gmail.com'),
(261, 'Nur Farhanah', '08562354', 'email244@gmail.com'),
(262, 'Nadia Zulkarnaen', '08126783453', 'email245@gmail.com'),
(263, 'Mei', '0867834521', 'email246@gmail.com'),
(264, 'Maemunah', '0811784935', 'email247@gmail.com'),
(265, 'Arvina', '087823452', 'email248@gmail.com'),
(266, 'Desi Fadhilah', '0886723452', 'email249@gmail.com'),
(267, 'Supriyono', '0867823462', 'email250@gmail.com'),
(268, 'Ismatullah', '0867832456', 'email251@gmail.com'),
(269, 'Muhtadi', '0867823556', 'email252@gmail.com'),
(270, 'Dicky Satrio', '089963452', 'email253@gmail.com'),
(271, 'Rifky Irfan', '084513424', 'email254@gmail.com'),
(272, 'Rian Aseggaf', '08562345323', 'email255@gmail.com'),
(273, 'Chairunisa', '0867143451', 'email256@gmail.com'),
(274, 'Kurnia', '0867814412', 'email257@gmail.com'),
(275, 'Nur Latifa', '08678142311', 'email258@gmail.com'),
(276, 'Khairunnisa', '08126734426', 'email259@gmail.com'),
(277, 'Caesar Lutfi', '0856723461', 'email260@gmail.com'),
(278, 'Satya Prasetyo', '0867813481', 'email261@gmail.com'),
(279, 'Roestam', '083478131', 'email262@gmail.com'),
(280, 'Muhamad Rudi', '0856114145', 'email264@gmail.com'),
(281, 'Doni', '085671463', 'email265@gmail.com'),
(282, 'Juhadi Akhpa', '082278234', 'email266@gmail.com'),
(283, 'Zafran Hafizki', '08117849235', 'email267@gmail.com'),
(284, 'Riski Abdurrahman', '087756723', 'email268@gmail.com'),
(285, 'Sinta Pradipta', '096782343', 'email269@gmail.com'),
(286, 'Wahidah Rahma', '08117382456', 'email270@gmail.com'),
(287, 'Abraham', '08678234562', 'email271@gmail.com'),
(288, 'Salsabilah', '08116778432', 'email272@gmail.com'),
(289, 'Kamelia', '08237845395', 'email273@gmail.com'),
(290, 'Widyawati', '0812674324', 'email274@gmail.com'),
(291, 'Gilbert Teguh', '0815924432', 'email275@gmail.com'),
(292, 'Cahya Kusuma', '0812432184', 'email276@gmail.com'),
(293, 'Ageng Sudrajat', '08997238456', 'email277@gmail.com'),
(294, 'Fadel Muhammad', '0867812345', 'email278@gmail.com'),
(295, 'Bintang', '08178349244', 'email279@gmail.com'),
(296, 'Marzuki Ali', '0811673824', 'email280@gmail.com'),
(297, 'Atiyah', '086381341', 'email281@gmail.com'),
(298, 'Dwi Utami', '08992617834', 'email282@gmail.com'),
(299, 'Rara Irawaty', '08567134', 'email283@gmail.com'),
(300, 'Reni Wulur', '0817438245', 'email284@gmail.com'),
(301, 'Apriani', '086793204', 'email285@gmail.com'),
(302, 'Nona Aprilia', '0834782351', 'email286@gmail.com'),
(303, 'Syahid', '082374835', 'email287@gmail.com'),
(304, 'Kholiq', '0862674324', 'email288@gmail.com'),
(305, 'Salahudin', '0855823945', 'email289@gmail.com'),
(306, 'Ismail', '089973284', 'email290@gmail.com'),
(307, 'Hervin Marvelino', '0838294345', 'email291@gmail.com'),
(308, 'Tembang Agustin', '0832784345', 'email292@gmail.com'),
(309, 'Marlizan', '08226783425', 'email293@gmail.com'),
(310, 'Septa Cahyadi', '0811734824', 'email294@gmail.com'),
(311, 'Rosianna', '08174839244', 'email295@gmail.com'),
(312, 'Dena Irianti', '087823445', 'email296@gmail.com'),
(313, 'Deisya Putri', '08226743824', 'email297@gmail.com'),
(314, 'Meita Permatasari', '088932422', 'email298@gmail.com'),
(315, 'Syakir Sulaiman', '081178439244', 'email299@gmail.com'),
(316, 'Glen Gilbert', '083478923', 'email300@gmail.com'),
(317, 'Ashabul Kahfi', '0811789324', 'email301@gmail.com'),
(318, 'Mulyono', '0867821345', 'email302@gmail.com'),
(319, 'Abdillah Makmur', '082278324', 'email303@gmail.com'),
(320, 'Arifin', '087823453', 'email304@gmail.com'),
(321, 'Ririn Irianti Saputri', '0811783245', 'email305@gmail.com'),
(322, 'Sevia', '087773245', 'email306@gmail.com'),
(323, 'Larasati', '0811673482', 'email307@gmail.com'),
(324, 'Nur Aini', '0867832462', 'email308@gmail.com'),
(325, 'Afifah Fayyedh', '0811674834', 'email309@gmail.com'),
(326, 'Nur Laela', '0886738245', 'email310@gmail.com'),
(327, 'Ruswan', '0822763824', 'email311@gmail.com'),
(328, 'Zulkarnain', '08117348924', 'email312@gmail.com'),
(329, 'Rizki', '0811784324', 'email313@gmail.com'),
(330, 'Cahyono', '08671238424', 'email314@gmail.com'),
(331, 'Irmawati', '08867123454', 'email315@gmail.com'),
(332, 'Iryana', '08226734824', 'email316@gmail.com'),
(333, 'Annisa', '0890178934', 'email317@gmail.com'),
(334, 'Jackson Wandik', '0832849235', 'email318@gmail.com'),
(335, 'Titalia', '082274893245', 'email319@gmail.com'),
(336, 'Mince Yawan', '08167834244', 'email320@gmail.com'),
(337, 'Ananda Putri', '0876782345', 'email321@gmail.com'),
(338, 'Marlika', '08117839245', 'email322@gmail.com'),
(339, 'Laksono', '0855783245', 'email323@gmail.com'),
(340, 'Puji Laksito', '086778325', 'email324@gmail.com'),
(341, 'Didik', '08672843824', 'email325@gmail.com'),
(342, 'Arga', '08337438924', 'email326@gmail.com'),
(343, 'Yan Pieter', '0856723552', 'email327@gmail.com'),
(344, 'Candra Buana', '0822678324', 'email328@gmail.com'),
(345, 'Laksmita', '0867832453', 'email329@gmail.com'),
(346, 'Luqman Nurdianto', '08227483924', 'email330@gmail.com'),
(347, 'Agung Firmansyah', '0867823145', 'email331@gmail.com'),
(348, 'Khairunnisa Febriani', '0832894325', 'email332@gmail.com'),
(349, 'Farizal', '08237845235', 'email333@gmail.com'),
(350, 'Noorhayati', '08212389345', 'email334@gmail.com'),
(351, 'Anugrah Wibowo', '0827843924', 'email335@gmail.com'),
(352, 'Yakobus', '0817893233', 'email336@gmail.com'),
(353, 'Sadrak Wamafma', '082274893244', 'email337@gmail.com'),
(354, 'Muhyiddin', '0873842455', 'email338@gmail.com'),
(355, 'Walid Gufran', '08723784341', 'email339@gmail.com'),
(356, 'Firdaus', '08173829344', 'email340@gmail.com'),
(357, 'Brian Aldama', '0867823454', 'email341@gmail.com'),
(358, 'Liany', '08672381741', 'email342@gmail.com'),
(359, 'Hafisah', '08227643845', 'email343@gmail.com'),
(360, 'Wulan Sukma', '0826782343', 'email344@gmail.com'),
(361, 'Ikomuddin', '0822738924', 'email345@gmail.com'),
(362, 'Ikramullah', '08226738245', 'email346@gmail.com'),
(363, 'Pandu Prawista', '0899738294', 'email347@gmail.com'),
(364, 'Galuh Irawan', '0867238452', 'email348@gmail.com'),
(365, 'Erwin', '0822672345', 'email349@gmail.com'),
(366, 'Widiyanto', '08167438445', 'email350@gmail.com'),
(367, 'Willy', '08557829344', 'email351@gmail.com'),
(368, 'Watson Tirajoh', '0899783924', 'email352@gmail.com'),
(369, 'Syahidah', '081237839244', 'email353@gmail.com'),
(370, 'Zahirah', '0863782412', 'email354@gmail.com'),
(371, 'Akbar Permana', '083892424', 'email355@gmail.com'),
(372, 'Dani Permana', '08123784234', 'email356@gmail.com'),
(373, 'Hamdiyah', '08117893024', 'email357@gmail.com'),
(374, 'Hari Susanto', '0873245124', 'email358@gmail.com'),
(375, 'Hartono', '0877783245', 'email359@gmail.com'),
(376, 'Rafi', '082178341', 'email360@gmail.com'),
(377, 'Subroto', '08227482345', 'email361@gmail.com'),
(378, 'Elyas', '0812748324', 'email362@gmail.com'),
(379, 'Ghazali', '081236721', 'email363@gmail.com'),
(380, 'Hamida Watora', '0826734824', 'email364@gmail.com'),
(381, 'Dwi Pujianti', '0823891011', 'email365@gmail.com'),
(382, 'Agus Suyono', '08763748234', 'email366@gmail.com'),
(383, 'Angger Sakti', '0855892342', 'email367@gmail.com'),
(384, 'Dimas Angga', '0833817233', 'email368@gmail.com'),
(385, 'Hafiezah', '08448239144', 'email369@gmail.com'),
(386, 'Nur Hidayat', '088862134412', 'email370@gmail.com'),
(387, 'Baskoro', '0873284242', 'email371@gmail.com'),
(388, 'Razmal', '082378934', 'email372@gmail.com'),
(389, 'Candra Bakti', '0827389244', 'email373@gmail.com'),
(390, 'Fransiskus', '08126782134', 'email374@gmail.com'),
(391, 'Chalid', '08748325345', 'email375@gmail.com'),
(392, 'Amsal', '08904332495', 'email376@gmail.com'),
(393, 'Caroline Natkime', '0823147823', 'email377@gmail.com'),
(394, 'Agustin Kencana', '08672381442', 'email378@gmail.com'),
(395, 'Rio Pangestu', '089738294', 'email379@gmail.com'),
(396, 'Suryaningsih', '08562734524', 'email380@gmail.com'),
(397, 'Azalea', '082267348423', 'email381@gmail.com'),
(398, 'Muhammad Saiful', '0874832532', 'email382@gmail.com'),
(399, 'Mamat', '087892413', 'email383@gmail.com'),
(400, 'Bismo Angger', '087671234434', 'email384@gmail.com'),
(401, 'Agustinus', '0867823451', 'email385@gmail.com'),
(402, 'Eka Putra', '0878123421', 'email386@gmail.com'),
(403, 'Taufik Hidayat', '0867234123', 'email387@gmail.com'),
(404, 'Hapsah', '08671283434', 'email388@gmail.com'),
(405, 'Roy Omincun', '086712141', 'email389@gmail.com'),
(406, 'Roslaina', '0822563714', 'email390@gmail.com'),
(407, 'Gracella', '0827893421', 'email391@gmail.com'),
(408, 'Fatimah Cahya', '0817893213', 'email392@gmail.com'),
(409, 'Andika Bahari', '082671834', 'email393@gmail.com'),
(410, 'Nur Fajri', '0823783924', 'email394@gmail.com'),
(411, 'Mochtar', '0867813411', 'email395@gmail.com'),
(412, 'Sufyan', '086782134178', 'email396@gmail.com'),
(413, 'Airlangga', '0867813451', 'email397@gmail.com'),
(414, 'Ridho', '0886718341', 'email398@gmail.com'),
(415, 'Andi Firwansyah', '0812377103', 'email399@gmail.com'),
(416, 'Ridho Mahmud', '0887174141', 'email400@gmail.com'),
(417, 'PuspaNingsih', '0857813451', 'email401@gmail.com'),
(418, 'Nurma', '0897891351', 'email402@gmail.com'),
(419, 'Dion Sinaga', '0856713511', 'email403@gmail.com'),
(420, 'Mustakim', '08418941213', 'email404@gmail.com'),
(421, 'Faridah', '0812782341', 'email405@gmail.com'),
(422, 'Bellinda', '08678131312', 'email406@gmail.com'),
(423, 'Muhammad Amir', '081167813', 'email408@gmail.com'),
(424, 'Anton Prasetyo', '0822748912321', 'email409@gmail.com'),
(425, 'Adhara Puspita', '0896783124', 'email410@gmail.com'),
(426, 'Debi Wulandari', '0876182911', 'email411@gmail.com'),
(427, 'Aditya Permana', '0867913145', 'email412@gmail.com'),
(428, 'Mukrimah Syahril', '08991783145', 'email413@gmail.com'),
(429, 'Vidya', '085589138', 'email414@gmail.com'),
(430, 'Melisa Serano', '08237901557', 'email415@gmail.com'),
(431, 'Hanifah', '0878124256', 'email416@gmail.com'),
(432, 'Raihan Putra', '0831892045', 'email417@gmail.com'),
(433, 'Ghivari Abdallah', '0812293204', 'email418@gmail.com'),
(434, 'Rani Linggar', '08892471411', 'email419@gmail.com'),
(435, 'Enrick Kaliti', '0890741944', 'email420@gmail.com'),
(436, 'Jessica Sandra', '0867824324', 'email421@gmail.com'),
(437, 'Hammam Kamil', '0856781241', 'email422@gmail.com'),
(438, 'Ummi Muklisah', '0855891315', 'email423@gmail.com'),
(439, 'Rizki Faturrahman', '0889137418', 'email424@gmail.com'),
(440, 'Rilis Artha', '088912478', 'email425@gmail.com'),
(441, 'Meddy Masen', '0878932456', 'email426@gmail.com'),
(442, 'Hardiyanti Salam', '081218492', 'email427@gmail.com'),
(443, 'Tania Evelyn', '0867813511', 'email428@gmail.com'),
(444, 'Erviana', '0811768912', 'email429@gmail.com'),
(445, 'Elvira', '0890712904', 'email430@gmail.com'),
(446, 'Andri Kurniawan', '089892342', 'email431@gmail.com'),
(447, 'Ali Wardani', '0890719422', 'email432@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori`
--

CREATE TABLE `tb_histori` (
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bagian` varchar(16) NOT NULL,
  `mr` int(11) DEFAULT NULL,
  `generasi` int(11) DEFAULT NULL,
  `cr` int(11) DEFAULT NULL,
  `kromosom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_kart` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_transaksi`, `id_kart`) VALUES
(1791, 29, 4),
(1792, 30, 5),
(1793, 31, 1),
(1794, 32, 3),
(1795, 33, 5),
(1796, 34, 3),
(1797, 35, 2),
(1798, 36, 2),
(1799, 37, 1),
(1800, 38, 6),
(1801, 39, 3),
(1802, 40, 2),
(1803, 41, 2),
(1804, 42, 2),
(1805, 43, 4),
(1806, 44, 1),
(1807, 45, 3),
(1809, 46, 2),
(1811, 47, 3),
(2730, 49, 1),
(2731, 50, 3),
(2732, 51, 2),
(2733, 53, 1),
(2734, 54, 3),
(2735, 55, 1),
(2736, 56, 4),
(2737, 57, 2),
(2738, 58, 3),
(2739, 60, 2),
(2740, 63, 3),
(2741, 64, 3),
(2742, 65, 1),
(2743, 66, 4),
(2744, 67, 1),
(2745, 72, 2),
(2746, 73, 2),
(2747, 74, 1),
(2748, 75, 2),
(2749, 76, 3),
(2750, 77, 4),
(2751, 78, 2),
(2752, 79, 2),
(2753, 80, 4),
(2754, 81, 3),
(2755, 82, 1),
(2756, 83, 2),
(2757, 84, 1),
(2758, 85, 4),
(2759, 86, 2),
(2760, 87, 3),
(2761, 88, 2),
(2762, 89, 4),
(2763, 90, 2),
(2764, 91, 3),
(2765, 92, 4),
(2766, 93, 1),
(2767, 94, 4),
(2768, 95, 2),
(2769, 96, 2),
(2770, 97, 3),
(2771, 98, 3),
(2772, 99, 4),
(2773, 100, 2),
(2774, 101, 2),
(2775, 102, 1),
(2776, 103, 3),
(2777, 104, 3),
(2778, 105, 2),
(2779, 106, 3),
(2780, 107, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jam`
--

CREATE TABLE `tb_jam` (
  `id_jam` int(11) NOT NULL,
  `nm_jam` varchar(255) DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jam`
--

INSERT INTO `tb_jam` (`id_jam`, `nm_jam`, `mulai`, `selesai`) VALUES
(1, 'Sesi 1', '13:00:00', '13:15:00'),
(2, 'Sesi 2', '13:15:00', '13:30:00'),
(3, 'Sesi 3', '13:30:00', '13:45:00'),
(5, 'Sesi 4', '13:45:00', '14:00:00'),
(6, 'Sesi 5', '14:00:00', '14:15:00'),
(7, 'Sesi 6', '14:15:00', '14:30:00'),
(8, 'Sesi 7', '14:30:00', '14:45:00'),
(9, 'Sesi 8', '14:45:00', '15:00:00'),
(10, 'Sesi 9', '15:00:00', '15:15:00'),
(11, 'Sesi 10', '15:15:00', '15:30:00'),
(12, 'Sesi 11', '15:30:00', '15:45:00'),
(13, 'Sesi 12', '15:45:00', '16:00:00'),
(14, 'Sesi 13', '16:00:00', '16:15:00'),
(15, 'Sesi 14', '16:15:00', '16:30:00'),
(16, 'Sesi 15', '16:30:00', '16:45:00'),
(17, 'Sesi 16', '16:45:00', '17:00:00'),
(18, 'Sesi 17', '17:00:00', '17:15:00'),
(19, 'Sesi 18', '17:15:00', '17:30:00'),
(20, 'Sesi 19', '17:30:00', '17:45:00'),
(21, 'Sesi 19', '17:45:00', '18:00:00'),
(22, 'Sesi 20', '18:00:00', '18:15:00'),
(23, 'Sesi 21', '18:15:00', '18:30:00'),
(24, 'Sesi 22', '18:30:00', '18:45:00'),
(25, 'Sesi 23', '18:45:00', '19:00:00'),
(26, 'Sesi 24', '19:00:00', '19:15:00'),
(27, 'Sesi 25', '19:15:00', '19:30:00'),
(28, 'Sesi 26', '19:30:00', '19:45:00'),
(29, 'Sesi 27', '19:45:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kart`
--

CREATE TABLE `tb_kart` (
  `id_kart` int(11) NOT NULL,
  `nm_kart` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kart`
--

INSERT INTO `tb_kart` (`id_kart`, `nm_kart`) VALUES
(1, 'Kart 1'),
(2, 'Kart 2'),
(3, 'Kart 3'),
(4, 'Kart 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_cust` varchar(16) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_cust`, `tanggal`, `id_jam`, `harga`, `keterangan`) VALUES
(49, '1', '2022-03-01', 1, 0, 'Payment'),
(50, '1', '2022-03-01', 2, 0, 'Payment'),
(51, '14', '2022-03-01', 1, 0, 'Payment'),
(53, '15', '2022-03-01', 1, 0, 'Payment'),
(54, '13', '2022-03-01', 1, 0, 'Payment'),
(55, '15', '2022-03-01', 2, 0, 'Payment'),
(56, '18', '2022-03-01', 2, 0, 'Payment'),
(57, '19', '2022-03-01', 2, 0, 'Payment'),
(58, '21', '2022-03-01', 3, 0, 'Payment'),
(60, '21', '2022-03-01', 5, 0, 'Payment'),
(63, '25', '2022-03-01', 5, 0, 'Payment'),
(64, '25', '2022-03-01', 6, 0, 'Payment'),
(65, '24', '2022-03-01', 6, 0, 'Payment'),
(66, '23', '2022-03-01', 6, 0, 'Payment'),
(67, '25', '2022-03-01', 7, 0, 'Payment'),
(72, '16', '2022-03-01', 9, 0, 'Payment'),
(73, '16', '2022-03-01', 10, 0, 'Payment'),
(74, '20', '2022-03-01', 11, 0, 'Payment'),
(75, '46', '2022-03-01', 11, 0, 'Payment'),
(76, '45', '2022-03-01', 11, 0, 'Payment'),
(77, '60', '2022-03-01', 11, 0, 'Payment'),
(78, '45', '2022-03-01', 12, 0, 'Payment'),
(79, '29', '2022-03-01', 15, 0, 'Payment'),
(80, '30', '2022-03-01', 15, 0, 'Payment'),
(81, '29', '2022-03-01', 16, 0, 'Payment'),
(82, '30', '2022-03-01', 16, 0, 'Payment'),
(83, '31', '2022-03-01', 18, 0, 'Payment'),
(84, '35', '2022-03-01', 18, 0, 'Payment'),
(85, '40', '2022-03-01', 23, 0, 'Payment'),
(86, '53', '2022-03-01', 23, 0, 'Payment'),
(87, '59', '2022-03-01', 23, 0, 'Payment'),
(88, '42', '2022-03-01', 23, 0, 'Payment'),
(89, '59', '2022-03-01', 24, 0, 'Payment'),
(90, '53', '2022-03-01', 24, 0, 'Payment'),
(91, '42', '2022-03-01', 24, 0, 'Payment'),
(92, '40', '2022-03-01', 24, 0, 'Payment'),
(93, '58', '2022-03-01', 27, 0, 'Payment'),
(94, '56', '2022-03-01', 27, 0, 'Payment'),
(95, '57', '2022-03-01', 27, 0, 'Payment'),
(96, '55', '2022-03-01', 27, 0, 'Payment'),
(97, '48', '2022-03-01', 27, 0, 'Payment'),
(98, '54', '2022-03-01', 27, 0, 'Payment'),
(99, '48', '2022-03-01', 28, 0, 'Payment'),
(100, '54', '2022-03-01', 28, 0, 'Payment'),
(101, '28', '2022-03-01', 30, 0, 'Payment'),
(102, '36', '2022-03-01', 30, 0, 'Payment'),
(103, '47', '2022-03-01', 30, 0, 'Payment'),
(104, '37', '2022-03-01', 30, 0, 'Payment'),
(105, '38', '2022-03-01', 30, 0, 'Payment'),
(106, '41', '2022-03-01', 31, 0, 'Payment'),
(107, '34', '2022-03-01', 31, 0, 'Payment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`bulan`,`tahun`,`bagian`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_jam`
--
ALTER TABLE `tb_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `tb_kart`
--
ALTER TABLE `tb_kart`
  ADD PRIMARY KEY (`id_kart`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2781;

--
-- AUTO_INCREMENT for table `tb_jam`
--
ALTER TABLE `tb_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_kart`
--
ALTER TABLE `tb_kart`
  MODIFY `id_kart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
