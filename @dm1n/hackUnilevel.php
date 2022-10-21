<?php
include("includes/config.php");
$txt0 = "DROP TABLE IF EXISTS `g_junilevel`;";
$txt1 = "
CREATE TABLE IF NOT EXISTS `g_junilevel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
";
$txt2 = "INSERT INTO `g_junilevel` (`id`, `nmjunilevel`, `minsponsor`, `lvl01`, `lvl02`, `lvl03`, `lvl04`, `lvl05`, `lvl06`, `lvl07`, `lvl08`, `lvl09`, `lvl10`, `rbt01`, `rbt02`, `rbt03`, `rbt04`, `rbt05`, `rbt06`, `rbt07`, `rbt08`, `rbt09`, `rbt10`, `status`) VALUES
(1, 'Unilevel 1', 1, '8.00', '6.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1),
(2, 'Unilevel 2', 2, '8.00', '6.00', '4.00', '2.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1),
(3, 'Unilevel 3', 3, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.00', '0.00', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.00', '0.00', '0.00', '0.00', 1),
(4, 'Unilevel 4', 4, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.00', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.00', '0.00', 1),
(5, 'Unilevel 5', 5, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.50', '0.00', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.50', '0.00', 1),
(6, 'Unilevel 6', 6, '8.00', '6.00', '4.00', '2.00', '1.00', '1.00', '0.50', '0.50', '0.50', '0.50', '1.00', '1.00', '0.75', '0.75', '0.75', '0.75', '0.50', '0.50', '0.50', '0.50', 1);";

mysql_query( $txt0 );
mysql_query( $txt1 );
mysql_query( $txt2 );
