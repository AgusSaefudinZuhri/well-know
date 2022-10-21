-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2019 at 04:20 AM
-- Server version: 5.7.25
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extrogat_trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_csv`
--

CREATE TABLE `g_csv` (
  `id` bigint(20) NOT NULL,
  `csvurl` varchar(200) DEFAULT NULL,
  `tglinput` varchar(20) DEFAULT NULL,
  `waktuinput` varchar(20) DEFAULT NULL,
  `byinput` varchar(100) DEFAULT NULL,
  `tglmulai` varchar(20) DEFAULT NULL,
  `waktumulai` varchar(20) DEFAULT NULL,
  `tglselesai` varchar(20) DEFAULT NULL,
  `waktuselesai` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_csv`
--

INSERT INTO `g_csv` (`id`, `csvurl`, `tglinput`, `waktuinput`, `byinput`, `tglmulai`, `waktumulai`, `tglselesai`, `waktuselesai`, `status`) VALUES
(1, '../images/csv/190322_EGG_Closed_Trades_Report.csv', '2019-03-22', '21:40:34', 'admin', '2019-03-23', '06:35:26', '2019-03-23', '06:35:26', 11);

-- --------------------------------------------------------

--
-- Table structure for table `g_csvdt`
--

CREATE TABLE `g_csvdt` (
  `id` bigint(20) NOT NULL,
  `csvid` int(10) DEFAULT NULL,
  `csvdeal` varchar(50) DEFAULT NULL,
  `csvlogin` varchar(50) DEFAULT NULL,
  `csvname` varchar(200) DEFAULT NULL,
  `csvopentime` varchar(25) DEFAULT NULL,
  `csvtype` varchar(10) DEFAULT NULL,
  `csvsymbol` varchar(10) DEFAULT NULL,
  `csvvolume` varchar(50) DEFAULT NULL,
  `csvopenprice` varchar(50) DEFAULT NULL,
  `csvclosetime` varchar(25) DEFAULT NULL,
  `csvcloseprice` varchar(50) DEFAULT NULL,
  `csvcommission` varchar(50) DEFAULT NULL,
  `csvtaxes` varchar(50) DEFAULT NULL,
  `csvagent` varchar(50) DEFAULT NULL,
  `csvswap` varchar(50) DEFAULT NULL,
  `csvprofit` varchar(50) DEFAULT NULL,
  `csvpips` varchar(50) DEFAULT NULL,
  `csvcomment` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_csvdt`
--

INSERT INTO `g_csvdt` (`id`, `csvid`, `csvdeal`, `csvlogin`, `csvname`, `csvopentime`, `csvtype`, `csvsymbol`, `csvvolume`, `csvopenprice`, `csvclosetime`, `csvcloseprice`, `csvcommission`, `csvtaxes`, `csvagent`, `csvswap`, `csvprofit`, `csvpips`, `csvcomment`, `status`) VALUES
(1, 1, '16467584', '25001030', 'MEMBER 04', '2019.03.22 16:19:44', 'sell', 'gbpusd', '1.00', '1.31516', '2019.03.22 16:19:47', '1.31519', '0.00', '0.00', '0.00', '0.00', '-3.00', '-3', ' #16467583', 11);

-- --------------------------------------------------------

--
-- Table structure for table `g_extroakun`
--

CREATE TABLE `g_extroakun` (
  `id` int(10) NOT NULL,
  `userid` varchar(150) DEFAULT NULL,
  `extakunid` varchar(100) DEFAULT NULL,
  `extgroup` varchar(100) DEFAULT NULL,
  `extpassword` varchar(150) DEFAULT NULL,
  `extname` varchar(150) DEFAULT NULL,
  `extleverage` varchar(50) DEFAULT NULL,
  `extcountry` varchar(10) DEFAULT NULL,
  `extcity` varchar(100) DEFAULT NULL,
  `extstate` varchar(100) DEFAULT NULL,
  `extzipcode` varchar(50) DEFAULT NULL,
  `extaddress` text,
  `extphone` varchar(50) DEFAULT NULL,
  `extemail` varchar(100) DEFAULT NULL,
  `extcomment` text,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_extroakun`
--

INSERT INTO `g_extroakun` (`id`, `userid`, `extakunid`, `extgroup`, `extpassword`, `extname`, `extleverage`, `extcountry`, `extcity`, `extstate`, `extzipcode`, `extaddress`, `extphone`, `extemail`, `extcomment`, `status`) VALUES
(1, 'Calvin', '400021', 'UFF_REG', 'bnm789', 'Calvin soemito makmur', '100', '62', 'Jakarta timur', 'Dki jakarta', '10055', 'Cipinang bunder baru', '081212305639', 'Calvinmkr@gmail.com', '', 1),
(2, 'Lips', '400022', 'UFF_REG', 'jkl456', 'Desi maria', '100', '62', 'Jakarta', 'Jakarta', '123456', 'Jakarta', '08180888559', 'desimaria2612@yahoo.com', '', 1),
(3, 'Rocky', '400023', 'UFF_REG', 'poi888', 'Rocky Tan', '100', '62', 'Jakarta Pusat', 'Jakarta', '10560', 'Mardani Raya 12', '085782224981', 'crashbdc99@gmail.com', '', 1),
(4, 'Winner1010', '400024', 'UFF_REG', 'yup090', 'Josenova', '100', '62', 'Jakarta pusat', 'Jakarta', '10450', 'Kemayoran', '08111992977', 'sanjose.lamborghini@gmail.com', '', 1),
(5, 'Harianto', '400025', 'UFF_REG', 'sdc555', 'Harianto', '100', '62', 'Jakarta utara', 'Jakarta', '10055', 'Pik', '081717711777', 'aw_platinum@yahoo.com', '', 1),
(6, 'Willy1981', '400026', 'UFF_REG', 'klm567', 'Willy chandry', '100', '62', 'Jakarta', 'Indonesia', '123456', 'Jakarta', '081311131981', 'willychandry@gmail.com', '', 1),
(7, 'Joevira', '400027', 'UFF_REG', 'rty667', ' joevira yaptonaga', '100', '62', 'Jakarta Utara', '-', '-', 'jl. Camar permai Vii/ 5', '081218865688', 'joevira.yaptonaga@gmail.com', '', 1),
(8, 'dodycand7526', '400028', 'UFF_REG', 'xcv345', 'Dody Candra', '100', '62', 'Surabaya', 'Jawa Timur', '60119', 'Jl. Semolowaru Tengah 11/14', '082233010175', 'dodycand2606@gmail.com', '', 1),
(9, 'Hanselking', '400029', 'UFF_REG', 'klm098', 'Andriani lestiyarini', '100', '62', 'Solo', 'Indonesia', '123456', 'Solo', '081904555588', 'okenonik@yahoo.com', '', 1),
(10, 'Christokhu', '400030', 'UFF_REG', 'vbg951', 'Christo', '100', '62', 'Medan', 'Indonesia', '20214', 'Jl.sutrisno no.131c', '087868623079', 'christokhu@gmail.com', '', 1),
(11, 'fandy01', '400031', 'UFF_REG', 'gjh126', 'Fandy', '100', '62', '-', '-', '-', '-', '082132363355', 'fandy7302@gmail.com', '', 1),
(12, 'Aditan', '400032', 'UFF_REG', 'ert754', 'Adi', '100', '62', 'Medan', 'Medan Sumatera Utara', '20224', 'Jl. Pukat II Gg. Bulutangkis No.9A', '08116022523', 'aditan19@gmail.com', '', 1),
(13, 'Ezrain', '400033', 'UFF_REG', 'tfc890', 'In Nien', '100', '62', 'SOLO/JAWA TENGAH', 'Jawa Tengah', '57137', 'Kramat, kemiri, kebakkramat', '+628175477777', 'ezrain2003@yahoo.com', '', 1),
(14, 'catwoman', '400034', 'UFF_REG', 'jjk351', 'Dhita Adelian Atmanegara', '100', '62', 'Bandung', '-', '40291', 'kalijati 5 no 18 antapani bandung', '081280188494', 'twodee.1774@gmail.com', '', 1),
(15, 'MAJUGIBOS', '400035', 'UFF_REG', 'xcv841', 'Dodi Farid Nurham', '100', '62', '-', '-', '-', 'Jl.Raya Samarang No.127 Garut-Jawabarat', '082151000058', 'dodifaridz@gmail.com', '', 1),
(16, 'Daddyrich', '400036', 'UFF_REG', 'sdr675', 'TAN HENDRA WIJAYA', '100', '62', '-', '-', '15142', 'Duta Gardenia blok G6 no 35A', '081918128129', 'hendrawong76@gmail.com', '', 1),
(17, 'Herrychan', '400039', 'UFF_REG', 'sck142', 'Herry chandra agus', '100', '62', 'jakarta pusat', 'Indonesia', '-', 'Johar baru', '-', 'herrychan_marquez@yahoo.co.id', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_gjfinance`
--

CREATE TABLE `g_gjfinance` (
  `id` int(10) NOT NULL,
  `nmgjfinance` varchar(100) DEFAULT NULL,
  `scdeposit` varchar(100) DEFAULT NULL,
  `scwithdraw` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_gjfinance`
--

INSERT INTO `g_gjfinance` (`id`, `nmgjfinance`, `scdeposit`, `scwithdraw`, `status`) VALUES
(1, 'Bank', 'depositBank.php', 'withdrawBank.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_guser`
--

CREATE TABLE `g_guser` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_guser`
--

INSERT INTO `g_guser` (`id`, `nama`, `keterangan`, `status`) VALUES
(1, 'Administratorz', 'Grup Administrator', 1),
(2, 'Petugas Kartu', 'Grup Petugas Kartu', 1),
(5, 'SuperAdmin', 'SuperAdmin', 1),
(6, 'Account Department', 'Account Department', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_huser`
--

CREATE TABLE `g_huser` (
  `grupid` int(10) NOT NULL,
  `pmeter` varchar(10) DEFAULT NULL,
  `pvalue` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_huser`
--

INSERT INTO `g_huser` (`grupid`, `pmeter`, `pvalue`) VALUES
(4, 'x7', 1),
(4, 'x6', 0),
(4, 'x5', 1),
(4, 'x4', 1),
(4, 'x3', 0),
(4, 'x2', 1),
(4, 'x1', 1),
(1, 'x8', 1),
(1, 'x7', 1),
(1, 'x6', 1),
(1, 'x5', 1),
(1, 'x4', 1),
(1, 'x3', 1),
(1, 'x2', 1),
(2, 'x1', 0),
(2, 'x2', 0),
(2, 'x3', 1),
(2, 'x4', 0),
(2, 'x5', 0),
(2, 'x6', 0),
(2, 'x7', 0),
(0, 'x7', 0),
(0, 'x6', 0),
(0, 'x5', 0),
(0, 'x4', 0),
(0, 'x3', 0),
(0, 'x2', 1),
(0, 'x1', 1),
(1, 'x1', 0),
(1, 'x9', 1),
(6, 'x1', 0),
(6, 'x2', 1),
(6, 'x3', 1),
(6, 'x4', 1),
(6, 'x5', 0),
(6, 'x6', 0),
(6, 'x7', 0),
(6, 'x8', 1),
(6, 'x9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `g_jfinance`
--

CREATE TABLE `g_jfinance` (
  `id` int(10) NOT NULL,
  `gjfinanceid` int(10) DEFAULT NULL,
  `nmjfinance` varchar(150) DEFAULT NULL,
  `wkproses` varchar(200) DEFAULT NULL,
  `vlkomisi` varchar(200) DEFAULT NULL,
  `nmakun` varchar(150) DEFAULT NULL,
  `noakun` varchar(100) DEFAULT NULL,
  `cabakun` varchar(100) DEFAULT NULL,
  `thumblink` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_jfinance`
--

INSERT INTO `g_jfinance` (`id`, `gjfinanceid`, `nmjfinance`, `wkproses`, `vlkomisi`, `nmakun`, `noakun`, `cabakun`, `thumblink`, `status`) VALUES
(1, 1, ' ', 'Rate 14.255', ' ', '', '', '', '../images/service/bca.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_jfinancekurs`
--

CREATE TABLE `g_jfinancekurs` (
  `id` int(10) NOT NULL,
  `jfinanceid` int(10) DEFAULT NULL,
  `kursid` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_jfinancekurs`
--

INSERT INTO `g_jfinancekurs` (`id`, `jfinanceid`, `kursid`, `status`) VALUES
(14, 1, 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_jkomisi`
--

CREATE TABLE `g_jkomisi` (
  `id` int(10) NOT NULL,
  `nmjkomisi` varchar(200) DEFAULT NULL,
  `freqjkomisi` int(10) DEFAULT NULL,
  `scrjkomisi` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_jkomisi`
--

INSERT INTO `g_jkomisi` (`id`, `nmjkomisi`, `freqjkomisi`, `scrjkomisi`, `status`) VALUES
(1, 'Profit Sharing', 1, 'bn.sharing.php', 1),
(2, 'Lots Rebate', 1, 'bn.lotsrebate.php', 1),
(3, 'Unilevel', 1, 'bn.unilevel.php', 1),
(4, 'Managers - Bonus', 1, 'bn.mgrbonus.php', 1),
(5, 'Managers - Lots Rebate', 1, 'bn.mgrlots.php', 1),
(6, 'Unilevel - Lots Rebate', 1, 'bn.unilevellots.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_jmember`
--

CREATE TABLE `g_jmember` (
  `id` varchar(10) NOT NULL,
  `nmjmember` varchar(200) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `reqscript` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_jmember`
--

INSERT INTO `g_jmember` (`id`, `nmjmember`, `rank`, `reqscript`, `status`) VALUES
('DIV', 'DIVISION MANAGER', 1, 'sc.divmgr.php', 1),
('BUS', 'BUSINESS MANAGER', 2, 'sc.busmgr.php', 1),
('SNR', 'SENIOR MANAGER', 3, 'sc.snrmgr.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_jpackage`
--

CREATE TABLE `g_jpackage` (
  `id` int(10) NOT NULL,
  `nmjpackage` varchar(200) DEFAULT NULL,
  `minvalue` varchar(50) DEFAULT NULL,
  `usrprc` varchar(50) DEFAULT NULL,
  `mgrprc` varchar(50) DEFAULT NULL,
  `rebate` varchar(50) DEFAULT NULL,
  `iconlink` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_jpackage`
--

INSERT INTO `g_jpackage` (`id`, `nmjpackage`, `minvalue`, `usrprc`, `mgrprc`, `rebate`, `iconlink`, `status`) VALUES
(1, 'Min. 500', '500.00', '50.00', '50.00', '0.50', '', 1),
(2, 'Min. 10000', '10000.00', '60.00', '40.00', '0.50', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_junilevel`
--

CREATE TABLE `g_junilevel` (
  `id` int(10) NOT NULL,
  `nmjunilevel` varchar(200) NOT NULL,
  `minsponsor` int(10) NOT NULL,
  `lvl01` varchar(50) NOT NULL,
  `lvl02` varchar(50) NOT NULL,
  `lvl03` varchar(50) NOT NULL,
  `lvl04` varchar(50) NOT NULL,
  `lvl05` varchar(50) NOT NULL,
  `lvl06` varchar(50) NOT NULL,
  `lvl07` varchar(50) NOT NULL,
  `lvl08` varchar(50) NOT NULL,
  `lvl09` varchar(50) NOT NULL,
  `lvl10` varchar(50) NOT NULL,
  `rbt01` varchar(50) NOT NULL,
  `rbt02` varchar(50) NOT NULL,
  `rbt03` varchar(50) NOT NULL,
  `rbt04` varchar(50) NOT NULL,
  `rbt05` varchar(50) NOT NULL,
  `rbt06` varchar(50) NOT NULL,
  `rbt07` varchar(50) NOT NULL,
  `rbt08` varchar(50) NOT NULL,
  `rbt09` varchar(50) NOT NULL,
  `rbt10` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_junilevel`
--

INSERT INTO `g_junilevel` (`id`, `nmjunilevel`, `minsponsor`, `lvl01`, `lvl02`, `lvl03`, `lvl04`, `lvl05`, `lvl06`, `lvl07`, `lvl08`, `lvl09`, `lvl10`, `rbt01`, `rbt02`, `rbt03`, `rbt04`, `rbt05`, `rbt06`, `rbt07`, `rbt08`, `rbt09`, `rbt10`, `status`) VALUES
(1, 'Unilevel 1', 1, '8.00', '6.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1),
(2, 'Unilevel 2', 2, '8.00', '6.00', '4.00', '2.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1),
(3, 'Unilevel 3', 3, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.00', '0.00', '0.00', '0.00', 1),
(4, 'Unilevel 4', 4, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.00', '0.00', 1),
(5, 'Unilevel 5', 5, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.50', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.50', '0.00', 1),
(6, 'Unilevel 6', 6, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.50', '0.50', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.50', '0.50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_kurs`
--

CREATE TABLE `g_kurs` (
  `id` varchar(10) NOT NULL,
  `nmkurs` varchar(100) DEFAULT NULL,
  `excbuy` varchar(50) DEFAULT NULL,
  `excsell` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_kurs`
--

INSERT INTO `g_kurs` (`id`, `nmkurs`, `excbuy`, `excsell`, `status`) VALUES
('IDR', 'Indonesia Rupiah', '13800.00', '14255.00', 1),
('USD', 'US Dollar', '1.00', '1.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_member`
--

CREATE TABLE `g_member` (
  `userid` varchar(100) NOT NULL,
  `xpass` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `xpass2` varchar(200) DEFAULT NULL,
  `password2` varchar(200) DEFAULT NULL,
  `nmmember` varchar(200) DEFAULT NULL,
  `parentid` varchar(100) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `upline` varchar(100) DEFAULT NULL,
  `posisi` varchar(2) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `unilevel` int(10) DEFAULT NULL,
  `broker` int(10) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `nohp1` varchar(50) DEFAULT NULL,
  `nohp2` varchar(50) DEFAULT NULL,
  `tgllahir` varchar(25) DEFAULT NULL,
  `noktp` varchar(100) DEFAULT NULL,
  `jkelamin` varchar(1) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(50) DEFAULT NULL,
  `kota` varchar(150) DEFAULT NULL,
  `propinsi` varchar(150) DEFAULT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `negara` varchar(10) DEFAULT NULL,
  `nmbank` varchar(200) DEFAULT NULL,
  `cabbank` varchar(200) DEFAULT NULL,
  `norek` varchar(100) DEFAULT NULL,
  `atasnama` varchar(200) DEFAULT NULL,
  `swiftcode` varchar(50) DEFAULT NULL,
  `ben_name` varchar(200) DEFAULT NULL,
  `ben_nric` varchar(200) DEFAULT NULL,
  `tgldaftar` varchar(25) DEFAULT NULL,
  `waktudaftar` varchar(25) DEFAULT NULL,
  `tglaktif` varchar(25) DEFAULT NULL,
  `waktuaktif` varchar(25) DEFAULT NULL,
  `parentstatus` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `staktif` int(2) DEFAULT NULL,
  `root` int(2) DEFAULT NULL,
  `blokir` int(2) DEFAULT NULL,
  `flogin` int(2) DEFAULT NULL,
  `stumroh` int(2) DEFAULT NULL,
  `tglstumroh` varchar(25) DEFAULT NULL,
  `voucherid` int(10) DEFAULT NULL,
  `spm` int(2) DEFAULT NULL,
  `spm1` int(2) DEFAULT NULL,
  `bspm1` varchar(50) DEFAULT NULL,
  `spm2` int(2) DEFAULT NULL,
  `bspm2` varchar(50) DEFAULT NULL,
  `freeacc` int(2) DEFAULT NULL,
  `compacc` int(2) DEFAULT NULL,
  `roiblock` int(2) DEFAULT NULL,
  `mbrlink` varchar(200) DEFAULT NULL,
  `mbrpic` varchar(200) DEFAULT NULL,
  `mbrqrcode` varchar(200) DEFAULT NULL,
  `autowd` int(11) DEFAULT NULL,
  `stsecret` int(2) DEFAULT NULL,
  `secretanswer` varchar(200) DEFAULT NULL,
  `ktplink` varchar(200) DEFAULT NULL,
  `jmemberid` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_member`
--

INSERT INTO `g_member` (`userid`, `xpass`, `password`, `xpass2`, `password2`, `nmmember`, `parentid`, `urut`, `upline`, `posisi`, `sponsor`, `level`, `unilevel`, `broker`, `email`, `nohp1`, `nohp2`, `tgllahir`, `noktp`, `jkelamin`, `alamat`, `telepon`, `kota`, `propinsi`, `kodepos`, `negara`, `nmbank`, `cabbank`, `norek`, `atasnama`, `swiftcode`, `ben_name`, `ben_nric`, `tgldaftar`, `waktudaftar`, `tglaktif`, `waktuaktif`, `parentstatus`, `status`, `staktif`, `root`, `blokir`, `flogin`, `stumroh`, `tglstumroh`, `voucherid`, `spm`, `spm1`, `bspm1`, `spm2`, `bspm2`, `freeacc`, `compacc`, `roiblock`, `mbrlink`, `mbrpic`, `mbrqrcode`, `autowd`, `stsecret`, `secretanswer`, `ktplink`, `jmemberid`) VALUES
('001', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'EXTROGATE', '001', 0, '', '', '', 1, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '2019-03-04', '21:34:08', '', '', 1, 1, 1, 1, 0, 1, 0, '', 0, 0, 0, '0.00', 0, '0.00', 0, 0, 0, 'r/001', '', 'member/upl/qr/', 0, 0, '', '', 'DIV'),
('member01', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'MEMBER 01', 'member01', 0, '', '', 'member04', 0, 3, 0, 'member01@member01.com', '89090', '', '1980-03-10', '123455', '', 'uuuuu', '', 'bdg', 'bdg', '8980890', '99', 'BCA', 'DDDD', '890890', 'member01', '', '', '', '2019-03-20', '10:46:01', '', '', 1, 99, 0, 0, 0, 1, 0, '', 0, 0, 0, '0.00', 0, '0.00', 0, 0, 0, 'http://localhost/extrogater/member01', '', 'http://localhost/extrogatemember/upl/qr/member01.png', 0, 2, 'keo', '../images/doc/0000452693_14.jpg', ''),
('member04', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'MEMBER 04', 'member04', 0, '', '', '001', 0, 2, 0, 'member04@member04.com', '987987', '', '', '789789', '', 'uuuu', '', 'bdg', 'bdg', '15000', '99', '', '', '', '', '', '', '', '2019-03-20', '10:24:51', '2019-03-20', '10:41:39', 1, 1, 1, 0, 0, 1, 0, '', 0, 0, 0, '0.00', 0, '0.00', 0, 0, 0, 'http://localhost/extrogater/member04', '', 'http://localhost/extrogatemember/upl/qr/member04.png', 0, 2, 'oke', '../images/doc/0000452693_13.jpg', ''),
('Harianto', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Harianto', 'Harianto', NULL, '', '', '001', 0, 2, 0, 'aw_platinum@yahoo.com', '081717711777', NULL, '1971-09-30', 'Indonesia', NULL, 'Pik', NULL, 'Jakarta utara', 'Jakarta', '10055', '62', 'Bca', 'Sabang', '0757799999', 'Harianto', '', NULL, NULL, '2019-03-21', '17:06:22', '2019-03-21', '17:10:32', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://localhost/extrogater/Harianto', '', 'http://localhost/extrogatemember/upl/qr/Harianto.png', NULL, 1, 'Ibu harianto', '../images/doc/IMG-20190310-WA0058.jpg', ''),
('Calvin', '808080', 'f3de77fda18603533d1ebc8083bc49c8fbe2709d', '808080', 'f3de77fda18603533d1ebc8083bc49c8fbe2709d', 'Calvin soemito makmur', 'Calvin', NULL, '', '', '001', 0, 2, 0, 'Calvinmkr@gmail.com', '081212305639', NULL, '1973-12-27', 'Indonesia', NULL, 'Cipinang bunder baru', NULL, 'Jakarta timur', 'Dki jakarta', '10055', '62', 'Bca', 'Sabang', '0751511000', 'Calvin soemito makmur', '', NULL, NULL, '2019-03-22', '10:23:07', '2019-03-22', '10:26:04', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/Calvin', '', 'http://182.23.85.67/extrogatemember/upl/qr/Calvin.png', NULL, 1, 'Mak', '../images/doc/20190321_211608.jpg', 'DIV'),
('Lips', '020108', '8c68da7b37bd90f373834eafe221c1aff9c8c9fe', '020108', '8c68da7b37bd90f373834eafe221c1aff9c8c9fe', 'Desi maria', 'Lips', NULL, '', '', 'Calvin', 0, 3, 0, 'desimaria2612@yahoo.com', '08180888559', NULL, '1969-12-26', 'Indonesia', NULL, 'Jakarta', NULL, 'Jakarta', 'Jakarta', '123456', '62', 'Bca', 'Tsman anggrek', '4671251291', 'Desi maria', '', NULL, NULL, '2019-03-22', '11:22:48', '2019-03-22', '11:27:49', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/Lips', '', 'http://182.23.85.67/extrogatemember/upl/qr/Lips.png', NULL, 1, 'Ie lan hwa', '../images/doc/IMG-20190322-WA0007.jpg', ''),
('Rocky ', 'rockytan88', '108565c6029e5f7606c12ef40b985cfb32ebd36e', 'rockytan88', '108565c6029e5f7606c12ef40b985cfb32ebd36e', 'Rocky Tan', 'Rocky ', NULL, '', '', 'Calvin', 0, 3, 0, 'crashbdc99@gmail.com', '085782224981', NULL, '1980-04-23', 'Indonesia', NULL, 'Mardani Raya 12', NULL, 'Jakarta Pusat', 'Jakarta', '10560', '62', 'Bca', 'JAKARTA', '4870247961', 'VINA', '', NULL, NULL, '2019-03-22', '12:51:22', '2019-03-22', '13:09:42', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/Rocky ', '', 'http://182.23.85.67/extrogatemember/upl/qr/Rocky .png', NULL, 1, 'NELLY', '../images/doc/IMG-20190322-WA0010.jpg', ''),
('Winner1010', 'joseww1010', '880d7bcedfb22baf1b5f639eed0803ec345ea59f', 'joseww1010', '880d7bcedfb22baf1b5f639eed0803ec345ea59f', 'Josenova', 'Winner1010', NULL, '', '', 'Calvin', 0, 3, 0, 'sanjose.lamborghini@gmail.com', '08111992977', NULL, '1980-10-29', 'Indonesia', NULL, 'Kemayoran', NULL, 'Jakarta pusat', 'Jakarta', '10450', '62', 'Bca', 'Roxy mas', '5450052029', 'Josenova', '', NULL, NULL, '2019-03-22', '14:58:11', '2019-03-22', '15:19:40', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/Winner1010', '', 'http://182.23.85.67/extrogatemember/upl/qr/Winner1010.png', NULL, 1, 'Lilis Tjanaka', '../images/doc/IMG-20190322-WA0015.jpg', ''),
('Awei', '317317', '8c65285dfb025fe8abe38aee1445b82331a15b3f', '318318', '25b19e2b087a8306640dbdc38ebd772372008fcd', 'Harianto', 'Awei', NULL, '', '', 'Calvin', 0, 3, 0, 'aw_platinum@yahoo.com', '081717711777', NULL, '1971-09-30', 'Indonesia', NULL, 'Layar 4 jak utara', NULL, 'Jakarta utara', 'Jakarta', '14460', '62', 'Bca', 'Sabang', '0757799999', 'Haryanto', '', NULL, NULL, '2019-03-22', '16:20:10', '2019-03-22', '18:45:40', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/Awei', '', 'http://182.23.85.67/extrogatemember/upl/qr/Awei.png', NULL, 1, 'Jong soei moy', '../images/doc/IMG-20190322-WA0019.jpg', ''),
('coba01', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'COBA 01', 'coba01', NULL, '', '', '001', 0, 2, 0, 'coba01@coba01.com', '1234', NULL, '1970-01-01', '789789', NULL, 'alamat', NULL, 'bdg', 'bdg', '12345', '62', 'coba01', 'coba01', 'coba01', 'coba01', '', NULL, NULL, '2019-03-26', '13:19:52', '', '', 1, 99, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/coba01', '', 'http://182.23.85.67/extrogatemember/upl/qr/coba01.png', NULL, 1, 'dddd', '../images/doc/0__5uKfkBjrINtnbUn_(1).jpg', ''),
('dhisca', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Yudi arudiskara', 'dhisca', NULL, '', '', 'member04', 0, 3, 0, 'ayahhaura.bh@gmail.com', '-', NULL, '1993-12-03', '-', NULL, '-', NULL, '-', '-', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-26', '13:51:58', '2019-03-26', '13:54:59', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/dhisca', '', 'http://182.23.85.67/extrogatemember/upl/qr/dhisca.png', NULL, 1, 'Maryam', '../images/doc/KTP_E013.jpg', ''),
('yudi', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Yudi Arudiskara', 'yudi', NULL, '', '', 'member04', 0, 3, 0, 'ayahhaura.bh@gmail.com', '-', NULL, '1983-12-03', '-', NULL, '-', NULL, '-', '-', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-27', '19:51:44', '2019-03-27', '19:52:18', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'http://182.23.85.67/extrogater/yudi', '', 'http://182.23.85.67/extrogatemember/upl/qr/yudi.png', NULL, 1, 'maryam', '../images/doc/KTP_E_Yudi_2.jpg', ''),
('yudi2', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Yudi Arudiskara', 'yudi2', NULL, '', '', 'member04', 0, 3, 0, 'ayahhaura.bh@gmail.com', '-', NULL, '1983-12-03', '-', NULL, '-', NULL, '-', '-', '-', '62', 'BCA', '-', '-', 'Yudi Arudiskara', '', NULL, NULL, '2019-03-28', '05:53:05', '2019-03-28', '05:54:25', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/yudi2', '', 'https://extrogate.netmember/upl/qr/yudi2.png', NULL, 1, 'maryam', '../images/doc/KTP_E013_2.jpg', ''),
('yudi3', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Yudi Arudiskara', 'yudi3', NULL, '', '', 'member04', 0, 3, 0, 'ayahhaura.bh@gmail.com', '-', NULL, '1983-12-03', '-', NULL, '-', NULL, '-', '-', '-', '93', 'BCA', '-', '-', 'Yudi Arudiskara', '', NULL, NULL, '2019-03-28', '05:59:41', '2019-03-28', '05:59:56', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/yudi3', '', 'https://extrogate.netmember/upl/qr/yudi3.png', NULL, 1, 'maryam', '../images/doc/KTP_E013_3.jpg', ''),
('yudi4', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Yudi Arudiskara', 'yudi4', NULL, '', '', 'member04', 0, 3, 0, 'ayahhaura.bh@gmail.com', '-', NULL, '1983-12-03', '-', NULL, '-', NULL, '-', '-', '-', '93', 'BCA', '-', '-', 'Yudi Arudiskara', '', NULL, NULL, '2019-03-28', '06:03:31', '2019-03-28', '06:03:42', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/yudi4', '', 'https://extrogate.netmember/upl/qr/yudi4.png', NULL, 1, 'maryam', '../images/doc/KTP_E013_5.jpg', ''),
('cobax001', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'COBA X001', 'cobax001', NULL, '', '', '001', 0, 2, 0, 'cobax001@cobax001.COM', 'cobax001', NULL, '1980-01-07', 'cobax001', NULL, 'cobax001', NULL, 'cobax001', 'cobax001', 'cobax001', '62', '', '', '', '', '', NULL, NULL, '2019-03-28', '10:58:22', '', '', 1, 99, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/cobax001', '', 'https://extrogate.netmember/upl/qr/cobax001.png', NULL, 1, 'cobax001', '../images/doc/0__5uKfkBjrINtnbUn_(1)_1.jpg', ''),
('Willy chandry', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Willy chandry', 'Willy chandry', NULL, '', '', 'Lips', 0, 4, 0, 'willychandry@gmail.com', '081311131981', NULL, '1981-11-03', 'Indonesia', NULL, 'Jakarta ', NULL, 'Indonesia', 'Jakarta', '123456', '62', '5250320363', 'Jakarta', '5250320363', 'Willy chandry', '', NULL, NULL, '2019-03-28', '12:54:42', '', '', 1, 99, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Willy chandry', '', 'https://extrogate.netmember/upl/qr/Willy chandry.png', NULL, 1, 'Juliana', '../images/doc/IMG-20190328-WA0006.jpg', ''),
('Willy1981', '031181', 'cdfc3fa94b2804e24265b6a38588ff76a0687c08', '031181', 'cdfc3fa94b2804e24265b6a38588ff76a0687c08', 'Willy chandry', 'Willy1981', NULL, '', '', 'Lips', 0, 4, 0, 'willychandry@gmail.com', '081311131981', NULL, '1981-11-03', '3172010311810001', NULL, 'Jakarta', NULL, 'Jakarta', 'Indonesia', '123456', '62', 'Bca', 'Jakarta', '5250320363', 'Willy chandry', '', NULL, NULL, '2019-03-28', '16:03:49', '2019-03-28', '16:25:56', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Willy1981', '', 'https://extrogate.netmember/upl/qr/Willy1981.png', NULL, 1, 'Juliana', '../images/doc/IMG-20190328-WA0006_4.jpg', ''),
('Hanselking', '01080709', 'f0b9b54b5fed9230ac1d7998a87375cd3a5017b6', '01080709', 'f0b9b54b5fed9230ac1d7998a87375cd3a5017b6', 'Andriani lestiyarini', 'Hanselking', NULL, '', '', 'Lips', 0, 4, 0, 'okenonik@yahoo.com', '081904555588', NULL, '1974-09-07', 'Indonesia', NULL, 'Solo', NULL, 'Solo', 'Indonesia', '123456', '62', 'Bca', 'Solo', '0150284015', 'Andriani lestiyarini', '', NULL, NULL, '2019-03-28', '16:28:20', '2019-03-28', '16:28:35', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Hanselking', '', 'https://extrogate.netmember/upl/qr/Hanselking.png', NULL, 1, 'Andriani', '../images/doc/IMG-20190322-WA0014_4.jpg', ''),
('Christokhu', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Christo', 'Christokhu', NULL, '', '', 'Lips', 0, 4, 0, 'christokhu@gmail.com', '087868623079', NULL, '1979-02-18', '1271101802970001', NULL, 'Jl.sutrisno no.131c', NULL, 'Medan', 'Indonesia', '20214', '62', 'Bca', 'Medan', '0222379049', 'Christo', '', NULL, NULL, '2019-03-28', '17:31:33', '2019-03-28', '17:35:50', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Christokhu', '', 'https://extrogate.netmember/upl/qr/Christokhu.png', NULL, 1, 'Jutikuntung', '../images/doc/IMG-20190328-WA0036_1.jpg', ''),
('Ezrain', '01080709', 'f0b9b54b5fed9230ac1d7998a87375cd3a5017b6', '01080709', 'f0b9b54b5fed9230ac1d7998a87375cd3a5017b6', 'In Nien', 'Ezrain', NULL, '', '', 'Hanselking', 0, 5, 0, 'ezrain2003@yahoo.com', '+628175477777', NULL, '1974-08-01', 'Indonesia', NULL, 'Kramat, kemiri, kebakkramat', NULL, 'SOLO/JAWA TENGAH', 'Jawa Tengah', '57137', '62', 'BCA', 'BCA cabang Pingit Jogja', '0600000004', 'In Nien', '', NULL, NULL, '2019-03-28', '18:21:33', '2019-03-28', '18:41:44', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Ezrain', '', 'https://extrogate.netmember/upl/qr/Ezrain.png', NULL, 1, 'Nanik', '../images/doc/Screenshot_20190328-190003_WhatsApp.jpg', ''),
('Aditan', '125Adielrica', '01242fc099676b0dac5dc767082ee4343714e934', '125Adielrica', '01242fc099676b0dac5dc767082ee4343714e934', 'Adi', 'Aditan', NULL, '', '', 'Christokhu', 0, 5, 0, 'aditan19@gmail.com', '08116022523', NULL, '1981-12-19', '1271141912810008', NULL, 'Jl. Pukat II Gg. Bulutangkis No.9A', NULL, 'Medan', 'Medan Sumatera Utara', '20224', '62', 'BCA', 'Bukit barisan Medan', '7980150814', 'Adi', '', NULL, NULL, '2019-03-28', '18:22:27', '2019-03-28', '18:41:17', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Aditan', '', 'https://extrogate.netmember/upl/qr/Aditan.png', NULL, 1, 'Kim sin', '../images/doc/IMG-20180425-WA0033.jpg', ''),
('fandy01', '123456js', '663f9e1c1791cb35d6247b58daaefe3e44019a82', '123456js', '663f9e1c1791cb35d6247b58daaefe3e44019a82', 'Fandy', 'fandy01', NULL, '', '', 'winner1010', 0, 4, 0, 'fandy7302@gmail.com', '082132363355', NULL, '1972-02-26', '3578102602730009', NULL, '-', NULL, '-', '-', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-28', '18:40:11', '2019-03-28', '18:40:44', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/fandy01', '', 'https://extrogate.netmember/upl/qr/fandy01.png', NULL, 1, 'Any sandrawaty', '../images/doc/Screenshot_2019-03-28-18-14-30_com.whatsapp.png', ''),
('catwoman', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Dhita Adelian Atmanegara', 'catwoman', NULL, '', '', 'winner1010', 0, 4, 0, 'twodee.1774@gmail.com', '081280188494', NULL, '1993-03-20', '327312600290001', NULL, 'kalijati 5 no 18 antapani bandung', NULL, 'Bandung', '-', '40291', '62', '-', '-', '-', 'Dhita Adelian Atmanegara ', '', NULL, NULL, '2019-03-28', '19:13:03', '2019-03-28', '19:13:34', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/catwoman', '', 'https://extrogate.netmember/upl/qr/catwoman.png', NULL, 1, 'lidya dinda dian indrawati', '../images/doc/Screenshot_2019-03-28-18-14-46_com.whatsapp.png', ''),
('MAJUGIBOS', '181600', '812f36a85b2a5487535390fc1ab7fa901a5b8188', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Dodi Farid Nurham', 'MAJUGIBOS', NULL, '', '', 'Catwoman', 0, 5, 0, 'dodifaridz@gmail.com', '082151000058', NULL, '1983-05-04', '1802010405830011', NULL, 'Jl.Raya Samarang No.127 Garut-Jawabarat', NULL, '-', '-', '-', '62', '-', '-', '-', 'Dodi Farid Nurham', '', NULL, NULL, '2019-03-28', '19:41:54', '2019-03-28', '19:42:24', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/MAJUGIBOS', '', 'https://extrogate.netmember/upl/qr/MAJUGIBOS.png', NULL, 1, '-', '../images/doc/Screenshot_2019-03-28-18-14-44_com.whatsapp_1.png', ''),
('Daddyrich', 'Rich8899', '286cfdec455f54090f055004352b01f69dfdfbf5', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'TAN HENDRA WIJAYA', 'Daddyrich', NULL, '', '', 'winner1010', 0, 4, 0, 'hendrawong76@gmail.com', '081918128129', NULL, '1976-12-18', '3671041811760003', NULL, 'Duta Gardenia blok G6 no 35A', NULL, '-', '-', '15142', '62', '-', '-', '-', 'TAN HENDRA WIJAYA', '', NULL, NULL, '2019-03-29', '00:05:02', '2019-03-29', '00:05:32', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Daddyrich', '', 'https://extrogate.netmember/upl/qr/Daddyrich.png', NULL, 1, 'Rosmala', '../images/doc/Screenshot_2019-03-28-22-23-57_com.whatsapp_1.png', ''),
('indonesia001', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Albert Alexander mokodongan', 'indonesia001', NULL, '', '', 'Winner1010', 0, 4, 0, 'albert2.bni46@gmail.com', '081340644700', NULL, '1978-04-18', '7171091804780002', NULL, ' malalayang 1 Ling 9 manado\n', NULL, 'Manado', '-', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-29', '10:23:54', '2019-03-29', '10:29:22', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/indonesia001', '', 'https://extrogate.netmember/upl/qr/indonesia001.png', NULL, 1, 'Silvana sumual', '../images/doc/ktp.jpg', ''),
('Goldenangel', '12345', '8cb2237d0679ca88db6464eac60da96345513964', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Velisah', 'Goldenangel', NULL, '', '', 'Ezrain', 0, 6, 0, 'velisahwang@gmail.com', '+6281808008362', NULL, '1983-11-03', 'Indonesia', NULL, 'Sutera Fenoria park 1 no.11 Alam Sutera', NULL, 'Tangerang', 'Jawa Barat', '15325', '62', '', '', '', '', '', NULL, NULL, '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Goldenangel', '', 'https://extrogate.netmember/upl/qr/Goldenangel.png', NULL, 1, 'Nonik', '../images/doc/IMG-20190329-WA0014.jpg', ''),
('dodycand7526', 'dody260675', '1616704c6fbcf16f7b3653b842d5a8c4ec63beac', 'dody260675', '1616704c6fbcf16f7b3653b842d5a8c4ec63beac', 'Dody Candra', 'dodycand7526', NULL, '', '', 'fandy01', 0, 5, 0, 'dodycand2606@gmail.com', '082233010175', NULL, '1975-06-26', '3578092606750001', NULL, 'Jl. Semolowaru Tengah 11/14', NULL, 'Surabaya', 'Jawa Timur', '60119', '62', 'BCA ', 'Prapen,Surabaya', '5120422997', 'Dody Candra', '', NULL, NULL, '2019-03-29', '16:33:35', '2019-03-29', '16:46:10', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/dodycand7526', '', 'https://extrogate.netmember/upl/qr/dodycand7526.png', NULL, 1, 'Telly', '../images/doc/IMG-20190328-WA0029_4.jpg', ''),
('WIN10', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Erwin Winata', 'WIN10', NULL, '', '', 'daddyrich', 0, 5, 0, 'erwinwinata10@gmail.com', '+62 818-0662-0002', NULL, '1981-10-10', '3171021007810001', NULL, 'JL Dwiwarna GG V No 20. \n', NULL, 'Jakarta Pusat', '-', '10740', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-29', '17:03:35', '2019-03-29', '17:04:33', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/WIN10', '', 'https://extrogate.netmember/upl/qr/WIN10.png', NULL, 1, 'Maria Magdalena', '../images/doc/erwin_winata.jpg', ''),
('Joevira', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Usaha789', 'f426e3ee4e5a69fbb09465e9a15b9055001012c6', ' joevira yaptonaga', 'Joevira', NULL, '', '', 'dodycand7526', 0, 6, 0, 'joevira.yaptonaga@gmail.com', '081218865688', NULL, '1986-05-20', '3172016005860009', NULL, 'jl. Camar permai Vii/ 5', NULL, 'Jakarta Utara', '-', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Joevira', '', 'https://extrogate.netmember/upl/qr/Joevira.png', NULL, 1, 'lilis tjanaka', '../images/doc/joevira.jpg', ''),
('Hutama', '999999', '1f5523a8f535289b3401b29958d01b2966ed61d2', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Hutama Trinanda', 'Hutama', NULL, '', '', 'Willy1981', 0, 5, 0, 'tomihutama@gmail.com', '0818818603', NULL, '1977-10-04', '3175070410770007', NULL, 'Kav DKI blok A5 no.6 ', NULL, 'Jakarta Timur', 'DKI Jakarta', '11750', '62', 'Bank Central Asia', 'Jakarta', '2181542545', 'Hutama Trinanda', '', NULL, NULL, '2019-03-30', '09:26:36', '2019-04-01', '09:16:45', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Hutama', '', 'https://extrogate.netmember/upl/qr/Hutama.png', NULL, 1, 'Ernawati', '../images/doc/IMG-20190330-WA0003.jpg', ''),
('darningsih', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Darningsih', 'darningsih', NULL, '', '', 'Willy1981', 0, 5, 0, 'frans_nico@yahoo.com', '081399775599', NULL, '1975-05-17', '3174035705750005', NULL, 'Apt the bellezza twr albergo lt.28-18', NULL, 'Jakarta', 'DKI Jakarta', '123456', '62', 'Bank Central Asia', 'Jakarta', '0761184121', 'Darningsih', '', NULL, NULL, '2019-03-30', '23:44:28', '2019-04-01', '09:16:57', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/darningsih', '', 'https://extrogate.netmember/upl/qr/darningsih.png', NULL, 1, 'Darningsih', '../images/doc/IMG-20190330-WA0043.jpg', ''),
('Sumberhasil', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Budi Wiyanto', 'Sumberhasil', NULL, '', '', 'Ezrain', 0, 6, 0, 'bodhiratana5758@gmail.com', '+6281918275758', NULL, '1976-02-06', 'Indonesia', NULL, 'Jl. Raya Langsep Barat kav 41 Malang', NULL, 'Malang', 'Jawa Timur', '65100', '62', '', '', '', '', '', NULL, NULL, '2019-03-31', '18:24:53', '', '', 1, 99, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Sumberhasil', '', 'https://extrogate.netmember/upl/qr/Sumberhasil.png', NULL, 1, 'Nonik', '../images/doc/Screenshot_20190331-180455_WhatsApp_2.jpg', ''),
('Waterfall', '12345', '8cb2237d0679ca88db6464eac60da96345513964', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Dewi Triana Agustina', 'Waterfall', NULL, '', '', 'Goldenangel', 0, 7, 0, 'dewidewit11@gmail.com', '+6281322229875', NULL, '1975-08-11', 'Indonesia', NULL, 'Jamblang Raya no.94 Tangerang', NULL, 'Tangetang', 'Jawa Barat', '15138', '62', '', '', '', '', '', NULL, NULL, '2019-03-31', '18:44:51', '', '', 1, 99, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Waterfall', '', 'https://extrogate.netmember/upl/qr/Waterfall.png', NULL, 1, 'Nonik', '../images/doc/Screenshot_20190331-182514_WhatsApp_1.jpg', ''),
('spartateam', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'asdf1234', 'f58cf5e7e10f195e21b553096d092c763ed18b0e', 'Herry Susanto eng', 'spartateam', NULL, '', '', 'Winner1010', 0, 4, 0, 'spartateam.hq@gmail.com', '081370958333', NULL, '1979-09-21', '1271102109790001', NULL, ' jl BLK gg sekata no.4 medan\n', NULL, 'Medan', 'Indonesia', ' 20234', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-04-01', '13:04:22', '2019-04-01', '13:04:52', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/spartateam', '', 'https://extrogate.netmember/upl/qr/spartateam.png', NULL, 1, 'juliana kang', '../images/doc/herry.jpg', ''),
('Herrychan', 'jkl789', 'f854a87bc36b42cfa7eda57a757591289a639938', 'jkl789', 'f854a87bc36b42cfa7eda57a757591289a639938', 'Herry chandra agus', 'Herrychan', NULL, '', '', 'member04', 0, 3, 0, 'herrychan_marquez@yahoo.co.id', '-', NULL, '1983-06-02', '3171080208830007', NULL, 'Johar baru', NULL, 'jakarta pusat', 'Indonesia', '-', '62', '-', '-', '-', '-', '', NULL, NULL, '2019-04-02', '11:08:49', '2019-04-02', '11:10:24', 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, NULL, 0, '0.00', 0, '0.00', 0, NULL, NULL, 'https://extrogate.netr/Herrychan', '', 'https://extrogate.netmember/upl/qr/Herrychan.png', NULL, 1, 'tinny agus', '../images/doc/herry_chan.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `g_negara`
--

CREATE TABLE `g_negara` (
  `id` varchar(10) NOT NULL,
  `nmnegara` varchar(150) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_negara`
--

INSERT INTO `g_negara` (`id`, `nmnegara`, `status`) VALUES
('93', 'Afghanistan ', 1),
('355', 'Albania ', 1),
('213', 'Algeria ', 1),
('1684', 'American Samoa', 1),
('376', 'Andorra, Principality of ', 1),
('244', 'Angola', 1),
('1264', 'Anguilla ', 1),
('1268', 'Antigua and Barbuda', 1),
('54', 'Argentina ', 1),
('374', 'Armenia', 1),
('297', 'Aruba', 1),
('61', 'Australia / Cocos (Keeling) Islands', 1),
('43', 'Austria', 1),
('994', 'Azerbaijan or Azerbaidjan (Former Azerbaijan Soviet Socialist Republic)', 1),
('1242', 'Bahamas, Commonwealth of The', 1),
('973', 'Bahrain, Kingdom of (Former Dilmun)', 1),
('880', 'Bangladesh (Former East Pakista', 1),
('1246', 'Barbados ', 1),
('375', 'Belarus (Former Belorussian [Byelorussian] Soviet Socialist Republic)', 1),
('32', 'Belgium ', 1),
('501', 'Belize (Former British Honduras)', 1),
('229', 'Benin (Former ', 1),
('1441', 'Bermuda ', 1),
('975', 'Bhutan, Kingdom of', 1),
('591', 'Bolivia ', 1),
('387', 'Bosnia and Herzegovina ', 1),
('267', 'Botswana (Form', 1),
('55', 'Brazil ', 1),
('673', 'Brunei (Negara Brunei Darussalam) ', 1),
('359', 'Bulgaria ', 1),
('226', 'Burkina Faso (Former Upper Volta)', 1),
('257', 'Burundi (F', 1),
('855', 'Cambo', 1),
('237', 'Cameroon (Former French Cameroon)', 1),
('238', 'Cape Verde ', 1),
('1345', 'Cayman Islands ', 1),
('236', 'Central African Republic ', 1),
('235', 'Chad ', 1),
('56', 'Chile ', 1),
('86', 'China ', 1),
('57', 'Colombia ', 1),
('269', 'Comoros, Union of the / Mayotte (Territorial Collectivity of Mayotte)', 1),
('243', 'Congo, Democratic Republic of the (Former Zaire) ', 1),
('242', 'Congo, Republic of the', 1),
('682', 'Cook Islands (Former Harvey Islands)', 1),
('506', 'Costa Rica ', 1),
('225', 'Cote D\'Ivoire (Former Ivory Coast) ', 1),
('385', 'Croatia (Hrvatska) ', 1),
('53', 'Cuba / Christmas Island ', 1),
('357', 'Cyprus ', 1),
('420', 'Czech Republic', 1),
('45', 'Denmark ', 1),
('253', 'Djibouti (For', 1),
('1767', 'Dominica ', 1),
('1809 and 1', 'Dominican Republic ', 1),
('670', 'East Timor (Former Portuguese Timor)', 1),
('593', 'Ecuador ', 1),
('20', 'Egypt (Former United Arab Republic  with Syria)', 1),
('503', 'El Salvador ', 1),
('240', 'Equatorial G', 1),
('291', 'Eritre', 1),
('372', 'Estonia (Former Estonian Soviet Socialist Republic)', 1),
('251', 'Ethiopia (Former Abyssinia, Italian East Africa)', 1),
('500', 'Falkland', 1),
('298', 'Faroe Islands ', 1),
('679', 'Fiji ', 1),
('358', 'Finland ', 1),
('33', 'France ', 1),
('594', 'French Guiana or French Guyana ', 1),
('689', 'French Polynesia (Former French Colony of Oceania)', 1),
('241', 'Gabon (Gabonese Republic)', 1),
('220', 'Gambia, The ', 1),
('995', 'Georgia (Former Georgian Soviet Socialist Republic)', 1),
('49', 'Germany ', 1),
('233', 'Ghana (Former Gold Coast)', 1),
('350', 'Gibraltar ', 1),
('30', 'Greece ', 1),
('299', 'Greenland ', 1),
('1473', 'Grenada ', 1),
('590', 'Guadeloupe', 1),
('1671', 'Guam', 1),
('502', 'Guatemala ', 1),
('224', 'Guinea (Former French Guinea)', 1),
('245', 'GuineaBiss', 1),
('592', 'Guyana (Former British Guiana)', 1),
('509', 'Haiti ', 1),
('504', 'Honduras ', 1),
('852', 'Hong Kong ', 1),
('36', 'Hungary ', 1),
('354', 'Iceland ', 1),
('91', 'India ', 1),
('62', 'Indonesia', 1),
('98', 'Iran, Islamic Republic of', 1),
('964', 'Iraq ', 1),
('353', 'Ireland ', 1),
('972', 'Israel ', 1),
('39', 'Italy ', 1),
('1876', 'Jamaica ', 1),
('81', 'Japan ', 1),
('962', 'Jordan (Fo', 1),
('254', 'Kenya (Former British East Africa)', 1),
('686', 'Kiribati (Pronounced keerreebahss) (Former Gilbert Islands)', 1),
('850', 'Korea, Democratic People\'s Rep', 1),
('82', 'Korea, Republic of (South Korea) ', 1),
('965', 'Kuwait ', 1),
('996', 'Kyrgyzst', 1),
('856', 'Lao People\'s Democratic Republic (Laos)', 1),
('371', 'Latvia (Fo', 1),
('961', 'Lebanon ', 1),
('266', 'Lesotho (Former Basutoland)', 1),
('231', 'Liberia ', 1),
('218', 'Libya', 1),
('423', 'Liechtenstein ', 1),
('370', 'Lithuania (Former Lithuanian Soviet Socialist Republic)', 1),
('352', 'Luxembourg ', 1),
('853', 'Macau ', 1),
('389', 'Macedonia, The Former Yugoslav Republic of', 1),
('261', 'Madagascar (Former Malagasy Republic)', 1),
('265', 'Malawi (Former British Central African Protectorate, Nyasaland)', 1),
('60', 'Malaysia ', 1),
('960', 'Maldives ', 1),
('223', 'Mali (Former French Suda', 1),
('356', 'Malta ', 1),
('692', 'Marshall Islands (Former Marshall Islands District  Trust Territory of the Pacific Islands)', 1),
('596', 'Martinique (French', 1),
('222', 'Mauritania ', 1),
('230', 'Mauritius ', 1),
('52', 'Mexico ', 1),
('691', 'Micronesia, Feder', 1),
('373', 'Moldova, Republic of', 1),
('377', 'Monaco, Principality of', 1),
('976', 'Mongolia (Former Outer Mongolia)', 1),
('1664', 'Montserrat ', 1),
('212', 'Morocco ', 1),
('258', 'Mozambique (Former Portuguese East Africa)', 1),
('95', 'Myanmar, Union of (Former Burma)', 1),
('264', 'Namibia (Former German Southwest Africa, SouthWest Africa)', 1),
('674', 'Nauru (Former Pleasant Island)', 1),
('977', 'Nepal ', 1),
('31', 'Netherlands ', 1),
('599', 'Netherl', 1),
('687', 'New Caledonia ', 1),
('64', 'New Zealand ', 1),
('505', 'Nicaragua ', 1),
('227', 'Niger ', 1),
('234', 'Nigeria ', 1),
('683', 'Niue (Former Savage Island)', 1),
('672', 'Norfolk Island / Antarctica', 1),
('1670', 'Northern Mariana Islands (Former Mariana Islands District  Trust Territory of the Pacific Islands)', 1),
('47', 'Norway ', 1),
('968', 'Oman,', 1),
('92', 'Pakistan (Former West Pakistan)', 1),
('680', 'Palau (Former Palau District  Trust Terriroty of the Pacific Islands)', 1),
('970', 'Palestinian State (Proposed)', 1),
('507', 'Panama ', 1),
('675', 'Papua New Guinea (Former Territory of Papua and New Guinea)', 1),
('595', 'Paraguay ', 1),
('51', 'Peru ', 1),
('63', 'Philippines ', 1),
('48', 'Poland ', 1),
('351', 'Portugal ', 1),
('1787 or 19', 'Puerto Rico ', 1),
('974', 'Qatar, State of ', 1),
('262', 'Reuni', 1),
('40', 'Romania ', 1),
('7', 'Russian Federation / Kazakhstan', 1),
('250', 'Rwanda (Rwandese Republic) (Former Ruanda)', 1),
('290', 'Saint Helena ', 1),
('1869', 'Saint Kitts and Nevis (Former Federation of Saint Christopher and Nevis)', 1),
('1758', 'Saint Lucia ', 1),
('508', 'Saint Pierre and Miquelon ', 1),
('1784', 'Saint Vincent and the Grenadines ', 1),
('685', 'Samoa (F', 1),
('378', 'San Marino ', 1),
('239', 'Sao Tome and Principe ', 1),
('966', 'Saudi Arabia ', 1),
('221', 'Senegal ', 1),
('248', 'Seychelles ', 1),
('232', 'Sierra Leone ', 1),
('65', 'Singapore ', 1),
('421', 'Slovakia', 1),
('386', 'Slovenia ', 1),
('677', 'Solomon Islands (Former British Solomon Islands)', 1),
('252', 'Somalia (Former Somali Republic, Somali Democratic Republic) ', 1),
('27', 'South Africa (Former Union of South Africa)', 1),
('34', 'Spain ', 1),
('94', 'Sri Lanka (Former Serendib, Ceylon) ', 1),
('249', 'Sudan (Former AngloEgyptian Sudan) ', 1),
('597', 'Suriname (Former Netherlands Guiana, Dutch Guiana)', 1),
('268', 'Swaziland, Kingdom of ', 1),
('46', 'Sweden ', 1),
('41', 'Switzerland ', 1),
('963', 'Syria (Syrian Arab Republic) (Former United Arab Republic  with Egypt)', 1),
('886', 'Taiwan (Former Formosa)', 1),
('992', 'Tajikistan (Former Tajik Soviet Socialist Republic)', 1),
('255', 'Tanzania, United Republic of (Former United Republic of Tanganyika and Zanzibar)', 1),
('66', 'Thailand (Former Siam)', 1),
('690', 'Tokelau ', 1),
('676', 'Tonga, Kingdom of (Former Friendly Islands)', 1),
('1868', 'Trinidad and Tobago ', 1),
('216', 'Tunisia ', 1),
('90', 'Turkey ', 1),
('993', 'Turkmenistan', 1),
('1649', 'Turks and Caicos Islands ', 1),
('688', 'Tuvalu ', 1),
('256', 'Uganda, Republic of', 1),
('380', 'Ukraine ', 1),
('971', 'United Arab Emirates (UAE)', 1),
('44', 'United Kingdom (Great Britain / UK)', 1),
('1', 'United States / Canada', 1),
('598', 'Uruguay, Oriental Republic of ', 1),
('998', 'Uzbekistan ', 1),
('678', 'Vanuatu ', 1),
('418', 'Vatican City State (Holy See)', 1),
('58', 'Venezuela ', 1),
('84', 'Vietnam ', 1),
('1284', 'Virgin Islands, British ', 1),
('1340', 'Virgin Islands, United States ', 1),
('681', 'Wallis and Futuna Islands ', 1),
('967', 'Yemen ', 1),
('260', 'Zambia, Republic of', 1),
('263', 'Zimbabwe, Republic of ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_option`
--

CREATE TABLE `g_option` (
  `id` int(10) NOT NULL,
  `optheader` varchar(150) DEFAULT NULL,
  `optvalue` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_option`
--

INSERT INTO `g_option` (`id`, `optheader`, `optvalue`) VALUES
(1, 'Company Name', 'EXTROGATE TRADING'),
(2, 'Website Name', 'EXTROGATE TRADING'),
(3, 'Web Description', 'EXTROGATE'),
(4, 'System Currency', 'USD'),
(5, 'WD Currency', 'USD'),
(6, 'BaseLink', 'https://extrogate.net'),
(10, 'Min. WD from Fund Wallet', '50'),
(9, 'Min Transfer to Fund Wallet', '1'),
(8, 'Admin Charge', '3'),
(7, 'Contract Period', '18'),
(11, 'WD Days ( In Nubmers )', '1,2,3,4,5'),
(12, 'Pay Days ( In Numbers )', '1,2,3,4,5'),
(13, 'Current Exch. (Rank Bonus)', '14250'),
(14, 'Coin Exchange', '0');

-- --------------------------------------------------------

--
-- Table structure for table `g_session`
--

CREATE TABLE `g_session` (
  `id` bigint(20) NOT NULL,
  `userid` varchar(150) DEFAULT NULL,
  `userip` varchar(100) DEFAULT NULL,
  `userbrowser` varchar(100) DEFAULT NULL,
  `logintgl` varchar(25) DEFAULT NULL,
  `loginwaktu` varchar(25) DEFAULT NULL,
  `updtgl` varchar(25) DEFAULT NULL,
  `updwaktu` varchar(25) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_session`
--

INSERT INTO `g_session` (`id`, `userid`, `userip`, `userbrowser`, `logintgl`, `loginwaktu`, `updtgl`, `updwaktu`, `status`) VALUES
(3, '001', '::1', 'Google Chrome', '2019-03-06', '16:22:43', '2019-03-06', '16:22:43', 0),
(4, '001', '::1', 'Google Chrome', '2019-03-12', '11:18:21', '2019-03-12', '11:18:21', 0),
(2, '001', '::1', 'Google Chrome', '2019-03-06', '16:02:06', '2019-03-06', '16:02:06', 0),
(5, '001', '::1', 'Google Chrome', '2019-03-18', '15:37:59', '2019-03-18', '15:37:59', 0),
(6, '001', '::1', 'Google Chrome', '2019-03-18', '16:02:13', '2019-03-18', '16:02:13', 0),
(7, '001', '::1', 'Google Chrome', '2019-03-18', '16:41:43', '2019-03-18', '16:41:43', 0),
(8, '001', '::1', 'Google Chrome', '2019-03-18', '17:28:48', '2019-03-18', '17:28:48', 0),
(9, '001', '::1', 'Google Chrome', '2019-03-19', '14:50:13', '2019-03-19', '14:50:13', 0),
(10, '001', '::1', 'Google Chrome', '2019-03-19', '18:54:33', '2019-03-19', '18:54:33', 0),
(11, '001', '::1', 'Google Chrome', '2019-03-19', '22:18:46', '2019-03-19', '22:18:46', 0),
(12, '001', '::1', 'Google Chrome', '2019-03-20', '07:56:33', '2019-03-20', '07:56:33', 0),
(13, '001', '::1', 'Google Chrome', '2019-03-20', '08:07:11', '2019-03-20', '08:07:11', 0),
(14, '001', '::1', 'Google Chrome', '2019-03-20', '09:29:53', '2019-03-20', '09:29:53', 0),
(15, 'member04', '::1', 'Google Chrome', '2019-03-20', '10:41:50', '2019-03-20', '10:41:50', 0),
(16, '001', '::1', 'Google Chrome', '2019-03-20', '14:53:06', '2019-03-20', '14:53:06', 0),
(17, 'member04', '::1', 'Google Chrome', '2019-03-20', '15:21:23', '2019-03-20', '15:21:23', 0),
(18, 'member04', '::1', 'Google Chrome', '2019-03-20', '15:56:04', '2019-03-20', '15:56:04', 0),
(19, '001', '::1', 'Google Chrome', '2019-03-20', '16:25:21', '2019-03-20', '16:25:21', 0),
(20, 'member04', '::1', 'Google Chrome', '2019-03-20', '16:33:07', '2019-03-20', '16:33:07', 0),
(21, 'member04', '::1', 'Google Chrome', '2019-03-20', '17:02:35', '2019-03-20', '17:02:35', 0),
(22, 'member04', '::1', 'Google Chrome', '2019-03-20', '17:39:48', '2019-03-20', '17:39:48', 0),
(23, 'member04', '::1', 'Google Chrome', '2019-03-20', '19:04:02', '2019-03-20', '19:04:02', 0),
(24, 'member04', '::1', 'Google Chrome', '2019-03-20', '20:44:02', '2019-03-20', '20:44:02', 0),
(25, 'member04', '::1', 'Google Chrome', '2019-03-20', '21:44:47', '2019-03-20', '21:44:47', 0),
(26, 'member04', '::1', 'Google Chrome', '2019-03-20', '23:31:47', '2019-03-20', '23:31:47', 0),
(27, 'member04', '::1', 'Google Chrome', '2019-03-21', '00:01:34', '2019-03-21', '00:01:34', 0),
(28, 'member04', '::1', 'Google Chrome', '2019-03-21', '01:32:54', '2019-03-21', '01:32:54', 0),
(29, '001', '::1', 'Google Chrome', '2019-03-21', '07:07:25', '2019-03-21', '07:07:25', 0),
(30, 'member04', '::1', 'Google Chrome', '2019-03-21', '07:07:52', '2019-03-21', '07:07:52', 0),
(31, '001', '182.0.164.23', 'Google Chrome', '2019-03-21', '07:43:33', '2019-03-21', '07:43:33', 0),
(32, '001', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '08:08:18', '2019-03-21', '08:08:18', 0),
(33, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '08:08:19', '2019-03-21', '08:08:19', 0),
(34, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '08:08:55', '2019-03-21', '08:08:55', 0),
(35, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '08:12:10', '2019-03-21', '08:12:10', 0),
(36, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '08:15:32', '2019-03-21', '08:15:32', 0),
(37, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '08:38:29', '2019-03-21', '08:38:29', 0),
(38, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '09:48:31', '2019-03-21', '09:48:31', 0),
(39, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '12:23:46', '2019-03-21', '12:23:46', 0),
(40, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '12:52:13', '2019-03-21', '12:52:13', 0),
(41, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '13:34:47', '2019-03-21', '13:34:47', 0),
(42, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '13:38:44', '2019-03-21', '13:38:44', 0),
(43, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '13:43:59', '2019-03-21', '13:43:59', 0),
(44, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '13:57:50', '2019-03-21', '13:57:50', 0),
(45, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '14:08:22', '2019-03-21', '14:08:22', 0),
(46, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '15:04:16', '2019-03-21', '15:04:16', 0),
(47, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '15:21:12', '2019-03-21', '15:21:12', 0),
(48, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '16:11:01', '2019-03-21', '16:11:01', 0),
(49, '001', '182.0.133.183', 'Google Chrome', '2019-03-21', '17:01:19', '2019-03-21', '17:01:19', 0),
(50, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '17:01:30', '2019-03-21', '17:01:30', 0),
(51, 'Harianto', '182.0.132.36', 'Google Chrome', '2019-03-21', '17:10:34', '2019-03-21', '17:10:34', 1),
(52, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '17:11:35', '2019-03-21', '17:11:35', 0),
(53, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-21', '17:31:58', '2019-03-21', '17:31:58', 0),
(54, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-21', '17:37:31', '2019-03-21', '17:37:31', 0),
(55, '001', '182.0.165.239', 'Google Chrome', '2019-03-21', '20:47:33', '2019-03-21', '20:47:33', 0),
(56, '001', '182.0.167.7', 'Google Chrome', '2019-03-21', '20:57:55', '2019-03-21', '20:57:55', 0),
(57, '001', '182.0.196.0', 'Google Chrome', '2019-03-22', '10:18:07', '2019-03-22', '10:18:07', 0),
(58, 'Calvin', '182.0.197.1', 'Google Chrome', '2019-03-22', '11:11:35', '2019-03-22', '11:11:35', 0),
(59, 'Calvin', '182.0.197.1', 'Google Chrome', '2019-03-22', '11:12:19', '2019-03-22', '11:12:19', 0),
(60, 'Calvin', '182.0.197.53', 'Google Chrome', '2019-03-22', '12:43:04', '2019-03-22', '12:43:04', 0),
(61, 'Calvin', '182.0.197.1', 'Google Chrome', '2019-03-22', '14:43:17', '2019-03-22', '14:43:17', 0),
(62, 'Winner1010', '114.124.237.163', 'Safari', '2019-03-22', '15:42:14', '2019-03-22', '15:42:14', 0),
(63, 'Calvin', '182.0.197.199', 'Google Chrome', '2019-03-22', '15:42:53', '2019-03-22', '15:42:53', 0),
(64, 'Winner1010', '120.188.64.99', 'Google Chrome', '2019-03-22', '15:57:28', '2019-03-22', '15:57:28', 0),
(65, 'Calvin', '182.0.197.1', 'Google Chrome', '2019-03-22', '16:05:38', '2019-03-22', '16:05:38', 0),
(66, 'Winner1010', '175.158.57.7', 'Safari', '2019-03-22', '16:23:26', '2019-03-22', '16:23:26', 0),
(67, 'Rocky ', '120.188.64.99', 'Google Chrome', '2019-03-22', '16:24:00', '2019-03-22', '16:24:00', 0),
(68, 'Winner1010', '120.188.64.99', 'Google Chrome', '2019-03-22', '16:29:41', '2019-03-22', '16:29:41', 0),
(69, 'Rocky ', '175.158.57.7', 'Google Chrome', '2019-03-22', '17:14:50', '2019-03-22', '17:14:50', 0),
(70, 'member04', '182.23.85.67', 'Google Chrome', '2019-03-22', '18:38:09', '2019-03-22', '18:38:09', 0),
(71, 'Calvin', '182.0.231.176', 'Google Chrome', '2019-03-22', '19:18:33', '2019-03-22', '19:18:33', 0),
(72, 'Calvin', '182.0.197.53', 'Google Chrome', '2019-03-22', '19:23:46', '2019-03-22', '19:23:46', 0),
(73, 'member04', '114.124.247.89', 'Google Chrome', '2019-03-22', '19:25:09', '2019-03-22', '19:25:09', 0),
(74, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-22', '19:26:58', '2019-03-22', '19:26:58', 0),
(75, 'Calvin', '182.0.197.199', 'Google Chrome', '2019-03-22', '19:31:00', '2019-03-22', '19:31:00', 0),
(76, 'member04', '180.244.8.42', 'Mozilla Firefox', '2019-03-22', '19:51:12', '2019-03-22', '19:51:12', 0),
(77, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-22', '21:24:32', '2019-03-22', '21:24:32', 0),
(78, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-23', '06:34:39', '2019-03-23', '06:34:39', 0),
(79, 'member04', '114.124.229.216', 'Google Chrome', '2019-03-23', '07:00:22', '2019-03-23', '07:00:22', 0),
(80, 'Calvin', '202.80.219.98', 'Google Chrome', '2019-03-23', '08:38:22', '2019-03-23', '08:38:22', 0),
(81, 'member04', '114.124.214.88', 'Google Chrome', '2019-03-23', '09:42:04', '2019-03-23', '09:42:04', 0),
(82, 'member04', '114.124.214.88', 'Google Chrome', '2019-03-23', '09:53:39', '2019-03-23', '09:53:39', 0),
(83, 'member04', '139.255.65.34', 'Google Chrome', '2019-03-23', '10:08:56', '2019-03-23', '10:08:56', 0),
(84, 'member04', '114.124.207.232', 'Google Chrome', '2019-03-23', '10:11:34', '2019-03-23', '10:11:34', 0),
(85, '001', '114.124.239.72', 'Google Chrome', '2019-03-23', '10:12:55', '2019-03-23', '10:12:55', 0),
(86, 'member04', '114.124.239.72', 'Google Chrome', '2019-03-23', '10:20:34', '2019-03-23', '10:20:34', 0),
(87, 'member04', '114.124.239.72', 'Google Chrome', '2019-03-23', '10:38:59', '2019-03-23', '10:38:59', 0),
(88, 'member04', '139.255.65.34', 'Google Chrome', '2019-03-23', '11:03:45', '2019-03-23', '11:03:45', 0),
(89, 'Calvin', '202.80.219.98', 'Google Chrome', '2019-03-23', '12:33:35', '2019-03-23', '12:33:35', 0),
(90, 'member04', '115.178.220.119', 'Google Chrome', '2019-03-23', '16:15:34', '2019-03-23', '16:15:34', 0),
(91, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-23', '19:45:14', '2019-03-23', '19:45:14', 0),
(92, '001', '139.193.44.116', 'Google Chrome', '2019-03-23', '20:00:36', '2019-03-23', '20:00:36', 0),
(93, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-23', '20:05:31', '2019-03-23', '20:05:31', 0),
(94, 'member04', '114.124.229.216', 'Google Chrome', '2019-03-23', '20:53:20', '2019-03-23', '20:53:20', 0),
(95, 'member04', '114.124.214.88', 'Google Chrome', '2019-03-23', '21:50:19', '2019-03-23', '21:50:19', 0),
(96, '001', '114.124.199.210', 'Google Chrome', '2019-03-24', '06:16:04', '2019-03-24', '06:16:04', 0),
(97, 'member04', '114.124.229.216', 'Google Chrome', '2019-03-24', '06:17:54', '2019-03-24', '06:17:54', 0),
(98, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-24', '07:21:10', '2019-03-24', '07:21:10', 0),
(99, 'member04', '114.124.237.88', 'Google Chrome', '2019-03-24', '08:01:48', '2019-03-24', '08:01:48', 0),
(100, '001', '114.124.236.121', 'Google Chrome', '2019-03-24', '08:03:15', '2019-03-24', '08:03:15', 0),
(101, 'Calvin', '202.80.219.98', 'Google Chrome', '2019-03-24', '18:54:10', '2019-03-24', '18:54:10', 0),
(102, 'member04', '182.23.85.66', 'Mozilla Firefox', '2019-03-25', '08:05:07', '2019-03-25', '08:05:07', 0),
(103, 'Calvin', '182.253.233.210', 'Google Chrome', '2019-03-25', '12:21:31', '2019-03-25', '12:21:31', 0),
(104, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-25', '14:38:11', '2019-03-25', '14:38:11', 0),
(105, 'Calvin', '182.253.233.210', 'Google Chrome', '2019-03-25', '15:26:51', '2019-03-25', '15:26:51', 0),
(106, 'member04', '125.160.143.156', 'Mozilla Firefox', '2019-03-25', '15:43:17', '2019-03-25', '15:43:17', 0),
(107, 'member04', '125.160.143.156', 'Mozilla Firefox', '2019-03-25', '16:35:25', '2019-03-25', '16:35:25', 0),
(108, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-25', '16:36:03', '2019-03-25', '16:36:03', 0),
(109, 'member04', '182.23.85.67', 'Google Chrome', '2019-03-25', '16:42:26', '2019-03-25', '16:42:26', 0),
(110, 'Calvin', '182.253.233.210', 'Google Chrome', '2019-03-25', '16:45:08', '2019-03-25', '16:45:08', 0),
(111, 'member04', '182.23.85.66', 'Google Chrome', '2019-03-26', '00:34:35', '2019-03-26', '00:34:35', 0),
(112, 'member04', '182.23.85.66', 'Google Chrome', '2019-03-26', '00:37:05', '2019-03-26', '00:37:05', 0),
(113, 'Lips', '36.69.79.12', 'Google Chrome', '2019-03-26', '07:38:01', '2019-03-26', '07:38:01', 0),
(114, 'Lips', '36.69.79.12', 'Google Chrome', '2019-03-26', '09:56:45', '2019-03-26', '09:56:45', 0),
(115, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-26', '11:23:17', '2019-03-26', '11:23:17', 0),
(116, '001', '139.193.44.116', 'Google Chrome', '2019-03-26', '13:14:00', '2019-03-26', '13:14:00', 0),
(117, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-26', '13:14:34', '2019-03-26', '13:14:34', 0),
(118, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-26', '13:18:32', '2019-03-26', '13:18:32', 0),
(119, '001', '139.193.44.116', 'Google Chrome', '2019-03-26', '13:18:43', '2019-03-26', '13:18:43', 0),
(120, 'member04', '114.124.174.122', 'Google Chrome', '2019-03-26', '13:31:58', '2019-03-26', '13:31:58', 0),
(121, 'member04', '114.124.175.218', 'Google Chrome', '2019-03-26', '13:46:34', '2019-03-26', '13:46:34', 0),
(122, 'Lips', '36.69.79.12', 'Google Chrome', '2019-03-27', '13:35:55', '2019-03-27', '13:35:55', 0),
(123, 'Lips', '36.69.79.12', 'Google Chrome', '2019-03-27', '14:07:29', '2019-03-27', '14:07:29', 0),
(124, 'Lips', '36.69.79.12', 'Google Chrome', '2019-03-27', '14:13:28', '2019-03-27', '14:13:28', 0),
(125, '001', '139.193.44.116', 'Google Chrome', '2019-03-27', '18:14:06', '2019-03-27', '18:14:06', 0),
(126, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-27', '18:16:01', '2019-03-27', '18:16:01', 0),
(127, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-27', '19:03:10', '2019-03-27', '19:03:10', 0),
(128, 'member04', '110.138.18.55', 'Google Chrome', '2019-03-27', '19:22:13', '2019-03-27', '19:22:13', 0),
(129, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-27', '19:50:37', '2019-03-27', '19:50:37', 0),
(130, '001', '139.193.44.116', 'Google Chrome', '2019-03-27', '19:51:03', '2019-03-27', '19:51:03', 0),
(131, '001', '139.193.44.116', 'Google Chrome', '2019-03-27', '20:10:54', '2019-03-27', '20:10:54', 0),
(132, 'member04', '182.0.135.125', 'Google Chrome', '2019-03-28', '05:39:20', '2019-03-28', '05:39:20', 0),
(133, 'member04', '182.0.148.228', 'Google Chrome', '2019-03-28', '05:51:14', '2019-03-28', '05:51:14', 0),
(134, 'member04', '182.0.148.228', 'Google Chrome', '2019-03-28', '05:56:56', '2019-03-28', '05:56:56', 0),
(135, 'member04', '139.193.44.116', 'Google Chrome', '2019-03-28', '06:53:27', '2019-03-28', '06:53:27', 0),
(136, 'Winner1010', '114.124.143.42', 'Safari', '2019-03-28', '10:58:22', '2019-03-28', '10:58:22', 0),
(137, '001', '139.193.44.116', 'Google Chrome', '2019-03-28', '10:58:51', '2019-03-28', '10:58:51', 0),
(138, 'yudi4', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '10:59:45', '2019-03-28', '10:59:45', 0),
(139, 'Calvin', '114.124.179.213', 'Google Chrome', '2019-03-28', '11:01:36', '2019-03-28', '11:01:36', 0),
(140, 'yudi4', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '11:25:21', '2019-03-28', '11:25:21', 0),
(141, 'yudi4', '110.138.18.55', 'Google Chrome', '2019-03-28', '11:27:39', '2019-03-28', '11:27:39', 0),
(142, 'yudi4', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '11:28:03', '2019-03-28', '11:28:03', 0),
(143, 'Calvin', '114.124.179.213', 'Google Chrome', '2019-03-28', '11:35:22', '2019-03-28', '11:35:22', 0),
(144, 'Rocky ', '120.188.6.68', 'Google Chrome', '2019-03-28', '12:11:22', '2019-03-28', '12:11:22', 0),
(145, 'Calvin', '182.253.232.70', 'Google Chrome', '2019-03-28', '12:11:41', '2019-03-28', '12:11:41', 0),
(146, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '12:25:49', '2019-03-28', '12:25:49', 0),
(147, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '12:41:48', '2019-03-28', '12:41:48', 0),
(148, 'Awei', '182.253.232.70', 'Safari', '2019-03-28', '12:45:16', '2019-03-28', '12:45:16', 0),
(149, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '12:57:58', '2019-03-28', '12:57:58', 0),
(150, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:10:02', '2019-03-28', '13:10:02', 0),
(151, 'Calvin', '182.253.232.70', 'Google Chrome', '2019-03-28', '13:12:21', '2019-03-28', '13:12:21', 0),
(152, 'yudi4', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:23:14', '2019-03-28', '13:23:14', 1),
(153, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:28:02', '2019-03-28', '13:28:02', 0),
(154, 'Calvin', '182.253.232.70', 'Google Chrome', '2019-03-28', '13:29:02', '2019-03-28', '13:29:02', 0),
(155, '001', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:29:30', '2019-03-28', '13:29:30', 0),
(156, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '13:32:31', '2019-03-28', '13:32:31', 0),
(157, 'Lips', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:33:59', '2019-03-28', '13:33:59', 0),
(158, 'Lips', '110.138.18.55', 'Mozilla Firefox', '2019-03-28', '13:40:33', '2019-03-28', '13:40:33', 0),
(159, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '14:06:26', '2019-03-28', '14:06:26', 0),
(160, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '14:16:19', '2019-03-28', '14:16:19', 0),
(161, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '14:17:37', '2019-03-28', '14:17:37', 0),
(162, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '14:35:21', '2019-03-28', '14:35:21', 0),
(163, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '15:03:10', '2019-03-28', '15:03:10', 0),
(164, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '15:03:50', '2019-03-28', '15:03:50', 0),
(165, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '15:55:15', '2019-03-28', '15:55:15', 0),
(166, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '16:05:27', '2019-03-28', '16:05:27', 0),
(167, 'Calvin', '114.124.178.229', 'Google Chrome', '2019-03-28', '16:16:20', '2019-03-28', '16:16:20', 0),
(168, 'Willy1981', '222.165.221.66', 'Google Chrome', '2019-03-28', '16:26:43', '2019-03-28', '16:26:43', 0),
(169, 'member04', '182.0.209.3', 'Google Chrome', '2019-03-28', '16:58:27', '2019-03-28', '16:58:27', 0),
(170, 'Awei', '112.215.152.128', 'Safari', '2019-03-28', '16:59:29', '2019-03-28', '16:59:29', 0),
(171, 'member04', '185.193.125.42', 'Mozilla Firefox', '2019-03-28', '17:07:42', '2019-03-28', '17:07:42', 0),
(172, 'Lips', '114.124.229.20', 'Google Chrome', '2019-03-28', '17:23:52', '2019-03-28', '17:23:52', 0),
(173, '001', '46.173.214.3', 'Mozilla Firefox', '2019-03-28', '17:25:47', '2019-03-28', '17:25:47', 0),
(174, 'Winner1010', '114.124.142.170', 'Safari', '2019-03-28', '17:57:11', '2019-03-28', '17:57:11', 0),
(175, 'Christokhu', '114.125.22.243', 'Google Chrome', '2019-03-28', '18:04:44', '2019-03-28', '18:04:44', 1),
(176, 'Hanselking', '112.215.172.230', 'Google Chrome', '2019-03-28', '18:08:42', '2019-03-28', '18:08:42', 0),
(177, 'Winner1010', '114.124.143.59', 'Safari', '2019-03-28', '18:12:50', '2019-03-28', '18:12:50', 0),
(178, 'Willy1981', '222.165.221.66', 'Google Chrome', '2019-03-28', '18:27:05', '2019-03-28', '18:27:05', 0),
(179, 'member04', '182.0.240.34', 'Google Chrome', '2019-03-28', '18:32:18', '2019-03-28', '18:32:18', 0),
(180, 'member04', '182.0.240.34', 'Google Chrome', '2019-03-28', '18:54:15', '2019-03-28', '18:54:15', 0),
(181, 'member04', '222.165.221.66', 'Google Chrome', '2019-03-28', '19:02:38', '2019-03-28', '19:02:38', 0),
(182, 'Willy1981', '222.165.221.66', 'Google Chrome', '2019-03-28', '19:07:05', '2019-03-28', '19:07:05', 0),
(183, 'member04', '222.165.221.66', 'Google Chrome', '2019-03-28', '19:38:48', '2019-03-28', '19:38:48', 0),
(184, 'Winner1010', '114.124.143.171', 'Safari', '2019-03-28', '19:48:03', '2019-03-28', '19:48:03', 0),
(185, 'Calvin', '114.124.197.51', 'Google Chrome', '2019-03-28', '20:03:38', '2019-03-28', '20:03:38', 0),
(186, 'fandy01', '222.165.221.66', 'Google Chrome', '2019-03-28', '20:19:51', '2019-03-28', '20:19:51', 0),
(187, 'Winner1010', '114.124.143.42', 'Safari', '2019-03-28', '20:30:55', '2019-03-28', '20:30:55', 0),
(188, 'Calvin', '222.165.221.66', 'Google Chrome', '2019-03-28', '20:31:45', '2019-03-28', '20:31:45', 0),
(189, 'Lips', '222.165.221.66', 'Google Chrome', '2019-03-28', '20:54:17', '2019-03-28', '20:54:17', 0),
(190, 'fandy01', '222.165.221.66', 'Google Chrome', '2019-03-28', '20:56:10', '2019-03-28', '20:56:10', 0),
(191, 'fandy01', '222.165.221.66', 'Google Chrome', '2019-03-28', '22:23:23', '2019-03-28', '22:23:23', 0),
(192, 'catwoman', '114.124.237.35', 'Google Chrome', '2019-03-28', '22:36:31', '2019-03-28', '22:36:31', 1),
(193, 'MAJUGIBOS', '182.0.230.73', 'Google Chrome', '2019-03-28', '22:38:14', '2019-03-28', '22:38:14', 0),
(194, 'MAJUGIBOS', '182.0.230.73', 'Google Chrome', '2019-03-28', '22:41:22', '2019-03-28', '22:41:22', 1),
(195, 'member04', '110.138.18.55', 'Google Chrome', '2019-03-28', '22:44:28', '2019-03-28', '22:44:28', 0),
(196, 'fandy01', '222.165.221.66', 'Google Chrome', '2019-03-28', '22:51:04', '2019-03-28', '22:51:04', 0),
(197, 'Rocky ', '120.188.67.182', 'Google Chrome', '2019-03-28', '23:12:11', '2019-03-28', '23:12:11', 0),
(198, 'member04', '182.0.211.245', 'Google Chrome', '2019-03-28', '23:43:42', '2019-03-28', '23:43:42', 0),
(199, 'member04', '182.0.211.245', 'Google Chrome', '2019-03-28', '23:59:41', '2019-03-28', '23:59:41', 0),
(200, 'member04', '115.178.197.133', 'Google Chrome', '2019-03-29', '00:21:08', '2019-03-29', '00:21:08', 0),
(201, '001', '120.188.94.191', 'Google Chrome', '2019-03-29', '06:28:31', '2019-03-29', '06:28:31', 0),
(202, '001', '120.188.94.191', 'Google Chrome', '2019-03-29', '06:31:28', '2019-03-29', '06:31:28', 0),
(203, 'Daddyrich', '182.253.250.221', 'Google Chrome', '2019-03-29', '06:37:05', '2019-03-29', '06:37:05', 0),
(204, 'Ezrain', '112.215.173.111', 'Google Chrome', '2019-03-29', '07:44:07', '2019-03-29', '07:44:07', 0),
(205, 'Ezrain', '112.215.173.111', 'Google Chrome', '2019-03-29', '07:53:46', '2019-03-29', '07:53:46', 0),
(206, 'Daddyrich', '140.213.10.104', 'Google Chrome', '2019-03-29', '08:40:12', '2019-03-29', '08:40:12', 1),
(207, 'Calvin', '202.80.219.98', 'Google Chrome', '2019-03-29', '08:44:53', '2019-03-29', '08:44:53', 0),
(208, 'member04', '110.138.18.55', 'Mozilla Firefox', '2019-03-29', '08:48:21', '2019-03-29', '08:48:21', 0),
(209, 'Willy1981', '114.124.237.60', 'Google Chrome', '2019-03-29', '09:55:21', '2019-03-29', '09:55:21', 0),
(210, 'member04', '182.23.85.66', 'Mozilla Firefox', '2019-03-29', '10:09:39', '2019-03-29', '10:09:39', 0),
(211, 'Ezrain', '112.215.173.111', 'Google Chrome', '2019-03-29', '12:09:24', '2019-03-29', '12:09:24', 0),
(212, 'Ezrain', '112.215.173.111', 'Google Chrome', '2019-03-29', '12:19:17', '2019-03-29', '12:19:17', 0),
(213, 'indonesia001', '182.1.199.59', 'Google Chrome', '2019-03-29', '12:34:36', '2019-03-29', '12:34:36', 1),
(214, 'fandy01', '114.124.245.46', 'Google Chrome', '2019-03-29', '12:48:35', '2019-03-29', '12:48:35', 0),
(215, 'fandy01', '114.124.245.31', 'Google Chrome', '2019-03-29', '14:07:15', '2019-03-29', '14:07:15', 0),
(216, 'fandy01', '114.124.245.31', 'Google Chrome', '2019-03-29', '14:14:00', '2019-03-29', '14:14:00', 0),
(217, 'Winner1010', '114.124.167.145', 'Safari', '2019-03-29', '14:45:31', '2019-03-29', '14:45:31', 0),
(218, 'fandy01', '114.124.245.31', 'Google Chrome', '2019-03-29', '15:02:38', '2019-03-29', '15:02:38', 0),
(219, 'Winner1010', '114.124.139.0', 'Safari', '2019-03-29', '15:04:11', '2019-03-29', '15:04:11', 0),
(220, 'member04', '36.69.84.31', 'Mozilla Firefox', '2019-03-29', '15:05:53', '2019-03-29', '15:05:53', 0),
(221, 'member04', '36.69.84.31', 'Google Chrome', '2019-03-29', '15:10:03', '2019-03-29', '15:10:03', 0),
(222, 'fandy01', '114.124.212.159', 'Google Chrome', '2019-03-29', '16:27:37', '2019-03-29', '16:27:37', 0),
(223, 'Winner1010', '114.124.142.0', 'Safari', '2019-03-29', '16:40:09', '2019-03-29', '16:40:09', 0),
(224, 'Calvin', '114.124.170.52', 'Google Chrome', '2019-03-29', '16:41:27', '2019-03-29', '16:41:27', 0),
(225, 'Awei', '140.213.35.62', 'Safari', '2019-03-29', '16:41:32', '2019-03-29', '16:41:32', 1),
(226, 'Winner1010', '114.124.170.52', 'Google Chrome', '2019-03-29', '16:42:06', '2019-03-29', '16:42:06', 0),
(227, 'Calvin', '114.124.170.52', 'Google Chrome', '2019-03-29', '16:44:04', '2019-03-29', '16:44:04', 0),
(228, 'dodycand7526', '114.124.181.197', 'Google Chrome', '2019-03-29', '16:50:39', '2019-03-29', '16:50:39', 0),
(229, 'member04', '36.69.84.31', 'Mozilla Firefox', '2019-03-29', '16:54:55', '2019-03-29', '16:54:55', 0),
(230, 'member04', '36.69.84.31', 'Google Chrome', '2019-03-29', '17:18:36', '2019-03-29', '17:18:36', 0),
(231, 'Calvin', '114.124.170.52', 'Google Chrome', '2019-03-29', '17:21:33', '2019-03-29', '17:21:33', 0),
(232, 'Winner1010', '114.124.170.0', 'Safari', '2019-03-29', '17:50:36', '2019-03-29', '17:50:36', 0),
(233, 'Ezrain', '140.213.12.194', 'Google Chrome', '2019-03-29', '17:58:45', '2019-03-29', '17:58:45', 0),
(234, 'member04', '36.69.84.31', 'Mozilla Firefox', '2019-03-29', '18:09:15', '2019-03-29', '18:09:15', 0),
(235, 'member04', '36.69.84.31', 'Mozilla Firefox', '2019-03-29', '18:13:11', '2019-03-29', '18:13:11', 0),
(236, 'dodycand7526', '114.124.167.4', 'Google Chrome', '2019-03-29', '18:13:36', '2019-03-29', '18:13:36', 0),
(237, 'Calvin', '114.124.171.36', 'Google Chrome', '2019-03-29', '18:21:02', '2019-03-29', '18:21:02', 0),
(238, 'dodycand7526', '114.124.167.4', 'Google Chrome', '2019-03-29', '18:21:54', '2019-03-29', '18:21:54', 0),
(239, 'Calvin', '114.124.171.36', 'Google Chrome', '2019-03-29', '18:23:26', '2019-03-29', '18:23:26', 0),
(240, 'Joevira', '114.124.171.36', 'Google Chrome', '2019-03-29', '18:30:23', '2019-03-29', '18:30:23', 0),
(241, 'dodycand7526', '114.124.167.4', 'Google Chrome', '2019-03-29', '19:04:26', '2019-03-29', '19:04:26', 0),
(242, 'Calvin', '114.124.171.36', 'Google Chrome', '2019-03-29', '19:57:45', '2019-03-29', '19:57:45', 0),
(243, 'Rocky ', '114.4.78.0', 'Google Chrome', '2019-03-30', '07:19:58', '2019-03-30', '07:19:58', 0),
(244, 'Willy1981', '182.0.203.248', 'Google Chrome', '2019-03-30', '09:15:33', '2019-03-30', '09:15:33', 0),
(245, 'dodycand7526', '103.78.9.218', 'Google Chrome', '2019-03-30', '09:37:44', '2019-03-30', '09:37:44', 0),
(246, 'fandy01', '103.78.9.218', 'Google Chrome', '2019-03-30', '09:39:36', '2019-03-30', '09:39:36', 0),
(247, 'fandy01', '103.78.9.218', 'Google Chrome', '2019-03-30', '09:47:12', '2019-03-30', '09:47:12', 0),
(248, 'Joevira', '103.78.9.218', 'Google Chrome', '2019-03-30', '09:51:29', '2019-03-30', '09:51:29', 0),
(249, 'Willy1981', '63.141.59.15', 'Google Chrome', '2019-03-30', '11:00:53', '2019-03-30', '11:00:53', 0),
(250, 'Willy1981', '182.0.245.123', 'Google Chrome', '2019-03-30', '12:55:18', '2019-03-30', '12:55:18', 0),
(251, 'Willy1981', '182.0.244.122', 'Google Chrome', '2019-03-30', '13:14:23', '2019-03-30', '13:14:23', 0),
(252, 'Calvin', '202.80.219.98', 'Google Chrome', '2019-03-30', '17:45:10', '2019-03-30', '17:45:10', 0),
(253, 'Calvin', '114.125.68.212', 'Safari', '2019-03-30', '19:36:50', '2019-03-30', '19:36:50', 0),
(254, 'Willy1981', '202.57.4.210', 'Google Chrome', '2019-03-30', '23:16:34', '2019-03-30', '23:16:34', 0),
(255, 'Willy1981', '202.57.4.210', 'Google Chrome', '2019-03-30', '23:29:38', '2019-03-30', '23:29:38', 0),
(256, 'Calvin', '113.210.97.57', 'Safari', '2019-03-31', '11:47:06', '2019-03-31', '11:47:06', 0),
(257, 'Joevira', '182.0.133.17', 'Safari', '2019-03-31', '15:12:36', '2019-03-31', '15:12:36', 0),
(258, 'Ezrain', '112.215.172.249', 'Google Chrome', '2019-03-31', '18:16:37', '2019-03-31', '18:16:37', 1),
(259, 'Goldenangel', '112.215.172.249', 'Google Chrome', '2019-03-31', '18:34:05', '2019-03-31', '18:34:05', 0),
(260, '001', '115.178.217.117', 'Google Chrome', '2019-03-31', '18:54:26', '2019-03-31', '18:54:26', 0),
(261, 'Goldenangel', '112.215.172.249', 'Google Chrome', '2019-03-31', '19:00:46', '2019-03-31', '19:00:46', 0),
(262, 'Hanselking', '112.215.172.249', 'Google Chrome', '2019-03-31', '19:01:27', '2019-03-31', '19:01:27', 1),
(263, 'Willy1981', '182.0.199.223', 'Google Chrome', '2019-03-31', '19:44:13', '2019-03-31', '19:44:13', 0),
(264, 'Calvin', '114.124.199.9', 'Google Chrome', '2019-03-31', '19:49:01', '2019-03-31', '19:49:01', 0),
(265, 'Willy1981', '114.124.202.15', 'Google Chrome', '2019-03-31', '20:32:20', '2019-03-31', '20:32:20', 0),
(266, 'Willy1981', '114.124.202.15', 'Google Chrome', '2019-03-31', '20:52:23', '2019-03-31', '20:52:23', 0),
(267, 'Joevira', '182.253.245.115', 'Safari', '2019-03-31', '23:14:42', '2019-03-31', '23:14:42', 0),
(268, '001', '185.104.120.60', 'Mozilla Firefox', '2019-04-01', '08:35:39', '2019-04-01', '08:35:39', 0),
(269, '001', '115.178.217.2', 'Google Chrome', '2019-04-01', '08:37:07', '2019-04-01', '08:37:07', 0),
(270, 'Joevira', '114.124.209.193', 'Safari', '2019-04-01', '09:59:10', '2019-04-01', '09:59:10', 0),
(271, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '11:03:45', '2019-04-01', '11:03:45', 0),
(272, 'Joevira', '110.137.157.114', 'Google Chrome', '2019-04-01', '11:16:58', '2019-04-01', '11:16:58', 0),
(273, 'Joevira', '110.137.157.114', 'Google Chrome', '2019-04-01', '11:36:18', '2019-04-01', '11:36:18', 0),
(274, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '11:56:44', '2019-04-01', '11:56:44', 0),
(275, 'dodycand7526', '114.125.84.123', 'Google Chrome', '2019-04-01', '11:58:00', '2019-04-01', '11:58:00', 0),
(276, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '12:03:06', '2019-04-01', '12:03:06', 0),
(277, 'Winner1010', '110.137.157.114', 'Google Chrome', '2019-04-01', '12:10:34', '2019-04-01', '12:10:34', 0),
(278, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '12:49:54', '2019-04-01', '12:49:54', 0),
(279, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '12:50:11', '2019-04-01', '12:50:11', 0),
(280, 'Winner1010', '110.137.157.114', 'Google Chrome', '2019-04-01', '12:50:36', '2019-04-01', '12:50:36', 0),
(281, 'spartateam', '182.1.20.42', 'Google Chrome', '2019-04-01', '13:26:22', '2019-04-01', '13:26:22', 1),
(282, 'Calvin', '182.1.37.239', 'Google Chrome', '2019-04-01', '14:28:56', '2019-04-01', '14:28:56', 0),
(283, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '14:31:24', '2019-04-01', '14:31:24', 0),
(284, 'Calvin', '182.1.37.239', 'Google Chrome', '2019-04-01', '14:32:29', '2019-04-01', '14:32:29', 0),
(285, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '14:32:42', '2019-04-01', '14:32:42', 0),
(286, 'Calvin', '114.125.61.209', 'Google Chrome', '2019-04-01', '14:36:07', '2019-04-01', '14:36:07', 0),
(287, 'Calvin', '110.137.157.114', 'Google Chrome', '2019-04-01', '14:39:33', '2019-04-01', '14:39:33', 0),
(288, 'Calvin', '114.125.61.209', 'Google Chrome', '2019-04-01', '14:39:46', '2019-04-01', '14:39:46', 0),
(289, 'Calvin', '110.137.157.114', 'Google Chrome', '2019-04-01', '14:42:43', '2019-04-01', '14:42:43', 0),
(290, 'Calvin', '101.128.74.233', 'Safari', '2019-04-01', '14:53:06', '2019-04-01', '14:53:06', 0),
(291, 'dodycand7526', '114.125.68.213', 'Google Chrome', '2019-04-01', '14:58:18', '2019-04-01', '14:58:18', 0),
(292, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-01', '15:08:09', '2019-04-01', '15:08:09', 0),
(293, 'Winner1010', '114.124.241.24', 'Safari', '2019-04-01', '15:16:10', '2019-04-01', '15:16:10', 1),
(294, '001', '139.193.44.116', 'Google Chrome', '2019-04-01', '15:17:47', '2019-04-01', '15:17:47', 0),
(295, 'fandy01', '114.125.68.213', 'Google Chrome', '2019-04-01', '15:49:08', '2019-04-01', '15:49:08', 1),
(296, 'dodycand7526', '110.137.157.114', 'Google Chrome', '2019-04-01', '16:08:32', '2019-04-01', '16:08:32', 0),
(297, 'dodycand7526', '114.125.68.213', 'Google Chrome', '2019-04-01', '16:15:17', '2019-04-01', '16:15:17', 0),
(298, 'member04', '110.137.157.114', 'Mozilla Firefox', '2019-04-01', '16:43:00', '2019-04-01', '16:43:00', 0),
(299, 'Calvin', '110.137.157.114', 'Google Chrome', '2019-04-01', '17:02:31', '2019-04-01', '17:02:31', 0),
(300, 'Calvin', '110.137.157.114', 'Google Chrome', '2019-04-01', '17:47:24', '2019-04-01', '17:47:24', 1),
(301, 'Joevira', '182.0.232.39', 'Safari', '2019-04-01', '18:52:55', '2019-04-01', '18:52:55', 0),
(302, 'dodycand7526', '114.125.68.180', 'Google Chrome', '2019-04-01', '19:57:36', '2019-04-01', '19:57:36', 0),
(303, 'Joevira', '114.124.182.179', 'Mozilla Firefox', '2019-04-01', '20:46:25', '2019-04-01', '20:46:25', 0),
(304, 'dodycand7526', '114.124.182.179', 'Mozilla Firefox', '2019-04-01', '20:58:44', '2019-04-01', '20:58:44', 0),
(305, 'Goldenangel', '114.142.169.21', 'Google Chrome', '2019-04-01', '21:09:03', '2019-04-01', '21:09:03', 0),
(306, '001', '139.193.44.116', 'Google Chrome', '2019-04-01', '21:40:27', '2019-04-01', '21:40:27', 0),
(307, 'Joevira', '182.253.245.115', 'Safari', '2019-04-01', '21:51:14', '2019-04-01', '21:51:14', 0),
(308, 'Willy1981', '202.57.4.210', 'Google Chrome', '2019-04-01', '22:32:17', '2019-04-01', '22:32:17', 0),
(309, 'darningsih', '202.57.4.210', 'Google Chrome', '2019-04-01', '22:41:15', '2019-04-01', '22:41:15', 0),
(310, 'Joevira', '182.253.245.115', 'Safari', '2019-04-01', '22:41:30', '2019-04-01', '22:41:30', 0),
(311, 'Joevira', '182.253.245.115', 'Safari', '2019-04-01', '22:43:09', '2019-04-01', '22:43:09', 0),
(312, 'darningsih', '202.57.4.210', 'Google Chrome', '2019-04-01', '22:51:26', '2019-04-01', '22:51:26', 1),
(313, 'Joevira', '182.253.245.115', 'Safari', '2019-04-01', '23:08:24', '2019-04-01', '23:08:24', 0),
(314, 'dodycand7526', '182.1.64.228', 'Google Chrome', '2019-04-01', '23:45:23', '2019-04-01', '23:45:23', 0),
(315, 'Joevira', '182.1.65.116', 'Google Chrome', '2019-04-02', '00:49:51', '2019-04-02', '00:49:51', 1),
(316, 'member04', '114.124.182.51', 'Google Chrome', '2019-04-02', '02:27:43', '2019-04-02', '02:27:43', 0),
(317, 'Rocky ', '103.78.115.23', 'Google Chrome', '2019-04-02', '02:30:20', '2019-04-02', '02:30:20', 0),
(318, 'Rocky ', '103.78.115.23', 'Google Chrome', '2019-04-02', '02:32:50', '2019-04-02', '02:32:50', 0),
(319, 'member04', '114.124.182.18', 'Google Chrome', '2019-04-02', '03:03:40', '2019-04-02', '03:03:40', 0),
(320, 'member04', '114.124.183.178', 'Google Chrome', '2019-04-02', '03:12:19', '2019-04-02', '03:12:19', 0),
(321, 'member04', '114.124.183.178', 'Google Chrome', '2019-04-02', '03:14:53', '2019-04-02', '03:14:53', 0),
(322, 'member04', '114.124.151.51', 'Google Chrome', '2019-04-02', '03:22:01', '2019-04-02', '03:22:01', 0),
(323, 'member04', '114.124.151.51', 'Google Chrome', '2019-04-02', '03:23:03', '2019-04-02', '03:23:03', 0),
(324, '001', '139.193.44.116', 'Google Chrome', '2019-04-02', '06:59:49', '2019-04-02', '06:59:49', 0),
(325, '001', '139.193.44.116', 'Google Chrome', '2019-04-02', '07:07:57', '2019-04-02', '07:07:57', 0),
(326, '001', '139.193.44.116', 'Google Chrome', '2019-04-02', '07:43:52', '2019-04-02', '07:43:52', 1),
(327, 'member04', '110.137.157.114', 'Mozilla Firefox', '2019-04-02', '08:02:38', '2019-04-02', '08:02:38', 0),
(328, 'Lips', '110.137.157.114', 'Mozilla Firefox', '2019-04-02', '08:03:41', '2019-04-02', '08:03:41', 1),
(329, 'Rocky ', '110.137.157.114', 'Mozilla Firefox', '2019-04-02', '08:07:02', '2019-04-02', '08:07:02', 0),
(330, 'Rocky ', '103.78.115.23', 'Google Chrome', '2019-04-02', '08:17:11', '2019-04-02', '08:17:11', 1),
(331, 'Willy1981', '114.124.150.50', 'Google Chrome', '2019-04-02', '08:18:39', '2019-04-02', '08:18:39', 0),
(332, 'Goldenangel', '114.142.169.3', 'Google Chrome', '2019-04-02', '08:47:20', '2019-04-02', '08:47:20', 1),
(333, 'Hutama', '140.213.12.61', 'Google Chrome', '2019-04-02', '08:59:19', '2019-04-02', '08:59:19', 0),
(334, 'Hutama', '140.213.12.61', 'Google Chrome', '2019-04-02', '09:24:46', '2019-04-02', '09:24:46', 0),
(335, 'Willy1981', '114.124.150.50', 'Google Chrome', '2019-04-02', '09:26:09', '2019-04-02', '09:26:09', 0),
(336, 'Willy1981', '114.124.181.130', 'Google Chrome', '2019-04-02', '10:12:50', '2019-04-02', '10:12:50', 1),
(337, 'Hutama', '140.213.12.61', 'Google Chrome', '2019-04-02', '10:42:24', '2019-04-02', '10:42:24', 0),
(338, 'member04', '110.137.157.114', 'Google Chrome', '2019-04-02', '11:00:55', '2019-04-02', '11:00:55', 1),
(339, 'Hutama', '140.213.12.61', 'Google Chrome', '2019-04-02', '11:10:08', '2019-04-02', '11:10:08', 1),
(340, 'dodycand7526', '182.1.102.222', 'Google Chrome', '2019-04-02', '11:13:38', '2019-04-02', '11:13:38', 1),
(341, 'Herrychan', '110.137.157.114', 'Google Chrome', '2019-04-02', '11:16:53', '2019-04-02', '11:16:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_temail`
--

CREATE TABLE `g_temail` (
  `id` int(10) NOT NULL,
  `nmtemplate` varchar(150) DEFAULT NULL,
  `cttemplate` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_temail`
--

INSERT INTO `g_temail` (`id`, `nmtemplate`, `cttemplate`) VALUES
(1, 'New Member Registration - to New Member', '&lt;html&gt;\n	&lt;body style=&quot;background:#00b7b5;&quot;&gt;\n	&lt;div style=&quot;width: 600px; margin: 0 auto;background: #fff;&quot;&gt;\n    	&lt;div style=&quot;background: #c09766\n; padding: 10px 0;&quot;&gt;\n	    &lt;img src=&quot;http://extrogate.net/member/images/logo-bg.png&quot; style=&quot; display:block; margin: 0 auto; width: 300px;&quot;&gt;\n    	&lt;/div&gt;\n	&lt;div style=&quot;padding: 10px;&quot;&gt;    \n    &lt;h3&gt;Congratulations on becoming an EXTROGATE TRADING Member!&lt;/h3&gt;\nDear Valuable Client,\n\n&lt;br&gt;\n&lt;strong&gt;Your Login Details for EXTROGATE TRADING &lt;/strong&gt;&lt;br&gt;\n&lt;/p&gt;&lt;p&gt;Username: [userid]&lt;br&gt;\nPassword: [password]&lt;br&gt;\n&lt;/p&gt;\n\n&lt;p style=&quot;margin:0px 0px&quot;&gt;Warm Regards,\n\n&lt;img align=&quot;center&quot; src=&quot;http://extrogate.net/member/images/logo-bg.png&quot; style=&quot;display: block; margin: 0 auto; width: 150px;&quot;&gt;\n&lt;br&gt;\n&lt;/p&gt;&lt;p style=&quot;margin:20px 0px&quot;&gt;Email: &lt;a href=&quot;mailto:info@extrogate.net&quot; target=&quot;_blank&quot;&gt;info@extrogate.net&lt;/a&gt;&lt;br&gt;&lt;br/&gt;\n\n&lt;a href=&quot;http://extrogate.net&quot; style=&quot;display: block; padding: 10px; margin: 0 auto;background:#c09766;color: #fff; width: 150px; text-align: center; text-decoration: none;  &quot; title=&quot;&quot; target=&quot;_blank&quot;&gt;LOGIN NOW&lt;/a&gt;\n\n	&lt;/div&gt;\n    &lt;/div&gt;\n	&lt;/body&gt;\n&lt;/html&gt;'),
(2, 'New Account', '&lt;html&gt;\n	&lt;body style=&quot;background:#00b7b5;&quot;&gt;\n	&lt;div style=&quot;width: 600px; margin: 0 auto;background: #fff;&quot;&gt;\n    	&lt;div style=&quot;background: #c09766\n; padding: 10px 0;&quot;&gt;\n	    &lt;img src=&quot;http://extrogate.net/member/images/logo-bg.png&quot; style=&quot; display:block; margin: 0 auto; width: 300px;&quot;&gt;\n    	&lt;/div&gt;\n	&lt;div style=&quot;padding: 10px;&quot;&gt;    \n    &lt;h3&gt;Congratulations on your new MT4  account!&lt;/h3&gt;\nDear Valuable Client,\n\n&lt;br&gt;\n&lt;strong&gt;Your MT4 Account Details: &lt;/strong&gt;&lt;br&gt;\n&lt;/p&gt;&lt;p&gt;Account Number: [akunno]&lt;br&gt;\nPassword: [password]&lt;br&gt;\n&lt;/p&gt;\n\n&lt;p style=&quot;margin:0px 0px&quot;&gt;Warm Regards,\n\n&lt;img align=&quot;center&quot; src=&quot;http://extrogate.net/member/images/logo-bg.png&quot; style=&quot;display: block; margin: 0 auto; width: 150px;&quot;&gt;\n&lt;br&gt;\n&lt;/p&gt;&lt;p style=&quot;margin:20px 0px&quot;&gt;Email: &lt;a href=&quot;mailto:info@extrogate.net&quot; target=&quot;_blank&quot;&gt;net@extrogate.net&lt;/a&gt;&lt;br&gt;&lt;br/&gt;\n\n&lt;a href=&quot;https://extrogate.net&quot; style=&quot;display: block; padding: 10px; margin: 0 auto;background:#c09766;color: #fff; width: 250px; text-align: center; text-decoration: none;  &quot; title=&quot;&quot; target=&quot;_blank&quot;&gt;LOGIN TO EXTROGATE TRADING&lt;/a&gt;\n\n	&lt;/div&gt;\n    &lt;/div&gt;\n	&lt;/body&gt;\n&lt;/html&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `g_tiket`
--

CREATE TABLE `g_tiket` (
  `id` bigint(20) NOT NULL,
  `refno` varchar(100) DEFAULT NULL,
  `userid` varchar(150) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `tglpost` varchar(25) DEFAULT NULL,
  `waktupost` varchar(25) DEFAULT NULL,
  `tglupdate` varchar(25) DEFAULT NULL,
  `waktuupdate` varchar(25) DEFAULT NULL,
  `stupdate` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_tiketdt`
--

CREATE TABLE `g_tiketdt` (
  `id` bigint(20) NOT NULL,
  `tiketid` bigint(20) DEFAULT NULL,
  `dari` varchar(150) DEFAULT NULL,
  `pesan` text,
  `tglpost` varchar(25) DEFAULT NULL,
  `waktupost` varchar(25) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_unilevel`
--

CREATE TABLE `g_unilevel` (
  `id` bigint(20) NOT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `unplid` varchar(100) DEFAULT NULL,
  `unpllevel` int(10) DEFAULT NULL,
  `unplreverse` int(10) DEFAULT NULL,
  `unilevel` int(10) DEFAULT NULL,
  `jpackage` int(10) DEFAULT NULL,
  `parentstatus` int(2) DEFAULT NULL,
  `parentid` varchar(100) DEFAULT NULL,
  `tgldaftar` varchar(25) DEFAULT NULL,
  `waktudaftar` varchar(25) DEFAULT NULL,
  `tglaktif` varchar(25) DEFAULT NULL,
  `waktuaktif` varchar(25) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_unilevel`
--

INSERT INTO `g_unilevel` (`id`, `userid`, `unplid`, `unpllevel`, `unplreverse`, `unilevel`, `jpackage`, `parentstatus`, `parentid`, `tgldaftar`, `waktudaftar`, `tglaktif`, `waktuaktif`, `status`) VALUES
(8, 'member01', 'member04', 2, 1, 3, 0, 1, 'member01', '2019-03-20', '10:46:01', '', '', 99),
(7, 'member01', '001', 1, 2, 3, 0, 1, 'member01', '2019-03-20', '10:46:01', '', '', 99),
(6, 'member04', '001', 1, 1, 2, 0, 1, 'member04', '2019-03-20', '10:24:51', '2019-03-20', '10:41:39', 1),
(9, 'Harianto', '001', 1, 1, 2, NULL, 1, 'Harianto', '2019-03-21', '17:06:22', '2019-03-21', '17:10:32', 1),
(10, 'Calvin', '001', 1, 1, 2, NULL, 1, 'Calvin', '2019-03-22', '10:23:07', '2019-03-22', '10:26:04', 1),
(11, 'Lips', '001', 1, 2, 3, NULL, 1, 'Lips', '2019-03-22', '11:22:48', '2019-03-22', '11:27:49', 1),
(12, 'Lips', 'Calvin', 2, 1, 3, NULL, 1, 'Lips', '2019-03-22', '11:22:48', '2019-03-22', '11:27:49', 1),
(13, 'Rocky ', '001', 1, 2, 3, NULL, 1, 'Rocky ', '2019-03-22', '12:51:22', '2019-03-22', '13:09:42', 1),
(14, 'Rocky ', 'Calvin', 2, 1, 3, NULL, 1, 'Rocky ', '2019-03-22', '12:51:22', '2019-03-22', '13:09:42', 1),
(15, 'Winner1010', '001', 1, 2, 3, NULL, 1, 'Winner1010', '2019-03-22', '14:58:11', '2019-03-22', '15:19:40', 1),
(16, 'Winner1010', 'Calvin', 2, 1, 3, NULL, 1, 'Winner1010', '2019-03-22', '14:58:11', '2019-03-22', '15:19:40', 1),
(17, 'Awei', '001', 1, 2, 3, NULL, 1, 'Awei', '2019-03-22', '16:20:10', '2019-03-22', '18:45:40', 1),
(18, 'Awei', 'Calvin', 2, 1, 3, NULL, 1, 'Awei', '2019-03-22', '16:20:10', '2019-03-22', '18:45:40', 1),
(19, 'dhisca', '001', 1, 2, 3, NULL, 1, 'dhisca', '2019-03-26', '11:25:19', '2019-03-26', '13:54:59', 1),
(20, 'dhisca', 'member04', 2, 1, 3, NULL, 1, 'dhisca', '2019-03-26', '11:25:19', '2019-03-26', '13:54:59', 1),
(21, 'dhisca', '001', 1, 2, 3, NULL, 1, 'dhisca', '2019-03-26', '11:26:00', '2019-03-26', '13:54:59', 1),
(22, 'dhisca', 'member04', 2, 1, 3, NULL, 1, 'dhisca', '2019-03-26', '11:26:00', '2019-03-26', '13:54:59', 1),
(23, 'dhisca', '001', 1, 2, 3, NULL, 1, 'dhisca', '2019-03-26', '11:26:58', '2019-03-26', '13:54:59', 1),
(24, 'dhisca', 'member04', 2, 1, 3, NULL, 1, 'dhisca', '2019-03-26', '11:26:58', '2019-03-26', '13:54:59', 1),
(25, 'coba01', '001', 1, 1, 2, NULL, 1, 'coba01', '2019-03-26', '13:19:52', '', '', 99),
(26, 'dhisca', '001', 1, 2, 3, NULL, 1, 'dhisca', '2019-03-26', '13:51:58', '2019-03-26', '13:54:59', 1),
(27, 'dhisca', 'member04', 2, 1, 3, NULL, 1, 'dhisca', '2019-03-26', '13:51:58', '2019-03-26', '13:54:59', 1),
(28, 'yudi', '001', 1, 2, 3, NULL, 1, 'yudi', '2019-03-27', '19:05:25', '2019-03-27', '19:52:18', 1),
(29, 'yudi', 'member04', 2, 1, 3, NULL, 1, 'yudi', '2019-03-27', '19:05:25', '2019-03-27', '19:52:18', 1),
(30, 'yudi', '001', 1, 2, 3, NULL, 1, 'yudi', '2019-03-27', '19:51:44', '2019-03-27', '19:52:18', 1),
(31, 'yudi', 'member04', 2, 1, 3, NULL, 1, 'yudi', '2019-03-27', '19:51:44', '2019-03-27', '19:52:18', 1),
(32, 'yudi2', '001', 1, 2, 3, NULL, 1, 'yudi2', '2019-03-28', '05:53:05', '2019-03-28', '05:54:25', 1),
(33, 'yudi2', 'member04', 2, 1, 3, NULL, 1, 'yudi2', '2019-03-28', '05:53:05', '2019-03-28', '05:54:25', 1),
(34, 'yudi3', '001', 1, 2, 3, NULL, 1, 'yudi3', '2019-03-28', '05:59:41', '2019-03-28', '05:59:56', 1),
(35, 'yudi3', 'member04', 2, 1, 3, NULL, 1, 'yudi3', '2019-03-28', '05:59:41', '2019-03-28', '05:59:56', 1),
(36, 'yudi4', '001', 1, 2, 3, NULL, 1, 'yudi4', '2019-03-28', '06:03:31', '2019-03-28', '06:03:42', 1),
(37, 'yudi4', 'member04', 2, 1, 3, NULL, 1, 'yudi4', '2019-03-28', '06:03:31', '2019-03-28', '06:03:42', 1),
(38, 'cobax001', '001', 1, 1, 2, NULL, 1, 'cobax001', '2019-03-28', '10:58:22', '', '', 99),
(39, 'Willy chandry', '001', 1, 3, 4, NULL, 1, 'Willy chandry', '2019-03-28', '12:54:42', '', '', 99),
(40, 'Willy chandry', 'Calvin', 2, 2, 4, NULL, 1, 'Willy chandry', '2019-03-28', '12:54:42', '', '', 99),
(41, 'Willy chandry', 'Lips', 3, 1, 4, NULL, 1, 'Willy chandry', '2019-03-28', '12:54:42', '', '', 99),
(42, 'Willy1981', '001', 1, 3, 4, NULL, 1, 'Willy1981', '2019-03-28', '16:03:49', '2019-03-28', '16:25:56', 1),
(43, 'Willy1981', 'Calvin', 2, 2, 4, NULL, 1, 'Willy1981', '2019-03-28', '16:03:49', '2019-03-28', '16:25:56', 1),
(44, 'Willy1981', 'Lips', 3, 1, 4, NULL, 1, 'Willy1981', '2019-03-28', '16:03:49', '2019-03-28', '16:25:56', 1),
(45, 'Hanselking', '001', 1, 3, 4, NULL, 1, 'Hanselking', '2019-03-28', '16:28:20', '2019-03-28', '16:28:35', 1),
(46, 'Hanselking', 'Calvin', 2, 2, 4, NULL, 1, 'Hanselking', '2019-03-28', '16:28:20', '2019-03-28', '16:28:35', 1),
(47, 'Hanselking', 'Lips', 3, 1, 4, NULL, 1, 'Hanselking', '2019-03-28', '16:28:20', '2019-03-28', '16:28:35', 1),
(48, 'Christokhu', '001', 1, 3, 4, NULL, 1, 'Christokhu', '2019-03-28', '17:31:33', '2019-03-28', '17:35:50', 1),
(49, 'Christokhu', 'Calvin', 2, 2, 4, NULL, 1, 'Christokhu', '2019-03-28', '17:31:33', '2019-03-28', '17:35:50', 1),
(50, 'Christokhu', 'Lips', 3, 1, 4, NULL, 1, 'Christokhu', '2019-03-28', '17:31:33', '2019-03-28', '17:35:50', 1),
(51, 'Ezrain', '001', 1, 4, 5, NULL, 1, 'Ezrain', '2019-03-28', '18:21:33', '2019-03-28', '18:41:44', 1),
(52, 'Ezrain', 'Calvin', 2, 3, 5, NULL, 1, 'Ezrain', '2019-03-28', '18:21:33', '2019-03-28', '18:41:44', 1),
(53, 'Ezrain', 'Lips', 3, 2, 5, NULL, 1, 'Ezrain', '2019-03-28', '18:21:33', '2019-03-28', '18:41:44', 1),
(54, 'Ezrain', 'Hanselking', 4, 1, 5, NULL, 1, 'Ezrain', '2019-03-28', '18:21:33', '2019-03-28', '18:41:44', 1),
(55, 'Aditan', '001', 1, 4, 5, NULL, 1, 'Aditan', '2019-03-28', '18:22:27', '2019-03-28', '18:41:17', 1),
(56, 'Aditan', 'Calvin', 2, 3, 5, NULL, 1, 'Aditan', '2019-03-28', '18:22:27', '2019-03-28', '18:41:17', 1),
(57, 'Aditan', 'Lips', 3, 2, 5, NULL, 1, 'Aditan', '2019-03-28', '18:22:27', '2019-03-28', '18:41:17', 1),
(58, 'Aditan', 'Christokhu', 4, 1, 5, NULL, 1, 'Aditan', '2019-03-28', '18:22:27', '2019-03-28', '18:41:17', 1),
(59, 'fandy01', '001', 1, 3, 4, NULL, 1, 'fandy01', '2019-03-28', '18:40:11', '2019-03-28', '18:40:44', 1),
(60, 'fandy01', 'Calvin', 2, 2, 4, NULL, 1, 'fandy01', '2019-03-28', '18:40:11', '2019-03-28', '18:40:44', 1),
(61, 'fandy01', 'winner1010', 3, 1, 4, NULL, 1, 'fandy01', '2019-03-28', '18:40:11', '2019-03-28', '18:40:44', 1),
(62, 'catwoman', '001', 1, 3, 4, NULL, 1, 'catwoman', '2019-03-28', '19:13:03', '2019-03-28', '19:13:34', 1),
(63, 'catwoman', 'Calvin', 2, 2, 4, NULL, 1, 'catwoman', '2019-03-28', '19:13:03', '2019-03-28', '19:13:34', 1),
(64, 'catwoman', 'winner1010', 3, 1, 4, NULL, 1, 'catwoman', '2019-03-28', '19:13:03', '2019-03-28', '19:13:34', 1),
(65, 'MAJUGIBOS', '001', 1, 4, 5, NULL, 1, 'MAJUGIBOS', '2019-03-28', '19:41:54', '2019-03-28', '19:42:24', 1),
(66, 'MAJUGIBOS', 'Calvin', 2, 3, 5, NULL, 1, 'MAJUGIBOS', '2019-03-28', '19:41:54', '2019-03-28', '19:42:24', 1),
(67, 'MAJUGIBOS', 'winner1010', 3, 2, 5, NULL, 1, 'MAJUGIBOS', '2019-03-28', '19:41:54', '2019-03-28', '19:42:24', 1),
(68, 'MAJUGIBOS', 'Catwoman', 4, 1, 5, NULL, 1, 'MAJUGIBOS', '2019-03-28', '19:41:54', '2019-03-28', '19:42:24', 1),
(69, 'Daddyrich', '001', 1, 3, 4, NULL, 1, 'Daddyrich', '2019-03-29', '00:05:02', '2019-03-29', '00:05:32', 1),
(70, 'Daddyrich', 'Calvin', 2, 2, 4, NULL, 1, 'Daddyrich', '2019-03-29', '00:05:02', '2019-03-29', '00:05:32', 1),
(71, 'Daddyrich', 'winner1010', 3, 1, 4, NULL, 1, 'Daddyrich', '2019-03-29', '00:05:02', '2019-03-29', '00:05:32', 1),
(72, 'indonesia001', '001', 1, 3, 4, NULL, 1, 'indonesia001', '2019-03-29', '10:23:54', '2019-03-29', '10:29:22', 1),
(73, 'indonesia001', 'Calvin', 2, 2, 4, NULL, 1, 'indonesia001', '2019-03-29', '10:23:54', '2019-03-29', '10:29:22', 1),
(74, 'indonesia001', 'Winner1010', 3, 1, 4, NULL, 1, 'indonesia001', '2019-03-29', '10:23:54', '2019-03-29', '10:29:22', 1),
(75, 'Goldenangel', '001', 1, 5, 6, NULL, 1, 'Goldenangel', '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1),
(76, 'Goldenangel', 'Calvin', 2, 4, 6, NULL, 1, 'Goldenangel', '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1),
(77, 'Goldenangel', 'Lips', 3, 3, 6, NULL, 1, 'Goldenangel', '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1),
(78, 'Goldenangel', 'Hanselking', 4, 2, 6, NULL, 1, 'Goldenangel', '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1),
(79, 'Goldenangel', 'Ezrain', 5, 1, 6, NULL, 1, 'Goldenangel', '2019-03-29', '12:16:51', '2019-03-29', '13:03:24', 1),
(80, 'dodycand7526', '001', 1, 4, 5, NULL, 1, 'dodycand7526', '2019-03-29', '16:33:35', '2019-03-29', '16:46:10', 1),
(81, 'dodycand7526', 'Calvin', 2, 3, 5, NULL, 1, 'dodycand7526', '2019-03-29', '16:33:35', '2019-03-29', '16:46:10', 1),
(82, 'dodycand7526', 'winner1010', 3, 2, 5, NULL, 1, 'dodycand7526', '2019-03-29', '16:33:35', '2019-03-29', '16:46:10', 1),
(83, 'dodycand7526', 'fandy01', 4, 1, 5, NULL, 1, 'dodycand7526', '2019-03-29', '16:33:35', '2019-03-29', '16:46:10', 1),
(84, 'WIN10', '001', 1, 4, 5, NULL, 1, 'WIN10', '2019-03-29', '17:03:35', '2019-03-29', '17:04:33', 1),
(85, 'WIN10', 'Calvin', 2, 3, 5, NULL, 1, 'WIN10', '2019-03-29', '17:03:35', '2019-03-29', '17:04:33', 1),
(86, 'WIN10', 'winner1010', 3, 2, 5, NULL, 1, 'WIN10', '2019-03-29', '17:03:35', '2019-03-29', '17:04:33', 1),
(87, 'WIN10', 'daddyrich', 4, 1, 5, NULL, 1, 'WIN10', '2019-03-29', '17:03:35', '2019-03-29', '17:04:33', 1),
(88, 'Joevira', '001', 1, 5, 6, NULL, 1, 'Joevira', '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1),
(89, 'Joevira', 'Calvin', 2, 4, 6, NULL, 1, 'Joevira', '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1),
(90, 'Joevira', 'winner1010', 3, 3, 6, NULL, 1, 'Joevira', '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1),
(91, 'Joevira', 'fandy01', 4, 2, 6, NULL, 1, 'Joevira', '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1),
(92, 'Joevira', 'dodycand7526', 5, 1, 6, NULL, 1, 'Joevira', '2019-03-29', '17:15:25', '2019-03-29', '17:16:07', 1),
(93, 'Hutama', '001', 1, 4, 5, NULL, 1, 'Hutama', '2019-03-30', '09:26:36', '2019-04-01', '09:16:45', 1),
(94, 'Hutama', 'Calvin', 2, 3, 5, NULL, 1, 'Hutama', '2019-03-30', '09:26:36', '2019-04-01', '09:16:45', 1),
(95, 'Hutama', 'Lips', 3, 2, 5, NULL, 1, 'Hutama', '2019-03-30', '09:26:36', '2019-04-01', '09:16:45', 1),
(96, 'Hutama', 'Willy1981', 4, 1, 5, NULL, 1, 'Hutama', '2019-03-30', '09:26:36', '2019-04-01', '09:16:45', 1),
(97, 'darningsih', '001', 1, 4, 5, NULL, 1, 'darningsih', '2019-03-30', '23:44:28', '2019-04-01', '09:16:57', 1),
(98, 'darningsih', 'Calvin', 2, 3, 5, NULL, 1, 'darningsih', '2019-03-30', '23:44:28', '2019-04-01', '09:16:57', 1),
(99, 'darningsih', 'Lips', 3, 2, 5, NULL, 1, 'darningsih', '2019-03-30', '23:44:28', '2019-04-01', '09:16:57', 1),
(100, 'darningsih', 'Willy1981', 4, 1, 5, NULL, 1, 'darningsih', '2019-03-30', '23:44:28', '2019-04-01', '09:16:57', 1),
(101, 'Sumberhasil', '001', 1, 5, 6, NULL, 1, 'Sumberhasil', '2019-03-31', '18:24:53', '', '', 99),
(102, 'Sumberhasil', 'Calvin', 2, 4, 6, NULL, 1, 'Sumberhasil', '2019-03-31', '18:24:53', '', '', 99),
(103, 'Sumberhasil', 'Lips', 3, 3, 6, NULL, 1, 'Sumberhasil', '2019-03-31', '18:24:53', '', '', 99),
(104, 'Sumberhasil', 'Hanselking', 4, 2, 6, NULL, 1, 'Sumberhasil', '2019-03-31', '18:24:53', '', '', 99),
(105, 'Sumberhasil', 'Ezrain', 5, 1, 6, NULL, 1, 'Sumberhasil', '2019-03-31', '18:24:53', '', '', 99),
(106, 'Waterfall', '001', 1, 6, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(107, 'Waterfall', 'Calvin', 2, 5, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(108, 'Waterfall', 'Lips', 3, 4, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(109, 'Waterfall', 'Hanselking', 4, 3, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(110, 'Waterfall', 'Ezrain', 5, 2, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(111, 'Waterfall', 'Goldenangel', 6, 1, 7, NULL, 1, 'Waterfall', '2019-03-31', '18:44:51', '', '', 99),
(112, 'spartateam', '001', 1, 3, 4, NULL, 1, 'spartateam', '2019-04-01', '13:04:22', '2019-04-01', '13:04:52', 1),
(113, 'spartateam', 'Calvin', 2, 2, 4, NULL, 1, 'spartateam', '2019-04-01', '13:04:22', '2019-04-01', '13:04:52', 1),
(114, 'spartateam', 'Winner1010', 3, 1, 4, NULL, 1, 'spartateam', '2019-04-01', '13:04:22', '2019-04-01', '13:04:52', 1),
(115, 'Herrychan', '001', 1, 2, 3, NULL, 1, 'Herrychan', '2019-04-02', '11:08:49', '2019-04-02', '11:10:24', 1),
(116, 'Herrychan', 'member04', 2, 1, 3, NULL, 1, 'Herrychan', '2019-04-02', '11:08:49', '2019-04-02', '11:10:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_users`
--

CREATE TABLE `g_users` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `grupid` int(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_users`
--

INSERT INTO `g_users` (`username`, `nama`, `password`, `grupid`, `status`) VALUES
('admin', 'Administrator', 'e8bfc046a10873a065375b46b69872bf75203f3c', 1, 1),
('liverpollfc', 'HENFRY SUDARMAN', '3fb744ca689b88d2642647b49e4c43e5cd78f635', 6, 1),
('tadmin', 'SuperAdmin', '11de8c0b8370bf41e6b31cc1051d5a7bb1830dac', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_wfund`
--

CREATE TABLE `g_wfund` (
  `id` bigint(20) NOT NULL,
  `refno` varchar(50) DEFAULT NULL,
  `parentid` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `useridx` varchar(100) DEFAULT NULL,
  `jtransaksi` int(2) DEFAULT NULL,
  `jtransaksix` int(2) DEFAULT NULL,
  `jkomisi` int(2) DEFAULT NULL,
  `trxprc` varchar(50) DEFAULT NULL,
  `trxvalue` varchar(50) DEFAULT NULL,
  `kursvalue` varchar(50) DEFAULT NULL,
  `idrvalue` varchar(50) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `waktuinput` varchar(10) DEFAULT NULL,
  `tglapprove` varchar(10) DEFAULT NULL,
  `waktuapprove` varchar(10) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `remark2` text,
  `status` int(2) DEFAULT NULL,
  `orderid` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_wfund`
--

INSERT INTO `g_wfund` (`id`, `refno`, `parentid`, `userid`, `useridx`, `jtransaksi`, `jtransaksix`, `jkomisi`, `trxprc`, `trxvalue`, `kursvalue`, `idrvalue`, `tglinput`, `waktuinput`, `tglapprove`, `waktuapprove`, `remark`, `remark2`, `status`, `orderid`) VALUES
(1, '201903230100001', 'member04', 'member04', 'member04', 0, 0, 1, '50.00', '-1.5', NULL, NULL, '2019-03-23', '06:35:26', '2019-03-23', '06:35:26', 'Profit Sharing', NULL, 1, '16467584'),
(2, '201903230100002', 'member04', 'member04', 'member04', 0, 0, 2, '', '0.5', NULL, NULL, '2019-03-23', '06:35:26', '2019-03-23', '06:35:26', 'Lots Rebate - 1.00 Lot/s', NULL, 1, '16467584'),
(3, '201903230100003', '001', '001', 'member04', 0, 0, 3, '8.00', '-0.24', NULL, NULL, '2019-03-23', '06:35:26', '2019-03-23', '06:35:26', 'Unilevel', NULL, 1, '16467584');

-- --------------------------------------------------------

--
-- Table structure for table `g_wmt4`
--

CREATE TABLE `g_wmt4` (
  `id` bigint(20) NOT NULL,
  `refno` varchar(50) DEFAULT NULL,
  `parentid` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `useridx` varchar(100) DEFAULT NULL,
  `jtransaksi` int(2) DEFAULT NULL,
  `jtransaksix` int(2) DEFAULT NULL,
  `jkomisi` int(2) DEFAULT NULL,
  `trxprc` varchar(50) DEFAULT NULL,
  `trxvalue` varchar(50) DEFAULT NULL,
  `kursid` varchar(10) DEFAULT NULL,
  `kursvalue` varchar(50) DEFAULT NULL,
  `fintrxvalue` varchar(50) DEFAULT NULL,
  `tgltrx` varchar(10) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `waktuinput` varchar(10) DEFAULT NULL,
  `tglapprove` varchar(10) DEFAULT NULL,
  `waktuapprove` varchar(10) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `remark2` text,
  `status` int(2) DEFAULT NULL,
  `extakunid` varchar(100) DEFAULT NULL,
  `yourname` varchar(200) DEFAULT NULL,
  `yourbank` varchar(200) DEFAULT NULL,
  `trxdoc` varchar(200) DEFAULT NULL,
  `jfinanceid` int(10) DEFAULT NULL,
  `approveorder` varchar(50) DEFAULT NULL,
  `approveamount` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_wmt4`
--

INSERT INTO `g_wmt4` (`id`, `refno`, `parentid`, `userid`, `useridx`, `jtransaksi`, `jtransaksix`, `jkomisi`, `trxprc`, `trxvalue`, `kursid`, `kursvalue`, `fintrxvalue`, `tgltrx`, `tglinput`, `waktuinput`, `tglapprove`, `waktuapprove`, `remark`, `remark2`, `status`, `extakunid`, `yourname`, `yourbank`, `trxdoc`, `jfinanceid`, `approveorder`, `approveamount`) VALUES
(1, '201904011139521', 'Joevira', 'Joevira', '', 0, 0, NULL, NULL, '198146250.00', 'IDR', NULL, NULL, '2019-04-01', '2019-04-01', '11:39:52', '2019-04-01', '20:23:59', 'Deposit', NULL, 99, '400027', ' joevira yaptonaga', ' ', '', 1, NULL, NULL),
(2, '201904011213362', 'Winner1010', 'Winner1010', '', 0, 0, NULL, NULL, '712500000.00', 'IDR', '14250', '50000.00', '2019-04-01', '2019-04-01', '12:13:36', '2019-04-01', '12:15:54', 'Deposit', NULL, 1, '400024', 'Josenova', ' ', '', 1, '17214469', '50000'),
(3, '201904011445393', 'Calvin', 'Calvin', '', 0, 0, NULL, NULL, '284900000.00', 'IDR', '14245', '20000.00', '2019-04-01', '2019-04-01', '14:45:39', '2019-04-01', '14:46:14', 'Deposit', NULL, 1, '400021', 'Calvin soemito makmur', ' ', '', 1, '17221998', '20000'),
(4, '201904012047584', 'Joevira', 'Joevira', '', 0, 0, NULL, NULL, '13500.00', 'USD', '1', '13500.00', '2019-04-01', '2019-04-01', '20:47:58', '2019-04-01', '21:27:52', 'Deposit', NULL, 1, '400027', ' joevira yaptonaga', ' ', '', 1, '17237570', '13500'),
(5, '201904012059225', 'dodycand7526', 'dodycand7526', '', 0, 0, NULL, NULL, '500.00', 'USD', '1', '500.00', '2019-04-01', '2019-04-01', '20:59:22', '2019-04-01', '21:27:33', 'Deposit', NULL, 1, '400028', 'Dody Candra', ' ', '', 1, '17237557', '500'),
(6, '201904020805336', 'Lips', 'Lips', '', 0, 0, NULL, NULL, '50000.00', 'USD', '1', '50000.00', '2019-04-02', '2019-04-02', '08:05:33', '2019-04-02', '08:05:53', 'Deposit', NULL, 1, '400022', 'Desi maria', ' D', '', 1, '17250971', '50000'),
(7, '201904020807417', 'Rocky ', 'Rocky ', '', 0, 0, NULL, NULL, '10000.00', 'USD', NULL, NULL, '2019-04-02', '2019-04-02', '08:07:41', NULL, NULL, 'Deposit', NULL, 99, '400023', 'Rocky Tan', ' D', '', 1, NULL, NULL),
(8, '201904020810348', 'Rocky ', 'Rocky ', '', 0, 0, NULL, NULL, '10000.00', 'USD', '1', '10000.00', '2019-04-02', '2019-04-02', '08:10:34', '2019-04-02', '08:10:46', 'Deposit', NULL, 1, '400023', 'Rocky Tan', ' D', '', 1, '17251092', '10000'),
(9, '201904021117109', 'Herrychan', 'Herrychan', '', 0, 0, NULL, NULL, '10000.00', 'USD', '1', '10000.00', '2019-04-02', '2019-04-02', '11:17:10', '2019-04-02', '11:17:30', 'Deposit', NULL, 1, '400039', 'Herry chandra agus', ' D', '', 1, '17258533', '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_csv`
--
ALTER TABLE `g_csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_csvdt`
--
ALTER TABLE `g_csvdt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_extroakun`
--
ALTER TABLE `g_extroakun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_gjfinance`
--
ALTER TABLE `g_gjfinance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_guser`
--
ALTER TABLE `g_guser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_jfinance`
--
ALTER TABLE `g_jfinance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_jfinancekurs`
--
ALTER TABLE `g_jfinancekurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_jkomisi`
--
ALTER TABLE `g_jkomisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_jmember`
--
ALTER TABLE `g_jmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_jpackage`
--
ALTER TABLE `g_jpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_junilevel`
--
ALTER TABLE `g_junilevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_kurs`
--
ALTER TABLE `g_kurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_member`
--
ALTER TABLE `g_member`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `g_negara`
--
ALTER TABLE `g_negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_option`
--
ALTER TABLE `g_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_session`
--
ALTER TABLE `g_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_temail`
--
ALTER TABLE `g_temail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_tiket`
--
ALTER TABLE `g_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_tiketdt`
--
ALTER TABLE `g_tiketdt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_unilevel`
--
ALTER TABLE `g_unilevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_users`
--
ALTER TABLE `g_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `g_wfund`
--
ALTER TABLE `g_wfund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_wmt4`
--
ALTER TABLE `g_wmt4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_csv`
--
ALTER TABLE `g_csv`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_csvdt`
--
ALTER TABLE `g_csvdt`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_extroakun`
--
ALTER TABLE `g_extroakun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `g_gjfinance`
--
ALTER TABLE `g_gjfinance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_guser`
--
ALTER TABLE `g_guser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `g_jfinance`
--
ALTER TABLE `g_jfinance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_jfinancekurs`
--
ALTER TABLE `g_jfinancekurs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `g_jkomisi`
--
ALTER TABLE `g_jkomisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `g_jpackage`
--
ALTER TABLE `g_jpackage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `g_junilevel`
--
ALTER TABLE `g_junilevel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `g_option`
--
ALTER TABLE `g_option`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `g_session`
--
ALTER TABLE `g_session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `g_temail`
--
ALTER TABLE `g_temail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `g_tiket`
--
ALTER TABLE `g_tiket`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_tiketdt`
--
ALTER TABLE `g_tiketdt`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_unilevel`
--
ALTER TABLE `g_unilevel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `g_wfund`
--
ALTER TABLE `g_wfund`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `g_wmt4`
--
ALTER TABLE `g_wmt4`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
