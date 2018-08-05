-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 04:00 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule_atlantykron`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `id_teacher` varchar(50) NOT NULL,
  `name_ro` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `language` int(2) NOT NULL COMMENT '1-Ro, 2-En'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `id_teacher`, `name_ro`, `name_en`, `language`) VALUES
(1, '1', 'Curs de prim ajutor', 'Basic Life Support', 1),
(2, '1,58', 'Comunicatii Radio - Workshop Do It Yourself cu Arduino', '', 1),
(3, '3', 'Comunicatii Radio - Legaturi la mare distanta', '', 1),
(4, '4', 'Comunicatii Radio - Legaturi pe sateliti', '', 1),
(5, '56,57', 'Comunicatii Radio - Vanatoare de vulpi', '', 1),
(6, '6', 'Comunicatii Radio - Comunicatii radio in viata de zi cu zi', '', 1),
(7, '54,55', 'Comunicatii Radio - Simulari si demonstratii de legaturi', '', 1),
(8, '8', 'Comunicatii Radio - Mini curs DJ - radio', '', 1),
(9, '9', 'Comunicatii Radio - Constructii de antene', '', 1),
(10, '10', 'Comunicatii Radio - Comunicatii radio utilitare si in situatii de urgenta', '', 1),
(11, '11', 'Comunicatii Radio - Introducere in electronica analogica', '', 1),
(12, '12', 'Securitatea informatiei - intre mit si realitate', '', 1),
(15, '14', 'Inelul de Piatră – AtlantyCronica – cotidian de informare pe parcursul taberei', '', 1),
(16, '15', 'Dartz', '', 1),
(17, '15', 'Badminton', '', 1),
(18, '15', 'Şah', '', 1),
(19, '15', 'Tir cu arcul', '', 1),
(20, '15', 'Volei', '', 1),
(21, '15', 'SPORT ŞI COMPETIŢIE', '', 1),
(22, '16', 'Drumul spre noi insine prin proprioceptie', '', 1),
(23, '16', 'Exercitii de dezvoltare a autocontrolului', '', 1),
(24, '16', 'Exercitii pentru corectare posturala a coloanei vertebrale(durere)', '', 1),
(25, '27,50', '100 de ani in 100 de carti de SF', '', 1),
(26, '18', 'Tehnici de comunicare - Toti stim să vorbim, dar stim şi să comunicam?', '', 1),
(27, '21', 'Pictura de Şevalet', '', 1),
(28, '20', 'Autocunoastere, dezvoltare personala si remodelare psihosomatica', '', 1),
(29, '20', 'Arte martiale - De la QI QONG la JU-JITSU', '', 1),
(30, '20', 'Sesiunea Reiki - Gradul I', '', 1),
(31, '20', 'Seminarul \"Meditatia cu flacara violeta\"', '', 1),
(32, '18', 'Bitcoin si cryptomonede', '', 1),
(33, '15', 'Fotbal american', '', 1),
(34, '15', 'Skandemberg (In timpul primei ploi)', '', 1),
(35, '25', 'Mic dejun', 'Breakfast', 1),
(36, '25', 'Pranz', 'Lunch', 1),
(37, '25', 'Cina', 'Dinner', 1),
(38, '26', 'Program de seara', '', 1),
(39, '27', 'Film artistic', '', 1),
(40, '26', 'Deschiderea Academiei Atlantykron', 'Opening of Atlantykron Academy', 1),
(41, '28', 'Vindecare Holistica si Kinesiologie', '', 2),
(42, '29', 'Curs de initiere in Kaiac', '', 1),
(43, '52,53', 'Biology road: amazing science experiments', '', 1),
(44, '23', 'Cartea ca obiect', '', 1),
(45, '31', 'Seminar socratic', '', 1),
(46, '31', 'Seminar de invatare reciproca', '', 1),
(47, '32', 'Self - Healing', '', 2),
(48, '14,33', 'POEM GATE – GPS – Atelier de Creatie Literara – Poezie', '', 1),
(49, '14,33', 'Radio INELUL DE PIATRĂ 100', '', 1),
(50, '19,26', '100 de idei Science Fiction in 100 de ani care au devenit realitate', '', 1),
(51, '24,51', 'Atelierul de creatie Noel Art', '', 1),
(52, '38', 'Atelier de fotografie', '', 1),
(53, '22', 'Atelier de creatie a mastilor – CENTENARIUM', '', 1),
(54, '47,48,49', '\"Prin labirintul vietii\" - Conferinta zilei', '', 1),
(55, '20', 'Sesiunea Reiki - Gradul II', '', 1),
(56, '20', 'Sesiunea Reiki - Gradul III', '', 1),
(58, '19', 'Tehnici de creatie si de scriere a basmului', '', 1),
(59, '47,48,49', '\"Intrebari si raspunsuri pentru lumea de azi si lumea de maine\" - Conferinta zilei', '', 1),
(60, '25', 'Balul Babaciunilor', 'Party hard on the \'80s', 1),
(61, '41', 'Chi Gong', '', 2),
(62, '32', 'Chinese face reading', '', 2),
(63, '43', 'Fabrica de roboti', '', 1),
(64, '44', '\"Energia viitorului, viitorul energiei\" - Conferinta zilei', '', 1),
(65, '45', '\"Noutati despre O.Z.N.-uri\" - Conferinta zilei', '', 1),
(66, '32', 'Mediumship, telepathy and ghosts', '', 2),
(67, '41', '\"Romania sacra\" - Conferinta zilei', '', 2),
(68, '46', '\"Umanismul transformarii\" - Conferinta zilei', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id_class_schedule` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `id_day` int(11) NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id_class_schedule`, `id_class`, `id_location`, `id_day`, `start_hour`, `end_hour`) VALUES
(1, 28, 5, 1, '17:00:00', '19:00:00'),
(2, 35, 12, 1, '08:00:00', '11:00:00'),
(3, 36, 12, 1, '14:00:00', '16:00:00'),
(4, 37, 12, 1, '19:00:00', '21:00:00'),
(5, 39, 9, 1, '23:30:00', '01:30:00'),
(6, 40, 9, 1, '21:00:00', '23:30:00'),
(7, 42, 17, 1, '17:00:00', '19:30:00'),
(8, 42, 17, 2, '09:00:00', '11:30:00'),
(9, 42, 17, 2, '17:00:00', '19:30:00'),
(10, 42, 17, 3, '09:00:00', '11:30:00'),
(11, 44, 7, 3, '15:00:00', '17:00:00'),
(12, 44, 7, 4, '15:00:00', '17:00:00'),
(13, 44, 7, 5, '15:00:00', '17:00:00'),
(14, 51, 4, 2, '09:30:00', '11:30:00'),
(15, 51, 4, 3, '09:30:00', '11:30:00'),
(16, 51, 4, 4, '09:30:00', '11:30:00'),
(17, 28, 5, 2, '17:00:00', '19:00:00'),
(18, 28, 5, 3, '17:00:00', '19:00:00'),
(19, 28, 5, 4, '17:00:00', '19:00:00'),
(20, 54, 9, 2, '12:00:00', '14:00:00'),
(21, 29, 8, 2, '10:00:00', '11:30:00'),
(22, 29, 8, 3, '10:00:00', '11:30:00'),
(23, 29, 8, 4, '10:00:00', '11:30:00'),
(24, 56, 8, 5, '11:00:00', '12:30:00'),
(25, 30, 8, 5, '16:30:00', '18:00:00'),
(26, 55, 8, 5, '18:00:00', '19:30:00'),
(27, 31, 18, 6, '18:00:00', '20:00:00'),
(28, 26, 7, 3, '16:30:00', '18:00:00'),
(29, 26, 7, 4, '15:00:00', '16:30:00'),
(30, 32, 7, 5, '14:00:00', '15:30:00'),
(31, 32, 7, 6, '15:00:00', '16:30:00'),
(32, 53, 4, 3, '10:00:00', '14:30:00'),
(33, 53, 4, 4, '10:00:00', '14:30:00'),
(34, 53, 4, 5, '10:00:00', '14:30:00'),
(35, 53, 4, 6, '10:00:00', '14:30:00'),
(36, 35, 12, 2, '08:00:00', '11:00:00'),
(37, 36, 12, 2, '14:00:00', '16:00:00'),
(38, 37, 12, 2, '19:00:00', '21:00:00'),
(39, 39, 9, 2, '23:30:00', '01:30:00'),
(40, 7, 2, 3, '10:00:00', '12:00:00'),
(41, 7, 2, 4, '10:00:00', '12:00:00'),
(42, 3, 2, 3, '14:00:00', '16:00:00'),
(43, 3, 2, 4, '14:00:00', '16:00:00'),
(44, 5, 2, 3, '14:00:00', '16:00:00'),
(45, 5, 2, 4, '14:00:00', '16:00:00'),
(46, 25, 9, 2, '09:30:00', '10:30:00'),
(47, 25, 9, 3, '09:30:00', '10:30:00'),
(48, 11, 2, 5, '14:00:00', '17:00:00'),
(49, 11, 2, 6, '14:00:00', '17:00:00'),
(50, 11, 2, 7, '14:00:00', '17:00:00'),
(51, 22, 14, 2, '10:00:00', '12:00:00'),
(52, 22, 14, 3, '10:00:00', '12:00:00'),
(53, 22, 14, 4, '10:00:00', '12:00:00'),
(54, 22, 14, 5, '10:00:00', '12:00:00'),
(55, 22, 14, 6, '10:00:00', '12:00:00'),
(56, 22, 14, 7, '10:00:00', '12:00:00'),
(57, 22, 14, 8, '10:00:00', '12:00:00'),
(58, 23, 14, 2, '15:00:00', '18:00:00'),
(59, 23, 14, 3, '15:00:00', '18:00:00'),
(60, 23, 14, 4, '15:00:00', '18:00:00'),
(61, 23, 14, 5, '15:00:00', '18:00:00'),
(62, 23, 14, 6, '15:00:00', '18:00:00'),
(63, 23, 14, 7, '15:00:00', '18:00:00'),
(64, 23, 14, 8, '15:00:00', '18:00:00'),
(65, 15, 3, 2, '09:00:00', '09:30:00'),
(66, 15, 3, 3, '09:00:00', '09:30:00'),
(67, 49, 2, 2, '14:00:00', '15:00:00'),
(68, 49, 2, 3, '14:00:00', '15:00:00'),
(69, 48, 3, 2, '16:00:00', '17:00:00'),
(70, 48, 3, 3, '16:00:00', '17:00:00'),
(71, 20, 8, 3, '16:00:00', '18:00:00'),
(72, 34, 12, 2, '16:00:00', '18:00:00'),
(73, 34, 12, 3, '16:00:00', '18:00:00'),
(74, 34, 12, 8, '16:00:00', '18:00:00'),
(75, 34, 12, 5, '16:00:00', '18:00:00'),
(76, 34, 12, 6, '16:00:00', '18:00:00'),
(77, 34, 12, 7, '16:00:00', '18:00:00'),
(78, 34, 12, 8, '16:00:00', '18:00:00'),
(79, 16, 12, 2, '16:00:00', '18:00:00'),
(80, 16, 12, 3, '16:00:00', '18:00:00'),
(81, 16, 12, 4, '16:00:00', '18:00:00'),
(82, 16, 12, 5, '16:00:00', '18:00:00'),
(83, 16, 12, 6, '16:00:00', '18:00:00'),
(84, 16, 12, 7, '16:00:00', '18:00:00'),
(85, 16, 12, 8, '16:00:00', '18:00:00'),
(86, 18, 12, 4, '16:00:00', '18:00:00'),
(87, 19, 8, 2, '16:00:00', '18:00:00'),
(88, 17, 8, 6, '16:00:00', '18:00:00'),
(89, 33, 8, 7, '16:00:00', '18:00:00'),
(90, 59, 9, 3, '12:00:00', '14:00:00'),
(91, 38, 9, 3, '21:00:00', '23:30:00'),
(92, 39, 9, 3, '23:30:00', '01:30:00'),
(93, 35, 12, 3, '08:00:00', '11:00:00'),
(94, 36, 12, 3, '14:00:00', '16:00:00'),
(95, 37, 12, 3, '19:00:00', '21:00:00'),
(96, 27, 4, 2, '10:00:00', '13:00:00'),
(97, 27, 4, 3, '10:00:00', '13:00:00'),
(98, 27, 4, 4, '10:00:00', '13:00:00'),
(99, 27, 4, 5, '10:00:00', '13:00:00'),
(100, 27, 4, 6, '10:00:00', '13:00:00'),
(101, 24, 14, 2, '15:00:00', '18:00:00'),
(102, 24, 14, 3, '15:00:00', '18:00:00'),
(103, 24, 14, 4, '15:00:00', '18:00:00'),
(104, 24, 14, 5, '15:00:00', '18:00:00'),
(105, 24, 14, 6, '15:00:00', '18:00:00'),
(106, 24, 14, 7, '15:00:00', '18:00:00'),
(107, 12, 4, 3, '14:30:00', '16:30:00'),
(108, 12, 4, 4, '14:30:00', '16:30:00'),
(109, 12, 4, 5, '14:30:00', '16:30:00'),
(110, 58, 4, 3, '09:30:00', '11:00:00'),
(111, 58, 4, 4, '09:30:00', '11:00:00'),
(112, 58, 4, 5, '09:30:00', '10:00:00'),
(113, 58, 4, 6, '09:30:00', '11:00:00'),
(114, 52, 7, 2, '16:00:00', '18:00:00'),
(115, 52, 12, 3, '16:00:00', '18:00:00'),
(116, 52, 12, 4, '16:00:00', '18:00:00'),
(117, 52, 12, 5, '16:00:00', '18:00:00'),
(118, 52, 12, 6, '16:00:00', '18:00:00'),
(119, 52, 12, 7, '16:00:00', '18:00:00'),
(120, 49, 2, 4, '14:00:00', '15:00:00'),
(121, 49, 2, 5, '14:00:00', '15:00:00'),
(122, 49, 2, 6, '14:00:00', '15:00:00'),
(123, 49, 2, 7, '14:00:00', '15:00:00'),
(124, 35, 12, 4, '08:00:00', '11:00:00'),
(125, 35, 12, 5, '08:00:00', '11:00:00'),
(126, 35, 12, 6, '08:00:00', '11:00:00'),
(127, 35, 12, 7, '08:00:00', '11:00:00'),
(128, 35, 12, 8, '08:00:00', '11:00:00'),
(129, 36, 12, 4, '14:00:00', '16:00:00'),
(130, 36, 12, 5, '14:00:00', '16:00:00'),
(131, 36, 12, 6, '14:00:00', '16:00:00'),
(132, 36, 12, 7, '14:00:00', '16:00:00'),
(133, 36, 12, 8, '14:00:00', '16:00:00'),
(134, 37, 12, 4, '19:00:00', '21:00:00'),
(135, 37, 12, 5, '19:00:00', '21:00:00'),
(136, 37, 12, 6, '19:00:00', '21:00:00'),
(137, 37, 12, 7, '19:00:00', '21:00:00'),
(138, 37, 12, 8, '19:00:00', '21:00:00'),
(139, 39, 9, 4, '23:30:00', '01:30:00'),
(140, 39, 9, 5, '23:30:00', '01:30:00'),
(141, 39, 9, 7, '23:30:00', '01:30:00'),
(142, 25, 9, 4, '09:45:00', '10:45:00'),
(143, 25, 9, 5, '09:45:00', '10:45:00'),
(144, 25, 9, 6, '09:45:00', '10:45:00'),
(145, 25, 9, 7, '09:45:00', '10:45:00'),
(146, 38, 9, 4, '21:00:00', '23:30:00'),
(147, 38, 9, 5, '21:00:00', '23:30:00'),
(148, 38, 9, 6, '21:00:00', '23:30:00'),
(149, 38, 9, 7, '21:00:00', '23:30:00'),
(150, 38, 9, 8, '21:00:00', '23:30:00'),
(151, 60, 9, 6, '23:30:00', '02:00:00'),
(152, 1, 1, 4, '15:00:00', '17:00:00'),
(153, 1, 1, 5, '15:00:00', '17:00:00'),
(154, 1, 1, 6, '15:00:00', '17:00:00'),
(155, 61, 9, 4, '08:45:00', '09:45:00'),
(156, 61, 9, 4, '18:00:00', '19:00:00'),
(158, 64, 9, 4, '12:00:00', '14:00:00'),
(159, 63, 19, 4, '10:00:00', '11:00:00'),
(160, 65, 9, 5, '12:00:00', '14:00:00'),
(161, 50, 5, 5, '16:00:00', '17:30:00'),
(162, 50, 5, 6, '16:00:00', '17:30:00'),
(163, 47, 6, 5, '15:00:00', '17:00:00'),
(165, 61, 9, 5, '08:45:00', '09:45:00'),
(166, 63, 19, 5, '10:00:00', '11:00:00'),
(167, 63, 19, 6, '10:00:00', '11:00:00'),
(168, 63, 19, 7, '10:00:00', '11:00:00'),
(169, 61, 9, 5, '18:00:00', '19:00:00'),
(170, 2, 2, 5, '09:00:00', '11:00:00'),
(171, 2, 2, 6, '09:00:00', '11:00:00'),
(172, 2, 2, 7, '09:00:00', '11:00:00'),
(173, 66, 8, 6, '11:00:00', '13:00:00'),
(174, 67, 9, 6, '12:00:00', '14:00:00'),
(175, 20, 8, 6, '15:00:00', '18:00:00'),
(176, 68, 9, 7, '12:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `name`) VALUES
(1, 'Cortul Medical (12)'),
(2, 'Cortul Radio (8)'),
(3, 'De la A la Z (zona corturi Adsum)'),
(4, 'Bacul Alpha (5)'),
(5, 'Bacul Beta (5)'),
(6, 'Bacul Gamma (5)'),
(7, 'Bacul Delta (5)'),
(8, 'Arena (17)'),
(9, 'Scena (11)'),
(10, 'Plaja (18)'),
(11, 'La pietre (9)'),
(12, 'Cantina (3)'),
(13, 'Insula mica'),
(14, 'Langa cortul radio Cort CDPU'),
(15, 'Centrul astronomic (10)'),
(16, 'Paturica SF (7)'),
(17, 'Langa debarcaderul scurt'),
(18, 'Cetatea Capidava'),
(19, 'Cortul verde (spre scena)');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_day`
--

CREATE TABLE `schedule_day` (
  `id_schedule_day` int(11) NOT NULL,
  `id_schedule_year` int(11) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_day`
--

INSERT INTO `schedule_day` (`id_schedule_day`, `id_schedule_year`, `timestamp`) VALUES
(1, 1, '07/28/2018'),
(2, 1, '07/29/2018'),
(3, 1, '07/30/2018'),
(4, 1, '07/31/2018'),
(5, 1, '08/01/2018'),
(6, 1, '08/02/2018'),
(7, 1, '08/03/2018'),
(8, 1, '08/04/2018');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_year`
--

CREATE TABLE `schedule_year` (
  `id_schedule_year` int(11) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_year`
--

INSERT INTO `schedule_year` (`id_schedule_year`, `year`) VALUES
(1, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `name`, `email`) VALUES
(1, 'Gabi Valsan', ''),
(3, 'Bogdan Petcu', ''),
(4, 'Bogdan Handrabura', ''),
(6, 'Alexandra Adam', ''),
(8, 'Dan Vizotiu', ''),
(9, 'Mihai Stanca', ''),
(10, 'Serban Motoiu', ''),
(11, 'Marian Petrescu', ''),
(12, 'Mihai Oprea', ''),
(13, 'Gabriel Pusca', ''),
(14, 'Adina Stoicescu', ''),
(15, 'Repanovici Francisc', ''),
(16, 'Pierre Joseph de Hillerin', ''),
(18, 'Bruno Medicina', ''),
(19, 'Aurel Carasel', ''),
(20, 'Teodor Vasile', ''),
(21, 'Valentin Ionescu', ''),
(22, 'Cristina Repanovici', ''),
(23, 'Ana Creanga', ''),
(24, 'Theodora Vasile', ''),
(25, '-', ''),
(26, 'Sorin Repanovici', ''),
(27, 'Cristina Ghidoveanu', ''),
(28, 'Alan Hutchins', ''),
(29, 'Asociatia Clubul Nautic Roman', ''),
(31, 'Bogdan Ioan', ''),
(32, 'Joan Roth', ''),
(33, 'Lupisor', ''),
(38, 'Maria Silvia – Nae', ''),
(40, 'Invitatii Atlantykron', ''),
(41, 'Peter Moon', ''),
(43, 'Stefan Bedreag', ''),
(44, 'Specialistii de la centrala nucleara', ''),
(45, 'Dan Farcas', ''),
(46, 'Mihaela Muraru - Mandrea', ''),
(47, 'Leon Zagrean', ''),
(48, 'Radu Dop', ''),
(49, 'Alexandru Mironov', ''),
(50, 'Cătălin Badea-Gheracostea', ''),
(51, 'Dorlin Alessandra Vasile', ''),
(52, 'Olivia Macovei', ''),
(53, 'Patricia - Ruxandra Mihai', ''),
(54, 'Cosmina Miu', ''),
(55, 'Sorin Pop', ''),
(56, 'Laura Grigore', ''),
(57, 'Madalina Adam', ''),
(58, 'Ana Dragan', ''),
(59, 'Gabriel Grosu', ''),
(60, 'Mihai Ciorbaru', '');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `user_type`, `created`) VALUES
(1, '0b4256779d7e5f42d0bd4ca31e848f', 1, '', '2018-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `register_date` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `role`, `status`, `register_date`, `last_login`) VALUES
(1, 'Florea', 'Mihai', 'fmihayi@yahoo.com', 'sha256:1000:VQgTycQCrBWwjw0tRSz1tXd83a7vdiHA:SSXIDS6a0Ns2+m97HBzCYWFLUK++Oa9c', 'subscriber', 'approved', '', '2018-07-28 10:25:52 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id_class_schedule`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `schedule_day`
--
ALTER TABLE `schedule_day`
  ADD PRIMARY KEY (`id_schedule_day`);

--
-- Indexes for table `schedule_year`
--
ALTER TABLE `schedule_year`
  ADD PRIMARY KEY (`id_schedule_year`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id_class_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `schedule_day`
--
ALTER TABLE `schedule_day`
  MODIFY `id_schedule_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `schedule_year`
--
ALTER TABLE `schedule_year`
  MODIFY `id_schedule_year` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
