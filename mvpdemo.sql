-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 09:33 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvpdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE IF NOT EXISTS `case` (
  `case_id` int(5) NOT NULL AUTO_INCREMENT,
  `district_id` int(2) NOT NULL,
  `feb` int(10) NOT NULL,
  `mar` int(10) NOT NULL,
  `apr` int(10) NOT NULL,
  `region_id` int(1) NOT NULL,
  `nov` int(10) NOT NULL,
  `dec` int(10) NOT NULL,
  `jan` int(10) NOT NULL,
  `Q4` int(10) NOT NULL,
  `Q5` int(10) NOT NULL,
  `average` int(10) NOT NULL,
  PRIMARY KEY (`case_id`),
  KEY `district_id` (`district_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='records the case data' AUTO_INCREMENT=113 ;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`case_id`, `district_id`, `feb`, `mar`, `apr`, `region_id`, `nov`, `dec`, `jan`, `Q4`, `Q5`, `average`) VALUES
(1, 1, 4994, 4306, 3787, 1, 8366, 6462, 4830, 19658, 13087, 4362),
(2, 2, 12758, 12988, 14143, 2, 20899, 17516, 18461, 56876, 39889, 13296),
(3, 3, 4947, 4509, 4636, 3, 10724, 6993, 6476, 24193, 14092, 4697),
(4, 4, 3219, 2980, 4134, 3, 4938, 3787, 4369, 13094, 10333, 3444),
(5, 5, 4402, 4321, 4789, 3, 7854, 6115, 5668, 19637, 13512, 4504),
(6, 6, 1500, 1340, 1345, 1, 2708, 1635, 1534, 5877, 4185, 1395),
(7, 7, 10866, 10441, 8399, 4, 16573, 10226, 8775, 35574, 29706, 9902),
(8, 8, 1688, 2356, 2445, 3, 6474, 5009, 2980, 14463, 6489, 2163),
(9, 9, 3478, 3438, 4272, 3, 12939, 5015, 4926, 22880, 11188, 3729),
(10, 10, 16204, 30399, 27376, 2, 26552, 20301, 19107, 65960, 73979, 24660),
(11, 11, 11087, 10035, 10516, 4, 13313, 7423, 9083, 29819, 31638, 10546),
(12, 12, 5301, 4982, 4032, 4, 7445, 6216, 6845, 20506, 14315, 4772),
(13, 13, 17111, 15881, 16097, 5, 17637, 11487, 14841, 43965, 49089, 16363),
(14, 14, 2714, 1843, 1741, 6, 4758, 4287, 5000, 14045, 6298, 2099),
(15, 15, 11271, 9830, 10890, 7, 14825, 12188, 11348, 38361, 31991, 10664),
(16, 16, 2470, 2473, 3126, 4, 3424, 3245, 2178, 8847, 8069, 2690),
(17, 17, 1836, 2071, 2148, 8, 5883, 4668, 3298, 13849, 6055, 2018),
(18, 18, 3046, 3554, 3095, 4, 3974, 2947, 2922, 9843, 9695, 3232),
(19, 19, 4477, 3821, 4022, 4, 5274, 4220, 8948, 18442, 12320, 4107),
(20, 20, 2435, 2996, 2593, 9, 5015, 4281, 3328, 12624, 8024, 2675),
(21, 21, 11396, 10620, 11958, 9, 18156, 13456, 13878, 45490, 33974, 11325),
(22, 22, 7173, 5390, 6057, 6, 14100, 11510, 13503, 39113, 18620, 6207),
(23, 23, 14738, 13711, 12898, 5, 15481, 11037, 12436, 38954, 41347, 13782),
(24, 24, 14744, 13407, 15367, 4, 18872, 16060, 16123, 51055, 43518, 14506),
(25, 25, 3920, 5041, 5447, 8, 8612, 8340, 5895, 22847, 14408, 4803),
(26, 26, 1470, 1318, 1429, 7, 2163, 1953, 1188, 5304, 4217, 1406),
(27, 27, 4642, 5027, 4698, 5, 7619, 6308, 4030, 17957, 14367, 4789),
(28, 28, 6016, 6169, 6610, 3, 10205, 7684, 7869, 25758, 18795, 6265),
(29, 29, 3583, 3892, 3731, 8, 7270, 6907, 5116, 19293, 11206, 3735),
(30, 30, 8789, 9424, 8549, 3, 23879, 14047, 11525, 49451, 26762, 8921),
(31, 31, 14226, 13263, 17701, 9, 21920, 15946, 17533, 55399, 45190, 15063),
(32, 32, 10726, 9974, 11991, 6, 18248, 18918, 14548, 51714, 32691, 10897),
(33, 33, 22521, 16911, 19925, 5, 29100, 23461, 20893, 73454, 59357, 19786),
(34, 34, 20822, 15296, 16948, 6, 24523, 29291, 38823, 92637, 53066, 17689),
(35, 35, 19926, 16502, 17593, 5, 24864, 21254, 17685, 63803, 54021, 18007),
(36, 36, 14032, 10397, 10719, 1, 15317, 9520, 10037, 34874, 35148, 11716),
(37, 37, 2190, 2182, 2376, 6, 3013, 2798, 2995, 8806, 6748, 2249),
(38, 38, 12495, 10907, 11334, 9, 17063, 16481, 16284, 49828, 34736, 11579),
(39, 39, 6925, 7006, 7828, 4, 11285, 8167, 6983, 26435, 21759, 7253),
(40, 40, 2262, 2601, 2232, 8, 2561, 2559, 2974, 8094, 7095, 2365),
(41, 41, 9462, 7016, 5303, 5, 11385, 7413, 5670, 24468, 21781, 7260),
(42, 42, 3812, 3168, 3184, 8, 6444, 6207, 6313, 18964, 10164, 3388),
(43, 43, 21702, 22955, 23376, 10, 23668, 21828, 14397, 59893, 68033, 22678),
(44, 44, 26233, 24089, 19266, 5, 29426, 25448, 21750, 76624, 69588, 23196),
(45, 45, 7934, 9798, 10019, 9, 18084, 18913, 4451, 41448, 27751, 9250),
(46, 46, 7478, 7649, 10799, 6, 10060, 8714, 10487, 29261, 25926, 8642),
(47, 47, 4868, 4824, 4703, 4, 5913, 4904, 4270, 15087, 14395, 4798),
(48, 48, 14434, 26368, 25851, 9, 27948, 38244, 27593, 93785, 66653, 22218),
(49, 49, 8937, 8321, 10189, 4, 13114, 9498, 10633, 33245, 27447, 9149),
(50, 50, 8310, 7961, 7965, 7, 14899, 10015, 9404, 34318, 24236, 8079),
(51, 51, 9270, 11293, 15062, 9, 20935, 16925, 15605, 53465, 35625, 11875),
(52, 52, 2231, 2080, 2063, 7, 6794, 6438, 3996, 17228, 6374, 2125),
(53, 53, 8180, 6858, 6607, 4, 6204, 7099, 4768, 18071, 21645, 7215),
(54, 54, 10517, 14541, 12808, 6, 23902, 5970, 21838, 51710, 37866, 12622),
(55, 55, 4595, 4691, 6837, 9, 9824, 8080, 7043, 24947, 16123, 5374),
(56, 56, 1762, 1549, 2298, 6, 2265, 2404, 2294, 6963, 5609, 1870),
(57, 57, 3478, 3461, 2744, 3, 5794, 3134, 3660, 12588, 9683, 3228),
(58, 58, 5550, 7917, 8749, 2, 10643, 8795, 7707, 27145, 22216, 7405),
(59, 59, 1123, 1096, 1792, 3, 4794, 2297, 2023, 9114, 4011, 1337),
(60, 60, 6952, 6147, 6483, 1, 12448, 7794, 8397, 28639, 19582, 6527),
(61, 61, 7621, 7265, 8481, 4, 9531, 9056, 7156, 25743, 23367, 7789),
(62, 62, 2939, 4160, 4037, 4, 3593, 2790, 3277, 9660, 11136, 3712),
(63, 63, 2080, 1633, 2220, 7, 6851, 5929, 2850, 15630, 5933, 1978),
(64, 64, 5140, 5626, 6222, 9, 12277, 12501, 13101, 37879, 16988, 5663),
(65, 65, 5403, 5154, 4414, 9, 12208, 12157, 11342, 35707, 14971, 4990),
(66, 66, 1756, 2019, 1085, 3, 4401, 2832, 2173, 9406, 4860, 1620),
(67, 67, 9666, 8907, 10256, 3, 14301, 12772, 13931, 41004, 28829, 9610),
(68, 68, 13533, 11530, 11780, 5, 15677, 11021, 11152, 37850, 36843, 12281),
(69, 69, 11002, 11274, 12666, 7, 21343, 18672, 16658, 56673, 34942, 11647),
(70, 70, 4851, 4789, 5058, 8, 8596, 9860, 7137, 25593, 14698, 4899),
(71, 71, 10508, 9528, 8631, 8, 14082, 13842, 11260, 39184, 28667, 9556),
(72, 72, 6922, 5660, 8379, 4, 8700, 6358, 7581, 22639, 20961, 6987),
(73, 73, 3201, 8345, 8354, 2, 6065, 7077, 5193, 18335, 19900, 6633),
(74, 74, 6643, 6227, 6429, 8, 8006, 8999, 7981, 24986, 19299, 6433),
(75, 75, 6855, 7565, 10920, 9, 10332, 9685, 9501, 29518, 25340, 8447),
(76, 76, 17875, 15863, 14276, 5, 18794, 16844, 18237, 53875, 48014, 16005),
(77, 77, 21395, 11921, 12875, 4, 18886, 14372, 13080, 46338, 46191, 15397),
(78, 78, 12508, 10225, 11011, 6, 19775, 15913, 23614, 59302, 33744, 11248),
(79, 79, 7273, 43, 6950, 6, 11796, 11577, 10013, 33386, 14266, 4755),
(80, 80, 6404, 9062, 9459, 7, 16396, 16830, 13991, 47217, 24925, 8308),
(81, 81, 4833, 4996, 5007, 1, 8721, 10689, 6535, 25945, 14836, 4945),
(82, 82, 11987, 13474, 14725, 2, 19781, 17084, 15133, 51998, 40186, 13395),
(83, 83, 5737, 7237, 4786, 8, 11326, 11154, 8368, 30848, 17760, 5920),
(84, 84, 16397, 17183, 19618, 7, 32734, 31357, 24877, 88968, 53198, 17733),
(85, 85, 10111, 9923, 11047, 7, 17630, 12846, 11625, 42101, 31081, 10360),
(86, 86, 6005, 5548, 6004, 1, 9333, 4756, 5096, 19185, 17557, 5852),
(87, 87, 4854, 4797, 4588, 7, 9152, 7660, 7806, 24618, 14239, 4746),
(88, 88, 7053, 6764, 7616, 7, 15534, 14092, 9910, 39536, 21433, 7144),
(89, 89, 11394, 11669, 10747, 5, 13537, 10211, 11847, 35595, 33810, 11270),
(90, 90, 11601, 10528, 12665, 5, 12625, 9991, 9563, 32179, 34794, 11598),
(91, 91, 5604, 4462, 4706, 1, 9127, 5976, 6330, 21433, 14772, 4924),
(92, 92, 9022, 13875, 17948, 2, 22129, 16670, 16494, 55293, 40845, 13615),
(93, 93, 3540, 2989, 4435, 4, 5785, 4320, 2552, 12657, 10964, 3655),
(94, 94, 2061, 1399, 1608, 9, 2333, 797, 0, 3130, 5068, 1689),
(95, 95, 21264, 19483, 23180, 6, 28667, 24674, 23905, 77246, 63927, 21309),
(96, 96, 1091, 1411, 1179, 3, 2862, 1816, 2497, 7175, 3681, 1227),
(97, 97, 3210, 2635, 3340, 3, 5010, 2925, 4983, 12918, 9185, 3062),
(98, 98, 3309, 3564, 3851, 3, 8082, 5088, 3581, 16751, 10724, 3575),
(99, 99, 2766, 2456, 2253, 3, 7655, 3454, 2395, 13504, 7475, 2492),
(100, 100, 17871, 15648, 12734, 4, 22584, 15519, 13271, 51374, 46253, 15418),
(101, 101, 19953, 19980, 20270, 8, 29281, 33317, 36838, 99436, 60203, 20068),
(102, 102, 3659, 2917, 3565, 6, 4369, 4903, 6512, 15784, 10141, 3380),
(103, 103, 9917, 10483, 12588, 6, 16893, 15272, 14581, 46746, 32988, 10996),
(104, 104, 5698, 6865, 5722, 8, 10940, 10376, 7408, 28724, 18285, 6095),
(105, 105, 9919, 7925, 9505, 4, 13363, 10411, 9075, 32849, 27349, 9116),
(106, 106, 8996, 3354, 636, 6, 15655, 11916, 4392, 31963, 12986, 4329),
(107, 107, 8139, 9027, 9354, 4, 9916, 9347, 8874, 28137, 26520, 8840),
(108, 108, 13772, 12507, 14093, 4, 14865, 11975, 10815, 37655, 40372, 13457),
(109, 109, 30334, 25267, 28699, 4, 38216, 28841, 36524, 103581, 84300, 28100),
(110, 110, 26322, 27967, 31868, 8, 37335, 30787, 30884, 99006, 86157, 28719),
(111, 111, 4972, 11515, 10510, 2, 14124, 14647, 8856, 37627, 26997, 8999),
(112, 112, 2848, 5184, 7352, 2, 5804, 4904, 5464, 16172, 15384, 5128);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(2) NOT NULL AUTO_INCREMENT,
  `code` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `population` int(10) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='records the district information' AUTO_INCREMENT=113 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `code`, `name`, `population`) VALUES
(1, 'Abim District', 'Abim District', 57800),
(2, 'Adjumani District', 'Adjumani District', 425000),
(3, 'Agago District', 'Agago District', 329900),
(4, 'Alebtong District', 'Alebtong District', 240900),
(5, 'Amolatar District', 'Amolatar District', 134500),
(6, 'Amudat District', 'Amudat District', 127800),
(7, 'Amuria District', 'Amuria District', 478900),
(8, 'Amuru District', 'Amuru District', 188600),
(9, 'Apac District', 'Apac District', 372000),
(10, 'Arua District', 'Arua District', 826900),
(11, 'Budaka District', 'Budaka District', 188700),
(12, 'Bududa District', 'Bududa District', 194800),
(13, 'Bugiri District', 'Bugiri District', 468600),
(14, 'Buhweju District', 'Buhweju District', 105300),
(15, 'Buikwe District', 'Buikwe District', 452500),
(16, 'Bukedea District', 'Bukedea District', 202700),
(17, 'Bukomansimbi District', 'Bukomansimbi District', 156900),
(18, 'Bukwo District', 'Bukwo District', 79500),
(19, 'Bulambuli District', 'Bulambuli District', 131800),
(20, 'Buliisa District', 'Buliisa District', 84800),
(21, 'Bundibugyo District', 'Bundibugyo District', 289100),
(22, 'Bushenyi District', 'Bushenyi District', 261300),
(23, 'Busia District', 'Busia District', 314500),
(24, 'Butaleja District', 'Butaleja District', 236500),
(25, 'Butambala District', 'Butambala District', 102100),
(26, 'Buvuma District', 'Buvuma District', 58300),
(27, 'Buyende District', 'Buyende District', 283100),
(28, 'Dokolo District', 'Dokolo District', 196100),
(29, 'Gomba District', 'Gomba District', 157000),
(30, 'Gulu District', 'Gulu District', 418300),
(31, 'Hoima District', 'Hoima District', 602500),
(32, 'Ibanda District', 'Ibanda District', 268300),
(33, 'Iganga District', 'Iganga District', 534500),
(34, 'Isingiro District', 'Isingiro District', 444200),
(35, 'Jinja District', 'Jinja District', 527300),
(36, 'Kaabong District', 'Kaabong District', 450300),
(37, 'Kabale District', 'Kabale District', 505500),
(38, 'Kabarole District', 'Kabarole District', 427700),
(39, 'Kaberamaido District', 'Kaberamaido District', 216400),
(40, 'Kalangala District', 'Kalangala District', 75500),
(41, 'Kaliro District', 'Kaliro District', 231600),
(42, 'Kalungu District', 'Kalungu District', 180600),
(43, 'Kampala District', 'Kampala District', 1855500),
(44, 'Kamuli District', 'Kamuli District', 534100),
(45, 'Kamwenge District', 'Kamwenge District', 347100),
(46, 'Kanungu District', 'Kanungu District', 262300),
(47, 'Kapchorwa District', 'Kapchorwa District', 124600),
(48, 'Kasese District', 'Kasese District', 802300),
(49, 'Katakwi District', 'Katakwi District', 191300),
(50, 'Kayunga District', 'Kayunga District', 372600),
(51, 'Kibaale District', 'Kibaale District', 755300),
(52, 'Kiboga District', 'Kiboga District', 179400),
(53, 'Kibuku District', 'Kibuku District', 194600),
(54, 'Kiruhura District', 'Kiruhura District', 322200),
(55, 'Kiryandongo District', 'Kiryandongo District', 352600),
(56, 'Kisoro District', 'Kisoro District', 261200),
(57, 'Kitgum District', 'Kitgum District', 267600),
(58, 'Koboko District', 'Koboko District', 267200),
(59, 'Kole District', 'Kole District', 247600),
(60, 'Kotido District', 'Kotido District', 265400),
(61, 'Kumi District', 'Kumi District', 278800),
(62, 'Kween District', 'Kween District', 112300),
(63, 'Kyankwanzi District', 'Kyankwanzi District', 198900),
(64, 'Kyegegwa District', 'Kyegegwa District', 171900),
(65, 'Kyenjojo District', 'Kyenjojo District', 412100),
(66, 'Lamwo District', 'Lamwo District', 185000),
(67, 'Lira District', 'Lira District', 429000),
(68, 'Luuka District', 'Luuka District', 279100),
(69, 'Luwero District', 'Luwero District', 463000),
(70, 'Lwengo District', 'Lwengo District', 272200),
(71, 'Lyantonde District', 'Lyantonde District', 83300),
(72, 'Manafwa District', 'Manafwa District', 392900),
(73, 'Maracha District', 'Maracha District', 211700),
(74, 'Masaka District', 'Masaka District', 256300),
(75, 'Masindi District', 'Masindi District', 391300),
(76, 'Mayuge District', 'Mayuge District', 494500),
(77, 'Mbale District', 'Mbale District', 466700),
(78, 'Mbarara District', 'Mbarara District', 463900),
(79, 'Mitooma District', 'Mitooma District', 204200),
(80, 'Mityana District', 'Mityana District', 321200),
(81, 'Moroto District', 'Moroto District', 151900),
(82, 'Moyo District', 'Moyo District', 479200),
(83, 'Mpigi District', 'Mpigi District', 221200),
(84, 'Mubende District', 'Mubende District', 656900),
(85, 'Mukono District', 'Mukono District', 580600),
(86, 'Nakapiripirit District', 'Nakapiripirit District', 181000),
(87, 'Nakaseke District', 'Nakaseke District', 204100),
(88, 'Nakasongola District', 'Nakasongola District', 163000),
(89, 'Namayingo District', 'Namayingo District', 255300),
(90, 'Namutumba District', 'Namutumba District', 230600),
(91, 'Napak District', 'Napak District', 221000),
(92, 'Nebbi District', 'Nebbi District', 363700),
(93, 'Ngora District', 'Ngora District', 171700),
(94, 'Ntoroko District', 'Ntoroko District', 92800),
(95, 'Ntungamo District', 'Ntungamo District', 502200),
(96, 'Nwoya District', 'Nwoya District', 56900),
(97, 'Otuke District', 'Otuke District', 91700),
(98, 'Oyam District', 'Oyam District', 405100),
(99, 'Pader District', 'Pader District', 255300),
(100, 'Pallisa District', 'Pallisa District', 388600),
(101, 'Rakai District', 'Rakai District', 501700),
(102, 'Rubirizi District', 'Rubirizi District', 129300),
(103, 'Rukungiri District', 'Rukungiri District', 330600),
(104, 'Sembabule District', 'Sembabule District', 325800),
(105, 'Serere District', 'Serere District', 228900),
(106, 'Sheema District', 'Sheema District', 252000),
(107, 'Sironko District', 'Sironko District', 356700),
(108, 'Soroti District', 'Soroti District', 228400),
(109, 'Tororo District', 'Tororo District', 512700),
(110, 'Wakiso District', 'Wakiso District', 1489300),
(111, 'Yumbe District', 'Yumbe District', 636500),
(112, 'Zombo District', 'Zombo District', 231100);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `month_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='records the months informaton' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='records the regions' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `name`) VALUES
(1, 'Karamoja'),
(2, 'West Nile'),
(3, 'North'),
(4, 'Eastern'),
(5, 'East Central'),
(6, 'South West'),
(7, 'Central 2'),
(8, 'Central 1'),
(9, 'Western'),
(10, 'Kampala');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `case_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
