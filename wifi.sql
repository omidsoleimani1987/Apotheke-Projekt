-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 08:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wifi`
--

-- --------------------------------------------------------

--
-- Table structure for table `apomedica_2020_juni_26_xlsx`
--

CREATE TABLE `apomedica_2020_juni_26_xlsx` (
  `id` int(6) UNSIGNED NOT NULL,
  `pzn` varchar(255) DEFAULT NULL,
  `Bezeichnung` varchar(255) DEFAULT NULL,
  `Menge` varchar(255) DEFAULT NULL,
  `Einheit` varchar(255) DEFAULT NULL,
  `adler_k` varchar(255) DEFAULT NULL,
  `billroth_k` varchar(255) DEFAULT NULL,
  `citygate_k` varchar(255) DEFAULT NULL,
  `hoffnung_k` varchar(255) DEFAULT NULL,
  `retz_k` varchar(255) DEFAULT NULL,
  `wienerberg_k` varchar(255) DEFAULT NULL,
  `phönix_k` varchar(255) DEFAULT NULL,
  `kwizda_k` varchar(255) DEFAULT NULL,
  `herba_k` varchar(255) DEFAULT NULL,
  `Summe_k` varchar(255) DEFAULT NULL,
  `phönix_prozent` varchar(255) DEFAULT NULL,
  `kwizda_prozent` varchar(255) DEFAULT NULL,
  `herba_prozent` varchar(255) DEFAULT NULL,
  `adler_v` varchar(255) DEFAULT NULL,
  `billroth_v` varchar(255) DEFAULT NULL,
  `citygate_v` varchar(255) DEFAULT NULL,
  `hoffnung_v` varchar(255) DEFAULT NULL,
  `retz_v` varchar(255) DEFAULT NULL,
  `wienerberg_v` varchar(255) DEFAULT NULL,
  `phönix_v` varchar(255) DEFAULT NULL,
  `kwizda_v` varchar(255) DEFAULT NULL,
  `herba_v` varchar(255) DEFAULT NULL,
  `Summe_v` varchar(255) DEFAULT NULL,
  `Ablauf` varchar(255) DEFAULT NULL,
  `Viel` varchar(255) DEFAULT NULL,
  `Kaput` varchar(255) DEFAULT NULL,
  `Andere` varchar(255) DEFAULT NULL,
  `Datum` varchar(255) DEFAULT NULL,
  `Charge` varchar(255) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apomedica_2020_juni_26_xlsx`
--

INSERT INTO `apomedica_2020_juni_26_xlsx` (`id`, `pzn`, `Bezeichnung`, `Menge`, `Einheit`, `adler_k`, `billroth_k`, `citygate_k`, `hoffnung_k`, `retz_k`, `wienerberg_k`, `phönix_k`, `kwizda_k`, `herba_k`, `Summe_k`, `phönix_prozent`, `kwizda_prozent`, `herba_prozent`, `adler_v`, `billroth_v`, `citygate_v`, `hoffnung_v`, `retz_v`, `wienerberg_v`, `phönix_v`, `kwizda_v`, `herba_v`, `Summe_v`, `Ablauf`, `Viel`, `Kaput`, `Andere`, `Datum`, `Charge`, `register_date`) VALUES
(1, '987880', 'APOZEMA TR NR 10 BLUTHOCHDR.', '50', 'ML', '0', '0', '3', '0', '0', '4', '0', '0', '0', '7', '', '', '', NULL, NULL, '3', NULL, NULL, '4', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, '724', '193457', '2020-06-08 10:54:18'),
(2, '987816', 'APOZEMA TR NR 11 BLUTNIEDERD', '50', 'ML', '0', '0', '0', '0', '0', '4', '0', '0', '0', '4', '', '', '', NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, '324', '191542', '2020-06-08 10:54:42'),
(3, '987934', 'APOZEMA TR NR 18 HERZ/KREISL', '50', 'ML', '0', '0', '2', '0', '0', '5', '0', '0', '0', '7', '', '', '', NULL, NULL, '2', NULL, NULL, '5', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, '724', '193352', '2020-06-08 10:53:42'),
(4, '987905', 'APOZEMA TR NR 30 SCHWINDEL', '50', 'ML', '0', '0', '2', '0', '0', '0', '0', '0', '64', '66', '', '', '', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, '64', '66', NULL, NULL, NULL, NULL, '1024', '194754', '2020-06-09 07:04:02'),
(5, '980932', 'APOZEMA TR NR 35 VENEN', '50', 'ML', '0', '0', '0', '0', '0', '0', '0', '0', '32', '32', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', '32', NULL, NULL, NULL, NULL, '823', '183633', '2020-06-08 10:52:05'),
(6, '3543103', 'BABY-LUUF AETH.OEL BLS', '30', 'G', '0', '15', '24', '0', '40', '5', '0', '0', '0', '84', '', '', '', NULL, '15', '24', NULL, '39', '5', NULL, NULL, NULL, '83', NULL, NULL, NULL, NULL, '922', '194098C', '2020-06-08 12:01:50'),
(7, '3516135', 'DR.BOEHM ARTISCHOCKE DRG 450', '30', 'ST', '0', '5', '20', '15', '0', '5', '0', '0', '0', '45', '', '', '', NULL, '5', '20', '15', NULL, '5', NULL, NULL, NULL, '45', NULL, NULL, NULL, NULL, '222', '191313', '2020-06-08 10:43:56'),
(8, '2635197', 'DR.BOEHM BASEN TBL PLUS', '60', 'ST', '0', '0', '11', '0', '5', '0', '0', '0', '0', '16', '', '', '', NULL, NULL, '11', NULL, '5', NULL, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, '322', '191417A', '2020-06-08 11:41:56'),
(9, '4830187', 'DR.BOEHM CRANBER.AKUT BRGRAN', '10', 'ST', '0', '0', '12', '0', '0', '9', '0', '0', '0', '21', '', '', '', NULL, NULL, '12', NULL, NULL, '9', NULL, NULL, NULL, '21', NULL, NULL, NULL, NULL, '622', '200208', '2020-06-08 11:10:15'),
(10, '4846030', 'DR.BOEHM CRANBERRY COMPL.TBL', '30', 'ST', '3', '0', '10', '0', '5', '3', '0', '0', '128', '149', '', '', '', '3', NULL, '10', NULL, '5', '3', NULL, NULL, '128', '149', NULL, NULL, NULL, NULL, '1122', '195005A', '2020-06-09 06:43:13'),
(11, '4463205', 'DR.BOEHM DAMIANA FTBL 225MG', '60', 'ST', '0', '0', '0', '3', '0', '0', '0', '0', '0', '3', '', '', '', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, '1122', '195110', '2020-06-08 11:33:22'),
(12, '4995623', 'DR.BOEHM DRG EIN/DURCHS.AKUT', '30', 'ST', '0', '0', '0', '0', '0', '0', '0', '0', '270', '270', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '270', '270', NULL, NULL, NULL, NULL, '223', '201316A', '2020-06-09 06:47:07'),
(13, '4203272', 'DR.BOEHM EIN/DURCHSCHLAF DRG', '60', 'ST', '5', '0', '40', '21', '30', '0', '0', '0', '0', '96', '', '', '', '5', NULL, '40', '21', '30', NULL, NULL, NULL, NULL, '96', NULL, NULL, NULL, NULL, '1024', '194638', '2020-06-08 10:57:24'),
(14, '3440165', 'DR.BOEHM ENERGIE COMPLEX DRG', '30', 'ST', '0', '0', '14', '2', '0', '0', '0', '0', '0', '16', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-08 10:06:23'),
(15, '4997881', 'DR.BOEHM GEDAECHTNIS AKT KPS', '30', 'ST', '3', '0', '15', '7', '30', '18', '0', '0', '0', '73', '', '', '', '3', NULL, '15', '7', '30', '18', NULL, NULL, NULL, '73', NULL, NULL, NULL, NULL, '123', '200902', '2020-06-08 11:46:33'),
(16, '4846047', 'DR.BOEHM GELENKSCOMPLEX FTBL', '60', 'ST', '20', '0', '14', '0', '0', '15', '0', '0', '0', '49', '', '', '', '20', NULL, '14', NULL, NULL, '15', NULL, NULL, NULL, '49', NULL, NULL, NULL, NULL, '1222', '200416A', '2020-06-08 13:03:02'),
(17, '4846053', 'DR.BOEHM GELENKSCOMPLEX FTBL', '120', 'ST', '0', '0', '20', '35', '15', '13', '0', '0', '0', '83', '', '', '', NULL, NULL, '20', '35', '15', '13', NULL, NULL, NULL, '83', NULL, NULL, NULL, NULL, '822', '194006A', '2020-06-08 13:08:54'),
(18, '2159710', 'DR.BOEHM GINSENG PLUS TBL', '30', 'ST', '0', '0', '2', '0', '0', '2', '0', '0', '65', '69', '', '', '', NULL, NULL, '2', NULL, NULL, '2', NULL, NULL, '65', '69', NULL, NULL, NULL, NULL, '322', '191409A', '2020-06-09 06:43:44'),
(19, '5052154', 'DR.BOEHM HAUT-HAARE-NAEG KUR', '180', 'ST', '0', '0', '0', '0', '0', '0', '0', '0', '198', '198', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '198', '198', NULL, NULL, NULL, NULL, '1022', '194689A', '2020-06-09 07:23:26'),
(20, '2696394', 'DR.BOEHM HAUT-HAARE-NAEG TBL', '60', 'ST', '6', '10', '69', '28', '50', '45', '0', '0', '63', '271', '', '', '', '6', '10', '69', '28', '50', '45', NULL, NULL, '63', '271', NULL, NULL, NULL, NULL, '1022', '194692A', '2020-06-09 08:16:28'),
(21, '4835552', 'DR.BOEHM HYALURON KOMBI', '1', 'PK', '0', '0', '17', '0', '0', '15', '0', '0', '0', '32', '', '', '', NULL, NULL, '17', NULL, NULL, '15', NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, '822', '193613A', '2020-06-08 11:24:19'),
(22, '2774467', 'DR.BOEHM ISOFLAVON DRG 90MG', '30', 'ST', '0', '0', '10', '0', '0', '2', '0', '0', '64', '76', '', '', '', NULL, NULL, '10', NULL, NULL, '2', NULL, NULL, '64', '76', NULL, NULL, NULL, NULL, '222', '191050B', '2020-06-09 06:44:38'),
(23, '3046824', 'DR.BOEHM ISOFLAVON DRG 90MG', '60', 'ST', '3', '0', '12', '12', '5', '3', '0', '0', '64', '99', '', '', '', '3', NULL, '12', '12', '5', '3', NULL, NULL, '64', '99', NULL, NULL, NULL, NULL, '822', '194053D', '2020-06-09 06:59:26'),
(24, '4356604', 'DR.BOEHM ISOFLAVON DRG GRIFF', '30', 'ST', '4', '0', '0', '3', '0', '0', '0', '0', '0', '7', '', '', '', '4', NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, '1221', '190518A', '2020-06-08 11:00:40'),
(25, '4356610', 'DR.BOEHM ISOFLAVON DRG GRIFF', '60', 'ST', '6', '0', '5', '11', '0', '4', '0', '0', '0', '26', '', '', '', '6', NULL, '5', '11', NULL, '4', NULL, NULL, NULL, '26', NULL, NULL, NULL, NULL, '1122', '195021A', '2020-06-08 11:07:32'),
(26, '4201190', 'DR.BOEHM JOH.KR.FTBL 600MG', '30', 'ST', '5', '0', '10', '0', '0', '0', '0', '0', '0', '15', '', '', '', '5', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, '622', '192914A', '2020-06-08 10:40:11'),
(27, '2426832', 'DR.BOEHM JOH.KR.KPS 425MG', '30', 'ST', '3', '0', '3', '5', '0', '0', '0', '0', '0', '11', '', '', '', '3', NULL, '3', '5', NULL, NULL, NULL, NULL, NULL, '11', NULL, NULL, NULL, NULL, '522', '192493', '2020-06-08 10:44:55'),
(28, '2426849', 'DR.BOEHM JOH.KR.KPS 425MG', '60', 'ST', '0', '0', '10', '12', '3', '0', '0', '0', '32', '57', '', '', '', NULL, NULL, '10', '12', '3', NULL, NULL, NULL, '32', '57', NULL, NULL, NULL, NULL, '522', '192494', '2020-06-09 07:22:42'),
(29, '1520316', 'DR.BOEHM KNOBL DRG NUR 1 TGL', '30', 'ST', '0', '0', '5', '0', '0', '11', '0', '0', '0', '16', '', '', '', NULL, NULL, '5', NULL, NULL, '11', NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, '1021', '192020', '2020-06-08 10:20:41'),
(30, '2552442', 'DR.BOEHM KNOBL DRG NUR 1 TGL', '90', 'ST', '0', '0', '8', '4', '14', '7', '0', '0', '0', '33', '', '', '', NULL, NULL, '8', '4', '14', '7', NULL, NULL, NULL, '33', NULL, NULL, NULL, NULL, '1021', '192021', '2020-06-09 06:34:15'),
(31, '1609022', 'DR.BOEHM KUERBIS TBL 1 TGL', '30', 'ST', '0', '0', '16', '6', '0', '4', '0', '0', '0', '26', '', '', '', NULL, NULL, '16', '6', NULL, '4', NULL, NULL, NULL, '26', NULL, NULL, NULL, NULL, '922', '194171A', '2020-06-08 11:22:44'),
(32, '2552459', 'DR.BOEHM KUERBIS TBL 1 TGL', '90', 'ST', '7', '0', '10', '15', '40', '17', '0', '0', '0', '89', '', '', '', '7', NULL, '10', '15', '40', '17', NULL, NULL, NULL, '89', NULL, NULL, NULL, NULL, '1222', '200576A', '2020-06-09 06:54:08'),
(33, '4846076', 'DR.BOEHM KUERBIS TBL FRAU', '30', 'ST', '0', '0', '15', '0', '0', '0', '0', '0', '0', '15', '', '', '', NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, '922', '194319B', '2020-06-08 11:54:38'),
(34, '4846082', 'DR.BOEHM KUERBIS TBL FRAU', '60', 'ST', '0', '0', '17', '0', '30', '5', '0', '0', '0', '52', '', '', '', NULL, NULL, '17', NULL, '30', '4', NULL, NULL, NULL, '51', NULL, NULL, NULL, NULL, '123', '200625A', '2020-06-08 13:01:07'),
(35, '2287394', 'DR.BOEHM KUERBIS TBL SUPERPL', '30', 'ST', '0', '0', '18', '5', '5', '16', '0', '0', '69', '113', '', '', '', NULL, NULL, '18', '5', '5', '16', NULL, NULL, '69', '113', NULL, NULL, NULL, NULL, '722', '193518A', '2020-06-08 12:43:03'),
(36, '2590425', 'DR.BOEHM LEIST.ELIX BRGRAN', '14', 'ST', '0', '5', '40', '27', '0', '2', '0', '0', '0', '74', '', '', '', NULL, '5', '40', '27', NULL, '2', NULL, NULL, NULL, '74', NULL, NULL, NULL, NULL, '1222', '192981', '2020-06-09 07:16:50'),
(37, '4555315', 'DR.BOEHM LEIST.ELIX BRGRAN', '28', 'ST', '0', '0', '0', '6', '0', '2', '0', '0', '0', '8', '', '', '', NULL, NULL, NULL, '6', NULL, '2', NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, '1222', '192983', '2020-06-08 10:41:03'),
(38, '4846099', 'DR.BOEHM MAGN COMPL BRGRAN', '28', 'ST', '22', '0', '43', '24', '0', '8', '0', '0', '133', '230', '', '', '', '22', NULL, '43', '24', NULL, '8', NULL, NULL, '133', '230', NULL, NULL, NULL, NULL, '522', '192621', '2020-06-08 12:34:14'),
(39, '4607213', 'DR.BOEHM MAGN DRG 50 PLUS', '60', 'ST', '0', '0', '26', '0', '0', '0', '0', '0', '0', '26', '', '', '', NULL, NULL, '26', NULL, NULL, NULL, NULL, NULL, NULL, '26', NULL, NULL, NULL, NULL, '424', '192116', '2020-06-08 11:57:34'),
(40, '1854738', 'DR.BOEHM MAGN DRG NUR 1 TGL', '30', 'ST', '41', '0', '45', '11', '0', '15', '0', '0', '64', '176', '', '', '', '41', NULL, '45', '11', NULL, '15', NULL, NULL, '64', '176', NULL, NULL, NULL, NULL, '1024', '194752A', '2020-06-08 12:52:36'),
(41, '2576075', 'DR.BOEHM MAGN DRG NUR 1 TGL', '90', 'ST', '0', '15', '46', '30', '50', '4', '0', '0', '125', '270', '', '', '', NULL, '15', '46', '30', '50', '4', NULL, NULL, '125', '270', NULL, NULL, NULL, NULL, '1024', '194756A', '2020-06-08 12:41:18'),
(42, '2745709', 'DR.BOEHM MAGN SPORT BRTBL', '40', 'ST', '16', '0', '48', '39', '50', '30', '0', '0', '0', '183', '', '', '', '16', NULL, '48', '39', '50', '30', NULL, NULL, NULL, '183', NULL, NULL, NULL, NULL, '622', '200490', '2020-06-08 13:19:34'),
(43, '3979504', 'DR.BOEHM MAGN SPORT STICKS', '20', 'ST', '12', '5', '33', '29', '0', '16', '0', '0', '0', '95', '', '', '', '12', '5', '33', '29', NULL, '16', NULL, NULL, NULL, '95', NULL, NULL, NULL, NULL, '1222', '200224', '2020-06-09 06:29:30'),
(44, '4726627', 'DR.BOEHM MAGN SPORT STICKS', '40', 'ST', '0', '0', '0', '2', '0', '7', '0', '0', '63', '72', '', '', '', NULL, NULL, NULL, '2', NULL, '7', NULL, NULL, '63', '72', NULL, '2 VIEL', NULL, NULL, '1222', '200225', '2020-06-09 07:14:42'),
(45, '2682765', 'DR.BOEHM MAGN SPORT TBL', '60', 'ST', '9', '0', '25', '49', '35', '17', '0', '0', '0', '135', '', '', '', '9', NULL, '25', '49', '35', '17', NULL, NULL, NULL, '135', NULL, NULL, NULL, NULL, '1224', '200519B', '2020-06-08 12:59:16'),
(46, '4774106', 'DR.BOEHM MAGN SPORT+AMINOSRE', '14', 'ST', '4', '0', '10', '0', '0', '0', '0', '0', '0', '14', '', '', '', '4', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, '14', NULL, NULL, NULL, NULL, '1221', '192812', '2020-06-08 10:38:49'),
(47, '3910464', 'DR.BOEHM MARIEND.KPS 140MG', '30', 'ST', '15', '5', '27', '3', '0', '4', '0', '0', '0', '54', '', '', '', '15', '5', '27', '3', NULL, '4', NULL, NULL, NULL, '54', NULL, NULL, NULL, NULL, '822', '193731', '2020-06-08 13:20:48'),
(48, '3922378', 'DR.BOEHM MARIEND.KPS 140MG', '60', 'ST', '10', '0', '43', '23', '50', '23', '0', '0', '0', '149', '', '', '', '10', NULL, '43', '23', '50', '23', NULL, NULL, NULL, '149', NULL, NULL, NULL, NULL, '223', '201135', '2020-06-08 13:22:30'),
(49, '3524376', 'DR.BOEHM MOENCHSPFEFF.FTBL 4', '60', 'ST', '12', '0', '16', '7', '0', '0', '0', '0', '60', '95', '', '', '', '12', NULL, '16', '7', NULL, NULL, NULL, NULL, '60', '95', NULL, NULL, NULL, NULL, '723', '193529A', '2020-06-08 12:59:39'),
(50, '4220891', 'DR.BOEHM MUTTERKRAUT KPS 100', '60', 'ST', '2', '0', '25', '0', '0', '5', '0', '0', '0', '32', '', '', '', '2', NULL, '25', NULL, NULL, '5', NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, '422', '191819', '2020-06-08 10:42:45'),
(51, '4143357', 'DR.BOEHM OMEGA 3 DIREKT STI', '30', 'ST', '2', '0', '7', '2', '0', '3', '0', '0', '0', '14', '', '', '', '2', NULL, '7', '2', NULL, '3', NULL, NULL, NULL, '14', NULL, NULL, NULL, NULL, '522', '192407', '2020-06-08 10:59:44'),
(52, '4162047', 'DR.BOEHM OMEGA 3 KPS COMPLEX', '30', 'ST', '32', '0', '55', '45', '50', '21', '0', '0', '0', '203', '', '', '', '32', NULL, '55', '45', '50', '21', NULL, NULL, NULL, '203', NULL, NULL, NULL, NULL, '322', '194306', '2020-06-08 13:16:39'),
(53, '4733573', 'DR.BOEHM OMEGA 3 KPS COMPLEX', '60', 'ST', '0', '0', '7', '7', '0', '0', '0', '0', '0', '14', '', '', '', NULL, NULL, '7', '7', NULL, NULL, NULL, NULL, NULL, '14', NULL, NULL, NULL, NULL, '722', '200809', '2020-06-08 11:29:47'),
(54, '3039505', 'DR.BOEHM OMEGA 3 KPS FTE', '60', 'ST', '9', '10', '16', '42', '35', '10', '0', '0', '0', '122', '', '', '', '9', '10', '16', '42', '35', '10', NULL, NULL, NULL, '122', NULL, NULL, NULL, NULL, '422', '194604', '2020-06-08 13:06:49'),
(55, '4609726', 'DR.BOEHM OPTICO AU-TR 0,45ML', '20', 'ST', '0', '0', '2', '0', '0', '0', '0', '0', '26', '28', '', '', '', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, '26', '28', NULL, NULL, NULL, NULL, '422', '191717', '2020-06-08 11:52:01'),
(56, '3516141', 'DR.BOEHM PASSIONSBL.DRG', '30', 'ST', '8', '0', '19', '10', '0', '3', '0', '0', '0', '40', '', '', '', '8', NULL, '19', '10', NULL, '3', NULL, NULL, NULL, '40', NULL, NULL, NULL, NULL, '622', '192790', '2020-06-08 11:05:47'),
(57, '3528322', 'DR.BOEHM PASSIONSBL.DRG', '60', 'ST', '0', '0', '10', '20', '0', '2', '0', '0', '0', '32', '', '', '', NULL, NULL, '10', '20', NULL, '2', NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, '1122', '195095', '2020-06-08 11:27:27'),
(58, '4974437', 'DR.BOEHM PFEFFERM.OELKPS 182', '15', 'ST', '0', '0', '0', '0', '0', '0', '0', '0', '56', '56', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-08 10:06:23'),
(59, '4974443', 'DR.BOEHM PFEFFERM.OELKPS 182', '60', 'ST', '0', '0', '0', '0', '0', '0', '0', '0', '28', '28', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-08 10:06:23'),
(60, '2979695', 'DR.BOEHM RESVERATROL DRG', '30', 'ST', '0', '0', '0', '0', '0', '7', '0', '0', '31', '38', '', '', '', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, '31', '38', NULL, NULL, NULL, NULL, '322', '191506A', '2020-06-09 06:41:40'),
(61, '2866235', 'DR.BOEHM SONNENCAROTIN DRG', '60', 'ST', '3', '0', '15', '0', '0', '8', '0', '0', '128', '154', '', '', '', '3', NULL, '15', NULL, NULL, '8', NULL, NULL, '128', '154', NULL, NULL, NULL, NULL, '1122', '195020A', '2020-06-09 06:57:15'),
(62, '3903412', 'DR.BOEHM TEUFELSKRALLE FTBL', '60', 'ST', '9', '5', '18', '16', '0', '12', '0', '0', '136', '196', '', '', '', '9', '5', '18', '16', NULL, '12', NULL, NULL, '136', '196', NULL, NULL, NULL, NULL, '622', '193055', '2020-06-09 07:18:48'),
(63, '3524353', 'DR.BOEHM TRAUBENSILBER FTBL', '60', 'ST', '7', '0', '22', '3', '0', '0', '0', '0', '67', '99', '', '', '', '7', NULL, '22', '3', NULL, NULL, NULL, NULL, '67', '99', NULL, NULL, NULL, NULL, '123', '200918A', '2020-06-09 07:09:13'),
(64, '4902001', 'DR.BOEHM VIT D 1600IE KPS', '60', 'ST', '0', '0', '0', '0', '3', '0', '0', '0', '0', '3', '', '', '', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, '1021', '191803', '2020-06-08 11:53:00'),
(65, '4600116', 'DR.BOEHM ZINK PLUS 30MG DRG', '30', 'ST', '0', '0', '11', '0', '0', '0', '0', '0', '124', '135', '', '', '', NULL, NULL, '11', NULL, NULL, NULL, NULL, NULL, '124', '135', NULL, NULL, NULL, NULL, '123', '200818A', '2020-06-08 12:50:46'),
(66, '3904216', 'INSECTICUM GEL', '12', 'G', '35', '30', '100', '100', '50', '65', '0', '0', '700', '1080', '', '', '', '35', '30', '100', '100', '50', '65', NULL, NULL, '700', '1080', NULL, NULL, NULL, NULL, '1222', '200238A', '2020-06-09 06:26:13'),
(67, '3904268', 'INSECTICUM GEL', '25', 'G', '22', '0', '50', '28', '120', '16', '0', '0', '464', '700', '', '', '', '22', NULL, '50', '28', '120', '16', NULL, NULL, '454', '690', NULL, NULL, NULL, NULL, '1122', '194936A', '2020-06-09 06:51:49'),
(68, '29908', 'KINDER LUUF BLS', '30', 'G', '0', '0', '17', '5', '15', '-5', '0', '0', '0', '32', '', '', '', NULL, NULL, '12', '5', '15', NULL, NULL, NULL, NULL, '32', NULL, NULL, NULL, 'ACHTUNG -5 WIENERBERG UND CITYGATE -5 WENIGER', '1022', '194868A', '2020-06-08 11:21:42'),
(69, '4036822', 'LASEPTON FU CR', '75', 'ML', '0', '0', '7', '0', '0', '0', '0', '0', '133', '140', '', '', '', NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, '133', '140', NULL, NULL, NULL, NULL, '423', '201118-02', '2020-06-08 10:24:41'),
(70, '4036779', 'LASEPTON REG.CR', '80', 'ML', '0', '6', '4', '0', '0', '0', '0', '0', '60', '70', '', '', '', NULL, '6', '4', NULL, NULL, NULL, NULL, NULL, '60', '70', NULL, NULL, NULL, NULL, '1122', '194118-02', '2020-06-08 10:38:05'),
(71, '4036727', 'LASEPTON SCHUTZ-CR BABY', '80', 'ML', '2', '0', '6', '3', '0', '2', '0', '0', '0', '13', '', '', '', '2', NULL, '6', '3', NULL, '2', NULL, NULL, NULL, '13', NULL, NULL, NULL, NULL, '123', '194926-03', '2020-06-08 11:51:07'),
(72, '4036733', 'LASEPTON SCHUTZ-CR BABY', '250', 'ML', '0', '0', '0', '2', '0', '0', '0', '0', '0', '2', '', '', '', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, '2', NULL, '4 VIEL', NULL, NULL, '722', '192325-04', '2020-06-09 07:05:34'),
(73, '4174139', 'LASEPTON SCHUTZ-CR BABY BIOA', '80', 'ML', '0', '0', '0', '0', '0', '0', '0', '0', '32', '32', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', '32', NULL, NULL, NULL, NULL, '722', '192317-01', '2020-06-08 11:12:16'),
(74, '4036756', 'LASEPTON SCHUTZ-CR INTENSIV', '80', 'ML', '0', '0', '0', '0', '0', '0', '0', '0', '32', '32', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', '32', NULL, NULL, NULL, NULL, '123', '194926-01', '2020-06-08 11:53:47'),
(75, '4197643', 'LASEPTONMED BABY 7-OEL NATUR', '115', 'ML', '0', '0', '4', '0', '0', '0', '0', '0', '0', '4', '', '', '', NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, '422', '190604', '2020-06-08 11:35:30'),
(76, '4197666', 'LASEPTONMED BABY BAD+SH', '200', 'ML', '0', '0', '4', '0', '0', '0', '0', '0', '0', '4', '', '', '', NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, '182308-02', '2020-06-09 06:39:52'),
(77, '2375885', 'LUUF MARE BABY NA-SPRAY', '20', 'ML', '0', '10', '15', '0', '45', '0', '0', '0', '0', '70', '', '', '', NULL, '10', '15', NULL, '45', NULL, NULL, NULL, NULL, '70', NULL, NULL, NULL, NULL, '722', '192840', '2020-06-08 11:32:54'),
(78, '2340800', 'LUUF MARE NA-SPRAY', '20', 'ML', '0', '10', '0', '0', '28', '8', '0', '0', '0', '46', '', '', '', NULL, '10', NULL, NULL, '28', '8', NULL, NULL, NULL, '46', NULL, NULL, NULL, NULL, '1022', '194433', '2020-06-08 10:49:39'),
(79, '1327045', 'LUUF NAPHAZOLIN CP NA-SPRAY', '15', 'ML', '23', '20', '35', '10', '50', '10', '0', '0', '244', '392', '', '', '', '23', '20', '35', '10', '50', '10', NULL, NULL, '244', '392', NULL, NULL, NULL, NULL, '422', '192230', '2020-06-08 13:11:53'),
(80, '4206678', 'PASTA COOL', '190', 'G', '3', '0', '20', '9', '0', '9', '0', '0', '0', '41', '', '', '', '3', NULL, '20', '9', NULL, '9', NULL, NULL, NULL, '41', NULL, NULL, NULL, NULL, '1223', '200362A', '2020-06-08 13:04:17'),
(81, NULL, 'Summe', NULL, NULL, '363', '151', '1285', '736', '853', '516', '0', '0', '3755', '7659', NULL, NULL, NULL, '363', '151', '1266', '734', '852', '520', '0', '0', '3661', '7547', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 08:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `arts` varchar(255) NOT NULL,
  `sendto` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `ourfilename` varchar(255) NOT NULL,
  `ourfilepath` varchar(255) NOT NULL,
  `ourstatus` varchar(255) NOT NULL DEFAULT 'start',
  `lastedit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `username`, `years`, `months`, `company`, `arts`, `sendto`, `detail`, `ourfilename`, `ourfilepath`, `ourstatus`, `lastedit`) VALUES
(102, 'admin', '2020', 'januar', 'Genericon', 'RX', 'Schachinger', '1', 'Genericon_2020_januar_46_xlsx', '', 'start', '2020-06-01 19:49:48'),
(103, 'admin', '2020', 'juni', 'apomedica', 'OTC', 'Schachinger', 'omid', 'apomedica_2020_juni_26_xlsx', '', 'start', '2020-06-08 10:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `entrance_code`
--

CREATE TABLE `entrance_code` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='this table is just to store the entrance code';

--
-- Dumping data for table `entrance_code`
--

INSERT INTO `entrance_code` (`id`, `username`, `code`, `date`) VALUES
(1, 'admin', '$2y$10$2Nmgy3ZE905HK5RkIXLxRO3cecOOR.b/dKLidXUo0.TyvVxvXgKUq', '2020-06-01 19:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `genericon_2020_januar_46_xlsx`
--

CREATE TABLE `genericon_2020_januar_46_xlsx` (
  `id` int(6) UNSIGNED NOT NULL,
  `pzn` varchar(255) DEFAULT NULL,
  `Bezeichnung` varchar(255) DEFAULT NULL,
  `Menge` varchar(255) DEFAULT NULL,
  `Einheit` varchar(255) DEFAULT NULL,
  `adler_k` varchar(255) DEFAULT NULL,
  `billroth_k` varchar(255) DEFAULT NULL,
  `citygate_k` varchar(255) DEFAULT NULL,
  `hoffnung_k` varchar(255) DEFAULT NULL,
  `retz_k` varchar(255) DEFAULT NULL,
  `wienerberg_k` varchar(255) DEFAULT NULL,
  `phönix_k` varchar(255) DEFAULT NULL,
  `kwizda_k` varchar(255) DEFAULT NULL,
  `herba_k` varchar(255) DEFAULT NULL,
  `Summe_k` varchar(255) DEFAULT NULL,
  `phönix_prozent` varchar(255) DEFAULT NULL,
  `kwizda_prozent` varchar(255) DEFAULT NULL,
  `herba_prozent` varchar(255) DEFAULT NULL,
  `adler_v` varchar(255) DEFAULT NULL,
  `billroth_v` varchar(255) DEFAULT NULL,
  `citygate_v` varchar(255) DEFAULT NULL,
  `hoffnung_v` varchar(255) DEFAULT NULL,
  `retz_v` varchar(255) DEFAULT NULL,
  `wienerberg_v` varchar(255) DEFAULT NULL,
  `phönix_v` varchar(255) DEFAULT NULL,
  `kwizda_v` varchar(255) DEFAULT NULL,
  `herba_v` varchar(255) DEFAULT NULL,
  `Summe_v` varchar(255) DEFAULT NULL,
  `Ablauf` varchar(255) DEFAULT NULL,
  `Viel` varchar(255) DEFAULT NULL,
  `Kaput` varchar(255) DEFAULT NULL,
  `Andere` varchar(255) DEFAULT NULL,
  `Datum` varchar(255) DEFAULT NULL,
  `Charge` varchar(255) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genericon_2020_januar_46_xlsx`
--

INSERT INTO `genericon_2020_januar_46_xlsx` (`id`, `pzn`, `Bezeichnung`, `Menge`, `Einheit`, `adler_k`, `billroth_k`, `citygate_k`, `hoffnung_k`, `retz_k`, `wienerberg_k`, `phönix_k`, `kwizda_k`, `herba_k`, `Summe_k`, `phönix_prozent`, `kwizda_prozent`, `herba_prozent`, `adler_v`, `billroth_v`, `citygate_v`, `hoffnung_v`, `retz_v`, `wienerberg_v`, `phönix_v`, `kwizda_v`, `herba_v`, `Summe_v`, `Ablauf`, `Viel`, `Kaput`, `Andere`, `Datum`, `Charge`, `register_date`) VALUES
(1, '1322935', 'ACICLOVIR GEN TBL 200MG', '25', 'ST', '150', '0', '0', '0', '0', '0', '30', '0', '0', '180', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-02 18:44:18'),
(2, '2432353', 'ACICLOVIR GEN TBL 400MG', '60', 'ST', '0', '0', '0', '0', '0', '0', '50', '30', '0', '80', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(3, '1322941', 'ACICLOVIR GEN TBL 800MG', '35', 'ST', '0', '0', '0', '0', '0', '0', '10', '0', '0', '10', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(4, '3761509', 'ANASTROZOL GEN FTBL 1MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '40', '30', '0', '70', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(5, '3758105', 'CLOPIDOGREL GEN FTBL 75MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '240', '280', '0', '520', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(6, '3758111', 'CLOPIDOGREL GEN FTBL 75MG', '90', 'ST', '0', '0', '0', '0', '0', '0', '100', '0', '0', '100', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(7, '3903056', 'DONEPEZIL GEN FTBL 5MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '80', '0', '0', '80', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(8, '2437882', 'DOXAZOSIN GEN TBL 4MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '180', '250', '0', '430', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(9, '3537539', 'DOXAZOSIN GEN TBL 8MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '90', '180', '0', '270', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(10, '3788460', 'EPLERENON GEN FTBL 50MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '50', '80', '0', '130', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(11, '3930099', 'ESCITALOPRAM GEN FTBL 10MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '120', '130', '0', '250', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(12, '3930113', 'ESCITALOPRAM GEN FTBL 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '140', '130', '0', '270', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(13, '2435529', 'FAMOTIDIN GEN FTBL 20MG', '50', 'ST', '0', '0', '0', '0', '0', '0', '40', '80', '0', '120', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(14, '2435535', 'FAMOTIDIN GEN FTBL 40MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '90', '60', '0', '150', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(15, '2442587', 'FLUOXETIN GEN KPS 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '120', '60', '0', '180', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(16, '2437729', 'FLUOXETIN GEN KPS 40MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '60', '60', '0', '120', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(17, '2446220', 'FLUOXETIN GEN TBL 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '40', '90', '0', '130', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(18, '3529310', 'GABAPENTIN GEN KPS 300MG', '100', 'ST', '0', '0', '0', '0', '0', '0', '160', '150', '0', '310', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(19, '3908651', 'IBANDRONSAEURE GEN IJLSG 3MG', '1', 'ST', '0', '0', '0', '0', '0', '0', '200', '0', '0', '200', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(20, '3546426', 'LANSOPRAZOL GEN MSR KPS 30MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '50', '0', '0', '50', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(21, '3776853', 'LETROZOL GEN FTBL 2,5MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '40', '0', '0', '40', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(22, '2454722', 'LISINOCOMP GEN TBL', '30', 'ST', '0', '0', '0', '0', '0', '0', '140', '450', '0', '590', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(23, '2454716', 'LISINOCOMP GEN TBL MTE', '30', 'ST', '0', '0', '0', '0', '0', '0', '160', '200', '0', '360', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(24, '3545869', 'PAROXETIN GEN FTBL 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '60', '0', '0', '60', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(25, '3928777', 'PRAMIPEXOL GEN RETTBL 0,52MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '40', '0', '0', '40', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(26, '2467009', 'PRAVASTATIN GEN FTBL 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '0', '100', '0', '100', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(27, '2467021', 'PRAVASTATIN GEN FTBL 40MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '100', '120', '0', '220', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(28, '3533197', 'QUETIAPIN GEN FTBL 100MG', '60', 'ST', '0', '0', '0', '0', '0', '0', '25', '40', '0', '65', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(29, '2449135', 'ROXITHROMYCIN GEN FTBL 300MG', '7', 'ST', '0', '0', '0', '0', '0', '0', '30', '0', '0', '30', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(30, '3503167', 'SERTRALIN GEN FTBL 100MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '180', '230', '0', '410', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(31, '3503144', 'SERTRALIN GEN FTBL 50MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '190', '300', '0', '490', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(32, '2435392', 'SIMVASTATIN GEN FTBL 20MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '240', '350', '0', '590', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(33, '2435400', 'SIMVASTATIN GEN FTBL 40MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '260', '450', '0', '710', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(34, '3518720', 'SIMVASTATIN GEN FTBL 80MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '120', '100', '0', '220', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(35, '1259059', 'SPIRONO GEN CP TBL', '50', 'ST', '0', '0', '0', '0', '0', '0', '90', '200', '0', '290', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(36, '1259065', 'SPIRONO GEN CP TBL FTE', '20', 'ST', '0', '0', '0', '0', '0', '0', '60', '0', '0', '60', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(37, '2425821', 'SPIRONO GEN TBL 50MG', '50', 'ST', '0', '0', '0', '0', '0', '0', '90', '300', '0', '390', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(38, '3525358', 'VENLAFAXIN GEN RET KPS 150MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '160', '250', '0', '410', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(39, '3905983', 'VENLAFAXIN GEN RET TBL 225MG', '30', 'ST', '0', '0', '0', '0', '0', '0', '120', '200', '0', '320', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 19:50:23'),
(40, NULL, 'Summe', NULL, NULL, '150', '0', '0', '0', '0', '0', '3995', '4900', '0', '9045', NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-02 18:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `selector` longtext NOT NULL,
  `expire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'user',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `position`, `date`) VALUES
(1, 'omid', 'soleimani', 'o.soleimani.ie@gmail.com', 'admin', '$2y$10$U5UYXWH.xJYXgtLF4B64yuna71A32HJzVHt0C6J2bCW93hD8rbwBS', 'admin', '2020-05-07 08:41:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apomedica_2020_juni_26_xlsx`
--
ALTER TABLE `apomedica_2020_juni_26_xlsx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genericon_2020_januar_46_xlsx`
--
ALTER TABLE `genericon_2020_januar_46_xlsx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apomedica_2020_juni_26_xlsx`
--
ALTER TABLE `apomedica_2020_juni_26_xlsx`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `genericon_2020_januar_46_xlsx`
--
ALTER TABLE `genericon_2020_januar_46_xlsx`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
